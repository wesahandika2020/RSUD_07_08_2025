<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-20 00:01:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;14.4&quot;
LINE 1: ...843', '769940', '1691', '2025-06-19', NULL, NULL, '14.4', NU...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 00:01:48 --> Query error: ERROR:  invalid input syntax for type smallint: "14.4"
LINE 1: ...843', '769940', '1691', '2025-06-19', NULL, NULL, '14.4', NU...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('710843', '769940', '1691', '2025-06-19', NULL, NULL, '14.4', NULL, NULL, '14.4', NULL, NULL, NULL, NULL, NULL, '0', '14.4', NULL, '92', NULL, 'CM', 'H', NULL, NULL, '0:00', '282', '2025-06-20 00:00:07')
ERROR - 2025-06-20 00:08:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 00:09:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 00:09:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 00:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6436747, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 00:15:24 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6436747, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6436747, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-06-20 00:35:54 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 00:35:54 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 00:36:22 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 00:36:22 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 00:54:49 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4856
ERROR - 2025-06-20 00:54:49 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4950
ERROR - 2025-06-20 00:55:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 01:06:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('769941', '', '2046'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 01:06:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('769941', '', '2046'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('769941', '', '2046', '2025-06-20 01:00', '{"cara_tiba_diruangan_pasien":"Brankar"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":"Puskesmas","rujukan_pasien_4":"larangan utara","rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":"1:15","keluhan_utama_keb_3":"2025-06-18","keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":null,"keluhan_utama_keb_11":null}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"5","anc_2":"puskesmas larangan utara","anc_3":null,"anc_4":null,"anc_5":null}', '1', '0', '0', NULL, '02-11-2024', '09/08/2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"1","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"-","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', NULL, '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"-"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":null,"status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"5","kebutuhan_biologis_4":"22:00","kebutuhan_biologis_5":"4","kebutuhan_biologis_6":"22:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"3 minggu lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', NULL, '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"23","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"1600"}', '{"auskultasi_1":"148","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '6', '{"his_konteraksi_1":"1","his_konteraksi_2":"10","his_konteraksi_3":"lemah"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak dilakukan","pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '0', NULL, NULL, '30', '20', NULL, '10', NULL, NULL, NULL, '60', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"132","tekanan_darah_2":"85","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"110","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"70","berat_badan_2":"155"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '2_1', '0_2', '0_2', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-20', '2025-06-20', 'terlampir', 'terlampir', NULL, '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":"1","kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-20 01:00', '609', '1', '2025-06-20 01:09', '50', '1', '2025-06-20 01:06:27')
ERROR - 2025-06-20 01:06:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('769941', '', '2046'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 01:06:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('769941', '', '2046'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('769941', '', '2046', '2025-06-20 01:00', '{"cara_tiba_diruangan_pasien":"Brankar"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":"Puskesmas","rujukan_pasien_4":"larangan utara","rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":"1","keluhan_utama_keb_2":"1:15","keluhan_utama_keb_3":"2025-06-18","keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":null,"keluhan_utama_keb_11":null}', '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"5","anc_2":"puskesmas larangan utara","anc_3":null,"anc_4":null,"anc_5":null}', '1', '0', '0', NULL, '02-11-2024', '09/08/2025', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":null,"riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"1","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"-","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', NULL, '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"-"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"-"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":null,"status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"21:00","kebutuhan_biologis_3":"5","kebutuhan_biologis_4":"22:00","kebutuhan_biologis_5":"4","kebutuhan_biologis_6":"22:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"3 minggu lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', NULL, '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":"1","infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"23","palpasi_2":null,"palpasi_3":"1","palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":"1","palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"5\/5","palpasi_17":"1600"}', '{"auskultasi_1":"148","auskultasi_2":"1","auskultasi_3":null,"auskultasi_4":null}', '6', '{"his_konteraksi_1":"1","his_konteraksi_2":"10","his_konteraksi_3":"lemah"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak dilakukan","pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '0', NULL, NULL, '30', '20', NULL, '10', NULL, NULL, NULL, '60', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"132","tekanan_darah_2":"85","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"110","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"70","berat_badan_2":"155"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '2_1', '0_2', '0_2', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Hijau', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-20', '2025-06-20', 'terlampir', 'terlampir', NULL, '{"pk_penyakit_menular_1":null,"pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":"1","kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-20 01:00', '609', '1', '2025-06-20 01:09', '50', '1', '2025-06-20 01:06:35')
ERROR - 2025-06-20 05:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 05:53:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 05:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:01:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:02:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:05:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 06:05:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 06:05:40 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 06:09:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:11:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6436815, '2694', 7992, '80', '4.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:11:28 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6436815, '2694', 7992, '80', '4.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6436815, '2694', 7992, '80', '4.00', 'Ya', 'null')
ERROR - 2025-06-20 06:11:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:11:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:13:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:14:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:15:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:15:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:15:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:15:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:15:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6436832, '674', 5340, '8', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:15:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6436832, '674', 5340, '8', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6436832, '674', 5340, '8', '1.00', 'Ya', 'null')
ERROR - 2025-06-20 06:15:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:15:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:15:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:15:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:15:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 06:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:24:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:24:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:27:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:31:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:33:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:33:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:34:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:34:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:35:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:35:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:36:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:39:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:39:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:40:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:40:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:40:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:40:59 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 06:41:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:41:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:42:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:42:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:43:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:44:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:44:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:45:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:45:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:45:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200023) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:46:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200023) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200023', '00055979', '2025-06-20 06:46:00', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002431396394', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-06-20 06:46:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:46:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:46:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:47:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:47:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:47:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:48:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:48:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:48:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:49:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:49:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:49:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:50:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00379644319959) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:50:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00379644319959) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00379644319959', '769940', '319959', 'Patologi Klinik', '674', '1310', '103', 'A', 'P', '2025-06-20 06:50:09', '2079')
ERROR - 2025-06-20 06:50:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00379644319959) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:50:13 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00379644319959) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00379644319959', '769940', '319959', 'Patologi Klinik', '674', '1310', '103', 'A', 'P', '2025-06-20 06:50:13', '2079')
ERROR - 2025-06-20 06:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:50:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00379644319959) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:50:19 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00379644319959) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00379644319959', '769940', '319959', 'Patologi Klinik', '674', '1310', '103', 'A', 'P', '2025-06-20 06:50:19', '2079')
ERROR - 2025-06-20 06:50:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00379644319959) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:50:29 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00379644319959) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00379644319959', '769940', '319959', 'Patologi Klinik', '674', '1310', '103', 'A', 'P', '2025-06-20 06:50:29', '2079')
ERROR - 2025-06-20 06:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:50:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_laboratorium_kode_idx&quot;
DETAIL:  Key (kode)=(00379644319959) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:50:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_laboratorium_kode_idx"
DETAIL:  Key (kode)=(00379644319959) already exists. - Invalid query: INSERT INTO "sm_laboratorium" ("kode", "id_layanan_pendaftaran", "id_order_laboratorium", "jenis", "id_dokter", "analis", "id_dokter_pjwb", "kategori", "kelamin_anak", "waktu_konfirm", "id_users") VALUES ('00379644319959', '769940', '319959', 'Patologi Klinik', '674', '1310', '103', 'A', 'P', '2025-06-20 06:50:36', '2079')
ERROR - 2025-06-20 06:50:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200046) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:51:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200046) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200046', '00378191', '2025-06-20 06:51:21', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001793729261', NULL, '0223B1570625P000058', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250620B221')
ERROR - 2025-06-20 06:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:51:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:52:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:52:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200053) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:52:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200053) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200053', '00021576', '2025-06-20 06:52:51', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001448851364', NULL, '022300090625Y000321', 'Lama', NULL, 1775, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250620A169')
ERROR - 2025-06-20 06:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:53:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:53:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:54:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200060) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:54:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200060) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200060', '00275840', '2025-06-20 06:54:52', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000028951536', NULL, '102503010525Y004333', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Periodonti', 0, '2', '', '20250620F006')
ERROR - 2025-06-20 06:54:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:56:06 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 06:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:56:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200082) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:59:31 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200082) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200082', '00196999', '2025-06-20 06:59:31', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001794753191', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-06-20 06:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200083) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 06:59:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200083) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200083', '00196999', '2025-06-20 06:59:35', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001794753191', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-06-20 06:59:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 06:59:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:00:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200085) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:00:06 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200085) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200085', '00033491', '2025-06-20 07:00:03', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000047473672', NULL, '102501060425Y003463', 'Lama', NULL, 1768, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250620A170')
ERROR - 2025-06-20 07:00:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:00:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 07:00:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:00:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:01:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200088) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:01:06 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200088) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200088', '00352904', '2025-06-20 07:01:04', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002757378655', NULL, '022300010425Y000540', 'Lama', NULL, 1773, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250620A027')
ERROR - 2025-06-20 07:01:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:01:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:02:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:03:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:03:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:03:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:04:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:04:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:05:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:05:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:07:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200103) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:07:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200103) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200103', '00379651', '2025-06-20 07:07:07', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Obgyn', 0, '2', '', '20250620C003')
ERROR - 2025-06-20 07:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:07:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:08:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:09:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 07:09:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:10:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:11:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:11:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:12:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:12:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:13:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:13:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:13:10 --> Query error: ERROR:  syntax error at or near "and"
LINE 1: select * from sm_jadwal_dokter where id =  and kuota - jml_k...
                                                   ^ - Invalid query: select * from sm_jadwal_dokter where id =  and kuota - jml_kunjung > 0
