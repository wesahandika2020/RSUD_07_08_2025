<title><?= $title_file_download ?></title>
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
  }

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
      page-break-after: always;
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
</style>
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
?>

<body>

  <!-- EKLAIM -->
  <div class="page">

    <!-- Hasil Radiologi -->
    <?php if (!empty($data_radiologi)) : ?>

      <div style="page-break-after: always;">
        <?php foreach ($data_radiologi as $data) : ?>
          <?php foreach ($data['radiologi']->detail as $i => $dataRadiologi) : ?>

            <!-- Content -->
            <?php if ($dataRadiologi->tipe === 'general') : ?>
              <div class="page_break">
                <table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #000;">
                  <tr>
                    <td rowspan="3" style="width:70px"><img src="<?= resource_url() ?>images/logos/<?= $data['hospital']->logo ?>" width="70px" height="70px"></td>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;"><?= strtoupper($data['hospital']->nama) ?></b></td>
                    <td rowspan="3" style="width:70px">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;"><?= strtoupper($data['hospital']->alamat) ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. <?= $data['hospital']->telp ?>, FAX. <?= $data['hospital']->fax ?> Email : <?= $data['hospital']->email ?></b></td>
                  </tr>
                </table>
                <br>
                <table width="100%" class="td-top">
                  <tr>
                    <td width="15%">No. RM</td>
                    <td width="1%">:</td>
                    <td width="34%" class="bold"><?= $data['pendaftaran']['pasien']->no_rm ?></td>
                    <td></td>
                    <td>No. Radiologi</td>
                    <td>:</td>
                    <td class="bold"><?= $data['radiologi']->kode ?></td>
                  </tr>
                  <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td class="bold"><?= $data['pendaftaran']['pasien']->nama ?></td>
                    <td></td>
                    <td>Tgl. Lahir/Umur</td>
                    <td>:</td>
                    <td class="bold"><?= datefmysql($data['pendaftaran']['pasien']->tanggal_lahir) ?> (<?= createUmur($data['pendaftaran']['pasien']->tanggal_lahir) ?> Tahun)</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td class="bold"><?= $data['pendaftaran']['pasien']->alamat ?></td>
                    <td></td>
                    <td>Kelamin</td>
                    <td>:</td>
                    <td class="bold"><?= (($data['pendaftaran']['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan')) ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Layanan</td>
                    <td>:</td>
                    <td class="bold"><?= $data['pendaftaran']['layanan']->jenis_layanan ?> <?= (($data['pendaftaran']['layanan']->jenis_layanan === 'Poliklinik' ? $data['pendaftaran']['layanan']->layanan : '')) ?></td>
                    <td></td>
                    <td>Dokter Pengirim</td>
                    <td>:</td>
                    <td class="bold"><?= $data['radiologi']->dokter ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Klinis</td>
                    <td>:</td>
                    <td class="bold">
                      <?php
                      if (!empty($data['diagnosa'])) {
                        echo '<ul style="padding-left:0; list-style-type:none; margin-bottom: 0;">';
                        foreach ($data['diagnosa'] as $key => $value) {
                          if ($value->item !== null && $value->item !== '') {
                            echo '<li>' . $value->item . '</li>';
                          }
                        }
                        echo '</ul>';
                      }
                      ?>
                    </td>
                    <td></td>
                    <td>Waktu Konfirmasi</td>
                    <td>:</td>
                    <td class="bold"><?= (($data['radiologi']->waktu_konfirm !== null) ? time_reformat($data['radiologi']->waktu_konfirm, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
                  </tr>
                  <tr>
                    <td>Rontgen</td>
                    <td>:</td>
                    <td class="bold"><?= $data['radiologi']->kode ?></td>
                    <td></td>
                    <td>Tanggal Permintaan</td>
                    <td>:</td>
                    <td class="bold"><?= (($data['radiologi']->waktu_order !== null) ? datetimefmysql($data['radiologi']->waktu_order) : '') ?></td>
                  </tr>
                  <tr>
                    <td>Pemeriksaan</td>
                    <td>:</td>
                    <td class="bold"><?= $dataRadiologi->layanan ?></td>
                    <td></td>
                    <td>Waktu Expertise</td>
                    <td>:</td>
                    <td class="bold"><?= (($data['radiologi']->waktu_hasil !== null) ? time_reformat($data['radiologi']->waktu_hasil, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
                  </tr>
                  <tr>
                    <td>Penjamin</td>
                    <td>:</td>
                    <td class="bold"><?= $data['pendaftaran']['layanan']->penjamin ?></td>
                  </tr>
                </table>
                <br><br>
                <!-- <br><br> -->

                <b style="font-weight:bold">HASIL PEMERIKSAAN : </b>
                <div><?= $dataRadiologi->hasil ?></div>
                <br><br>

                <b style="font-weight:bold">EXPERTISE PACS : </b>
                <?php $xPacs = (object)$data['pacs']; ?>
                <div><?= $xPacs->message ?></div>
                <br><br>

                <table width="100%">
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"></td>
                  </tr>
                  <tr>
                    <td>
                      <p align="left">
                        Dokter yang memeriksa :
                        <br><?= $dataRadiologi->dokter ?>
                        <br>NIP. <?= $dataRadiologi->nip_dokter ?>
                        <br>Hasil telah divalidasi dan dicetak otomatis oleh sistem dan tidak diperlukan tanda tangan
                      </p>
                    </td>
                    <td></td>
                  </tr>
                </table>
                <br><br>
              </div>

            <?php endif; ?>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </div>

    <?php endif ?>

  </div>
</body>