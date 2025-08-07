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
  "Pemakaian_obat_all_unit - " . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN PEMAKAIAN OBAT/ALKES ALL UNIT
      <br>Unit : Semua Unit Depo Farmasi
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
        <th width="7%" class="center">Kode Obat</th>
        <th width="41%" class="center">Nama Obat</th>
        <th width="7%" class="center">Kepemilikan</th>
        <th width="5%" class="center">IGD</th>
        <th width="5%" class="center">OK</th>
        <th width="5%" class="center">RJ</th>
        <th width="5%" class="center">RI</th>
        <th width="7%" class="center">Total</th>
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
          <td class="center"><?= number_format($val->igd, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($val->ok, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($val->rj, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($val->ri, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($val->total, 0, ',', '.') ?></td>
          <td class="right"><?= number_format($val->nilai, 2, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7" class="right">
          <b>Total QTY</b>
        </td>
        <td class="right">
          <b><?= number_format($qty_total, 0, ',', '.') ?></b>
        </td>
        <td class="right">
          <b>Total Harga</b>
        </td>
        <td class="right">
          <b>Rp. <?= number_format($nilai_total, 2, ',', '.') ?></b>
        </td>
      </tr>
    </tfoot>
  </table>
</body>