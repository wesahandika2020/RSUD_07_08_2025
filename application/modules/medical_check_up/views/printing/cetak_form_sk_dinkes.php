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
        <section class="form__sk__dinkes">
			<br>
            <div class="form__sk__dinkes__container container">
                <table class="no__border small__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN PENGUJIAN KESEHATAN</th>
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5" ><br>NO.../...-MCU/20...</th>
                        </tr>                       
                    </thead>                   
                    <tbody>
                         <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Dokter Penguji Tersendiri / Tim Penguji Kesehatan / Tim Khusus Penguji Pegawai Negeri Sipil RSUD KOTA TANGERANG yang ditetapkanm berdasarkan Surat Keputusan Menteri Kesehatan No. KP.01.2/4.2/1126/2014 Tanggal 14 April 2014 yang anggota-anggotanya dalam hal ini telah menjalankan tugasnya dengan menginat sumpah (janji) yang diucapkan mereka pada waktu menerima jabatannya, menerangkan bahwa:</td>
                        </tr>
                        
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NAMA</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->nama; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NAMA KECIL</td>
                            <td class="no__border" colspan="3">: <b><?=  $sk_dinkes->nama_kecil; ?></b></td>
                        </tr>   
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">NIP</td>
                            <td class="no__border" colspan="3">: <b><?= $sk_dinkes->nip; ?></b></td>
                        </tr>
                        <tr>
                             <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">PEKERJAAN</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->pekerjaan; ?></b></td>
                        </tr>                        
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">GOL. RUANG</td>
                            <td class="no__border" colspan="3">: <b><?= $sk_dinkes->gol_ruang; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">KARPEG</td>
                            <td class="no__border" colspan="3">: <b><?= $sk_dinkes->karpeg; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="2" width="15%">ALAMAT</td>
                            <td class="no__border" colspan="3">: <b><?= $pasien->alamat; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border"  align="justify" colspan="4"><br>Telah diperiksa atas permintaan dari Kepala Badan Kepegawaian dan Pengembangan Sumberdaya Manusia Kota Tangerang No. 840/333 -BKPSDM/2020 tanggal <?= date("d/m/Y H:i", strtotime($pasien->tanggal_daftar)); ?>, bahwa yang diperiksa : </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border"  align="justify" colspan="4">Memenuhi Syarat untuk semua jenis pekerjaan pada umum.</td>
                        </tr>      
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border"  align="justify" colspan="4">Memenuhi syarat untuk jenis pekerjaan tertentu.</td>
                        </tr>  
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" align="justify" colspan="4">Dapat diterima dengan bersyarat untuk (a) dan (b) tsb diatas.</td>
                        </tr> 
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border"  align="justify" colspan="4">Untuk sementara belum memenuhi syarat kesehatan dan memerlukan pengobatan/perawatan dan uji kesejatan perlu diulang setalah selesai pengobatan/perawatan atau ditolak untuk sementara.</td>
                        </tr>    
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">e.</td>
                            <td class="no__border"  align="justify" colspan="4">Tidak memenugi syarat untuk menjalankan tugas sebagai Pegawai Negeri Sipil (PNS) atau ditolak.</td>
                        </tr>
                        <tr>
                            <td class="no__border"  align="justify" colspan="4"><br>Hasil pengujian kesehatan ini diberikan atas nama Tim Penguji Kesehatan (peraturam Pengujian Kesehatan No. 143/menkes/per/VII/77 Tanggal 1 Juli 1997).</td>
                        </tr>   
                       
                        <tr>                                                      
                            <td class="no__border" colspan="4" align="right">Kota Tangerang,<b><?php echo @date('d/m/Y'); ?></b></td>
                        </tr>
                        <tr>                            
                            <td class="no__border" colspan="4" align="right">Dokter Penguji Kesehatan</td>
                        </tr>
                        <tr>                            
                            <td class="no__border" colspan="4" align="right">RSUD KOTA TANGERANNG</td>
                        </tr>
                       
                        <tr>
                            <td class="no__border" colspan="4" align="right"><br><br><br><br><br><br>(<b><?= $sk_dinkes->nama_dokter;?></b>) <br>NIP. <?=$sk_dinkes->nip_dokter;?></font></td>
                        <tr>
                        <tr>
                            <td class="no__border" colspan="4"><br>Salinan Hasil Keputusan Pengujian Kesehatan Dikirimkan kepada</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">1.</td>
                            <td class="no__border" colspan="2"><?= $sk_dinkes->salinan_satu; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">2.</td>
                            <td class="no__border" colspan="2"><?= $sk_dinkes->salinan_dua; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">3.</td>
                            <td class="no__border" colspan="2"><?= $sk_dinkes->salinan_tiga; ?></td>
                        </tr>  
                        <tr>
                            <td class="no__border" width="1%">4.</td>
                            <td class="no__border" colspan="2">Arsip</td>
                        </tr>      
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