ERROR - 2025-06-20 07:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:13:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:14:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:14:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:15:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:15:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:15:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:16:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:16:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:17:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 07:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:17:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:18:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:18:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:19:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:19:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:20:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:22:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:23:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:23:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:23:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:24:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:24:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:25:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:25:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:26:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:27:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:27:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:27:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:28:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:28:24 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-06-20 07:28:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-06-20 07:28:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-06-20 07:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:28:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:28:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:28:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:29:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:29:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:29:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:30:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:31:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:31:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:31:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A090%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 07:31:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:31:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0003649146546'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 07:31:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 9: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:31:54 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
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
ERROR - 2025-06-20 07:32:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:32:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:33:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:33:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:33:27 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:33:53 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 07:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:34:40 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A166%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 07:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:35:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:37:21 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 07:37:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:37:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:38:13 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 07:38:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;28.8&quot;
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:38:59 --> Query error: ERROR:  invalid input syntax for type smallint: "28.8"
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('710843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NULL, NULL, '28.8', '43', NULL, NULL, NULL, NULL, '43', '-14.2', NULL, '100', NULL, 'cm', 'h', NULL, NULL, '6:00', '282', '2025-06-20 07:37:11')
ERROR - 2025-06-20 07:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:39:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;28.8&quot;
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:39:05 --> Query error: ERROR:  invalid input syntax for type smallint: "28.8"
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('710843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NULL, NULL, '28.8', '43', NULL, NULL, NULL, NULL, '43', '-14.2', NULL, '100', NULL, 'cm', 'h', NULL, NULL, '6:00', '282', '2025-06-20 07:37:11')
ERROR - 2025-06-20 07:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:39:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;28.8&quot;
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:39:20 --> Query error: ERROR:  invalid input syntax for type smallint: "28.8"
LINE 1: ...843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NU...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('710843', '769940', '1691', '2025-06-20', NULL, NULL, '28.8', NULL, NULL, '29', '43', NULL, NULL, NULL, NULL, '43', '-14.2', NULL, '100', NULL, 'cm', 'h', NULL, NULL, '6:00', '282', '2025-06-20 07:37:11')
ERROR - 2025-06-20 07:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:39:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:40:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:40:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:40:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:41:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:41:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:41:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:41:56 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 07:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:42:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:43:21 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 07:43:21 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 07:43:21 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 07:43:24 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 07:43:24 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 07:43:24 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 07:43:28 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 07:43:28 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 07:43:28 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 07:44:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:44:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:44:43 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 07:44:43 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 07:44:43 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 07:44:45 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 07:44:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 07:44:45 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 07:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:45:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 07:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:46:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:46:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:46:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:46:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:46:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:47:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:47:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:48:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:48:15 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:48:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:49:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:49:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:49:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:50:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:51:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:51:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:52:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:52:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:52:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:53:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:53:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:53:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:55:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:55:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:55:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:55:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:56:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:56:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:56:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:56:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:57:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:57:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:57:03 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:57:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200237) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:57:42 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200237) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200237', '00078154', '2025-06-20 07:57:37', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001640856431', NULL, '0223U1130425Y002402', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Konservasi Gigi', 0, 2, NULL, '20250620B001')
ERROR - 2025-06-20 07:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:57:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:57:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:57:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:57:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 07:58:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:58:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:58:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 07:58:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 07:58:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 07:58:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:58:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:58:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:59:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:59:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:59:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type time: &quot;24&quot;
LINE 1: ...00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:01:00 --> Query error: ERROR:  invalid input syntax for type time: "24"
LINE 1: ...00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:...
                                                             ^ - Invalid query: INSERT INTO "sm_diet_cair_2" ("id_layanan_pendaftaran", "id_dpmp", "dc_diet", "dc_item", "dc_jam_1", "dc_jam_2", "dc_jam_3", "dc_jam_4", "dc_jam_5", "dc_jam_6", "dc_jam_7", "dc_jam_8", "dc_keterangan", "dc_gram", "dc_mp", "dc_ms", "dc_mm", "dc_sp", "dc_ss", "dc_sm", "created_date", "id_user") VALUES ('769027', 12289, '36', '68', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:00', '8X30CC', '3.93', '36', '36', '36', '36', '36', '36', '2025-06-20 08:01:00', '1434')
ERROR - 2025-06-20 08:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type time: &quot;24&quot;
LINE 1: ...00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:01:04 --> Query error: ERROR:  invalid input syntax for type time: "24"
LINE 1: ...00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:...
                                                             ^ - Invalid query: INSERT INTO "sm_diet_cair_2" ("id_layanan_pendaftaran", "id_dpmp", "dc_diet", "dc_item", "dc_jam_1", "dc_jam_2", "dc_jam_3", "dc_jam_4", "dc_jam_5", "dc_jam_6", "dc_jam_7", "dc_jam_8", "dc_keterangan", "dc_gram", "dc_mp", "dc_ms", "dc_mm", "dc_sp", "dc_ss", "dc_sm", "created_date", "id_user") VALUES ('769027', 12290, '36', '68', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00', '24', '03:00', '8X30CC', '3.93', '36', '36', '36', '36', '36', '36', '2025-06-20 08:01:04', '1434')
ERROR - 2025-06-20 08:01:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:01:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:02:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:03:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:03:14 --> Severity: error  --> Exception: Too few arguments to function Pelayanan::get_detail_pasien_skd_get(), 0 passed and exactly 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 13595
ERROR - 2025-06-20 08:03:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 08:03:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:03:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:04:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:04:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:04:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:04:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:04:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250620B321) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:05:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250620B321) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "kode_bpjs_dokter", "kode_bpjs_poli", "tanggal_kunjungan", "create_date", "status", "usia_pasien", "id_dokter", "id_pendaftaran", "task_satu", "task_dua", "task_tiga", "task_empat", "task_lima", "task_enam", "task_tujuh", "task_batal", "user_create", "user_update", "update_date", "nomor_antrean", "status_respon", "pesan_response", "nama_poli", "pasien_baru", "nik", "status_jkn", "waktu_estimasi", "lokasi_data", "no_kartu", "pasien_hadir", "waktu_hadir", "panggilan_pasien", "waktu_panggil", "loket_antrean", "huruf_antrean", "no_rm", "status_rm", "no_hp", "no_referensi", "nama_dokter", "jenis_kunjungan", "keterangan_batal", "tanggal_lahir", "kebutuhan", "jenis_bayar", "jenis_penjamin", "kirim_bpjs", "respon_bpjs", "ket_bridging", "sisa_kuota", "total_kuota", "nosep", "rujukan", "cetak", "hitung_panggil", "no_sep_asal", "id_skd", "rujukanawal", "id_penjamin", "id_poli_asal", "no_sk", "idskb", "id_poli_rujukan", "is_kontrol_pasca_ranap", "is_pasien_katarak", "log_task", "id_wa", "user_batal", "waktu_batal", "id_jadwal_dokter", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan") VALUES ('20250620B321', 321, '267899', 'ANA', '2025-06-20', '2025-05-19 08:43:27', 'Booking', 'Asuransi', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1948', NULL, NULL, 'B321', '200', 'Ok.', '11', '0', '3671040212120005', 'JKN', '2025-06-18 07:09:00', 'APM', '0002469547776', NULL, NULL, NULL, NULL, NULL, 'B', '00170909', '0', '082131388148', '102506010425Y000001', 'dr. FELLYCIA TOBING, Sp.A, M.Ked (Ped)', '3', NULL, '2012-12-02', '0', 'Asuransi', NULL, 'Sudah', 200, 'Ok.', 36, '60', NULL, NULL, NULL, NULL, '0223R0380525V008492', '309068', '0', '1', '11', NULL, NULL, '11', '0', NULL, NULL, NULL, NULL, NULL, '55655', 'PUSKESMAS BENDA', '2025-07-03', 'ANA')
ERROR - 2025-06-20 08:05:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200255) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:05:35 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200255) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200255', '00354162', '2025-06-20 08:05:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003624895001', NULL, '0223R0380625V004221', 'Lama', NULL, 1765, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250620B206')
ERROR - 2025-06-20 08:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:08:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:09:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:09:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:09:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:10:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:10:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:10:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:10:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:11:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:11:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:11:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:12:33 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00368101'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-20 08:12:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:12:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 9: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:13:36 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
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
ERROR - 2025-06-20 08:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:14:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:15:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 08:15:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:15:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 08:15:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:16:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:16:31 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-06-20 08:16:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:16:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:16:49 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A108%' ESCAPE '!'
AND "ab"."lokasi_data" = 'mobile'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 08:17:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:17:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:17:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:17:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:17:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:18:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:18:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (871629, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:18:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (871629, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (871629, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 08:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:19:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 08:19:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:20:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 08:20:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:20:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:21:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380625V009243) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:22:06 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380625V009243) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380625V009243', "no_polish" = '0001323715127'
WHERE "id" = '710611'
ERROR - 2025-06-20 08:22:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:33 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 08:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:22:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:23:48 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 19
ERROR - 2025-06-20 08:23:48 --> Severity: Notice  --> Undefined index: nama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-06-20 08:23:48 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/views/index.php 23
ERROR - 2025-06-20 08:24:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:25:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:26:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:27:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 08:27:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:27:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 08:27:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:27:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:27:50 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0002435096474'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 08:27:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:28:34 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-20 08:28:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:28:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:29:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:30:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:30:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:31:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:32:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:33:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:33:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:33:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 08:33:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:33:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 08:33:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:33:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200324) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:33:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200324) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200324', '00379667', '2025-06-20 08:33:50', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002435096474', NULL, '102505020625Y002004', 'Baru', NULL, '1773', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250620A171')
ERROR - 2025-06-20 08:33:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:33:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:37 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4856
ERROR - 2025-06-20 08:34:38 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4950
ERROR - 2025-06-20 08:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200328) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:34:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200328) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200328', '00239304', '2025-06-20 08:34:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000048859626', NULL, '0223U0110525P000631', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Periodonti', 0, 2, NULL, '20250620B145')
ERROR - 2025-06-20 08:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...nerima_pagi&quot;, &quot;id_users&quot;) VALUES ('766505', NULL, '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:35:49 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...nerima_pagi", "id_users") VALUES ('766505', NULL, '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_pagi" ("id_layanan_pendaftaran", "operan_diagnosa_keperawatan", "dpjp_utama_pagi", "konsulen_pagi", "tanggal_waktu_pagi", "diagnosa_keperawatan_pagi", "infus_pagi", "rencana_tindakan_pagi", "perawat_mengover_pagi", "perawat_menerima_pagi", "id_users") VALUES ('766505', NULL, '', NULL, '2025-06-20 08:36:00', 'Resiko ketidakseimbangan elektrolit, Nausea', 'rl 500cc/8 jam', 'DJJ/SHIFT', '183', '568', '2005')
ERROR - 2025-06-20 08:35:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:36:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:37:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:37:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:37:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:37:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:37:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A076%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 08:37:37 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 08:37:37 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 08:37:37 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-20 08:37:49 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 08:37:49 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 08:37:49 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-20 08:37:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:37:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:38:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:38:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 08:38:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:38:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:39:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:39:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:39:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:39:14 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0002095151141'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 08:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:39:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:40:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:40:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:40:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:40:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:41:47 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-20 08:42:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:42:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:42:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:42:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_tanggal_verifikasi_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 697
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_ttd_verifikasi_dokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 703
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_ttd_perawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 709
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_tanggal_ttd_perawat' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 715
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_tanggal_verifikasi_penerima' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 721
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'penerima' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 727
ERROR - 2025-06-20 08:43:20 --> Severity: Notice  --> Trying to get property 'ek_ttd_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 733
ERROR - 2025-06-20 08:43:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:43:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:44:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:44:59 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
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
ERROR - 2025-06-20 08:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:45:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:45:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:45:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250703A085) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:45:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250703A085) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "waktu_estimasi", "sisa_kuota", "total_kuota", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250703A085', '085', 'A085', 'A', '2025-07-03', '0', '2025-06-20 08:45:50', 'Booking', 'APM', 'Prioritas', 0, 0, '1701', '00367980', 80, 1814, 37, 'URO', '08871304609', '3324015010580001', '1958-10-10', 'dr. TAUFIK RAKHMAN TAHER, Sp.U', 1, 'Asuransi', '200', 'Ok.', '0', '58241', '2025-07-03  08:04:00', 44, '60', '0003004985316', 'JKN', '321284', '0', '37', '102501040625Y000605', 'PUSKESMAS CIPONDOH', '2025-09-02', 'URO', '3', NULL, '0223R0380625V009710', '37')
ERROR - 2025-06-20 08:45:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:46:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 08:46:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:47:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:47:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:47:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:47:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:48:14 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0000815364775'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 08:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:48:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:49:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:49:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 08:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:50:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:50:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:51:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 08:52:22 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00378762'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-20 08:52:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:52:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:53:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:54:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:55:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:56:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:56:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:57:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:57:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:57:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:58:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:58:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:18 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 08:58:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:59:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:00:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:00:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:00:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:00:38 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:01:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:01:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:01:29 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A127%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 09:01:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:01:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:01:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:02:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:02:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200394) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:02:54 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200394) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200394', '00372714', '2025-06-20 09:02:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001831346627', NULL, '102505010625Y001590', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250620B340')
ERROR - 2025-06-20 09:02:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:03:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:03:20 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00041206'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-20 09:03:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:03:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:03:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:04:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:04:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200406) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200406) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200406', '00378734', '2025-06-20 09:04:23', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049318367', NULL, '0223U0280625P000481', 'Lama', NULL, 1765, 0, 'Belum', 'Poliklinik THT', 0, 2, NULL, '20250620A097')
ERROR - 2025-06-20 09:04:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250721B036) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:30 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250721B036) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "waktu_estimasi", "sisa_kuota", "total_kuota", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250721B036', '036', 'B036', 'B', '2025-07-21', '0', '2025-06-20 09:04:28', 'Booking', 'APM', 'Asuransi', 0, 0, '1701', '00216341', 353, 436935, 35, 'SAR', '089529244220', '3671014110710004', '1971-10-01', 'dr. EKO YUWONO, Sp.N', 1, 'Asuransi', '200', 'Ok.', '0', '58660', '2025-07-21  07:40:00', 50, '60', '0001650882295', 'JKN', '321305', '0', '35', '022300090525Y000596', 'PUSKESMAS CIKOKOL', '2025-08-05', 'SAR', '3', NULL, '0223R0380625V009426', '35')
ERROR - 2025-06-20 09:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:04:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 09:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200408) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:37 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200408) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200408', '00373829', '2025-06-20 09:04:36', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '19', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Klinik Akasia', 0, '2', '', '20250620C031')
ERROR - 2025-06-20 09:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 09:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:04:37 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 09:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:04:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:05:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16313
ERROR - 2025-06-20 09:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:06:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16313
ERROR - 2025-06-20 09:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:07:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:07:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:08:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:09:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:09:30 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 09:09:30 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 09:09:30 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-20 09:09:36 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 09:09:36 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-06-20 09:09:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-06-20 09:09:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:09:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 09:09:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:10:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:10:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:10:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:10:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6438081, '211', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:11:03 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6438081, '211', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6438081, '211', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-20 09:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:11:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:12:02 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-06-20 09:12:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:12:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:13:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:13:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:13:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:13:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:13:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:14:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:14:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:14:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:14:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:14:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:14:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:15:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:16:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-20 09:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:16:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:16:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '71', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 09:16:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:16:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:17:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:17:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:17:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:17:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:17:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (6438271, '607', 11400.588, '20', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:17:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (6438271, '607', 11400.588, '20', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6438271, '607', 11400.588, '20', '1.00', 'Ya', 'null')
ERROR - 2025-06-20 09:18:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:18:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:18:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:18:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:18:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:19:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:19:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:19:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:20:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:20:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:20:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:20:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:20:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:20:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:21:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:21:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:21:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:23:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:24:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:24:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:25:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:25:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:25:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:25:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:25:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:27:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:28:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:28:15 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-20 09:28:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:28:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:29:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:30:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:30:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:30:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:30:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:32:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:32:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:32:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:32:21 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-20 09:32:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:32:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:33:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:33:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:34:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:34:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:34:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 09:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:34:28 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 09:34:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:35:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:36:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:37:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:37:50 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-06-20 09:37:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:37:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:38:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:40:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:40:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:41:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:42:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:43:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:43:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:44:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:44:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:44:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:44:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:46:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:47:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:47:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:47:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:47:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:47:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:47:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200507) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:47:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200507) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200507', '00186420', '2025-06-20 09:47:22', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002427396221', NULL, '102501040525Y005423', 'Lama', NULL, 1765, 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, 2, NULL, '20250620B161')
ERROR - 2025-06-20 09:47:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:47:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:47:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:47:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:48:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:49:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:49:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:49:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 09:50:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:50:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:50:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 09:50:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:50:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 09:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:51:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:53:17 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/Booking_poliklinik.php 41
ERROR - 2025-06-20 09:53:17 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/Booking_poliklinik.php 41
ERROR - 2025-06-20 09:53:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:53:17 --> Query error: ERROR:  syntax error at or near ")"
LINE 10:                  )
                          ^ - Invalid query: WITH cte AS (
								SELECT *, ROW_NUMBER() OVER (ORDER BY create_date) - 1 AS position,
								          FLOOR((ROW_NUMBER() OVER (ORDER BY create_date) - 1) /
						                        case when nama_poli = 34 then 25 else 10 end) *
						                  case when EXTRACT(DOW FROM tanggal_kunjungan) = 5 then 45 else 60 end AS minutes_offset
								FROM sm_antrian_bpjs
						            where tanggal_kunjungan = ''
					                and (lokasi_data = 'APM' OR lokasi_data = 'mobile')
					                and nama_poli = 
					            )
								SELECT id,
								       TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								               '07:30'::time + minutes_offset * INTERVAL '1 minute', 'HH24:MI') AS estimated_time_start,
							           case
								           when TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI') > '12:00'
								               then '12:00'
								           else TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI')
							           end AS estimated_time_end
								FROM cte
								WHERE id = 594285
