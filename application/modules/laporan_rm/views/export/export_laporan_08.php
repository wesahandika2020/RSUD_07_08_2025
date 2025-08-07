<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian')
{
	$param_title = "Periode Harian (".$parameter['tanggal_harian'].") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan')
{
	$param_title = "Periode Bulanan (".$parameter['bulan']." ".$parameter['tahun'].") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu')
{
	$param_title = "Periode Harian (".$parameter['tanggal_awal']." s.d ".$parameter['tanggal_akhir'].") ";
}

$penunjang = '';

if(isset($radiologi)){
	$penunjang = 'Radiologi';
}elseif (isset($farmasi)){
	$penunjang = 'Farmasi';
}elseif (isset($laboratorium)){
	$penunjang = 'Laboratorium';
}elseif (isset($rehab)){
	$penunjang = 'Rehabilitasi Medik';
}

header_excel(
		"LAPORAN PENUNJANG MEDIS ($penunjang)"
);

header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
<?php if (isset($radiologi)) : ?>
	<h4><b>LAPORAN PENUNJANG MEDIS</b>
		<br><b>KEGIATAN LABORATORIUM</b>
		<br><b>RSUD KOTA TANGERANG</b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Kegiatan</b></th>
			<th style="text-align: center"><b>Keterangan</b></th>
			<th style="text-align: center"><b><?= $periode ?></b></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totalTindakan = 0;
		foreach ($radiologi['data'] as $i => $value) :
			$totalTindakan += $value->total_tindakan;
			?>
			<tr>
				<td>
					<div style="display: flex;justify-content: center;"><?= ++$i ?></div>
				</td>
				<td><?= $value->tindakan ?></td>
				<?php if($i === 1) : ?>
				<td rowspan="<?= count($radiologi['data']) ?>" style="text-align: center;vertical-align : middle;">Jumlah Pemeriksaan</td>
				<?php endif; ?>
				<td>
					<div style="display: flex;justify-content: center;"><?= $value->total_tindakan ?></div>
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td></td>
			<td style="text-align: center"><i><b>TOTAL</b></i>
			</td>
			<td></td>
			<td>
				<div style="display: flex;justify-content: center;"><b><?= $totalTindakan ?></b></div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td class="center"><b>PASIEN RADIOLOGI</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
		$totalPasien = 0;
		foreach($radiologi['layanan'] as $i => $value) :
			$totalPasien += $value->total;
		?>
		<tr>
			<td style="text-align: center"><?= ++$i ?></td>
			<td><?= $value->jenis_layanan ?></td>
			<?php if($i === 1) : ?>
				<td rowspan="<?= count($radiologi['layanan']) ?>" style="text-align: center;vertical-align : middle;">Jumlah Layanan</td>
			<?php endif; ?>
			<td style="text-align: center"><?= $value->total ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>TOTAL</b></td>
			<td></td>
			<td style="text-align: center"><b><?= $totalPasien ?></b></td>
		</tr>
		</tbody>
	</table>
<?php elseif(isset($farmasi)): ?>
	<h4><b>LAPORAN PENUNJANG MEDIS</b>
		<br><b>KEGIATAN LABORATORIUM</b>
		<br><b>RSUD KOTA TANGERANG</b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Jenis Pemeriksaan</b></th>
			<th style="text-align: center"><b><?= $periode ?></b></th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align: center"><b>1</b></td>
				<td><b>LEMBAR RESEP</b></td>
				<td></td>
			</tr>
		<?php
		$total = 0;
		foreach ($farmasi['data'] as $i => $value) :
			$total += $value->total;
			?>
			<tr>
				<td></td>
				<td><?= $value->depo ?></td>
				<td>
					<div style="display: flex;justify-content: center;"><?= $value->total ?></div>
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>TOTAL</b></td>
			<td style="text-align: center"><b><?= $total ?></b></td>
		</tr>
		</tbody>
	</table>
<?php elseif(isset($laboratorium)) : ?>
	<h4><b>LAPORAN PENUNJANG MEDIS</b>
		<br><b>KEGIATAN LABORATORIUM</b>
		<br><b>RSUD KOTA TANGERANG</b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Jenis Pemeriksaan</b></th>
			<th style="text-align: center"><b>Keterangan</b></th>
			<th style="text-align: center"><b><?= $periode ?></b></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totalTindakan = 0;
		foreach ($laboratorium['data'] as $i => $value) :
			$totalTindakan += $value->total_tindakan;
			?>
			<tr>
				<td>
					<div style="display: flex;justify-content: center;"><?= ++$i ?></div>
				</td>
				<td><?= $value->tindakan ?></td>
				<?php if($i === 1) : ?>
					<td rowspan="<?= count($laboratorium['data']) ?>" style="text-align: center;vertical-align : middle;">Jenis Pemeriksaan</td>
				<?php endif; ?>
				<td>
					<div style="display: flex;justify-content: center;"><?= $value->total_tindakan ?></div>
				</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td></td>
			<td style="text-align: center"><i><b>TOTAL</b></i>
			</td>
			<td></td>
			<td>
				<div style="display: flex;justify-content: center;"><b><?= $totalTindakan ?></b></div>
			</td>
		</tr
		<tr>
			<td colspan="4"></td>
		</tr>
		<?php foreach($laboratorium['covid'] as $i => $value) : ?>
			<tr>
				<td style="text-align: center"><?= ++$i ?></td>
				<td><?= $value->tindakan ?></td>
				<td rowspan="3" style="text-align: center;vertical-align : middle;">JUMLAH PASIEN</td>
				<td style="text-align: center"><?= $value->total_tindakan ?></td>
			</tr>
			<tr>
				<td></td>
				<td><span style="margin-left: 0.5rem">Negatif</span></td>
				<td style="text-align: center"><?= $value->negative ?></td>
			</tr>
			<tr>
				<td></td>
				<td><span style="margin-left: 0.5rem">Positif</span></td>
				<td style="text-align: center"><?= $value->positive ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>RINCIAN</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
		$totalPasien = 0;
		foreach($laboratorium['layanan'] as $i => $value) :
			$totalPasien += $value->total;
		?>
		<tr>
			<td style="text-align: center"><?= ++$i ?></td>
			<td><?= $value->jenis_layanan ?></td>
			<?php if($i === 1) : ?>
				<td rowspan="<?= count($laboratorium['layanan']) ?>" style="text-align: center;vertical-align : middle;">Jumlah Layanan</td>
			<?php endif; ?>
			<td style="text-align: center"><?= $value->total ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>TOTAL</b></td>
			<td></td>
			<td style="text-align: center"><b><?= $totalPasien ?></b></td>
		</tr>
		</tbody>
	</table>
<?php elseif(isset($rehab)) : ?>
	<h4><b>LAPORAN PENUNJANG MEDIS</b>
		<br><b>KEGIATAN REHABILITASI MEDIK</b>
		<br><b>RSUD KOTA TANGERANG</b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Jenis Pemeriksaan</b></th>
			<th style="text-align: center"><b>Keterangan</b></th>
			<th style="text-align: center"><b><?= $periode ?></b></th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td colspan="2"><b>Kunjungan Pasien Rawat Jalan Rehab Medik</b></td>
			<td>Jumlah Pasien</td>
			<td style="text-align: center"><?= $rehab['total'] ?></td>
		</tr>
		<?php
		$totalTindakan = 0;
		foreach ($rehab['data'] as $i => $value) :
			$totalTindakan += $value->total_tindakan;
			?>
			<tr>
				<td style="text-align: center"><?= ++$i ?></td>
				<td><b><?= $value->tindakan ?></b></td>
				<td rowspan="3" style="vertical-align : middle;text-align:center;">Jumlah Pasien</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td style="margin-left: .2rem">Rawat Jalan</td>
				<td style="text-align: center"><?= $value->total_tindakan ?></td>
			</tr>
			<tr>
				<td></td>
				<td style="margin-left: .2rem">Rawat Inap</td>
				<td style="text-align: center">-</td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>TOTAL</b></td>
			<td></td>
			<td style="text-align: center"><b><?= $totalTindakan ?></b></td>
		</tr>
		<tr>
			<td></td>
			<td><b>Tindakan</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
		$totalTindakan2 = 0;
		foreach ($rehab['tindakan'] as $i => $value) :
		$totalTindakan2 += $value->count;
		?>
			<tr>
				<td style="text-align: center"></td>
				<td><?= $value->tindakan ?></td>
				<?php if($i === 0) : ?>
					<td rowspan="<?= count($rehab['tindakan']) ?>" style="text-align: center;vertical-align : middle;">Jumlah Pemeriksaan</td>
				<?php endif; ?>
				<td style="text-align: center"><?= $value->count ?></td>
			</tr>
		<?php endforeach;?>
		<tr>
			<td></td>
			<td style="text-align: center"><b>TOTAL</b></td>
			<td></td>
			<td style="text-align: center"><b><?= $totalTindakan2 ?></b></td>
		</tr>
		</tbody>
	</table>
<?php endif; ?>
</body>
