<?php

function cekUmurPasien($tanggal_lahir)
{
	$tgl1 = date_create($tanggal_lahir);
	$tgl2 = date_create(date('Y-m-d'));
	$sql = date_diff($tgl2, $tgl1);
	$hasil = $sql->format('%a');
	$hasil_sql = floor($hasil / 365);
	return $hasil_sql;
}

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
<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
<script>
	function cetak() {


		setTimeout(function() {
			// window.close()
		}, 300);
		window.print();
		tambahCetakLAB();

	}

	function tambahCetakLAB() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('hasil_laboratorium/api/hasil_laboratorium/tambah_rekap_cetak') ?>',
			data: 'id_lab=' + id_lab,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (!data.status) {
					alert('Gagal menambah jumlah cetakan')
				}
			},
			error: function(e) {
				alert('Gagal menambah jumlah cetakan')
			}
		})
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
<?php for ($indexData = 0; $indexData < $length; $indexData++) : ?>



	<body>
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
					<td class="bold" style="text-align:center">LABORATORIUM <?php echo strtoupper($laboratorium[$indexData]->jenis); ?></td>
				</tr>
			</table>
			<br>
			<table width="100%" class="td-top">
				<tr>
					<td width="15%">Dokter Perujuk</td>
					<td width="1%">:</td>
					<td width="34%"></td>
					<td></td>
					<td width="20%">Nama Pasien</td>
					<td width="1%">:</td>
					<td width="29%"></td>
				</tr>
				<tr>
					<td width="34%" class="bold italic" colspan="3"><?= $pendaftaran[$indexData]['layanan']->dokter ?></td>
					<td></td>
					<td width="29%" class="bold italic" colspan="3"><?= $pendaftaran[$indexData]['pasien']->nama ?></td>
				</tr>
				<tr>
					<td width="15%">No. Lab</td>
					<td width="1%">:</td>
					<td width="34%"><?= $laboratorium[$indexData]->kode ?></td>
					<td></td>
					<td width="20%">No. RM</td>
					<td width="1%">:</td>
					<td width="29%"><?= $pendaftaran[$indexData]['pasien']->id_pasien ?></td>
				</tr>
				<tr>
					<td>Cara Bayar</td>
					<td>:</td>
					<td><?= $pendaftaran[$indexData]['layanan']->cara_bayar ?> <?= ($pendaftaran[$indexData]['layanan']->cara_bayar !== null) ? $pendaftaran[$indexData]['layanan']->penjamin : "" ?></td>
					<td></td>
					<td>Tgl. Lahir/Umur</td>
					<td>:</td>

					<td><?= datefmysql($pendaftaran[$indexData]['pasien']->tanggal_lahir) ?> (<?= cekUmurPasien($pendaftaran[$indexData]['pasien']->tanggal_lahir) ?> Tahun)</td>
				</tr>
				<tr>
					<td>Kelamin</td>
					<td>:</td>
					<td><?= (($pendaftaran[$indexData]['pasien']->kelamin === 'L') ? 'Laki - Laki' : (($pendaftaran[$indexData]['pasien']->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
					<td></td>
					<td>Tanggal Terima</td>
					<td>:</td>
					<?php if (isset($lab_value[$indexData])) : ?>
						<?php foreach ($lab_value[$indexData]->detail as $key => $value) :

							if ($value->specimen->date !== null) :

								$tanggal_terima = $value->specimen->date;
								$hasil_terima_tanggal = [$tanggal_terima];
						?>



							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif ?>

					<?php $result_terima_tanggal = array_unique($hasil_terima_tanggal);
					$ta_trim = substr($result_terima_tanggal[0], 6, -6) . '/' . substr($result_terima_tanggal[0], 4, -8) . '/' . substr($result_terima_tanggal[0], 0, 4) . ' ' . substr($result_terima_tanggal[0], 8, -4) . ':' . substr($result_terima_tanggal[0], 10, -2); ?>
					<td><?= $ta_trim; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?= $pendaftaran[$indexData]['pasien']->alamat ?></td>
					<td></td>
					<td>Tanggal Hasil</td>
					<td>:</td>
					<?php if (isset($lab_value[$indexData])) : ?>
						<?php foreach ($lab_value[$indexData]->detail as $key => $value) :

							if ($value->release->date !== null) :

								$tanggal_hasil = $value->release->date;
								$hasil_tanggal = [$tanggal_hasil];


						?>

							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif ?>
					<?php $result_tanggal = array_unique($hasil_tanggal);
					$ta_hasil = substr($result_tanggal[0], 6, -6) . '/' . substr($result_tanggal[0], 4, -8) . '/' . substr($result_tanggal[0], 0, 4) . ' ' . substr($result_tanggal[0], 8, -4) . ':' . substr($result_tanggal[0], 10, -2); ?>
					<td><?= $ta_hasil; ?></td>

				</tr>
				<tr>
					<td>Unit</td>
					<td>:</td>
					<td><?= ($pendaftaran[$indexData]['layanan']->layanan !== null) ? 'POLI ' . $pendaftaran[$indexData]['layanan']->layanan : $pendaftaran[$indexData]['layanan']->bangsal ?></td>
					<td></td>
					<td>Tanggal Print</td>
					<td>:</td>
					<td><?= Date('d/m/Y h:i', $_SERVER['REQUEST_TIME']) ?></td>

				</tr>
				<tr>
					<td>Status Pasien</td>
					<td>:</td>
					<td><?= ($pendaftaran[$indexData]['layanan']->penjamin !== "") ? $pendaftaran[$indexData]['layanan']->penjamin : $pendaftaran[$indexData]['layanan']->cara_bayar ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php

				if (isset($diagnosa[$indexData]->diagnosis)) {

					$sebab_sakit_lain = $diagnosa[$indexData]->diagnosis;
				} else {

					$s_sebab = substr($diagnosa[$indexData]->sebab_sakit, 0, 100);

					if (is_string($s_sebab)) {

						$sebab_sakit_lain = $s_sebab;
					} else {

						$sebab_sakit_lain = null;
					}
				}

				?>
				<tr>
					<td>Diagnosis</td>
					<td>:</td>
					<td><?= $sebab_sakit_lain ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<br><br>


			<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="font-size: 12px">
				<tr>
					<th width="25%" style="text-align:left;padding-bottom:10px;">JENIS PEMERIKSAAN</th>
					<th width="10%"></th>
					<th width="15%">HASIL</th>
					<th width="10%">SATUAN</th>
					<th width="25%">NILAI RUJUKAN</th>
					<th width="15%"></th>
				</tr>
				<?php if (isset($lab_value[$indexData])) : ?>
					<?php

					$arr = [];

					foreach ($lab[$indexData] as $key => $value) {
						array_push($arr, $value);
					}

					$keys = array_column($arr, 'test_group');
					array_multisort($keys, SORT_ASC, $arr);

					$byGroup = group_by("test_group", $arr);

					foreach ($byGroup as $key => $value) : ?>

						<tr>
							<td style="padding-top:10px;padding-left:40px;font-weight: bold;"><?= $key ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td style="padding-bottom:10px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

						<?php $orderGroup = group_by("order_testnm", $value);

						foreach ($orderGroup as $a => $b) : ?>

							<tr>
								<td style="padding-left:60px;font-weight: bold;"><?= $a ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td style="padding-bottom:10px;"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>


							<?php

							$arry = [];

							array_push($arry, $b);



							foreach ($arry as $c => $d) : ?>

								<?php



								$ref_range = '';

								$volume  = array_column($d, 'disp_seq');
								array_multisort($volume, SORT_ASC, $d);

								foreach ($d as $e => $f) : ?>
									<tr>
										<?php if (empty($f['nama'])) : ?>

											<td style="padding-bottom:10px;padding-left:80px;"></td>

										<?php else : ?>

											<?php foreach ($f['nama'] as $g => $h) :

												if ($h->nama === 'Hitung Jenis') {

											?>



													<td style="padding-bottom:10px;font-weight: bold;padding-left:80px;"><?= $h->nama ?></td>

												<?php } else { ?>

													<td style="padding-bottom:10px;padding-left:80px;"><?= $h->nama ?></td>

											<?php }
											endforeach; ?>

										<?php endif;

										if ($f['flag'] === 'N') {

											$flag = '<td align="center"></td>';
										} else {

											$flag = '<td align="center" style="color:red;">' . $f['flag'] . '</td>';
										}

										if ($f['ref_range'] === '' && $f['unit'] === '' && $f['test_comment'] === '') {

											if (strlen($f['result_value']) < 10) {

												$ref_range = '<td style="padding-left:10px;" align="center">' . $f['result_value'] . '
														</td>
														<td align="center" style="">' . $f['unit'] . '</td>
														<td align="center" style="">' . $f['ref_range'] . '
														<td align="center" style="">' . $f['test_comment'] . '</td>
														';
											} else {

												$ref_range = '<td style="padding-left:10px;" align="center" colspan="4">' . $f['result_value'] . '
											</td>';
											}
										} else {

											$ref_range = '<td style="padding-left:10px;" align="center">' . $f['result_value'] . '
														</td>
														<td align="center" style="">' . $f['unit'] . '</td>
														<td align="center" style="">' . $f['ref_range'] . '
														<td align="center" style="">' . $f['test_comment'] . '</td>
														';
										}

										?>

										<?= $flag; ?>
										<?= $ref_range; ?>

									<?php endforeach; ?>

									</tr>

								<?php endforeach; ?>



							<?php endforeach; ?>


						<?php endforeach; ?>
					<?php endif ?>

			</table>
			<?php if (isset($lab_value[$indexData])) : ?>
				<p><span style="font-weight:bold;">Catatan</span><br /><?= $lab_value[$indexData]->global_comment ?></p>
			<?php endif ?>
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
					<td width="70%">
						<p align="left">
							Dokter penanggung jawab :
							<br><br><br><br><br><br><br>
							<b>(<?= $laboratorium[$indexData]->dokter_pjwb ?>)</b>
							<br><b>(SIP. <?= $laboratorium[$indexData]->nomer_sip ?>)</b>

						</p>
					</td>
					<td width="30%">
						<p align="left">
							Pemeriksa : <br /><br /><br /><br /><br />
							<b>( <?= $laboratorium[$indexData]->lab_analis ?> )</b>
						</p>
					</td>
				</tr>
				<?php for ($i = 1; $i < 10; $i++) : ?>
					<tr>
						<td colspan="2"></td>
						<td colspan="2"></td>
					</tr>
				<?php endfor; ?>
				<tr>
					<td colspan="5" width="50%" class="left"><?= 'Cetakan ke: <b style="font-weight:bold;">' . ($cetakan_lab[$indexData]->cetakan + 1) . '</b> (' . $waktu_cetak . ')' ?></td>
				</tr>
			</table>
			<br><br>
		</div>

	</body>
<?php endfor ?>