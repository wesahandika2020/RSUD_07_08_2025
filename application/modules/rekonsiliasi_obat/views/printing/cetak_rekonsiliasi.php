<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rekonsiliasi Obat</title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 8pt;
		}

		@page {
			margin: 0.5cm !important;
		}

		.box-identitas {
			width: 100%;
			border: 1.5px solid black;
			padding: 3px;
		}

		.center {
			text-align: center;
			vertical-align: middle;
		}

		.right {
			text-align: right;
			vertical-align: middle;
		}

		.bold {
			font-weight: bold;
		}

		table {
			border-collapse: collapse;
		}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-data thead th {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td {
			border: none;
			padding: 0;
		}

		.dotted-underline {
			padding: 0 15px;
			border-bottom: 1.5px dotted;
		}

		.solid-underline {
			padding: 0 15px;
			border-bottom: 1.5px solid;
		}

		.border-left {
			border-left: 1.5px solid black;
		}

		.border-bottom {
			border-bottom: 1.5px solid black;
		}

		input[type="checkbox"] {
			margin-top: 1px;
			vertical-align: middle;
		}

		.pd5 {
			padding-bottom: 5px !important;
		}

		.v-center {
			vertical-align: middle !important;
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
		<table width="100%">
			<tr>
				<td width="12%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="43%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="45%">
					<div class="box-identitas">
						<table width="100%">
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->nama; ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->tanggal_lahir !== '' ? datefmysql($pasien->tanggal_lahir) : '-') ?> (<?= createUmur($pasien->tanggal_lahir) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->agama; ?></td>
							</tr>
							<tr>
								<td width="30%">No. RM</td>
								<td width="1%">:</td>
								<td width="69%" class="bold"><?= $pasien->no_rm; ?></td>
							</tr>
							<tr>
								<td>Ruang Rawat / Kelas</td>
								<td>:</td>
								<td class="bold"><?= ($layanan->layanan !== null ? $layanan->layanan : $layanan->bangsal.$layanan->bangsal_ic.'/'.$layanan->kelas.$layanan->kelas_icare) ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td class="bold"><?= $pasien->alamat ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<h1 class="center bold" style="font-size: 12pt">FORM REKONSILIASI OBAT</h1>
		<table width="100%">
			<tr>
				<td>
					<table width="75%" class="table-no-border small__font">
						<tr>
							<td width="25%" class="no__border bold" align="left">Riwayat Alergi</td>
							<td width="5%" class="no__border bold">:</td>
							<td width="35%"class="no__border bold"><input type="checkbox" <?php if(isset($pernah_alergi->pernah_alergi)){if($pernah_alergi->pernah_alergi === 'Pernah'){ echo 'checked'; }else{ echo '';}} ?>> Pernah</input></td>
							<td width="35%"class="no__border bold"><input type="checkbox" <?php if(isset($pernah_alergi->pernah_alergi)){if($pernah_alergi->pernah_alergi === 'Tidak') { echo 'checked'; } else{ echo '';}} ?>> Tidak Pernah</input></td>
						</tr>
					</table>
				</td>
			
			</tr>
			<tr>
				<td>
					<table width="75%" class="table-data small__font">
						<thead>
							
								<th class="bold" align="center" colspan="2">Obat Yang Menimbulkan Alergi</th>
								<th class="bold" align="center">Seberapa Berat Alerginya<b>*</b>?</th>
								<th class="bold" align="center">Reaksi Alergi (Deskripsi Alergi)</th>
							
						</thead>
						<tbody>
						<?php if(isset($riwayat_alergi)){foreach ($riwayat_alergi as $tp) { ?>
							<tr>
								<td align="left" colspan="2"><?= $tp->alergi_obat ?></td>
								<td align="center"><?= $tp->kriteria_alergi ?></td>
								<td><?= $tp->reaksi_alergi ?></td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="75%" class="table-no-border small__font">
						<tr>
							<td width="25%" class="bold" align="left">*: Kriteria Alergi</td>
							<td width="25%" class="bold">R: Ringan</td>
							<td width="25%"class="bold">S: Sedang</td>
							<td width="25%"class="bold">B: Berat</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" class="table-data small__font">
						<thead>
							<tr>
								<th class="bold" align="center" colspan="8">SEMUA OBAT, OBAT RESEP, OBAT BEBAS, HERBAL, ATAU TCM YANG DIBAWA</th>
							</tr>
							<tr>
								<th rowspan="2" class="center">Tanggal Resep</th>
				                <th rowspan="2" class="left">Nama Obat</th>
				                <th rowspan="2" class="center">Dosis/Frekuensi</th>
				                <th rowspan="2" class="left">Petugas</th>
				                <th rowspan="2" class="center">Berapa Lama</th>
				                <th rowspan="2" class="center">Alasan Minum Obat</th>
				                <th colspan="2" class="center">Berlanjut saat Rawat Inap/pindah ruangan/pulang**</th>
							</tr>
							<tr>
			                  	<th class="center">Ya</th>
			                  	<th class="text-center">Tidak</th>
			                </tr>
						</thead>
						<tbody>
							<?php 

							function dateTimeConvert($dt)
								{
								    if ($dt != NULL and $dt != '0000-00-00 00:00:00') {
								        $var = explode(" ", $dt);
								        $var1 = explode("-", $var[0]);
								        $var2 = "$var1[2]/$var1[1]/$var1[0]";
								        return $var2;
								    } else {
								        return '-';
								    }
								}

							function dateConvertRekon($dt)
							{
							    $var = explode(" ", $dt);
							    $var1 = explode("/", $var[0]);
							    $var2 = "$var1[2]-$var1[1]-$var1[0]";

							    return $var2;
							}


							if(isset($resep)){foreach ($resep as $r) {
								if($r->status_resep === '1'){

									$tanggalResep = datefrompg($r->tanggal_resep);
									$kekuatan = $r->kekuatan;

								} else {

									$tanggalResep = dateTimeConvert($r->tanggal_resep);
									$kekuatan = $r->kekuatan.' '.$r->nama;

								}

							?>
							<tr>
							<td class="center"><?= $tanggalResep ?></td>
							<td class="left"><?= $r->nama_lengkap ?></td>
							<td class="center"><?= $kekuatan ?></td>
							<td class="left"><?= $r->nama_user ?></td>
							<td class="center"><?= $r->lama_pakai ?></td>
							<td class="left"><?= $r->alasan_minum ?></td>
							<td class="center"><input type="checkbox" <?php if(isset($r->lanjutan)){if($r->lanjutan === 'iya'){ echo 'checked'; }else{ echo '';}} ?>></td>
							<td class="center"><input type="checkbox" <?php if(isset($r->lanjutan)){if($r->lanjutan === 'tidak'){ echo 'checked'; }else{ echo '';}} ?>></td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<table width="100%" class="table-no-border center">
					<tr>
						<td><br><br><br></td>
					</tr>
					<tr>
						<td width="50%">Apoteker</td>
						<td width="50%">Pasien</td>
					</tr>
					<tr>
						<td><br><br><br><br><br></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><?= (!empty($apoteker->nama) ? '('.$apoteker->nama.')' : '' ) ?></td>
						<td>(<?= $pasien->nama ?>)</td>
					</tr>
				</table>	
			</tr>				
		</table>
		
	</div>
</body>