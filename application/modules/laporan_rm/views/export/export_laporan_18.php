<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
	$param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
	$param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
	$param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

// $data["periode"] = "Periode : " . $periode;


header_excel(
  "Formulir RL 5.1 - ( " . $periode . " )"
);
?>

<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div style="text-align: center;">
		<h4 style="text-transform: uppercase;">Data Kompilasi Penyakit/Morbiditas Pasien Rawat Jalan
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table width="100%" border="1">
		<thead>
			<tr>
				<th rowspan="3" class="center">No.</th>
				<th rowspan="3" class="center">Kode ICD</th>
				<th rowspan="3" class="center">Diagnosa</th>
				<th colspan="50" class="center">Jumlah Pasien Keluar Hidup dan Mati Menurut Kelompok Umur & Jenis Kelamin</th>
				<th colspan="3" rowspan="2" class="center">Jumlah Kasus Baru</th>
				<th colspan="3" rowspan="2" class="center">Jumlah Kunjungan</th>
			</tr>
			<tr>
				<th colspan="2">
					< 1 jam</th>
				<th colspan="2">1-23 jam</th>
				<th colspan="2">1-7 hr</th>
				<th colspan="2">8-14 hr</th>
				<th colspan="2">29-< 3 bln </th>
				<th colspan="2">3-< 6 bln</th>
				<th colspan="2">6 bln-< 11 bln</th>
				<th colspan="2">1-4 th</th>
				<th colspan="2">5-9 th</th>
				<th colspan="2">10-14 th</th>
				<th colspan="2">15-19 th</th>
				<th colspan="2">20-24 th</th>
				<th colspan="2">25-29 th</th>
				<th colspan="2">30-34 th</th>
				<th colspan="2">35-39 th</th>
				<th colspan="2">40-44 th</th>
				<th colspan="2">45-49 th</th>
				<th colspan="2">50-54 th</th>
				<th colspan="2">55-59 th</th>
				<th colspan="2">60-64 th</th>
				<th colspan="2">65-69 th</th>
				<th colspan="2">70-74 th</th>
				<th colspan="2">75-79 th</th>
				<th colspan="2">80-84 th</th>
				<th colspan="2">>85 th</th>
			</tr>
			<tr>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>
				<th>L</th>
				<th>P</th>

				<th>L</th>
				<th>P</th>
				<th>Total</th>
				<th>L</th>
				<th>P</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : ?>
				<tr>
					<td class="center"><?= $i + 1 ?></td>
					<td class="center"><?= $value->kode_icd ?></td>
					<td><?= $value->diagnosa ?></td>
					<td class="center"><?= $value->l_jam_1 ?></td>
					<td class="center"><?= $value->p_jam_1 ?></td>
					<td class="center"><?= $value->l_jam_1_23 ?></td>
					<td class="center"><?= $value->p_jam_1_23 ?></td>
					<td class="center"><?= $value->l_hari_1_7 ?></td>
					<td class="center"><?= $value->p_hari_1_7 ?></td>
					<td class="center"><?= $value->l_hari_8_28 ?></td>
					<td class="center"><?= $value->p_hari_8_28 ?></td>
					<td class="center"><?= $value->l_hari_29_bln_3 ?></td>
					<td class="center"><?= $value->p_hari_29_bln_3 ?></td>
					<td class="center"><?= $value->l_bln_3_6 ?></td>
					<td class="center"><?= $value->p_bln_3_6 ?></td>
					<td class="center"><?= $value->l_bln_6_11 ?></td>
					<td class="center"><?= $value->p_bln_6_11 ?></td>
					<td class="center"><?= $value->l_thn_1_4 ?></td>
					<td class="center"><?= $value->p_thn_1_4 ?></td>
					<td class="center"><?= $value->l_thn_5_9 ?></td>
					<td class="center"><?= $value->p_thn_5_9 ?></td>
					<td class="center"><?= $value->l_thn_10_14 ?></td>
					<td class="center"><?= $value->p_thn_10_14 ?></td>
					<td class="center"><?= $value->l_thn_15_19 ?></td>
					<td class="center"><?= $value->p_thn_15_19 ?></td>
					<td class="center"><?= $value->l_thn_20_24 ?></td>
					<td class="center"><?= $value->p_thn_20_24 ?></td>
					<td class="center"><?= $value->l_thn_25_29 ?></td>
					<td class="center"><?= $value->p_thn_25_29 ?></td>
					<td class="center"><?= $value->l_thn_30_34 ?></td>
					<td class="center"><?= $value->p_thn_30_34 ?></td>
					<td class="center"><?= $value->l_thn_35_39 ?></td>
					<td class="center"><?= $value->p_thn_35_39 ?></td>
					<td class="center"><?= $value->l_thn_40_44 ?></td>
					<td class="center"><?= $value->p_thn_40_44 ?></td>
					<td class="center"><?= $value->l_thn_45_49 ?></td>
					<td class="center"><?= $value->p_thn_45_49 ?></td>
					<td class="center"><?= $value->l_thn_50_54 ?></td>
					<td class="center"><?= $value->p_thn_50_54 ?></td>
					<td class="center"><?= $value->l_thn_55_59 ?></td>
					<td class="center"><?= $value->p_thn_55_59 ?></td>
					<td class="center"><?= $value->l_thn_60_64 ?></td>
					<td class="center"><?= $value->p_thn_60_64 ?></td>
					<td class="center"><?= $value->l_thn_65_69 ?></td>
					<td class="center"><?= $value->p_thn_65_69 ?></td>
					<td class="center"><?= $value->l_thn_70_74 ?></td>
					<td class="center"><?= $value->p_thn_70_74 ?></td>
					<td class="center"><?= $value->l_thn_75_79 ?></td>
					<td class="center"><?= $value->p_thn_75_79 ?></td>
					<td class="center"><?= $value->l_thn_80_84 ?></td>
					<td class="center"><?= $value->p_thn_80_84 ?></td>
					<td class="center"><?= $value->l_thn_85_plus ?></td>
					<td class="center"><?= $value->p_thn_85_plus ?></td>
					<td class="center"><?= $value->total_l_baru ?></td>
					<td class="center"><?= $value->total_p_baru ?></td>
					<td class="center"><?= $value->total_l_baru + $value->total_p_baru ?></td>
					<td class="center"><?= $value->total_l_kunjungan ?></td>
					<td class="center"><?= $value->total_p_kunjungan ?></td>
					<td class="center"><?= $value->total_l_kunjungan + $value->total_p_kunjungan ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>