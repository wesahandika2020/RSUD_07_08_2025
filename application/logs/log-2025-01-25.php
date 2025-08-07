<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-01-25 00:13:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:13:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 00:13:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:13:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 00:14:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:14:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 00:14:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:14:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 00:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 00:28:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 00:48:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-01-25 01.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-01-25 01.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:48:44 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-01-25 01.00"
LINE 4: AND "lo_tgl" = '2025-01-25 01.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1359'
AND "lo_tgl" = '2025-01-25 01.00'
AND "id_layanan_pendaftaran" = '679643'
ERROR - 2025-01-25 00:48:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-01-25 01.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-01-25 01.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:48:57 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-01-25 01.00"
LINE 4: AND "lo_tgl" = '2025-01-25 01.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1359'
AND "lo_tgl" = '2025-01-25 01.00'
AND "id_layanan_pendaftaran" = '679643'
ERROR - 2025-01-25 00:50:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-01-25 01.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-01-25 01.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 00:50:33 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-01-25 01.00"
LINE 4: AND "lo_tgl" = '2025-01-25 01.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1359'
AND "lo_tgl" = '2025-01-25 01.00'
AND "id_layanan_pendaftaran" = '679643'
ERROR - 2025-01-25 01:09:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 01:09:49 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1156600'),
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
			 
ERROR - 2025-01-25 02:10:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 02:16:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 02:44:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775770, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 02:44:45 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775770, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775770, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 03:32:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 05:27:54 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 05:37:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 05:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 05:59:30 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 06:07:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:07:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 06:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 06:20:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 06:24:37 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 06:26:11 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 06:27:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:30:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:30:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:31:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250008) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:31:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250008) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250008', '00104775', '2025-01-25 06:31:11', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001096300989', NULL, '022300100125P000446', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250125A072')
ERROR - 2025-01-25 06:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:33:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:33:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:33:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:34:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 06:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:35:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:36:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:36:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:37:07 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:07 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:07 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 200
ERROR - 2025-01-25 06:37:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;--01.40 &quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('679644', '--01.40 '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:37:07 --> Query error: ERROR:  invalid input syntax for type timestamp: "--01.40 "
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 ', '2025-01-25 06:31', 'IGD', 'hcu', 'Trombositopenia ec dengue fever dd chikungngunya 
Susp malaria ', NULL, '438', '1', NULL, 'Demam', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '110', '70', '36.6', '86', '22', '0', NULL, '0', NULL, '1', 'tinggi', '2', '1', '0', NULL, '1', '2025-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-01-25', NULL, NULL, '1', '2', NULL, NULL, 'RL loading 1 kolf lanjut 30 tpm', 'Pct 2 tab po
Ranitin 1amp iv
', '1', 'DR,GDS', '1', 'thorax hasil diradiologi', NULL, NULL, 'lab 
terapi 
thorax', 'Cek ur cr GDS
Cek SGOT SGPT 
Cek apus darah tebal malaria untuk 3 hari berurutan selang 24 jam
Cek tes cepat malaria
Cek DR per hari
Monitor TNRS io', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-25 06:38', NULL, '341', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 06:37:19 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:19 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:19 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 200
ERROR - 2025-01-25 06:37:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;--01.40 &quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('679644', '--01.40 '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:37:19 --> Query error: ERROR:  invalid input syntax for type timestamp: "--01.40 "
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 ', '2025-01-25 06:31', 'IGD', 'hcu', 'Trombositopenia ec dengue fever dd chikungngunya 
Susp malaria ', NULL, '438', '1', NULL, 'Demam', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '110', '70', '36.6', '86', '22', '0', NULL, '0', NULL, '1', 'tinggi', '2', '1', '0', NULL, '1', '2025-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-01-25', NULL, NULL, '1', '2', NULL, NULL, 'RL loading 1 kolf lanjut 30 tpm', 'Pct 2 tab po
Ranitin 1amp iv
', '1', 'DR,GDS', '1', 'thorax hasil diradiologi', NULL, NULL, 'lab 
terapi 
thorax', 'Cek ur cr GDS
Cek SGOT SGPT 
Cek apus darah tebal malaria untuk 3 hari berurutan selang 24 jam
Cek tes cepat malaria
Cek DR per hari
Monitor TNRS io', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-25 06:38', NULL, '341', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 06:37:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:37:37 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:37 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:37 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 200
ERROR - 2025-01-25 06:37:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;--01.40 &quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('679644', '--01.40 '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:37:37 --> Query error: ERROR:  invalid input syntax for type timestamp: "--01.40 "
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 ', '2025-01-25 06:31', 'IGD', 'hcu', 'Trombositopenia ec dengue fever dd chikungngunya 
Susp malaria ', NULL, '438', '1', NULL, 'Demam', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '110', '70', '36.6', '86', '22', '0', NULL, '0', NULL, '1', 'tinggi', '2', '1', '0', NULL, '1', '2025-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-01-25', NULL, NULL, '1', '2', NULL, NULL, 'RL loading 1 kolf lanjut 30 tpm', 'Pct 2 tab po
Ranitin 1amp iv
', '1', 'DR,GDS', '1', 'thorax hasil diradiologi', NULL, NULL, 'lab 
terapi 
thorax', 'Cek ur cr GDS
Cek SGOT SGPT 
Cek apus darah tebal malaria untuk 3 hari berurutan selang 24 jam
Cek tes cepat malaria
Cek DR per hari
Monitor TNRS io', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-25 06:38', NULL, '341', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 06:37:44 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:44 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 198
ERROR - 2025-01-25 06:37:44 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 200
ERROR - 2025-01-25 06:37:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;--01.40 &quot;
LINE 1: ...t_ttd_petugas_terima_transfer&quot;) VALUES ('679644', '--01.40 '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:37:44 --> Query error: ERROR:  invalid input syntax for type timestamp: "--01.40 "
LINE 1: ...t_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('679644', '--01.40 ', '2025-01-25 06:31', 'IGD', 'hcu', 'Trombositopenia ec dengue fever dd chikungngunya 
Susp malaria ', NULL, '438', '1', NULL, 'Demam', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, '110', '70', '36.6', '86', '22', '0', NULL, '0', NULL, '1', 'tinggi', '2', '1', '0', NULL, '1', '2025-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-01-25', NULL, NULL, '1', '2', NULL, NULL, 'RL loading 1 kolf lanjut 30 tpm', 'Pct 2 tab po
Ranitin 1amp iv
', '1', 'DR,GDS', '1', 'thorax hasil diradiologi', NULL, NULL, 'lab 
terapi 
thorax', 'Cek ur cr GDS
Cek SGOT SGPT 
Cek apus darah tebal malaria untuk 3 hari berurutan selang 24 jam
Cek tes cepat malaria
Cek DR per hari
Monitor TNRS io', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-25 06:38', NULL, '341', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 06:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:38:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:38:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:38:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A025%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:39:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:41:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:41:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A029%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:41:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:42:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250036) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:42:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250036) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250036', '00316556', '2025-01-25 06:42:44', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001460839757', NULL, '0221B1230125Y001233', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250125B276')
ERROR - 2025-01-25 06:42:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:42:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:43:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:43:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:44:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:45:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:45:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:46:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:46:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "ab"."kode_booking" = '20250125A043'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:47:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:48:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A010%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:48:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:50:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:50:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A105%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:50:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:51:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 06:53:42 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 06:53:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:53:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A060%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:54:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:55:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:57:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 06:59:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 06:59:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "ab"."kode_booking" = '20250125A067'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 06:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:00:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:03:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:04:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:04:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 07:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:04:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:05:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:07:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:07:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 07:07:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:07:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 07:07:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:09:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002849/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:09:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:09:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:09:26 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002849/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:09:26 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:09:26 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:09:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:09:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:10:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:10:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:11:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:11:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:11:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 07:11:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:11:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 07:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:12:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250090) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:12:48 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250090) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250090', '00086770', '2025-01-25 07:12:48', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Jiwa', 0, '2', '', '20250125C003')
ERROR - 2025-01-25 07:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:12:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:12:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:13:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250093) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:13:26 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250093) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250093', '00316987', '2025-01-25 07:13:26', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001455277948', NULL, '0223B1420125P004197', 'Lama', NULL, '1826', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250125B115')
ERROR - 2025-01-25 07:13:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:14:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:14:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:15:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:15:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:15:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:15:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:16:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:17:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250108) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:17:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250108) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250108', '00366954', '2025-01-25 07:17:20', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001163556112', NULL, '0117U0741224P002872', 'Baru', NULL, '1775', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250125A060')
ERROR - 2025-01-25 07:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:17:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:18:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:18:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:20:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:21:52 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-01-25 07:22:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:22:59 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-01-25 07:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;jd&quot;
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:22:59 --> Query error: ERROR:  syntax error at or near "jd"
LINE 9: ...                         where jd.id_poli=nulland jd.tanggal...
                                                             ^ - Invalid query: SELECT sum(kuota) kuota, sum(jml_kunjung) jml_kunjung, sum(jml_checkin) jml_checkin, sum(jml_kunjung) - sum(jml_checkin) jml_booking, string_agg(nama_dokter, ' & ') nama_dokter
FROM ( select jd.id, "jd"."id_dokter", "jd"."nama_dokter", "jd"."kuota", "jd"."jml_kunjung", "kd"."jml_checkin", jd.jml_kunjung-kd.jml_checkin jml_booking
                                    from sm_jadwal_dokter jd 
                                    left join (select lp.id_dokter, count(lp.id_dokter) jml_checkin
                                                from sm_layanan_pendaftaran lp
                                                where lp.tanggal_layanan between '2025-01-25 00:00:00' and '2025-01-25 23:59:59'
                                                and lp.id_unit_layanan=null and lp.status_terlayani!='Batal'
                                                GROUP BY lp.id_dokter) kd on jd.id_dokter=kd.id_dokter
                                    where jd.id_poli=nulland jd.tanggal between '2025-01-25' and '2025-01-25'
                                    ) kuota
ERROR - 2025-01-25 07:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:22:59 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-01-25 07:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:23:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-01-25 07:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 15: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'null'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:23:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
WHERE "pd"."tanggal_daftar" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "lp"."jenis_layanan" = 'Poliklinik'
AND "lp"."id_unit_layanan" = 'null'
ORDER BY "lp"."id" DESC
 LIMIT 10
