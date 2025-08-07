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
  "Buku_Penjualan_" . $periode
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
      <br>Periode : <?= $periode ?>
      <br>
      <br>Unit <?= ($parameter['unit_depo'] == '' ? ' : Semua Unit' : ' : ' . $unit) ?>
      <br>Jenis Pasien <?= ($parameter['jenis_pasien'] == '' ? ' : Semua Jenis Pasien' : ' : ' . $parameter['jenis_pasien']) ?>
      <br>Ruangan <?= ($parameter['ruangan_rajal'] == '' && $parameter['ruangan_ranap'] == '' ? ' : Semua Ruangan' : ' : ' . $ruangan) ?>
      <br>Barang <?= ($parameter['barang_search'] == '' ? ' : Semua Barang' : ' : ' . $barang) ?>
      <br>Kategori <?= ($parameter['kategori'] == '' ? ' : Semua Kategori' : ' : ' . $kategori) ?>
      <br>Pasien <?= ($parameter['pasien_search'] == '' ? ' : Semua Pasien' : ' : ' . $pasien) ?>
      <br>Dokter <?= ($parameter['dokter_search'] == '' ? ' : Semua Dokter' : ' : ' . $dokter) ?>

    </h4>

    <!-- <table style="width:100%">
        <tr>
          <td colspan="6" class="right"><b>Unit</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['unit_depo'] == '' ? ' : Semua Unit' : ' : ' . $unit) ?></b></td>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Jenis Pasien</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['jenis_pasien'] == '' ? ' : Semua Jenis Pasien' : ' : ' . $parameter['jenis_pasien']) ?></b></td>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Ruangan</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['ruangan_rajal'] == '' && $parameter['ruangan_ranap'] == '' ? ' : Semua Ruangan' : ' : ' . $ruangan) ?>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Barang</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['barang_search'] == '' ? ' : Semua Barang' : ' : ' . $barang) ?>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Kategori</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['kategori'] == '' ? ' : Semua Kategori' : ' : ' . $kategori) ?>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Pasien</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['pasien_search'] == '' ? ' : Semua Pasien' : ' : ' . $pasien) ?>
        </tr>
        <tr>
          <td colspan="6" class="right"><b>Dokter</b></td>
          <td colspan="5" class="left" ><b><?= ($parameter['dokter_search'] == '' ? ' : Semua Dokter' : ' : ' . $dokter) ?>
        </tr>
      </table> -->

  </div>
  <br>
  <table width="100%" border="1">
    <thead>
      <tr style="top: 0;">
        <th widht="3%" class="center">No.</th>
        <th widht="8%" class="center">Tanggal Act</th>
        <th widht="7%" class="center">No. Penjualan</th>
        <th widht="14%" class="center">Nama Pasien</th>
        <th widht="14%" class="center">Nama Obat</th>
        <th widht="8%" class="center">Kategori</th>
        <th widht="7%" class="center">Kepemilikan</th>
        <th widht="5%" class="center">Qty</th>
        <th widht="10%" class="center">Harga</th>
        <th widht="10%" class="center">Poli<br>(Ruangan)</th>
        <th widht="14%" class="center">Dokter</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // $nopenjualan_terakhir = "";
      $TotalQTY = 0;
      $TotalHarga = 0;
      $no = 0;
      foreach ($data as $i => $val) :
        $TotalQTY += ($val->qty);
        $TotalHarga += ($val->harga);
        // $nopenjualan_sekarang = $val->no_penjualan;
        // if ($nopenjualan_terakhir == $nopenjualan_sekarang) {
        //   $no_urut = "";
        //   $no_penjualan = "";
        //   $nama_pasien = "";
        //   $tanggal_act = "";
        // } else {
        //   $no_urut = ++$no;
        //   $no_penjualan = $val->no_penjualan;
        //   $nama_pasien = $val->pasien;
        //   $tanggal_act = date("d-m-Y", strtotime($val->tanggal_act));
        // }
        // $nopenjualan_terakhir = $nopenjualan_sekarang;
      ?>
        <!-- ?php $jumlah_harga = $val->harga * $val->qty;  ? -->
        <tr>
          <td widht="3%" class="center"><?= ++$no ?></td>
          <td widht="8%" class="center"><?= date("d-m-Y", strtotime($val->tanggal_act)) ?></td>
          <td widht="7%" class="center"><?= $val->no_penjualan ?></td>
          <td widht="14%" class="left"><?= $val->pasien ?></td>
          <td widht="14%" class="left"><?= $val->nama_obat ?></td>
          <td widht="8%" class="center"><?= $val->kategori ?></td>
          <td widht="7%" class="center">JPKMKT</td>
          <td widht="5%" class="center"><?= $val->qty ?></td>
          <td widht="10%" class="right"><?= number_format($val->harga, 2, ',', '.') ?></td>
          <td widht="10%" class="center"><?= ($val->ruang == null ? 'INSTALASI GAWAT DARURAT' : $val->ruang) ?></td>
          <td widht="14%" class="center"><?= $val->dokter ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7" class="right"><b>Total QTY</b></td>
        <td colspan="2" class="right"><b><?= $TotalQTY ?> &ensp;</b></td>
        <td class="right"><b>Total Harga</b></td>
        <td class="right"><b>Rp. <?= number_format($TotalHarga, 2, ',', '.') ?> &ensp;</b></td>
      </tr>
    </tfoot>
  </table>
</body>