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

$jenisUnit1 = $parameter['tempat_layanan_1'] === '' ? 'Semua' : $parameter['tempat_layanan_1'];
$jenisUnit2 = $parameter['tempat_layanan_2'] === '' ? 'Semua' : $parameter['tempat_layanan_2'];
$jenisUnit3 = $parameter['tempat_layanan_3'] === '' ? 'Semua' : $parameter['tempat_layanan_3'];

$jenisUnit = '';
if ($jenisUnit1 === 'Semua' && $jenisUnit2 === 'Semua' && $jenisUnit3 === 'Semua') {
	$jenisUnit = $jenisUnit1;
} elseif ($jenisUnit1 === 'Semua' && $jenisUnit2 !== 'Semua' && $jenisUnit3 === 'Semua') {
	$jenisUnit = $jenisUnit2;
} elseif ($jenisUnit1 !== 'Semua' && $jenisUnit2 === 'Semua' && $jenisUnit3 === 'Semua') {
	$jenisUnit = $jenisUnit1;
} elseif ($jenisUnit1 === 'Semua' && $jenisUnit2 === 'Semua' && $jenisUnit3 !== 'Semua') {
	$jenisUnit = $jenisUnit3;
} elseif ($jenisUnit1 !== 'Semua' && $jenisUnit2 !== 'Semua' && $jenisUnit3 !== 'Semua') {
	$jenisUnit = $jenisUnit1;
} else {
	$jenisUnit = '-';
}

$data["periode"] = "Periode : ".$periode;

if ($parameter['tab_active'] === 'unit-pelayanan') {
	header_excel(
			"LAPORAN KUNJUNGAN PASIEN RAWAT JALAN PER JAMINAN - ".$jenis_rawat." ( ".$periode." )"
	);
} elseif ($parameter['tab_active'] === 'per-wilayah') {
	header_excel(
			"LAPORAN KUNJUNGAN PASIEN RAWAT JALAN KESELURUHAN BARU DAN LAMA PER WILAYAH RSUD KOTA TANGERANG - ".$jenis_rawat." ( ".$periode." )"
	);
} else {
	header_excel(
			"LAPORAN KUNJUNGAN PASIEN RAWAT JALAN PER JAMINAN - ".$jenis_rawat." ( ".$periode." )"
	);
}

header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
<?php if ($parameter['tab_active'] === 'unit-pelayanan') : ?>
	<h4>LAPORAN KUNJUNGAN PASIEN RAWAT JALAN PER JAMINAN
		<br><b>RSUD KOTA TANGERANG</b>
		<br><b>Periode <?= $periode ?></b>
		<br>Unit: <b><?= $jenisUnit ?></b>
	</h4>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th class="center">No.</th>
			<th class="center">Jaminan</th>
			<th class="center"><?= $periode ?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totalPenjaminan = 0;
		foreach ($per_unit_pelayanan['data'] as $i => $value) :
			$totalPenjaminan += $value->total_penjamin;
			if ($value->penjamin !== null):
				?>
				<tr>
					<td>
						<div style="display: flex;justify-content: center;"><?= ++$i ?></div>
					</td>
					<td><?= $value->penjamin ?></td>
					<td>
						<div style="display: flex;justify-content: center;"><?= $value->total_penjamin ?></div>
					</td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
		<tr>
			<td colspan="2">
				<div style="display: flex;justify-content: flex-end;"><i><b>JUMLAH</b></i></div>
			</td>
			<td>
				<div style="display: flex;justify-content: center;"><b><?= $totalPenjaminan ?></b></div>
			</td>
		</tr>
		</tbody>
	</table>
