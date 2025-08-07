<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-08-06 00:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:22:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 00:22:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2021' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-08-06 00:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:28:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13013
ERROR - 2025-08-06 00:29:42 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 00:58:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:00:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (26735, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 803299, 2025-08-06 01:00:06, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 01:00:06 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (26735, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 803299, 2025-08-06 01:00:06, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('803299', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-08-06 01:00:06')
ERROR - 2025-08-06 01:00:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;is_pasien&quot; violates not-null constraint
DETAIL:  Failing row contains (26736, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 803299, 2025-08-06 01:00:10, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 01:00:10 --> Query error: ERROR:  null value in column "is_pasien" violates not-null constraint
DETAIL:  Failing row contains (26736, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, null, 803299, 2025-08-06 01:00:10, null). - Invalid query: INSERT INTO "sm_form_checklist_penerimaan_pasien_rawat_inap" ("id_layanan_pendaftaran", "is_pasien", "nama_keluarga", "perawat_yang_merawat", "dokter_yang_merawat", "nurse_station", "kamar_mandi_pasien", "bel_pasien", "tempat_tidur_pasien", "remote", "tempat_ibadah", "tempat_sampah", "jadwal_pembagian", "jadwal_visit", "jadwal_jam_berkunjung", "jadwal_ganti_linen", "membawa_barang_sesuai_keperluan", "mematuhi_peraturan", "tidak_duduk_ditempat_tidur", "menyimpan_barang_berharga", "dapat_kartu_penunggu", "menghargai_privasi_pasien", "gelang", "cuci_tangan", "updated_on") VALUES ('803299', NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2025-08-06 01:00:10')
ERROR - 2025-08-06 01:00:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 01:02:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 01:02:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 01:03:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 01:03:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 01:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 01:03:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '762' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-08-06 01:04:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 01:04:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '762' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-08-06 01:21:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 01:21:21 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1393391'),
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
			 
ERROR - 2025-08-06 02:08:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 02:08:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 02:44:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 02:44:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 02:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 02:45:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 03:51:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 03:51:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 03:52:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 03:52:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 03:55:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 03:55:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 05:41:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6797437, '547', 10350, '1000', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 05:41:38 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6797437, '547', 10350, '1000', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6797437, '547', 10350, '1000', '1.00', 'Ya', 'null')
ERROR - 2025-08-06 05:50:55 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 06:06:12 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 06:08:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:08:10 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 05:55', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":"20:00","keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":"2:30","keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul, ada pengeluaran lendir darah"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"8","anc_2":"Puskesmas Poris Gaga lama,RSUD Kota Tangeran ","anc_3":"1","anc_4":null,"anc_5":null}', '4', '3', '0', '39-40 minggu', '1-11-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"2010","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":"1","riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"TB Paru pengobatan tuntas 2018","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250 mg ', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"tidak ada"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":"1","riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB sejak anak terakhir ","riwayat_kel_berencana_7":"5 tahun ","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"20:00","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"7","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:15","kebutuhan_biologis_9":"3 hari yang lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"Ibadah solat"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":"-","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'Betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10-15","his_konteraksi_3":"lemah"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak ada kelainan ","pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '0', '5', '10', '10', '10', '5', '10', NULL, '60', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"98","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"88","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":null,"sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (hasil cek di poli)', 'kategori 1', 'EKG (+) di IGD', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":null,"discharge_planning_kebidanan_2":null,"discharge_planning_kebidanan_3":null,"discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 05:55', '295', '1', '2025-08-06 06:08', '579', '1', '2025-08-06 06:08:10')
ERROR - 2025-08-06 06:08:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:08:16 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 05:55', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":"20:00","keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":"2:30","keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul, ada pengeluaran lendir darah"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"8","anc_2":"Puskesmas Poris Gaga lama,RSUD Kota Tangeran ","anc_3":"1","anc_4":null,"anc_5":null}', '4', '3', '0', '39-40 minggu', '1-11-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"2010","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":"1","riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"TB Paru pengobatan tuntas 2018","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250 mg ', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"tidak ada"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":"1","riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB sejak anak terakhir ","riwayat_kel_berencana_7":"5 tahun ","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"20:00","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"7","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:15","kebutuhan_biologis_9":"3 hari yang lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"Ibadah solat"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":"-","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'Betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10-15","his_konteraksi_3":"lemah"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak ada kelainan ","pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '0', '5', '10', '10', '10', '5', '10', NULL, '60', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"98","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"88","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":null,"sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (hasil cek di poli)', 'kategori 1', 'EKG (+) di IGD', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":null,"discharge_planning_kebidanan_2":null,"discharge_planning_kebidanan_3":null,"discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 05:55', '295', '1', '2025-08-06 06:08', '579', '1', '2025-08-06 06:08:16')
ERROR - 2025-08-06 06:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:09:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 06:19:41 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11075
ERROR - 2025-08-06 06:21:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:21:37 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 06:11', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul dan keluar lendir darah, riwayat hipertensi"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"8","anc_2":"Puskesmas poris gaga lama, RSUD Kota Tangerang ","anc_3":null,"anc_4":null,"anc_5":null}', '4', '3', '0', '39 minggu ', '1-1-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"16","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"15","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":"1","riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250mg', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":"1","riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB ","riwayat_kel_berencana_7":"10 tahun","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"8","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:03","kebutuhan_biologis_9":"2 hari yang lalu "}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":null,"status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"solat "}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":"tidak ada"}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10","his_konteraksi_3":"lemah "}', '{"pemeriksaan_dalam_1":"1","pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '5', '5', '10', '10', '10', '5', '10', '5', '70', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":null,"sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (di poli )', 'kategori 1 ', 'EKG ', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"0","discharge_planning_kebidanan_4":"1"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":"1","kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 06:11', '295', '1', '2025-08-06 06:21', '579', '1', '2025-08-06 06:21:37')
ERROR - 2025-08-06 06:21:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:21:44 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 06:11', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul dan keluar lendir darah, riwayat hipertensi"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"8","anc_2":"Puskesmas poris gaga lama, RSUD Kota Tangerang ","anc_3":null,"anc_4":null,"anc_5":null}', '4', '3', '0', '39 minggu ', '1-1-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"16","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"15","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":"1","riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250mg', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":"1","riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB ","riwayat_kel_berencana_7":"10 tahun","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"8","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:03","kebutuhan_biologis_9":"2 hari yang lalu "}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":null,"status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"solat "}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":"tidak ada"}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10","his_konteraksi_3":"lemah "}', '{"pemeriksaan_dalam_1":"1","pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '5', '5', '10', '10', '10', '5', '10', '5', '70', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":null,"sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (di poli )', 'kategori 1 ', 'EKG ', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"0","discharge_planning_kebidanan_4":"1"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":"1","kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 06:11', '295', '1', '2025-08-06 06:21', '579', '1', '2025-08-06 06:21:44')
ERROR - 2025-08-06 06:22:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:22:18 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 06:11', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul dan keluar lendir darah, riwayat hipertensi"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"8","anc_2":"Puskesmas poris gaga lama, RSUD Kota Tangerang ","anc_3":null,"anc_4":null,"anc_5":null}', '4', '3', '0', '39 minggu ', '1-1-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"16","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"15","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":"1","riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250mg', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":"1","riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB ","riwayat_kel_berencana_7":"10 tahun","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"8","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:03","kebutuhan_biologis_9":"2 hari yang lalu "}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":null,"status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"solat "}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":"tidak ada"}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10","his_konteraksi_3":"lemah "}', '{"pemeriksaan_dalam_1":"1","pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '5', '5', '10', '10', '10', '5', '10', '5', '70', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":null,"sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (di poli )', 'kategori 1 ', 'EKG ', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"0","discharge_planning_kebidanan_4":"1"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":"1","kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 06:11', '295', '1', '2025-08-06 06:21', '579', '1', '2025-08-06 06:22:18')
ERROR - 2025-08-06 06:22:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  value too long for type character varying(16) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:22:24 --> Query error: ERROR:  value too long for type character varying(16) - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('803319', '742048', '1355', '2025-08-06 06:11', '{"cara_tiba_diruangan_pasien":null}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":"1","keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"Mulas hilang timbul dan keluar lendir darah, riwayat hipertensi"}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":"1","hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"8","anc_2":"Puskesmas poris gaga lama, RSUD Kota Tangerang ","anc_3":null,"anc_4":null,"anc_5":null}', '4', '3', '0', '39 minggu ', '1-1-2024', '8-8-2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"16","riwayat_menstruasi_4":"3-4","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":"1"}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"15","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":"1","riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'dopamet 3x250mg', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":"1","riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":"1","riwayat_kel_berencana_6":"tidak KB ","riwayat_kel_berencana_7":"10 tahun","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"tidak ada"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"8","kebutuhan_biologis_4":"5:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"5:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:03","kebutuhan_biologis_9":"2 hari yang lalu "}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":null,"kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":null,"status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"solat "}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi ', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":"1","infeksi_abdomen_10":"tidak ada"}', '{"palpasi_1":"37","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"3773"}', '{"auskultasi_1":"145","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '5', '{"his_konteraksi_1":"1-2","his_konteraksi_2":"10","his_konteraksi_3":"lemah "}', '{"pemeriksaan_dalam_1":"1","pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":"1","pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"2","pemeriksaan_dalam_10":"1","pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":"0"}', '5', '5', '5', '5', '10', '10', '10', '5', '10', '5', '70', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', NULL, '10', '20', '0', NULL, '65', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"145","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"89","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"87","berat_badan_2":"160"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":null,"sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '1_3', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-08-05', '2025-08-06', 'terlampir (di poli )', 'kategori 1 ', 'EKG ', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"0","discharge_planning_kebidanan_4":"1"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":"1","kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-08-06 06:11', '295', '1', '2025-08-06 06:21', '579', '1', '2025-08-06 06:22:24')
ERROR - 2025-08-06 06:26:30 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 06:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:27:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-06 07.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-08-06 07.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:27:44 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-06 07.00"
LINE 4: AND "lo_tgl" = '2025-08-06 07.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1819'
AND "lo_tgl" = '2025-08-06 07.00'
AND "id_layanan_pendaftaran" = '803292'
ERROR - 2025-08-06 06:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-06 07.00&quot;
LINE 4: AND &quot;lo_tgl&quot; = '2025-08-06 07.00'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:27:51 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-06 07.00"
LINE 4: AND "lo_tgl" = '2025-08-06 07.00'
                       ^ - Invalid query: SELECT *
