<html>
<title><?= "Resum Medis Pasien" ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">

<head>
  <style>
    @page {
      margin: 0cm 0cm;
    }

    body {
      margin-top: 3.5cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 2.6cm;
      vertical-align: top;
    }

    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 3cm;
      color: white;
      padding: 10px 10px 0px 30px;
      line-height: 0.5cm;
    }

    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1.7cm;
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
      vertical-align: top;
      text-align: justify;
    }

    .table-border td {
      padding: 3px;
      border: 1px solid #000;
    }

    .table-border thead th {
      padding: 3px;
      border: 1px solid #000;
      font-weight: bold;
    }

    .table- td {
      border-collapse: collapse;
      padding: 3px;
      border: 1px solid #000;
    }

    .td-top>tbody>tr>td {
      vertical-align: top;
    }

    .inverted-image {
      filter: invert(10) brightness(0.8);
    }
  </style>
</head>

<?php

use Sabberworm\CSS\Value\Value;

function timeExplode($time = NULL)
{
  if ($time != NULL) {
    $time1 = explode(":", $time);
    $time2 = $time1[0] . ':' . $time1[1];
    return $time2;
  } else {
    return '-';
  }
}

function tanggal_indonesia($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function group_by($key, $data)
{
  $result = array();

  foreach ($data as $val) {
    if (array_key_exists($key, $val)) {
      $result[$val[$key]][] = $val;
    } else {
      $result[""][] = $val;
    }
  }

  return $result;
}

function replaceEnter($text)
{
  $text_rpl = trim($text, "~");
  $result = str_replace("~", "<br>", $text_rpl);
  return $result;
}

function cekUmurPasien($tanggal_lahir)
{
  $tgl1 = date_create($tanggal_lahir);
  $tgl2 = date_create(date('Y-m-d'));
  $sql = date_diff($tgl2, $tgl1);
  $hasil = $sql->format('%a');
  $hasil_sql = floor($hasil / 365);
  return $hasil_sql;
}
?>

<body>
  <div class="watermark" style="padding-left: 100px;">
    <img src="<?= resource_url() . 'images/logos/rsud-bg-mcu.jpg' ?>" width="130%" alt="Watermark">
  </div>

  <header style="font-family: Arial, sans-serif;">
    <table width="98%" style="color:#000; border-bottom: 2px solid #000;">
      <tr>
        <td rowspan="2" style="width:80px"><img src="<?= resource_url() . 'images/logos/kota-tangerang-bg-white.jpg' ?>" width="80px"></td>
        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;">PEMERINTAH KOTA TANGERANG<br>RUMAH SAKIT UMUM DAERAH<br>KOTA TANGERANG</br></td>
        <td rowspan="2" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="80px"></td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 9pt;">Jl. Pulau Putri Raya Perumahan Modernland Kelurahan Kelapa <br>Indah Kecamatan Tangerang Telp.: 021 2972 0201, 021 2972 0202 </td>
      </tr>
      <!-- <tr>
        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. 021 2972 0201, 021 2972 0202 </b></td>
      </tr> -->
    </table>
  </header>

  <footer style="font-family: Arial, sans-serif;">
    <table width="100%" style="color:#000; padding: 0px 10px 0px 10px;">
      <tr>
        <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>&nbsp;</b></td>
      </tr>
    </table>
    <img style="padding: 0pt;" src="<?= resource_url() . 'images/logos/6_generated.jpg' ?>" width="100%" height="60%" />
  </footer>

  <main style="page-break-after: auto;">
    <br>
    <table width="100%">
      <tr>
        <td colspan="2" style="width: 40%;"></td>
        <td style="width: 25%;"></td>
        <td class="left" style="width: 35%;">Ditjen Bina Upaya Kesehatan</td>
      </tr>
      <tr>
        <td colspan="2" style="width: 40%;"><b>KEGIATAN PEMBEDAHAN</b></td>
        <td></td>
        <td class="left">Kementrian Kesehatan RI</td>
      </tr>
      <tr>
        <td style="width: 5%;">Kode RS</td>
        <td colspan="3">: 36712085</td>
      </tr>
      <tr>
        <td style="width: 5%;">Nama RS</td>
        <td colspan="3">: <b>RSUD KOTA TANGERANG</b></td>
      </tr>
      <tr>
        <td style="width: 5%;">Bulan</td>
        <td colspan="3" style="text-transform: uppercase;">: <?= $periode ?></td>
      </tr>
    </table>

    <br>
    <table style="font-size: 10pt; border-collapse: collapse;" width="100%" class="table-border">
      <thead style="background-color: #a9a9a9;">
        <tr style="top: 0;">
          <th align="center" rowspan="2" widht="5%" class="center">NO.</th>
          <th align="center" rowspan="2" class="center">SPESIALISASI</th>
          <th align="center" colspan="2" class="center">TOTAL</th>
          <th align="center" rowspan="2" class="center">TOTAL PASIEN</th>
          <th align="center" rowspan="2" class="center">TOTAL TINDAKAN</th>
          <th align="center" rowspan="2" class="center">TINDAKAN LAIN</th>
          <th align="center" rowspan="2" class="center">KECIL</th>
          <th align="center" rowspan="2" class="center">SEDANG</th>
          <th align="center" rowspan="2" class="center">BESAR</th>
          <th align="center" rowspan="2" class="center">KHUSUS</th>
        </tr>
        <tr>
          <th align="center" class="center">ELEKTIF</th>
          <th align="center" class="center">CITO</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_saldo_awal = 0;
        $total_saldo_akhir = 0;
        foreach ($data as $i => $value) :
          // $total_saldo_awal += ($value->harga_satuan * $value->awal);
          // $total_saldo_akhir += ($value->harga_satuan * $value->sisa);
        ?>
          <tr>
            <td align="center"><?= $i + 1 ?></td>
            <td align="left"><?= $value->nama ?></td>
            <td align="center"><?= $value->elektif ?></td>
            <td align="center"><?= $value->cito ?></td>
            <td align="center"><?= $value->total_pasien ?></td>
            <td align="center"><?= $value->total_tindakan ?></td>
            <td align="center"><?= $value->tindakan_lain ?></td>
            <td align="center"><?= $value->kecil ?></td>
            <td align="center"><?= $value->sedang ?></td>
            <td align="center"><?= $value->besar ?></td>
            <td align="center"><?= $value->khusus ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot style="background-color: #dcdcdc;">
        <tr>
          <td colspan="2" align="center"><b>TOTAL</b></td>
          <td align="center"><b><?= number_format($sum->elektif, 0, ',', '.') ?></b></td>
          <td align="center"><b><?= number_format($sum->cito, 0, ',', '.') ?></b></td>
          <td align="center"><?= number_format($sum->total_pasien, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->total_tindakan, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->tindakan_lain, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->kecil, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->sedang, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->besar, 0, ',', '.') ?><b></b></td>
          <td align="center"><?= number_format($sum->khusus, 0, ',', '.') ?><b></b></td>
        </tr>
      </tfoot>
    </table>

    <br><br>
    <table width="100%">
      <tr>
        <td style="width: 40%;" align="center">Mengetahui ;</td>
        <td style="width: 30%;" align="center"></td>
        <td style="width: 40%;" align="center"></td>
      </tr>
      <tr>
        <td style="width: 40%;" align="center">Kepala Instalasi Bedah ( OK )</td>
        <td style="width: 30%;" align="center"></td>
        <td style="width: 40%;" align="center">Kepala Ruang Bedah ( OK )</td>
      </tr>
      <tr>
        <td style="width: 40%;" align="center"><br><br><br><br></td>
        <td style="width: 30%;" align="center"></td>
        <td style="width: 40%;" align="center"></td>
      </tr>
      <tr>
        <td style="width: 40%; font-style: bold; text-decoration:underline;" align="center">dr. Achmad Jana Maulana, Sp.BS</td>
        <td style="width: 30%;" align="center"></td>
        <td style="width: 40%; font-style: bold; text-decoration:underline;" align="center">NS. Asep Waluyo Priajaya, S.Kep</td>
      </tr>
      <tr>
        <td style="width: 40%;" align="center">NR. TKK : 52.001.11.14</td>
        <td style="width: 30%;" align="center"></td>
        <td style="width: 40%;" align="center">NR. TKK : 31.009.07.13</td>
      </tr>
    </table>

  </main>

</body>

</html>