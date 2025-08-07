<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<?php

function tanggal_indonesia( $tanggal ) {
	$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
	);

	$pecahkan = explode( '-', $tanggal );

	return $pecahkan[2] . ' ' . $bulan[ (int) $pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>

<title>Document</title>

<body>
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
								<td colspan="3">NRM : <b><?= $pasien->no_rm; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Nama Pasien : <b><?= $pasien->nama_pasien; ?></b></td>
								<td colspan="2">Tanggal Lahir : <b><?= datefmysql($pasien->tanggal_lahir); ?></b></td>
								<td>Umur : <b><?= createUmur2($pasien->tanggal_lahir) ?></b></td>
								<td>Jenis Kelamin : <b><?= $pasien->kelamin; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggal Masuk : <b><?= $pasien->tanggal_daftar == NULL ? '' : datetimefmysql($pasien->tanggal_daftar); ?></b></td>
								<td colspan="2">Tanggal Keluar / Meninggal : <b><?= $pasien->tanggal_keluar == NULL ? '' : datetimefmysql($pasien->tanggal_keluar); ?></b></td>
								<td colspan="2">Ruang Rawat Terakhir : <b><?= $pasien->ruang_asal; ?><?= $intensive_care == NULL ? '' : $intensive_care->nama_bangsal; ?><?= $pasien->jenis_layanan == 'IGD' ? 'IGD' : ''; ?></b></td>
							</tr>
							<tr>
								<td colspan="6">Tanggung Jawab Pembayaran : <b><?= $pasien->penjamin == NULL ? '' : $pasien->penjamin; ?></b></td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>1. Ringkasan Riwayat Penyakit</b></td>
								<td style="vertical-align: top;" class="no__border"><?= $pasien->jenis_pendaftaran !== 'IGD' ? '' : ':'; ?></td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<?php if ($anamnesa !== NULL) : ?>
										<b><?= $anamnesa->s_soap == NULL ? '' : $anamnesa->s_soap; ?></b>
									<?php endif; ?>
								</td>
							</tr>
							<?php if ($anamnesa !== NULL) : ?>
								<?php if ($anamnesa->keluhan_utama !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Keluhan Utama</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->keluhan_utama; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->riwayat_penyakit_sekarang !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Sekarang</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->riwayat_penyakit_sekarang; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->riwayat_penyakit_dahulu !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Dahulu</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->riwayat_penyakit_dahulu; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->riwayat_penyakit_keluarga !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Keluarga</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->riwayat_penyakit_keluarga; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->anamnesa_sosial !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Anamnesa Sosial</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->anamnesa_sosial; ?></b>
										</td>
									</tr>
								<?php endif; ?>
							<?php endif; ?>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>2. Pemeriksaan Fisik</b></td>
								<td style="vertical-align: top;" class="no__border"><?= $pasien->jenis_pendaftaran !== 'IGD' ? '' : ':'; ?></td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<?php if ($anamnesa !== NULL) : ?>
										<b><?= $anamnesa->o_soap == NULL ? '' : $anamnesa->o_soap . '<br>'; ?></b>
										<b><?= $anamnesa->a_soap == NULL ? '' : $anamnesa->a_soap . '<br>'; ?></b>
										<b><?= $anamnesa->p_soap == NULL ? '' : $anamnesa->p_soap; ?></b>
									<?php endif; ?>
								</td>
							</tr>
							<?php if ($anamnesa !== NULL) : ?>
								<?php if ($anamnesa->keadaan_umum !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Keadaan Umum</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->keadaan_umum; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->kesadaran !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kesadaran</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->kesadaran; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->gcs !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;GCS</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->gcs; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->sistolik !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Sistolik</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->sistolik . ' mmHg'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->diastolik !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Diastolik</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->diastolik . ' mmHg'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->suhu !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Suhu</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->suhu . '℃'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->nadi !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Nadi</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->nadi . '/Mnt'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->rr !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Respirasi Rate</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->rr . '/Mnt'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->tinggi_badan !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tinggi Badan</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->tinggi_badan . ' cm'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->berat_badan !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Berat Badan</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->berat_badan . ' Kg'; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->kepala !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kepala</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->kepala; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->leher !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Leher</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->leher; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->thorax !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Thorax</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->thorax; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->pulmo !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Pulmo</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->pulmo; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->cor !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;COR</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->cor; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->abdomen !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Abdomen</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->abdomen; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->genitalia !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Genitalia</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->genitalia; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->ekstrimitas !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Ekstrimitas</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->ekstrimitas; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->prognosis !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Prognosis</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->prognosis; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->status_mentalis !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Mentalis</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->status_mentalis; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->lingkar_kepala !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Lingkar Kepala</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->lingkar_kepala; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->status_gizi !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Gizi</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->status_gizi; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->telinga !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Telinga</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->telinga; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->hidung !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Hidung</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->hidung; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->mata !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Mata</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->mata; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->tenggorok !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tenggorok</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->tenggorok; ?></b>
										</td>
									</tr>
								<?php endif; ?>
								<?php if ($anamnesa->kulit_kelamin !== NULL) : ?>
									<tr>
										<td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kulit Kelamin</td>
										<td style="vertical-align: top;" class="no__border">:</td>
										<td style="vertical-align: top;" colspan="4" class="no__border">
											<b><?= $anamnesa->kulit_kelamin; ?></b>
										</td>
									</tr>
								<?php endif; ?>
							<?php endif; ?>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>3. Pemeriksaan Penunjang</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $tindakan_lab == NULL ? '' : $tindakan_lab . '<br>'; ?></b>
									<b><?= $tindakan_rad == NULL ? '' : $tindakan_rad . '<br>'; ?></b>
									<b><?= $anamnesa == NULL ? '' : nl2br($anamnesa->pemeriksaan_penunjang); ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>4. Tindakan / Prosedur</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $tindakan_ok == NULL ? '' : $tindakan_ok . '<br>'; ?></b>
									<b><?= $tindakan == NULL ? '' : $tindakan; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>5. Diagnosis Utama</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $diagnosa_utama; ?></b>
									<b><?= $diagnosa_manual_utama; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" width='30%' class="no__border"><b>6. Diagnosis Sekunder</b></td>
								<td style="vertical-align: top;" width='1%' class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $diagnosa_sekunder; ?></b>
									<b><?= $diagnosa_manual_sekunder; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>7. Pengobatan</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $pengobatan; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>8. Anjuran/Usul Tindakan Lanjut (<em>Follow Up</em>)</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $anamnesa == NULL ? '-' : $anamnesa->usul_tindak_lanjut; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border"><b>9. Kondisi Waktu Keluar</b></td>
								<td style="vertical-align: top;" class="no__border">:</td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $pasien->tindak_lanjut == NULL ? '-' : $pasien->tindak_lanjut; ?></b>
									<br>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr align="center">
								<td width="20%" class="no__border" colspan="4"></td>
								<td class="no__border" colspan="2">
									<div style="display: flex; flex-direction: column;">
										<div>
											Tanggal: <b><?= $pasien->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($pasien->tanggal_keluar))); ?></b>
										</div>
										<div>
											Jam: <b><?= $pasien->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($pasien->tanggal_keluar)); ?></b>
										</div>
									</div>
								</td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="4"></td>
								<td class="no__border" colspan="2">Dokter Penanggung Jawab Pelayanan
								<?php if(!$pasien->tanda_tangan): ?>
									<br><br><br><br><br><br><br><br>
								<?php endif ?>
								</td>
							</tr>
							<?php if($pasien->tanda_tangan): ?>
							<tr align="center">
								<td class="no__border" colspan="4"></td>
								<td class="no__border" colspan="2">
									<img src="<?= resource_url().'images/ttd_dokter/'.$pasien->tanda_tangan ?>" alt="ttd-dokter" width="300">
								</td>
							</tr>
							<?php endif ?>
							<tr align="center">
								<td class="no__border" colspan="4"></td>
								<td class="no__border" colspan="2">(<b><?= $pasien->dokter_dpjp ?> </b>)</td>
							</tr>
							<tr>
								<td colspan="6">
									Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
									UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)
								
								</td>
							</tr>
							<!-- <tr align="center">
								<td width="50%" class="no__border" colspan="2"></td>
								<td class="no__border" colspan="4">Tanda Tangan & Nama Lengkap</td>
							</tr> -->
						</tfoot>
					</table>

				</div>
			</section>
		</main>
	</div>

</body>
<?php die; ?>
