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

// $data["periode"] = "Periode : " . $periode;


header_excel(
		"Rekapulasi Data Pasien Keluar - " . $jenis_rawat . " ( " . $periode . " )"
);
header( "Content-type: application/vnd-ms-excel" );

header( "Pragma: no-cache" );

header( "Expires: 0" );

?>

<body>
<h4>RSUD KOTA TANGERANG
	<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
	<br> Telepon (021) 29720201-03
	<br><br> Rekapulasi Data Pasien Keluar - <b style="text-transform: uppercase;"><?= $jenis_rawat ?></b>
	<br> Tempat layanan - <b style="text-transform: uppercase;"><?= ( $parameter["tempat_layanan_2"] == "" ? "SEMUA" : $parameter["tempat_layanan_2"] ) ?></b>
	<br> Periode : <?= $periode ?>
	<br> Status kunjungan - <b style="text-transform: uppercase;"><?= ( $parameter["kunjungan"] == "" ? "SEMUA" : $parameter["kunjungan"] ) ?></b>
</h4>

<table width="100%" border="1">
	<thead border="2">
	<tr height="50pt">
		<th class="center">No.</th>
		<th class="center">No. RM</th>
		<th class="center">Kunjungan</th>
		<th class="left">Nama Pasien</th>
		<th class="left">Alamat</th>
		<th class="center">Kecamatan</th>
		<th class="center">Umur</th>
		<th class="center">L/P</th>
		<th class="center">Penjamin</th>
		<th class="center">Kelas</th>
		<th class="center">Ruangan</th>
		<th class="center">Tanggal Masuk</th>
		<th class="center">Status Keluar</th>
		<th class="left">Diagnosa</th>
		<th class="left">Dokter DPJP</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $data as $i => $value ) : ?>
		<?php foreach ( $value->diagnosa_data as $key => $diagnosa_data ) : ?>
			<?php if ( $key <= 0 ): ?>
				<tr>
					<td class="center" style="vertical-align: top;"><?= ++ $i ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->id_pasien ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->kunjungan ?></td>
					<td class="left" style="vertical-align: top;"><?= $value->nama_pasien ?></td>
					<td class="left" style="vertical-align: top;"><?= $value->alamat ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->nama_kec ?></td>
					<td class="center" style="vertical-align: top; herizontal-align: center;"><?= $value->umur ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->kelamin ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->penjamin ?></td>
					<td class="center" style="vertical-align: top;"><?= ( $value->kelas !== null ? $value->kelas : '-' ) ?></td>
					<td class="center" style="vertical-align: top;"><?= $value->ruangan ?></td>
					<td class="center" style="vertical-align: top;"><?= ( $value->tgl_mrs !== null ? datetimefmysql( $value->tgl_mrs ) : '-' ) ?></td>
					<td class="center" style="vertical-align: top;"><?= ( $value->cara_keluar !== null ? $value->cara_keluar : '-' ) ?></td>
					<td class="left" style="vertical-align: top;"><?= ( $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ) ?></td>
					<td class="left" style="vertical-align: top;"><?= ( $value->nama_dokter !== null ? $value->nama_dokter : '-' ) ?></td>
				</tr>
			<?php else : ?>
				<tr>
					<td colspan="13"> </td>
					<td><?= ( $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ) ?></td>
					<td> </td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
	</tbody>
</table>
</body>
