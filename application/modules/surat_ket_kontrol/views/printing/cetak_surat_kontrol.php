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
		<p class="center bold" style="font-size: 14pt; text-transform: uppercase;">SURAT KONTROL</p>
		<table width="100%" id="table-data">
		</tr>
			<tr>
				<td colspan="3" class="right">Tangerang, <?= tanggal_indo($surat->created_date_set, false) ?></td>
			</tr>
			<tr>
				<td width="30%">Nama</td>
				<td width="1%" >:</td>
				<td width="69%" class="justify"><?= $pasien->nama ?> ( <?= $pasien->id ?> ) <?= $pasien->kelamin ?></td>
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
				<td>Diagnosa</td>
				<td>:</td>
				<td class="justify">
					<?php foreach ($diagnosa as $diag) : ?>
						<?= $diag->golongan_sebab_sakit . ', ' ?>
						<!-- <-?= $diag->golongan_sebab_sakit . '<br>' ?> -->						
					<?php endforeach; ?>
				</td>
			</tr>
			<tr>
				<td>Terapi yang sudah dilakukan :</td>
				<td>:</td>
			<!-- </tr>
			<tr> -->
				<td class="justify">
					<?php 
						if (isset($obat)) :
							//foreach ($obat as $ob) :
							//	echo $obat->item;
							//endforeach;
							foreach ($obat as $ob) :
								foreach ($ob as $o) :
									echo $o->nama_barang . ', '; 
								endforeach;
							endforeach;
						else :
							// for ($i=0; $i < 2; $i++) :
								// echo '<p style="width:100%; padding: 10px 0px; border-bottom: 2px dotted;"></p>';
								echo '-';
							// endfor;
						endif;
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td>Tanggal Kontrol</td>
				<td>:</td>
				<td class="justify"><b><?= tanggal_indo($surat->tanggal, true) ?></b></td>
			</tr>
			<tr>
				<td>Poliklinik tujuan</td>
				<td>:</td>
				<td class="justify"><b><?= $surat->poli ?></b></td>
			</tr>
			<tr>
				<td>Belum dapat dikembalikan ke fasilitas perujuk dengan alasan</td>
				<td>:</td>
				<td class="justify"><?= $surat->alasan_kontrol ?></td>
			</tr>
			<tr>
				<td>Rencana tindak lanjut yang akan dilakukan</td>
				<td>:</td>
				<td class="justify"><?= $surat->rencana_tindak_lanjut ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="right" style="padding-left: 40%;">
					<div class="center">
						<p>Dokter Penanggung Jawab Pasien (DPJP)</p><br><br>
						<p class="bold">(<?= $surat->dokter_asal ?>)</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>