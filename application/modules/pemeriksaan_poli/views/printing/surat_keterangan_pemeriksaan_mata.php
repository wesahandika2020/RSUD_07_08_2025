<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER =============== // SKPM-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
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
                            <b style="font-size: 15pt; display: flex; justify-content: center">SURAT KETERANGAN PEMERIKSAAN MATA</b>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                        <br>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Nama</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_name; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">No. RM</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_nomor;?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Usia</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_umur; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">No. KTP</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_ktp; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Alamat</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_alamat; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Nomor Telp/HP</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $ttd_pasien_tlp; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Telah dilakukan pada matanya dengan hasil</td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">1. Tajam Pengelihatan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_keterangan_pemeriksaan_mata->tajam_pengelihatan_skpm; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">&nbsp;&nbsp;&nbsp;&nbsp;Mata Kanan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <?= $surat_keterangan_pemeriksaan_mata->mata_kanan_skpm ;?>
                                <?= $surat_keterangan_pemeriksaan_mata->tanpa_kacamata_kanan_skpm== '1' ? ' (dengan kacamata)' : ' (tanpa kacamata)'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">&nbsp;&nbsp;&nbsp;&nbsp;Mata Kiri</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <?= $surat_keterangan_pemeriksaan_mata->mata_kiri_skpm; ?>
                                <?= $surat_keterangan_pemeriksaan_mata->tanpa_kacamata_kiri_skpm== '1' ? ' (dengan kacamata)' : ' (tanpa kacamata)'; ?>
                            </td>
                        </tr>
                        <tr>                           
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">2. Segment Anterior</td>
                            <td class="no__border" width="1%">:</td>                          
                            <td  class="no__border"><?= $surat_keterangan_pemeriksaan_mata->anterior_mata_kanan_skpm == '1' ? '&#128505;' : '-'; ?> Mata Kanan &nbsp;&nbsp;&nbsp;
                            <?=$surat_keterangan_pemeriksaan_mata->anterior_kanan_skpm; ?></td>
                        </tr>
                        <tr>                           
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"></td>
                            <td class="no__border" width="1%"></td>                          
                            <td  class="no__border"><?= $surat_keterangan_pemeriksaan_mata->anterior_mata_kiri_skpm == '1' ? '&#128505;' : '-'; ?> Mata Kiri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?= $surat_keterangan_pemeriksaan_mata->anterior_kiri_skpm; ?></td>
                        </tr>
                        <tr>                           
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">3. Segment Posterior</td>
                            <td class="no__border" width="1%">:</td>                          
                            <td  class="no__border"><?= $surat_keterangan_pemeriksaan_mata->posterior_mata_kanan_skpm == '1' ? '&#128505;' : '-'; ?> Mata Kanan &nbsp;&nbsp;&nbsp;
                            <?= $surat_keterangan_pemeriksaan_mata->posterior_kanan_skpm; ?></td>
                        </tr>
                        <tr>                           
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"></td>
                            <td class="no__border" width="1%"></td>                          
                            <td  class="no__border"><?= $surat_keterangan_pemeriksaan_mata->posterior_mata_kiri_skpm == '1' ? '&#128505;' : '-'; ?> Mata Kiri &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?= $surat_keterangan_pemeriksaan_mata->posterior_kiri_skpm; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">4. Pengelihatan Warna (Test Ishihara)</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_keterangan_pemeriksaan_mata->p_warna_skpm; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">5. Catatan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_keterangan_pemeriksaan_mata->catatan_skpm; ?></td>
                        </tr>
                    </tbody>
                </table>  
                <br>                               
                <tr></tr>
                <br><br><br><br><br><br><br>   
                <tr>
                <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;">
              
                <tr></tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border" width="45%" align="center">
                            Tangerang, <?= tanggal_indo($surat_keterangan_pemeriksaan_mata->tanggal_skpm, false) ?>
                            <!-- Tangerang, <!?= date('d/m/Y', strtotime($surat_keterangan_pemeriksaan_mata->tanggal_skpm)) ?> -->
                        </td>
                    </tr>
                     <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            Dokter yang memeriksa,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">( <b style="text-transform:uppercase"><?=$surat_keterangan_pemeriksaan_mata->nama_dokter_1; ?></b> ) <br><font size="1rem">Nama jelas dan tanda tangan</font></td>
                    </tr>                
                </table>
                </tr>  
            </div>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-PMD-20-00</p>
        </section>
    </main>
</body>
<?php die; ?>
