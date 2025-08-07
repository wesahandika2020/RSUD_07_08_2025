<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

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

    <!--=============== MAIN ===============-->
    <main class="main">
    <section class="form__sk__sehat laporan-operasi">
			<br>
            <div class="form__sk__sehat__container container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border" colspan="5">LAPORAN OPERASI</th>
                        </tr>                                                              
                    </thead>              
                </table>
                <br>
                <table class="laporan-operasi" border="1">
                <tbody>                                       
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Diagnosa Pra Bedah</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->diagnosa_pra_bedah?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Diagnosa Pasca Bedah</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->diagnosa_pasca_bedah?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Prosedur Operasi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->prosedur_operasi?></td>
                        </tr>                        
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Pemeriksaan Specimen</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <input type="checkbox"<?= $laporan_operasi->pemeriksaan_specimen == 'Tidak' ? 'checked' : ''; ?>>
                                <label for="">Tidak</label>
                                <input type="checkbox"<?= $laporan_operasi->pemeriksaan_specimen == 'PA' ? 'checked' : ''; ?>>
                                <label for="">PA</label>
                                <input type="checkbox"<?= $laporan_operasi->pemeriksaan_specimen == 'Kultur' ? 'checked' : ''; ?>>
                                <label for="">Kultur</label>
                                <input type="checkbox"<?= $laporan_operasi->pemeriksaan_specimen == 'Sitologi' ? 'checked' : ''; ?>>
                                <label for="">Sitologi</label>
                                <input type="checkbox"<?= $laporan_operasi->pemeriksaan_specimen == 'Lainnya' ? 'checked' : ''; ?>>
                                <label for="">Lainnya (<?= $laporan_operasi->pemeriksaan_specimen_lain?>)</label>
                            </td>                                                                          
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Golongan Operasi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->golongan_operasi?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Komplikasi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->komplikasi?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jumlah Darah Yang Hilang</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->jumlah_darah_hilang?> (ml)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Tranfusi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->transfusi?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jenis/Jumlah</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->jenis_jumlah?> (ml)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jenis Anestesi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->jenis_anestesi?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jenis Operasi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->jenis_operasi?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jaringan yang di eksisi/insisi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $laporan_operasi->jaringan_eksisi?></td>
                        </tr>                                    
                    </tbody> 
                </table>
                <br>
                <table class="laporan-operasi" border="1">
                    <tr>
                        <td width="15%" style="text-align:center"><small>Tanggal Operasi</small></td>
                        <td width="15%" style="text-align:center"><small>Jam Operasi Dimulai</small></td>
                        <td width="15%" style="text-align:center"><small>Jam Operasi Selesai</small></td>
                        <td width="15%" style="text-align:center"><small>Lamanya Operasi</small></td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center"><small><?= datefmysql($laporan_operasi->tanggal_operasi); ?></small></td>
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->mulai_waktu_operasi?></small></td>
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->selesai_waktu_operasi?></small></td>  
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->waktu_operasi?></small></td>                                                                              
                    </tr>
                    </table>               
                    <table class="laporan-operasi" border="1">
                    <br>
                    <tr>
                        <td width="15%" style="text-align:center"><small>Dokter Bedah</small></td>
                        <td width="15%" style="text-align:center"><small>Asisten</small></td>
                        <td width="15%" style="text-align:center"><small>Instrumentator</small></td>
                        <td width="15%" style="text-align:center"><small>Sirkuler</small></td>

                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->nama_dokter?></small></td>
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->asisten?></small></td>
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->instrumentator?></small></td>  
                        <td width="15%" style="text-align:center"><small><?= $laporan_operasi->sirkuler?></small></td>                                                                              
                    </tr>                
                </table>
                <br>
                <table class="laporan-operasi" border="1">
                    <tr>                       
                        <td style="text-align:left" class="no__border" width="40%"><?= nl2br($laporan_operasi->catatan); ?></td>
                    </tr>  
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
            <div style="display: flex;justify-content: flex-end;">
                <div style="width: 250px; display: flex; flex-direction: column;align-items: center;">
                    <div>Dokter Operator</div>
                    <?php if($laporan_operasi->tanda_tangan) : ?>
                        <img src="<?= base_url('resources/images/ttd_dokter/') . $laporan_operasi->tanda_tangan ?>" alt="ttd-dokter-operator" width="300">
                    <?php else : ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    <?php endif; ?>
                    <?= $laporan_operasi->nama_dokter ?>
                    <?php if(!empty($laporan_operasi->no_sip)): ?>
                    SIP. <?= $laporan_operasi->no_sip ?>
                    <?php endif; ?>
                </div>
            </div>

            <p class="page__number">FORM-PMD-02-04</p>
        </div>
    </footer>
</body>
<?php die; ?>
