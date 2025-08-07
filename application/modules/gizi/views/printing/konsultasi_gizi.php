<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
<!-- <body> -->
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                    Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
            </div>
            <div class="header__container-identity bordersection">
                <div class="identity__section grid">
                    <div class="identity__section-title">
                        <p class="identity">Nama Lengkap</p>
                        <p class="identity">No. Rekam Medik</p>
                        <p class="identity">Tanggal Lahir</p>
                        <p class="identity">Jenis Kelamin</p>
                    </div>
                    <div class="identity__section-subtitle">
                        <p class="identity">: <b><?= $pasien->nama; ?></b></p>
                        <p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="information">
            <br>
            <div class="information__container container">
                <!--=============== INFORMATION TABLE ===============-->
                <table class=" small__font">
                    <thead>
                        <tr>
                            <td colspan="9" align="center">
                                <h4>
                                    <b>FORMULIR KONSULTASI GIZI</b>
                                </h4>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="no__border" colspan="9" align="left"><b>Pengkajian Gizi :</b></th>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="9" style="padding-left: 15px;">a. Antropometri :</td>
                        </tr>
                        <tr>
                            <td width="5%" class="no__border" style="padding-left: 28px;">BB</td>
                            <td width="1%" class="no__border">:</td>
                            <td width="10%" class="no__border"><?= $konsultasi_gizi->kg_bb; ?> kg</td>
                            <td width="5%" class="no__border">LLA</td>
                            <td width="1%" class="no__border">:</td>
                            <td width="10%" class="no__border"><?= $konsultasi_gizi->kg_lla; ?> cm</td>
                            <td width="10%" class="no__border">Perubahan BB</td>
                            <td width="1%" class="no__border">:</td>
                            <td width="10%" class="no__border"><?= $konsultasi_gizi->kg_pbb; ?></td>
                        </tr>
                        <tr>
                            <td width="5%" class="no__border" style="padding-left: 28px;">TB</td>
                            <td width="1%" class="no__border">:</td>
                            <td width="10%" class="no__border"><?= $konsultasi_gizi->kg_tb; ?> cm</td>
                            <td width="5%" class="no__border">IMT</td>
                            <td width="1%" class="no__border">:</td>
                            <td width="10%" class="no__border"><?= $konsultasi_gizi->kg_imt; ?> kg/m²</td>
                            <td colspan="3" class="no__border"></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">b. Biokimia :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_biokimia; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px; ">c. Fisik / Klinik :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_klinis; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">d. Riwayat Gizi :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_gizi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">e. Riwayat Personal :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_personal; ?></textarea></td>
                        </tr>
                        <tr>
                            <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Diagnosis Gizi :</b></th>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_diagnosis; ?></td>
                        </tr>
                        <tr>
                            <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Intervensi Gizi :</b></th>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">a. Tujuan :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_tujuan; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">b. Intervensi :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_intervensi; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 15px;">c. Konseling Gizi / Edukasi :</td>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_konseling; ?></td>
                        </tr>
                        <tr>
                            <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Rencana Monitoring dan Evaluasi Gizi :</b></th>
                        </tr>
                        <tr>
                            <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $konsultasi_gizi->kg_evaluasi; ?></td>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font">
                    <tbody>
                        <tr>
                            <td align="center" colspan="3" class="no__border">Tangerang,<?= date("d/m/Y - H:i", strtotime($konsultasi_gizi->kg_tgl_petugas)); ?> </td>
                        </tr>
                        <tr>
                            <td width="33.3%" align="center" class="no__border">Ahli Gizi :</td>
                            <td width="33.3%" align="center" class="no__border">Dokter :</td>
                            <td width="33.3%" align="center" class="no__border">Pasien :</td>
                        </tr>
                        <tr>
                            <td width="33.3%" class="no__border">
                                <?php
                                    if (isset($konsultasi_gizi->ttd) && $konsultasi_gizi->ttd != '') {
                                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $konsultasi_gizi->ttd . '" alt="ttd-petugas" width="300">';
                                    } else {
                                        echo '<br><br><br><br>';
                                    }
                                ?>
                            </td>
                            <td width="33.3%" class="no__border">
                                <?php
                                    if (isset($konsultasi_gizi->ttd) && $konsultasi_gizi->ttd != '') {
                                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $konsultasi_gizi->ttd . '" alt="ttd-dokter" width="300">';
                                    } else {
                                        echo '<br><br><br><br>';
                                    }
                                ?>
                            </td>
                            <td width="33.3%" class="no__border"><br><br><br><br></td>
                        </tr>
                        <tr>
                            <td width="33.3%" align="center" class="no__border">
                                <?= $konsultasi_gizi->petugas; ?>
                            </td>
                            <td width="33.3%" align="center" class="no__border">
                                <?= $konsultasi_gizi->dokter; ?>
                            </td>
                            <td width="33.3%" align="center" class="no__border">
                                <?= $pasien->nama; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer" id="footer">
        <div class="footer__container container grid">
            <p class="page__number">1/1</p>
            <div class="footer__content grid">
                <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
                <p>FORM-REM-31-02</p>
            </div>
        </div>
    </footer>
</body>
<?php die; ?>