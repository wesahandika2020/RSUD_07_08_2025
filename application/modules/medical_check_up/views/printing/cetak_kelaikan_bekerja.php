<!-- // SKB -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
    .kelaikan-bekerja{
        font-size: 10pt ;
    }
</style>

<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <thead>
                    <tr>
                        <td class="no__border" rowspan="5" style="width:70px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="85px" height="85px"></td>
                        <td class="no__border" colspan="3" align="center"></td>
                        <td class="no__border" rowspan="5" style="width:70px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="85px" height="85px">
                        </td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 15pt;">RUMAH SAKIT UMUM
                                DAERAH</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 15pt;">KOTA
                                TANGERANG</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Jl.
                                Pulau Putri Raya Perumahan Modernland, Kelurahan Kelapa Indah</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Kecamatan
                                Tangerang
                                Telp. 021 2972 0201, 021
                                2972 0202</b></td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="form__skb kelaikan-bekerja">
            <div class="form__skb__container container">
                <br>
                <table width="100%" class="no__border">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border" colspan="2"><h1>SERTIFIKAT KELAIKAN BEKERJA</h1></th>
                        </tr>                                                              
                        <tr>
                            <th class="table__little-title no__border" colspan="2"><h4>NO. <?= $kb->kb_nomor_1; ?>/<?= $kb->kb_nomor_2; ?>-MCU-RSUDKT/<span id="tahun_sekarang"></span></h4></th>
                        </tr>                                                              

                    </thead>
                    <tbody>
                        <tr>
                            <tr>
                                <td class="no__border" colspan="2"> Saya yang bertanda tangan dibawah ini :</td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">Nama</td>
                                <td class="no__border">: <?= $kb->nama_dokter; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">NIP</td>
                                <td class="no__border">: <?= $kb->nip_dokter; ?></td>
                                <!-- <td class="no__border">: 197311232003122003</td> -->
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">Jabatan</td>
                                <td class="no__border">: Doker Spesialis Okupasi</td>
                            </tr>
                            <tr>
                                <td class="no__border" colspan="2">Berdasarkan permintaan dari <?= $kb->kb_permintaan_dari; ?>. Nomor <?= $kb->kb_permintaan_nomor; ?> tanggal <?= datefmysql($kb->kb_permintaan_tanggal); ?> untuk melakukan penilaian kelaikan kerja pada pekerja :</td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">a. Nama</td>
                                <td class="no__border">: <?= $kb->nama; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">b. No. Identitas</td>
                                <td class="no__border">: <?= $kb->no_identitas; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">c. Tanggl lahir</td>
                                <td class="no__border">: <?= datefmysql($kb->tanggal_lahir); ?></td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">d. Jenis Kelamin</td>
                                <td class="no__border">: <?= $kb->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td></td>
                            </tr>
                            <tr>
                                <td class="no__border"  width="23%">d. Pekerjaan</td>
                                <td class="no__border">: <?= $kb->nama_pekerjaan; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border" colspan="2">Telah dilakukan pemeriksaan berupa anamnesis, pemeriksaan fisik, pemeriksaan penunjang dan analisis pekerjaan. maka saya menyatakan bahwa yang bersangkutan :</td>
                            </tr>
                            <tr>
                                <td class="no__border" colspan="2"><?= $kb->kb_keterangan; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border" colspan="2">Sertifikat ini hanya digunakan untuk kepentingan hal tersebut diatas, dan tidak dapat digunakan untuk kepentingan lainnya</td>
                            </tr>
                        </tr>
                    </tbody>
                </table>
                <br><br><br>
                <table width="100%" class="no__border">
                <tbody>
                    <tr>
                        <td class="no__border" width="50%"></td>
                        <td class="no__border" style="text-align: center;">Tangerang, <?= datefmysql($kb->kb_tanggal); ?></td>
                    </tr>
                    <!-- <tr>
                        <td class="no__border" width="50%"></td>
                        <td class="no__border" style="text-align: center;"><br><br><br><br><br><br>
                            <u><b>dr. Sri Roslina MKK,Spok</b></u>
                        </td>
                    </tr> -->
                    <tr>
                        <td class="no__border" width="50%"></td>
                        <td class="no__border" style="text-align: center;"><br><br><br><br><br><br>
                            <u><b><?= $kb->nama_dokter; ?></b></u>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="50%"></td>
                        <td class="no__border" style="text-align: center;">
                            SIP No. <?= $kb->sip_dokter; ?>
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
            <p class="page__number">FORM-MCU-16-00</p>
        </div>
    </footer>
    <script>
        var tahunSekarang = new Date().getFullYear();
        document.getElementById('tahun_sekarang').innerText = tahunSekarang;
    </script>
</body>

<?php die; ?>
