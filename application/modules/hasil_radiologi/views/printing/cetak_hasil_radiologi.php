<?php if ($type === 'print') : ?>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<script>
		function cetak() {
			setTimeout(function() { }, 300);
		}
	</script>
	<style>
		* {
			line-height: 12pt;
			font-size: 11pt;
			margin-block-start: 5px; 
			margin-block-end: 5px;
			font-family: Arial, sans-serif;
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
	<title><?= $title ?></title>
<?php endif; ?>

<?php date_default_timezone_set('Asia/Jakarta'); foreach ($radiologi->detail as $i => $dataRadiologi) : ?>
	<?php if ($type === 'pdf') : ?>
		<body>
		<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-A4-half.css" media="print">
	<?php else : ?>
		<body onload="cetak()">
	<?php endif; ?>

		<!-- Content -->
		<?php if ($dataRadiologi->tipe === 'general') : ?>
			<div class="page page_break">
				<table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #000;">
					<tr>
						<td rowspan="3" style="width:70px"><img src="<?= base_url('resources/images/logos/' . $hospital->logo) ?>" width="70px" height="70px"></td>
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
						<td width="15%" style="font-size: 11pt;">No. RM</td>
						<td width="1%" style="font-size: 11pt;">:</td>
						<td width="34%" style="font-size: 11pt;" class="bold"><?= $pendaftaran['pasien']->no_rm ?></td>
						<td></td>
						<td style="font-size: 11pt;">No. Radiologi</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $radiologi->kode ?></td>
					</tr>					
					<tr>
						<td style="font-size: 11pt;">Nama Pasien</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $pendaftaran['pasien']->nama ?></td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Tgl. Lahir/Umur</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= datefmysql($pendaftaran['pasien']->tanggal_lahir) ?> (<?= createUmur($pendaftaran['pasien']->tanggal_lahir) ?> Tahun)</td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Alamat</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $pendaftaran['pasien']->alamat ?></td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Kelamin</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= (($pendaftaran['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan')) ?></td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Jenis Layanan</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $pendaftaran['layanan']->jenis_layanan ?> <?= (($pendaftaran['layanan']->jenis_layanan === 'Poliklinik' ? $pendaftaran['layanan']->layanan : '')) ?></td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Dokter Pengirim</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $radiologi->dokter ?></td>
					</tr>
					<tr>
						<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Klinis</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold">
							<?php  
								if (!empty($diagnosa)){
									echo '<ul style="padding-left:0; list-style-type:none; margin-bottom: 0;">';
										foreach ($diagnosa as $key => $value){
											if($value->item !== null && $value->item !== ''){
												echo '<li>' . $value->item . '</li>';
											}
										}
									echo '</ul>';
								}
							?>
						</td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Waktu Konfirmasi</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= (($radiologi->waktu_konfirm !== null) ? time_reformat($radiologi->waktu_konfirm, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Rontgen</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $radiologi->kode ?></td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Tanggal Permintaan</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= (($radiologi->waktu_order !== null) ? datetimefmysql($radiologi->waktu_order) : '') ?></td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Pemeriksaan</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $dataRadiologi->layanan ?></td>
						<td style="font-size: 11pt;"></td>
						<td style="font-size: 11pt;">Waktu Expertise</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= (($radiologi->waktu_hasil !== null) ? time_reformat($radiologi->waktu_hasil, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
					</tr>
					<tr>
						<td style="font-size: 11pt;">Penjamin</td>
						<td style="font-size: 11pt;">:</td>
						<td style="font-size: 11pt;" class="bold"><?= $pendaftaran['layanan']->penjamin ?></td>						
					</tr>
				</table>
				<br><br>
				<!-- <br><br> -->

				<b style="font-size: 11pt; font-weight:bold">HASIL PEMERIKSAAN : </b>
				<div><?= $dataRadiologi->hasil ?></div>
				<br><br>

				<b style="font-size: 11pt; font-weight:bold">EXPERTISE PACS : </b>
				<?php $xPacs = (object)$pacs; ?>
				<div><?= $xPacs->message ?></div>
				<br><br>
								
				<table width="100%">
					<tr><td></td><td></td></tr>
					<tr><td colspan="2" align="right"></td></tr>
					<tr>
						<td style="font-size: 11pt;">
							<p align="left">
								Dokter yang memeriksa : 
								<br><?= $dataRadiologi->dokter ?>
								<br>NIP. <?= $dataRadiologi->nip_dokter ?>
								<br>Hasil telah divalidasi dan dicetak otomatis oleh sistem dan tidak diperlukan tanda tangan
							</p>
						</td>
						<td></td>
					</tr>
				</table>
				<br><br>
			</div>
		<?php else : ?>
			<?php  
				$dataEcho['echo'] = $dataRadiologi;
				$dataEcho['hospital'] = $hospital;	
				$dataEcho['pendaftaran'] = $pendaftaran;
				$this->load->view('hasil_radiologi/printing/cetak_hasil_echo', $dataEcho);
			?>
		<?php endif; ?>

	<?php if ($type === 'pdf') : ?>
		</body>
	<?php else : ?>
		</body>
	<?php endif; ?>
<?php endforeach; ?>