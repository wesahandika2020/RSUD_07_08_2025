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
	"LAPORAN KUNJUNGAN PASIEN DENGAN STATUS KELUAR _ " . $periode. " _ " . strtoupper($parameter['status_keluar'])
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
		<h4><b>LAPORAN KUNJUNGAN PASIEN</b>
			<br><b>DENGAN STATUS KELUAR <?= strtoupper($parameter['status_keluar']) ?></b>
			<br><b>RSUD KOTA TANGERANG</b>
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th class="center">No.</th>
				<th class="center">Tanggal Daftar</th>
				<th class="center">Tanggal Keluar</th>
				<th class="center">No. RM</th>
				<th class="left">Nama Pasien</th>
				<th class="center">Kelamin</th>
				<th class="center">Umur</th>
				<th class="center">Status Kunjungan</th>
				<th class="left">Alamat</th>
				<th class="center">Kecamatan</th>
				<th class="left">Unit / Poliklinik</th>
				<th class="left">Diagnosa</th>
				<th class="left">Nama Coder</th>
				<th class="left">Dokter DPJP</th>
				<th class="center">Penjamin</th>
				<th class="center">Status Keluar</th>
				<th class="left">Tujuan Rujukan</th>
				<th class="left">Keterangan</th>
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

				$keteranganRujukan = "-";
				if (!empty($value->tujuan_rujukan)) {
					$keteranganRujukan = $value->tujuan_rujukan . (!empty($value->ket_rujukan) ? ' ( ' . $value->ket_rujukan . ' )' : '');
				}
				
				$unit_poli = '';
				if (!empty($value->shift_poli)) {
					$unit_poli = '<b>' . htmlspecialchars($value->shift_poli) . '</b> - ' . htmlspecialchars($value->unit_poli);
				} else {
					$unit_poli = htmlspecialchars($value->unit_poli);
				}
			?>
				<tr>
					<td class="center"><?= ++$i ?></td>
					<td class="center"><?= $value->tanggal_daftar ?></td>
					<td class="center"><?= $value->tanggal_keluar ?></td>
					<td class="center" style="mso-number-format:'@'"><?= $value->no_rm ?></td>
					<td class="left"><?= $value->nama ?></td>
					<td class="center"><?= $value->kelamin ?></td>
					<td class="center"><?= hitungUmur($value->tanggal_lahir) ?></td>
					<td class="center"><?= $value->status_kunjungan ?></td>
					<td class="left"><?= $value->alamat ?></td>
					<td class="center"><?= $value->nama_kec ?></td>
					<td class="left"><?= $unit_poli ?></td>
					<td class="left"><?= !empty($value->diagnosa) ? $value->diagnosa : '-' ?></td>
					<td class="left"><?= !empty($value->nama_coder) ? $value->nama_coder : '-' ?></td>
					<td class="left"><?= $value->dokter_dpjp ?></td>
					<td class="center"><?= $value->penjamin ?></td>
					<td class="center"><?= $value->status_keluar ?></td>
					<td class="left"><?= !empty($value->tujuan_rujukan) ? $value->tujuan_rujukan : '-' ?></td>
					<td class="left"><?= !empty($value->ket_rujukan) ? $value->ket_rujukan : '-' ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>