ERROR - 2025-01-25 07:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:23:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 07:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:23:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 07:23:55 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006820/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:23:55 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:23:55 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:24:11 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006820/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:24:11 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:24:11 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:24:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:24:34 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006820/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:24:34 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:24:34 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:24:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:24:37 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-01-25 07:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:24:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 07:24:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:24:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 07:25:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:25:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:25:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:25:54 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006820/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:25:54 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:25:54 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:26:39 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006729/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:26:39 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:26:39 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:27:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:27:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:27:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:29:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:30:40 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 07:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:30:40 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 07:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:31:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:31:46 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-01-25 07:32:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:33:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:33:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:33:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:34:01 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002955/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:34:01 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:34:01 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:34:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:34:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A040%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 07:34:24 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002955/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:34:24 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:34:24 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:34:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250154) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:34:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250154) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250154', '00341182', '2025-01-25 07:34:36', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001641369791', NULL, '0496B0001224Y003349', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250125A078')
ERROR - 2025-01-25 07:34:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:34:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:35:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:36:00 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-01-25 07:36:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:36:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:36:34 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 07:38:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:38:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:39:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:39:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:40:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250165) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:40:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250165) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250165', '00136847', '2025-01-25 07:40:10', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000817011448', NULL, '102504021224Y002031', 'Lama', NULL, 1775, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250125B229')
ERROR - 2025-01-25 07:40:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:40:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 07:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:40:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:40:56 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 07:41:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:41:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:41:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:41:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:41:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:41:45 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 07:41:55 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-25 07:41:55 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-25 07:41:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-25 07:41:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:42:14 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 07:43:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:43:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:43:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:43:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:44:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:45:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:45:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:45:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:45:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:45:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:47:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:47:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775789, '2', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:47:07 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775789, '2', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775789, '2', '', '', '3 X SEHARI 1 BUNGKUS', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '1', 0, '', NULL, '6:00', '12:00', '18:00', NULL, NULL, NULL)
ERROR - 2025-01-25 07:47:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:48:28 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006734/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:48:28 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:48:28 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:49:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775791, '2', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:49:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775791, '2', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775791, '2', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '1', 0, '', NULL, '6:00', '12:00', '18:00', NULL, NULL, NULL)
ERROR - 2025-01-25 07:49:05 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006734/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:49:05 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:49:05 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:49:18 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006734/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:49:18 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:49:18 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:49:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:50:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:50:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:51:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:51:29 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002921/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:51:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:51:29 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:51:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:51:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:51:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:52:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:52:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:52:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:53:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:53:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:54:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:54:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:55:00 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002943/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:55:00 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:00 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:04 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002943/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:55:04 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:04 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:13 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002943/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:55:13 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:13 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...7:55:27', &quot;id_unit_layanan&quot; = '22', &quot;id_dokter&quot; = '', &quot;no_an...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:55:27 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...7:55:27', "id_unit_layanan" = '22', "id_dokter" = '', "no_an...
                                                             ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "tanggal_layanan" = '2025-01-25 07:55:27', "id_unit_layanan" = '22', "id_dokter" = '', "no_antrian" = 21, "jenis_layanan" = 'Poliklinik'
