<?php

$param_title = date( 'd/m/Y' );
if ( $parameter['periode_laporan'] === 'Harian' ) {
	$param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ( $parameter['periode_laporan'] === 'Bulanan' ) {
	$param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ( $parameter['periode_laporan'] === 'Rentang Waktu' ) {
	$param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

// $data["periode"] = "Periode : " . $periode;


header_excel(
  "Daftar Verifikasi Diagnosis PP - ( " . $periode . " )"
);
?>

<body>
<h4>RSUD KOTA TANGERANG
	<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
	<br> Telepon (021) 29720201-03</h4>
<div style="text-align: center;">
	<h4 style="text-transform: uppercase;">DAFTAR VERIFIKASI DIAGNOSIS PASIEN SEMUA
		<br>Periode <?= $periode ?></h4>
</div>

<table width="100%" border="1">
	<thead>
	<tr height="50px">
		<th width="3%" class="center">No.</th>
		<th width="9%" class="center">Tanggal Kunjungan</th>
		<th width="8%" class="center">No. RM</th>
		<th width="15%" class="left">Nama</th>
		<th width="7%" class="center">Penjamin</th>
		<th width="8%" class="center">Unit Pelayanan</th>
		<th width="10%" class="left">ICD X Diagnosa</th>
		<th width="6%" class="center">Prioritas</th>
		<th width="15%" class="left">Dokter</th>
		<th width="6%" class="center">Diagnosa Akhir</th>
		<th width="7%" class="center">Jenis Kasus</th>
		<th width="7%" class="center">Status Kunjungan</th>
		<th width="4%" class="center">JK</th>
		<th width="8%" class="center">Umur</th>
		<th width="15%" class="left">Alamat</th>
		<th width="8%" class="center">Kecamatan</th>
		<th width="9%" class="center">Tanggal Selesai</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $data as $i => $value ) : ?>
		<?php $rowspan = count($value->diagnosa_data) ?>
		<?php foreach ( $value->diagnosa_data as $key => $diagnosa_data ) : ?>
			<?php if($key <= 0): ?>
				<tr>
					<td align="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= ++ $i ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->tanggal_daftar ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->id_pasien ?></td>
					<td style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->nama_pasien ?></td>
					<td width="7%" class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->penjamin ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->unit_pelayanan ?></td>
					<td style="vertical-align: top;"><?= $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ?></td>
					<td class="center" style="vertical-align: top;"><?= $diagnosa_data->prioritas !== null ? $diagnosa_data->prioritas : '-' ?></td>
					<td style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->nama_dokter ?></td>
					<td class="center" style="vertical-align: top;"><?= $diagnosa_data->diagnosa_akhir !== null ? $diagnosa_data->diagnosa_akhir : '-' ?></td>
					<td class="center" style="vertical-align: top;"><?= $diagnosa_data->kasus ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->status_kunjungan ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->kelamin ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->umur ?></td>
					<td style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->alamat ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->nama_kec ?></td>
					<td class="center" style="vertical-align: top;" rowspan="<?= $rowspan  ?>"><?= $value->tgl_selesai ?></td>
				</tr>
			<?php else : ?>
				<tr>
					<td><?= $diagnosa_data->icdx_diagnosa !== null ? $diagnosa_data->icdx_diagnosa : '-' ?></td>
					<td class="center"><?= $diagnosa_data->prioritas !== null ? $diagnosa_data->prioritas : '-' ?></td>
					<td class="center"><?= $diagnosa_data->diagnosa_akhir !== null ? $diagnosa_data->diagnosa_akhir : '-' ?></td>
					<td class="center"><?= $diagnosa_data->kasus ?></td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
	</tbody>
</table>
</body>
