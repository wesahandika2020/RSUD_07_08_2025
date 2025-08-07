<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-02-01 00:01:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 00:01:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 00:05:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:14:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:30:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:40:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 00:40:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 00:41:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 00:41:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 00:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:50:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 00:54:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 00:54:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 01:04:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-31 12:00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-02-31 12:00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:04:15 --> Query error: ERROR:  date/time field value out of range: "2025-02-31 12:00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 12:00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 12:00', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '787467'
ERROR - 2025-02-01 01:04:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-31 12:00&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-02-31 12:00'...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:04:19 --> Query error: ERROR:  date/time field value out of range: "2025-02-31 12:00"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 12:00'...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 12:00', "id_dokter_dpjp" = '353', "ttd_dokter_dpjp" = '1'
WHERE "id" = '787467'
ERROR - 2025-02-01 01:07:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788084, 682492, null, 8, , , , , , 2039, null, &lt;p&gt;Sudah konsultasi dan konfirmasi ulang dr Marcell SpPD&lt;br&gt;Advi..., null, null, 1884, 2025-02-01 01:07:48, null, null, null, null, null, null, null, 0, , , , demam sejak senin pagi demam naik turun, demam disertai dengan n..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
HR: 116 kali/ menit ..., Observasi febris hari ke 5 ec viral infection , Loading RL 200 cc lanjut 20 tpm 
Paracetamol 1000mg drip IV 
C..., null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:07:48 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788084, 682492, null, 8, , , , , , 2039, null, <p>Sudah konsultasi dan konfirmasi ulang dr Marcell SpPD<br>Advi..., null, null, 1884, 2025-02-01 01:07:48, null, null, null, null, null, null, null, 0, , , , demam sejak senin pagi demam naik turun, demam disertai dengan n..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
HR: 116 kali/ menit ..., Observasi febris hari ke 5 ec viral infection , Loading RL 200 cc lanjut 20 tpm 
Paracetamol 1000mg drip IV 
C..., null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682492', NULL, '8', '', '', '', '', '', '', '', '', 'demam sejak senin pagi demam naik turun, demam disertai dengan nyeri kepala dan nyeri badan. Keluhan juga disertai dengan mual dan muntah 1x/ hari 
pasien ada gusi berdarah 1 kali hari selasa saat menggosok gigi, sebelumnya belum pernah 
BAB dan BAK normal 

RPD: pasien sudah berobat ke klinik dengan obat pulang tapi tidak ada perbaikan 
RPO tidak ada', 'Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
HR: 116 kali/ menit 
RR: 20 kali/ menit 
Suhu: 40 C
SpO2: 100 persen RA

Mata : CA -/-, SI -/- 
Leher :  pembesaran KGB (-), JVP dbn
Mulut : mukosa bibir kering + gusi berdarah (-)
Paru: vbs +/+ , rh-/- wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g (-)
Abdomen :datar, supel, BU normal , nyeri tekan epigastrium +, turgor kembali cepat
Eks : akral hangat, crt2s, edema -/- ptekie -
', 'Observasi febris hari ke 5 ec viral infection ', 'Loading RL 200 cc lanjut 20 tpm 
Paracetamol 1000mg drip IV 
Cek DR, GDS
lapor dr marcell SpPD ', '2039', NULL, '<p>Sudah konsultasi dan konfirmasi ulang dr Marcell SpPD<br>Advice </p><p><br></p>', NULL, '1884', 0, NULL, '2025-02-01 01:07:48')
ERROR - 2025-02-01 01:09:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-02-01 01:09:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:09:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 01:33:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788090, 682495, null, 8, , , , , , 2039, null, observasi, null, null, 1884, 2025-02-01 01:33:43, null, null, null, null, null, null, null, 0, , , , demam sejak hari rabu pagi, demam naik turun sepanjang hari. Kel..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,..., ISPA + riwayat hipertiroid , Paracetamol tab 500mg po , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:33:43 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788090, 682495, null, 8, , , , , , 2039, null, observasi, null, null, 1884, 2025-02-01 01:33:43, null, null, null, null, null, null, null, 0, , , , demam sejak hari rabu pagi, demam naik turun sepanjang hari. Kel..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,..., ISPA + riwayat hipertiroid , Paracetamol tab 500mg po , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682495', NULL, '8', '', '', '', '', '', '', '', '', 'demam sejak hari rabu pagi, demam naik turun sepanjang hari. Keluhan demam disertai dengan batuk berdahak, tapi tidak sesak 
Keluhan ada mual tapi tidak muntah 
Saat ini pasien lemas

RPD: hipertiroid 
RPO PTU 2x1 
Bisoprolol 1x1 tab 
Mecobalamin 1x1 tab 
', 'Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,reguler teraba lemah 
RR: 20 kali/ menit 
Suhu: 40 C
SpO2: 100 persen RA

Mata : CA -/-, SI -/- 
Leher :  pembesaran KGB (-), JVP dbn
Mulut : mukosa bibir kering + gusi berdarah (-)
Paru: vbs +/+ , rh-/- wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g (-)
Abdomen :datar, supel, BU normal , nyeri tekan epigastrium +, turgor kembali cepat
Eks : akral hangat, crt2s, edema -/- ptekie -', 'ISPA + riwayat hipertiroid ', 'Paracetamol tab 500mg po ', '2039', NULL, 'observasi', NULL, '1884', 0, NULL, '2025-02-01 01:33:43')
ERROR - 2025-02-01 01:35:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788091, 682495, null, 8, , , , , , 2039, null, observasi, null, null, 1884, 2025-02-01 01:35:14, null, null, null, null, null, null, null, 0, , , , demam sejak hari rabu pagi, demam naik turun sepanjang hari. Kel..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,..., ISPA + riwayat hipertiroid , Paracetamol tab 500mg po , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:35:14 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788091, 682495, null, 8, , , , , , 2039, null, observasi, null, null, 1884, 2025-02-01 01:35:14, null, null, null, null, null, null, null, 0, , , , demam sejak hari rabu pagi, demam naik turun sepanjang hari. Kel..., Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,..., ISPA + riwayat hipertiroid , Paracetamol tab 500mg po , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682495', NULL, '8', '', '', '', '', '', '', '', '', 'demam sejak hari rabu pagi, demam naik turun sepanjang hari. Keluhan demam disertai dengan batuk berdahak, tapi tidak sesak 
Keluhan ada mual tapi tidak muntah 
Saat ini pasien lemas

RPD: hipertiroid 
RPO PTU 2x1 
Bisoprolol 1x1 tab 
Mecobalamin 1x1 tab 
', 'Ku: Sedang
GCS 15 E4M6V5
TD: 94/69 mmHg 
N: 116 kali/ menit ,reguler teraba lemah 
RR: 20 kali/ menit 
Suhu: 40 C
SpO2: 100 persen RA

Mata : CA -/-, SI -/- 
Leher :  pembesaran KGB (-), JVP dbn
Mulut : mukosa bibir kering + gusi berdarah (-)
Paru: vbs +/+ , rh-/- wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g (-)
Abdomen :datar, supel, BU normal , nyeri tekan epigastrium +, turgor kembali cepat
Eks : akral hangat, crt2s, edema -/- ptekie -', 'ISPA + riwayat hipertiroid ', 'Paracetamol tab 500mg po ', '2039', NULL, 'observasi', NULL, '1884', 0, NULL, '2025-02-01 01:35:14')
ERROR - 2025-02-01 01:36:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:36:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 01:37:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:37:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 01:38:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:38:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 01:40:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788093, 682490, null, 8, , , , , , 2039, null, Sudah konsul dan konfirmasi ulang dr Eko SpN&amp;nbsp;&lt;br&gt;Advice, null, null, 1884, 2025-02-01 01:40:02, null, null, null, null, null, null, null, 0, , , ,  nyeri kepala sejak +- 6 jam SMRS setelah terjatuh dari motor ti..., Ku: Sedang
GCS 15 E4M6V5
TD: 107/62 mmHg 
N: 82 kali/ menit ,..., CKR pada G3P2A0 hamil 12-13 minggu+ VL a/r parietal , RL 20 tpm 
Paracetamol 1000mg drip IV 
Inj ranitidin 1 amp IV ..., null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:40:02 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788093, 682490, null, 8, , , , , , 2039, null, Sudah konsul dan konfirmasi ulang dr Eko SpN&nbsp;<br>Advice, null, null, 1884, 2025-02-01 01:40:02, null, null, null, null, null, null, null, 0, , , ,  nyeri kepala sejak +- 6 jam SMRS setelah terjatuh dari motor ti..., Ku: Sedang
GCS 15 E4M6V5
TD: 107/62 mmHg 
N: 82 kali/ menit ,..., CKR pada G3P2A0 hamil 12-13 minggu+ VL a/r parietal , RL 20 tpm 
Paracetamol 1000mg drip IV 
Inj ranitidin 1 amp IV ..., null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682490', NULL, '8', '', '', '', '', '', '', '', '', ' nyeri kepala sejak +- 6 jam SMRS setelah terjatuh dari motor tidak memakai helm. Nyeri kepala dirasakan berdenyut. Pasien dibonceng motor, motor menabrak tanggul kemudian pasien terjatuh kepala membentur tanah.
Penurunan kesadaran (-) kejang (-) muntah menyemprot (-) 
Terdapat perdarahan dari telinga kanan sejak kejadian. Keluhan saat ini disertai dengan mual  dan muntah2 
Pasien saat ini sedang hamil 3 bulan, ada muntah2 dan mual 
Saat ini tidak ada keluar flek2 darah, kontraksi atau mulas2(-)

RPD: tidak ada 
RPO tidak ada', 'Ku: Sedang
GCS 15 E4M6V5
TD: 107/62 mmHg 
N: 82 kali/ menit ,reguler teraba kuat  
RR: 20 kali/ menit 
Suhu: 36 C
SpO2: 97 persen RA

Kepala: a/r parietalis VL + sepanjang +- 3cm, perdarahan aktif (-) 
Mata : CA -/-, SI -/- RCL +/+ RCTL +/+
Telinga kanan: tampak bekas darah, tidak aktif 
Leher :  pembesaran KGB (-), JVP dbn, kaku kuduk (-)
Mulut : basah gusi berdarah (-)
Paru: vbs +/+ , rh-/- wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g (-)
Abdomen :cembung gravidarum, supel, BU normal , nyeri tekan epigastrium -, turgor kembali cepat
Eks : akral hangat, crt2s, edema -/- ptekie -
kesan lateralisasi (-) kekuatan mototik 5/5
                                                              5/5 ', 'CKR pada G3P2A0 hamil 12-13 minggu+ VL a/r parietal ', 'RL 20 tpm 
Paracetamol 1000mg drip IV 
Inj ranitidin 1 amp IV 
Inj ondansetron 4mg iV 
Cek DR, GDS', '2039', NULL, 'Sudah konsul dan konfirmasi ulang dr Eko SpN&nbsp;<br>Advice', NULL, '1884', 0, NULL, '2025-02-01 01:40:02')
ERROR - 2025-02-01 01:43:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:43:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 01:43:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 01:43:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 02:01:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 02:01:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 02:01:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 02:01:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 02:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788097, 682488, null, 8, , , , , , 2039, null, Sudah konsultasi dan konfirmasi ulang dr marcell SpPD&amp;nbsp;&lt;br&gt;A..., null, null, 1884, 2025-02-01 02:21:22, null, null, null, null, null, null, null, 0, , , , BAB cair sejak kemarin malam sehari +- &gt;10x, BAB ampas (+) lendi..., Ku: Sedang
GCS 15 E4M6V5
TD: 127/51 mmHg 
HR: 64 kali/ menit ..., GEA DRS + CHF+ elektrolit imbalance+CKD stage IV , Terapi di IGD 
Infus RL 10 tpm 
Inj ondansentron 4 mg 
New di..., null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 02:21:22 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788097, 682488, null, 8, , , , , , 2039, null, Sudah konsultasi dan konfirmasi ulang dr marcell SpPD&nbsp;<br>A..., null, null, 1884, 2025-02-01 02:21:22, null, null, null, null, null, null, null, 0, , , , BAB cair sejak kemarin malam sehari +- >10x, BAB ampas (+) lendi..., Ku: Sedang
GCS 15 E4M6V5
TD: 127/51 mmHg 
HR: 64 kali/ menit ..., GEA DRS + CHF+ elektrolit imbalance+CKD stage IV , Terapi di IGD 
Infus RL 10 tpm 
Inj ondansentron 4 mg 
New di..., null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682488', NULL, '8', '', '', '', '', '', '', '', '', 'BAB cair sejak kemarin malam sehari +- >10x, BAB ampas (+) lendir (-) sempat ada 1 kali bercampur darah sedikit
Keluhan disertai dengan mulas dan perut melilit, Mual (+) muntah (-) 
Saat ini pasien lemas dan kadang pusing 
Demam (-) BAK  normal 
Baal dan kesemutan (-) kelemahan anggota gerak (-) 
', 'Ku: Sedang
GCS 15 E4M6V5
TD: 127/51 mmHg 
HR: 64 kali/ menit 
RR: 20 kali/ menit 
Suhu: 36.5 C
SpO2: 100 persen RA

Mata : CA -/-, SI -/-
Leher :  pembesaran KGB (-), JVP dbn
Mulut : mukosa bibir kering + 
Paru: vbs +/+ , rh-/- wh -/- retraksi (-)
Jantung : S1S2 irreguler, m(-), g (-)
Abdomen :datar, supel, BU meningkat , nyeri tekan epigastrium +, turgor kembali cepat
Eks : akral hangat, crt2s, edema -/- ', 'GEA DRS + CHF+ elektrolit imbalance+CKD stage IV ', 'Terapi di IGD 
Infus RL 10 tpm 
Inj ondansentron 4 mg 
New diatab 2 tab PO
Cek DR, GDS, elektrolit, EKG ', '2039', NULL, 'Sudah konsultasi dan konfirmasi ulang dr marcell SpPD&nbsp;<br>Advcice ', NULL, '1884', 0, NULL, '2025-02-01 02:21:22')
ERROR - 2025-02-01 02:36:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 02:47:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 02:50:10 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-02-01 02:51:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 02:51:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 02:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 02:51:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:26:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:26:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:29:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:29:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:29:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:29:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:29:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:29:26 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1158070'),
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
			 
ERROR - 2025-02-01 03:29:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:29:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:38:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:38:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:38:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:38:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:38:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:38:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 03:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 03:42:20 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-02-01 03:42:21 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-02-01 03:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 04:15:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 04:15:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 04:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 04:15:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 04:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 04:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 04:24:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 04:24:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 04:26:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 04:26:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 05:11:37 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2157
ERROR - 2025-02-01 05:11:37 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2201
ERROR - 2025-02-01 05:24:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 05:24:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 05:24:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5472423, '851', 222000, '250', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 05:24:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5472423, '851', 222000, '250', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5472423, '851', 222000, '250', '1.00', 'Ya', 'null')
ERROR - 2025-02-01 05:24:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 05:24:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 05:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 05:53:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 05:53:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '682501', "waktu" = '2025-02-01 05:53:45', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = 'bayi lahir tidak menangis,keplek pk 00.20 wib setelah dipimpin selama 20menit, saat lahir terdapat lilitan 2 di leher, setelah dirangsang 1 menit bayi menangis spontan, kemerahan, tonus otot lemah, merintih & retraksi, dg riwayat antenatal ibu dengan P1A0H38mg , TP 18-02-2025 USG tidak terdapat lilitan, Riw. Obat yg di konsumsi -, riw. Abortus – 
RPD - ', "o_soap" = 'BB 3280gr 
LK 34cm 
LD 35 cm
LP 33 cm
PB 49cm
KU sedang Kes Alert, bergerak aktif, menangis kurang kuat 
TTV N 105x/m 
R 42x/m 
S 36,4C
SpO2 100�ngan NK 0,5lpm 

Kepala; UUB terbuka datar, hidung NHC (-)
Mulut; mukosa mulut basah, sianosis (-)
Thorax: retraksi ringan (+) minimal = VBS+/+ Rh -/- Wh -/-
Abdomen datar soepel BU (+) normal, turgor kulit kembali cepat 
Ekstrimitas CRT&lt; 2 dtk akral hangat ', "a_soap" = ' NCB SMK usia 1 jam dg asfiksia sedang ', "p_soap" = 'CPAP DG TPAE 7 cmH2o dg FIO2 21%', "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL
WHERE "id_layanan_pendaftaran" = '682501'
ERROR - 2025-02-01 05:54:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 05:54:03 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_anamnesa" SET "id_layanan_pendaftaran" = '682501', "waktu" = '2025-02-01 05:54:03', "keluhan_utama" = NULL, "riwayat_penyakit_keluarga" = NULL, "riwayat_penyakit_sekarang" = NULL, "anamnesa_sosial" = NULL, "riwayat_penyakit_dahulu" = NULL, "keadaan_umum" = NULL, "kesadaran" = NULL, "gcs" = NULL, "tensi_sistolik" = NULL, "tensi_diastolik" = NULL, "suhu" = NULL, "nadi" = NULL, "tinggi_badan" = NULL, "berat_badan" = NULL, "rr" = NULL, "nps" = NULL, "kepala" = NULL, "thorax" = NULL, "cor" = NULL, "genitalia" = NULL, "pemeriksaan_penunjang" = NULL, "status_mentalis" = NULL, "status_gizi" = NULL, "hidung" = NULL, "mata" = NULL, "usul_tindak_lanjut" = NULL, "leher" = NULL, "pulmo" = NULL, "abdomen" = NULL, "ekstrimitas" = NULL, "prognosis" = NULL, "lingkar_kepala" = NULL, "telinga" = NULL, "tenggorok" = NULL, "kulit_kelamin" = NULL, "pupil_dbn" = NULL, "pupil_bentuk" = NULL, "pupil_ukuran" = NULL, "pupil_reflek_cahaya" = NULL, "nervi_cranialis_dbn" = NULL, "nervi_cranialis_paresis" = NULL, "rf_kiri_atas" = NULL, "rf_kiri_bawah" = NULL, "rf_kanan_atas" = NULL, "rf_kanan_bawah" = NULL, "sensorik_dbn" = NULL, "sensorik_lain" = NULL, "pemeriksaan_khusus" = NULL, "trm_dbn" = NULL, "trm_kaku_kuduk" = NULL, "trm_laseque" = NULL, "trm_kerning" = NULL, "motorik_kiri_atas" = NULL, "motorik_kiri_bawah" = NULL, "motorik_kanan_atas" = NULL, "motorik_kanan_bawah" = NULL, "reflek_patologis" = NULL, "otonom" = NULL, "riwayat_kelahiran" = NULL, "riwayat_nutrisi" = NULL, "riwayat_imunisasi" = NULL, "riwayat_tumbuh_kembang" = NULL, "s_soap" = 'bayi lahir tidak menangis,keplek pk 00.20 wib setelah dipimpin selama 20menit, saat lahir terdapat lilitan 2 di leher, setelah dirangsang 1 menit bayi menangis spontan, kemerahan, tonus otot lemah, merintih & retraksi, dg riwayat antenatal ibu dengan P1A0H38mg , TP 18-02-2025 USG tidak terdapat lilitan, Riw. Obat yg di konsumsi -, riw. Abortus – 
RPD - ', "o_soap" = 'BB 3280gr 
LK 34cm 
LD 35 cm
LP 33 cm
PB 49cm
KU sedang Kes Alert, bergerak aktif, menangis kurang kuat 
TTV N 105x/m 
R 42x/m 
S 36,4C
SpO2 100�ngan NK 0,5lpm 