FROM "sm_kep_73_01"
WHERE "id_user" = '1819'
AND "lo_tgl" = '2025-08-06 07.00'
AND "id_layanan_pendaftaran" = '803292'
ERROR - 2025-08-06 06:30:11 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessionbc82b110f3a2eb4ae0617a9096ca3f0c2999a581 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-08-06 06:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:37:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11639
ERROR - 2025-08-06 06:37:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:38:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:38:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:38:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 06:39:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...S (6797512, '1201', 108355.536, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:39:00 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...S (6797512, '1201', 108355.536, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6797512, '1201', 108355.536, '100', '1.00', 'Ya', 'null')
ERROR - 2025-08-06 06:39:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:39:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 06:39:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:39:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 06:39:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:39:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 06:39:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:43:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:43:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:46:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:48:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:48:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:49:42 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-08-06 06:49:42 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-08-06 06:49:42 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-08-06 06:52:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:53:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:53:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:54:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:55:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:55:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:56:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060050) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:56:04 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060050) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060050', '00380446', '2025-08-06 06:56:02', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049084031', NULL, '0223U0110625Y001543', 'Lama', NULL, 1773, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806A083')
ERROR - 2025-08-06 06:56:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:56:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:56:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:57:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:57:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060062) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 06:57:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060062) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060062', '00380401', '2025-08-06 06:57:20', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003096876543', NULL, '022300040625Y003694', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Orthodonti', 0, 2, NULL, '20250806B084')
ERROR - 2025-08-06 06:57:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 06:57:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:58:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:58:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:58:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 06:59:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:00:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:00:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:01:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:01:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:02:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:04:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:05:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:08:37 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11075
ERROR - 2025-08-06 07:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:09:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:09:59 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11075
ERROR - 2025-08-06 07:10:38 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:11:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:11:29 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:13:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:13:31 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:14:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:14:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:15:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:15:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:16:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 07:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:16:23 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 07:16:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:17:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060106) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:17:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060106) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060106', '00033201', '2025-08-06 07:17:43', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001390320628', NULL, '102501020725Y000330', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806B306')
ERROR - 2025-08-06 07:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:19:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:20:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:22:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:22:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:22:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:23:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:23:07 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 11: WHERE "pd"."id" = 'null'
                           ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah", "ab"."id" as "id_antrian_bpjs", "ab"."no_rm" "id_pasien_antrian_bpjs", "ab"."kode_booking" "kode_booking_antrian_bpjs", "ab"."no_kartu" "no_kartu_antrian_bpjs", "ab"."no_referensi", "ab"."id_jadwal_dokter", "jd"."tanggal" "tanggal_jadwal", "jd"."nama_poli" "nama_poli_jadwal", "jd"."shift_poli", "jd"."nama_dokter" "nama_dokter_jadwal"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."id" = 'null'
ERROR - 2025-08-06 07:23:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:24:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:24:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 07:24:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:24:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 07:24:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:24:56 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:25:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060121) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:26:11 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060121) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060121', '00064547', '2025-08-06 07:26:10', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000163335666', NULL, NULL, 'Lama', '0', '2129', 1, 'Belum', 'Laboratorium ', 0, 2, '', NULL)
ERROR - 2025-08-06 07:26:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:26:38 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:26:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060124) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:26:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060124) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060124', '00232731', '2025-08-06 07:26:45', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001258437622', NULL, '0223U1130525Y002724', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806A148')
ERROR - 2025-08-06 07:27:41 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:27:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:27:52 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:27:56 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-08-06 07:27:56 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-08-06 07:27:58 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-08-06 07:27:58 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:28:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:28:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:28:20 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-08-06 07:28:20 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-08-06 07:28:22 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-08-06 07:28:22 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-08-06 07:28:22 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-08-06 07:28:25 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-08-06 07:28:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250806B345) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:28:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250806B345) already exists. - Invalid query: UPDATE "sm_antrian_bpjs" SET "id_dokter" = '84', "nama_dokter" = 'dr. DHANI Sp.KFR', "kode_bpjs_dokter" = '260884', "tanggal_kunjungan" = '2025-08-06', "kode_booking" = '20250806B345', "urutan" = 345, "nomor_antrean" = 'B345', "id_jadwal_dokter" = '61909', "kadaluarsa_rujukan" = '2025-09-05', "kode_bpjs_poli_rujukan" = 'ORT'
WHERE "id" = '626501'
ERROR - 2025-08-06 07:29:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:29:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:29:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:29:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:29:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:30:05 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:30:23 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessionb821c9450eaa7b9b1355f4e5f9558243cd60f32b /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-08-06 07:30:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 9: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:30:39 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 9: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."kode_bpjs_dokter" IS NOT NULL
AND "jd"."kode_bpjs_dokter" != ''
AND "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-08-06 07:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:31:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:32:11 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-08-06 07:33:01 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:33:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 07:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:33:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 07:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:33:27 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 11: WHERE "pd"."id" = 'undefined'
                           ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah", "ab"."id" as "id_antrian_bpjs", "ab"."no_rm" "id_pasien_antrian_bpjs", "ab"."kode_booking" "kode_booking_antrian_bpjs", "ab"."no_kartu" "no_kartu_antrian_bpjs", "ab"."no_referensi", "ab"."id_jadwal_dokter", "jd"."tanggal" "tanggal_jadwal", "jd"."nama_poli" "nama_poli_jadwal", "jd"."shift_poli", "jd"."nama_dokter" "nama_dokter_jadwal"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."id" = 'undefined'
ERROR - 2025-08-06 07:33:33 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:33:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060146) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:33:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060146) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060146', '00235198', '2025-08-06 07:33:55', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003055790913', NULL, '102501070825Y000547', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik Anak', 0, '2', '', '20250806F012')
ERROR - 2025-08-06 07:34:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:34:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:35:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:35:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:35:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:36:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:36:17 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:36:24 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 07:36:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:36:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:36:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:36:56 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:37:24 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 07:37:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:38:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 7:                 and sl.id_jenis_pemeriksaan = 16
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:38:01 --> Query error: ERROR:  syntax error at or near "and"
LINE 7:                 and sl.id_jenis_pemeriksaan = 16
                        ^ - Invalid query: select *
                from sm_tarif_tindakan_pasien sttp
                        join sm_tarif_pelayanan stp on sttp.id_tarif_pelayanan = stp.id
                        join sm_layanan as sl on sl.id = stp.id_layanan
                where sttp.id_operator = 672
                and sttp.id_layanan_pendaftaran = 
                and sl.id_jenis_pemeriksaan = 16
                and sttp.tanggal::date = now()::date
ERROR - 2025-08-06 07:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 7:                 and sl.id_jenis_pemeriksaan = 16
                        ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:38:07 --> Query error: ERROR:  syntax error at or near "and"
LINE 7:                 and sl.id_jenis_pemeriksaan = 16
                        ^ - Invalid query: select *
                from sm_tarif_tindakan_pasien sttp
                        join sm_tarif_pelayanan stp on sttp.id_tarif_pelayanan = stp.id
                        join sm_layanan as sl on sl.id = stp.id_layanan
                where sttp.id_operator = 672
                and sttp.id_layanan_pendaftaran = 
                and sl.id_jenis_pemeriksaan = 16
                and sttp.tanggal::date = now()::date
