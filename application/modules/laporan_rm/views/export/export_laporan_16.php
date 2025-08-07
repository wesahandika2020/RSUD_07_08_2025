<?php
header_excel("FORMULIR RL 3.19 REKAPITULASI CARA BAYAR _ ". $periode );
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
		<h4><b>FORMULIR RL 3.19 REKAPITULASI CARA BAYAR</b>
			<br><b>RSUD KOTA TANGERANG</b>
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">No</th>
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">Cara Bayar</th>
				<th colspan="2" style="text-align: center; background-color: #9cc8ff;">Pasien Rawat Inap</th>
				<th rowspan="2" style="text-align: center; background-color: #9cc8ff;">Jumlah Pasien Rawat Jalan</th>
				<th colspan="5" style="text-align: center; background-color: #9cc8ff;">Pasien Rawat Jalan</th>
			</tr>
			<tr>
				<th style="text-align: center; background-color: #9cc8ff;">Jumlah Pasien Keluar</th>
				<th style="text-align: center; background-color: #9cc8ff;">Jumlah Lama Dirawat</th>
				<th style="text-align: center; background-color: #9cc8ff;">IGD</th>
				<th style="text-align: center; background-color: #9cc8ff;">Poliklinik</th>
				<th style="text-align: center; background-color: #9cc8ff;">Laboratorium</th>
				<th style="text-align: center; background-color: #9cc8ff;">Radiologi</th>
				<th style="text-align: center; background-color: #9cc8ff;">Hemodialisa</th>
			</tr>
			
		</thead>
		<tbody>
			<?php
			$total_ranap_pasien_keluar = 0;
			$total_ranap_total_hari = 0;
			$total_rajal_total = 0;
			$total_rajal_igd = 0;
			$total_rajal_poli = 0;
			$total_rajal_lab = 0;
			$total_rajal_rad = 0;
			$total_rajal_hd = 0;
			$no = 1;
			?>

			<?php foreach ($data as $v): ?>
				<tr>
					<td style="text-align: center; background-color: #d7e9ff"><b><?= $no ?></b></td>
					<td colspan="9" style="text-align: left; background-color: #d7e9ff; text-transform: uppercase; "><b><?= $v->jenis_penjamin ?></b></td>
				</tr>

				<?php
				$subno = 1;
				foreach ($v->detail as $d):
					$total_ranap_pasien_keluar += (int)$d->ranap->pasien_keluar;
					$total_ranap_total_hari += (int)$d->ranap->total_hari;
					$total_rajal_total += (int)$d->rajal->total;
					$total_rajal_igd += (int)$d->rajal->igd;
					$total_rajal_poli += (int)$d->rajal->poli;
					$total_rajal_lab += (int)$d->rajal->lab;
					$total_rajal_rad += (int)$d->rajal->rad;
					$total_rajal_hd += (int)$d->rajal->hd;
				?>
				<tr>
					<td style="text-align: center"><?= $no . '.' . $subno++ ?></td>
					<td style="text-align: left"><?= $d->penjamin ?></td>
					<td style="text-align: center"><?= $d->ranap->pasien_keluar ?></td>
					<td style="text-align: center"><?= $d->ranap->total_hari ?></td>
					<td style="text-align: center"><?= $d->rajal->total ?></td>
					<td style="text-align: center"><?= $d->rajal->igd ?></td>
					<td style="text-align: center"><?= $d->rajal->poli ?></td>
					<td style="text-align: center"><?= $d->rajal->lab ?></td>
					<td style="text-align: center"><?= $d->rajal->rad ?></td>
					<td style="text-align: center"><?= $d->rajal->hd ?></td>
				</tr>
				<?php endforeach; ?>
				<?php $no++; ?>
			<?php endforeach; ?>

			<tr>
				<td style="background-color: #9cc8ff; text-align: right" colspan="2"><b>TOTAL</b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_ranap_pasien_keluar ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_ranap_total_hari ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_total ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_igd ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_poli ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_lab ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_rad ?></b></td>
				<td style="background-color: #9cc8ff; text-align: center"><b><?= $total_rajal_hd ?></b></td>
			</tr>
		</tbody>
	</table>
</body>