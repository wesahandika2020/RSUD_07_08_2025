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
  "Waktu_tunggu_". $periode
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
  .align-top-center {
    vertical-align: top;
    text-align: center;
  }
  .align-center {
    vertical-align: center;
  }
</style>
<body>
  <h4 colspan="13">RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN PEMERIKSAAN / TINDAKAN POLIKLINIK <?= ($tempat_dilayani !== null) ?  $tempat_dilayani : '' ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>
  <table width="100%" border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Dokter</th>
        <th>Tindakan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $groupedData = [];
      $rowNumber = 1;

      foreach ($data as $value) {
        $dokter = $value->dokter;
        $tindakan = $value->tindakan;
        $jumlah = $value->jumlah_tindakan;

        if (!isset($groupedData[$dokter])) {
          $groupedData[$dokter] = [];
        }

        $groupedData[$dokter][] = ['tindakan' => $tindakan, 'jumlah' => $jumlah];
      }

      foreach ($groupedData as $dokter => $tindakanRows) {
        $rowspan = count($tindakanRows);
        ?>
        <tr>
          <td valign="baseline" rowspan="<?= $rowspan ?>" class="align-top-center"><?= $rowNumber++ ?></td>
          <td valign="baseline" rowspan="<?= $rowspan ?>" class="align-top-center"><?= $dokter ?></td>
          <?php
          foreach ($tindakanRows as $i => $tindakanRow) {
            $tindakan = $tindakanRow['tindakan'];
            $jumlah = $tindakanRow['jumlah'];
            if ($i > 0) {
              echo "<tr>";
            }
            ?>
            <td class="left"><?= $tindakan ?></td>
            <td class="center"><?= $jumlah ?></td>
            </tr>
            <?php
          }
        }
      ?>
    </tbody>
  </table>
</body>