Kepala; UUB terbuka datar, hidung NHC (-)
Mulut; mukosa mulut basah, sianosis (-)
Thorax: retraksi ringan (+) minimal = VBS+/+ Rh -/- Wh -/-
Abdomen datar soepel BU (+) normal, turgor kulit kembali cepat 
Ekstrimitas CRT&lt; 2 dtk akral hangat ', "a_soap" = ' NCB SMK usia 1 jam dg asfiksia sedang ', "p_soap" = 'CPAP DG TPAE 7 cmH2o dg FIO2 21 persen', "s_sbar" = NULL, "b_sbar" = NULL, "a_sbar" = NULL, "r_sbar" = NULL
WHERE "id_layanan_pendaftaran" = '682501'
ERROR - 2025-02-01 05:54:06 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-01 05:54:06 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-01 06:07:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:13:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:13:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:14:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:14:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:22:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:22:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:22:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:22:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:22:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:23:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:23:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:24:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:24:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:27:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:28:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:29:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:36:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:38:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-30 22:21&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('681712', '2025-02-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:38:11 --> Query error: ERROR:  date/time field value out of range: "2025-02-30 22:21"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-3...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-30 22:21', '2025-02-01 06:20', 'Cendana 1', 'ICU', 'ARDS, Susp emboli paru ec DVT, AKI, gout', NULL, '672', '5', NULL, 'Sesak', '-', '1', NULL, NULL, NULL, NULL, '4', '5', '2', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82', '54', '36.5', '110', '32', '0', NULL, '0', NULL, '1', 'berat', '2', '2', '1', NULL, '1', '2025-01-30', '1', '2025-02-01', NULL, NULL, NULL, NULL, '1', '2025-01-31', NULL, NULL, '1', '10', NULL, NULL, 'RL +KETEROLAC 1 AMP 1500/24 JAM ', 'Ceftriaxone 2 gr/ 24 jam 
omeprazole 2x40 mg 
cholchicine 3x 1', '1', 'terlampir', '1', '30/1/2025', NULL, NULL, 'agd dr +
', 'R/ cek ul , bokal + ', NULL, '1', NULL, NULL, NULL, '4', '5', '2', '11', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-01 06:25', '2025-02-01 06:25', '397', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 06:38:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-30 22:21&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('681712', '2025-02-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:38:16 --> Query error: ERROR:  date/time field value out of range: "2025-02-30 22:21"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-3...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-30 22:21', '2025-02-01 06:20', 'Cendana 1', 'ICU', 'ARDS, Susp emboli paru ec DVT, AKI, gout', NULL, '672', '5', NULL, 'Sesak', '-', '1', NULL, NULL, NULL, NULL, '4', '5', '2', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82', '54', '36.5', '110', '32', '0', NULL, '0', NULL, '1', 'berat', '2', '2', '1', NULL, '1', '2025-01-30', '1', '2025-02-01', NULL, NULL, NULL, NULL, '1', '2025-01-31', NULL, NULL, '1', '10', NULL, NULL, 'RL +KETEROLAC 1 AMP 1500/24 JAM ', 'Ceftriaxone 2 gr/ 24 jam 
omeprazole 2x40 mg 
cholchicine 3x 1', '1', 'terlampir', '1', '30/1/2025', NULL, NULL, 'agd dr +
', 'R/ cek ul , bokal + ', NULL, '1', NULL, NULL, NULL, '4', '5', '2', '11', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-01 06:25', '2025-02-01 06:25', '397', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 06:39:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-30 22:21&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('681712', '2025-02-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:39:04 --> Query error: ERROR:  date/time field value out of range: "2025-02-30 22:21"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-3...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-30 22:21', '2025-02-01 06:20', 'Cendana 1', 'ICU', 'ARDS, Susp emboli paru ec DVT, AKI, gout', '-', '672', '5', NULL, 'Sesak', '-', '1', NULL, NULL, NULL, NULL, '4', '5', '2', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82', '54', '36.5', '110', '32', '0', NULL, '0', NULL, '1', 'berat', '2', '2', '1', NULL, '1', '2025-01-30', '1', '2025-02-01', NULL, NULL, NULL, NULL, '1', '2025-01-31', NULL, NULL, '1', '10', NULL, NULL, 'RL +KETEROLAC 1 AMP 1500/24 JAM ', 'Ceftriaxone 2 gr/ 24 jam 
omeprazole 2x40 mg 
cholchicine 3x 1', '1', 'terlampir', '1', '30/1/2025', NULL, NULL, 'agd dr +
', 'R/ cek ul , bokal + ', NULL, '1', NULL, NULL, NULL, '4', '5', '2', '11', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-01 06:25', NULL, '397', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 06:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:39:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-30 22:21&quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('681712', '2025-02-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:39:48 --> Query error: ERROR:  date/time field value out of range: "2025-02-30 22:21"
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-3...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('681712', '2025-02-30 22:21', '2025-02-01 06:20', 'Cendana 1', 'ICU', 'ARDS, Susp emboli paru ec DVT, AKI, gout', '-', '672', '5', NULL, 'Sesak', '-', '1', NULL, NULL, NULL, NULL, '4', '5', '2', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '82', '54', '36.5', '110', '32', '0', NULL, '0', NULL, '1', 'berat', '2', '2', '1', NULL, '1', '2025-01-30', '1', '2025-02-01', NULL, NULL, NULL, NULL, '1', '2025-01-31', NULL, NULL, '1', '10', NULL, NULL, 'RL +KETEROLAC 1 AMP 1500/24 JAM ', 'Ceftriaxone 2 gr/ 24 jam 
omeprazole 2x40 mg 
cholchicine 3x 1', '1', 'terlampir', '1', '30/1/2025', NULL, NULL, 'agd dr +
', 'R/ cek ul , bokal + ', NULL, '1', NULL, NULL, NULL, '4', '5', '2', '11', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-01 06:25', NULL, '397', NULL, '1', NULL, NULL, '1', NULL, NULL, NULL, '4', '5', '2', '11', '82', '54', '110', '32', '36.5', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-01 06:26', NULL, '397', NULL, '1', NULL)
ERROR - 2025-02-01 06:41:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:41:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010017) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:41:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010017) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010017', '00342777', '2025-02-01 06:41:41', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002050904777', NULL, '102501061124Y003790', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250201B019')
ERROR - 2025-02-01 06:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:46:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:46:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 06:48:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:52:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:54:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:55:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010055) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 06:55:06 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010055) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010055', '00117161', '2025-02-01 06:54:54', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001301656015', NULL, '0496B0000125Y002381', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Obgyn', 0, 2, NULL, '20250201A099')
ERROR - 2025-02-01 06:55:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 06:57:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:00:11 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 07:02:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:02:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:03:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:03:11 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A046%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:04:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:05:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:05:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:05:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 07:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:05:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:06:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:06:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:06:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "ab"."kode_booking" = '20250201A077'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:07:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:07:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "ab"."kode_booking" = '20250201A040'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:08:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:08:33 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K000105/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 07:08:33 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:08:33 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:10:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:10:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-02-01'
ERROR - 2025-02-01 07:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:10:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:10:30 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_ranap(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 79
ERROR - 2025-02-01 07:10:30 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 07:10:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:10:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A062%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:12:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:12:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010096) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:12:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010096) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010096', '00367454', '2025-02-01 07:12:32', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250201E004')
ERROR - 2025-02-01 07:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:12:39 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-02-01 07:15:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:15:02 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-02-01'
ERROR - 2025-02-01 07:15:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010100) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:15:22 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010100) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010100', '00367456', '2025-02-01 07:15:21', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250201B235')
ERROR - 2025-02-01 07:17:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:17:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:18:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:19:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A072%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:19:21 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-02-01'
ERROR - 2025-02-01 07:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010116) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:19:56 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010116) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010116', '00367462', '2025-02-01 07:19:55', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250201E007')
ERROR - 2025-02-01 07:20:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:20:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 07:20:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:20:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 07:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:22:12 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K008385/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 07:22:12 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:22:12 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:22:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 07:22:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 07:22:33 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 07:22:33 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 07:22:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 07:22:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 07:23:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:23:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:25:06 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000013/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 07:25:06 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:25:06 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:25:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:28:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:29:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:29:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:31:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:31:15 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006786/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 07:31:15 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:31:15 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 07:31:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:33:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:33:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:33:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A041%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 07:36:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:36:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:36:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:37:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:37:19 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:37:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:38:07 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:38:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:38:10 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-02-01 07:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:39:15 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:39:48 --> Severity: Notice  --> Undefined index: kategori /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/controllers/Sisa_stok.php 93
ERROR - 2025-02-01 07:39:48 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/controllers/Sisa_stok.php 93
ERROR - 2025-02-01 07:40:08 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:40:16 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 07:42:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 07:42:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5472598, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:42:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5472598, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5472598, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-02-01 07:42:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:42:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:42:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 07:42:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:42:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:43:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:43:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010189) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:43:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010189) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010189', '00367483', '2025-02-01 07:43:43', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001740871607', NULL, '102501090125Y002524', 'Baru', NULL, '1826', 0, 'Belum', 'Poliklinik Bedah', 0, '2', '', '20250201B247')
ERROR - 2025-02-01 07:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:45:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:46:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:48:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:48:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 07:48:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:48:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 07:49:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:50:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:50:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:50:21 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-02-01 07:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:51:34 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-02-01 07:52:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:52:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:52:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:52:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:52:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:55:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:55:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:55:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 07:55:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:55:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 07:55:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:57:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:58:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:58:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:58:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 07:58:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:58:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010222) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 07:58:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010222) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010222', '00351352', '2025-02-01 07:58:45', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250201A174')
ERROR - 2025-02-01 07:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:58:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 07:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:00:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:00:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:01:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:01:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A052%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:01:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:02:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:03:37 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004208/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:03:37 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:03:37 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:03:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:03:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 08:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:04:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:04:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:05:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 9:                 and konsul=0 and id_unit_layanan= and jenis_...
                                                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:05:25 --> Query error: ERROR:  syntax error at or near "and"
LINE 9:                 and konsul=0 and id_unit_layanan= and jenis_...
                                                          ^ - Invalid query: SELECT "tm".*, "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, case when jml.jml_terlayani<>'' then jml.jml_terlayani else '(0/0)' end jml_terlayani
FROM "sm_tenaga_medis" as "tm"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
LEFT JOIN  (select id_dokter,
                concat('(',count(status_terlayani) FILTER (where status_terlayani='Sudah'),
                '/',count(status_terlayani),')' ) jml_terlayani
                from sm_layanan_pendaftaran where to_char(tanggal_layanan, 'DD-MM-YYYY')=to_char(NOW(), 'DD-MM-YYYY')
                and konsul=0 and id_unit_layanan= and jenis_layanan='Poliklinik'
                GROUP BY id_dokter) as jml ON "jml"."id_dokter"="tm"."id"
