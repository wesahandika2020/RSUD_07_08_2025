<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- // SKKJ2 -->
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
        <section class="form__skkj_2">
            <div class="form__skkj_2__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                <!-- <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;"> -->
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN KESEHATAN JIWA</th>
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5">Nomor:445/<?=$skkj_2->no_surat_skkj_2;?>-IRJ/<?= date("Y"); ?></th>
                        </tr>                                           
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Yang bertandatangan di bawah ini menerangkan bahwa :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $detailPendaftaran->nama_pasien; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Tanggal Lahir</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= datefmysql($skkj_2->tanggal_lahir); ?></td>
                            <!-- <td class="no__border" width="60%"><b><!?= $detailPendaftaran->tanggal_lahir; ?></b></td> -->
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Jenis Kelamin</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $detailPendaftaran->kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="20%">Alamat</td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" width="60%"><?= $detailPendaftaran->alamat; ?> NO <?= $detailPendaftaran->norumah; ?> RT<?= $detailPendaftaran->rt; ?>/RW<?= $detailPendaftaran->rw; ?>, KEC.<?= $detailPendaftaran->kec; ?>, KEL.<?= $detailPendaftaran->kel; ?>, <?= $detailPendaftaran->kab; ?>, <?= $detailPendaftaran->prop; ?></td>
                        </tr>                         
                    </tbody>
                </table>
                <br>
                <table id="validd-1" class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <?php if (!empty($skkj_2->valid_1)): ?>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Berdasarkan pemeriksaan klinis dan MMPI pada nama tersebut diatas, saat ini tidak ditemukan adanya gejala gangguan jiwa (psikopatologi) yang bermakna yang dapat mengganggu fungsi intelektual dan aktivitas sehari-sehari. Dalam situasi tertentu yang membuat terperiksa tidak nyaman, suasana perasaan terperiksa cenderung dapat mudah terpengaruh.</td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Surat keterangan ini dibuat sebagai <b><?= $skkj_2->keterangan; ?></b> dan tidak dapat digunakan untuk kepentingan hukum lainnya. Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</td>                    
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Surat ini berlaku selama 3 bulan terhitung sejak tanggal dikeluarkan.</td>                    
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr> 
                    <?php endif; ?>
                </table>
               <!-- <br> -->
               <table id="validd-2" class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <?php if (!empty($skkj_2_2->valid_2)): ?>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Hasil test MMPI tidak dapat diinterprestasi. Berdasarkan pemeriksaan wawancara klinis saat ini tidak ditemukan adanya gejala gangguan jiwa (psikopatologi) yang bermakna yang dapat mengganggu fungsi intelektual dan aktivitas sehari-sehari. Namun pada situasi tertentu yang membuat terperiksa merasa tidak nyaman, suasana emosi terperiksa cenderung dapat terpengaruh.</td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Surat keterangan ini dibuat sebagai <b><?= $skkj_2_2->keterangan; ?></b> dan tidak dapat digunakan untuk kepentingan hukum lainnya. Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</td>                    
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Surat ini berlaku selama 3 bulan terhitung sejak tanggal dikeluarkan.</td>                    
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr> 
                    <?php endif; ?>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <br>              
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="5%" align="center">
    
                        </td>
                        <td class="no__border" width="5%" align="center">
                          
                        </td>
                        <td class="no__border" width="5%" align="center">
                            <!-- Kota Tangerang, <b><!?= datefmysql($skkj_2->tanggal_skkj_2); ?></b></td> -->
                            Tangerang, 
                            <?php
                            // Tanggal dalam format MySQL (YYYY-MM-DD)
                            $tanggal_mysql = $skkj_2->tanggal_skkj_2;

                            // Mengonversi tanggal ke format yang diinginkan
                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));

                            // Mengonversi bulan dalam bahasa Inggris ke bahasa Indonesia
                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );

                            // Menambahkan digit nol di depan tanggal jika hanya satu digit
                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);

                            // Tampilkan hasilnya
                            echo "<b>$tanggal_diinginkan</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                            Medical Check Up
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                            RSUD Kota Tangerang
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><br><br><p></p>(<b><u><?= $skkj_2->nama_dokter;?></b></u>) <b> <br><?=$skkj_2->nrptt_nip;?>. <?=$skkj_2->nip_dokter;?><b/></font>
                        </td>
                    </tr>
                </table>
            </div>           
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-KEP-94a-00</p>
        </section>
    </main>
</body>
<?php die; ?>



   












               

        
