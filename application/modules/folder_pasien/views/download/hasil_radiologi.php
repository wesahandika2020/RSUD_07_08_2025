	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<script>
		function cetak() {
			setTimeout(function() {}, 300);
		}
	</script>
	<style>
		@font-face {
			font-family: "Verdana";
			font-style: normal;
			font-weight: normal;
			src: url("' . $fontPath . '") format("truetype");
		}
		
		* {
			font-family: "Verdana", sans-serif;
			line-height: 12pt;
			font-size: 11pt;
			margin-block-start: 5px;
			margin-block-end: 5px;
			/* font-family: 'Calibri'; */
		}

		.list-data {
			border-left: 1px solid #000;
			border-top: 1px solid #000;
			border-spacing: 0;
		}

		.list-data th,
		.list-data td {
			border-right: 1px solid #000;
			border-bottom: 1px solid #000;
			height: 20px;
		}

		.list-data tr {
			vertical-align: text-top;
		}

		.td-top>tbody>tr>td {
			vertical-align: top;
		}

		.bold {
			font-weight: bold;
		}
	</style>
	<title><?= $title ?></title>

	<?php foreach ($radiologi->detail as $i => $dataRadiologi) : ?>

		<body>

			<!-- Content -->
			<?php if ($dataRadiologi->tipe === 'general') : ?>
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
							<td width="15%">No. RM</td>
							<td width="1%">:</td>
							<td width="34%" class="bold"><?= $pendaftaran['pasien']->no_rm ?></td>
							<td></td>
							<td>No. Radiologi</td>
							<td>:</td>
							<td class="bold"><?= $radiologi->kode ?></td>
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
							<td>Dokter Pengirim</td>
							<td>:</td>
							<td class="bold"><?= $radiologi->dokter ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Klinis</td>
							<td>:</td>
							<td class="bold">
								<?php
								if (!empty($diagnosa)) {
									echo '<ul style="padding-left:0; list-style-type:none; margin-bottom: 0;">';
									foreach ($diagnosa as $key => $value) {
										if ($value->item !== null && $value->item !== '') {
											echo '<li>' . $value->item . '</li>';
										}
									}
									echo '</ul>';
								}
								?>
							</td>
							<td></td>
							<td>Waktu Konfirmasi</td>
							<td>:</td>
							<td class="bold"><?= (($radiologi->waktu_konfirm !== null) ? time_reformat($radiologi->waktu_konfirm, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
						</tr>
						<tr>
							<td>Rontgen</td>
							<td>:</td>
							<td class="bold"><?= $radiologi->kode ?></td>
							<td></td>
							<td>Tanggal Permintaan</td>
							<td>:</td>
							<td class="bold"><?= (($radiologi->waktu_order !== null) ? datetimefmysql($radiologi->waktu_order) : '') ?></td>
						</tr>
						<tr>
							<td>Pemeriksaan</td>
							<td>:</td>
							<td class="bold"><?= $dataRadiologi->layanan ?></td>
							<td></td>
							<td>Waktu Expertise</td>
							<td>:</td>
							<td class="bold"><?= (($radiologi->waktu_hasil !== null) ? time_reformat($radiologi->waktu_hasil, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
						</tr>
						<tr>
							<td>Penjamin</td>
							<td>:</td>
							<td class="bold"><?= $pendaftaran['layanan']->penjamin ?></td>
						</tr>
					</table>
					<br><br>
					<!-- <br><br> -->

					<b style="font-weight:bold">HASIL PEMERIKSAAN : </b>
					<div><?= $dataRadiologi->hasil ?></div>
					<br><br>

					<b style="font-weight:bold">EXPERTISE PACS : </b>
					<?php $xPacs = (object)$pacs; ?>
					<div><?= $xPacs->message ?></div>
					<br><br>

					<table width="100%">
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" align="right"></td>
						</tr>
						<tr>
							<td>
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

		</body>
	<?php endforeach; ?>