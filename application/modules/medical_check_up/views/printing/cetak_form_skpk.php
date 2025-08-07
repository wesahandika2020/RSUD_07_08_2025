<!-- // SKPK -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <thead>
                    <tr>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="80px" height="80px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH
                                KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="80px" height="80px">
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
    <main class="main">
        <section class="form__skpk">
			<br>
            <div class="form__skpk__container container">
                <table class="no__border small__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN PENGUJIAN KESEHATAN</th>                         
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5" >NO.<?=$form_skpk->no_surat;?>-MCU-RSUDKT/<?= date("Y"); ?></th>
                        </tr>                   
                    </thead>                   
                    <tbody>
                         <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Dokter Penguji Tersendiri / Tim Penguji Kesehatan / Tim Khusus Penguji Pegawai Negeri Sipil RSUD KOTA TANGERANG yang ditetapkan berdasarkan Surat Keputusan Menteri Kesehatan No. KP.01.2/4.2/1126/2014 Tanggal 14 April 2014 yang anggota-anggotanya dalam hal ini telah menjalankan tugasnya dengan mengingat sumpah (janji) yang diucapkan mereka pada waktu menerima jabatannya, menerangkan bahwa :</td>
                        </tr>



                        
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NAMA</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->nama; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NAMA KECIL</td>
                            <td class="no__border" colspan="3">: <b><?=  $form_skpk->nama_kecil; ?></b></td>
                        </tr>   
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NIP</td>
                            <td class="no__border" colspan="3">: <b><?= $form_skpk->nip; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">PEKERJAAN</td>
                            <!-- <td class="no__border" colspan="3">: <b><!?= $pasien->pekerjaan; ?></b></td> -->
                            <td class="no__border" colspan="3">: <b>PEGAWAI NEGERI SIPIL</b></td>
                        </tr>                        
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">GOL. RUANG</td>
                            <td class="no__border" colspan="3">: <b><?= $form_skpk->gol_ruang_skpk; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">KARPEG</td>
                            <td class="no__border" colspan="3">: <b><?= $form_skpk->karpeg; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">ALAMAT</td>
                            <td class="no__border" colspan="3">: 
                                <b>
                                    <?= $pasien->alamat; ?> RT. <?= $pasien->no_rt; ?> / RW. <?= $pasien->no_rw; ?>, 
                                    <?php if (!empty($pasien->no_rumah)) : ?>
                                        NO <?= $pasien->no_rumah; ?>, 
                                    <?php endif; ?>
                                    KEL.<?= $pasien->kelurahan; ?>, KEC.<?= $pasien->kecamatan; ?>, KAB.<?= $pasien->kabupaten; ?>, PROVINSI. <?= $pasien->provinsi; ?>
                                </b>
                            </td>
                        </tr>

                        <tr>
                            <td class="no__border"  align="justify" colspan="4"><br>Telah diperiksa atas surat permintaan dari <b><?= $form_skpk->telah_diperiksa; ?>  
                            Tanggal, 
                            <?php
                                $tanggal_mysql = $form_skpk->tanggal_diperiksa_skpk;

                                $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));

                                $tanggal_diinginkan = str_replace(
                                    ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                    ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                    $tanggal_diinginkan
                                );

                                $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);

                                echo "<b>$tanggal_diinginkan</b>";
                            ?>
                            </b> dan berpendapat, bahwa yang diperiksa : </td>
                        </tr>


                        <tr>
                            <td class="no__border"  align="justify" colspan="4"><b>Kesimpulan :</b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border"  align="justify" colspan="4">Memenuhi syarat untuk semua jenis pekerjaan pada umumnya.</td>
                        </tr>      
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border"  align="justify" colspan="4">Memenuhi syarat untuk jenis pekerjaan tertentu.</td>
                        </tr>  
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" align="justify" colspan="4">Dapat diterima dengan bersyarat untuk (a) dan (b) tersebut di atas (c) dengan pengobatan.</td>
                        </tr> 
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border"  align="justify" colspan="4">Untuk sementara belum memenuhi syarat kesehatan dan memerlukan pengobatan/perawatan dan ujian kesehatan diulang setelah selesai pengobatan/perawatan atau ditolak sementara.</td>
                        </tr>    
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">e.</td>
                            <td class="no__border"  align="justify" colspan="4">Tidak memenuhi syarat untuk menjalankan tugas sebagai Pegawai Negeri Sipil (PNS)</td>
                        </tr>
                        <tr>
                            <td class="no__border"  align="justify" colspan="4"><br>Hasil pengujian kesehatan ini diberikan atas nama Tim Penguji Kesehatan (Peraturan Pengujian Kesehatan No. 143/menkes/per/VII/77 Tanggal 1 Juli 1997).</td>
                        </tr>  

                        <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                            <tr>
                                <td class="no__border" colspan="4"><br>Salinan Hasil Keputusan Pengujian Kesehatan Dikirimkan kepada :</td>
                            </tr>

                            <tr>
                                <td class="no__border" width="1%" align="left">
                                    <ol style="padding-left: 20px; margin: 0;">
                                        <li style="margin-bottom: 8px;"><?= $form_skpk->salinan_hasil_satu; ?></li>
                                        <li style="margin-bottom: 8px;"><?= $form_skpk->salinan_hasil_satu; ?></li>
                                        <li style="margin-bottom: 8px;"><?= $form_skpk->salinan_hasil_satu; ?></li>
                                        <li style="margin-bottom: 8px;">Arsip.</li>
                                    </ol>
                                </td>
                                <td class="no__border" width="3%" align="center"></td>
                                <td class="no__border" width="3%" align="center">
                                    Kota Tangerang, 
                                    <b><?php
                                    $tanggal_mysql = $form_skpk->tanggal_surat;
                                    $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                                    $tanggal_diinginkan = str_replace(
                                        ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                        ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                        $tanggal_diinginkan
                                    );
                                    $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                                    echo "$tanggal_diinginkan";
                                    ?></b>
                                    <div style="display: block; margin-bottom: 5px;"></div>
                                    Ketua Tim Penguji Kesehatan
                                    <div style="display: block; margin-bottom: 5px;"></div>
                                    RSUD KOTA TANGERANG
                                </td>
                            </tr>
                            <tr>
                                <td class="no__border"  align="center"></td>
                                <td class="no__border" align="center"> 
                                </td>
                                <td class="no__border"  align="center">
                                    <br><br><br><br><b>
                                        <u>( <?= $form_skpk->nama_dokter;?> )</u> <br> NIP.<?= $form_skpk->nip_dokter;?></font> 
                                </td>
                            </tr>
                        </table>

                        <!-- <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                            <tr>
                                <td class="no__border" colspan="4"><br>Salinan Hasil Keputusan Pengujian Kesehatan Dikirimkan kepada :</td>
                            </tr>
                            <tr>
                                <td class="no__border" width="1%">1.</td>
                                <td class="no__border" colspan="2"><?= $form_skpk->salinan_hasil_satu; ?></td>  
                            </tr>  
                            <tr>
                                <td class="no__border" width="1%">2.</td>
                                <td class="no__border" colspan="2"><?= $form_skpk->salinan_hasil_dua; ?></td>
                            </tr> 
                            <tr>
                                <td class="no__border" width="1%">3.</td>
                                <td class="no__border" colspan="2"><?= $form_skpk->salinan_hasil_tiga; ?></td>
                            </tr>
                            <tr>
                                <td class="no__border" width="1%">4.</td>
                                <td class="no__border" colspan="2">Arsip</td>
                            </tr>
                        </table> -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-118-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
