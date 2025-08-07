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
      margin-top: 4cm;
      margin-left: 2cm;
      margin-right: 2cm;
      margin-bottom: 0.1cm;
      vertical-align: top;
      font-size: 10pt;
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
    <h4 style="margin: 10px;" align="center">REKAPITULASI OPERASI PASIEN DOKTER SPESIALIS<br>PERIODE BULAN <?= strtoupper($periode) ?></h4>
    <table style="font-size: 7pt; border-collapse: collapse;" width="100%" class="table-border">
      <thead style="background-color: #a9a9a9;">
        <tr style="top: 0;">
          <th width="3%" align="center" rowspan="2" class="center">NO.</th>
          <th width="10%" align="center" rowspan="2" class="center">DOKTER SPESIALIS</th>
          <th align="center" rowspan="2" class="center">NAMA DOKTER</th>
          <th align="center" colspan="2" class="center">JENIS OPERASI</th>
          <th width="5%" align="center" rowspan="2" class="center">JUMLAH PASIEN</th>
          <th align="center" colspan="5" class="center">SPESIFIKASI OPERASI</th>
          <th width="5%" align="center" rowspan="2" class="center">JUMLAH TINDAKAN</th>

        </tr>
        <tr>
          <th width="5%" align="center" class="center">ELEKTIF</th>
          <th width="5%" align="center" class="center">CITO</th>
          <th width="5%" align="center" class="center">TINDAKAN LAIN</th>
          <th width="5%" align="center" class="center">KECIL</th>
          <th width="5%" align="center" class="center">SEDANG</th>
          <th width="5%" align="center" class="center">BESAR</th>
          <th width="5%" align="center" class="center">KHUSUS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_saldo_awal = 0;
        $total_saldo_akhir = 0;
        foreach ($data as $i => $value) :
        ?>
          <tr>
            <td align="center"><?= $i + 1 ?></td>
            <td align="left"><?= $value->spesialisasi ?></td>
            <td align="left"><?= $value->list[0]->nama_dokter ?></td>
            <td align="center"><?= $value->list[0]->elektif ?></td>
            <td align="center"><?= $value->list[0]->cito ?></td>
            <td style="background-color: #dcdcdc;" align="center"><?= $value->list[0]->total_pasien ?></td>
            <td align="center"><?= $value->list[0]->tindakan_lain ?></td>
            <td align="center"><?= $value->list[0]->kecil ?></td>
            <td align="center"><?= $value->list[0]->sedang ?></td>
            <td align="center"><?= $value->list[0]->besar ?></td>
            <td align="center"><?= $value->list[0]->khusus ?></td>
            <td style="background-color: #dcdcdc;" align="center"><?= $value->list[0]->total_tindakan ?></td>
          </tr>

          <?php
          $sum_elektif = 0;
          $sum_cito = 0;
          $sum_total_pasien = 0;
          $sum_tindakan_lain = 0;
          $sum_kecil = 0;
          $sum_sedang = 0;
          $sum_besar = 0;
          $sum_khusus = 0;
          $sum_total_tindakan = 0;
          foreach ($value->list as $ind => $val) {
            $sum_elektif += (int) $val->elektif;
            $sum_cito += (int) $val->cito;
            $sum_total_pasien += (int) $val->total_pasien;
            $sum_tindakan_lain += (int) $val->tindakan_lain;
            $sum_kecil += (int) $val->kecil;
            $sum_sedang += (int) $val->sedang;
            $sum_besar += (int) $val->besar;
            $sum_khusus += (int) $val->khusus;
            $sum_total_tindakan += (int) $val->total_tindakan;
          } ?>

          <?php foreach ($value->list as $ind => $val) : if ($ind === 0) continue; ?>
            <tr>
              <td align="center"></td>
              <td align="left"></td>
              <td align="left"><?= $val->nama_dokter ?></td>
              <td align="center"><?= $val->elektif ?></td>
              <td align="center"><?= $val->cito ?></td>
              <td style="background-color: #dcdcdc;" align="center"><?= $val->total_pasien ?></td>
              <td align="center"><?= $val->tindakan_lain ?></td>
              <td align="center"><?= $val->kecil ?></td>
              <td align="center"><?= $val->sedang ?></td>
              <td align="center"><?= $val->besar ?></td>
              <td align="center"><?= $val->khusus ?></td>
              <td style="background-color: #dcdcdc;" align="center"><?= $val->total_tindakan ?></td>
            </tr>
          <?php endforeach; ?>

          <tr style="background-color: #a9a9a9;">
            <td colspan="3" align="right"><b>TOTAL SPM <?= strtoupper($value->list[0]->spesialisasi) ?></b></td>
            <td align="center"><b><?= number_format($sum_elektif, 0, ',', '.') ?></b></td>
            <td align="center"><b><?= number_format($sum_cito, 0, ',', '.') ?></b></td>
            <td align="center"><?= number_format($sum_total_pasien, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_tindakan_lain, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_kecil, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_sedang, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_besar, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_khusus, 0, ',', '.') ?><b></b></td>
            <td align="center"><?= number_format($sum_total_tindakan, 0, ',', '.') ?><b></b></td>
          </tr>

        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5" align="right"><b>GRAND TOTAL</b></td>
          <td style="background-color: #dcdcdc;" align="center"><?= number_format($sum->total_pasien, 0, ',', '.') ?><b></b></td>
          <td colspan="5" align="center"></td>
          <td style="background-color: #dcdcdc;" align="center"><?= number_format($sum->total_tindakan, 0, ',', '.') ?><b></b></td>
        </tr>
      </tfoot>
    </table>

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
        <td style="width: 40%;" align="center"><br><br><br></td>
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