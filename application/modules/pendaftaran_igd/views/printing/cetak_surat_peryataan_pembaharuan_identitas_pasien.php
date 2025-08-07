<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- // SPPIP -->
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
                        <!-- <p class="identity">: <b><!?= date("d-m-Y", strtotime($pasien->tanggal_lahir)); ?></b></p> -->
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
                <h2 class="section__title section">SURAT PERNYATAAN PEMBAHARUAN IDENTITAS PASIEN <br> (RECALL IMPLANT)</h2>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Saya yang bertanda tangan dibawah ini :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>

                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_pasien_nama; ?> </td> 
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Tanggal Lahir / Umur</td> 
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_pasien_tanggal_lahir; ?> / <?= $ttd_umur; ?> Tahun</td>   
                            <!-- <td class="no__border" width="60%"> <!?= datefmysql($ttd_pasien_tanggal_lahir); ?> / <!?= $ttd_umur; ?> Tahun </td>            -->         
                            <!-- <td class="no__border" width="60%"> <!?= date("d-m-Y", strtotime($ttd_pasien_tanggal_lahir)); ?> / <!?= $ttd_umur; ?> Tahun </td>            -->
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_jenis_kelamin; ?> </td>           
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">No. KTP</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_pasien_ktp; ?> </td>           
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Alamat</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_alamat; ?> </td>           
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">No. Telp / HP</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"> <?= $ttd_no_hp; ?> </td>           
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Hubungan dengan pasien</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $ttd_hubungan_keluarga; ?></td>
                        </tr>
                    </tbody>
                </table> 
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Menyatakan dengan ini bersedia menginformasikan pembaruan no kontak serta alamat tempat tinggal <br><br>terkait dengan pemasangan implant pada pasien atas nama</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Nama</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?= $pasien->nama; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Tanggal Lahir / Umur</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border"  width="60%"><?= datefmysql($pasien->tanggal_lahir); ?> / <?= ($pasien->umur_pasien) ?> Tahun </td>
                        <!-- <td class="no__border"  width="60%"><!?= date("d-m-Y", strtotime($pasien->tanggal_lahir)); ?> / <!?= ($pasien->umur_pasien) ?> Tahun </td> -->
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Jenis Kelamin</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->kelamin;  ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">No. Rekam Medik</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->no_rm; ?></td>
                    </tr>
                    <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Alamat</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->alamat; ?></td>
                    </tr>
                    <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">No. Telp / HP</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->telp; ?></td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;" >
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                       
                    </tbody>
                </table> 
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Adapun surat pernyataan ini dibuat untuk keperluan telusur apa bila terjadi recall implant 
                            <br><br> untuk keamanan dan keselamatan pasien. 
                            <br><br> Apabila dikemudian hari pasien berpindah alamat tempat tinggal, dan tidak menginformasikan kepada
                            <br><br> pihak <b>RSUD KOTA TANGERANG</b> (Admision) maka segala konsekuesi nya bukan menjadi tanggung 
                            <br><br> jawab rumah sakit, beralih menjadi tanggung jawab pasien dan keluarga.
                            <br><br> Demikianlah surat pernyataan ini kami buat untuk dapat dipergunakan sebaik-baiknya untuk kepentingan bersama.
                        </td>
                    </tr>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="5%" align="center">   
                        </td>
                        <td class="no__border" width="5%" align="center">                         
                        </td>
                        <td class="no__border" width="5%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $ttd_pasien_tgl;
                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );
                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                            echo "$tanggal_diinginkan";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><br><br><p></p>( <?=$ttd_pasien_nama; ?> ) <br> Nama & Tanda tangan</font>
                        </td>
                    </tr>
                </table>
                <br>              
                <br>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
            <p class="page__number">FORM-REM-35-00</p>
        </section>
    </main>
    </body>
<?php die; ?>
	
