<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<?php

function timeExplode($time = NULL)
{
	if ($time != NULL) {
		$time1 = explode(":", $time);
		$time2 = $time1[0] . ':' . $time1[1];
		return $time2;
	} else {
		return '-';
	}
}

function tanggal_indonesia($tanggal)
{
	$bulan = array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);

	$pecahkan = explode('-', $tanggal);

	return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<style>
	@font-face {
		font-family: "Verdana";
		font-style: normal;
		font-weight: normal;
		src: url("' . $fontPath . '") format("truetype");
	}

	body {
		margin: 1cm;
		padding: 0;
		font-family: "Verdana", sans-serif;
		font-size: 9pt;
		/* font: 9pt Verdana; */
		/* background-color: #FAFAFA; */
	}

	* {
		font-family: "Verdana", sans-serif;
		font-size: 9pt;
		/* font: 9pt Verdana; */
		/* box-sizing: border-box; */
		/* -moz-box-sizing: border-box; */
	}

	.page {
		/* width: 21cm; */
		/* min-height: 19.8cm; */
		/* padding-top: 0.5cm; */
		/* padding-left: 1cm; */
		/* padding-right: 10cm; */
		margin: 0cm auto;
		/* border: 1px #D3D3D3 solid; */
		/* border-radius: 5px; */
		/* background: white; */
		/* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
	}

	.subpage {
		padding: 0;
		/* border: 5px red solid; */
		/* height: 237mm; */
		/* outline: 2cm #FFEAEA solid; */
	}

	@page {
		margin-top: 0;
		margin-bottom: 0;
		margin-left: 0;
		margin-right: 0;
	}

	@page: first {
		margin-top: 0;
		margin-bottom: 0;
		margin-left: 0;
		margin-right: 0;
	}

	@media print {
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}

	h1 {
		font-size: 20px;
		margin-bottom: 0;
	}

	h2 {
		font-size: 18px;
		margin-bottom: 0;
	}

	h3 {
		font-size: 16px;
		margin-bottom: 0;
	}

	.tabel-laporan {
		empty-cells: show;
		border-radius: 5px;
		border-spacing: 0;
		margin-top: 5px;
		clear: both;
		border-collapse: collapse;
		background: #fff;
		color: #000
	}

	.tabel-laporan tr th {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.tabel-laporan .number {
		text-align: center;
	}

	.tabel-laporan th rowspan,
	td rowspan {
		vertical-align: middle;
	}

	.subtotal {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.topborder {
		border-top: 1px solid #000;
	}

	.bottomborder {
		border-bottom: 1px solid #000;
	}

	.total {
		border-top: 1px solid #000;
		vertical-align: middle;
	}

	.left {
		text-align: left;
	}

	.right {
		text-align: right !important;
	}

	.center {
		text-align: center !important;
	}

	.v-center {
		vertical-align: middle !important;
	}

	.v-top {
		vertical-align: top !important;
	}

	.bold {
		font-weight: bold;
	}

	.wrapper {
		white-space: nowrap;
	}
</style>

<title><?= datetimefmysql($data['pasien']->tanggal_daftar) . " " . $data['pasien']->no_rm . " - " . $data['pasien']->nama_pasien ?></title>

<body>
	<div>
		<!--=============== HEADER ===============-->
		<header class="header" id="header">
			<div>
				<table style="border: none;">
					<tr>
						<td style="border: none;">
							<div style="margin-left: 15px;">
								<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="85px">
								<p class="address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
									Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
							</div>
						</td>
						<td style="border: none;">
							<div style="float:right; border-color: black;">
								<h1>RAHASIA</h1>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</header>

		<!--=============== MAIN ===============-->
		<main class="main">
			<section>
				<br>
				<div class="container">
					<table class="small__font">
						<thead>
							<tr>
								<td class="table__big-title" align="center" colspan="3">RESUME MEDIS</td>
								<td colspan="3">NRM : <b><?= $pasien->no_rm; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Nama Pasien : <b><?= $pasien->nama_pasien; ?></b></td>
								<td colspan="2">Tanggal Lahir : <b><?= datefmysql($pasien->tanggal_lahir); ?></b></td>
								<td>Umur : <b><?= createUmur2($pasien->tanggal_lahir) ?></b></td>
								<td>Jenis Kelamin : <b><?= $pasien->kelamin; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggal Masuk : <b><?= $pasien->tanggal_daftar == NULL ? '' : datetimefmysql($pasien->tanggal_daftar); ?></b></td>
								<td colspan="2">Tanggal Keluar / Meninggal : <b><?= $pasien->tanggal_keluar == NULL ? '' : datetimefmysql($pasien->tanggal_keluar); ?></b></td>
								<td colspan="2">Ruang Rawat Terakhir : <b><?= $rawat_inap == NULL ? '' : $rawat_inap->nama_bangsal; ?><?= $intensive_care == NULL ? '' : $intensive_care->nama_bangsal; ?><?= $pasien->jenis_layanan == 'IGD' ? 'IGD' : ''; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggung Jawab Pembayaran : <b><?= $pasien->penjamin == NULL ? '' : $pasien->penjamin; ?></b></td>
								<td colspan="4">Diagnosis / Masalah Waktu Masuk :
									<b><?= $diag_manual === null ? ($diagnosa_awal === null ? '' : $diagnosa_awal) : $diag_manual; ?></b>
								</td>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td width="30%" style="vertical-align: top;" class="no__border">Ringkasan Riwayat Penyakit</td>
								<td width="1%" style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->ringkasan_riwayat == NULL ? '' : $resume_medis->ringkasan_riwayat; ?></b>
									<!-- 	<b><?= $resume_medis->keluhan_utama == NULL ? '' : 'Keluhan Utama: ' . $resume_medis->keluhan_utama . '. <br>'; ?></b>
									<b><?= $resume_medis->subject == NULL ? '' : $resume_medis->subject . '. '; ?></b> -->
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Pemeriksaan Fisik</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->pemeriksaan_fisik == NULL ? '' : $resume_medis->pemeriksaan_fisik; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Terapi / Pengobatan Selama di Rumah Sakit</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $pengobatan; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Hasil Konsultasi</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->hasil_konsultasi == NULL ? '' : $resume_medis->hasil_konsultasi . '. '; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Diagnosis Utama</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $diagnosa_utama; ?></b>
									<b><?= $diagnosa_manual_utama; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" align="left" class="no__border">Diagnosis Sekunder</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $diagnosa_sekunder; ?></b>
									<b><?= $diagnosa_manual_sekunder; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Tindakan / Prosedur</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $tindakan_ok == NULL ? '' : $tindakan_ok . '<br>'; ?></b>
									<b><?= $tindakan == NULL ? '' : $tindakan; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Alergi (Reaksi Obat)</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->alergi_obat == NULL ? '' : $resume_medis->alergi_obat . '. '; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Hasil Laboratorium Belum Selesai (Pending)</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->pending_lab == NULL ? '' : $resume_medis->pending_lab . '. '; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Diet</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->diet == NULL ? '' : $resume_medis->diet . '. '; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Kondisi Waktu Keluar</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->cara_keluar == NULL ? '' : $resume_medis->cara_keluar . '. '; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" class="no__border">Pengobatan Dilanjutkan (<em>Follow Up</em>)</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->pengobatan_dilanjutkan == NULL ? '' : $resume_medis->pengobatan_dilanjutkan . '. '; ?></b>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6">
									<b>Pemeriksaan Penunjang / Diagnostik Terpenting</b>
								</td>
							</tr>
						</tfoot>
					</table>


					<?php if (isset($resume_lab)) {
						if (isset($status_lab)) {
							if ($status_lab === false) { ?>

								<table class="table-border" style="margin-top: 1rem;">
									<thead>
										<tr>
											<th width="30%">Jenis Pemeriksaan</th>
											<th width="5%"></th>
											<th width="10%" class="center">Nama</th>
											<th width="19%" class="center">Hasil</th>
											<th width="15%" class="center">Satuan</th>
											<th width="15%" class="center">Nilai Rujukan</th>
											<th width="10%"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><label><?php $noS = 0;
																	if ($resume_lab !== null) { ?>
														<?= $resume_lab[0][0]->ono ?></label>
											</td>
										</tr>

										<?php foreach ($resume_lab as $key => $value) {

																			if (isset($resume_lab[$key][0]->flag)) {

																				if ($resume_lab[$key][0]->flag !== 'N') {

																					if ($key !== $noS) { ?>

														<tr>
															<td><label id="ono-pesan"><?= $resume_lab[$key][0]->ono ?></label></td>
														</tr>

													<?php  } ?>

													<tr>
														<td><?= $resume_lab[$key][0]->test_group ?></td>
														<td class="v-center center"><?= $resume_lab[$key][0]->flag ?></td>
														<td class="v-center center"><?= $resume_lab[$key][0]->order_testnm ?></td>
														<td class="v-center center"><?= $resume_lab[$key][0]->result_value ?></td>
														<td class="v-center center"><?= $resume_lab[$key][0]->unit ?></td>
														<td class="v-center center"><?= $resume_lab[$key][0]->ref_range ?></td>
													</tr>

												<?php $noS = $key;
																				} ?>

											<?php 	} ?>

										<?php 	} ?>

									<?php 	} ?>
									</tbody>
								</table>

							<?php } else {
								function group_by($key, $data)
								{
									$result = array();

									foreach ($data as $val) {
										if (array_key_exists($key, $val)) {
											$result[$val[$key]][] = $val;
										} else {
											$result[""][] = $val;
										}
									}

									return $result;
								}
							?>

								<table class="table-border" style="margin-top: 1rem;">
									<thead>
										<tr>
											<td width="30%">Jenis Pemeriksaan</td>
											<td width="4%"></td>
											<td width="26%" align="center">Hasil</td>
											<td width="15%" align="center">Satuan</td>
											<td width="15%" align="center">Nilai Rujukan</td>
											<td width="10%"></td>
										</tr>
									</thead>
									<tbody>

										<?php

										$arr = [];
										$arrFlag = [];

										foreach ($resume_lab as $key => $value) {
											if ($value === null) continue;

											array_push($arr, $value);
										}

										$keys = array_column($arr, 'ono');
										array_multisort($keys, SORT_ASC, $arr);

										$onoGroup = group_by("ono", $arr);

										foreach ($onoGroup as $a => $b) {

											$groupedOtgroup = group_by("test_group", $b);

											$keyGroup = array_keys($groupedOtgroup);
											$objectGroup = array_values($groupedOtgroup);

											for ($n = 0; $n < sizeof($keyGroup); $n++) {

												for ($o = 0; $o < sizeof($objectGroup[$n]); $o++) {

													if ($objectGroup[$n][$o]['flag'] !== '') {

														if ($objectGroup[$n][$o]['flag'] !== 'N') {

															array_push($arrFlag, $objectGroup[$n][$o]);
														}
													}
												}
											}
										}

										$elementTegr = group_by("ono", $arrFlag); ?>

										<?php foreach ($elementTegr as $c => $d) {
											$dataR = $d[0]['release']->date;
											$tanggalR = substr($dataR, 6, 2);
											$bulanR = substr($dataR, 4, 2);
											$tahunR = substr($dataR, 0, 4); ?>

											<tr>
												<td width="30%"><?= $c ?> (tanggal : <?= $tanggalR ?>/<?= $bulanR ?>/<?= $tahunR ?>)</td>
												<td width="4%"></td>
												<td width="26%"></td>
												<td width="15%"></td>
												<td width="15%"></td>
												<td width="10%"></td>
											</tr>
											<tr class="empty-row">
												<td style="font-size: 1px" width="30%">&nbsp;</td>
												<td style="font-size: 1px" width="4%">&nbsp;</td>
												<td style="font-size: 1px" width="26%">&nbsp;</td>
												<td style="font-size: 1px" width="15%">&nbsp;</td>
												<td style="font-size: 1px" width="15%">&nbsp;</td>
												<td style="font-size: 1px" width="10%">&nbsp;</td>
											</tr>

											<?php $etvalOtgroup = group_by("test_group", $d);
											foreach ($etvalOtgroup as $e => $f) {	?>

												<tr>
													<td width="30%"> &nbsp; &nbsp; <?= $e ?></td>
													<td width="4%"></td>
													<td width="26%"></td>
													<td width="15%"></td>
													<td width="15%"></td>
													<td width="10%"></td>
												</tr>
												<tr class="empty-row">
													<td width="30%">&nbsp;</td>
													<td width="4%">&nbsp;</td>
													<td width="26%">&nbsp;</td>
													<td width="15%">&nbsp;</td>
													<td width="15%">&nbsp;</td>
													<td width="10%">&nbsp;</td>
												</tr>

												<?php $groupedOtname = group_by("order_testnm", $f);
												foreach ($groupedOtname as $g => $h) {  ?>

													<tr>
														<td width="30%"> &nbsp; &nbsp; <?= $g ?></td>
														<td width="4%"></td>
														<td width="26%"></td>
														<td width="15%"></td>
														<td width="15%"></td>
														<td width="10%"></td>
													</tr>
													<tr class="empty-row">
														<td width="30%">&nbsp;</td>
														<td width="4%">&nbsp;</td>
														<td width="26%">&nbsp;</td>
														<td width="15%">&nbsp;</td>
														<td width="15%">&nbsp;</td>
														<td width="10%">&nbsp;</td>
													</tr>

													<?php $status = [];

													array_push($status, $h);

													foreach ($status as $i => $j) {

														$ref_range = '';

														$volume  = array_column($j, 'disp_seq');
														array_multisort($volume, SORT_ASC, $j);

														foreach ($j as $k => $l) { ?>

															<?php if (empty($l['nama'])) {
																$nama = '<td width="30%"></td>';
															} else {
																foreach ($l['nama'] as $m => $n) {
																	if ($n->nama === 'Hitung Jenis') {
																		$nama = '<td width="30%" class="v-center bold"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
																	} else {
																		$nama = '<td width="30%" class="v-center"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
																	}
																}
															}

															$flag = '<td style="color:red; border: 0.5px solid red" align="right">' . $l['flag'] . '</td>';

															$comment = '<td align="center"></td>';
															if (!empty($l['test_comment'])) {
																$comment = '<td align="center">' . $l['test_comment'] . '</td>';
															}

															if ($l['ref_range'] === '' && $l['unit'] === '') {

																if (strlen($l['result_value']) < 10) {

																	$ref_range = '<td style="padding-left:10px;" align="center">' . $l['result_value'] . '</td>
																											<td align="center">' . $l['unit'] . '</td>
																											<td align="center">' . $l['ref_range'] . '</td>';
																} else {

																	$ref_range = '<td style="padding-left:10px;" align="center" colspan="3">' . $l['result_value'] . ' </td>';
																}
															} else {

																$ref_range = '<td style="padding-left:10px" align="center">' . $l['result_value'] . '</td>
																										<td align="center">' . $l['unit'] . '</td>
																										<td align="center">' . $l['ref_range'] . '</td>';
															} ?>

															<tr>
																<?= $nama; ?>
																<?= $flag; ?>
																<?= $ref_range; ?>
																<?= $comment; ?>
															</tr>


														<?php } ?>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										<?php } ?>

									</tbody>
								</table>

							<?php } ?>
						<?php } ?>
					<?php } ?>


					<?php if (!empty($cek_radiologi)) { ?>
						<table class="table-border" style="margin-top: 1rem;">
							<thead>
								<tr>
									<td colspan="2" width="10%">No</td>
									<td colspan="2" width="20%" align="center">Nama Layanan</td>
									<td colspan="2" width="70%" align="center">Hasil Radiologi</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cek_radiologi as $key => $cr) { ?>

									<tr>
										<td colspan="2" class="center"><?= $cr->kode; ?></td>
										<td colspan="2" class="center"><?= $cr->layanan; ?></td>
										<td colspan="2" class="center"><?= $cr->hasil; ?></td>
									</tr>

								<?php }	?>
							</tbody>
						</table>
					<?php }	?>



					<table class="small__font" style="margin-top: 1rem;">
						<thead class="no__border">
							<tr>
								<th colspan="4">JADWAL KONTROL</th>
							</tr>
							<tr>
								<th align="center">Tanggal</th>
								<th align="center">Hari</th>
								<th align="center">Jam</th>
								<th align="left">Nama Dokter</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($resume_kontrol as $jk) { ?>
								<tr>
									<td align="center"><?= date('d-m-Y', strtotime($jk->tanggal)); ?></td>
									<td align="center"><?= $jk->hari; ?></td>
									<td align="center"><?= date('H:m', strtotime($jk->tanggal)); ?></td>
									<td align="left"><?= $jk->dokter; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

					<table class="small__font" style="margin-top: 1rem;">
						<thead class="no__border">
							<tr>
								<th colspan="12">TERAPI PULANG</th>
							</tr>
							<tr>
								<th width="27%" rowspan="2">Nama Obat</th>
								<th width="10%" rowspan="2">Jumlah</th>
								<th width="10%" rowspan="2">Dosis</th>
								<th width="10%" rowspan="2">Frekuensi</th>
								<th width="10%" rowspan="2">Cara Pemberian</th>
								<th width="10%" colspan="6">Jam Pemberian</th>
								<th width="23%" rowspan="2">Petunjuk Khusus</th>
							</tr>
							<tr>
								<th>A</th>
								<th>B</th>
								<th>C</th>
								<th>D</th>
								<th>E</th>
								<th>F</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($terapi_pulang as $tp) { ?>
								<tr>
									<td><?php echo $tp->nama_obat; ?></td>
									<td align="center"><?php echo $tp->jumlah_obat; ?></td>
									<td align="center"><?php echo $tp->dosis; ?></td>
									<td align="center"><?php echo $tp->frekuensi; ?></td>
									<td align="center"><?php echo $tp->cara_pemberian; ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian); ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_satu); ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_dua); ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_tiga); ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_empat); ?></td>
									<td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_lima); ?></td>
									<td><?php echo $tp->petunjuk_khusus; ?></td>
								</tr>
							<?php } ?>
						</tbody>

						<tfoot>
							<tr align="center">
								<td width="20%" class="no__border" colspan="6"></td>
								<td class="no__border" colspan="6">
									<div style="flex-direction: column;">
										<div>
											Tanggal: <b><?= $pasien->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($pasien->tanggal_keluar))); ?></b>
										</div>
										<div>
											Jam: <b><?= $pasien->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($pasien->tanggal_keluar)); ?></b>
										</div>
									</div>
								</td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="6"></td>
								<td class="no__border" colspan="6">Dokter Penanggung Jawab Pelayanan
									<br><br><br><br><br><br><br><br>
								</td>
							</tr>
							<tr align="center">
								<td class="no__border" colspan="6"></td>
								<td class="no__border" colspan="6">(<b><?= $pasien->dokter_dpjp ?> </b>)</td>
							</tr>
							<tr>
								<td colspan="12">
									Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
									UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)

								</td>
							</tr>
						</tfoot>
					</table>

				</div>
			</section>
		</main>
	</div>

</body>