ERROR - 2025-06-20 09:53:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:53:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:53:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:54:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250721B053) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:54:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250721B053) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "waktu_estimasi", "sisa_kuota", "total_kuota", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250721B053', '053', 'B053', 'B', '2025-07-21', '0', '2025-06-20 09:54:16', 'Booking', 'APM', 'Asuransi', 0, 0, '1701', '00357117', 353, 436935, 35, 'SAR', '081295840055', '3671031001670004', '1967-01-10', 'dr. EKO YUWONO, Sp.N', 1, 'Asuransi', '200', 'Ok.', '0', '58660', '2025-07-21  08:20:00', 40, '60', '0001374429453', 'JKN', '321389', '0', '35', '022309060525Y000927', 'PUSKESMAS BATUSARI', '2025-08-12', 'SAR', '3', NULL, '0223R0380625V009543', '35', 'Belum', 208, 'Terdapat duplikasi Kode Booking')
ERROR - 2025-06-20 09:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:54:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:55:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:55:29 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:55:29 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:55:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:55:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:55:53 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:55:53 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:55:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:55:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:56:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:56:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:56:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 02:56:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 02:56:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:56:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:57:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:57:14 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:57:14 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 09:57:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 02:57:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 02:57:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:57:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:57:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba&quot; &quot;id_dokter&quot;, &quot;pg&quot;.&quot;nama&quot;, &quot;pg&quot;.&quot;nik&quot;, &quot;sn&quot;. &quot;tgl...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:57:56 --> Query error: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl...
                                                             ^ - Invalid query: SELECT "sn"."id_dokter_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl_form"
FROM "sm_surat_narkoba" "sn"
JOIN "sm_layanan_pendaftaran" "lp" ON "sn"."id_layanan_pendaftaran"="lp"."id"
JOIN "sm_pendaftaran" "pd" ON "lp"."id_pendaftaran"="pd"."id"
JOIN "sm_tenaga_medis" "tm" ON "sn"."id_dokter_narkoba" = "tm"."id"
JOIN "sm_pegawai" "pg" ON "tm"."id_pegawai" = "pg"."id"
WHERE "pd"."id" = '626803'
ERROR - 2025-06-20 09:57:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba&quot; &quot;id_dokter&quot;, &quot;pg&quot;.&quot;nama&quot;, &quot;pg&quot;.&quot;nik&quot;, &quot;sn&quot;. &quot;tgl...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:57:58 --> Query error: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl...
                                                             ^ - Invalid query: SELECT "sn"."id_dokter_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl_form"
FROM "sm_surat_narkoba" "sn"
JOIN "sm_layanan_pendaftaran" "lp" ON "sn"."id_layanan_pendaftaran"="lp"."id"
JOIN "sm_pendaftaran" "pd" ON "lp"."id_pendaftaran"="pd"."id"
JOIN "sm_tenaga_medis" "tm" ON "sn"."id_dokter_narkoba" = "tm"."id"
JOIN "sm_pegawai" "pg" ON "tm"."id_pegawai" = "pg"."id"
WHERE "pd"."id" = '626803'
ERROR - 2025-06-20 09:58:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:58:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba&quot; &quot;id_dokter&quot;, &quot;pg&quot;.&quot;nama&quot;, &quot;pg&quot;.&quot;nik&quot;, &quot;sn&quot;. &quot;tgl...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:58:07 --> Query error: ERROR:  column sn.tgl_form does not exist
LINE 1: ...er_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl...
                                                             ^ - Invalid query: SELECT "sn"."id_dokter_narkoba" "id_dokter", "pg"."nama", "pg"."nik", "sn". "tgl_form"
