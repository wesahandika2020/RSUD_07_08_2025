<?php if ($type === 'print') : ?>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
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
					<td class="bold" style="text-align:center">LABORATORIUM <?php echo strtoupper($laboratorium->jenis); ?></td>
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
					<td width="34%" class="bold italic" colspan="3"><?= $pendaftaran['layanan']->dokter ?></td>
					<td></td>
					<td width="29%" class="bold italic" colspan="3"><?= $pendaftaran['pasien']->nama ?></td>
				</tr>
				<tr>
					<td width="15%">No. Lab</td>
					<td width="1%">:</td>
					<td width="34%"><?= $laboratorium->kode ?></td>
					<td></td>
					<td width="20%">No. RM</td>
					<td width="1%">:</td>
					<td width="29%"><?= $pendaftaran['pasien']->id_pasien ?></td>
				</tr>
				<tr>
					<td>Cara Bayar</td>
					<td>:</td>
					<td><?= $pendaftaran['layanan']->cara_bayar ?> <?= ($pendaftaran['layanan']->cara_bayar !== null) ? $pendaftaran['layanan']->penjamin : "" ?></td>
					<td></td>
					<td>Tgl. Lahir/Umur</td>
					<td>:</td>
					<?php 

					function cekUmurPasien($tanggal_lahir)
					    {
					    
					        $tgl1 = date_create($tanggal_lahir);
					        $tgl2 = date_create(date('Y-m-d'));
					        $sql = date_diff($tgl2, $tgl1);
					        $hasil = $sql->format('%a');
					        $hasil_sql = floor($hasil / 365);
					        return $hasil_sql;

					    } ?>
					<td><?= datefmysql($pendaftaran['pasien']->tanggal_lahir) ?> (<?= cekUmurPasien($pendaftaran['pasien']->tanggal_lahir) ?> Tahun)</td>
				</tr>
				<tr>
					<td>Kelamin</td>
					<td>:</td>
					<td><?= (($pendaftaran['pasien']->kelamin === 'L') ? 'Laki - Laki' : (($pendaftaran['pasien']->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
					<td></td>
					<td>Tanggal Terima</td>
					<td>:</td>
					<?php foreach ($lab_value->detail as $key => $value):

						if($value->specimen->date !== null):

							$tanggal_terima = $value->specimen->date;
							$hasil_terima_tanggal = [$tanggal_terima];
							

							

						?>

					

						<?php endif;?>


					<?php endforeach; ?>
					<?php $result_terima_tanggal = array_unique($hasil_terima_tanggal); $ta_trim = substr($result_terima_tanggal[0],6, -6).'/'.substr($result_terima_tanggal[0],4,-8).'/'.substr($result_terima_tanggal[0],0,4).' '.substr($result_terima_tanggal[0],8,-4).':'.substr($result_terima_tanggal[0],10,-2);?>
					<td><?= $ta_trim; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?= $pendaftaran['pasien']->alamat ?></td>
					<td></td>
					<td>Tanggal Hasil</td>
					<td>:</td>
					<?php foreach ($lab_value->detail as $key => $value):

						if($value->release->date !== null):

							$tanggal_hasil = $value->release->date;
							$hasil_tanggal = [$tanggal_hasil];
							

						?>

					<?php endif;?>
					<?php endforeach; ?>
					<?php $result_tanggal = array_unique($hasil_tanggal); $ta_hasil = substr($result_tanggal[0],6, -6).'/'.substr($result_tanggal[0],4,-8).'/'.substr($result_tanggal[0],0,4).' '.substr($result_tanggal[0],8,-4).':'.substr($result_tanggal[0],10,-2);?>
					<td><?= $ta_hasil; ?></td>

				</tr>
				<tr>
					<td>Unit</td>
					<td>:</td>
					<td><?= ($pendaftaran['layanan']->layanan !== null)?'POLI '.$pendaftaran['layanan']->layanan:$pendaftaran['layanan']->bangsal ?></td>
					<td></td>
					<td>Tanggal Print</td>
					<td>:</td>
					<td><?= Date('d/m/Y h:i', $_SERVER['REQUEST_TIME']) ?></td>

				</tr>
				<tr>
					<td>Status Pasien</td>
					<td>:</td>
					<td><?= ($pendaftaran['layanan']->penjamin !== "") ? $pendaftaran['layanan']->penjamin : $pendaftaran['layanan']->cara_bayar ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<br><br>
			

			<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="font-size: 12px; border: solid 1px;">
				<tr>
					<th align="center" width="25%" style="padding-left:60px;padding-top:10px;padding-bottom:10px;border: solid 1px;">JENIS PEMERIKSAAN</th>
					<th width="10%" style="border: solid 1px;"></th>
					<th width="15%" style="border: solid 1px;">HASIL</th>
					<th width="10%" style="border: solid 1px;">SATUAN</th>
					<th width="25%" style="border: solid 1px;">NILAI RUJUKAN</th>
					<th width="15%" style="border: solid 1px;"></th>
				</tr>
				<tr>
					<td style="padding-bottom:10px;padding-top:10px;border-left: solid 1px;"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td style="border-right: solid 1px;"></td>
				</tr>


				<?php 

				function group_by($key, $data) {
				    $result = array();

				    foreach($data as $val) {
				        if(array_key_exists($key, $val)){
				            $result[$val[$key]][] = $val;
				        }else{
				            $result[""][] = $val;
				        }
				    }

				    return $result;
				}

				$arr = [];

				foreach ($lab as $key => $value) {


							array_push($arr, $value);

						
						}

						$keys = array_column($arr, 'test_group');
						array_multisort($keys, SORT_ASC, $arr);
						
						$byGroup = group_by("test_group", $arr);

					foreach ($byGroup as $key => $value): ?>


						<tr>
							<td style="padding-bottom:10px;padding-left:40px;padding-top:10px;font-weight: bold;border-left: solid 1px;"><?= $key ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="border-right: solid 1px;"></td>
						</tr>
						<tr>
							<td style="padding-bottom:10px;padding-top:10px;border-left: solid 1px;"></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td style="border-right: solid 1px;"></td>
						</tr>
					
					
						<?php $orderGroup = group_by("order_testnm", $value); 
						foreach ($orderGroup as $a => $b){?>

								<tr>
									<td style="padding-left:60px;padding-top:10px;padding-bottom:10px;font-weight: bold;border-left: solid 1px;"><?= $a ?></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td style="border-right: solid 1px;"></td>
								</tr>
								<tr>
									<td style="padding-bottom:10px;padding-top:10px;border-left: solid 1px;"></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td style="border-right: solid 1px;"></td>
								</tr>

							 	<?php  

								$arry = [];
								
								array_push($arry, $b);

								foreach ($arry as $c => $d){ ?>

									<?php

									$ref_range = '';

									$volume  = array_column($d, 'disp_seq');
									array_multisort($volume, SORT_ASC, $d);

									foreach ($d as $e => $f){ ?>
									<tr>
										
									<?php if(empty($f['nama'])){ ?>

							 			<td style="padding-bottom:10px;padding-left:80px;padding-top:10px;border: solid 1px;"></td>

									<?php } else { ?>
							
										<?php foreach ($f['nama'] as $g => $h){

											if($h->nama === 'Hitung Jenis'){

											?>


											<td style="padding-left:80px;font-weight: bold;padding-bottom:10px;border: solid 1px;"><?= $h->nama ?></td>

											<?php } else { 

													if ($f['nama'][0]->nama === 'HBsAg (Rapid)' && $f['nama'][1]->nama === 'Rapid HBsAg (Dinkes Kota)'){

												?>

														<td style="padding-left:80px;padding-bottom:10px;padding-top:10px;border: solid 1px;"><?= $f['nama'][1]->nama ?></td>

											<?php 	
													break;

													} else { ?>


														<td style="padding-left:80px;padding-bottom:10px;padding-top:10px;border: solid 1px;"><?= $h->nama ?></td>

											<?php 	}

												} 

											} ?>

									<?php }

									if ($f['flag'] === 'N' | $f['flag'] === '') {$flag = '<td style="padding-left:10px;border: solid 1px;" align="center"></td>';} else {$flag = '<td style="color:red;padding-left:10px;border: solid 1px;" align="center">'.$f['flag'].'</td>';}

										if($f['ref_range'] === '' && $f['unit'] === '' && $f['test_comment'] === ''){

												if(strlen($f['result_value']) < 15){

													$ref_range = '<td style="padding-left:10px;border: solid 1px;" align="center">' . $f['result_value'] . '
																</td>
																<td align="center" style="border: solid 1px;">' . $f['unit'] . '</td>
																<td align="center" style="border: solid 1px;">' . $f['ref_range'] . '
																<td align="center" style="border: solid 1px;">' . $f['test_comment'] . '</td>
																';

												} else {

													$ref_range = '<td style="padding-left:10px;border: solid 1px;" align="center" colspan="4">' . $f['result_value'] . '
												</td>';

												}

												
										} else {

												$ref_range = '<td style="padding-left:10px;border: solid 1px;" align="center">' . $f['result_value'] . '
																</td>
																<td align="center" style="border: solid 1px;">' . $f['unit'] . '</td>
																<td align="center" style="border: solid 1px;">' . $f['ref_range'] . '
																<td align="center" style="border: solid 1px;">' . $f['test_comment'] . '</td>
																';
											}

									?>
									<?= $flag; ?>
									<?= $ref_range; ?> 
									
								
							
								<?php } ?>

								</tr>

						<?php } ?>

					<?php } ?>

				<?php endforeach; ?>

			</table>        

			<p><span style="font-weight:bold;">Catatan</span><br/><?= $lab_value->global_comment ?></p>
			<br><br>

			<table width="100%">
				<tr><td></td><td></td></tr>
				<tr><td colspan="2" align="right"></td></tr>
				<tr>
					<td width="70%">
						<p align="left">
							Dokter penanggung jawab  : 
							<br><br><br><br><br><br><br>
							<b>(<?= $laboratorium->dokter_pjwb ?>)</b>
							<br><b>(NIP. <?= $laboratorium->nip_dokter_pjwb ?>)</b>
						</p>
					</td>
					<td width="30%">
						<p align="left">
							Pemeriksa : <br/><br/><br/><br/><br/>
							<b>( <?= $laboratorium->lab_analis ?> )</b>
						</p>
					</td>
				</tr>
			</table>
			<br><br>
		</div>
	</body>


