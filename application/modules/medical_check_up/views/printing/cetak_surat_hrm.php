<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>
<!-- onload ada di dalam body -->
<!-- onload="window.print()" -->

<body onload="window.print()">
    <!--=============== HEADER ===============-->

    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <thead>
                    <tr>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="70px" height="70px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH
                                KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="70px" height="70px">
                        </td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">RUMAH SAKIT UMUM
                                DAERAH</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">KOTA
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
    <main class="main" style="margin: 1rem;">
        <section class="form__skpk">
            <div class="form__skpk__container container">
                <table class="no__border small__line__spacing small__font">
                    <tr>
                        <td class="no__border">NO. REKAM MEDIS</td>
                        <td class="no__border">: <?= $resume_medis->no_rm; ?></td>
                        <td class="no__border">STATUS</td>
                        <td class="no__border">: <?= $resume_medis->status_kawin; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border">NAMA</td>
                        <td class="no__border">: <?= $resume_medis->nama_pasien; ?></td>
                        <td class="no__border">PEKERJAAN</td>
                        <td class="no__border">: <?= $resume_medis->nama_pekerjaan; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border">JENIS KELAMIN</td>
                        <td class="no__border">: <?= $resume_medis->jenis_kelamin; ?>
                        </td>
                        <td class="no__border">UNIT KERJA</td>
                        <td class="no__border">: <?= $resume_medis->mcu_unit_kerja; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border">TEMPAT/TGL. LAHIR</td>
                        <td class="no__border">:
                            <?= $resume_medis->tempat_lahir; ?> <?= datefmysql($resume_medis->tanggal_lahir); ?></td>
                        <td class="no__border">TGL PEMERIKSAAN</td>
                        <td class="no__border">: <?= $resume_medis->tanggal_daftar; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border">AGAMA</td>
                        <td class="no__border">: <?= $resume_medis->agama; ?></td>
                        <td class="no__border">KEPERLUAN</td>
                        <td class="no__border">: <?= $resume_medis->keperluan; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border">ALAMAT</td>
                        <td class="no__border" colspan="3">: <?= $resume_medis->alamat_pasien; ?></td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th class="table__big-title bordered" colspan="5">
                                <b style="font-size: 18pt;">HASIL RESUME MEDICAL CHECK UP</b>
                            </th>
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
                            <td class="no__border" width="1%"><b>A.</b></td>
                            <td class="no__border" colspan="3"><b>ANAMNESA</b></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">1.Keluhan Saat Ini</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->keluhan_utama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">2. RPD (Riwayat Penyakit Terdahulu)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->riwayat_penyakit_dahulu; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">3. RPD (Riwayat Penyakit Keluarga)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->riwayat_penyakit_keluarga; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"><b>B.</b></td>
                            <td class="no__border" colspan="3"><b>PEMERIKSAAN FISIK</b></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Tinggi Badan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->tinggi_badan; ?> Cm</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Berat Badan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->berat_badan; ?> Kg</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">BMI</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <?php 
                                if ($resume_medis->berat_badan !== null && $resume_medis->tinggi_badan !== null) {
                                    echo number_format($resume_medis->berat_badan / (($resume_medis->tinggi_badan / 100) ** 2), 4, '.', '');
                                }
                                ?>Kg/m²
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Tekanan Darah</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->tensi_sistolik; ?>/<?= $resume_medis->tensi_diastolik; ?> mmhg</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Nadi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->nadi; ?> x/m</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Respirasi</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->rr; ?> x/m</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Kepala</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->kepala; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Kulit</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->kulit_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Mata</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mata; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Persepsi warna</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_persepsi_warna; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Visus Jauh (Kacamata)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> OD : <?= $resume_medis->mcu_jauh_od; ?> &nbsp;&nbsp; OS : <?= $resume_medis->mcu_jauh_os; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Visus Dekat</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> OD : <?= $resume_medis->mcu_dekat_od; ?> &nbsp;&nbsp; OS : <?= $resume_medis->mcu_dekat_os; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Konjungtiva </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_konjungtiva; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Sklera </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_sklera; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Komea </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_komea; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Telinga </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->telinga; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Hidung </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->hidung; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Tenggorokan </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->tenggorok; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Gigi dan Mulut </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_gdm; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Leher </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->leher; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Dada </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->thorax; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Jantung </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->mcu_jantung; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Paru-paru </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->pulmo; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Abdomen </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->abdomen; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Anggota Gerak </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->ekstrimitas; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"><b>C.</b></td>
                            <td class="no__border" width="35%"><b>PEMERIKSAAN PENUNJANG</b> </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $resume_medis->pemeriksaan_penunjang; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"><b>D.</b></td>
                            <td class="no__border" width="35%"><b>Kesimpulan</b> </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= nl2br($resume_medis->kritik); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"><b>E.</b></td>
                            <td class="no__border" width="35%"><b>Saran</b> </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= nl2br($resume_medis->saran); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"><b>f.</b></td>
                            <td class="no__border" width="35%"><b>Status Kesehatan</b> </td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= nl2br($resume_medis->mcu_status_kesehatan); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">
                            <td class="no__border" style="text-align: center; padding-top: 2rem;">Tangerang, <?= $resume_medis->mcu_tanggal_surat; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" style="text-align: center;">Dokter Medical Check Up</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" style="text-align: center;">RSUD Kota Tangerang</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" style="text-align: center; padding-top: 5rem;"><b><u><?= $resume_medis->nama_dokter; ?></u></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" style="text-align: center;"><b>NIP. <?= $resume_medis->nip_dokter; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-MCU-21-00</p>
        </section>
    </main>
</body>
<?php die; ?>