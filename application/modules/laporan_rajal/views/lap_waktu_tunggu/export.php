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
  .align-center {
    vertical-align: center;
  }
</style>
<body>
  <h4 colspan="14">RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN WAKTU TUNGGU
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%">
    <tr>
      <td colspan="7"><b>Tempat Layanan : <?= $tempat_dilayani ?></b></td>
      <td colspan="7">Yang Mencetak : <b><?= $this->session->userdata('account_group') ?></b></td>
      <td width="20%"></td>
    </tr>
  </table>
  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">No. RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">Tanggal Kunjungan</th>
        <th class="center">Tanggal Seleai</th>
        <th class="center">Waktu Tunggu</th>
        <th class="center">Jk</th>
        <th class="center">Umur</th>
        <th class="center">Alamat</th>
        <th class="center">Kunjungan</th>
        <th class="center">Asal Pasien</th>
        <th class="center">Penjamin</th>
        <th class="center">Dokter</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($data as $i => $value) :
      ?>
      <tr>
        <td valign="baseline" class="center"><?= ++$i ?></td>
        <td class="center"><?= $value->no_rm ?></td>
        <td class="left"><?= $value->nama ?></td>
        <td class="center"><?=(($value->tanggal_kunjungan !== null) ? datetime($value->tanggal_kunjungan) : '')?></td>
        <td class="center"><?=(($value->tanggal_selesai !== null) ? datetime($value->tanggal_selesai) : '')?></td>
        <td class="center"><?=(($value->waktu_tunggu !== null) ? ($value->waktu_tunggu) : '')?></td>
        <td class="center"><?= $value->kelamin ?></td>
        <td class="center"><?= $value->umur ?></td>
        <td class="left"><?= $value->alamat ?></td>
        <td class="center"><?= $value->kunjungan ?></td>
        <td class="center"><?= $value->asal_pasien ?> (<?= $value->unit_pelayanan ?>)</td>
        <td class="center"><?= $value->penjamin ?></td>
        <td class="left"><?= $value->nama_dokter ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <?php
      // Menghitung rata-rata waktu dalam detik

      // Menghitung komponen hari, jam, menit, dan detik
      $days = floor($rata_waktu / (24 * 60 * 60));
      $remainingSeconds = $rata_waktu % (24 * 60 * 60);
      $hours = floor($remainingSeconds / (60 * 60));
      $remainingSeconds %= (60 * 60);
      $minutes = floor($remainingSeconds / 60);
      $seconds = $remainingSeconds % 60;

      // Format durasi rata-rata waktu
      $rataWaktuFormatted = sprintf("%d hari %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
      ?>

      <tr>
          <td colspan="13" class="left"><b>RATA-RATA WAKTU TUNGGU: <?= $rataWaktuFormatted; ?></b></td>
      </tr>
      <tr>
          <td colspan="13" class="left"><b>WAKTU TUNGGU KURANG DARI 60 MENIT : <?= $total_waktu_kurang ?>  / <?= $total_data ?> x 100% = <?= $waktu_kurang; ?>%</b></td>
      </tr>
      <tr>
        <td colspan="13" class="right no__border">
          <p>Tgl Cetak : <?= date('d/m/Y'); ?> Jam <?= date('H:i'); ?>
            <br>
            Yang Mencetak,
          </p>
          <br>
          <p><b><?= $this->session->userdata('account_group') ?></b></p>
        </td>
      </tr>
  </tfoot> 
  </table>
</body>