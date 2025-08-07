<!-- // PSPMP -->
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
		<div class="surat__pengkajian__pasien container">
			<h2 class="section__title">PENGKAJIAN SPIRITUAL PASIEN MUSLIM (PULANG)</h2>
			<table class="small__font">
				<tbody class="border">					
					<tr>
						<td class="no__border" colspan="4">KEADAAN KETIKA KELUAR</td>
					</tr>				
					<tr>
						<td class="no__border">1. KONDISI IBADAH</td>
                        <td class="no__border">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_ibadah == 'Disiplin' ? 'checked' : ''; ?>>
                            <label for="">Disiplin</label>
                        </td>
                        <td class="no__border">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_ibadah == 'Kadang-kadang' ? 'checked' : ''; ?>>
                            <label for="">Kadang-kadang</label>
                        </td>
                        <td class="no__border">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_ibadah == 'Tidak' ? 'checked' : ''; ?>>
                            <label for="">Tidak</label>
                        </td>
					</tr>
                    <tr>
						<td class="no__border" width="40%">2. KONDISI PSIKO SPIRITUAL</td>
                        <td class="no__border" width="20%">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_psiko_spiritual == 'Menerima' ? 'checked' : ''; ?>>
                            <label for="">Menerima</label>
                        </td>
                        <td class="no__border" width="20%">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_psiko_spiritual == 'Mengeluh' ? 'checked' : ''; ?>>
                            <label for="">Mengeluh</label>
                        </td>
                        <td class="no__border" width="20%">
                            <input type="checkbox" <?= $pengkajian_pasien_muslim->kondisi_psiko_spiritual == 'Menolak' ? 'checked' : ''; ?>>
                            <label for="">Menolak</label>
                        </td>
					</tr>
				</tbody>
                <tbody class="border">
                    <tr>
						<td class="no__border" colspan="4"><br><br><br><b>SARAN / RENCANA TINDAK LANJUT :</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><b><?= $pengkajian_pasien_muslim->saran_rencana_tindak_selanjutnya; ?></b><br><br><br></td>
                    </tr>
                </tbody>
                <tbody class="border">
                    <tr>
						<td colspan="2">
                            <b>EDUKASI ISLAM</b> <br>
                            <input type="checkbox"<?= $pengkajian_pasien_muslim->edukasi_islam == 'Bimbingan Rohani' ? 'checked' : ''; ?>>
                            <label for="">Buku Bimbingan Kerohanian</label><br>
                            <input type="checkbox"<?= $pengkajian_pasien_muslim->edukasi_islam == 'Bimbingan Wanita Muslimah' ? 'checked' : ''; ?>>
                            <label for="">Buku Bimbingan Wanita Muslimah</label>
                        </td>

                        <td align="center" style="font-size: 8px;">Pasien/Keluarga/Wakil <br><br><br><br><br><br><br> (<b><?= !empty($pengkajian_pasien_muslim->pasien_keluarga) ? $pengkajian_pasien_muslim->pasien_keluarga : $pasien->nama; ?></b>)</td>

                        <!-- <td align="center" style="font-size: 8px;">Pasien/Keluarga/Wakil <br><br><br><br><br><br><br> (<b><!?= $pengkajian_pasien_muslim->pasien_keluarga;?></b>)</td> -->
                        <!-- <td align="center" style="font-size: 8px;">Pasien/Keluarga/Wakil <br><br><br><br><br><br><br> (<b><!?= $pasien->nama;?></b>)</td> -->
                        <td align="center" style="font-size: 8px;">Petugas Rumah Sakit<br><br><br><br><br><br><br> (<b><?= $this->session->userdata('nama'); ?> </b>)</td>
                    </tr>
                </tbody>
			</table>
		</div>


	</main>

	<!--=============== FOOTER ===============-->
	<footer class="footer">
		<div class="footer__container container grid">
			<p class="page__number">FORM-KEP-120-00</p>
		</div>
	</footer>
</body>
<?php die; ?>
