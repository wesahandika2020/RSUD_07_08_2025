<html>
<title><?= "Laporan Eklaim" ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">

<head>
  <style>
    @page {
      margin: 0cm 0cm;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
      margin-top: 1cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 2.6cm;
    }

    /** Define the header rules **/
    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 3cm;

      /** Extra personal styles **/
      /* background-color: #03a9f4; */
      color: white;
      padding: 10px 10px 0px 30px;
      /* text-align: center; */
      line-height: 0.2cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 2.5cm;

      /** Extra personal styles **/
      /* background-color: #03a9f4; */
      /* text-align: center; */
      /* padding: 0px 10px 10px 10px; */
      /* border-top: 1px solid #000; */
      line-height: 0.4cm;
      color: #f0f0f0;
    }

    .watermark {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.15;
      z-index: -1;
    }

    .pagenum:before {
      content: counter(page);
    }

    .main {
      font-size: 10pt;
      text-align: justify;
    }

    .bold {
      font-weight: bold;
    }

    .bg-tab {
      background-color: #e0e0e0;
    }

    .table-space td {
      padding: 3px;
    }

    .td-top>tbody>tr>td {
      vertical-align: top;
    }

    .inverted-image {
      filter: invert(10) brightness(0.8);
    }


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
</head>

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

  <table width="100%" style="border: 1px solid #000; border-collapse: collapse; font-size: 10pt;">
    <thead>
      <tr style="border: 1px solid #000; border-collapse: collapse;">
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="3%">No.</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="8%">Tanggal Masuk</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="8%">Tanggal Pulang</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="7%">No. RM</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="15%">Nama Pasien</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="12%">No. Klaim / SEP</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="8%">INACBG</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="9%">Top Up</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="9%">Total Tarif</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="9%">Tarif RS</th>
        <th style="border: 1px solid #000; border-collapse: collapse;" class="center" width="2%">Jenis</th>
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

        <tr style="border: 1px solid #000; border-collapse: collapse; font-size: 10pt;">
          <td style="border: 1px solid #000; border-collapse: collapse;" class="center"><?= $i + 1; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="center"><?= dateIndo($v->tgl_masuk); ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="center"><?= dateIndo($v->tgl_pulang); ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" style="text-align: center"><?= $v->nomor_rm ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="left"><?= $v->nama_pasien; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="left"><?= $v->nomor_sep; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="center"><?= !empty($v->cbg) ? $v->cbg : ""; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="right"><?= !empty($v->top_up) ? rupiah($v->top_up) : ""; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="right"><?= !empty($v->tarif_eklaim) ? rupiah($v->tarif_eklaim) : "0"; ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="right"><?= rupiah($v->billing_rs); ?></td>
          <td style="border: 1px solid #000; border-collapse: collapse;" class="center"><?= $v->rawat; ?></td>
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

</html>