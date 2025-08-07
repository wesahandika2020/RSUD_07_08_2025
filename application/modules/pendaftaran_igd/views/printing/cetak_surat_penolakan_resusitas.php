<!-- // PRDNR -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
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
                        <p class="identity">: <b><?= $pasien->nama; ?></b></p>
                        <p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>                
            </div>
        </div>
    </header>
    <main class="main">
        <section class="information">
			<br>
            <div class="information__container container">
                <p class="section__subtitle">Tanggal / Jam : <b><?= date("d/m/Y H:i"); ?></b></p>
                <table class="small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="5">PEMBERIAN INFORMASI</th>
                        </tr>

                        <tr>
                            <th class="table__title" colspan="2" align="left">Dokter Pelaksana Tindakan</th>
                            <th colspan="3"><b><?= $ttd_pelaksana_dokter?></b></th>
                        </tr> 
                        
                        <tr>
                            <th class="table__title" colspan="2" align="left">Pemberi Informasi</th>
                            <th colspan="3"><b><?= $ttd_pemberi_dokter; ?></b></th>                          
                        </tr>

                        <tr>
                            <th class="table__title" colspan="2" align="left">Penerima Informasi*</th>
                            <th colspan="3"><b><?= $ttd_penerima_informasi; ?></b></th>                            
                        </tr>

                        <tr>
                            <th></th>
                            <th class="table__title">JENIS INFORMASI</th>
                            <th class="table__title" colspan="2">ISI INFORMASI</th>
                            <th class="table__title">TANDA (v)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center" width="5%">1</td>
                            <td width="30%">Diagnosis Kerja & Diagnosis Banding (WD & DD)</td>
                            <td colspan="2" width="50%"><?= $ttd_diagnosis; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_1 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">2</td>
                            <td width="30%">Alasan DNR</td>
                            <td colspan="2" width="50%"><?= $ttd_alasan; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_2 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">3</td>
                            <td width="30%">Tata Cara <br> <i> Uraian Singkat prosedur dan tahapan yang penting</i></td>
                            <td colspan="2" width="50%"><?= $ttd_tata; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_3 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">4</td>
                            <td width="30%">Tujuan</td>
                            <td colspan="2" width="50%"><?= $ttd_tujuan; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_4 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">5</td>
                            <td width="30%">Risiko dan Komplikasi</td>
                            <td colspan="2" width="50%"><?= $ttd_risiko; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_5 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">6</td>
                            <td width="30%">Prognosis <br> <i>Prognosis vital, prognosis fungsi dan prognosis kesembuhan</td>
                            <td colspan="2" width="50%"><?= $ttd_prognosis; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_6 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">7</td>
                            <td width="30%">Alternatif & Resiko <br> <i> Pilihan Pengobatan/Pelaksanaan</td>
                            <td colspan="2" width="50%"><?= $ttd_alternatif; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_7 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">8</td>
                            <td width="30%">Hal lain yang akan dilakukan <br> <i> untuk menyelamatkan pasien perluasan tindakan konsultasi selama tindakan Resusitas</td>
                            <td colspan="2" width="50%"><?= $ttd_hal; ?></td>
                            <td width="15%" align="center"><?= $ttd_tanda_8 == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="small__font">
                    <tfoot>
                        <tbody>
                            <tr>
                                <td colspan="3">Dengan ini menyatakan bahwa saya telah menerangkan hal-hal diatas secara benar dan jelas dan memberikan kesempatan untuk bertanya atau berdiskusi</td>
                                <td>
                                    <center>Tandatangan (Dokter)<br> <br> <br> <br>
                                        <font size="0.625rem">(<b><?= $ttd_pelaksana_dokter; ?></b>)</font>
                                    </center>
                                </td>
                            </tr>                    
                            <tr>
                                <td colspan="3">Dengan ini menyatakan bahwa saya telah menerima informasi sebagaimana diatas yang saya beri tanda / parah di kolom kanannya, dan telah memahaminya</td>
                                <td>
                                    <center>Tandatangan (Keluarga/Pasien) <br> <br> <br> <br>
                                        <font size="0.625rem">(<b><?= $ttd_penerima_informasi; ?> </b>)</font>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">*Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima
                                    informasi adalah wali atau keluarga terdekat</td>
                            </tr>
                        </tbody>
                    </tfoot>

                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-REM-113-00</p>
        </section>
    </main>
</body>
<?php die; ?>