ERROR - 2025-08-06 07:38:24 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 07:38:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060159) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:38:29 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060159) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060159', '00240107', '2025-08-06 07:38:28', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002250977793', NULL, '022300040825Y000277', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250806B354')
ERROR - 2025-08-06 07:38:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:38:53 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:39:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:39:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:39:26 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 07:39:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:40:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:40:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:40:41 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 07:41:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:42:17 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-08-06 07:42:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:42:17 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-08-06 07:42:22 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:42:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:42:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-08-06 07:42:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-08-06 07:42:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 911
ERROR - 2025-08-06 07:42:39 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 915
ERROR - 2025-08-06 07:42:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:42:48 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:42:48 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:42:55 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:42:55 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:43:11 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 113
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 114
ERROR - 2025-08-06 07:43:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/views/lap_buku_penjualan/export.php 139
ERROR - 2025-08-06 07:43:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:43:33 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:43:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:43:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:44:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:44:07 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:44:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 768
ERROR - 2025-08-06 07:44:18 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/laporan_inventory/models/Laporan_inventory_model.php 772
ERROR - 2025-08-06 07:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:45:21 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:45:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:46:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:46:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:46:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:46:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:46:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060183) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:46:38 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060183) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060183', '00351609', '2025-08-06 07:46:22', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000814781799', NULL, '022300050525Y001095', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Orthopaedi', 0, 2, NULL, '20250806B006')
ERROR - 2025-08-06 07:46:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:47:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:48:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:48:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:48:46 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:48:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060188) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:48:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060188) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060188', '00081242', '2025-08-06 07:48:33', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002062095164', NULL, '022300090725Y001177', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806B261')
ERROR - 2025-08-06 07:49:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:49:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4893
ERROR - 2025-08-06 07:50:06 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4987
ERROR - 2025-08-06 07:50:42 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:51:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:13 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:52:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:22 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:37 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 07:52:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:53:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:53:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 00:53:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 07:53:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:53:33 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:53:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 00:53:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 07:53:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:54:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:54:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 07:54:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:54:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:55:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:55:46 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 07:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:56:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:56:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060210) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:56:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060210) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060210', '00061482', '2025-08-06 07:56:49', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002103014452', NULL, '0223R0100725B000408', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Jantung', 0, '2', '', '20250806B360')
ERROR - 2025-08-06 07:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:57:11 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 00:57:41 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 00:57:41 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 07:57:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 00:57:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 00:57:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 07:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:58:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 07:58:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 07:58:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 07:58:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:59:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:59:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 07:59:54 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:00:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:00:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:00:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:00:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND "ab"."no_kartu" = '0002944349504'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:00:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:00:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:00:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:00:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:01:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:02:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:02:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:03:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:03:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 08:03:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060232) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:03:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060232) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060232', '00073890', '2025-08-06 08:03:52', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0000048876041', NULL, '102504020725Y004921', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806A100')
ERROR - 2025-08-06 08:03:58 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:04:24 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:05:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:05:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:05:59 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:06:04 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:06:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:06:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:06:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 08:06:31 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-08-06 08:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:06:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:07:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:07:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 08:07:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:07:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 08:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:08:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250806B378) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:08:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250806B378) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "waktu_estimasi", "sisa_kuota", "total_kuota", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250806B378', '378', 'B378', 'B', '2025-08-06', '0', '2025-08-06 08:08:02', 'Booking', 'APM', 'Asuransi', 0, 0, '1765', '00260646', 674, 344638, 11, 'ANA', '0895332674999', '3671112703100003', '2010-03-27', 'dr. Angelia Septiane Beandda, DPPS, Sp.A', 1, 'Asuransi', '200', 'Ok.', '0', '61024', '2025-08-06  18:35:00', 47, '60', '0001173647687', 'JKN', NULL, '1', NULL, '0496B0000825Y000760', 'KLINIK DIANA PERMATA', '2025-11-04', 'ANA', '1', NULL, NULL, '11', 'Sudah', 200, 'Ok.')
ERROR - 2025-08-06 08:08:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:08:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:08:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:09:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:09:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 01:09:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:10:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:10:31 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:10:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:10:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060245) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:10:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060245) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060245', '00376003', '2025-08-06 08:10:18', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002355624595', NULL, '102501060525Y002280', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250806B378')
ERROR - 2025-08-06 08:10:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:11:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:11:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:11:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:12:34 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_02_skpk.php 242
ERROR - 2025-08-06 08:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:12:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot; 00:00:00&quot;
LINE 1: ...created_at&quot;) VALUES ('69', 'ket_uji_sehat', '25', ' 00:00:00...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:12:43 --> Query error: ERROR:  invalid input syntax for type timestamp: " 00:00:00"
LINE 1: ...created_at") VALUES ('69', 'ket_uji_sehat', '25', ' 00:00:00...
                                                             ^ - Invalid query: INSERT INTO "sm_mcu_kirim_online_detail" ("id_mcu_kirim", "jenis_file", "id_file", "tanggal_file", "lokasi_file", "id_cloud", "id_user", "created_at") VALUES ('69', 'ket_uji_sehat', '25', ' 00:00:00', 'http://192.168.77.101/storage/file_pdf/KET_UJI_SEHAT-2203100080.pdf', 111, '1460', '2025-08-06 08:12:47')
ERROR - 2025-08-06 08:12:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:12:54 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:13:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:14:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 01:14:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:14:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:14:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060258) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:14:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060258) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060258', '00129690', '2025-08-06 08:14:28', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002070627704', NULL, '022300090525Y002663', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250806B382')
ERROR - 2025-08-06 08:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:14:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:14:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A052%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:15:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:15:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:15:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:15:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:15:19 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:15:19 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:15:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:15:33 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 59
ERROR - 2025-08-06 08:15:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:15:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:41 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:17:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:17:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-08-06 08:17:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:18:57 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:19:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:19:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:19:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:19:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:19:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:19:44 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:19:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:19:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:19:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:19:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:06 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:21:56 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:21:56 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:21:56 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:22:08 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:22:08 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:22:08 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:22:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:22:46 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4915063'
ERROR - 2025-08-06 08:23:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:23:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:23:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:24:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:24:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:25:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:25:45 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:25:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:25:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:25:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:25:57 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:25:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:25:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:26:07 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND "ab"."no_kartu" = '0002758044699'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:26:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:26:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:26:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:26:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:26:16 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:26:16 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:26:16 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:26:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:26:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060287) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:26:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060287) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060287', '00076086', '2025-08-06 08:26:17', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049354874', NULL, '022300090725Y002533', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250806A081')
ERROR - 2025-08-06 08:26:44 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:26:44 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:26:44 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 01:26:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:26:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:26:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:27:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:27:10 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:27:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND "ab"."no_kartu" = '0002758044699'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:13 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:27:13 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:27:13 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:15 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;23/04/1992&quot;
LINE 1: ..., &quot;tempat_lahir&quot; = 'MOJOKERTO', &quot;tanggal_lahir&quot; = '23/04/199...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:17 --> Query error: ERROR:  date/time field value out of range: "23/04/1992"
LINE 1: ..., "tempat_lahir" = 'MOJOKERTO', "tanggal_lahir" = '23/04/199...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_pasien" SET "id" = '00197488', "rm_lama" = '', "tanggal_daftar" = '2025-08-06 08:27:17', "no_identitas" = '3516136304920002', "nama" = 'NUR CHOIRUM MAUZUROH', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'MOJOKERTO', "tanggal_lahir" = '23/04/1992', "alamat" = 'BONA SARANA INDAH BLOK G1 NO.10 ', "no_prop" = '36', "nama_prop" = NULL, "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '1', "nama_kec" = 'TANGERANG', "no_kel" = '1005', "nama_kel" = 'CIKOKOL', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '65', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '089601620959', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '007', "no_rt" = '007', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-08-06 08:27:17'
WHERE "id" = '00197488'
ERROR - 2025-08-06 01:27:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:27:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:27:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:20 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  date/time field value out of range: &quot;23/04/1992&quot;
LINE 1: ..., &quot;tempat_lahir&quot; = 'MOJOKERTO', &quot;tanggal_lahir&quot; = '23/04/199...
                                                             ^
HINT:  Perhaps you need a different &quot;datestyle&quot; setting. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:21 --> Query error: ERROR:  date/time field value out of range: "23/04/1992"
LINE 1: ..., "tempat_lahir" = 'MOJOKERTO', "tanggal_lahir" = '23/04/199...
                                                             ^
