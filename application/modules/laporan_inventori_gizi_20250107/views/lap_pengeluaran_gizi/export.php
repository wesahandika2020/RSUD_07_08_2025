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
  "Pengeluaran_Gizi - " . $periode
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
    vertical-align: middle;
    text-align: center;
  }

  .align-left {
    vertical-align: middle;
    text-align: left;
  }

  .align-right {
    vertical-align: middle;
    text-align: right;
  }

</style>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN PENGELUARAN LOGISTIK
      <br>Unit : <?= ($parameter['unit_depo'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Tanggal Dikirim</th>
        <th class="center">No. Kirim</th>
        <th class="center">Unit Tujuan</th>
        <th class="center">Kode</th>
        <th class="center">Nama Logistik</th>
        <th class="center">Kepemilikan</th>
        <th class="center">QTY</th>
        <th class="center">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0;
      $distribusi_terakhir = "";
      foreach ($data as $i => $val) :
        $distribusi_sekarang = $val->id_distribusi;
        if ($distribusi_terakhir == $distribusi_sekarang) {
          $no_urut = "";
          $tanggal_dikirim = "";
          $no_kirim = "";
          $unit = "";
        } else {
          $no_urut = ++$no;
          date_default_timezone_set('Asia/Jakarta');
          $tanggal_dikirim = date("d-m-Y", strtotime($val->tanggal_dikirim));
          $no_kirim = $val->no_kirim;
          $unit = $val->unit;
        }
        $distribusi_terakhir = $distribusi_sekarang;
      ?>
        <tr>
          <td class="align-center"><?= $no_urut ?></td>
          <td class="align-center"><?= $tanggal_dikirim ?></td>
          <td class="align-center"><?= $no_kirim ?></td>
          <td class="align-center"><?= $unit ?></td>
          <td class="align-center" style="mso-number-format:\@;" ><?= $val->kode ?></td>
          <td class="align-left"><?= $val->gizi ?></td>
          <td class="align-center"><?= $val->kategori_barang ?></td>
          <td class="align-center" style="mso-number-format:\@;"><?= number_format($val->qty, 0, ',', '.') ?></td>
          <td class="align-right" style="mso-number-format:\@;"><?= number_format($val->total, 0, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7" class="right">
          <b>Sub Total</b>
        </td>
        <td colspan="2" class="right" style="mso-number-format:\@;" >
          <b>Rp. <?= number_format($sub_total, 2, ',', '.') ?></b>
        </td>
      </tr>
    </tfoot>
  </table>
</body>