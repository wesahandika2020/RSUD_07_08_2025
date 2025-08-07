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
  "Laporan Layanan Per Pasien - " . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN LAYANAN PER PASIEN
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
		  <th class="center">No.</th>
		  <th class="center">No.RM</th>
		  <th class="left">Nama Pasien</th>
		  <th class="center">Tanggal Daftar</th>
		  <th class="center">Tanggal Layanan</th>
		  <th class="center">Nama Tenaga Medis</th>
		  <th class="center">Penjamin</th>
		  <th class="center">Unit</th>
		  <th class="left">Layanan</th>
		  <th class="center">Tarif Layanan</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($data as $i => $v) : ?>
		<?php
			$tenaga_medis = !empty($v->tenaga_medis) ? $v->tenaga_medis[0] : null;
			$layanan = !empty($tenaga_medis->layanan) ? $tenaga_medis->layanan[0] : null;
		?>
		<tr>
			<td class="center"><?= ++$i ?></td>
			<td class="center"><?= $v->id ?></td>
			<td class="left"><?= $v->nama ?></td>
			<td class="center"><?= datefmysql($v->tanggal_daftar) ?></td>
			<td class="center"><?= datefmysql($tenaga_medis->tanggal_layanan) ?></td>
			<td class="center"><?= $tenaga_medis->nama ?></td>
			<td class="center"><?= $tenaga_medis->penjamin ?></td>
			<td class="center"><?= $layanan ? $layanan->unit : '-' ?></td>
			<td class="left"><?= $layanan ? $layanan->nama_tindakan . (' <b>'. (int)$layanan->total_tindakan > 1 ? '(x'. $layanan->total_tindakan . ')' : ' ' .'</b>') : '-' ?></td>
			<td class="center"><?= $layanan ? $layanan->tarif_layanan : 0 ?></td>
		</tr>
		<?php foreach ($v->tenaga_medis as $key => $val) : ?>
			<?php $layanan = !empty($val->layanan) ? $val->layanan[0] : null ?>
				<?php if($key !== 0) : ?>
					<tr>
						<td colspan="<?= $key !== 0 ? '4' : '7' ?>" class="center"></td>
						<td class="center"><?= datefmysql($val->tanggal_layanan) ?></td>
						<td class="center"><?= $val->nama ?></td>
						<td class="center"><?= $val->penjamin ?></td>
						<td class="center"><?= $layanan ? $layanan->unit : '-' ?></td>
						<td class="left"><?= $layanan ? $layanan->nama_tindakan . (' <b>'. (int)$layanan->total_tindakan > 1 ? '(x'. $v->total_tindakan . ')' : ' ' .'</b>') : '-' ?></td>
						<td class="center"><?= $layanan ? $layanan->tarif_layanan : 0 ?></td>
					</tr>
				<?php endif ?>
			<?php array_shift($val->layanan) ?>
			<?php foreach ($val->layanan as $va) : ?>
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
