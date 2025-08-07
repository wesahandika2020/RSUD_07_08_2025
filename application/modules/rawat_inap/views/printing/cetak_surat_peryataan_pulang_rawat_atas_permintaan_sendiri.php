<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
    <!--=============== HEADER =============== SPPRAPS WH-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
            </div>
            <div class="header__container-identity border section">
                <div class="identity__section grid">
                    <div class="identity__section-title">
                        <p class="identity">Nama Lengkap</p>
                        <p class="identity">No. Rekam Medik</p>
                        <p class="identity">Tanggal Lahir</p>
                        <p class="identity">Jenis Kelamin</p>
                    </div>
                    <div class="identity__section-subtitle">
                        <p class="identity">: <b><?= $surat_peryataan_pulang->nama_pasien; ?></b></p>
                        <p class="identity">: <b><?= $surat_peryataan_pulang->id_pasien; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($surat_peryataan_pulang->tanggal_lahir_pasien); ?></b></p>
                        <p class="identity">: <b><?= $surat_peryataan_pulang->kelamin_pasien; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=============== MAIN ===============-->
    <main class="main" style="margin: 1rem;">
        <section class="form__skpk">
            <div class="form__skpk__container container">
                <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;">
                    <thead>
                        <br>
                        <tr>
                            <b style="font-size: 15pt; display: flex; justify-content: center">SURAT PERYATAAN PULANG RAWAT</b>
                        </tr>
                        <tr>
                            <b style="font-size: 15pt; display: flex; justify-content: center">ATAS PERMINTAAN SENDIRI (APS)</b>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Nama</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_name; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Tgl. Lahir</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_tgl_lahir; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Umur</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_umur; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Alamat</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_alamat; ?>, <?= !empty($ttd_pasien_rt) ? 'RT.' . $ttd_pasien_rt : ''; ?><?= !empty($ttd_pasien_rw) ? ' / RW.' . $ttd_pasien_rw : ''; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">RT</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_rt; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">RW</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_rw; ?></td>
                        </tr> -->

                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Kelurahan/Desa</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> <?= $ttd_pasien_kelurahan; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Kecamatan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> <?= $ttd_pasien_kecamatan; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Kota/Kab</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> <?= $ttd_pasien_kota; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Nomor KTP/SIM</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_ktp; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Nomor Telp/HP</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_tlp; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="no__border"></td>
                        </tr>
                        <tr>
                            <?php
                            $mewakili = '';
                            if ($ttd_pasien_dirisendiri == '1') {
                                $mewakili = 'DIRI SENDIRI';
                            } else if ($ttd_pasien_dirisendiri == '2') {
                                $mewakili = 'SUAMI';
                            } else if ($ttd_pasien_dirisendiri == '3') {
                                $mewakili = 'ISTRI';
                            } else if ($ttd_pasien_dirisendiri == '4') {
                                $mewakili = 'ANAK';
                            } else if ($ttd_pasien_dirisendiri == '5') {
                                $mewakili = 'ORANG TUA';
                            } else if ($ttd_pasien_dirisendiri == '6') {
                                $mewakili = 'WALI';
                            } else if ($ttd_pasien_dirisendiri == '7') {
                                $mewakili = 'KELUARGA';
                            }
                            ?>
                            <td class="no__border"></td>
                            <td colspan="3" class="no__border" width="100%">Dalam hal ini bertindak atas nama atau mewakili <?= $mewakili ?></td>
                            <!-- <td class="no__border" width="1%"></td> -->
                            <!-- <td class="no__border"><?= $ttd_pasien_dirisendiri; ?></td> -->
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Nama</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_namee; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Nomor Rekam Medis</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_nomor; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Tgl. Lahir</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_tgl_lahirr; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Umur</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_umurr; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_kelaminn; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Kelas / Kamar</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_kamar; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Dokter yang merawat</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_peryataan_pulang->dokter_1; ?></td>
                        </tr>
                         <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="25%">Alasan (APS)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_alasanaps_sppraps; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <tr>
                    <thead>
                        <tr>
                            <td>
                                Atas permintaan sendiri pulang / keluar dari perawatan di RSUD Kota Tangerang, Kami bertanggung jawab atas segala akibat yang mungkin terjadi atas kesehatan pasien tersebut diatas, oleh karena menurut dokter belum boleh pulang / keluar dari perawatan di RSUD Kota Tangerang.
                            </td>
                        </tr>
                    </thead>
                </tr>
                <tr></tr>
                <td><br><br><br><br>
                    <tr>
                        <table class="no__border big__line__spacing small__font">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="no__border" width="45%" align="center" style="padding: 0;">
                                    </td>
                                    <td class="no__border" width="45%" align="center" style="padding: 0;">
                                        Tangerang, <?= date('H:i', strtotime($surat_peryataan_pulang->tanggal_dokter_sppraps)) . ' ' . date('d/m/Y', strtotime($surat_peryataan_pulang->tanggal_dokter_sppraps)) ?>
                                    </td>
                                </tr>
                                <!-- datetimefmysql   strtotime-->
                                <tr>
                                    <td class="no__border" align="center" style="padding: 0;">
                                        Dokter yang merawat
                                    </td>
                                    <td class="no__border" align="center" style="padding: 0;">
                                        Yang membuat peryataan,
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                    <td class="no__border" align="center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center">(<b style="text-transform:uppercase"><?= $surat_peryataan_pulang->dokter_1; ?></b>) <br>
                                        <font size="1rem">Nama jelas dan tanda tangan</font>
                                    </td>
                                    <td class="no__border" align="center">(<b><?= $surat_peryataan_pulang->ttd_pasien_sppraps; ?></b>) <br>
                                        <font size="1rem">Nama jelas dan tanda tangan Pasien/Keluwarga</font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
            </div>
            <br>
            <p class="page__number">FORM-PMD-09-01</p>
        </section>
    </main>
</body>
<?php die; ?>