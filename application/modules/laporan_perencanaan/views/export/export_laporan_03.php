<?php
	header_excel("LAPORAN DPJP RAWAT INAP (".$periode.")");
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
		<h4><b>LAPORAN DPJP RAWAT INAP</b>
			<br>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($bangsal_ranap) ? '<br>Bangsal : ' .$bangsal_ranap : '' ) ?>
			<?= (!empty($dokter) 		? '<br>Dokter : ' .$dokter : '' ) ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">NO</th>
				<th style="background-color: #9cc8ff; text-align: center">No RM</th>
				<th style="background-color: #9cc8ff; text-align: center">Nama Pasien</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu Masuk Ranap</th>
				<th style="background-color: #9cc8ff; text-align: center">Status Terlayani</th>
				<th style="background-color: #9cc8ff; text-align: center">Dokter</th>
				<th style="background-color: #9cc8ff; text-align: center">Penjamin</th>
				<th style="background-color: #9cc8ff; text-align: center">Ruangan</th>
				<th style="background-color: #9cc8ff; text-align: center">Tgl Keluar</th>
				<th style="background-color: #9cc8ff; text-align: center">Tindak Lanjut</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : 
				$ruangan = '';
				$ruangan=$value->bangsal.' Ruang '.$value->no_ruang.' Bed '.$value->no_bed;
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>				
					<td style="text-align: center" style="mso-number-format:'@'"><?= $value->id_pasien?></td>
					<td style="text-align:   left"><?= $value->nama_pasien?></td>
					<td style="text-align: center"><?= $value->waktu_masuk_ranap?></td>
					<td style="text-align: center"><?= $value->status_terlayani?></td>
					<td style="text-align: center"><?= $value->dokter?></td>
					<td style="text-align: center"><?= $value->penjamin?></td>
					<td style="text-align: center"><?= $ruangan?></td>
					<td style="text-align: center"><?= $value->tanggal_keluar?></td>
					<td style="text-align: center"><?= $value->tindak_lanjut?></td>
				</tr>

			<?php endforeach ?>
		</tbody>
	</table>
</body>