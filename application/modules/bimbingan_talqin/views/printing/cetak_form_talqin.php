<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

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
		<div class="formulir__talqin container">
            <td><br><br><br></td>
			<h2 class="section__title">FORMULIR PERMOHONAN PENDAMPINGAN PASIEN SAKARATUL MAUT</h2>
            <td><br></td>
			<table class="no__border big__line__spacing small__font">
                <tbody>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Nama Perawat</td>
                        <td class="no__border" colspan="3">: <b><?= $bimbingan_talqin->nama_perawat; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Ruangan</td>
                        <td class="no__border" colspan="3">: <b><?= $layanan->bangsal . ' kelas ' . $layanan->kelas . ' ruang ' . $layanan->no_ruang . ' No. Bed ' . $layanan->no_bed; ?></b></td>
                    </tr>                    
                    <tr>
                        <td class="no__border" colspan="5">Memohon Pendampingan oleh Petugas Kerohanian Terhadap Pasien :</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Nama</td>
                        <td class="no__border" colspan="3">: <b><?= $pasien->nama; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Jenis Kelamin</td>
                        <td class="no__border" colspan="3">: <b><?= $pasien->kelamin; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Tanggal Lahir</td>
                        <td class="no__border" colspan="3">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></td>
                    </tr> 
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Alamat</td>
                        <td class="no__border" colspan="3">: <b><?= $pasien->alamat; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Tanggal Waktu Konfirmasi</td>
                        <td class="no__border" colspan="3">: <b><?= (date("d/m/Y H:i", strtotime($bimbingan_talqin->waktu_konfirmasi_talqin))); ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Kondisi Pasien</td>
                        <td class="no__border" colspan="3">: <b><?= $bimbingan_talqin->kondisi_pasien_talqin; ?></b></td>
                    </tr>                    
                    <tr>
                        <td class="no__border" colspan="2" width="25%">Terapi/Tindak Lanjut</td>
                        <td class="no__border" colspan="3">: <b><?= $bimbingan_talqin->terapi_advice_talqin; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border"><br><br></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" width="60%"></td>
                        <td class="no__border" colspan="2" align="right">Tangerang, <b><?php echo @date('d/m/Y'); ?></b></td>
                    </tr>                   
                </tbody>                                                  
			</table>
            <td><br><br></td>
            <table class="no__border big__line__spacing small__font">
            <tbody>
                <tr>
                    <td class="no__border" width="50%" align="center">Perawat Ruangan<br><br><br><br>(<b style="text-transform:uppercase"><?= $bimbingan_talqin->nama_perawat; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                    <td class="no__border" width="50%" align="center">Petugas Pendamping Bimroh<br><br><br><br>(<b><?= $this->session->userdata('nama'); ?> </b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                </tr>
            </tbody>     
            </table>
            
		</div>
	</main>

	<!--=============== FOOTER ===============-->
	<footer class="footer">
		<div class="footer__container container grid">
			<p class="page__number">FORM-IPJ-020-00</p>
		</div>
	</footer>
</body>
<?php die; ?>
