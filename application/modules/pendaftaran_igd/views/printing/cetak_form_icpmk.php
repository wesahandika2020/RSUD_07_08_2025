<!-- // ICPMK -->
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
	<!--=============== MAIN ===============-->
    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <br>
                <br>
                <tr>
                    <b style="font-size: 13pt; display: flex; justify-content: center">INFORMED CONSENT</b>
                    <b style="font-size: 13pt; display: flex; justify-content: center">PERAWATAN METODE KANGURU (PMK)</b>
                </tr>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Saya yang bertanda tangan dibawah ini : </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Nama</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?=$ttd_nama_ort_icpmk; ?> </td>
                    </tr>
                    <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Alamat</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?=$ttd_alamat_icpmk; ?> </td>
                    </tr>
                    <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Hubungan dengan pasien</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?=$ttd_hubungan_ayah_icpmk;?> <?=$ttd_hubungan_ibu_icpmk;?> <?=$ttd_hubungan_nenek_icpmk;?> <?=$ttd_hubungan_kakek_icpmk;?> <?=$ttd_hubungan_lainya_icpmk;?></td>
                    </tr>

                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Mengijinkan kepada tim keperawatan dan dokter jaga untuk melakukan perawatan metode kanguru (PMK) intermiten/kontinyu terhadap : 
                            </td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;" >
                        <tbody>                    
                            <tr>
                                <td class="no__border" colspan="4"></td>   
                            </tr>
                            <tr>
                                <td class="no__border" width="3%"></td>
                                <td class="no__border" width="23%">Nama</i></td>
                                <td class="no__border" width="1%">: </td>
                                <td class="no__border" width="60%"> By. <?= $pasien->nama; ?></td>
                            </tr>

                            <tr>
                                <td class="no__border" width="3%"></td>
                                <td class="no__border" width="23%">Usia</i></td>
                                <td class="no__border" width="1%">: </td>
                                <td class="no__border" width="60%"><?=$ttd_usia_by_icpmk; ?> </td>
                            </tr>                     
                        </tbody>
                    </table> 
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4"><b>Dasar perawatan metode kanguru :</b> Bayi berat lahir rendah (<2500 gram) dengan kondisi yang stabil (dapat bernapas spontan dan tidak memiliki masalah kesehatan serius).  
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4"><b>Manfaat :</b> kehangatan, agar suhu tetap normal, mempercepat pengeluaran ASI, meningkatkan keberhasilan menyusui, perlindungan dari infeksi, berat badan cepat naik, stimulasi dini, kasih sayang dan mengurangi biaya perawatan rumah sakit.
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4"><b>Tanda-tanda bahwa yang perlu diperhatikan selama perawatan :</b> tubuh bayi dingin (suhu dibawah 36.5) bayi gelisah, mudah terangsang, lesu, tidak sadarkan diri, demam, malas menyusui, tidak minum dengan baik, muntah, kejang, kesulitan bernapas, diare, mencret, kulit tampak kuning/biru, atau menunjukan gejala lain yang mengkhawatirkan. 
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4"><b> <i>Informed consent</i> :</b> saya telah memahami dan menerima bahwa selama perawatan bayi saya mungkin mengalami resiko tersebut dan memerlukan tindakan lain yang belum disebutkan diatas. Saya meminta dokter jaga dan tim untuk melakukan tindakan tersebut yang mereka anggap perlu.  
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4">SAYA TELAH DIBERIKAN CUKUP KESEMPATAN UNTUK MENGAJUKAN PERTANYAAN DAN SETIAP PERTANYAAN YANG SAYA AJUKAN TELAH DIJAWAB ATAU DIJELASKAN SECARA MEMUASKAN. 
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4">DENGAN MENANDATANGANI SURAT INI, BERARTI SAYA TELAH MEMBACA DAN MENDAPATKAN PENJELASAN DAN SAYA TELAH SEPENUHNYA MENGERTI AKAN ISI SURAT INI.
                        </tr>
                    </table>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;" >
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                       
                    </tbody>
                </table> 
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="3%" align="center">   
                            Dokter ybs
                        </td>
                        <td class="no__border" width="3%" align="center">                         
                        </td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $ttd_tanggal_icpmk;
                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );
                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                            echo "$tanggal_diinginkan";
                            ?>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        <br><br><br><br><br><u>( <?=$ttd_dokter_icpmk; ?> )</u> <br> Nama & Tanda tangan</font>
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><br><u>( <?=$ttd_nama_ort_icpmk; ?> )</u> <br> Hubungan dengan pasien : <?=$ttd_hubungan_ayah_icpmk;?> <?=$ttd_hubungan_ibu_icpmk;?> <?=$ttd_hubungan_nenek_icpmk;?> <?=$ttd_hubungan_kakek_icpmk;?> <?=$ttd_hubungan_lainya_icpmk;?></font>
                        </td>
                    </tr>
                </table>
                <br>             
                <br>             
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;" >
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="5%">Saksi 1</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $ttd_perawat_1_icpmk; ?></td>
                        </tr>

                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="5%">Saksi 2</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $ttd_perawat_2_icpmk; ?></td>
                        </tr>                     
                    </tbody>
                </table> 
                <br>
            <p class="page__number">FORM-KEP-89-00</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
    </body>
<?php die; ?>
	
