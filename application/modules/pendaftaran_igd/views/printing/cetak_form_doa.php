<!-- // DOA_D_O_A -->
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
                    <b style="font-size: 13pt; display: flex; justify-content: center">SURAT KETERANGAN </b>
                    <p style="font-size: 12pt; display: flex; justify-content: center">DOA&nbsp;<i> ( Death On Arrival )</p>
                </tr>
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Dengan ini menerangkan bahwa :</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Nama</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?= $pasien->nama; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">No. Rekam Medis</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->no_rm; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Tempat Tanggal Lahir</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border"  width="60%"><?= ($pasien->tempat_lahir) ?> / <?= datefmysql($pasien->tanggal_lahir); ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Umur</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border"  width="60%"><?= ($pasien->umur_pasien) ?> Tahun </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Jenis Kelamin</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->kelamin;  ?></td>
                    </tr>
                    <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Alamat</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"><?= $pasien->alamat; ?></td>
                    </tr>
                </table>

                <table class="no__border small__line__spacing small__font" style="font-size: 14px;" >
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                       
                    </tbody>
                </table> 

                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Tiba di Instalasi Gawat Darurat RSUD Kota Tangerang dalam keadaan sudah meninggal dunia.
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Pada Tanggal</td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border"  width="60%"> <?= datefmysql($ttd_tanggal_doa); ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="20%">Pukul</i></td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="60%"> <?=$ttd_pukul_doa; ?> </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Demikian Surat Keterangan ini dibuat, dan dipergunakan seperlunya.
                        </td>
                    </tr>
                </table>
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
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center">   
                        </td>
                        <td class="no__border" width="3%" align="center">                         
                        </td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $ttd_tanggal_surat_doa;
                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );
                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                            echo "$tanggal_diinginkan";
                            ?>
                            <br><br>
                            Dokter Pemeriksa
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><br><br><p></p> <u>( <?=$ttd_dokter_doa; ?> )</u> <br> Nama & Tanda tangan</font>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            <p class="page__number">FORM-KEP-06-00</p>
        </section>
    </main>
    </body>
<?php die; ?>
	
