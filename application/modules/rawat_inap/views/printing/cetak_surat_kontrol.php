<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?= resource_url() ?>images/favicons/favicon-16x16.png" sizes="16x16" />
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 9pt;
		}

		.bold {
			font-weight: bold;
		}

		.center {
			text-align: center;
		}

		.right {
			text-align: right;
		}

		.left {
			text-align: left;
		}

		#table-data tr td {
			height: 28px;
		}
	</style>
	<script>
		function cetak() {
			setTimeout(function() {
				window.close()
			}, 300);
			window.print();
		}
	</script>
</head>

<body onload="cetak()">
	<div class="page page_break">
		<?= $this->load->view('utilities/kopsurat_satu', $hospital) ?>
		<p class="center bold" style="font-size: 14pt;">SURAT KONTROL</p>
		<table width="100%" id="table-data">
			<tr>
				<td colspan="3" class="right">Tangerang, <?= datetimefmysql($surat->created_date) ?></td>
			</tr>
			<tr>
				<td colspan="3">Menerangkan bahwa :</td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td width="20%">Nama</td>
				<td width="1%">:</td>
				<td width="79%"><?= $pasien->nama ?> <strong>(<?= $surat->id_pasien ?>)</strong></td>
			</tr>
			<tr>
				<td>Kelamin</td>
				<td>:</td>
				<td><?= ($pasien->kelamin == 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td>:</td>
				<td><?= createUmur2($pasien->tanggal_lahir) . ' (' . datefmysql($pasien->tanggal_lahir) . ')' ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?= $pasien->alamat ?></td>
			</tr>
			<tr>
				<td>Diagnosa</td>
				<td>:</td>
				<td>
					<?php foreach ($diagnosa as $diag) : ?>
						<?= $diag->golongan_sebab_sakit . '<br>' ?>
					<?php endforeach; ?>
				</td>
			</tr>
			<tr>
				<td>Pemeriksaan Fisik</td>
				<td>:</td>
				<td>
					<div style="display: flex; gap: 1rem">
						<span>TB = <?= empty($pasien->tinggi_badan) ? '-' : $pasien->tinggi_badan ?> Cm</span>
						<span>BB = <?= empty($pasien->berat_badan) ? '-' : $pasien->berat_badan ?> Kg</span>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="3">Terapi yang sudah dilakukan :</td>
			</tr>
			<tr>
				<td colspan="3">
					<ul>
						<?php
						// if (isset($obat)) :
						// 	//foreach ($obat as $ob) :
						// 	//	echo $obat->item;
						// 	//endforeach;
						// 	foreach ($obat as $ob) :
						// 		foreach ($ob as $o) :
						// 			echo $o->nama_barang . ', '; 
						// 		endforeach;
						// 	endforeach;
						// else :
						// 	for ($i=0; $i < 2; $i++) :
						// 		echo '<p style="width:100%; padding: 10px 0px; border-bottom: 2px dotted;"></p>';
						// 	endfor;
						// endif;
						if (isset($obat_terapi_pulang)) {
							foreach ($obat_terapi_pulang as $obat) {
								$dosis = empty($obat->dosis) ? '' : $obat->dosis;
								echo '<li>' . $obat->nama_obat . ' ' . $obat->frekuensi . $dosis;
							}
						} else {
							for ($i = 0; $i < 2; $i++) {
								echo '<p style="width:100%; padding: 10px 0px; border-bottom: 2px dotted;"></p>';
							}
						}
						?>
					</ul>
				</td>
			</tr>
			<tr>
				<td colspan="3">Kontrol Kembali :</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><?= tanggal_indo($surat->tanggal, true) ?></td>
			</tr>
			<tr>
				<td>Poli yang dituju</td>
				<td>:</td>
				<td><b><?= $surat->shift_poli ?></b> - <?= $surat->poli ?></td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="right" style="padding-left: 40%;">
					<div class="center">
						<p>Dokter Penanggung Jawab Pasien (DPJP)</p><br><br><br><br><br><br>
						<p class="bold">( <?= $this->session->userdata('nama') ?> )</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>