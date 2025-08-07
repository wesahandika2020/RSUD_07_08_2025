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
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                    Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
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
                        <p class="identity">: <b><?= $skrining_resiko_jatuh_rajal->nama_pasien; ?></b></p>
                        <p class="identity">: <b><?= $skrining_resiko_jatuh_rajal->id_pasien; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($skrining_resiko_jatuh_rajal->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= $skrining_resiko_jatuh_rajal->kelamin; ?></b></p>
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
                <h1>Skrining Risiko Jatuh Rawat Jalan</h1>
                <table class="small__font">
                    <thead>
                        <tr>
                            <td colspan="3">
                                <h4>Beri Tanda checklist "&#10003;" satu atau lebih pada pertanyaan
                                    sederhana dibawah ini,
                                    <b>JIKA TERISI SALAH SATU</b> maka pasien termasuk <b> RESIKO
                                        JATUH</b>
                                </h4>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bold">No.</td>
                            <td class="bold" align="center">Keterangan</td>
                            <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                        </tr>
                        <tr>
                            <td width="1%">1.</td>
                            <td width="20%">Pasien anak < 2 tahun</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_1 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">2.</td>
                            <td width="20%">Pasien Geriatri (usia > 60 Tahun)</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_2 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">3.</td>
                            <td width="20%">Pasien dengan alat bantu jalan tongkat</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_3 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">4.</td>
                            <td width="20%">Pasien dengan alat bantu kursi roda</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_4 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">5.</td>
                            <td width="20%">Pasien dengan alat bantu brangkar</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_5 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">6.</td>
                            <td width="20%">Pasien Jadwal Opeasi rawat Jalan <i>One day care</i>
                                (ODC)</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_6 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">7.</td>
                            <td width="20%">Pasien mendapatkan obat anestesi/sedasi</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_7 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">8.</td>
                            <td width="20%">Pasien gangguan keseimbangan</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_8 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">10.</td>
                            <td width="20%">Pasien khawatir jatuh</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_9 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">10.</td>
                            <td width="20%">Pasien merasa tidak stabil saat berdiri/jalan</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_10 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">11.</td>
                            <td width="20%">Pasien Riwayat jatuh satu tahun terakhir</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_11 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">12.</td>
                            <td width="20%">Pasien gangguan penglihatan</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_12 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">13.</td>
                            <td width="20%">Pasien rencana pemeriksaan penunjang dengan zat kontras
                                (contoh CT scan kontras, BNO IVP, dll)</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_13 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">14.</td>
                            <td width="20%">Pasien Klinik Rehabilitasi Medik</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_14 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">15.</td>
                            <td width="20%">Pasien Hemodialisis Rawat Jalan</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->check_15 == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font">
                    <thead>
                        <tr>
                            <th colspan=" 3">
                                <h4><u><b>Kategori Risiko Jatuh</b></u> (Pilih Salah Satu)
                                </h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bold">No.</td>
                            <td class="bold" align="center">Keterangan</td>
                            <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                        </tr>
                        <tr>
                            <td width="1%">1.</td>
                            <td width="20%">Risiko Jatuh</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->resiko_jatuh == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">2.</td>
                            <td width="20%">Tidak Risiko Jatuh</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->tidak_resiko_jatuh == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font">
                    <thead>
                        <th colspan="3">
                            <h4><u><b>UPAYA PENCEGAHAN RISIKO JATUH</b></u> (ISI JIKA PASIEN RESIKO
                                JATUH)
                            </h4>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bold" width=" 1%">No.</td>
                            <td class="bold" align="center">Keterangan</td>
                            <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                        </tr>
                        <tr>
                            <td width="1%">1.</td>
                            <td width="20%">Menempelkan stiker Risiko Jatuh</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->stiker == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">2.</td>
                            <td width="20%">Memberikan edukasi tentang Risiko Jatuh ke pasien maupun
                                pengantar :</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->edukasi_resiko_jatuh == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%">3.</td>
                            <td width="20%">Memberikan edukasi tentang Lokasi maupun situasi yang
                                memiliki potensial penyebab Risiko Jatuh :</td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->edukasi_lokasi == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>A. Klinik Rehabilitasi Medik</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>B. Tempat bermain anak</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>C. Tanggal dan selasar</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>D. Tempat dengan penerangan kurang</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>E. Toilet</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%">4.</td>
                            <td width="20%">Memberikan edukasi tentang upaya pencegahan Risiko Jatuh
                            </td>
                            <td width="10%" align="center">
                                <?= $skrining_resiko_jatuh_rajal->edukasi_pencegahan == 1 ? '&#10003;' : ''; ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>A. Gunakan alas kaki yang tidak licin</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>B. Gunakan alat bantu (jika diperlukan) saat mobilisasi
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>C. Pastikan pengantar selalu mendampingi pasien resiko
                                jatuh</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>D. Jika akan meninggalkan pasien pastikan pasien dalam
                                kondisi aman untuk ditinggalkan dan tidak sedang berada di lokasi
                                potensial risiko jatuh</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>E. Perhatikan petunjuk symbol risiko jatuh di setiap
                                lokasi di RS, tingkatkan kewaspadaan saat dilokasi yang terdapat
                                symbol risiko jatuh </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>F. Perhatikan instruksi petugas saat akan melakukan
                                terapi/tindakan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>G. Perhatikan tata cara penggunaan alat saat
                                terapi/tindakan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>H. Perhatikan penjelasan petugas tentang pemberian obat
                                yang memiliki efek sedasi/anestesi</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>I. Laporkan kepada petugas jika muncul efek samping
                                akibat pemberian zat kontras maupun obat-obatan saat tidakan saat
                                tindakan di instalasi Rawat Jalan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>J. Selama masih di lingkungan rumah sakit tidak
                                diperbolehkan melepas stiker risiko jatuh agar petugas maupun
                                pengunjung yang lain dapat saling mengawasi</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td>K. Panggil petugas jika membutuhkan bantuan</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <table class="small__font">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <h4><b>YANG MELAKUKAN SKRINING</b>
                                </h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">Tanggal & Jam</td>
                            <td align="center">Nama Petugas</td>
                            <td align="center">Tanda Tangan</td>
                        </tr>
                        <tr>
                            <td align="center" style="height: 4rem;">
                                <?= date("d/m/Y - H:i", strtotime($skrining_resiko_jatuh_rajal->tanggal_skrining)); ?>
                            </td>
                            <td align="center">
                                <?= $skrining_resiko_jatuh_rajal->nama_petugas; ?>
                            </td>
                            <td align="center"></td>
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