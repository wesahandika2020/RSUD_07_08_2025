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
			padding: 10px 1px;
			border: 1.5px solid black;
		}

		#table-body td {
			border: 0px;
			padding: 3.5px;
		}

		.pd-30 {
			padding-left: 30px !important;
		}
	</style>
	<script>
		function cetak() {
			// setTimeout(function() { window.close() }, 300);
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
						<span class="bold" style="font-size:10pt">SURAT KETERANGAN DOKTER <br> <i>MEDICAL CERTIFICATE</i></span>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<table width="100%" id="table-body">
						<tr>
							<td colspan="3">
								<span>Yang bertanda tangan dibawah ini, Dokter Rumah Sakit Umum Daerah Kota Tangerang, menerangkan bahwa :</span><br>
								<span><i>To Whom its my concern, Doctor of Regional General Hospital Tangerang that certify</i></span>
							</td>
						</tr>
						<tr>
							<td width="20%" class="pd-30">Nama Pasien <br> <i>Name of Patient</i></td>
							<td width="1%">:</td>
							<td width="79%"><?= $data->pasien ?></td>
						</tr>
						<tr>
							<td class="pd-30">No. MR <br> <i>MR. Number</i></td>
							<td>:</td>
							<td><?= $data->no_rm ?></td>
						</tr>
						<tr>
							<td class="pd-30">Kelamin <br> <i>Gender</i></td>
							<td>:</td>
							<td><?= ($data->kelamin == 'L' ? 'Laki-laki' : 'Perempuan') ?></td>
						</tr>
						<tr>
							<td class="pd-30">Umur <br> <i>Age</i></td>
							<td>:</td>
							<td><?= ($data->tanggal_lahir != null ? createUmur2($data->tanggal_lahir)  . ' Tahun' : '') ?></td>
						</tr>
						<tr>
							<td class="pd-30">Alamat <br> <i>Address</i></td>
							<td>:</td>
							<td><?= $data->alamat ?></td>
						</tr>
						<tr>
							<td colspan="3">
								<span>Adalah benar telah berobat di Rumah Sakit Umum Daerah Kota Tangerang pada :</span><br>
								<span><i>Has been treat Regional General Hospital Tangerang, on</i></span>
							</td>
						</tr>
						<tr>
							<td class="pd-30">Hari <br> <i>Day</i></td>
							<td>:</td>
							<td><b><?= get_day($data->tanggal_visite) ?></b></td>
						</tr>
						<tr>
							<td class="pd-30">Tanggal <br> <i>Date</i></td>
							<td>:</td>
							<td><b><?= datefmysql($data->tanggal_visite) ?></b></td>
						</tr>
						<?php
						$keterangan = explode(',', $data->keterangan);
						$istirahat = in_array('Istirahat', $keterangan);
						$dirawat = in_array('Dirawat', $keterangan);
						$persalinan = in_array('Persalinan', $keterangan);

						$hari_istirahat = $data->hari_istirahat ?? $data->hari;
						$hari_dirawat = $data->hari_dirawat ?? $data->hari;
						$hari_persalinan = $data->hari_persalinan ?? $data->hari;
						?>
						<tr>
							<td class="right" style="vertical-align: top"><input type="checkbox" <?= $istirahat ? 'checked' : '' ?>></td>
							<td></td>
							<td>
								Perlu istirahat karena sakit selama : <b><?= ($istirahat ? strtoupper(terbilang($hari_istirahat)) . ' ( ' . $hari_istirahat . ' ) hari' : '') ?></b>
								<br> <i>Need to rest due to ilness for</i>
								<br>
								<br> Terhitung mulai tanggal <?= $data->tanggal_start_istirahat ? datefmysql($data->tanggal_start_istirahat) : '' ?> s/d <?= $data->tanggal_end_istirahat ? datefmysql($data->tanggal_end_istirahat) : '' ?>
								<br> <i>From the date of </i><span style="margin-left: 8rem"><i>until</i></span>
							</td>
						</tr>
						<tr>
							<td class="right" style="vertical-align: top"><input type="checkbox" <?= $dirawat ? 'checked' : '' ?>></td>
							<td></td>
							<td>
								Dirawat inap di Rumah Sakit Umum Daerah Kota Tangerang karena sakit selama : <b><?= ($dirawat && $hari_dirawat ? (strtoupper(terbilang($hari_dirawat)) ?? '') . ' ( ' . $hari_dirawat . ' ) hari' : '') ?></b>
								<br> <i>Has been inpatient at Regional General Hospital Tangerang due to ilness for</i>
								<br>
								<br> Terhitung mulai tanggal <?= $data->tanggal_start_dirawat ? datefmysql($data->tanggal_start_dirawat) : '-' ?> s/d <?= $data->tanggal_end_dirawat ? datefmysql($data->tanggal_end_dirawat) : '-' ?>
								<br> <i>From the date of </i><span style="margin-left: 8rem"><i>until</i></span>
							</td>
						</tr>
						<tr>
							<td class="right" style="vertical-align: top"><input type="checkbox" <?= $persalinan ? 'checked' : '' ?>></td>
							<td></td>
							<td>
								Perkiraan Persalinan tanggal <?= $data->tanggal_start_persalinan ? datefmysql($data->tanggal_start_persalinan) : '' ?> s/d <?= $data->tanggal_end_persalinan ? datefmysql($data->tanggal_end_persalinan) : '-' ?>
								<br> <i>Estimated delivery date </i><span style="margin-left: 8rem"><i>until</i></span>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<span>Demikian surat keterangan ini dibuat, agar dapat dipergunakan sebagaimana mestinya.</span><br>
								<span><i>The statment was made to be used properly.</i></span>
							</td>
						</tr>
						<tr>
							<td>NB</td>
							<td>:</td>
							<td><?= $data->nota_bene ?></td>
						</tr>
						<tr>
							<td><i>Notes</i></td>
							<td><i>:</i></td>
							<td><?= $data->notes ?></td>
						</tr>
					</table>
					<table width="100%" id="table-body">
						<tr>
							<td width="50%"></td>
							<td width="50%">Tangerang, <?= datetimefmysql($data->created_date) ?></td>
						</tr>
						<tr>
							<td></td>
							<td>Dokter Pemeriksa,</td>
						</tr>
						<tr>
							<td></td>
							<td><i>Physician</i></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td><?= digitalSignature() ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>( <?= $data->user ?> )</td>
						</tr>
						<tr>
							<td></td>
							<td>Nama dan Tanda Tangan <br> <i>Name & Signature</i></td>
						</tr>
						<tr>
							<td colspan="12">
								Surat Keterangan Dokter ini Sah Tanpa Tanda Tangan <br>
								UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>