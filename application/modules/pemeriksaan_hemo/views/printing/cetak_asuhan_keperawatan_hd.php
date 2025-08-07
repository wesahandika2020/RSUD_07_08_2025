<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hasil Asuhan Keperawatan Pasien Hemodialisa</title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 8pt;
		}

		@page {
			margin: 0.5cm !important;
		}

		.box-identitas {
			border: 1.5px solid black;
			padding: 5px;
		}

		.center {
			text-align: center;
			vertical-align: middle;
		}

		.right {
			text-align: right;
			vertical-align: middle;
		}

		.bold { font-weight: bold; }

		table { border-collapse: collapse;}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td { border: none; padding: 0; }

		.dotted-underline { 
			padding: 0 15px;
			border-bottom: 1.5px dotted; 
		}

		.solid-underline { 
			padding: 0 15px;
			border-bottom: 1.5px solid; 
		}

		.border-left {
			border-left: 1.5px solid black;
		}

		.border-bottom {
			border-bottom: 1.5px solid black;
		}

		input[type="checkbox"] {
			margin-top: 1px;
			vertical-align: middle;
		}

		.pd5 {
			padding-bottom: 5px !important;
		}

		.v-center {
			vertical-align: middle !important;
		}
		
	</style>
	<script>
		function cetak() {
			setTimeout(function() { window.close() }, 300);
			window.print();
		}
	</script>
