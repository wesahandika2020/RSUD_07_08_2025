<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-16x16.png" sizes="16x16" />
	<!-- <link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print"> -->
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-sep.css">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 9pt;
		}

		.bold { font-weight: bold; }
		.center { text-align: center; }
		.right { text-align: right; }
		.left { text-align: left; }
		.justify { text-align:justify; }
		td { vertical-align: top;}

		#table-data tr td {
			height: 18px;
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
		<?= $this->load->view('utilities/kopsurat_satu', $hospital) ?>
		<p class="center bold" style="font-size: 14pt; text-transform: uppercase;">LEMBAR KONSULTASI</p>
		<table width="100%" id="table-data">
		</tr>
			<tr>
				<td colspan="3" class="right">Tangerang, <?= tanggal_indo($surat->created_date_set, false) ?></td>
			</tr>
			<tr>
				<td width="30%">Nama</td>
				<td width="1%" >:</td>
				<td width="69%" class="justify"><?= $pasien->nama ?> (<?= $pasien->id ?>) <?= ($pasien->kelamin == 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td>:</td>
				<td class="justify"><?= hitungUmur($pasien->tanggal_lahir) . ' ( '.tanggal_indo($pasien->tanggal_lahir, false ).' )' ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td class="justify"><?= $pasien->alamat ?></td>
			</tr>
			<tr>
				<td>Dokter Pengirim </td>
				<td>:</td>
				<td class="justify"><?= $surat->dokter_pegirim ?></td>
			</tr>
			<tr>
				<td>Mohon Bantuan Sejawat untuk</td>
				<td>:</td>
				<td class="justify">
					<?php 
						$jenis_bantuan = '';
						if ($surat->jb_konsul == '1') { $jenis_bantuan == '' ? $jenis_bantuan='Konsultasi' 		  : $jenis_bantuan=$jenis_bantuan.' & Konsultasi'; }
						if ($surat->jb_raber == '1')  { $jenis_bantuan == '' ? $jenis_bantuan='Perawatan bersama' : $jenis_bantuan=$jenis_bantuan.' & Perawatan bersama'; }
						if ($surat->jb_alih == '1')   { $jenis_bantuan == '' ? $jenis_bantuan='Alih rawat'   	  : $jenis_bantuan=$jenis_bantuan.' & Alih rawat'; }
					?>
					<?= $jenis_bantuan ?>
				</td>				
			</tr>
			<tr>
				<td>Dirawat dengan</td>
				<td>:</td>
				<td class="justify"><?= $surat->dirawat_dengan ?></td>
			</tr>
			<tr>
				<td>Keterangan Klinik</td>
				<td>:</td>
				<td class="justify"><?= $surat->keterangan ?></td>
			</tr>
			<tr>
				<td>Tanggal Konsul</td>
				<td>:</td>
				<td class="justify"><b><?= tanggal_indo($surat->tanggal, true) ?></b></td>
			</tr>
			<tr>
				<td>Poliklinik Tujuan</td>
				<td>:</td>
				<td class="justify"><b><?= $surat->poli ?></b></td>
			</tr>
		</table>
		
		<hr> 

		<p class="center bold" style="font-size: 14pt; text-transform: uppercase;">JAWABAN KONSULTASI</p>
		<table width="100%" id="table-data">
		</tr>
			<tr>
				<td colspan="3" class="right">Tangerang, <?= tanggal_indo($surat->created_date_set, false) ?></td>
			</tr>
			<tr>
				<td>Dokter Penerima </td>
				<td>:</td>
				<td class="justify"><?= $surat->dokter_penerima ?></td>
			</tr>
			<tr>
				<td width="30%">Hasil pemeriksaan pasien kami dapatkan :</td>
				<td width="1%" >:</td>
				<td width="69%" class="justify"><?= $surat->pemeriksaan ?></td>
			</tr>
			<tr>
				<td>Saran tindakan medik / pengobatan</td>
				<td>:</td>
				<td class="justify"><?= $surat->saran ?></td>
			</tr>		
		</table>
	</div>
</body>
</html>