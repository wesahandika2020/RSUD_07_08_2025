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
              <th class="center" rowspan="2">Satuan</th>
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
                  <td class="left"><?= isset($value->satuan) && $value->satuan !== '' ? $value->satuan : '' ?></td>
                  <td class="right"><?= number_format($value->harga_satuan, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->saldo_awal_unit, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->saldo_awal_rp, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->penerimaan_unit, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->penerimaan_rp, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->pengeluaran_unit, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->pengeluaran_rp, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->saldo_akhir_unit, 0, ',', '.') ?></td>
                  <td class="right"><?= number_format($value->saldo_akhir_rp, 0, ',', '.') ?></td>
                  <td class="left"><?= $value->keterangan ?></td>
              </tr>
              <?php
              // Add to totals
              $total_saldo_awal += $value->saldo_awal_rp;
              $total_penerimaan += $value->penerimaan_rp;
              $total_pengeluaran += $value->pengeluaran_rp;
              $total_saldo_akhir += $value->saldo_akhir_rp;
          endforeach;
          ?>
      </tbody>

      <!-- Display totals in the footer -->
      <tfoot>
          <tr>
              <th class="center" colspan="6">Jumlah</th>
              <th class="right"></th>
              <th class="right"><?= number_format($total_saldo_awal, 0, ',', '.') ?></th>
              <th class="right"></th>
              <th class="right"><?= number_format($total_penerimaan, 0, ',', '.') ?></th>
              <th class="right"></th>
              <th class="right"><?= number_format($total_pengeluaran, 0, ',', '.') ?></th>
              <th class="right"></th>
              <th class="right"><?= number_format($total_saldo_akhir, 0, ',', '.') ?></th>
              <th></th>
          </tr>
      </tfoot>
  </table>

</body>