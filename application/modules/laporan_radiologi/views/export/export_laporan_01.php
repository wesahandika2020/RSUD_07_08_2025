<?php
	header_excel("LAPORAN JUMLAH PEMERIKSAAN RADIOLOGI (".$periode.")");
	header("Content-type: application/vnd-ms-excel");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div>
		<h4 style="text-transform: uppercase;">
			LAPORAN JUMLAH PEMERIKSAAN RADIOLOGI
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt" >
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center; width: 4000px"><b>Jenis Pemeriksaan</b></th>
			<th style="text-align: center"><b>Total</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			$totalTindakan = 0;
			foreach ($data['tindakan'] as $i => $value) :
				$totalTindakan += $value->total_tindakan;
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td><?= $value->nama_tindakan ?></td>
					<td style="text-align: center"><?= $value->total_tindakan ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td class="center" colspan="2" style="text-align: right"><b>TOTAL</b></td>
				<td style="text-align: center"><b><?= $totalTindakan ?></b></td>
			</tr>
		</tbody>
	</table>

	<br>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center; width: 4000px"><b>Pasien Radiologi</b></th>
			<th style="text-align: center"><b>Total</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			$totalPasien = 0;
			foreach($data['layanan'] as $i => $value) :
				$totalPasien += $value->total;
			?>
			<tr>
				<td style="text-align: center"><?= ++$i ?></td>
				<td><?= $value->jenis_layanan ?></td>
				<td style="text-align: center"><?= $value->total ?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td class="center" colspan="2" style="text-align: right"><b>TOTAL</b></td>
				<td style="text-align: center"><b><?= $totalPasien ?></b></td>
			</tr>
		</tbody>
	</table>

	
</body>
