<?php

$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
  $param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} else if ($parameter['periode_laporan'] === 'Bulanan') {
  $param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} else if ($parameter['periode_laporan'] === 'Rentang Waktu') {
  $param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

$jenis_rawat = '';
if ($parameter['jenis_rawat'] == '1') {
  $jenis_rawat = 'Rawat Jalan';
} else if ($parameter['jenis_rawat'] == '2') {
  $jenis_rawat = 'Rawat Inap';
} else if ($parameter['jenis_rawat'] == '3') {
  $jenis_rawat = 'IGD';
} else if ($parameter['jenis_rawat'] == '4') {
  $jenis_rawat = 'Penunjang';
}

// $data["periode"] = "Periode : " . $periode;



header_excel(
  "Rekapulasi Data Pasien Masuk - " . $jenis_rawat . " ( " . $periode . " )"
);
header("Content-type: application/vnd-ms-excel");

header("Pragma: no-cache");

header("Expires: 0");

?>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
    <br><br> Rekapulasi Data Pasien Masuk - <b style="text-transform: uppercase;"><?= $jenis_rawat ?></b>
    <br> Tempat layanan - <b style="text-transform: uppercase;"><?= ($parameter["tempat_layanan_2"] == "" ? "SEMUA" : $parameter["tempat_layanan_2"]) ?></b>
    <br> Periode : <?= $periode ?>
    <br> Status kunjungan - <b style="text-transform: uppercase;"><?= ($parameter["kunjungan"] == "" ? "SEMUA" : $parameter["kunjungan"]) ?></b>
  </h4>

  <table width="100%" border="1">
    <thead border="2">
      <tr height="50pt">
        <th class="center">No.</th>
        <th class="center">No. RM</th>
        <th class="center">Kunjungan</th>
        <th class="left">Nama Pasien</th>
        <th class="left">Alamat</th>
        <th class="center">Kecamatan</th>
        <th class="center">Umur</th>
        <th class="center">JK</th>
        <th class="center">Penjamin</th>
        <th class="center">Ruangan</th>
        <th class="center">Kelas</th>
        <th class="center">Asal Kunjungan</th>
        <th class="left">Dokter DPJP</th>
        <th class="center">Jenis IGD</th>
        <th class="center">Waktu Masuk IGD</th>
        <th class="center">Waktu Masuk Rawat Inap</th>
        <th class="center">Rentang waktu</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $i => $value) : ?>
        <tr>
          <td align="center" style="vertical-align: top;"><?= ++$i ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->id_pasien ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->kunjungan ?></td>
          <td class="left" style="vertical-align: top;"><?= $value->nama_pasien ?></td>
          <td class="left" style="vertical-align: top;"><?= $value->alamat ?></td>
          <td style="vertical-align: top;"><?= $value->nama_kec ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->umur ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->kelamin ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->penjamin ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->ruangan ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->kelas ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->asal_kunjungan ?></td>
          <td class="left" style="vertical-align: top;"><?= $value->nama_dokter ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->jenis_igd ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->wakut_masuk_igd ? date('d/m/Y H:i:s', strtotime($value->wakut_masuk_igd)) : '-' ?></td>
          <td class="center" style="vertical-align: top;"><?= $value->wakut_masuk_ranap ? date('d/m/Y H:i:s', strtotime($value->wakut_masuk_ranap)) : '-' ?></td>
          <?php if($value->wakut_masuk_igd && $value->wakut_masuk_ranap) : ?>
          <?php
          $datetime1 = new DateTime($value->wakut_masuk_igd);
          $datetime2 = new DateTime($value->wakut_masuk_ranap);

          $interval = $datetime1->diff($datetime2);

          $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
          ?>
          <td class="center" style="vertical-align: top;"><?= $minutes ?> Menit</td>
        <?php else: ?>
          <td class="center" style="vertical-align: top;">-</td>
        <?php endif ?>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>