FROM "sm_surat_narkoba" "sn"
JOIN "sm_layanan_pendaftaran" "lp" ON "sn"."id_layanan_pendaftaran"="lp"."id"
JOIN "sm_pendaftaran" "pd" ON "lp"."id_pendaftaran"="pd"."id"
JOIN "sm_tenaga_medis" "tm" ON "sn"."id_dokter_narkoba" = "tm"."id"
JOIN "sm_pegawai" "pg" ON "tm"."id_pegawai" = "pg"."id"
WHERE "pd"."id" = '626803'
ERROR - 2025-06-20 09:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:58:40 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-20 09:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:59:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:59:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:59:38 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 09:59:38 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 09:59:41 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 09:59:42 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 09:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:59:44 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 09:59:45 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 09:59:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:59:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 09:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 09:59:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:00:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:00:12 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A143%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:00:26 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:26 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:31 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:31 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:44 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:44 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:00:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:01:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:01:13 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8064
ERROR - 2025-06-20 10:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:01:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:02:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:02:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 10:02:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:03:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:03:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:04:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200527) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:04:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200527) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200527', '00357225', '2025-06-20 10:04:15', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003294007885', NULL, '0223B1470425P000894', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250620B177')
ERROR - 2025-06-20 10:04:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:04:46 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-20 10:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:05:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:05:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 10:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:06:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:06:54 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00169480'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-06-20 10:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:07:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:07:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:07:36 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769713', '2025-06-20 09:43', '11', '', '', '', '', 'BB sebelum hamil = 39 Kg, BBA = 49 Kg, TB = 157 cm. IMT = 15,8 Kg/m2 status gizi malnutrisi. Tidak ada alergi makanan. Composmentis, GCS : 15, skala nyeri 3/10, EWS : 0 (Putih), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 50CC, tidak aktif, VT(+) tidak ada kassa di vagina, BAK (+), tanggal 19/06/2025 IVFD RL 20 IU Oxytosin 20 tpm (TAKI), TD: 121/75 mmHg, N: 92x/m, R: 20x/m, S: 36.6''C, SpO2 99% room air. Tanggal 19/06/2025 HB 9,5 leukosit 8,4, trombosit 323.000, urine protein negatif, tanggal 16/04/2025 di pkm poris gaga lama HIV non reaktif, HbSAG non reaktif, Sifilis non reaktif. Tanggal 19/06/2025 Partus pervaginam, insersi IUD, bayi di Rawat PINUS.', 'Peningkatan kebutuhan energi dan protein berkaitan dengan adanya perubahan metabolisme pada kehamilan dan anemia  ditandai dengan P1A0 post partum pervaginam dan Hb 9,5 ', 'Diet NB TKTP Tidak teh ; E 2083 Kkal P 78,1 gr, L 57,8 gr KH 312,4 gr ;bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan
', 'Asupan makan >80Ún Hb mendekati normal', '', '', '', '', '1868', '1', 'Diet NB TKTP Tidak teh 2083 Kkal', NULL, '1868', 0, NULL, '2025-06-20 10:07:36')
ERROR - 2025-06-20 10:07:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:07:42 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769713', '2025-06-20 09:43', '11', '', '', '', '', 'BB sebelum hamil = 39 Kg, BBA = 49 Kg, TB = 157 cm. IMT = 15,8 Kg/m2 status gizi malnutrisi. Tidak ada alergi makanan. Composmentis, GCS : 15, skala nyeri 3/10, EWS : 0 (Putih), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 50CC, tidak aktif, VT(+) tidak ada kassa di vagina, BAK (+), tanggal 19/06/2025 IVFD RL 20 IU Oxytosin 20 tpm (TAKI), TD: 121/75 mmHg, N: 92x/m, R: 20x/m, S: 36.6''C, SpO2 99% room air. Tanggal 19/06/2025 HB 9,5 leukosit 8,4, trombosit 323.000, urine protein negatif, tanggal 16/04/2025 di pkm poris gaga lama HIV non reaktif, HbSAG non reaktif, Sifilis non reaktif. Tanggal 19/06/2025 Partus pervaginam, insersi IUD, bayi di Rawat PINUS.', 'Peningkatan kebutuhan energi dan protein berkaitan dengan adanya perubahan metabolisme pada kehamilan dan anemia  ditandai dengan P1A0 post partum pervaginam dan Hb 9,5 ', 'Diet NB TKTP Tidak teh ; E 2083 Kkal P 78,1 gr, L 57,8 gr KH 312,4 gr ;bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan
', 'Asupan makan >80Ún Hb mendekati normal', '', '', '', '', '1868', '1', 'Diet NB TKTP Tidak teh 2083 Kkal', NULL, '1868', 0, NULL, '2025-06-20 10:07:42')
ERROR - 2025-06-20 10:07:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:07:53 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769713', '2025-06-20 09:43', '11', '', '', '', '', 'BB sebelum hamil = 39 Kg, BBA = 49 Kg, TB = 157 cm. IMT = 15,8 Kg/m2 status gizi malnutrisi. Tidak ada alergi makanan. Composmentis, GCS : 15, skala nyeri 3/10, EWS : 0 (Putih), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 50CC, tidak aktif, VT(+) tidak ada kassa di vagina, BAK (+), tanggal 19/06/2025 IVFD RL 20 IU Oxytosin 20 tpm (TAKI), TD: 121/75 mmHg, N: 92x/m, R: 20x/m, S: 36.6''C, SpO2 99% room air. Tanggal 19/06/2025 HB 9,5 leukosit 8,4, trombosit 323.000, urine protein negatif, tanggal 16/04/2025 di pkm poris gaga lama HIV non reaktif, HbSAG non reaktif, Sifilis non reaktif. Tanggal 19/06/2025 Partus pervaginam, insersi IUD, bayi di Rawat PINUS.', 'Peningkatan kebutuhan energi dan protein berkaitan dengan adanya perubahan metabolisme pada kehamilan dan anemia  ditandai dengan P1A0 post partum pervaginam dan Hb 9,5 ', 'Diet NB TKTP Tidak teh ; E 2083 Kkal P 78,1 gr, L 57,8 gr KH 312,4 gr ;bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan
', 'Asupan makan >80Ún Hb mendekati normal', '', '', '', '', '1868', '1', 'Diet NB TKTP Tidak teh 2083 Kkal', NULL, '1868', 0, NULL, '2025-06-20 10:07:53')
ERROR - 2025-06-20 10:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:07:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:07:57 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_02_skpk.php 242
ERROR - 2025-06-20 10:07:57 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:07:57 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:00 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:00 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:01 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:08:04 --> Severity: Notice  --> Undefined property: stdClass::$pekerjaan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/hasil_mcu_kirim_online/views/download/cetak_form_02_skpk.php 242
ERROR - 2025-06-20 10:08:04 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:04 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:08 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:08 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 10:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xda 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:08:09 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xda 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769713', '2025-06-20 09:43', '11', '', '', '', '', 'BB sebelum hamil = 39 Kg, BBA = 49 Kg, TB = 157 cm. IMT = 15,8 Kg/m2 status gizi malnutrisi. Tidak ada alergi makanan. Composmentis, GCS : 15, skala nyeri 3/10, EWS : 0 (Putih), ibu tampak meringis kesakitan saat beraktivitas, terdapat luka hecting perineum grade II, TFU: 2 jari di bawah pusat, kontraksi: Baik, perdarahan: 50CC, tidak aktif, VT(+) tidak ada kassa di vagina, BAK (+), tanggal 19/06/2025 IVFD RL 20 IU Oxytosin 20 tpm (TAKI), TD: 121/75 mmHg, N: 92x/m, R: 20x/m, S: 36.6''C, SpO2 99 persen room air. Tanggal 19/06/2025 HB 9,5 leukosit 8,4, trombosit 323.000, urine protein negatif, tanggal 16/04/2025 di pkm poris gaga lama HIV non reaktif, HbSAG non reaktif, Sifilis non reaktif. Tanggal 19/06/2025 Partus pervaginam, insersi IUD, bayi di Rawat PINUS.', 'Peningkatan kebutuhan energi dan protein berkaitan dengan adanya perubahan metabolisme pada kehamilan dan anemia  ditandai dengan P1A0 post partum pervaginam dan Hb 9,5 ', 'Diet NB TKTP Tidak teh ; E 2083 Kkal P 78,1 gr, L 57,8 gr KH 312,4 gr ;bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan
', 'Asupan makan >80Ún Hb mendekati normal', '', '', '', '', '1868', '1', 'Diet NB TKTP Tidak teh 2083 Kkal', NULL, '1868', 0, NULL, '2025-06-20 10:08:09')
ERROR - 2025-06-20 10:08:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:08:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:08:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A122%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:08:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:09:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:09:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:10:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 10:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:10:09 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 10:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:11:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:12:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:12:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:12:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:12:26 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A101%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:12:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:12:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:12:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:13:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:13:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:13:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:13:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2506200545) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:13:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2506200545) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2506200545', '00327292', '2025-06-20 10:13:35', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000817100673', NULL, '102505040625Y002339', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Bedah', 0, '2', '', '20250620A259')
ERROR - 2025-06-20 10:13:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:14:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:14:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:15:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 10:15:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 10:15:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:15:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 10:15:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:15:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:15:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:15:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:15:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:16:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:16:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:16:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (6439191, '704', 1499.832, '4', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:16:11 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (6439191, '704', 1499.832, '4', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6439191, '704', 1499.832, '4', '1.00', 'Ya', 'null')
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 10:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:16:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:16:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:16:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:16:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:16:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:16:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:17:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:17:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:17:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:17:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:17:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:17:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:18:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:18:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:18:58 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 10:19:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:19:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:19:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:19:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:19:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:19:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:19:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:19:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:19:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:20:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:20:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:21:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:21:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:21:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:21:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (871955, '4', '', '56', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:22:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (871955, '4', '', '56', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (871955, '4', '', '56', '2 x Sehari 2 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 10:23:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:23:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:24:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:24:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:24:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:24:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:24:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:25:58 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-20 10:26:05 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-20 10:26:14 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-20 10:26:18 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1882
ERROR - 2025-06-20 10:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:26:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:27:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:27:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:28:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:28:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:29:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:29:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:29:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:29:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:30:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:30:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:30:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:30:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:30:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 10:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:32:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:32:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:32:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:32:47 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-06-20 10:32:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:33:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:33:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:33:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:33:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:33:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:34:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:34:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:34:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:34:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:34:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:34:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:35:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:36:03 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-06-20 10:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 906
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 906
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 911
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 911
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 912
ERROR - 2025-06-20 10:36:40 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 912
ERROR - 2025-06-20 10:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:36:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:37:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:37:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:37:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:37:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:37:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:37:57 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A260%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:38:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:38:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:39:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:39:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:39:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:40:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:40:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:41:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:41:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:41:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:42:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:42:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:42:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:42:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:42:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:42:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:42:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:43:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:43:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:44:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:45:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:45:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:45:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:45:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:45:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:45:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:45:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:47 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0002102897777'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:45:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:49 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-06-20 10:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:45:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:45:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:46:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 11: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:46:29 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-06-20 10:46:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:47:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:47:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:47:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:47:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A123%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:47:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:48:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 10:48:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:48:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 10:48:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:48:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:48:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:48:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:48:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:49:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:49:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:49:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:49:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:49:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:50:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:50:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:50:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:50:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:50:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:50:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:50:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:50:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6440163, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:50:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6440163, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6440163, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-20 10:51:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:51:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:51:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:51:19 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND "ab"."no_kartu" = '0000813923616'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:51:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:51:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:52:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:52:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:52:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:52:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:52:08 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A215%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:52:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:52:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:53:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:53:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 10:53:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:53:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 10:53:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:55:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:56:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:57:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:57:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:57:14 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A140%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:57:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:57:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:57:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:57:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:57:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:57:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:58:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:58:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:58:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:58:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 10:58:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-06-20 00:00:00' AND '2025-06-20 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A188%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 10:59:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:59:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 10:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:00:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:00:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 11:00:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:00:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 11:00:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:00:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:00:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:00:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:00:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:00:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:00:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:00:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:01:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:02:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:02:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:03:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:03:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:03:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:04:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:04:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:05:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:05:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:06:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:06:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:06:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:07:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:07:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:07:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:08:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:08:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:09:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:09:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:09:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:09:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:09:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 11:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:10:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:11:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:11:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:11:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:11:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 11:11:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 11:11:33 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 11:11:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 11:11:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:11:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:12:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:12:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:13:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:14:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:14:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:14:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:14:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:15:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:15:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:16:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:16:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:16:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:16:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:17:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:17:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:18:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 11:18:25 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-20 11:18:25 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-20 11:18:34 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-20 11:18:34 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-20 11:18:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Booking_poliklinik' does not have a method 'index_get' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 11:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:18:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:18:50 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '28'
AND date(tanggal_layanan) = ''
ERROR - 2025-06-20 04:19:00 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/controllers/api/Pasien.php 606
ERROR - 2025-06-20 11:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:19:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:19:34 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 302
ERROR - 2025-06-20 11:19:34 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/list_booking/controllers/api/List_booking.php 303
ERROR - 2025-06-20 11:19:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:20:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:21:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:21:28 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:22:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:22:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:22:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:22:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
			jko.*, "tp"."total", "k"."nama" as "kelas", COALESCE(jko.klasifikasi, '') as klasifikasi, COALESCE(ro.nama, '') as ruang_operasi, "p"."kelamin", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."agama", "p"."telp", COALESCE(l.nama, '') as operasi, COALESCE(ll.nama, '') as parent, "p"."telp", "top"."id" as "id_tim_operasi", "lp"."id_pendaftaran", "lp"."tindak_lanjut" "tindak_lanjut_pengirim", concat_ws(' | ', "icd"."icd9", icd.nama) tindakan_icd9
FROM "sm_jadwal_kamar_operasi" as "jko"
LEFT JOIN "sm_layanan_pendaftaran" as "lp" ON "jko"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_tarif_pelayanan" as "tp" ON "tp"."id" = "jko"."id_tarif"
LEFT JOIN "sm_ruang_operasi" as "ro" ON "ro"."id" = "jko"."id_ruang_operasi"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "tp"."id_kelas"
LEFT JOIN "sm_pasien" as "p" ON "p"."id" = "jko"."id_pasien"
LEFT JOIN "sm_layanan" as "l" ON "l"."id" = "tp"."id_layanan"
LEFT JOIN "sm_layanan" as "ll" ON "ll"."id" = "l"."id_parent"
LEFT JOIN "sm_tim_operasi" as "top" ON "top"."id_jadwal_operasi" = "jko"."id"
LEFT JOIN "sm_icd_ix" as "icd" ON "jko"."id_icd9" = "icd"."id"
WHERE "jko"."layanan" = 'OK'
ORDER BY "jko"."id" DESC, "jko"."waktu" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 11:23:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:23:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:23:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:23:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:24:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:24:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:24:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:25:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:25:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:25:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:26:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:26:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:26:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:26:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:26:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:26:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:26:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:26:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:26:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:27:12 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:12 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:12 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:27:12 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 11:27:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:27:24 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:24 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:27:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 04:27:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:27:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:27:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:27:49 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:49 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:27:49 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:27:49 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 11:28:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:28:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:28:14 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:28:14 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:28:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:28:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 11:28:36 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:28:36 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:28:36 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:28:36 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 11:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:31:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 11:32:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 11:32:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:32:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:32:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:32:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:33:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:33:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:33:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:33:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:33:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:33:40 --> Severity: Notice  --> Undefined offset: 2 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:33:40 --> Severity: Notice  --> Undefined offset: 1 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/form_rekam_medis/controllers/api/Entri_keperawatan.php 2921
ERROR - 2025-06-20 11:33:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 11:33:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 11:33:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:34:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:34:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:34:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:34:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:35:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:36:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:36:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:36:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:36:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:37:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:37:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:37:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:37:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:38:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:38:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:38:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:38:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:38:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:39:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:40:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:40:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:40:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:40:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:40:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:40:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:40:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:40:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:41:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:42:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:42:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:43:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:44:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:44:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:44:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:45:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:45:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:45:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:47:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:50:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:50:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:52:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:52:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:54:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:54:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:55:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:55:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:55:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:55:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:55:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 11:55:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 11:55:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:56:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:57:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:57:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:57:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:57:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:58:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:58:30 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 11:58:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 04:58:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:58:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:59:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:59:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:59:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 04:59:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:01:54 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 12:01:54 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 12:01:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:02:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:02:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:05:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:05:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:10:18 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-06-20 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:11:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:11:43 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 12:11:43 --> Severity: Warning  --> Illegal string offset 'hex' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/vendor/dompdf/dompdf/src/Css/Style.php 1478
ERROR - 2025-06-20 12:12:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:15:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:15:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:15:04 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 12:15:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:15:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:16:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 12:16:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:16:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:16:08 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 12:16:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:16:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:16:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:16:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 12:16:33 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:17:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:18:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xce 0x66 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:18:21 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xce 0x66 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769887', '2025-06-20 10:09', '10', 'demam naik turun, mual nafsu makan berkurang sesak, memberat saat batuk, batuk berdahak sejak 1 minggu ini
observasi perselubungan hilus dextra ( massa paru dextra )', 'P: sdv+, rbk ++', 'Pneumonia
massa paru dextra
suspek tb
HT
post PCI', 'infus ganti dng NaCl 0,9 Îftri 2x 2 gr
MP 2x 62,5 mg
pct 3x 11 amp
PO:
ibuprofen 2x 1 tab 
nac 3x 1 tab
lain lanjut
cek gram 
tcm tb', '', '', '', '', '', '', '', '', '785', '1', 'infus ganti dng NaCl 0,9 %<div>ceftri 2x 2 gr</div><div>MP 2x 62,5 mg</div><div>pct 3x 11 amp</div><div>PO:</div><div>ibuprofen 2x 1 tab </div><div>nac 3x 1 tab</div><div>lain lanjut</div><div>cek gram </div><div>tcm tb</div>', NULL, '785', 0, NULL, '2025-06-20 12:18:21')
ERROR - 2025-06-20 12:18:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xce 0x66 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:18:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xce 0x66 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769887', '2025-06-20 10:09', '10', 'demam naik turun, mual nafsu makan berkurang sesak, memberat saat batuk, batuk berdahak sejak 1 minggu ini
observasi perselubungan hilus dextra ( massa paru dextra )', 'P: sdv+, rbk ++', 'Pneumonia
massa paru dextra
suspek tb
HT
post PCI', 'infus ganti dng NaCl 0,9 Îftri 2x 2 gr
MP 2x 62,5 mg
pct 3x 11 amp
PO:
ibuprofen 2x 1 tab 
nac 3x 1 tab
lain lanjut
cek gram 
tcm tb', '', '', '', '', '', '', '', '', '785', '1', 'infus ganti dng NaCl 0,9 %<div>ceftri 2x 2 gr</div><div>MP 2x 62,5 mg</div><div>pct 3x 11 amp</div><div>PO:</div><div>ibuprofen 2x 1 tab </div><div>nac 3x 1 tab</div><div>lain lanjut</div><div>cek gram </div><div>tcm tb</div>', NULL, '785', 0, NULL, '2025-06-20 12:18:27')
ERROR - 2025-06-20 12:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xce 0x66 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:18:42 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xce 0x66 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769887', '2025-06-20 10:09', '10', 'demam naik turun, mual nafsu makan berkurang sesak, memberat saat batuk, batuk berdahak sejak 1 minggu ini
observasi perselubungan hilus dextra ( massa paru dextra )', 'P: sdv+, rbk ++', 'Pneumonia
massa paru dextra
suspek tb
HT
post PCI', 'infus ganti dng NaCl 0,9 Îftri 2x 2 gr
MP 2x 62,5 mg
pct 3x 11 amp
PO:
ibuprofen 2x 1 tab 
nac 3x 1 tab
lain lanjut
cek gram 
tcm tb', '', '', '', '', '', '', '', '', '785', '1', 'infus ganti dng NaCl 0,9 %<div>ceftri 2x 2 gr</div><div>MP 2x 62,5 mg</div><div>pct 3x 11 amp</div><div>PO:</div><div>ibuprofen 2x 1 tab </div><div>nac 3x 1 tab</div><div>lain lanjut</div><div>cek gram </div><div>tcm tb</div>', NULL, '785', 0, NULL, '2025-06-20 12:18:42')
ERROR - 2025-06-20 12:18:50 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 569
ERROR - 2025-06-20 12:18:50 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 896
ERROR - 2025-06-20 12:19:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:19:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:19:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:20:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:20:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:23:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 12:23:28 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 12:23:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 12:23:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 12:23:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 12:24:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:24:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:24:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:24:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (6441261, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:24:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (6441261, '60', 130.8, '1', '4.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6441261, '60', 130.8, '1', '4.00', NULL, 'null')
ERROR - 2025-06-20 12:24:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:24:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:24:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:24:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:24:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:25:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:25:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:26:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:26:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:26:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:26:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:26:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:27:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:27:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:27:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:27:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:27:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:27:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:28:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:28:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:28:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:28:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:28:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:28:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:28:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:28:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:29:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:29:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:30:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:30:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:30:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:30:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:30:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:30:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:31:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:31:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:31:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:31:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:31:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:31:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:32:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:32:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:32:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:32:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:33:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:33:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:33:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:33:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:33:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:33:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:33:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:34:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:34:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:34:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:34:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:35:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:35:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:35:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:35:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:36:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:36:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:36:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:36:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:36:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:36:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:36:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:36:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:36:57 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 12:37:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:37:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:37:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:37:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:37:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:37:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:37:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:37:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:37:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:37:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:38:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:38:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:38:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:38:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:38:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:38:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:38:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:39:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:39:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:39:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:39:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:39:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:39:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:39:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:39:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:40:43 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:40:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:40:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:41:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:41:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:42:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:42:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:42:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:42:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:42:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 12:42:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:42:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:42:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:42:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:43:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:43:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:43:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:43:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:43:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:43:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:44:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:44:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:44:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:44:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:44:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:45:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:46:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:46:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:47:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:47:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:50:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-06-20 12:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:51:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:51:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:51:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:51:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:51:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:51:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:51:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:52:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:52:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:52:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:52:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:53:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:54:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:54:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:54:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:54:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:54:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:54:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:54:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:54:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:54:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:54:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:55:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:55:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:56:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:56:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 05:57:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 05:57:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:58:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:58:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:58:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:58:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:58:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:58:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:58:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:59:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:59:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:59:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 12:59:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 12:59:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:01:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:01:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:02:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:02:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:02:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:02:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:02:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:02:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:04:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:04:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:04:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:04:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:04:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:04:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:04:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:05:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:05:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:05:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:05:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:05:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 13:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:07:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  deadlock detected
DETAIL:  Process 45027 waits for ShareLock on transaction 38138018; blocked by process 51638.
Process 51638 waits for ShareLock on transaction 38137998; blocked by process 45027.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (43827,28) in relation &quot;sm_akses_satu_sehat&quot; /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:13 --> Query error: ERROR:  deadlock detected
DETAIL:  Process 45027 waits for ShareLock on transaction 38138018; blocked by process 51638.
Process 51638 waits for ShareLock on transaction 38137998; blocked by process 45027.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (43827,28) in relation "sm_akses_satu_sehat" - Invalid query: UPDATE "sm_akses_satu_sehat" SET "token" = 'yWMxqAHGX1eOUkAS0cMgZkqLTdQW', "timeissued" = '1750399771809', "app_name" = '891dab0d-d89e-402d-9c12-67493227a651', "tanggal" = '2025-06-20 13:06:46'
WHERE "userakses" = 1334
ERROR - 2025-06-20 13:07:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  deadlock detected
DETAIL:  Process 51638 waits for ShareLock on transaction 38138023; blocked by process 43784.
Process 43784 waits for ShareLock on transaction 38138018; blocked by process 51638.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (43724,13) in relation &quot;sm_akses_satu_sehat&quot; /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:15 --> Query error: ERROR:  deadlock detected
DETAIL:  Process 51638 waits for ShareLock on transaction 38138023; blocked by process 43784.
Process 43784 waits for ShareLock on transaction 38138018; blocked by process 51638.
HINT:  See server log for query details.
CONTEXT:  while rechecking updated tuple (43724,13) in relation "sm_akses_satu_sehat" - Invalid query: UPDATE "sm_akses_satu_sehat" SET "token" = 'yWMxqAHGX1eOUkAS0cMgZkqLTdQW', "timeissued" = '1750399771809', "app_name" = '891dab0d-d89e-402d-9c12-67493227a651', "tanggal" = '2025-06-20 13:07:07'
WHERE "userakses" = 1334
ERROR - 2025-06-20 13:07:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:07:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:07:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:07:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:07:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:07:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:08:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:08:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:08:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:08:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:08:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:08:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (6441928, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (6441928, '701', 1598.4, '25', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6441928, '701', 1598.4, '25', '1.00', 'Ya', 'null')
ERROR - 2025-06-20 13:08:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:08:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:08:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:09:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:09:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:10:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:10:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 2: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 2: WHERE "id" = ''
                     ^ - Invalid query: UPDATE "sm_layanan_pendaftaran" SET "id" = '', "id_dokter" = '440', "status_terlayani" = 'Sudah', "id_sub_spesialis" = NULL
WHERE "id" = ''
ERROR - 2025-06-20 13:10:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:10:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:10:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:10:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:10:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:11:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:11:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:11:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:11:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:12:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:12:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:13:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:13:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:13:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:13:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:14:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:14:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:14:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:14:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:14:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:14:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:15:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:15:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:15:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:16:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:16:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:16:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:16:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:16:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:16:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:16:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:16:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:16:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:17:48 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:17:48 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:17:48 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:17:54 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:17:54 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:17:54 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:17:59 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:17:59 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:17:59 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:17:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:17:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:18:01 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:18:01 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:18:01 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:18:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:18:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:18:16 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:18:16 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:18:16 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:18:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:18:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:18:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:18:49 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:18:49 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:18:49 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:19:01 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 681
ERROR - 2025-06-20 13:19:01 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 687
ERROR - 2025-06-20 13:19:01 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 688
ERROR - 2025-06-20 13:19:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:19:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:19:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:19:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:19:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:19:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:19:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:19:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:19:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:20:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:21:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:21:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:21:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:21:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:21:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:21:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:21:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:21:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:21:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:22:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 13:22:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:22:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:23:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:23:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:23:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:23:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:23:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:23:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:24:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:24:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:24:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:25:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:25:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:25:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:25:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:25:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (6442261, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:25:47 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (6442261, '123', 2386.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6442261, '123', 2386.8, '1', '1.00', NULL, 'null')
ERROR - 2025-06-20 13:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:25:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:25:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:26:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:26:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:26:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:26:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:26:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:26:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:26:57 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:27:25 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 13:28:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 13:28:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:28:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:28:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:28:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:28:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:28:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:28:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:28:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:28:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:28:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:29:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:29:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:30:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:30:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:30:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:30:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('872153', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:21 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('872153', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('872153', '2', '', '', '', '', 'PC', '0', '', '0', '', '3 X SEHARI 0,5 ML DEMAM/NYERI', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 13:30:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:30:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:30:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:30:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:30:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:30:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:31:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:31:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:32:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:32:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:33:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('872156', '3', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:33:03 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('872156', '3', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('872156', '3', '', '', '3 X SEHARI 1 BUNGKUS', '', 'PC', '0', '', '0', '', 'HABISKAN TIAP 8 JAM', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 13:33:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:34:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:34:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:34:51 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT DISTINCT ON (jko.id) 
			jko.*, "tp"."total", "k"."nama" as "kelas", COALESCE(jko.klasifikasi, '') as klasifikasi, COALESCE(ro.nama, '') as ruang_operasi, "p"."kelamin", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."agama", "p"."telp", COALESCE(l.nama, '') as operasi, COALESCE(ll.nama, '') as parent, "p"."telp", "top"."id" as "id_tim_operasi", "lp"."id_pendaftaran", "lp"."tindak_lanjut" "tindak_lanjut_pengirim", concat_ws(' | ', "icd"."icd9", icd.nama) tindakan_icd9
FROM "sm_jadwal_kamar_operasi" as "jko"
LEFT JOIN "sm_layanan_pendaftaran" as "lp" ON "jko"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_tarif_pelayanan" as "tp" ON "tp"."id" = "jko"."id_tarif"
LEFT JOIN "sm_ruang_operasi" as "ro" ON "ro"."id" = "jko"."id_ruang_operasi"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "tp"."id_kelas"
LEFT JOIN "sm_pasien" as "p" ON "p"."id" = "jko"."id_pasien"
LEFT JOIN "sm_layanan" as "l" ON "l"."id" = "tp"."id_layanan"
LEFT JOIN "sm_layanan" as "ll" ON "ll"."id" = "l"."id_parent"
LEFT JOIN "sm_tim_operasi" as "top" ON "top"."id_jadwal_operasi" = "jko"."id"
LEFT JOIN "sm_icd_ix" as "icd" ON "jko"."id_icd9" = "icd"."id"
WHERE "jko"."layanan" = 'OK'
AND "jko"."status" = 'Confirmed'
ORDER BY "jko"."id" DESC, "jko"."waktu" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-06-20 13:35:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:35:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:35:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 13:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:35:07 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 13:35:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:35:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:36:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:36:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:36:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:36:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:02 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:37:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:38:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:38:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:38:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:38:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:38:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:38:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:39:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:39:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:39:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:39:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:39:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:39:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:39:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:39:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:40:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:40:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:40:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:40:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:40:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:40:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:40:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:41:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:41:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:41:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:41:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:41:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:42:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:42:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:42:17 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:42:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:42:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:42:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:42:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:42:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:43:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:43:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:43:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:43:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:43:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:43:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:43:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:44:16 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:44:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:44:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:44:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:45:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:45:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:45:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:45:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:45:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:45:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:45:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:46:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:46:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:46:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:46:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:46:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:47:15 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:47:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:47:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:47:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:47:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:48:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:48:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:48:41 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 13:48:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:48:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:49:00 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 354
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:26 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 447
ERROR - 2025-06-20 13:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:49:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:49:29 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:49:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:49:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:50:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:50:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:50:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:51:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:51:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:51:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:51:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:51:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:51:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:52:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:52:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:53:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:54:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:54:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:55:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:55:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:55:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:55:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:55:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:55:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:55:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:55:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 13:58:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 13:58:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:00:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:01:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:01:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:02:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1799
ERROR - 2025-06-20 14:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:02:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:03:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:03:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:04:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:04:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:05:26 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:05:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:05:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 14:05:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:05:39 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 14:05:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:05:53 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 14:05:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:05:53 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 14:05:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:05:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:06:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:06:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:06:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:06:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:06:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:06:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:06:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:07:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:07:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:07:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:07:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:07:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:07:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:07:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 14:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:07:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:54 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-06-20 14:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:08:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:08:55 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-06-20 14:09:38 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4855
ERROR - 2025-06-20 14:09:38 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4949
ERROR - 2025-06-20 14:09:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:09:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:09:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:09:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:10:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 07:10:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 07:10:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 14:10:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:10:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:10:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:10:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:11:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:11:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:11:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:11:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:11:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:11:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:12:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:12:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:12:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:12:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:12:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:12:35 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:13:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 14:13:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:13:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:13:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:13:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:14:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:14:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:14:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:14:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:14:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:14:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:14:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:14:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:15:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:15:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:16:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:16:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:16:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:16:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:16:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:16:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:18:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:18:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:19:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:19:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:19:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:19:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:19:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:19:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:22:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:22:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:22:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:22:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:23:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:23:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:24:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:24:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:24:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:24:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:25:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:25:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:25:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:25:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:25:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:25:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:25:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 14:25:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 14:25:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:25:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:26:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:26:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:26:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:26:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:26:24 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 14:26:24 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 14:27:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 14:27:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 14:29:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:29:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:29:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:29:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:29:47 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 14:29:47 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 14:32:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:32:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:32:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:32:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:33:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:33:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:34:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:34:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:34:25 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:34:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:34:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:34:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:34:59 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:35:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:35:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:35:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:36:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:36:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:36:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:36:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:36:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:36:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:37:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:37:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:37:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:37:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:37:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:39:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:39:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:40:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:40:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:40:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:40:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:40:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:40:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:40:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:40:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:42:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:42:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:42:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:42:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:42:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:42:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:43:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:43:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:44:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:44:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:44:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:44:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:45:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:45:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:45:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:45:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:46:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:46:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:46:46 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:47:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:47:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:48:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 14:48:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 14:48:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:49:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:50:52 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 14:50:52 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 07:52:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 07:52:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 14:53:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 07:54:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 07:54:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 14:55:01 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:56:52 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 14:59:32 --> Severity: Notice  --> Undefined index:  /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/helpers/syams_helper.php 1115
ERROR - 2025-06-20 08:00:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:00:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:00:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:00:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:04:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:05:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:07:38 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-06-20 15:08:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:10:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:10:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:12:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:12:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:12:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:12:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:12:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:12:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:13:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:13:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:17:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:18:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:24:22 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:24:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:25:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:25:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:25:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:25:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:25:49 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:25:51 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:26:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:26:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:26:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:26:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:26:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:27:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:28:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:28:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:34:39 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:35:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:35:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:35:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:36:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:36:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:36:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:36:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:36:49 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:38:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:38:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:38:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:38:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:38:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:39:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:39:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:39:49 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:39:49 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:40:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:40:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:41:27 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:41:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:41:38 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:42:13 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:42:13 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:42:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:42:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:44:19 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:44:32 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:45:18 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 08:46:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:43 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:43 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:46:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 08:47:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:47:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:47:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:48:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:48:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('770648', '', '2051'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('770648', '', '2051'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('770648', '', '2051', '2025-06-20 15:43', '{"cara_tiba_diruangan_pasien":"Brankar"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":"Poli Kebidanan RSUD Kota Tangerang"}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":"1","keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien mengatakan nyeri pada luka operasi"}', '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', NULL, '1', '0', '0', '-', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"4","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"2","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"disangkal","riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":"2025","riwayat_penyakit_oprasi_14":"RSUD Kota Tangerang","riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"disangkal"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"disangkal"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":"1","riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":"1","riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"SC"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":"1"}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"18:00","kebutuhan_biologis_3":"7","kebutuhan_biologis_4":"18:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"18:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"07:00","kebutuhan_biologis_9":"lupa"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":"1","status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":null,"status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"berdoa"}', '{"spiritual_1":null,"spiritual_2":null,"spiritual_3":"1","spiritual_4":"nifas","spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":"-","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":"1","infeksi_abdomen_5":null,"infeksi_abdomen_6":"1","infeksi_abdomen_7":null,"infeksi_abdomen_8":"1","infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"2 jari di bawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":"Kontraksi Baik","palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":"-","palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":"-","palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak dilakukan pemeriksaan dalam","pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '0', '0', '5', '10', '5', '5', '0', '0', '0', '35', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', NULL, NULL, '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"115","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"61","berat_badan_2":"156"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":"1","dada_askila_4":"1","dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-20', '2025-06-20', 'terlampir', 'terlampir', NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-20 15:43', '614', '1', '2025-06-20 15:51', '50', '1', '2025-06-20 15:48:59')
ERROR - 2025-06-20 15:49:08 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('770648', '', '2051'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:49:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('770648', '', '2051'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('770648', '', '2051', '2025-06-20 15:43', '{"cara_tiba_diruangan_pasien":"Brankar"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":null,"rujukan_pasien_8":"lain-lain","rujukan_pasienl":"Poli Kebidanan RSUD Kota Tangerang"}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":"1","keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien mengatakan nyeri pada luka operasi"}', '{"hamil_muda_1":null,"hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":"1","hamil_lain_lain":"-"}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":"1","hamil_lain_5":"-"}', '{"anc_1":"-","anc_2":"-","anc_3":null,"anc_4":null,"anc_5":null}', NULL, '1', '0', '0', '-', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"4","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"2","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"disangkal","riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":"2025","riwayat_penyakit_oprasi_14":"RSUD Kota Tangerang","riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":"1","terapi_komplementari_6":"disangkal"}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"disangkal"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":"1","riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":"1","riwayat_ginekologi_11":"1","riwayat_ginekologi_12":"SC"}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":"1"}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"18:00","kebutuhan_biologis_3":"7","kebutuhan_biologis_4":"18:00","kebutuhan_biologis_5":"8","kebutuhan_biologis_6":"18:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"07:00","kebutuhan_biologis_9":"lupa"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":"1","status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":null,"status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"berdoa"}', '{"spiritual_1":null,"spiritual_2":null,"spiritual_3":"1","spiritual_4":"nifas","spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":"1","budaya_5":null,"budaya_6":"-","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":"1","infeksi_abdomen_5":null,"infeksi_abdomen_6":"1","infeksi_abdomen_7":null,"infeksi_abdomen_8":"1","infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"2 jari di bawah pusat","palpasi_2":null,"palpasi_3":null,"palpasi_4":"1","palpasi_5":"Kontraksi Baik","palpasi_6":null,"palpasi_7":null,"palpasi_8":"1","palpasi_9":"-","palpasi_10":null,"palpasi_11":null,"palpasi_12":"1","palpasi_13":"-","palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":"1","pemeriksaan_dalam_4":"tidak dilakukan pemeriksaan dalam","pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '0', '0', '5', '10', '5', '5', '0', '0', '0', '35', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Sedang"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":null,"nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', NULL, NULL, '30', '20', NULL, NULL, '20', '0', NULL, '85', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"115","tekanan_darah_2":"78","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":"61","berat_badan_2":"156"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":"1","dada_askila_4":"1","dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', '0_1', NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-06-20', NULL, 'terlampir', NULL, NULL, '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":"1","kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-06-20 15:43', '614', '1', '2025-06-20 15:51', '50', '1', '2025-06-20 15:49:09')
ERROR - 2025-06-20 15:49:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:49:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:49:38 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:51:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:52:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 15:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:55:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:56:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 15:56:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 15:56:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:58:53 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 11182
ERROR - 2025-06-20 15:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:00:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:00:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:01:12 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:01:12 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:01:16 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:01:16 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 16:03:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 16:03:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 16:03:20 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 16:03:20 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 16:03:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:03:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 16:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:04:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 16:05:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 16:15:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:15:39 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('769851', '67', '672', '2025-06-20 14:00:00', 'Nyeri akut ', 'RL 20 Tpm ', 'Observasi skala nyeri, observasi TTV, Kompres NaCL 0.9Þngan kassa lembab, Cek KGDH/Hari ', '207', '159', '1995')
ERROR - 2025-06-20 16:15:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:15:48 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('769851', '67', '672', '2025-06-20 14:00:00', 'Nyeri akut ', 'RL 20 Tpm ', 'Observasi skala nyeri, observasi TTV, Kompres NaCL 0.9Þngan kassa lembab, Cek KGDH/Hari ', '207', '159', '1995')
ERROR - 2025-06-20 16:15:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:15:52 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_catatan_operan_perawat_sore" ("id_layanan_pendaftaran", "dokter_dpjp_sore", "konsulen_sore", "tanggal_waktu_sore", "diagnosa_keperawatan_sore", "infus_sore", "rencana_tindakan_sore", "perawat_mengover_sore", "perawat_menerima_sore", "id_users") VALUES ('769851', '67', '672', '2025-06-20 14:00:00', 'Nyeri akut ', 'RL 20 Tpm ', 'Observasi skala nyeri, observasi TTV, Kompres NaCL 0.9Þngan kassa lembab, Cek KGDH/Hari ', '207', '159', '1995')
ERROR - 2025-06-20 16:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (872226, '3', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 16:16:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (872226, '3', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (872226, '3', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 16:17:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 16:20:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 09:21:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:21:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:21:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:21:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 16:22:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:22:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:22:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 16:22:54 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 16:27:23 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-06-20 16:36:03 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 16:36:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 16:38:26 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 16:38:26 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 16:52:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:52:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 16:52:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 16:53:02 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 09:53:50 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 09:53:50 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 17:06:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:06:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 17:06:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:06:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 10:13:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 10:13:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 10:13:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 10:13:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 17:23:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:23:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 17:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 17:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 17:24:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:24:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 17:30:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (872244, '9', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:30:35 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (872244, '9', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (872244, '9', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 17:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 17:36:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 17:39:31 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 17:54:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:54:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 17:54:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 17:54:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 18:03:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:03:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 18:03:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:03:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 18:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:03:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 18:15:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 18:15:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 11:24:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:24:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:24:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 11:24:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 18:26:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 18:27:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-20 19.00&quot;
LINE 1: ...&quot;sm_kep_73_01&quot; SET &quot;id_user&quot; = '1361', &quot;lo_tgl&quot; = '2025-06-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:27:56 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-20 19.00"
LINE 1: ..."sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-2...
                                                             ^ - Invalid query: UPDATE "sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-20 19.00', "lo_td" = '123/77', "lo_n" = '88', "lo_r" = '21', "lo_s" = '36.6', "lo_sat" = '100', "lo_djj" = '145x/mnit', "lo_his" = '2x10` 20', "lo_tfu" = '33', "lo_kontraksi" = '+', "lo_perdarahan" = 'blood slym (+)', "lo_urin" = NULL, "lo_ket" = 'O2 3 lpm', "updated_date" = '2025-06-20 18:27:56'
WHERE "id" = '6283'
ERROR - 2025-06-20 18:28:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-20 19.30&quot;
LINE 1: ...&quot;sm_kep_73_01&quot; SET &quot;id_user&quot; = '1361', &quot;lo_tgl&quot; = '2025-06-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:28:04 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-20 19.30"
LINE 1: ..."sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-2...
                                                             ^ - Invalid query: UPDATE "sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-20 19.30', "lo_td" = '123/77', "lo_n" = '88', "lo_r" = '21', "lo_s" = '36.6', "lo_sat" = '100', "lo_djj" = '145x/mnit', "lo_his" = '2x10` 20', "lo_tfu" = '33', "lo_kontraksi" = '+', "lo_perdarahan" = 'blood slym (+)', "lo_urin" = NULL, "lo_ket" = 'O2 3 lpm', "updated_date" = '2025-06-20 18:28:04'
WHERE "id" = '6283'
ERROR - 2025-06-20 18:28:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-06-20 19.30&quot;
LINE 1: ...&quot;sm_kep_73_01&quot; SET &quot;id_user&quot; = '1361', &quot;lo_tgl&quot; = '2025-06-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 18:28:06 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-06-20 19.30"
LINE 1: ..."sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-2...
                                                             ^ - Invalid query: UPDATE "sm_kep_73_01" SET "id_user" = '1361', "lo_tgl" = '2025-06-20 19.30', "lo_td" = '123/77', "lo_n" = '88', "lo_r" = '21', "lo_s" = '36.6', "lo_sat" = '100', "lo_djj" = '145x/mnit', "lo_his" = '2x10` 20', "lo_tfu" = '33', "lo_kontraksi" = '+', "lo_perdarahan" = 'blood slym (+)', "lo_urin" = NULL, "lo_ket" = 'O2 3 lpm', "updated_date" = '2025-06-20 18:28:06'
WHERE "id" = '6283'
ERROR - 2025-06-20 18:29:42 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 18:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 18:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 19:03:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:03:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 19:06:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:06:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
ERROR - 2025-06-20 19:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 19:18:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:21:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:21:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 19:24:41 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:36:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:36:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:36:05 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:36:05 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:36:31 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:36:31 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 19:38:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:38:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 19:45:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:45:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 19:45:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:45:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 19:46:21 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 12:47:03 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:47:03 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:47:07 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:47:07 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:47:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 12:47:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 19:48:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xce 0x66 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:48:04 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xce 0x66 - Invalid query: INSERT INTO "sm_formulir_observasi_igd" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tanggal_1_fodti", "tanggal_2_fodti", "jam_1_fodti", "bismilah_fodti", "td_s_fodti", "td_d_fodti", "nadi_fodti", "rr_fodti", "suhu_fodti", "sat_o2_fodti", "kategori_fodti", "skala_fodti", "resiko_fodti", "kesadaran_fodti", "gcs_e_fodti", "gcs_m_fodti", "gcs_v_fodti", "total_gcs_fodti", "pupil_kanan_fodti", "pupil_kiri_fodti", "pemeriksaan_fodti", "jam_2_fodti", "implementasi_fodti", "alhamdulilah_fodti", "ttd_fodti", "perawat_fodti", "created_at") VALUES ('711532', '770665', '1378', '2025-06-20', '2025-06-20', '20:00', '1', '126', '89', '88', '20', '36.5', '100', 'putih', '3/10', '75', 'A', '4', '6', '5', '15', '2/+', '2/+', 'dr,gds,goldar,', '20:00', 'mengambil darah vena
cek lab
pasang infus 
dexa
mgso4 40Îftriaxon ', '1', '1', '319', '2025-06-20 19:45:53')
ERROR - 2025-06-20 19:49:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x78 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 19:49:59 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x78 - Invalid query: INSERT INTO "sm_formulir_observasi_igd" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tanggal_1_fodti", "tanggal_2_fodti", "jam_1_fodti", "bismilah_fodti", "td_s_fodti", "td_d_fodti", "nadi_fodti", "rr_fodti", "suhu_fodti", "sat_o2_fodti", "kategori_fodti", "skala_fodti", "resiko_fodti", "kesadaran_fodti", "gcs_e_fodti", "gcs_m_fodti", "gcs_v_fodti", "total_gcs_fodti", "pupil_kanan_fodti", "pupil_kiri_fodti", "pemeriksaan_fodti", "jam_2_fodti", "implementasi_fodti", "alhamdulilah_fodti", "ttd_fodti", "perawat_fodti", "created_at") VALUES ('711532', '770665', '1378', '2025-06-20', '2025-06-20', '20:00', '1', '126', '89', '88', '20', '36.5', '100', 'putih', '3/10', '75', 'A', '4', '6', '5', '15', '2/+', '2/+', 'dl,gds,goldar', '20:00', 'mengambil draah vena
cek lab
pasang infus
mgso4 40 Þxa
ceftriaxon', '1', '1', '319', '2025-06-20 19:48:23')
ERROR - 2025-06-20 19:56:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-20 19:56:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-20 19:56:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-20 20:00:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 20:00:56 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('769885', '2025-06-20 20:02', '8', 'lemas ', 'CM TD : 86/55 N : 83 S : 36.3 SpO2 : 97Þngan 02 2LPM NK ', 'DM; AKI; Pneumoni; Sepsis? Abdominal pain susp Ileus dd massa? + Melena ec susp. Gastritis Erosif+ Anemia (9,0)', 'laoding 250 cc, cek ttv post loading ', '', '', '', '', '', '', '', '', '737', '1', '.', NULL, '737', 0, NULL, '2025-06-20 20:00:56')
ERROR - 2025-06-20 20:20:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:42:14 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:43:56 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:46:03 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:46:05 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 20:54:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(871079) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 20:54:45 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(871079) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '871079'
ERROR - 2025-06-20 20:57:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(871079) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 20:57:16 --> Query error: ERROR:  update or delete on table "sm_resep" violates foreign key constraint "sm_rekonsiliasi_obat_id_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(871079) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep"
WHERE "id" = '871079'
ERROR - 2025-06-20 20:58:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('770652', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 20:58:07 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('770652', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('770652', '', NULL, '2025-06-20 20:30:00', 'Gangguan ventilasi spontan, menyusui tidak efektif', '-', 'Terpasang lowflow 1lpm, terpasang ogt no. 8, monitor ttv, intake output, balance cairan dan diuresis, observasi BAK dan BAB, rencana SHK ic (+).', '334', '284', '1693')
ERROR - 2025-06-20 20:58:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...at_menerima_malam&quot;, &quot;id_users&quot;) VALUES ('770652', '', NULL, ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 20:58:20 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...at_menerima_malam", "id_users") VALUES ('770652', '', NULL, ...
                                                             ^ - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('770652', '', NULL, '2025-06-20 20:30:00', 'Gangguan ventilasi spontan, menyusui tidak efektif', '-', 'Terpasang lowflow 1lpm, terpasang ogt no. 8, monitor ttv, intake output, balance cairan dan diuresis, observasi BAK dan BAB, rencana SHK ic (+).', '334', '284', '1693')
ERROR - 2025-06-20 20:59:04 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 13:59:39 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 13:59:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 14:01:34 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-06-20 21:14:50 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 21:16:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:16:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-06-20 21:16:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:16:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-06-20 21:21:44 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 21:29:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:29:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 21:30:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:30:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 21:31:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:31:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 21:35:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:35:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 21:44:40 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 21:47:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 21:47:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 21:47:31 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-06-20 21:47:31 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-06-20 14:50:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 14:50:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:54:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-06-20 21:54:40 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-20 21:54:40 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-06-20 21:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 21:58:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 21:59:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1959
ERROR - 2025-06-20 21:59:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1972
ERROR - 2025-06-20 21:59:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 1985
ERROR - 2025-06-20 22:07:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 22:07:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 22:07:48 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 22:24:09 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 22:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 22:36:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 22:36:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 22:36:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 22:36:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 22:36:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 15:38:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:19 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:19 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:44 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:38:44 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:24 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:24 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:28 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:36 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:36 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:40 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 15:46:40 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 22:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:06:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:09:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:09:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:24:34 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:29:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:29:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:29:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('872295', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:29:36 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('872295', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('872295', '1', '', '2', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 23:30:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:30:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:36:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (872317, '1', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:36:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (872317, '1', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (872317, '1', '', '', 'Injeksi', '', 'PC', '0', '', '0', 'MORN', 'Bb 5,3 kg', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-06-20 23:47:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:47:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:47:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (6444462, '3744', 8991, '1', '2.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:47:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (6444462, '3744', 8991, '1', '2.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (6444462, '3744', 8991, '1', '2.00', NULL, 'null')
ERROR - 2025-06-20 23:48:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:48:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:49:20 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:50:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:50:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:50:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:50:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:50:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 23:51:11 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:52:55 --> 404 Page Not Found --> /index
ERROR - 2025-06-20 23:53:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:53:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-20 23:53:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:53:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-20 23:53:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:53:20 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-06-20 23:56:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-06-20 23:56:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-06-20 16:59:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 16:59:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 17:06:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 17:06:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:00:53 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:00:53 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:01:25 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:01:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:01:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:01:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:06 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:06 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:23 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:23 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 21:02:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 22:13:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 22:13:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 22:13:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 22:13:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:22:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:22:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:30:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:30:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:50:04 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-06-20 23:50:04 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
