<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-03-25 00:07:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5850979, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 00:07:41 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5850979, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5850979, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 00:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 00:32:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5851079, '336', 5461.2, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 00:32:06 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5851079, '336', 5461.2, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5851079, '336', 5461.2, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 00:34:36 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-03-25 00:34:36 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-03-25 00:34:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-03-25 00:34:41 --> Severity: Notice  --> Trying to get property 'data' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-03-25 00:34:41 --> Severity: Notice  --> Trying to get property 'file_location' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/controllers/Cloud_rsud.php 100
ERROR - 2025-03-25 00:34:41 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/cloud_rsud/views/printing/print_file_lain.php 276
ERROR - 2025-03-25 00:35:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 00:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 00:41:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 00:41:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 00:41:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 01:04:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 01:06:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 01:27:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-03-25 02.15&quot;
LINE 1: ... NULL, &quot;perawatt_cpo&quot; = NULL, &quot;jam_tanggal_cpo&quot; = '2025-03-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:27:01 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-03-25 02.15"
LINE 1: ... NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-03-2...
                                                             ^ - Invalid query: UPDATE "sm_catatan_keperawatan_perioperatif" SET "id_layanan_pendaftaran" = '717065', "id_pendaftaran" = '661885', "id_users" = '1445', "id_data_catatan_perioperatift" = '3325', "suhu_ckp" = '{"suhu_ckp_1":"36.5","suhu_ckp_2":"89","suhu_ckp_3":"19","suhu_ckp_4":"110\/75","suhu_ckp_5":"3\/10","suhu_ckp_6":"56","suhu_ckp_7":"151"}', "status_mental_ckp" = '{"status_mental_ckp_1":"1","status_mental_ckp_2":null,"status_mental_ckp_3":null,"status_mental_ckp_4":null,"status_mental_ckp_5":null}', "riwayat_penyakit_ckp" = '{"riwayat_penyakit_ckp_1":"0","riwayat_penyakit_ckp_3":null,"riwayat_penyakit_ckp_4":null,"riwayat_penyakit_ckp_5":null,"riwayat_penyakit_ckp_6":null,"riwayat_penyakit_ckp_7":null,"riwayat_penyakit_ckp_8":null,"riwayat_penyakit_ckp_9":null}', "pengobatan_saat_ini_ckp" = '-', "operasi_sebelumnya_ckp" = '-', "alergi_ckp" = '{"alergi_ckp":"0","alergi_ckp_3":null,"alergi_ckp_4":null}', "gol_darah_ckp" = '{"gol_darah_ckp_1":"AB (+)","gol_darah_ckp_2":null}', "standar_kewaspadaan_ckp" = '{"standar_kewaspadaan_ckp_1":"umum","standar_kewaspadaan_ckp_2":null}', "rencana_tindakan_operasi_ckp" = 'laparatomi', "dokter_operator_ckp" = '579', "rencana_perawatan_pasca_operasi_ckp" = 'meranti', "verifikasi_pasien_ckp" = '{"verifikasi_pasien_1":"1","verifikasi_pasien_2":"1","verifikasi_pasien_3":null,"verifikasi_pasien_4":null,"verifikasi_pasien_5":"1","verifikasi_pasien_6":null,"verifikasi_pasien_7":null,"verifikasi_pasien_8":null,"verifikasi_pasien_9":"1","verifikasi_pasien_10":null,"verifikasi_pasien_11":null,"verifikasi_pasien_12":null,"verifikasi_pasien_13":"1","verifikasi_pasien_14":null,"verifikasi_pasien_15":null,"verifikasi_pasien_16":null,"verifikasi_pasien_17":"1","verifikasi_pasien_18":null,"verifikasi_pasien_19":null,"verifikasi_pasien_20":null,"verifikasi_pasien_21":"1","verifikasi_pasien_22":null,"verifikasi_pasien_23":null,"verifikasi_pasien_24":null,"verifikasi_pasien_25":"1","verifikasi_pasien_26":null,"verifikasi_pasien_27":null,"verifikasi_pasien_28":null,"verifikasi_pasien_29":"1","verifikasi_pasien_30":null,"verifikasi_pasien_31":null,"verifikasi_pasien_32":null,"verifikasi_pasien_33":null,"verifikasi_pasien_34":null,"verifikasi_pasien_35":null,"verifikasi_pasien_36":null}', "persiapan_fisik_pasien_ckp" = '{"persiapan_fisik_pasien_1":"1","persiapan_fisik_pasien_2":null,"persiapan_fisik_pasien_3":null,"persiapan_fisik_pasien_4":"jam 18.00","persiapan_fisik_pasien_5":null,"persiapan_fisik_pasien_6":null,"persiapan_fisik_pasien_7":null,"persiapan_fisik_pasien_8":null,"persiapan_fisik_pasien_9":"1","persiapan_fisik_pasien_10":null,"persiapan_fisik_pasien_11":null,"persiapan_fisik_pasien_12":null,"persiapan_fisik_pasien_13":"1","persiapan_fisik_pasien_14":null,"persiapan_fisik_pasien_15":null,"persiapan_fisik_pasien_16":null,"persiapan_fisik_pasien_17":"1","persiapan_fisik_pasien_18":null,"persiapan_fisik_pasien_19":null,"persiapan_fisik_pasien_20":null,"persiapan_fisik_pasien_21":null,"persiapan_fisik_pasien_22":null,"persiapan_fisik_pasien_23":null,"persiapan_fisik_pasien_24":null,"persiapan_fisik_pasien_25":"1","persiapan_fisik_pasien_26":null,"persiapan_fisik_pasien_27":null,"persiapan_fisik_pasien_28":null,"persiapan_fisik_pasien_29":null,"persiapan_fisik_pasien_30":null,"persiapan_fisik_pasien_31":null,"persiapan_fisik_pasien_32":null,"persiapan_fisik_pasien_33":"1","persiapan_fisik_pasien_34":null,"persiapan_fisik_pasien_35":null,"persiapan_fisik_pasien_36":null,"persiapan_fisik_pasien_37":"1","persiapan_fisik_pasien_38":null,"persiapan_fisik_pasien_39":null,"persiapan_fisik_pasien_40":null,"persiapan_fisik_pasien_41":"18","persiapan_fisik_pasien_42":"1","persiapan_fisik_pasien_43":null,"persiapan_fisik_pasien_44":null,"persiapan_fisik_pasien_45":"taki no 18","persiapan_fisik_pasien_46":"1","persiapan_fisik_pasien_47":null,"persiapan_fisik_pasien_48":null,"persiapan_fisik_pasien_49":"djj 154 x\/mnt"}', "perawat_ruangan_pfp" = '300', "jam_pfp" = '0:45', "perawat_penerima_ot_ppo" = NULL, "jam_ppo" = NULL, "site_marketing" = '{"site_marketing":null}', "perawat_ot_po" = NULL, "jam_tanggal_po" = NULL, "asuhan_keperawatan_ak_1" = '{"asuhan_keperawatan_ak_1":null,"asuhan_keperawatan_ak_2":null,"asuhan_keperawatan_ak_3":null,"asuhan_keperawatan_ak_4":null,"asuhan_keperawatan_ak_5":null,"asuhan_keperawatan_ak_6":null,"asuhan_keperawatan_ak_7":null,"asuhan_keperawatan_ak_8":null,"asuhan_keperawatan_ak_9":null,"asuhan_keperawatan_ak_10":null,"asuhan_keperawatan_ak_11":null,"asuhan_keperawatan_ak_12":null,"asuhan_keperawatan_ak_13":null,"asuhan_keperawatan_ak_14":null,"asuhan_keperawatan_ak_15":null,"asuhan_keperawatan_ak_16":null,"asuhan_keperawatan_ak_17":null,"asuhan_keperawatan_ak_18":null,"asuhan_keperawatan_ak_19":null,"asuhan_keperawatan_ak_20":null,"asuhan_keperawatan_ak_21":null,"asuhan_keperawatan_ak_22":null,"asuhan_keperawatan_ak_23":null,"asuhan_keperawatan_ak_24":null,"asuhan_keperawatan_ak_25":null,"asuhan_keperawatan_ak_26":null,"asuhan_keperawatan_ak_27":null,"asuhan_keperawatan_ak_28":null,"asuhan_keperawatan_ak_29":null,"asuhan_keperawatan_ak_30":null,"asuhan_keperawatan_ak_31":null,"asuhan_keperawatan_ak_32":null,"asuhan_keperawatan_ak_33":null,"asuhan_keperawatan_ak_58":null,"asuhan_keperawatan_ak_34":null,"asuhan_keperawatan_ak_35":null,"asuhan_keperawatan_ak_36":null,"asuhan_keperawatan_ak_37":null,"asuhan_keperawatan_ak_38":null,"asuhan_keperawatan_ak_39":null,"asuhan_keperawatan_ak_40":null,"asuhan_keperawatan_ak_41":null,"asuhan_keperawatan_ak_42":null,"asuhan_keperawatan_ak_43":null,"asuhan_keperawatan_ak_44":null,"asuhan_keperawatan_ak_45":null,"asuhan_keperawatan_ak_46":null,"asuhan_keperawatan_ak_47":null,"asuhan_keperawatan_ak_48":null,"asuhan_keperawatan_ak_49":null,"asuhan_keperawatan_ak_50":null,"asuhan_keperawatan_ak_51":null,"asuhan_keperawatan_ak_52":null,"asuhan_keperawatan_ak_53":null,"asuhan_keperawatan_ak_54":null,"asuhan_keperawatan_ak_55":null,"asuhan_keperawatan_ak_56":null,"asuhan_keperawatan_ak_57":null}', "perawwat_ruangan_pr" = NULL, "perawwat_anastesi_pa" = NULL, "perawwat_kamar_bedah" = NULL, "time_out_ckio" = '{"time_out_ckio_1":null,"time_out_ckio_2":null,"time_out_ckio_4":null,"time_out_ckio_5":null,"time_out_ckio_7":null,"time_out_ckio_8":null,"time_out_ckio_10":null,"time_out_ckio_11":null}', "catatan_keperawatan_intra_operasi" = '{"catatan_keperawatan_intra_operasi_1":null,"catatan_keperawatan_intra_operasi_2":null,"catatan_keperawatan_intra_operasi_3":null,"catatan_keperawatan_intra_operasi_4":null,"catatan_keperawatan_intra_operasi_5":null,"catatan_keperawatan_intra_operasi_6":null,"catatan_keperawatan_intra_operasi_7":null,"catatan_keperawatan_intra_operasi_8":null,"catatan_keperawatan_intra_operasi_9":null,"catatan_keperawatan_intra_operasi_10":null,"catatan_keperawatan_intra_operasi_11":null,"catatan_keperawatan_intra_operasi_12":null,"catatan_keperawatan_intra_operasi_13":null,"catatan_keperawatan_intra_operasi_14":null,"catatan_keperawatan_intra_operasi_15":null,"catatan_keperawatan_intra_operasi_18":null,"catatan_keperawatan_intra_operasi_21":null,"catatan_keperawatan_intra_operasi_22":null,"catatan_keperawatan_intra_operasi_23":null,"catatan_keperawatan_intra_operasi_24":null,"catatan_keperawatan_intra_operasi_25":null,"catatan_keperawatan_intra_operasi_26":null,"catatan_keperawatan_intra_operasi_27":null,"catatan_keperawatan_intra_operasi_28":null,"catatan_keperawatan_intra_operasi_29":null,"catatan_keperawatan_intra_operasi_32":null,"catatan_keperawatan_intra_operasi_33":null,"catatan_keperawatan_intra_operasi_34":null,"catatan_keperawatan_intra_operasi_37":null,"catatan_keperawatan_intra_operasi_40":null,"catatan_keperawatan_intra_operasi_41":null,"catatan_keperawatan_intra_operasi_42":null,"catatan_keperawatan_intra_operasi_43":null,"catatan_keperawatan_intra_operasi_44":null,"catatan_keperawatan_intra_operasi_45":null,"catatan_keperawatan_intra_operasi_46":null,"catatan_keperawatan_intra_operasi_47":null,"catatan_keperawatan_intra_operasi_48":null,"catatan_keperawatan_intra_operasi_49":null,"catatan_keperawatan_intra_operasi_50":null,"catatan_keperawatan_intra_operasi_51":null,"catatan_keperawatan_intra_operasi_52":null,"catatan_keperawatan_intra_operasi_53":null,"catatan_keperawatan_intra_operasi_54":null,"catatan_keperawatan_intra_operasi_55":null,"catatan_keperawatan_intra_operasi_56":null,"catatan_keperawatan_intra_operasi_57":null,"catatan_keperawatan_intra_operasi_58":null,"catatan_keperawatan_intra_operasi_59":null,"catatan_keperawatan_intra_operasi_60":null,"catatan_keperawatan_intra_operasi_63":null,"catatan_keperawatan_intra_operasi_66":null,"catatan_keperawatan_intra_operasi_67":null,"catatan_keperawatan_intra_operasi_68":null,"catatan_keperawatan_intra_operasi_69":null,"catatan_keperawatan_intra_operasi_70":null,"catatan_keperawatan_intra_operasi_71":null,"catatan_keperawatan_intra_operasi_72":null,"catatan_keperawatan_intra_operasi_73":null,"catatan_keperawatan_intra_operasi_74":null,"catatan_keperawatan_intra_operasi_75":null,"catatan_keperawatan_intra_operasi_76":null,"catatan_keperawatan_intra_operasi_77":null,"catatan_keperawatan_intra_operasi_78":null,"catatan_keperawatan_intra_operasi_92":null,"catatan_keperawatan_intra_operasi_93":null,"catatan_keperawatan_intra_operasi_80":null,"catatan_keperawatan_intra_operasi_81":null,"catatan_keperawatan_intra_operasi_82":null,"catatan_keperawatan_intra_operasi_83":null,"catatan_keperawatan_intra_operasi_84":null,"catatan_keperawatan_intra_operasi_85":null,"catatan_keperawatan_intra_operasi_86":null,"catatan_keperawatan_intra_operasi_87":null,"catatan_keperawatan_intra_operasi_88":null,"catatan_keperawatan_intra_operasi_89":null,"catatan_keperawatan_intra_operasi_90":null,"catatan_keperawatan_intra_operasi_91":null}', "catatan_keperawatan_intra_op" = '{"catatan_keperawatan_intra_op_1":null,"catatan_keperawatan_intra_op_2":null,"catatan_keperawatan_intra_op_3":null,"catatan_keperawatan_intra_op_4":null,"catatan_keperawatan_intra_op_5":null,"catatan_keperawatan_intra_op_6":null,"catatan_keperawatan_intra_op_7":null,"catatan_keperawatan_intra_op_8":null,"catatan_keperawatan_intra_op_9":null,"catatan_keperawatan_intra_op_10":null,"catatan_keperawatan_intra_op_11":null,"catatan_keperawatan_intra_op_12":null,"catatan_keperawatan_intra_op_13":null,"catatan_keperawatan_intra_op_14":null,"catatan_keperawatan_intra_op_15":null,"catatan_keperawatan_intra_op_16":null,"catatan_keperawatan_intra_op_17":null,"catatan_keperawatan_intra_op_18":null,"catatan_keperawatan_intra_op_19":null,"catatan_keperawatan_intra_op_20":null,"catatan_keperawatan_intra_op_21":null,"catatan_keperawatan_intra_op_22":null,"catatan_keperawatan_intra_op_23":null,"catatan_keperawatan_intra_op_24":null,"catatan_keperawatan_intra_op_25":null,"catatan_keperawatan_intra_op_26":null,"catatan_keperawatan_intra_op_27":null,"catatan_keperawatan_intra_op_28":null,"catatan_keperawatan_intra_op_29":null,"catatan_keperawatan_intra_op_30":null,"catatan_keperawatan_intra_op_31":null,"catatan_keperawatan_intra_op_32":null,"catatan_keperawatan_intra_op_33":null,"catatan_keperawatan_intra_op_34":null,"catatan_keperawatan_intra_op_35":null,"catatan_keperawatan_intra_op_36":null,"catatan_keperawatan_intra_op_37":null,"catatan_keperawatan_intra_op_38":null,"catatan_keperawatan_intra_op_39":null,"catatan_keperawatan_intra_op_40":null,"catatan_keperawatan_intra_op_41":null,"catatan_keperawatan_intra_op_42":null,"catatan_keperawatan_intra_op_43":null,"catatan_keperawatan_intra_op_44":null,"catatan_keperawatan_intra_op_45":null,"catatan_keperawatan_intra_op_46":null,"catatan_keperawatan_intra_op_47":null,"catatan_keperawatan_intra_op_48":null,"catatan_keperawatan_intra_op_49":null,"catatan_keperawatan_intra_op_50":null}', "tanggal_jam_ckio" = NULL, "perawat_instrument_1" = NULL, "perawat_instrument_2" = NULL, "asuhan_keperawatan_ak_2" = '{"asuhan_keperawatannnnn_ak_1":null,"asuhan_keperawatannnnn_ak_2":null,"asuhan_keperawatannnnn_ak_3":null,"asuhan_keperawatannnnn_ak_4":null,"asuhan_keperawatannnnn_ak_5":null,"asuhan_keperawatannnnn_ak_6":null,"asuhan_keperawatannnnn_ak_7":null,"asuhan_keperawatannnnn_ak_8":null,"asuhan_keperawatannnnn_ak_9":null,"asuhan_keperawatannnnn_ak_10":null,"asuhan_keperawatannnnn_ak_11":null,"asuhan_keperawatannnnn_ak_12":null,"asuhan_keperawatannnnn_ak_13":null,"asuhan_keperawatannnnn_ak_14":null,"asuhan_keperawatannnnn_ak_15":null,"asuhan_keperawatannnnn_ak_16":null,"asuhan_keperawatannnnn_ak_17":null,"asuhan_keperawatannnnn_ak_18":null,"asuhan_keperawatannnnn_ak_19":null,"asuhan_keperawatannnnn_ak_20":null,"asuhan_keperawatannnnn_ak_21":null,"asuhan_keperawatannnnn_ak_22":null,"asuhan_keperawatannnnn_ak_23":null,"asuhan_keperawatannnnn_ak_24":null,"asuhan_keperawatannnnn_ak_25":null,"asuhan_keperawatannnnn_ak_26":null,"asuhan_keperawatannnnn_ak_27":null,"asuhan_keperawatannnnn_ak_28":null,"asuhan_keperawatannnnn_ak_29":null,"asuhan_keperawatannnnn_ak_30":null,"asuhan_keperawatannnnn_ak_31":null,"asuhan_keperawatannnnn_ak_32":null,"asuhan_keperawatannnnn_ak_33":null,"asuhan_keperawatannnnn_ak_34":null,"asuhan_keperawatannnnn_ak_35":null,"asuhan_keperawatannnnn_ak_36":null,"asuhan_keperawatannnnn_ak_37":null,"asuhan_keperawatannnnn_ak_38":null,"asuhan_keperawatannnnn_ak_39":null,"asuhan_keperawatannnnn_ak_40":null,"asuhan_keperawatannnnn_ak_41":null,"asuhan_keperawatannnnn_ak_42":null,"asuhan_keperawatannnnn_ak_43":null,"asuhan_keperawatannnnn_ak_44":null,"asuhan_keperawatannnnn_ak_45":null,"asuhan_keperawatannnnn_ak_46":null,"asuhan_keperawatannnnn_ak_47":null,"asuhan_keperawatannnnn_ak_48":null,"asuhan_keperawatannnnn_ak_49":null,"asuhan_keperawatannnnn_ak_50":null,"asuhan_keperawatannnnn_ak_51":null,"asuhan_keperawatannnnn_ak_52":null,"asuhan_keperawatannnnn_ak_53":null,"asuhan_keperawatannnnn_ak_54":null,"asuhan_keperawatannnnn_ak_55":null,"asuhan_keperawatannnnn_ak_56":null,"asuhan_keperawatannnnn_ak_57":null,"asuhan_keperawatannnnn_ak_58":null,"asuhan_keperawatannnnn_ak_59":null,"asuhan_keperawatannnnn_ak_60":null,"asuhan_keperawatannnnn_ak_61":null,"asuhan_keperawatannnnn_ak_62":null,"asuhan_keperawatannnnn_ak_63":null,"asuhan_keperawatannnnn_ak_64":null,"asuhan_keperawatannnnn_ak_65":null,"asuhan_keperawatannnnn_ak_66":null,"asuhan_keperawatannnnn_ak_67":null,"asuhan_keperawatannnnn_ak_68":null,"asuhan_keperawatannnnn_ak_69":null,"asuhan_keperawatannnnn_ak_70":null,"asuhan_keperawatannnnn_ak_71":null,"asuhan_keperawatannnnn_ak_72":null,"asuhan_keperawatannnnn_ak_73":null,"asuhan_keperawatannnnn_ak_74":null,"asuhan_keperawatannnnn_ak_75":null,"asuhan_keperawatannnnn_ak_76":null,"asuhan_keperawatannnnn_ak_77":null,"asuhan_keperawatannnnn_ak_78":null,"asuhan_keperawatannnnn_ak_79":null,"asuhan_keperawatannnnn_ak_80":null,"asuhan_keperawatannnnn_ak_81":null,"asuhan_keperawatannnnn_ak_82":null,"asuhan_keperawatannnnn_ak_83":null,"asuhan_keperawatannnnn_ak_84":null,"asuhan_keperawatannnnn_ak_85":null,"asuhan_keperawatannnnn_ak_86":null,"asuhan_keperawatannnnn_ak_87":null,"asuhan_keperawatannnnn_ak_88":null,"asuhan_keperawatannnnn_ak_89":null,"asuhan_keperawatannnnn_ak_90":null,"asuhan_keperawatannnnn_ak_91":null,"asuhan_keperawatannnnn_ak_92":null,"asuhan_keperawatannnnn_ak_93":null,"asuhan_keperawatannnnn_ak_94":null,"asuhan_keperawatannnnn_ak_95":null,"asuhan_keperawatannnnn_ak_96":null,"asuhan_keperawatannnnn_ak_97":null,"asuhan_keperawatannnnn_ak_98":null,"asuhan_keperawatannnnn_ak_99":null,"asuhan_keperawatannnnn_ak_100":null,"asuhan_keperawatannnnn_ak_101":null,"asuhan_keperawatannnnn_ak_102":null,"asuhan_keperawatannnnn_ak_103":null,"asuhan_keperawatannnnn_ak_104":null,"asuhan_keperawatannnnn_ak_105":null,"asuhan_keperawatannnnn_ak_106":null}', "perawwat_ruangan_prr" = NULL, "perawwat_anastesi_paa" = NULL, "perawwat_kamar_bedahh" = NULL, "catatan_keperawatan_sesudah_operasi" = '{"catatan_keperawatan_sesudah_operasi_1":null,"catatan_keperawatan_sesudah_operasi_2":"2:00","catatan_keperawatan_sesudah_operasi_3":"1","catatan_keperawatan_sesudah_operasi_4":null,"catatan_keperawatan_sesudah_operasi_5":null}', "catatan_keperawatan_sesudah_op" = '{"catatan_keperawatan_sesudah_op_1":"1","catatan_keperawatan_sesudah_op_2":null,"catatan_keperawatan_sesudah_op_3":"1","catatan_keperawatan_sesudah_op_4":null,"catatan_keperawatan_sesudah_op_5":null,"catatan_keperawatan_sesudah_op_6":null,"catatan_keperawatan_sesudah_op_7":null,"catatan_keperawatan_sesudah_op_8":null,"catatan_keperawatan_sesudah_op_9":"1","catatan_keperawatan_sesudah_op_10":null,"catatan_keperawatan_sesudah_op_11":null,"catatan_keperawatan_sesudah_op_12":null,"catatan_keperawatan_sesudah_op_13":"3","catatan_keperawatan_sesudah_op_14":null,"catatan_keperawatan_sesudah_op_15":null,"catatan_keperawatan_sesudah_op_16":"1","catatan_keperawatan_sesudah_op_17":null,"catatan_keperawatan_sesudah_op_18":null,"catatan_keperawatan_sesudah_op_19":null,"catatan_keperawatan_sesudah_op_20":null,"catatan_keperawatan_sesudah_op_21":"1","catatan_keperawatan_sesudah_op_22":null,"catatan_keperawatan_sesudah_op_23":null,"catatan_keperawatan_sesudah_op_24":null,"catatan_keperawatan_sesudah_op_25":"1","catatan_keperawatan_sesudah_op_26":null,"catatan_keperawatan_sesudah_op_27":null,"catatan_keperawatan_sesudah_op_28":null,"catatan_keperawatan_sesudah_op_29":null,"catatan_keperawatan_sesudah_op_30":"1","catatan_keperawatan_sesudah_op_31":null,"catatan_keperawatan_sesudah_op_32":null,"catatan_keperawatan_sesudah_op_33":null,"catatan_keperawatan_sesudah_op_34":"1","catatan_keperawatan_sesudah_op_35":null,"catatan_keperawatan_sesudah_op_36":null,"catatan_keperawatan_sesudah_op_37":null,"catatan_keperawatan_sesudah_op_38":"1","catatan_keperawatan_sesudah_op_39":null,"catatan_keperawatan_sesudah_op_40":null,"catatan_keperawatan_sesudah_op_42":"1","catatan_keperawatan_sesudah_op_43":null,"catatan_keperawatan_sesudah_op_44":null}', "ceklis_persiapan_operasi" = '{"ceklis_persiapan_operasi_1":"1","ceklis_persiapan_operasi_2":"1","ceklis_persiapan_operasi_3":null,"ceklis_persiapan_operasi_4":null,"ceklis_persiapan_operasi_5":null,"ceklis_persiapan_operasi_6":null,"ceklis_persiapan_operasi_7":null,"ceklis_persiapan_operasi_8":null,"ceklis_persiapan_operasi_9":"1","ceklis_persiapan_operasi_10":"1","ceklis_persiapan_operasi_11":null,"ceklis_persiapan_operasi_12":null,"ceklis_persiapan_operasi_13":null,"ceklis_persiapan_operasi_14":null,"ceklis_persiapan_operasi_15":null,"ceklis_persiapan_operasi_16":null}', "ceklis_persiapan_operasii" = '{"ceklis_persiapan_operasii_1":"1","ceklis_persiapan_operasii_2":"1","ceklis_persiapan_operasii_3":null,"ceklis_persiapan_operasii_4":null,"ceklis_persiapan_operasii_5":null,"ceklis_persiapan_operasii_6":null,"ceklis_persiapan_operasii_7":null,"ceklis_persiapan_operasii_8":null,"ceklis_persiapan_operasii_9":"1","ceklis_persiapan_operasii_10":"1","ceklis_persiapan_operasii_11":null,"ceklis_persiapan_operasii_12":null,"ceklis_persiapan_operasii_13":null,"ceklis_persiapan_operasii_14":null,"ceklis_persiapan_operasii_15":null,"ceklis_persiapan_operasii_16":null}', "ceklis_persiapan_operasiii" = '{"ceklis_persiapan_operasiii_1":"2:00","ceklis_persiapan_operasiii_2":"RL","ceklis_persiapan_operasiii_3":"30","ceklis_persiapan_operasiii_4":null,"ceklis_persiapan_operasiii_5":null,"ceklis_persiapan_operasiii_6":null,"ceklis_persiapan_operasiii_7":null,"ceklis_persiapan_operasiii_8":null,"ceklis_persiapan_operasiii_9":null}', "grafik_ckp" = NULL, "keterangan_cpo" = NULL, "jam_cpo" = '{"jam_cpo_1":null,"jam_cpo_2":null}', "perawat_cpo" = NULL, "barang_cpo" = NULL, "perawatt_cpo" = NULL, "jam_tanggal_cpo" = '2025-03-25 02.15', "asssuhan_keperawatan_ak_3" = '{"asssuhan_keperawatannnnn_ak_1":null,"asssuhan_keperawatannnnn_ak_2":null,"asssuhan_keperawatannnnn_ak_3":null,"asssuhan_keperawatannnnn_ak_4":null,"asssuhan_keperawatannnnn_ak_5":null,"asssuhan_keperawatannnnn_ak_6":null,"asssuhan_keperawatannnnn_ak_7":null,"asssuhan_keperawatannnnn_ak_8":null,"asssuhan_keperawatannnnn_ak_9":null,"asssuhan_keperawatannnnn_ak_10":null,"asssuhan_keperawatannnnn_ak_11":null,"asssuhan_keperawatannnnn_ak_12":null,"asssuhan_keperawatannnnn_ak_13":null,"asssuhan_keperawatannnnn_ak_14":null,"asssuhan_keperawatannnnn_ak_15":null,"asssuhan_keperawatannnnn_ak_16":null,"asssuhan_keperawatannnnn_ak_17":null,"asssuhan_keperawatannnnn_ak_18":null,"asssuhan_keperawatannnnn_ak_19":null,"asssuhan_keperawatannnnn_ak_20":null,"asssuhan_keperawatannnnn_ak_21":null,"asssuhan_keperawatannnnn_ak_22":null,"asssuhan_keperawatannnnn_ak_23":null,"asssuhan_keperawatannnnn_ak_24":null,"asssuhan_keperawatannnnn_ak_25":null,"asssuhan_keperawatannnnn_ak_26":null,"asssuhan_keperawatannnnn_ak_27":null,"asssuhan_keperawatannnnn_ak_28":null,"asssuhan_keperawatannnnn_ak_29":null,"asssuhan_keperawatannnnn_ak_30":null,"asssuhan_keperawatannnnn_ak_31":null,"asssuhan_keperawatannnnn_ak_32":null,"asssuhan_keperawatannnnn_ak_33":null,"asssuhan_keperawatannnnn_ak_34":null,"asssuhan_keperawatannnnn_ak_35":null,"asssuhan_keperawatannnnn_ak_36":null,"asssuhan_keperawatannnnn_ak_37":null,"asssuhan_keperawatannnnn_ak_38":null,"asssuhan_keperawatannnnn_ak_39":null,"asssuhan_keperawatannnnn_ak_40":null,"asssuhan_keperawatannnnn_ak_41":null,"asssuhan_keperawatannnnn_ak_42":null,"asssuhan_keperawatannnnn_ak_43":null,"asssuhan_keperawatannnnn_ak_44":null,"asssuhan_keperawatannnnn_ak_45":null,"asssuhan_keperawatannnnn_ak_46":null,"asssuhan_keperawatannnnn_ak_47":null,"asssuhan_keperawatannnnn_ak_48":null,"asssuhan_keperawatannnnn_ak_49":null,"asssuhan_keperawatannnnn_ak_50":null,"asssuhan_keperawatannnnn_ak_51":null,"asssuhan_keperawatannnnn_ak_52":null,"asssuhan_keperawatannnnn_ak_53":null,"asssuhan_keperawatannnnn_ak_54":null,"asssuhan_keperawatannnnn_ak_55":null,"asssuhan_keperawatannnnn_ak_56":null,"asssuhan_keperawatannnnn_ak_57":null,"asssuhan_keperawatannnnn_ak_58":null,"asssuhan_keperawatannnnn_ak_59":null,"asssuhan_keperawatannnnn_ak_60":null,"asssuhan_keperawatannnnn_ak_61":null,"asssuhan_keperawatannnnn_ak_62":null,"asssuhan_keperawatannnnn_ak_63":null,"asssuhan_keperawatannnnn_ak_64":null,"asssuhan_keperawatannnnn_ak_65":null,"asssuhan_keperawatannnnn_ak_66":null,"asssuhan_keperawatannnnn_ak_67":null,"asssuhan_keperawatannnnn_ak_68":null,"asssuhan_keperawatannnnn_ak_69":null,"asssuhan_keperawatannnnn_ak_70":null,"asssuhan_keperawatannnnn_ak_71":null,"asssuhan_keperawatannnnn_ak_72":null,"asssuhan_keperawatannnnn_ak_73":null,"asssuhan_keperawatannnnn_ak_74":null,"asssuhan_keperawatannnnn_ak_75":null,"asssuhan_keperawatannnnn_ak_76":null,"asssuhan_keperawatannnnn_ak_77":null,"asssuhan_keperawatannnnn_ak_78":null,"asssuhan_keperawatannnnn_ak_79":null,"asssuhan_keperawatannnnn_ak_80":null,"asssuhan_keperawatannnnn_ak_81":null,"asssuhan_keperawatannnnn_ak_82":null,"asssuhan_keperawatannnnn_ak_83":null,"asssuhan_keperawatannnnn_ak_84":null,"asssuhan_keperawatannnnn_ak_85":null,"asssuhan_keperawatannnnn_ak_86":null,"asssuhan_keperawatannnnn_ak_87":null,"asssuhan_keperawatannnnn_ak_88":null,"asssuhan_keperawatannnnn_ak_89":null,"asssuhan_keperawatannnnn_ak_90":null,"asssuhan_keperawatannnnn_ak_91":null,"asssuhan_keperawatannnnn_ak_92":null,"asssuhan_keperawatannnnn_ak_93":null,"asssuhan_keperawatannnnn_ak_94":null,"asssuhan_keperawatannnnn_ak_95":null,"asssuhan_keperawatannnnn_ak_96":null,"asssuhan_keperawatannnnn_ak_97":null,"asssuhan_keperawatannnnn_ak_98":null,"asssuhan_keperawatannnnn_ak_99":null,"asssuhan_keperawatannnnn_ak_100":null,"asssuhan_keperawatannnnn_ak_101":null,"asssuhan_keperawatannnnn_ak_102":null,"asssuhan_keperawatannnnn_ak_103":null,"asssuhan_keperawatannnnn_ak_104":null,"asssuhan_keperawatannnnn_ak_105":null,"asssuhan_keperawatannnnn_ak_106":null,"asssuhan_keperawatannnnn_ak_107":null,"asssuhan_keperawatannnnn_ak_108":null,"asssuhan_keperawatannnnn_ak_109":null,"asssuhan_keperawatannnnn_ak_110":null,"asssuhan_keperawatannnnn_ak_111":null,"asssuhan_keperawatannnnn_ak_112":null}', "perawwat_ruangan_sirkuler" = NULL, "perawwat_ruangan_prrr" = NULL, "perawwat_anastesi_paaa" = '495', "perawwat_kamar_bedahhh" = NULL, "updated_at" = '2025-03-25 01:27:01'
