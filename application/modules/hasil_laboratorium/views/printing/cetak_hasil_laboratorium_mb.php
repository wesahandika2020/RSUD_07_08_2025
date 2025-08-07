<?php if ($type === 'print') : ?>
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

		.th-row-green-dark {
			background-color: #3C9A30;
			-webkit-print-color-adjust: exact; 
		}

		.th-row-green-soft {
			background-color: #A1E1A4;
			-webkit-print-color-adjust: exact; 
		}

		.italic {
			font-style: italic;
		}
	</style>
	<title>.: <?= $title ?> :.</title>
<?php endif; ?>
<?php foreach ($laboratorium->detail as $i => $dataLaboratorium) : ?>
	<?php if ($type === 'pdf') : ?>
		<body>
		<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-A4-half.css" media="print">
	<?php else : ?>
		<body onload="cetak()">
	<?php endif; ?>

		<!-- Content -->
		<div class="page page_break">
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
					<td width="15%">Dokter</td>
					<td width="1%">:</td>
					<td width="34%" class="bold"></td>
					<td></td>
					<td width="20%">Nama Pasien</td>
					<td width="1%">:</td>
					<td width="29%" class="bold"></td>
				</tr>
				<tr>
					<td width="34%" class="bold italic" colspan="3"><?= $pendaftaran['layanan']->dokter ?></td>
					<td></td>
					<td width="29%" class="bold italic" colspan="3"><?= $pendaftaran['pasien']->nama ?></td>
				</tr>
				<tr>
					<td width="15%">No. Lab</td>
					<td width="1%">:</td>
					<td width="34%" class="bold"><?= $laboratorium->kode ?></td>
					<td></td>
					<td width="20%">No. RM</td>
					<td width="1%">:</td>
					<td width="29%" class="bold"><?= $pendaftaran['pasien']->id_pasien ?></td>
				</tr>
				<tr>
					<td>Cara Bayar</td>
					<td>:</td>
					<td class="bold"><?= $pendaftaran['layanan']->cara_bayar ?> <?= ($pendaftaran['layanan']->cara_bayar !== null) ? $pendaftaran['layanan']->penjamin : "" ?></td>
					<td></td>
					<td>Tgl. Lahir/Umur</td>
					<td>:</td>
					<td class="bold"><?= datefmysql($pendaftaran['pasien']->tanggal_lahir) ?> (<?= createUmur($pendaftaran['pasien']->tanggal_lahir) ?> Tahun)</td>
				</tr>
				<tr>
					<td>Waktu Hasil</td>
					<td>:</td>
					<td class="bold"><?= ($laboratorium->waktu_hasil !== null) ? indo_time($laboratorium->waktu_hasil) : "" ?></td>
					<td></td>
					<td>Kelamin</td>
					<td>:</td>
					<td class="bold"><?= (($pendaftaran['pasien']->kelamin === 'L') ? 'Laki - Laki' : (($pendaftaran['pasien']->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
				</tr>
			</table>
			<br><br>

			<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" style="font-size: 12px">
				<tr class="th-row-green-dark">
					<th width="35%" style="text-align:left;">JENIS PEMERIKSAAN</th>
					<th width="20%" style="">HASIL</th>
					<th width="55%" style="">CATATAN</th>
				</tr>

				<?php foreach ($laboratorium->detail as $key => $value): ?>
		
					<?php foreach ($value as $key2 => $val2): ?>
					<tr class="th-row-green-soft">
						<th style=" padding-left: 20px; line-height:20px; font-weight: bold; font-size: 14px; text-align: left !important;"><?= $val2->layanan ?></th>
						<th></th><th></th><th></th><th></th>					
					</tr>
						<?php if($val2->detail !== null): ?>
							<?php foreach ($val2->detail->item_lab as $keya => $vala): ?>
								<tr>
									<td style="padding-left:40px;border-bottom: 1px #999 solid;"><?= $vala->item_laboratorium ?></td>
									<td style="padding-left:10px;border-bottom: 1px #999 solid;" align="center">
										<?php
											$hasil_item = $vala->hasil;
											if ($vala->hasil === '-') {
												$hasil_item = "Negatif";
											}

											if ($vala->hasil === '+') {
												$hasil_item = "Positif";
											}
										?>
										<?= $hasil_item ?><?= (($vala->abnormal === 'Ya')?"*":"") ?>
									</td>
									
									<td style="padding-left:10px;border-bottom: 1px #999 solid;"><?= $vala->catatan ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endif;?>

						<?php if($val2->item !== null): ?>
							<?php foreach ($val2->item as $key3 => $val3): ?>
								
								<?php if($val3->item_lab !== null): ?>
									<?php foreach ($val3->item_lab as $key4 => $val4): ?>
										<?php if($val4->hasil !== ""): ?>
										<tr>
											<td style="padding-left:40px;border-bottom: 1px #999 solid;"><?= $val4->item_laboratorium ?></td>
											<?php
												$hasil_item = $val4->hasil;
												if ($val4->hasil === '-') {
													$hasil_item = "Negatif";
												}

												if ($val4->hasil === '+') {
													$hasil_item = "Positif";
												}
											?>
											<td style="padding-left:10px;border-bottom: 1px #999 solid;" align="center"><?= $hasil_item ?><?= (($val4->abnormal === 'Ya')?"*":"") ?></td>
											
											<td style="padding-left:10px;border-bottom: 1px #999 solid;"><?= $val4->catatan ?></td>
										</tr>
										<tr><td colspan="5" style="padding-top:5px;"></td></tr>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif;?>
							<?php endforeach; ?>
						<?php endif;?>

					<?php endforeach; ?>
				<?php endforeach; ?>

			</table>        

        	<p><span style="font-weight:bold;">Catatan</span><br/><?= $laboratorium->catatan ?></p>
			<br><br>

			<table width="100%">
				<tr><td></td><td></td></tr>
				<tr><td colspan="2" align="right"></td></tr>
				<tr>
					<td width="70%">
						<p align="left">
							Dokter yang memeriksa : 
							<br><br><br><br><br><br><br>
							<b><?= $laboratorium->dokter_pjwb ?></b>
							<br>NIP. <?= $laboratorium->nip_dokter_pjwb ?>
						</p>
					</td>
					<td width="30%">
						<p align="left">
							Pemeriksa : <br/><br/><br/><br/><br/>
							( . . . . . . . . . . . . . . . . . . . . . )
						</p>
					</td>
				</tr>
			</table>
			<br><br>
		</div>
	<?php if ($type === 'pdf') : ?>
		</body>
	<?php else : ?>
		</body>
	<?php endif; ?>
<?php endforeach; ?>