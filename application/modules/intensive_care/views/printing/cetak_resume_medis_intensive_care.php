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

<title>Document</title>

<body>
	<div class="page">
		<!--=============== HEADER ===============-->
		<header class="header" id="header">
			<div class="header__container container grid">
				<div class="header__container-address grid">
					<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
					<p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
						Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
				</div>
				<div class="secret__container section">
					<h1>RAHASIA</h1>
				</div>
			</div>
		</header>

		<!--=============== MAIN ===============-->
		<main class="main">
			<section class="resume__medis">
				<br>
				<div class="resume__medis__container container">
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
									<b><?= $diagnosa_awal === null ? ($diag_manual === null ? '' : $diag_manual) : $diagnosa_awal; ?></b>
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
							<?php if (!empty($resume_medis->cara_terapi_pengobatan)) : ?>
								<tr>
									<td style="vertical-align: top;" class="no__border">Cara Pemberian Terapi / Pengobatan</td>
									<td style="vertical-align: top;" class="no__border">: </td>
									<td style="vertical-align: top;" colspan="4" class="no__border">
										<b><?= $resume_medis->cara_terapi_pengobatan == NULL ? '' : $resume_medis->cara_terapi_pengobatan . '. '; ?></b>
									</td>
								</tr>
							<?php endif; ?>
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
									<b><?= isset($diagnosa_utama[0]) ? $diagnosa_utama[0]->nama : ''; ?></b>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;" align="left" class="no__border">Diagnosis Sekunder</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $diagnosa_sekunder; ?></b>
									<b><?= $diagnosa_manual_sekunder; ?></b>
									<b><?= $diagnosa_utama_instalasi_lainnya; ?></b>
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
								<td style="vertical-align: top;" class="no__border">Pemeriksaan Penunjang / Diagnostik Terpenting (Input)</td>
								<td style="vertical-align: top;" class="no__border">: </td>
								<td style="vertical-align: top;" colspan="4" class="no__border">
									<b><?= $resume_medis->penunjang_diagnostik == NULL ? '' : $resume_medis->penunjang_diagnostik . '. '; ?></b>
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
					</table>
					<!-- <table class="small__font" style="margin-top: 1rem;">
						<tr>
							<td width="100%"><b>Pemeriksaan Penunjang / Diagnostik Terpenting</b></td>
							</td>
						</tr>
						<tr>
							<td width="100%">
								<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
		                            <div class="card-body">
		                                <div class="row">
		                                    <div class="col-lg-12">
		                                        <div class="box-well">
                                        	<?php if (isset($resume_lab)) {

																						if (isset($status_lab)) {

																							if ($status_lab === false) { ?>

		                                        				<div class="row mt-3" id="item-lab">
								                                    <div class="col-md-12">
								                                        <div class="widget">
								                                            <div class="widget-header">
								                                            </div>
								                                            <div class="widget-body">
								                                                <table class="small__font" style="margin-top: 1rem;">
								                                                    <thead>
								                                                        <tr>
								                                                            <th width="30%">Jenis Pemeriksaan</th>
								                                                            <th width="1%"></th>
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
												                                                            <td class="v-center"><?= $resume_lab[$key][0]->test_group ?></td>
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
								                                            </div>
								                                        </div>
								                                    </div>
								                                </div>  

                                        			<?php 	} else {

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
																								} ?>

                                        						<div class="row mt-3" id="item-lab">
									                                <div class="col-md-12">
									                                    <div class="widget">
									                                        <div class="widget-header">
									                                            <label id="ono-pesan"></label>
									                                        </div>
									                                        <div class="widget-body">
									                                            <table class="small__font" style="margin-top: 1rem;">
									                                                <thead>
									                                                    <tr>
									                                                        <th width="30%">Jenis Pemeriksaan</th>
									                                                        <th width="1%"></th>
									                                                        <th width="29%" class="center">Hasil</th>
									                                                        <th width="15%" class="center">Satuan</th>
									                                                        <th width="15%" class="center">Nilai Rujukan</th>
									                                                        <th width="10%"></th>
									                                                    </tr>
									                                                </thead>
									                                                <tbody>

									                        <?php

																								$arr = [];
																								$arrFlag = [];

																								foreach ($resume_lab as $key => $value) {

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

																								$elementTegr = group_by("ono", $arrFlag);

																								foreach ($elementTegr as $c => $d) {
																									$dataR = $d[0]['release']->date;
																									$tanggalR = substr($dataR, 6, 2);
																									$bulanR = substr($dataR, 4, 2);
																									$tahunR = substr($dataR, 0, 4); ?>

																	<tr>
								                                        <td style="padding-left:40px;" class="v-center bold"><?= $c ?> (tanggal : <?= $tanggalR ?>/<?= $bulanR ?>/<?= $tahunR ?>)</td>
								                                        <td class="v-center bold"></td>
								                                        <td class="v-center bold"></td>
								                                        <td class="v-center bold"></td>
								                                        <td class="v-center bold"></td>
								                                        <td class="v-center bold"></td>
								                                    </tr>
								                                    <tr>
								                                        <td></td>
								                                        <td></td>
								                                        <td></td>
								                                        <td></td>
								                                        <td></td>
								                                        <td></td>
								                                    </tr>

								                              <?php $etvalOtgroup = group_by("test_group", $d);

																									foreach ($etvalOtgroup as $e => $f) {	?>

								                              			<tr>
									                                        <td style="padding-left:60px;" class="v-center bold"><?= $e ?></td>
									                                        <td class="v-center bold"></td>
									                                        <td class="v-center bold"></td>
									                                        <td class="v-center bold"></td>
									                                        <td class="v-center bold"></td>
									                                        <td class="v-center bold"></td>
									                                    </tr>
									                                    <tr>
									                                        <td></td>
									                                        <td></td>
									                                        <td></td>
									                                        <td></td>
									                                        <td></td>
									                                        <td></td>
									                                    </tr>

							                                	<?php $groupedOtname = group_by("order_testnm", $f);

																										foreach ($groupedOtname as $g => $h) {  ?>

								                              				<tr>
									                                            <td style="padding-left:60px;" class="v-center bold"><?= $g ?></td>
									                                            <td class="v-center bold"></td>
									                                            <td class="v-center bold"></td>
									                                            <td class="v-center bold"></td>
									                                            <td class="v-center bold"></td>
									                                            <td class="v-center bold"></td>
									                                        </tr>
									                                        <tr>
									                                            <td></td>
									                                            <td></td>
									                                            <td></td>
									                                            <td></td>
									                                            <td></td>
									                                            <td></td>
									                                        </tr>
									                             			<tr>	
																					
																<?php $status = [];

																											array_push($status, $h);

																											foreach ($status as $i => $j) {

																												$ref_range = '';

																												$volume  = array_column($j, 'disp_seq');
																												array_multisort($volume, SORT_ASC, $j);

																												foreach ($j as $k => $l) { ?>

																			<?php if (empty($l['nama'])) {

																			?>	
										                              					<td style="padding-left:80px;" class="v-center"></td>
										                              		
										                              		<?php 	} else {

																														foreach ($l['nama'] as $m => $n) {

																															if ($n->nama === 'Hitung Jenis') { ?>

										                              							<td style="padding-left:80px;" class="v-center bold" ><?= $n->nama ?></td>

										                              				<?php 	} else { ?>

										                              							<td style="padding-left:80px;" class="v-center" ><?= $n->nama ?></td>

										                              				<?php 	} ?>

										                              			<?php 	} ?>

										                              		<?php 	} ?>

							                              					<?php

																													$flag = '<td style="color:red;padding-left:10px;border: solid 1px;" class="v-center">' . $l['flag'] . '</td>';

																													if ($l['ref_range'] === '' && $l['unit'] === '') {

																														if (strlen($l['result_value']) < 10) {

																															$ref_range = '<td style="padding-left:10px;border: solid 1px;" align="center">' . $l['result_value'] . '
																											</td>
																											<td align="center" style="border: solid 1px;">' . $l['unit'] . '</td>
																											<td align="center" style="border: solid 1px;">' . $l['ref_range'] . '
																											';
																														} else {


																															$ref_range = '<td style="padding-left:10px;" align="center" colspan="4">' . $l['result_value'] . ' </td>';
																														}
																													} else {


																														$ref_range = '<td style="padding-left:10px;border: solid 1px;" align="center">' . $l['result_value'] . '
																											</td>
																											<td align="center" style="border: solid 1px;">' . $l['unit'] . '</td>
																											<td align="center" style="border: solid 1px;">' . $l['ref_range'] . '
																											';
																													} ?>

																					<?= $flag; ?>
																					<?= $ref_range; ?> 

																					<td align="center" style="border: solid 1px;"><?= $l['test_comment'] ?></td></tr>
																											

									                              		<?php 	} ?>


								                              		
								                              		<?php 	}	?>	

								                          		<?php 	}  ?>
									                        				
									                      <?php 	}	?>

														<?php 	}	?>

																					</tbody>
								                                                </table>
								                                            </div>
								                                        </div>
								                                    </div>
								                                </div>

                                        		<?php		}
																						}
																					} ?>
	                                        										

		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                     </td>
						</tr>
						<tr>
							<td width="100%">
								<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
		                            <div class="card-body">
		                                <div class="row">
		                                    <div class="col-lg-12">
		                                        <div class="box-well">
		                                        	<?php if (!empty($cek_radiologi)) { ?>

		                                        		<div class="row mt-3" id="hasil-radiologi">
								                            <div class="col-md-12">
								                                <div class="widget">
								                                    <div class="widget-header">
								                                    </div>
								                                    <div class="widget-body">
								                                        <table class="small__font" style="margin-top: 1rem;">
								                                            <thead>
								                                                <tr>
								                                                    <th width="10%">No</th>
								                                                    <th width="20%" class="center">Nama Layanan</th>
								                                                    <th width="70%" class="center">Hasil Radiologi</th>
								                                                </tr>
								                                            </thead>
								                                            <tbody>

								                                            	<?php foreach ($cek_radiologi as $key => $cr) { ?>

								                                            		<tr>
														                                <td class="center"><?= $cr->kode; ?></td>
														                                <td class="center"><?= $cr->layanan; ?></td>
														                                <td class="center"><?= $cr->hasil; ?></td>
														                            </tr>

								                                            	<?php }	?>
								                                            </tbody>
								                                        </table>
								                                    </div>
								                                </div>
								                            </div>
								                        </div>

		                                        	<?php }	?>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                     </td>
						</tr>
					</table> -->

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
						<!-- <tbody>
							<-?php foreach ($resume_terapi_pulang as $tp) { ?>
								<tr>
									<td><-?php echo $tp->barang_auto; ?></td>
									<td align="center"><-?php echo $tp->jumlah_obat; ?></td>
									<td align="center"><-?php echo $tp->dosis; ?></td>
									<td align="center"><-?php echo $tp->frekuensi; ?></td>
									<td align="center"><-?php echo $tp->cara_pemberian; ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian); ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian_satu); ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian_dua); ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian_tiga); ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian_empat); ?></td>
									<td align="center"><-?php echo timeExplode($tp->ek_jam_pemberian_lima); ?></td>
									<td><-?php echo $tp->petunjuk_khusus; ?></td>
								</tr>
							<-?php } ?>
						</tbody> -->

						<tbody>
							<?php foreach ($terapi_pulang as $tp) { ?>
								<tr>
									<td><?php echo $tp->nama_obat; ?></td>
									<td align="center"><?php echo $tp->jumlah_obat; ?></td>
									<td align="center"><?php echo $tp->dosis; ?></td>
									<td align="center"><?php echo $tp->frekuensi; ?></td>
									<td align="center"><?php echo $tp->cara_pemberian; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian_satu; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian_dua; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian_tiga; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian_empat; ?></td>
									<td align="center"><?php echo $tp->ek_jam_pemberian_lima; ?></td>
									<td><?php echo $tp->petunjuk_khusus; ?></td>
								</tr>
							<?php } ?>
						</tbody>


						<tfoot>
							<tr align="center">
								<td class="no__border" colspan="6"></td>
								<td class="no__border" colspan="7">
									<div style="display: flex; flex-direction: column;">
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
								<td class="no__border" colspan="7">Dokter Penanggung Jawab Pelayanan
									<?php if (!$pasien->tanda_tangan) : ?>
										<br><br><br><br><br><br><br><br>
									<?php endif ?>
								</td>
							</tr>
							<?php if ($pasien->tanda_tangan) : ?>
								<tr align="center">
									<td class="no__border" colspan="6"></td>
									<td class="no__border" colspan="7">
										<img src="<?= resource_url() . 'images/ttd_dokter/' . $pasien->tanda_tangan ?>" alt="ttd-dokter" width="300">
									</td>
								</tr>
							<?php endif ?>
							<tr align="center">
								<td class="no__border" colspan="6"></td>
								<td class="no__border" colspan="7">(<b><?= $pasien->dokter_dpjp ?> </b>)</td>
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
<?php die; ?>