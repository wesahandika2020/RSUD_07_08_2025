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
  "Penjualan_obat" . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN BUKU PENJUALAN
      <br>Unit : <?= ($parameter['unit_depo'] == '' ? 'Semua Unit' : $unit) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Jenis Pasien : <?= ($parameter['jenis_pasien'] == '' ? ' Semua Pasien' : $parameter['jenis_pasien']) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr style="top: 0;">
        <th class="center">No.</th>
        <th class="center">Tanggal Transaksi</th>
        <th class="center">Nomor Penjualan</th>
        <th class="center">Nomor Resep</th>
        <th class="center">Nomor RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">Cara Bayar</th>
        <th class="center">KSO</th>
        <th class="center">Ruangan (Poli)</th>
        <th class="center">Netto</th>
        <th class="center">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $nopenjualan_terakhir = "";
      $no = 0;
      foreach ($data as $i => $val) :
        $nopenjualan_sekarang = $val->nomor_penjualan;
        if ($nopenjualan_terakhir == $nopenjualan_sekarang) {
          $no_urut = "";
          $nomor_penjualan = "";
          $nama_pasien = "";
          $tanggal_transaksi = "";
        } else {
          $no_urut = ++$no;
          $nomor_penjualan = $val->nomor_penjualan;
          $nama_pasien = $val->nama_pasien;
          $tanggal_transaksi = date("d-m-Y", strtotime($val->tanggal_transaksi));
        }
        $nopenjualan_terakhir = $nopenjualan_sekarang;
      ?>
        <tr>
          <td class="center"><?= $no_urut ?></td>
          <td class="center"><?= $tanggal_transaksi ?></td>
          <td class="center"><?= $nomor_penjualan ?></td>
          <td class="center"><?= $val->no_resep ?></td>
          <td class="center"><?= $val->no_rm ?></td>
          <td class="center"><?= $nama_pasien ?></td>
          <td class="center"><?= $val->cara_bayar ?></td>
          <td class="center"><?= $val->kso ?></td>
          <td class="center"><?= ($val->ruangan == null ? 'INSTALASI GAWAT DARURAT' : $val->ruangan) ?></td>
          <td class="right"><?= number_format($val->netto, 2, ',', '.') ?></td>
          <td class="right"><?= number_format($val->total, 2, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>