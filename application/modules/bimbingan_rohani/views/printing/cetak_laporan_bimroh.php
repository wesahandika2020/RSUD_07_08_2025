<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Pemulasaran Jenazah</title>
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

		.bold {
			font-weight: bold;
		}

		table {
			border-collapse: collapse;
		}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td {
			border: none;
			padding: 2px 3px;
		}

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
			setTimeout(function () {
				window.close()
			}, 300);
			window.print();
		}

	</script>
</head>

<body onload="cetak()">
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
				<td width="38%">
					<div class="box-identitas">
						<table width="100%">
							<tr>
								<td width="30%">No. RM</td>
								<td width="1%">:</td>
								<td width="69%" class="bold"><?= $bimbingan_rohani->id_pasien ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $bimbingan_rohani->nama ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold">
									<?= ($bimbingan_rohani->tanggal_lahir !== '' ? datefmysql($bimbingan_rohani->tanggal_lahir) : '-') ?>
									(<?= createUmur2($bimbingan_rohani->tanggal_lahir) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Kelamin</td>
								<td>:</td>
								<td class="bold">
									<?= ($bimbingan_rohani->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td class="bold"><?= $bimbingan_rohani->agama ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">Form Permohonan Pendamping Talqin Pasien Sakaratul Maut</h1>
		<hr>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">NAMA PERAWAT</td>
				<td width="30%" class="bold"><?= $bimbingan_rohani->petugas_bimroh ?></td>
				<td width="15%">JENIS KELAMIN</td>
				<td width="40%" class="bold">
					<?= ($bimbingan_rohani->jk_petugas_bimroh === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
			</tr>
			<tr>
				<td width="15%">RUANG</td>
				<td width="85%" class="bold" colspan="3"><?= $bimbingan_rohani->ruangan_talqin ?></td>
			</tr>
			<tr>
				<td class="bold" colspan="4">Memohon Pendamping Talqin</td>
			</tr>
			<tr>
				<td width="15%">NAMA LENGKAP</td>
				<td width="30%" class="bold"><?= $bimbingan_rohani->nama ?></td>
				<td width="15%">JENIS KELAMIN</td>
				<td class="bold"><?= ($bimbingan_rohani->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
			</tr>
			<tr>
				<td width="15%">TANGGAL LAHIR</td>
				<td class="bold" colspan="4">
					<?= ($bimbingan_rohani->tanggal_lahir !== '' ? datefmysql($bimbingan_rohani->tanggal_lahir) : '-') ?>
					(<?= createUmur2($bimbingan_rohani->tanggal_lahir) ?> Tahun)</td>
			</tr>
			<tr>
				<td width="15%">ALAMAT</td>
				<td width="85%" class="bold" colspan="4"><?= $bimbingan_rohani->alamat ?></td>
			</tr>
			<tr>
				<td width="15%" style="padding-bottom: 10px; padding-top: 10px;">KONDISI PASIEN</td>
				<td class="bold" colspan="4"><?= $bimbingan_rohani->kondisi_pasien ?></td>
			</tr>
			<tr>
				<td style="padding-bottom: 10px; padding-top: 10px;">TERAPI / ADVICE</td>
				<td colspan="2">WAKTU PANGGILAN : <?= $bimbingan_rohani->waktu_panggilan ?></td>
				</td>
				<td colspan="2">WAKTU MERESPON : <?= $bimbingan_rohani->waktu_konfirmasi ?> </td>
			</tr>
			<tr>
				<td rowspan="3" style="padding-bottom: 100px;"><?= $bimbingan_rohani->terapi ?></td>
			</tr>
			<tr>
				<td colspan="3" style="padding-bottom: 10px; padding-top: 10px;">TANGERANG, <span class=""><?php echo @date('d-m-Y'); ?></td>
			</tr>			
			<tr>
				<td rowspan="1" colspan="2" style="padding-top: 10px;">KELUARGA PASIEN <br>
					<p style="padding-top: 50px;">(ISI KELUARGA PASIEN)</p>
				</td>
				<td rowspan="1" colspan="2" style="padding-top: 10px;">PETUGAS PENDAMPING TALQIN <br>
					<p style="padding-top: 50px;">(ISI PETUGAS PENDAMPING TALQIN)</p>
				</td>
				</tr>
		</table>
	</div>
</body>

</html>