<?php elseif ($parameter['tab_active'] === 'per-wilayah') : ?>
	<h4>LAPORAN KUNJUNGAN PASIEN RAWAT JALAN KESELURUHAN BARU DAN LAMA PER WILAYAH RSUD KOTA TANGERANG
		<br><b>RSUD KOTA TANGERANG</b>
		<br><b>Periode <?= $periode ?></b>
	</h4>
	<b>Pasien <?php
		$penjamin = $this->db->get_where('sm_penjamin', ['id' => (int) $parameter['penjamin']])->row();
		echo $penjamin ?? 'Semua';
		?>
	</b>
	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th class="center">No.</th>
			<th class="center">Kecamatan</th>
			<th class="center"><?= $periode ?></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$totalWilayah = 0;
		foreach ($per_wilayah['data'] as $i => $value) :
			$totalWilayah += $value->total_wilayah;
			if (isset($value->nama_kec)): ?>
				<tr>
					<td>
						<div style="display: flex;justify-content: center;"><?= ++$i ?></div>
					</td>
					<td><?= $value->nama_kec ?></td>
					<td>
						<div style="display: flex;justify-content: center;"><?= $value->total_wilayah ?></div>
					</td>
				</tr>
			<?php else : ?>
				<tr>
					<td class="center"><?= ++$i ?></td>
					<td class="left"><b>Luar Kota Tangerang</b></td>
					<td class="center"><?= $value->total_wilayah ?></td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
		<tr>
			<td colspan="2">
				<div style="display: flex;justify-content: flex-end;"><i><b>JUMLAH</b></i></div>
			</td>
			<td>
				<div style="display: flex;justify-content: center;"><b><?= $totalWilayah ?></b></div>
			</td>
		</tr>
		</tbody>
	</table>