WHERE "tm"."id_spesialisasi" IS NULL
ERROR - 2025-02-01 08:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:08:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779098, '5', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:08:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779098, '5', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779098, '5', '', '30', '', '', 'AC', '0', '', '0', 'MORN', NULL, '0', 1, '1x1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 08:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:09:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:09:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 08:09:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:09:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 08:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:10:41 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 08:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779102, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:12:33 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779102, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779102, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 08:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:14:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:14:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-31 08:02:35&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-02-31 08:02:...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:14:45 --> Query error: ERROR:  date/time field value out of range: "2025-02-31 08:02:35"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 08:02:...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-02-31 08:02:35', "id_dokter_dpjp" = '672', "ttd_dokter_dpjp" = '1'
WHERE "id" = '787246'
ERROR - 2025-02-01 08:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:15:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A090%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:15:25 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 08:15:25 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 08:15:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:15:56 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 08:15:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:15:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 08:17:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 08:18:19 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000026/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:18:19 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:18:19 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:18:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000026/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:18:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:18:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:18:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 08:20:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:20:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A095%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:20:50 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 08:20:50 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 08:21:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:22:02 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000032/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:22:02 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:22:02 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:22:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:23:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:23:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:23:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A129%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:23:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:24:38 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004807/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:24:38 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:24:38 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:24:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:25:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:26:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:26:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:26:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 08:26:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:26:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 08:26:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:26:36 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A065%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:26:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:26:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:26:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:26:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:27:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_kesulitan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 360
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_setengah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 370
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_tigaperempat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 376
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_penurunan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 382
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_perubahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 388
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_mual' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 394
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_muntah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 400
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_gangguan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 406
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_perlu' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 412
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_masalah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 418
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_diare' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 424
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_konstipati' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 430
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_pendarahan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 436
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_bersendawa' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 442
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_intoleransi' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 448
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_diet' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 454
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_ngt' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 460
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_lemah' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 472
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_dirawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 478
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_tigakg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 488
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_enamkg' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 494
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 551
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 560
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_problem' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 569
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 590
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 596
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 602
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_jenis_makanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 608
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 614
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_cara_makan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 620
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Undefined variable: gd /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-02-01 08:28:18 --> Severity: Notice  --> Trying to get property 'gd_monitoring' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/views/printing/cetak_diet_anak.php 632
ERROR - 2025-02-01 08:28:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 08:28:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 08:28:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:28:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:28:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:30:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:30:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:30:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 08:30:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:30:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 08:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:31:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:31:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:31:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:31:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:33:18 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006717/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:33:18 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:33:18 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:33:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:33:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:35:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:35:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:35:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 08:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:36:53 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000045/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:36:53 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:36:53 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:37:24 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006717/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:37:24 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:37:24 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:38:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 08:39:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:39:00 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A071%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:41:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:41:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:41:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:43:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380125V013822) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:43:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380125V013822) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380125V013822'
WHERE "id" = '627924'
ERROR - 2025-02-01 08:43:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380125V013822) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:43:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380125V013822) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380125V013822'
WHERE "id" = '627924'
ERROR - 2025-02-01 08:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:43:54 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000048/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:43:54 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:43:54 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:44:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:45:24 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:45:24 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:45:24 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:45:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:45:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A015%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:47:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:47:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:48:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:48:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:48:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A089%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:48:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:49:00 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K007843/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 08:49:00 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:49:00 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 08:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:49:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:49:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:49:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 08:49:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:49:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:49:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:49:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:49:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:49:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 08:50:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:50:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:50:17 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A008%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:50:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:50:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 08:50:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:50:43 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 08:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 08:51:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:51:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:52:22 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 08:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:52:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 08:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:52:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:53:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779177, '2', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:53:17 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779177, '2', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779177, '2', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'Salbutamol 0,4 mg + Ambroxol 4,5 mg+ cetirizine 1,5 mg+Dexamethason 0,1 mg+neoprotifed 3 mg ( 3 x 1 Pulv )', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 08:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:54:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:54:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:54:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 08:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:55:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:56:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:56:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 08:56:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:56:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:56:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 08:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:56:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:57:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:57:18 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A124%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 08:57:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:57:34 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 08:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:57:36 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 08:58:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:58:27 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 08:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:58:27 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 08:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 08:58:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 08:58:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 08:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:00:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:00:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:06 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 09:01:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:01:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 09:01:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 09:01:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 09:01:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:01:23 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A056%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:01:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:02:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:02:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:03:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:03:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:04:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:05:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:05:32 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A121%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:05:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:05:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:06:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:07:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:07:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:07:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:07:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:08:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:08:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:08:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:09:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:09:59 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:10:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 09:10:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 09:10:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:10:15 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 09:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:10:16 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 09:10:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:10:29 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 09:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:10:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 09:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:10:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 09:10:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 09:11:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:13:31 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-02-01 09:13:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-02-01 09:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:15:13 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004207/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:15:13 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:15:13 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:15:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:15:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:15:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:15:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:16:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010392) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:16:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010392) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010392', '00083657', '2025-02-01 09:16:12', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002040924126', NULL, '0223B0660125Y002832', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250201B180')
ERROR - 2025-02-01 09:16:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:17:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:17:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:18:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:18:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010402) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:18:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010402) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010402', '00083657', '2025-02-01 09:18:14', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002040924126', NULL, '0223B0660125Y002832', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Rehab Medik', 0, '2', '', '20250201B180')
ERROR - 2025-02-01 09:18:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-01 10&quot;
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:18:21 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-01 10"
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_medis_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "keluhan_utama", "riwayat_penyakit_sekarang", "riwayat_penyakit_terdahulu", "pengobatan", "riwayat_alergi", "riwayat_penyakit_keluarga", "riwayat", "kesadaran", "pf_kepala", "ket_pf_kepala", "pf_mata", "ket_pf_mata", "pf_hidung", "ket_pf_hidung", "pf_gigi_mulut", "ket_pf_gigi_mulut", "pf_tenggorokan", "ket_pf_tenggorokan", "pf_telinga", "ket_pf_telinga", "pf_leher", "ket_pf_leher", "pf_thorax", "ket_pf_thorax", "pf_jantung", "ket_pf_jantung", "pf_paru", "ket_pf_paru", "pf_abdomen", "ket_pf_abdomen", "pf_genitalia_anus", "ket_pf_genitalia_anus", "pf_ekstermitas", "ket_pf_ekstermitas", "pf_kulit", "ket_pf_kulit", "hasil_laboratorium", "hasil_radiologi", "hasil_penunjang_lain", "diagnosa_awal", "rencana_edukasi", "rencana_pemeriksaan_penunjang", "rencana_terapi", "rencana_konsultasi", "perkiraan_lama_rawat", "ditetapkan_berapa_hari", "tanggal_rencana_pulang", "alasan_belum_ditetapkan", "id_dokter_dpjp", "ttd_dokter_dpjp", "id_dokter_pengkajian", "ttd_dokter_pengkajian", "waktu_ttd_dokter_dpjp", "waktu_ttd_dokter_pengkajian", "created_date") VALUES ('682764', '2025-02-01 08:51', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba tiba setelah os BAB .', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba - tiba setelah os BAB , nyeri terus menerus , menjalar ke pinggang kanan, nyeri ulu hati (+), untuk perubahan posisi tambah sakit,  mual (+) , keluhan disertai dengan BAK menjadi nyeri dan tersendat- sendat . RPD kolelitiasis post laparoskopi kolesistektomi di RSUDKT ranap 20/125-24/1/25 RPO: levofloxacin, asam mefenamat, dan omeprazole post ranap tapi sudah habis 3 hari', 'post laparoskopi kolesistektomi di RSUDKT (ranap 20 - 24/1/25) , Hepatitis B ', 'Curcuma Sanbe 20 mg Tablet 2 x1 tab ', 'tidak ada ', '{"hasil":"0","asma":"","dm":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', 'sosial ekonomi menengah ke bawah', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":""}', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Abnormal', 'supel, bu dbn, nt epigastrium (+) minimal, NT suprapubis (+), full blast (-) Nyeri ketok CVA +/- luka post choleksistektomi , jahitan kering ', 'Normal', '', 'Normal', '', 'Normal', '', '', 'tidak ada', 'tidak ada', 'Colic Abdomen  ', 'kie dengan pasien ', 'tidak ada ', 'RL 20 tpm Paracetamol drip 1000mg IV
pronalges supp', 'tidak ada ', '', '', NULL, 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-01 10', '2025-02-01 09:16', '2025-02-01 09:18:21')
ERROR - 2025-02-01 09:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:18:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-01 10&quot;
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:18:32 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-01 10"
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_medis_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "keluhan_utama", "riwayat_penyakit_sekarang", "riwayat_penyakit_terdahulu", "pengobatan", "riwayat_alergi", "riwayat_penyakit_keluarga", "riwayat", "kesadaran", "pf_kepala", "ket_pf_kepala", "pf_mata", "ket_pf_mata", "pf_hidung", "ket_pf_hidung", "pf_gigi_mulut", "ket_pf_gigi_mulut", "pf_tenggorokan", "ket_pf_tenggorokan", "pf_telinga", "ket_pf_telinga", "pf_leher", "ket_pf_leher", "pf_thorax", "ket_pf_thorax", "pf_jantung", "ket_pf_jantung", "pf_paru", "ket_pf_paru", "pf_abdomen", "ket_pf_abdomen", "pf_genitalia_anus", "ket_pf_genitalia_anus", "pf_ekstermitas", "ket_pf_ekstermitas", "pf_kulit", "ket_pf_kulit", "hasil_laboratorium", "hasil_radiologi", "hasil_penunjang_lain", "diagnosa_awal", "rencana_edukasi", "rencana_pemeriksaan_penunjang", "rencana_terapi", "rencana_konsultasi", "perkiraan_lama_rawat", "ditetapkan_berapa_hari", "tanggal_rencana_pulang", "alasan_belum_ditetapkan", "id_dokter_dpjp", "ttd_dokter_dpjp", "id_dokter_pengkajian", "ttd_dokter_pengkajian", "waktu_ttd_dokter_dpjp", "waktu_ttd_dokter_pengkajian", "created_date") VALUES ('682764', '2025-02-01 08:51', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba tiba setelah os BAB .', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba - tiba setelah os BAB , nyeri terus menerus , menjalar ke pinggang kanan, nyeri ulu hati (+), untuk perubahan posisi tambah sakit,  mual (+) , keluhan disertai dengan BAK menjadi nyeri dan tersendat- sendat . RPD kolelitiasis post laparoskopi kolesistektomi di RSUDKT ranap 20/125-24/1/25 RPO: levofloxacin, asam mefenamat, dan omeprazole post ranap tapi sudah habis 3 hari', 'post laparoskopi kolesistektomi di RSUDKT (ranap 20 - 24/1/25) , Hepatitis B ', 'Curcuma Sanbe 20 mg Tablet 2 x1 tab ', 'tidak ada ', '{"hasil":"0","asma":"","dm":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', 'sosial ekonomi menengah ke bawah', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":""}', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Abnormal', 'supel, bu dbn, nt epigastrium (+) minimal, NT suprapubis (+), full blast (-) Nyeri ketok CVA +/- luka post choleksistektomi , jahitan kering ', 'Normal', '', 'Normal', '', 'Normal', '', '', 'tidak ada', 'tidak ada', 'Colic Abdomen  ', 'kie dengan pasien ', 'tidak ada ', 'RL 20 tpm Paracetamol drip 1000mg IV
pronalges supp', 'tidak ada ', '', '', NULL, 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-01 10', '2025-02-01 09:16', '2025-02-01 09:18:32')
ERROR - 2025-02-01 09:18:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-01 10&quot;
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:18:48 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-01 10"
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_medis_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "keluhan_utama", "riwayat_penyakit_sekarang", "riwayat_penyakit_terdahulu", "pengobatan", "riwayat_alergi", "riwayat_penyakit_keluarga", "riwayat", "kesadaran", "pf_kepala", "ket_pf_kepala", "pf_mata", "ket_pf_mata", "pf_hidung", "ket_pf_hidung", "pf_gigi_mulut", "ket_pf_gigi_mulut", "pf_tenggorokan", "ket_pf_tenggorokan", "pf_telinga", "ket_pf_telinga", "pf_leher", "ket_pf_leher", "pf_thorax", "ket_pf_thorax", "pf_jantung", "ket_pf_jantung", "pf_paru", "ket_pf_paru", "pf_abdomen", "ket_pf_abdomen", "pf_genitalia_anus", "ket_pf_genitalia_anus", "pf_ekstermitas", "ket_pf_ekstermitas", "pf_kulit", "ket_pf_kulit", "hasil_laboratorium", "hasil_radiologi", "hasil_penunjang_lain", "diagnosa_awal", "rencana_edukasi", "rencana_pemeriksaan_penunjang", "rencana_terapi", "rencana_konsultasi", "perkiraan_lama_rawat", "ditetapkan_berapa_hari", "tanggal_rencana_pulang", "alasan_belum_ditetapkan", "id_dokter_dpjp", "ttd_dokter_dpjp", "id_dokter_pengkajian", "ttd_dokter_pengkajian", "waktu_ttd_dokter_dpjp", "waktu_ttd_dokter_pengkajian", "created_date") VALUES ('682764', '2025-02-01 08:51', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba tiba setelah os BAB .', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba - tiba setelah os BAB , nyeri terus menerus , menjalar ke pinggang kanan, nyeri ulu hati (+), untuk perubahan posisi tambah sakit,  mual (+) , keluhan disertai dengan BAK menjadi nyeri dan tersendat- sendat . RPD kolelitiasis post laparoskopi kolesistektomi di RSUDKT ranap 20/125-24/1/25 RPO: levofloxacin, asam mefenamat, dan omeprazole post ranap tapi sudah habis 3 hari', 'post laparoskopi kolesistektomi di RSUDKT (ranap 20 - 24/1/25) , Hepatitis B ', 'Curcuma Sanbe 20 mg Tablet 2 x1 tab ', 'tidak ada ', '{"hasil":"0","asma":"","dm":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', 'sosial ekonomi menengah ke bawah', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":""}', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Abnormal', 'supel, bu dbn, nt epigastrium (+) minimal, NT suprapubis (+), full blast (-) Nyeri ketok CVA +/- luka post choleksistektomi , jahitan kering ', 'Normal', '', 'Normal', '', 'Normal', '', '', 'tidak ada', 'tidak ada', 'Colic Abdomen  ', 'kie dengan pasien ', 'tidak ada ', 'RL 20 tpm Paracetamol drip 1000mg IV
pronalges supp', 'tidak ada ', '', '', NULL, 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-01 10', '2025-02-01 09:16', '2025-02-01 09:18:48')
ERROR - 2025-02-01 09:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-01 10&quot;
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:19:21 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-01 10"
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_medis_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "keluhan_utama", "riwayat_penyakit_sekarang", "riwayat_penyakit_terdahulu", "pengobatan", "riwayat_alergi", "riwayat_penyakit_keluarga", "riwayat", "kesadaran", "pf_kepala", "ket_pf_kepala", "pf_mata", "ket_pf_mata", "pf_hidung", "ket_pf_hidung", "pf_gigi_mulut", "ket_pf_gigi_mulut", "pf_tenggorokan", "ket_pf_tenggorokan", "pf_telinga", "ket_pf_telinga", "pf_leher", "ket_pf_leher", "pf_thorax", "ket_pf_thorax", "pf_jantung", "ket_pf_jantung", "pf_paru", "ket_pf_paru", "pf_abdomen", "ket_pf_abdomen", "pf_genitalia_anus", "ket_pf_genitalia_anus", "pf_ekstermitas", "ket_pf_ekstermitas", "pf_kulit", "ket_pf_kulit", "hasil_laboratorium", "hasil_radiologi", "hasil_penunjang_lain", "diagnosa_awal", "rencana_edukasi", "rencana_pemeriksaan_penunjang", "rencana_terapi", "rencana_konsultasi", "perkiraan_lama_rawat", "ditetapkan_berapa_hari", "tanggal_rencana_pulang", "alasan_belum_ditetapkan", "id_dokter_dpjp", "ttd_dokter_dpjp", "id_dokter_pengkajian", "ttd_dokter_pengkajian", "waktu_ttd_dokter_dpjp", "waktu_ttd_dokter_pengkajian", "created_date") VALUES ('682764', '2025-02-01 08:51', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba tiba setelah os BAB .', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba - tiba setelah os BAB , nyeri terus menerus , menjalar ke pinggang kanan, nyeri ulu hati (+), untuk perubahan posisi tambah sakit,  mual (+) , keluhan disertai dengan BAK menjadi nyeri dan tersendat- sendat . ', 'post laparoskopi kolesistektomi di RSUDKT (ranap 20 - 24/1/25) , Hepatitis B ', 'Curcuma Sanbe 20 mg Tablet 2 x1 tab ', 'tidak ada ', '{"hasil":"0","asma":"","dm":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', 'sosial ekonomi menengah ke bawah', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":""}', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Abnormal', 'supel, bu dbn, nt epigastrium (+) minimal, NT suprapubis (+), full blast (-) Nyeri ketok CVA +/- luka post choleksistektomi , jahitan kering ', 'Normal', '', 'Normal', '', 'Normal', '', '', 'tidak ada', 'tidak ada', 'Colic Abdomen  ', 'kie dengan pasien ', 'tidak ada ', 'RL 20 tpm Paracetamol drip 1000mg IV
pronalges supp', 'tidak ada ', '', '', NULL, 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-01 10', '2025-02-01 09:16', '2025-02-01 09:19:21')
ERROR - 2025-02-01 09:19:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:19:34 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 09:19:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-01 10&quot;
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:19:55 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-01 10"
LINE 2: ..., 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_medis_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "keluhan_utama", "riwayat_penyakit_sekarang", "riwayat_penyakit_terdahulu", "pengobatan", "riwayat_alergi", "riwayat_penyakit_keluarga", "riwayat", "kesadaran", "pf_kepala", "ket_pf_kepala", "pf_mata", "ket_pf_mata", "pf_hidung", "ket_pf_hidung", "pf_gigi_mulut", "ket_pf_gigi_mulut", "pf_tenggorokan", "ket_pf_tenggorokan", "pf_telinga", "ket_pf_telinga", "pf_leher", "ket_pf_leher", "pf_thorax", "ket_pf_thorax", "pf_jantung", "ket_pf_jantung", "pf_paru", "ket_pf_paru", "pf_abdomen", "ket_pf_abdomen", "pf_genitalia_anus", "ket_pf_genitalia_anus", "pf_ekstermitas", "ket_pf_ekstermitas", "pf_kulit", "ket_pf_kulit", "hasil_laboratorium", "hasil_radiologi", "hasil_penunjang_lain", "diagnosa_awal", "rencana_edukasi", "rencana_pemeriksaan_penunjang", "rencana_terapi", "rencana_konsultasi", "perkiraan_lama_rawat", "ditetapkan_berapa_hari", "tanggal_rencana_pulang", "alasan_belum_ditetapkan", "id_dokter_dpjp", "ttd_dokter_dpjp", "id_dokter_pengkajian", "ttd_dokter_pengkajian", "waktu_ttd_dokter_dpjp", "waktu_ttd_dokter_pengkajian", "created_date") VALUES ('682764', '2025-02-01 08:51', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba tiba setelah os BAB .', 'nyeri perut kanan bawah sejak jam 15.00 sore ini tiba - tiba setelah os BAB , nyeri terus menerus , menjalar ke pinggang kanan, nyeri ulu hati (+), untuk perubahan posisi tambah sakit,  mual (+) , keluhan disertai dengan BAK menjadi nyeri dan tersendat- sendat . ', 'post laparoskopi kolesistektomi di RSUDKT (ranap 20 - 24/1/25) , Hepatitis B ', 'Curcuma Sanbe 20 mg Tablet 2 x1 tab ', 'tidak ada ', '{"hasil":"0","asma":"","dm":"","cardiovascular":"","kanker":"","thalasemia":"","lain":"","ket_lain":""}', 'sosial ekonomi menengah ke bawah', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":""}', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Normal', '', 'Abnormal', 'supel, bu dbn, nt epigastrium (+) minimal, NT suprapubis (+), full blast (-) Nyeri ketok CVA +/- luka post choleksistektomi , jahitan kering ', 'Normal', '', 'Normal', '', 'Normal', '', '', 'tidak ada', 'tidak ada', 'Colic Abdomen  ', 'kie dengan pasien ', 'tidak ada ', 'RL 20 tpm Paracetamol drip 1000mg IV
pronalges supp', 'tidak ada ', '', '', NULL, 'masih dalam perawatan ', '67', '1', '25', '1', '2025-02-01 10', '2025-02-01 09:16', '2025-02-01 09:19:55')
ERROR - 2025-02-01 09:20:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010409) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:20:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010409) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010409', '00367528', '2025-02-01 09:20:09', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1826', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250201A193')
ERROR - 2025-02-01 09:20:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:20:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A049%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:20:28 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006093/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:20:28 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:20:28 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:21:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:21:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:21:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:21:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 09:22:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:22:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 09:22:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:22:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A045%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:22:28 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16586
ERROR - 2025-02-01 09:22:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:23:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:24:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:24:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:24:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:24:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 09:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:24:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 09:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:26:58 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 09:27:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779248, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:27:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779248, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779248, '1', '', '', '', '', 'PC', '0', '', '0', '', 'kp mual dan muntah ', '0', 1, '3x1 pulvis', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 09:27:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:27:33 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 09:27:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:27:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 09:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:28:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:28:30 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 09:28:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:28:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 09:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:29:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:29:28 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000105/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:29:28 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:29:28 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:29:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:29:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 09:30:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:30:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:30:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:31:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:31:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:32:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:34:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 09:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:35:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:36:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:36:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:36:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:37:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:37:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:37:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:38:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:38:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:38:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:38:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:38:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 09:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:39:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:39:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:40:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:40:06 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682439', '2025-02-01 09:23', '8', 'nyeri perut bagian tengah dan ulu hati (+) , mual (+) muntah (-)', 'Kesadaran Composmentis, GCS 15 TD: 121/88 mmHg, HR: 98 x/menti, S: 36.2 C, RR: 20 x/mnt, Spo2: 100�domen : datar, BU (+), soepel, NT mc burney (+), rovsign sign (-), psoas test (+), obturator test (+), defans muscular (-), nyeri tekan lepas (-) ', 'Abdominal pain susp. Appendicitis akut', 'therapi sesuai DPJP', '', '', '', '', '', '', '', '', '743', '1', 'therapi sesuai DPJP', NULL, '743', 0, NULL, '2025-02-01 09:40:06')
ERROR - 2025-02-01 09:40:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:40:12 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682439', '2025-02-01 09:23', '8', 'nyeri perut bagian tengah dan ulu hati (+) , mual (+) muntah (-)', 'Kesadaran Composmentis, GCS 15 TD: 121/88 mmHg, HR: 98 x/menti, S: 36.2 C, RR: 20 x/mnt, Spo2: 100�domen : datar, BU (+), soepel, NT mc burney (+), rovsign sign (-), psoas test (+), obturator test (+), defans muscular (-), nyeri tekan lepas (-) ', 'Abdominal pain susp. Appendicitis akut', 'therapi sesuai DPJP', '', '', '', '', '', '', '', '', '743', '1', 'therapi sesuai DPJP', NULL, '743', 0, NULL, '2025-02-01 09:40:12')
ERROR - 2025-02-01 09:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:40:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:40:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A118%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:41:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:41:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:42:01 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 09:42:01 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 09:42:04 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 09:42:04 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 09:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:42:09 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 09:42:09 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 09:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:42:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:43:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 09:43:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:43:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 09:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:44:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:45:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:46:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:46:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:47:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:47:46 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-02-01 09:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:48:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:48:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:48:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:49:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:49:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 09:49:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:49:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 09:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:49:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:49:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 09:49:15 --> Severity: Notice  --> Undefined variable: dataONO /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 09:49:15 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 09:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:49:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:50:17 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000125/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:50:17 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:50:17 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:50:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:50:32 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004352/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:50:32 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:50:32 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:50:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:51:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:51:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:51:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:52:10 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 09:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250201A203) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:52:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250201A203) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250201A203', '203', 'A203', 'A', '2025-02-01', '0', '2025-02-01 09:52:14', 'Booking', 'APM', 'Prioritas', 0, '2025-02-01  08:34:30', 0, '1948', '00306134', 62, 246933, 25, 'MAT', '081286560914', '3671116004590002', '1959-04-20', 'dr. SANTI MARIA RUGUN, Sp.M', 1, 'Asuransi', 39, '60', '200', 'Ok.', '0', '0000040045263', 'JKN', NULL, '1', NULL, '102501050125Y002623', '1', '0', NULL, '25')
ERROR - 2025-02-01 09:52:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:54:12 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004872/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:54:12 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:54:12 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:54:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004872/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:54:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:54:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:55:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:56:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 09:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:57:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 09:57:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1688' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-02-01 09:58:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:59:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 09:59:53 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K007825/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 09:59:53 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 09:59:53 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 10:00:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:00:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:00:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 10:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:01:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:01:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:01:32 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1688' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-02-01 10:01:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:01:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1688' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-02-01 10:02:25 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-02-01 10:02:27 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-02-01 10:02:28 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-02-01 10:02:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:03:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:04:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:04:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A120%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 10:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:05:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:05:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:05:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:06:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-02-01&quot;
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:11 --> Query error: ERROR:  date/time field value out of range: "25-02-01"
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_medical_certificate" as "mc" ("id_pasien", "tanggal_visite", "keterangan", "tanggal_start_istirahat", "tanggal_end_istirahat", "tanggal_start_dirawat", "tanggal_end_dirawat", "tanggal_start_persalinan", "tanggal_end_persalinan", "nota_bene", "notes", "id_user", "created_date") VALUES ('00336261', '2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01', NULL, NULL, 'dx : Pneumonia TB milier', 'Perlu istirahat selama 3 hari mulai tanggal 02/02/2025 sd 04/02/2025', '787', '2025-02-01 10:06:11')
ERROR - 2025-02-01 10:06:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-02-01&quot;
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:14 --> Query error: ERROR:  date/time field value out of range: "25-02-01"
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_medical_certificate" as "mc" ("id_pasien", "tanggal_visite", "keterangan", "tanggal_start_istirahat", "tanggal_end_istirahat", "tanggal_start_dirawat", "tanggal_end_dirawat", "tanggal_start_persalinan", "tanggal_end_persalinan", "nota_bene", "notes", "id_user", "created_date") VALUES ('00336261', '2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01', NULL, NULL, 'dx : Pneumonia TB milier', 'Perlu istirahat selama 3 hari mulai tanggal 02/02/2025 sd 04/02/2025', '787', '2025-02-01 10:06:14')
ERROR - 2025-02-01 10:06:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-02-01&quot;
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:27 --> Query error: ERROR:  date/time field value out of range: "25-02-01"
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_medical_certificate" as "mc" ("id_pasien", "tanggal_visite", "keterangan", "tanggal_start_istirahat", "tanggal_end_istirahat", "tanggal_start_dirawat", "tanggal_end_dirawat", "tanggal_start_persalinan", "tanggal_end_persalinan", "nota_bene", "notes", "id_user", "created_date") VALUES ('00336261', '2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01', NULL, NULL, 'dx : Pneumonia TB milier', 'Perlu istirahat selama 3 hari mulai tanggal 02/02/2025 sd 04/02/2025', '787', '2025-02-01 10:06:27')
ERROR - 2025-02-01 10:06:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 13: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 13: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, sp.kode_bpjs, coalesce(tr.account, '') as user_sep
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "lp"."jenis_layanan" = 'Medical Check Up'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-02-01 10:06:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-02-01&quot;
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:32 --> Query error: ERROR:  date/time field value out of range: "25-02-01"
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_medical_certificate" as "mc" ("id_pasien", "tanggal_visite", "keterangan", "tanggal_start_istirahat", "tanggal_end_istirahat", "tanggal_start_dirawat", "tanggal_end_dirawat", "tanggal_start_persalinan", "tanggal_end_persalinan", "nota_bene", "notes", "id_user", "created_date") VALUES ('00336261', '2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01', NULL, NULL, 'dx : Pneumonia TB milier', 'Perlu istirahat selama 3 hari mulai tanggal 02/02/2025 sd 04/02/2025', '787', '2025-02-01 10:06:32')
ERROR - 2025-02-01 10:06:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 13: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 13: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, sp.kode_bpjs, coalesce(tr.account, '') as user_sep
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "lp"."jenis_layanan" = 'Medical Check Up'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-02-01 10:06:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 13: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 13: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, sp.kode_bpjs, coalesce(tr.account, '') as user_sep
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "lp"."jenis_layanan" = 'Medical Check Up'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-02-01 10:06:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;25-02-01&quot;
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:47 --> Query error: ERROR:  date/time field value out of range: "25-02-01"
LINE 1: ...2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01'...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: INSERT INTO "sm_medical_certificate" as "mc" ("id_pasien", "tanggal_visite", "keterangan", "tanggal_start_istirahat", "tanggal_end_istirahat", "tanggal_start_dirawat", "tanggal_end_dirawat", "tanggal_start_persalinan", "tanggal_end_persalinan", "nota_bene", "notes", "id_user", "created_date") VALUES ('00336261', '2025-01-27', 'Dirawat', NULL, NULL, '2025-01-27', '25-02-01', NULL, NULL, 'dx : Pneumonia TB milier', 'Perlu istirahat selama 3 hari mulai tanggal 02/02/2025 sd 04/02/2025', '787', '2025-02-01 10:06:47')
ERROR - 2025-02-01 10:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 13: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:06:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 13: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, sp.kode_bpjs, coalesce(tr.account, '') as user_sep
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "lp"."jenis_layanan" = 'Medical Check Up'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-02-01 10:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 13: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:07:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 13: AND "lp"."id_unit_layanan" = 'null'
                                      ^ - Invalid query: SELECT DISTINCT ON (lp.id) lp.*, pd.tanggal_daftar, pd.tanggal_keluar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.tanggal_lahir, p.telp, r.id as id_resep, coalesce(pj.nama, '') as penjamin, coalesce(sp.nama, '') as layanan, coalesce(pg.nama, '') as dokter, lp.no_antrian, sp.kode_bpjs, coalesce(tr.account, '') as user_sep
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_translucent" as "tr" ON "tr"."id" = "lp"."id_users_sep"
WHERE "pd"."tanggal_daftar" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "lp"."jenis_layanan" = 'Medical Check Up'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-02-01 10:07:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:07:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:08:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:08:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:08:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:09:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:09:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:09:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:10:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:10:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 10:10:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779325, '1', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:10:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779325, '1', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779325, '1', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'NIGHT', '3 ddue', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 10:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:10:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:11:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:12:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010500) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:12:01 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010500) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010500', '00333590', '2025-02-01 10:12:00', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001137179193', NULL, '0496B0000225Y000019', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250201B352')
ERROR - 2025-02-01 10:12:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:13:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:15:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:15:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:16:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:16:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:16:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:16:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 10:16:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:16:45 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 10:16:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:16:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:17:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:17:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:17:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:17:56 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 10:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:17:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 10:17:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:17:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:18:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:18:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:18:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:19:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:19:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:19:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:19:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2502010512) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:20:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2502010512) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2502010512', '00367553', '2025-02-01 10:20:05', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1826', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250201A209')
ERROR - 2025-02-01 10:20:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:20:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:20:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:20:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:21:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:21:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:22:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:22:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:23:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:23:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:23:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:23:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:23:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('779200', '4', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:23:33 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('779200', '4', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('779200', '4', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'null', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 10:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:23:36 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A141%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 10:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:24:02 --> Severity: Notice  --> Undefined variable: dataONO /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 1296
ERROR - 2025-02-01 10:24:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 1296
ERROR - 2025-02-01 10:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...'20250215B085', '085', 'B085', 'B', '2025-02-15', '', '2025-...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:24:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...'20250215B085', '085', 'B085', 'B', '2025-02-15', '', '2025-...
                                                             ^ - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250215B085', '085', 'B085', 'B', '2025-02-15', '', '2025-02-01 10:24:42', 'Booking', 'APM', 'Asuransi', 0, '2025-02-15  10:25:12', 0, '1701', '00120537', 92, 264299, 22, 'KON', '085741217220', '3671056507120002', '2012-07-25', 'drg. RETNO OKTASARI, Sp.KGA', 1, 'Asuransi', 5, '25', '200', 'Ok.', '0', '0001200396317', 'JKN', '270400', '0', '22', '102501040125Y003477', '3', NULL, '0223R0380225V000128', '22', 'Sudah', 200, 'Ok.')
ERROR - 2025-02-01 10:25:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:25:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:25:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:25:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:25:56 --> Severity: Notice  --> Undefined variable: dataONO /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 10:25:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 10:26:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:26:32 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 10:26:32 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 10:26:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 10:26:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 10:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:26:42 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-02-01 10:27:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 10:27:31 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-02-01 10:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:28:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:29:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:29:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:30:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:31:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:31:02 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A133%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 10:31:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:31:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:31:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:32:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:34:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:35:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:35:05 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00096638'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-02-01 10:35:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:35:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:36:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:36:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:37:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:37:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:39:16 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:40:30 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:40:58 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 10:41:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:41:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:41:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:41:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:42:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...nis&quot;) VALUES (5474519, '60', 114, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:42:00 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...nis") VALUES (5474519, '60', 114, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5474519, '60', 114, '1', '2.00', NULL, 'null')
ERROR - 2025-02-01 10:42:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:42:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:43:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:43:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:44:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:44:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:44:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:45:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:46:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:46:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:46:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:46:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5474566, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:46:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5474566, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5474566, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-01 10:46:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:46:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:46:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:46:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:47:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:47:17 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 10:47:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:47:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 10:47:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:48:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:49:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:49:21 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A143%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 10:49:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:49:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:50:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:50:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:50:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:51:13 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004957/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 10:51:13 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 10:51:13 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 10:51:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779405, '2', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:51:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779405, '2', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779405, '2', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:51:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:52:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:52:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:53:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:53:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:53:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:53:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:53:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 10:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:53:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 10:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:53:56 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 10:54:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:55:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:55:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:56:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:57:01 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 10:57:14 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 10:57:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 10:57:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:57:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:57:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:57:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:57:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:57:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('779403', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:57:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('779403', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('779403', '2', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 10:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:57:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:57:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:57:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:58:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:58:00 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000192/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 10:58:00 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 10:58:00 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 10:58:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:58:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:58:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:58:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 10:58:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 10:58:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:58:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:58:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 10:58:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 10:58:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 10:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:01:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:02:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 11:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:04:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:04:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:04:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:06:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:06:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:06:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-02-01 00:00:00' AND '2025-02-01 23:59:59'
AND "ab"."kode_booking" = '20250201A003'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-02-01 11:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:07:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 11:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:07:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:07:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:08:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:09:38 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:09:38 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:09:55 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 11:09:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:10:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:10:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:10:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:11:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:12:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:12:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:12:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:12:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:14:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:14:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:14:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 11:14:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:14:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 11:14:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:15:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:16:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:16:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:16:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:16:21 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 11:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:16:22 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 11:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:18:10 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:10 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:13 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:13 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:22 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:22 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:33 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:33 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:35 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:35 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:36 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:36 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:37 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-02-01 11:18:37 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:18:50 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:20:28 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:20:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:20:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:20:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:20:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:20:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:20:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:21:00 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:21:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:22:15 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:22:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 11:22:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 11:22:32 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 11:22:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:22:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:23:06 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:23:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:25:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:25:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:25:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 11:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:26:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:27:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:27:40 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006943/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 11:27:40 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 11:27:40 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 11:28:25 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 11:28:25 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 11:28:28 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 11:28:28 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:29:10 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:30:28 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 74
ERROR - 2025-02-01 11:30:34 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 74
ERROR - 2025-02-01 11:30:47 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 74
ERROR - 2025-02-01 11:32:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:32:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:32:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779468, '5', '2', '', '1 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:32:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (779468, '5', '2', '', '1 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779468, '5', '2', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 11:33:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:33:30 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 11:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:36:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:36:44 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:36:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:36:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:37:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:38:07 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380225K000018/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 418
ERROR - 2025-02-01 11:38:07 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 11:38:07 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 419
ERROR - 2025-02-01 11:38:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:39:46 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 11:39:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 11:40:05 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 11:40:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:41:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:42:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:42:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:42:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:42:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:44:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:44:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:44:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:44:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:45:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:45:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:45:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:45:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:46:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:46:11 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 11:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:46:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 11:46:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:46:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:48:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:48:57 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-02-01 11:48:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:48:59 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-02-01 11:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:49:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:49:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:49:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:50:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 11:50:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:51:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:51:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:51:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:51:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:52:10 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 11:52:10 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 11:52:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:52:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:52:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:52:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:53:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:54:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:54:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:54:21 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:55:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:55:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:55:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:55:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:55:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:55:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:55:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:55:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:55:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:55:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:56:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:56:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:56:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:56:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:56:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:56:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:56:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:58:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 11:58:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:58:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 11:59:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 11:59:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:00:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:00:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:00:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:00:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:00:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:00:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 12:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:01:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:02:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:02:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:02:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:08:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:10:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779493, '2', '', '14', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:10:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779493, '2', '', '14', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779493, '2', '', '14', '2 X SEHARI 1 KAPSUL', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 12:10:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:10:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:11:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:11:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:11:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:11:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:11:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:12:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:12:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:13:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:13:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:13:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:14:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:15:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:15:20 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-02-01 12:15:20 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-02-01 12:15:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:16:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:16:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:19 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:26 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:16:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:16:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:17:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:17:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5475593, '682', 159.6, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:17:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5475593, '682', 159.6, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5475593, '682', 159.6, '500', '1.00', 'Ya', 'null')
ERROR - 2025-02-01 12:17:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:17:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:17:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:17:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:17:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:17:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:17:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:18:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:18:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:18:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:18:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:19:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:19:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:20:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:20:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:20:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:21:03 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:21:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:21:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:21:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:21:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:21:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:21:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5475662, '245', 25200, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:21:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5475662, '245', 25200, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5475662, '245', 25200, '1', '1.00', NULL, 'null')
ERROR - 2025-02-01 12:22:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:22:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:22:04 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:22:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:23:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:23:30 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 05:24:41 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2866
ERROR - 2025-02-01 05:24:41 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2867
ERROR - 2025-02-01 12:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:24:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:24:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:24:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:28:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:28:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:28:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:29:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:29:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:30:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:30:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:30:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:30:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:30:52 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 12:31:12 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:31:57 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:31:58 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:32:03 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:32:03 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:32:09 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:32:09 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:32:15 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:32:15 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:32:18 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:32:18 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:32:20 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4805
ERROR - 2025-02-01 12:32:20 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4899
ERROR - 2025-02-01 12:33:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:34:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:35:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:35:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:35:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:36:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:36:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:36:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:36:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:36:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:36:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:36:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:38:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:38:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:38:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:39:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:39:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:39:30 --> Severity: Notice  --> Undefined offset: -25 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-02-01 12:39:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:39:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:39:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:39:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:39:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:40:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:41:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:41:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:41:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:41:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:44:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 12:44:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779510, '6', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:44:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (779510, '6', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779510, '6', '', '2', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 12:44:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:44:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00336592' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:44:52 --> Query error: ERROR:  function date_format(timestamp without time zone, unknown) does not exist
LINE 1: ...n='00336592' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMA...
                                                             ^
HINT:  No function matches the given name and argument types. You might need to add explicit type casts. - Invalid query: SELECT x.*, CONCAT_WS(' ', x.layanan, '-', x.dokter, '||', 'Resep Tanggal:', to_char(x.waktu_resep, 'dd/mm/YYYY HH:ii'), '||', 'Total:', (x.total)) lb_resep_pasien FROM (select p.id, p.id id_penjualan, p.id_layanan_pendaftaran, SUM(dp.qty*(dp.harga_jual-dp.disc_rp))+p.toeslag as total, r.tanggal_resep, r.waktu waktu_resep, r.id as id_resep, peg.nama as dokter, COALESCE(sps.nama, lp.jenis_layanan) as layanan from sm_penjualan p INNER JOIN sm_layanan_pendaftaran lp ON lp.id=p.id_layanan_pendaftaran LEFT JOIN sm_spesialisasi sps ON sps.id = lp.id_unit_layanan INNER JOIN sm_pendaftaran p2 ON p2.id=lp.id_pendaftaran join sm_detail_penjualan dp on (dp.id_penjualan = p.id) join sm_resep_tebus rt on (p.id_resep_tebus = rt.id) join sm_resep r on (rt.id_resep = r.id) JOIN sm_tenaga_medis tm ON tm.id = r.id_dokter JOIN sm_pegawai peg ON peg.id = tm.id_pegawai  where p.id_resep_tebus IS NOT NULL  AND p2.id_pasien='00336592' AND CONCAT_WS(' ', 'Resep Tanggal:', DATE_FORMAT(r.waktu, '%d/%m/%Y %H:%i'), '||', 'Total:', rupiah(total)) LIKE '%p%' GROUP BY p.id, r.tanggal_resep, r.waktu, r.id, peg.nama, sps.nama, lp.jenis_layanan order BY p.id DESC) x  LIMIT 20
ERROR - 2025-02-01 12:45:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 12:45:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:45:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:45:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:45:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:45:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:45:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:45:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:45:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:45:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:46:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:46:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:46:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:46:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:47:09 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 12:47:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:47:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:47:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:47:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:47:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:47:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:48:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:48:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:48:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:49:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:49:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:49:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:49:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:49:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:49:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 12:51:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:51:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:51:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:51:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:53:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:53:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 12:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:53:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:53:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:53:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:54:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:54:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:55:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 12:55:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:55:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:55:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:55:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:55:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:55:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:55:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:55:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:55:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:55:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:56:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:56:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:58:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:58:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 12:58:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:58:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:58:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:58:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 12:58:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:58:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:58:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:58:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:58:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-02-01 12:59:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10095
ERROR - 2025-02-01 12:59:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 12:59:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10095
ERROR - 2025-02-01 12:59:51 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10095
ERROR - 2025-02-01 12:59:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 12:59:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:00:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:00:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:00:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:00:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:00:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:00:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:00:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:00:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:00:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:01:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:01:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:01:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:01:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:01:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:02:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:02:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:02:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:02:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:03 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:03:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:03:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:03:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:03:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:04:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 13:04:50 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 46
ERROR - 2025-02-01 13:04:50 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 280
ERROR - 2025-02-01 13:07:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:07:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:07:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:07:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:07:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:07:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:07:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:07:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:07:36 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-01 13:07:36 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-01 13:08:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:08:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:08:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:08:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:09:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:09:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:11:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:11:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:11:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:11:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:11:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:11:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:11:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:11:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:13:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:13:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:13:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:13:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:15:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:15:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:15:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:15:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:15:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:15:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:15:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:15:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:15:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:16:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:18:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:18:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:18:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:18:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:18:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:18:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:18:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:20:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:21:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:21:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:21:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:21:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:21:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:22:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 13:22:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 13:22:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:22:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:23:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:23:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:23:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:23:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:23:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:23:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:23:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:23:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:24:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:24:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:24:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:24:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:24:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:24:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:24:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:24:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:25:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:25:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:25:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:25:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:25:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:25:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:25:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:25:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:26:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:26:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:26:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:26:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:26:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:26:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:26:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:26:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:26:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:27:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:27:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:27:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:27:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:27:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:27:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:27:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:28:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:30:17 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:31:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:31:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:31:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:31:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:31:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:31:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:31:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:33:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:33:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:33:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:33:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:33:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:33:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:33:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:34:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:34:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:34:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5476790, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:34:40 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5476790, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5476790, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-01 13:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:34:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:35:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:35:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:35:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:35:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:35:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:35:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:28 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:36:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:36:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 13:36:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:36:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:38:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:38:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:38:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:38:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:38:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:39:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:39:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:40:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:40:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:40:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:40:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:40:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:40:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 13:40:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:40:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:41:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:41:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:41:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:41:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:41:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:42:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:42:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:42:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:42:15 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 13:42:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:42:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:42:59 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 13:43:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5477026, '549', 840, '100', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:13 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5477026, '549', 840, '100', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5477026, '549', 840, '100', '10.00', 'Ya', 'null')
ERROR - 2025-02-01 13:43:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:43:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:44:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:44:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:45:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:47:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:47:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:47:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:47:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:47:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:47:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:47:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:49:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:49:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:49:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:49:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:49:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:51:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:51:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 13:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:53:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788492, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, &lt;div&gt;Observasi &lt;/div&gt;, null, null, 1263, 2025-02-01 13:53:53, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:53:53 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788492, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, <div>Observasi </div>, null, null, 1263, 2025-02-01 13:53:53, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683096', NULL, '8', 'Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, nyerikepala (-), kelemahan ag (-), demam (-). Px dengan kista bartholin dengan rencana operasi setelah perbaikan tensi. 

RPD: hipertensi (+), dm (-), asma (-), tb (-) 
RPO: tidak ada
R. Alergi: tidak ada', '
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, reguler, kuat angkat  
RR : 20 bpm 
Suhu : 36.2C 
Spo2 : 100% RA

Mata : CA-/-, SI -/-
Leher : pembesaran KGB (-), JVP normal
Mulut: mukosa kering (-), sianosis (-)
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu dbn, nt (-) 
Eks : akral hangat, crt&lt;2s, edema -/-
', 'Hipertensi Urgency
Kista Bartholin', '
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
', '', '', '', '', '', '', '', '', '1262', NULL, '<div>Observasi </div>', NULL, '1263', 0, NULL, '2025-02-01 13:53:53')
ERROR - 2025-02-01 13:53:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788493, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, &lt;div&gt;Observasi &lt;/div&gt;, null, null, 1263, 2025-02-01 13:53:56, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:53:56 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788493, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, <div>Observasi </div>, null, null, 1263, 2025-02-01 13:53:56, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683096', NULL, '8', 'Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, nyerikepala (-), kelemahan ag (-), demam (-). Px dengan kista bartholin dengan rencana operasi setelah perbaikan tensi. 

RPD: hipertensi (+), dm (-), asma (-), tb (-) 
RPO: tidak ada
R. Alergi: tidak ada', '
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, reguler, kuat angkat  
RR : 20 bpm 
Suhu : 36.2C 
Spo2 : 100% RA

Mata : CA-/-, SI -/-
Leher : pembesaran KGB (-), JVP normal
Mulut: mukosa kering (-), sianosis (-)
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu dbn, nt (-) 
Eks : akral hangat, crt&lt;2s, edema -/-
', 'Hipertensi Urgency
Kista Bartholin', '
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
', '', '', '', '', '', '', '', '', '1262', NULL, '<div>Observasi </div>', NULL, '1263', 0, NULL, '2025-02-01 13:53:56')
ERROR - 2025-02-01 13:54:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788494, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, &lt;div&gt;Observasi &lt;/div&gt;, null, null, 1263, 2025-02-01 13:54:04, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:54:04 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788494, 683096, null, 8, Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, ..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, regu..., Hipertensi Urgency
Kista Bartholin, 
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
, , 1262, null, <div>Observasi </div>, null, null, 1263, 2025-02-01 13:54:04, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683096', NULL, '8', 'Px dari poli obgyn disarankan untuk ke IGD karena tensi tinggi, nyerikepala (-), kelemahan ag (-), demam (-). Px dengan kista bartholin dengan rencana operasi setelah perbaikan tensi. 

RPD: hipertensi (+), dm (-), asma (-), tb (-) 
RPO: tidak ada
R. Alergi: tidak ada', '
Ku Sedang
GCS 15 E4M6V5 
TD: 198/104 mmHg 
HR: 61 bpm, reguler, kuat angkat  
RR : 20 bpm 
Suhu : 36.2C 
Spo2 : 100RA

Mata : CA-/-, SI -/-
Leher : pembesaran KGB (-), JVP normal
Mulut: mukosa kering (-), sianosis (-)
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu dbn, nt (-) 
Eks : akral hangat, crt&lt;2s, edema -/-
', 'Hipertensi Urgency
Kista Bartholin', '
Terapi IGD
-Captopril 25mg PO
-DR, GDS
-EKG
', '', '', '', '', '', '', '', '', '1262', NULL, '<div>Observasi </div>', NULL, '1263', 0, NULL, '2025-02-01 13:54:04')
ERROR - 2025-02-01 13:54:23 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 13:54:48 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8170
ERROR - 2025-02-01 13:55:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8170
ERROR - 2025-02-01 13:55:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:55:51 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_mutasi_obat/export.php 47
ERROR - 2025-02-01 13:56:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:56:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:56:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788497, 683089, null, 8, , , , , , 1262, null, &lt;p&gt;sudah lapore dan konfirmasi dr, Ety, Sp.M &lt;/p&gt;&lt;p&gt;advis &lt;/p&gt;..., null, null, 1262, 2025-02-01 13:56:36, null, null, null, null, null, null, null, 0, , , ,  Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mat..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, regul..., Corpus Alineum OD, Tx IGD
-Irigasi saline water, null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:56:36 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788497, 683089, null, 8, , , , , , 1262, null, <p>sudah lapore dan konfirmasi dr, Ety, Sp.M </p><p>advis </p>..., null, null, 1262, 2025-02-01 13:56:36, null, null, null, null, null, null, null, 0, , , ,  Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mat..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, regul..., Corpus Alineum OD, Tx IGD
-Irigasi saline water, null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683089', NULL, '8', '', '', '', '', '', '', '', '', ' Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mata kanan termasuk serpihan tembok ketika sedang memalu paku pada tembok. Mata merah (+), berbayang (+), berair (+) terasa menganjal (+). Px menetes insto 2x, mengaku tidak mengucak mata. ', '
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, reguler, kuat angkat  
RR : 20 bpm 
Suhu : 36.3C 
Spo2 : 100% RA

Stat Lok: OD hiperemis (+), berair (+), corpus alineum (+), VOD>2/60 bedside', 'Corpus Alineum OD', 'Tx IGD
-Irigasi saline water', '1262', NULL, '<p>sudah lapore dan konfirmasi dr, Ety, Sp.M </p><p>advis </p><p>ke poli mata </p>', NULL, '1262', 0, NULL, '2025-02-01 13:56:36')
ERROR - 2025-02-01 13:56:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (788498, 683089, null, 8, , , , , , 1262, null, &lt;p&gt;sudah lapore dan konfirmasi dr, Ety, Sp.M &lt;/p&gt;&lt;p&gt;advis &lt;/p&gt;..., null, null, 1262, 2025-02-01 13:56:39, null, null, null, null, null, null, null, 0, , , ,  Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mat..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, regul..., Corpus Alineum OD, Tx IGD
-Irigasi saline water, null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:56:39 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (788498, 683089, null, 8, , , , , , 1262, null, <p>sudah lapore dan konfirmasi dr, Ety, Sp.M </p><p>advis </p>..., null, null, 1262, 2025-02-01 13:56:39, null, null, null, null, null, null, null, 0, , , ,  Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mat..., 
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, regul..., Corpus Alineum OD, Tx IGD
-Irigasi saline water, null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683089', NULL, '8', '', '', '', '', '', '', '', '', ' Px datang dengan keluhan nyeri mata kanan sejak 3 jam smrs. Mata kanan termasuk serpihan tembok ketika sedang memalu paku pada tembok. Mata merah (+), berbayang (+), berair (+) terasa menganjal (+). Px menetes insto 2x, mengaku tidak mengucak mata. ', '
Ku Sedang
GCS 15 E4M6V5 
TD: 129/95 mmHg 
HR: 83 bpm, reguler, kuat angkat  
RR : 20 bpm 
Suhu : 36.3C 
Spo2 : 100% RA

Stat Lok: OD hiperemis (+), berair (+), corpus alineum (+), VOD>2/60 bedside', 'Corpus Alineum OD', 'Tx IGD
-Irigasi saline water', '1262', NULL, '<p>sudah lapore dan konfirmasi dr, Ety, Sp.M </p><p>advis </p><p>ke poli mata </p>', NULL, '1262', 0, NULL, '2025-02-01 13:56:39')
ERROR - 2025-02-01 13:57:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:58:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:58:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:58:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:58:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:58:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 13:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:59:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:59:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:59:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:59:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:59:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:59:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:59:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 13:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:59:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 13:59:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 13:59:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:00:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:00:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:01:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:01:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:01:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:01:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:01:55 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 14:02:00 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 14:02:04 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 14:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:02:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:03:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:03:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:03:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 14:03:29 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 14:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:09:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 14:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:09:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 14:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:09:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-02-01 14:11:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:11:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:12:13 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8170
ERROR - 2025-02-01 14:12:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:12:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:14:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:14:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:14:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:14:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:15:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:15:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:15:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 14:15:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 14:15:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:15:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:15:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:20:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 14:20:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 14:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:21:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:21:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:21:57 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:22:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:22:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:22:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:22:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:23:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:23:47 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ - Invalid query: INSERT INTO "sm_maternal_igd" ("id_layanan_pendaftaran", "pm_waktu_kajian", "pm_diperoleh", "pm_diperoleh_sebutkan", "pm_cara_masuk", "pm_keluhan_utama", "pm_kontraksi", "pm_waktu_kontraksi", "pm_lendir", "pm_waktu_lendir", "pm_ketuban", "pm_waktu_ketuban", "pm_warna_ketuban", "pm_darah", "pm_darah_sebutkan", "pm_lainnya", "pm_lainnya_sebutkan", "pm_hamil_muda", "pm_hamil_muda_muntah", "pm_hamil_muda_pendarahan", "pm_hamil_muda_lain", "pm_hamil_muda_sebutkan", "pm_hamil_tua", "pm_hamil_tua_kepala", "pm_hamil_tua_pendarahan", "pm_hamil_tua_lain", "pm_hamil_tua_sebutkan", "pm_anc_x", "pm_anc_lokasi", "pm_anc", "pm_anc_tidak_teratur", "pm_anc_imunisasi", "pm_nifas_g", "pm_nifas_p", "pm_nifas_a", "pm_nifas_hidup", "pm_waktu_partus_1", "pm_tempat_partus_1", "pm_umur_hamil_1", "pm_jenis_persalinan_1", "pm_penolong_persalinan_1", "pm_penyulit_1", "pm_nifas_1", "pm_kelamin_1", "pm_keadaan_1", "pm_waktu_partus_2", "pm_tempat_partus_2", "pm_umur_hamil_2", "pm_jenis_persalinan_2", "pm_penolong_persalinan_2", "pm_penyulit_2", "pm_nifas_2", "pm_kelamin_2", "pm_keadaan_2", "pm_waktu_partus_3", "pm_tempat_partus_3", "pm_umur_hamil_3", "pm_jenis_persalinan_3", "pm_penolong_persalinan_3", "pm_penyulit_3", "pm_nifas_3", "pm_kelamin_3", "pm_keadaan_3", "pm_waktu_partus_4", "pm_tempat_partus_4", "pm_umur_hamil_4", "pm_jenis_persalinan_4", "pm_penolong_persalinan_4", "pm_penyulit_4", "pm_nifas_4", "pm_kelamin_4", "pm_keadaan_4", "pm_waktu_partus_5", "pm_tempat_partus_5", "pm_umur_hamil_5", "pm_jenis_persalinan_5", "pm_penolong_persalinan_5", "pm_penyulit_5", "pm_nifas_5", "pm_kelamin_5", "pm_keadaan_5", "pm_waktu_partus_6", "pm_tempat_partus_6", "pm_umur_hamil_6", "pm_jenis_persalinan_6", "pm_penolong_persalinan_6", "pm_penyulit_6", "pm_nifas_6", "pm_kelamin_6", "pm_keadaan_6", "pm_umur_menarche", "pm_umur_menarche_sebutkan", "pm_lama_haid", "pm_pembalut", "pm_dismenorroe", "pm_spoting", "pm_menorrhagia", "pmm_metrorhagia", "pm_menstrual", "pm_hpht", "pm_taksiran", "pm_asma", "pm_hipertensi", "pm_jantung", "pm_diabetes", "pm_penyakit_lain", "pm_penyakit_lain_sebutkan", "pm_kesadaran", "pm_sistolik", "pm_suhu_sistolik", "pm_diastolik", "pm_cgs_e", "pm_cgs_m", "pm_cgs_v", "pm_cgs_total", "pm_spo2", "pm_frekuensi_nadi", "pm_frekuensi_nafas", "pm_membesar", "pm_melebar", "pm_pelebaran", "pm_linea_alba", "pm_linea_nigra", "pm_striae_livide", "pm_striae_albican", "pm_luka", "pm_luka_lain", "pm_luka_lain_sebutkan", "pm_tfu", "pm_leopold_1", "pm_leopold_bokong", "pm_leopold_lain", "pm_leopold_1_sebutkan", "pm_leopold_2", "pm_leopold_punggung", "pm_leopold_lainn", "pm_leopold_2_sebutkan", "pm_leopold_3", "pm_leopold_bokonggg", "pm_leopold_lainnn", "pm_leopold_3_sebutkan", "pm_leopold_4", "pm_leopold_bokongggg", "pm_janin_masuk", "pm_taksiran_janin", "pm_djj_x", "pm_djj", "pm_gerak_janin", "pm_his_x", "pm_his_detik", "pm_his_kekuatan", "pm_vulva", "pm_vulva_sebutkan", "pm_pengeluaran_lendir", "pm_pengeluaran_ketuban", "pm_pengeluaran_ketuban_warna", "pm_pengeluaran_flex", "pm_pengeluaran_darah", "pm_pengeluaran_darah_sebanyak", "pm_pengeluaran_lain", "pm_pengeluaran_lain_sebutkan", "pm_introitus", "pm_introitus_sebutkan", "pm_porsio", "pm_porsio_sebutkan", "pm_pembukaan", "pm_pembukaan_ketuban", "pm_pembukaan_ketuban_warna", "pm_hodge", "pm_uuk", "pm_moulage", "pm_nyeri_porsio", "pm_jatuh", "pm_diagnosis", "pm_kursi_roda", "pm_kursi_roda_ya", "pm_kruk", "pm_kruk_ya", "pm_pegangan", "pm_pegangan_ya", "pm_heparin", "pm_imobilisasi", "pm_imobilisasi_ya", "pm_lemah", "pm_lemah_ya", "pm_terganggu", "pm_terganggu_ya", "pm_kemampuan", "pm_kemampuan_ya", "pm_lupa", "pm_lupa_ya", "pm_jumlah_skor", "pm_skala_nyeri", "pm_kualitas_nyeri", "pm_frekuensi_nyeri", "pm_pemberat_nyeri", "pm_lama_nyeri", "pm_pengurang_nyeri", "pm_alergi", "pm_alergi_obat", "pm_alergi_obat_reaksi", "pm_alergi_makan", "pm_alergi_makan_reaksi", "pm_alergi_lain", "pm_alergi_lain_reaksi", "pm_alergi_obat_konsumsi", "pm_berat_badan", "pm_berat_badan_kg", "pm_berat_badan_sebutkan", "pm_berat_badan_t", "pm_fungsional", "pm_fungsional_sebutkan", "pm_psikologis", "pm_psikologis_sebutkan", "pm_mental", "pm_mental_sebutkan", "pm_pekerjaan", "pm_bayar", "pm_bayar_asuransi_sebutkan", "pm_bayar_sebutkan", "pm_bayar_t", "pm_keagamaan", "pm_ibadah", "pm_ibadah_sebutkan", "pm_thaharoh", "pm_sholat", "pm_banyak_makan", "pm_waktu_makan", "pm_banyak_minum", "pm_waktu_minum", "pm_banyak_bak", "pm_waktu_bak", "pm_banyak_bab", "pm_waktu_bab", "pm_sex", "sews_respirasit", "sews_saturasit", "sews_o2t", "sews_suhut", "sews_td_sintolikt", "sews_td_diastolikt", "sews_nadit", "sews_kesadarant", "sews_nyerit", "sews_pengeluwarant", "sews_proteint", "pm_meows", "sews_laju_respirasio", "sews_saturasio", "sews_suplemeno", "sews_temperaturo", "sews_tdso", "sews_laju_jantungo", "sews_kesadarano", "pm_news", "pm_tanggal_lab", "pm_hasil_lab", "pm_tanggal_cgt", "pm_hasil_cgt", "pm_penunjang_lain", "pm_infeksi", "pm_pendarahan", "pm_nausea", "pm_gawat_jalan", "pm_anxietas", "pm_nyeri_melahirkan", "pm_pola_nafas", "pm_kebutuhan_lain", "pm_kebutuhan_sebutkan", "pm_asuhan_jelaskan", "pm_asuhan_laporkan", "pm_asuhan_fasilitas", "pm_asuhan_masalah", "pm_asuhan_observasi", "pm_asuhan_edukasi", "pm_asuhan_lain", "pm_asuhan_sebutkan", "pm_waktu_bidan", "pm_waktu_dpjp", "pm_bidan", "pm_dpjp", "pm_paraf_bidan", "pm_paraf_dpjp", "created_date") VALUES ('683099', '2025-02-01 14:01', '1', NULL, '4', 'pasien rujukan dari puskesmas tanah tinggi , mulas2 sejak kemarin pagi , pusing di sangkal , keluar lendir darah (+) ', '1', '2025-01-31 11:00', '1', '09:00', '1', NULL, '-', NULL, NULL, '1', '-', '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '3', 'klinik serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'perempuan /3200', 'sehat ', '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'laki2/3100', 'sehat ', '', 'klinik', 'aterm ', 'spontan ', 'bidan', '-', '-', 'laki2/3900', 'sehat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '12', '7', '6', '1', NULL, NULL, NULL, NULL, '3-5-24', '10-2-25', NULL, NULL, NULL, NULL, '1', 'disangkal', '1', '129', '36.5', '92', '4', '6', '5', '15', '100', '90', '20', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '-', NULL, '140', '1', '3', '3', '25', '20', '1', NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, 'pembukaan 4 cm ', '0', NULL, '1', NULL, NULL, '2', '0', '15', NULL, NULL, NULL, NULL, '1', '30', '20', NULL, NULL, '1', '10', NULL, NULL, '1', '0', NULL, NULL, '75', 'sedang ', 'sedang ', '4', 'mulas2', '5 menit', 'relaksasi', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'vitamin', '1', NULL, NULL, NULL, '1', NULL, '1', NULL, '1', NULL, '5', '1', NULL, NULL, NULL, NULL, '1', NULL, '1', '1', '3', '07:30', '5', '12:00', '5', '12:00', '1', '06:00', 'seminggu yang lalu', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01/02/2025', NULL, '01/02/2025', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', NULL, NULL, '2025-02-01 14:23', '2025-02-01 14:23', '319', '579', '1', '1', '2025-02-01 14:23:47')
ERROR - 2025-02-01 14:24:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:24:14 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ - Invalid query: INSERT INTO "sm_maternal_igd" ("id_layanan_pendaftaran", "pm_waktu_kajian", "pm_diperoleh", "pm_diperoleh_sebutkan", "pm_cara_masuk", "pm_keluhan_utama", "pm_kontraksi", "pm_waktu_kontraksi", "pm_lendir", "pm_waktu_lendir", "pm_ketuban", "pm_waktu_ketuban", "pm_warna_ketuban", "pm_darah", "pm_darah_sebutkan", "pm_lainnya", "pm_lainnya_sebutkan", "pm_hamil_muda", "pm_hamil_muda_muntah", "pm_hamil_muda_pendarahan", "pm_hamil_muda_lain", "pm_hamil_muda_sebutkan", "pm_hamil_tua", "pm_hamil_tua_kepala", "pm_hamil_tua_pendarahan", "pm_hamil_tua_lain", "pm_hamil_tua_sebutkan", "pm_anc_x", "pm_anc_lokasi", "pm_anc", "pm_anc_tidak_teratur", "pm_anc_imunisasi", "pm_nifas_g", "pm_nifas_p", "pm_nifas_a", "pm_nifas_hidup", "pm_waktu_partus_1", "pm_tempat_partus_1", "pm_umur_hamil_1", "pm_jenis_persalinan_1", "pm_penolong_persalinan_1", "pm_penyulit_1", "pm_nifas_1", "pm_kelamin_1", "pm_keadaan_1", "pm_waktu_partus_2", "pm_tempat_partus_2", "pm_umur_hamil_2", "pm_jenis_persalinan_2", "pm_penolong_persalinan_2", "pm_penyulit_2", "pm_nifas_2", "pm_kelamin_2", "pm_keadaan_2", "pm_waktu_partus_3", "pm_tempat_partus_3", "pm_umur_hamil_3", "pm_jenis_persalinan_3", "pm_penolong_persalinan_3", "pm_penyulit_3", "pm_nifas_3", "pm_kelamin_3", "pm_keadaan_3", "pm_waktu_partus_4", "pm_tempat_partus_4", "pm_umur_hamil_4", "pm_jenis_persalinan_4", "pm_penolong_persalinan_4", "pm_penyulit_4", "pm_nifas_4", "pm_kelamin_4", "pm_keadaan_4", "pm_waktu_partus_5", "pm_tempat_partus_5", "pm_umur_hamil_5", "pm_jenis_persalinan_5", "pm_penolong_persalinan_5", "pm_penyulit_5", "pm_nifas_5", "pm_kelamin_5", "pm_keadaan_5", "pm_waktu_partus_6", "pm_tempat_partus_6", "pm_umur_hamil_6", "pm_jenis_persalinan_6", "pm_penolong_persalinan_6", "pm_penyulit_6", "pm_nifas_6", "pm_kelamin_6", "pm_keadaan_6", "pm_umur_menarche", "pm_umur_menarche_sebutkan", "pm_lama_haid", "pm_pembalut", "pm_dismenorroe", "pm_spoting", "pm_menorrhagia", "pmm_metrorhagia", "pm_menstrual", "pm_hpht", "pm_taksiran", "pm_asma", "pm_hipertensi", "pm_jantung", "pm_diabetes", "pm_penyakit_lain", "pm_penyakit_lain_sebutkan", "pm_kesadaran", "pm_sistolik", "pm_suhu_sistolik", "pm_diastolik", "pm_cgs_e", "pm_cgs_m", "pm_cgs_v", "pm_cgs_total", "pm_spo2", "pm_frekuensi_nadi", "pm_frekuensi_nafas", "pm_membesar", "pm_melebar", "pm_pelebaran", "pm_linea_alba", "pm_linea_nigra", "pm_striae_livide", "pm_striae_albican", "pm_luka", "pm_luka_lain", "pm_luka_lain_sebutkan", "pm_tfu", "pm_leopold_1", "pm_leopold_bokong", "pm_leopold_lain", "pm_leopold_1_sebutkan", "pm_leopold_2", "pm_leopold_punggung", "pm_leopold_lainn", "pm_leopold_2_sebutkan", "pm_leopold_3", "pm_leopold_bokonggg", "pm_leopold_lainnn", "pm_leopold_3_sebutkan", "pm_leopold_4", "pm_leopold_bokongggg", "pm_janin_masuk", "pm_taksiran_janin", "pm_djj_x", "pm_djj", "pm_gerak_janin", "pm_his_x", "pm_his_detik", "pm_his_kekuatan", "pm_vulva", "pm_vulva_sebutkan", "pm_pengeluaran_lendir", "pm_pengeluaran_ketuban", "pm_pengeluaran_ketuban_warna", "pm_pengeluaran_flex", "pm_pengeluaran_darah", "pm_pengeluaran_darah_sebanyak", "pm_pengeluaran_lain", "pm_pengeluaran_lain_sebutkan", "pm_introitus", "pm_introitus_sebutkan", "pm_porsio", "pm_porsio_sebutkan", "pm_pembukaan", "pm_pembukaan_ketuban", "pm_pembukaan_ketuban_warna", "pm_hodge", "pm_uuk", "pm_moulage", "pm_nyeri_porsio", "pm_jatuh", "pm_diagnosis", "pm_kursi_roda", "pm_kursi_roda_ya", "pm_kruk", "pm_kruk_ya", "pm_pegangan", "pm_pegangan_ya", "pm_heparin", "pm_imobilisasi", "pm_imobilisasi_ya", "pm_lemah", "pm_lemah_ya", "pm_terganggu", "pm_terganggu_ya", "pm_kemampuan", "pm_kemampuan_ya", "pm_lupa", "pm_lupa_ya", "pm_jumlah_skor", "pm_skala_nyeri", "pm_kualitas_nyeri", "pm_frekuensi_nyeri", "pm_pemberat_nyeri", "pm_lama_nyeri", "pm_pengurang_nyeri", "pm_alergi", "pm_alergi_obat", "pm_alergi_obat_reaksi", "pm_alergi_makan", "pm_alergi_makan_reaksi", "pm_alergi_lain", "pm_alergi_lain_reaksi", "pm_alergi_obat_konsumsi", "pm_berat_badan", "pm_berat_badan_kg", "pm_berat_badan_sebutkan", "pm_berat_badan_t", "pm_fungsional", "pm_fungsional_sebutkan", "pm_psikologis", "pm_psikologis_sebutkan", "pm_mental", "pm_mental_sebutkan", "pm_pekerjaan", "pm_bayar", "pm_bayar_asuransi_sebutkan", "pm_bayar_sebutkan", "pm_bayar_t", "pm_keagamaan", "pm_ibadah", "pm_ibadah_sebutkan", "pm_thaharoh", "pm_sholat", "pm_banyak_makan", "pm_waktu_makan", "pm_banyak_minum", "pm_waktu_minum", "pm_banyak_bak", "pm_waktu_bak", "pm_banyak_bab", "pm_waktu_bab", "pm_sex", "sews_respirasit", "sews_saturasit", "sews_o2t", "sews_suhut", "sews_td_sintolikt", "sews_td_diastolikt", "sews_nadit", "sews_kesadarant", "sews_nyerit", "sews_pengeluwarant", "sews_proteint", "pm_meows", "sews_laju_respirasio", "sews_saturasio", "sews_suplemeno", "sews_temperaturo", "sews_tdso", "sews_laju_jantungo", "sews_kesadarano", "pm_news", "pm_tanggal_lab", "pm_hasil_lab", "pm_tanggal_cgt", "pm_hasil_cgt", "pm_penunjang_lain", "pm_infeksi", "pm_pendarahan", "pm_nausea", "pm_gawat_jalan", "pm_anxietas", "pm_nyeri_melahirkan", "pm_pola_nafas", "pm_kebutuhan_lain", "pm_kebutuhan_sebutkan", "pm_asuhan_jelaskan", "pm_asuhan_laporkan", "pm_asuhan_fasilitas", "pm_asuhan_masalah", "pm_asuhan_observasi", "pm_asuhan_edukasi", "pm_asuhan_lain", "pm_asuhan_sebutkan", "pm_waktu_bidan", "pm_waktu_dpjp", "pm_bidan", "pm_dpjp", "pm_paraf_bidan", "pm_paraf_dpjp", "created_date") VALUES ('683099', '2025-02-01 14:01', '3', NULL, '4', 'pasien rujukan dari puskesmas tanah tinggi , mulas2 sejak kemarin pagi , pusing di sangkal , keluar lendir darah (+) ', '1', '2025-01-31 11:00', '1', '09:00', '1', NULL, '-', NULL, NULL, '1', '-', '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '3', 'klinik serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'perempuan /3200', 'sehat ', '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'laki2/3100', 'sehat ', '', 'klinik', 'aterm ', 'spontan ', 'bidan', '-', '-', 'laki2/3900', 'sehat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '12', '7', '6', '1', NULL, NULL, NULL, NULL, '3-5-24', '10-2-25', NULL, NULL, NULL, NULL, '1', 'disangkal', '1', '129', '36.5', '92', '4', '6', '5', '15', '100', '90', '20', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '-', NULL, '140', '1', '3', '3', '25', '20', '1', NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, 'pembukaan 4 cm ', '0', NULL, '1', NULL, NULL, '2', '0', '15', NULL, NULL, NULL, NULL, '1', '30', '20', NULL, NULL, '1', '10', NULL, NULL, '1', '0', NULL, NULL, '75', 'sedang ', 'sedang ', '4', 'mulas2', '5 menit', 'relaksasi', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'vitamin', '1', NULL, NULL, NULL, '1', NULL, '1', NULL, '1', NULL, '5', '1', NULL, NULL, NULL, NULL, '1', NULL, '1', '1', '3', '07:30', '5', '12:00', '5', '12:00', '1', '06:00', 'seminggu yang lalu', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01/02/2025', NULL, '01/02/2025', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', NULL, NULL, '2025-02-01 14:23', '2025-02-01 14:23', '319', '579', '1', '1', '2025-02-01 14:24:14')
ERROR - 2025-02-01 14:28:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:28:36 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...k serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klini...
                                                             ^ - Invalid query: INSERT INTO "sm_maternal_igd" ("id_layanan_pendaftaran", "pm_waktu_kajian", "pm_diperoleh", "pm_diperoleh_sebutkan", "pm_cara_masuk", "pm_keluhan_utama", "pm_kontraksi", "pm_waktu_kontraksi", "pm_lendir", "pm_waktu_lendir", "pm_ketuban", "pm_waktu_ketuban", "pm_warna_ketuban", "pm_darah", "pm_darah_sebutkan", "pm_lainnya", "pm_lainnya_sebutkan", "pm_hamil_muda", "pm_hamil_muda_muntah", "pm_hamil_muda_pendarahan", "pm_hamil_muda_lain", "pm_hamil_muda_sebutkan", "pm_hamil_tua", "pm_hamil_tua_kepala", "pm_hamil_tua_pendarahan", "pm_hamil_tua_lain", "pm_hamil_tua_sebutkan", "pm_anc_x", "pm_anc_lokasi", "pm_anc", "pm_anc_tidak_teratur", "pm_anc_imunisasi", "pm_nifas_g", "pm_nifas_p", "pm_nifas_a", "pm_nifas_hidup", "pm_waktu_partus_1", "pm_tempat_partus_1", "pm_umur_hamil_1", "pm_jenis_persalinan_1", "pm_penolong_persalinan_1", "pm_penyulit_1", "pm_nifas_1", "pm_kelamin_1", "pm_keadaan_1", "pm_waktu_partus_2", "pm_tempat_partus_2", "pm_umur_hamil_2", "pm_jenis_persalinan_2", "pm_penolong_persalinan_2", "pm_penyulit_2", "pm_nifas_2", "pm_kelamin_2", "pm_keadaan_2", "pm_waktu_partus_3", "pm_tempat_partus_3", "pm_umur_hamil_3", "pm_jenis_persalinan_3", "pm_penolong_persalinan_3", "pm_penyulit_3", "pm_nifas_3", "pm_kelamin_3", "pm_keadaan_3", "pm_waktu_partus_4", "pm_tempat_partus_4", "pm_umur_hamil_4", "pm_jenis_persalinan_4", "pm_penolong_persalinan_4", "pm_penyulit_4", "pm_nifas_4", "pm_kelamin_4", "pm_keadaan_4", "pm_waktu_partus_5", "pm_tempat_partus_5", "pm_umur_hamil_5", "pm_jenis_persalinan_5", "pm_penolong_persalinan_5", "pm_penyulit_5", "pm_nifas_5", "pm_kelamin_5", "pm_keadaan_5", "pm_waktu_partus_6", "pm_tempat_partus_6", "pm_umur_hamil_6", "pm_jenis_persalinan_6", "pm_penolong_persalinan_6", "pm_penyulit_6", "pm_nifas_6", "pm_kelamin_6", "pm_keadaan_6", "pm_umur_menarche", "pm_umur_menarche_sebutkan", "pm_lama_haid", "pm_pembalut", "pm_dismenorroe", "pm_spoting", "pm_menorrhagia", "pmm_metrorhagia", "pm_menstrual", "pm_hpht", "pm_taksiran", "pm_asma", "pm_hipertensi", "pm_jantung", "pm_diabetes", "pm_penyakit_lain", "pm_penyakit_lain_sebutkan", "pm_kesadaran", "pm_sistolik", "pm_suhu_sistolik", "pm_diastolik", "pm_cgs_e", "pm_cgs_m", "pm_cgs_v", "pm_cgs_total", "pm_spo2", "pm_frekuensi_nadi", "pm_frekuensi_nafas", "pm_membesar", "pm_melebar", "pm_pelebaran", "pm_linea_alba", "pm_linea_nigra", "pm_striae_livide", "pm_striae_albican", "pm_luka", "pm_luka_lain", "pm_luka_lain_sebutkan", "pm_tfu", "pm_leopold_1", "pm_leopold_bokong", "pm_leopold_lain", "pm_leopold_1_sebutkan", "pm_leopold_2", "pm_leopold_punggung", "pm_leopold_lainn", "pm_leopold_2_sebutkan", "pm_leopold_3", "pm_leopold_bokonggg", "pm_leopold_lainnn", "pm_leopold_3_sebutkan", "pm_leopold_4", "pm_leopold_bokongggg", "pm_janin_masuk", "pm_taksiran_janin", "pm_djj_x", "pm_djj", "pm_gerak_janin", "pm_his_x", "pm_his_detik", "pm_his_kekuatan", "pm_vulva", "pm_vulva_sebutkan", "pm_pengeluaran_lendir", "pm_pengeluaran_ketuban", "pm_pengeluaran_ketuban_warna", "pm_pengeluaran_flex", "pm_pengeluaran_darah", "pm_pengeluaran_darah_sebanyak", "pm_pengeluaran_lain", "pm_pengeluaran_lain_sebutkan", "pm_introitus", "pm_introitus_sebutkan", "pm_porsio", "pm_porsio_sebutkan", "pm_pembukaan", "pm_pembukaan_ketuban", "pm_pembukaan_ketuban_warna", "pm_hodge", "pm_uuk", "pm_moulage", "pm_nyeri_porsio", "pm_jatuh", "pm_diagnosis", "pm_kursi_roda", "pm_kursi_roda_ya", "pm_kruk", "pm_kruk_ya", "pm_pegangan", "pm_pegangan_ya", "pm_heparin", "pm_imobilisasi", "pm_imobilisasi_ya", "pm_lemah", "pm_lemah_ya", "pm_terganggu", "pm_terganggu_ya", "pm_kemampuan", "pm_kemampuan_ya", "pm_lupa", "pm_lupa_ya", "pm_jumlah_skor", "pm_skala_nyeri", "pm_kualitas_nyeri", "pm_frekuensi_nyeri", "pm_pemberat_nyeri", "pm_lama_nyeri", "pm_pengurang_nyeri", "pm_alergi", "pm_alergi_obat", "pm_alergi_obat_reaksi", "pm_alergi_makan", "pm_alergi_makan_reaksi", "pm_alergi_lain", "pm_alergi_lain_reaksi", "pm_alergi_obat_konsumsi", "pm_berat_badan", "pm_berat_badan_kg", "pm_berat_badan_sebutkan", "pm_berat_badan_t", "pm_fungsional", "pm_fungsional_sebutkan", "pm_psikologis", "pm_psikologis_sebutkan", "pm_mental", "pm_mental_sebutkan", "pm_pekerjaan", "pm_bayar", "pm_bayar_asuransi_sebutkan", "pm_bayar_sebutkan", "pm_bayar_t", "pm_keagamaan", "pm_ibadah", "pm_ibadah_sebutkan", "pm_thaharoh", "pm_sholat", "pm_banyak_makan", "pm_waktu_makan", "pm_banyak_minum", "pm_waktu_minum", "pm_banyak_bak", "pm_waktu_bak", "pm_banyak_bab", "pm_waktu_bab", "pm_sex", "sews_respirasit", "sews_saturasit", "sews_o2t", "sews_suhut", "sews_td_sintolikt", "sews_td_diastolikt", "sews_nadit", "sews_kesadarant", "sews_nyerit", "sews_pengeluwarant", "sews_proteint", "pm_meows", "sews_laju_respirasio", "sews_saturasio", "sews_suplemeno", "sews_temperaturo", "sews_tdso", "sews_laju_jantungo", "sews_kesadarano", "pm_news", "pm_tanggal_lab", "pm_hasil_lab", "pm_tanggal_cgt", "pm_hasil_cgt", "pm_penunjang_lain", "pm_infeksi", "pm_pendarahan", "pm_nausea", "pm_gawat_jalan", "pm_anxietas", "pm_nyeri_melahirkan", "pm_pola_nafas", "pm_kebutuhan_lain", "pm_kebutuhan_sebutkan", "pm_asuhan_jelaskan", "pm_asuhan_laporkan", "pm_asuhan_fasilitas", "pm_asuhan_masalah", "pm_asuhan_observasi", "pm_asuhan_edukasi", "pm_asuhan_lain", "pm_asuhan_sebutkan", "pm_waktu_bidan", "pm_waktu_dpjp", "pm_bidan", "pm_dpjp", "pm_paraf_bidan", "pm_paraf_dpjp", "created_date") VALUES ('683099', '2025-02-01 14:01', '3', NULL, '4', 'pasien rujukan dari puskesmas tanah tinggi , mulas2 sejak kemarin pagi , pusing di sangkal , keluar lendir darah (+) ', '1', '2025-01-31 11:00', '1', '09:00', '1', NULL, '-', NULL, NULL, '1', '-', '1', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '3', 'klinik serang ', NULL, '1', NULL, '4', '3', '0', NULL, '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'perempuan /3200', 'sehat ', '', 'klinik', 'aterm', 'spontan ', 'bidan ', '-', '-', 'laki2/3100', 'sehat ', '', 'klinik', 'aterm ', 'spontan ', 'bidan', '-', '-', 'laki2/3900', 'sehat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '12', '7', '6', '1', NULL, NULL, NULL, NULL, '3-5-24', '10-2-25', NULL, NULL, NULL, NULL, '1', 'disangkal', '1', '129', '36.5', '92', '4', '6', '5', '15', '100', '90', '20', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '-', NULL, '140', '1', '3', '3', '25', '20', '1', NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', NULL, 'pembukaan 4 cm ', '0', NULL, '1', NULL, NULL, '2', '0', '15', NULL, NULL, NULL, NULL, '1', '30', '20', NULL, NULL, '1', '10', NULL, NULL, '1', '0', NULL, NULL, '75', 'sedang ', 'sedang ', '4', 'mulas2', '5 menit', 'relaksasi', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'vitamin', '1', NULL, NULL, NULL, '1', NULL, '1', NULL, '1', NULL, '5', '1', NULL, NULL, NULL, NULL, '1', NULL, '1', '1', '3', '07:30', '5', '12:00', '5', '12:00', '1', '06:00', 'seminggu yang lalu', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01/02/2025', NULL, '01/02/2025', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', NULL, NULL, '2025-02-01 14:23', '2025-02-01 14:23', '319', '579', '1', '1', '2025-02-01 14:28:36')
ERROR - 2025-02-01 14:29:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:29:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:29:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:29:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:29:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:29:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:29:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:29:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:29:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:29:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:30:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:30:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:31:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:31:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:32:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:32:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:32:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:32:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:32:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:33:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:33:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:33:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:33:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:34:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:34:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:35:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 14:37:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 14:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:38:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:39:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8170
ERROR - 2025-02-01 14:39:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:39:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:40:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:40:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:41:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:41:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:41:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:42:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:42:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:42:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:42:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:43:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 14:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:47:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...', &quot;pm_nifas_hidup&quot; = NULL, &quot;pm_waktu_partus_1&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:47:10 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683099', "pm_waktu_kajian" = '2025-02-01 14:38', "pm_diperoleh" = '2', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'pasien rujukan dari pkm tanah tinggi dengan g4p3a0 hamil 39 minggu inpartu kala 1 fase aktif memanjang ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-01-31 09:00', "pm_lendir" = '1', "pm_waktu_lendir" = '09:00', "pm_ketuban" = '1', "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = '-', "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '3', "pm_anc_lokasi" = 'klinik serang ', "pm_anc" = NULL, "pm_anc_tidak_teratur" = '1', "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '4', "pm_nifas_p" = '3', "pm_nifas_a" = '0', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_tempat_partus_1" = 'klinik', "pm_umur_hamil_1" = 'aterm', "pm_jenis_persalinan_1" = 'spontan', "pm_penolong_persalinan_1" = 'bidan', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = 'perempuan /3200', "pm_keadaan_1" = 'sehat', "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = 'klinik', "pm_umur_hamil_2" = 'aterm', "pm_jenis_persalinan_2" = 'spontan', "pm_penolong_persalinan_2" = 'bidan', "pm_penyulit_2" = '-', "pm_nifas_2" = '-', "pm_kelamin_2" = 'laki2/3100', "pm_keadaan_2" = 'sehat', "pm_waktu_partus_3" = '', "pm_tempat_partus_3" = 'klinik', "pm_umur_hamil_3" = 'aterm ', "pm_jenis_persalinan_3" = 'spontan', "pm_penolong_persalinan_3" = 'bidan', "pm_penyulit_3" = '-', "pm_nifas_3" = '-', "pm_kelamin_3" = 'laki2/3900', "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_tempat_partus_4" = 'hamil ini', "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '12', "pm_lama_haid" = NULL, "pm_pembalut" = NULL, "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '3-5-24', "pm_taksiran" = '10-2-25', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = '1', "pm_penyakit_lain_sebutkan" = 'disangkal', "pm_kesadaran" = '1', "pm_sistolik" = '130', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '90', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = NULL, "pm_frekuensi_nadi" = '90', "pm_frekuensi_nafas" = '20', "pm_membesar" = '1', "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '29', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = '1', "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = '1', "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = NULL, "pm_leopold_bokongggg" = '1', "pm_janin_masuk" = NULL, "pm_taksiran_janin" = NULL, "pm_djj_x" = '140', "pm_djj" = NULL, "pm_gerak_janin" = '3', "pm_his_x" = '3', "pm_his_detik" = '10', "pm_his_kekuatan" = '10', "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = '1', "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = '1', "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = '1', "pm_introitus_sebutkan" = NULL, "pm_porsio" = NULL, "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = 'vt pembukaan 4 cm', "pm_pembukaan_ketuban" = '0', "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = NULL, "pm_uuk" = NULL, "pm_moulage" = NULL, "pm_nyeri_porsio" = '2', "pm_jatuh" = '25', "pm_diagnosis" = '15', "pm_kursi_roda" = '1', "pm_kursi_roda_ya" = '0', "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = NULL, "pm_pegangan_ya" = NULL, "pm_heparin" = '20', "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '70', "pm_skala_nyeri" = 'sedang', "pm_kualitas_nyeri" = 'sedang', "pm_frekuensi_nyeri" = '5', "pm_pemberat_nyeri" = 'mulas', "pm_lama_nyeri" = '5 menit', "pm_pengurang_nyeri" = 'relaksasi', "pm_alergi" = '1', "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '2', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '5', "pm_bayar" = '1', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = NULL, "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = NULL, "pm_banyak_minum" = '5', "pm_waktu_minum" = NULL, "pm_banyak_bak" = '5', "pm_waktu_bak" = NULL, "pm_banyak_bab" = '1', "pm_waktu_bab" = NULL, "pm_sex" = 'seminggu yang lalu', "sews_respirasit" = '0_2', "sews_saturasit" = '0_3', "sews_o2t" = '0_2', "sews_suhut" = '0_2', "sews_td_sintolikt" = '0_2', "sews_td_diastolikt" = '0_1', "sews_nadit" = '0_3', "sews_kesadarant" = '0_1', "sews_nyerit" = '0_1', "sews_pengeluwarant" = '0_1', "sews_proteint" = NULL, "pm_meows" = 'Putih', "sews_laju_respirasio" = NULL, "sews_saturasio" = NULL, "sews_suplemeno" = NULL, "sews_temperaturo" = NULL, "sews_tdso" = NULL, "sews_laju_jantungo" = NULL, "sews_kesadarano" = NULL, "pm_news" = NULL, "pm_tanggal_lab" = NULL, "pm_hasil_lab" = NULL, "pm_tanggal_cgt" = NULL, "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = '1', "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = NULL, "pm_nyeri_melahirkan" = '1', "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = '1', "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = NULL, "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-02-01 14:46', "pm_waktu_dpjp" = '2025-02-01 14:47', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 14:47:10'
WHERE "id" = '8288'
ERROR - 2025-02-01 14:47:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:47:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:47:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...', &quot;pm_nifas_hidup&quot; = NULL, &quot;pm_waktu_partus_1&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:47:20 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683099', "pm_waktu_kajian" = '2025-02-01 14:38', "pm_diperoleh" = '2', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'pasien rujukan dari pkm tanah tinggi dengan g4p3a0 hamil 39 minggu inpartu kala 1 fase aktif memanjang ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-01-31 09:00', "pm_lendir" = '1', "pm_waktu_lendir" = '09:00', "pm_ketuban" = '1', "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = '-', "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '3', "pm_anc_lokasi" = 'klinik serang ', "pm_anc" = NULL, "pm_anc_tidak_teratur" = '1', "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '4', "pm_nifas_p" = '3', "pm_nifas_a" = '0', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_tempat_partus_1" = 'klinik', "pm_umur_hamil_1" = 'aterm', "pm_jenis_persalinan_1" = 'spontan', "pm_penolong_persalinan_1" = 'bidan', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = 'perempuan /3200', "pm_keadaan_1" = 'sehat', "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = 'klinik', "pm_umur_hamil_2" = 'aterm', "pm_jenis_persalinan_2" = 'spontan', "pm_penolong_persalinan_2" = 'bidan', "pm_penyulit_2" = '-', "pm_nifas_2" = '-', "pm_kelamin_2" = 'laki2/3100', "pm_keadaan_2" = 'sehat', "pm_waktu_partus_3" = '', "pm_tempat_partus_3" = 'klinik', "pm_umur_hamil_3" = 'aterm ', "pm_jenis_persalinan_3" = 'spontan', "pm_penolong_persalinan_3" = 'bidan', "pm_penyulit_3" = '-', "pm_nifas_3" = '-', "pm_kelamin_3" = 'laki2/3900', "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_tempat_partus_4" = 'hamil ini', "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '12', "pm_lama_haid" = NULL, "pm_pembalut" = NULL, "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '3-5-24', "pm_taksiran" = '10-2-25', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = '1', "pm_penyakit_lain_sebutkan" = 'disangkal', "pm_kesadaran" = '1', "pm_sistolik" = '130', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '90', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = NULL, "pm_frekuensi_nadi" = '90', "pm_frekuensi_nafas" = '20', "pm_membesar" = '1', "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '29', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = '1', "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = '1', "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = NULL, "pm_leopold_bokongggg" = '1', "pm_janin_masuk" = NULL, "pm_taksiran_janin" = NULL, "pm_djj_x" = '140', "pm_djj" = NULL, "pm_gerak_janin" = '3', "pm_his_x" = '3', "pm_his_detik" = '10', "pm_his_kekuatan" = '10', "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = '1', "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = '1', "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = '1', "pm_introitus_sebutkan" = NULL, "pm_porsio" = NULL, "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = 'vt pembukaan 4 cm', "pm_pembukaan_ketuban" = '0', "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = NULL, "pm_uuk" = NULL, "pm_moulage" = NULL, "pm_nyeri_porsio" = '2', "pm_jatuh" = '25', "pm_diagnosis" = '15', "pm_kursi_roda" = '1', "pm_kursi_roda_ya" = '0', "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = NULL, "pm_pegangan_ya" = NULL, "pm_heparin" = '20', "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '70', "pm_skala_nyeri" = 'sedang', "pm_kualitas_nyeri" = 'sedang', "pm_frekuensi_nyeri" = '5', "pm_pemberat_nyeri" = 'mulas', "pm_lama_nyeri" = '5 menit', "pm_pengurang_nyeri" = 'relaksasi', "pm_alergi" = '1', "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '2', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '5', "pm_bayar" = '1', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = NULL, "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = NULL, "pm_banyak_minum" = '5', "pm_waktu_minum" = NULL, "pm_banyak_bak" = '5', "pm_waktu_bak" = NULL, "pm_banyak_bab" = '1', "pm_waktu_bab" = NULL, "pm_sex" = 'seminggu yang lalu', "sews_respirasit" = '0_2', "sews_saturasit" = '0_3', "sews_o2t" = '0_2', "sews_suhut" = '0_2', "sews_td_sintolikt" = '0_2', "sews_td_diastolikt" = '0_1', "sews_nadit" = '0_3', "sews_kesadarant" = '0_1', "sews_nyerit" = '0_1', "sews_pengeluwarant" = '0_1', "sews_proteint" = NULL, "pm_meows" = 'Putih', "sews_laju_respirasio" = NULL, "sews_saturasio" = NULL, "sews_suplemeno" = NULL, "sews_temperaturo" = NULL, "sews_tdso" = NULL, "sews_laju_jantungo" = NULL, "sews_kesadarano" = NULL, "pm_news" = NULL, "pm_tanggal_lab" = NULL, "pm_hasil_lab" = NULL, "pm_tanggal_cgt" = NULL, "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = '1', "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = NULL, "pm_nyeri_melahirkan" = '1', "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = '1', "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = NULL, "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-02-01 14:46', "pm_waktu_dpjp" = '2025-02-01 14:47', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 14:47:20'
WHERE "id" = '8288'
ERROR - 2025-02-01 14:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:49:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:49:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:49:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:49:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 14:50:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 14:50:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 14:51:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...', &quot;pm_nifas_hidup&quot; = NULL, &quot;pm_waktu_partus_1&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:51:20 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683099', "pm_waktu_kajian" = '2025-02-01 14:38', "pm_diperoleh" = '3', "pm_diperoleh_sebutkan" = 'tidak ada', "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'pasien rujukan dari pkm tanah tinggi dengan g4p3a0 hamil 39 minggu inpartu kala 1 fase aktif memanjang ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-01-31 09:00', "pm_lendir" = '1', "pm_waktu_lendir" = '09:00', "pm_ketuban" = '1', "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = '-', "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '3', "pm_anc_lokasi" = 'klinik serang ', "pm_anc" = NULL, "pm_anc_tidak_teratur" = '1', "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '4', "pm_nifas_p" = '3', "pm_nifas_a" = '0', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_tempat_partus_1" = 'klinik', "pm_umur_hamil_1" = 'aterm', "pm_jenis_persalinan_1" = 'spontan', "pm_penolong_persalinan_1" = 'bidan', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = 'perempuan /3200', "pm_keadaan_1" = 'sehat', "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = 'klinik', "pm_umur_hamil_2" = 'aterm', "pm_jenis_persalinan_2" = 'spontan', "pm_penolong_persalinan_2" = 'bidan', "pm_penyulit_2" = '-', "pm_nifas_2" = '-', "pm_kelamin_2" = 'laki2/3100', "pm_keadaan_2" = 'sehat', "pm_waktu_partus_3" = '', "pm_tempat_partus_3" = 'klinik', "pm_umur_hamil_3" = 'aterm ', "pm_jenis_persalinan_3" = 'spontan', "pm_penolong_persalinan_3" = 'bidan', "pm_penyulit_3" = '-', "pm_nifas_3" = '-', "pm_kelamin_3" = 'laki2/3900', "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_tempat_partus_4" = 'hamil ini', "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '12', "pm_lama_haid" = NULL, "pm_pembalut" = NULL, "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '3-5-24', "pm_taksiran" = '10-2-25', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = '1', "pm_penyakit_lain_sebutkan" = 'disangkal', "pm_kesadaran" = '1', "pm_sistolik" = '130', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '90', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = NULL, "pm_frekuensi_nadi" = '90', "pm_frekuensi_nafas" = '20', "pm_membesar" = '1', "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '29', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = '1', "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = '1', "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = NULL, "pm_leopold_bokongggg" = '1', "pm_janin_masuk" = NULL, "pm_taksiran_janin" = NULL, "pm_djj_x" = '140', "pm_djj" = NULL, "pm_gerak_janin" = '3', "pm_his_x" = '3', "pm_his_detik" = '10', "pm_his_kekuatan" = '10', "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = '1', "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = '1', "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = '1', "pm_introitus_sebutkan" = NULL, "pm_porsio" = NULL, "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = 'vt pembukaan 4 cm', "pm_pembukaan_ketuban" = '0', "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = NULL, "pm_uuk" = NULL, "pm_moulage" = NULL, "pm_nyeri_porsio" = '2', "pm_jatuh" = '25', "pm_diagnosis" = '15', "pm_kursi_roda" = '1', "pm_kursi_roda_ya" = '0', "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = NULL, "pm_pegangan_ya" = NULL, "pm_heparin" = '20', "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '70', "pm_skala_nyeri" = 'sedang', "pm_kualitas_nyeri" = 'sedang', "pm_frekuensi_nyeri" = '5', "pm_pemberat_nyeri" = 'mulas', "pm_lama_nyeri" = '5 menit', "pm_pengurang_nyeri" = 'relaksasi', "pm_alergi" = '1', "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '2', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '5', "pm_bayar" = '1', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = NULL, "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = NULL, "pm_banyak_minum" = '5', "pm_waktu_minum" = NULL, "pm_banyak_bak" = '5', "pm_waktu_bak" = NULL, "pm_banyak_bab" = '1', "pm_waktu_bab" = NULL, "pm_sex" = 'seminggu yang lalu', "sews_respirasit" = '0_2', "sews_saturasit" = '0_3', "sews_o2t" = '0_2', "sews_suhut" = '0_2', "sews_td_sintolikt" = '0_2', "sews_td_diastolikt" = '0_1', "sews_nadit" = '0_3', "sews_kesadarant" = '0_1', "sews_nyerit" = '0_1', "sews_pengeluwarant" = '0_1', "sews_proteint" = NULL, "pm_meows" = 'Putih', "sews_laju_respirasio" = NULL, "sews_saturasio" = NULL, "sews_suplemeno" = NULL, "sews_temperaturo" = NULL, "sews_tdso" = NULL, "sews_laju_jantungo" = NULL, "sews_kesadarano" = NULL, "pm_news" = NULL, "pm_tanggal_lab" = NULL, "pm_hasil_lab" = NULL, "pm_tanggal_cgt" = NULL, "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = '1', "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = NULL, "pm_nyeri_melahirkan" = '1', "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = '1', "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = '1', "pm_asuhan_sebutkan" = 'tidak ada', "pm_waktu_bidan" = '2025-02-01 14:46', "pm_waktu_dpjp" = '2025-02-01 14:47', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 14:51:20'
WHERE "id" = '8288'
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 14:52:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 14:53:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 14:53:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 14:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:55:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 14:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 14:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:00:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:03:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 15:03:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:03:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:03:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:03:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:03:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...', &quot;pm_nifas_hidup&quot; = NULL, &quot;pm_waktu_partus_1&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:03:59 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683099', "pm_waktu_kajian" = '2025-02-01 14:55', "pm_diperoleh" = '2', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'pasien mulas2 sejak jam 09.00. rujukan dari pkm tanah tinggi', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-02-01 09:00', "pm_lendir" = '1', "pm_waktu_lendir" = '09:00', "pm_ketuban" = NULL, "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = NULL, "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '3', "pm_anc_lokasi" = 'klinik serang', "pm_anc" = NULL, "pm_anc_tidak_teratur" = NULL, "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '4', "pm_nifas_p" = '3', "pm_nifas_a" = '0', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_tempat_partus_1" = 'klinik', "pm_umur_hamil_1" = 'aterm', "pm_jenis_persalinan_1" = 'spontan', "pm_penolong_persalinan_1" = 'bidan', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = 'perempuam,/3200', "pm_keadaan_1" = 'sehat', "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = 'klinik', "pm_umur_hamil_2" = 'aterm', "pm_jenis_persalinan_2" = 'spontan', "pm_penolong_persalinan_2" = 'bidan', "pm_penyulit_2" = '-', "pm_nifas_2" = '-', "pm_kelamin_2" = 'laki2/3100', "pm_keadaan_2" = 'sehat', "pm_waktu_partus_3" = '', "pm_tempat_partus_3" = 'klinik', "pm_umur_hamil_3" = 'aterm', "pm_jenis_persalinan_3" = 'spontan', "pm_penolong_persalinan_3" = 'bidan', "pm_penyulit_3" = '-', "pm_nifas_3" = '-', "pm_kelamin_3" = 'laki2/399', "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_tempat_partus_4" = NULL, "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '12', "pm_lama_haid" = NULL, "pm_pembalut" = NULL, "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '3-5--24', "pm_taksiran" = '10-2-25', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = '1', "pm_penyakit_lain_sebutkan" = 'disangkal', "pm_kesadaran" = '1', "pm_sistolik" = '130', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '90', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = '100', "pm_frekuensi_nadi" = '80', "pm_frekuensi_nafas" = '20', "pm_membesar" = NULL, "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '29', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = '1', "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = '1', "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = '1', "pm_leopold_bokongggg" = NULL, "pm_janin_masuk" = NULL, "pm_taksiran_janin" = NULL, "pm_djj_x" = '140', "pm_djj" = NULL, "pm_gerak_janin" = '3', "pm_his_x" = '3', "pm_his_detik" = '10', "pm_his_kekuatan" = '20', "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = '1', "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = NULL, "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = NULL, "pm_introitus_sebutkan" = NULL, "pm_porsio" = '1', "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = 'vt pembukaan 4 cm, ', "pm_pembukaan_ketuban" = '0', "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = NULL, "pm_uuk" = NULL, "pm_moulage" = NULL, "pm_nyeri_porsio" = '2', "pm_jatuh" = NULL, "pm_diagnosis" = NULL, "pm_kursi_roda" = NULL, "pm_kursi_roda_ya" = NULL, "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = NULL, "pm_pegangan_ya" = NULL, "pm_heparin" = NULL, "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = NULL, "pm_lemah_ya" = NULL, "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = NULL, "pm_kemampuan_ya" = NULL, "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = NULL, "pm_skala_nyeri" = NULL, "pm_kualitas_nyeri" = NULL, "pm_frekuensi_nyeri" = NULL, "pm_pemberat_nyeri" = NULL, "pm_lama_nyeri" = NULL, "pm_pengurang_nyeri" = NULL, "pm_alergi" = NULL, "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = NULL, "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = NULL, "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = NULL, "pm_psikologis_sebutkan" = NULL, "pm_mental" = NULL, "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = NULL, "pm_bayar" = NULL, "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = NULL, "pm_ibadah" = NULL, "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = NULL, "pm_sholat" = NULL, "pm_banyak_makan" = NULL, "pm_waktu_makan" = NULL, "pm_banyak_minum" = NULL, "pm_waktu_minum" = NULL, "pm_banyak_bak" = NULL, "pm_waktu_bak" = NULL, "pm_banyak_bab" = NULL, "pm_waktu_bab" = NULL, "pm_sex" = NULL, "sews_respirasit" = NULL, "sews_saturasit" = NULL, "sews_o2t" = NULL, "sews_suhut" = NULL, "sews_td_sintolikt" = NULL, "sews_td_diastolikt" = NULL, "sews_nadit" = NULL, "sews_kesadarant" = NULL, "sews_nyerit" = NULL, "sews_pengeluwarant" = NULL, "sews_proteint" = NULL, "pm_meows" = NULL, "sews_laju_respirasio" = NULL, "sews_saturasio" = NULL, "sews_suplemeno" = NULL, "sews_temperaturo" = NULL, "sews_tdso" = NULL, "sews_laju_jantungo" = NULL, "sews_kesadarano" = NULL, "pm_news" = NULL, "pm_tanggal_lab" = NULL, "pm_hasil_lab" = NULL, "pm_tanggal_cgt" = NULL, "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = NULL, "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = NULL, "pm_nyeri_melahirkan" = NULL, "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = NULL, "pm_asuhan_laporkan" = NULL, "pm_asuhan_fasilitas" = NULL, "pm_asuhan_masalah" = NULL, "pm_asuhan_observasi" = NULL, "pm_asuhan_edukasi" = NULL, "pm_asuhan_lain" = NULL, "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-02-01 15:00', "pm_waktu_dpjp" = '2025-02-01 15:00', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 15:03:59'
WHERE "id" = '8288'
ERROR - 2025-02-01 15:04:25 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:05:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 15:05:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 15:05:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 15:05:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 15:08:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:09:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:09:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:10:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:12:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:12:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-02-01 15:15:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:17:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:17:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:19:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-31&quot;
LINE 2: ...', &quot;tpi_pf_infus&quot; = '1', &quot;tpi_pf_tanggal_infus&quot; = '2025-02-3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:19:21 --> Query error: ERROR:  date/time field value out of range: "2025-02-31"
LINE 2: ...', "tpi_pf_infus" = '1', "tpi_pf_tanggal_infus" = '2025-02-3...
                                                             ^ - Invalid query: UPDATE "sm_transfer_pasien_intra" SET "id_layanan_pendaftaran" = '682486', "tpi_tanggal_masuk" = '2025-01-31 19:00', "tpi_tanggal_pindah" = '2025-02-01 15:00', "tpi_ruang_asal" = 'CENDANA 2', "tpi_ruang_tujuan" = 'HCU', "tpi_diagnosis_utama" = 'CVD SNH berulang
', "tpi_diagnosis_sekunder" = 'DM, Pneumonia', "tpi_dpjp" = '353', "tpi_kewaspadaan" = '1', "tpi_indikasi_masuk_rs" = 'Penurunan kesadaran', "tpi_pf_samnolen" = '1', "tpi_pf_koma" = '1', "tpi_pf_gcs_e" = '4', "tpi_pf_gcs_m" = '5', "tpi_pf_gcs_v" = '2', "tpi_pf_gcs_total" = '11', "tpi_pf_pupil_1" = '2', "tpi_pf_pupil_2" = '2', "tpi_pf_tensi_sis" = '155', "tpi_pf_tensi_dis" = '98', "tpi_pf_suhu" = '36.7', "tpi_pf_nadi" = '100', "tpi_pf_nafas" = '26', "tpi_pf_resiko_jatuh_pasien" = '1', "tpi_pf_riwayat_resiko_jatuh_pasien" = 'sedang', "tpi_pf_mobilisasi_pasien" = '2', "tpi_pf_mobilisasi_pasien_transfer" = '2', "tpi_pf_resiko_dekubitus_pasien" = '1', "tpi_pf_riwayat_resiko_dekubitus_pasien" = 'tirah baring', "tpi_pf_infus" = '1', "tpi_pf_tanggal_infus" = '2025-02-31', "tpi_pf_ngt_pasien" = '1', "tpi_pf_tanggal_ngt" = '2025-02-31', "tpi_pf_dc" = '1', "tpi_pf_tanggal_dc" = '2025-02-31', "tpi_pf_oksigen" = '1', "tpi_pf_keterangan_oksigen" = '10', "tpi_pt_infus" = 'RL 20 tpm', "tpi_pt_obat" = 'Manitol untuk 5 hari (IV) 4 x 125. 
Citicolin (IV) 2x500 mg
Asam traneksamat (IV) 3x500 mg
Vit.K (IV) 3x1 amp
Ranitidin (IV) 2x50 mg
Diazepam extra 5 mg (siang)
Oral :
Amlodipin 1x10 (pagi)
Candesartan 1x16mg (sore)
', "tpi_pp_labolatorium" = '1', "tpi_pp_ket_labolatorium" = 'tgl 31/1/2025', "tpi_pp_radiologi" = '1', "tpi_pp_ket_radiologi" = 'THORAX + CT BRAIN NON KONTRAS 31/1/2025', "tpi_tm_tindakan_medis" = 'RJP 1 siklus tanpa  Epineprine 
Memasang gudel
Suction berkala
kejang 1x masuk diazepam 5 mg 
cek AGD t.hasil', "tpi_tm_rencana_tindakan" = 'pindah HCU
R/ konsul paru', "tpi_kp_sebelum_composmentis" = '1', "tpi_kp_sebelum_samnolen" = '1', "tpi_kp_sebelum_gcs_e" = '4', "tpi_kp_sebelum_gcs_m" = '5', "tpi_kp_sebelum_gcs_v" = '2', "tpi_kp_sebelum_gcs_total" = '11', "tpi_kp_waktu_ttd_petugas_tf" = '2025-02-01 13:45', "tpi_kp_petugas_tansfer" = '403', "tpi_kp_ttd_petugas_transfer" = '1'
WHERE "id" = '118480'
ERROR - 2025-02-01 15:20:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:20:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:20:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:20:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:20:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:23:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., &quot;pm_keadaan_3&quot; = 'sehat', &quot;pm_waktu_partus_4&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:23:01 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683099', "pm_waktu_kajian" = '2025-02-01 14:00', "pm_diperoleh" = '1', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'mulas-mulas sejak kemarin, lendir darah (+) ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-01-31 15:12', "pm_lendir" = NULL, "pm_waktu_lendir" = NULL, "pm_ketuban" = NULL, "pm_waktu_ketuban" = NULL, "pm_warna_ketuban" = NULL, "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = NULL, "pm_lainnya_sebutkan" = NULL, "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = '1', "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '1', "pm_anc_lokasi" = 'puskemas tanah tinggi', "pm_anc" = NULL, "pm_anc_tidak_teratur" = '1', "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '4', "pm_nifas_p" = '3', "pm_nifas_a" = '0', "pm_nifas_hidup" = '3', "pm_waktu_partus_1" = '2013-01-01', "pm_tempat_partus_1" = 'bidan', "pm_umur_hamil_1" = '39 minggu', "pm_jenis_persalinan_1" = 'spontan', "pm_penolong_persalinan_1" = 'bidan', "pm_penyulit_1" = '-', "pm_nifas_1" = '-', "pm_kelamin_1" = 'cewe / 3200gr', "pm_keadaan_1" = 'sehat', "pm_waktu_partus_2" = '2017-03-23', "pm_tempat_partus_2" = 'bidan', "pm_umur_hamil_2" = '38 minggu', "pm_jenis_persalinan_2" = 'spontan', "pm_penolong_persalinan_2" = 'bidan', "pm_penyulit_2" = '-', "pm_nifas_2" = '-', "pm_kelamin_2" = 'cowo / 3100gr', "pm_keadaan_2" = 'sehat', "pm_waktu_partus_3" = '2023-11-05', "pm_tempat_partus_3" = 'bidan', "pm_umur_hamil_3" = '38 minggu', "pm_jenis_persalinan_3" = 'spontan', "pm_penolong_persalinan_3" = 'bidan', "pm_penyulit_3" = '-', "pm_nifas_3" = '-', "pm_kelamin_3" = 'cowo / 3900gr', "pm_keadaan_3" = 'sehat', "pm_waktu_partus_4" = '', "pm_tempat_partus_4" = NULL, "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '17', "pm_lama_haid" = '7', "pm_pembalut" = '3', "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '3-5-2024', "pm_taksiran" = '10-02-2025', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = '1', "pm_penyakit_lain" = NULL, "pm_penyakit_lain_sebutkan" = NULL, "pm_kesadaran" = '1', "pm_sistolik" = '129', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '92', "pm_cgs_e" = '4', "pm_cgs_m" = '6', "pm_cgs_v" = '5', "pm_cgs_total" = '15', "pm_spo2" = '100', "pm_frekuensi_nadi" = '90', "pm_frekuensi_nafas" = '20', "pm_membesar" = '1', "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '29', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = '1', "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = '1', "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = '1', "pm_leopold_bokongggg" = NULL, "pm_janin_masuk" = '3/5', "pm_taksiran_janin" = NULL, "pm_djj_x" = '154', "pm_djj" = '1', "pm_gerak_janin" = '5', "pm_his_x" = '3', "pm_his_detik" = NULL, "pm_his_kekuatan" = NULL, "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = '1', "pm_pengeluaran_ketuban" = NULL, "pm_pengeluaran_ketuban_warna" = NULL, "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = NULL, "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = '1', "pm_pengeluaran_lain_sebutkan" = '-', "pm_introitus" = '2', "pm_introitus_sebutkan" = '-', "pm_porsio" = NULL, "pm_porsio_sebutkan" = NULL, "pm_pembukaan" = '4cm', "pm_pembukaan_ketuban" = '0', "pm_pembukaan_ketuban_warna" = NULL, "pm_hodge" = 'kepala', "pm_uuk" = 'kiri', "pm_moulage" = '0', "pm_nyeri_porsio" = '2', "pm_jatuh" = NULL, "pm_diagnosis" = '0', "pm_kursi_roda" = '1', "pm_kursi_roda_ya" = '0', "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = NULL, "pm_pegangan_ya" = NULL, "pm_heparin" = '20', "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '30', "pm_skala_nyeri" = '4', "pm_kualitas_nyeri" = NULL, "pm_frekuensi_nyeri" = '3', "pm_pemberat_nyeri" = NULL, "pm_lama_nyeri" = '3x10`/35``', "pm_pengurang_nyeri" = NULL, "pm_alergi" = NULL, "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = '-', "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '1', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '5', "pm_bayar" = '2', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = 'beribadah', "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = '12:00', "pm_banyak_minum" = '3', "pm_waktu_minum" = '15:00', "pm_banyak_bak" = '1', "pm_waktu_bak" = '07:00', "pm_banyak_bab" = '4', "pm_waktu_bab" = '15:00', "pm_sex" = '1 minggu', "sews_respirasit" = NULL, "sews_saturasit" = NULL, "sews_o2t" = NULL, "sews_suhut" = NULL, "sews_td_sintolikt" = NULL, "sews_td_diastolikt" = NULL, "sews_nadit" = NULL, "sews_kesadarant" = NULL, "sews_nyerit" = NULL, "sews_pengeluwarant" = NULL, "sews_proteint" = NULL, "pm_meows" = NULL, "sews_laju_respirasio" = '0_3', "sews_saturasio" = '0_4', "sews_suplemeno" = '0_2', "sews_temperaturo" = '0_3', "sews_tdso" = '1_4', "sews_laju_jantungo" = '0_2', "sews_kesadarano" = '0_1', "pm_news" = 'Putih', "pm_tanggal_lab" = '01/02/2025', "pm_hasil_lab" = '-', "pm_tanggal_cgt" = '01/02/2025', "pm_hasil_cgt" = 'reaktif', "pm_penunjang_lain" = NULL, "pm_infeksi" = NULL, "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = NULL, "pm_nyeri_melahirkan" = '1', "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = '1', "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = NULL, "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-02-01 15:22', "pm_waktu_dpjp" = '2025-02-01 15:22', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 15:23:01'
WHERE "id" = '8288'
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 15:24:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 15:28:07 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 15:29:25 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 15:31:52 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-01 15:32:26 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-02-01 15:32:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 15:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:47:16 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:47:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:47:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 15:47:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 15:47:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 15:48:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:48:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:48:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 15:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 16:02:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:02:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '353', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL, "id_dokter_pengganti" = NULL
WHERE "id" = ''
ERROR - 2025-02-01 16:04:33 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 16:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 16:13:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (779573, '6', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:13:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (779573, '6', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (779573, '6', '1', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 16:13:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:14:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:14:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:14:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:14:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:16:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:16:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:17:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:17:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:17:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:17:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:19:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:23:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 16:28:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:28:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:28:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:28:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:29:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:29:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:29:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:29:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:29:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:29:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:30:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:30:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:31:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:31:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:31:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:31:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:32:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:32:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:33:56 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-02-01 16:34:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 16:34:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:34:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 16:35:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:35:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:35:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:35:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:35:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:35:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:36:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:36:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:37:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...', &quot;pm_nifas_hidup&quot; = NULL, &quot;pm_waktu_partus_1&quot; = '', &quot;pm_te...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:37:10 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_te...
                                                             ^ - Invalid query: UPDATE "sm_maternal_igd" SET "id_layanan_pendaftaran" = '683100', "pm_waktu_kajian" = '2025-02-01 16:31', "pm_diperoleh" = '2', "pm_diperoleh_sebutkan" = NULL, "pm_cara_masuk" = '4', "pm_keluhan_utama" = 'pasien rujukan dari okm panunggangan dengan KPD ', "pm_kontraksi" = '1', "pm_waktu_kontraksi" = '2025-02-01 16:31', "pm_lendir" = NULL, "pm_waktu_lendir" = NULL, "pm_ketuban" = '1', "pm_waktu_ketuban" = '12:00', "pm_warna_ketuban" = 'jernih ', "pm_darah" = NULL, "pm_darah_sebutkan" = NULL, "pm_lainnya" = '1', "pm_lainnya_sebutkan" = '-', "pm_hamil_muda" = '1', "pm_hamil_muda_muntah" = NULL, "pm_hamil_muda_pendarahan" = NULL, "pm_hamil_muda_lain" = NULL, "pm_hamil_muda_sebutkan" = NULL, "pm_hamil_tua" = '1', "pm_hamil_tua_kepala" = NULL, "pm_hamil_tua_pendarahan" = NULL, "pm_hamil_tua_lain" = NULL, "pm_hamil_tua_sebutkan" = NULL, "pm_anc_x" = '4', "pm_anc_lokasi" = 'pkm panunggangan ', "pm_anc" = NULL, "pm_anc_tidak_teratur" = NULL, "pm_anc_imunisasi" = NULL, "pm_nifas_g" = '2', "pm_nifas_p" = '0', "pm_nifas_a" = '1', "pm_nifas_hidup" = NULL, "pm_waktu_partus_1" = '', "pm_tempat_partus_1" = 'rs brawijaya', "pm_umur_hamil_1" = NULL, "pm_jenis_persalinan_1" = 'kuret', "pm_penolong_persalinan_1" = NULL, "pm_penyulit_1" = NULL, "pm_nifas_1" = NULL, "pm_kelamin_1" = NULL, "pm_keadaan_1" = NULL, "pm_waktu_partus_2" = '', "pm_tempat_partus_2" = NULL, "pm_umur_hamil_2" = NULL, "pm_jenis_persalinan_2" = NULL, "pm_penolong_persalinan_2" = NULL, "pm_penyulit_2" = NULL, "pm_nifas_2" = NULL, "pm_kelamin_2" = NULL, "pm_keadaan_2" = NULL, "pm_waktu_partus_3" = NULL, "pm_tempat_partus_3" = NULL, "pm_umur_hamil_3" = NULL, "pm_jenis_persalinan_3" = NULL, "pm_penolong_persalinan_3" = NULL, "pm_penyulit_3" = NULL, "pm_nifas_3" = NULL, "pm_kelamin_3" = NULL, "pm_keadaan_3" = NULL, "pm_waktu_partus_4" = NULL, "pm_tempat_partus_4" = NULL, "pm_umur_hamil_4" = NULL, "pm_jenis_persalinan_4" = NULL, "pm_penolong_persalinan_4" = NULL, "pm_penyulit_4" = NULL, "pm_nifas_4" = NULL, "pm_kelamin_4" = NULL, "pm_keadaan_4" = NULL, "pm_waktu_partus_5" = NULL, "pm_tempat_partus_5" = NULL, "pm_umur_hamil_5" = NULL, "pm_jenis_persalinan_5" = NULL, "pm_penolong_persalinan_5" = NULL, "pm_penyulit_5" = NULL, "pm_nifas_5" = NULL, "pm_kelamin_5" = NULL, "pm_keadaan_5" = NULL, "pm_waktu_partus_6" = NULL, "pm_tempat_partus_6" = NULL, "pm_umur_hamil_6" = NULL, "pm_jenis_persalinan_6" = NULL, "pm_penolong_persalinan_6" = NULL, "pm_penyulit_6" = NULL, "pm_nifas_6" = NULL, "pm_kelamin_6" = NULL, "pm_keadaan_6" = NULL, "pm_umur_menarche" = '1', "pm_umur_menarche_sebutkan" = '10', "pm_lama_haid" = NULL, "pm_pembalut" = NULL, "pm_dismenorroe" = NULL, "pm_spoting" = NULL, "pm_menorrhagia" = NULL, "pmm_metrorhagia" = NULL, "pm_menstrual" = NULL, "pm_hpht" = '26-5-24', "pm_taksiran" = '2-3-25', "pm_asma" = NULL, "pm_hipertensi" = NULL, "pm_jantung" = NULL, "pm_diabetes" = NULL, "pm_penyakit_lain" = '1', "pm_penyakit_lain_sebutkan" = 'disangkal', "pm_kesadaran" = '1', "pm_sistolik" = '135', "pm_suhu_sistolik" = '36.5', "pm_diastolik" = '80', "pm_cgs_e" = '4', "pm_cgs_m" = '5', "pm_cgs_v" = '6', "pm_cgs_total" = '15', "pm_spo2" = '100', "pm_frekuensi_nadi" = '80', "pm_frekuensi_nafas" = '20', "pm_membesar" = NULL, "pm_melebar" = NULL, "pm_pelebaran" = NULL, "pm_linea_alba" = NULL, "pm_linea_nigra" = NULL, "pm_striae_livide" = NULL, "pm_striae_albican" = NULL, "pm_luka" = NULL, "pm_luka_lain" = NULL, "pm_luka_lain_sebutkan" = NULL, "pm_tfu" = '30', "pm_leopold_1" = NULL, "pm_leopold_bokong" = NULL, "pm_leopold_lain" = NULL, "pm_leopold_1_sebutkan" = NULL, "pm_leopold_2" = NULL, "pm_leopold_punggung" = NULL, "pm_leopold_lainn" = NULL, "pm_leopold_2_sebutkan" = NULL, "pm_leopold_3" = NULL, "pm_leopold_bokonggg" = NULL, "pm_leopold_lainnn" = NULL, "pm_leopold_3_sebutkan" = NULL, "pm_leopold_4" = NULL, "pm_leopold_bokongggg" = NULL, "pm_janin_masuk" = NULL, "pm_taksiran_janin" = NULL, "pm_djj_x" = '140', "pm_djj" = NULL, "pm_gerak_janin" = '3', "pm_his_x" = NULL, "pm_his_detik" = NULL, "pm_his_kekuatan" = NULL, "pm_vulva" = '1', "pm_vulva_sebutkan" = NULL, "pm_pengeluaran_lendir" = NULL, "pm_pengeluaran_ketuban" = '1', "pm_pengeluaran_ketuban_warna" = 'jernih ', "pm_pengeluaran_flex" = NULL, "pm_pengeluaran_darah" = NULL, "pm_pengeluaran_darah_sebanyak" = NULL, "pm_pengeluaran_lain" = NULL, "pm_pengeluaran_lain_sebutkan" = NULL, "pm_introitus" = NULL, "pm_introitus_sebutkan" = NULL, "pm_porsio" = '2', "pm_porsio_sebutkan" = 'tebal lunak ', "pm_pembukaan" = '1 cm ', "pm_pembukaan_ketuban" = '1', "pm_pembukaan_ketuban_warna" = 'jernih ', "pm_hodge" = NULL, "pm_uuk" = NULL, "pm_moulage" = NULL, "pm_nyeri_porsio" = '2', "pm_jatuh" = '0', "pm_diagnosis" = '15', "pm_kursi_roda" = NULL, "pm_kursi_roda_ya" = NULL, "pm_kruk" = NULL, "pm_kruk_ya" = NULL, "pm_pegangan" = '1', "pm_pegangan_ya" = '30', "pm_heparin" = NULL, "pm_imobilisasi" = NULL, "pm_imobilisasi_ya" = NULL, "pm_lemah" = '1', "pm_lemah_ya" = '10', "pm_terganggu" = NULL, "pm_terganggu_ya" = NULL, "pm_kemampuan" = '1', "pm_kemampuan_ya" = '0', "pm_lupa" = NULL, "pm_lupa_ya" = NULL, "pm_jumlah_skor" = '55', "pm_skala_nyeri" = 'sedang ', "pm_kualitas_nyeri" = 'sedang ', "pm_frekuensi_nyeri" = '4', "pm_pemberat_nyeri" = 'mulas ', "pm_lama_nyeri" = '5 menit ', "pm_pengurang_nyeri" = 'relaksasi', "pm_alergi" = '1', "pm_alergi_obat" = NULL, "pm_alergi_obat_reaksi" = NULL, "pm_alergi_makan" = NULL, "pm_alergi_makan_reaksi" = NULL, "pm_alergi_lain" = NULL, "pm_alergi_lain_reaksi" = NULL, "pm_alergi_obat_konsumsi" = NULL, "pm_berat_badan" = '1', "pm_berat_badan_kg" = NULL, "pm_berat_badan_sebutkan" = NULL, "pm_berat_badan_t" = NULL, "pm_fungsional" = '2', "pm_fungsional_sebutkan" = NULL, "pm_psikologis" = '1', "pm_psikologis_sebutkan" = NULL, "pm_mental" = '1', "pm_mental_sebutkan" = NULL, "pm_pekerjaan" = '5', "pm_bayar" = '2', "pm_bayar_asuransi_sebutkan" = NULL, "pm_bayar_sebutkan" = NULL, "pm_bayar_t" = NULL, "pm_keagamaan" = NULL, "pm_ibadah" = '1', "pm_ibadah_sebutkan" = NULL, "pm_thaharoh" = '1', "pm_sholat" = '1', "pm_banyak_makan" = '3', "pm_waktu_makan" = NULL, "pm_banyak_minum" = '5', "pm_waktu_minum" = NULL, "pm_banyak_bak" = '3', "pm_waktu_bak" = NULL, "pm_banyak_bab" = '1', "pm_waktu_bab" = NULL, "pm_sex" = NULL, "sews_respirasit" = '0_2', "sews_saturasit" = '0_3', "sews_o2t" = '2_1', "sews_suhut" = '0_2', "sews_td_sintolikt" = '0_2', "sews_td_diastolikt" = '0_1', "sews_nadit" = '0_3', "sews_kesadarant" = '0_1', "sews_nyerit" = '0_1', "sews_pengeluwarant" = '0_1', "sews_proteint" = NULL, "pm_meows" = 'Hijau', "sews_laju_respirasio" = NULL, "sews_saturasio" = NULL, "sews_suplemeno" = NULL, "sews_temperaturo" = NULL, "sews_tdso" = NULL, "sews_laju_jantungo" = NULL, "sews_kesadarano" = NULL, "pm_news" = NULL, "pm_tanggal_lab" = '01/02/2025', "pm_hasil_lab" = NULL, "pm_tanggal_cgt" = '01/02/2025', "pm_hasil_cgt" = NULL, "pm_penunjang_lain" = NULL, "pm_infeksi" = NULL, "pm_pendarahan" = NULL, "pm_nausea" = NULL, "pm_gawat_jalan" = NULL, "pm_anxietas" = '1', "pm_nyeri_melahirkan" = NULL, "pm_pola_nafas" = NULL, "pm_kebutuhan_lain" = NULL, "pm_kebutuhan_sebutkan" = NULL, "pm_asuhan_jelaskan" = '1', "pm_asuhan_laporkan" = '1', "pm_asuhan_fasilitas" = '1', "pm_asuhan_masalah" = '1', "pm_asuhan_observasi" = '1', "pm_asuhan_edukasi" = '1', "pm_asuhan_lain" = '1', "pm_asuhan_sebutkan" = NULL, "pm_waktu_bidan" = '2025-02-01 16:36', "pm_waktu_dpjp" = '2025-02-01 16:37', "pm_bidan" = '319', "pm_dpjp" = '579', "pm_paraf_bidan" = '1', "pm_paraf_dpjp" = '1', "updated_date" = '2025-02-01 16:37:10'
WHERE "id" = '8292'
ERROR - 2025-02-01 16:37:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 16:40:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 16:44:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:44:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:45:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:45:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:45:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:45:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 16:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 16:50:17 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-02-01 17:02:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:02:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 17:11:06 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-02-01 17:18:09 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-02-01 17:20:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 17:24:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:24:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 17:29:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12035
ERROR - 2025-02-01 17:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 17:47:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:47:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 17:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 17:48:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:48:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 17:52:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 17:52:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x8c /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 17:52:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x8c - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('682957', '2025-02-01 18:42', '18', 'tidak dapat dikaji', 'A: tidak ada sumbatan, hipersaliva (+); B: terpasang NCPAP PEEP 7, FiO2 21%, retraksi dada minimal, Nafas cuping hidung tidak ada, RR: 69x/menit, takipnea sesekali, SpO2: 96%; C: sianosis tidak ada, akral hangat, CRT kurang dari 3 detik, pulsasi arteri teraba kuat, terpasang IV line di tangan kanan (01/2/2025) dengan cairan D10�c/jam, HR: 114x/menit; D: gerak aktif, menangis merintih, buka mata spontan ada, pupil isokor 2/2 ; E: Suhu 37*C, kulit tampak kering, BAB tidak ada, BAK ada; G: Terpasang OGT No. 8/40 cm (01/02/25), Puasa (1) residu keruh kecoklatan sedikit. BBL: 3.280 gram, BB masuk 3.240 gram', 'Gangguan ventilasi spontan; Menyusui tidak efektif
', 'Setelah dilakukan tindakan keperawatan selama 3x24 jam diharapakan ventilasi spontan meningkat dengan kriteria hasil: penggunaan otot bantu nafas menurun, dispneu menurun, takikardi membaik, PO2 membaik dan status menyusui membaik dengan kriteria hasil: Perlekatan bayi pada payudara ibu meningkat, Kemampuan ibu memposisikan bayi dengan benar meningkat, Miksi bayi lebih dari 8x dalam 24 jam meningkat, Berat badan bayi meningkat, Kepercayaan ibu meningkat, Intake bayi meningkat, Hisapan bayi meningkat', '', '', '', '', '', '', '', '', '1892', '1', '<b>Intervensi Keperawatan: </b>Monitor adanya kelelahan otot bantu nafas, Monitor status respirasi dan oksigenisasi, Pertahankan kepatenan jalan nafas, Berikan posisi semi fowler atau fowler, Bantu untuk merubah posisi jika diperlukan, Analisis efek perubahan posisi pada pernafasan (mis. AGD, SpO2), Lakukan auskultasi bunyi pernafasan secara teratur, Identifikasi keinginan dan tujuan menyusui, Identifikasi permasalahan yang ibu alami selama proses menyusui, Berikan informasi dan saran menyusui yang benar sesuai kebutuhan ibu<div></div><div><b>Kolaborasi :</b> Puasa (1), rencana cek SHK (tanggal 4/2/25 atau sebelum pulang), cek GDS selama puasa, Rencana minum 5-10 cc/3 jam jika residu jernih, Weaning CPAP bertahap</div>', NULL, '1892', 0, NULL, '2025-02-01 17:52:44')
ERROR - 2025-02-01 17:58:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 18:00:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 18:01:40 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-02-01 18:02:06 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-02-01 18:09:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202-5-02-01 18:15&quot;
LINE 5: ...n_masalah&quot; = '-', &quot;tpi_kp_waktu_ttd_petugas_tf&quot; = '202-5-02-...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:09:19 --> Query error: ERROR:  invalid input syntax for type timestamp: "202-5-02-01 18:15"
LINE 5: ...n_masalah" = '-', "tpi_kp_waktu_ttd_petugas_tf" = '202-5-02-...
                                                             ^ - Invalid query: UPDATE "sm_transfer_pasien_intra" SET "id_layanan_pendaftaran" = '683111', "tpi_tanggal_masuk" = '2025-02-01 16:15', "tpi_tanggal_pindah" = '2025-02-01 18:15', "tpi_ruang_asal" = 'IGD', "tpi_ruang_tujuan" = 'ICU', "tpi_diagnosis_utama" = 'ARDS ec ALO, Susp Hipoalbumin, HT, DM, Ulkus pedis dextra
', "tpi_dpjp" = '438', "tpi_kewaspadaan" = '1', "tpi_indikasi_masuk_rs" = 'sesak napas', "tpi_pf_composmentis" = '1', "tpi_pf_gcs_e" = '4', "tpi_pf_gcs_m" = '6', "tpi_pf_gcs_v" = '5', "tpi_pf_gcs_total" = '15', "tpi_pf_pupil_1" = '2', "tpi_pf_pupil_2" = '2', "tpi_pf_tensi_sis" = '136', "tpi_pf_tensi_dis" = '80', "tpi_pf_suhu" = '36.5', "tpi_pf_nadi" = '90', "tpi_pf_nafas" = '26', "tpi_pf_resiko_jatuh_pasien" = '1', "tpi_pf_riwayat_resiko_jatuh_pasien" = 'tinggi', "tpi_pf_mobilisasi_pasien" = '1', "tpi_pf_mobilisasi_pasien_transfer" = '1', "tpi_pf_infus" = '1', "tpi_pf_tanggal_infus" = '2025-02-01', "tpi_pf_dc" = '1', "tpi_pf_tanggal_dc" = '2025-02-01', "tpi_pf_oksigen" = '1', "tpi_pf_keterangan_oksigen" = '15', "tpi_pt_infus" = 'terpasang Iv line', "tpi_pt_obat" = 'Furosemide drip mulai 10 mg', "tpi_pp_labolatorium" = '1', "tpi_pp_ket_labolatorium" = 'agd. lab lain dari keluarga kita', "tpi_pp_radiologi" = '1', "tpi_pp_ket_radiologi" = 'thorax dr rs keluarga kita', "tpi_pp_lainnya" = '1', "tpi_pp_ket_lainnya" = 'EKG ', "tpi_tm_tindakan_medis" = 'mengambil sempel darah', "tpi_tm_rencana_tindakan" = 'Cek darah rutin 2 hari lagi 
Cek KGDH 
Cek ur cr 3 hari lagi
Konsul bedah', "tpi_kp_sebelum_composmentis" = '1', "tpi_kp_sebelum_gcs_e" = '4', "tpi_kp_sebelum_gcs_m" = '6', "tpi_kp_sebelum_gcs_v" = '5', "tpi_kp_sebelum_gcs_total" = '15', "tpi_kp_sebelum_catatan" = '-', "tpi_kp_perjalanan_masalah_selama_trasnfer" = '-', "tpi_kp_perjalanan_penanganan_masalah" = '-', "tpi_kp_waktu_ttd_petugas_tf" = '202-5-02-01 18:15', "tpi_kp_petugas_tansfer" = '344', "tpi_kp_ttd_petugas_transfer" = '1'
WHERE "id" = '118490'
ERROR - 2025-02-01 18:09:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;202-5-02-01 18:15&quot;
LINE 5: ...n_masalah&quot; = '-', &quot;tpi_kp_waktu_ttd_petugas_tf&quot; = '202-5-02-...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:09:25 --> Query error: ERROR:  invalid input syntax for type timestamp: "202-5-02-01 18:15"
LINE 5: ...n_masalah" = '-', "tpi_kp_waktu_ttd_petugas_tf" = '202-5-02-...
                                                             ^ - Invalid query: UPDATE "sm_transfer_pasien_intra" SET "id_layanan_pendaftaran" = '683111', "tpi_tanggal_masuk" = '2025-02-01 16:15', "tpi_tanggal_pindah" = '2025-02-01 18:15', "tpi_ruang_asal" = 'IGD', "tpi_ruang_tujuan" = 'ICU', "tpi_diagnosis_utama" = 'ARDS ec ALO, Susp Hipoalbumin, HT, DM, Ulkus pedis dextra
', "tpi_dpjp" = '438', "tpi_kewaspadaan" = '1', "tpi_indikasi_masuk_rs" = 'sesak napas', "tpi_pf_composmentis" = '1', "tpi_pf_gcs_e" = '4', "tpi_pf_gcs_m" = '6', "tpi_pf_gcs_v" = '5', "tpi_pf_gcs_total" = '15', "tpi_pf_pupil_1" = '2', "tpi_pf_pupil_2" = '2', "tpi_pf_tensi_sis" = '136', "tpi_pf_tensi_dis" = '80', "tpi_pf_suhu" = '36.5', "tpi_pf_nadi" = '90', "tpi_pf_nafas" = '26', "tpi_pf_resiko_jatuh_pasien" = '1', "tpi_pf_riwayat_resiko_jatuh_pasien" = 'tinggi', "tpi_pf_mobilisasi_pasien" = '1', "tpi_pf_mobilisasi_pasien_transfer" = '1', "tpi_pf_infus" = '1', "tpi_pf_tanggal_infus" = '2025-02-01', "tpi_pf_dc" = '1', "tpi_pf_tanggal_dc" = '2025-02-01', "tpi_pf_oksigen" = '1', "tpi_pf_keterangan_oksigen" = '15', "tpi_pt_infus" = 'terpasang Iv line', "tpi_pt_obat" = 'Furosemide drip mulai 10 mg', "tpi_pp_labolatorium" = '1', "tpi_pp_ket_labolatorium" = 'agd. lab lain dari keluarga kita', "tpi_pp_radiologi" = '1', "tpi_pp_ket_radiologi" = 'thorax dr rs keluarga kita', "tpi_pp_lainnya" = '1', "tpi_pp_ket_lainnya" = 'EKG ', "tpi_tm_tindakan_medis" = 'mengambil sempel darah', "tpi_tm_rencana_tindakan" = 'Cek darah rutin 2 hari lagi 
Cek KGDH 
Cek ur cr 3 hari lagi
Konsul bedah', "tpi_kp_sebelum_composmentis" = '1', "tpi_kp_sebelum_gcs_e" = '4', "tpi_kp_sebelum_gcs_m" = '6', "tpi_kp_sebelum_gcs_v" = '5', "tpi_kp_sebelum_gcs_total" = '15', "tpi_kp_sebelum_catatan" = '-', "tpi_kp_perjalanan_masalah_selama_trasnfer" = '-', "tpi_kp_perjalanan_penanganan_masalah" = '-', "tpi_kp_waktu_ttd_petugas_tf" = '202-5-02-01 18:15', "tpi_kp_petugas_tansfer" = '344', "tpi_kp_ttd_petugas_transfer" = '1'
WHERE "id" = '118490'
ERROR - 2025-02-01 18:17:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:17:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:20:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 18:27:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 18:32:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:32:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:32:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:32:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:33:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:33:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:33:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:33:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:34:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:34:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:39:41 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-02-01 18:39:41 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-02-01 18:39:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-01 18:39:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-01 18:44:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:44:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 18:58:07 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 18:59:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 18:59:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 18:59:17 --> Severity: Notice  --> Undefined variable: dataONO /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 18:59:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 667
ERROR - 2025-02-01 19:02:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:02:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 19:10:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 19:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 19:16:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:16:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:23:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:23:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:25:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:25:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 19:28:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:28:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:29:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:29:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:29:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:29:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:29:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:29:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:29:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:29:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:29:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:30:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:30:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:30:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:30:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:31:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:31:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:31:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 19:31:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 19:31:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 19:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:31:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:33:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:33:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:41:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:41:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 19:43:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 19:43:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:00:57 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 20:00:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 20:01:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-01 20:06:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:06:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:06:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:06:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:06:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:06:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:06:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:07:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:07:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:07:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:07:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:11:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:11:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 20:29:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 20:33:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-01 20:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 20:38:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 20:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 20:44:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5478332, '1191', 300, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:44:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5478332, '1191', 300, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5478332, '1191', 300, '1', '2.00', NULL, 'null')
ERROR - 2025-02-01 20:52:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:52:44 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-02-01 20:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 20:57:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 20:58:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 20:58:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 21:02:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 21:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 21:31:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 21:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 21:37:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('681718', '2025-02-01 21:21', '8', '', '', '', '', '', '', '', '', 'perut kembung 
nyeri di perut 
kentut + 
BAB sedikit konsistensi normal 
konfirmasi diet ', 'KU TSS, GCS : 15 TD: 110/70mmHg, HR: 119 x/mnt, S: 36.1 C, RR: 20 x/mnt, Spo2: 100�d : cembung, timpani meningkat, bising usus menurun, nyeri tekan + ', 'ileus + Nefrolitiasis sinsitra ', 'konsul ke DPJP ', '1884', '1', 'sudah konsul dan konfirmasi ke dr. Togu Sp. B', NULL, '1884', '1', NULL, '2025-02-01 21:37:20')
ERROR - 2025-02-01 21:41:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 21:41:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 21:41:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 21:41:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 21:49:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 14:59:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 14:59:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:00:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:18 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:18 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:03:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:52 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:05:52 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 22:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 15:06:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:06:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 22:22:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:22:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:23:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:24:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 22:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:25:02 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('683023', '2025-02-01 12:00', '2025-02-03 00:00', 'JATI', 'OK', 'Tumor Bulli ', 'HT (amlodipin 10mg)', '80', '1', NULL, 'Pro operasi TURP-BT S/d cystoskopy', 'HT', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr pre op ', '1', '06/12/24', '1', 'Thorax 06/12/24', '1', 'EKG', 'Infus
Ceftriaxone 1 gr 1 jam pre op ', 'R/ TURP-BT s/d Cystoskopy OK (+) Roni, SIA SIO (+) 
Toleransi operasi 
Dr. Ussy Sp.P: resiko ringan
Dr. Marcell sppd : resiko sedang
Dr. Laurent : resiko sedang', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 22:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:25:08 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('683023', '2025-02-01 12:00', '2025-02-03 00:00', 'JATI', 'OK', 'Tumor Bulli ', 'HT (amlodipin 10mg)', '80', '1', NULL, 'Pro operasi TURP-BT S/d cystoskopy', 'HT', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr pre op ', '1', '06/12/24', '1', 'Thorax 06/12/24', '1', 'EKG', 'Infus
Ceftriaxone 1 gr 1 jam pre op ', 'R/ TURP-BT s/d Cystoskopy OK (+) Roni, SIA SIO (+) 
Toleransi operasi 
Dr. Ussy Sp.P: resiko ringan
Dr. Marcell sppd : resiko sedang
Dr. Laurent : resiko sedang', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 22:25:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:25:22 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('683023', '2025-02-01 12:00', '2025-02-03 08:00', 'JATI', 'OK', 'Tumor Bulli ', 'HT (amlodipin 10mg)', '80', '1', NULL, 'Pro operasi TURP-BT S/d cystoskopy', 'HT', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr pre op ', '1', '06/12/24', '1', 'Thorax 06/12/24', '1', 'EKG', 'Infus
Ceftriaxone 1 gr 1 jam pre op ', 'R/ TURP-BT s/d Cystoskopy OK (+) Roni, SIA SIO (+) 
Toleransi operasi 
Dr. Ussy Sp.P: resiko ringan
Dr. Marcell sppd : resiko sedang
Dr. Laurent : resiko sedang', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 22:25:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:25:33 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('683023', '2025-02-01 12:00', '2025-02-03 08:00', 'JATI', 'OK', 'Tumor Bulli ', 'HT (amlodipin 10mg)', '80', '1', NULL, 'Pro operasi TURP-BT S/d cystoskopy', 'HT', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr pre op ', '1', '06/12/24', '1', 'Thorax 06/12/24', '1', 'EKG', 'Infus
Ceftriaxone 1 gr 1 jam pre op ', 'R/ TURP-BT s/d Cystoskopy OK (+) Roni, SIA SIO (+) 
Toleransi operasi 
Dr. Ussy Sp.P: resiko ringan
Dr. Marcell sppd : resiko sedang
Dr. Laurent : resiko sedang', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-01 15:31:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:31:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:31:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:31:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:33:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:34:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:34:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:34:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 15:34:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-02-01 22:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...= '2', &quot;tpi_pf_pupil_2&quot; = '2', &quot;tpi_pf_pupil_3&quot; = '-', &quot;tpi_...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:45:09 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...= '2', "tpi_pf_pupil_2" = '2', "tpi_pf_pupil_3" = '-', "tpi_...
                                                             ^ - Invalid query: UPDATE "sm_transfer_pasien_intra" SET "id_layanan_pendaftaran" = '682439', "tpi_tanggal_masuk" = '2025-01-31 14:00', "tpi_tanggal_pindah" = '2025-02-03 08:00', "tpi_ruang_asal" = 'JATI', "tpi_ruang_tujuan" = 'OK', "tpi_diagnosis_utama" = 'Appendicitis', "tpi_diagnosis_sekunder" = '-', "tpi_dpjp" = '67', "tpi_kewaspadaan" = '1', "tpi_indikasi_masuk_rs" = 'Pro appendiktomy', "tpi_riwayat_kesehatan" = '-', "tpi_pf_composmentis" = '1', "tpi_pf_gcs_e" = '4', "tpi_pf_gcs_m" = '5', "tpi_pf_gcs_v" = '6', "tpi_pf_gcs_total" = '15', "tpi_pf_afgar_score" = '-', "tpi_pf_djj" = '-', "tpi_pf_pupil_1" = '2', "tpi_pf_pupil_2" = '2', "tpi_pf_pupil_3" = '-', "tpi_pf_pupil_4" = '-', "tpi_pf_skala_nyeri_pasien" = '1', "tpi_pf_riwayat_nyeri_pasien" = '3/10', "tpi_pf_resiko_jatuh_pasien" = '1', "tpi_pf_riwayat_resiko_jatuh_pasien" = 'Sedang', "tpi_pf_mobilisasi_pasien" = '1', "tpi_pf_mobilisasi_pasien_transfer" = '1', "tpi_pf_infus" = '1', "tpi_pf_tanggal_infus" = '2025-02-31', "tpi_pt_infus" = 'RL 20 tpm', "tpi_pt_obat" = 'Ceftriaxone 1 gr/12 jam
Omeprazole 40mg/12 jam
Ketorolak 30m/8 jam ', "tpi_pp_labolatorium" = '1', "tpi_pp_ket_labolatorium" = '31/01/25', "tpi_pp_radiologi" = '1', "tpi_pp_ket_radiologi" = 'BNO, Thorax  31/01/24 ', "tpi_pp_lainnya" = '1', "tpi_pp_ket_lainnya" = 'Appendikogram 01/02', "tpi_tm_tindakan_medis" = 'Ceftriaxone 1 gr jam 06
Omeprazole 40 mg jam 06
Ketorolak 30 mg jam 06', "tpi_tm_rencana_tindakan" = 'R/ appendiktomy Senin 3/2/25 OK (+), SIA SIO (+)
Toleransi operasi ', "tpi_kp_sebelum_composmentis" = '1'
WHERE "id" = '118500'
ERROR - 2025-02-01 22:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:45:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-01 22:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 22:45:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-01 22:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 23:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:06:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5478457, '482', 13200, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:07 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5478457, '482', 13200, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5478457, '482', 13200, '500', '1.00', 'Ya', 'null')
ERROR - 2025-02-01 23:06:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:06:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:06:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:06:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:07:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:07:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:08:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:08:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:09:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:09:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:09:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-02-01 23:11:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:11:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:11:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:11:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:26:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 23:27:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 23:32:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 23:32:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-01 23:33:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:33:42 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('683124', '2025-02-01 23:22', '8', '', '', '', '', '', '', '', '', 'Nyeri seluruh perut sejak 2 hari ini, bab -, kentut - 
keluhan lain tidak ada ', 'KU TSS, GCS : 15 
TD : 145/89 mmHg, Nadi : 98 x/mnt, Suhu : 36.7 C, RR : 20 x/mnt, SPO2 : 98 �d : datar, supel, BU meningkat , nyeri tekan epigastrium ', '
Gastritis, Bacterial infection, HT', 'inj buscopan 1 amp 
konsul ulang ke dr Sarah Sp. PD ', '1884', '1', 'sudah konsul dan konfirmasi ke dr Sarah Sp. PD&nbsp;', NULL, '1884', '1', NULL, '2025-02-01 23:33:42')
ERROR - 2025-02-01 23:48:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:48:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:49:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8170
ERROR - 2025-02-01 23:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-01 23:49:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-01 23:56:56 --> 404 Page Not Found --> /index
