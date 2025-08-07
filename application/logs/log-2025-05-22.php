<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-05-22 00:02:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (6237899, '596', 11976.012, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:02:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (6237899, '596', 11976.012, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6237899, '596', 11976.012, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 00:08:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6237958, '2556', 2964, '10', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:08:29 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6237958, '2556', 2964, '10', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6237958, '2556', 2964, '10', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 00:11:50 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 00:11:50 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 00:12:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 00:12:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 00:12:22 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 00:12:22 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 00:13:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 00:31:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:31:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 00:31:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6237998, '239', 1779.6, '1', '10.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:31:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6237998, '239', 1779.6, '1', '10.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6237998, '239', 1779.6, '1', '10.00', NULL, 'null')
ERROR - 2025-05-22 00:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:31:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 00:38:41 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 00:38:41 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 00:38:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 00:44:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 00:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 00:44:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 00:46:47 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 01:00:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 01:06:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 01:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:23:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:23:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:23:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:24:02 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 01:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:26:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:26:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6238085, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:26:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6238085, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6238085, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 01:26:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:26:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:46:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:46:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:46:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:46:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:46:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:46:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:46:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:46:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:46:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:46:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:47:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 01:47:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:47:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:47:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:47:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:47:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:47:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:48:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:48:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:48:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:48:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:48:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 01:48:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 01:48:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:50:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:50:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6238183, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:50:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6238183, '709', 9180, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6238183, '709', 9180, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 02:51:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:51:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('851781', '6', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('851781', '6', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('851781', '6', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 02:52:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:52:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:52:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:52:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:52:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:52:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:53:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:53:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:53:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:53:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:53:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:53:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:53:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:53:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:53:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:53:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:54:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:55:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:55:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:55:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:55:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:55:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:55:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:55:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:55:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:55:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:55:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:57:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:57:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:57:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:57:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 02:58:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 02:58:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 03:49:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 03:53:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 03:53:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 03:53:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6238282, '136', 1086.912, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 03:53:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6238282, '136', 1086.912, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6238282, '136', 1086.912, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 03:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 03:53:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 03:54:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 03:54:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 03:58:57 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-22 03:58:57 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-05-22 04:06:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:06:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:07:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:07:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:07:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:07:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:07:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:07:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:07:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:07:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 04:25:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 04:27:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 04:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 05:00:43 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 05:24:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:24:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:25:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:25:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:26:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:26:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:26:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:26:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:26:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:26:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:26:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:27:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:27:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:27:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 05:27:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 05:36:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:00:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:00:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:00:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:00:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:00:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:00:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:00:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:00:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:03:30 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 06:03:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:03:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:27:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:35:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:36:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:37:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:37:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:37:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220014) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:37:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220014) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220014', '00266843', '2025-05-22 06:37:47', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003060065169', NULL, '022300090525Y001077', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250522A190')
ERROR - 2025-05-22 06:38:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:39:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:41:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:42:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:45:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:49:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:49:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:49:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:49:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 06:50:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:50:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:50:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:50:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:50:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:50:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:50:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A098%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 06:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('851792', '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:50:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('851792', '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('851792', '2', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 06:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:51:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:51:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:51:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:51:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A015%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 06:51:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:51:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 06:52:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220070) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:52:48 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220070) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220070', '00375933', '2025-05-22 06:52:45', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000089705957', NULL, '0223R0380525V004445', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Obgyn', 0, 2, NULL, '20250522B203')
ERROR - 2025-05-22 06:52:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:54:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:54:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:56:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A002%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 06:57:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220086) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 06:57:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220086) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220086', '00375813', '2025-05-22 06:57:40', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001184251375', NULL, '0223R0380525V003824', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250522B200')
ERROR - 2025-05-22 07:00:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:00:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A079%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:00:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:00:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A146%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:01:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:01:59 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A005%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:02:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220105) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:02:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220105) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220105', '00374286', '2025-05-22 07:02:21', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002102547093', NULL, '022309070425Y000044', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250522B148')
ERROR - 2025-05-22 07:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:02:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:03:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:03:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:03:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:03:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:03:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:03:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:03:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:04:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:04:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:04:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:04:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:04:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:04:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:04:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:04:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:04:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:04:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:04:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:04:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:05:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:05:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:05:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:05:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:05:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:05:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:06:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:06:20 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A102%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:06:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:06:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A077%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:07:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:07:00 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A143%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:07:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220122) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:07:01 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220122) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220122', '00214994', '2025-05-22 07:06:58', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002092273424', NULL, '102504030425Y001298', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250522B054')
ERROR - 2025-05-22 07:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220129) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:07:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220129) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220129', '00312381', '2025-05-22 07:07:50', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002198044271', NULL, '102501040325Y001198', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250522B301')
ERROR - 2025-05-22 07:08:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:10:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:10:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:10:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:11:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:11:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A091%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:11:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:11:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:11:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:12:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:12:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:12:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 07:12:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:12:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:12:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:12:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:13:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:14:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:14:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:14:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:15:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:16:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:18:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:19:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:20:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:21:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 07:21:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:23:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:23:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:23:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:23:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:23:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 07:23:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:23:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 07:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:25:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:25:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:25:39 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A140%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:28:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:30:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:30:19 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A097%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:30:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:30:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:30:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:30:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A132%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:31:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:32:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:32:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:33:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220204) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:33:01 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220204) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220204', '00217778', '2025-05-22 07:32:52', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002360545975', NULL, '049600090425Y000897', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250522B089')
ERROR - 2025-05-22 07:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:34:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:34:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:35:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:35:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:35:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 07:35:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:35:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 07:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:35:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 07:35:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:35:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 07:35:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:35:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:36:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:37:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:37:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:37:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:38:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:38:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:39:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:40:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220229) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:41:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220229) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220229', '00052812', '2025-05-22 07:40:50', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001881358143', NULL, '0496B0000325Y002207', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250522A041')
ERROR - 2025-05-22 07:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:41:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:43:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:44:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220243) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:45:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220243) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220243', '00100691', '2025-05-22 07:45:05', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000571308039', NULL, '022300090325Y002365', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250522B268')
ERROR - 2025-05-22 07:45:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:45:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:45:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:45:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:46:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:47:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:47:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220249) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:22 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220249) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220249', '00358194', '2025-05-22 07:47:19', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0003283045481', NULL, '0496B0150425P001339', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250522B174')
ERROR - 2025-05-22 07:47:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:47:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:47:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:47:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:47:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:47:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:48:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:48:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:48:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 07:48:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:48:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 07:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:48:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A125%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:49:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:52:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:53:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:53:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:53:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 07:53:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:54:04 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 07:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:54:48 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 07:54:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:55:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:55:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A117%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 07:57:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:57:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 07:57:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:57:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 07:58:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 07:58:04 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A159%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 07:58:08 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-05-22 07:58:08 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-05-22 07:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:00:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:00:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 08:00:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:00:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 08:00:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:01:08 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 08:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:05 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 08:02:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:02:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A006%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:02:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:02:36 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A092%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:02:51 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 08:02:52 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:02:52 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:02:52 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 08:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:03:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:03:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:03:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:05:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:05:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:05:37 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:05:37 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:05:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 08:05:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:06:26 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:06:26 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 08:06:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 08:06:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:06:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:08:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:08:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220322) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:08:19 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220322) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220322', '00273877', '2025-05-22 08:08:14', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001440925784', NULL, '0496U0010325Y003303', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250522A043')
ERROR - 2025-05-22 08:08:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:09:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A101%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:10:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:11:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:12:43 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A082%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:12:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:14:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:15:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:15:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:15:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:15:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:15:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:15:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:15:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:15:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:15:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:16:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:16:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:16:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:17:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:17:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:17:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:17:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A127%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:19:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:19:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:19:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:20:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:20:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:20:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:20:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:20:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:20:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:20:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:20:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:21:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:21:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:21:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:21:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:21:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:21:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220362) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:21:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220362) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220362', '00377153', '2025-05-22 08:21:53', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250522B427')
ERROR - 2025-05-22 08:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:22:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220365) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:22:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220365) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220365', '00349521', '2025-05-22 08:22:11', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001744462642', NULL, '0223R0380525V001845', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah', 0, 2, NULL, '20250522B183')
ERROR - 2025-05-22 08:22:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:23:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:23:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:23:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 08:23:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:23:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 08:23:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:23:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:24:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:24:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:25:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:25:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:25:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:26:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:26:41 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '40'
AND date(tanggal_layanan) = ''
ERROR - 2025-05-22 08:26:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:27:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:27:00 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1478'
WHERE "id" = '4588984'
ERROR - 2025-05-22 08:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:27:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:27:30 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A083%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:28:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:28:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:29:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:30:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250522A250) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:30:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250522A250) already exists. - Invalid query: UPDATE "sm_antrian_bpjs" SET "id_dokter" = '67', "nama_dokter" = 'dr. TOGU YUGA FITRAH, Sp.B', "kode_bpjs_dokter" = '350050', "tanggal_kunjungan" = '2025-05-22', "kode_booking" = '20250522A250', "urutan" = 250, "nomor_antrean" = 'A250', "id_jadwal_dokter" = '54184'
WHERE "id" = '566778'
ERROR - 2025-05-22 08:30:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220388) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:30:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220388) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220388', '00191826', '2025-05-22 08:30:10', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816646386', NULL, '102505030325Y001471', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250522B065')
ERROR - 2025-05-22 08:30:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:30:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 08:30:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 08:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:31:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:31:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:31:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:33:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:34:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:34:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:50 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:35:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:35:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250623A015) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:35:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250623A015) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250623A015', '015', 'A015', 'A', '2025-06-23', '0', '2025-05-22 08:35:52', 'Booking', 'APM', 'Prioritas', 0, '2025-06-23  07:13:30', 0, '1950', '00160697', 80, 1814, 37, 'URO', '081316401528', '3671101305590001', '1959-05-13', 'dr. TAUFIK RAKHMAN TAHER, Sp.U', 1, 'Asuransi', 57, '60', '200', 'Ok.', '0', '55051', '0001400820693', 'JKN', '310424', '0', '37', '102505040525Y002422', 'PUSKESMAS NEGLASARI', '2025-08-17', 'URO', '3', NULL, '0223R0380525V010261', '37')
ERROR - 2025-05-22 08:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:35:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:37:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:37:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:37:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:38:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 08:38:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220421) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:38:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220421) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220421', '00091056', '2025-05-22 08:38:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001306370665', NULL, '0223U1090525Y000489', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250522A255')
ERROR - 2025-05-22 08:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:39:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:40:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 08:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:40:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 08:40:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (851938, '7', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:40:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (851938, '7', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (851938, '7', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 08:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:41:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:41:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A104%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:08 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:41:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220436) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:41:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220436) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220436', '00137040', '2025-05-22 08:41:41', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001052774875', NULL, '102505040525Y000320', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250522B209')
ERROR - 2025-05-22 08:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 08:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:42:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220444) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:43:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220444) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220444', '00293832', '2025-05-22 08:43:54', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003302677462', NULL, '102501090325Y000658', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250522B239')
ERROR - 2025-05-22 08:44:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:44:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:44:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:44:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 08:44:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:44:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 08:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:45:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:45:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pasien_id_idx_copy1&quot;
DETAIL:  Key (id)=(00377162) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:46:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220451) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:46:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pasien_id_idx_copy1"
DETAIL:  Key (id)=(00377162) already exists. - Invalid query: INSERT INTO "sm_pasien" ("id", "rm_lama", "tanggal_daftar", "no_identitas", "nama", "status_pasien", "kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "no_prop", "nama_prop", "no_kab", "nama_kab", "no_kec", "nama_kec", "no_kel", "nama_kel", "agama", "gol_darah", "id_pendidikan", "id_pekerjaan", "status_kawin", "nama_ayah", "nama_ibu", "telp", "id_etnis", "etnis_lainnya", "hamkom", "hamkom_lainnya", "status", "disabilitas", "no_rw", "no_rt", "no_rumah", "kode_pos", "is_pegawai_rsud", "email", "last_active") VALUES ('00377162', '', '2025-05-22 08:46:32', '3671016411980002', 'SITI NURAZIZAH HAYATI', NULL, 'P', 'TANGERANG', '1998-11-23', 'BINONG PERMAI B-31/24', '36', 'BANTEN', '3', 'TANGERANG', '17', 'CURUG', '1006', 'BINONG', 'Islam', NULL, '8', '65', 'Kawin', NULL, NULL, '085717570419', '7', NULL, '', NULL, 'Hidup', 0, '013', '007', NULL, NULL, 0, NULL, '2025-05-22 08:46:32')
ERROR - 2025-05-22 08:46:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220451) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220451', '00195488', '2025-05-22 08:46:25', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002761463294', NULL, '102501100325Y002792', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250522B106')
ERROR - 2025-05-22 08:46:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220451) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:46:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220451) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220451', '00373630', '2025-05-22 08:46:34', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002113512074', NULL, '0223B1790425Y000007', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250522B319')
ERROR - 2025-05-22 08:46:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:46:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 08:47:05 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 08:47:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:47:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:47:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:47:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:48:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:48:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 01:49:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 01:49:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:49:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:49:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 08:49:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 08:49:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:49:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A080%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:49:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:50:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 08:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:51:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:51:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:51:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:51:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:51:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:52:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:52:33 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A108%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:52:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:52:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:53:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:53:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220474) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:54:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220474) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220474', '00354185', '2025-05-22 08:54:02', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250522B456')
ERROR - 2025-05-22 08:54:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:54:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:54:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:55:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:56:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:56:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 08:56:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A107%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 08:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:56:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:57:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:57:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:59:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:59:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 08:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:00:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:00:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:00:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:00:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:00:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:00:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:01:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:02:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 09:02:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:02:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 09:02:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220503) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:02:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220503) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220503', '00355511', '2025-05-22 09:02:18', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '19', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Klinik Akasia', 0, '2', '', '20250522E005')
ERROR - 2025-05-22 09:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:02:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220508) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:03:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220508) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220508', '00015931', '2025-05-22 09:03:09', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049234004', NULL, '102501020525Y002762', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Urologi', 0, 2, NULL, '20250522A259')
ERROR - 2025-05-22 09:03:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220511) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:03:26 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220511) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220511', '00086169', '2025-05-22 09:03:25', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001275212823', NULL, '022300090525Y002237', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250522A247')
ERROR - 2025-05-22 09:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:03:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:04:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:04:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:05:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:05:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:06:14 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND "ab"."kode_booking" = '20250522A093'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:06:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:06:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A094%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-22 12&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-05-22 12'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:06:45 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-22 12"
LINE 4: AND "lo_tgl" = '2025-05-22 12'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1369'
AND "lo_tgl" = '2025-05-22 12'
AND "id_layanan_pendaftaran" = '751577'
ERROR - 2025-05-22 09:06:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220524) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:07:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220524) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220524', '00376030', '2025-05-22 09:07:01', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003760039236', NULL, '0223R0380525V005124', 'Lama', NULL, 1951, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250522B282')
ERROR - 2025-05-22 09:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:25 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 09:07:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220526) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:07:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220526) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220526', '00274839', '2025-05-22 09:07:32', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 9, '0001080546884', NULL, NULL, 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Cemara', 0, 2, NULL, '20250522C021')
ERROR - 2025-05-22 09:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:08:48 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A081%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:08:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:08:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:09:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:09:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:09:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A086%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:09:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:09:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:09:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-22 09:09:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:09:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-22 09:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:09:26 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00253750'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-22 09:09:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:09:27 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00253750'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-22 09:10:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:10:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852037, '1', '1', '', '2 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:10:22 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (852037, '1', '1', '', '2 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852037, '1', '1', '', '2 X SEHARI 1-2 HISAP', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 09:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:11:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:11:13 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-22 09:11:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8977
ERROR - 2025-05-22 09:11:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:13:39 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F028', '028', 'F028', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 09:13:39', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:24:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 41, 60, '1948', 0)
ERROR - 2025-05-22 09:13:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:13:41 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F028', '028', 'F028', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 09:13:41', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:24:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 41, 60, '1948', 0)
ERROR - 2025-05-22 09:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:13:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:13:45 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F028', '028', 'F028', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 09:13:45', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:24:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 41, 60, '1948', 0)
ERROR - 2025-05-22 02:14:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:14:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:14:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:14:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:14:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:14:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:14:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:14:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;2x1&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852056, '1', '2x1', '2'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:14:37 --> Query error: ERROR:  invalid input syntax for type numeric: "2x1"
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852056, '1', '2x1', '2'...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852056, '1', '2x1', '2', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 09:14:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250522B470) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:14:41 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250522B470) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250522B470', '470', 'B470', 'B', '2025-05-22', '0', '2025-05-22 09:14:39', 'Booking', 'APM', 'Asuransi', 0, '2025-05-22  08:43:30', 0, '1951', '00375368', 59, 253417, 36, 'THT', '089508695018', '3671012407180004', '2025-05-04', 'dr. LUCYANA ACHWAS  Sp THT-KL', 1, 'Asuransi', 36, '60', '200', 'Ok.', '0', '53833', '0003758870619', 'JKN', NULL, '1', NULL, '102501020525Y002765', 'PUSKESMAS SUKASARI', '2025-08-20', 'THT', '1', NULL, NULL, '36', 'Sudah', 200, 'Ok.')
ERROR - 2025-05-22 09:15:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 5: AND &quot;NO_KEC&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:15:20 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 5: AND "NO_KEC" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = '71'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 09:15:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220548) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:15:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220548) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220548', '00281055', '2025-05-22 09:15:30', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002071152573', NULL, '102501100325Y001246', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250522A211')
ERROR - 2025-05-22 09:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:16:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:17:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:17:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:18:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:18:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 09:18:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:18:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 09:18:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:19:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:19:17 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F029', '029', 'F029', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 09:19:17', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:26:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 40, 60, '1950', 0)
ERROR - 2025-05-22 09:19:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:19:20 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F029', '029', 'F029', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 09:19:20', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:26:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 40, 60, '1950', 0)
ERROR - 2025-05-22 09:19:21 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:19:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:20:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:20:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:20:51 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-22 09:20:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:20:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-22 09:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:20:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 09:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:20:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 09:21:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:21:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:21:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:22:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:22:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 09:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:23:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:23:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:24:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:24:13 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 09:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:24:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:24:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:25:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:25:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:26:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:26:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:26:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 02:28:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:28:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:28:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:28:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:28:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:29:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:29:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:29:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:29:30 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A090%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:29:51 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:29:51 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:29:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:29:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 09:29:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:29:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 09:30:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:31:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:31:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:31:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:32:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:33:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:33:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:34:03 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00300874'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-05-22 09:34:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:35:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 09:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:37:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:37:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:38:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:38:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 5:                                     AND vm_jd.tanggal = ''
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:38:59 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 5:                                     AND vm_jd.tanggal = ''
                                                                ^ - Invalid query: UPDATE sm_jadwal_dokter jd
                                SET jml_kunjung = vm_jd.jumlah_kunjungan
                                FROM vm_jml_jadwal_dokter_2shift vm_jd
                                WHERE jd.id = vm_jd.id
                                    AND vm_jd.tanggal = ''
                                    AND vm_jd.shift_poli = ''
                                    AND vm_jd.set_update = 1;
