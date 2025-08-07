<meta charset="UTF-8">
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
        <section class="surat__persetujuan__rawat__inap">
            <br>
            <div class="surat__persetujuan__rawat__inap__container container border no__radius">
                <table class="no__border small__font">
                    <tbody>
                        <tr>
                            <td class="table__big-title no__border" colspan="4" align="center">SURAT PERSETUJUAN RAWAT INAP</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Saya yang bertanda tangan dibawah ini: </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Nama</td>
                            <td class="no__border" colspan="2">: <?= $ttd_pasien_name; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Tanggal Lahir</td>
                            <td class="no__border" colspan="2">: <?= $ttd_pasien_tgl_lahir; ?></td>
                        </tr>

                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Jenis Kelamin</td>
                            <td class="no__border" colspan="2">: <?= $ttd_pasien_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Alamat</td>
                            <td class="no__border" colspan="2">: <?= $ttd_pasien_alamat; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Bukti diri / KTP</td>
                            <td class="no__border" colspan="2">: <?= $ttd_pasien_nik; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Menyatakan dengan sesungguhnya bahwa saya telah mendapat penjelasan dari dokter dan mengerti mengenai pentingnya dilakukan perawatan atas kondisi pasien saat ini, sehingga dengan demikian saya menyatakan :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">PERSETUJUAN RAWAT INAP</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Terhadap diri <?= $ttd_pasien_title; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Nama Pasien</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Umur / Tgl Lahir</td>
                            <td class="no__border" colspan="2">: <b><?= createUmur2($pasien->tanggal_lahir) ?> / <?= datefmysql($pasien->tanggal_lahir); ?></b></td>
                        </tr>

                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Jenis Kelamin</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Alamat</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->alamat; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Bukti diri / KTP</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->no_identitas; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">Dirawat di</td>
                            <td class="no__border" colspan="2">: <b><?= $dirawat_di;; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="15%">No. Rekam Medis</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->no_rm; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="no__border small__font">
                    <tbody>
                        <tr>
                            <td class="no__border" colspan="4">Tanggal : <b><?php echo @date('d/m/Y'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="30%" align="center">
                                Saksi-Saksi <br><br><br><br><br><br><br><br>
                            </td>
                            <td class="no__border" width="30%" align="center">
                                Yang membuat persetujuan <br><br><br><br><br><br><br><br>
                            </td>
                            <td class="no__border" width="30%" align="center">
                                Dokter yang merawat <br><br><br><br><br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="30%" align="center">
                                1. (<?= $saksi ?>) <br> Nama Jelas & Tandatangan
                            </td>
                            <td class="no__border" width="30%" align="center">
                                (<?= $ttd_pasien_name ?>) <br> Nama Jelas & Tandatangan
                            </td>
                            <td class="no__border" width="30%" align="center">
                                (.................................................) <br> Nama Jelas & Tandatangan
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="10%"></td>
                            <td class="no__border" width="30%" align="center">
                                <br><br><br><br><br><br><br> 2. (.................................................) <br> Nama Jelas & Tandatangan
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
            <p class="page__number">FORM-REM-11-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
