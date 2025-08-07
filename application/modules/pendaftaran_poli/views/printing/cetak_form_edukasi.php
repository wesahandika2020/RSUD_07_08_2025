<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background-color: #FAFAFA;
		}
		* {
			font-size: 9pt; 
			font-family: Arial, Helvetica, sans-serif;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
		}

		@media all {
		body {
			table-layout:fixed;
			height:auto;
			}
			
			@page {
			/* settingan kertas untuk F4 */
			size: 8.27in 12.99in landscape;
			padding:0.5cm;
			}
		}
		h1 { font-size: 20px; margin-bottom: 0; }
		.box-identitas { border: 1.5px solid black; padding: 5px; border-radius: 10px; }
		.center { text-align: center; vertical-align: middle; }
		.right { text-align: right; vertical-align: middle; }
		.bold { font-weight: bold; }
		.table-no-border tr td { border: none; padding: 2px 3px; }
		.dotted-underline { padding: 0 15px; border-bottom: 1.5px dotted; }
		.solid-underline { padding: 0 15px; border-bottom: 1.5px solid; }
		.border-left { border-left: 1.5px solid black; }
		.border-bottom { border-bottom: 1.5px solid black; }
		input[type="checkbox"] { margin-top: 1px; vertical-align: middle; }
		.pd5 { padding-bottom: 5px !important; }
		.v-center { vertical-align: middle !important; }
		#table-detail th, #table-detail td { border: 1px solid black; padding: 5px 5px; }
		#table-detail { border-collapse: collapse; }
		/* .table-data tr td { border: 1.5px solid black; padding: 2px 5px; } */
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
		<br>
		<h1 class="bold center"><?= $title ?></h1>
		<br>
		<table width="100%">
			<tr>
				<td colspan="3" class="bold">PERSIAPAN EDUKASI/BELAJAR</td>
			</tr>
			<tr>
				<td width="20%">Kesediaan Menerima Informasi</td>
				<td width="1%">:</td>
				<td width="79%">
					<input type="checkbox" <?= $edukasi->sedia_menerima_info == '1' ? 'checked' : '' ?>>Ya&nbsp;
					<input type="checkbox" <?= $edukasi->sedia_menerima_info == '0' ? 'checked' : '' ?>>Tidak
				</td>
			</tr>
			<tr>
				<td>Bahasa</td>
				<td>:</td>
				<td>
					<input type="checkbox" <?= $edukasi->bahasa == 'Indonesia' ? 'checked' : '' ?>>Indonesia&nbsp;
					<input type="checkbox" <?= $edukasi->bahasa == 'Inggris' ? 'checked' : '' ?>>Inggris&nbsp;
					<input type="checkbox" <?= $edukasi->bahasa == 'Lain-lain' ? 'checked' : '' ?>>Lain-lain,
					<?= $edukasi->bahasa == 'Lain-lain' ? '<span class="dotted-underline">'.$edukasi->ket_bahasa_lain.'</span>' : '<span class="dotted-underline"></span>' ?>
					<span style="margin-left:50px">Daerah,</span><?= $edukasi->ket_bahasa_daerah != '' ? '<span class="dotted-underline">'.$edukasi->ket_bahasa_daerah.'</span>' : '<span class="dotted-underline"></span>' ?>
				</td>
			</tr>
			<tr>
				<td>Kebutuhan Penterjemah</td>
				<td>:</td>
				<td>
					<input type="checkbox" <?= $edukasi->butuh_penterjemah == '1' ? 'checked' : '' ?>>Ya&nbsp;
					<input type="checkbox" <?= $edukasi->butuh_penterjemah == '0' ? 'checked' : '' ?>>Tidak
				</td>
			</tr>
			<tr>
				<td>Pendidikan Pasien</td>
				<td>:</td>
				<td>
					<span id="edu_pendidikan_pasien">
				</td>
			</tr>
			<tr>
				<td>Baca dan Tulis</td>
				<td>:</td>
				<td>
					<input type="checkbox" <?= $edukasi->baca_tulis == 'Baik' ? 'checked' : '' ?>>Baik&nbsp;
					<input type="checkbox" <?= $edukasi->baca_tulis == 'Kurang' ? 'checked' : '' ?>>Kurang
				</td>
			</tr>
			<tr>
				<td>Pilihan Tipe Pembelajaran</td>
				<td>:</td>
				<td>
					<input type="checkbox" <?= $edukasi->tipe_pembelajaran == 'Verbal' ? 'checked' : '' ?>>Verbal&nbsp;
					<input type="checkbox" <?= $edukasi->tipe_pembelajaran == 'Tulisan' ? 'checked' : '' ?>>Tulisan
				</td>
			</tr>
			<tr>
				<td>Hambatan Edukasi</td>
				<td>:</td>
				<td>
					<input type="checkbox" <?= $edukasi->hambatan_edukasi == 'Tidak Ada' ? 'checked' : '' ?>>Tidak Ada
					<input type="checkbox" <?= $edukasi->hambatan_edukasi == 'Penglihatan Terganggu' ? 'checked' : '' ?>>Penglihatan Terganggu
					<input type="checkbox" <?= $edukasi->hambatan_edukasi == 'Bahasa' ? 'checked' : '' ?>>Bahasa
					<input type="checkbox" <?= $edukasi->hambatan_edukasi == 'Lain-lain' ? 'checked' : '' ?>>Lain-lain,
					<?= $edukasi->hambatan_edukasi == 'Lain-lain' ? '<span class="dotted-underline">'.$edukasi->ket_hambatan_edukasi.'</span>' : '<span class="dotted-underline"></span>' ?>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="bold">PERENCANAAN EDUKASI</td>
			</tr>
			<tr>
				<td colspan="3">
					<?php $perencanaan_edukasi = explode(', ', $edukasi->perencanaan_edukasi); ?>
					<input type="checkbox" <?php if(in_array("Administrasi", $perencanaan_edukasi)) { echo "checked"; } ?>>Administrasi
					<input type="checkbox" <?php if(in_array("Penyakit", $perencanaan_edukasi)) { echo "checked"; } ?>>Penyakit
					<input type="checkbox" <?php if(in_array("Penggunaan Obat", $perencanaan_edukasi)) { echo "checked"; } ?>>Penggunaan Obat
					<input type="checkbox" <?php if(in_array("Peralatan Medis", $perencanaan_edukasi)) { echo "checked"; } ?>>Peralatan Medis
					<input type="checkbox" <?php if(in_array("Diet/Gizi", $perencanaan_edukasi)) { echo "checked"; } ?>>Diet/Gizi
					<input type="checkbox" <?php if(in_array("Rehabilitasi Medik", $perencanaan_edukasi)) { echo "checked"; } ?>>Rehabilitasi Medik
					<input type="checkbox" <?php if(in_array("Pelayanan Spiritual", $perencanaan_edukasi)) { echo "checked"; } ?>>Pelayanan Spiritual
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
		</table>
		<br>
		<table width="100%" id="table-detail">
			<tr>
				<th class="bold center v-center" rowspan="2" width="20%" colspan="2">Kebutuhan Edukasi<br>Topik Edukasi</th>
				<th class="bold center v-center" rowspan="2" width="7%">Tanggal Edukasi</th>
				<th class="bold center v-center" colspan="2">Sasaran Edukasi</th>
				<th class="bold center v-center" colspan="2">Edukator</th>
				<th class="bold center v-center" rowspan="2" width="10%">Tingkat Pemahaman Awal</th>
				<th class="bold center v-center" rowspan="2" width="10%">Metoda Edukasi</th>
				<th class="bold center v-center" rowspan="2" width="10%">Media Edukasi</th>
				<th class="bold center v-center" rowspan="2" width="10%">Evaluasi</th>
				<th class="bold center v-center" rowspan="2" width="10%">Tanggal Re-Edukasi</th>
			</tr>
			<tr>
				<th class="bold center v-center" width="10%">Nama & Hubungan dengan Pasien</th>
				<th class="bold center v-center" width="10%">TTD</th>
				<th class="bold center v-center" width="10%">Nama</th>
				<th class="bold center v-center" width="10%">TTD</th>
			</tr>
			<?php $i = 1; foreach ($edukasi->detail as $row) : ?>
				<tr>
					<td class="center" width="2%"><?= $i++ ?></td>
					<td>
						<?= $row->topik_edukasi ?><br>
						<em><?= $row->keterangan ?> : <?= $row->ket_topik_edukasi ?></em>
					</td>
					<td class="center"><?= datefmysql($row->tanggal_edukasi) ?></td>
					<td class="center">
						<?= $row->nama_keluarga ?><br>
						(<?= $row->status_hubungan ?>)
					</td>
					<td class="center">
						<img src="<?= base_url("resources/images/form_epkt/") . $row->ttd_keluarga ?>" alt="signature-keluarga" width="100px">
					</td>
					<td class="center"><?= $row->edukator ?></td>
					<td>
						<img src="<?= base_url("resources/images/form_epkt/") . $row->ttd_edukator ?>" alt="signature-edukator" width="100px">
					</td>
					<td class="center"><?= $row->tingkat_pemahaman_awal ?></td>
					<td class="center"><?= $row->metoda_edukasi ?></td>
					<td class="center"><?= $row->media_edukasi ?></td>
					<td class="center"><?= $row->evaluasi ?></td>
					<td class="center"><?= datefmysql($row->tanggal_re_edukasi) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>