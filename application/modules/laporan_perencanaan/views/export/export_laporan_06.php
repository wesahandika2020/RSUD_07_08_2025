<?php
	header_excel("Laporan Rata-Rata Waktu Boocin (Booking Checkin) Rajal (".$periode.")");
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
		<h4><b>Laporan Rata-Rata Waktu Boocin (Booking Checkin) Rajal</b>
			<br>
			<?= (!empty($jml_data) 		? '<br>Jumlah Data : ' .$jml_data : '' ) ?>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($poliklinik) 	? '<br>Poliklinik : ' .$poliklinik : '' ) ?>
			<?= (!empty($boocin) 		? '<br>Jenis Boocin : ' .$boocin : '' ) ?>
			<?= (!empty($rata_rata) 	? '<br>Rata Rata Seluruh : ' .$rata_rata : '' ) ?>
		</h4> 
	</div>

	<table border="1" style="border-collapse: collapse; width: 100%;">
		<thead>
			<tr>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">No.</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Kode Booking</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Tgl Kunjungan</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">No RM</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Nama Pasien</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Penjamin</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Poliklinik</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Jenis Booking</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Waktu Hadir</th>
				<th style="background-color: #9cc8ff; text-align: center;" colspan="3">Waktu Check-in</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Selisih Waktu<br>Check-in</th>
				<th style="background-color: #9cc8ff; text-align: center;" rowspan="2">Rata-Rata<br>Per Pasien</th>
			</tr>
			<tr>
				<th style="background-color: #9cc8ff; text-align: center;">Task 1</th>
				<th style="background-color: #9cc8ff; text-align: center;">Task 2</th>
				<th style="background-color: #9cc8ff; text-align: center;">Task 3</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $v) : ?>
				<tr>
					<td style="text-align: center;"><?= $i + 1 ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->kode_booking) ?></td>
					<td style="text-align: center;"><?= $v->tanggal_kunjungan ? datefmysql($v->tanggal_kunjungan) : '-' ?></td>
					<td style="text-align: center; mso-number-format:'@';"><?= htmlspecialchars($v->id) ?></td>
					<td style="text-align: left;"><?= htmlspecialchars($v->nama_pasien) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->penjamin) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->poliklinik) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->lokasi_data) ?></td>
					<td style="text-align: center;"><?= $v->waktu_hadir ? datetime($v->waktu_hadir) : '-' ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->task_satu) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->task_dua) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->task_tiga) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->selisih_waktu) ?></td>
					<td style="text-align: center;"><?= htmlspecialchars($v->rata_selisih_waktu) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</body>