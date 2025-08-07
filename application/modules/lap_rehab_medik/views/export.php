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
  "Rehab_Medik - " . $periode
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

  td {
    vertical-align: top;
  }
</style>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN REHAB MEDIK
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th style="background-color: #9cc8ff" class="center">No.</th>
        <th style="background-color: #9cc8ff" class="center">Nomor RM</th>
        <th style="background-color: #9cc8ff" class="left">Nama Pasien</th>
        <th style="background-color: #9cc8ff" class="center">Layanan</th>
        <th style="background-color: #9cc8ff" class="center">Diagnosa</th>
        <th style="background-color: #9cc8ff" class="center">Dokter/ Operator</th>
        <th style="background-color: #9cc8ff" class="center">Profesi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data as $val) : ?>
            <tr>
              <td class="center"><?= $i++ ?></td>
              <td class="center" style="mso-number-format:'@'"><?= $val->no_rm ?></td>
              <td class="left"><?= $val->nama ?></td>
              <td class="left"><?= $val->layanan ?></td>
              <td class="left"><?php echo implode('.<br>', array_map(function($diag) { return $diag->nama; }, $val->diagnosa)); ?></td>
              <td class="left"><?= $val->operator ?></td>
              <td class="center"><?= $val->profesi ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="6" class="right"><b>Total Data</b></td>
        <td class="center"><b><?= number_format($jumlah, 0, ',', '.') ?></b></td>
      </tr>
      <tr>
        <td colspan="6" class="right"><b>Total Pasien</b></td>
        <td class="center"><b><?= number_format($jumlah_total, 0, ',', '.') ?></b></td>
      </tr>
    </tfoot>
  </table>
</body>