ERROR - 2025-05-22 09:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;undefined&quot;
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:38:59 --> Query error: ERROR:  invalid input syntax for type date: "undefined"
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ - Invalid query: SELECT jd.id_poli,  jd.tanggal, jd.nama_poli,jd.shift_poli, array_to_string((string_to_array(jd.nama_dokter, ' '))[1:2], ' ') AS nama_dokter, 
                jd.kuota, jd.jml_kunjung jadwal_jml, vm_jd.jumlah_kunjungan real_kunjungan
                FROM sm_jadwal_dokter jd
                LEFT JOIN vm_jml_jadwal_dokter_2shift vm_jd ON vm_jd.id = jd.id
                WHERE jd.tanggal='undefined' AND jd.shift_poli='undefined'
                ORDER BY jd.nama_poli
ERROR - 2025-05-22 09:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:39:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:39:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:41:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:42:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:42:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:43:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 09:43:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:43:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:43:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 09:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:51 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%na%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:51 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natri%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:51 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natriu%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:52 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natrium%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:52 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natrium di%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:54 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natrium d%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:56 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%n%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:56 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%na%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:43:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:43:56 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00377166' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%natr%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-05-22 09:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:44:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 09:45:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:45:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 09:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:46:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:46:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:47:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:48:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:49:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:49:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:50:44 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:50:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:50:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;undefined&quot;
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:50:58 --> Query error: ERROR:  invalid input syntax for type date: "undefined"
LINE 5:                 WHERE jd.tanggal='undefined' AND jd.shift_po...
                                         ^ - Invalid query: SELECT jd.id_poli,  jd.tanggal, jd.nama_poli,jd.shift_poli, array_to_string((string_to_array(jd.nama_dokter, ' '))[1:2], ' ') AS nama_dokter, 
                jd.kuota, jd.jml_kunjung jadwal_jml, vm_jd.jumlah_kunjungan real_kunjungan
                FROM sm_jadwal_dokter jd
                LEFT JOIN vm_jml_jadwal_dokter_2shift vm_jd ON vm_jd.id = jd.id
                WHERE jd.tanggal='undefined' AND jd.shift_poli='undefined'
                ORDER BY jd.nama_poli
