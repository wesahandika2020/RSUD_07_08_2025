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
  "Mutasi_Gizi_". $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN REALISASI PERSEDIAAN GIZI
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Periode : <?= $periode ?>
      <!-- <!?= var_dump($unit->nama) ?> -->
    </h4>
  </div>

  <table width="100%" border="1">
      <thead>
          <tr>
              <th class="center" rowspan="2">No.</th>
              <th class="center" rowspan="2">Kategori</th>
              <th class="center" rowspan="2">Kode Barang</th>
              <th class="center" rowspan="2">Nama Barang</th>
              <th class="center" rowspan="2">Harga Satuan</th>
              <th class="center" colspan="2">Saldo Awal</th>
              <th class="center" colspan="2">Penerimaan</th>
              <th class="center" colspan="2">Pengeluaran</th>
              <th class="center" colspan="2">Saldo Akhir</th>
              <th class="center" rowspan="2">Keterangan</th>
          </tr>
          <tr>
              <th class="center">Unit</th>
              <th class="center">RP.</th>
              <th class="center">Unit</th>
              <th class="center">RP.</th>
              <th class="center">Unit</th>
              <th class="center">RP.</th>
              <th class="center">Unit</th>
              <th class="center">RP.</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $total_saldo_awal = 0;
          $total_penerimaan = 0;
          $total_pengeluaran = 0;
          $total_saldo_akhir = 0;

          // Loop through the data and display rows
          foreach ($data as $i => $value) : ?>
              <tr>
                  <td class="center"><?= $i + 1 ?></td>
                  <td class="left"><?= $value->kategori ?></td>
                  <td class="center"><?= $value->kode_barang ?></td>
                  <td class="left"><?= $value->nama_barang ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->awal, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->awal*$value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->masuk, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->masuk*$value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->keluar, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->keluar*$value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->sisa, 0, ',', '.') ?></td>
                  <td class="right" style="mso-number-format:'@'"><?= number_format($value->sisa*$value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="left"><?= $value->keterangan ?></td>
              </tr>
              <?php
              // Add to totals
              $total_saldo_awal += $value->awal*$value->harga_satuan;
              $total_penerimaan += $value->masuk*$value->harga_satuan;
              $total_pengeluaran += $value->keluar*$value->harga_satuan;
              $total_saldo_akhir += $value->sisa*$value->harga_satuan;
          endforeach;
          ?>
      </tbody>

      <!-- Display totals in the footer -->
      <tfoot>
          <tr>
              <th class="center" colspan="5">Jumlah</th>
              <th class="right" colspan="2" style="mso-number-format:'@'"><?= number_format($total_saldo_awal, 0, ',', '.') ?></th>
              <th class="right" colspan="2" style="mso-number-format:'@'"><?= number_format($total_penerimaan, 0, ',', '.') ?></th>
              <th class="right" colspan="2" style="mso-number-format:'@'"><?= number_format($total_pengeluaran, 0, ',', '.') ?></th>
              <th class="right" colspan="2" style="mso-number-format:'@'"><?= number_format($total_saldo_akhir, 0, ',', '.') ?></th>
              <th></th>
          </tr>
      </tfoot>
  </table>

</body>