HINT:  Perhaps you need a different "datestyle" setting. - Invalid query: UPDATE "sm_pasien" SET "id" = '00197488', "rm_lama" = '', "tanggal_daftar" = '2025-08-06 08:27:20', "no_identitas" = '3516136304920002', "nama" = 'NUR CHOIRUM MAUZUROH', "status_pasien" = NULL, "kelamin" = 'P', "tempat_lahir" = 'MOJOKERTO', "tanggal_lahir" = '23/04/1992', "alamat" = 'BONA SARANA INDAH BLOK G1 NO.10 ', "no_prop" = '36', "nama_prop" = NULL, "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '1', "nama_kec" = 'TANGERANG', "no_kel" = '1005', "nama_kel" = 'CIKOKOL', "agama" = 'Islam', "gol_darah" = NULL, "id_pendidikan" = '8', "id_pekerjaan" = '65', "status_kawin" = 'Kawin', "nama_ayah" = NULL, "nama_ibu" = NULL, "telp" = '089601620959', "id_etnis" = '5', "etnis_lainnya" = NULL, "hamkom" = '', "hamkom_lainnya" = NULL, "status" = 'Hidup', "disabilitas" = 0, "no_rw" = '007', "no_rt" = '007', "no_rumah" = NULL, "kode_pos" = NULL, "is_pegawai_rsud" = 0, "email" = NULL, "last_active" = '2025-08-06 08:27:21'
WHERE "id" = '00197488'
ERROR - 2025-08-06 01:27:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:27:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:27:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:25 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:27:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:27:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:30 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060290) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:33 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060290) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060290', '00197488', '2025-08-06 08:27:33', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002758044699', NULL, '0223B1570725P002254', 'Baru', NULL, 1768, 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, 2, NULL, '20250806A104')
ERROR - 2025-08-06 08:27:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:35 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060291) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060291) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060291', '00197488', '2025-08-06 08:27:39', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002758044699', NULL, '0223B1570725P002254', 'Baru', NULL, 1768, 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, 2, NULL, '20250806A104')
ERROR - 2025-08-06 08:27:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:45 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:27:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:27:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:28:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:28:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:28:04 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:28:17 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-08-06 08:28:17 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 898
ERROR - 2025-08-06 08:28:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:28:27 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 11: WHERE "pd"."id" = 'null'
                           ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah", "ab"."id" as "id_antrian_bpjs", "ab"."no_rm" "id_pasien_antrian_bpjs", "ab"."kode_booking" "kode_booking_antrian_bpjs", "ab"."no_kartu" "no_kartu_antrian_bpjs", "ab"."no_referensi", "ab"."id_jadwal_dokter", "jd"."tanggal" "tanggal_jadwal", "jd"."nama_poli" "nama_poli_jadwal", "jd"."shift_poli", "jd"."nama_dokter" "nama_dokter_jadwal"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."id" = 'null'