ERROR - 2025-05-22 09:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 02:51:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 02:51:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:52:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:53:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:53:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:54:44 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-22 09:54:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:55:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:40 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:55:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:55:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:55:58 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A201%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 09:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:56:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:57:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:58:15 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:58:15 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 09:58:15 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:58:15 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:58:35 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 09:59:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852215, '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 09:59:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852215, '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852215, '2', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 09:59:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:59:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:00:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:00:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:00:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:00:52 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
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
WHERE "lp"."id_pendaftaran" = '692434'
AND "lp"."id_pendaftaran" = '692434'
ORDER BY "lp"."id" ASC
ERROR - 2025-05-22 10:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:01:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:02:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:02:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:02:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:02:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:02:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:03:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:03:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:04:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:06:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:06:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:07:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852241, '2', '', '7', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:08:09 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852241, '2', '', '7', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852241, '2', '', '7', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 03:08:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 03:08:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:08:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:08:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:09:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:10:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 03:10:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 03:10:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:10:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:11:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A267%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 10:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:11:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:11:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:11:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:11:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:55 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 10:11:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-05-22 10:11:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:12:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:14:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:14:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220646) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:14:22 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220646) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220646', '00199071', '2025-05-22 10:14:22', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002103388716', NULL, '102501040325Y003438', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250522B112')
ERROR - 2025-05-22 10:14:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:14:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:15:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:16:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 10:16:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:16:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:16:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:17:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:17:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 10:17:49 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 215
ERROR - 2025-05-22 10:17:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 215
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 406
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 406
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 411
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 411
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 412
ERROR - 2025-05-22 10:17:51 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 412
ERROR - 2025-05-22 10:17:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:18:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:19:06 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:19:06 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:19:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:19:06 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:20:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:20:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:20:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:22:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:22:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:22:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:22:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:23:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 10:23:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220662) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:23:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220662) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220662', '00377197', '2025-05-22 10:23:18', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '7', NULL, NULL, NULL, 'Baru', '0', '1768', 1, 'Belum', 'Laboratorium ', 0, 2, '', NULL)
ERROR - 2025-05-22 10:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:24:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:24:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:24:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:25:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:25:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:25:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:25:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-22 10&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-05-22 10', &quot;...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:25:59 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-22 10"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-22 10', "...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-22 10', "id_dokter_dpjp" = '45', "ttd_dokter_dpjp" = '1'
WHERE "id" = '872321'
ERROR - 2025-05-22 10:26:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:26:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:26:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:26:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:26:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:27:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:27:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:27:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:27:55 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A115%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 10:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:28:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:28:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:29:40 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:29:40 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:29:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:29:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:29:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:29:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:30:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '91...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:30:01 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '91...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('694249', '751920', '0001868418314', '0223R0380525V010299', '00366210', 'INAH', '1962-05-07', 2, '2025-05-22 07:58:05', '2025-05-22 09:12:14', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'E10.4#I11.0#Z09.8#J44.9', '89.05', '0', '0', '125000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '910504', '0', '0', '0', '0', 'dr. MARCELLINUS MAHARSIDI, Sp.PD', 'CP', '00003', 'JKN', '3603286209970003', '2025-05-22 10:30:01', 'normal', 'set_claim_data', 'E10.4#I11.0#Z09.8#J44.9', '89.05')
ERROR - 2025-05-22 10:30:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 03:30:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 03:30:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:30:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:30:31 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1479'
WHERE "id" = '4589824'
ERROR - 2025-05-22 10:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:31:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:33:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:33:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:33:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A110%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 10:33:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:33:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:34:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:34:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:34:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:35:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:35:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:35:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 10:36:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 10:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:36:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (872398, 750010, null, 10, LEMAH LETIH (+) batuk berdarah (+) 
, ku; sedang kes; cmc gds; 185
, dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., , 2120, 1, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., null, null, 2120, 2025-05-22 10:37:01, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:37:01 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (872398, 750010, null, 10, LEMAH LETIH (+) batuk berdarah (+) 
, ku; sedang kes; cmc gds; 185
, dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., , 2120, 1, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., null, null, 2120, 2025-05-22 10:37:01, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('750010', NULL, '10', 'LEMAH LETIH (+) batuk berdarah (+) 
', 'ku; sedang kes; cmc gds; 185
', 'dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
', 'Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Ranitidin 2x1 Inj. Traneksamat 3x1 N acetil 3x200 Pct 3x500 Gds/hari
', '', '', '', '', '', '', '', '', '2120', '1', 'Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Ranitidin 2x1 Inj. Traneksamat 3x1 N acetil 3x200 Pct 3x500 Gds/hari<div><br></div>', NULL, '2120', 0, NULL, '2025-05-22 10:37:01')
ERROR - 2025-05-22 10:37:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:37:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (872400, 750010, null, 10, LEMAH LETIH (+) batuk berdarah (+) 
, ku; sedang kes; cmc gds; 185
, dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., , 2120, 1, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., null, null, 2120, 2025-05-22 10:37:04, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:37:04 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (872400, 750010, null, 10, LEMAH LETIH (+) batuk berdarah (+) 
, ku; sedang kes; cmc gds; 185
, dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., , 2120, 1, Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Raniti..., null, null, 2120, 2025-05-22 10:37:04, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('750010', NULL, '10', 'LEMAH LETIH (+) batuk berdarah (+) 
', 'ku; sedang kes; cmc gds; 185
', 'dm TIPE 2 TIDAK TERKONTROL hemoptoe pada Tb paru on OAT 3 bln,
', 'Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Ranitidin 2x1 Inj. Traneksamat 3x1 N acetil 3x200 Pct 3x500 Gds/hari
', '', '', '', '', '', '', '', '', '2120', '1', 'Inj. apidra 3x12 iufix dose Inj. levemir1x15iu malam Inj. Ranitidin 2x1 Inj. Traneksamat 3x1 N acetil 3x200 Pct 3x500 Gds/hari<div><br></div>', NULL, '2120', 0, NULL, '2025-05-22 10:37:04')
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:37:07 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:37:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:37:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:37:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 10:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:40:27 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 10:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xaf /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:40:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xaf - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751636', '2025-05-22 10:30', '10', 'Nyeri post op (+)', 'KU: Sedang, kes: CM, TD : 130/87 mmHg HR : 80 x/m RR : 24 x/mnt S : 36.6 C SpO2 : 99%. Lab: 110', '- DMT2 +TB on OAT
- Post amputasi ai Gangren Digiti II pedis dx 
', 'GD/hari', '', '', '', '', '', '', '', '', '2094', '1', '<div>- IVFD D5¯F Ganti IVFD RL 8 jam/kolf</div><div>- inj apidra 3x8 iu sc</div><div><br></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>', NULL, '2094', 0, NULL, '2025-05-22 10:40:34')
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:40:41 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 10:40:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:40:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xaf /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:40:43 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xaf - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751636', '2025-05-22 10:30', '10', 'Nyeri post op (+)', 'KU: Sedang, kes: CM, TD : 130/87 mmHg HR : 80 x/m RR : 24 x/mnt S : 36.6 C SpO2 : 99%. Lab: 110', '- DMT2 +TB on OAT
- Post amputasi ai Gangren Digiti II pedis dx 
', 'GD/hari', '', '', '', '', '', '', '', '', '2094', '1', '<div>- IVFD D5¯F Ganti IVFD RL 8 jam/kolf</div><div>- inj apidra 3x8 iu sc</div><div><br></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>', NULL, '2094', 0, NULL, '2025-05-22 10:40:43')
ERROR - 2025-05-22 10:40:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:40:56 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:40:56 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 10:40:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:40:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 10:40:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xaf /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:40:59 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xaf - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751636', '2025-05-22 10:30', '10', 'Nyeri post op (+)', 'KU: Sedang, kes: CM, TD : 130/87 mmHg HR : 80 x/m RR : 24 x/mnt S : 36.6 C SpO2 : 99. Lab: 110', '- DMT2 +TB on OAT
- Post amputasi ai Gangren Digiti II pedis dx 
', 'GD/hari', '', '', '', '', '', '', '', '', '2094', '1', '<div>- IVFD D5¯F Ganti IVFD RL 8 jam/kolf</div><div>- inj apidra 3x8 iu sc</div><div><br></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>', NULL, '2094', 0, NULL, '2025-05-22 10:40:59')
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 10:41:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 10:42:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:42:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250623B032) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:42:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250623B032) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250623B032', '032', 'B032', 'B', '2025-06-23', '0', '2025-05-22 10:41:24', 'Booking', 'APM', 'Asuransi', 0, '2025-06-23  07:54:00', 0, '1946', '00353158', 673, 634416, 30, 'INT', '089604175559', '3173020601900005', '1990-01-06', 'dr. Ryandri Yovanda, Sp.PD', 1, 'Asuransi', 51, '60', '200', 'Ok.', '0', '57569', '0001438918615', 'JKN', '310631', '0', '30', '102501100425Y001998', 'PUSKESMAS PANUNGGANGAN', '2025-07-15', 'INT', '3', NULL, '0223R0380525V010433', '30')
ERROR - 2025-05-22 10:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250523B315) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:42:12 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250523B315) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250523B315', '315', 'B315', 'B', '2025-05-23', '0', '2025-05-22 10:40:36', 'Booking', 'APM', 'Asuransi', 0, '2025-05-23  07:18:00', 0, '1701', '00054373', 675, 629645, 28, 'ORT', '082134305036', '3306014611720004', '1972-11-06', 'dr. Rheza Fabianto Sebastian, Sp.OT', 1, 'Asuransi', 56, '60', '200', 'Ok.', '0', '54290', '0001830572008', 'JKN', NULL, '1', NULL, '0496B0000525Y003289', 'KLINIK DIANA PERMATA', '2025-08-19', 'ORT', '1', NULL, NULL, '28', 'Sudah', 200, 'Ok.')
ERROR - 2025-05-22 10:42:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:43:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:44:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:45:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:46:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:47:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:47:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:47:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:47:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A186%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 10:48:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:48:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:48:49 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 250
ERROR - 2025-05-22 10:48:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:49:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:50:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:51:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 10:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:52:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:54:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:54:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:55:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:55:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:55:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:56:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:57:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:57:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 10:57:18 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A075%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 10:57:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:57:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:58:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:58:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 03:58:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 03:58:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:58:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 03:58:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 03:58:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:59:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 04:00:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 04:00:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:00:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:00:21 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4838
ERROR - 2025-05-22 11:00:21 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4932
ERROR - 2025-05-22 11:00:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:00:29 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751613', '2025-05-22 10:14', '11', '', '', '', '', 'BB = 89 kg; TB = 175 cm; IMT = 29 kg/m2 (Status gizi obesitas tk.1); Tidak ada alergi makanan. Asupan makan 1/2 porsi. RPD: DM (+). TD:193/106 mmhg N: 70 x/mnt S: 36,5 C R: 18 x/mnt Spo2: 99% , Terpasang IVFD RL 20 Tpm, Pemeriksaan tidak dilakukan radiologi, Lab 21/5/25 Hemoglobin 15.4 Hematokrit 42 Leukosit 8.1 Trombosit 308 Eritrosit 5.28 Ureum 34 Kreatinin 1.1 Glukosa - Stick 1 H 278. Lab 22/5/25 Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Utilitas zat gizi terganggu berkaitan dengan gangguan fungsi endokrin ditandai dengan riwayat DM, Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Diet DM; E = 2300 kkal; P = 73 gr; L = 59 gr; KH = 369 gr; Bentuk makanan biasa, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', 'Asupan oral memenuhi >=80% kebutuhan; Nilai TD dan lab terkait gizi mendekati normal/ terkontrol', '', '', '', '', '1865', '1', 'Diet NB DM 2300 kkal. Edukasi gizi', NULL, '1865', 0, NULL, '2025-05-22 11:00:29')
ERROR - 2025-05-22 11:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:00:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:00:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('693933', '751613', '00161225', '1865', 'vertigo + Hiperglikemia DM + Gastropaty DM', '2', '1', NULL, NULL, '2', '1', '89', NULL, '175', NULL, '29', 'Obesitas tk.1', '1', '1', NULL, '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '2', '1', NULL, NULL, NULL, 'DM', 'Pemeriksaan tidak dilakukan radiologi, Lab 21/5/25 Hemoglobin 15.4 Hematokrit 42 Leukosit 8.1 Trombosit 308 Eritrosit 5.28 Ureum 34 Kreatinin 1.1 Glukosa - Stick 1 H 278. Lab 22/5/25 Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Tidak ada alergi makanan. Asupan makan 1/2 porsi. RPD: DM (+). TD:193/106 mmhg N: 70 x/mnt S: 36,5 C R: 18 x/mnt Spo2: 99% , Terpasang IVFD RL 20 Tpm, ', 'Utilitas zat gizi terganggu', 'gangguan fungsi endokrin', 'riwayat DM, Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Diet DM', '4', '2300 kkal', '53 gr', '73 gr', '369 gr', NULL, NULL, '1', '3x makan 2x snack', 'Asupan oral memenuhi >=80% kebutuhan; Nilai TD dan lab terkait gizi mendekati normal/ terkontrol', '2025-05-22 11:03', '1865', '1', '440', '1', '2025-05-22 11:00:45')
ERROR - 2025-05-22 11:00:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:00:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_gizi_dietetik" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "gd_medis", "gd_risiko", "gd_kondisi", "gd_alergi", "gd_alergi_lainnya", "gd_makanan", "gd_asuhan", "gd_bb", "gd_lila", "gd_tb", "gd_tilut", "gd_imt", "gd_status_gizi", "gd_kesulitan", "gd_setengah", "gd_tigaperempat", "gd_penurunan", "gd_perubahan", "gd_mual", "gd_muntah", "gd_gangguan", "gd_perlu", "gd_sering", "gd_masalah", "gd_diare", "gd_konstipati", "gd_pendarahan", "gd_bersendawa", "gd_intoleransi", "gd_diet", "gd_lemah", "gd_ngt", "gd_dirawat", "gd_tigakg", "gd_enamkg", "gd_penyakit", "gd_penyakit_lainnya", "gd_laboratorium", "gd_klinis", "gd_problem", "gd_etiologi", "gd_gejala", "gd_preskripsi", "gd_jenis_makanan", "gd_energi", "gd_lemak", "gd_protein", "gd_karbohidrat", "gd_cairan", "gd_route", "gd_cara_makan", "gd_frekuensi", "gd_monitoring", "gd_tgl_petugas", "gd_petugas", "gd_ttd", "gd_dokter", "gd_ttd_dokter", "created_at") VALUES ('693933', '751613', '00161225', '1865', 'vertigo + Hiperglikemia DM + Gastropaty DM', '2', '1', NULL, NULL, '2', '1', '89', NULL, '175', NULL, '29', 'Obesitas tk.1', '1', '1', NULL, '1', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '1', '2', '1', NULL, NULL, NULL, 'DM', 'Pemeriksaan tidak dilakukan radiologi, Lab 21/5/25 Hemoglobin 15.4 Hematokrit 42 Leukosit 8.1 Trombosit 308 Eritrosit 5.28 Ureum 34 Kreatinin 1.1 Glukosa - Stick 1 H 278. Lab 22/5/25 Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Tidak ada alergi makanan. Asupan makan 1/2 porsi. RPD: DM (+). TD:193/106 mmhg N: 70 x/mnt S: 36,5 C R: 18 x/mnt Spo2: 99% , Terpasang IVFD RL 20 Tpm, ', 'Utilitas zat gizi terganggu', 'gangguan fungsi endokrin', 'riwayat DM, Gliko Hb (HbA1c) H 9.7 dan Glukosa - Stick 1 H 261 mg/dL.', 'Diet DM', '4', '2300 kkal', '53 gr', '73 gr', '369 gr', NULL, NULL, '1', '3x makan 2x snack', 'Asupan oral memenuhi >=80% kebutuhan; Nilai TD dan lab terkait gizi mendekati normal/ terkontrol', '2025-05-22 11:03', '1865', '1', '440', '1', '2025-05-22 11:00:50')
ERROR - 2025-05-22 11:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:01:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:01:13 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751613', '2025-05-22 10:14', '11', '', '', '', '', 'BB = 89 kg; TB = 175 cm; IMT = 29 kg/m2 (Status gizi obesitas tk.1); Tidak ada alergi makanan. Asupan makan 1/2 porsi. RPD: DM (+). TD:193/106 mmhg N: 70 x/mnt S: 36,5 C R: 18 x/mnt Spo2: 99% , Terpasang IVFD RL 20 Tpm, Pemeriksaan tidak dilakukan radiologi, Lab 21/5/25 Hemoglobin 15.4 Hematokrit 42 Leukosit 8.1 Trombosit 308 Eritrosit 5.28 Ureum 34 Kreatinin 1.1 Glukosa - Stick 1 H 278. Lab 22/5/25 Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Utilitas zat gizi terganggu berkaitan dengan gangguan fungsi endokrin ditandai dengan riwayat DM, Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Diet DM; E = 2300 kkal; P = 73 gr; L = 59 gr; KH = 369 gr; Bentuk makanan biasa, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', 'Asupan oral memenuhi >=80% kebutuhan; Nilai TD dan lab terkait gizi mendekati normal/ terkontrol', '', '', '', '', '1865', '1', 'Diet NB DM 2300 kkal. Edukasi gizi', NULL, '1865', 0, NULL, '2025-05-22 11:01:13')
ERROR - 2025-05-22 11:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:01:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:01:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('751613', '2025-05-22 10:14', '11', '', '', '', '', 'BB = 89 kg; TB = 175 cm; IMT = 29 kg/m2 (Status gizi obesitas tk.1); Tidak ada alergi makanan. Asupan makan 1/2 porsi. RPD: DM (+). TD:193/106 mmhg N: 70 x/mnt S: 36,5 C R: 18 x/mnt Spo2: 99% , Terpasang IVFD RL 20 Tpm, Pemeriksaan tidak dilakukan radiologi, Lab 21/5/25 Hemoglobin 15.4 Hematokrit 42 Leukosit 8.1 Trombosit 308 Eritrosit 5.28 Ureum 34 Kreatinin 1.1 Glukosa - Stick 1 H 278. Lab 22/5/25 Gliko Hb (HbA1c) H 9.7 Ún Glukosa - Stick 1 H 261 mg/dL.', 'Utilitas zat gizi terganggu berkaitan dengan gangguan fungsi endokrin ditandai dengan riwayat DM, Gliko Hb (HbA1c) H 9.7 dan Glukosa - Stick 1 H 261 mg/dL.', 'Diet DM; E = 2300 kkal; P = 73 gr; L = 59 gr; KH = 369 gr; Bentuk makanan biasa, jalur oral, frekuensi 3x makan 2x snack. Edukasi gizi', 'Asupan oral memenuhi >=80% kebutuhan; Nilai TD dan lab terkait gizi mendekati normal/ terkontrol', '', '', '', '', '1865', '1', 'Diet NB DM 2300 kkal. Edukasi gizi', NULL, '1865', 0, NULL, '2025-05-22 11:01:20')
ERROR - 2025-05-22 11:01:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:01:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:01:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:01:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:01:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:01:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:02:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:02:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:05:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:05:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:05:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:06:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...barang = b.id and ed &gt; '2025-05-22' and id_unit = ''), 0) as...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:06:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...barang = b.id and ed > '2025-05-22' and id_unit = ''), 0) as...
                                                             ^ - Invalid query: SELECT "rd".*, "sd"."nama" as "sediaan", "b"."kekuatan", CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "s"."nama", COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang, COALESCE(s.nama, '') as satuan_kekuatan, COALESCE((select sum(masuk)-sum(keluar) from sm_stok where id_barang = b.id and ed > '2025-05-22' and id_unit = ''), 0) as sisa
