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
		<div class="surat__pemberian__informasi__pasien__keluarga container">
			<h2 class="section__title">FORMULIR PEMBERIAN INFORMASI PASIEN DAN KELUARGA</h2>
			<table class="small__font">
                <tbody>
                    <tr>
                        <td class="no__border" width="15%">Unit Kerja</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= $layanan->bangsal . ' kelas ' . $layanan->kelas . ' ruang ' . $layanan->no_ruang . ' No. Bed ' . $layanan->no_bed; ?></b></td>
                    </tr>                    
                    <tr>
                        <td class="no__border" width="15%">Tanggal dan Waktu</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= (date("d/m/Y H:i", strtotime($pemberian_informasi_pasien->tanggal_waktu))); ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center"><b>Materi Edukasi</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><b><?= $pemberian_informasi_pasien->materi_edukasi; ?></b><br><br><br></td>
                    </tr> 
                    <tr>
                        <td colspan="6" align="center"><b>Daftar Pertanyaan</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><b><?= $pemberian_informasi_pasien->daftar_pertanyaan; ?></b><br><br><br></td>
                    </tr>                                     
                </tbody>                                                     
			</table>
            <td><br><br><br><br><br></td>
            <table class="no__border big__line__spacing small__font">
            <tbody>
                <tr>
                    <td class="no__border" width="25%" align="center">Dokter DPJP <br> <br> <br>(<b><?= $pemberian_informasi_pasien->nama_dokter;?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                    <td class="no__border" width="25%" align="center">Keluarga <br> <br> <br>(<b><?= $pemberian_informasi_pasien->keluarga;?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                    <td class="no__border" width="25%" align="center">Pasien <br> <br> <br>(<b><?= $pasien->nama;?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                    <td class="no__border" width="25%" align="center">Petugas Shift <br> <br> <br>(<b><?= $this->session->userdata('nama'); ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                </tr>
            </tbody>     
            </table>
            
		</div>
	</main>

	<!--=============== FOOTER ===============-->
	<footer class="footer">
		<div class="footer__container container grid">
			<p class="page__number">FORM-KEP-74-02</p>
		</div>
	</footer>
</body>
<?php die; ?>
