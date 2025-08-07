<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian')
{
	$param_title = "Periode Harian (".$parameter['tanggal_harian'].") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan')
{
	$param_title = "Periode Bulanan (".$parameter['bulan']." ".$parameter['tahun'].") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu')
{
	$param_title = "Periode Harian (".$parameter['tanggal_awal']." s.d ".$parameter['tanggal_akhir'].") ";
}

$layanan = empty($parameter['tempat_layanan_3']) ? 'Semua' : $parameter['tempat_layanan_3'];

header_excel(
		"LAPORAN PENUNJANG MEDIS ($layanan)"
);

header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
	<h4><b>LAPORAN PENUNJANG MEDIS</b>
		<br><b>LAPORAN PERJAMINAN <?= strtoupper($layanan) ?></b>
		<br><b>RSUD KOTA TANGERANG</b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Penjamin</b></th>
			<th style="text-align: center"><b><?= $periode ?></b></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $key => $penunjang): ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $penunjang->nama ?></td>
				<td><?= $penunjang->jumlah ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</body>
