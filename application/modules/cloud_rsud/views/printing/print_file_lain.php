<title><?= $pendaftaran['pasien']->no_sep ?> - <?= $pendaftaran['pasien']->nama . " (" .  $data->nama_kategori . ")" ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
<style>
  body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
  }

  * {
    font: 9pt verdana;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  /* 
  .page {
    width: 21cm;
    min-height: 19.8cm;
    padding-top: 0.5cm;
    padding-left: 1cm;
    padding-right: 1cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  } */

  .page-img {
    width: 21cm;
    min-height: 19.8cm;
    /* padding-top: 0.5cm; */
    /* padding-left: 1cm; */
    /* padding-right: 1cm; */
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  .subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
  }

  @page {
    margin-top: 0.9cm;
    margin-bottom: 0.5cm;
    margin-left: 0;
    margin-right: 0;
  }

  @page: first {
    margin-top: 0;
    margin-bottom: 0.5cm;
    margin-left: 0;
    margin-right: 0;
  }

  @media print {
    .page {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: avoid;
    }

    .page-img {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      /* page-break-after: always; */
    }
  }

  h1 {
    font-size: 20px;
    margin-bottom: 0;
  }

  h2 {
    font-size: 18px;
    margin-bottom: 0;
  }

  h3 {
    font-size: 16px;
    margin-bottom: 0;
  }

  .tabel-laporan {
    empty-cells: show;
    border-radius: 5px;
    border-spacing: 0;
    margin-top: 5px;
    clear: both;
    border-collapse: collapse;
    background: #fff;
    color: #000
  }

  .tabel-laporan tr th {
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
  }

  .tabel-laporan .number {
    text-align: center;
  }

  .tabel-laporan th rowspan,
  td rowspan {
    vertical-align: middle;
  }

  .subtotal {
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
  }

  .topborder {
    border-top: 1px solid #000;
  }

  .bottomborder {
    border-bottom: 1px solid #000;
  }

  .total {
    border-top: 1px solid #000;
    vertical-align: middle;
  }

  .left {
    text-align: left;
  }

  .right {
    text-align: right !important;
  }

  .center {
    text-align: center !important;
  }

  .v-center {
    vertical-align: middle !important;
  }

  .v-top {
    vertical-align: top !important;
  }

  .bold {
    font-weight: bold;
  }

  .wrapper {
    white-space: nowrap;
  }

  .border-rahasia {
    border-top: 2px solid #000;
    border-bottom: 2px solid #000;
    border-left: 2px solid #000;
    border-right: 2px solid #000;
  }

  .no__border {
    border: none;
  }


  .list-data {
    border-left: 1px solid #000;
    border-top: 1px solid #000;
    border-spacing: 0;
  }

  .list-data th,
  .list-data td {
    border-right: 1px solid #000;
    border-bottom: 1px solid #000;
    height: 20px;
  }

  .list-data tr {
    vertical-align: text-top;
  }

  .td-top>tbody>tr>td {
    vertical-align: top;
  }

  .bold {
    font-weight: bold;
  }

  .th-row-green-dark {
    background-color: #3C9A30;
    -webkit-print-color-adjust: exact;
  }

  .th-row-green-soft {
    background-color: #A1E1A4;
    -webkit-print-color-adjust: exact;
  }

  .italic {
    font-style: italic;
  }

  .page_break {
    page-break-after: always;
  }

  .no-page-break-after {
    page-break-after: avoid;
  }
</style>
<script>
  function cetak() {
    // setTimeout(() => {
    // 	window.close()
    // }, 300)
    window.print();
    // simpanWatuCetak();
  }
</script>

<?php

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

?>

<body onload="cetak()">

  <!-- EKLAIM -->
  <?php if (!empty($data)) : ?>

    <?php foreach ($data->image_paths as $val) :
      $url = str_replace('http://192.168.77.101/', 'https://cloudrsud.tangerangkota.go.id/', $val);
    ?>
      <div class="page-img">

        <div style="display: flex; justify-content: center;">
          <img style="width: 85%; height: auto; max-height: auto;" src="<?= $url ?>">
        </div>

      </div>
    <?php endforeach ?>

  <?php endif ?>
</body>