<meta charset="UTF-8">
<!-- // IPI -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
            </div>            
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="persetujuan__tindakan__anestesi">
			<br>
            <div class="persetujuan__tindakan__anestesi__container container">
                <table class="no__border big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">INDIKASI PASIEN MASUK ICU</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="no__border" colspan="5">Yang bertandatangan dibawah ini, dokter IGD/Poliklinik sebagai dokter penanggung jawab pasien,</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="15%">Nama</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->nama; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="15%">Tanggal Lahir</td>
                            <td class="no__border" colspan="3">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="15%">Alamat</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->alamat; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="15%">Diagnosa Pasien</td>
                            <td class="no__border" colspan="3">:<b><?= $print_icu->diagnosa; ?></b></td>
                            <!-- <td class="no__border" colspan="3">:<b><?= $indikasi_pasien_masuk_icu->diagnosa_pasien; ?></b></td> -->

                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">Prioritas I. Prioritas II. Prioritas III</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">1.</td>
                            <td class="no__border" colspan="4">Pasien Prioritas I (satu)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="4">Kelompok ini merupakan pasien sakit kritis, tidak stabil yang memerlukan terapi intensif dan tertitrasi, seperti : Dukungan/bantuan ventilasi dan alat bantu suportif organ/system yang lain, infuse obat-obat vosoaktif kontinyu, obat anti artimia kontinyu, pengobatan kontinyu tetitrasi dan lain-lain.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">2.</td>
                            <td class="no__border" colspan="4">Pasien Prioritas II (dua)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="4">Pasien ini memerlukan pelayanan pemantauan canggih di ICU, sebab sangat bresiko bila tidak mendapatkan terapi intensif segera, misalnya pemantauan intensif menggunakan pulmonari arterial cattteter. Terapu pada pasien prioritas II ini tidak mempunyai batas waktu karena kondisinya setantiasa berubah</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">3.</td>
                            <td class="no__border" colspan="4">Pasien Prioritas III (tiga)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="4">Pasien golongan ini adalah pasien sakit kritis yang tidak stabil status kesehatan sebelumnya, penyakit yang mendasarinya atau penyakit akutnya, secara sendirian atau kombinasi. Kemungkinan sembuh dan / manfaat terapi di ICU pada golongan ini sangat kecil.</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3" width="60%"></td>
                            <td class="no__border" colspan="2" align="right">Tangerang, <b><?php echo @date('d/m/Y'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>
                            <td class="no__border" width="50%" align="center">
                                Dokter DPJP <br><br>
                                <?php if($print_icu->ttd_dokter_dpjp): ?>
                                    <img src="<?= resource_url().'images/ttd_dokter/'.$print_icu->ttd_dokter_dpjp; ?>" alt="ttd-dokter" width="250">
                                <?php else: ?>
                                    <br><br><br>
                                <?php endif ?>
                                <br><br>
                                (<b><?= $print_icu->nama_dokter; ?> </b>) <br>
                                <font size="1rem">Nama jelas dan tanda tangan</font>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-111-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
