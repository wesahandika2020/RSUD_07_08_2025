<?php

$param_title = date( 'd/m/Y' );
if ( $parameter['periode_laporan'] === 'Harian' ) {
	$param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ( $parameter['periode_laporan'] === 'Bulanan' ) {
	$param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ( $parameter['periode_laporan'] === 'Rentang Waktu' ) {
	$param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

$jenis_rawat = '';
if ( $parameter['jenis_rawat'] == '1' ) {
	$jenis_rawat = 'Rawat Jalan';
} elseif ( $parameter['jenis_rawat'] == '2' ) {
	$jenis_rawat = 'Rawat Inap';
}else if ($parameter['jenis_rawat'] == '3') {
	$jenis_rawat = 'IGD';
}else if ($parameter['jenis_rawat'] == '4') {
	$jenis_rawat = 'Penunjang';
}

if ( $parameter['tab_active'] === 'laporan-wabah' ) {
	header_excel(
			"Laporan Wabah - ( " . $periode . " )"
	);
} else {
	header_excel(
			"Daftar Verifikasi Diagnosis - ( " . $periode . " )"
	);
}
header( "Content-type: application/vnd-ms-excel" );

header( "Pragma: no-cache" );

header( "Expires: 0" );

?>

<body>
<h4>RSUD KOTA TANGERANG
	<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
	<br> Telepon (021) 29720201-03
</h4>

<?php if ( $parameter['tab_active'] === 'laporan-wabah' ) : ?>
	<div style="text-align: center;">
		<h4 style="text-transform: uppercase;">LAPORAN WABAH
			<br>Periode <?= $periode ?>
			<br>RAWAT JALAN - SEMUA
		</h4>
	</div>

	<table width="100%" border="1">
		<thead>
		<tr>
			<th rowspan="3" class="center">no</th>
			<th rowspan="3" class="center">kecamatan</th>
			<th colspan="4" class="center">diare</th>
			<th colspan="2" rowspan="2" class="center">dbd</th>
			<th colspan="4" class="center">Campak</th>
			<th colspan="4" class="center">Peunomia</th>
			<th colspan="2" rowspan="2" class="center">Gizi Buruk</th>
			<th colspan="2" rowspan="2" class="center">TB Positif</th>
			<th rowspan="3" class="center">ILI</th>
		</tr>
		<tr>
			<th colspan="2" class="center">&lt;5th</th>
			<th colspan="2" class="center">&gt;5th</th>
			<th colspan="2" class="center">&lt;5th</th>
			<th colspan="2" class="center">&gt;5th</th>
			<th colspan="2" class="center">&lt;5th</th>
			<th colspan="2" class="center">&gt;5th</th>
		</tr>
		<tr>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
			<th class="center">P</th>
			<th class="center">M</th>
		</tr>
		<tr>
			<th class="center">1</th>
			<th class="center">2</th>
			<th class="center">3</th>
			<th class="center">4</th>
			<th class="center">5</th>
			<th class="center">6</th>
			<th class="center">7</th>
			<th class="center">8</th>
			<th class="center">9</th>
			<th class="center">10</th>
			<th class="center">11</th>
			<th class="center">12</th>
			<th class="center">13</th>
			<th class="center">14</th>
			<th class="center">15</th>
			<th class="center">16</th>
			<th class="center">17</th>
			<th class="center">18</th>
			<th class="center">19</th>
			<th class="center">20</th>
			<th class="center">21</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$jumlDiareUnder5         = 0;
		$jumlDiareUpper5         = 0;
		$jumlDbd                 = 0;
		$jumlCampakUnder5        = 0;
		$jumlCampakUpper5        = 0;
		$jumlPneunomiaUnder5     = 0;
		$jumlPneunomiaUpper5     = 0;
		$jumlGiziBuruk           = 0;
		$jumlTbPositif           = 0;

		foreach ( $laporan_wabah as $i => $value ) :
			$jumlDiareUnder5 += $value->diare_under_5;
			$jumlDiareUpper5     += $value->diare_uper_5;
			$jumlDbd             += $value->dbd;
			$jumlCampakUnder5    += $value->campak_under_5;
			$jumlCampakUpper5    += $value->campak_upper_5;
			$jumlPneunomiaUnder5 += $value->pneumonia_under_5;
			$jumlPneunomiaUpper5 += $value->pneumonia_upper_5;
			$jumlGiziBuruk       += $value->gizi_buruk;
			$jumlTbPositif       += $value->tb_positif;
			?>
			<tr>
				<td class="center"><?= ++ $i ?></td>
				<td class="center"><?= $value->nama_kec ?></td>
				<td class="left"><?= $value->diare_under_5 != '0' ? $value->diare_under_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->diare_uper_5 != '0' ? $value->diare_uper_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->dbd != '0' ? $value->dbd : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->campak_under_5 != '0' ? $value->campak_under_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->campak_upper_5 != '0' ? $value->campak_upper_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->pneumonia_under_5 != '0' ? $value->pneumonia_under_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->pneumonia_upper_5 != '0' ? $value->pneumonia_upper_5 : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->gizi_buruk != '0' ? $value->gizi_buruk : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->tb_positif != '0' ? $value->tb_positif : '' ?></td>
				<td class="center"></td>
				<td class="center"><?= $value->diare_under_5 + $value->diare_uper_5 + $value->dbd + $value->campak_under_5 + $value->campak_upper_5 + $value->pneumonia_under_5 + $value->pneumonia_upper_5 + $value->gizi_buruk + $value->tb_positif ?></td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td colspan="2" class="center">jumlah</td>
			<td class="center"><?= $jumlDiareUnder5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlDiareUpper5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlDbd ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlCampakUnder5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlCampakUpper5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlPneunomiaUnder5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlPneunomiaUpper5 ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlGiziBuruk ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlTbPositif ?></td>
			<td class="center">0</td>
			<td class="center"><?= $jumlDiareUnder5 + $jumlDiareUpper5 + $jumlDbd + $jumlCampakUnder5 + $jumlCampakUpper5 + $jumlPneunomiaUnder5 + $jumlPneunomiaUpper5 + $jumlGiziBuruk + $jumlTbPositif ?></td>
		</tr>
		</tbody>
	</table>

<?php else : ?>
	<div style="text-align: center;">
		<h4 style="text-transform: uppercase;">DAFTAR VERIFIKASI DIAGNOSIS PASIEN SEMUA
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table width="100%" border="1">
		<thead>
		<tr height="50px">
			<th class="center">No.</th>
			<th class="center">Tanggal Kunjungan</th>
			<th class="center">No. RM</th>
			<th class="left">Nama</th>
			<th class="center">Penjamin</th>
			<th class="left">ICD X Diagnosa</th>
			<th class="left">Dokter DPJP</th>
			<th class="center">Kunjungan</th>
			<th class="center">JK</th>
			<th class="center">Umur</th>
			<th class="center">Alamat</th>
			<th class="left">Kecamatan</th>
			<th class="center">Tanggal Keluar</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $data as $i => $value ) : ?>
			<?php foreach ( $value->diagnosa_data as $key => $diagnosa_data ) : ?>
				<?php if ( $key <= 0 ): ?>
					<tr>
						<td align="center" style="vertical-align: top;"><?= ++ $i ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->tanggal_daftar ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->id_pasien ?></td>
						<td style="vertical-align: top;"><?= $value->nama_pasien ?></td>
						<td width="7%" class="center" style="vertical-align: top;"><?= $value->penjamin ?? 'Tunai' ?></td>
						<td style="vertical-align: top;"><?= ( $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ) ?></td>
						<td style="vertical-align: top;"><?= $value->nama_dokter ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->kunjungan ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->kelamin ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->umur ?></td>
						<td style="vertical-align: top;"><?= $value->alamat ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->nama_kec ?></td>
						<td class="center" style="vertical-align: top;"><?= $value->tgl_keluar ?></td>
					</tr>
				<?php else : ?>
					<tr>
						<td colspan="5"> </td>
						<td><?= ( $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ) ?></td>
						<td colspan="7"> </td>
					</tr>
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
		</tbody>
	</table>

<?php endif; ?>
</body>