</head>
<body onload="cetak()">
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="38%">
					<div class="box-identitas">
						<table width="100%">
							<tr>
								<td width="30%">No. RM</td>
								<td width="1%">:</td>
								<td width="69%" class="bold"><?= $pasien->id_pasien ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->nama ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->tanggal_lahir !== '' ? datefmysql($pasien->tanggal_lahir) : '-') ?> (<?= createUmur($pasien->tanggal_lahir) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Kelamin</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->agama ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<h1 class="center bold" style="font-size: 12pt">ASUHAN KEPERAWATAN PASIEN HEMODIALISA</h1>
		<table width="100%" class="table-data">
			<tr>
				<td width="25%">Tanggal/Jam</td>
				<td width="25%" class="bold"><?= $asuhan_keperawatan->waktu ?></td>
				<td width="25%">Dx. Medis</td>
				<?php $ex_diag = explode(' ', $asuhan_keperawatan->dx_medis) ?>
				<td width="25%" class="bold"><?= $ex_diag[0] ?></td>
			</tr>
			<tr>
				<td>No. Mesin</td>
				<td class="bold"><?= $asuhan_keperawatan->no_mesin ?></td>
				<td>Hemodialisa Ke</td>
				<td class="bold"><?= $asuhan_keperawatan->hemodialisa_ke ?></td>
			</tr>
			<tr>
				<td class="center bold" colspan="4">PENGKAJIAN KEPERAWATAN</td>
			</tr>
			<tr>
				<td colspan="4">
					<!-- ubah json menjadi array -->
					<?php $keluhan_utama = json_decode($asuhan_keperawatan->keluhan_utama) ?>
					
					<span class="bold">Keluhan Utama : </span>
					<input type="checkbox" <?= ($keluhan_utama->sesak_nafas !== '' ? 'checked' : '') ?>>Sesak Nafas
					<input type="checkbox" <?= ($keluhan_utama->mual !== '' ? 'checked' : '') ?>>Mual
					<input type="checkbox" <?= ($keluhan_utama->muntah !== '' ? 'checked' : '') ?>>Muntah
					<input type="checkbox" <?= ($keluhan_utama->gatal !== '' ? 'checked' : '') ?>>Gatal
					<input type="checkbox" <?= ($keluhan_utama->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain : 
					<span><?= ($keluhan_utama->lain_lain !== '' ? '<span>' . $keluhan_utama->ket_lain_lain . '</span>' : '') ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border">
						<tr>
							<td width="28%">Riwayat Penyakit Sekarang</td>
							<td width="1%">:</td>
							<td width="82%" style="padding-bottom: 5px"><span class="dotted-underline bold"><?= $asuhan_keperawatan->riwayat_penyakit_sekarang ?></span></td>
						</tr>
						<tr>
							<td>Riwayat Penyakit Dahulu</td>
							<td>:</td>
							<td>
								<!-- ubah json menjadi array -->
								<?php $riwayat_penyakit_dahulu = json_decode($asuhan_keperawatan->riwayat_penyakit_dahulu) ?>

								<input type="checkbox" <?= ($riwayat_penyakit_dahulu->asma !== '' ? 'checked' : '') ?>>Asma
								<input type="checkbox" <?= ($riwayat_penyakit_dahulu->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi
								<input type="checkbox" <?= ($riwayat_penyakit_dahulu->jantung !== '' ? 'checked' : '') ?>>Jantung
								<input type="checkbox" <?= ($riwayat_penyakit_dahulu->diabetes !== '' ? 'checked' : '') ?>>Diabetes
								<input type="checkbox" <?= ($riwayat_penyakit_dahulu->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain : 
								<span><?= ($riwayat_penyakit_dahulu->lain_lain !== '' ? '<span class="dotted-underline bold">' . $riwayat_penyakit_dahulu->ket_lain_lain . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>
							<td>Riwayat Penyakit Keluarga</td>
							<td>:</td>
							<td>
								<!-- ubah json menjadi array -->
								<?php $riwayat_penyakit_keluarga = json_decode($asuhan_keperawatan->riwayat_penyakit_keluarga) ?>

								<input type="checkbox" <?= ($riwayat_penyakit_keluarga->asma !== '' ? 'checked' : '') ?>>Asma
								<input type="checkbox" <?= ($riwayat_penyakit_keluarga->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi
								<input type="checkbox" <?= ($riwayat_penyakit_keluarga->jantung !== '' ? 'checked' : '') ?>>Jantung
								<input type="checkbox" <?= ($riwayat_penyakit_keluarga->diabetes !== '' ? 'checked' : '') ?>>Diabetes
								<input type="checkbox" <?= ($riwayat_penyakit_keluarga->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain : 
								<span><?= ($riwayat_penyakit_keluarga->lain_lain !== '' ? '<span class="dotted-underline bold">' . $riwayat_penyakit_keluarga->ket_lain_lain . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>
							<?php $kebiasaan = json_decode($asuhan_keperawatan->kebiasaan) ?>
							<td>Kebiasaan</td>
							<td>:</td>
							<td>
								<span>Merokok : </span>
								<input type="checkbox" <?= ($kebiasaan->merokok->hasil === '0' ? 'checked' : '') ?>>Tidak
								<input type="checkbox" <?= ($kebiasaan->merokok->hasil === '1' ? 'checked' : '') ?>>Ya,
								<span><?= ($kebiasaan->merokok->ket_hasil !== '' ? '<span class="dotted-underline bold">' . $kebiasaan->merokok->ket_hasil . ' </span>Batang/hari' : '<span class="dotted-underline bold"></span>') ?></span>
								<span style="margin-left: 50px">Alkohol &nbsp;&nbsp;: </span>
								<input type="checkbox" <?= ($kebiasaan->alkohol->hasil === '0' ? 'checked' : '') ?>>Tidak
								<input type="checkbox" <?= ($kebiasaan->alkohol->hasil === '1' ? 'checked' : '') ?>>Ya,
								<span><?= ($kebiasaan->alkohol->ket_hasil !== '' ? '<span class="dotted-underline bold">' . $kebiasaan->alkohol->ket_hasil . '</span>Gelas/hari' : '<span class="dotted-underline bold"></span>') ?></span>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<span>Narkoba : </span>
								<input type="checkbox" <?= ($kebiasaan->narkoba->hasil === '0' ? 'checked' : '') ?>>Tidak
								<input type="checkbox" <?= ($kebiasaan->narkoba->hasil === '1' ? 'checked' : '') ?>>Ya,
								<span><?= ($kebiasaan->narkoba->ket_hasil !== '' ? '<span class="dotted-underline bold">' . $kebiasaan->narkoba->ket_hasil . '</span>' : '<span class="dotted-underline bold"></span>') ?></span>
							</td>
						</tr>
						<tr>
							<td>Alergi</td>
							<td>:</td>
							<td>
								<!-- ubah json menjadi array -->
								<?php $alergi = json_decode($asuhan_keperawatan->alergi) ?>

								<input type="checkbox" <?= ($alergi->hasil === 'Tidak' ? 'checked' : '') ?>>Tidak
								<input type="checkbox" <?= ($alergi->hasil === 'Tidak Tahu' ? 'checked' : '') ?>>Tidak Tahu
								<input type="checkbox" <?= ($alergi->hasil === 'Ya' ? 'checked' : '') ?>>Ya, 
								<span><?= ($alergi->hasil === 'Ya' ? '<span class="dotted-underline bold">' . $alergi->ket_hasil . '</span>' : '') ?></span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border">
						<tr>
							<td><span class="bold">RIWAYAT PSIKOSOSIAL :</span></td>
						</tr>
						<tr>
							<td width="28%">Hubungan pasien dengan keluarga</td>
							<td width="1%">:</td>
							<td wdiht="82%">
								<input type="checkbox" <?= ($asuhan_keperawatan->hubungan_pasien_dengan_keluarga === 'Baik' ? 'checked' : '') ?>>Baik
								<input type="checkbox" <?= ($asuhan_keperawatan->hubungan_pasien_dengan_keluarga === 'Tidak Baik' ? 'checked' : '') ?>>Tidak Baik
							</td>
						</tr>
					</table>
					<table width="100%" class="table-no-border">
						<tr>
							<td width="15%">Status Psikologis</td>
							<td width="1%">:</td>
							<td width="84%">
								<!-- ubah json menjadi array -->
								<?php $status_psikologis = json_decode($asuhan_keperawatan->status_psikologis) ?>

								<input type="checkbox" <?= ($status_psikologis->tenang !== '' ? 'checked' : '') ?>>Tenang
								<input type="checkbox" <?= ($status_psikologis->cemas !== '' ? 'checked' : '') ?>>Cemas
								<input type="checkbox" <?= ($status_psikologis->marah !== '' ? 'checked' : '') ?>>Marah
								<input type="checkbox" <?= ($status_psikologis->sedih !== '' ? 'checked' : '') ?>>Sedih
								<input type="checkbox" <?= ($status_psikologis->bunuh_diri !== '' ? 'checked' : '') ?>>Kecenderungan Bunuh Diri
								<input type="checkbox" <?= ($status_psikologis->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain : 
								<span><?= ($status_psikologis->lain_lain !== '' ? '<span class="dotted-underline bold">' . $status_psikologis->ket_lain_lain . '</span>' : '') ?></span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border">
						<tr>
							<td><span class="bold">STATUS EKONOMI DAN SOSIAL :</span></td>
						</tr>
						<tr>
							<td width="28%">Pekerjaan</td>
							<td width="1%">:</td>
							<td wdiht="82%"><?= $pasien->pekerjaan ?></td>
						</tr>
						<tr>
							<td>Cara Pembayaran</td>
							<td>:</td>
							<td><?= ($layanan->cara_bayar !== 'Tunai' ? strtoupper($layanan->cara_bayar) . '( ' . $layanan->penjamin . ')'  : strtoupper($layanan->cara_bayar)) ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border">
						<tr>
							<td><span class="bold">RIWAYAT PSIKOSOSIAL :</span></td>
						</tr>
						<tr>
							<td>Kegiatan keagamaan yang biasa dilakukan : <span class="dotted-underline bold"><?= $asuhan_keperawatan->kebiasaan_keagamaan ?></span></td>
						</tr>
						<tr>
							<td>Kemampuan beribadah (Khusus Muslim)</td>
						</tr>
					</table>
					<table width="100%" class="table-no-border">
						<tr>
							<td width="15%">Wajib Ibadah</td>
							<td width="1%">:</td>
							<td width="84%">
								<input type="checkbox" <?= ($asuhan_keperawatan->wajib_ibadah === 'Baligh' ? 'checked' : '') ?>>Baligh
								<input type="checkbox" <?= ($asuhan_keperawatan->wajib_ibadah === 'Belum Baligh' ? 'checked' : '') ?>>Belum Baligh
								<input type="checkbox" <?= ($asuhan_keperawatan->wajib_ibadah === 'Halangan Lain' ? 'checked' : '') ?>>Halangan Lain,
								<span><?= ($asuhan_keperawatan->wajib_ibadah === 'Halangan Lain' ? '<span class="dotted-underline bold">' . $asuhan_keperawatan->halangan_lain . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>
							<td>Thaharoh</td>
							<td>:</td>
							<td>
								<input type="checkbox" <?= ($asuhan_keperawatan->thaharoh === 'Berwudhu' ? 'checked' : '') ?>>Berwudhu
								<input type="checkbox" <?= ($asuhan_keperawatan->thaharoh === 'Tayamum' ? 'checked' : '') ?>>Tayamum
							</td>
						</tr>
						<tr>
							<td>Sholat</td>
							<td>:</td>
							<td>
								<input type="checkbox" <?= ($asuhan_keperawatan->shalat === 'Berdiri' ? 'checked' : '') ?>>Berdiri
								<input type="checkbox" <?= ($asuhan_keperawatan->shalat === 'Duduk' ? 'checked' : '') ?>>Duduk
								<input type="checkbox" <?= ($asuhan_keperawatan->shalat === 'Berbaring' ? 'checked' : '') ?>>Berbaring
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border">
						<tr>
							<td colspan="3"><span class="bold">PEMERIKSAAN FISIK :</span></td>
						</tr>
						<tr>
							<td width="15%">Kesadaran</td>
							<td width="1%">:</td>
							<td width="84%">
								<!-- ubah json menjadi array -->
								<?php $kesadaran = json_decode($asuhan_keperawatan->kesadaran) ?>

								<input type="checkbox" <?= ($kesadaran->composmentis !== '' ? 'checked' : '') ?>>Composmentis
								<input type="checkbox" <?= ($kesadaran->apatis !== '' ? 'checked' : '') ?>>Apatis
								<input type="checkbox" <?= ($kesadaran->delirium !== '' ? 'checked' : '') ?>>Delirium
								<input type="checkbox" <?= ($kesadaran->samnolen !== '' ? 'checked' : '') ?>>Samnolen
								<input type="checkbox" <?= ($kesadaran->sopor !== '' ? 'checked' : '') ?>>Sopor
								<input type="checkbox" <?= ($kesadaran->coma !== '' ? 'checked' : '') ?>>Coma
								<input type="checkbox" <?= ($kesadaran->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain : 
								<span><?= ($kesadaran->lain_lain !== '' ? '<span class="dotted-underline bold">' . $kesadaran->ket_lain_lain . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>
							<td>Tensi Darah</td>
							<td>:</td>
							<td style="padding-bottom: 5px">
								<span class="dotted-underline bold"><?= $asuhan_keperawatan->tensi ?></span>mmHg
								<span style="margin-left:50px">Nadi : </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->nadi ?></span>x/menit
								<span style="margin-left:50px">Pernafasan : </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->nafas ?></span>x/menit
								<span style="margin-left:50px">Suhu : </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->suhu ?></span>&#8451;
							</td>
						</tr>
						<tr>
							<td>Konjung tiva</td>
							<td>:</td>
							<td>
								<input type="checkbox" <?= ($asuhan_keperawatan->konjungtiva === '1' ? 'checked' : '') ?>>Anemis
								<input type="checkbox" <?= ($asuhan_keperawatan->konjungtiva === '0' ? 'checked' : '') ?>>Tidak Anemis
							</td>
						</tr>
						<tr>
							<td>Ekstermitas</td>
							<td>:</td>
							<td>
								<?php $ekstermitas = json_decode($asuhan_keperawatan->ekstermitas) ?>

								<input type="checkbox" <?= ($ekstermitas->tidak_edema !== '' ? 'checked' : '') ?>>Tidak Edema
								<input type="checkbox" <?= ($ekstermitas->dehidrasi !== '' ? 'checked' : '') ?>>Dehidrasi
								<input type="checkbox" <?= ($ekstermitas->edema !== '' ? 'checked' : '') ?>>Edema
								<input type="checkbox" <?= ($ekstermitas->edema_anasarka !== '' ? 'checked' : '') ?>>Edema Anasarka
								<input type="checkbox" <?= ($ekstermitas->pucat_dingin !== '' ? 'checked' : '') ?>>Pucat Dingin
							</td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td>:</td>
							<td style="padding-bottom: 5px">
								<span>Pre HD : </span><span class="solid-underline bold"><?= $asuhan_keperawatan->bb_pre_hd ?></span>Kg
								<span style="margin-left: 50px">BBK : </span><span class="solid-underline bold"><?= $asuhan_keperawatan->bb_bbk ?></span>Kg
								<span style="margin-left: 50px">Post HD yang lalu : </span><span class="solid-underline bold"><?= $asuhan_keperawatan->bb_post_hd_lalu ?></span>Kg
								<span style="margin-left: 50px">BB Post <HDr></HDr> : </span><span class="solid-underline bold"><?= $asuhan_keperawatan->bb_post_hd ?></span>Kg
							</td>
						</tr>
						<tr>
							<td>Akses Vaskuler</td>
							<td>:</td>
							<td>
								<?php $akses_vaskuler = json_decode($asuhan_keperawatan->akses_vaskuler) ?>

								<input type="checkbox" <?= ($akses_vaskuler->av_fistula !== '' ? 'checked' : '') ?>>AV Fistula
								<input type="checkbox" <?= ($akses_vaskuler->hd_kateter !== '' ? 'checked' : '') ?>>HD Kateter
								<input type="checkbox" <?= ($akses_vaskuler->subciavia !== '' ? 'checked' : '') ?>>Subciavia
								<input type="checkbox" <?= ($akses_vaskuler->jugular !== '' ? 'checked' : '') ?>>Jugular
								<input type="checkbox" <?= ($akses_vaskuler->femoral !== '' ? 'checked' : '') ?>>Femoral
								<span style="margin-left: 50px">Lokasi :</span>
								<input type="checkbox" <?= ($akses_vaskuler->lokasi->kanan !== '' ? 'checked' : '') ?>>Kanan
								<input type="checkbox" <?= ($akses_vaskuler->lokasi->kiri !== '' ? 'checked' : '') ?>>Kiri
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="center bold" colspan="2">PENILAIAN TINGKAT NYERI</td>
				<td class="center bold" colspan="2">SKRINING NUTRISI (Mainutrition Screening Tool Modifikasi)</td>
			</tr>
			<tr>
				<td class="center" colspan="2"><img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png" width="100%" height="15%"></td>
				<td colspan="2" rowspan="2">
					<table width="100%" class="table-no-border">
						<tr>
							<td width="85%"><span>Apakaah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak disengaja dalam 6 bulan terakhir</span></td>
							<td style="border-left: 1.5px solid black"></td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan === '1' ? 'checked' : '') ?>>Tidak</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 0</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan === '2' ? 'checked' : '') ?>>Tidak Yakin</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 2</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan === '3' ? 'checked' : '') ?>>Ya, ada penurunan berat BB sebanyak :</td>
							<td style="border-left: 1.5px solid black"></td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan_on === '1' ? 'checked' : '') ?> style="margin-left: 20px">1 - 5 Kg</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 1</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan_on === '2' ? 'checked' : '') ?> style="margin-left: 20px">6 - 10 Kg</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 2</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan_on === '3' ? 'checked' : '') ?> style="margin-left: 20px">11 - 15 Kg</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 3</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan_on === '4' ? 'checked' : '') ?> style="margin-left: 20px">> 15 Kg</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 4</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_penurunan_berat_badan_on === '5' ? 'checked' : '') ?> style="margin-left: 20px">Tidak tahu berapa Kg penurunannya</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 2</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="2" style="vertical-align: top">
					<input type="checkbox" <?= ($asuhan_keperawatan->penilaian_tingkat_nyeri === 'Tidak Nyeri' ? 'checked' : '') ?>>Tidak Ada Nyeri
					<input type="checkbox" <?= ($asuhan_keperawatan->penilaian_tingkat_nyeri === 'Nyeri Kronis' ? 'checked' : '') ?>>Nyeri Kronis
					<input type="checkbox" <?= ($asuhan_keperawatan->penilaian_tingkat_nyeri === 'Nyeri Akut' ? 'checked' : '') ?>>Nyeri Akut<br>
					<span>Skala Nyeri : </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->skala_nyeri ?></span>
					<span style="margin-left: 10px">Lokasi : </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->lokasi_skala_nyeri ?></span><br>
					<span>Keterangan : </span><br>
					<input type="checkbox" <?= ($asuhan_keperawatan->keterangan_tingkat_nyeri === '1' ? 'checked' : '') ?>>Ringan : 0-3<br>
					<input type="checkbox" <?= ($asuhan_keperawatan->keterangan_tingkat_nyeri === '2' ? 'checked' : '') ?>>Sedang : 4-6<br>
					<input type="checkbox" <?= ($asuhan_keperawatan->keterangan_tingkat_nyeri === '3' ? 'checked' : '') ?>>Berat : 7-10
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="2">
					<table width="100%" class="table-no-border">
						<tr>
							<td width="85%"><span>Apakah asupan makan pasien berkurang karena penurunan nafsu makan (atau karena kesulitan menerima makanan) ?</span></td>
							<td style="border-left: 1.5px solid black"></td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_asupan_makan === '0' ? 'checked' : '') ?>>Tidak</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 0</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($asuhan_keperawatan->sn_asupan_makan === '1' ? 'checked' : '') ?>>Ya</td>
							<td class="center" style="border-left: 1.5px solid black">Skor 1</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" rowspan="3" style="vertical-align: text-top">
					<span class="bold">STATUS FUNGSIONAL :</span><br>
					<input type="checkbox" <?= ($asuhan_keperawatan->status_fungsional === '1' ? 'checked' : '') ?>>Mandiri<br>
					<input type="checkbox" <?= ($asuhan_keperawatan->status_fungsional === '2' ? 'checked' : '') ?>>Perlu Bantuan, 
					<span><?= ($asuhan_keperawatan->status_fungsional === '2' ? '<span class="dotted-underline bold">' . $asuhan_keperawatan->sf_ket_perlu_bantuan . '</span>' : '') ?></span><br>
					<input type="checkbox" <?= ($asuhan_keperawatan->status_fungsional === '3' ? 'checked' : '') ?>>Ketergantungan total, dilaporkan ke dokter pukul  
					<span><?= ($asuhan_keperawatan->status_fungsional === '3' ? '<span class="dotted-underline bold">' . $asuhan_keperawatan->sf_ket_ketergantungan . '</span>' : '') ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" class="table-no-border">
						<tr>
							<td width="85%"><span class="bold">TOTAL</span></td>
							<td class="center" style="border-left: 1.5px solid black">Skor <?= $asuhan_keperawatan->total_sn ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span>Jika skor ≥ 2 : pasien mengalami resiko gizi kurang<br>Jika skor < 2 dengan jenis penyakit tertentu<br>(dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)</span>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<span class="bold">SKRINING RESIKO CEDERA / JATUH</span><br>
					<span>a. Perhatikan cara berjalan pasien saat akan duduk di kursi. Apakah pasien tampak seimbang (sempoyongan/limbung) ?</span>
					<input type="checkbox" <?= ($asuhan_keperawatan->src_a === '1' ? 'checked' : '') ?>>Ya
					<input type="checkbox" <?= ($asuhan_keperawatan->src_a === '0' ? 'checked' : '') ?>>Tidak<br>
					<span>b. Apakah pasien memegang pinggiran kursi atau meja atau beda lain sebagai penopang saat akan duduk ?</span>
					<input type="checkbox" <?= ($asuhan_keperawatan->src_b === '1' ? 'checked' : '') ?>>Ya
					<input type="checkbox" <?= ($asuhan_keperawatan->src_b === '0' ? 'checked' : '') ?>>Tidak<br>
					<span>Hasil : 
						<input type="checkbox" <?= ($asuhan_keperawatan->src_hasil === '1' ? 'checked' : '') ?>>Tidak beresiko (tidak ditemukan a dan b)
						<input type="checkbox" <?= ($asuhan_keperawatan->src_hasil === '2' ? 'checked' : '') ?>>Resiko rendah (ditemukan a atau b)
						<input type="checkbox" <?= ($asuhan_keperawatan->src_hasil === '3' ? 'checked' : '') ?>>Resiko tinggi (ditemukan a dan b)
					</span>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<span class="bold">Pemeriksaan Penunjang (lab, Rx, lain-lain) </span><span class="dotted-underline bold"><?= $asuhan_keperawatan->pemeriksaan_penunjang ?></span>
				</td>
			</tr>
			<tr>
				<td class="center bold" colspan="4">DIAGNOSA KEPERAWATAN</td>
			</tr>
		</table>
		<table width="100%" class="table-data" style="margin-top: -1px">
			<tr>
				<td width="33%">
					<!-- ubah json menjadi array -->
					<?php $diag = json_decode($asuhan_keperawatan->diagnosa_keperawatan) ?>

					<input type="checkbox" <?= ($diag->diag_keperawatan_1 !== '' ? 'checked' : '') ?>>1. Kelebihan volume cairan <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_2 !== '' ? 'checked' : '') ?>>2. Gangguan perfusi jaringan <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_3 !== '' ? 'checked' : '') ?>>3. Gangguan keseimbangan elektrolit				
				</td>
				<td width="33%">
					<input type="checkbox" <?= ($diag->diag_keperawatan_4 !== '' ? 'checked' : '') ?>>4. Penurunan curah jantung <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_5 !== '' ? 'checked' : '') ?>>5. Nutrisi kurang dari kebutuhan tubuh <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_6 !== '' ? 'checked' : '') ?>>6. Ketidakpatuhan terhadap diit
				</td>
				<td width="34%">
					<input type="checkbox" <?= ($diag->diag_keperawatan_7 !== '' ? 'checked' : '') ?>>7. Gangguan keseimbangan asam basa <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_8 !== '' ? 'checked' : '') ?>>8. Gangguan rasa nyaman : nyeri <br>
					<input type="checkbox" <?= ($diag->diag_keperawatan_9 !== '' ? 'checked' : '') ?>>
					<span><?= ($diag->diag_keperawatan_9 !== '' ? '<span class="dotted-underline bold">' . $diag->diag_keperawatan_lain . '</span>' : '<span class="dotted-underline bold"></span>') ?></span>
				</td>
			</tr>
		</table>
		<!-- <br>
		<div style="float: left">Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</div>
		<div style="float: right">FORM-KEP-46-02</div> -->
	</div>

	<!-- Hal 2 -->
	<div class="page page_break">
		<table width="100%" class="table-data">
			<tr>
				<td class="center bold" colspan="2">INTERVENSI KEPERAWATAN (rekapitulasi pre, intra dan post HD)</td>
			</tr>
			<tr style="vertical-align: top">
				<td width="50%">
				<?php $inv = json_decode($asuhan_keperawatan->intervensi_keperawatan) ?>

					<input type="checkbox" <?= ($inv->intervensi_keperawatan_1	 !== '' ? 'checked' : '') ?>>Monitor berat badan, intake output <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_3 !== '' ? 'checked' : '') ?>>Atur Posisi pasien agar ventilasi adekuat <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_5 !== '' ? 'checked' : '') ?>>Berikan terapi oksigen sesuai kebutuhan <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_7 !== '' ? 'checked' : '') ?>>Obervasi pasien (Monitor vital sign) dan mesin <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_9 !== '' ? 'checked' : '') ?>>Hentikan HD sesuai indikasi <br>
				</td>
				<td width="50%">
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_2 !== '' ? 'checked' : '') ?>>Monitor tanda dan gejala infeksi (lokal dan sistemik)<br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_4 !== '' ? 'checked' : '') ?>>Ganti balutan luka sesuai dengan prosedur <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_6 !== '' ? 'checked' : '') ?>>Monitor tanda dan gejala hipoglikemi <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_8 !== '' ? 'checked' : '') ?>>Lakukan teknik distraksi, relaksasi <br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_10 !== '' ? 'checked' : '') ?>>Bila pasien mulai hipotensi (mual, muntah, keringat dingin, pusing, kram, hipoglikemi berikan cairan sesuai SPO <br>

				</td>
			</tr>
			<tr style="vertical-align: top">
				<td>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_11	 !== '' ? 'checked' : '') ?>>Kaji kemampuan pasien mendapatkan nutrisi yang dibutuhkan<br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_13	 !== '' ? 'checked' : '') ?>>Poisikan Supinasi dengan Elevasi Kepala 30&deg; dan Elevasi Kaki<br>
				</td>
				<td>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_12	 !== '' ? 'checked' : '') ?>>PENKES : Diit, AV-shunt 
					<span><?= ($inv->intervensi_keperawatan_12 !== '' ? '<span class="dotted-underline bold">' . $inv->intervensi_keperawatan_av_shunt . '</span>' : '') ?></span><br>
					<input type="checkbox" <?= ($inv->intervensi_keperawatan_14	 !== '' ? 'checked' : '') ?>>Lain - lain :  
					<span><?= ($inv->intervensi_keperawatan_14 !== '' ? '<span class="dotted-underline bold">' . $inv->intervensi_keperawatan_lain . '</span>' : '') ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<span class="bold">Intervensi Kolaborasi :</span><br>
					<!-- ubah json menjadi array -->
					<?php $intervensi_kolaborasi = json_decode($asuhan_keperawatan->intervensi_kolaborasi) ?>

					<input type="checkbox" <?= ($intervensi_kolaborasi->program_hd !== '' ? 'checked' : '') ?>>Program HD
					<input type="checkbox" <?= ($intervensi_kolaborasi->transfusi_darah !== '' ? 'checked' : '') ?>>Transfusi Darah
					<input type="checkbox" <?= ($intervensi_kolaborasi->kolaborasi_diit !== '' ? 'checked' : '') ?>>Kolaborasi diit
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_ga_glueonas !== '' ? 'checked' : '') ?>>Pemberian Ga Glueonas
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antipiretik !== '' ? 'checked' : '') ?>>Pemberian Antipiretik
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_analgetik !== '' ? 'checked' : '') ?>>Pemberian Analgetik <br>
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_erytropoetin !== '' ? 'checked' : '') ?>>Pemberian Erytropoetin
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_preparat_besi !== '' ? 'checked' : '') ?>>Pemberian Preparat Besi
					<input type="checkbox" <?= ($intervensi_kolaborasi->obat_obat_emergensi !== '' ? 'checked' : '') ?>>Obat obat emergensi
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antibiotik !== '' ? 'checked' : '') ?>>Pemberian antibiotik
					<input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antibiotik !== '' ? 'checked' : '') ?>>Lain - lain : 
					<span><?= ($intervensi_kolaborasi->antibiotik !== '' ? '<span class="dotted-underline bold">' . $intervensi_kolaborasi->antibiotik . '</span>' : '') ?></span>
				</td>
			</tr>
		</table>
		<table width="100%" class="table-data" style="margin-top: -1px">
			<tr>
				<td colspan="2">
					<span class="bold">Intruksi Medik :</span><br>
					<?php $intruksi_medik = json_decode($asuhan_keperawatan->intruksi_medik) ?>

					<input type="checkbox" <?= ($intruksi_medik->inisiasi !== '' ? 'checked' : '') ?>>Inisiasi
					<input type="checkbox" <?= ($intruksi_medik->akut !== '' ? 'checked' : '') ?> style="margin-left: 50px">Akut
					<input type="checkbox" <?= ($intruksi_medik->rutin !== '' ? 'checked' : '') ?> style="margin-left: 50px">Rutin
					<input type="checkbox" <?= ($intruksi_medik->pre_op !== '' ? 'checked' : '') ?> style="margin-left: 50px">Pre Op
					<input type="checkbox" <?= ($intruksi_medik->sled !== '' ? 'checked' : '') ?> style="margin-left: 50px">Sled <br>
					
					<!-- <input type="checkbox" <!?= ($asuhan_keperawatan->im_time !== '' ? 'checked' : '') ?>>Time -->
					<input type="checkbox" <?= (!empty($asuhan_keperawatan->im_time) ? 'checked' : '') ?>>Time

					<span><?= ($asuhan_keperawatan->im_time !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->im_time . '</span>' : '<span class="solid-underline">-</span>') ?></span>
					<span style="margin-left: 20px">QB :<?= ($asuhan_keperawatan->im_qb !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->im_qb . '</span>' : '<span class="solid-underline">-</span>') ?>ml/mnt</span>
					<span style="margin-left: 20px">QD :<?= ($asuhan_keperawatan->im_qd !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->im_qd . '</span>' : '<span class="solid-underline">-</span>') ?>ml/mnt</span>
					<span style="margin-left: 20px">UF Goal :<?= ($asuhan_keperawatan->im_uf_goal !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->im_uf_goal . '</span>' : '<span class="solid-underline">-</span>') ?>ml</span> <br>
					
					<!-- <input type="checkbox" <!?= ($asuhan_keperawatan->im_profile_hd !== '' ? 'checked' : '') ?>>Profile HD : -->
					<input type="checkbox" <?= (!empty($asuhan_keperawatan->im_profile_hd) ? 'checked' : '') ?>>Profile HD :

					<span><?= ($asuhan_keperawatan->im_profile_hd !== '' ? '<span class="dotted-underline bold">' . $asuhan_keperawatan->im_profile_hd . '</span>' : '<span class="dotted-underline"></span>') ?></span>
				</td>
				<td style="vertical-align: top">
					<?php $im_dialisat = json_decode($asuhan_keperawatan->im_dialisat) ?>

					<span>Dialisat : <input type="checkbox" <?= ($im_dialisat->bicarbonat !== '' ? 'checked' : '') ?>>Bicarbonat</span><br>
					<span style="margin-left: 44px"><input type="checkbox" <?= ($im_dialisat->condusctivity !== '' ? 'checked' : '') ?>>Condusctivity</span><br>
					<span style="margin-left: 44px"><input type="checkbox" <?= ($im_dialisat->temperatur !== '' ? 'checked' : '') ?>>Temperatur</span>
				</td>
			</tr>
			<tr>
				<td width="33%" style="vertical-align: top">
					<input type="checkbox" <?= ($asuhan_keperawatan->heparin === '1' ? 'checked' : '') ?>>Free Heparin <br>
					<input type="checkbox" <?= ($asuhan_keperawatan->heparin === '2' ? 'checked' : '') ?>>Reguler Heparin <br>
					<input type="checkbox" <?= ($asuhan_keperawatan->heparin === '3' ? 'checked' : '') ?>>Minimal Heparin
				</td>
				<td width="33%">
					<table width="100%" class="table-no-border">
						<tr>
							<td class="pd5" widht="50%">Heparin Dosis Awal</td>
							<td class="pd5" width="1%">:</td>
							<td class="pd5" width="49%"><?= ($asuhan_keperawatan->heparin_dosis_awal !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->heparin_dosis_awal . '</span>' : '<span class="solid-underline">-</span>') ?>iu</span></td>
						</tr>
						<tr>
							<td class="pd5">Heparin Sirkulasi</td>
							<td class="pd5">:</td>
							<td class="pd5"><?= ($asuhan_keperawatan->heparin_dosis_sirkulasi !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->heparin_dosis_sirkulasi . '</span>' : '<span class="solid-underline">-</span>') ?>iu</span></td>
						</tr>
						<tr>
							<td class="pd5">Heparin Maintenance</td>
							<td class="pd5">:</td>
							<td class="pd5"><?= ($asuhan_keperawatan->heparin_dosis_maintenance !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->heparin_dosis_maintenance . '</span>' : '<span class="solid-underline">-</span>') ?>iu</span></td>
						</tr>
						<tr>
							<td class="pd5 center">Total</td>
							<td class="pd5">:</td>
							<td class="pd5"><?= ($asuhan_keperawatan->heparin_dosis_total !== '' ? '<span class="solid-underline bold">' . $asuhan_keperawatan->heparin_dosis_total . '</span>' : '<span class="solid-underline">-</span>') ?>iu</span></td>
						</tr>
					</table>
				</td>
				<td width="33%" style="vertical-align: top">
					<?php $im_dialiser = json_decode($asuhan_keperawatan->im_dialiser) ?>

					<span>Dialiser : <input type="checkbox" <?= ($im_dialiser->dialiser === 'Baru' ? 'checked' : '') ?>>Baru</span>
					<span style="margin-left: 30px"><input type="checkbox" <?= ($im_dialiser->dialiser === 'Reuse' ? 'checked' : '') ?>>Reuse Ke<span><?= ($im_dialiser->dialiser === 'Reuse' ? '<span class="solid-underline bold">' . $im_dialiser->ket_dialiser_reuse . '</span>' : '<span class="solid-underline">-</span>') ?></span></span><br>
					<span style="margin-left: 44px"><input type="checkbox" <?= ($im_dialiser->dialiser === 'TCV' ? 'checked' : '') ?>>TCV<span><?= ($im_dialiser->dialiser === 'TCV' ? '<span class="solid-underline bold">' . $im_dialiser->ket_dialiser_tcv . '</span>' : '<span class="solid-underline">-</span>') ?></span></span><br>

					<span>Tipe Dialiser : <input type="checkbox" <?= ($asuhan_keperawatan->im_dialiser_tipe === 'High Flux' ? 'checked' : '') ?>>High Flux</span>
					<span><input type="checkbox" <?= ($asuhan_keperawatan->im_dialiser_tipe === 'Low Flux' ? 'checked' : '') ?>>Low Flux</span>
				</td>
			</tr>
			<tr>
				<td class="center bold" colspan="3">TINDAKAN KEPERAWATAN</td>
			</tr>
		</table>
		<table width="100%" class="table-data" style="margin-top: -1px">
			<thead>
				<tr>
					<td class="center v-center bold" rowspan="2" width="10%">Observasi</td>
					<td class="center v-center" rowspan="2" width="10%">Jam</td>
					<td class="center v-center" rowspan="2" width="5%">QB</td>
					<td class="center v-center" rowspan="2" width="5%">UFR</td>
					<td class="center v-center" rowspan="10" width="7%">TD</td>
					<td class="center v-center" rowspan="2" width="5%">N</td>
					<td class="center v-center" rowspan="2" width="5%">RR</td>
					<td class="center v-center" rowspan="2" width="5%">Suhu</td>
					<td class="center v-center" colspan="4" width="5%">Inake (ml)</td>
					<td class="center v-center" colspan="2" width="5%">Output</td>
					<td class="center v-center" rowspan="2" width="20%" style="white-space: nowrap">Keterangan Lain</td>
					<td class="center v-center" rowspan="2" width="5%">Paraf</td>
				</tr>
				<tr>
					<td class="center v-center" width="8%">Nacl<br>0,9%</td>
					<td class="center v-center" width="8%">Dextrose<br>40%</td>
					<td class="center v-center" width="8%">Makan<br>Minum</td>
					<td class="center v-center" width="8%">Lain-<br>lain</td>
					<td class="center v-center" width="8%">UF<br>Tercapai</td>
					<td class="center v-center" width="8%">Lain-<br>lain</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="center v-center bold"><?= $asuhan_keperawatan->pre_hd->jenis_observasi ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_jam ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_qb ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_ufr ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_td ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_n ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_rr ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->observasi_suhu ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->intake_nacl ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->intake_dextrose ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->intake_makan_minum ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->intake_lain_lain ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->output_uf_tercapai ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->pre_hd->output_lain_lain ?></td>
					
					<?php $ket_pre_hd = json_decode($asuhan_keperawatan->pre_hd->keterangan_lain) ?>
					<td class="v-center">
						<span class="bold">S : </span><span><?= $ket_pre_hd->subject ?></span><br>
						<span class="bold">O : </span><span><?= $ket_pre_hd->objective ?></span><br>
						<span class="bold">A : </span><span><?= $ket_pre_hd->assessment ?></span><br>
						<span class="bold">P : </span><span><?= $ket_pre_hd->plan ?></span><br>
					</td>

					<td class="center v-center"><input type="checkbox" <?= ($asuhan_keperawatan->pre_hd->paraf !== '' ? 'checked' : '') ?>></td>
				</tr>
				<?php foreach ($asuhan_keperawatan->intra_hd as $key => $intra_hd) : ?>
					<tr>
						<td class="center v-center bold" rowspan=""><?= $intra_hd->jenis_observasi ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_jam ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_qb ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_ufr ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_td ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_n ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_rr ?></td>
						<td class="center v-center"><?= $intra_hd->observasi_suhu ?></td>
						<td class="center v-center"><?= $intra_hd->intake_nacl ?></td>
						<td class="center v-center"><?= $intra_hd->intake_dextrose ?></td>
						<td class="center v-center"><?= $intra_hd->intake_makan_minum ?></td>
						<td class="center v-center"><?= $intra_hd->intake_lain_lain ?></td>
						<td class="center v-center"><?= $intra_hd->output_uf_tercapai ?></td>
						<td class="center v-center"><?= $intra_hd->output_lain_lain ?></td>
						<td class="center v-center"><?= $intra_hd->keterangan_lain ?></td>
						<td class="center v-center"><input type="checkbox" <?= ($intra_hd->paraf !== '' ? 'checked' : '') ?>></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td class="center v-center bold" rowspan="2"><?= $asuhan_keperawatan->post_hd->jenis_observasi ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_jam ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_qb ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_ufr ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_td ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_n ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_rr ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->observasi_suhu ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->intake_nacl ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->intake_dextrose ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->intake_makan_minum ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->intake_lain_lain ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->output_uf_tercapai ?></td>
					<td class="center v-center"><?= $asuhan_keperawatan->post_hd->output_lain_lain ?></td>
					<td class="v-center"><span class="bold">Kt/v : </span><?= $asuhan_keperawatan->post_hd->keterangan_lain ?></td>
					<td class="center v-center"><input type="checkbox" <?= ($asuhan_keperawatan->post_hd->paraf !== '' ? 'checked' : '') ?>></td>
				</tr>
				<tr>
					<?php  
						$total_intake = $asuhan_keperawatan->post_hd->intake_nacl;
						$total_intake += $asuhan_keperawatan->post_hd->intake_dextrose;
						$total_intake += $asuhan_keperawatan->post_hd->intake_makan_minum;
						$total_intake += $asuhan_keperawatan->post_hd->intake_lain_lain;

						$total_output = $asuhan_keperawatan->post_hd->output_uf_tercapai + $asuhan_keperawatan->post_hd->output_lain_lain;
						$balance = $total_intake - $total_output;
						
						
					?>
					<td class="right v-center" colspan="7"><span class="bold">Jumlah : </span></td>
					<td class="center v-center" colspan="4"><?= $total_intake; ?></td>
					<td class="center v-center" colspan="2"><?= $total_output ?></td>
					<td><span class="bold">Balance: </span><?= $balance ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table width="100%" class="table-data" style="margin-top: -1px">
			<tr>
				<td colspan="2">
					<table width="100%" class="table-no-border">
						<tr>
							<td colspan="9">
								<span class="bold">Penyakit Selama HD :</span>
							</td>
						</tr>
						<tr>
							<?php $penyakit_selama_hd = json_decode($asuhan_keperawatan->penyakit_selama_hd) ?>

							<td><input type="checkbox" <?= ($penyakit_selama_hd->masalah_akses !== '' ? 'checked' : '') ?>>Masalah Akses</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->pendarahan !== '' ? 'checked' : '') ?>>Pendarahan</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->first_use_syndrom !== '' ? 'checked' : '') ?>>First Use Syndrom</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->sakit_kepala !== '' ? 'checked' : '') ?>>Sakit Kepala</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->mual_muntah !== '' ? 'checked' : '') ?>>Mual & Muntah</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->kram_otot !== '' ? 'checked' : '') ?>>Kram Otot</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->hiperkalemia !== '' ? 'checked' : '') ?>>Hiperkalemia</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->hipotensi !== '' ? 'checked' : '') ?>>Hipotensi</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi</td>
						</tr>
						<tr>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->nyeri_dada !== '' ? 'checked' : '') ?>>Nyeri Dada</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->aritmia !== '' ? 'checked' : '') ?>>Aritmia</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->gatal_gatal !== '' ? 'checked' : '') ?>>Gatal gatal</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->demam !== '' ? 'checked' : '') ?>>Demam</td>
							<td><input type="checkbox" <?= ($penyakit_selama_hd->menggigil !== '' ? 'checked' : '') ?>>Menggigil/dingin</td>
							<td colspan="4">
								<input type="checkbox" <?= ($penyakit_selama_hd->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain
								<span><?= ($penyakit_selama_hd->lain_lain !== '' ? '<span class="dotted-underline bold">' . $penyakit_selama_hd->ket_lain_lain . '</span>' : '') ?></span>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php $evaluasi_keperawatan = json_decode($asuhan_keperawatan->evaluasi_keperawatan) ?>

					<span class="bold">EVALUASI KEPERAWATAN : </span><br>
					<span class="bold">Subject : </span><?= $evaluasi_keperawatan->subject ?><br>
					<span class="bold">Objective : </span><?= $evaluasi_keperawatan->objective ?><br>
					<span class="bold">Assessment : </span><?= $evaluasi_keperawatan->assessment ?><br>
					<span class="bold">Plan : </span><?= $evaluasi_keperawatan->plan ?>
				</td>
			</tr>
			<tr>
				<td style="height: 100px; vertical-align: top;" colspan="2"><span class="bold">DISCHART PLANNING : </span><br><?= $asuhan_keperawatan->dischart_planning ?></td>
			</tr>
			<tr>
				<td style="height: 50px">Akses Vaskuler oleh : ................................................</td>
				<td style="vertical-align: top" class="center">Nama dan tanda tangan perawat yang bertugas</td>
			</tr>
			<tr>
				<td colspan="2" class="center bold">EVALUASI MEDIK</td>
			</tr>
		</table>
		<table width="100%" class="table-data" style="margin-top: -1px">
			<tr>
				<td width="33%" class="center bold">Obat</td>
				<td width="33%" class="center bold">Catatan Medis</td>
				<td width="33%" class="center bold">Ttd & Nama Dokter</td>
			</tr>
			<tr>
				<td style="height: 100px"></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<!-- <br> -->
		<!-- <div style="float: left">Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</div>
		<div style="float: right">FORM-KEP-46-02</div> -->
	</div>
</body>
</html>