<?php else : ?>
	<h4>LAPORAN JUMLAH KESELURUHAN KUNJUNGAN PASIEN BARU DAN LAMA RAWAT JALAN PER JAMINAN
		<br><b>RSUD KOTA TANGERANG</b>
		<br><b>Periode <?= $periode ?></b>
	</h4>
	<table border="1">
		<thead border="2">
		<tr>
			<th class="center" rowspan="2">No.</th>
			<th class="center" rowspan="2">Nama Dokter</th>
			<th class="center" colspan="16"><?= $periode ?></th>
			<th class="center" rowspan="2">Grand Total</th>
		</tr>
		<tr>
			<th class="center">BPJS</th>
			<th class="center">BPJS Ketenagakerjaan</th>
			<th class="center">Umum</th>
			<th class="center">Jaminan Covid Kemenkes</th>
			<th class="center">JPKMKT</th>
			<th class="center">Jasa Raharja</th>
			<th class="center">Taspen</th>
			<th class="center">DP3AP2KB</th>
			<th class="center">Global Fund</th>
			<th class="center">Keluarga Karyawan</th>
			<th class="center">Gratis</th>
			<th class="center">Charity Rumah Sakit</th>
			<th class="center">Penunggu Pasien</th>
			<th class="center">Jamkesmas</th>
			<th class="center">RS BUNDA SEJATI</th>
			<th class="center">Jaminan Kesehatan RSUD</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$iterate                   = 0;
		$totalBpjs                 = 0;
		$totalBpjsKetenagakerjaan  = 0;
		$totalUmum                 = 0;
		$totalJaminanCovidKemenkes = 0;
		$totalJpkmkt               = 0;
		$totalJasaRaharja          = 0;
		$totalTaspen               = 0;
		$totalDp3Ap2Kb             = 0;
		$totalGlobalFund           = 0;
		$totalKeluargaKaryawan     = 0;
		$totalGratis               = 0;
		$totalCrm                  = 0;
		$totalPenugguPasien        = 0;
		$totalJamkesmas            = 0;
		$totalRbs                  = 0;
		$totalJkr                  = 0;

		foreach ($per_dokter['data'] as $i => $value) : ?>
			<tr>
				<td><?= ++$iterate ?></td>
				<td colspan="10"><b><?= $value->nama ?></b></td>
			</tr>
			<?php
			$subTotalBpsj                 = 0;
			$subTotalBpsjKetenagakerjaan  = 0;
			$subTotalUmum                 = 0;
			$subTotalJaminanCovidKemenkes = 0;
			$subTotalJpkmkt               = 0;
			$subTotalJasaRaharja          = 0;
			$subTotalTaspen               = 0;
			$subTotalDp3Ap2Kb             = 0;
			$subTotalGlobalFund           = 0;
			$subTotalKeluargaKaryawan     = 0;
			$subTotalGratis               = 0;
			$subTotalCrm                  = 0;
			$subTotalPenugguPasien        = 0;
			$subTotalJamkesmas            = 0;
			$subTotalRbs                  = 0;
			$subTotalJkr                  = 0;

			foreach (json_decode($value->data_dokter) as $key => $v): ?>
				<?php $data = $v; ?>

				<?php
				$subTotalBpsj                 += $data->bpjs;
				$subTotalBpsjKetenagakerjaan  += $data->bpjs_ketenagakerjaan;
				$subTotalUmum                 += $data->umum;
				$subTotalJaminanCovidKemenkes += $data->jaminan_covid_kemenkes;
				$subTotalJpkmkt               += $data->jpkmkt;
				$subTotalJasaRaharja          += $data->jasa_raharja;
				$subTotalTaspen               += $data->taspen;
				$subTotalDp3Ap2Kb             += $data->dp3ap2kb;
				$subTotalGlobalFund           += $data->global_fund;
				$subTotalKeluargaKaryawan     += $data->keluarga_karyawan;
				$subTotalGratis               += $data->gratis;
				$subTotalCrm                  += $data->crm;
				$subTotalPenugguPasien        += $data->penunggu_pasien;
				$subTotalJamkesmas            += $data->jamkesmas;
				$subTotalRbs                  += $data->rbs;
				$subTotalJkr                  += $data->jkr;
				?>
				<tr>
					<td></td>
					<td class="left"><?= $data->nama_dokter ?></td>
					<td class="center"><?= $data->bpjs ?></td>
					<td class="center"><?= $data->bpjs_ketenagakerjaan ?></td>
					<td class="center"><?= $data->umum ?></td>
					<td class="center"><?= $data->jaminan_covid_kemenkes ?></td>
					<td class="center"><?= $data->jpkmkt ?></td>
					<td class="center"><?= $data->jasa_raharja ?></td>
					<td class="center"><?= $data->taspen ?></td>
					<td class="center"><?= $data->dp3ap2kb ?></td>
					<td class="center"><?= $data->global_fund ?></td>
					<td class="center"><?= $data->keluarga_karyawan ?></td>
					<td class="center"><?= $data->gratis ?></td>
					<td class="center"><?= $data->crm ?></td>
					<td class="center"><?= $data->penunggu_pasien ?></td>
					<td class="center"><?= $data->jamkesmas ?></td>
					<td class="center"><?= $data->rbs ?></td>
					<td class="center"><?= $data->jkr ?></td>
					<td class="center">
						<b><?= $data->bpjs + $data->bpjs_ketenagakerjaan + $data->umum + $data->jaminan_covid_kemenkes + $data->jpkmkt + $data->jasa_raharja + $data->taspen + $data->dp3ap2kb + $data->global_fund + $data->keluarga_karyawan + $data->gratis + $data->crm + $data->penunggu_pasien + $data->jamkesmas + $data->rbs + $data->jkr ?></b>
					</td>
				</tr>
			<?php endforeach ?>
			<tr>
				<td></td>
				<td class="right"><b>TOTAL</b></td>
				<td class="center"><b><?= $subTotalBpsj ?></b></td>
				<td class="center"><b><?= $subTotalBpsjKetenagakerjaan ?></b></td>
				<td class="center"><b><?= $subTotalUmum ?></b></td>
				<td class="center"><b><?= $subTotalJaminanCovidKemenkes ?></b></td>
				<td class="center"><b><?= $subTotalJpkmkt ?></b></td>
				<td class="center"><b><?= $subTotalJasaRaharja ?></b></td>
				<td class="center"><b><?= $subTotalTaspen ?></b></td>
				<td class="center"><b><?= $subTotalDp3Ap2Kb ?></b></td>
				<td class="center"><b><?= $subTotalGlobalFund ?></b></td>
				<td class="center"><b><?= $subTotalKeluargaKaryawan ?></b></td>
				<td class="center"><b><?= $subTotalGratis ?></b></td>
				<td class="center"><b><?= $subTotalCrm ?></b></td>
				<td class="center"><b><?= $subTotalPenugguPasien ?></b></td>
				<td class="center"><b><?= $subTotalJamkesmas ?></b></td>
				<td class="center"><b><?= $subTotalRbs ?></b></td>
				<td class="center"><b><?= $subTotalJkr ?></b></td>
				<td class="center">
					<b><?= $subTotalBpsj + $subTotalBpsjKetenagakerjaan + $subTotalUmum + $subTotalJaminanCovidKemenkes + $subTotalJpkmkt + $subTotalJasaRaharja + $subTotalTaspen + $subTotalDp3Ap2Kb + $subTotalGlobalFund + $subTotalKeluargaKaryawan + $subTotalGratis + $subTotalCrm + $subTotalPenugguPasien + $subTotalJamkesmas + $subTotalRbs + $subTotalJkr ?></b>
				</td>
			</tr>

			<?php
			$totalBpjs                 += $subTotalBpsj;
			$totalBpjsKetenagakerjaan  += $subTotalBpsjKetenagakerjaan;
			$totalUmum                 += $subTotalUmum;
			$totalJaminanCovidKemenkes += $subTotalJaminanCovidKemenkes;
			$totalJpkmkt               += $subTotalJpkmkt;
			$totalJasaRaharja          += $subTotalJasaRaharja;
			$totalTaspen               += $subTotalTaspen;
			$totalDp3Ap2Kb             += $subTotalDp3Ap2Kb;
			$totalGlobalFund           += $subTotalGlobalFund;
			$totalKeluargaKaryawan     += $subTotalKeluargaKaryawan;
			$totalGratis               += $subTotalGratis;
			$totalCrm                  += $subTotalCrm;
			$totalPenugguPasien        += $subTotalPenugguPasien;
			$totalJamkesmas            += $subTotalJamkesmas;
			$totalRbs                  += $subTotalRbs;
			$totalJkr                  += $subTotalJkr;
			?>
		<?php endforeach ?>
		<tr>
			<td colspan="2" class="right"><i><b>TOTAL PASIEN <?= strtoupper($jenis_rawat) ?></b></i>
			</td>
			<td class="center"><b><?= $totalBpjs ?></b></td>
			<td class="center"><b><?= $totalBpjsKetenagakerjaan ?></b></td>
			<td class="center"><b><?= $totalUmum ?></b></td>
			<td class="center"><b><?= $totalJaminanCovidKemenkes ?></b></td>
			<td class="center"><b><?= $totalJpkmkt ?></b></td>
			<td class="center"><b><?= $totalJasaRaharja ?></b></td>
			<td class="center"><b><?= $totalTaspen ?></b></td>
			<td class="center"><b><?= $totalDp3Ap2Kb ?></b></td>
			<td class="center"><b><?= $totalGlobalFund ?></b></td>
			<td class="center"><b><?= $totalKeluargaKaryawan ?></b></td>
			<td class="center"><b><?= $totalGratis ?></b></td>
			<td class="center"><b><?= $totalCrm ?></b></td>
			<td class="center"><b><?= $totalPenugguPasien ?></b></td>
			<td class="center"><b><?= $totalJamkesmas ?></b></td>
			<td class="center"><b><?= $totalRbs ?></b></td>
			<td class="center"><b><?= $totalJkr ?></b></td>
			<td class="center">
				<b><?= $totalBpjs + $totalBpjsKetenagakerjaan + $totalUmum + $totalJaminanCovidKemenkes + $totalJpkmkt + $totalJasaRaharja + $totalTaspen + $totalDp3Ap2Kb + $totalGlobalFund + $totalKeluargaKaryawan + $totalGratis + $totalCrm + $totalPenugguPasien + $totalJamkesmas + $totalRbs + $totalJkr ?></b>
			</td>
		</tr>
		</tbody>
	</table>
<?php endif; ?>
</body>