FROM "sm_resep_tebus_r_detail" as "rd"
JOIN "sm_barang" as "b" ON "b"."id" = "rd"."id_barang"
LEFT JOIN "sm_satuan" as "s" ON "s"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_sediaan" as "sd" ON "sd"."id" = "b"."id_sediaan"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
WHERE "rd"."id_resep_tebus_r" = '6239832'
ERROR - 2025-05-22 11:06:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...barang = b.id and ed &gt; '2025-05-22' and id_unit = ''), 0) as...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:06:52 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...barang = b.id and ed > '2025-05-22' and id_unit = ''), 0) as...
                                                             ^ - Invalid query: SELECT "rd".*, "sd"."nama" as "sediaan", "b"."kekuatan", CONCAT_WS(' ', "b"."nama", "b"."kekuatan", "s"."nama", COALESCE(sd.nama, ''), '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as nama_barang, COALESCE(s.nama, '') as satuan_kekuatan, COALESCE((select sum(masuk)-sum(keluar) from sm_stok where id_barang = b.id and ed > '2025-05-22' and id_unit = ''), 0) as sisa
FROM "sm_resep_tebus_r_detail" as "rd"
JOIN "sm_barang" as "b" ON "b"."id" = "rd"."id_barang"
LEFT JOIN "sm_satuan" as "s" ON "s"."id" = "b"."satuan_kekuatan"
LEFT JOIN "sm_sediaan" as "sd" ON "sd"."id" = "b"."id_sediaan"
LEFT JOIN "sm_pabrik" as "pb" ON "pb"."id" = "b"."id_pabrik"
WHERE "rd"."id_resep_tebus_r" = '6238806'
ERROR - 2025-05-22 11:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:08:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:08:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 11:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:08:47 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-05-22 11:08:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:08:59 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 11:09:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:09:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:09:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:10:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:10:16 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-22 11:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:10:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-22 11:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:10:23 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-05-22 11:10:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:10:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-05-22 11:10:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:10:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A269%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 11:10:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:11:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:12:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:12:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:12:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:13:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:14:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-05-22 11:14:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:14:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '69', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-05-22 11:14:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:15:00 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:15:00 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:15:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:15:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:15:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 11:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 11:15:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 11:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 11:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:15:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-05-22 11:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;jd&quot;
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:51 --> Query error: ERROR:  syntax error at or near "jd"
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ - Invalid query: SELECT sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, sum(jml_checkin) jml_checkin, sum(jml_kunjung) - sum(jml_checkin) jml_booking, string_agg(nama_dokter, ' & ') nama_dokter
FROM ( select jd.id, "jd"."id_dokter", "jd"."nama_dokter", "jd"."kuota", "jd"."jml_kunjung", "kd"."jml_checkin", jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '2025-05-22 00:00:00' and '2025-05-22 23:59:59'
                                                and lp.id_unit_layanan=null and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=nulland jd.tanggal between '2025-05-22' and '2025-05-22'
                                    ) kuota
ERROR - 2025-05-22 11:15:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:15:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-05-22 11:16:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_antrian_bpjs&quot; violates foreign key constraint &quot;sm_antrian_bpjs_id_jadwal_dokter_fkey&quot;
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table &quot;sm_jadwal_dokter&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:16:12 --> Query error: ERROR:  insert or update on table "sm_antrian_bpjs" violates foreign key constraint "sm_antrian_bpjs_id_jadwal_dokter_fkey"
DETAIL:  Key (id_jadwal_dokter)=(0) is not present in table "sm_jadwal_dokter". - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "status_jkn", "usia_pasien", "pasien_baru", "waktu_estimasi", "id_dokter", "status_rm", "nama_dokter", "jenis_kunjungan", "sisa_kuota", "total_kuota", "user_create", "id_jadwal_dokter") VALUES ('20250522F040', '040', 'F040', 'F', '246933', '25', 'MAT', '2025-05-22', 0, '2025-05-22 11:16:12', 'Booking', 'rsud', 'NON JKN', 'ltempat', 0, '2025-05-22 08:48:00', 62, 0, 'dr. SANTI MARIA RUGUN, Sp.M', NULL, 36, 60, '1765', 0)
ERROR - 2025-05-22 11:16:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:16:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 11:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:16:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 11:16:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250605B159) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:16:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250605B159) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250605B159', '159', 'B159', 'B', '2025-06-05', '0', '2025-05-22 11:16:33', 'Booking', 'APM', 'Asuransi', 0, '2025-06-05  11:20:21', 0, '1701', '00350813', 92, 264299, 22, 'KON', '087889101032', '3671016204200005', '2020-04-22', 'drg. RETNO OKTASARI, Sp.KGA', 1, 'Asuransi', 1, '28', '200', 'Ok.', '0', '55164', '0002931678009', 'JKN', '310774', '0', '22', '0223U0280425P001610', 'KLINIK ROYAL MEDICAL CENTER', '2025-07-23', 'KON', '3', NULL, '0223R0380525V010551', '22')
ERROR - 2025-05-22 11:16:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:16:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:16:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2505220731) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:16:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2505220731) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2505220731', '00172288', '2025-05-22 11:16:58', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250522B503')
ERROR - 2025-05-22 11:17:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:17:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:17:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:17:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:17:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:17:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:18:13 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 11:18:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:19:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:19:55 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A191%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-05-22 11:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:21:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:21:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:21:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:21:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:21:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:21:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 04:21:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 04:21:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 04:22:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 04:22:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 04:22:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 04:22:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:22:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:23:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:23:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:24:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Laporan_rm' does not have a method 'index_get' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:24:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:25:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:25:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:26:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:27:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:27:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:27:47 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-22 11:27:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:27:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:27:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:28:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:28:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:28:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:28:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:28:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:28:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:29:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:29:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:29:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:29:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:29:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:29:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:29:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:29:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:30:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:30:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:30:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:30:14 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 11:30:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:30:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;2x1&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852407, '4', '2x1', '2'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:30:31 --> Query error: ERROR:  invalid input syntax for type numeric: "2x1"
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852407, '4', '2x1', '2'...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852407, '4', '2x1', '2', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 11:32:41 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:32:41 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:32:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:32:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:33:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:33:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:34:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:34:00 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_diagnosa" ("id_layanan_pendaftaran", "waktu", "id_dokter", "id_golongan_sebab_sakit", "diagnosa_manual", "golongan_sebab_sakit_lain", "diagnosa_klinis", "prioritas", "jenis_kasus", "diagnosa_banding", "diagnosa_akhir", "penyebab_kematian", "is_resume") VALUES ('751582', '2025-05-22 11:34:00', '657', NULL, '1', 'echo 220525 echo LA_LV dilatasi, LVH (-) Fungsi sistolik LV menurun EF by TEich 36.9% global hipokinetik kecuali basl midposterior FUngsi diastolikLV terganggu E/A fussion Fungsi sistolik RV normal TAPSE 24 mm Katup MR sedang TR ringan, kemungkinan minima PH LASEC (+)', 0, 'Sekunder', '1', '', 'on', 'on', 1)
ERROR - 2025-05-22 11:34:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:34:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:34:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:34:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:35:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:36:17 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-05-22 11:36:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:37:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:38:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:38:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:39:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:40:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 11:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:41:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:41:40 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:41:40 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 11:41:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:41:40 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 11:41:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:42:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:42:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:42:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 11:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:43:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:43:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:44:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:44:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:48:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:50:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:50:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(255) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:50:37 --> Query error: ERROR:  value too long for type character varying(255) - Invalid query: INSERT INTO "sm_diagnosa" ("id_layanan_pendaftaran", "waktu", "id_dokter", "id_golongan_sebab_sakit", "diagnosa_manual", "golongan_sebab_sakit_lain", "diagnosa_klinis", "prioritas", "jenis_kasus", "diagnosa_banding", "diagnosa_akhir", "penyebab_kematian", "is_resume") VALUES ('750822', '2025-05-22 11:50:37', '75', NULL, '1', 'echo 220525 : echo LA,RA, LV dilatasi, lvh (-) Fungsi sistolik LV menurun EF by TEich 24.6% global hipokinetik berat dgn diskinetik basal mid anteroseptal , mid apikal septal, Fungsi diastolik LV abnormal relaksasi E/A 0.9 Fungsi sitolik RV normal TAPSE 21.2 mm Katup PR ringan, TR ringan, MR ringan LVSEC (+)', 0, 'Sekunder', '1', '', '', '', 1)
ERROR - 2025-05-22 11:51:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:51:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:52:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:53:27 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 11:53:27 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-05-22 11:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:54:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:55:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:55:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:55:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:56:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 11:56:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:56:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:56:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:57:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:57:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 11:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:59:25 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-05-22 11:59:25 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-05-22 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 11:59:32 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-05-22 11:59:32 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10744
ERROR - 2025-05-22 12:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:00:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:01:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:03:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:03:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:03:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:04:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:04:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:06:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:07:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:07:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:07:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:08:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:08:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:08:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:09:02 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:09:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:09:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:09:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:09:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 12:09:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:09:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 12:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:10:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:11:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:12:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 05:13:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:13:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 12:14:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:15:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:17:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:17:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:18:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:18:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:18:54 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:19:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:17 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:17 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:17 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:57 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:57 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:19:57 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:19:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:20:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:20:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:20:45 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:20:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:20:45 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:20:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:20:45 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:21:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:21:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:21:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:21:25 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:21:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:21:25 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:21:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:21:25 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 12:21:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:21:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:22:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:23:13 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:23:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:24:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 12:24:17 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:24:37 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:24:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:25:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:25:04 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:25:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:26:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 12:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:26:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 12:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:26:56 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:26:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:28:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:28:09 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '872412', "id_layanan_pendaftaran" = '752176', "waktu" = '2025-05-22 10:14', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak ', "objective" = 'Kes cm , akral hangat, nadi kuat, gcs 15, ews ( 3 hijau ). TD:127/84 Mmhg, N:101 x/mnt, S:36.4 *C, RR:20 X/mnt, Spo2:99 Þngan o2 nasal 3lpm. tgl 21/5/2025 Terpasang IVFD lasix 2mg/jam dan terpasang DC No 16 pengunci 25cc.  Hasil Lab dari RS  Benda tgl 21/5/2025 HB:13.9/HT:39/LEU:107/TR:341. TGL 21/5/2025 di RSUD Kota  Tangerang ro thorak di radiologi, (TGL22/5/2025) Na:136/kalium:4.4 . ', "assessment" = 'Penurunan Curah Jantung', "plan" = 'Setelah dilakukan tindakkan keperawatan selama 3 X 24 jam diharapkan masalah keperawatan Curah jantung meningkat dengan kriteria hasil: lelah menurun, ', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1733', "ttd_nadis" = NULL, "instruksi_ppa" = '<p>PP SORE:</p><p>Observasi Hemodinamik pasien, Monitor tekana darah ( termasuk tekanan darah ortostatik ), Monitor intake dan output cairan, Monitor nilai laboratorium jantung (elektrolit), Posisikan pasien semi-fowler atau fowler dengan kaki ke bawah atau posisi nyaman, kolaborasi pemberian terapi obat</p><p></p><div>PP MALAM:</div><div>Observasi Hemodinamik pasien, Monitor tekana darah ( termasuk tekanan darah ortostatik ), Monitor intake dan output cairan, Monitor nilai laboratorium jantung (elektrolit), Posisikan pasien semi-fowler atau fowler dengan kaki ke bawah atau posisi nyaman, kolaborasi pemberian terapi obat</div><p></p>', "id_dokter_dpjp" = NULL, "id_user" = '1733', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-05-22 12:28:08'
WHERE "id" = '872412'
ERROR - 2025-05-22 12:28:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:28:44 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-05-22 12:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:29:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 12:29:42 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 12:29:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 12:29:42 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 12:29:59 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 12:29:59 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 12:30:11 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 12:30:46 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-05-22 12:31:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:31:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:31:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:32:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:32:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:33:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:35:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 805
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 12:36:56 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 808
ERROR - 2025-05-22 12:36:59 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:37:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:38:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:38:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:39:59 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-05-22 12:40:22 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:40:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:40:50 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 12:40:50 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-05-22 12:40:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 12:40:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-05-22 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:42:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380525V010226) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:42:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380525V010226) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380525V010226', "no_polish" = '0002241421492'
WHERE "id" = '694157'
ERROR - 2025-05-22 12:42:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:42:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:42:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:42:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:44:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:44:32 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 05:44:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:44:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:44:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:44:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:45:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 05:45:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 12:45:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:47:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:48:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 12:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:54:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:54:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:54:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:54:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:54:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:54:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:54:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:55:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:55:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:55:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:55:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:57:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:57:30 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-05-22 12:57:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 12:57:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:58:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:59:10 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 12:59:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 12:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:00:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:00:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:01:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:01:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:01:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:01:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:01:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:01:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:01:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 06:01:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 06:01:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:02:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:03:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:04:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:04:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:05:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 06:06:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 06:06:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:06:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:06:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:07:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:07:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:07:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-05-22 13:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:09:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:10:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 13:11:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 13:11:12 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-05-22 06:11:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 06:11:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:11:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 06:11:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 06:11:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:15:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:15:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:15:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:16:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:16:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-05-22 13&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-05-22 13', &quot;...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:17:43 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-05-22 13"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-22 13', "...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-05-22 13', "id_dokter_dpjp" = '45', "ttd_dokter_dpjp" = '1'
WHERE "id" = '872094'
ERROR - 2025-05-22 13:18:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:18:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:18:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:18:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:18:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:18:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:19:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:19:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:20:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:20:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:20:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:21:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:21:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:22:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:22:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:22:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:22:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:22:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:22:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:22:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:23:29 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-22 13:23:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-22 13:23:29 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-22 13:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:23:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:23:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:23:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:23:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:24:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:24:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:24:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:24:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:24:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:24:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:26:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:26:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:26:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:26:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:26:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 13:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:26:42 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 13:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:27:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:27:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:27:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:27:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:27:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:27:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:27:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:28:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852492, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:28:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852492, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852492, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 13:29:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:29:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:29:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:29:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:29:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:31:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:31:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:31:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:31:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:31:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:31:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:32:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:32:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:32:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:32:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:32:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:33:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:33:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:33:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:33:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:33:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:33:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:33:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:33:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:33:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:33:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:34:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:34:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:34:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:35:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:35:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:35:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:35:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:35:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:35:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:35:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:35:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-05-22 13:36:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 13:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:36:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:36:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:36:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:36:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:36:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:37:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:37:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:37:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:37:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:38:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:38:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:38:14 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-22 13:38:14 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-22 13:38:14 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-22 13:38:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:38:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:38:33 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:39:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 13:39:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 13:39:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:39:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:39:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:39:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:39:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:39:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 13:40:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:41:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:41:44 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:42:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:42:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:42:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:42:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:43:05 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-22 13:43:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-22 13:43:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-22 13:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:44:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:44:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:45:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:45:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:45:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:45:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:45:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:45:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:45:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:48:05 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-22 13:48:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-22 13:48:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-22 13:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:48:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:48:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:48:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:48:48 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:50:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:50:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:50:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:50:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:50:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:50:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:53:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:53:05 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-05-22 13:53:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-05-22 13:53:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-05-22 13:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:53:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:53:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:53:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:53:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:53:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:53:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:54:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:54:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:55:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:55:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:55:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:55:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:56:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:56:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:57:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:57:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:57:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:57:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:57:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:57:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:57:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:57:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:58:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:58:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:58:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:58:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:58:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 13:58:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:59:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:59:57 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:00:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:01:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:01:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:01:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:01:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:01:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:01:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:01:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:01:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:01:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:02:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:02:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:02:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:02:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:02:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:02:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:02:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:02:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:02:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:02:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:03:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:03:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:03:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:03:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:03:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:03:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:03:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:03:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:03:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:03:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:04:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:04:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:04:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:04:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:04:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:04:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:04:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:04:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:04:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:04:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:05:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:05:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:06:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:06:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:08:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:08:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:08:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:08:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:08:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:08:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:08:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:08:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:08:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:08:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:09:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:09:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:09:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:09:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:09:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:09:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:09:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:09:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:09:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:10:03 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:11:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:11:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:11:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:11:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:11:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:11:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:11:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:11:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:12:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:12:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:12:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:12:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:12:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:12:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:13:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:13:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:13:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:14:23 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:16:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:16:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:16:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:16:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:17:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:17:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:17:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:17:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:19:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:19:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:19:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:19:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:19:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:19:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:20:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:20:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:20:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:20:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:20:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:20:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:22:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:22:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:22:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:22:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:22:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:22:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:22:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:22:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:23:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:23:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:23:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:24:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:24:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-05-22 14:24:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:24:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-05-22 14:24:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:24:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:25:15 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:25:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('852198', '7', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:25:24 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('852198', '7', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('852198', '7', '', '1', '2 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 14:26:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:26:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:26:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:26:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:26:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:27:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:27:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:27:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:27:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:27:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:28:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:28:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:28:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:28:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:30:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:30:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:30:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:31:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:31:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:31:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:31:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:31:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:31:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:31:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:31:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:32:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:32:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:32:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:32:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:33:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:33:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:33:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:33:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:33:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('852511', '12', '2', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('852511', '12', '2', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('852511', '12', '2', '', '2 x Sehari 1 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:44 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-05-22 14:33:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:33:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:34:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(850435) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:34 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(850435) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '850435'
ERROR - 2025-05-22 14:34:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(849376) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:43 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(849376) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '849376'
ERROR - 2025-05-22 14:34:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:34:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:34:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:35:09 --> Severity: Warning  --> unlink(/tmp/syam_session807e9e6261b043291e38f462ce06b5ccd56d143b): No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 320
ERROR - 2025-05-22 14:35:09 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_session807e9e6261b043291e38f462ce06b5ccd56d143b /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-05-22 14:35:09 --> Severity: Warning  --> session_regenerate_id(): Session object destruction failed.  ID: user (path: /tmp) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/Session.php 720
ERROR - 2025-05-22 14:35:09 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_session807e9e6261b043291e38f462ce06b5ccd56d143b /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-05-22 14:35:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:35:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:35:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:35:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:36:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:36:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:36:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:36:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:36:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:36:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:37:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:37:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:37:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:37:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('852171', '17', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:37:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('852171', '17', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('852171', '17', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 14:39:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:39:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:39:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:39:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:41:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:41:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:41:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:42:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:42:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:43:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:43:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:43:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:43:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:43:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:43:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:44:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:44:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:44:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:44:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:45:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:45:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:45:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:45:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:46:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:46:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:46:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:46:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:47:27 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:47:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:47:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:47:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:47:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:48:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:48:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:49:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:49:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:49:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:49:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:49:18 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 14:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:49:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:50:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:50:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:50:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:50:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:50:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:50:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:53:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:53:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:53:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:53:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:54:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6244445, '398', 20912.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:54:18 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6244445, '398', 20912.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6244445, '398', 20912.4, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 14:54:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:54:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:54:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:54:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:55:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:55:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:55:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:55:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('852531', '1', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:56:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('852531', '1', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('852531', '1', '', '', '2 x Sehari 1/2 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 14:57:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:57:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:57:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:57:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:57:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:57:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:57:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:57:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:57:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:57:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:58:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:58:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:58:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:58:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:58:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:58:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:59:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:59:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:59:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:59:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:59:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 14:59:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 14:59:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:01:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:01:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:01:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:01:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:01:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:03:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:03:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:03:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:03:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:04:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:04:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:04:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:04:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:05:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:05:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:05:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:05:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:06:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:06:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:07:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:07:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:07:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:07:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:07:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:07:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:07:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:08:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:08:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:08:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:08:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:18 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:09:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:09:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:09:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:10:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:10:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:10:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('852129', '9', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:10:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('852129', '9', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('852129', '9', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 15:11:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:11:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:11:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:11:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:11:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:11:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:11:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:11:55 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-22 15:11:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:11:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:12:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:12:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:12:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:12:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:12:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:12:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:12:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:12:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:13:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:13:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:13:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:13:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:13:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:13:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:13:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:13:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:13:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:13:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:13:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:13:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:13:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:14:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:14:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:14:32 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-22 15:15:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:15:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:15:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:15:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:15:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:16:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:16:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:16:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:16:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:16:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:16:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:17:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:17:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:17:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:17:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:17:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:18:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:18:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:18:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:18:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:18:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:19:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:19:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:19:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:21:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:21:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:21:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:22:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:22:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:22:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:22:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:22:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:23:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:23:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:23:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:23:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:23:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:23:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:24:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:24:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:25:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:25:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:25:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:28:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:28:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:28:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:28:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:28:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:28:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:28:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:29:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:29:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:29:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:29:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:29:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:29:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:29:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:30:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6245123, '616', 13172.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:44 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6245123, '616', 13172.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6245123, '616', 13172.4, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 15:30:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:30:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:30:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:31:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:31:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:32:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:32:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:32:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:32:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:32:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:32:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:32:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:32:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:38:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:38:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:38:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:38:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:38:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:38:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:38:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:39:49 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:40:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:40:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:41:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:41:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 15:41:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:41:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:42:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:42:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:42:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:42:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:43:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:43:14 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-22 15:43:18 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-22 15:43:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:43:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:43:21 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-05-22 15:43:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:43:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:44:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:45:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:45:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:45:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:45:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:46:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:46:12 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:48:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:48:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:48:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:48:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:48:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:49:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:49:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 15:50:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 15:50:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 08:52:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:52:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:54:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 08:54:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 15:58:43 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-05-22 16:00:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6245372, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:00:56 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6245372, '60', 130.8, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6245372, '60', 130.8, '1', '2.00', NULL, 'null')
ERROR - 2025-05-22 16:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:04:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:04:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:04:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:04:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 09:06:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:06:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:09:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:09:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 09:09:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:09:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:10:50 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 16:10:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 16:11:07 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 16:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 16:13:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 16:17:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:17:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:17:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:20:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 16:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 16:32:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:32:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:32:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6245526, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:32:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6245526, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6245526, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 16:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:34:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 09:37:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 09:37:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:42:48 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 16:47:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:47:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:58:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(850967) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:58:51 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(850967) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '850967'
ERROR - 2025-05-22 16:59:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(850934) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 16:59:01 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(850934) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '850934'
ERROR - 2025-05-22 17:07:24 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 17:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 10:30:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:30:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:31:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 10:31:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:31:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '752435', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 17:31:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '752435', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '752435', "id_pendaftaran" = '', "id_users" = '2024', "waktu_kajian_kebidanan" = '2025-05-22 16:09', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"KursiRoda"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":"Puskesmas","rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Pasien","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', "rks_anc" = '{"anc_1":"7","anc_2":"puskesmas benda","anc_3":"1","anc_4":null,"anc_5":null}', "rks_g" = '3', "rks_p" = '2', "rks_a" = '0', "rks_usia_kehamilan" = '37 minggu', "rks_hpht" = 'lupa', "rks_tp" = NULL, "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"14","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"8","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = '-', "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":"1","riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"3","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":"1","riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"12","kebutuhan_biologis_3":"9","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"13:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"3 minggu yang lalu"}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"shalat"}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":"tidur","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = 'betawi', "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '1', "ikbe_pemahaman_rahab" = '0', "ikbe_pemahaman_manajemen" = '0', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":"1","infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"30","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":"1","palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"0\/5","palpasi_17":"2945"}', "pkdk_auskultasi" = '{"auskultasi_1":"140","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '10', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"1","his_konteraksi_2":"10","his_konteraksi_3":"sedang"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"tidak dilakukan","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '5', "pkf_personal" = '5', "pkf_berpakaian" = '10', "pkf_buang_besar" = '10', "pkf_buang_kecil" = '10', "pkf_berpindah" = '15', "pkf_toileting" = '10', "pkf_mobilitas" = '15', "pkf_naik" = '10', "pkf_jumlah_skor" = '100', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = '15', "prjd_kursi_roda" = '0', "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = '30', "prjd_terpasang_infus" = '20', "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = '0', "prjd_sering" = NULL, "prjd_jumlah_skor" = '75', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"120","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"87","frekuensi_nadi_2":"20"}', "pftv_berat_badan" = '{"berat_badan_1":"61","berat_badan_2":"145"}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"1","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = '0_1', "sews_pengeluaran" = NULL, "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-05-22', "dp_pemeriksaan_ctg_tanggal" = NULL, "dp_hasil" = 'terlampir', "dp_hasil1" = NULL, "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":"0","pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', "pk_pasien_ketergantungan_obat" = '{"obat":"","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = '1', "ak_perdarahan" = NULL, "ak_melahirkan" = NULL, "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = '1', "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":"1","kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-05-22 16:09:00', "id_bidan" = '612', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-05-22 16:24:00', "id_dokter" = '50', "ttd_dokter" = '1', "updated_date" = '2025-05-22 17:31:21'
WHERE "id" = '3019'
ERROR - 2025-05-22 17:34:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 17:37:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6245675, '2185', 33599.7, '2', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 17:37:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6245675, '2185', 33599.7, '2', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6245675, '2185', 33599.7, '2', '1.00', NULL, 'null')
ERROR - 2025-05-22 17:39:45 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-22 17:40:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:40:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:41:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 17:43:28 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 17:43:28 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 17:44:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 17:44:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 17:47:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 17:47:08 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-05-22 17:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 17:48:09 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-05-22 17:52:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 17:58:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 18:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 18:02:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 18:02:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8403
ERROR - 2025-05-22 18:09:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:09:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:09:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:09:46 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1296569'),
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
			 
ERROR - 2025-05-22 18:10:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:10:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 18:12:04 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 18:12:04 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 18:12:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 18:12:38 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 18:12:38 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 18:12:38 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 18:22:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 11:27:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:27:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 18:34:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6245876, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:34:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6245876, '1191', 300, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6245876, '1191', 300, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 18:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:35:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 18:35:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 18:35:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 11:51:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:51:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:51:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:51:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:54:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:54:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:55:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 11:55:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:57:58 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 18:58:19 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:09:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:09:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 19:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:09:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 19:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6246016, '584', 204, '1.5', '3.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:09:20 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6246016, '584', 204, '1.5', '3.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246016, '584', 204, '1.5', '3.00', 'Ya', 'null')
ERROR - 2025-05-22 19:09:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:09:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 19:10:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:10:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 19:12:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('751633', '', '2049'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:12:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('751633', '', '2049'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('751633', '', '2049', '2025-05-22 19:05', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien mengatakan nyeri pada luka heacting, myeri semakin bertambah saat beraktifitas"}', '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', '-', '-', '-', '-', '-', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"7","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"1","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":"-","riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"-","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":null}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"-"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"12:00","kebutuhan_biologis_3":"9","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"9","kebutuhan_biologis_6":"13:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"sebulan yang lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"shalat"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":"tidur","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '0', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, '30', '20', NULL, '10', NULL, '0', NULL, '75', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"120","tekanan_darah_2":"80","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"60","berat_badan_2":"150"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-05-22', NULL, 'terlampir', NULL, NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-05-22 19:05', '612', '1', '2025-05-22 19:00', '45', '1', '2025-05-22 19:12:22')
ERROR - 2025-05-22 19:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('751633', '', '2049'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('751633', '', '2049'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('751633', '', '2049', '2025-05-22 19:05', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien mengatakan nyeri pada luka heacting, myeri semakin bertambah saat beraktifitas"}', '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', '-', '-', '-', '-', '-', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"7","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"1","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":"-","riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"-","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":null}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"-"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"12:00","kebutuhan_biologis_3":"9","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"9","kebutuhan_biologis_6":"13:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"sebulan yang lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"shalat"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":"tidur","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '0', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, '30', '20', NULL, '10', NULL, '0', NULL, '75', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"120","tekanan_darah_2":"80","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"60","berat_badan_2":"150"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-05-22', NULL, 'terlampir', NULL, NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-05-22 19:05', '612', '1', '2025-05-22 19:00', '45', '1', '2025-05-22 19:12:31')
ERROR - 2025-05-22 19:13:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:16:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-05-22 19:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;jd&quot;
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:16:28 --> Query error: ERROR:  syntax error at or near "jd"
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ - Invalid query: SELECT sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, sum(jml_checkin) jml_checkin, sum(jml_kunjung) - sum(jml_checkin) jml_booking, string_agg(nama_dokter, ' & ') nama_dokter
FROM ( select jd.id, "jd"."id_dokter", "jd"."nama_dokter", "jd"."kuota", "jd"."jml_kunjung", "kd"."jml_checkin", jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '2025-05-22 00:00:00' and '2025-05-22 23:59:59'
                                                and lp.id_unit_layanan=null and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=nulland jd.tanggal between '2025-05-22' and '2025-05-22'
                                    ) kuota
ERROR - 2025-05-22 19:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:16:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 15: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, ab.task_empat, ab.task_lima, pd.keterangan_antrean, sp.kode_bpjs, coalesce(tr.account, '') as user_sep, skk.id id_skk
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-05-22 00:00:00' AND '2025-05-22 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-05-22 19:17:39 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 19:17:39 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-05-22 19:17:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-05-22 19:18:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6246036, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:18:18 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6246036, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246036, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 19:41:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-05-22 19:41:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11727
ERROR - 2025-05-22 19:44:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (23657, 1, 1, 1, null, null, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 752455, 2025-05-22 19:44:23, -). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:44:23 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (23657, 1, 1, 1, null, null, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 752455, 2025-05-22 19:44:23, -). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('752455', NULL, '-', '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-05-22 19:44:23')
ERROR - 2025-05-22 19:44:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (23658, 1, 1, 1, null, null, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 752455, 2025-05-22 19:44:59, MUHAMMAD IQBAL). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:44:59 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (23658, 1, 1, 1, null, null, null, null, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 752455, 2025-05-22 19:44:59, MUHAMMAD IQBAL). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('752455', NULL, 'MUHAMMAD IQBAL', '1', '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-05-22 19:44:59')
ERROR - 2025-05-22 19:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:47:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 12:47:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 12:47:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 12:47:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 12:47:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 19:50:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:50:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-05-22 19:51:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 19:51:15 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-05-22 19:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:54:39 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:55:52 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-05-22 19:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 19:58:53 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 13:08:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:08:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:08:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:08:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 20:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 20:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 20:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-05-22 20:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:25:04 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:26:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6246183, '537', 636, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:26:47 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6246183, '537', 636, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246183, '537', 636, '500', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 13:27:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:27:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:33:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 20:34:05 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:41:20 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 20:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:49:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6246222, '2694', 799.2, '80', '4.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:49:55 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6246222, '2694', 799.2, '80', '4.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246222, '2694', 799.2, '80', '4.00', 'Ya', 'null')
ERROR - 2025-05-22 20:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:50:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:50:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:50:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:50:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:50:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:50:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:51:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:51:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:51:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:51:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:51:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:51:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:53:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:53:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:53:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:53:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:54:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:54:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:54:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:54:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:54:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:54:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:54:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:54:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 20:55:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:55:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 20:55:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 20:55:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 13:55:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 13:55:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 21:04:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Form_rekam_medis' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-05-22 14:11:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:11:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:14:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:15:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:15:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:29:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:29:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:29:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6246420, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:29:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6246420, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246420, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 21:29:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:29:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:30:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 14:31:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:31:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:32:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852617, '5', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:32:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852617, '5', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852617, '5', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 21:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 14:35:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 14:35:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:35:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (852618, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:35:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (852618, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (852618, '2', '', '', '', '', 'PC', '0', '', '0', '', '3 x 1 oles', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-05-22 21:37:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:37:23 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1645' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-05-22 21:37:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:37:36 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1645' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-05-22 21:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:40:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6246495, '400', 419.58, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:40:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6246495, '400', 419.58, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246495, '400', 419.58, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 21:40:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:40:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:40:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:40:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:40:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:47:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 21:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:50:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:50:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6246539, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:50:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6246539, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246539, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-05-22 21:51:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:51:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:56:24 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-05-22 21:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:57:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:58:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:58:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 21:59:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 21:59:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:09:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:09:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:10:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:10:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:10:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:10:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:10:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:10:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:10:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:11:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:11:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:11:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:11:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:15:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:40:26 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 22:47:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('751710', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:47:08 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('751710', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('751710', '', NULL, '2025-05-22 22:49:00', ' ketidakstabilan kadar glukosa darah (hipoglikemia), nausea', 'BFLUID / 12 JAM', 'cek KGDH -R/AFF OAD Apidra 14 iu, glimipiride 4 mg R/USG Abdomen', '571', '566', '2003')
ERROR - 2025-05-22 22:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('751710', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:47:24 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('751710', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('751710', '', NULL, '2025-05-22 22:49:00', ' ketidakstabilan kadar glukosa darah (hipoglikemia), nausea', 'BFLUID / 12 JAM', 'cek KGDH -R/AFF OAD Apidra 14 iu, glimipiride 4 mg R/USG Abdomen', '571', '566', '2003')
ERROR - 2025-05-22 22:49:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 15:50:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:50:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:50:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:50:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:50:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 15:50:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 22:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 22:51:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 22:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:04:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:05:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:05:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:05:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:05:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:05:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:06:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:06:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 16:09:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:09:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:10:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:10:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:10:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:10:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:15:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 16:15:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 23:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:19:25 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:25:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 23:25:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 23:25:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-05-22 23:25:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-05-22 23:26:01 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-05-22 23:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:34:51 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:44:16 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 23:46:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:46:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:47:48 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 727
ERROR - 2025-05-22 23:54:14 --> 404 Page Not Found --> /index
ERROR - 2025-05-22 23:54:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:54:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:56:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:56:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 23:56:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...is&quot;) VALUES (6246953, '993', 144, '5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:56:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...is") VALUES (6246953, '993', 144, '5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6246953, '993', 144, '5', '1.00', 'Ya', 'null')
ERROR - 2025-05-22 23:57:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-05-22 23:57:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-05-22 17:21:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:21:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:21:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:21:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:22:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 17:22:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:34:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:34:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:35:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:35:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:35:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 18:35:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:18:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 21:18:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 23:12:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 23:12:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 23:29:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-05-22 23:29:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
