<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
<script>
	function cetak() {
		setTimeout(function() { window.close() }, 300);
		window.print();
	}
</script>
<style>
	* {
		line-height: 12pt;
		font-size: 11pt;
		/* font-family: 'Calibri'; */
	}

	.list-data {
		border-left: 1px solid #000;
		border-top: 1px solid #000;
		border-spacing: 0;
	}

	.list-data th, .list-data td {
		border-right: 1px solid #000;
		border-bottom: 1px solid #000;
		height: 20px;
	}
	
	.list-data tr {
		vertical-align: text-top;
	}

	.td-top > tbody > tr > td {
		vertical-align: top;
	}

	.bold {
		font-weight: bold;
	}
</style>
<title>.: <?= $title ?> :.</title>
<?php foreach ($fisioterapi->detail as $i => $dataFisioterapi) : ?>
	<body onload="cetak()">	
		<!-- Content -->
		<div class="page">
			<table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #000;">
				<tr>
					<td rowspan="3" style="width:70px"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
					<td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b></td>
					<td rowspan="3" style="width:70px">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;"><?= strtoupper($hospital->alamat) ?></b></td>
				</tr>
				<tr>
					<td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="td-top">
				<tr>
					<td width="15%">No. RM</td>
					<td width="1%">:</td>
					<td width="34%" class="bold"><?= $pendaftaran['pasien']->nama ?></td>
					<td></td>
					<td width="20%"></td>
					<td width="1%"></td>
					<td width="29%" class="bold"></td>
				</tr>
				<tr>
					<td>No. Fisioterapi</td>
					<td>:</td>
					<td class="bold"><?= $fisioterapi->kode ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="bold"></td>
				</tr>
				<tr>
					<td>Nama Pasien</td>
					<td>:</td>
					<td class="bold"><?= $pendaftaran['pasien']->nama ?></td>
					<td></td>
					<td>Tgl. Lahir/Umur</td>
					<td>:</td>
					<td class="bold"><?= datefmysql($pendaftaran['pasien']->tanggal_lahir) ?> (<?= createUmur($pendaftaran['pasien']->tanggal_lahir) ?> Tahun)</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td class="bold"><?= $pendaftaran['pasien']->alamat ?></td>
					<td></td>
					<td>Kelamin</td>
					<td>:</td>
					<td class="bold"><?= (($pendaftaran['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan')) ?></td>
				</tr>
				<tr>
					<td>Jenis Layanan</td>
					<td>:</td>
					<td class="bold"><?= $pendaftaran['layanan']->jenis_layanan ?> <?= (($pendaftaran['layanan']->jenis_layanan === 'Poliklinik' ? $pendaftaran['layanan']->layanan : '')) ?></td>
					<td></td>
					<td>Dokter</td>
					<td>:</td>
					<td class="bold"><?= $fisioterapi->dokter_pjwb ?></td>
				</tr>
				<tr>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
				<tr>
					<td>Rontgen</td>
					<td>:</td>
					<td class="bold"><?= $fisioterapi->kode ?></td>
					<td></td>
					<td>Tanggal</td>
					<td>:</td>
					<td class="bold"><?= (($fisioterapi->waktu_konfirm !== null) ? datetimefmysql($fisioterapi->waktu_konfirm) : '') ?></td>
				</tr>
				<tr>
					<td>Pemeriksaan</td>
					<td>:</td>
					<td class="bold"><?= $dataFisioterapi->layanan ?></td>
					<td></td>
					<td>Waktu Hasil</td>
					<td>:</td>
					<td class="bold"><?= (($fisioterapi->waktu_hasil !== null) ? time_reformat($fisioterapi->waktu_hasil, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
				</tr>
			</table>
			<br><br>

			<b style="font-weight:bold">HASIL PEMERIKSAAN : </b>
			<div><?= $dataFisioterapi->hasil ?></div>
			<br><br>

			<table width="100%">
				<tr><td></td><td></td></tr>
				<tr><td colspan="2" align="right"></td></tr>
				<tr>
					<td>
						<p align="left">
							Dokter yang memeriksa : 
							<br><br><br><br><br><br><br>
							<?= $fisioterapi->dokter_pjwb ?>
							<br>NIP. <?= $fisioterapi->nip_dokter_pjwb ?>
						</p>
					</td>
					<td></td>
				</tr>
			</table>
			<br><br>
		</div>
	</body>	
<?php endforeach; ?>