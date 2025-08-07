<?php
	header_excel("List Booking (".$periode.")");
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
		<h4><b>LIST BOOKING</b>
			<br>
			<?= (!empty($periode) ? '<br>Periode : ' .$periode : '' ) ?>
		</h4>
	</div>				
	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">NO</th>
				<th style="background-color: #9cc8ff; text-align: center">TGL RENCANA KUNJUNGAN</th>
				<th style="background-color: #9cc8ff; text-align: center">KODE BOOKING</th>
				<th style="background-color: #9cc8ff; text-align: center">LOKASI DATA</th>
				<th style="background-color: #9cc8ff; text-align: center">STATUS BOOKING</th>
				<th style="background-color: #9cc8ff; text-align: center">PENJAMIN</th>
				<th style="background-color: #9cc8ff; text-align: center">POLI</th>
				<th style="background-color: #9cc8ff; text-align: center">DOKTER</th>
				<th style="background-color: #9cc8ff; text-align: center">NO KTP</th>
				<th style="background-color: #9cc8ff; text-align: center">NO BPJS</th>
				<th style="background-color: #9cc8ff; text-align: center">NO RM</th>
				<th style="background-color: #9cc8ff; text-align: center">NAMA PASIEN</th>
				<th style="background-color: #9cc8ff; text-align: center">NO HP 1</th>
				<th style="background-color: #9cc8ff; text-align: center">NO HP 2</th>
				<th style="background-color: #9cc8ff; text-align: center">LINK HP 1</th>
				<th style="background-color: #9cc8ff; text-align: center">LINK HP 2</th>
				<th style="background-color: #9cc8ff; text-align: center">TGL BOOKING</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : ?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>					
					<td style="text-align: center"><?= $value->tanggal_kunjungan?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->kode_booking?></td>
					<td style="text-align: center"><?= $value->lokasi_data?></td>
					<td style="text-align: center"><?= $value->status_booking?></td>
					<td style="text-align: center"><?= $value->penjamin?></td>
					<td style="text-align: left"><?= $value->nama_poli?></td>
					<td style="text-align: left"><?= $value->nama_dokter?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->no_ktp?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->no_bpjs?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->no_rm?></td>
					<td style="text-align: left"><?= $value->nama?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->no_hp?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?=  $value->no_hp2?></td>
					<td style="text-align: left"><?= $value->link_hp1?></td>
					<td style="text-align: left"><?= $value->link_hp2?></td>
					<td style="text-align: center"><?= $value->tgl_booking?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>