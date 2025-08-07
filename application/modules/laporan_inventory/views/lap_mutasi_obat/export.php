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
  "Mutasi_Obat_". $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN MUTASI OBAT
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Golongan : <?= ($golongan == null ? ' Semua Golongan' : $golongan) ?>
      <br>Jenis : <?= ($parameter['jenis'] == '' ? ' Semua Jenis' : $parameter['jenis']) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Fornas : <?= ($parameter['fornas'] == '' ? ' Semua' : $fornas) ?>
      <br>Generik : <?= ($parameter['generik'] == '' ? ' Semua' : $generik) ?>
      <br>Periode : <?= $periode ?>
      <!-- <?= var_dump($unit->nama) ?> -->
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th rowspan="2" widht="5%" class="center">No.</th>
        <th rowspan="2" widht="20%" class="center">Nama Obat</th>
        <th rowspan="2" widht="5%" class="center">Kategori</th>
        <th rowspan="2" widht="7%" class="center">Milik</th>
        <th colspan="2" class="center">Saldo Awal</th>
        <th colspan="3" class="center">Masuk</th>
        <th colspan="4" class="center">Keluar</th>
        <th rowspan="2" widht="5%" class="center">Adj</th>
        <th colspan="2" class="center">Saldo Akhir</th>
      </tr>
      <tr>
        <th widht="5%" class="center">Qty</th>
        <th widht="9%" class="center">Nilai</th>

        <th widht="5%" class="center">Pbf</th>
        <th widht="5%" class="center">Unit</th>
        <th widht="5%" class="center">Ret</th>

        <th widht="5%" class="center">Jual</th>
        <th widht="5%" class="center">Unit</th>
        <th widht="5%" class="center">Ret</th>
        <th widht="5%" class="center">Hapus</th>

        <th widht="5%" class="center">Qty</th>
        <th widht="9%" class="center">Nilai</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total_saldo_awal = 0;
      $total_saldo_akhir = 0;
      foreach ($data as $i => $value) :
        $total_saldo_awal += ($value->harga_satuan * $value->awal);
        $total_saldo_akhir += ($value->harga_satuan * $value->sisa);
      ?>

        <tr>
          <td valign="baseline" class="center"><?= ++$i ?></td>
          <td valign="baseline" class="left"><?= $value->nama_barang ?></td>
          <td class="center"><?= $value->kategori ?></td>
          <td class="center">JPKMKT</td>
          <td class="center"><?= number_format($value->awal, 0, ',', '.') ?></td>
          <td class="right"><?= number_format($value->harga_satuan * $value->awal, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->masuk_pbf, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->masuk_unit, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->masuk_retur, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->keluar_jual, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->keluar_unit, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->keluar_retur, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->keluar_hapus, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->adj_koreksi, 0, ',', '.') ?></td>
          <td class="center"><?= number_format($value->sisa, 0, ',', '.') ?></td>
          <td class="right"><?= number_format($value->harga_satuan * $value->sisa, 0, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="right"><b>Total Saldo Awal</b></td>
        <td colspan="2" class="right"><b><?= number_format($total_saldo_awal, 0, ',', '.') ?></b></td>
        <td colspan="8" class="right"><b>Total Saldo Akhir</b></td>
        <td colspan="2" class="right"><b><?= number_format($total_saldo_akhir, 0, ',', '.') ?></b></td>
      </tr>
    </tfoot>
  </table>
</body>