ERROR - 2025-08-06 08:28:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:28:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:28:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:29:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:29:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-08-06 08:29:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:29:30 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:29:30 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:29:30 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:29:39 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:29:39 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:29:39 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:30:05 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:30:05 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:30:05 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:30:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:30:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:30:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:30:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:31:05 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:31:05 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:31:33 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:31:33 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:31:33 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:31:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:31:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:31:45 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:31:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:31:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:31:53 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-08-06 08:31:53 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-08-06 08:31:53 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-08-06 08:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:32:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:32:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:32:34 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00380656'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-08-06 08:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:33:06 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:33:16 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:33:16 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:33:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:33:24 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:33:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:33:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 01:33:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:34:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:34:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:34:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:34:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:34:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:34:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:34:06 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:34:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060310) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:34:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060310) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060310', '00094039', '2025-08-06 08:33:58', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816482248', NULL, '022310070625Y000452', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250806B055')
ERROR - 2025-08-06 08:34:10 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:12 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:31 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:34:57 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:35:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060315) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:35:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060315) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060315', '00196861', '2025-08-06 08:35:17', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 9, '', NULL, NULL, 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Cemara', 0, 2, NULL, '20250806C019')
ERROR - 2025-08-06 08:35:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-04 09.30&quot;
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:35:34 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-04 09.30"
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ - Invalid query: INSERT INTO "sm_konsultasi_gizi" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "kg_bb", "kg_lla", "kg_pbb", "kg_tb", "kg_imt", "kg_biokimia", "kg_klinis", "kg_gizi", "kg_personal", "kg_diagnosis", "kg_tujuan", "kg_intervensi", "kg_konseling", "kg_evaluasi", "kg_tgl_petugas", "kg_petugas", "kg_ttd", "kg_dokter", "kg_ttd_dokter", "created_at") VALUES ('740411', '801591', '00384017', '1433', '18', NULL, NULL, '115', NULL, ' Laboratorium tanggal 3/8/2025 : Hemoglobin 13.0 g/dL / Hematokrit 37 / Leukosit 12.5 / Trombosit 287, gds jam 06 : 71. ', 'BB = 18 Kg, TB = 115 cm. BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. HA 6 tahun 9 bulan, BBI = 21 kg. Kesan : Perawakan pendek, Berat badan kurang. Status gizi kurang. RR : 22 x/menit, O2 Saturasi 99 persen dengan NK 2 lpm. Pengembangan dada simetris, Rhonki -/-, batuk (+). C: akral hangat, nadi teraba kuat, CRT &lt; 3 detik, TD: 110/71 mmhg, map 83 mmhg Nadi : 124 x/menit, Terpasang IVFD TAKI No.24 Tanggal 03/08/2025 nacl 0,9 persen 60 cc per jam. D: Kesadaran Compos Mentis, GCS 15 E4M6V5, otot 5/5/5/5. E: Suhu 36.4 C, Terpasang DC No.8, Diuresis: 1,3 cc/kgbb/jam. BB: 18 Kg.', 'asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis, sudah coba diberikan susu bubuk tapi menolak.', 'Riw naik BB susah, dari dulu memang susah makan, selalu marah jika diminta makan. OS SD kelas 2.', 'Malnutrisi berkaitan dengan kekurangan energi protein kronis ditandai dengan BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. ; Inadekuat oral intake berkaitan dengan penurunan nafsu makan ditandai dengan asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis.
', NULL, 'Diet BB TKTP; E = 1300 Kkal P 48.75 gr (15 persen), L 57.78 gr (40 persen), KH 146.25 gr (45 persen) cairan 1400 ml;  bentuk makan biasa jalur oral. Frekuensi 3 kali makan 2 kali selingan. ', 'Edukasi Gizi dan konsultasi gizi diet BB anak kurang ke ibu pasien.
', 'Asupan makan lebih dari 90 persen secara bertahap. BB naik secara bertahap sampai KBM.', '2025-08-04 09.30', '1433', '1', '440', '1', '2025-08-06 08:35:34')
ERROR - 2025-08-06 08:35:36 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:35:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-04 09.31&quot;
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:35:41 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-04 09.31"
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ - Invalid query: INSERT INTO "sm_konsultasi_gizi" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "kg_bb", "kg_lla", "kg_pbb", "kg_tb", "kg_imt", "kg_biokimia", "kg_klinis", "kg_gizi", "kg_personal", "kg_diagnosis", "kg_tujuan", "kg_intervensi", "kg_konseling", "kg_evaluasi", "kg_tgl_petugas", "kg_petugas", "kg_ttd", "kg_dokter", "kg_ttd_dokter", "created_at") VALUES ('740411', '801591', '00384017', '1433', '18', NULL, NULL, '115', NULL, ' Laboratorium tanggal 3/8/2025 : Hemoglobin 13.0 g/dL / Hematokrit 37 / Leukosit 12.5 / Trombosit 287, gds jam 06 : 71. ', 'BB = 18 Kg, TB = 115 cm. BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. HA 6 tahun 9 bulan, BBI = 21 kg. Kesan : Perawakan pendek, Berat badan kurang. Status gizi kurang. RR : 22 x/menit, O2 Saturasi 99 persen dengan NK 2 lpm. Pengembangan dada simetris, Rhonki -/-, batuk (+). C: akral hangat, nadi teraba kuat, CRT &lt; 3 detik, TD: 110/71 mmhg, map 83 mmhg Nadi : 124 x/menit, Terpasang IVFD TAKI No.24 Tanggal 03/08/2025 nacl 0,9 persen 60 cc per jam. D: Kesadaran Compos Mentis, GCS 15 E4M6V5, otot 5/5/5/5. E: Suhu 36.4 C, Terpasang DC No.8, Diuresis: 1,3 cc/kgbb/jam. BB: 18 Kg.', 'asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis, sudah coba diberikan susu bubuk tapi menolak.', 'Riw naik BB susah, dari dulu memang susah makan, selalu marah jika diminta makan. OS SD kelas 2.', 'Malnutrisi berkaitan dengan kekurangan energi protein kronis ditandai dengan BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. ; Inadekuat oral intake berkaitan dengan penurunan nafsu makan ditandai dengan asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis.
', NULL, 'Diet BB TKTP; E = 1300 Kkal P 48.75 gr (15 persen), L 57.78 gr (40 persen), KH 146.25 gr (45 persen) cairan 1400 ml;  bentuk makan biasa jalur oral. Frekuensi 3 kali makan 2 kali selingan. ', 'Edukasi Gizi dan konsultasi gizi diet BB anak kurang ke ibu pasien.
', 'Asupan makan lebih dari 90 persen secara bertahap. BB naik secara bertahap sampai KBM.', '2025-08-04 09.31', '1433', '1', '440', '1', '2025-08-06 08:35:41')
ERROR - 2025-08-06 08:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:35:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...umah&quot; = 'G1 NO 10', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:35:59 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...umah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00197488', "status_pasien" = NULL, "nama" = 'NUR CHOIRUM MAUZUROH', "kelamin" = 'P', "tempat_lahir" = '', "tanggal_lahir" = '1992-04-23', "alamat" = 'BONA SARANA INDAH BLOK G1 NO.10 ', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '1', "nama_kec" = 'TANGERANG', "no_kel" = '1005', "nama_kel" = 'CIKOKOL', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '8', "id_pekerjaan" = '65', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3516136304920002', "telp" = '089601620959', "status" = 'Hidup', "no_rt" = '007', "no_rw" = '007', "no_rumah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-08-06 08:35:59'
WHERE "id" = '00197488'
ERROR - 2025-08-06 08:36:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...umah&quot; = 'G1 NO 10', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:36:02 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...umah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00197488', "status_pasien" = NULL, "nama" = 'NUR CHOIRUM MAUZUROH', "kelamin" = 'P', "tempat_lahir" = '', "tanggal_lahir" = '1992-04-23', "alamat" = 'BONA SARANA INDAH BLOK G1 NO.10 ', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '1', "nama_kec" = 'TANGERANG', "no_kel" = '1005', "nama_kel" = 'CIKOKOL', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '8', "id_pekerjaan" = '65', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3516136304920002', "telp" = '089601620959', "status" = 'Hidup', "no_rt" = '007', "no_rw" = '007', "no_rumah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-08-06 08:36:02'
WHERE "id" = '00197488'
ERROR - 2025-08-06 08:36:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...umah&quot; = 'G1 NO 10', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:36:10 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...umah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00197488', "status_pasien" = NULL, "nama" = 'NUR CHOIRUM MAUZUROH', "kelamin" = 'P', "tempat_lahir" = '', "tanggal_lahir" = '1992-04-23', "alamat" = 'BONA SARANA INDAH BLOK G1 NO.10 ', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '1', "nama_kec" = 'TANGERANG', "no_kel" = '1005', "nama_kel" = 'CIKOKOL', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '8', "id_pekerjaan" = '65', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3516136304920002', "telp" = '089601620959', "status" = 'Hidup', "no_rt" = '007', "no_rw" = '007', "no_rumah" = 'G1 NO 10', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-08-06 08:36:10'
WHERE "id" = '00197488'
ERROR - 2025-08-06 08:36:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:36:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-08-06 08:36:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:45 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:36:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-04 12.31&quot;
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:36:51 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-04 12.31"
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ - Invalid query: INSERT INTO "sm_konsultasi_gizi" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "kg_bb", "kg_lla", "kg_pbb", "kg_tb", "kg_imt", "kg_biokimia", "kg_klinis", "kg_gizi", "kg_personal", "kg_diagnosis", "kg_tujuan", "kg_intervensi", "kg_konseling", "kg_evaluasi", "kg_tgl_petugas", "kg_petugas", "kg_ttd", "kg_dokter", "kg_ttd_dokter", "created_at") VALUES ('740411', '801591', '00384017', '1433', '18', NULL, NULL, '115', NULL, ' Laboratorium tanggal 3/8/2025 : Hemoglobin 13.0 g/dL / Hematokrit 37 / Leukosit 12.5 / Trombosit 287, gds jam 06 : 71. ', 'BB = 18 Kg, TB = 115 cm. BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. HA 6 tahun 9 bulan, BBI = 21 kg. Kesan : Perawakan pendek, Berat badan kurang. Status gizi kurang. RR : 22 x/menit, O2 Saturasi 99 persen dengan NK 2 lpm. Pengembangan dada simetris, Rhonki -/-, batuk (+). C: akral hangat, nadi teraba kuat, CRT &lt; 3 detik, TD: 110/71 mmhg, map 83 mmhg Nadi : 124 x/menit, Terpasang IVFD TAKI No.24 Tanggal 03/08/2025 nacl 0,9 persen 60 cc per jam. D: Kesadaran Compos Mentis, GCS 15 E4M6V5, otot 5/5/5/5. E: Suhu 36.4 C, Terpasang DC No.8, Diuresis: 1,3 cc/kgbb/jam. BB: 18 Kg.', 'asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis, sudah coba diberikan susu bubuk tapi menolak.', 'Riw naik BB susah, dari dulu memang susah makan, selalu marah jika diminta makan. OS SD kelas 2.', 'Malnutrisi berkaitan dengan kekurangan energi protein kronis ditandai dengan BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. ; Inadekuat oral intake berkaitan dengan penurunan nafsu makan ditandai dengan asupan makan &lt;30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis.
', 'Meningkatkan asupan makan sehingga berat badan naik ', 'Diet BB TKTP; E = 1300 Kkal P 48.75 gr (15 persen), L 57.78 gr (40 persen), KH 146.25 gr (45 persen) cairan 1400 ml;  bentuk makan biasa jalur oral. Frekuensi 3 kali makan 2 kali selingan. ', 'Edukasi Gizi dan konsultasi gizi diet BB anak kurang ke ibu pasien.
', 'Asupan makan lebih dari 90 persen secara bertahap. BB naik secara bertahap sampai KBM.', '2025-08-04 12.31', '1433', '1', '440', '1', '2025-08-06 08:36:51')
ERROR - 2025-08-06 08:36:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:36:56 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:44 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-08-04 12.31&quot;
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:37:46 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-08-04 12.31"
LINE 3: ...a bertahap. BB naik secara bertahap sampai KBM.', '2025-08-0...
                                                             ^ - Invalid query: INSERT INTO "sm_konsultasi_gizi" ("id_pendaftaran", "id_layanan_pendaftaran", "id_pasien", "id_users", "kg_bb", "kg_lla", "kg_pbb", "kg_tb", "kg_imt", "kg_biokimia", "kg_klinis", "kg_gizi", "kg_personal", "kg_diagnosis", "kg_tujuan", "kg_intervensi", "kg_konseling", "kg_evaluasi", "kg_tgl_petugas", "kg_petugas", "kg_ttd", "kg_dokter", "kg_ttd_dokter", "created_at") VALUES ('740411', '801591', '00384017', '1433', '18', NULL, NULL, '115', NULL, ' Laboratorium tanggal 3/8/2025 : Hemoglobin 13.0 g/dL / Hematokrit 37 / Leukosit 12.5 / Trombosit 287, gds jam 06 : 71. ', 'BB = 18 Kg, TB = 115 cm. BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. HA 6 tahun 9 bulan, BBI = 21 kg. Kesan : Perawakan pendek, Berat badan kurang. Status gizi kurang. RR : 22 x/menit, O2 Saturasi 99 persen dengan NK 2 lpm. Pengembangan dada simetris, Rhonki -/-, batuk (+). C: akral hangat, nadi teraba kuat, CRT kurang dari 3 detik, TD: 110/71 mmhg, map 83 mmhg Nadi : 124 x/menit, Terpasang IVFD TAKI No.24 Tanggal 03/08/2025 nacl 0,9 persen 60 cc per jam. D: Kesadaran Compos Mentis, GCS 15 E4M6V5, otot 5/5/5/5. E: Suhu 36.4 C, Terpasang DC No.8, Diuresis: 1,3 cc/kgbb/jam. BB: 18 Kg.', 'asupan makan  kurang dari 30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis, sudah coba diberikan susu bubuk tapi menolak.', 'Riw naik BB susah, dari dulu memang susah makan, selalu marah jika diminta makan. OS SD kelas 2.', 'Malnutrisi berkaitan dengan kekurangan energi protein kronis ditandai dengan BB/U = P3-10 (75 persen) , PB/U P10 (94.4 persen) BB/PB = 85.7 persen. ; Inadekuat oral intake berkaitan dengan penurunan nafsu makan ditandai dengan asupan makan kurang dari 30 persen, OS cenderung tidur sehingga tidak mau makan, Riw SMRS makan hanya 1 kali satu hari, bahkan 2 hari tidak makan, OS hanya jajan papeda dan jajanan sekolah lainnya, setiap pagi konsumsi Susu kental manis.
', 'Meningkatkan asupan makan sehingga berat badan naik ', 'Diet BB TKTP; E = 1300 Kkal P 48.75 gr (15 persen), L 57.78 gr (40 persen), KH 146.25 gr (45 persen) cairan 1400 ml;  bentuk makan biasa jalur oral. Frekuensi 3 kali makan 2 kali selingan. ', 'Edukasi Gizi dan konsultasi gizi diet BB anak kurang ke ibu pasien.
', 'Asupan makan lebih dari 90 persen secara bertahap. BB naik secara bertahap sampai KBM.', '2025-08-04 12.31', '1433', '1', '440', '1', '2025-08-06 08:37:46')
ERROR - 2025-08-06 08:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  insert or update on table &quot;sm_order_laboratorium&quot; violates foreign key constraint &quot;sm_order_laboratorium_id_dokter_fkey&quot;
DETAIL:  Key (id_dokter)=(0) is not present in table &quot;sm_tenaga_medis&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:38:00 --> Query error: ERROR:  insert or update on table "sm_order_laboratorium" violates foreign key constraint "sm_order_laboratorium_id_dokter_fkey"
DETAIL:  Key (id_dokter)=(0) is not present in table "sm_tenaga_medis". - Invalid query: UPDATE "sm_order_laboratorium" SET "id_dokter" = 0, "item" = '[{"item":"2739", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2737", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2741", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2735", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2753", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2749", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2745", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"2940", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""},{"item":"10457", "penjamin":"0", "cito":"tidak", "item_lab":[] , "item_lab_label":"", "keterangan":""}]', "jenis" = 'Patologi Klinik'
WHERE "id" = 332591
ERROR - 2025-08-06 08:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:38:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:39:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:39:51 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:40:29 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:41:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:41:39 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 08:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:41:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:41:55 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:41:58 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:42:03 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 01:42:03 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 01:42:04 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 01:42:04 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:42:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060333) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:42:19 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060333) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060333', '00380717', '2025-08-06 08:42:05', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001640722915', NULL, '102504050825Y000364', 'Lama', NULL, 1773, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250806B401')
ERROR - 2025-08-06 08:42:19 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-08-06 08:42:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:42:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8108
ERROR - 2025-08-06 08:42:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:42:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:42:47 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND "ab"."no_kartu" = '0003620397925'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:42:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8870
ERROR - 2025-08-06 08:42:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 8870
ERROR - 2025-08-06 08:42:58 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:43:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:43:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:43:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:44:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:44:46 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-08-06 08:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:44:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:44:48 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-08-06 08:45:05 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 08:45:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 08:45:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:45:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:45:50 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:46:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:47:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:47:26 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 08:47:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 18: AND &quot;lp&quot;.&quot;id_unit_layanan&quot; = 'undefined'
                                      ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:47:43 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 18: AND "lp"."id_unit_layanan" = 'undefined'
                                      ^ - Invalid query: SELECT DISTINCT ON(pd.id) pd.*, CONCAT_WS(' ', COALESCE(p.status_pasien, ''), p.nama) as nama, p.kelamin, p.alamat, p.telp, p.no_identitas, coalesce(sp.nama, '') as klinik, coalesce(tr.account, '') as user, coalesce(pgu.nama, '') as nama_user, coalesce(pj.nama, '') as penjamin, lp.cara_bayar, lp.id as id_layanan_pendaftaran, lp.status_terlayani, sp.kode_bpjs, coalesce(pg.nama, '') as dokter, tm.kode_bpjs as kode_bpjs_dokter, r.id as id_resep, lp.id_dokter, ab.id as id_antrian_bpjs, ab.no_rm id_pasien_antrian_bpjs, ab.kode_booking kode_booking_antrian_bpjs, ab.no_kartu no_kartu_antrian_bpjs, ab.no_referensi, ab.id_jadwal_dokter, jd.tanggal tanggal_jadwal, jd.nama_poli nama_poli_jadwal, jd.shift_poli, jd.nama_dokter nama_dokter_jadwal
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id_pendaftaran" = "pd"."id"
LEFT JOIN "sm_resep" as "r" ON "r"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
JOIN "sm_translucent" as "tr" ON "tr"."id" = "pd"."id_users"
JOIN "sm_pegawai" as "pgu" ON "pgu"."id" = "pd"."id_users"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_antrian_bpjs" "ab" ON "pd"."id" = "ab"."id_pendaftaran"
LEFT JOIN "sm_jadwal_dokter" "jd" ON "jd"."id" = "ab"."id_jadwal_dokter"
WHERE "pd"."id" is not null  AND ("jd"."shift_poli" = 'undefined' OR "jd"."id" is null)
AND "lp"."konsul" =0
AND "pd"."jenis_pendaftaran" = 'Poliklinik'
AND "lp"."jenis_layanan" in('Poliklinik','Medical Check Up')
AND "lp"."id_unit_layanan" = 'undefined'
ORDER BY "pd"."id" DESC, "pd"."tanggal_daftar" DESC
 LIMIT 10
