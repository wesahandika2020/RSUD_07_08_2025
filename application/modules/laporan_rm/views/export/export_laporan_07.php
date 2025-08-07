<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
	$param_title = "Periode Harian (".$parameter['tanggal_harian'].") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
	$param_title = "Periode Bulanan (".$parameter['bulan']." ".$parameter['tahun'].") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
	$param_title = "Periode Harian (".$parameter['tanggal_awal']." s.d ".$parameter['tanggal_akhir'].") ";
}

$jenis_rawat = '';
if ($parameter['jenis_rawat'] == '1') {
	$jenis_rawat = 'Rawat Jalan';
} elseif ($parameter['jenis_rawat'] == '2') {
	$jenis_rawat = 'Rawat Inap';
} elseif ($parameter['jenis_rawat'] == '3') {
	$jenis_rawat = 'IGD';
} elseif ($parameter['jenis_rawat'] == '4') {
	$jenis_rawat = 'Penunjang';
}

// $data["periode"] = "Periode : " . $periode;

if ($parameter['tab_active'] === 'spesialistik') {
	header_excel(
			"LAPORAN KUNJUNGAN PASIEN RAWAT JALAN BARU DAN LAMA PER SPESIALISTIK - ".$jenis_rawat." ( ".$periode." )"
	);
} else {
	header_excel(
			"LAPORAN JUMLAH KESELURUHAN KUNJUNGAN PASIEN BARU DAN LAMA RAWAT - ".$jenis_rawat." ( ".$periode." )"
	);
}

header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
<?php if ($parameter['tab_active'] === 'spesialistik') : ?>
	<h4>LAPORAN KUNJUNGAN PASIEN RAWAT JALAN BARU DAN LAMA PER SPESIALISTIK
		<br><b>RSUD KOTA TANGERANG</b>
		<br><b>Periode <?= $periode ?></b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th class="center">No.</th>
			<th class="center">Kunjungan Spesialisasi</th>
			<th class="center"><?= $periode ?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totalSpesialisasi = 0;
		foreach ($spesialisasi['data'] as $i => $value) :
			$totalSpesialisasi += $value->total_spesialisasi;
			?>
			<tr>
				<td>
					<div style="display: flex;justify-content: center;"><?= ++$i ?></div>
				</td>
				<td><?= $value->spesialisasi ?></td>
				<td>
					<div style="display: flex;justify-content: center;"><?= $value->total_spesialisasi ?></div>
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td colspan="2">
				<div style="display: flex;justify-content: flex-end;"><i><b>JUMLAH</b></i></div>
			</td>
			<td>
				<div style="display: flex;justify-content: center;"><b><?= $totalSpesialisasi ?></b></div>
			</td>
		</tr>
		</tbody>
	</table>
<?php else : ?>
	<h4>LAPORAN JUMLAH KESELURUHAN KUNJUNGAN PASIEN BARU DAN LAMA RAWAT
		<br><b>RSUD KOTA TANGERANG</b>
		<br><b>Periode <?= $periode ?></b>
	</h4>
	<table border="1">
		<thead border="2">
		<tr>
			<th class="center">No.</th>
			<th class="center">Produktifitas Dokter</th>
			<th class="center"><?= $periode ?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$iterate = 0;

		foreach ($dokter['data'] as $i => $value) : ?>
			<tr>
				<td><?= ++$iterate ?></td>
				<td colspan="2"><b><?= $value->nama ?></b></td>
			</tr>
			<?php
			$totalPasien = 0;

			foreach (json_decode($value->data_dokter) as $key => $v): ?>
				<?php $data = $v; ?>

				<?php
				$totalPasien += $data->total_pasien;
				?>
				<tr>
					<td></td>
					<td class="left"><?= $data->nama_dokter ?></td>
					<td class="center"><?= $data->total_pasien ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td></td>
				<td class="right"><b>TOTAL</b></td>
				<td class="center"><b><?= $totalPasien ?></b></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php endif; ?>
</body>
