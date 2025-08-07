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
  "Permintaan_Obat - " . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN PERMINTAAN OBAT
      <br>Unit : <?= ($parameter['unit_depo'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Tanggal</th>
        <th class="center">No. Bukti</th>
        <th class="center">Kepemilikan</th>
        <th class="center">Unit</th>
        <th class="center">Nama Obat</th>
        <th class="center">QTY</th>
        <th class="center">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $i => $val) :
      ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td class="center"><?= $val->tanggal ?></td>
          <td class="center"><?= $val->no_bukti ?></td>
          <td class="center"><?= $val->kepemilikan ?></td>
          <td class="center"><?= $val->unit ?></td>
          <td class="left"><?= $val->obat ?></td>
          <td class="center"><?= number_format($val->qty, 0, ',', '.') ?></td>
          <td class="center"><?= $val->status ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>