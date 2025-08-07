<?php

header_excel(
  "Rekap_klaim " . $parameter["tanggal_awal"] . " s/d " . $parameter["tanggal_akhir"]
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
  <?php
  function getCaraPulang()
  {
    $dataArray = [
      '1' => 'Atas Persetujuan Dokter',
      '2' => 'Dirujuk',
      '3' => 'Atas Permintaan Sendiri',
      '4' => 'Meninggal',
      '5' => 'Lain-lain'
    ];

    return $dataArray;
  }

  function dateIndo($tanggal)
  {
    // Daftar nama bulan dalam bahasa Indonesia
    $bulanIndo = [
      "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
      "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
    ];

    $tanggalArray = explode("-", $tanggal);

    if (count($tanggalArray) !== 3) {
      return "Format tanggal tidak valid";
    }

    list($tahun, $bulan, $hari) = $tanggalArray;

    $namaBulan = $bulanIndo[(int)$bulan - 1];

    return "$hari $namaBulan $tahun";
  }


  $jenisRawat = "Pasien Rawat Inap dan Rawat Jalan";
  if ($parameter["jenis_rawat"] == '2') {
    $jenisRawat = "Pasien Rawat Inap";
  } else if ($parameter["jenis_rawat"] == '1') {
    $jenisRawat = "Pasien Rawat Jalan";
  }

  if ($parameter["periode"] == "tgl_pulang") {
    $periodeLap = "Periode Tanggal Pulang: " . $parameter["tanggal_awal"] . " s/d " . $parameter["tanggal_akhir"];
  } else {
    $periodeLap = "Periode Tanggal Masuk: " . $parameter["tanggal_awal"] . " s/d " . $parameter["tanggal_akhir"];
  }

  $kelasRawat = "Kelas Rawat = Semua / ";
  if ($parameter["kelas_rawat"] == "1") {
    $kelasRawat = "Kelas Rawat = Kelas 1 / ";
  } else if ($parameter["kelas_rawat"] == "2") {
    $kelasRawat = "Kelas Rawat = Kelas 2 / ";
  } else if ($parameter["kelas_rawat"] == "3") {
    $kelasRawat = "Kelas Rawat = Kelas 3 / ";
  }

  $caraPulang = "Cara Pulang = Semua / ";
  if (!empty($parameter["cara_pulang"])) {
    $dataArray = getCaraPulang();
    $caraPulang = isset($dataArray[$parameter["cara_pulang"]])
      ? "Cara Pulang = " . $dataArray[$parameter["cara_pulang"]] . " / "
      : "Cara Pulang = Tidak Diketahui / ";
  }

  $jenisTarif = "Jenis Tarif = TARIF RS KELAS C PEMERINTAH";

  ?>


  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h3 style="text-transform: uppercase;">LAPORAN REKAP KLAIM - RSUD KOTA TANGERANG</h3>
    <p><?= $jenisRawat . ', ' . $periodeLap ?>
      <br> <?= $kelasRawat . $caraPulang . $jenisTarif ?>
    </p>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Tanggal Masuk</th>
        <th class="center">Tanggal Pulang</th>
        <th class="center">No. RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">No. Klaim / SEP</th>
        <th class="center">INACBG</th>
        <th class="center">Top Up</th>
        <th class="center">Total Tarif</th>
        <th class="center">Tarif RS</th>
        <th class="center">Jenis</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $i => $v) :

        // Menentukan petugasGrouper
        if (!empty($v->nama_petugas)) {
          $petugasGrouper = "<small>" . ucwords($v->nama_petugas) . "</small><br>
                                    <small>" . $v->tgl_kirim . "</small>";
        } else {
          $petugasGrouper = "-";
        }


      ?>

        <tr>
          <td class="center"><?= $i + 1; ?></td>
          <td class="center"><?= dateIndo($v->tgl_masuk); ?></td>
          <td class="center"><?= dateIndo($v->tgl_pulang); ?></td>
          <td style="text-align: center" style="mso-number-format:'@'"><?= $v->nomor_rm ?></td>
          <td class="left"><?= $v->nama_pasien; ?></td>
          <td class="left"><?= $v->nomor_sep; ?></td>
          <td class="center"><?= !empty($v->cbg) ? $v->cbg : ""; ?></td>
          <td class="right"><?= !empty($v->top_up) ? rupiah($v->top_up) : ""; ?></td>
          <td class="right" style="mso-number-format:'@'"><?= !empty($v->tarif_eklaim) ? rupiah($v->tarif_eklaim) : "0"; ?></td>
          <td class="right" style="mso-number-format:'@'"><?= rupiah($v->billing_rs); ?></td>
          <td class="center"><?= $v->rawat; ?></td>
        </tr>
      <?php endforeach; ?>

    </tbody>
    <!-- <tfoot>
      <tr>
        <td colspan="10" class="right"><b>Total</b></td>
        <?php $total_tagihan = 0; ?>
        <?php foreach ($data as $v) : ?>
          <?php $total_tagihan += $v->total_billing; ?>
        <?php endforeach ?>
        <td class="left"><?= "Rp. " . number_format($total_tagihan, 0, ",", ".") ?></td>
      </tr>
    </tfoot> -->
  </table>
</body>