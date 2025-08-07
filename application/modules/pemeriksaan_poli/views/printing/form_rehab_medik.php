<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
<!-- <body> -->

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="information">
            <br>
            <div class="information__container container">
                <!--=============== INFORMATION TABLE ===============-->
                <table class="small__font no__border" style="border-bottom: double;">
                    <tbody>
                        <tr align="center">
                            <td class="no__border"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img"></td>
                            <td class="no__border"><h2>FORMULIR RAWAT JALAN LAYANAN KEDOKTERAN FISIK DAN REHABILITAS MEDIK</h2></td>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font no__border" style="margin-top: 5px;">
                    <tbody align="left">
                        <tr>
                            <th class="no__border"  width="1%"><h3>I.</h3></th>
                            <th class="no__border" colspan="6"><h3>IDENTITAS PASIEN</h3></th>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="15%">Nama Pasien</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="15%"><?= $form_rehab_medik->nama; ?></td>
                            <td class="no__border" width="15%">No.RM/Reg</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="15%"><?= $form_rehab_medik->id_pasien; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border">Tanggal Lahir</td>
                            <td class="no__border">:</td>
                            <td class="no__border"><?= datefmysql($form_rehab_medik->tanggal_lahir); ?></td>
                            <td class="no__border">Telp/HP</td>
                            <td class="no__border">:</td>
                            <td class="no__border"><?= $form_rehab_medik->telp; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border">Alamat</td>
                            <td class="no__border">:</td>
                            <td class="no__border" colspan="4"><?= $form_rehab_medik->alamat; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="small__font no__border">
                    <tbody align="left">
                        <tr>
                            <th class="no__border"  width="1%"><h3>II.</h3></th>
                            <th class="no__border" colspan="5"><h3>ASESSMEN AWAL</h3></th>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="23%">Tanggal Pelayanan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" colspan="3"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_pelayanan); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="23%">Anamnesa</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" colspan="3"><?= $form_rehab_medik->rmf_anamnesa; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="23%">Pemeriksaan Fisik dan Uji</td>
                            <td class="no__border" width="1%">:</td>
                            <?php if ($form_rehab_medik->rmf_keadaan_umum !== NULL) : ?>
                            <td class="no__border" width="15%">Keadaan Umum</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_keadaan_umum; ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php if ($form_rehab_medik->rmf_gcs !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">GCS</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_gcs; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_kesadaran !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Kesadaran</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_kesadaran; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_alergi !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Alergi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_alergi; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_tensi_sistolik !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Sistolik</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_tensi_sistolik; ?> mmHg</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_tensi_diastolik !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Diastolik</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_tensi_diastolik; ?> mmHg</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_suhu !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Suhu</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_suhu; ?> °C</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_nadi !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Nadi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_nadi; ?> /Mnt</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_rr !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Respirasi Rate</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_rr; ?> /Mnt</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_tinggi_badan !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Tinggi Badan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_tinggi_badan; ?> Cm</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_berat_badan !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Berat Badan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_berat_badan; ?> Kg</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_kepala !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Kepala</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_kepala; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_leher !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Leher</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_leher; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_thorax !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Thorax</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_thorax; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_pulmo !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Pulmo</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_pulmo; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_cor !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Cor</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_cor; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_abdomen !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Abdomen</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_abdomen; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_genitalia !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Genitalia</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_genitalia; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_ekstrimitas !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Ekstrimitas</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_ekstrimitas; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_prognosis !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">prognosis</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_prognosis; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_status_mentalis !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Status Mentalis</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_status_mentalis; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_lingkar_kepala !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Lingkar Kepala</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_lingkar_kepala; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_status_gizi !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Status Gizi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_status_gizi; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_telinga !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Telinga</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_telinga; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_hidung !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Hidung</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_hidung; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_tenggorok !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Tenggorok</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_tenggorok; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_mata !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Mata</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_mata; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_kulit_kelamin !== NULL) : ?>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" width="15%">Kulit Kelamin</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_kulit_kelamin; ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <table class="small__font no__border">
                    <tbody align="left">
                        <tr>
                            <th class="no__border"  width="1%"></th>
                            <th class="no__border" colspan="3"><b>Fungsi</b></th>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%" style="vertical-align: top;">Diagnosis Medis (ICD-10)</td>
                            <td class="no__border" width="1%" style="vertical-align: top;">:</td>
                            <td class="no__border" style="display: flex; flex-direction:column;">
                            <?php foreach(json_decode($form_rehab_medik->rmf_diagnosa) as $ds) :?>
                            <span>- <?= $ds; ?></span>
                            <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Diagnosis Fungsi (ICD-10)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_diagnosis_fungsi; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Pemeriksaan Penunjang</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_pemeriksaan_penunjang; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Tata Laksana KFR (ICD 9 CM)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_tata_laksana; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Rekomendasi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_rekomendasi_asessmen; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Evaluasi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_evaluasi; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Suspek Penyakit Akibat Kerja</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $form_rehab_medik->rmf_suspek_penyakit == 1 ? 'Ya' : 'tidak'; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="small__font no__border">
                    <tbody align="left">
                        <tr>
                            <th class="no__border"  width="1%"><h3>III.</h3></th>
                            <th class="no__border" colspan="5"><h3>JADWAL PROGRAM TERAPI</h3></th>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font">
                    <thead>
                        <tr>
                            <th rowspan="2" align="center" width="5%">NO</th>
                            <th rowspan="2" align="center">PROGRAM</th>
                            <th rowspan="2" align="center">TANGGAL</th>
                            <th colspan="3" align="center">PARAF</th>
                        </tr>
                        <tr>
                            <th align="center">PASIEN</th>
                            <th align="center">DOKTER</th>
                            <th align="center">TERAPIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($form_rehab_medik->rmf_program_0 !== NULL) : ?>
                        <tr>
                            <td>1.</td>
                            <td><?= $form_rehab_medik->rmf_program_0; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_0); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_0 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_0 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_0 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_1 !== NULL) : ?>
                        <tr>
                            <td>2.</td>
                            <td><?= $form_rehab_medik->rmf_program_1; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_1); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_1 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_1 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_1 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_2 !== NULL) : ?>
                        <tr>
                            <td>3.</td>
                            <td><?= $form_rehab_medik->rmf_program_2; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_2); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_2 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_2 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_2 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_3 !== NULL) : ?>
                        <tr>
                            <td>4.</td>
                            <td><?= $form_rehab_medik->rmf_program_3; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_3); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_3 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_3 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_3 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_4 !== NULL) : ?>
                        <tr>
                            <td>5.</td>
                            <td><?= $form_rehab_medik->rmf_program_4; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_4); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_4 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_4 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_4 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_5 !== NULL) : ?>
                        <tr>
                            <td>6.</td>
                            <td><?= $form_rehab_medik->rmf_program_5; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_5); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_5 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_5 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_5 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_6 !== NULL) : ?>
                        <tr>
                            <td>7.</td>
                            <td><?= $form_rehab_medik->rmf_program_6; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_6); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_6 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_6 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_6 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_7 !== NULL) : ?>
                        <tr>
                            <td>8.</td>
                            <td><?= $form_rehab_medik->rmf_program_7; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_7); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_7 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_7 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_7 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_8 !== NULL) : ?>
                        <tr>
                            <td>9.</td>
                            <td><?= $form_rehab_medik->rmf_program_8; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_8); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_8 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_8 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_8 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($form_rehab_medik->rmf_program_9 !== NULL) : ?>
                        <tr>
                            <td>10.</td>
                            <td><?= $form_rehab_medik->rmf_program_9; ?></td>
                            <td align="center"><?= datetimefmysql($form_rehab_medik->rmf_tanggal_program_9); ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_pasien_9 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_dokter_9 == 1 ? '✓' : '✕'; ?></td>
                            <td align="center"><?= $form_rehab_medik->rmf_paraf_terapis_9 == 1 ? '✓' : '✕'; ?></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <table class="small__font no__border">
                    <tbody align="left">
                        <tr>
                            <th class="no__border"  width="5%"><h3>IV.</h3></th>
                            <th class="no__border" colspan="2"><h3>HASIL TINDAKAN UJI FUNGSI-PROSEDUR KEDOKTERAN FISIK DAN REHABILITASI MEDISN</h3></th>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="30%">Instrumen Uji Fungsi/Prosedur KFR</td>
                            <td class="no__border">: <?= $form_rehab_medik->rmf_instrumen_uji; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="30%">Hasil yang di dapat</td>
                            <td class="no__border">: <?= $form_rehab_medik->rmf_hasil; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="30%">Kesimpulan</td>
                            <td class="no__border">: <?= $form_rehab_medik->rmf_kesimpulan; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="30%">Rekomendasi</td>
                            <td class="no__border">: <?= $form_rehab_medik->rmf_rekomendasi == 1 ? 'Ya' : 'Tidak'; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="small__font no__border">
                    <tbody align="left">
                        <tr>
                            <td class="no__border" colspan="2" align="center">Tangerang, 
                                <?php if ($form_rehab_medik->updated_at !== NULL) : ?>
                                <?= datetimefmysql($form_rehab_medik->updated_at); ?>
                                <?php endif; ?>
                                <?php if ($form_rehab_medik->updated_at == NULL) : ?>
                                <?= datetimefmysql($form_rehab_medik->created_at); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" align="center">Tanda Tangan Pasien</td>
                            <td class="no__border" align="center">Dokter Sp. KFR</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border" align="center">( <?= $form_rehab_medik->nama; ?> )</td>
                            <td class="no__border" align="center">( <?= $form_rehab_medik->nama_dokter_frm; ?> )</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
<?php die; ?>