ERROR - 2025-08-06 08:47:47 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 105
ERROR - 2025-08-06 08:47:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 114
ERROR - 2025-08-06 08:47:51 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:47:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:47:53 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4912286'
ERROR - 2025-08-06 08:48:04 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:48:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:48:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:49:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (907035, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:49:21 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (907035, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (907035, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-08-06 08:49:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:49:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:49:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:28 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:50:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:51:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:51:16 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-08-06 00:00:00' AND '2025-08-06 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A151%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-08-06 08:51:33 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:51:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 08:51:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:51:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 08:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:52:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:52:42 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:53:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:53:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:53:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:54:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:54:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:55:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:35 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:55:35 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:55:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:55:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:43 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:55:43 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:55:51 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:55:51 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:56:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:56:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-08-06 08:56:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:56:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 08:56:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:56:17 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:56:17 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:56:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 08:56:22 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:56:22 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 08:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:57:41 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:57:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:58:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:58:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:58:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 01:58:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:42 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 01:58:42 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-08-06 08:58:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:59:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 08:59:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1685' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-08-06 08:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 08:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:00:15 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 105
ERROR - 2025-08-06 09:00:15 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 114
ERROR - 2025-08-06 09:00:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:00:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:00:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:00:21 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1685' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-08-06 09:00:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:00:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 09:00:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 09:00:48 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:01:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:01:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:01:52 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 09:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 02:01:58 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 02:01:58 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 09:02:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:02:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 09:02:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:43 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:02:54 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;created_at&quot; does not exist
LINE 4: ORDER BY &quot;created_at&quot; DESC
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:03:35 --> Query error: ERROR:  column "created_at" does not exist
LINE 4: ORDER BY "created_at" DESC
                 ^ - Invalid query: SELECT "id"
FROM "sm_layanan_pendaftaran"
WHERE "id_pendaftaran" = '737507'
ORDER BY "created_at" DESC
 LIMIT 1
ERROR - 2025-08-06 09:03:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;created_at&quot; does not exist
LINE 4: ORDER BY &quot;created_at&quot; DESC
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:03:35 --> Query error: ERROR:  column "created_at" does not exist
LINE 4: ORDER BY "created_at" DESC
                 ^ - Invalid query: SELECT "id"
FROM "sm_layanan_pendaftaran"
WHERE "id_pendaftaran" = '716830'
ORDER BY "created_at" DESC
 LIMIT 1
ERROR - 2025-08-06 09:03:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:37 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 09:03:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;created_at&quot; does not exist
LINE 4: ORDER BY &quot;created_at&quot; DESC
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:03:37 --> Query error: ERROR:  column "created_at" does not exist
LINE 4: ORDER BY "created_at" DESC
                 ^ - Invalid query: SELECT "id"
FROM "sm_layanan_pendaftaran"
WHERE "id_pendaftaran" = '733190'
ORDER BY "created_at" DESC
 LIMIT 1
ERROR - 2025-08-06 09:03:38 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:03:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;created_at&quot; does not exist
LINE 4: ORDER BY &quot;created_at&quot; DESC
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:03:53 --> Query error: ERROR:  column "created_at" does not exist
LINE 4: ORDER BY "created_at" DESC
                 ^ - Invalid query: SELECT "id"
FROM "sm_layanan_pendaftaran"
WHERE "id_pendaftaran" = '716830'
ORDER BY "created_at" DESC
 LIMIT 1
ERROR - 2025-08-06 09:03:55 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:04:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:04:26 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:04:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:04:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 09:05:21 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 09:05:21 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 09:05:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:05:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:05:56 --> Severity: Warning  --> pg_escape_string() expects parameter 1 to be resource, boolean given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 309
ERROR - 2025-08-06 09:05:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ....id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
                                                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:05:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ....id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
                                                                     ^ - Invalid query: SELECT rd.* FROM sm_radiologi AS rd JOIN sm_layanan_pendaftaran AS lp ON rd.id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 618
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 621
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 622
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 623
ERROR - 2025-08-06 09:05:56 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 466
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 624
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 627
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 628
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: intensive_care /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 629
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 632
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 638
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 640
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 645
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 694
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 696
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 703
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: tindakan_lab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 952
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: tindakan_rad /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 953
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 954
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: tindakan_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 961
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: tindakan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 962
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: diagnosa_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 969
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 970
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: diagnosa_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 977
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 978
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pengobatan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 985
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: anamnesa /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 992
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 999
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1011
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1014
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1022
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1025
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Undefined index: pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 09:05:56 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 1032
ERROR - 2025-08-06 09:06:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:06:07 --> Severity: Warning  --> pg_escape_string() expects parameter 1 to be resource, boolean given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 309
ERROR - 2025-08-06 09:06:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ....id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
                                                                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:06:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ....id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
                                                                     ^ - Invalid query: SELECT rd.* FROM sm_radiologi AS rd JOIN sm_layanan_pendaftaran AS lp ON rd.id_layanan_pendaftaran = lp.id WHERE lp.id_pendaftaran = ''
ERROR - 2025-08-06 09:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:06:15 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:06:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(63858) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:06:26 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(63858) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '63858'
ERROR - 2025-08-06 09:06:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:07:18 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:07:40 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:07:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:07:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-08-06 09:07:56 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-08-06 09:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:08:57 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:09:25 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 09:09:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:09:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 09:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:10:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:10:01 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00335179'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-08-06 09:10:04 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:10:29 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:11:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_jadwal_dokter&quot; violates foreign key constraint &quot;sm_surat_kontrol_id_jadwal_dokter_fkey&quot; on table &quot;sm_surat_kontrol&quot;
DETAIL:  Key (id)=(63858) is still referenced from table &quot;sm_surat_kontrol&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:11:23 --> Query error: ERROR:  update or delete on table "sm_jadwal_dokter" violates foreign key constraint "sm_surat_kontrol_id_jadwal_dokter_fkey" on table "sm_surat_kontrol"
DETAIL:  Key (id)=(63858) is still referenced from table "sm_surat_kontrol". - Invalid query: DELETE FROM "sm_jadwal_dokter"
WHERE "id" = '63858'
ERROR - 2025-08-06 09:11:30 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:11:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:11:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-08-06 09:11:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:11:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-08-06 09:12:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:12:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:12:36 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 105
ERROR - 2025-08-06 09:12:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export/export-lap-01.php 114
ERROR - 2025-08-06 09:12:47 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:12:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060416) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:12:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060416) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060416', '00346707', '2025-08-06 09:12:51', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000048912208', NULL, '022300060525Y001590', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250806B281')
ERROR - 2025-08-06 09:13:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:13:39 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:14:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:14:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:14:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '70', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-08-06 09:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:15:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 09:15:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 09:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:15:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 09:15:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 09:15:24 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:15:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:15:44 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:00 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2137
ERROR - 2025-08-06 09:16:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:16:09 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00206886'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-08-06 09:16:10 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2508060431) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:16:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2508060431) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2508060431', '00184652', '2025-08-06 09:16:14', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002357362135', NULL, '102501040825Y001118', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250806B431')
ERROR - 2025-08-06 09:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:16:28 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-08-06 09:16:28 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-08-06 09:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:17:07 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 09:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:17:46 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00008098'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-08-06 09:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-08-06 09:18:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:18:35 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:19:03 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:19:11 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:19:16 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:02 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:13 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:23 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:20:23 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00323388'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-08-06 09:20:29 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:20:46 --> Severity: Notice  --> Undefined variable: title /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/printing/antrian_loket_booking.php 17
ERROR - 2025-08-06 09:20:54 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:21:32 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-08-06 09:21:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:21:58 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:22:20 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:23:08 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:23:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pasien_id_idx_copy1&quot;
DETAIL:  Key (id)=(00384270) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:23:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pasien_id_idx_copy1"
DETAIL:  Key (id)=(00384270) already exists. - Invalid query: INSERT INTO "sm_pasien" ("id", "rm_lama", "tanggal_daftar", "no_identitas", "nama", "status_pasien", "kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "no_prop", "nama_prop", "no_kab", "nama_kab", "no_kec", "nama_kec", "no_kel", "nama_kel", "agama", "gol_darah", "id_pendidikan", "id_pekerjaan", "status_kawin", "nama_ayah", "nama_ibu", "telp", "id_etnis", "etnis_lainnya", "hamkom", "hamkom_lainnya", "status", "disabilitas", "no_rw", "no_rt", "no_rumah", "kode_pos", "is_pegawai_rsud", "email", "last_active") VALUES ('00384270', '', '2025-08-06 09:23:13', '3671014503860002', 'MINI RUSMINI', NULL, 'P', 'TANGERANG', '1986-03-05', 'CIKOKOL', '36', 'BANTEN', '71', 'KOTA TANGERANG', '1', 'TANGERANG', '1005', 'CIKOKOL', 'Islam', NULL, '4', '2', 'Kawin', 'UJANG', 'SUMIATI', '08983046080', '7', NULL, '', NULL, 'Hidup', 0, '02', '01', NULL, '15117', 0, NULL, '2025-08-06 09:23:13')
ERROR - 2025-08-06 09:23:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (933605, 800564, null, 10, Sesak kurang batuk kurang demam-

, tss cm paru: ves kanna menurun rh-/- wh-/-
, Hidropneumotoraks kana ec susp keganasan

, Ceftriaxon 1x2 g iv 6
 lain2x teruskan dexa 2x5 mg iv
, , 786, 1, Ceftriaxon 1x2 g iv 6&lt;div&gt; lain2x teruskan dexa 2x5 mg iv&lt;/di..., null, null, 786, 2025-08-06 09:23:47, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:23:47 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (933605, 800564, null, 10, Sesak kurang batuk kurang demam-

, tss cm paru: ves kanna menurun rh-/- wh-/-
, Hidropneumotoraks kana ec susp keganasan

, Ceftriaxon 1x2 g iv 6
 lain2x teruskan dexa 2x5 mg iv
, , 786, 1, Ceftriaxon 1x2 g iv 6<div> lain2x teruskan dexa 2x5 mg iv</di..., null, null, 786, 2025-08-06 09:23:47, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('800564', NULL, '10', 'Sesak kurang batuk kurang demam-

', 'tss cm paru: ves kanna menurun rh-/- wh-/-
', 'Hidropneumotoraks kana ec susp keganasan

', 'Ceftriaxon 1x2 g iv 6
 lain2x teruskan dexa 2x5 mg iv
', '', '', '', '', '', '', '', '', '786', '1', 'Ceftriaxon 1x2 g iv 6<div> lain2x teruskan dexa 2x5 mg iv</div><div><br></div>', NULL, '786', 0, NULL, '2025-08-06 09:23:47')
ERROR - 2025-08-06 09:23:49 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:23:59 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:24:09 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:25:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:25:34 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:26:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:26:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250820B155) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-08-06 09:26:40 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250820B155) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "waktu_estimasi", "sisa_kuota", "total_kuota", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250820B155', '155', 'B155', 'B', '2025-08-20', '0', '2025-08-06 09:26:39', 'Booking', 'APM', 'Asuransi', 0, 0, '1951', '00382290', 91, 263593, 22, 'KON', '085778744398', '3671115303210001', '2021-03-13', 'drg. ALFIA AFANTY, Sp.KGA', 1, 'Asuransi', '200', 'Ok.', '0', '61006', '2025-08-20  09:09:36', 13, '25', '0003073938862', 'JKN', '341252', '0', '22', '102501100725Y002080', 'PUSKESMAS PANUNGGANGAN', '2025-10-12', 'KON', '3', NULL, '0223R0380825V002807', '22')
ERROR - 2025-08-06 09:26:50 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:26:52 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:27:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:27:07 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:27:12 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:27:14 --> 404 Page Not Found --> /index
ERROR - 2025-08-06 09:37:46 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:37:47 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:37:48 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:37:48 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:37:52 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:37:54 --> Severity: 8192  --> The behavior of unparenthesized expressions containing both '.' and '+'/'-' will change in PHP 8: '+'/'-' will take a higher precedence C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 1492
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 09:58:08 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 696
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 703
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 952
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 961
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 969
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 09:58:08 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:04:04 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 696
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 703
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 952
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 961
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 969
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:04:04 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:09:31 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 696
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 703
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 952
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 961
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 969
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:09:31 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column &quot;tanggal&quot; does not exist
LINE 4: ORDER BY &quot;tanggal&quot; DESC
                 ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-06 10:11:48 --> Query error: ERROR:  column "tanggal" does not exist
LINE 4: ORDER BY "tanggal" DESC
                 ^ - Invalid query: SELECT "id"
FROM "sm_layanan_pendaftaran"
WHERE "id_pendaftaran" = '737507'
ORDER BY "tanggal" DESC
 LIMIT 1
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:14:15 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 694
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 696
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 703
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 952
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 961
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 969
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 999
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1011
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1014
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1025
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:14:15 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:21:42 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 695
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 695
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 697
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 704
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 955
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 963
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 971
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 979
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 986
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 993
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1012
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1012
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1023
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1023
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1026
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1026
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1033
ERROR - 2025-08-06 10:21:42 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1033
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:38:15 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 695
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 695
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 697
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 704
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 953
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 954
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 955
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 962
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 963
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 970
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 971
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 978
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 979
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 986
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 993
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1012
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1012
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1023
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1023
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1026
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1026
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1033
ERROR - 2025-08-06 10:38:15 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1033
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:40:09 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 700
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 700
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 702
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 709
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 958
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 959
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 960
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 967
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 968
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 975
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 976
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 983
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 984
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 991
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 998
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1005
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1005
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1017
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1017
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1020
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1020
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1028
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1028
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1031
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1031
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1038
ERROR - 2025-08-06 10:40:09 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1038
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:41:10 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 700
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 700
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 702
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 709
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 958
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 959
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 960
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 967
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 968
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 975
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 976
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 983
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 984
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 991
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 998
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1005
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1005
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1017
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1017
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1020
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1020
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1028
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1028
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1031
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1031
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1038
ERROR - 2025-08-06 10:41:10 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1038
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:43:39 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 645
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 699
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 699
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 701
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 708
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 957
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 958
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 959
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 966
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 967
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 974
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 975
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 982
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 983
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 990
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 997
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1004
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1004
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1016
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1016
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1019
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1019
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1027
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1027
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1030
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1030
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:43:39 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:49:17 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 764
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 764
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 766
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 773
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1023
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1024
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1031
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1032
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1039
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1040
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1047
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1048
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1055
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1062
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1069
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1069
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1081
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1081
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1084
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1084
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1092
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1092
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1095
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1095
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 10:49:17 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 10:53:10 --> Severity: Notice  --> Undefined index: data C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:53:10 --> Severity: Notice  --> Trying to access array offset on value of type null C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:53:10 --> Severity: Notice  --> Trying to get property 'keluhan_utama' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:54:04 --> Severity: Notice  --> Undefined index: data C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:54:04 --> Severity: Notice  --> Trying to access array offset on value of type null C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:54:04 --> Severity: Notice  --> Trying to get property 'keluhan_utama' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:54:43 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 648
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 717
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 717
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 719
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 726
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 975
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 976
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 984
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 993
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1001
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1008
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1034
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1034
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1045
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1045
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1048
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1048
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1055
ERROR - 2025-08-06 10:54:43 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1055
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:54:56 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 648
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 717
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 717
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 719
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 726
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 975
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 976
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 977
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 984
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 985
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 992
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 993
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1000
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1001
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1008
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1015
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1022
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1034
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1034
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1045
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1045
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1048
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1048
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1055
ERROR - 2025-08-06 10:54:56 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1055
ERROR - 2025-08-06 10:55:15 --> Severity: Notice  --> Undefined index: data C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:55:15 --> Severity: Notice  --> Trying to access array offset on value of type null C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:55:15 --> Severity: Notice  --> Trying to get property 'keluhan_utama' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 649
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 10:58:18 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 648
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 769
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 769
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 771
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 778
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1027
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1028
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1029
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1036
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1037
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1044
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1045
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1052
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1053
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1060
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1067
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1074
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1074
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1086
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1086
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1089
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1089
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1097
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1097
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1100
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1100
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1107
ERROR - 2025-08-06 10:58:18 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1107
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:00:02 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 661
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 784
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 791
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1040
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1041
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1042
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1049
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1050
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1057
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1058
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1065
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1066
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1073
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1080
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:00:02 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:00:49 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 661
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 784
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 791
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1040
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1041
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1042
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1049
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1050
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1057
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1058
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1065
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1066
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1073
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1080
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:00:49 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:02:08 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 638
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 640
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 661
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 782
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 784
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 791
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1040
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1041
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1042
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1049
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1050
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1057
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1058
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1065
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1066
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1073
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1080
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1087
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1099
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1102
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:02:08 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1120
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'no_rm' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 618
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'nama_pasien' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 621
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 622
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 623
ERROR - 2025-08-06 11:04:19 --> Severity: Warning  --> A non-numeric value encountered C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\helpers\syams_helper.php 466
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'kelamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 624
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_daftar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 627
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 628
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'ruang_asal' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: intensive_care C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 629
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'penjamin' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 632
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 702
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 702
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 704
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 725
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 846
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'jenis_pendaftaran' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 846
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 848
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 855
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: tindakan_lab C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1104
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: tindakan_rad C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1105
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1106
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1113
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1114
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1121
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1122
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1129
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1130
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pengobatan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1137
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1144
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1151
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1151
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1163
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1163
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1166
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanggal_keluar' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1166
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1174
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1174
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1177
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'tanda_tangan' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1177
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 11:04:19 --> Severity: Notice  --> Trying to get property 'dokter_dpjp' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 11:41:35 --> Severity: Notice  --> Undefined index: anamnesa C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 811
ERROR - 2025-08-06 13:32:57 --> Severity: error  --> Exception: Call to undefined function bersihkan_dobel() C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\controllers\Folder_pasien.php 621
ERROR - 2025-08-06 13:32:57 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php 668
ERROR - 2025-08-06 13:35:07 --> Severity: error  --> Exception: Call to undefined function bersihkan_dobel() C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\controllers\Folder_pasien.php 621
ERROR - 2025-08-06 13:35:07 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php 668
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: tindakan_ok C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1109
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: tindakan C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1110
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: diagnosa_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1117
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: diagnosa_manual_utama C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1118
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: diagnosa_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1125
ERROR - 2025-08-06 13:43:25 --> Severity: Notice  --> Undefined index: diagnosa_manual_sekunder C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1126
ERROR - 2025-08-06 13:54:19 --> Severity: Warning  --> Illegal string offset 'pasien' C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1183
ERROR - 2025-08-06 13:54:19 --> Severity: Notice  --> Uninitialized string offset: 0 C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1183
ERROR - 2025-08-06 13:54:19 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1183
ERROR - 2025-08-06 14:00:37 --> Severity: Notice  --> Undefined index: data C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:00:37 --> Severity: Notice  --> Trying to access array offset on value of type null C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:00:37 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:01:15 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:03:20 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1183
ERROR - 2025-08-06 14:04:47 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1183
ERROR - 2025-08-06 07:08:53 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:09:06 --> Severity: Notice  --> Undefined index: pasien C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:09:06 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:23:05 --> Severity: error  --> Exception: Call to undefined method Pendaftaran_igd::cetak_resume_medis() C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\controllers\Folder_pasien.php 623
ERROR - 2025-08-06 14:23:05 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php 668
ERROR - 2025-08-06 14:28:00 --> Severity: error  --> Exception: syntax error, unexpected 'endif' (T_ENDIF) C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1265
ERROR - 2025-08-06 14:28:00 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ParseError))
#1 {main}
  thrown C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\core\Common.php 668