WHERE "id_data_catatan_perioperatift" = '3325'
ERROR - 2025-03-25 01:28:21 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 01:28:21 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 01:28:31 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 01:28:31 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 01:38:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:38:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:40:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:40:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:47:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:47:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:50:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:50:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 01:58:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:58:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:58:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:58:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:58:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:58:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 01:59:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 01:59:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:08:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814154, '10', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:08:26 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (814154, '10', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814154, '10', '', '', '', '', 'PC', '0', '', '0', '', '1', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 02:14:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:14:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:16:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:16:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:19:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 02:19:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 02:28:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-03-25 02:28:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-03-25 02:37:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:37:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:47:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:47:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:53:26 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-03-25 02:53:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-03-25 02:53:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:53:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:53:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_laboratorium/models/Order_laboratorium_model.php 508
ERROR - 2025-03-25 02:54:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:54:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:54:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:54:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:54:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:54:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:54:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:54:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:54:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('814157', '3', '', '', '2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:54:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('814157', '3', '', '', '2...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('814157', '3', '', '', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', '', 'SEBELUM MAKAN, LAMBUNG', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 02:55:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:55:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:56:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:56:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:56:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 02:56:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 02:58:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 02:58:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 03:22:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 03:33:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:44 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:45 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 03:33:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 04:51:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 05:08:09 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 05:13:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814159, '5', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 05:13:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814159, '5', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814159, '5', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 05:36:07 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 05:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 05:43:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 05:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:10:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:11:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 06:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:12:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:15:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:17:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:47:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 06:47:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 06:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 06:47:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 06:48:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:49:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:50:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:53:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 06:58:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 06:58:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 06:58:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 07:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:02:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:02:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A044%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:05:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:07:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:07:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250058) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:07:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250058) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250058', '00110890', '2025-03-25 07:07:52', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002884785254', NULL, '0496B0001224Y004559', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250325B258')
ERROR - 2025-03-25 07:08:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:08:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:08:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250059) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:08:20 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250059) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250059', '00312605', '2025-03-25 07:08:18', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001802266457', NULL, '0223B1370225P000270', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250325B120')
ERROR - 2025-03-25 07:08:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:10:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:10:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:10:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:10:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:10:20 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '828355', "id_layanan_pendaftaran" = '717075', "waktu" = '2025-03-25 06:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak dan batuk berdahak ', "objective" = 'Kesadaran composmentis GCS 15 EWS Hijau (1), pasien tampak batuk kering, akral hangat nadi teraba kuat, Paru : sn ves +/+, rh-/-wh -/- TD: 112/80 mmHg Nadi:110 x/menit RR: 20 x/mneit Suhu : 37.8 Spo2:98 Þngan nasal kanul 5lpm . IVFD Vemplon. Tanggal 25-3-2025 Hb6.3  Ht 20 Leukosit 21.2  Trombosit 231 sgot/sgpt () tgl 20/3/25 Ro. Thorax terlampir. anti hiv ', "assessment" = 'bersihan jalan nafas tidak efektif', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1519', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1519', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-25 07:10:20'
WHERE "id" = '828355'
ERROR - 2025-03-25 07:10:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:10:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:10:32 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: UPDATE "sm_cppt" SET "id" = '828355', "id_layanan_pendaftaran" = '717075', "waktu" = '2025-03-25 06:00', "id_profesi" = '18', "subject" = 'Pasien mengatakan sesak dan batuk berdahak ', "objective" = 'Kesadaran composmentis GCS 15 EWS Hijau (1), pasien tampak batuk kering, akral hangat nadi teraba kuat, Paru : sn ves +/+, rh-/-wh -/- TD: 112/80 mmHg Nadi:110 x/menit RR: 20 x/mneit Suhu : 37.8 Spo2:98 Þngan nasal kanul 5lpm . IVFD Vemplon. Tanggal 25-3-2025 Hb6.3  Ht 20 Leukosit 21.2  Trombosit 231 sgot/sgpt () tgl 20/3/25 Ro. Thorax terlampir. anti hiv ', "assessment" = 'bersihan jalan nafas tidak efektif', "plan" = '', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '1519', "ttd_nadis" = NULL, "instruksi_ppa" = '-', "id_dokter_dpjp" = NULL, "id_user" = '1519', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-25 07:10:32'
WHERE "id" = '828355'
ERROR - 2025-03-25 07:11:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 07:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:11:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:11:22 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A034%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:11:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:11:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 07:11:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:11:26 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 07:11:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:11:31 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1682' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-25 07:12:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250071) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:12:34 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250071) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250071', '00040848', '2025-03-25 07:12:33', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0000048877086', NULL, '0223U0280325P001461', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250325B308')
ERROR - 2025-03-25 07:12:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:14:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 16
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 16
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 35
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 35
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/views/index.php 10
ERROR - 2025-03-25 07:14:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/views/index.php 10
ERROR - 2025-03-25 07:14:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 07:15:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 07:16:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:17:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:17:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A049%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:18:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 07:19:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:20:05 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A093%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:20:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:20:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:20:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:20:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 07:21:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250108) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:21:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250108) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250108', '00140696', '2025-03-25 07:21:09', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0002068825026', NULL, '102501020125Y002386', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250325B100')
ERROR - 2025-03-25 07:22:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:22:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:25:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250122) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:25:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250122) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250122', '00074843', '2025-03-25 07:25:12', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001258339421', NULL, '0223B0740325Y002538', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250325B342')
ERROR - 2025-03-25 07:25:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250125) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:25:32 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250125) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250125', '00351506', '2025-03-25 07:25:30', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0000391609664', NULL, '022300090225Y002929', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250325B112')
ERROR - 2025-03-25 07:26:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:26:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:27:08 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 07:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250133) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:27:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250133) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250133', '00232731', '2025-03-25 07:27:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001258437622', NULL, '0223U1130125P003454', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250325A129')
ERROR - 2025-03-25 07:29:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:32:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:33:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:33:09 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A152%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:34:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:35:19 --> Severity: Notice  --> Undefined index: account /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rekap_billing/controllers/Rekap_billing.php 90
ERROR - 2025-03-25 07:35:19 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7659
ERROR - 2025-03-25 07:35:19 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7662
ERROR - 2025-03-25 07:36:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:36:01 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A042%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:36:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:38:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:38:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:40:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:40:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:41:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:44:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:44:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:44:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:45:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:45:25 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A057%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:45:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:45:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:46:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:48:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:48:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:49:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:49:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 07:49:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:49:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 07:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:49:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 07:49:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:49:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 07:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:49:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:49:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:10 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:35 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:36 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 07:50:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:51:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:52:47 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:52:47 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:53:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:53:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:53:37 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:53:37 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:53:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:53:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:53:41 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A063%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:53:46 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:53:46 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:53:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:53:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:54:08 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:54:08 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:54:12 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:54:12 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 00:54:34 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 07:54:37 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:54:37 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:54:42 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 07:54:42 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 07:54:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250216) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:54:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250216) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250216', '00091244', '2025-03-25 07:54:53', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001775766249', NULL, '102505010325Y000545', 'Lama', NULL, '1768', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250325B357')
ERROR - 2025-03-25 07:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:55:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:57:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:58:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 07:58:06 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A128%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 07:58:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:58:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 07:59:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250234) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:01:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250234) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250234', '00098774', '2025-03-25 08:00:58', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001390037411', NULL, '0223B1740225Y000262', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250325B317')
ERROR - 2025-03-25 08:01:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:02:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:02:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:02:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:03:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:04:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:05:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:05:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:07:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:07:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:08:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:08:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:09:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:09:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:09:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:09:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:09:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:10:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 08:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:10:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:10:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:10:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:10:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:10:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:10:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:11:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:11:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:11:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:13:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:14:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:14:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:14:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:15:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250274) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:15:03 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250274) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250274', '00322626', '2025-03-25 08:15:01', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000816017534', NULL, '102501060225Y003062', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250325B300')
ERROR - 2025-03-25 08:15:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:15:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250276) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:15:18 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250276) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250276', '00370361', '2025-03-25 08:15:16', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003157598564', NULL, '102504020325Y001381', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Urologi', 0, 2, NULL, '20250325B367')
ERROR - 2025-03-25 08:15:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 08:16:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:16:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:17:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:17:42 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:17:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:18:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:19:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:19:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:19:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:19:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:20:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:20:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814222, '3', '1', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:20:00 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (814222, '3', '1', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814222, '3', '1', '', '3 x Sehari 5 ml', '(1 sendok obat)', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:20:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:20:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:21:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:21:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:21:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:21:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:22:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:22:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:22:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814229, '2', '6', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:22:09 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (814229, '2', '6', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814229, '2', '6', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'KP', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:22:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:22:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:22:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:23:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:23:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:23:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:23:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:23:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:23:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:23:50 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:23:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:23:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 08:24:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:24:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:24:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:24:53 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:25:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814240, '2', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:25:04 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (814240, '2', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814240, '2', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:25:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814241, '1', '1', '', '3 X S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:25:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (814241, '1', '1', '', '3 X S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814241, '1', '1', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:26:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:26:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:26:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 08:26:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:26:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 08:26:33 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:26:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:26:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:11 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:27:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:27:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:28:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:28:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:28:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:29:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:29:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:30:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:30:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:30:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:30:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 08:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:30:47 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 08:30:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814250, '6', '', '10', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:30:55 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814250, '6', '', '10', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814250, '6', '', '10', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:31:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:31:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:32:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:32:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 08:32:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:32:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:33:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:33:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:33:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:34:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:34:20 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A058%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 08:34:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 08:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:35:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:36:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:36:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:38:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:38:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:38:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:38:56 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12327
ERROR - 2025-03-25 08:39:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:39:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:39:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:39:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814274, '4', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:40:12 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814274, '4', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814274, '4', '', '1', '2 X SEHARI 1-2 HISAP', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 08:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:40:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:41:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:41:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:41:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:41:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:42:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:42:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:42:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250349) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:42:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250349) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250349', '00372398', '2025-03-25 08:42:27', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001216795724', NULL, '0223B1740325P000191', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250325F019')
ERROR - 2025-03-25 08:42:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:42:39 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '772' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-25 08:42:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:42:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:43:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:43:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:43:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '772' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-25 08:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:43:27 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A040%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 08:43:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:43:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:44:20 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-25 08:44:20 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-25 08:44:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-25 08:44:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250424B045) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:44:22 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250424B045) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250424B045', '045', 'B045', 'B', '2025-04-24', '0', '2025-03-25 08:44:18', 'Booking', 'APM', 'Asuransi', 0, '2025-04-24  07:31:30', 0, '1701', '00265011', 77, 219126, 21, 'JIW', '087780386681', '3671111506820005', '1982-06-15', 'dr. JANS JULIANA ROULI SITORUS, Sp.KJ', 1, 'Asuransi', 53, '60', '200', 'Ok.', '0', '51486', '0000813892577', 'JKN', '290710', '0', '21', '102501100325Y002346', 'PUSKESMAS PANUNGGANGAN', '2025-06-15', 'JIW', '3', NULL, '0223R0380325V012182', '21')
ERROR - 2025-03-25 08:44:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:44:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:44:43 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-03-25 08:44:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:44:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:45:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:45:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:45:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:46:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:47:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:47:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:48:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:48:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:49:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:49:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:49:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:51:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:51:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:51:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 08:51:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:51:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 08:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:52:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:52:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:52:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:53:06 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 08:53:07 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 08:53:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 01:53:56 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 01:53:56 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 01:53:59 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 01:53:59 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 08:54:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:55:40 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 08:56:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:56:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:56:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:57:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:57:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:57:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250381) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:57:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250381) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250381', '00371600', '2025-03-25 08:57:34', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002141077454', NULL, '022300010125Y001563', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250325B152')
ERROR - 2025-03-25 08:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 08:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250386) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 08:58:57 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250386) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250386', '00340195', '2025-03-25 08:58:55', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0003342648295', NULL, '100505040125Y002458', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Kedokteran Gigi Anak', 0, 2, NULL, '20250325B145')
ERROR - 2025-03-25 08:59:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:00:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:00:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:01:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:01:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:02:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:02:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:02:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:03:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:03:03 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A056%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 09:03:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:03:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:03:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:03:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-25 09:03:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:03:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-25 09:04:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:04:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 09:04:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 09:04:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:04:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:04:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:04:45 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-25 09:04:45 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-25 09:04:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:05:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:05:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:06:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:07:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:07:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:07:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:08:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:09:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:09:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:11:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:11:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Form_rekam_medis' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 09:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:11:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:12:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:12:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:13:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:13:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:13:20 --> Severity: Warning  --> array_count_values() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 12327
ERROR - 2025-03-25 09:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:14:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:15:00 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 46
ERROR - 2025-03-25 09:15:00 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemakaian_peralatan_medis/models/Pemakaian_peralatan_medis_model.php 280
ERROR - 2025-03-25 09:15:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:15:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:15:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:15:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:16:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:16:20 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-03-25 09:16:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:16:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:17:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:18:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:18:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814369, '5', '', '30', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:18:38 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814369, '5', '', '30', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814369, '5', '', '30', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 09:18:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:20:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:20:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:20:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:20:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:21:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:22:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:22:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:22:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:23:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:23:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:23:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814384, '2', '', '', '1...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:23:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814384, '2', '', '', '1...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814384, '2', '', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 09:23:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:24:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:24:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:24:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:25:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:26:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:26:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:26:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 09:26:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:26:44 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 09:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:27:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:28:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:28:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:28:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:29:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:30:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:30:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:30:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:30:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:30:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:31:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:31:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:32:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:32:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:32:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:32:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:32:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:32:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:32:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:33:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:33:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:33:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:33:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:33:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:34:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:34:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:34:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:34:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:34:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:34:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:34:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:34:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:34:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:34:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:34:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:34:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:35:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:35:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:36:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:36:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:36:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:36 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 09:37:36 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 09:37:38 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 09:37:38 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 09:37:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:37:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:38:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:39:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:39:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:39:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:39:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:39:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:39:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:40:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:40:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:40:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:40:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 09:41:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:04 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 09:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 09:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 09:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:41:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:41:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:41:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:42:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:43:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:43:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:43:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:44:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:44:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:45:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:45:04 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-25 09:45:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:45:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-25 09:45:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:45:07 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-25 09:45:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:45:08 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-25 09:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:46:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:46:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:47:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:47:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:48:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:48:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:48:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:48:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;tanggal&quot;
LINE 7: AND &quot;jd&quot;.&quot;id_poli&quot; = 'tanggal'
                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:48:42 --> Query error: ERROR:  invalid input syntax for type integer: "tanggal"
