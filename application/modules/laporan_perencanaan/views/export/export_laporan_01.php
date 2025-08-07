<?php
	header_excel("LAPORAN RESEP RAWAT JALAN LEBIH DARI Rp 50.000 (".$periode.")");
	header("Content-type: application/vnd-ms-excel");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div style="text-align: left;">
		<h4><b>LAPORAN RESEP RAWAT JALAN LEBIH DARI Rp 50.000,-</b>
			<br>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($jenis_layanan) ? '<br>Jenis Layanan : ' .$jenis_layanan : '' ) ?>
			<?= (!empty($poliklinik) 	? '<br>Poliklinik : ' .$poliklinik : '' ) ?>
			<?= (!empty($dokter) 		? '<br>Dokter : ' .$dokter : '' ) ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">NO</th>
				<th style="background-color: #9cc8ff; text-align: center">No RM</th>
				<th style="background-color: #9cc8ff; text-align: center">NAMA PASIEN</th>
				<th style="background-color: #9cc8ff; text-align: center">TGL DAFTAR</th>
				<th style="background-color: #9cc8ff; text-align: center">TGL LAYANAN</th>
				<th style="background-color: #9cc8ff; text-align: center">LAYANAN</th>
				<th style="background-color: #9cc8ff; text-align: center">DOKTER DPJP</th>
				<th style="background-color: #9cc8ff; text-align: center">TOTAL</th>
				<th style="background-color: #9cc8ff; text-align: center">PENJAMIN</th>
				<th style="background-color: #9cc8ff; text-align: center">DIAGNOSA UTAMA</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : ?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>					
					<td style="text-align: center"><?= $value->id_pasien?></td>
					<td style="text-align: left">  <?= $value->nama_pasien?></td>
					<td style="text-align: center"><?= $value->tanggal_daftar?></td>
					<td style="text-align: center"><?= $value->tanggal_layanan?></td>
					<td style="text-align: center"><?= $value->nama_layanan?></td>
					<td style="text-align: center"><?= $value->dokter_dpjp?></td>
					<td style="text-align: right"> <?= "Rp. " . number_format($value->total, 0, ",", ".") ?></td>
					<td style="text-align: center"><?= $value->penjamin?></td>
					<td style="text-align: left">  <?= $value->diagnosa?></td>
				</tr>

				<?php if (count($value->detail) >= 1) { ?>
					<tr>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">NO</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">WAKTU PENJUALAN</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">NO RESEP</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">DOKTER RESEP</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">DETAIL BIAYA</td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
					</tr>
				<?php }  ?>

				<?php foreach ($value->detail as $key => $val) : ?>
					<tr>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $key+1?></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->waktu_penjualan?></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->id_resep_tebus?></td>
						<td style="background-color: #fdf5d0; text-align: left">  <?= $val->dokter_resep?></td>
						<td style="background-color: #fdf5d0; text-align: right"> <?= "Rp. " . number_format($val->total, 0, ",", ".") ?></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
					</tr>
					
				<?php endforeach ?>

			<?php endforeach ?>
		</tbody>
	</table>
</body>