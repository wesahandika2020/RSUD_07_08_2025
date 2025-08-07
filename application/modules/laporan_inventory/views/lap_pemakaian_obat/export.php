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
  "Pemakaian_obat_" . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN PEMAKAIAN OBAT/ALKES
      <br>Unit : <?= ($parameter['unit_depo'] == '' ? 'Semua Unit' : $unit) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Golongan : <?= ($parameter['golongan'] == '' ? ' Semua Golongan' : $golongan) ?>
      <br>Fornas : <?= ($parameter['fornas'] == '' ? ' Semua Fornas' : $fornas) ?>
      <br>Generik : <?= ($parameter['generik'] == '' ? ' Semua Generik' : $generik) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th width="5%" class="center">No.</th>
        <th width="9%" class="center">Kode Obat</th>
        <th width="46%" class="center">Nama Obat</th>
        <th width="10%" class="center">Kepemilikan</th>
        <th width="7%" class="center">Qty</th>
        <th width="10%" class="center">Harga Satuan</th>
        <th width="13%" class="center">Nilai</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $i => $val) :
      ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td class="center"><?= $val->kode_barang ?></td>
          <td class="left"><?= $val->nama_barang ?></td>
          <td class="center"><?= $val->kepemilikan ?></td>
          <td class="center"><?= number_format($val->qty, 0, ',', '.') ?></td>
          <td class="right"><?= number_format($val->harga_satuan, 0, ',', '.') ?></td>
          <td class="right"><?= number_format($val->nilai, 2, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="right">
          <b>Total QTY</b>
        </td>
        <td class="right">
          <b><?= number_format($qty_total, 0, ',', '.') ?> &ensp;</b>
        </td>
        <td class="right">
          <b>Total Harga</b>
        </td>
        <td class="right">
          <b>Rp. <?= number_format($nilai_total, 2, ',', '.') ?> &ensp;</b>
        </td>
      </tr>
    </tfoot>
  </table>
</body>