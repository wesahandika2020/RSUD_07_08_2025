<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
	$param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
	$param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
	$param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

$layanan = empty($parameter['tempat_layanan_3']) ? 'Semua' : $parameter['tempat_layanan_3'];

header_excel(
	"LAPORAN KUNJUNGAN PASIEN RAWAT JALAN DAN IGD)"
);

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
		<h4><b>LAPORAN KUNJUNGAN PASIEN RAWAT JALAN DAN IGD</b>
			<br><b>RSUD KOTA TANGERANG</b>
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
			<th class="center">No.</th>
				<th class="center">Tanggal Kunjungan</th>
				<th class="center">No. RM</th>
				<th class="left">Nama Pasien</th>
				<th class="left">Unit Pelayanan</th>
				<th class="left">ICD X Diagnosa</th>
				<th class="left">Dokter</th>
				<th class="left">Prioritas</th>
				<th class="center">Jenis Kasus</th>
				<th class="center">Status Kunjungan</th>
				<th class="center">JK</th>
				<th class="center">Umur</th>
				<th class="center">Penjamin</th>							
				<th class="left">Alamat</th>
				<th class="center">Kecamatan</th>
				<th class="center">Tanggal Selesai</th>
				<th class="center">Status Keluar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) :
				$jenis_rawat = "";
				if ($value->jenis_rawat !== 'IGD') {
					// $jenis_rawat = $value->jenis_rawat . ' (' . $value->unit_poli . ')';
					$jenis_rawat = $value->jenis_rawat;
				} else {
					$jenis_rawat = $value->jenis_rawat;
				}
			?>
				<tr>
					<td class="center"><?= ++$i ?></td>
					<td class="center"><?= $value->tanggal_daftar ?></td>
					<td class="center">'<?= $value->no_rm ?></td>
					<td class="left"><?= $value->nama ?></td>
					<td class="left"><?= $value->unit_poli ?></td>
					<td class="left"><?= !empty($value->kode_icdx) ? $value->kode_icdx : '-' ?></td>
					<td class="left"><?= $value->dokter_dpjp ?></td>
					<td class="left"><?= !empty($value->diagnosa) ? $value->diagnosa : '-' ?></td>
					<td class="center"><?= !empty($value->jenis_kasus) ? $value->jenis_kasus : '-' ?></td>
					<td class="center"><?= $value->status_kunjungan ?></td>
					<td class="center"><?= $value->kelamin ?></td>
					<td class="center"><?= hitungUmur($value->tanggal_lahir) ?></td>
					<td class="center"><?= !empty($value->penjamin) ? $value->penjamin : '-' ?></td>
					<td class="left"><?= $value->alamat ?></td>
					<td class="center"><?= $value->nama_kec ?></td>
					<td class="center"><?= $value->tanggal_keluar ?></td>
					<td class="center"><?= $value->status_keluar ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>