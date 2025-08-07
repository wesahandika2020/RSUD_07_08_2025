<?php  
	$param_title = date('d/m/Y');
	if ($parameter['tanggal_awal'] !== '') :
		$param_title = $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'];
	endif;

	header_excel("Data Intensive Care - " . $param_title);
?>

<body> 
	<h3>DATA INTENSIVE CARE (<?= $param_title ?>)</h3></td></tr>
	<table width="100%" border="1">
		<thead>
			<tr>
				<th align="center" width="5%">No.</th>
				<th align="center" width="7%">No. Register</th>
				<th width="9%">Tanggal Masuk</th>
				<th width="9%">Tanggal Keluar</th>
				<th width="5%">No. RM</th>
				<th width="15%">Nama</th>
				<th width="17%">Bed</th>
				<th width="15%">Dokter</th>
				<th width="10%">Cara Bayar</th>
				<th width="9%">Status Keluar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : ?>
				<?php $bed = $value->bangsal . " kelas " . $value->kelas . " ruang " . $value->no_ruang . " No. Bed " . $value->no_bed ?>
				
				<tr>
					<td align="center"><?= ++$i ?></td>
					<td align="center"><?= $value->no_register ?></td>
					<td align="center"><?= (($value->waktu_masuk !== null) ? datetimefmysql($value->waktu_masuk) : '') ?></td>
					<td align="center"><?= (($value->waktu_keluar !== null) ? datetimefmysql($value->waktu_keluar) : '') ?></td>
					<td align="center">'<?= $value->id_pasien ?></td>
					<td><?= $value->nama ?></td>
					<td><?= $bed ?></td>
					<td><?= $value->dokter ?></td>
					<td align="center"><?= (($value->cara_bayar === 'Tunai') ? $value->cara_bayar : $value->cara_bayar) ?></td>
					<td align="center"><?= (($value->tindak_lanjut !== '') ? $value->tindak_lanjut : '') ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>