ERROR - 2025-08-06 14:50:19 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1186
ERROR - 2025-08-06 14:52:07 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 14:52:53 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1182
ERROR - 2025-08-06 14:52:53 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1187
ERROR - 2025-08-06 14:54:31 --> Severity: Notice  --> Undefined property: stdClass::$tindak_lanjut C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 14:54:54 --> Severity: Notice  --> Undefined index: data C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 14:54:54 --> Severity: Notice  --> Trying to access array offset on value of type null C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 14:54:54 --> Severity: Notice  --> Trying to get property 'tindak_lanjut' of non-object C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\views\download\all_dokumen.php 1184
ERROR - 2025-08-06 15:12:36 --> Severity: Notice  --> Undefined offset: 0 C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\controllers\Folder_pasien.php 625
ERROR - 2025-08-06 15:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;data&quot;
LINE 4: WHERE &quot;pd&quot;.&quot;id&quot; = 'data'
                          ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-06 15:13:30 --> Query error: ERROR:  invalid input syntax for type bigint: "data"
LINE 4: WHERE "pd"."id" = 'data'
                          ^ - Invalid query: SELECT "pd"."id", "lp"."id" as "id_layanan_pendaftaran", "lp"."jenis_layanan"
FROM "sm_pendaftaran" "pd"
JOIN "sm_layanan_pendaftaran" "lp" ON "pd"."id" = "lp"."id_pendaftaran"
WHERE "pd"."id" = 'data'
ORDER BY "lp"."id" ASC
ERROR - 2025-08-06 15:13:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;data&quot;
LINE 4: WHERE &quot;pd&quot;.&quot;id&quot; = 'data'
                          ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-06 15:13:50 --> Query error: ERROR:  invalid input syntax for type bigint: "data"
