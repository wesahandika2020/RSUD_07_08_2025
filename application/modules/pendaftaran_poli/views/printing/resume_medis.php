<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<div class="page">
		<!--=============== HEADER ===============-->
		<header class="header" id="header">
			<div class="header__container container grid">
				<div class="header__container-address grid">
					<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
					<p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
						Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
				</div>
				<div class="secret__container section">
					<h1>RAHASIA</h1>
				</div>
			</div>
		</header>

		<!--=============== MAIN ===============-->
		<main class="main">
			<section class="resume__medis">
				<br>
				<div class="resume__medis__container container">
					<table class="small__font">
						<thead>
							<tr>
								<td class="table__big-title" align="center" colspan="3">RESUME MEDIS</td>
								<td colspan="3">No. RM : <b><?= $rawat_inap->no_rm; ?></b></td>
							</tr>
							<tr>
								<td width="500px" colspan="2">Nama Pasien : <b><?= $rawat_inap->nama_pasien; ?></b></td>
								<td width="200px" colspan="2">Tanggal Lahir : <b><?= datefmysql($rawat_inap->tanggal_lahir); ?></b></td>
								<td width="150px" colspan="">Umur : <b><?= createUmur2($rawat_inap->tanggal_lahir) ?></b></td>
								<td width="150px" colspan="">Jenis Kelamin : <b><?= $rawat_inap->kelamin; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggal Masuk : <b><?= $rawat_inap->waktu_masuk == NULL ? '' : datetimefmysql($rawat_inap->waktu_masuk); ?></b></td>
								<td colspan="2">Tanggal Keluar / Meninggal : <b><?= $rawat_inap->waktu_keluar == NULL ? '' : datetimefmysql($rawat_inap->waktu_keluar); ?></b></td>
								<td colspan="2">Ruang Rawat Terakhir : <b><?= $rawat_inap->nama_bangsal . ' kelas ' . $rawat_inap->nama_kelas . ' Ruang ' . $rawat_inap->no_ruang . ' No Bed ' . $rawat_inap->no_bed; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggung Jawab Pembayaran : <b><?= $rawat_inap->penjamin == NULL ? '' : $rawat_inap->penjamin; ?></b></td>
								<td colspan="4">Diagnosis / Masalah Waktu Masuk : </td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td width="1000" colspan="2" class="no__border">Ringkasan Riwayat Penyakit</td>
								<td colspan="4" class="no__border">
									: <b><?= $kajian_medis == NULL ? '' : $kajian_medis->riwayat_penyakit_sekarang; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Pemeriksaan Fisik</td>
								<td colspan="4" class="no__border">
									: <b><?= $pemeriksaan_fisik == NULL ? '' : $pemeriksaan_fisik; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Pemeriksaan Penunjang / Diagnostik Terpenting</td>
								<td colspan="4" class="no__border">
									:
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Terapi / Pengobatan Selama di Rumah Sakit</td>
								<td colspan="4" class="no__border">
									: <b><?= $kajian_medis == NULL ? '' : $kajian_medis->pengobatan; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Hasil Konsultasi</td>
								<td colspan="4" class="no__border">
									: <b>-</b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Diagnosis Utama</td>
								<td colspan="4" class="no__border">
									: <b><?= $diagnosa_utama; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Diagnosis Sekunder</td>
								<td colspan="4" class="no__border">
									: <b><?= $diagnosa_sekunder; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Tindakan / Prosedur</td>
								<td colspan="4" class="no__border">
									: <b><?= $tindakan; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Alergi (Reaksi Obat)</td>
								<td colspan="4" class="no__border">
									: <b><?= $kajian_perawatan == NULL ? '' : $kajian_perawatan->alergi; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Hasil Laboratorium Belum Selesai (Pending)</td>
								<td colspan="4" class="no__border">
									: <b><?= $kajian_medis == NULL ? '' : $kajian_medis->hasil_laboratorium; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Diet</td>
								<td colspan="4" class="no__border">
									: <b><?= $diet; ?></b>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="no__border">Instruksi / Anjuran dan Edukasi (<em>Follow Up</em>)</td>
								<td colspan="4" class="no__border">
									: <b><?= $diet; ?></b>
								</td>
							</tr>
							<tr>
								<td width="30%" colspan="2" class="no__border">Kondisi Waktu Keluar</td>
								<td colspan="4" class="no__border">
									: <?php if ($rawat_inap->status == "Sembuh") {
											echo "Sembuh";
										} ?>
									<?php if ($rawat_inap->status == "Atas Izin Dokter") {
										echo "<b>Atas Izin Dokter</b>";
									} ?>
									<?php if ($rawat_inap->status == "Pulang APS") {
										echo "<b>Pulang Atas Permintaan Sendiri</b>";
									} ?>
									<?php if ($rawat_inap->kondisi == "Meninggal") {
										echo "<b>Meninggal</b>";
									} ?>
								</td>
							</tr>
							<!-- <tr>
								<td colspan="2" class="no__border">Pengobatan Dilanjutkan</td>
								<td colspan="4" class="no__border">
									: <input type="radio" name="diawetkan" id="diawetkan-skk" value="1" style="margin-right: 1px;">Poliklinik
									<input type="radio" name="diawetkan" id="tidak-diawetkan-skk" value="0" style="margin-right: 1px; margin-left: 2px;">RS Lain
									<input type="radio" name="diawetkan" id="tidak-diawetkan-skk" value="0" style="margin-right: 1px; margin-left: 2px;">Puskesmas
									<input type="radio" name="diawetkan" id="tidak-diawetkan-skk" value="0" style="margin-right: 1px; margin-left: 2px;">Dokter Luar
								</td>
							</tr> -->
							<tr>
								<td colspan="2" class="no__border">Tanggal Kontrol Poliklinik</td>
								<td colspan="4" class="no__border">
									: <b><?= $diet; ?></b>
								</td>
							</tr>
						</tbody>
					</table>

					<table class="small__font" style="margin-top: 1rem;">
						<thead class="no__border">
							<tr>
								<th colspan="12">TERAPI PULANG</th>
							</tr>
							<tr>
								<th rowspan="2">Nama Obat</th>
								<th rowspan="2">Jumlah</th>
								<th rowspan="2">Dosis</th>
								<th rowspan="2">Frekuensi</th>
								<th rowspan="2">Cara Pemberian</th>
								<th colspan="6">Jam Pemberian</th>
								<th rowspan="2">Petunjuk Khusus</th>
							</tr>
							<tr>
								<th>A</th>
								<th>B</th>
								<th>C</th>
								<th>D</th>
								<th>E</th>
								<th>F</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($terapi_pulang as $tp) : ?>
								<tr>
									<td><?php echo $tp->nama_obat; ?></td>
									<td><?php echo $tp->jumlah_obat; ?></td>
									<td><?php echo $tp->dosis; ?></td>
									<td><?php echo $tp->frekuensi; ?></td>
									<td><?php echo $tp->cara_pemberian; ?></td>
									<td><?php echo $tp->ek_jam_pemberian; ?></td>
									<td><?php echo $tp->ek_jam_pemberian_satu; ?></td>
									<td><?php echo $tp->ek_jam_pemberian_dua; ?></td>
									<td><?php echo $tp->ek_jam_pemberian_tiga; ?></td>
									<td><?php echo $tp->ek_jam_pemberian_empat; ?></td>
									<td><?php echo $tp->ek_jam_pemberian_lima; ?></td>
									<td><?php echo $tp->petunjuk_khusus; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<table class="small__font" style="margin-top: 1rem;">
						<tbody>
							<tr align="center">
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2">Tangerang, <b><?php echo @date('d/m/Y'); ?></b></td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="2">
									<br><br><br><br><br><br><br><br>
								</td>
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2">Dokter Penanggung Jawab Pelayanan
									<br><br><br><br><br><br><br><br>
								</td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2">(<b><?= $this->session->userdata('nama'); ?> </b>)</td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2"></td>
								<td class="no__border" colspan="2">Tanda Tangan & Nama Lengkap</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</main>
	</div>

</body>
<?php die; ?>