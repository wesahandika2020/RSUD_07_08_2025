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
	"Sisa_stok_unit-". $periode
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
</style>
<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN SISA STOK UNIT
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Kategori : <?= ($parameter['kategori_barang'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Periode : <?= $periode ?>
      <!-- <!?= var_dump($unit->nama) ?> -->
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
    <tr class="header">
	    <th class="center">No.</th>
	    <th class="center">Nama Barang</th>
	    <th class="center">Awal</th>
	    <th class="center">Masuk</th>
	    <th class="center">Keluar</th>
	    <th class="center">Sisa</th>
	    <th class="center">HPP</th>
	    <th class="center">Asset</th>
	    <th class="center">Unit</th>
    </tr>
    </thead>
    <tbody>
      <?php
      foreach ($data as $i => $value) :
      ?>
        <tr>
          <td class="center"><?= ++$i ?></td>
          <td class="left"><?= $value->nama_barang ?></td>
          <td class="center"><?= $value->awal ?></td>
          <td class="center"><?= $value->masuk ?></td>
          <td class="center"><?= $value->keluar ?></td>
          <td class="center"><?= $value->sisa ?></td>
          <td class="center"><?= $value->hpp ?></td>
          <td class="center"><?= $value->hpp * $value->sisa ?></td>
          <td class="center"><?= $value->unit ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>
