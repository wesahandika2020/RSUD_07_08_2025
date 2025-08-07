<!-- // SP_WE -->
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
                    <b style="font-size: 13pt; display: flex; justify-content: center">SURAT PERNYATAAN</b>
                </tr>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Saya yang bertanda tangan dibawah ini : </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Nama</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?=$ttd_nama_kel_sp; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Nama/Jenis Kelamin</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?=$ttd_umur_kel_sp; ?> / <?=$ttd_jk_kel_sp; ?> </td>
                    </tr>                 
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Alamat</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?=$ttd_alamat_kel_sp; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">No KTP</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?=$ttd_no_ktp_kel_sp; ?> </td>
                    </tr>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" > Terhadap 
                            <b> <?=$ttd_saya_sendiri_kel_sp;?> <?=$ttd_anak_kel_sp;?> <?=$ttd_istri_kel_sp;?> <?=$ttd_suami_kel_sp;?> <?=$ttd_ayah_kel_sp;?> <?=$ttd_ibu_kel_sp;?> <?=$ttd_lainya_kel_sp;?>* </b> saya, yang beridentitas :
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $pasien->nama; ?> </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Umur/Jenis Kelamin</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $pasien->umur_pasien; ?> / <?= $pasien->kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Alamat</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $pasien->alamat; ?></td>
                        </tr> 
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">No KTP*</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $pasien->no_identitas; ?></td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" > Dengan ini menyatakan dengan sesungguhnya : 
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_mengajukan_sp == 1 ? '&#128505;' : '&#9633;'; ?> Mengajukan permintaan Susu Formula</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_menolak_sp == 1 ? '&#128505;' : '&#9633;'; ?> Menolak Rujuk</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_dirawat_sp == 1 ? '&#128505;' : '&#9633;'; ?> Dirawat sementara di IGD</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_perawatan_sp == 1 ? '&#128505;' : '&#9633;'; ?> Perawatan di intensif</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_perawatan_dgn_sp == 1 ? '&#128505;' : '&#9633;'; ?> Perawatan dengan pelayanan dan fasilitas rawat inap</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_menolak_pp_sp == 1 ? '&#128505;' : '&#9633;'; ?> Menolak Pemeriksaan Penunjang</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="60%">  <?= $ttd_lainya_sp == 1 ? '&#128505;' : '&#9633;'; ?> <?=$ttd_dg_alasan_sp; ?> </td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" > Menyatakan bahwa saya telah mendapat penjelasan dari dokter atau petugas kesehatan mengenai kondisi pasien saat ini, saya menerima segala resiko yang mungkin terjadi dan tidak akan menuntut pihak rumah sakit apabila terjadi hal-hal yang tidak diinginkan berkaitan dengan kondisi pasien.
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" > Dengan Alasan  :    <?=$ttd_dg_alasan_sp_1; ?> </td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" > Demikian pernyataan ini saya buat dengan sadar tanpa paksaan dari pihak manapun.
                            </td>
                        </tr>
                    </table>

                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="5%" align="center">   
                            Yang Membuat Pernyataan
                        </td>
                        <td class="no__border" width="5%" align="center">                         
                        </td>
                        <td class="no__border" width="5%" align="center">
                            Tangerang,                         
                            <?php
                            $tanggal_mysql = $ttd_tgl_sp;
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
                            <br>
                            Dokter
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        <br><br><br><br><u>( <?=$ttd_nama_kel_sp; ?> )</u> <br> Nama jelas dan Tanda tangan</font>
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><u>( <?=$ttd_dokter_sp; ?> )</u> <br> Nama jelas dan Tanda tangan </font>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="5%" align="center">   
                            Saksi 1
                        </td>
                        <td class="no__border" width="5%" align="center">                         
                        </td>
                        <td class="no__border" width="5%" align="center">
                            Saksi 2                         
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        <br><br><br><br><u>( <?=$ttd_saksi_1_sp; ?> )</u> <br> Nama jelas dan Tanda tangan</font>
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><u>( <?=$ttd_saksi_2_sp; ?> )</u> <br> Nama jelas dan Tanda tangan </font>
                        </td>
                    </tr>
                </table>  
                <br>         
            <p class="page__number">FORM-KEP-72-01</p>
            <p>*Coret yang tidak perlu</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
    </body>
<?php die; ?>
	