WHERE "id" = '679843'
ERROR - 2025-01-25 07:55:29 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002945/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:55:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:29 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:55:56 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002943/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:55:56 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:55:56 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:56:04 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A030%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 07:56:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:57:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006165/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 07:57:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:57:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 07:57:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:57:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:58:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:58:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 07:58:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:58:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A042%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 07:58:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 07:59:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:59:11 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 07:59:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 07:59:28 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 07:59:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:00:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:00:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A018%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 08:00:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:01:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:01:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:01:56 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006740/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:01:56 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:01:56 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:02:00 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006740/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:02:00 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:02:00 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:02:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:02:59 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 08:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:02:59 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 08:02:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:02:59 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 08:03:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:03:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:04:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:05:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:06:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:07:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:07:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:07:52 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-01-25 08:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:07:54 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-01-25 08:08:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:08:17 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-01-25 08:08:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-01-25 08:08:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:08:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:08:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:08:28 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 08:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:09:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:10:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:10:09 --> Severity: Notice  --> Undefined variable: kategori_barang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-01-25 08:10:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/distribusi_barang_produksi/views/modal.php 46
ERROR - 2025-01-25 08:10:09 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 08:10:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:11:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:11:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:11:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 08:11:58 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006746/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:11:58 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:11:58 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:19 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006746/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:12:19 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:12:19 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:12:25 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006746/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:12:25 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:12:25 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:12:34 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-01-25 08:12:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:12:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:13:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:14:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:14:24 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006743/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:14:24 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:14:24 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:14:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:15:07 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-01-25 08:15:07')
ERROR - 2025-01-25 08:15:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:15:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:15:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:15:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 08:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_rekonsiliasi_obat&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot;
DETAIL:  Key (id_detail_resep)=(0) is not present in table &quot;sm_resep_r_detail&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:16:10 --> Query error: ERROR:  insert or update on table "sm_rekonsiliasi_obat" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey"
DETAIL:  Key (id_detail_resep)=(0) is not present in table "sm_resep_r_detail". - Invalid query: INSERT INTO "sm_rekonsiliasi_obat" ("id_detail_resep", "id_resep", "id_layanan_pendaftaran", "lama_pakai", "alasan_minum", "status_resep", "lanjutan", "create_user", "tanggal_create") VALUES (0, 0, 0, NULL, NULL, 0, NULL, 'malihaturosyidah', '2025-01-25 08:16:10')
ERROR - 2025-01-25 08:16:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:16:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:16:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:16:35 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 08:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:16:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:17:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:17:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:18:02 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-25 08:18:02 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-01-25 08:18:02 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-01-25 08:18:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:18:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:18:45 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006751/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:18:45 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:18:45 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:18:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:19:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:19:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:20:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:20:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:21:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:22:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:23:20 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:23:20 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:20 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:23:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:23:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:23:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 08:23:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:23:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 08:23:29 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:23:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:29 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:23:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:23:40 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:23:40 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:40 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:23:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:02 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:24:02 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:24:02 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:24:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A026%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 08:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:24:34 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002958/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:24:34 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:24:34 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:24:47 --> Severity: Warning  --> get_headers(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 08:24:47 --> Severity: Warning  --> get_headers(https://labrsud.tangerangkota.go.id/rsud/00345269_00345269284269.pdf): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 08:25:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:25:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:25:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:26:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:26:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:26:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:26:19 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 08:26:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:26:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:26:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 08:27:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:27:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:27:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:27:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:27:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:28:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:28:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:29:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:29:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:29:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:29:58 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:30:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:31:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:31:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:31:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:32:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:32:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:32:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:32:40 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '20'
AND date(tanggal_layanan) = ''
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:32:43 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:32:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:33:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:33:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:34:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:34:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:34:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:35:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:35:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:35:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:35:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:36:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:36:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:37:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:37:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:38:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:38:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:38:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:38:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:38:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:39:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:39:24 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 08:39:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:39:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 08:39:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:39:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:40:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:41:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:41:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:41:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:42:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:42:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:43:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:44:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:44:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:44:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A104%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 08:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:44:53 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004495/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:44:53 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:44:53 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:44:58 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004495/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:44:58 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:44:58 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:45:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:45:24 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:45:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:45:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:45:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:45:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:45:57 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 08:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:46:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:46:24 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_session57a935f7c746c1d1120ddf5ca7affe20ee5868b6 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-01-25 08:46:24 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_session57a935f7c746c1d1120ddf5ca7affe20ee5868b6 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-01-25 08:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250296) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:46:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250296) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250296', '00137500', '2025-01-25 08:46:46', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001140412432', NULL, '022300080125Y001408', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250125B310')
ERROR - 2025-01-25 08:46:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:47:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:47:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:42 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K005760/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:47:42 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:47:42 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:47:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:45 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K005760/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:47:45 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:47:45 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:47:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:48:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 08:48:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:48:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:49:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:49:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:49:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:50:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:50:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:50:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:50:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:51:33 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:51:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:51:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:51:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:51:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:52:05 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 08:52:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:52:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 08:52:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250307) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:52:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250307) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250307', '00354696', '2025-01-25 08:52:16', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002887220103', NULL, '0221B1181224Y004266', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, '2', '', '20250125B100')
ERROR - 2025-01-25 08:52:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:52:56 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002935/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:52:56 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:52:56 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:53:01 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002935/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:53:01 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:53:01 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:53:23 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002935/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:53:23 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:53:23 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:53:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:53:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A039%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 08:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:54:02 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A009%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 08:54:03 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004204/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:54:03 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:54:03 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:54:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:54:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:54:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:54:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:54:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:18 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002979/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:55:18 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:55:18 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:55:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:55:34 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:55:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:55:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:56:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:56:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 08:56:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:56:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250125B319) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:57:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250125B319) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "kode_bpjs_dokter", "kode_bpjs_poli", "tanggal_kunjungan", "create_date", "status", "usia_pasien", "id_dokter", "id_pendaftaran", "task_satu", "task_dua", "task_tiga", "task_empat", "task_lima", "task_enam", "task_tujuh", "task_batal", "user_create", "user_update", "update_date", "nomor_antrean", "status_respon", "pesan_response", "nama_poli", "pasien_baru", "nik", "status_jkn", "waktu_estimasi", "lokasi_data", "no_kartu", "pasien_hadir", "waktu_hadir", "panggilan_pasien", "waktu_panggil", "loket_antrean", "huruf_antrean", "no_rm", "status_rm", "no_hp", "no_referensi", "nama_dokter", "jenis_kunjungan", "keterangan_batal", "tanggal_lahir", "kebutuhan", "jenis_bayar", "jenis_penjamin", "kirim_bpjs", "respon_bpjs", "ket_bridging", "sisa_kuota", "total_kuota", "nosep", "rujukan", "cetak", "hitung_panggil", "no_sep_asal", "id_skd", "rujukanawal", "id_penjamin", "id_poli_asal", "no_sk", "idskb", "id_poli_rujukan", "is_kontrol_pasca_ranap", "is_pasien_katarak", "log_task", "id_wa", "user_batal", "waktu_batal") VALUES ('20250125B319', 319, '37214', 'INT', '2025-01-25', '2024-12-14 09:50:04', 'Booking', 'Asuransi', '672', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1705', NULL, NULL, 'B319', '200', 'Ok.', '30', '0', '3671054112730003', 'JKN', '2025-01-18 08:03:00', 'APM', '0001622072305', NULL, NULL, NULL, NULL, NULL, 'B', '00293004', '0', '087883259309', '102501041224Y001273', 'dr. I GEDE RAI KOSA, Sp.PD', '3', NULL, '1973-12-01', '0', 'Asuransi', NULL, 'Sudah', 200, 'Ok.', 6, '60', NULL, NULL, NULL, NULL, '0223R0381224V007605', '253611', '0', '1', '30', NULL, NULL, '30', '0', NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 08:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:57:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 08:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:57:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 08:57:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:57:18 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002627/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:57:18 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:57:18 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:57:24 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K000419/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:57:24 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:57:24 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:57:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:58:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:58:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:58:29 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002627/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 08:58:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:58:29 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 08:58:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:58:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:59:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 08:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 08:59:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:59:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 08:59:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 08:59:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 08:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:00:44 --> Severity: error  --> Exception: syntax error, unexpected 'if' (T_IF) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_lab_kirim_wa/controllers/api/Hasil_lab_kirim_wa.php 271
ERROR - 2025-01-25 09:00:44 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ParseError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:00:46 --> Severity: error  --> Exception: syntax error, unexpected 'if' (T_IF) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_lab_kirim_wa/controllers/api/Hasil_lab_kirim_wa.php 271
ERROR - 2025-01-25 09:00:46 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ParseError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:00:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:01:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:01:01 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K003961/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:01:01 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:01:01 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:01:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:01:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A028%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:01:22 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:01:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:01:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:01:25 --> Severity: error  --> Exception: syntax error, unexpected 'if' (T_IF) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_lab_kirim_wa/controllers/api/Hasil_lab_kirim_wa.php 271
ERROR - 2025-01-25 09:01:25 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ParseError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:01:35 --> Severity: error  --> Exception: syntax error, unexpected 'if' (T_IF) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_lab_kirim_wa/controllers/api/Hasil_lab_kirim_wa.php 271
ERROR - 2025-01-25 09:01:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ParseError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:02:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:02:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:03:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:03:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:03:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:03:19 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 09:03:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:03:19 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:03:30 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:03:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:04:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:04:30 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:05:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:06:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:06:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:07:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:07:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775907, '6', '', '60', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:07:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775907, '6', '', '60', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775907, '6', '', '60', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 09:08:07 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002938/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:08:07 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:08:07 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:08:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:09:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:09:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250350) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:10:04 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250350) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250350', '00339795', '2025-01-25 09:10:02', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001051817139', NULL, '102501091224Y001346', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250125A020')
ERROR - 2025-01-25 09:10:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:10:26 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:10:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:11:12 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:11:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:11:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:11:36 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 09:11:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:11:36 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 09:11:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:12:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:13:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:13:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:13:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:13:14 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:13:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:13:36 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 09:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:14:18 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10471
ERROR - 2025-01-25 09:14:18 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10471
ERROR - 2025-01-25 09:14:23 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10471
ERROR - 2025-01-25 09:14:23 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10471
ERROR - 2025-01-25 09:14:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:14:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:14:39 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006813/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:14:39 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:14:39 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:14:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:14:51 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:14:53 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:14:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:15:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:15:14 --> Severity: Notice  --> Trying to get property 'id_skb' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 263
ERROR - 2025-01-25 09:15:14 --> Severity: Notice  --> Trying to get property 'id_skb' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 265
ERROR - 2025-01-25 09:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:15:28 --> Severity: Warning  --> get_headers(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:15:28 --> Severity: Warning  --> get_headers(https://labrsud.tangerangkota.go.id/rsud/00208174_00208174284159.pdf): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:15:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:16:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:17:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:17:30 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006816/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:17:30 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:17:30 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:17:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:17:45 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004511/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:17:45 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:17:45 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:18:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:18:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:18:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:18:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:19:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:19:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:19:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:19:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:19:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 09:19:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:19:48 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:20:20 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:20:27 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006818/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:20:27 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:20:27 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:20:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:20:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:20:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:20:57 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:21:00 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:21:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:21:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:21:22 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:21:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:21:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 09:21:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:22:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:22:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:22:11 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:22:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 09:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:23:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:23:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:23:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:23:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:23:43 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:23:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:24:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:24:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:24:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:24:50 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006824/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:24:50 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:24:50 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:24:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:25:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:25:31 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:26:19 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:26:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:26:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:27:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775942, '3', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:27:45 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775942, '3', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775942, '3', '', '', '3 X SEHARI 1 BUNGKUS', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'salbutamol 0.3+ambroxol 1/10 + cetirizine 1/10 + neoprotifed 1/20', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 09:28:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:28:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:28:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:28:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:29:26 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:29:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:29:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250226B035) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:29:37 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250226B035) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250226B035', '035', 'B035', 'B', '2025-02-26', '0', '2025-01-25 09:29:26', 'Booking', 'APM', 'Asuransi', 0, '2025-02-26  07:31:30', 0, '1705', '00078597', 70, 12310, 29, 'PAR', '08889248397', '9201054802900001', '1990-02-08', 'dr. USYNARA, SpP', 1, 'Asuransi', 53, '60', '200', 'Ok.', '0', '0001439549943', 'JKN', '268799', '0', '29', '0223B1821224Y000582', '3', NULL, '0223R0380125V012488', '29', 'Belum', NULL, NULL)
ERROR - 2025-01-25 09:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:29:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:29:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 09:29:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:29:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 09:30:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:30:20 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002991/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:30:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (775948, '2', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:30:24 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (775948, '2', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (775948, '2', '', '', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 09:30:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:31:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:31:41 --> cURL Error: Could not resolve host: labrsud.tangerangkota.go.id; Unknown error
ERROR - 2025-01-25 09:31:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:31:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:32:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:32:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 09:32:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('775939', '4', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:32:20 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('775939', '4', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('775939', '4', '', '1', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 09:32:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:32:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:32:29 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K003440/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:32:29 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:32:29 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:32:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:32:40 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 09:32:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:32:40 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 09:32:51 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K003440/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:32:51 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:32:51 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:33:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:33:10 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT "kode_bpjs"
FROM "sm_tenaga_medis"
WHERE "id" = ''
ERROR - 2025-01-25 09:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:33:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:33:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:34:05 --> cURL Error: Unable to communicate securely with peer: requested domain name does not match the server's certificate.
ERROR - 2025-01-25 09:34:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:34:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 09:34:25 --> cURL Error: Unable to communicate securely with peer: requested domain name does not match the server's certificate.
ERROR - 2025-01-25 09:34:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:34:27 --> cURL Error: Unable to communicate securely with peer: requested domain name does not match the server's certificate.
ERROR - 2025-01-25 09:34:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:35:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:35:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;is_operasi&quot; of relation &quot;sm_surat_kontrol_logs&quot; does not exist
LINE 1: ...spesialisasi_rujukan&quot;, &quot;skb_code&quot;, &quot;skb_message&quot;, &quot;is_operas...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:35:54 --> Query error: ERROR:  column "is_operasi" of relation "sm_surat_kontrol_logs" does not exist
LINE 1: ...spesialisasi_rujukan", "skb_code", "skb_message", "is_operas...
                                                             ^ - Invalid query: INSERT INTO "sm_surat_kontrol_logs" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal", "id_spesialisasi", "id_user", "jenis", "id_spesialisasi_asal", "id_pasien", "id_penjamin", "alasan_kontrol", "rencana_tindak_lanjut", "jenis_bantuan", "dirawat_dengan", "keterangan", "prb", "id_dokter_asal", "id_dokter_tujuan", "id_skb", "created_date", "updated_date", "id_spesialisasi_rujukan", "skb_code", "skb_message", "is_operasi", "id_skd_lama") VALUES ('627336', '679851', '2025-03-01', '29', '786', 'Surat Kontrol', '29', '00091746', '1', NULL, NULL, '{"konsul":"","raber":"","alih":""}', NULL, NULL, '0', '69', '70', NULL, '2025-01-25 09:34:36', NULL, NULL, '201', 'Surat Rujukan ini Masa Berlaku Habis, Maksimal 3(tiga) bulan dari tanggal rujukan', '0', '268810')
ERROR - 2025-01-25 09:36:12 --> Severity: Warning  --> get_headers(): php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:36:12 --> Severity: Warning  --> get_headers(https://labrsud.tangerangkota.go.id/rsud/00366814_00366814284184.pdf): failed to open stream: php_network_getaddresses: getaddrinfo failed: Name or service not known /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:36:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:36:18 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:36:35 --> Severity: Warning  --> get_headers(): Peer certificate CN=`*.tangerangkota.go.id' did not match expected CN=`10.10.10.11' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:36:35 --> Severity: Warning  --> get_headers(): Failed to enable crypto /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:36:35 --> Severity: Warning  --> get_headers(https://10.10.10.11/rsud/00312170_00312170284205.pdf): failed to open stream: operation failed /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:36:49 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K003370/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:36:49 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:36:49 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:36:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:37:17 --> Severity: Warning  --> get_headers(): Peer certificate CN=`*.tangerangkota.go.id' did not match expected CN=`10.10.10.11' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:37:17 --> Severity: Warning  --> get_headers(): Failed to enable crypto /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:37:17 --> Severity: Warning  --> get_headers(https://10.10.10.11/rsud/00335776_00335776276791.pdf): failed to open stream: operation failed /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 199
ERROR - 2025-01-25 09:37:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:38:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:40:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:40:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:40:22 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:40:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:40:39 --> Severity: Notice  --> Undefined variable: fileContent /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 210
ERROR - 2025-01-25 09:40:39 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 09:40:39 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:40:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:40:45 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00352317'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:41:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:41:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:41:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:41:50 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:41:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_unit_layanan&quot; = 'undefined'
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:41:54 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_unit_layanan" = 'undefined'
                                  ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = 'undefined'
AND date(tanggal_layanan) = '2025-01-25'
ERROR - 2025-01-25 09:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:42:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:42:09 --> Severity: Warning  --> file_get_contents(): Peer certificate CN=`*.tangerangkota.go.id' did not match expected CN=`10.10.10.11' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 204
ERROR - 2025-01-25 09:42:09 --> Severity: Warning  --> file_get_contents(): Failed to enable crypto /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 204
ERROR - 2025-01-25 09:42:09 --> Severity: Warning  --> file_get_contents(https://10.10.10.11/rsud/00335776_00335776276791.pdf): failed to open stream: operation failed /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/whatsapp/controllers/api/Whatsapp.php 204
ERROR - 2025-01-25 09:42:09 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 09:42:09 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 09:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:42:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:43:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:43:14 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-01-25 09:43:14 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-01-25 09:43:17 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-01-25 09:43:17 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-01-25 09:43:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:43:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:43:27 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 297
ERROR - 2025-01-25 09:43:27 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 298
ERROR - 2025-01-25 09:43:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:45:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:45:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:45:12 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K005861/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:45:12 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:45:12 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:45:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:45:55 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:46:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:46:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:46:30 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K005861/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:46:30 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:46:30 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:46:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:46:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:47:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:47:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:47:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:48:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:49:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:49:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:49:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:19 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:50:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:51:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:52:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:52:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:53:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 09:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:54:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:54:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:54:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 09:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:55:03 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:55:55 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 09:56:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:56:13 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K001825/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 09:56:13 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:56:13 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 09:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:57:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:58:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 09:58:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 09:58:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:58:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:58:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 09:58:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 09:58:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 09:59:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 09:59:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:00:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 10:00:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:00:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:01:02 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10436
ERROR - 2025-01-25 10:01:02 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10436
ERROR - 2025-01-25 10:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:01:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:02:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:02:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:02:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:02:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 10:02:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:02:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 10:02:35 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:02:35 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:02:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:02:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:17 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006888/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:03:17 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:03:17 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:03:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:03:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250465) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:03:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250465) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250465', '00153748', '2025-01-25 10:03:57', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001460116552', NULL, '0223B1450125Y002630', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Paru', 0, '2', '', '20250125B343')
ERROR - 2025-01-25 10:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:04:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:05:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:05:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:05:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:05:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 9:                 and konsul=0 and id_unit_layanan= and jenis_...
                                                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:05:32 --> Query error: ERROR:  syntax error at or near "and"
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
ERROR - 2025-01-25 10:05:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:05:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:05:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:06:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:06:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:07:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 10:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:08:59 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006865/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:08:59 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:08:59 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:09:16 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006866/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:09:16 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:09:16 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:09:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:10:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 10:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:11:35 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K005790/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:11:35 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:11:35 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:11:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:11:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:12:08 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-01-25 10:12:08 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-01-25 10:12:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:12:38 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006760/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:12:38 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:12:38 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:13:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;7 5 &quot;
LINE 1: ...rium&quot;, &quot;kronis&quot;) VALUES (5439255, '517', 162.504, '7 5 ', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:13:09 --> Query error: ERROR:  invalid input syntax for type double precision: "7 5 "
LINE 1: ...rium", "kronis") VALUES (5439255, '517', 162.504, '7 5 ', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5439255, '517', 162.504, '7 5 ', '2.33', 'Ya', '0')
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:13:29 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:14:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250477) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:14:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250477) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250477', '00367020', '2025-01-25 10:14:02', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Medical Check Up', 0, '2', '', '20250125C070')
ERROR - 2025-01-25 10:14:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:14:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:15:24 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:15:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:16:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:17:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:18:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:18:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:19:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:19:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:19:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:19:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:19:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:20:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:21:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 10:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:23:45 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:24:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:24:48 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_radiologi/controllers/api/Hasil_radiologi.php 420
ERROR - 2025-01-25 10:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 15:         where dr.id_radiologi = ''
                                         ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:24:48 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 15:         where dr.id_radiologi = ''
                                         ^ - Invalid query: select dr.* , rd.kode, lpr.nama as parent, l.nama as layanan_radiologi, lpr.id as id_root,
        coalesce(pgd.nama, '') as dokter,
        coalesce(prad.nama, '') as radiografer,
        case when rd.waktu_hasil is null then 'Konfirm' else 'Diperiksa' end as konfirmasi
        from sm_detail_radiologi dr
        join sm_radiologi rd on (rd.id = dr.id_radiologi)
        join sm_tarif_pelayanan kt on (kt.id = dr.id_tarif)
        join sm_layanan l on (l.id = kt.id_layanan)
        left join sm_layanan lpr on (lpr.id = l.id_parent)
        left join sm_tenaga_medis as tmd on (tmd.id = dr.id_dokter)
        left join sm_pegawai as pgd on (pgd.id = tmd.id_pegawai)
        left join sm_tenaga_medis as tmr on (tmr.id = dr.id_radiografer)
        left join sm_pegawai as pgr on (pgr.id = tmr.id_pegawai)
        left join sm_pegawai as prad on (prad.id = dr.id_radiografer)
        where dr.id_radiologi = ''
        order by lpr.id
ERROR - 2025-01-25 10:24:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:26:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:26:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 10:26:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:26:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:26:51 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:26:53 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:27:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:27:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 10:27:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:27:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 10:27:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:28:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:29:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:29:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250130B476) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:29:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250130B476) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250130B476', '476', 'B476', 'B', '2025-01-30', '0', '2025-01-25 10:28:57', 'Booking', 'APM', 'Asuransi', 0, '2025-01-30  08:57:00', 0, '1705', '00362186', 484, 296383, 11, 'ANA', '089653829740', '3671111410180005', '2018-10-14', 'dr. MILA AGUSTIA, Sp.A, M.Biomed', 1, 'Asuransi', 34, '60', '200', 'Ok.', '0', '0003078871121', 'JKN', '268891', '0', '11', '102501101224Y003256', '3', NULL, '0223R0380125V008929', '11', 'Belum', NULL, NULL)
ERROR - 2025-01-25 10:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:29:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:30:22 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:30:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:30:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:30:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:30:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2501250495) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:30:48 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2501250495) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2501250495', '00198408', '2025-01-25 10:30:48', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001375112812', NULL, '102501100125Y004214', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Mata', 0, 2, NULL, '20250125B355')
ERROR - 2025-01-25 10:30:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:30:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:30:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:30:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:31:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:31:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10436
ERROR - 2025-01-25 10:31:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10436
ERROR - 2025-01-25 10:32:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:32:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:33:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:33:33 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 10:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:34:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:34:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:42 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:51 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:34:53 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:35:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:35:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:35:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776065, '6', '6', '', '2 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:35:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776065, '6', '6', '', '2 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776065, '6', '6', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', 'kp', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776068, '2', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:36:46 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776068, '2', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776068, '2', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:37:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:38:07 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:38:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:38:49 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:38:59 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 10:39:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:39:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 10:39:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:39:01 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 10:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:39:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:39:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:39:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 10:39:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:39:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:40:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776073, '3', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:40:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776073, '3', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776073, '3', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:40:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:40:44 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:42:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:42:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:43:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:43:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:44:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776081, '2', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:44:08 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776081, '2', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776081, '2', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:45:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:45:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776084, '2', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:45:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776084, '2', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776084, '2', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:45:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:46:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776086, '2', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:46:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776086, '2', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776086, '2', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:46:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776088, '1', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:46:57 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776088, '1', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776088, '1', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:47:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:48:03 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:48:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:48:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:48:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:13 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 429
ERROR - 2025-01-25 10:49:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:49:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776096, '3', '1', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:49:41 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (776096, '3', '1', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776096, '3', '1', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', '3x18', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:50:05 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:50:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:51:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776098, '17', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:51:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (776098, '17', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776098, '17', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'dexa 2 mg + 10 gr vaselin album, udd', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:51:12 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 10:51:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:51:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:51:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:51:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:51:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:52:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:52:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:52:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:52:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776100, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:52:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776100, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776100, '1', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '1', 1, '2x1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:53:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:53:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:53:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:53:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:56:04 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-01-25 00:00:00' AND '2025-01-25 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-01-25 10:56:11 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0381224K006550/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 10:56:11 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:56:11 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 10:56:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:56:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:56:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:56:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:56:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:56:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:56:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 10:57:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:57:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776113, '21', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 10:57:44 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (776113, '21', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776113, '21', '', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'dexa 2 mg + 10 gr vaselin album', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 10:57:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:58:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:58:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:58:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 10:59:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:00:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:00:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:00:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:01:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:01:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:01:43 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:02:30 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:02:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:03:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:03:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 04:03:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 04:03:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 04:03:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 04:03:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 11:04:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:04:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:04:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:05:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:05:00 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:05:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:06:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:06:27 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004963/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 11:06:27 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:06:27 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:06:32 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K004963/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 11:06:32 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:06:32 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:07:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776136, '5', '', '3', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:07:18 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776136, '5', '', '3', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776136, '5', '', '3', '1 x Sehari 1/2 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:07:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:07:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:08:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:11:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:11:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:11:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:11:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:11:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:12:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:12:19 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K006915/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 11:12:19 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:12:19 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 11:12:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:12:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:12:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776144, '6', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:12:45 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776144, '6', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776144, '6', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 11:12:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:16:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:20:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 11:20:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:21:58 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:22:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:22:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:22:28 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:22:33 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:22:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:25:06 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:25:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 11:25:58 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2157
ERROR - 2025-01-25 11:25:58 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2201
ERROR - 2025-01-25 11:25:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (776171, '5', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:25:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (776171, '5', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (776171, '5', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', 'UDD', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:26:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:26:03 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2157
ERROR - 2025-01-25 11:26:03 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2201
ERROR - 2025-01-25 11:26:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:26:09 --> Severity: Notice  --> Trying to get property 'id_history_pembayaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2157
ERROR - 2025-01-25 11:26:09 --> Severity: Notice  --> Trying to get property 'id_layanan_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2201
ERROR - 2025-01-25 11:26:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:26:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:27:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:27:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:27:55 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12601
ERROR - 2025-01-25 11:27:55 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12604
ERROR - 2025-01-25 11:28:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:28:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:28:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:30:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:30:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:30:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:31:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:31:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:31:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:32:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:33:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:33:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:33:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:35:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:35:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:36:07 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:36:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:36:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:37:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:37:44 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:38:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:38:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:39:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:39:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:39:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:39:32 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:39:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:39:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:39:49 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:40:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:40:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:41:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:41:59 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-01-25 11:42:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'undefined'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:42:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'undefined'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'undefined'
ERROR - 2025-01-25 11:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:42:12 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-01-25 11:42:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:42:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-01-25 11:42:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:43:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:44:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:45:21 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:47:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:48:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:49:18 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00072195'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-01-25 11:49:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784173, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:49:47, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan &gt;80% kebutuhan; nilai TD dalam rentang normal/ter..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:49:47 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784173, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:49:47, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan >80% kebutuhan; nilai TD dalam rentang normal/ter..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80% kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80% kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG^ 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:49:47')
ERROR - 2025-01-25 11:49:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784174, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:49:51, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan &gt;80% kebutuhan; nilai TD dalam rentang normal/ter..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:49:51 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784174, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:49:51, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan >80% kebutuhan; nilai TD dalam rentang normal/ter..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80% kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80% kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG^ 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:49:51')
ERROR - 2025-01-25 11:50:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784177, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:50:14, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan &gt;80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:50:14 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784177, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:50:14, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276...., Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80 persen kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG^
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG^ 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:50:14')
ERROR - 2025-01-25 11:50:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784178, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG 1700 kkal, null, null, 1870, 2025-01-25 11:50:46, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan &gt;80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:50:46 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784178, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG 1700 kkal, null, null, 1870, 2025-01-25 11:50:46, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80 persen kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:50:46')
ERROR - 2025-01-25 11:51:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:51:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:51:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:51:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:52:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784180, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:52:31, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan &gt;80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:52:31 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784180, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG^ 1700 kkal, null, null, 1870, 2025-01-25 11:52:31, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80 persen kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG^ 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:52:31')
ERROR - 2025-01-25 11:52:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784181, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG 1700 kkal, null, null, 1870, 2025-01-25 11:52:46, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan &gt;80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:52:46 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784181, 679632, null, 11, , , , , BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss ..., 1870, 1, Diet BB DJ RG 1700 kkal, null, null, 1870, 2025-01-25 11:52:46, null, null, null, null, null, null, null, 0, Asupan makan peroral inadekuat berkiatan dengan penurunan daya t..., Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3..., Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang norm..., , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679632', NULL, '11', '', '', '', '', 'BB = 70 kg
TB = 160 cm
IMT = 27.3 kg/m2
Status gizi obesitss tk I;
TD : 158/78mmhg, N : 62x/mnt, S: 36.2RR:20 SAO2: 96 PERSEN NK 3LPM. pemeriksaan lab tgl 24/1/25 gds: 93 , hb : 14.6 ht : 42 leu : 8.2 tr : 275. Pernah dirawat dengan ass PPOK. Riw merokok + RPD: HHD+, PPOK+ RPO: Tidak kontrol (terakhir berobat tahun 2022); masih sesak; tidak ada alergi makanan', 'Asupan makan peroral inadekuat berkiatan dengan penurunan daya terima makanan ditandai dengan asupan makan &lt;80 persen kebutuhan; pembatasan keb natrium berkaitan dengan peningkatan tekanan darah ditandai dengan TD 158/78 mmHg', 'Diet BB DJ RG
E = 1700 kkal
P = 64 gr
L = 37.7 gr
KH = 276.3 gr
Bentuk lunak, jalur oral, frekuensi 3x makan 2x snack', 'Cakupan asupan >80 persen kebutuhan; nilai TD dalam rentang normal/terkontrol', '', '', '', '', '1870', '1', 'Diet BB DJ RG 1700 kkal', NULL, '1870', 0, NULL, '2025-01-25 11:52:46')
ERROR - 2025-01-25 11:53:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:53:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:53:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:53:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:53:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:53:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:53:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:53:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:54:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:55:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:55:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:55:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:56:47 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 11:57:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:57:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 11:58:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:58:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:58:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:59:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:59:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:59:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:59:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 11:59:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 11:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 11:59:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:00:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:00:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:00:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xba /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:00:56 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xba - Invalid query: UPDATE "sm_resume_medis_ranap" SET "id_pendaftaran" = '625534', "diagnosa_awal_masuk" = NULL, "hasil_konsultasi" = 'Sp PD', "alergi_obat" = 'tidak ada', "diet" = 'Diet TKTP', "ringkasan_riwayat" = 'sesak sejak 1 bulan, sesak disertai dg nafas berbunyi. disertai dg batuk dahak sejak 1 bulan. penurunan berat badan disangkal, keringat malam disangkal. saat di IGD, keluhan sesak berkurang, memberat bila berbaring, batuk + RPD: CKD, DM, Stroke, susp TB paru, demensia RPO novorapid 16-14-14, lanthus 1x14, candesartan 1x8 mg, amlodipin 1x5 mg, allopurinol 1x300 mg, haloperidol, thp', "pemeriksaan_fisik" = 'CM TD : 130/78 HR 91 x/m RR : 26 x/m spO2 99 % dg NK 3 lpm mata ca -/- si -/- thorax : sdv menurun/n Rh -/- wh -/-, bj i.ii reg m - g - abd : suepl, bu +, nt - e ext : akral hangat +/+, edem -/- GDS 401 mg/dl', "penunjang_diagnostik" = ' Glukosa - Stick 1 H 418 mg/dL,  Hasil TCM-TB MTB Detected RIF Resistance Not Detected, pH H 7.454  p CO2 L 26.2 mm Hg   p O2 L 63 mm Hg   HCO3 L 19 mEq/L O2 Saturasi L 93.4 ºse Excess L -5.7 mmol/L   ctCO2 L 19.5 , Analisa Cairan Tubuh cairan pleura :  Berat Jenis H 1.010,  pH H 7.5,  Jumlah Sel H 1145 sel/ÂµL, Thorax rontgen : Kesan:  Efusi pleura kanan  Fibrosis pada lapang atas paru kiri ', "pending_lab" = 'tidak ada', "anjuran_edukasi" = 'kontrol poli', "kondisi_waktu_keluar" = NULL, "pengobatan_dilanjutkan" = 'Poliklinik', "cara_terapi_pengobatan" = 'nebulasi combivent 4x1 resp', "id_users" = '744', "created_date" = '2025-01-25 12:00:55'
WHERE "id_pendaftaran" = '625534'
ERROR - 2025-01-25 12:01:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:01:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:01:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:01:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:01:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:01:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:01:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:01:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:03:15 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 05:03:17 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 05:03:17 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 12:04:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:04:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:04:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:04:41 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:04:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:05:34 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:05:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:06:33 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessionc0adde0e121c7dd8ad2633b484e9624c2dfdef7e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-01-25 12:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:07:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:08:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:08:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:08:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:08:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:09:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:10:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:11:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:11:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:11:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:11:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:12:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:12:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:13:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:13:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:13:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:13:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:13:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:14:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:14:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:14:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:16:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:16:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:16:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:16:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:16:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:16:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:17:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 12:17:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 12:17:51 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 12:17:51 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 12:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:18:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:18:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:18:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:20:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:21:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:21:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:22:01 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:25:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:26:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:26:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:28:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:28:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:29:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:30:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:30:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:31:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:32:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:33:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:33:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:33:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:33:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:33:42 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:33:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:33:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:34:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:34:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:35:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:35:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:36:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:38:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-25 12:358:33&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-01-25 12:358...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:38:26 --> Query error: ERROR:  date/time field value out of range: "2025-01-25 12:358:33"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358:33', "id_dokter_dpjp" = '71', "ttd_dokter_dpjp" = '1'
WHERE "id" = '784134'
ERROR - 2025-01-25 12:38:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-25 12:358:33&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-01-25 12:358...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:38:28 --> Query error: ERROR:  date/time field value out of range: "2025-01-25 12:358:33"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358:33', "id_dokter_dpjp" = '71', "ttd_dokter_dpjp" = '1'
WHERE "id" = '784134'
ERROR - 2025-01-25 12:38:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-01-25 12:358:33&quot;
LINE 1: UPDATE &quot;sm_cppt&quot; SET &quot;waktu_verif_dpjp&quot; = '2025-01-25 12:358...
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:38:29 --> Query error: ERROR:  date/time field value out of range: "2025-01-25 12:358:33"
LINE 1: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358...
                                                  ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_verif_dpjp" = '2025-01-25 12:358:33', "id_dokter_dpjp" = '71', "ttd_dokter_dpjp" = '1'
WHERE "id" = '784134'
ERROR - 2025-01-25 12:39:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:41:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:41:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:42:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:42:55 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:43:02 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K003174/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 12:43:02 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 12:43:02 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 12:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:45:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:45:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:45:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:45:52 --> Severity: Warning  --> file_get_contents(http://10.10.10.6/vclaim_bpjs/vclaim_bpjs_v2/surat_kontrol_bpjs/0223R0380125K002979/json): failed to open stream: HTTP request failed! HTTP/1.1 400 Bad Request
 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 414
ERROR - 2025-01-25 12:45:52 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 12:45:52 --> Severity: Notice  --> Trying to get property 'kodeDokterPembuat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 415
ERROR - 2025-01-25 12:46:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:46:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:47:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:47:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:47:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:47:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:47:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:47:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:47:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:47:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:48:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:48:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:48:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:48:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:49:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:50:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:50:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:50:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:50:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:50:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:50:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:50:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:51:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:51:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:52:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:52:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:52:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:52:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:52:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:52:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:52:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:52:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:52:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776210', '10', '', '15', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:52:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('776210', '10', '', '15', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776210', '10', '', '15', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 12:53:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:53:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:53:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:53:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:53:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:53:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:53:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:53:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:53:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:54:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:54:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:54:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:54:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:54:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:54:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:54:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:54:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 12:56:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:56:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:56:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:56:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:56:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:57:06 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:57:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:57:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 12:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:57:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:58:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:58:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:59:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:59:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 12:59:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 12:59:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 12:59:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:00:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:00:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:00:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:00:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:01:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:01:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:01:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 13:02:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:02:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:02:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:02:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:02:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:02:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...) VALUES ('2025-01-25 13:03:38', 1157295, '1463', '', '13468...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:03:38 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...) VALUES ('2025-01-25 13:03:38', 1157295, '1463', '', '13468...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-01-25 13:03:38', 1157295, '1463', '', '13468.00', '17939.38', '1', 17939.38, '259', '745')
ERROR - 2025-01-25 13:04:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:05:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:06:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:06:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:07:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:07:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:07:33 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:08:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:08:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:08:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:08:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:09:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 13:09:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:09:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:09:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 13:09:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:09:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:10:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:10:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:10:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:10:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 13:11:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:11:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:11:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:11:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:12:19 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:12:50 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:13:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:13:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:13:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:13:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:13:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('775880', '4', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:13:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('775880', '4', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('775880', '4', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:14:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('775880', '5', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:14:29 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('775880', '5', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('775880', '5', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:16:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:16:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:16:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:16:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:16:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:16:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:16:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('775881', '6', '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:16:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('775881', '6', '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('775881', '6', '3', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:16:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:16:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:17:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:17:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:17:26 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:18:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('775882', '3', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:18:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('775882', '3', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('775882', '3', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:18:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:18:57 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:19:00 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7837
ERROR - 2025-01-25 13:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:20:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:20:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:20:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:20:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:20:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:21:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:21:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:23:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:23:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:23:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:23:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:25:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 13:25:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 13:25:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:25:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:25:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:25:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:25:22 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:25:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:25:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 13:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 13:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:11 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 13:26:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:26:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:26:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776212', '9', '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('776212', '9', '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776212', '9', '3', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:26:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:26:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:27:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 13:27:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:27:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('776203', '21', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('776203', '21', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776203', '21', '1', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 13:28:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:28:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:28:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:29:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:29:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:29:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:29:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:30:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:30:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:31:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:31:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:31:54 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 13:32:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:33:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:33:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:33:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:33:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 13:33:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:33:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 13:33:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 13:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 13:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:06:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:07:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:07:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:07:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:07:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:09:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 14:09:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:09:46 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 14:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:11:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 182
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 184
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'is_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 184
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 191
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'hubungan_keluarga' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 191
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 192
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'nama_keluarga' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 192
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 193
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 193
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 194
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'jenis_kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 194
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 195
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'alamat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 195
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 27
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'id_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 28
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'tanggal_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 29
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 30
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'tindakan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'tanggal_lahir_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'alamat_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 51
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'updated_on' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 60
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'nama_saksi_1' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 64
ERROR - 2025-01-25 14:12:14 --> Severity: Notice  --> Trying to get property 'nama_saksi_2' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/penolakan_tindakan_kedokteran.php 65
ERROR - 2025-01-25 14:12:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:12:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:12:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:12:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:12:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:13:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:13:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:14:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:14:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:14:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:14:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:14:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:14:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:15:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:15:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:15:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:15:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:15:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('776057', '10', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:15:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('776057', '10', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776057', '10', '1', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 14:15:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 14:16:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:16:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:16:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:16:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:16:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:17:10 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 14:17:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:17:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679620', '2025-01-25 13:05', '18', 'Pasien tidak dapat dikaji', 'kesadaran Somnolen gcs E2M5Vavasia. EWS M (>7) akral hangat nadi teraba kuat, pasien nampak lemas dan tidak bisa diajak komunikasi, Siang ini pasien tidak ada kejang. Aktivitas pasien dibantu keluarga.TD: 86/69 mmhg N : 62 x/mnt S: 36. 2 c R: 18 x/mnt Spo2: 98Şngan 4 liter oksigen NK. Terpasang IVFD RL 20 TPM. DC NGT 24/1/25, NGT di alirkan produksi warna coklat kehitaman. Pemeriksaan tidak dilakukan radiologi, Lab Darah rutin terlampir', 'intoleransi aktivitas, resiko cidera.', 'setelah dilakukan tindakan asuhan keperawatan selama 3 x 24 jam diharapkan Toleransi Aktivitas Meningkat dengan kriteria hasil Kemudahan dalam melakukan aktivitas sehari-hari meningkat ,Keluhan lelah menurun,Dispnea saat beraktivitas menurun. setelah dilakuan tindakan keperawatan selama 2 x 24 jam diharapkan Tingkat Cedera menurun dengan kriteria hasil Toleransi akvitas meningkat,Ekspresi wajah kesakitan menurun,Gangguan mobilitas menurun,Gangguan kognitif menurun,TTV membaik,Pola isitirahat tidur membaik', '', '', '', '', '', '', '', '', '1993', '1', 'PP Sore<div>Identifikasi gangguan fungsi tubuh yang mengakibatkan kelelahan,Monitor kelelahan fisik dan emosional.Monitor pola dan jam tidur,Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas, Sediakan lingkungan nyaman dan rendah stimulus,Lakukan latihan rentang gerak pasif dan atau akti,Berikan aktivitas distraksi yang menenangkan,Fasilitasi duduk di sisi tempat tidur, jika tidak dapat berpindah atau berjalan Anjurkan tirah baring,Anjurkan melakukan aktivitas secara bertahap,Anjurkan menghubungi perawat jika tanda dan gejala kelelahan tidak berkurang.Identifikasi factor risiko jatuh,Identifikasi risiko jatuh setidaknya sekali setiap shift,Identifikasi factor lingkungan yang meningkat risiko jatuh,Hitung risiko jatuh dengan menggunakan skala,Monitor kemampuan berpindah dari tempat tidur ke kursi atau sebaliknya,Orientasikan ruangan pada pasien dan keluarga,Pastikan roda tempat tidur dan kursi roda selalu dalam kondisi terkunci</div><div>PP Malam</div><div>Identifikasi gangguan fungsi tubuh yang mengakibatkan kelelahan,Monitor kelelahan fisik dan emosional.Monitor pola dan jam tidur,Monitor lokasi dan ketidaknyamanan selama melakukan aktivitas, Sediakan lingkungan nyaman dan rendah stimulus,Lakukan latihan rentang gerak pasif dan atau akti,Berikan aktivitas distraksi yang menenangkan,Fasilitasi duduk di sisi tempat tidur, jika tidak dapat berpindah atau berjalan Anjurkan tirah baring,Anjurkan melakukan aktivitas secara bertahap,Anjurkan menghubungi perawat jika tanda dan gejala kelelahan tidak berkurang.Identifikasi factor risiko jatuh,Identifikasi risiko jatuh setidaknya sekali setiap shift,Identifikasi factor lingkungan yang meningkat risiko jatuh,Hitung risiko jatuh dengan menggunakan skala,Monitor kemampuan berpindah dari tempat tidur ke kursi atau sebaliknya,Orientasikan ruangan pada pasien dan keluarga,Pastikan roda tempat tidur dan kursi roda selalu dalam kondisi terkunci</div><div><br></div>', NULL, '1993', 0, NULL, '2025-01-25 14:17:27')
ERROR - 2025-01-25 14:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:17:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:18:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 14:19:12 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-01-25 14:19:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:19:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:19:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:19:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:19:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:19:49 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 336
ERROR - 2025-01-25 14:20:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:20:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:20:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:20:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:21:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:25:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:26:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:26:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:26:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:26:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:26:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:27:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:27:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:27:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:27:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:27:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:28:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:28:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:28:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:28:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:28:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:28:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:29:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:29:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:29:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:29:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:29:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:32:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:32:56 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679620', '2025-01-25 14:20', '8', '', '', '', '', '', '', '', '', 'Terjadi desaturasi tiba-tiba, batuk (+) lendir (+)
NGT coklat ', 'Kes E2M4Vafasia
SpO2 76% >> 100Şngan NRM 100%
TD: 86/69 mmhg N : 62 x/mnt S: 36. 2 c R: 18 x/mnt ', 'Observasi seizure, CP, epilepsi ', 'Cek AGD
Konsul dr Eko SpN', '2039', '1', '<p>Sudah konsultasi dan konfirmasi ulang dr Eko SpN<br>AdviceÂ </p><p>Konsul paru<br>ACC icu jika AGD buruk<br><br></p>', NULL, '2039', '1', NULL, '2025-01-25 14:32:56')
ERROR - 2025-01-25 14:33:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:33:02 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1156990'),
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
			 
ERROR - 2025-01-25 14:33:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:33:02 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679620', '2025-01-25 14:20', '8', '', '', '', '', '', '', '', '', 'Terjadi desaturasi tiba-tiba, batuk (+) lendir (+)
NGT coklat ', 'Kes E2M4Vafasia
SpO2 76% >> 100Şngan NRM 100%
TD: 86/69 mmhg N : 62 x/mnt S: 36. 2 c R: 18 x/mnt ', 'Observasi seizure, CP, epilepsi ', 'Cek AGD
Konsul dr Eko SpN', '2039', '1', '<p>Sudah konsultasi dan konfirmasi ulang dr Eko SpN<br>AdviceÂ </p><p>Konsul paru<br>ACC icu jika AGD buruk<br><br></p>', NULL, '2039', '1', NULL, '2025-01-25 14:33:02')
ERROR - 2025-01-25 14:33:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:33:04 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1156990'),
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
			 
ERROR - 2025-01-25 14:33:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Form_rekam_medis' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:33:35 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:34:00 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-01-25 14:34:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-01-25 14:36:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:36:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:36:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:37:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:37:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:38:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:38:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:38:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:38:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:38:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:39:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 14:39:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:39:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:40:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:40:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:40:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:40:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:41:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:42:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 14:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:42:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:42:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:42:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:42:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:43:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:43:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:43:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:43:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:43:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:43:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:43:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:43:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:44:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:44:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:44:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 14:44:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:44:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:44:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:44:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:44:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:44:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:45:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:45:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:46:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:46:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:46:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:46:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:46:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:46:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:46:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:47:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:47:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:47:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:47:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:49:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:49:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:49:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('776166', '11', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:49:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('776166', '11', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776166', '11', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 14:50:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:50:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:50:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:50:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:50:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:50:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:52:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:52:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:52:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:52:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:53:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:53:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:53:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:53:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:53:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('776224', '10', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:53:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('776224', '10', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776224', '10', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 14:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:54:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 14:55:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:55:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:55:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:55:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:55:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:55:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:55:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:55:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:55:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:55:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:56:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:56:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:56:19 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:56:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:57:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:57:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:57:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:57:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:57:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:57:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:57:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:57:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:57:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:57:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:57:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 14:57:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:58:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:58:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 14:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 14:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:00:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:00:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:01:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:01:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:01:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:01:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:09:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:11:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:11:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;2025-02-0 23:59:59&quot;
LINE 11: ...(&quot;jd&quot;.&quot;tanggal&quot; BETWEEN '2025-01-25 00:00:00' AND '2025-02-0...
                                                              ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:11:42 --> Query error: ERROR:  date/time field value out of range: "2025-02-0 23:59:59"
LINE 11: ...("jd"."tanggal" BETWEEN '2025-01-25 00:00:00' AND '2025-02-0...
                                                              ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: SELECT DISTINCT jd.id, poli.nama poli, jd.kode_bpjs_poli, jd.kode_bpjs_dokter, jd.id, case
                        when to_char(jd.tanggal, 'Day')='Monday   ' then 'Senin' 
                        when to_char(jd.tanggal, 'Day')='Tuesday  ' then 'Selasa' 
                        when to_char(jd.tanggal, 'Day')='Wednesday' then 'Rabu'  
                        when to_char(jd.tanggal, 'Day')='Thursday ' then 'Kamis' 
                        when to_char(jd.tanggal, 'Day')='Friday   ' then 'Jumat' 
                        when to_char(jd.tanggal, 'Day')='Saturday ' then 'Sabtu' 
                        when to_char(jd.tanggal, 'Day')='Sunday   ' then 'Minggu' 
                        else '-' end hari, jd.tanggal, pg.nama dokter, jd.kuota, jd.jml_kunjung, jd.id_poli, jd.id_dokter, sp2.nama unit_kerja, jd.logs, jd.created_user, jd.created_date, (coalesce(jjd.jml_dr_ci, 0) + coalesce(jjd.jml_drlog_ci, 0) + coalesce(jjd.jml_konsul, 0)) ab_checkin, jd.jml_kunjung-(coalesce(jjd.jml_dr_ci, 0) + coalesce(jjd.jml_drlog_ci, 0) + coalesce(jjd.jml_konsul, 0)) ab_booking
FROM "sm_spesialisasi" "poli"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "poli"."id"="jd"."id_poli" and ("jd"."tanggal" BETWEEN '2025-01-25 00:00:00' AND '2025-02-0 23:59:59' )
LEFT JOIN "sm_spesialisasi" "sp" ON "jd"."id_poli"= "sp"."id"
LEFT JOIN "sm_tenaga_medis" "tm" ON "jd"."id_dokter"="tm"."id"
LEFT JOIN "sm_pegawai" "pg" ON "tm"."id_pegawai"="pg"."id"
LEFT JOIN "sm_spesialisasi" "sp2" ON "tm"."id_spesialisasi"= "sp2"."id"
LEFT JOIN "vm_jml_jadwal_dokter" "jjd" ON "jd"."id"="jjd"."id"
WHERE "poli"."id" not in ('43','57','15')
AND "jd"."id_poli" = '12'
ORDER BY "poli"."nama" ASC, "jd"."tanggal" ASC, "jd"."id" ASC, "pg"."nama" ASC
 LIMIT 20
ERROR - 2025-01-25 15:17:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:17:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:17:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(5746405) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:17:05 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(5746405) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '776243'
ERROR - 2025-01-25 15:17:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:17:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:17:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:17:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:17:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(5746405) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:17:31 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(5746405) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '776243'
ERROR - 2025-01-25 15:17:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:17:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:17:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:18:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:18:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:18:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:18:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(5746403) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:18:06 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(5746403) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '776244'
ERROR - 2025-01-25 15:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:18:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:18:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:18:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(5746405) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:18:36 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(5746405) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '776243'
ERROR - 2025-01-25 15:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:23:38 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:23:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:23:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:26:48 --> Severity: Notice  --> Trying to get property 'cetakan_ke' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 38
ERROR - 2025-01-25 15:26:48 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 38
ERROR - 2025-01-25 15:26:48 --> Severity: Notice  --> Undefined property: stdClass::$id /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 41
ERROR - 2025-01-25 15:27:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:27:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:27:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:27:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:27:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:27:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id_resep&quot; = 'undefined'
                                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:27:53 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id_resep" = 'undefined'
                                 ^ - Invalid query: SELECT "r".*, "rt"."id", "lp"."id_penjamin", "pjm"."nama" as "penjamin", "lp"."cara_bayar", date(r.waktu) as tanggal, "pj"."id" as "id_jual_resep", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "pasien", "lp"."jenis_layanan", "p"."alamat" as "alamat_pasien", "p"."id" as "no_rm", "u"."nama" as "depo", "pj"."waktu"
FROM "sm_resep" as "r"
JOIN "sm_resep_tebus" as "rt" ON "rt"."id_resep" = "r"."id"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_tenaga_medis" as "d" ON "d"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "d"."id_pegawai"
LEFT JOIN "sm_penjamin" as "pjm" ON "pjm"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
LEFT JOIN "sm_unit" as "u" ON "u"."id" = "rt"."id_unit"
WHERE "rt"."id_resep" = 'undefined'
AND "rt"."pengambilan_ke" = '1'
ORDER BY "r"."waktu" DESC
ERROR - 2025-01-25 15:27:53 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:27:57 --> Severity: Notice  --> Trying to get property 'cetakan_ke' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 38
ERROR - 2025-01-25 15:27:57 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 38
ERROR - 2025-01-25 15:27:57 --> Severity: Notice  --> Undefined property: stdClass::$id /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/resep/controllers/Resep.php 41
ERROR - 2025-01-25 15:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 15:30:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:30:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:30:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:30:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:30:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:30:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5442579, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:30:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5442579, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5442579, '78', 13200, '1', '1.00', NULL, 'null')
ERROR - 2025-01-25 15:30:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:30:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:30:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:30:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:31:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:31:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:31:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:31:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:31:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:31:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:32:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:32:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:32:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:32:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:32:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:32:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:34:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:34:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:34:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:35:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:35:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...nis&quot;) VALUES (5442641, '60', 114, '1', '4.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...nis") VALUES (5442641, '60', 114, '1', '4.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5442641, '60', 114, '1', '4.00', NULL, 'null')
ERROR - 2025-01-25 15:35:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:35:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:35:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:35:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (784372, 679623, null, 8, , , , , , 2039, 1, Sudah konsultasi dan konfirmasi ulang dr Eko SpN&lt;br&gt;AdviceÂ , null, null, 2039, 2025-01-25 15:35:27, null, null, null, null, null, null, null, 1, , , , : Nyeri kepala terasa berkurang, terkadang ada nyeri perut terut...,  kes CM KU sedang 
TTV TD: 145/83mmHg, nadi 100:xmenit, suhu : ..., pneumonia, hipertensi , cephalgia, Lapor Ro vertebra dr Eko SpN, null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:35:27 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (784372, 679623, null, 8, , , , , , 2039, 1, Sudah konsultasi dan konfirmasi ulang dr Eko SpN<br>AdviceÂ , null, null, 2039, 2025-01-25 15:35:27, null, null, null, null, null, null, null, 1, , , , : Nyeri kepala terasa berkurang, terkadang ada nyeri perut terut...,  kes CM KU sedang 
TTV TD: 145/83mmHg, nadi 100:xmenit, suhu : ..., pneumonia, hipertensi , cephalgia, Lapor Ro vertebra dr Eko SpN, null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679623', NULL, '8', '', '', '', '', '', '', '', '', ': Nyeri kepala terasa berkurang, terkadang ada nyeri perut terutama daerah ulu hati', ' kes CM KU sedang 
TTV TD: 145/83mmHg, nadi 100:xmenit, suhu : 36.3 RR: 20xmenit, spo2 :96 persen dengan nasal canul 2lpm
', 'pneumonia, hipertensi , cephalgia', 'Lapor Ro vertebra dr Eko SpN', '2039', '1', 'Sudah konsultasi dan konfirmasi ulang dr Eko SpN<br>AdviceÂ ', NULL, '2039', '1', NULL, '2025-01-25 15:35:27')
ERROR - 2025-01-25 15:36:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:36:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:36:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:36:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:36:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:36:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:36:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:36:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:37:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:37:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:37:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:37:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:38:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:38:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:38:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:41:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:41:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:41:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:41:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5442755, '922', 925.74, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:41:41 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5442755, '922', 925.74, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5442755, '922', 925.74, '1', '1.00', NULL, 'null')
ERROR - 2025-01-25 15:41:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:41:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:42:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:42:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:42:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:43:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:43:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:44:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:44:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:44:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:44:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:44:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:44:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:45:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:45:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:45:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:45:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:45:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:46:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:46:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:46:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:46:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:46:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:46:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:46:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:46:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:47:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:47:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:48:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 15:49:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:50:22 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12601
ERROR - 2025-01-25 15:50:22 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12604
ERROR - 2025-01-25 15:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:53:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:53:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:53:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:54:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:54:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:54:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:54:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:54:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:54:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:54:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:54:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:55:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:55:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:55:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:55:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:56:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:56:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:56:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:57:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:57:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:57:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:57:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:57:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:57:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:57:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:57:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:58:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:58:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:58:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:58:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:59:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 15:59:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:59:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:59:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:59:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 15:59:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 15:59:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:00:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:00:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:00:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:00:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:00:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:00:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:01:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:01:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:06:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 16:07:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:07:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:07:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:07:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:07:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:07:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:08:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 16:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 16:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:09 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-01-25 16:08:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:08:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:08:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:08:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:08:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:08:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:10:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:10:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5443018, '537', 636, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:10:47 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5443018, '537', 636, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443018, '537', 636, '500', '1.00', 'Ya', 'null')
ERROR - 2025-01-25 16:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:11:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:11:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:12:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:12:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:13:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:13:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:14:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:14:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:16:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:17:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:17:52 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:18:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:18:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:18:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:18:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:18:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5443051, '550', 13080, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:18:21 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5443051, '550', 13080, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443051, '550', 13080, '100', '1.00', 'Ya', 'null')
ERROR - 2025-01-25 16:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:18:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:18:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:19:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:19:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:20:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:21:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:21:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:21:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 16:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 16:24:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:24:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:25:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:25:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:32:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:32:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:32:48 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:33:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 16:36:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:38:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:39:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:39:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:42:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:43:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:43:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:44:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:45:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:47:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:49:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:50:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 16:57:44 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:58:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:58:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 16:58:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 16:58:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 17:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 17:10:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 17:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:11:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 17:11:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 17:11:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 17:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:14:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:19:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 17:19:40 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:24:12 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-01-25 17:24:12 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-01-25 17:29:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 17:29:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 17:42:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 17:45:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 17:48:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:06:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:11:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:11:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5443205, '393', 6600, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:11:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5443205, '393', 6600, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443205, '393', 6600, '1', '1.00', NULL, 'null')
ERROR - 2025-01-25 18:11:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:11:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:12:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:12:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:12:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:12:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:18:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:18:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:21:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:26:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:07 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679620', '2025-01-25 18:17', '8', '', '', '', '', '', '', '', '', 'Pasien sempat mengalami desaturasi jam 13.00, tidak ada tersedak, pasien tampak sekali sekali batuk
Saat ini saturasi stabil 100Şngan O2 4lpm
tidak ada kejang 
Pasien masuk kemarin karena kejang sejak 2 bulan ini, namun kejang memberat 1 hari ini, dengan frekuensi 10x, dengan durasi +- 5 menit setiap kejang, setelah kejang pasien tampak lemah dan tertidur. ', 'Kes E2M4Vafasia SpO2 100persen dengan O2 4lpm TD: 86/69 mmhg N : 62 x/mnt S: 36. 2 c R: 18 x/mnt
 Mata : anemis +/+ , isokor+/+, RCL +/+, nistagmus -/-, THT : Faring hiperemis (-) 
Leher : JVP meningkat (-), KGB tidak teraba membesar Mulut : mukosa bibir kering (+) 

Thoraks : BND Vesikular, retraksi (-), RH +/+, WH -/- jantung : BJ 1, 2 regular, murmur (-), gallop (-) Abdomen : BU (+), supel, nyeri tekan (-), Nyeri ketok CVA -/- Ekstremitas : akral hangat, CRT 2" udema -/- Motorik : kesan spastik (+) R. meningen : kaku kuduk (-) Babinski -/-
', 'observasi seizure, CP, susp pneumonia', 'Lapor dr Fitri SpP', '2039', '1', 'Sudah konsultasi dan konfirmasi ulang dr Fitri SpP<br>AdviceÂ ', NULL, '2039', '1', NULL, '2025-01-25 18:26:07')
ERROR - 2025-01-25 18:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:26:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:26:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5443270, '674', 5040, '8', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5443270, '674', 5040, '8', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443270, '674', 5040, '8', '1.00', 'Ya', 'null')
ERROR - 2025-01-25 18:26:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:16 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('679620', '2025-01-25 18:17', '8', '', '', '', '', '', '', '', '', 'Pasien sempat mengalami desaturasi jam 13.00, tidak ada tersedak, pasien tampak sekali sekali batuk
Saat ini saturasi stabil 100Şngan O2 4lpm
tidak ada kejang 
Pasien masuk kemarin karena kejang sejak 2 bulan ini, namun kejang memberat 1 hari ini, dengan frekuensi 10x, dengan durasi +- 5 menit setiap kejang, setelah kejang pasien tampak lemah dan tertidur. ', 'Kes E2M4Vafasia SpO2 100persen dengan O2 4lpm TD: 86/69 mmhg N : 62 x/mnt S: 36. 2 c R: 18 x/mnt
 Mata : anemis +/+ , isokor+/+, RCL +/+, nistagmus -/-, THT : Faring hiperemis (-) 
Leher : JVP meningkat (-), KGB tidak teraba membesar Mulut : mukosa bibir kering (+) 

Thoraks : BND Vesikular, retraksi (-), RH +/+, WH -/- jantung : BJ 1, 2 regular, murmur (-), gallop (-) Abdomen : BU (+), supel, nyeri tekan (-), Nyeri ketok CVA -/- Ekstremitas : akral hangat, CRT 2" udema -/- Motorik : kesan spastik (+) R. meningen : kaku kuduk (-) Babinski -/-
', 'observasi seizure, CP, susp pneumonia', 'Lapor dr Fitri SpP', '2039', '1', 'Sudah konsultasi dan konfirmasi ulang dr Fitri SpP<br>AdviceÂ ', NULL, '2039', '1', NULL, '2025-01-25 18:26:16')
ERROR - 2025-01-25 18:26:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:27:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:27:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:27:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 18:27:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 18:35:11 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 18:44:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 19:15:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 19:18:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5443358, '561', 427.572, '500', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:38 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5443358, '561', 427.572, '500', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443358, '561', 427.572, '500', '10.00', 'Ya', 'null')
ERROR - 2025-01-25 19:18:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:18:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:18:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:19:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:19:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:19:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:19:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:19:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('776311', '1', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:19:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('776311', '1', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('776311', '1', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 19:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:20:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:20:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:20:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:20:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 19:20:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:20:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:20:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:20:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:24:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:24:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:24:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:24:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:25:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:25:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:25:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:25:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:27:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:27:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:27:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:27:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:27:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:27:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 19:35:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 19:36:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 19:36:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:36:42 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680144', '2025-01-25 19:38', '18', 'pasien tidak dapat dikaji', 'kesadaran composmentis, akral hangat Menangis kuat, gerak aktif, klinis kemerahan, abdomen lunak, meco (+) miksi (-) s: 37,2 nadi:134kali/menit rr:45 kali/menit spo2:99»: 2560 gr PB: 45 cm, menete langsung+', 'Ketidakstabilan kadar glukosa darah
', 'Setelah dilakukan tindakan keperawatan selama 3x24 jam diharapkan Kadar glukosa darah berada pada rentang normal, dengan Kriteria Hasil : Kesadaran meningkat, Mengantuk menurun, Berkeringat menurun, Mulut kering menurun, Rasa haus menurun, Kadar glukosa dalam darah membaik, Kadar glukosa dalam urine membaik, Jumlah urine membaik', '', '', '', '', '', '', '', '', '1689', '1', 'Identifikasi tanda dan gejala hipoglikemia, Identifikasi kemungkinan penyebab hipoglikemia, Pertahankan akses IV dan kepatenan jalan napas, bila perlu, monitor kadar glukosa darah, Monitor intake dan output cairan, Besok pagi cek gds ulang, Minum adlirencan acek gd besok pagi', NULL, '2027', 0, NULL, '2025-01-25 19:36:42')
ERROR - 2025-01-25 19:39:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:39:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:39:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:39:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:41:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 19:41:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 19:41:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:41:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:41:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:41:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:43:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:43:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:43:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5443501, '700', 255.744, '20', '6.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:43:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5443501, '700', 255.744, '20', '6.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443501, '700', 255.744, '20', '6.00', 'Ya', 'null')
ERROR - 2025-01-25 19:43:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:43:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:43:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:44:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:44:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:44:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:44:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:45:30 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 19:51:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:51:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:59:16 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 19:59:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 19:59:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:59:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 19:59:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 19:59:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:00:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:00:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:00:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:02:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:02:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:03:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:03:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:03:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:03:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:04:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:04:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:09:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:09:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:09:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:09:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:11:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:11:30 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_anamnesa" ("id_layanan_pendaftaran", "waktu", "keluhan_utama", "riwayat_penyakit_keluarga", "riwayat_penyakit_sekarang", "anamnesa_sosial", "riwayat_penyakit_dahulu", "keadaan_umum", "kesadaran", "gcs", "tensi_sistolik", "tensi_diastolik", "suhu", "nadi", "tinggi_badan", "berat_badan", "rr", "nps", "kepala", "thorax", "cor", "genitalia", "pemeriksaan_penunjang", "status_mentalis", "status_gizi", "hidung", "mata", "usul_tindak_lanjut", "leher", "pulmo", "abdomen", "ekstrimitas", "prognosis", "lingkar_kepala", "telinga", "tenggorok", "kulit_kelamin", "pupil_dbn", "pupil_bentuk", "pupil_ukuran", "pupil_reflek_cahaya", "nervi_cranialis_dbn", "nervi_cranialis_paresis", "rf_kiri_atas", "rf_kiri_bawah", "rf_kanan_atas", "rf_kanan_bawah", "sensorik_dbn", "sensorik_lain", "pemeriksaan_khusus", "trm_dbn", "trm_kaku_kuduk", "trm_laseque", "trm_kerning", "motorik_kiri_atas", "motorik_kiri_bawah", "motorik_kanan_atas", "motorik_kanan_bawah", "reflek_patologis", "otonom", "riwayat_kelahiran", "riwayat_nutrisi", "riwayat_imunisasi", "riwayat_tumbuh_kembang", "s_soap", "o_soap", "a_soap", "p_soap", "s_sbar", "b_sbar", "a_sbar", "r_sbar") VALUES ('680250', '2025-01-25 20:11:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pasien datang dengan keluhan tergigit anjing peliharaan orang dibagian pahan kanan atas digigit sekitar jam 3 sore. Luka gigitan tampak memar dan ada kemarahan dibagian tengah luka disertai nyeri. Keluhan demam-, mual-, muntah-. anjing tdk diketahui sudah vaksin atau belum, belum sempat ke klinik dan luka sudah di bawa mandi

RPD : DM (-), HT (-)
RPO : diberikan salep liposin (neomycin sulfate), asam mefenamat
Alergi : tidak ada', 'Ku TSR
Kes GCS 15
Nadi : 104 x/menit
RR : 20x/menit
Suhu : 36,5
SpO2 : 100 »29,6

Kepala: normocephal
Mata : Anemis -/-,  SI -/-, RC +/+, pupil isokor +/+
Leher : JVP meningkat (-), pembesaran KGB (-)
Mulut : bibir basah (+)
Faring : Hiperemis (-)
Paru : Retraksi (-), Bnd vesikular +/+, rh -/-, wh -/-
Jantung : S1S2 reguler, murmur (-), gallop (-)
Abdomen : datar, BU (+), soepel, NT (-)
Ekstremitas : akral hangat, crt &lt;2s , edema (-), turgor baik

Status lokalis : 
tampak luka gigit dan memar di regio femoris, tidak ada perdarahan aktif, luka dirasakan nyeri', 'Dog bite', 'TL IGD
WT 
Konsul Bedah 
', NULL, NULL, NULL, NULL)
ERROR - 2025-01-25 20:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:12:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:12:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:12:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:12:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:13:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:13:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:14:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:14:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:14:34 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1504
ERROR - 2025-01-25 20:16:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 20:17:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:17:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:17:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5443602, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:17:19 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5443602, '237', 9457.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5443602, '237', 9457.2, '1', '1.00', NULL, 'null')
ERROR - 2025-01-25 20:17:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:17:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:17:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:17:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:20:26 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:29:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:34:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:34:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:36:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:36:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:49:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:49:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-01-25 20:49:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:49:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-01-25 20:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:57:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:57:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:58:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 20:58:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 20:58:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 20:58:51 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:00:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 21:00:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 21:04:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 21:04:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 21:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:12:00 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:17:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 21:17:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 21:24:13 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 21:36:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 21:36:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 21:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:41:59 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:50:45 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-01-25 21:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 21:59:04 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 22:00:37 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 22:04:20 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 22:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:07:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:08:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:08:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:09:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:09:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:09:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:09:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:09:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:09:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:10:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:10:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:22:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 22:43:37 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 22:43:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-01-25 22:47:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:47:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:47:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:47:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:47:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:47:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 22:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 22:48:12 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-01-25 22:52:18 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 22:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 23:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 23:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 23:22:31 --> 404 Page Not Found --> /index
ERROR - 2025-01-25 23:23:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:23:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:28:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:28:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:37:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-01-25 23:41:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:41:03 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:20', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025
', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD
', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Fitri Sp.P</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-01-25 23:41:03')
ERROR - 2025-01-25 23:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:41:13 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:20', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025
', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD
', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Fitri Sp.P</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-01-25 23:41:13')
ERROR - 2025-01-25 23:41:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:41:21 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:20', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025
', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD
', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Fitri Sp.P</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-01-25 23:41:21')
ERROR - 2025-01-25 23:42:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:42:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:42:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:42:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:42:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:42:44 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:20', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025
', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD
', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Fitri Sp.P</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-01-25 23:42:44')
ERROR - 2025-01-25 23:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:43:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-01-25 23:43:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:42', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', 'sudah lapor &amp; konfirmasi ulang dr.Fitri Sp.P<div></div><div>Advis</div><div><br></div><div></div>', NULL, '2023', '1', NULL, '2025-01-25 23:43:34')
ERROR - 2025-01-25 23:43:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:42', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', 'sudah lapor &amp; konfirmasi ulang dr.Fitri Sp.P<div></div><div>Advis</div><div><br></div><div></div>', NULL, '2023', '1', NULL, '2025-01-25 23:43:49')
ERROR - 2025-01-25 23:43:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:51 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:42', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', 'sudah lapor &amp; konfirmasi ulang dr.Fitri Sp.P<div></div><div>Advis</div><div><br></div><div></div>', NULL, '2023', '1', NULL, '2025-01-25 23:43:51')
ERROR - 2025-01-25 23:43:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:43:54 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('680227', '2025-01-25 23:42', '8', '', '', '', '', '', '', '', '', 'Pasien penurunan kesadaran. 
pasien TB paru on OAT sejak 18 Januari 2025', 'Kesadaran Somnolen GCS E2M3V3 
TD: 82/ 61 mmHg, N:80 x/mnt, S: 36.5 C, RR: 22x/mnt, Spo2: 100 Şngan NRM 2Lpm,', ' Penkes ec Metabolik+ Post hipoglikemia +Syok Hipovolemik dd Sepsis +Asidosis metabolik + HIponatremia (123) + AKI dd ACKD + TB paru on OAT fase intensif + CAD', 'Lapor hasil lab ke dr.Fitri Sp.P', '2023', '1', 'sudah lapor &amp; konfirmasi ulang dr.Fitri Sp.P<div></div><div>Advis</div><div><br></div><div></div>', NULL, '2023', '1', NULL, '2025-01-25 23:43:54')
ERROR - 2025-01-25 23:46:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 23:46:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-01-25 23:46:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-01-25 23:46:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
