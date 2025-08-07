<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
  $param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
  $param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
  $param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

header_excel(
 "Laporan Layanan Tenaga Medis - " . $periode
);
?>
<style>
  .center {
    text-align: center;
  }

  .left {
    text-align: left;
  }

  .right {
    text-align: right;
  }

  .align-top {
    vertical-align: top;
  }

  .align-center {
    vertical-align: center;
  }

  td {
    vertical-align: top;
  }
</style>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN LAYANAN TENAGA MEDIS
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
		  <th class="center">No.</th>
		  <th class="left">Nama Tenaga Medis</th>
		  <th class="center">No. RM</th>
		  <th class="left">Nama Pasien</th>
		  <th class="left">Penjamin</th>
		  <th class="center">Tanggal Daftar</th>
		  <th class="center">Tanggal Layanan</th>
		  <th class="center">Unit</th>
		  <th class="left">Layanan</th>
		  <th class="center">Tarif Layanan</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($data as $i => $v) : ?>
		<?php
			$layanan_pendaftaran_decode = $v->layanan_pendaftaran;
			$layanan_pendaftaran = $layanan_pendaftaran_decode[0] ?: null;
			$layanan = $layanan_pendaftaran ? $layanan_pendaftaran->layanan[0] : null;
		?>
		<tr>
			<td class="center"><?= ++$i ?></td>
			<td class="left"><?= $v->nama ?></td>
			<td class="center"><?= $layanan_pendaftaran ? $layanan_pendaftaran->id : '-' ?></td>
			<td class="left"><?= $layanan_pendaftaran ? $layanan_pendaftaran->nama : '-' ?></td>
			<td class="left"><?= $layanan_pendaftaran ? $layanan_pendaftaran->penjamin : '-' ?></td>
			<td class="center"><?= $layanan_pendaftaran ? datefmysql($layanan_pendaftaran->tanggal_daftar) : '-' ?></td>
			<td class="center"><?= $layanan_pendaftaran ? datefmysql($layanan_pendaftaran->tanggal_layanan) : '' ?></td>
			<td class="center"><?= !empty($layanan->unit) ? $layanan->unit : '-' ?></td>
			<td class="left"><?= !empty($layanan->nama_tindakan) ? $layanan->nama_tindakan . (' <b>'. (int)$layanan->total_tindakan > 1 ? '(x'. $v->total_tindakan . ')' : ' ' .'</b>') : '-' ?></td>
			<td class="center"><?= !empty($layanan->tarif_layanan) ? $layanan->tarif_layanan : 0 ?></td>
		</tr>
		<?php array_shift($layanan_pendaftaran_decode) ?>
		<?php foreach ($layanan_pendaftaran_decode as $key => $val) : ?>
			<?php $layanan = !empty($val->layanan) ? $val->layanan[0] : null ?>
			<tr>
				<td class="center"></td>
				<td class="center"><b><?= $key + 1 ?></b></td>
				<td class="center"><?= $val ? $val->id : '-' ?></td>
				<td class="left"><?= $val ? $val->nama : '-' ?></td>
				<td class="left"><?= $val ? $val->penjamin : '-' ?></td>
				<td class="center"><?= $val ? datefmysql($val->tanggal_daftar) : '-' ?></td>
				<td class="center"><?= $val ? datefmysql($val->tanggal_layanan) : '' ?></td>
				<td class="center"><?= !empty($layanan->unit) ? $layanan->unit : '-' ?></td>
				<td class="left"><?= !empty($layanan->nama_tindakan) ? $layanan->nama_tindakan . (' <b>'. (int)$layanan->total_tindakan > 1 ? '(x'. $v->total_tindakan . ')' : ' ' .'</b>') : '-' ?></td>
				<td class="center"><?= !empty($layanan->tarif_layanan) ? $layanan->tarif_layanan : 0 ?></td>
			</tr>
			<?php array_shift($val->layanan) ?>
			<?php foreach ($val->layanan as $k => $va) : ?>
				<tr>
					<td colspan="7" class="center"></td>
					<td class="center"><?= !empty($va->unit) ? $va->unit : '-' ?></td>
					<td class="left">
						<?php $total_tindakan = $va->total_tindakan > 1 ? "<b>(x$va->total_tindakan)</b>" : '' ?>
						<?= !empty($va->nama_tindakan) ? $va->nama_tindakan . ' ' . $total_tindakan: '-' ?>
					</td>
					<td class="center"><?= !empty($va->tarif_layanan) ? $va->tarif_layanan : 0 ?></td>
				</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
	<tr>
		<td colspan="9" class="right"><b>Total tarif layanan</b></td>
		<td class="center"><b><?= $total_tarif_layanan ?></b></td>
	</tr>
    </tbody>
  </table>
</body>
