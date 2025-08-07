<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<!-- // BKS -->
<title>Document</title>

<style>
    .laporan-operasi{
        font-size: 10pt ;
    }
</style>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
	<header class="header" id="header">
		<div class="header__container2 container">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
			<div>
				<h1 class="header__title">RSUD KOTA TANGERANG</h1>
				<p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
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
    <!-- <!?= var_dump($bukti_kondisi_sterilisasi) ?>  untuk melihat jika datanya ada atau tidak di cetaknya -->
    <!--=============== MAIN ===============-->
    <main class="main">
    <section class="form__bks bukti-kondisi-sterilisasi">
			<br>
            <div class="form__sk__sehat__container container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border" colspan="5">Bukti Kondisi Sterilisasi</th>
                        </tr>                                                              
                    </thead>              
                </table>
                <br>
                <table class="bukti-kondisi-sterilisasi" border="1">
                    <tbody>                                       
                        <tr>
                            <td width="30%" style="text-align:center"><small><b>AHLI BEDAH</small></td>
                            <td width="30%" style="text-align:center"><small><b>ASISTEN I</small></td>
                            <td width="30%" style="text-align:center"><small><b>INTRUMEN</small></td>
                        </tr>

                        <tr>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->dokter_1?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->perawat_1?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->perawat_4?></small></small></td>
                        </tr>

                        <tr>
                            <td width="30%" style="text-align:center"><small><b>AHLI ANESTESIOLOGI</small></td>
                            <td width="30%" style="text-align:center"><small><b>ASISTEN II</small></td>
                            <td width="30%" style="text-align:center"><small><b>SIRKULER</small></td>
                        </tr>

                        <tr>
                        <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->dokter_2?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->perawat_2?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->perawat_5?></small></small></td>
                        </tr>

                        <tr>
                            <td width="30%" style="text-align:center"><small><b>JENIS/NAMA OPERASI </small></td>
                            <td width="30%" style="text-align:center"><small><b>ASISTEN ANESTESI</small></td>
                            <td width="30%" style="text-align:center"><small><b>JENIS ANESTESI</small></td>
                        </tr>

                        <tr>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->jenis_nama_operasi?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->perawat_3?></small></small></td>
                            <td width="30%" style="text-align:center"><small><small><?= $bukti_kondisi_sterilisasi->jenis_anastesi_bks?></small></small></td>
                        </tr>                 
                    </tbody>                 
                </table>
                <br>
                <table class="bukti-kondisi-sterilisasi" border="1">
                    <tr>
                        <td width="23%" style="text-align:center"><small><b>Tanggal Operasi</small></td>
                        <td width="23%" style="text-align:center"><small><b>Jam Operasi Dimulai</small></td>
                        <td width="23%" style="text-align:center"><small><b> Operasi Selesai</small></td>
                        <td width="23%" style="text-align:center"><small><b>Lamanya Operasi</small></td>
                    </tr>
                    <tr>
                        <td width="23%" style="text-align:center"><small><?= datefmysql($bukti_kondisi_sterilisasi->tgl_operasi_bks); ?></small></td>
                        <td width="23%" style="text-align:center"><small><?= $bukti_kondisi_sterilisasi->jam_mulai_op_bks?></small></td>
                        <td width="23%" style="text-align:center"><small><?= $bukti_kondisi_sterilisasi->jam_selesai_op_bks?></small></td>  
                        <td width="23%" style="text-align:center"><small><?= $bukti_kondisi_sterilisasi->lama_operasi_bks?></small></td>                                                                              
                    </tr>
                </table> 
                <br>
                <table class="no__borde bukti-kondisi-sterilisasi">  
                    <tbody>                                       
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>INDIKATOR STERILISASI</small></td>
                        </tr>
                        <tr>
                            <td width="30%" height="50" style="text-align:left"><small><small><?= $bukti_kondisi_sterilisasi->indikator_sterilisasi_bks?></small></small></td>                           
                        </tr>                
                    </tbody>                 
                </table>
                <table class="no__borde bukti-kondisi-sterilisasi">  
                    <tbody>                                       
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks?></small></td>
                        </tr>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tanggal_steril_bks);?></small></td>
                        </tr>                
                    </tbody>                 
                </table>

                <table class="no__borde bukti-kondisi-sterilisasi">   
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_0)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_0)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_0 ?></small></td>
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_0)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_0); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>

                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_1)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_1)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_1 ?></small></td>
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_1)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_1); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>  
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_2)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_2)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_2 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_2)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_2); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_3)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_3)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_3 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_3)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_3); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_4)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_4)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_4 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_4)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_4); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_5)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_5)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_5 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_5)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_5); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_6)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_6)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_6 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_6)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_6); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_7)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_7)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_7 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_7)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_7); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_8)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_8)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_8 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_8)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_8); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_9)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_9)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_9 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_9)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_9); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_10)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_10)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_10 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_10)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_10); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_11)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_11)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_11 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_11)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_11); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_12)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_12)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_12 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_12)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_12); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_13)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_13)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_13 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_13)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_13); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
                <table class="no__border bukti-kondisi-sterilisasi">               
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_14)): ?>
                        <tr>
                            <td width="30%" height="50"></td>   
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->alat_item_bks_14)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Alat/Item :</b> <?= $bukti_kondisi_sterilisasi->alat_item_bks_14 ?></small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($bukti_kondisi_sterilisasi->tgl_steril_bks_14)): ?>
                        <tr>
                            <td width="30%" style="text-align:left"><small><b>Tanggal Steril :</b> <?= datefmysql($bukti_kondisi_sterilisasi->tgl_steril_bks_14); ?></small></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
            <br>
            <br>    
            <br>
        </section>     
    </main>
    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-108-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
