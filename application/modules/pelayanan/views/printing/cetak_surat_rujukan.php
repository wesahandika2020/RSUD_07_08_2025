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


		#table-header {
			border-collapse: collapse;
		}

		#table-header td {
			padding: 10px 5px;
			border: 1.5px solid black;
		}

		#table-body td {
			border: 0px;
			padding: 2px;
		}

		.pd-30 {
			padding-left: 30px !important;
		}

		.pd-15 {
			padding-left: 15px !important;
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
		<table width="100%" id="table-header">
			<tr>
				<td width="14%" class="center" style="border-right: 0px;"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="47%" style="border-left: 0px;">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="42%">
					<div class="box-identitas center">
						<span class="bold" style="font-size:12pt">SURAT RUJUKAN</span>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" id="table-body">
						<tr>
							<td colspan="3" style="padding-left: 70%;">No.</td>
						</tr>
						<tr>
							<td colspan="3">Kepada Yth,</td>
						</tr>
						<tr>
							<td colspan="3">TS. Dokter</td>
						</tr>
						<tr>
							<td colspan="3" class="bold"><?= ($nama_dokter_tujuan !== '' ? $nama_dokter_tujuan : '.....................................................') ?></td>
						</tr>
						<tr>
							<td colspan="3" class="bold"><i><?= $layanan->instansi_merujuk ?></i></td>
						</tr>
						<tr>
							<td colspan="3">Di Tempat</td>
						</tr>
						<tr>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td colspan="3">Mohon konsul, pemeriksaan, pengobatan, perawatan, pasien :</td>
						</tr>
						<tr>
							<td width="30%" class="pd-30">Nama Pasien</td>
							<td width="1%">:</td>
							<td width="69%"><?= $pasien->nama ?></td>
						</tr>
						<tr>
							<td class="pd-30">No. RM</td>
							<td>:</td>
							<td><?= $pasien->no_rm ?></td>
						</tr>
						<tr>
							<td class="pd-30">Kelamin</td>
							<td>:</td>
							<td><?= ($pasien->kelamin == 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
						</tr>
						<tr>
							<td class="pd-30">Umur</td>
							<td>:</td>
							<td><?= ($pasien->tanggal_lahir !== NULL ? createUmur2($pasien->tanggal_lahir) : '   ') ?> Tahun</td>
						</tr>
						<tr>
							<td class="pd-30">No. KTP</td>
							<td>:</td>
							<td><?= $pasien->no_identitas ?></td>
						</tr>
						<tr>
							<td class="pd-30">Alamat</td>
							<td>:</td>
							<td><?= $pasien->alamat ?></td>
						</tr>
						<tr>
							<td class="pd-30">Telepon</td>
							<td>:</td>
							<td><?= $pasien->telp ?></td>
						</tr>
						<tr>
							<td colspan="3">Dengan hasil pemeriksaan sebagai berikut :</td>
						</tr>
						<tr>
							<td class="pd-30">Anamnesa</td>
							<td>:</td>
							<td><?= ($anamnesa[0]->keluhan_utama !== '' ? $anamnesa[0]->keluhan_utama : '') ?></td>
						</tr>
						<tr>

							<td class="pd-30">Pemeriksaan Fisik</td>
							<td>:</td>
							<td style="padding-bottom: 0px;">
								<?php $pemeriksaan_fisik = '' ?>
								<?php if ($anamnesa[0]->tensi_sistolik !== NULL | $anamnesa[0]->tensi_diastolik !== NULL) : ?>
									<?php $pemeriksaan_fisik .= '<b class="bold">TD :</b> ' .  $anamnesa[0]->tensi_sistolik . '/' . $anamnesa[0]->tensi_diastolik . ' mmHg; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->suhu !== NULL) : ?>
									<?php $pemeriksaan_fisik .= '<b class="bold">Suhu :</b> ' . $anamnesa[0]->suhu . ' &#8451;; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->nadi !== NULL) : ?>
									<?php $pemeriksaan_fisik .= '<b class="bold">Nadi :</b> ' . $anamnesa[0]->nadi . ' /mnt; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?= $pemeriksaan_fisik ?>
							</td>
						</tr>

						<tr>
							<td class="pd-30" style="padding-top: 0px;"></td>
							<td style="padding-top: 0px;"></td>
							<td style="padding-top: 0px;">
								<?php $pemeriksaan_fisik_lain = '' ?>
								<?php if ($anamnesa[0]->rr !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<b class="bold">RR :</b> ' . $anamnesa[0]->rr . ' /mnt; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->tinggi_badan !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<b class="bold">TB :</b> ' . $anamnesa[0]->tinggi_badan . ' cm; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->berat_badan !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<b class="bold">BB :</b> ' . $anamnesa[0]->berat_badan . '; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->keadaan_umum !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<br><b class="bold">Keadaan Umum :</b> ' . $anamnesa[0]->keadaan_umum . '; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->kesadaran !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<br><b class="bold">Kesadaran :</b> ' . $anamnesa[0]->kesadaran . '; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if ($anamnesa[0]->gcs !== NULL) : ?>
									<?php $pemeriksaan_fisik_lain .= '<br><b class="bold">GCS :</b> ' . $anamnesa[0]->gcs . '; &ensp;&nbsp;'; ?>
								<?php endif; ?>
								<?php if (!empty($pasien->alergi)) : ?>
									<?php $pemeriksaan_fisik_lain .= '<br><b class="bold">Alergi :</b> ' . $pasien->alergi . '; &ensp;&nbsp;'; ?>
								<?php endif; ?>

								<?= $pemeriksaan_fisik_lain ?>
							</td>
						</tr>

						<tr>
							<td class="pd-30">Pemeriksaan Penunjang</td>
							<td>:</td>
							<td><?= ($anamnesa[0]->pemeriksaan_penunjang !== '' ? $anamnesa[0]->pemeriksaan_penunjang : '') ?></td>
						</tr>
						<tr>
							<td style="vertical-align: top;" class="pd-30">Diagnosa Sementara</td>
							<td style="vertical-align: top;">:</td>
							<td>
								<?php if (!empty($diagnosa)) : ?>
									<?php foreach ($diagnosa as $val) : ?>
										<?= $val->item . '<br>'; ?>
									<?php endforeach ?>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td colspan="3">Obat dan tindakan yang telah diberikan atau dilakukan :</td>
						</tr>
						<tr>
							<td style="vertical-align: top;" class="pd-30">Obat</td>
							<td style="vertical-align: top;">:</td>
							<td>
								<?php if (!empty($resep)) : ?>
									<?php foreach ($resep as $val) : ?>
										<?= $val->nama_barang . '<br>'; ?>
									<?php endforeach ?>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;" class="pd-30">Tindakan</td>
							<td style="vertical-align: top;">:</td>
							<td>
								<?php if (!empty($tindakan)) : ?>
									<?php foreach ($tindakan as $val) : ?>
										<?= $val->layanan . '<br>'; ?>
									<?php endforeach ?>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td colspan="3">Alasan Rujuk : <?= $layanan->keterangan_rujukan ?></td>
						</tr>
					</table>

					<table width="40%" style="float: right;" id="table-body">
						<tr>
							<td>Tanggal / <i>Date</i> : <?= date('d/m/Y') ?></td>
						</tr>
						<tr>
							<td>Jam / <i>Time</i> : <?= date('H:i') ?></td>
						</tr>
						<tr>
							<td>Dokter yang merujuk</td>
						</tr>
						<tr>
							<td>
								<?php if (!empty($layanan->ttd_dokter)) : ?>
									<img src="<?= base_url('resources/images/ttd_dokter/') . $layanan->ttd_dokter ?>" alt="ttd-dokter" width="300">
								<?php else : ?>
									<br><br><br><br><br><br>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td class="bold"><?= $layanan->dokter ?></td>
						</tr>
						<tr>
							<td>Nama dan tanda tangan</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>