LINE 7: AND "jd"."id_poli" = 'tanggal'
                             ^ - Invalid query: SELECT "tm"."id" as "id_tm", "jd"."kode_bpjs_dokter", "pg"."nama" as "dokter", coalesce(sp.nama, '-') as spesialisasi, "jd"."jml_kunjung", "jd"."kuota", "jd"."id" as "id_jadwal_dokter", "jd"."shift_poli"
FROM "sm_jadwal_dokter" as "jd"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "jd"."kode_bpjs_dokter" = "tm"."kode_bpjs"
JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "tm"."id_spesialisasi"
WHERE "jd"."tanggal" IS NULL
AND "jd"."id_poli" = 'tanggal'
ERROR - 2025-03-25 09:48:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:50:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:50:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 09:50:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:50:12 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 09:50:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:50:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:50:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:50:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:51:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:51:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:51:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 09:51:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:51:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:51:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:51:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A088%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 09:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:52:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:52:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:53:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:53:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:53:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:53:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:54:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:55:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814455, '3', '', '10', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 09:55:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814455, '3', '', '10', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814455, '3', '', '10', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 09:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:55:42 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 09:56:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:56:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:57:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:57:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:57:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 09:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:58:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:59:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 09:59:40 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-03-25 09:59:40 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-03-25 09:59:41 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 4096 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-03-25 09:59:41 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 74
ERROR - 2025-03-25 09:59:41 --> Severity: Notice  --> Undefined index: nobpjs /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pasien/models/Pasien_model.php 75
ERROR - 2025-03-25 09:59:43 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 4096 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-03-25 10:00:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:00:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:00:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:01:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:01:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:02:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:02:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:03:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:03:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:03:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:04:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:04:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:04:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:05:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:05:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:05:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:06:14 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 10:06:14 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 10:06:16 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 10:06:17 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 10:06:20 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 10:06:20 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 10:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:06:24 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 10:06:24 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 10:06:33 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-25 10:06:33 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-25 10:06:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:06:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:07:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:08:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A053%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 10:08:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:08:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:09:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:09:23 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 10:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:10:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:10:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 10:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:10:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 10:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:10:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 10:10:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:10:23 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 9: WHERE "pd"."id" = 'null'
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = 'null'
ERROR - 2025-03-25 10:10:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:10:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:10:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:12:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:12:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:13:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:13:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:13:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:14:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:14:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:14:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:15:49 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:15:49 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:15:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:16:35 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:16:35 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:16:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:16:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 10:16:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:16:35 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 10:17:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:17:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:17:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:17:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:17:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:18:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:18:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:18:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:18:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:19:03 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-03-25 10:19:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:19:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:20:01 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:20:01 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:20:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:20:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:21:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:21:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:21:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:22:09 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:22:09 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:22:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:22:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:22:47 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-03-25 10:22:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:23:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:23:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:23:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:23:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:23:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 10:23:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:24:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:24:44 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:24:44 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:24:59 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:24:59 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:25:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:25:20 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:25:20 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:25:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:25:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:25:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:25:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:26:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:26:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:27:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:27:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:27:31 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-03-25 10:27:31 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-03-25 10:27:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:27:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:27:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:28:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:28:24 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 10:28:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:29:04 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:29:04 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:29:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:29:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:30:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:31:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250325B431) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:31:16 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250325B431) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "asal_faskes", "kadaluarsa_rujukan", "kode_bpjs_poli_rujukan", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250325B431', '431', 'B431', 'B', '2025-03-25', '0', '2025-03-25 10:31:15', 'Booking', 'APM', 'Asuransi', 0, '2025-03-25  07:13:30', 0, '1948', '00287999', 24, 203255, 31, 'PNM', '089507581308', '3671013112790007', '1979-12-31', 'drg. RANI HANDAYANI, Sp.PM', 1, 'Asuransi', 57, '60', '200', 'Ok.', '0', '49085', '0002096888916', 'JKN', NULL, '1', NULL, '022300090325Y002188', 'PUSKESMAS CIKOKOL', '2025-06-23', 'PNM', '1', NULL, NULL, '31')
ERROR - 2025-03-25 10:31:17 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:31:17 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:31:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:31:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:31:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250593) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:32:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250593) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250593', '00129593', '2025-03-25 10:32:03', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001810175949', NULL, '022300090125Y001925', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250325B431')
ERROR - 2025-03-25 10:32:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:32:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:01 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:33:01 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:33:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503250597) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:33:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503250597) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503250597', '00343683', '2025-03-25 10:33:09', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Cemara', 0, '2', '', '20250325B429')
ERROR - 2025-03-25 10:33:10 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:33:10 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:33:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:33:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:34:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:34:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:34:38 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-25 00:00:00' AND '2025-03-25 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A153%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-25 10:34:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:34:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:35:09 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:35:09 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:35:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:35:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:35:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:35:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:50 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:36:50 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:36:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:36:59 --> Severity: Notice  --> Undefined index: alergi /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2432
ERROR - 2025-03-25 10:36:59 --> Severity: Notice  --> Undefined index: urine /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 2433
ERROR - 2025-03-25 10:37:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:37:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:38:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:38:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:38:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:38:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:38:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:39:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:40:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:40:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:40:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:41:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'undefined'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
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
ERROR - 2025-03-25 10:42:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:42:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:42:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:42:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:42:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:43:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 10:43:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:44:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:44:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:44:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:44:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:45:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:46:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:46:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:46:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:46:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:47:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:47:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 10:47:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:47:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:48:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 10:48:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:49:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:50:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:50:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:52:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:53:01 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/Rawat_inap.php 353
ERROR - 2025-03-25 10:53:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:53:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:53:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:53:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:53:17 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-25 10:53:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 10:53:18 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-25 10:53:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:54:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:54:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 824
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 829
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-03-25 10:54:33 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 830
ERROR - 2025-03-25 10:54:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:55:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:55:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:57:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:57:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:57:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:58:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 10:59:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:00:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:00:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:01:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:01:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:01:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:01:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:02:55 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:02:55 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:03:26 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:03:26 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:03:31 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:03:31 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:03:38 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:03:38 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:03:44 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:03:44 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:03:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:04:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:04:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:04:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:04:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:05:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:05:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:06:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:06:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:06:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:06:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:07:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:07:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:07:57 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:29 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:08:33 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 11:09:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:09:59 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8045
ERROR - 2025-03-25 11:10:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:10:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:10:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:10:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:11:54 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-03-25 11:11:54 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 814
ERROR - 2025-03-25 11:12:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:12:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:12:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:13:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:13:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:13:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:13:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:13:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:14:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:14:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:14:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:14:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:14:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:15:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:15:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:18:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:18:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 04:18:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 11:18:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:18:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:19:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:19:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:19:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:19:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:19:54 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:19:54 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:19:56 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:19:56 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:20:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:20:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:21:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:22:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:22:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:23:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:23:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:24:01 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:24:01 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:24:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:24:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:24:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:24:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:24:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:24:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:24:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:24:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:24:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:24:46 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:24:47 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:24:48 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:24:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 11:25:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:26:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:27:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:27:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:28:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:28:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:28:59 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:29:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:29:58 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:30:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:31:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:34:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:34:13 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:34:13')
ERROR - 2025-03-25 11:34:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:34:18 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:34:18')
ERROR - 2025-03-25 11:34:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:34:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:34:23 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:34:23')
ERROR - 2025-03-25 04:34:45 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:34:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:34:56 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:34:56')
ERROR - 2025-03-25 11:35:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:35:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:35:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:35:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:35:49')
ERROR - 2025-03-25 11:36:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:36:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:36:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:36:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715474', '2025-03-25 11:25', '8', '', '', '', '', '', '', '', '', 'Saat ini pasien tidak ada keluhan', 'KU: CM, GCS: 15
TD : 160/92 mmHg, Nadi : 83x/mnt, Suhu :36.3 C, RR : 19 x/mnt, SPO2 : 98 «d: Supel, BU (+) normal, hepar teraba 4 jari di bawah arcus costae, NT (-)', 'Tumor Dinding Abd (Rabdomyosarcoma?)-dgn meta liver; Anemia Gravis terkait Malignacy?; CHF', 'Terapi lanjut sesuai DPJP', '743', '1', 'Terapi lanjut sesuai DPJP', NULL, '743', '1', NULL, '2025-03-25 11:36:11')
ERROR - 2025-03-25 11:36:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:36:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 11:37:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:37:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:38:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:38:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:38:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:39:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:39:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:39:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:39:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 11:39:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:39:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 11:39:52 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:39:52 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:39:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 11:39:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 11:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:40:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:40:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:40:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:41:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 5: AND &quot;NO_KEC&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:41:13 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 5: AND "NO_KEC" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = '71'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 11:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:42:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:42:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:42:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:42:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:43:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:43:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:43:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:44:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:44:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:44:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:44:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:44:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814658, '2', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:44:59 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (814658, '2', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814658, '2', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 11:45:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:45:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:45:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:45:38 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:45:48 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:45:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 11:45:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:46:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:46:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:46:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:46:43 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:46:58 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:47:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:47:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:47:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 04:47:18 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:47:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:47:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 04:47:29 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:47:39 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:48:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:48:37 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:48:49 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:49:00 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:49:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:49:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 11:49:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:49:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 04:49:37 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:49:57 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:50:21 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:50:33 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:50:36 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:50:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:50:39 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:50:42 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 04:50:45 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:50:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:50:48 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:50:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 11:50:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 04:51:10 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:16 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 563
ERROR - 2025-03-25 11:51:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:51:37 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:51:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:51:49 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:52:54 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 04:53:08 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:54:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:56:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:37 --> Severity: Warning  --> filesize(): stat failed for /tmp/syam_sessione067b7233db095016c61f040cda07aba782c9eba /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 208
ERROR - 2025-03-25 04:57:40 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 11:57:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:57:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:58:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 11:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:00:47 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8045
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 05:01:16 --> Severity: Notice  --> Trying to get property 'tanggal_lahir' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 68
ERROR - 2025-03-25 12:01:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:01:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:01:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:01:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:01:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:01:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:02:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:03:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:04:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:04:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:06:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:08:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:08:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
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
ERROR - 2025-03-25 12:09:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:10:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:11:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828683, 715504, null, 10, demam -; sariawan; makan susah, Tr 87-naik, Demam Dengfue; Limfadenopati non spesifik, Dx/ DR ulang
Tx/ lanjutkan; konsul SpPm, , 2118, 1, Dx/ DR ulang&lt;div&gt;Tx/ lanjutkan; konsul SpPm&lt;/div&gt;, null, null, 2118, 2025-03-25 12:11:41, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:11:41 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828683, 715504, null, 10, demam -; sariawan; makan susah, Tr 87-naik, Demam Dengfue; Limfadenopati non spesifik, Dx/ DR ulang
Tx/ lanjutkan; konsul SpPm, , 2118, 1, Dx/ DR ulang<div>Tx/ lanjutkan; konsul SpPm</div>, null, null, 2118, 2025-03-25 12:11:41, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715504', NULL, '10', 'demam -; sariawan; makan susah', 'Tr 87-naik', 'Demam Dengfue; Limfadenopati non spesifik', 'Dx/ DR ulang
Tx/ lanjutkan; konsul SpPm', '', '', '', '', '', '', '', '', '2118', '1', 'Dx/ DR ulang<div>Tx/ lanjutkan; konsul SpPm</div>', NULL, '2118', 0, NULL, '2025-03-25 12:11:41')
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:05 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 12:13:05 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:13:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:13:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828686, 715499, null, 10, demam +; nyeri perut; makan kurang; , Tr 110-turun; Tubex +1; UL- leu 5-8
t37,7, Demam Dengue; Demam Toid?, Dx/ CXR; DR ulang
Tx/ lanjutkan, , 2118, 1, Dx/ CXR; DR ulang&lt;div&gt;Tx/ lanjutkan&lt;/div&gt;, null, null, 2118, 2025-03-25 12:14:16, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:14:16 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828686, 715499, null, 10, demam +; nyeri perut; makan kurang; , Tr 110-turun; Tubex +1; UL- leu 5-8
t37,7, Demam Dengue; Demam Toid?, Dx/ CXR; DR ulang
Tx/ lanjutkan, , 2118, 1, Dx/ CXR; DR ulang<div>Tx/ lanjutkan</div>, null, null, 2118, 2025-03-25 12:14:16, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715499', NULL, '10', 'demam +; nyeri perut; makan kurang; ', 'Tr 110-turun; Tubex +1; UL- leu 5-8
t37,7', 'Demam Dengue; Demam Toid?', 'Dx/ CXR; DR ulang
Tx/ lanjutkan', '', '', '', '', '', '', '', '', '2118', '1', 'Dx/ CXR; DR ulang<div>Tx/ lanjutkan</div>', NULL, '2118', 0, NULL, '2025-03-25 12:14:16')
ERROR - 2025-03-25 12:14:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:14:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:14:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:14:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:14:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:14:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:14:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:15:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:15:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:15:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:15:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:16:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:16:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:17:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:17:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:18:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:18:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:18:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:18:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:18:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828691, 715489, null, 10, kel;-, GD M207; P212; Ur/Cr 71/1,0, DM- post Koma HipoGlikemi; AKI; Gangren Pedis S-post debri, Acc bila bedah rajal
Tx/ NS / 12 jam; Diet DM 1900 Kal; Apidra ..., , 2118, 1, Acc bila bedah rajal&lt;div&gt;Tx/ NS / 12 jam; Diet DM 1900 Kal; Api..., null, null, 2118, 2025-03-25 12:18:48, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:18:48 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828691, 715489, null, 10, kel;-, GD M207; P212; Ur/Cr 71/1,0, DM- post Koma HipoGlikemi; AKI; Gangren Pedis S-post debri, Acc bila bedah rajal
Tx/ NS / 12 jam; Diet DM 1900 Kal; Apidra ..., , 2118, 1, Acc bila bedah rajal<div>Tx/ NS / 12 jam; Diet DM 1900 Kal; Api..., null, null, 2118, 2025-03-25 12:18:48, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715489', NULL, '10', 'kel;-', 'GD M207; P212; Ur/Cr 71/1,0', 'DM- post Koma HipoGlikemi; AKI; Gangren Pedis S-post debri', 'Acc bila bedah rajal
Tx/ NS / 12 jam; Diet DM 1900 Kal; Apidra Cor Dos mulai 6 U;l Omz 2 x 1; Ondan 2 x8; Ceftri; Metro; RAber Bedah
', '', '', '', '', '', '', '', '', '2118', '1', 'Acc bila bedah rajal<div>Tx/ NS / 12 jam; Diet DM 1900 Kal; Apidra Cor Dos mulai 6 U;l Omz 2 x 1; Ondan 2 x8; Ceftri; Metro; RAber Bedah</div>', NULL, '2118', 0, NULL, '2025-03-25 12:18:48')
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:19:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:19:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:19:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:19:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:20:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:20:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:20:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:20:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:20:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:20:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:20:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:21:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:21:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:22:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:22:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828696, 715487, null, 10, nyeri perut masih hilang timbul; bab -N, Test Pack -; UL-N, Epigastric PAin- Dispepsia/GERD;
, Rawat Jalan
Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscopan K..., , 2118, 1, Rawat Jalan&lt;div&gt;Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscop..., null, null, 2118, 2025-03-25 12:22:21, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:22:21 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828696, 715487, null, 10, nyeri perut masih hilang timbul; bab -N, Test Pack -; UL-N, Epigastric PAin- Dispepsia/GERD;
, Rawat Jalan
Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscopan K..., , 2118, 1, Rawat Jalan<div>Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscop..., null, null, 2118, 2025-03-25 12:22:21, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715487', NULL, '10', 'nyeri perut masih hilang timbul; bab -N', 'Test Pack -; UL-N', 'Epigastric PAin- Dispepsia/GERD;
', 'Rawat Jalan
Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscopan Kp; ', '', '', '', '', '', '', '', '', '2118', '1', 'Rawat Jalan<div>Omz 2 x 1; Ondan 2 x 8; Antacida 3 x C1; Buscopan Kp;Â </div>', NULL, '2118', 0, NULL, '2025-03-25 12:22:21')
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:22:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:22:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:22:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:22:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:22:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:23:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:23:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828698, 715487, null, 10, kel; berkurang, UL-N; Tes Pack -, Epigastric PAin- Dispepsia/GERD;
, Rajal
Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan plus ..., , 2118, 1, Rajal&lt;div&gt;Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan p..., null, null, 2118, 2025-03-25 12:24:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:24:07 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828698, 715487, null, 10, kel; berkurang, UL-N; Tes Pack -, Epigastric PAin- Dispepsia/GERD;
, Rajal
Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan plus ..., , 2118, 1, Rajal<div>Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan p..., null, null, 2118, 2025-03-25 12:24:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('715487', NULL, '10', 'kel; berkurang', 'UL-N; Tes Pack -', 'Epigastric PAin- Dispepsia/GERD;
', 'Rajal
Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan plus kp', '', '', '', '', '', '', '', '', '2118', '1', 'Rajal<div>Lanzo 2 x1 ; Antacida 3 X C1; Ondan 2 x 8; Buscopan plus kp</div>', NULL, '2118', 0, NULL, '2025-03-25 12:24:07')
ERROR - 2025-03-25 12:24:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:24:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:24:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:24:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:24:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:24:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:24:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:27 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 12:25:27 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 12:25:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:25:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:25:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:25:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:26:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:26:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:26:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('814264', '17', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:57 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('814264', '17', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('814264', '17', '', '1', '2 x Sehari 1/2 Tablet', '', 'null', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 12:26:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:26:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:27:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:27:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:27:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:28:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:28:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:28:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:28:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:28:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:29:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:29:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:29:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:29:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:30:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:30:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:30:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:31:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;no_kab&quot;
LINE 3: WHERE &quot;NO_PROP&quot; = 'no_kab'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:31:51 --> Query error: ERROR:  invalid input syntax for type integer: "no_kab"
LINE 3: WHERE "NO_PROP" = 'no_kab'
                          ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = 'no_kab'
AND "NO_KAB" IS NULL
ORDER BY "NAMA_KEC"
ERROR - 2025-03-25 12:31:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;no_kab&quot;
LINE 3: WHERE &quot;NO_PROP&quot; = 'no_kab'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:31:57 --> Query error: ERROR:  invalid input syntax for type integer: "no_kab"
LINE 3: WHERE "NO_PROP" = 'no_kab'
                          ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = 'no_kab'
AND "NO_KAB" IS NULL
AND "NO_KEC" IS NULL
ORDER BY "NAMA_KEL"
ERROR - 2025-03-25 12:32:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:32:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:32:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:32:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:32:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:32:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:33:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:34:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:44 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:35:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:36:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:36:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:36:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:37:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:37:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:37:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:38:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:38:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:39:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:39:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:40:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:40:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:40:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:40:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:40:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:40:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('814399', '20', '', 'NaN',...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:40:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('814399', '20', '', 'NaN',...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('814399', '20', '', 'NaN', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:40:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:41:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:41:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:41:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:42:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:42:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:42:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:43:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:44:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:44:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:44:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:45:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:45:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:45:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:45:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 12:46:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:46:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:46:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 12:46:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:46:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:46:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:47:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:47:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:47:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:47:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:47:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:47:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:47:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:47:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:48:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:49:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:49:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:49:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:49:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:49:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:19 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 12:49:19 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 12:49:22 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 12:49:22 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:49:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:50:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:50:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:51:14 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717022', '2025-03-25 10:37', '11', '', '', '', '', 'BB = 41,,8 Kg, TB = 165 cm. BB/U = 63% TB/U = 93»/TB = 81,1% HA 14 tahun 2 bulan. BBI 51,5 Kg. Kesan : Perawakan pendek, BB kurang. status gizi normal. TD : 106/71 mmHg Nadi : 67 x/mnt Suhu : 36.2 C RR : 19 x/mnt SPO2 : 100 %.terpasang RL 20 tpm. pemeriksaan tgl 22 maret/03/24 RO Thorax dan Manus anak1 posisi. Hasil Lab (Hemoglobin L 13.2 Hematokrit 40 Eritrosit 4.92 Leukosit 6.7 Trombosit H 491 Laju Endap Darah (LED) 8 MCV 82 MCH 27 MCHC 33 Basofil 0 Eosinofil 3 Neutrofil Segmen L 36 Limfosit H 52 Monosit H 9 Waktu Perdarahan 2 Waktu Pembekuan 9 Glukosa Sewaktu 85 Anti HIV Screening 1 Non Reaktif)', 'Asupan makan inadekuat berkaitan dengan penurunan daya terima makan ditandai dengan cakupan makan &lt;80%', 'Diet NB ; E 2060 KKal P 77,2 gr L 68,6 gr KH 309 gr ; bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan', 'Cakupan makan &lt;80%', '', '', '', '', '1436', '1', 'Diet NB 1700 Kkal', NULL, '1436', 0, NULL, '2025-03-25 12:51:14')
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:51:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:52:01 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717022', '2025-03-25 10:37', '11', '', '', '', '', 'BB = 41,,8 Kg, TB = 165 cm. BB/U = 63% TB/U = 93»/TB = 81,1% HA 14 tahun 2 bulan. BBI 51,5 Kg. Kesan : Perawakan pendek, BB kurang. status gizi normal. TD : 106/71 mmHg Nadi : 67 x/mnt Suhu : 36.2 C RR : 19 x/mnt SPO2 : 100 %.terpasang RL 20 tpm. pemeriksaan tgl 22 maret/03/24 RO Thorax dan Manus anak1 posisi. Hasil Lab (Hemoglobin L 13.2 Hematokrit 40 Eritrosit 4.92 Leukosit 6.7 Trombosit H 491 Laju Endap Darah (LED) 8 MCV 82 MCH 27 MCHC 33 Basofil 0 Eosinofil 3 Neutrofil Segmen L 36 Limfosit H 52 Monosit H 9 Waktu Perdarahan 2 Waktu Pembekuan 9 Glukosa Sewaktu 85 Anti HIV Screening 1 Non Reaktif)', 'Asupan makan inadekuat berkaitan dengan penurunan daya terima makan ditandai dengan cakupan makan &lt;80%', 'Diet NB ; E 2060 KKal P 77,2 gr L 68,6 gr KH 309 gr ; bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan', 'Cakupan makan &lt;80%', '', '', '', '', '1436', '1', 'Diet NB 1700 Kkal', NULL, '1436', 0, NULL, '2025-03-25 12:52:01')
ERROR - 2025-03-25 12:52:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:52:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:52:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:52:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:52:13 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717022', '2025-03-25 10:37', '11', '', '', '', '', 'BB = 41,,8 Kg, TB = 165 cm. BB/U = 63% TB/U = 93»/TB = 81,1% HA 14 tahun 2 bulan. BBI 51,5 Kg. Kesan : Perawakan pendek, BB kurang. status gizi normal. TD : 106/71 mmHg Nadi : 67 x/mnt Suhu : 36.2 C RR : 19 x/mnt SPO2 : 100 %.terpasang RL 20 tpm. pemeriksaan tgl 22 maret/03/24 RO Thorax dan Manus anak1 posisi. Hasil Lab (Hemoglobin L 13.2 Hematokrit 40 Eritrosit 4.92 Leukosit 6.7 Trombosit H 491 Laju Endap Darah (LED) 8 MCV 82 MCH 27 MCHC 33 Basofil 0 Eosinofil 3 Neutrofil Segmen L 36 Limfosit H 52 Monosit H 9 Waktu Perdarahan 2 Waktu Pembekuan 9 Glukosa Sewaktu 85 Anti HIV Screening 1 Non Reaktif)', 'Asupan makan inadekuat berkaitan dengan penurunan daya terima makan ditandai dengan cakupan makan &lt;80 persen', 'Diet NB ; E 2060 KKal P 77,2 gr L 68,6 gr KH 309 gr ; bentuk makan biasa, jalur oral. Frekuensi 3 kali makan 2 kali selingan', 'Cakupan makan &lt;80 persen', '', '', '', '', '1436', '1', 'Diet NB 1700 Kkal', NULL, '1436', 0, NULL, '2025-03-25 12:52:13')
ERROR - 2025-03-25 12:52:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 12:52:29 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 12:52:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 12:52:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 12:52:30 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:52:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:53:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:53:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:53:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:53:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:54:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:54:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:54:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:54:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:55:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:55:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:55:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:55:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:55:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:56:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:56:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:56:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:57:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:57:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:57:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:57:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:57:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:58:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:58:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:58:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:58:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:59:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:59:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:59:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 12:59:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 12:59:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 12:59:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:00:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:00:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:00:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:00:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:00:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:01:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:01:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:01:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:01:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:01:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:01:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814726, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:02:32 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814726, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814726, '1', '', '', '', '', 'PC', '0', '', '0', '', 'PCT 300 MG+TRAMADOL 40 MG+DIAZEPAM 1 MG AMITRIPTILIN 5 MG 2X1 MINTA 5', '1', 1, '2X1', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:02:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:02:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:02:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:02:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:02:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:03:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:03:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:03:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:03:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:03:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:04:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:05:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:05:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:06:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:06:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:06:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:06:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:06:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:07:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:07:35 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:07:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:08:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:08:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:08:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:09:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:09:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:09:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:09:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:09:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:10:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:10:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 13:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:10:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:10:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:11:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:11:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:12:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:12:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:13:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:13:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:13:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:13:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:14:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:14:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:14:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:14:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:15:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:15:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:15:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:15:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:15:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:15:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:15:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:15:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:15:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:15:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:16:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:16:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:16:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:16:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:16:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:16:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:16:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:16:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:16:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:16:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:16:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:17:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:17:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:17:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:17:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:17:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:17:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:17:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:18:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:18:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:18:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:18:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:19:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:19:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:19:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:19:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:19:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:19:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:20:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828743, 717021, null, 10, kuning; lemas; makan kurang;
RPD: DM on Insulin; Ca Colon on Co..., T 100/58; n83; febris-
Ict +/+; Colostomi +; Feces +;
Hb 8,3; ..., DM; Ca Colon-Meta? Meta Paru ?, Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M
Tx/ RL/ 8 jam; Diet..., , 2118, 1, Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M&lt;div&gt;Tx/ RL/ 8 jam; ..., null, null, 2118, 2025-03-25 13:20:29, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:20:29 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828743, 717021, null, 10, kuning; lemas; makan kurang;
RPD: DM on Insulin; Ca Colon on Co..., T 100/58; n83; febris-
Ict +/+; Colostomi +; Feces +;
Hb 8,3; ..., DM; Ca Colon-Meta? Meta Paru ?, Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M
Tx/ RL/ 8 jam; Diet..., , 2118, 1, Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M<div>Tx/ RL/ 8 jam; ..., null, null, 2118, 2025-03-25 13:20:29, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717021', NULL, '10', 'kuning; lemas; makan kurang;
RPD: DM on Insulin; Ca Colon on Colostomy on Kemo', 'T 100/58; n83; febris-
Ict +/+; Colostomi +; Feces +;
Hb 8,3; L10,8;T447; Ur/Cr 63/0,7; OT/PT 31/28; Na 131; K 3,6; Alb-: GDS M 324; P 158;
CXR-Nodul +', 'DM; Ca Colon-Meta? Meta Paru ?', 'Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M
Tx/ RL/ 8 jam; Diet DM 1700 Kal; Binecap 3 x 2; SansulinR 3 x 10; Sansulin Log G 1 x 10 U; Omz 1 x 40; Curcuma 3 x 1; ', '', '', '', '', '', '', '', '', '2118', '1', 'Dx/ USG Abd: Alb; BiliT/D; DR ulang; GD P-M<div>Tx/ RL/ 8 jam; Diet DM 1700 Kal; Binecap 3 x 2; SansulinR 3 x 10; Sansulin Log G 1 x 10 U; Omz 1 x 40; Curcuma 3 x 1;</div>', NULL, '2118', 0, NULL, '2025-03-25 13:20:29')
ERROR - 2025-03-25 13:20:43 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 13:20:43 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 13:20:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:20:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:20:49 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 13:20:49 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 13:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:22:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:22:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:22:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:22:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:23:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:23:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:24:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828745, 717078, null, 10, on HD, , Penkes perbaikan Hipoglikemia, pada DM tipe II, Anemia renal, CK..., Dx/ DR; Ur/Cr post HD; GD / 6 jam
Tx/ Veinflon; Diet DM 1900 ka..., , 2118, 1, Dx/ DR; Ur/Cr post HD; GD / 6 jam&lt;div&gt;Tx/ Veinflon; Diet DM 190..., null, null, 2118, 2025-03-25 13:24:47, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:24:47 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828745, 717078, null, 10, on HD, , Penkes perbaikan Hipoglikemia, pada DM tipe II, Anemia renal, CK..., Dx/ DR; Ur/Cr post HD; GD / 6 jam
Tx/ Veinflon; Diet DM 1900 ka..., , 2118, 1, Dx/ DR; Ur/Cr post HD; GD / 6 jam<div>Tx/ Veinflon; Diet DM 190..., null, null, 2118, 2025-03-25 13:24:47, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717078', NULL, '10', 'on HD', '', 'Penkes perbaikan Hipoglikemia, pada DM tipe II, Anemia renal, CKD st V, hiperkalemia, HT HHD
', 'Dx/ DR; Ur/Cr post HD; GD / 6 jam
Tx/ Veinflon; Diet DM 1900 kal; Omz 1 x 40; Ondan 2 x 8; As Folat 3 x 1; BicNat 3 x 1; CaCo3 3x1; Adalat oros 1 x1; lainnya obat jantu lanjutkan', '', '', '', '', '', '', '', '', '2118', '1', 'Dx/ DR; Ur/Cr post HD; GD / 6 jam<div>Tx/ Veinflon; Diet DM 1900 kal; Omz 1 x 40; Ondan 2 x 8; As Folat 3 x 1; BicNat 3 x 1; CaCo3 3x1; Adalat oros 1 x1; lainnya obat jantu lanjutkan</div>', NULL, '2118', 0, NULL, '2025-03-25 13:24:47')
ERROR - 2025-03-25 13:24:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:24:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:24:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:24:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:25:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:25:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:23 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:25:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-25 13:26:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:26:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:27:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:27:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (828749, 717061, null, 10, nyeri perut bawah; demam -, UL- Leuko&gt;&gt;; Eri&gt;&gt;
Hb 12,8; L 13 ,2, ISK/Cystitis, Dx/-
Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp, , 2118, 1, Dx/-&lt;div&gt;Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp&lt;/div&gt;, null, null, 2118, 2025-03-25 13:27:30, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:30 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (828749, 717061, null, 10, nyeri perut bawah; demam -, UL- Leuko>>; Eri>>
Hb 12,8; L 13 ,2, ISK/Cystitis, Dx/-
Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp, , 2118, 1, Dx/-<div>Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp</div>, null, null, 2118, 2025-03-25 13:27:30, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717061', NULL, '10', 'nyeri perut bawah; demam -', 'UL- Leuko>>; Eri>>
Hb 12,8; L 13 ,2', 'ISK/Cystitis', 'Dx/-
Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp', '', '', '', '', '', '', '', '', '2118', '1', 'Dx/-<div>Tx/ RL/ 6 jam; Ceftri; Rani;Pct Kp</div>', NULL, '2118', 0, NULL, '2025-03-25 13:27:30')
ERROR - 2025-03-25 13:27:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:27:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:27:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:27:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:28:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:28:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:29:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:29:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:30:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:30:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:30:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:30:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:30:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 13:31:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:31:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:31:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:31:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:31:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:31:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:33:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:33:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:33:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:34:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:35:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:35:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:35:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:35:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:36:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:36:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:37:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:37:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:37:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:39:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:39:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:39:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:39:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:39:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:39:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:41:40 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-25 13:44:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:45:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:45:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:45:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:45:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:49:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:49:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:55:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:55:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:55:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 13:55:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 13:57:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 13:59:33 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:00:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 14:01:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:01:51 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 14:01:51 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 14:02:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 14:02:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 14:02:10 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 14:02:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:02:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 14:05:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:05:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:07:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:07:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:07:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:07:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:07:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:08:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:08:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:09:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:11:20 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 14:11:21 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 14:11:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:11:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:11:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:11:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:12:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:12:36 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:13:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:13:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:13:55 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 14:13:55 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 14:15:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:15:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:15:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:16:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2421
ERROR - 2025-03-25 14:16:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2434
ERROR - 2025-03-25 14:16:09 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2447
ERROR - 2025-03-25 14:17:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:17:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:18:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:19:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:20:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 14:20:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 14:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:21:24 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 14:21:24 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 14:29:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:29:15 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:29:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:29:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:30:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:30:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:30:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:30:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:31:58 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/folder_pasien/views/download/all_dokumen.php 7043
ERROR - 2025-03-25 14:32:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:33:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:34:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:34:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:35:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:38:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:44:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:44:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:46:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:46:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:49:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:49:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:49:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:49:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:49:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:50:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5857026, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:50:02 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5857026, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857026, '78', 13200, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 14:50:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:50:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:50:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:50:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:51:07 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 14:51:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 14:51:14 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 14:51:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 14:51:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 14:53:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:54:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 14:54:54 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 14:54:54 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 14:57:57 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-25 15:00:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:01:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:11:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:11:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:11:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:12:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:12:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:12:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 15:12:12 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 15:12:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 15:12:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 15:12:15 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 15:12:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:16:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:16:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:16:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:16:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:18:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:18:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:18:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:18:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:19:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:19:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:22:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:22:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:22:14 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-25 15:22:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:22:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:22:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:24:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:24:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:24:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:24:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:25:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 15:26:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 15:26:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:30:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:37:45 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-25 15:37:45 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-25 15:42:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:44:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:49:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 15:52:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:52:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:52:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:52:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:52:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('814769', '13', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:52:50 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('814769', '13', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('814769', '13', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 15:52:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 15:52:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 15:53:14 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 15:53:14 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 15:53:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:53:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:53:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 15:53:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 15:54:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 15:58:10 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 15:58:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 15:58:34 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 15:58:34 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 16:00:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 16:00:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:00:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-03-25 16:00:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:00:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-03-25 16:02:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 16:08:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 16:10:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:10:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 16:17:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 16:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-03-25 16:17:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = ''
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:17:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 9: WHERE "pd"."id" = ''
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = ''
ERROR - 2025-03-25 16:18:42 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:19:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:21:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:21:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717737', '2025-03-25 17:19', '18', 'pasien mengatakan sesak napas, sesak bila aktifitas disertai batuk berdahak, perut buncit, kedua tangan dan kaki bengkak, nyeri ulu hati, nyeri seperti tersayat-sayat, nyeri menjalar dari ulu hati sampai perut bawah, nyeri hilang bila minum obat dan istirahat', 'gcs 15, kesadaran CM, EWS Merah (8), akral hangat, nadi teraba kuat, tampak sesak napas dan batuk berdahak, tampak bengkak pada perut, kedua tangan dan kedua kaki, suara paru RH +/+, Wh +/+,tampak meringis kesakitan VAS 4/10, TD 131/87 mmHg, nadi 110xmenit, suhu 36 C, rr 22xmenit, spo2: 80 % RA, 94 Þngan NRM 10 lpm, tanggal 25/3/25 Vemplon di tangan kanan no 22, terpasang DC no 16 pengunci 25cc, ro thorax sedang di exp, HB 9,9, HT 30, trombosit 365, leukosit 12,0, natrium 134, kalium 5,2, ureum 96, creatinin 3,9, gds 169, Riw HT HHD CAD +, DM +, Stroke infark +, Vertigo +, CKD stg III +, TB + tuntas pengobatan 2022, PPOK -, Merokok -, RPO CPG 1*1 tab, Amlodipine 1*10mg, Spironolactone 1*25mg, ISDN 5mg kp, Ramipril 1*5mg, Atorvastatin 1*20mg, Apidra 3*10U, ABC 3*1tab, Nospirinal 1*80mg, Citicoline 2*500mg, Betahistin 2*24mg, Eperisone 2*50mg, Dimenhidrinat 3*1tab,. intake:300 cc Output :1000.tgl 25-3-25 PH 7.5 pCO2 19.8 HCO3 18 O2 sat 99.5', 'Bersihan jalan napas tidak efektif, nyeri akut, hipervolemia, penurunan curah jantung, ketidakstabilan kadar stabilan kadar glukosa darah', '', '', '', '', '', '', '', '', '', '2011', '1', '-', NULL, '2011', 0, NULL, '2025-03-25 16:21:34')
ERROR - 2025-03-25 16:27:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:27:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 16:27:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 16:27:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 16:35:59 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-25 16:36:09 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-25 16:37:20 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:37:34 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:37:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:37:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:38:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 16:56:15 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 16:58:41 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 17:01:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 17:02:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:02:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:02:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5857354, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:02:50 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5857354, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857354, '525', 3545.784, '25', '1.00', NULL, 'null')
ERROR - 2025-03-25 17:04:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:04:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:04:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:04:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:04:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:04:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:07:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-25 17:24:22 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-25 17:39:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:39:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:39:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 17:39:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 17:53:24 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 18:00:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:00:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:04:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 18:11:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-25 18:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...rian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814792, '13', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:20:05 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...rian_5", "jam_pemberian_6") VALUES (814792, '13', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814792, '13', '', '', '', '', 'PC', '0', '', '0', '', '10', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 18:23:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:23:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:23:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:23:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:23:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:23:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:23:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:23:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:23:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5857512, '811', 4395.6, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:23:42 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5857512, '811', 4395.6, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857512, '811', 4395.6, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-03-25 18:24:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:24:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:24:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:24:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:24:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:24:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:24:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:24:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:25:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:25:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5857550, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5857550, '78', 13200, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857550, '78', 13200, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 18:26:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:26:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:26:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:27:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:27:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:28:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:28:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 18:31:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 18:31:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:03:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 19:06:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 19:07:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 19:09:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:09:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:09:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5857641, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:09:10 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5857641, '420', 8858.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857641, '420', 8858.4, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 19:09:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:09:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:18:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 19:25:48 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-25 19:25:48 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-25 19:25:48 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-25 19:41:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 19:42:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:42:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:55:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:55:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:55:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:55:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:56:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:56:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5857725, '921', 2040.624, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:56:18 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5857725, '921', 2040.624, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857725, '921', 2040.624, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 19:57:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:57:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:58:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:58:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 19:58:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5857739, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:58:25 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5857739, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857739, '525', 3545.784, '25', '1.00', NULL, 'null')
ERROR - 2025-03-25 19:58:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 19:58:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:00:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:00:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:00:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:00:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:00:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5857773, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:00:56 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5857773, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857773, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-03-25 20:01:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:01:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:04:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:04:03 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717074', '2025-03-25 20:03', '8', '', '', '', '', '', '', '', '', 'Pasien penkes, sulit dikaji. Demam (+)', 'GCS E1M2V2
TD : 58/41 mmHg, N 138 x/menit, Suhu : 38 C, RR : 30x/menit, SpO2 : 93Þngan NRM 15 lpm', 'CVD DM-DKD', 'Lapor kondisi pasien ke dr.Vinnie Sp.S', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Vinnie Sp.S</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-03-25 20:04:03')
ERROR - 2025-03-25 20:04:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:04:12 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('717074', '2025-03-25 20:03', '8', '', '', '', '', '', '', '', '', 'Pasien penkes, sulit dikaji. Demam (+)', 'GCS E1M2V2
TD : 58/41 mmHg, N 138 x/menit, Suhu : 38 C, RR : 30x/menit, SpO2 : 93Þngan NRM 15 lpm', 'CVD DM-DKD', 'Lapor kondisi pasien ke dr.Vinnie Sp.S', '2023', '1', '<p>sudah lapor & konfirmasi ulang dr.Vinnie Sp.S</p><p>Advis</p><p><br></p>', NULL, '2023', '1', NULL, '2025-03-25 20:04:12')
ERROR - 2025-03-25 20:12:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:12:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:12:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5857783, '702', 323.676, '4', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:12:42 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5857783, '702', 323.676, '4', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5857783, '702', 323.676, '4', '2.00', 'Ya', 'null')
ERROR - 2025-03-25 20:12:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:12:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:14:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:14:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:16:01 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-25 20:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814812, '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:17:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814812, '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814812, '2', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 20:23:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:24:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:24:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:25:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:26:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:26:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:26:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:26:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:27:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:27:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:27:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:27:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:27:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:27:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:27:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:27:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:28:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:28:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:28:12 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-25 20:28:12 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-25 20:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:40:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:40:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:41:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:41:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:41:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 20:41:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 20:42:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:51:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:52:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:55:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 20:57:45 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-25 20:57:45 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-25 21:04:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 21:06:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 21:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 21:10:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:10:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 21:13:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (814822, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:13:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (814822, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (814822, '3', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-25 21:20:25 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 13654
ERROR - 2025-03-25 21:40:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:40:51 --> Query error: ERROR:  invalid input syntax for type integer: "null"
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1679' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-03-25 21:50:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 21:54:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:54:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 21:54:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:54:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 21:54:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:54:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 21:54:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:54:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 21:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 21:57:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 21:57:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 22:03:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 22:03:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 22:06:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 22:09:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 22:09:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 22:29:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 22:39:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5858043, '526', 292.8, '1', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 22:39:45 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5858043, '526', 292.8, '1', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5858043, '526', 292.8, '1', '10.00', 'Ya', 'null')
ERROR - 2025-03-25 22:40:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 22:42:00 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 22:54:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 22:58:45 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12278
ERROR - 2025-03-25 23:04:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-03-26 08&quot;
LINE 1: ...bak&quot; = '2025-03-25 22:17', &quot;waktu_pemberi_tbak&quot; = '2025-03-2...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:04:14 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-03-26 08"
LINE 1: ...bak" = '2025-03-25 22:17', "waktu_pemberi_tbak" = '2025-03-2...
                                                             ^ - Invalid query: UPDATE "sm_cppt" SET "waktu_penerima_tbak" = '2025-03-25 22:17', "waktu_pemberi_tbak" = '2025-03-26 08', "id_nadis_tbak" = '2024', "id_dokter_dpjp_tbak" = '68', "ttd_nadis_tbak" = '1', "ttd_dokter_dpjp_tbak" = '1'
WHERE "id" = '829024'
ERROR - 2025-03-25 23:05:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:05:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 23:09:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:09:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 23:16:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-25 23:31:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:31:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 23:40:50 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-25 23:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 23:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-25 23:51:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-25 23:30:39 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-25 23:30:39 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-25 23:30:39 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-25 23:30:39 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-25 23:30:39 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-25 23:30:39 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
