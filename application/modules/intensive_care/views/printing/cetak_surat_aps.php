<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 9pt;
		}

		.bold { font-weight: bold; }
		.center { text-align: center; }
		.box-identitas { border: 1.5px solid black; padding: 15px 10px; }
		.ml-2 { margin-left: 20px; }
		.table-aps tr td {
			height: 30px;
		}

		.table-aps-covid tr td {
			height: 27px;
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
	<?php if ($detail->jenis_surat === 'APS') : ?>
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="14%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="42%">
					<div class="box-identitas center">
						<span class="bold" style="font-size:10pt">SURAT PERNYATAAN PULANG RAWAT <br> ATAS PERMINTAAN SENDIRI (APS)</span>
					</div>
				</td>
			</tr>
		</table>
		<br>
		<div class="box-identitas">
			<table width="100%" style="font-size:11pt;" class="table-aps">
				<tr>
					<td colspan="3">Saya yang bertanda tangan dibawah ini :</td>
				</tr>
				<tr>
					<td width="25%"><span class="ml-2">Nama</span></td>
					<td width="1%">:</td>
					<td width="64%" class="bold"><?= $detail->nama ?> (<?= $detail->kelamin ?>)</td>
				</tr>
				<tr>
					<td><span class="ml-2">Umur</span></td>
					<td>:</td>
					<td class="bold"><?= createUmur2($detail->tanggal_lahir) ?> Tahun</td>
				</tr>
				<tr>
					<td><span class="ml-2">No. KTP</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->nik ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">Alamat</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->alamat ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">Telepon</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->no_telp ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3">Dalam hal ini yang bertindak atas nama atau mewakili : <span class="bold"><?= $detail->status_hubungan ?></span></td>
				</tr>
				<tr>
					<td><span class="ml-2">Nama</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->pasien ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">No. RM</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->no_rm ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">Umur</span></td>
					<td>:</td>
					<td class="bold"><?= hitungUmur($detail->tgl_lahir_pasien) .' (' . datefmysql($detail->tgl_lahir_pasien) . ') ' ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">Kelas/Kamar</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->bangsal .' ('. $detail->kelas . ')' ?></td>
				</tr>
				<tr>
					<td><span class="ml-2">Dokter yang Merawat</span></td>
					<td>:</td>
					<td class="bold"><?= $detail->dokter_merawat ?></td>
				</tr>
			</table>
			<p style="text-align: justify; line-height: 1.6;">Atas permintaan sendiri pulang/keluar dari perawatan di <?= $hospital->nama ?><br> 
			Kami bertanggung jawab atas segala akibat yang mungkin terjadi atas kesehatan pasien tersebut diatas,<br>
			oleh karena menurut dokter belum boleh pulang/keluar dari perawatan di <?= $hospital->nama ?>
			</p>
			<br>
			<p><span class="bold">Alasan :</span> <?= ($detail->alasan !== '' ? $detail->alasan : '-' ) ?></p>
			<br>
			<table width="100%">
				<tr>
					<td width="33%" class="center">Mengetahui,</td>
					<td width="33%"></td>
					<?php  
						$split = explode(' ', $detail->waktu);
						$date = datefmysql($split[0]);
						$time = $split[1];
					?>
					<td width="33%" class="center">Tangerang, <span class="bold"><?= $date ?></span></td>
				</tr>
				<tr>
					<td class="center">Dokter yang Merawat</td>
					<td></td>
					<td class="center">Pukul : <span class="bold"><?= $time ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="center">Yang membuat pernyataan.</td>
				</tr>
				<tr>
					<td style="height: 100px;"></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="center bold"><?= $detail->dokter_merawat ?></td>
					<td></td>
					<td class="center">(...............................................)</td>
				</tr>
				<tr>
					<td class="center">Nama & Tanda Tangan</td>
					<td></td>
					<td class="center">Nama & Tanda Tangan</td>
				</tr>
			</table>
		</div>
	</div>
	<?php elseif($detail->jenis_surat === 'APS Covid') : ?>
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="14%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="42%">
					<!-- <div class="box-identitas center">
						
					</div> -->
				</td>
			</tr>
		</table>
		<br>
		<div class="bold center" style="font-size:12pt">SURAT PERNYATAAN PULANG RAWAT <br> ATAS PERMINTAAN SENDIRI (APS)</div>
		<table width="100%" style="font-size:11pt;" class="table-aps-covid">
			<tr>
				<td colspan="3" class="bold">Saya yang bertanda tangan dibawah ini :</td>
			</tr>
			<tr>
				<td width="25%"><span class="ml-2">Nama</span></td>
				<td width="1%">:</td>
				<td width="64%"><?= $detail->nama ?> (<?= $detail->kelamin ?>)</td>
			</tr>
			<tr>
				<td><span class="ml-2">Tanggal Lahir</span></td>
				<td>:</td>
				<td><?= datefmysql($detail->tanggal_lahir) ?> / <?= createUmur2($detail->tanggal_lahir) ?> Tahun</td>
			</tr>
			<tr>
				<td><span class="ml-2">No. KTP</span></td>
				<td>:</td>
				<td><?= $detail->nik ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">Hubungan dengan Pasien</span></td>
				<td>:</td>
				<td><?= $detail->status_hubungan ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">Alamat</span></td>
				<td>:</td>
				<td><?= $detail->alamat ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">Telepon</span></td>
				<td>:</td>
				<td><?= $detail->no_telp ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" class="bold">Menyatakan bertanggung jawab terhadap pasien :</td>
			</tr>
			<tr>
				<td><span class="ml-2">Nama</span></td>
				<td>:</td>
				<td><?= $detail->pasien ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">NIK</span></td>
				<td>:</td>
				<td><?= $detail->nik ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">No. RM</span></td>
				<td>:</td>
				<td><?= $detail->no_rm ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">Tanggal Lahir</span></td>
				<td>:</td>
				<td><?= datefmysql($detail->tgl_lahir_pasien) . '/' .  hitungUmur($detail->tgl_lahir_pasien) ?></td>
			</tr>
			<tr>
				<td><span class="ml-2">Alamat</span></td>
				<td>:</td>
				<td><?= $detail->alamat ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" class="bold">Untuk membawa pulang pasien tersebut dengan alasan :</td>
			</tr>
		</table>
		<p><?= $detail->alasan ?></p>
		<p style="text-align: justify; line-height: 1.3;">
			Saya berjanji akan mengurus pasien atas nama <span class="bold"><?= $detail->pasien ?></span> kami akan mengikuti standar
			prosedur kesehatan yaitu selalu memakai masker, jaga jarak, mencuci tangan serta menyediakan ruang isolasi khusus pasien sambil menunggu hasil swab keluar. 
			Hasil swab sampai saat ini masih menunggu informasi dari pihak ketiga laboratorium. Bila hasil swab dinyatakan positif, <?= $hospital->nama ?> tidak 
			bertanggung jawab terhadap permasalahan selanjutnya, baik secara medis maupun secara hukum. Pasien sepenuhnya ada pada tanggung jawab
			keluarga kami.
		</p>
		<br>
		<table width="100%">
			<tr>
				<td width="33%" class="center"></td>
				<td width="33%"></td>
				<?php  
					$split = explode(' ', $detail->waktu);
					$date = datefmysql($split[0]);

				?>
				<td width="33%" class="center">Tangerang, <?= $date ?></td>
			</tr>
			<tr>
				<td class="center">Saksi Pihak Keluarga</td>
				<td></td>
				<td class="center">Penanggung Jawab</td>
			</tr>
			<tr>
				<td style="height: 100px;"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="center bold">(...............................................)</td>
				<td></td>
				<td class="center">(...............................................)</td>
			</tr>
		</table>
	</div>
	<?php endif; ?>
</body>
</html>