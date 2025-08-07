<?php
date_default_timezone_set('Asia/Jakarta');
$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
  $param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
  $param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
  $param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

header_excel(
  "Permintaan_Logistik - " . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN PERMINTAAN LOGISTIK
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Kode</th>
        <th class="center">Nama Barang</th>
        <th class="center">Satuan</th>
        <th class="center">Kategori</th>
        <th class="center">QTY Minta</th>
        <th class="center">QTY Kirim</th>
        <th class="center">Harga Satuan</th>
        <th class="center">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $i => $val) :
      ?>
        <tr>
          <td class="center"><?= $no++ ?></td>
          <td class="center"><?= $val->kode ?></td>
          <td class="left"><?= $val->nama_barang ?></td>
          <td class="center"><?= $val->satuan ?></td>
          <td class="center"><?= $val->kategori ?></td>
          <td class="center" style="mso-number-format:\@;"><?= number_format($val->qty_minta, 0, ',', '.') ?></td>
          <td class="center" style="mso-number-format:\@;"><?= number_format($val->qty_kirim, 0, ',', '.') ?></td>
          <td class="right" style="mso-number-format:\@;"><?= number_format($val->harga_satuan, 0, ',', '.') ?></td>
          <td class="right" style="mso-number-format:\@;"><?= number_format($val->total, 2, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>