LINE 4: WHERE "pd"."id" = 'data'
                          ^ - Invalid query: SELECT "pd"."id", "lp"."id" as "id_layanan_pendaftaran", "lp"."jenis_layanan"
FROM "sm_pendaftaran" "pd"
JOIN "sm_layanan_pendaftaran" "lp" ON "pd"."id" = "lp"."id_pendaftaran"
WHERE "pd"."id" = 'data'
ORDER BY "lp"."id" ASC
ERROR - 2025-08-06 15:15:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;data&quot;
LINE 4: WHERE &quot;pd&quot;.&quot;id&quot; = 'data'
                          ^ C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 242
ERROR - 2025-08-06 15:15:04 --> Query error: ERROR:  invalid input syntax for type bigint: "data"
LINE 4: WHERE "pd"."id" = 'data'
                          ^ - Invalid query: SELECT "pd"."id", "lp"."id" as "id_layanan_pendaftaran", "lp"."jenis_layanan"
FROM "sm_pendaftaran" "pd"
JOIN "sm_layanan_pendaftaran" "lp" ON "pd"."id" = "lp"."id_pendaftaran"
WHERE "pd"."id" = 'data'
ORDER BY "lp"."id" ASC
ERROR - 2025-08-06 15:15:21 --> Severity: Notice  --> Undefined offset: 0 C:\xampp\htdocs\simrs.tangerangkota.go.id.site\application\modules\folder_pasien\controllers\Folder_pasien.php 626
ERROR - 2025-08-06 20:29:09 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:29:09 --> Unable to connect to the database
ERROR - 2025-08-06 20:29:29 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:29:29 --> Unable to connect to the database
ERROR - 2025-08-06 20:29:50 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:29:50 --> Unable to connect to the database
ERROR - 2025-08-06 20:30:19 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:30:19 --> Unable to connect to the database
ERROR - 2025-08-06 20:32:57 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:32:57 --> Unable to connect to the database
ERROR - 2025-08-06 20:33:03 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:33:03 --> Unable to connect to the database
ERROR - 2025-08-06 20:33:04 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:33:04 --> Unable to connect to the database
ERROR - 2025-08-06 20:33:25 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:33:25 --> Unable to connect to the database
ERROR - 2025-08-06 20:36:41 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:36:41 --> Unable to connect to the database
ERROR - 2025-08-06 20:36:46 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:36:46 --> Unable to connect to the database
ERROR - 2025-08-06 20:36:46 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:36:46 --> Unable to connect to the database
ERROR - 2025-08-06 20:37:07 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:37:07 --> Unable to connect to the database
ERROR - 2025-08-06 20:46:33 --> Severity: Warning  --> pg_pconnect(): Unable to connect to PostgreSQL server: could not connect to server: Connection timed out (0x0000274C/10060)
	Is the server running on host &quot;10.10.10.14&quot; and accepting
	TCP/IP connections on port 5432? C:\xampp\htdocs\simrs.tangerangkota.go.id.site\system\database\drivers\postgre\postgre_driver.php 153
ERROR - 2025-08-06 20:46:33 --> Unable to connect to the database
