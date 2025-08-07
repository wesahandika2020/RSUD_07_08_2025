<?php

// $data["periode"] = "Periode : " . $periode;


header_excel(
	"Antrian Farmasi - ( " . $periode . " )"
);
function secondsToHms($d) {
	$d = intval($d);
	$h = floor($d / 3600);
	$m = floor($d % 3600 / 60);
	$s = floor($d % 3600 % 60);

	$hDisplay = $h > 0 ? $h . ($h == 1 ? " jam, " : " jam, ") : "";
	$mDisplay = $m > 0 ? $m . ($m == 1 ? " menit, " : " menit, ") : "";
	$sDisplay = $s > 0 ? $s . ($s == 1 ? " detik" : " detik") : "";
	return $hDisplay . $mDisplay . $sDisplay;
}
?>

<body>
<h4 style="text-align: center;">RSUD KOTA TANGERANG
	<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
	<br> Telepon (021) 29720201-03</h4>
<div style="text-align: center;">
	<h4 style="text-transform: uppercase;">ANTRIAN FARMASI
</div>

<table width="100%" border="1">
	<thead>
	<tr height="50px">
		<th width="3%" class="center">No.</th>
		<th width="9%" class="center">No. RM</th>
		<th width="8%" class="center">No. Antrean</th>
		<th width="15%" class="left">Nama Pasien</th>
		<th width="7%" class="center">Nama Poli</th>
		<th width="8%" class="left">Dokter</th>
		<th class="left">Waktu Hadir</th>
		<th class="center">Waktu Panggil</th>
		<th class="left">Waktu Penyerahan</th>
		<th class="left">Durasi Tunggu Pasien</th>
		<th class="left">Durasi Penyerahan</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $data as $i => $value ) : ?>
		<tr>
			<td align="center" style="vertical-align: top;"><?= ++ $i ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->no_rm ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->nomor_antrean ?></td>
			<td style="vertical-align: top;"><?= $value->nama_pasien ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->poli ?></td>
			<td style="vertical-align: top;"><?= $value->nama_dokter ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->waktu_hadir ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->waktu_panggil ?></td>
			<td class="center" style="vertical-align: top;"><?= $value->waktu_diserahkan ?></td>
			<td class="center" style="vertical-align: top;"><?= secondsToHms($value->durasi_tunggu) ?></td>
			<td class="center" style="vertical-align: top;"><?= secondsToHms($value->durasi_dilayani) ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
</body>
