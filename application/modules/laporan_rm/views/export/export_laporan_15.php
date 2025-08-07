<?php
header_excel("FORMULIR RL 3.5 REKAPITULASI KUNJUNGAN _ ". $asal_kunjungan ." _ ". $periode );
header("Content-type: application/vnd-ms-excel");
header("Pragma: no-cache");
header("Expires: 0");
?>

<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div style="text-align: center;">
		<h4><b>FORMULIR RL 3.5 REKAPITULASI KUNJUNGAN</b>
			<br><b>RSUD KOTA TANGERANG</b>
			<br>Asal Kunjungan <?= $asal_kunjungan ?>
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">No</th>
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">Jenis Kegiatan</th>
				<th colspan="2" style="text-align: center; background-color: #9cc8ff;">Kunjungan Pasien<br>Dalam Kab/Kota</th>
				<th colspan="2" style="text-align: center; background-color: #9cc8ff;">Kunjungan Pasien<br>Luar Kab/Kota</th>
				<th colspan="2" style="text-align: center; background-color: #9cc8ff;">Tidak Diketahui</th>
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">Total<br>Kunjungan</th>
			</tr>
			<tr>
				<th style="text-align: center; background-color: #9cc8ff;">Laki-Laki</th>
				<th style="text-align: center; background-color: #9cc8ff;">Perempuan</th>
				<th style="text-align: center; background-color: #9cc8ff;">Laki-Laki</th>
				<th style="text-align: center; background-color: #9cc8ff;">Perempuan</th>
				<th style="text-align: center; background-color: #9cc8ff;">Laki-Laki</th>
				<th style="text-align: center; background-color: #9cc8ff;">Perempuan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$total_kotang_l = 0;
				$total_kotang_p = 0;
				$total_lukotang_l = 0;
				$total_lukotang_p = 0;
				$total_tdk_diketahui_l = 0;
				$total_tdk_diketahui_p = 0;
				$totalSemua= 0;
			?>

			<?php foreach ($data as $i => $value) : 
				$total_kotang_l += (int)$value->detail->kotang_l;
				$total_kotang_p += (int)$value->detail->kotang_p;
				$total_lukotang_l += (int)$value->detail->lukotang_l;
				$total_lukotang_p += (int)$value->detail->lukotang_p;
				$total_tdk_diketahui_l += (int)$value->detail->total_tdk_diketahui_l;
				$total_tdk_diketahui_p += (int)$value->detail->total_tdk_diketahui_p;
				$totalSemua += (int)$value->detail->total;
			?>
				<tr>
					<td style="text-align: center"><?= $i + 1 ?></td>
					<td style="text-align: left"><?= $value->nama ?></td>
					<td style="text-align: center"><?= $value->detail->kotang_l ?></td>
					<td style="text-align: center"><?= $value->detail->kotang_p ?></td>
					<td style="text-align: center"><?= $value->detail->lukotang_l ?></td>
					<td style="text-align: center"><?= $value->detail->lukotang_p ?></td>
					<td style="text-align: center"><?= $value->detail->total_tdk_diketahui_l ?></td>
					<td style="text-align: center"><?= $value->detail->total_tdk_diketahui_p ?></td>
					<td style="text-align: center"><b><?= $value->detail->total ?></b></td>
				</tr>
			<?php endforeach ?>

			<tr>
				<td style="background-color: #9cc8ff; text-align: right" colspan="2"><b>TOTAL</b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_kotang_l ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_kotang_p ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_lukotang_l ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_lukotang_p ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_tdk_diketahui_l ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_tdk_diketahui_p ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $totalSemua ?></b></td>
			</tr>
		</tbody>
	</table>
</body>