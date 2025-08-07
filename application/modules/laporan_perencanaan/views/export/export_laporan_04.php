<?php
	header_excel("LAPORAN Catatan Perkembangan Pasien Terintegrasi (CPPT) (".$periode.")");
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
		<h4><b>LAPORAN Catatan Perkembangan Pasien Terintegrasi (CPPT)</b>
			<br>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($bangsal_ranap) ? '<br>Bangsal : ' .$bangsal_ranap : '' ) ?>
			<?= (!empty($kategori_dokter) ? '<br>Kategori Dokter : ' .$kategori_dokter : '' ) ?>
			<?= (!empty($dokter) 		? '<br>Dokter : ' .$dokter : '' ) ?>
		</h4> 
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">No.</th>
				<th style="background-color: #9cc8ff; text-align: center">Tgl Layanan</th>
				<th style="background-color: #9cc8ff; text-align: center">No RM</th>
				<th style="background-color: #9cc8ff; text-align: center">Nama Pasien</th>
				<th style="background-color: #9cc8ff; text-align: center">Penjamin</th>
				<th style="background-color: #9cc8ff; text-align: center">Ruangan</th>
				<th style="background-color: #9cc8ff; text-align: center">Dokter DPJP</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu CPPT</th>
				<th style="background-color: #9cc8ff; text-align: center">Petugas</th>
				<th style="background-color: #9cc8ff; text-align: center">Dokter Verifikasi DPJP</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu Verif DPJP</th>
				<th style="background-color: #9cc8ff; text-align: center">Dokter Verifikasi TBAK</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu Verif TBAK</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : ?>
				<?php foreach ( $value->cppt as $index => $val ) : ?>
					<?php if($index <= 0): ?>
						<tr>
							<td style="vertical-align: top; text-align: center"><?= ++ $i ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($value->tanggal_layanan !== null) ? datetime($value->tanggal_layanan) : '-')?></td>
							<td style="vertical-align: top; text-align: center"><?= $value->id_pasien ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= $value->nama_pasien ?></td>
							<td style="vertical-align: top; text-align: center"><?= $value->penjamin ?></td>
							<td style="vertical-align: top; text-align: center"><?= $value->ruangan ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($value->dokter_dpjp !== null) ? $value->dokter_dpjp : '-') ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu !== null) ? datetime($val->waktu) : '-')?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->petugas !== null) ? (($val->profesi !== null) ? $val->petugas.' ('. $val->profesi.')' : '') : $val->petugas) ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->dokter_verifikasi_dpjp !== null) ? $val->dokter_verifikasi_dpjp : '-') ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu_verif_dpjp !== null) ? datetime($val->waktu_verif_dpjp) : '-') ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->dokter_verifikasi_tbak !== null) ? $val->dokter_verifikasi_tbak : '-') ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu_penerima_tbak !== null) ? datetime($val->waktu_penerima_tbak) : '-') ?></td>
						</tr>

					<?php else : ?>
						<tr>
							<td colspan="7"></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu !== null) ? datetime($val->waktu) : '-')?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->petugas !== null) ? (($val->profesi !== null) ? $val->petugas.' ('. $val->profesi.')' : '') : $val->petugas) ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->dokter_verifikasi_dpjp !== null) ? $val->dokter_verifikasi_dpjp : '-') ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu_verif_dpjp !== null) ? datetime($val->waktu_verif_dpjp) : '-') ?></td>
							<td style="vertical-align: top; text-align: left"  ><?= (($val->dokter_verifikasi_tbak !== null) ? $val->dokter_verifikasi_tbak : '-') ?></td>
							<td style="vertical-align: top; text-align: center"><?= (($val->waktu_penerima_tbak !== null) ? datetime($val->waktu_penerima_tbak) : '-') ?></td>
						</tr>
					<?php endif ?>
				<?php endforeach ?>
			<?php endforeach ?>
		</tbody>
	</table>
</body>