<?php

header_excel(
		"LAPORAN JENIS PESERTA BPJS TAHUN $periode"
);

header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
	<h4><b>LAPORAN JENIS PESERTA BPJS TAHUN <?= $periode ?></b></h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>BULAN</b></th>
			<th style="text-align: center"><b>PBI</b></th>
			<th style="text-align: center"><b>NON PBI</b></th>
			<th style="text-align: center"><b>TIDAK DIKETAHUI</b></th>
			<th style="text-align: center"><b>TOTAL</b></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $key => $val): ?>
			<tr>
				<td><?= $val->bulan ?></td>
				<td><?= $val->pbi ?></td>
				<td><?= $val->non_pbi ?></td>
				<td><?= $val->kosong ?></td>
				<td><?= $val->total ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</body>
