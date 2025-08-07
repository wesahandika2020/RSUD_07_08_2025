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
    body {
      -webkit-print-color-adjust: exact;
      /* Untuk browser berbasis WebKit seperti Chrome */

    }

    b {
      font-weight: bold;
    }

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

  .table-asuhan-hd table,
  tr,
  td,
  span {
    font-size: 9.3px;
    padding-bottom: 0px;
    padding-top: 0px;
    margin: 0px;
  }

  .laporan-dietetik {
    font-size: 10pt;
  }

  .judul {
    text-align: center;
    background-color: #d3d3d3;
    font-weight: bold;
    font-size: 10pt;
    padding: 5px 0px 5px 0px;
  }

  .subjudul {
    text-align: center;
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

  // Mengganti semua ~ yang tersisa dengan <br>
  $result = str_replace("~", "<br>", $text_rpl);

  return $result;
}
?>

<body onload="cetak()">

  <!-- SEP -->
  <?php if (!empty($data_sep)) : ?>

    <div class="page">
      <div style="all: unset;">
        <table width="100%">
          <tr>
            <td width="30%" valign="top"><img src="<?= resource_url() ?>images/logos/logo-bpjs.png" alt="Logo BPJS" height="30px"></td>
            <td width="40%" align="center">
              <b style="font-weight: bold; font-size: 14px">SURAT ELEGIBILITAS PESERTA</b><br>
              <b style="font-weight: bold; font-size: 12px"><?= strtoupper($data_sep['hospital']->nama) ?></b>
            </td>
            <td width="30%" valign="top" style="float: right"></td>
          </tr>
        </table>
        <br>
        <!-- Coba -->
        <div class="row">
          <table width="100%">
            <tr>
              <td width="60%">
                <table width="100%">
                  <tr>
                    <td style="vertical-align: top;" width="38%">No. SEP</td>
                    <td style="vertical-align: top;" width="2%">:</td>
                    <td style="vertical-align: top;" width="60%"><?= $data_sep['sep']->noSep ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Tgl. SEP</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->tglSep ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">No. Kartu</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->peserta->noKartu . "&emsp; ( MR. " . $data_sep['sep']->peserta->noMr . " )" ?> </td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Nama Peserta</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= strtoupper($data_sep['sep']->peserta->nama) ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Tgl. Lahir</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->peserta->tglLahir . "&emsp; Kelamin : " . ($data_sep['sep']->peserta->kelamin == 'L' ? 'Laki-Laki' : 'Perempuan') ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">No. Telp</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= ($data_sep['pasien'] != null ? $data_sep['pasien']->telp : '') ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Sub/Spesialis</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->poli ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Dokter</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->dpjp->nmDPJP ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Diagnosa Awal</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->diagnosa ?></td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Catatan</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;" rowspan="2" valign="top">&nbsp;<?= $data_sep['sep']->catatan ?></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;"></td>
                    <td style="vertical-align: top;"></td>
                  </tr>
                </table>
              </td>
              <td style="vertical-align: top;" width="40%">
                <table width="100%">
                  <?php if ($data_sep['sep']->katarak === '1') { ?>
                    <tr>
                      <td style="vertical-align: top;" width="38%">*PASIEN OPERASI KATARAK</td>
                      <td style="vertical-align: top;" width="2%">&emsp;</td>
                      <td style="vertical-align: top;" width="60%">&emsp;</td>
                    </tr>
                  <?php } else { ?>

                    <tr>
                      <td style="vertical-align: top;" width="38%">&emsp;</td>
                      <td style="vertical-align: top;" width="2%">&emsp;</td>
                      <td style="vertical-align: top;" width="60%">&emsp;</td>
                    </tr>

                  <?php } ?>

                  <tr>
                    <td style="vertical-align: top;" width="38%">Peserta</td>
                    <td style="vertical-align: top;" width="2%">:</td>
                    <td style="vertical-align: top;" width="60%"><?= $data_sep['sep']->peserta->jnsPeserta ?></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">&emsp;</td>
                    <td style="vertical-align: top;">&emsp;</td>
                    <td style="vertical-align: top;">&emsp;</td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Jns. Rawat</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->jnsPelayanan ?></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Jns. Kunjungan</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;">
                      <ul style="margin:0%" class="custom-list">
                        <?= $data_sep['sep']->tujuanKunj->nama !== "" ? "<li>" . $data_sep['sep']->tujuanKunj->nama . "</li>" : "" ?>
                        <?= $data_sep['sep']->flagProcedure->nama !== "" ? "<li>" . $data_sep['sep']->flagProcedure->nama . "</li>" : "" ?>
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Kls. Hak</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->peserta->hakKelas; ?></td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Kls. Rawat</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;">
                      <?php if ($data_sep['sep']->jnsPelayanan !== 'Rawat Jalan') {
                        echo $data_sep['sep']->kelasRawat;
                      } else {
                        echo "-";
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;">Penjamin Lain</td>
                    <td style="vertical-align: top;">:</td>
                    <td style="vertical-align: top;"><?= $data_sep['sep']->penjamin ?></td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- <div class="col-md-7">
            </div> -->
            <!-- <div class="col-md-5">
            </div> -->
        </div>
        <!-- End -->
        <br>
        <div class="row">
          <table width="100%">
            <tr>
              <td width="76%">
                <table width="100%" border="0">
                  <tr>
                    <td width="100%">
                      <span style="font-size:8px;">*Saya menyetujui BPJS Kesehatan untuk :</span>
                      <ol style="font-size:8px; padding: 0; margin: 0 0 0 10px" type="a">
                        <li style="font-size:8px;">membuka dan atau menggunakan informasi medis Pasien untuk keperluan administrasi, pembayaran asuransi atau
                          jaminan pembiayaan kesehatan</li>
                        <li style="font-size:8px;">memberikan akses informasi medis atau riwayat pelayanan kepada dokter/tenaga medis pada RSUD KOTA TANGERANG
                          untuk kepentingan pemeliharaan kesehatan, pengobatan, penyembuhan, dan perawatan Pasien</li>
                      </ol>

                      <span style="font-size:8px;">*Saya mengetahui dan memahami :</span>
                      <ol style="font-size:8px; padding: 0; margin: 0 0 0 10px" type="a">
                        <li style="font-size:8px;">Rumah Sakit dapat melakukan koordinasi dengan PT Jasa Raharja / PT Taspen / PT ASABRI / BPJS Ketenagakerjaan atau
                          Penjamin lainnya, jika Peserta merupakan pasien yang mengalami kecelakaan lalulintas dan / atau kecelakaan kerja</li>
                        <li style="font-size:8px;">SEP bukan sebagai bukti penjaminan peserta</li>
                      </ol>

                      <span style="font-size:8px;">** Dengan tampilnya luaran SEP elektronik ini merupakan hasil validasi terhadap eligibilitas Pasien secara elektronik
                        <br>&emsp;(validasi finger print atau biometrik / sistem validasi lain)
                        <br>&emsp;dan selanjutnya Pasien dapat mengakses pelayanan kesehatan rujukan sesuai ketentuan berlaku.
                        <br>&emsp;Kebenaran dan keaslian atas informasi data Pasien menjadi tanggung jawab penuh FKRTL.
                      </span>

                    </td>
                  </tr>
                </table>
              </td>
              <td width="30%">
                <span width="100%" style="display: flex;justify-content: center;font-size: 12;">

                  <?php $text_barcode = $data_sep['sep']->peserta->noKartu ?>
                  <div row>
                    <div style='display: flex; flex-direction: column;'>
                      <span>Persetujuan</span>
                      <span>Pasien/Keluarga Pasien</span>
                    </div>
                    <div style='display: flex; flex-direction: column;'>
                      <img width="70px" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                      <?= strtoupper($data_sep['sep']->peserta->nama) ?>
                    </div>
                  </div>

                </span>

                <div style="margin-top: 1rem; font-size: 9px; text-align: right">
                  Cetakan ke : <?php date_default_timezone_set('Asia/Jakarta');
                                echo (isset($sep_history->cetakan) ? ($sep_history->cetakan + 1) : 1); ?> ( <?= date("d/m/Y H:i") ?> )
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  <?php endif ?>
  <!-- END SEP -->

  <!-- EKLAIM -->
  <?php if (!empty($data_eklaim)) : ?>
    <div class="page-img">
      <?php foreach ($data_eklaim->image_paths as $val) :
        $url = str_replace('http://192.168.77.101/', 'https://cloudrsud.tangerangkota.go.id/', $val);
      ?>
        <div style="padding:0%">
          <img style="width: 100%; height: 100%; max-height: 100%;" src="<?= $url ?>">
        </div>
        <br><br>

      <?php endforeach ?>
    </div>
  <?php endif ?>

  <div class="page">















 












 
    















    <!-- Resume Medis Rajal -->
    <!-- <!?php if (!empty($data_resume['data'])) : ?> -->
    <?php if (!empty($data_resume) && !empty($data_resume['data']['anamnesa'])) : ?>
      <div style="page-break-after: always;">
        <div style="all: unset;">
          <!--=============== HEADER ===============-->
          <header>
            <div>
              <table>
                <tr>
                  <td>
                    <div style="margin-left: 15px;">
                      <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="85px">
                      <p class="address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                        Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
                    </div>
                  </td>
                  <td>
                    <div class="border-rahasia" style="margin-left: 250px; padding:10pt;">
                      <h1 style="font-weight: bold; margin-top: 0px;">RAHASIA</h1>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </header>

          <!--=============== MAIN ===============-->
          <main class="main">
            <section class="resume__medis">
              <br>
              <div class="resume__medis__container container">
                <table border="1" style="border-collapse: collapse; width: 100%;" class="small__font">

                  <tbody>
                    <tr>
                      <td align="center" colspan="3">
                        <h3 style="font-weight: bold;">RESUME MEDIS</h3>
                      </td>
                      <td colspan="3">
                        NRM : <b style="font-weight: bold;">
                          <?= $data_resume['data']['pasien']->no_rm ?? ''; ?>
                        </b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        Nama Pasien : <b style="font-weight: bold;">
                          <?= $data_resume['data']['pasien']->nama_pasien ?? ''; ?>
                        </b>
                      </td>
                      <td colspan="2">
                        Tanggal Lahir : <b style="font-weight: bold;">
                          <?= isset($data_resume['data']['pasien']->tanggal_lahir) ? datefmysql($data_resume['data']['pasien']->tanggal_lahir) : ''; ?>
                        </b>
                      </td>
                      <td>
                        Umur : <b style="font-weight: bold;">
                          <?= isset($data_resume['data']['pasien']->tanggal_lahir) ? createUmur2($data_resume['data']['pasien']->tanggal_lahir) : ''; ?>
                        </b>
                      </td>
                      <td>
                        Jenis Kelamin : <b style="font-weight: bold;">
                          <?= $data_resume['data']['pasien']->kelamin ?? ''; ?>
                        </b>
                      </td>
                    </tr>
                    <tr>
                      <td width="18%" colspan="2">
                        Tanggal Masuk : <b style="font-weight: bold;">
                          <?= isset($data_resume['data']['pasien']->tanggal_daftar) ? datetimefmysql($data_resume['data']['pasien']->tanggal_daftar) : ''; ?>
                        </b>
                      </td>
                      <td width="43%" colspan="2">
                        Tanggal Keluar / Meninggal : <b style="font-weight: bold;">
                          <?= isset($data_resume['data']['pasien']->tanggal_keluar) ? datetimefmysql($data_resume['data']['pasien']->tanggal_keluar) : ''; ?>
                        </b>
                      </td>
                      <td width="39%" colspan="2">
                        Ruang Rawat Terakhir : <b style="font-weight: bold;">
                          <?= $data_resume['data']['pasien']->ruang_asal ?? ''; ?>
                          <?= $data_resume['data']['intensive_care']->nama_bangsal ?? ''; ?>
                          <?= (isset($data_resume['data']['pasien']->jenis_layanan) && $data_resume['data']['pasien']->jenis_layanan == 'IGD') ? 'IGD' : ''; ?>
                        </b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="6">
                        Tanggung Jawab Pembayaran : <b style="font-weight: bold;">
                          <?= $data_resume['data']['pasien']->penjamin ?? ''; ?>
                        </b>
                      </td>
                    </tr>
                  </tbody>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">1. Ringkasan Riwayat Penyakit</b></td>
                      <td style="vertical-align: top;" class="no__border">
                        <?= isset($data_resume['data']['pasien']->jenis_pendaftaran) && $data_resume['data']['pasien']->jenis_pendaftaran !== 'IGD' ? '' : ':'; ?>
                      </td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <?php if (!empty($data_resume['data']['anamnesa']->s_soap)) : ?>
                          <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->s_soap; ?></b>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php if (!empty($data_resume['data']['anamnesa'])) : ?>
                      <?php if (!empty($data_resume['data']['anamnesa']->keluhan_utama)) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border">&ensp;&nbsp;Keluhan Utama</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b><?= $data_resume['data']['anamnesa']->keluhan_utama; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($data_resume['data']['anamnesa']->riwayat_penyakit_sekarang)) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border">&ensp;&nbsp;Riwayat Penyakit Sekarang</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b><?= $data_resume['data']['anamnesa']->riwayat_penyakit_sekarang; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($data_resume['data']['anamnesa']->riwayat_penyakit_dahulu)) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border">&ensp;&nbsp;Riwayat Penyakit Dahulu</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b><?= $data_resume['data']['anamnesa']->riwayat_penyakit_dahulu; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($data_resume['data']['anamnesa']->riwayat_penyakit_keluarga)) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border">&ensp;&nbsp;Riwayat Penyakit Keluarga</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b><?= $data_resume['data']['anamnesa']->riwayat_penyakit_keluarga; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if (!empty($data_resume['data']['anamnesa']->anamnesa_sosial)) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border">&ensp;&nbsp;Anamnesa Sosial</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b><?= $data_resume['data']['anamnesa']->anamnesa_sosial; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endif; ?>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">2. Pemeriksaan Fisik</b></td>
                      <td style="vertical-align: top;" class="no__border">
                        <?= $data_resume['data']['pasien']->jenis_pendaftaran === 'IGD' ? ':' : ''; ?>
                      </td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <?php if (!empty($data_resume['data']['anamnesa'])) : ?>
                          <?php if (!empty($data_resume['data']['anamnesa']->o_soap)) : ?>
                            <b><?= $data_resume['data']['anamnesa']->o_soap ?><br></b>
                          <?php endif; ?>
                          <?php if (!empty($data_resume['data']['anamnesa']->a_soap)) : ?>
                            <b><?= $data_resume['data']['anamnesa']->a_soap ?><br></b>
                          <?php endif; ?>
                          <?php if (!empty($data_resume['data']['anamnesa']->p_soap)) : ?>
                            <b><?= $data_resume['data']['anamnesa']->p_soap ?></b>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php if ($data_resume['data']['anamnesa'] !== NULL) : ?>
                      <?php if ($data_resume['data']['anamnesa']->keadaan_umum !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Keadaan Umum</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->keadaan_umum; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->kesadaran !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kesadaran</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->kesadaran; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->gcs !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;GCS</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->gcs; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->sistolik !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Sistolik</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->sistolik . ' mmHg'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->diastolik !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Diastolik</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->diastolik . ' mmHg'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->suhu !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Suhu</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->suhu . '℃'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->nadi !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Nadi</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->nadi . '/Mnt'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->rr !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Respirasi Rate</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->rr . '/Mnt'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->tinggi_badan !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tinggi Badan</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->tinggi_badan . ' cm'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->berat_badan !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Berat Badan</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->berat_badan . ' Kg'; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->kepala !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kepala</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->kepala; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->leher !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Leher</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->leher; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->thorax !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Thorax</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->thorax; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->pulmo !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Pulmo</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->pulmo; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->cor !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;COR</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->cor; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->abdomen !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Abdomen</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->abdomen; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->genitalia !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Genitalia</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->genitalia; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->ekstrimitas !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Ekstrimitas</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->ekstrimitas; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->prognosis !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Prognosis</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->prognosis; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->status_mentalis !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Mentalis</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->status_mentalis; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->lingkar_kepala !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Lingkar Kepala</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->lingkar_kepala; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->status_gizi !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Gizi</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->status_gizi; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->telinga !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Telinga</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->telinga; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->hidung !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Hidung</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->hidung; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->mata !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Mata</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->mata; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->tenggorok !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tenggorok</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->tenggorok; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                      <?php if ($data_resume['data']['anamnesa']->kulit_kelamin !== NULL) : ?>
                        <tr>
                          <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kulit Kelamin</td>
                          <td style="vertical-align: top;" class="no__border">:</td>
                          <td style="vertical-align: top;" colspan="4" class="no__border">
                            <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa']->kulit_kelamin; ?></b>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endif; ?>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">3. Pemeriksaan Penunjang</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <?php if (!empty($data_resume['data']['tindakan_lab'])) : ?>
                          <b><?= $data_resume['data']['tindakan_lab'] ?><br></b>
                        <?php endif; ?>
                        
                        <?php if (!empty($data_resume['data']['tindakan_rad'])) : ?>
                          <b><?= $data_resume['data']['tindakan_rad'] ?><br></b>
                        <?php endif; ?>
                        
                        <?php if (!empty($data_resume['data']['anamnesa']->pemeriksaan_penunjang)) : ?>
                          <b><?= nl2br($data_resume['data']['anamnesa']->pemeriksaan_penunjang) ?></b>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">4. Tindakan / Prosedur</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['tindakan_ok'] == NULL ? '' : $data_resume['data']['tindakan_ok'] . '<br>'; ?></b>
                        <b style="font-weight: bold;"><?= $data_resume['data']['tindakan'] == NULL ? '' : $data_resume['data']['tindakan']; ?></b>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">5. Diagnosis Utama</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['diagnosa_utama']; ?></b>
                        <b style="font-weight: bold;"><?= $data_resume['data']['diagnosa_manual_utama']; ?></b>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" width='30%' class="no__border"><b style="font-weight: bold;">6. Diagnosis Sekunder</b></td>
                      <td style="vertical-align: top;" width='1%' class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['diagnosa_sekunder']; ?></b>
                        <b style="font-weight: bold;"><?= $data_resume['data']['diagnosa_manual_sekunder']; ?></b>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">7. Pengobatan</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['pengobatan']; ?></b>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">8. Anjuran/Usul Tindakan Lanjut (<em>Follow Up</em>)</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['anamnesa'] == NULL ? '-' : $data_resume['data']['anamnesa']->usul_tindak_lanjut; ?></b>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;" class="no__border"><b style="font-weight: bold;">9. Kondisi Waktu Keluar</b></td>
                      <td style="vertical-align: top;" class="no__border">:</td>
                      <td style="vertical-align: top;" colspan="4" class="no__border">
                        <b style="font-weight: bold;"><?= $data_resume['data']['pasien']->tindak_lanjut == NULL ? '-' : $data_resume['data']['pasien']->tindak_lanjut; ?></b>
                        <br>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr align="center">
                      <td width="20%" class="no__border" colspan="4"></td>
                      <td class="no__border" colspan="2">
                        <div style="flex-direction: column;">
                          <div>
                            Tanggal: <b style="font-weight: bold;"><?= $data_resume['data']['pasien']->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($data_resume['data']['pasien']->tanggal_keluar))); ?></b>
                          </div>
                          <div>
                            Jam: <b style="font-weight: bold;"><?= $data_resume['data']['pasien']->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($data_resume['data']['pasien']->tanggal_keluar)); ?></b>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr align="center">
                      <td class="no__border" colspan="4"></td>
                      <td class="no__border" colspan="2">Dokter Penanggung Jawab Pelayanan
                        <?php if (!$data_resume['data']['pasien']->tanda_tangan) : ?>
                          <br><br><br><br><br><br><br><br>
                        <?php endif ?>
                        <?php if ($data_resume['data']['pasien']->tanda_tangan) : ?>
                          <img src="<?= resource_url() . 'images/ttd_dokter/' . $data_resume['data']['pasien']->tanda_tangan ?>" alt="ttd-dokter" width="300">
                        <?php endif ?>
                      </td>
                    </tr>
                    <tr align="center">
                      <td class="no__border" colspan="4"></td>
                      <td class="no__border" colspan="2">(<b style="font-weight: bold;"><?= $data_resume['data']['pasien']->dokter_dpjp ?> </b>)</td>
                    </tr>
                    <tr>
                      <td colspan="6">
                        Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
                        UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)

                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </section>
          </main>
        </div>
      </div>
      <br><br>
    <?php endif ?>
    











































    <!-- Resume Ranap -->
    <?php if (!empty($data_resume_ranap)) : ?>

      <div style="page-break-after: always;">
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
          <div>
            <table style="border: none;">
              <tr>
                <td style="border: none;">
                  <div style="margin-left: 15px;">
                    <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="85px">
                    <p class="address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                      Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
                  </div>
                </td>
                <td>
                  <div class="border-rahasia" style="margin-left: 250px; padding:10pt;">
                    <h1 style="font-weight: bold; margin-top: 0px;">RAHASIA</h1>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </header>

        <!--=============== MAIN ===============-->
        <main class="main">
          <section>
            <br>
            <div class="container">
              <table border="1" style="border-collapse: collapse; width: 100%;" class="small__font">
                <thead>
                  <tr>
                    <td class="table__big-title" align="center" colspan="3">
                      <h3 style="font-weight: bold;">RESUME MEDIS</h3>
                    </td>
                    <td colspan="3">NRM : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->no_rm; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Nama Pasien : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->nama_pasien; ?></b></td>
                    <td colspan="2">Tanggal Lahir : <b style="font-weight: bold;"><?= datefmysql($data_resume_ranap['pasien']->tanggal_lahir); ?></b></td>
                    <td>Umur : <b style="font-weight: bold;"><?= createUmur2($data_resume_ranap['pasien']->tanggal_lahir) ?></b></td>
                    <td>Jenis Kelamin : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->kelamin; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Tanggal Masuk : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->tanggal_daftar == NULL ? '' : datetimefmysql($data_resume_ranap['pasien']->tanggal_daftar); ?></b></td>
                    <td colspan="2">Tanggal Keluar / Meninggal : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->tanggal_keluar == NULL ? '' : datetimefmysql($data_resume_ranap['pasien']->tanggal_keluar); ?></b></td>
                    <td colspan="2">Ruang Rawat Terakhir : <b style="font-weight: bold;"><?= $data_resume_ranap['rawat_inap'] == NULL ? '' : $data_resume_ranap['rawat_inap']->nama_bangsal; ?><?= $data_resume_ranap['intensive_care'] == NULL ? '' : $data_resume_ranap['intensive_care']->nama_bangsal; ?><?= $data_resume_ranap['pasien']->jenis_layanan == 'IGD' ? 'IGD' : ''; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Tanggung Jawab Pembayaran : <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->penjamin == NULL ? '' : $data_resume_ranap['pasien']->penjamin; ?></b></td>
                    <td colspan="4">Diagnosis / Masalah Waktu Masuk :
                      <b style="font-weight: bold;"><?= $data_resume_ranap['diag_manual'] === null ? ($data_resume_ranap['diagnosa_awal'] === null ? '' : $data_resume_ranap['diagnosa_awal']) : $data_resume_ranap['diag_manual']; ?></b>
                    </td>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td width="30%" style="vertical-align: top;" class="no__border">Ringkasan Riwayat Penyakit</td>
                    <td width="1%" style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->ringkasan_riwayat == NULL ? '' : $data_resume_ranap['resume_medis']->ringkasan_riwayat; ?></b>
                      <!-- 	<b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->keluhan_utama == NULL ? '' : 'Keluhan Utama: ' . $data_resume_ranap['resume_medis']->keluhan_utama . '. <br>'; ?></b>
            <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->subject == NULL ? '' : $data_resume_ranap['resume_medis']->subject . '. '; ?></b> -->
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Pemeriksaan Fisik</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->pemeriksaan_fisik == NULL ? '' : $data_resume_ranap['resume_medis']->pemeriksaan_fisik; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Terapi / Pengobatan Selama di Rumah Sakit</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['pengobatan']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Hasil Konsultasi</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->hasil_konsultasi == NULL ? '' : $data_resume_ranap['resume_medis']->hasil_konsultasi . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Diagnosis Utama</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= isset($data_resume_ranap['diagnosa_utama'][0]) ? $data_resume_ranap['diagnosa_utama'][0]->nama : ''; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" align="left" class="no__border">Diagnosis Sekunder</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['diagnosa_sekunder']; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_ranap['diagnosa_manual_sekunder']; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_ranap['diagnosa_utama_instalasi_lainnya']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Tindakan / Prosedur</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['tindakan_ok'] == NULL ? '' : $data_resume_ranap['tindakan_ok'] . '<br>'; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_ranap['tindakan'] == NULL ? '' : $data_resume_ranap['tindakan']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Alergi (Reaksi Obat)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->alergi_obat == NULL ? '' : $data_resume_ranap['resume_medis']->alergi_obat . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Hasil Laboratorium Belum Selesai (Pending)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->pending_lab == NULL ? '' : $data_resume_ranap['resume_medis']->pending_lab . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Diet</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->diet == NULL ? '' : $data_resume_ranap['resume_medis']->diet . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Kondisi Waktu Keluar</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->cara_keluar == NULL ? '' : $data_resume_ranap['resume_medis']->cara_keluar . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Pengobatan Dilanjutkan (<em>Follow Up</em>)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_ranap['resume_medis']->pengobatan_dilanjutkan == NULL ? '' : $data_resume_ranap['resume_medis']->pengobatan_dilanjutkan . '. '; ?></b>
                    </td>
                  </tr>
                </tbody>
                <!-- <tfoot>
            <tr>
              <td colspan="6">
                <b style="font-weight: bold;">Pemeriksaan Penunjang / Diagnostik Terpenting</b>
              </td>
            </tr>
          </tfoot> -->
              </table>


              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <tbody>
                  <tr>
                    <td>
                      <b style="font-weight: bold;">Pemeriksaan Penunjang / Diagnostik Terpenting</b>
                    </td>
                  </tr>

                  <?php if (isset($data_resume_ranap['resume_lab'])) {
                    if (isset($data_resume_ranap['status_lab'])) {
                      if ($data_resume_ranap['status_lab'] === false) { ?>
                        <tr>
                          <td>
                            <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                            <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                              <thead>
                                <tr>
                                  <th width="30%"><b style="font-weight: bold;">Jenis Pemeriksaan</b></th>
                                  <th width="5%"></th>
                                  <th width="10%" class="center"><b style="font-weight: bold;">Nama</b></th>
                                  <th width="19%" class="center"><b style="font-weight: bold;">Hasil</b></th>
                                  <th width="15%" class="center"><b style="font-weight: bold;">Satuan</b></th>
                                  <th width="15%" class="center"><b style="font-weight: bold;">Nilai Rujukan</b></th>
                                  <th width="10%"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><label><?php $noS = 0;
                                              if ($data_resume_ranap['resume_lab'] !== null) { ?>
                                        <?= $data_resume_ranap['resume_lab'][0][0]->ono ?></label>
                                  </td>
                                </tr>

                                <?php foreach ($data_resume_ranap['resume_lab'] as $key => $value) {

                                                  if (isset($data_resume_ranap['resume_lab'][$key][0]->flag)) {

                                                    if ($data_resume_ranap['resume_lab'][$key][0]->flag !== 'N') {

                                                      if ($key !== $noS) { ?>

                                        <tr>
                                          <td><label id="ono-pesan"><?= $data_resume_ranap['resume_lab'][$key][0]->ono ?></label></td>
                                        </tr>

                                      <?php  } ?>

                                      <tr>
                                        <td><?= $data_resume_ranap['resume_lab'][$key][0]->test_group ?></td>
                                        <td class="v-center center"><?= $data_resume_ranap['resume_lab'][$key][0]->flag ?></td>
                                        <td class="v-center center"><?= $data_resume_ranap['resume_lab'][$key][0]->order_testnm ?></td>
                                        <td class="v-center center"><?= $data_resume_ranap['resume_lab'][$key][0]->result_value ?></td>
                                        <td class="v-center center"><?= $data_resume_ranap['resume_lab'][$key][0]->unit ?></td>
                                        <td class="v-center center"><?= $data_resume_ranap['resume_lab'][$key][0]->ref_range ?></td>
                                      </tr>

                                    <?php $noS = $key;
                                                    } ?>

                                  <?php   } ?>

                                <?php   } ?>

                              <?php   } ?>
                              </tbody>
                            </table>

                          </td>
                        </tr>

                      <?php } else { ?>

                        <tr>
                          <td>

                            <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                            <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;">
                              <thead>
                                <tr>
                                  <td width="30%"><b style="font-weight: bold;">Jenis Pemeriksaan</b></td>
                                  <td width="4%"></td>
                                  <td width="26%" align="center"><b style="font-weight: bold;">Hasil</b></td>
                                  <td width="15%" align="center"><b style="font-weight: bold;">Satuan</b></td>
                                  <td width="15%" align="center"><b style="font-weight: bold;">Nilai Rujukan</b></td>
                                  <td width="10%"></td>
                                </tr>
                              </thead>
                              <tbody>

                                <?php

                                $arr = [];
                                $arrFlag = [];

                                foreach ($data_resume_ranap['resume_lab'] as $key => $value) {
                                  if ($value === null) continue;

                                  array_push($arr, $value);
                                }

                                $keys = array_column($arr, 'ono');
                                array_multisort($keys, SORT_ASC, $arr);

                                $onoGroup = group_by("ono", $arr);

                                foreach ($onoGroup as $a => $b) {

                                  $groupedOtgroup = group_by("test_group", $b);

                                  $keyGroup = array_keys($groupedOtgroup);
                                  $objectGroup = array_values($groupedOtgroup);

                                  for ($n = 0; $n < sizeof($keyGroup); $n++) {

                                    for ($o = 0; $o < sizeof($objectGroup[$n]); $o++) {

                                      if ($objectGroup[$n][$o]['flag'] !== '') {

                                        if ($objectGroup[$n][$o]['flag'] !== 'N') {

                                          array_push($arrFlag, $objectGroup[$n][$o]);
                                        }
                                      }
                                    }
                                  }
                                }

                                $elementTegr = group_by("ono", $arrFlag); ?>

                                <?php foreach ($elementTegr as $c => $d) {
                                  $dataR = $d[0]['release']->date;
                                  $tanggalR = substr($dataR, 6, 2);
                                  $bulanR = substr($dataR, 4, 2);
                                  $tahunR = substr($dataR, 0, 4); ?>

                                  <tr>
                                    <td width="30%"><?= $c ?> (tanggal : <?= $tanggalR ?>/<?= $bulanR ?>/<?= $tahunR ?>)</td>
                                    <td width="4%"></td>
                                    <td width="26%"></td>
                                    <td width="15%"></td>
                                    <td width="15%"></td>
                                    <td width="10%"></td>
                                  </tr>
                                  <tr class="empty-row">
                                    <td style="font-size: 1px" width="30%">&nbsp;</td>
                                    <td style="font-size: 1px" width="4%">&nbsp;</td>
                                    <td style="font-size: 1px" width="26%">&nbsp;</td>
                                    <td style="font-size: 1px" width="15%">&nbsp;</td>
                                    <td style="font-size: 1px" width="15%">&nbsp;</td>
                                    <td style="font-size: 1px" width="10%">&nbsp;</td>
                                  </tr>

                                  <?php $etvalOtgroup = group_by("test_group", $d);
                                  foreach ($etvalOtgroup as $e => $f) {  ?>

                                    <tr>
                                      <td width="30%"> &nbsp; &nbsp; <?= $e ?></td>
                                      <td width="4%"></td>
                                      <td width="26%"></td>
                                      <td width="15%"></td>
                                      <td width="15%"></td>
                                      <td width="10%"></td>
                                    </tr>
                                    <tr class="empty-row">
                                      <td width="30%">&nbsp;</td>
                                      <td width="4%">&nbsp;</td>
                                      <td width="26%">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                      <td width="10%">&nbsp;</td>
                                    </tr>

                                    <?php $groupedOtname = group_by("order_testnm", $f);
                                    foreach ($groupedOtname as $g => $h) {  ?>

                                      <tr>
                                        <td width="30%"> &nbsp; &nbsp; <?= $g ?></td>
                                        <td width="4%"></td>
                                        <td width="26%"></td>
                                        <td width="15%"></td>
                                        <td width="15%"></td>
                                        <td width="10%"></td>
                                      </tr>
                                      <tr class="empty-row">
                                        <td width="30%">&nbsp;</td>
                                        <td width="4%">&nbsp;</td>
                                        <td width="26%">&nbsp;</td>
                                        <td width="15%">&nbsp;</td>
                                        <td width="15%">&nbsp;</td>
                                        <td width="10%">&nbsp;</td>
                                      </tr>

                                      <?php $status = [];

                                      array_push($status, $h);

                                      foreach ($status as $i => $j) {

                                        $ref_range = '';

                                        $volume  = array_column($j, 'disp_seq');
                                        array_multisort($volume, SORT_ASC, $j);

                                        foreach ($j as $k => $l) { ?>

                                          <?php if (empty($l['nama'])) {
                                            $nama = '<td width="30%"></td>';
                                          } else {
                                            foreach ($l['nama'] as $m => $n) {
                                              if ($n->nama === 'Hitung Jenis') {
                                                $nama = '<td width="30%" class="v-center bold"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
                                              } else {
                                                $nama = '<td width="30%" class="v-center"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
                                              }
                                            }
                                          }

                                          $flag = '<td style="color:red; border: 0.5px solid red" align="right">' . $l['flag'] . '</td>';

                                          $comment = '<td align="center"></td>';
                                          if (!empty($l['test_comment'])) {
                                            $comment = '<td align="center">' . $l['test_comment'] . '</td>';
                                          }

                                          if ($l['ref_range'] === '' && $l['unit'] === '') {

                                            if (strlen($l['result_value']) < 10) {

                                              $ref_range = '<td style="padding-left:10px;" align="center">' . $l['result_value'] . '</td>
                                                <td align="center">' . $l['unit'] . '</td>
                                                <td align="center">' . $l['ref_range'] . '</td>';
                                            } else {

                                              $ref_range = '<td style="padding-left:10px;" align="center" colspan="3">' . $l['result_value'] . ' </td>';
                                            }
                                          } else {

                                            $ref_range = '<td style="padding-left:10px" align="center">' . $l['result_value'] . '</td>
                                              <td align="center">' . $l['unit'] . '</td>
                                              <td align="center">' . $l['ref_range'] . '</td>';
                                          } ?>

                                          <tr>
                                            <?= $nama; ?>
                                            <?= $flag; ?>
                                            <?= $ref_range; ?>
                                            <?= $comment; ?>
                                          </tr>


                                        <?php } ?>
                                      <?php } ?>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } ?>

                              </tbody>
                            </table>

                          <?php } ?>
                        <?php } ?>
                      <?php } ?>

                          </td>
                        </tr>

                        <?php if (!empty($data_resume_ranap['cek_radiologi'])) { ?>

                          <tr>
                            <td>

                              <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                                <thead>
                                  <tr>
                                    <td colspan="2" width="10%"><b style="font-weight: bold;">No</b></td>
                                    <td colspan="2" width="20%" align="center"><b style="font-weight: bold;">Nama Layanan</b></td>
                                    <td colspan="2" width="70%" align="center"><b style="font-weight: bold;">Hasil Radiologi</b></td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data_resume_ranap['cek_radiologi'] as $key => $cr) { ?>

                                    <tr>
                                      <td colspan="2" class="center"><?= $cr->kode; ?></td>
                                      <td colspan="2" class="center"><?= (!empty($cr->code) ? $cr->code . ". " . $cr->layanan : $cr->layanan); ?></td>
                                      <td colspan="2" class="center"><?= (!empty($cr->hasil) ? $cr->hasil : $cr->html); ?></td>
                                    </tr>

                                  <?php }  ?>
                                </tbody>
                              </table>


                            </td>
                          </tr>
                        <?php }  ?>

                </tbody>
              </table>

              <!-- <table class="small__font" style="margin-top: 1rem;"> -->
              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <thead>
                  <tr>
                    <th colspan="4">JADWAL KONTROL</th>
                  </tr>
                  <tr>
                    <th align="center"><b style="font-weight: bold;">Tanggal</b></th>
                    <th align="center"><b style="font-weight: bold;">Hari</b></th>
                    <th align="center"><b style="font-weight: bold;">Jam</b></th>
                    <th align="left"><b style="font-weight: bold;">Nama Dokter</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_resume_ranap['resume_kontrol'] as $jk) { ?>
                    <tr>
                      <td align="center"><?= date('d-m-Y', strtotime($jk->tanggal)); ?></td>
                      <td align="center"><?= $jk->hari; ?></td>
                      <td align="center"><?= date('H:m', strtotime($jk->tanggal)); ?></td>
                      <td align="left"><?= $jk->dokter; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- <table class="small__font" style="margin-top: 1rem;"> -->
              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <thead>
                  <tr>
                    <th colspan="12">TERAPI PULANG</th>
                  </tr>
                  <tr>
                    <th width="27%" rowspan="2"><b style="font-weight: bold;">Nama Obat</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Jumlah</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Dosis</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Frekuensi</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Cara Pemberian</b></th>
                    <th width="10%" colspan="6"><b style="font-weight: bold;">Jam Pemberian</b></th>
                    <th width="23%" rowspan="2"><b style="font-weight: bold;">Petunjuk Khusus</b></th>
                  </tr>
                  <tr>
                    <th><b style="font-weight: bold;">A</b></th>
                    <th><b style="font-weight: bold;">B</b></th>
                    <th><b style="font-weight: bold;">C</b></th>
                    <th><b style="font-weight: bold;">D</b></th>
                    <th><b style="font-weight: bold;">E</b></th>
                    <th><b style="font-weight: bold;">F</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_resume_ranap['terapi_pulang'] as $tp) { ?>
                    <tr>
                      <td><?php echo $tp->nama_obat; ?></td>
                      <td align="center"><?php echo $tp->jumlah_obat; ?></td>
                      <td align="center"><?php echo $tp->dosis; ?></td>
                      <td align="center"><?php echo $tp->frekuensi; ?></td>
                      <td align="center"><?php echo $tp->cara_pemberian; ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_satu); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_dua); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_tiga); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_empat); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_lima); ?></td>
                      <td><?php echo $tp->petunjuk_khusus; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>

                <tfoot>
                  <tr align="center">
                    <td width="20%" class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">
                      <div style="flex-direction: column;">
                        <div>
                          Tanggal: <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($data_resume_ranap['pasien']->tanggal_keluar))); ?></b>
                        </div>
                        <div>
                          Jam: <b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($data_resume_ranap['pasien']->tanggal_keluar)); ?></b>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr align="center">
                    <td class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">Dokter Penanggung Jawab Pelayanan
                      <?php if (!$data_resume_ranap['pasien']->tanda_tangan) : ?>
                        <br><br><br><br><br><br><br><br>
                      <?php endif ?>
                    </td>
                  </tr>
                  <?php if ($data_resume_ranap['pasien']->tanda_tangan) : ?>
                    <tr align="center">
                      <td class="no__border" colspan="6"></td>
                      <td class="no__border" colspan="7">
                        <img src="<?= resource_url() . 'images/ttd_dokter/' . $data_resume_ranap['pasien']->tanda_tangan ?>" alt="ttd-dokter" width="300">
                      </td>
                    </tr>
                  <?php endif ?>
                  <tr align="center">
                    <td class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">(<b style="font-weight: bold;"><?= $data_resume_ranap['pasien']->dokter_dpjp ?> </b>)</td>
                  </tr>
                  <tr>
                    <td colspan="12">
                      Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
                      UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)

                    </td>
                  </tr>
                </tfoot>
              </table>

            </div>
          </section>
        </main>
      </div>
      <br><br>

    <?php endif ?>

    <!-- Resume Icare -->
    <?php if (!empty($data_resume_icare)) : ?>

      <div style="page-break-after: always;">
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
          <div>
            <table style="border: none;">
              <tr>
                <td style="border: none;">
                  <div style="margin-left: 15px;">
                    <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="85px">
                    <p class="address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                      Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
                  </div>
                </td>
                <td>
                  <div class="border-rahasia" style="margin-left: 250px; padding:10pt;">
                    <h1 style="font-weight: bold; margin-top: 0px;">RAHASIA</h1>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </header>

        <!--=============== MAIN ===============-->
        <main class="main">
          <section>
            <br>
            <div class="container">
              <table border="1" style="border-collapse: collapse; width: 100%;" class="small__font">
                <thead>
                  <tr>
                    <td class="table__big-title" align="center" colspan="3">
                      <h3 style="font-weight: bold;">RESUME MEDIS</h3>
                    </td>
                    <td colspan="3">NRM : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->no_rm; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Nama Pasien : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->nama_pasien; ?></b></td>
                    <td colspan="2">Tanggal Lahir : <b style="font-weight: bold;"><?= datefmysql($data_resume_icare['pasien']->tanggal_lahir); ?></b></td>
                    <td>Umur : <b style="font-weight: bold;"><?= createUmur2($data_resume_icare['pasien']->tanggal_lahir) ?></b></td>
                    <td>Jenis Kelamin : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->kelamin; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Tanggal Masuk : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->tanggal_daftar == NULL ? '' : datetimefmysql($data_resume_icare['pasien']->tanggal_daftar); ?></b></td>
                    <td colspan="2">Tanggal Keluar / Meninggal : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->tanggal_keluar == NULL ? '' : datetimefmysql($data_resume_icare['pasien']->tanggal_keluar); ?></b></td>
                    <td colspan="2">Ruang Rawat Terakhir : <b style="font-weight: bold;"><?= $data_resume_icare['rawat_inap'] == NULL ? '' : $data_resume_icare['rawat_inap']->nama_bangsal; ?><?= $data_resume_icare['intensive_care'] == NULL ? '' : $data_resume_icare['intensive_care']->nama_bangsal; ?><?= $data_resume_icare['pasien']->jenis_layanan == 'IGD' ? 'IGD' : ''; ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="2">Tanggung Jawab Pembayaran : <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->penjamin == NULL ? '' : $data_resume_icare['pasien']->penjamin; ?></b></td>
                    <td colspan="4">Diagnosis / Masalah Waktu Masuk :
                      <b style="font-weight: bold;"><?= $data_resume_icare['diag_manual'] === null ? ($data_resume_icare['diagnosa_awal'] === null ? '' : $data_resume_icare['diagnosa_awal']) : $data_resume_icare['diag_manual']; ?></b>
                    </td>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td width="30%" style="vertical-align: top;" class="no__border">Ringkasan Riwayat Penyakit</td>
                    <td width="1%" style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->ringkasan_riwayat == NULL ? '' : $data_resume_icare['resume_medis']->ringkasan_riwayat; ?></b>
                      <!-- 	<b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->keluhan_utama == NULL ? '' : 'Keluhan Utama: ' . $data_resume_icare['resume_medis']->keluhan_utama . '. <br>'; ?></b>
            <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->subject == NULL ? '' : $data_resume_icare['resume_medis']->subject . '. '; ?></b> -->
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Pemeriksaan Fisik</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->pemeriksaan_fisik == NULL ? '' : $data_resume_icare['resume_medis']->pemeriksaan_fisik; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Terapi / Pengobatan Selama di Rumah Sakit</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['pengobatan']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Hasil Konsultasi</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->hasil_konsultasi == NULL ? '' : $data_resume_icare['resume_medis']->hasil_konsultasi . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Diagnosis Utama</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= isset($data_resume_icare['diagnosa_utama'][0]) ? $data_resume_icare['diagnosa_utama'][0]->nama : ''; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" align="left" class="no__border">Diagnosis Sekunder</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['diagnosa_sekunder']; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_icare['diagnosa_manual_sekunder']; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_icare['diagnosa_utama_instalasi_lainnya']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Tindakan / Prosedur</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['tindakan_ok'] == NULL ? '' : $data_resume_icare['tindakan_ok'] . '<br>'; ?></b>
                      <b style="font-weight: bold;"><?= $data_resume_icare['tindakan'] == NULL ? '' : $data_resume_icare['tindakan']; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Alergi (Reaksi Obat)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->alergi_obat == NULL ? '' : $data_resume_icare['resume_medis']->alergi_obat . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Hasil Laboratorium Belum Selesai (Pending)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->pending_lab == NULL ? '' : $data_resume_icare['resume_medis']->pending_lab . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Diet</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->diet == NULL ? '' : $data_resume_icare['resume_medis']->diet . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Kondisi Waktu Keluar</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->cara_keluar == NULL ? '' : $data_resume_icare['resume_medis']->cara_keluar . '. '; ?></b>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align: top;" class="no__border">Pengobatan Dilanjutkan (<em>Follow Up</em>)</td>
                    <td style="vertical-align: top;" class="no__border">: </td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b style="font-weight: bold;"><?= $data_resume_icare['resume_medis']->pengobatan_dilanjutkan == NULL ? '' : $data_resume_icare['resume_medis']->pengobatan_dilanjutkan . '. '; ?></b>
                    </td>
                  </tr>
                </tbody>
                <!-- <tfoot>
            <tr>
              <td colspan="6">
                <b style="font-weight: bold;">Pemeriksaan Penunjang / Diagnostik Terpenting</b>
              </td>
            </tr>
          </tfoot> -->
              </table>


              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <tbody>
                  <tr>
                    <td>
                      <b style="font-weight: bold;">Pemeriksaan Penunjang / Diagnostik Terpenting</b>
                    </td>
                  </tr>

                  <?php if (isset($data_resume_icare['resume_lab'])) {
                    if (isset($data_resume_icare['status_lab'])) {
                      if ($data_resume_icare['status_lab'] === false) { ?>
                        <tr>
                          <td>
                            <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                            <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                              <thead>
                                <tr>
                                  <th width="30%"><b style="font-weight: bold;">Jenis Pemeriksaan</b></th>
                                  <th width="5%"></th>
                                  <th width="10%" class="center"><b style="font-weight: bold;">Nama</b></th>
                                  <th width="19%" class="center"><b style="font-weight: bold;">Hasil</b></th>
                                  <th width="15%" class="center"><b style="font-weight: bold;">Satuan</b></th>
                                  <th width="15%" class="center"><b style="font-weight: bold;">Nilai Rujukan</b></th>
                                  <th width="10%"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><label><?php $noS = 0;
                                              if ($data_resume_icare['resume_lab'] !== null) { ?>
                                        <?= $data_resume_icare['resume_lab'][0][0]->ono ?></label>
                                  </td>
                                </tr>

                                <?php foreach ($data_resume_icare['resume_lab'] as $key => $value) {

                                                  if (isset($data_resume_icare['resume_lab'][$key][0]->flag)) {

                                                    if ($data_resume_icare['resume_lab'][$key][0]->flag !== 'N') {

                                                      if ($key !== $noS) { ?>

                                        <tr>
                                          <td><label id="ono-pesan"><?= $data_resume_icare['resume_lab'][$key][0]->ono ?></label></td>
                                        </tr>

                                      <?php  } ?>

                                      <tr>
                                        <td><?= $data_resume_icare['resume_lab'][$key][0]->test_group ?></td>
                                        <td class="v-center center"><?= $data_resume_icare['resume_lab'][$key][0]->flag ?></td>
                                        <td class="v-center center"><?= $data_resume_icare['resume_lab'][$key][0]->order_testnm ?></td>
                                        <td class="v-center center"><?= $data_resume_icare['resume_lab'][$key][0]->result_value ?></td>
                                        <td class="v-center center"><?= $data_resume_icare['resume_lab'][$key][0]->unit ?></td>
                                        <td class="v-center center"><?= $data_resume_icare['resume_lab'][$key][0]->ref_range ?></td>
                                      </tr>

                                    <?php $noS = $key;
                                                    } ?>

                                  <?php   } ?>

                                <?php   } ?>

                              <?php   } ?>
                              </tbody>
                            </table>

                          </td>
                        </tr>

                      <?php } else { ?>

                        <tr>
                          <td>

                            <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                            <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;">
                              <thead>
                                <tr>
                                  <td width="30%"><b style="font-weight: bold;">Jenis Pemeriksaan</b></td>
                                  <td width="4%"></td>
                                  <td width="26%" align="center"><b style="font-weight: bold;">Hasil</b></td>
                                  <td width="15%" align="center"><b style="font-weight: bold;">Satuan</b></td>
                                  <td width="15%" align="center"><b style="font-weight: bold;">Nilai Rujukan</b></td>
                                  <td width="10%"></td>
                                </tr>
                              </thead>
                              <tbody>

                                <?php

                                $arr = [];
                                $arrFlag = [];

                                foreach ($data_resume_icare['resume_lab'] as $key => $value) {
                                  if ($value === null) continue;

                                  array_push($arr, $value);
                                }

                                $keys = array_column($arr, 'ono');
                                array_multisort($keys, SORT_ASC, $arr);

                                $onoGroup = group_by("ono", $arr);

                                foreach ($onoGroup as $a => $b) {

                                  $groupedOtgroup = group_by("test_group", $b);

                                  $keyGroup = array_keys($groupedOtgroup);
                                  $objectGroup = array_values($groupedOtgroup);

                                  for ($n = 0; $n < sizeof($keyGroup); $n++) {

                                    for ($o = 0; $o < sizeof($objectGroup[$n]); $o++) {

                                      if ($objectGroup[$n][$o]['flag'] !== '') {

                                        if ($objectGroup[$n][$o]['flag'] !== 'N') {

                                          array_push($arrFlag, $objectGroup[$n][$o]);
                                        }
                                      }
                                    }
                                  }
                                }

                                $elementTegr = group_by("ono", $arrFlag); ?>

                                <?php foreach ($elementTegr as $c => $d) {
                                  $dataR = $d[0]['release']->date;
                                  $tanggalR = substr($dataR, 6, 2);
                                  $bulanR = substr($dataR, 4, 2);
                                  $tahunR = substr($dataR, 0, 4); ?>

                                  <tr>
                                    <td width="30%"><?= $c ?> (tanggal : <?= $tanggalR ?>/<?= $bulanR ?>/<?= $tahunR ?>)</td>
                                    <td width="4%"></td>
                                    <td width="26%"></td>
                                    <td width="15%"></td>
                                    <td width="15%"></td>
                                    <td width="10%"></td>
                                  </tr>
                                  <tr class="empty-row">
                                    <td style="font-size: 1px" width="30%">&nbsp;</td>
                                    <td style="font-size: 1px" width="4%">&nbsp;</td>
                                    <td style="font-size: 1px" width="26%">&nbsp;</td>
                                    <td style="font-size: 1px" width="15%">&nbsp;</td>
                                    <td style="font-size: 1px" width="15%">&nbsp;</td>
                                    <td style="font-size: 1px" width="10%">&nbsp;</td>
                                  </tr>

                                  <?php $etvalOtgroup = group_by("test_group", $d);
                                  foreach ($etvalOtgroup as $e => $f) {  ?>

                                    <tr>
                                      <td width="30%"> &nbsp; &nbsp; <?= $e ?></td>
                                      <td width="4%"></td>
                                      <td width="26%"></td>
                                      <td width="15%"></td>
                                      <td width="15%"></td>
                                      <td width="10%"></td>
                                    </tr>
                                    <tr class="empty-row">
                                      <td width="30%">&nbsp;</td>
                                      <td width="4%">&nbsp;</td>
                                      <td width="26%">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                      <td width="10%">&nbsp;</td>
                                    </tr>

                                    <?php $groupedOtname = group_by("order_testnm", $f);
                                    foreach ($groupedOtname as $g => $h) {  ?>

                                      <tr>
                                        <td width="30%"> &nbsp; &nbsp; <?= $g ?></td>
                                        <td width="4%"></td>
                                        <td width="26%"></td>
                                        <td width="15%"></td>
                                        <td width="15%"></td>
                                        <td width="10%"></td>
                                      </tr>
                                      <tr class="empty-row">
                                        <td width="30%">&nbsp;</td>
                                        <td width="4%">&nbsp;</td>
                                        <td width="26%">&nbsp;</td>
                                        <td width="15%">&nbsp;</td>
                                        <td width="15%">&nbsp;</td>
                                        <td width="10%">&nbsp;</td>
                                      </tr>

                                      <?php $status = [];

                                      array_push($status, $h);

                                      foreach ($status as $i => $j) {

                                        $ref_range = '';

                                        $volume  = array_column($j, 'disp_seq');
                                        array_multisort($volume, SORT_ASC, $j);

                                        foreach ($j as $k => $l) { ?>

                                          <?php if (empty($l['nama'])) {
                                            $nama = '<td width="30%"></td>';
                                          } else {
                                            foreach ($l['nama'] as $m => $n) {
                                              if ($n->nama === 'Hitung Jenis') {
                                                $nama = '<td width="30%" class="v-center bold"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
                                              } else {
                                                $nama = '<td width="30%" class="v-center"> &nbsp; &nbsp;  &nbsp; &nbsp; ' . $n->nama . '</td>';
                                              }
                                            }
                                          }

                                          $flag = '<td style="color:red; border: 0.5px solid red" align="right">' . $l['flag'] . '</td>';

                                          $comment = '<td align="center"></td>';
                                          if (!empty($l['test_comment'])) {
                                            $comment = '<td align="center">' . $l['test_comment'] . '</td>';
                                          }

                                          if ($l['ref_range'] === '' && $l['unit'] === '') {

                                            if (strlen($l['result_value']) < 10) {

                                              $ref_range = '<td style="padding-left:10px;" align="center">' . $l['result_value'] . '</td>
                                                <td align="center">' . $l['unit'] . '</td>
                                                <td align="center">' . $l['ref_range'] . '</td>';
                                            } else {

                                              $ref_range = '<td style="padding-left:10px;" align="center" colspan="3">' . $l['result_value'] . ' </td>';
                                            }
                                          } else {

                                            $ref_range = '<td style="padding-left:10px" align="center">' . $l['result_value'] . '</td>
                                              <td align="center">' . $l['unit'] . '</td>
                                              <td align="center">' . $l['ref_range'] . '</td>';
                                          } ?>

                                          <tr>
                                            <?= $nama; ?>
                                            <?= $flag; ?>
                                            <?= $ref_range; ?>
                                            <?= $comment; ?>
                                          </tr>


                                        <?php } ?>
                                      <?php } ?>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } ?>

                              </tbody>
                            </table>

                          <?php } ?>
                        <?php } ?>
                      <?php } ?>

                          </td>
                        </tr>

                        <?php if (!empty($data_resume_icare['cek_radiologi'])) { ?>

                          <tr>
                            <td>

                              <!-- <table class="table-border" style="margin-top: 1rem;"> -->
                              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                                <thead>
                                  <tr>
                                    <td colspan="2" width="10%"><b style="font-weight: bold;">No</b></td>
                                    <td colspan="2" width="20%" align="center"><b style="font-weight: bold;">Nama Layanan</b></td>
                                    <td colspan="2" width="70%" align="center"><b style="font-weight: bold;">Hasil Radiologi</b></td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($data_resume_icare['cek_radiologi'] as $key => $cr) { ?>

                                    <tr>
                                      <td colspan="2" class="center"><?= $cr->kode; ?></td>
                                      <td colspan="2" class="center"><?= (!empty($cr->code) ? $cr->code . ". " . $cr->layanan : $cr->layanan); ?></td>
                                      <td colspan="2" class="center"><?= (!empty($cr->hasil) ? $cr->hasil : $cr->html); ?></td>
                                    </tr>

                                  <?php }  ?>
                                </tbody>
                              </table>


                            </td>
                          </tr>
                        <?php }  ?>

                </tbody>
              </table>

              <!-- <table class="small__font" style="margin-top: 1rem;"> -->
              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <thead>
                  <tr>
                    <th colspan="4">JADWAL KONTROL</th>
                  </tr>
                  <tr>
                    <th align="center"><b style="font-weight: bold;">Tanggal</b></th>
                    <th align="center"><b style="font-weight: bold;">Hari</b></th>
                    <th align="center"><b style="font-weight: bold;">Jam</b></th>
                    <th align="left"><b style="font-weight: bold;">Nama Dokter</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_resume_icare['resume_kontrol'] as $jk) { ?>
                    <tr>
                      <td align="center"><?= date('d-m-Y', strtotime($jk->tanggal)); ?></td>
                      <td align="center"><?= $jk->hari; ?></td>
                      <td align="center"><?= date('H:m', strtotime($jk->tanggal)); ?></td>
                      <td align="left"><?= $jk->dokter; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- <table class="small__font" style="margin-top: 1rem;"> -->
              <table border="1" style="border-collapse: collapse; width: 100%; margin-top: 1rem;" class="small__font">
                <thead>
                  <tr>
                    <th colspan="12">TERAPI PULANG</th>
                  </tr>
                  <tr>
                    <th width="27%" rowspan="2"><b style="font-weight: bold;">Nama Obat</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Jumlah</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Dosis</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Frekuensi</b></th>
                    <th width="10%" rowspan="2"><b style="font-weight: bold;">Cara Pemberian</b></th>
                    <th width="10%" colspan="6"><b style="font-weight: bold;">Jam Pemberian</b></th>
                    <th width="23%" rowspan="2"><b style="font-weight: bold;">Petunjuk Khusus</b></th>
                  </tr>
                  <tr>
                    <th><b style="font-weight: bold;">A</b></th>
                    <th><b style="font-weight: bold;">B</b></th>
                    <th><b style="font-weight: bold;">C</b></th>
                    <th><b style="font-weight: bold;">D</b></th>
                    <th><b style="font-weight: bold;">E</b></th>
                    <th><b style="font-weight: bold;">F</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_resume_icare['terapi_pulang'] as $tp) { ?>
                    <tr>
                      <td><?php echo $tp->nama_obat; ?></td>
                      <td align="center"><?php echo $tp->jumlah_obat; ?></td>
                      <td align="center"><?php echo $tp->dosis; ?></td>
                      <td align="center"><?php echo $tp->frekuensi; ?></td>
                      <td align="center"><?php echo $tp->cara_pemberian; ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_satu); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_dua); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_tiga); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_empat); ?></td>
                      <td align="center"><?php echo timeExplode($tp->ek_jam_pemberian_lima); ?></td>
                      <td><?php echo $tp->petunjuk_khusus; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>

                <tfoot>
                  <tr align="center">
                    <td width="20%" class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">
                      <div style="flex-direction: column;">
                        <div>
                          Tanggal: <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($data_resume_icare['pasien']->tanggal_keluar))); ?></b>
                        </div>
                        <div>
                          Jam: <b style="font-weight: bold;"><?= $data_resume_icare['pasien']->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($data_resume_icare['pasien']->tanggal_keluar)); ?></b>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr align="center">
                    <td class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">Dokter Penanggung Jawab Pelayanan
                      <?php if (!$data_resume_icare['pasien']->tanda_tangan) : ?>
                        <br><br><br><br><br><br><br><br>
                      <?php endif ?>
                    </td>
                  </tr>
                  <?php if ($data_resume_icare['pasien']->tanda_tangan) : ?>
                    <tr align="center">
                      <td class="no__border" colspan="6"></td>
                      <td class="no__border" colspan="7">
                        <img src="<?= resource_url() . 'images/ttd_dokter/' . $data_resume_icare['pasien']->tanda_tangan ?>" alt="ttd-dokter" width="300">
                      </td>
                    </tr>
                  <?php endif ?>
                  <tr align="center">
                    <td class="no__border" colspan="6"></td>
                    <td class="no__border" colspan="6">(<b style="font-weight: bold;"><?= $data_resume_icare['pasien']->dokter_dpjp ?> </b>)</td>
                  </tr>
                  <tr>
                    <td colspan="12">
                      Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
                      UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)

                    </td>
                  </tr>
                </tfoot>
              </table>

            </div>
          </section>
        </main>
      </div>
      <br><br>

    <?php endif ?>

    <!-- Triase IGD -->
    <?php if (!empty($data_triase)) : ?>
      <div style="page-break-after: always;">
        <table width="100%">
          <tr>
            <td width="15%" class="center">
              <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="Logo RSUD" width="80px" height="80px">
            </td>
            <td width="47%">
              <p class="header__address">
                Jl. Pulau Putri Raya Perumahan Modernland<br>
                Kelurahan Kelapa Indah, Kecamatan Tangerang<br>
                Telp: 021 2972 0201, 021 2972 0202
              </p>
            </td>
            <td width="38%">
              <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 10px;">
                <table width="100%">
                  <tr>
                    <td width="30%">No. RM</td>
                    <td width="1%">:</td>
                    <td width="69%" class="bold"><?= $data_triase['pasien']->id_pasien ?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td class="bold"><?= $data_triase['pasien']->nama ?></td>
                  </tr>
                  <tr>
                    <td>Tgl Lahir</td>
                    <td>:</td>
                    <td class="bold"><?= ($data_triase['pasien']->tanggal_lahir !== '' ? datefmysql($data_triase['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data_triase['pasien']->tanggal_lahir) ?> Tahun)</td>
                  </tr>
                  <tr>
                    <td>Kelamin</td>
                    <td>:</td>
                    <td class="bold"><?= ($data_triase['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                  </tr>
                  <!-- <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td class="bold"><?= $data_triase['pasien']->agama ?></td>
                  </tr> -->
                </table>
              </div>
            </td>
          </tr>
        </table>


        <!--=============== MAIN ===============-->
        <main class="main">
          <section class="tpgd">
            <br>
            <div class="tpgd__container container">
              <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                <thead>
                  <tr>
                    <th style="border-bottom: 1px solid black" class="bold" colspan="8">TRIASE PASIEN INSTALASI GAWAT DARURAT</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td class="no__border" colspan="8">Tanggal dan Jam : <?= date('d/m/Y : H:i', strtotime($data_triase['ttd_waktu_igd'])) ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="8">Cara Pasien Datang :</td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="8">
                      <div style="display: flex; align-items: center;">
                        <?php
                        $cara_datang_pasien_igd = json_decode($data_triase['ttd_cara_datang_pasien_igd']);
                        // Checkbox "Sendiri"
                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_1) && $cara_datang_pasien_igd->cara_datang_pasien_igd_1 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Sendiri';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Sendiri';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="8">
                      <div style="display: flex; align-items: center;">
                        <?php
                        // $cara_datang_pasien_igd = json_decode($ttd_cara_datang_pasien_igd);										
                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_2) && $cara_datang_pasien_igd->cara_datang_pasien_igd_2 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Diantar, Keluarga/Teman';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Diantar, Keluarga/Teman';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_9) && $cara_datang_pasien_igd->cara_datang_pasien_igd_9 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Ambulance : Ttd dan nama petugas pengantar';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Ambulance : Ttd dan nama petugas pengantar';
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_10) && $cara_datang_pasien_igd->cara_datang_pasien_igd_10 == '') {
                          echo '<span></span>';  // Tampilkan teks biasa
                        } else {
                          echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_10) . '</span>';
                          // Menampilkan teks jika ada nilai untuk cara_datang_pasien_igd_10
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="8">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_3) && $cara_datang_pasien_igd->cara_datang_pasien_igd_3 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Warga';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Warga';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_11) && $cara_datang_pasien_igd->cara_datang_pasien_igd_11 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Polisi : Ttd dan nama petugas pengantar';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Polisi : Ttd dan nama petugas pengantar';
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_12) && $cara_datang_pasien_igd->cara_datang_pasien_igd_12 == '') {
                          echo '<span></span>';  // Tampilkan teks biasa
                        } else {
                          echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_12) . '</span>';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="8">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_4) && $cara_datang_pasien_igd->cara_datang_pasien_igd_4 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Rujukan dari ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Rujukan dari ';
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_5) && $cara_datang_pasien_igd->cara_datang_pasien_igd_5 == '') {
                          echo '<span></span>';  // Tampilkan teks biasa
                        } else {
                          echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_5) . '</span>';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="border-top: 1px solid black" colspan="8">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_6) && $cara_datang_pasien_igd->cara_datang_pasien_igd_6 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Trauma';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Trauma';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox	

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_7) && $cara_datang_pasien_igd->cara_datang_pasien_igd_7 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Non Trauma';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Non Trauma';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_8) && $cara_datang_pasien_igd->cara_datang_pasien_igd_8 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Obstetri';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Obstetri';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table style="border-collapse: collapse; width: 100%; border: 1px solid black">
                <thead>
                  <tr>
                    <td width="10%" class="center" rowspan="2" style="background-color: #C0C0C0; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">PEMERIKSAAN DEWASA</td>
                    <td width="10%" class="center" style="background-color: #FF0000; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">I. RESUSITASI</td>
                    <td width="10%" class="center" style="background-color: #FF0000; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">II. EMERGENCY</td>
                    <td width="10%" class="center" style="background-color: #FFFF00; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">III. URGENT</td>
                    <td width="10%" class="center" style="background-color: #00FF00; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">IV. NON URGENT</td>
                    <td width="10%" class="center" style="background-color: #00FF00; color: black; text-align: center; font-size: 12px; padding: 5px; border: 1px solid black">V. FALSE EMERGENCY</td>
                  </tr>
                  <tr>
                    <td style="border: 1px solid black" width="10%" class="center">SEGERA</td>
                    <td style="border: 1px solid black" width="10%" class="center">10Menit</td>
                    <td style="border: 1px solid black" width="10%" class="center">30Menit</td>
                    <td style="border: 1px solid black" width="10%" class="center">60Menit</td>
                    <td style="border: 1px solid black" width="10%" class="center">120 Menit</td>
                  </tr>
                </thead>


                <tbody>
                  <tr>
                    <td style="border: 1px solid black" rowspan="2" class="center v-center">JALAN NAFAS</td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $jalan_nafas_igd = json_decode($data_triase['ttd_jalan_nafas_igd']);
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_1) && $jalan_nafas_igd->jalan_nafas_igd_1 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sumbatan';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sumbatan';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_2) && $jalan_nafas_igd->jalan_nafas_igd_2 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_3) && $jalan_nafas_igd->jalan_nafas_igd_3 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_4) && $jalan_nafas_igd->jalan_nafas_igd_4 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_6) && $jalan_nafas_igd->jalan_nafas_igd_6 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($jalan_nafas_igd->jalan_nafas_igd_5) && $jalan_nafas_igd->jalan_nafas_igd_5 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Ancaman';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Ancaman';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>


                  <tr>
                    <td style="border: 1px solid black" rowspan="2" class="center v-center">PERNAFASAN</td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $pernafasan_igd = json_decode($data_triase['ttd_pernafasan_igd']);
                      if (!empty($pernafasan_igd->pernafasan_igd_1) && $pernafasan_igd->pernafasan_igd_1 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Henti nafas';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Henti nafas';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_2) && $pernafasan_igd->pernafasan_igd_2 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takipnoe';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takipnoe';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_3) && $pernafasan_igd->pernafasan_igd_3 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Normal ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Normal ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_4) && $pernafasan_igd->pernafasan_igd_4 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nafas normal ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nafas normal ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_6) && $pernafasan_igd->pernafasan_igd_6 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nafas Normal ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nafas Normal ';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_6) && $pernafasan_igd->pernafasan_igd_6 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas berat';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas berat';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_7) && $pernafasan_igd->pernafasan_igd_7 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas sedang';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas sedang';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($pernafasan_igd->pernafasan_igd_8) && $pernafasan_igd->pernafasan_igd_8 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas ringan';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas ringan';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" rowspan="6" class="center v-center">SIRKULASI</td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_1) && $sirkulasi_igd->sirkulasi_igd_1 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Henti Jantung';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Henti Jantung';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_2) && $sirkulasi_igd->sirkulasi_igd_2 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Teraba';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Teraba';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_3) && $sirkulasi_igd->sirkulasi_igd_3 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_4) && $sirkulasi_igd->sirkulasi_igd_4 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_5) && $sirkulasi_igd->sirkulasi_igd_5 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_6) && $sirkulasi_igd->sirkulasi_igd_6 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Tidak Ada';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Tidak Ada';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_7) && $sirkulasi_igd->sirkulasi_igd_7 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bradikardi';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bradikardi';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_8) && $sirkulasi_igd->sirkulasi_igd_8 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takikardi ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takikardi ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_9) && $sirkulasi_igd->sirkulasi_igd_9 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_10) && $sirkulasi_igd->sirkulasi_igd_10 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_11) && $sirkulasi_igd->sirkulasi_igd_11 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sianosis';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sianosis';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_12) && $sirkulasi_igd->sirkulasi_igd_12 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takikardi';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takikardi';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_13) && $sirkulasi_igd->sirkulasi_igd_13 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS > 160 ';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS > 160 ';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_14) && $sirkulasi_igd->sirkulasi_igd_14 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_15) && $sirkulasi_igd->sirkulasi_igd_15 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_16) && $sirkulasi_igd->sirkulasi_igd_16 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_17) && $sirkulasi_igd->sirkulasi_igd_17 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Pucat';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Pucat';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_18) && $sirkulasi_igd->sirkulasi_igd_18 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDD > 100';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDD > 100';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_19) && $sirkulasi_igd->sirkulasi_igd_19 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>CRT > 4 detik';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>CRT > 4 detik';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($sirkulasi_igd->sirkulasi_igd_20) && $sirkulasi_igd->sirkulasi_igd_20 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $sirkulasi_igd = json_decode($data_triase['ttd_sirkulasi_igd']);
                      if (!empty($sirkulasi_igd->sirkulasi_igd_21) && $sirkulasi_igd->sirkulasi_igd_21 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>CRT > 2 detik';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>CRT > 2 detik';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>


                  <tr>
                    <td style="border: 1px solid black" rowspan="4" class="center v-center">KESADARAN</td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $kesadaran_igd_w = json_decode($data_triase['ttd_kesadaran_igd_w']);
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_1) && $kesadaran_igd_w->kesadaran_igdd_1 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS < 8';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS < 8';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_2) && $kesadaran_igd_w->kesadaran_igdd_2 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 9-12';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 9-12';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_3) && $kesadaran_igd_w->kesadaran_igdd_3 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS ≥ 13';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS ≥ 13';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_4) && $kesadaran_igd_w->kesadaran_igdd_4 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 15';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 15';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_5) && $kesadaran_igd_w->kesadaran_igdd_5 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 15';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 15';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $kesadaran_igd_w = json_decode($data_triase['ttd_kesadaran_igd_w']);
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_6) && $kesadaran_igd_w->kesadaran_igdd_6 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Kejang';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Kejang';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_7) && $kesadaran_igd_w->kesadaran_igdd_7 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Gelisah';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Gelisah';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_8) && $kesadaran_igd_w->kesadaran_igdd_8 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Apatis';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Apatis';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_9) && $kesadaran_igd_w->kesadaran_igdd_9 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_10) && $kesadaran_igd_w->kesadaran_igdd_10 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
                      }
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      $kesadaran_igd_w = json_decode($data_triase['ttd_kesadaran_igd_w']);
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_11) && $kesadaran_igd_w->kesadaran_igdd_11 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Tidak ada respon';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Tidak ada respon';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_12) && $kesadaran_igd_w->kesadaran_igdd_12 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Hemiparesis';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Hemiparesis';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_13) && $kesadaran_igd_w->kesadaran_igdd_13 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Samnolen';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Samnolen';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center"></td>

                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_14) && $kesadaran_igd_w->kesadaran_igdd_14 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Hebat';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Hebat';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center">
                      <?php
                      if (!empty($kesadaran_igd_w->kesadaran_igdd_15) && $kesadaran_igd_w->kesadaran_igdd_15 == '1') {
                        echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Sedang';
                      } else {
                        echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Sedang';
                      }
                      ?>
                    </td>
                    <td style="border: 1px solid black" class="center"></td>
                    <td style="border: 1px solid black" class="center"></td>
                  </tr>
                </tbody>
              </table>

              <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                <thead>
                  <tr>
                    <td style="border: 1px solid black" class="center bold" colspan="7">TANDA VITAL DAN KEADAAAN UMUM</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border: 1px solid black" class="center"><b>Kesadaran</b></td>
                    <td style="border: 1px solid black" class="no__border" colspan="6">
                      <div style="display: flex; align-items: center;">
                        <?php
                        $kesadaran_igd = json_decode($data_triase['ttd_kesadaran_igd']);
                        if (!empty($kesadaran_igd->kesadaran_igd_1) && $kesadaran_igd->kesadaran_igd_1 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Composmentis';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Composmentis';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($kesadaran_igd->kesadaran_igd_2) && $kesadaran_igd->kesadaran_igd_2 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Apatis';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Apatis';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($kesadaran_igd->kesadaran_igd_3) && $kesadaran_igd->kesadaran_igd_3 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Samnolen ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Samnolen ';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($kesadaran_igd->kesadaran_igd_4) && $kesadaran_igd->kesadaran_igd_4 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sopor';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sopor';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

                        if (!empty($kesadaran_igd->kesadaran_igd_5) && $kesadaran_igd->kesadaran_igd_5 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Koma';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Koma';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td style="border: 1px solid black" class="center" rowspan="2"><b>GCS : </b></td>
                    <td style="border: 1px solid black" class="no__border" colspan="6">
                      <div style="display: flex; align-items: center; gap: 25px;">
                        <span>E : <?= $data_triase['ttd_gcs_e_igd'] ?></span>
                        <span>M : <?= $data_triase['ttd_gcs_m_igd'] ?></span>
                        <span>V : <?= $data_triase['ttd_gcs_v_igd'] ?></span>
                        <span>TOTAL : <?= $data_triase['ttd_gcs_total_igd'] ?></span>
                      </div>
                    </td>
                  </tr>


                  <tr>
                    <!-- <td style="border: 1px solid black" class="center"></td> -->
                    <td style="border: 1px solid black" class="no__border" colspan="6">
                      <div style="display: flex; align-items: center; gap: 10px;">
                        TD :
                        <?php
                        $tekanan_darah_igd = json_decode($data_triase['ttd_tekanan_darah_igd']);
                        if (!empty($tekanan_darah_igd->tekanan_darah_igd_1)) {
                          echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_1) . '</span>';
                        } else {
                          echo '<span></span>';
                        }

                        echo '<div style="width: 0px;">/</div>';

                        if (!empty($tekanan_darah_igd->tekanan_darah_igd_2)) {
                          echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_2) . ' mmHg</span>';
                        } else {
                          echo '<span></span>';
                        }

                        // Menambahkan spasi
                        echo '<div style="width: 10px;"></div>';

                        echo '<span>Suhu :</span>';
                        if (!empty($tekanan_darah_igd->tekanan_darah_igd_3)) {
                          echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_3) . ' ℃</span>';
                        } else {
                          echo '<span> - ℃</span>';
                        }

                        echo '<div style="width: 10px;"></div>';
                        ?>


                        Nadi :
                        <?php
                        $frekuensi_nadi_igd = json_decode($data_triase['ttd_frekuensi_nadi_igd']);

                        // Tampilkan tekanan darah 1
                        if (!empty($frekuensi_nadi_igd->frekuensi_igd_1)) {
                          echo '<span>' . htmlspecialchars($frekuensi_nadi_igd->frekuensi_igd_1) . ' x/mnt</span>';
                        } else {
                          echo '<span></span>';
                        }

                        // Menambahkan spasi
                        echo '<div style="width: 10px;"></div>';

                        // Tampilkan Suhu
                        echo '<span>RR :</span>';
                        if (!empty($frekuensi_nadi_igd->frekuensi_igd_2)) {
                          echo '<span>' . htmlspecialchars($frekuensi_nadi_igd->frekuensi_igd_2) . ' ℃</span>';
                        } else {
                          echo '<span>x/mnt</span>';
                        }
                        echo '<div style="width: 10px;"></div>';
                        ?>

                        SO2 :
                        <?php
                        $s_o2 = json_decode($data_triase['ttd_s_o2']);

                        // Tampilkan tekanan darah 1
                        if (!empty($s_o2->imunisasi_igd_1)) {
                          echo '<span>' . htmlspecialchars($s_o2->imunisasi_igd_1) . '%</span>';
                        } else {
                          echo '<span></span>';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>


                  <tr>
                    <td style="border: 1px solid black" class="center"><b>Imunisasi</b></td>
                    <td style="border: 1px solid black" class="no__border" colspan="6">
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <?php
                        if (!empty($s_o2->imunisasi_igd_2) && $s_o2->imunisasi_igd_2 == '1') {
                          echo '<input type="checkbox" checked>Ya';
                        } else {
                          echo '<input type="checkbox">Ya';
                        }

                        // Menambahkan spasi
                        echo '<div style="width: 10px;"></div>';


                        if (!empty($s_o2->imunisasi_igd_3) && $s_o2->imunisasi_igd_3 == '0') {
                          echo '<input type="checkbox" checked>Tidak';
                        } else {
                          echo '<input type="checkbox">Tidak';
                        }

                        echo '<div style="width: 20px;"></div>';
                        ?>

                        BB :
                        <?php
                        $tinggi_badan_igd = json_decode($data_triase['ttd_tinggi_badan_igd']);

                        if (!empty($tinggi_badan_igd->tinggi_badan_igd_1)) {
                          echo '<span>' . htmlspecialchars($tinggi_badan_igd->tinggi_badan_igd_1) . ' Kg</span>';
                        } else {
                          echo '<span></span>';
                        }

                        // Menambahkan spasi
                        echo '<div style="width: 10px;"></div>';

                        echo '<span>TB :</span>';
                        if (!empty($tinggi_badan_igd->tinggi_badan_igd_2)) {
                          echo '<span>' . htmlspecialchars($tinggi_badan_igd->tinggi_badan_igd_2) . ' ℃</span>';
                        } else {
                          echo '<span>Cm</span>';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%; border: 1px solid black">
                <thead>
                  <tr>
                    <td style="border: 1px solid black" class="center bold" colspan="5"> PEMERIKSAAN SEGITIGA ASESMEN GAWAT ANAK (SAGA)</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border: 1px solid black" class="center" colspan="2">Segitiga Asesmen Gawat Anak</td>
                    <td style="border: 1px solid black" class="center" colspan="2">Pemeriksaan Segitiga Asesmen Gawat Anak (SAGA)</td>
                  </tr>
                  <tr>
                    <td style="border: 1px solid black" class="center" colspan="2" style="vertical-align: top;">
                      <img src="<?= resource_url() ?>images/attributes/saga.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow" style="width: 180px;">
                    </td>
                    <td style="border: 1px solid black" colspan="2" style="vertical-align: top;">
                      <table width="100%" class="table table-sm table-striped table-bordered" style="border-collapse: collapse; border: 1px solid black;">
                        <tr>
                          <td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
                            <span>Tampilan</span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
                            <span>Usaha Napas</span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
                            <span>Sirkulasi</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_tampilan_saga_1'] == 1 ? 'checked' : ''; ?>> Tidak aktif bergerak</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_usaha_saga_1'] == 1 ? 'checked' : ''; ?>> Napas cuping hidung</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_sirkulasi_saga_1'] == 1 ? 'checked' : ''; ?>> Sianosis</td>
                        </tr>
                        <tr>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_tampilan_saga_2'] == 1 ? 'checked' : ''; ?>> Tidak ada interaksi dengan lingkungan</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_usaha_saga_2'] == 1 ? 'checked' : ''; ?>> Retraksi</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_sirkulasi_saga_2'] == 1 ? 'checked' : ''; ?>> Pucat</td>
                        </tr>
                        <tr>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_tampilan_saga_3'] == 1 ? 'checked' : ''; ?>> Gelisah /sulit ditenangkan</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_usaha_saga_3'] == 1 ? 'checked' : ''; ?>> Posisi tubuh abnormal (tripoding, head bobbing, sniffing, menolak berbaring)</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_sirkulasi_saga_3'] == 1 ? 'checked' : ''; ?>> Kutis marmorata</td>
                        </tr>
                        <tr>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_tampilan_saga_4'] == 1 ? 'checked' : ''; ?>> Pandangan kosong</td>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_usaha_saga_4'] == 1 ? 'checked' : ''; ?>> Suara napas abnormal (mengorok, parau, stridor, merintih)</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $data_triase['ttd_tampilan_saga_5'] == 1 ? 'checked' : ''; ?>> Tidak bersuara / tidak menangis</td>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>

                      <table width="100%" class="table table-sm table-striped table-bordered" style="border-collapse: collapse; border: 1px solid black;">
                        <tr>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_1.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 80px;"></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_2.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 65px;"></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_3.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_4.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_5.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><img src="<?= resource_url() ?>images/attributes/saga_6.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 75px;"></span>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_1'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_2'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_3'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_4'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_5'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                          <td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
                            <span><input type="checkbox" <?= $data_triase['ttd_gambarsaga_6'] == 1 ? 'checked' : ''; ?>></span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>

              <br>

              <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%; border: 1px solid black">
                <thead>
                  <tr>
                    <td style="border: 1px solid black" class="center bold" colspan="7">ASESMENT TRIAGE</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        $asesment_triage_igd = json_decode($data_triase['ttd_asesment_triage_igd']);
                        if (!empty($asesment_triage_igd->asesment_triage_1) && $asesment_triage_igd->asesment_triage_1 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>EMERGENCY';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>EMERGENCY';
                        }
                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox		

                        if (!empty($asesment_triage_igd->asesment_triage_2) && $asesment_triage_igd->asesment_triage_2 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>NON URGENT ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>NON URGENT ';
                        }

                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox								
                        if (!empty($asesment_triage_igd->asesment_triage_3) && $asesment_triage_igd->asesment_triage_3 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Potensi Resiko Khusus (Air Borne & Droplet)';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Potensi Resiko Khusus (Air Borne & Droplet)';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($asesment_triage_igd->asesment_triage_4) && $asesment_triage_igd->asesment_triage_4 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>URGENT ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>URGENT ';
                        }
                        echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox		

                        if (!empty($asesment_triage_igd->asesment_triage_5) && $asesment_triage_igd->asesment_triage_5 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>FALSE EMERGENCY ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>FALSE EMERGENCY ';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($asesment_triage_igd->asesment_triage_6) && $asesment_triage_igd->asesment_triage_6 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>DOA, Tanda Kematian : ';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>DOA, Tanda Kematian : ';
                        }
                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

                        if (!empty($asesment_triage_igd->asesment_triage_7) && $asesment_triage_igd->asesment_triage_7 != '') {
                          echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_7) . '</span>';
                        } else {
                          echo '<span></span>';  // Tidak ada data, tampilkan kosong
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

                        echo '<span>RC :</span>';
                        if (!empty($asesment_triage_igd->asesment_triage_8) && $asesment_triage_igd->asesment_triage_8 != '') {
                          echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_8) . '</span>';
                        } else {
                          echo '<span></span>';  // Tidak ada data, tampilkan kosong
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

                        echo '<span>EKG :</span>';
                        if (!empty($asesment_triage_igd->asesment_triage_9) && $asesment_triage_igd->asesment_triage_9 != '') {
                          echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_9) . '</span>';
                        } else {
                          echo '<span></span>';  // Tidak ada data, tampilkan kosong
                        }

                        echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

                        echo '<span>Jam DOA :</span>';
                        if (!empty($asesment_triage_igd->asesment_triage_10) && $asesment_triage_igd->asesment_triage_10 != '') {
                          echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_10) . '</span>';
                        } else {
                          echo '<span></span>';  // Tidak ada data, tampilkan kosong
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%; border: 1px solid black">
                <thead>
                  <tr>
                    <td style="border: 1px solid black" class="center bold" colspan="7">TINDAK LANJUT</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        $tindak_lanjut_igd = json_decode($data_triase['ttd_tindak_lanjut_igd']);
                        if (!empty($tindak_lanjut_igd->tindak_lanjut_1) && $tindak_lanjut_igd->tindak_lanjut_1 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Periksa ke Ruang pelayanan non urgent';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Periksa ke Ruang pelayanan non urgent';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($tindak_lanjut_igd->tindak_lanjut_2) && $tindak_lanjut_igd->tindak_lanjut_2 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Perawatan ke Ruang Observasi pasien semi Kritis';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Perawatan ke Ruang Observasi pasien semi Kritis';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($tindak_lanjut_igd->tindak_lanjut_3) && $tindak_lanjut_igd->tindak_lanjut_3 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Perawatan ke Ruang resusitasi/Kritis (emergent)';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Perawatan ke Ruang resusitasi/Kritis (emergent)';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="7">
                      <div style="display: flex; align-items: center;">
                        <?php
                        if (!empty($tindak_lanjut_igd->tindak_lanjut_4) && $tindak_lanjut_igd->tindak_lanjut_4 == '1') {
                          echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Perawatan Maternal';
                        } else {
                          echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Perawatan Maternal';
                        }
                        ?>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%; border: 1px solid black">
                <thead>
                  <tr>
                    <td style="border: 1px solid black" width="33%" class="center bold">Tanggal dan Jam</td>
                    <td style="border: 1px solid black" width="33%" class="center bold">Tanda Tangan Petugas Triase</td>
                    <td style="border: 1px solid black" width="33%" class="center bold">Tanda Tangan Verifikasi DPJP</td>
                  </tr>
                </thead>
                <tbody>
                  <td style="border: 1px solid black" class="center">
                    <?php
                    // Array nama hari dan bulan dalam bahasa Indonesia
                    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    $bulan = [
                      1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                    ];

                    // Tanggal contoh
                    // $data_triase['ttd_tgl_jam_perawat'] = "2024-11-25 14:30:00";
                    $tanggal = strtotime($data_triase['ttd_tgl_jam_perawat']);

                    // Format tanggal manual
                    $nama_hari = $hari[date('w', $tanggal)];
                    $tgl = date('d', $tanggal);
                    $nama_bulan = $bulan[(int)date('m', $tanggal)];
                    $tahun = date('Y', $tanggal);
                    $jam_menit = date('H:i', $tanggal);

                    ?>
                    <div>
                      Tangerang, <b><?= "$nama_hari, $tgl $nama_bulan $tahun : $jam_menit" ?></b>
                    </div>


                  </td>
                  <td style="border: 1px solid black" class="center">
                    <div>
                      <?php if (!empty($data_triase['ttd_perawat_triase'])) :
                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data_triase['ttd_perawat_triase'] . '" alt="ttd-dokter" width="200"><br>';
                      else :
                        echo '<br><br><br><br><br>';
                      endif;
                      ?>

                      ( <?= $data_triase['ttd_id_perawatt_igd']; ?>)<br>
                      Nama Petugas Triase
                    </div>
                  </td>
                  <td style="border: 1px solid black" class="center">
                    <div>
                      <?php if (!empty($data_triase['ttd_dokter_triase'])) :
                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data_triase['ttd_dokter_triase'] . '" alt="ttd-dokter" width="200"><br>';
                      else :
                        echo '<br><br><br><br><br>';
                      endif;
                      ?>

                      ( <?= $data_triase['ttd_id_dokterr_igd']; ?>)<br>
                      Nama Verifikasi DPJP
                    </div>
                  </td>

                </tbody>
              </table>
            </div>
          </section>
        </main>

        <!-- <footer class="footer">
          <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-26-04</p>
          </div>
        </footer> -->
      </div>
      <br><br>
    <?php endif ?>

    <!-- Asuhan Keperawatan HD -->
    <?php if (!empty($data_asuhan_hd)) : ?>
      <?php foreach ($data_asuhan_hd as $data) : ?>
        <div style="page-break-after: always; margin-top: -32px;">
          <table width="100%">
            <tr>
              <td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $data['hospital']->logo ?>" width="80px" height="80px"></td>
              <td width="47%">
                <b class="bold" style="font-size: 14pt;"><?= strtoupper($data['hospital']->nama) ?></b><br>
                <b class="bold" style="font-size: 8pt;"><?= strtoupper($data['hospital']->alamat) ?></b><br>
                <b class="bold" style="font-size: 9pt;">Telp. <?= $data['hospital']->telp ?>, FAX. <?= $data['hospital']->fax ?> Email : <?= $data['hospital']->email ?></b>
              </td>
              <td width="38%">
                <!-- <div class="box-identitas" style="border: 1px solid black; border-radius: 10px; padding: 10px;"> -->
                <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 5px;">

                  <table width="100%" style="border-collapse: collapse;">
                    <tr>
                      <td width="30%">No. RM</td>
                      <td width="1%">:</td>
                      <td width="69%" class="bold"><?= $data['pasien']->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td class="bold"><?= $data['pasien']->nama ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Lahir</td>
                      <td>:</td>
                      <td class="bold"><?= ($data['pasien']->tanggal_lahir !== '' ? datefmysql($data['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data['pasien']->tanggal_lahir) ?> Tahun)</td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td>:</td>
                      <td class="bold"><?= ($data['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td class="bold"><?= $data['pasien']->agama ?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
          <!-- <br> -->
          <h3 class="bold center">ASUHAN KEPERAWATAN PASIEN HEMODIALISA</h3>
          <div class="table-asuhan-hd">
            <table width="100%" class="table-data" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
              <tr>
                <td style="border: 1px solid black;" width="25%">Tanggal/Jam</td>
                <td style="border: 1px solid black;" width="25%" class="bold"><?= $data['asuhan_keperawatan']->waktu ?></td>
                <td style="border: 1px solid black;" width="25%">Dx. Medis</td>
                <?php $ex_diag = explode(' ', $data['asuhan_keperawatan']->dx_medis) ?>
                <td style="border: 1px solid black;" width="25%" class="bold"><?= $ex_diag[0] ?></td>
              </tr>
              <tr>
                <td>No. Mesin</td>
                <td style="border: 1px solid black;" class="bold"><?= $data['asuhan_keperawatan']->no_mesin ?></td>
                <td>Hemodialisa Ke</td>
                <td style="border: 1px solid black;" class="bold"><?= $data['asuhan_keperawatan']->hemodialisa_ke ?></td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" class="center bold" colspan="4">PENGKAJIAN KEPERAWATAN</td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4" class="bold">
                  <!-- ubah json menjadi array -->
                  <?php $keluhan_utama = json_decode($data['asuhan_keperawatan']->keluhan_utama) ?>

                  Keluhan Utama :
                  <input type="checkbox" <?= ($keluhan_utama->sesak_nafas !== '' ? 'checked' : '') ?>>Sesak Nafas
                  <input type="checkbox" <?= ($keluhan_utama->mual !== '' ? 'checked' : '') ?>>Mual
                  <input type="checkbox" <?= ($keluhan_utama->muntah !== '' ? 'checked' : '') ?>>Muntah
                  <input type="checkbox" <?= ($keluhan_utama->gatal !== '' ? 'checked' : '') ?>>Gatal
                  <input type="checkbox" <?= ($keluhan_utama->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain :
                  <?= ($keluhan_utama->lain_lain !== '' ? $keluhan_utama->ket_lain_lain : '') ?>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="margin: 1px;" width="28%">Riwayat Penyakit Sekarang</td>
                      <td style="margin: 1px;" width="1%">:</td>
                      <td style="margin: 1px;" width="82%" style="padding-bottom: 5px" class="dotted-underline bold"><?= $data['asuhan_keperawatan']->riwayat_penyakit_sekarang ?></td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Riwayat Penyakit Dahulu</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <!-- ubah json menjadi array -->
                        <?php $riwayat_penyakit_dahulu = json_decode($data['asuhan_keperawatan']->riwayat_penyakit_dahulu) ?>

                        <input type="checkbox" <?= ($riwayat_penyakit_dahulu->asma !== '' ? 'checked' : '') ?>>Asma
                        <input type="checkbox" <?= ($riwayat_penyakit_dahulu->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi
                        <input type="checkbox" <?= ($riwayat_penyakit_dahulu->jantung !== '' ? 'checked' : '') ?>>Jantung
                        <input type="checkbox" <?= ($riwayat_penyakit_dahulu->diabetes !== '' ? 'checked' : '') ?>>Diabetes
                        <input type="checkbox" <?= ($riwayat_penyakit_dahulu->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain :
                        <?= ($riwayat_penyakit_dahulu->lain_lain !== '' ? $riwayat_penyakit_dahulu->ket_lain_lain : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Riwayat Penyakit Keluarga</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <!-- ubah json menjadi array -->
                        <?php $riwayat_penyakit_keluarga = json_decode($data['asuhan_keperawatan']->riwayat_penyakit_keluarga) ?>

                        <input type="checkbox" <?= ($riwayat_penyakit_keluarga->asma !== '' ? 'checked' : '') ?>>Asma
                        <input type="checkbox" <?= ($riwayat_penyakit_keluarga->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi
                        <input type="checkbox" <?= ($riwayat_penyakit_keluarga->jantung !== '' ? 'checked' : '') ?>>Jantung
                        <input type="checkbox" <?= ($riwayat_penyakit_keluarga->diabetes !== '' ? 'checked' : '') ?>>Diabetes
                        <input type="checkbox" <?= ($riwayat_penyakit_keluarga->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain :
                        <?= ($riwayat_penyakit_keluarga->lain_lain !== '' ? $riwayat_penyakit_keluarga->ket_lain_lain : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <?php $kebiasaan = json_decode($data['asuhan_keperawatan']->kebiasaan) ?>
                      <td style="margin: 1px;">Kebiasaan</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        Merokok :
                        <input type="checkbox" <?= ($kebiasaan->merokok->hasil === '0' ? 'checked' : '') ?>>Tidak
                        <input type="checkbox" <?= ($kebiasaan->merokok->hasil === '1' ? 'checked' : '') ?>>Ya,
                        <?= ($kebiasaan->merokok->ket_hasil !== '' ? $kebiasaan->merokok->ket_hasil . ' Batang/hari' : '') ?>
                        <span style="margin-left: 50px"></span> Alkohol &nbsp;&nbsp;:
                        <input type="checkbox" <?= ($kebiasaan->alkohol->hasil === '0' ? 'checked' : '') ?>>Tidak
                        <input type="checkbox" <?= ($kebiasaan->alkohol->hasil === '1' ? 'checked' : '') ?>>Ya,
                        <?= ($kebiasaan->alkohol->ket_hasil !== '' ? $kebiasaan->alkohol->ket_hasil . 'Gelas/hari' : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;"></td>
                      <td style="margin: 1px;"></td>
                      <td style="margin: 1px;">
                        Narkoba :
                        <input type="checkbox" <?= ($kebiasaan->narkoba->hasil === '0' ? 'checked' : '') ?>>Tidak
                        <input type="checkbox" <?= ($kebiasaan->narkoba->hasil === '1' ? 'checked' : '') ?>>Ya,
                        <?= ($kebiasaan->narkoba->ket_hasil !== '' ? $kebiasaan->narkoba->ket_hasil . '' : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Alergi</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <!-- ubah json menjadi array -->
                        <?php $alergi = json_decode($data['asuhan_keperawatan']->alergi) ?>

                        <input type="checkbox" <?= ($alergi->hasil === 'Tidak' ? 'checked' : '') ?>>Tidak
                        <input type="checkbox" <?= ($alergi->hasil === 'Tidak Tahu' ? 'checked' : '') ?>>Tidak Tahu
                        <input type="checkbox" <?= ($alergi->hasil === 'Ya' ? 'checked' : '') ?>>Ya,
                        <?= ($alergi->hasil === 'Ya' ? $alergi->ket_hasil : '') ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4">
                  <table width="100%" class="table-no-border table-asuhan-hd">
                    <tr>
                      <td style="padding: 0px;" class="bold">RIWAYAT PSIKOSOSIAL :</td>
                    </tr>
                    <tr>
                      <td style="padding: 0px;" width="28%">Hubungan pasien dengan keluarga</td>
                      <td style="padding: 0px;" width="1%">:</td>
                      <td style="padding: 0px;" wdiht="82%">
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->hubungan_pasien_dengan_keluarga === 'Baik' ? 'checked' : '') ?>>Baik
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->hubungan_pasien_dengan_keluarga === 'Tidak Baik' ? 'checked' : '') ?>>Tidak Baik
                      </td>
                    </tr>
                  </table>
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="padding: 0px;" width="15%">Status Psikologis</td>
                      <td style="padding: 0px;" width="1%">:</td>
                      <td style="padding: 0px;" width="84%">
                        <!-- ubah json menjadi array -->
                        <?php $status_psikologis = json_decode($data['asuhan_keperawatan']->status_psikologis) ?>

                        <input type="checkbox" <?= ($status_psikologis->tenang !== '' ? 'checked' : '') ?>>Tenang
                        <input type="checkbox" <?= ($status_psikologis->cemas !== '' ? 'checked' : '') ?>>Cemas
                        <input type="checkbox" <?= ($status_psikologis->marah !== '' ? 'checked' : '') ?>>Marah
                        <input type="checkbox" <?= ($status_psikologis->sedih !== '' ? 'checked' : '') ?>>Sedih
                        <input type="checkbox" <?= ($status_psikologis->bunuh_diri !== '' ? 'checked' : '') ?>>Kecenderungan Bunuh Diri
                        <input type="checkbox" <?= ($status_psikologis->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain :
                        <?= ($status_psikologis->lain_lain !== '' ? $status_psikologis->ket_lain_lain : '') ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="margin: 1px;" class="bold">STATUS EKONOMI DAN SOSIAL :</td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;" width="28%">Pekerjaan</td>
                      <td style="margin: 1px;" width="1%">:</td>
                      <td style="margin: 1px;" wdiht="82%"><?= $data['pasien']->pekerjaan ?></td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Cara Pembayaran</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;"><?= ($data['layanan']->cara_bayar !== 'Tunai' ? strtoupper($data['layanan']->cara_bayar) . '( ' . $data['layanan']->penjamin . ')'  : strtoupper($data['layanan']->cara_bayar)) ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="margin: 1px;" class="bold">RIWAYAT PSIKOSOSIAL :</td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Kegiatan keagamaan yang biasa dilakukan : <?= $data['asuhan_keperawatan']->kebiasaan_keagamaan ?></td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Kemampuan beribadah (Khusus Muslim)</td>
                    </tr>
                  </table>
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="margin: 1px;" width="15%">Wajib Ibadah</td>
                      <td style="margin: 1px;" width="1%">:</td>
                      <td style="margin: 1px;" width="84%">
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->wajib_ibadah === 'Baligh' ? 'checked' : '') ?>>Baligh
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->wajib_ibadah === 'Belum Baligh' ? 'checked' : '') ?>>Belum Baligh
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->wajib_ibadah === 'Halangan Lain' ? 'checked' : '') ?>>Halangan Lain,
                        <?= ($data['asuhan_keperawatan']->wajib_ibadah === 'Halangan Lain' ? '' . $data['asuhan_keperawatan']->halangan_lain . '' : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Thaharoh</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->thaharoh === 'Berwudhu' ? 'checked' : '') ?>>Berwudhu
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->thaharoh === 'Tayamum' ? 'checked' : '') ?>>Tayamum
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Sholat</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->shalat === 'Berdiri' ? 'checked' : '') ?>>Berdiri
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->shalat === 'Duduk' ? 'checked' : '') ?>>Duduk
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->shalat === 'Berbaring' ? 'checked' : '') ?>>Berbaring
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td style="margin: 1px;" colspan="3" class="bold">PEMERIKSAAN FISIK :</td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;" width="15%">Kesadaran</td>
                      <td style="margin: 1px;" width="1%">:</td>
                      <td style="margin: 1px;" width="84%">
                        <!-- ubah json menjadi array -->
                        <?php $kesadaran = json_decode($data['asuhan_keperawatan']->kesadaran) ?>

                        <input type="checkbox" <?= ($kesadaran->composmentis !== '' ? 'checked' : '') ?>>Composmentis
                        <input type="checkbox" <?= ($kesadaran->apatis !== '' ? 'checked' : '') ?>>Apatis
                        <input type="checkbox" <?= ($kesadaran->delirium !== '' ? 'checked' : '') ?>>Delirium
                        <input type="checkbox" <?= ($kesadaran->samnolen !== '' ? 'checked' : '') ?>>Samnolen
                        <input type="checkbox" <?= ($kesadaran->sopor !== '' ? 'checked' : '') ?>>Sopor
                        <input type="checkbox" <?= ($kesadaran->coma !== '' ? 'checked' : '') ?>>Coma
                        <input type="checkbox" <?= ($kesadaran->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain :
                        <?= ($kesadaran->lain_lain !== '' ? $kesadaran->ket_lain_lain : '') ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Tensi Darah</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;" style="padding-bottom: 5px">
                        <?= $data['asuhan_keperawatan']->tensi ?>mmHg
                        <span style="margin-left:50px"></span> Nadi : <?= $data['asuhan_keperawatan']->nadi ?>x/menit
                        <span style="margin-left:50px"></span> Pernafasan : <?= $data['asuhan_keperawatan']->nafas ?>x/menit
                        <span style="margin-left:50px"></span> Suhu : <?= $data['asuhan_keperawatan']->suhu ?>&#8451;
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Konjung tiva</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->konjungtiva === '1' ? 'checked' : '') ?>>Anemis
                        <input type="checkbox" <?= ($data['asuhan_keperawatan']->konjungtiva === '0' ? 'checked' : '') ?>>Tidak Anemis
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Ekstermitas</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <?php $ekstermitas = json_decode($data['asuhan_keperawatan']->ekstermitas) ?>

                        <input type="checkbox" <?= ($ekstermitas->tidak_edema !== '' ? 'checked' : '') ?>>Tidak Edema
                        <input type="checkbox" <?= ($ekstermitas->dehidrasi !== '' ? 'checked' : '') ?>>Dehidrasi
                        <input type="checkbox" <?= ($ekstermitas->edema !== '' ? 'checked' : '') ?>>Edema
                        <input type="checkbox" <?= ($ekstermitas->edema_anasarka !== '' ? 'checked' : '') ?>>Edema Anasarka
                        <input type="checkbox" <?= ($ekstermitas->pucat_dingin !== '' ? 'checked' : '') ?>>Pucat Dingin
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Berat Badan</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;" style="padding-bottom: 5px">
                        Pre HD : <?= $data['asuhan_keperawatan']->bb_pre_hd ?>Kg
                        <span style="margin-left: 50px"></span> BBK : <?= $data['asuhan_keperawatan']->bb_bbk ?>Kg
                        <span style="margin-left: 50px"></span> Post HD yang lalu : <?= $data['asuhan_keperawatan']->bb_post_hd_lalu ?>Kg
                        <span style="margin-left: 50px"></span> BB Post <HDr></HDr> : <?= $data['asuhan_keperawatan']->bb_post_hd ?>Kg
                      </td>
                    </tr>
                    <tr>
                      <td style="margin: 1px;">Akses Vaskuler</td>
                      <td style="margin: 1px;">:</td>
                      <td style="margin: 1px;">
                        <?php $akses_vaskuler = json_decode($data['asuhan_keperawatan']->akses_vaskuler) ?>

                        <input type="checkbox" <?= ($akses_vaskuler->av_fistula !== '' ? 'checked' : '') ?>>AV Fistula
                        <input type="checkbox" <?= ($akses_vaskuler->hd_kateter !== '' ? 'checked' : '') ?>>HD Kateter
                        <input type="checkbox" <?= ($akses_vaskuler->subciavia !== '' ? 'checked' : '') ?>>Subciavia
                        <input type="checkbox" <?= ($akses_vaskuler->jugular !== '' ? 'checked' : '') ?>>Jugular
                        <input type="checkbox" <?= ($akses_vaskuler->femoral !== '' ? 'checked' : '') ?>>Femoral
                        <span style="margin-left: 50px"></span>Lokasi :
                        <input type="checkbox" <?= ($akses_vaskuler->lokasi->kanan !== '' ? 'checked' : '') ?>>Kanan
                        <input type="checkbox" <?= ($akses_vaskuler->lokasi->kiri !== '' ? 'checked' : '') ?>>Kiri
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <tr>
                <td style="border: 1px solid black;" class="center bold" colspan="2">PENILAIAN TINGKAT NYERI</td>
                <td style="border: 1px solid black;" class="center bold" colspan="2">SKRINING NUTRISI (Mainutrition Screening Tool Modifikasi)</td>
              </tr>
              <tr>
                <td width="30%" style="border: 1px solid black;" class="center" colspan="2"><img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png" width="100%" height="15%"></td>
                <td style="border: 1px solid black;" colspan="2" rowspan="2">
                  <table width="100%">
                    <tr>
                      <td style="margin:0px" width="85%">Apakaah pasien mengalami penurunan berat badan yang tidak direncanakan / tidak disengaja dalam 6 bulan terakhir</td>
                      <td style="margin:0px; border-left: 1.5px solid black"></td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan === '1' ? 'checked' : '') ?>>Tidak</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 0</td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan === '2' ? 'checked' : '') ?>>Tidak Yakin</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 2</td>
                    </tr>
                    <tr>
                      <td style="margin:0px;"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan === '3' ? 'checked' : '') ?>>Ya, ada penurunan berat BB sebanyak :</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black"></td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan_on === '1' ? 'checked' : '') ?> style="margin-left: 20px">1 - 5 Kg</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 1</td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan_on === '2' ? 'checked' : '') ?> style="margin-left: 20px">6 - 10 Kg</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 2</td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan_on === '3' ? 'checked' : '') ?> style="margin-left: 20px">11 - 15 Kg</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 3</td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan_on === '4' ? 'checked' : '') ?> style="margin-left: 20px">> 15 Kg</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 4</td>
                    </tr>
                    <tr>
                      <td style="margin:0px"><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_penurunan_berat_badan_on === '5' ? 'checked' : '') ?> style="margin-left: 20px">Tidak tahu berapa Kg penurunannya</td>
                      <td class="center" style="margin: 0px; border-left: 1.5px solid black">Skor 2</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="2" rowspan="2" style="vertical-align: top">
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->penilaian_tingkat_nyeri === 'Tidak Nyeri' ? 'checked' : '') ?>>Tidak Ada Nyeri
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->penilaian_tingkat_nyeri === 'Nyeri Kronis' ? 'checked' : '') ?>>Nyeri Kronis
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->penilaian_tingkat_nyeri === 'Nyeri Akut' ? 'checked' : '') ?>>Nyeri Akut<br>
                  Skala Nyeri :<?= $data['asuhan_keperawatan']->skala_nyeri ?>
                  Lokasi : <?= $data['asuhan_keperawatan']->lokasi_skala_nyeri ?><br>
                  Keterangan : <br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->keterangan_tingkat_nyeri === '1' ? 'checked' : '') ?>>Ringan : 0-3<br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->keterangan_tingkat_nyeri === '2' ? 'checked' : '') ?>>Sedang : 4-6<br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->keterangan_tingkat_nyeri === '3' ? 'checked' : '') ?>>Berat : 7-10
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="2" rowspan="2">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td width="85%">Apakah asupan makan pasien berkurang karena penurunan nafsu makan (atau karena kesulitan menerima makanan) ?</td>
                      <td style="border-left: 1.5px solid black"></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_asupan_makan === '0' ? 'checked' : '') ?>>Tidak</td>
                      <td class="center" style="border-left: 1.5px solid black">Skor 0</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" <?= ($data['asuhan_keperawatan']->sn_asupan_makan === '1' ? 'checked' : '') ?>>Ya</td>
                      <td class="center" style="border-left: 1.5px solid black">Skor 1</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="2" rowspan="3" style="vertical-align: text-top; border: 1px solid black;" class="bold">STATUS FUNGSIONAL :<br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->status_fungsional === '1' ? 'checked' : '') ?>>Mandiri<br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->status_fungsional === '2' ? 'checked' : '') ?>>Perlu Bantuan,
                  <?= ($data['asuhan_keperawatan']->status_fungsional === '2' ? $data['asuhan_keperawatan']->sf_ket_perlu_bantuan : '') ?><br>
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->status_fungsional === '3' ? 'checked' : '') ?>>Ketergantungan total, dilaporkan ke dokter pukul
                  <?= ($data['asuhan_keperawatan']->status_fungsional === '3' ? $data['asuhan_keperawatan']->sf_ket_ketergantungan : '') ?>
                </td>
              </tr>
              <tr>
                <td style=" border: 1px solid black;" colspan="2">
                  <table width="100%" class="table-no-border">
                    <tr>
                      <td width="85%" class="bold">TOTAL</td>
                      <td class="center" style="border-left: 1.5px solid black">Skor <?= $data['asuhan_keperawatan']->total_sn ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style=" border: 1px solid black;" colspan="2">
                  Jika skor ≥ 2 : pasien mengalami resiko gizi kurang<br>Jika skor < 2 dengan jenis penyakit tertentu<br>(dilaporkan ke dokter jaga ruangan / DPJP untuk konfirmasi ke dietisin)
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4"><span class="bold">SKRINING RESIKO CEDERA / JATUH</span><br>
                  a. Perhatikan cara berjalan pasien saat akan duduk di kursi. Apakah pasien tampak seimbang (sempoyongan/limbung) ?
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_a === '1' ? 'checked' : '') ?>>Ya
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_a === '0' ? 'checked' : '') ?>>Tidak<br>
                  b. Apakah pasien memegang pinggiran kursi atau meja atau beda lain sebagai penopang saat akan duduk ?
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_b === '1' ? 'checked' : '') ?>>Ya
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_b === '0' ? 'checked' : '') ?>>Tidak<br>
                  Hasil :
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_hasil === '1' ? 'checked' : '') ?>>Tidak beresiko (tidak ditemukan a dan b)
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_hasil === '2' ? 'checked' : '') ?>>Resiko rendah (ditemukan a atau b)
                  <input type="checkbox" <?= ($data['asuhan_keperawatan']->src_hasil === '3' ? 'checked' : '') ?>>Resiko tinggi (ditemukan a dan b)

                </td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" colspan="4" class="bold">
                  Pemeriksaan Penunjang (lab, Rx, lain-lain) <?= $data['asuhan_keperawatan']->pemeriksaan_penunjang ?>
                </td>
              </tr>
            </table>
          </div>

          <div style="page-break-before: always;">
            <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
              <tr>
                <td style="border: 1px solid black;" class="center bold" colspan="4">DIAGNOSA KEPERAWATAN</td>
              </tr>
            </table>
          </div>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: -1px">
            <tr>
              <td style="border: 1px solid black;" width="33%">
                <!-- ubah json menjadi array -->
                <?php $diag = json_decode($data['asuhan_keperawatan']->diagnosa_keperawatan) ?>

                <input type="checkbox" <?= ($diag->diag_keperawatan_1 !== '' ? 'checked' : '') ?>>1. Kelebihan volume cairan <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_2 !== '' ? 'checked' : '') ?>>2. Gangguan perfusi jaringan <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_3 !== '' ? 'checked' : '') ?>>3. Gangguan keseimbangan elektrolit
              </td>
              <td style="border: 1px solid black;" width="33%">
                <input type="checkbox" <?= ($diag->diag_keperawatan_4 !== '' ? 'checked' : '') ?>>4. Penurunan curah jantung <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_5 !== '' ? 'checked' : '') ?>>5. Nutrisi kurang dari kebutuhan tubuh <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_6 !== '' ? 'checked' : '') ?>>6. Ketidakpatuhan terhadap diit
              </td>
              <td style="border: 1px solid black;" width="34%">
                <input type="checkbox" <?= ($diag->diag_keperawatan_7 !== '' ? 'checked' : '') ?>>7. Gangguan keseimbangan asam basa <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_8 !== '' ? 'checked' : '') ?>>8. Gangguan rasa nyaman : nyeri <br>
                <input type="checkbox" <?= ($diag->diag_keperawatan_9 !== '' ? 'checked' : '') ?>>
                <?= ($diag->diag_keperawatan_9 !== '' ? $diag->diag_keperawatan_lain : '') ?>
              </td>
            </tr>
          </table>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black;">
            <tr>
              <td style="border: 1px solid black;" class="center bold" colspan="2">INTERVENSI KEPERAWATAN (rekapitulasi pre, intra dan post HD)</td>
            </tr>
            <tr style="vertical-align: top">
              <td style="border: 1px solid black;" width="50%">
                <?php $inv = json_decode($data['asuhan_keperawatan']->intervensi_keperawatan) ?>

                <input type="checkbox" <?= ($inv->intervensi_keperawatan_1   !== '' ? 'checked' : '') ?>>Monitor berat badan, intake output <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_3 !== '' ? 'checked' : '') ?>>Atur Posisi pasien agar ventilasi adekuat <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_5 !== '' ? 'checked' : '') ?>>Berikan terapi oksigen sesuai kebutuhan <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_7 !== '' ? 'checked' : '') ?>>Obervasi pasien (Monitor vital sign) dan mesin <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_9 !== '' ? 'checked' : '') ?>>Hentikan HD sesuai indikasi <br>
              </td>
              <td style="border: 1px solid black;" width="50%">
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_2 !== '' ? 'checked' : '') ?>>Monitor tanda dan gejala infeksi (lokal dan sistemik)<br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_4 !== '' ? 'checked' : '') ?>>Ganti balutan luka sesuai dengan prosedur <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_6 !== '' ? 'checked' : '') ?>>Monitor tanda dan gejala hipoglikemi <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_8 !== '' ? 'checked' : '') ?>>Lakukan teknik distraksi, relaksasi <br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_10 !== '' ? 'checked' : '') ?>>Bila pasien mulai hipotensi (mual, muntah, keringat dingin, pusing, kram, hipoglikemi berikan cairan sesuai SPO <br>

              </td>
            </tr>
            <tr style="vertical-align: top">
              <td style="border: 1px solid black;">
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_11   !== '' ? 'checked' : '') ?>>Kaji kemampuan pasien mendapatkan nutrisi yang dibutuhkan<br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_13   !== '' ? 'checked' : '') ?>>Poisikan Supinasi dengan Elevasi Kepala 30&deg; dan Elevasi Kaki<br>
              </td>
              <td style="border: 1px solid black;">
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_12   !== '' ? 'checked' : '') ?>>PENKES : Diit, AV-shunt
                <?= ($inv->intervensi_keperawatan_12 !== '' ? $inv->intervensi_keperawatan_av_shunt : '') ?><br>
                <input type="checkbox" <?= ($inv->intervensi_keperawatan_14   !== '' ? 'checked' : '') ?>>Lain - lain :
                <?= ($inv->intervensi_keperawatan_14 !== '' ? $inv->intervensi_keperawatan_lain : '') ?>
              </td>
            </tr>
            <tr>
              <td style="border: 1px solid black;" colspan="2">
                <span class="bold">Intervensi Kolaborasi :</span><br>
                <!-- ubah json menjadi array -->
                <?php $intervensi_kolaborasi = json_decode($data['asuhan_keperawatan']->intervensi_kolaborasi) ?>

                <input type="checkbox" <?= ($intervensi_kolaborasi->program_hd !== '' ? 'checked' : '') ?>>Program HD
                <input type="checkbox" <?= ($intervensi_kolaborasi->transfusi_darah !== '' ? 'checked' : '') ?>>Transfusi Darah
                <input type="checkbox" <?= ($intervensi_kolaborasi->kolaborasi_diit !== '' ? 'checked' : '') ?>>Kolaborasi diit
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_ga_glueonas !== '' ? 'checked' : '') ?>>Pemberian Ga Glueonas
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antipiretik !== '' ? 'checked' : '') ?>>Pemberian Antipiretik
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_analgetik !== '' ? 'checked' : '') ?>>Pemberian Analgetik <br>
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_erytropoetin !== '' ? 'checked' : '') ?>>Pemberian Erytropoetin
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_preparat_besi !== '' ? 'checked' : '') ?>>Pemberian Preparat Besi
                <input type="checkbox" <?= ($intervensi_kolaborasi->obat_obat_emergensi !== '' ? 'checked' : '') ?>>Obat obat emergensi
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antibiotik !== '' ? 'checked' : '') ?>>Pemberian antibiotik
                <input type="checkbox" <?= ($intervensi_kolaborasi->pemberian_antibiotik !== '' ? 'checked' : '') ?>>Lain - lain :
                <?= ($intervensi_kolaborasi->antibiotik !== '' ? $intervensi_kolaborasi->antibiotik : '') ?>
              </td>
            </tr>
          </table>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: -1px">
            <tr>
              <td style="border: 1px solid black;" colspan="2">
                <span class="bold">Intruksi Medik :</span><br>
                <?php $intruksi_medik = json_decode($data['asuhan_keperawatan']->intruksi_medik) ?>

                <input type="checkbox" <?= ($intruksi_medik->inisiasi !== '' ? 'checked' : '') ?>>Inisiasi
                <input type="checkbox" <?= ($intruksi_medik->akut !== '' ? 'checked' : '') ?> style="margin-left: 50px">Akut
                <input type="checkbox" <?= ($intruksi_medik->rutin !== '' ? 'checked' : '') ?> style="margin-left: 50px">Rutin
                <input type="checkbox" <?= ($intruksi_medik->pre_op !== '' ? 'checked' : '') ?> style="margin-left: 50px">Pre Op
                <input type="checkbox" <?= ($intruksi_medik->sled !== '' ? 'checked' : '') ?> style="margin-left: 50px">Sled <br>

                <input type="checkbox" <?= ($data['asuhan_keperawatan']->im_time !== '' ? 'checked' : '') ?>>Time
                <?= ($data['asuhan_keperawatan']->im_time !== '' ? $data['asuhan_keperawatan']->im_time : ' - ') ?>
                <span style="margin-left: 20px"></span> QB :<?= ($data['asuhan_keperawatan']->im_qb !== '' ? $data['asuhan_keperawatan']->im_qb : ' - ') ?>ml/mnt
                <span style="margin-left: 20px"></span> QD :<?= ($data['asuhan_keperawatan']->im_qd !== '' ? $data['asuhan_keperawatan']->im_qd : ' - ') ?>ml/mnt
                <span style="margin-left: 20px"></span> UF Goal :<?= ($data['asuhan_keperawatan']->im_uf_goal !== '' ? $data['asuhan_keperawatan']->im_uf_goal : ' - ') ?>ml <br>

                <input type="checkbox" <?= ($data['asuhan_keperawatan']->im_profile_hd !== '' ? 'checked' : '') ?>>Profile HD :
                <?= ($data['asuhan_keperawatan']->im_profile_hd !== '' ? $data['asuhan_keperawatan']->im_profile_hd : ' - ') ?>
              </td>
              <td style="border: 1px solid black; vertical-align: top">
                <?php $im_dialisat = json_decode($data['asuhan_keperawatan']->im_dialisat) ?>

                Dialisat : <input type="checkbox" <?= ($im_dialisat->bicarbonat !== '' ? 'checked' : '') ?>>Bicarbonat<br>
                <span style="margin-left: 44px"></span><input type="checkbox" <?= ($im_dialisat->condusctivity !== '' ? 'checked' : '') ?>>Condusctivity<br>
                <span style="margin-left: 44px"></span><input type="checkbox" <?= ($im_dialisat->temperatur !== '' ? 'checked' : '') ?>>Temperatur
              </td>
            </tr>
            <tr>
              <td width="33%" style="border: 1px solid black; vertical-align: top">
                <input type="checkbox" <?= ($data['asuhan_keperawatan']->heparin === '1' ? 'checked' : '') ?>>Free Heparin <br>
                <input type="checkbox" <?= ($data['asuhan_keperawatan']->heparin === '2' ? 'checked' : '') ?>>Reguler Heparin <br>
                <input type="checkbox" <?= ($data['asuhan_keperawatan']->heparin === '3' ? 'checked' : '') ?>>Minimal Heparin
              </td>
              <td style="border: 1px solid black;" width="33%">
                <table width="100%" class="table-no-border">
                  <tr>
                    <td class="pd5" widht="50%">Heparin Dosis Awal</td>
                    <td class="pd5" width="1%">:</td>
                    <td class="pd5" width="49%"><?= ($data['asuhan_keperawatan']->heparin_dosis_awal !== '' ? $data['asuhan_keperawatan']->heparin_dosis_awal : ' - ') ?>iu</td>
                  </tr>
                  <tr>
                    <td class="pd5">Heparin Sirkulasi</td>
                    <td class="pd5">:</td>
                    <td class="pd5"><?= ($data['asuhan_keperawatan']->heparin_dosis_sirkulasi !== '' ? $data['asuhan_keperawatan']->heparin_dosis_sirkulasi : ' - ') ?>iu</td>
                  </tr>
                  <tr>
                    <td class="pd5">Heparin Maintenance</td>
                    <td class="pd5">:</td>
                    <td class="pd5"><?= ($data['asuhan_keperawatan']->heparin_dosis_maintenance !== '' ? $data['asuhan_keperawatan']->heparin_dosis_maintenance : ' - ') ?>iu</td>
                  </tr>
                  <tr>
                    <td class="pd5 center">Total</td>
                    <td class="pd5">:</td>
                    <td class="pd5"><?= ($data['asuhan_keperawatan']->heparin_dosis_total !== '' ? $data['asuhan_keperawatan']->heparin_dosis_total : ' - ') ?>iu</td>
                  </tr>
                </table>
              </td>
              <td width="33%" style="vertical-align: top">
                <?php $im_dialiser = json_decode($data['asuhan_keperawatan']->im_dialiser) ?>

                Dialiser : <input type="checkbox" <?= ($im_dialiser->dialiser === 'Baru' ? 'checked' : '') ?>>Baru
                <span style="margin-left: 30px"></span><input type="checkbox" <?= ($im_dialiser->dialiser === 'Reuse' ? 'checked' : '') ?>>Reuse Ke<?= ($im_dialiser->dialiser === 'Reuse' ? $im_dialiser->ket_dialiser_reuse : ' - ') ?><br>
                <span style="margin-left: 44px"></span><input type="checkbox" <?= ($im_dialiser->dialiser === 'TCV' ? 'checked' : '') ?>>TCV<?= ($im_dialiser->dialiser === 'TCV' ? $im_dialiser->ket_dialiser_tcv : ' - ') ?><br>

                Tipe Dialiser : <input type="checkbox" <?= ($data['asuhan_keperawatan']->im_dialiser_tipe === 'High Flux' ? 'checked' : '') ?>>High Flux
                <input type="checkbox" <?= ($data['asuhan_keperawatan']->im_dialiser_tipe === 'Low Flux' ? 'checked' : '') ?>>Low Flux
              </td>
            </tr>
            <tr>
              <td style="border: 1px solid black;" class="center bold" colspan="3">TINDAKAN KEPERAWATAN</td>
            </tr>
          </table>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: -1px">
            <thead>
              <tr>
                <td style="border: 1px solid black;" class="center v-center bold" rowspan="2" width="10%">Observasi</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="10%">Jam</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">QB</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">UFR</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="10" width="7%">TD</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">N</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">RR</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">Suhu</td>
                <td style="border: 1px solid black;" class="center v-center" colspan="4" width="5%">Inake (ml)</td>
                <td style="border: 1px solid black;" class="center v-center" colspan="2" width="5%">Output</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="20%" style="white-space: nowrap">Keterangan Lain</td>
                <td style="border: 1px solid black;" class="center v-center" rowspan="2" width="5%">Paraf</td>
              </tr>
              <tr>
                <td style="border: 1px solid black;" class="center v-center" width="8%">Nacl<br>0,9%</td>
                <td style="border: 1px solid black;" class="center v-center" width="8%">Dextrose<br>40%</td>
                <td style="border: 1px solid black;" class="center v-center" width="8%">Makan<br>Minum</td>
                <td style="border: 1px solid black;" class="center v-center" width="8%">Lain-<br>lain</td>
                <td style="border: 1px solid black;" class="center v-center" width="8%">UF<br>Tercapai</td>
                <td style="border: 1px solid black;" class="center v-center" width="8%">Lain-<br>lain</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="border: 1px solid black;" class="center v-center bold"><?= $data['asuhan_keperawatan']->pre_hd->jenis_observasi ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_jam ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_qb ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_ufr ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_td ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_n ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_rr ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->observasi_suhu ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->intake_nacl ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->intake_dextrose ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->intake_makan_minum ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->intake_lain_lain ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->output_uf_tercapai ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->pre_hd->output_lain_lain ?></td>

                <?php $ket_pre_hd = json_decode($data['asuhan_keperawatan']->pre_hd->keterangan_lain) ?>
                <td style="border: 1px solid black;" class="bold v-center">
                  S : <?= $ket_pre_hd->subject ?><br>
                  O : <?= $ket_pre_hd->objective ?><br>
                  A : <?= $ket_pre_hd->assessment ?><br>
                  P : <?= $ket_pre_hd->plan ?><br>
                </td>

                <td style="border: 1px solid black;" class="center v-center"><input type="checkbox" <?= ($data['asuhan_keperawatan']->pre_hd->paraf !== '' ? 'checked' : '') ?>></td>
              </tr>
              <?php foreach ($data['asuhan_keperawatan']->intra_hd as $key => $intra_hd) : ?>
                <tr>
                  <td style="border: 1px solid black;" class="center v-center bold" rowspan=""><?= $intra_hd->jenis_observasi ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_jam ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_qb ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_ufr ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_td ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_n ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_rr ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->observasi_suhu ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->intake_nacl ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->intake_dextrose ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->intake_makan_minum ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->intake_lain_lain ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->output_uf_tercapai ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->output_lain_lain ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><?= $intra_hd->keterangan_lain ?></td>
                  <td style="border: 1px solid black;" class="center v-center"><input type="checkbox" <?= ($intra_hd->paraf !== '' ? 'checked' : '') ?>></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td style="border: 1px solid black;" class="center v-center bold" rowspan="2"><?= $data['asuhan_keperawatan']->post_hd->jenis_observasi ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_jam ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_qb ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_ufr ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_td ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_n ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_rr ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->observasi_suhu ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->intake_nacl ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->intake_dextrose ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->intake_makan_minum ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->intake_lain_lain ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->output_uf_tercapai ?></td>
                <td style="border: 1px solid black;" class="center v-center"><?= $data['asuhan_keperawatan']->post_hd->output_lain_lain ?></td>
                <td style="border: 1px solid black;" class="v-center"><span class="bold">Kt/v : </span><?= $data['asuhan_keperawatan']->post_hd->keterangan_lain ?></td>
                <td style="border: 1px solid black;" class="center v-center"><input type="checkbox" <?= ($data['asuhan_keperawatan']->post_hd->paraf !== '' ? 'checked' : '') ?>></td>
              </tr>
              <tr>
                <?php
                $total_intake = is_numeric($data['asuhan_keperawatan']->post_hd->intake_nacl) ?? 0;
                $total_intake += is_numeric($data['asuhan_keperawatan']->post_hd->intake_dextrose) ?? 0;
                $total_intake += is_numeric($data['asuhan_keperawatan']->post_hd->intake_makan_minum) ?? 0;
                $total_intake += is_numeric($data['asuhan_keperawatan']->post_hd->intake_lain_lain) ?? 0;

                $total_output = is_numeric($data['asuhan_keperawatan']->post_hd->output_uf_tercapai) ?? 0 + is_numeric($data['asuhan_keperawatan']->post_hd->output_lain_lain) ?? 0;
                $balance = $total_intake - $total_output;


                ?>
                <td style="border: 1px solid black;" class="right v-center" colspan="7"><span class="bold">Jumlah : </span></td>
                <td style="border: 1px solid black;" class="center v-center" colspan="4"><?= $total_intake; ?></td>
                <td style="border: 1px solid black;" class="center v-center" colspan="2"><?= $total_output ?></td>
                <td style="border: 1px solid black;"><span class="bold">Balance: </span><?= $balance ?></td>
                <td style="border: 1px solid black;"></td>
              </tr>
            </tbody>
          </table>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: -1px">
            <tr>
              <td style="border: 1px solid black;" colspan="2">
                <table width="100%" class="table-no-border table-asuhan-hd">
                  <tr>
                    <td colspan="9">
                      <span class="bold">Penyakit Selama HD :</span>
                    </td>
                  </tr>
                  <tr>
                    <?php $penyakit_selama_hd = json_decode($data['asuhan_keperawatan']->penyakit_selama_hd) ?>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->masalah_akses !== '' ? 'checked' : '') ?>>Masalah Akses</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->pendarahan !== '' ? 'checked' : '') ?>>Pendarahan</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->first_use_syndrom !== '' ? 'checked' : '') ?>>First Use Syndrom</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->sakit_kepala !== '' ? 'checked' : '') ?>>Sakit Kepala</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->mual_muntah !== '' ? 'checked' : '') ?>>Mual & Muntah</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->kram_otot !== '' ? 'checked' : '') ?>>Kram Otot</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->hiperkalemia !== '' ? 'checked' : '') ?>>Hiperkalemia</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->hipotensi !== '' ? 'checked' : '') ?>>Hipotensi</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->hipertensi !== '' ? 'checked' : '') ?>>Hipertensi</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->nyeri_dada !== '' ? 'checked' : '') ?>>Nyeri Dada</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->aritmia !== '' ? 'checked' : '') ?>>Aritmia</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->gatal_gatal !== '' ? 'checked' : '') ?>>Gatal gatal</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->demam !== '' ? 'checked' : '') ?>>Demam</td>
                    <td><input type="checkbox" <?= ($penyakit_selama_hd->menggigil !== '' ? 'checked' : '') ?>>Menggigil/dingin</td>
                    <td colspan="4">
                      <input type="checkbox" <?= ($penyakit_selama_hd->lain_lain !== '' ? 'checked' : '') ?>>Lain - lain
                      <span><?= ($penyakit_selama_hd->lain_lain !== '' ? '<span class="dotted-underline bold">' . $penyakit_selama_hd->ket_lain_lain . '</span>' : '') ?></span>
                    </td>
                  </tr>

                </table>
              </td>
            </tr>
            <tr>
              <td style="border: 1px solid black;" colspan="2">
                <?php $evaluasi_keperawatan = json_decode($data['asuhan_keperawatan']->evaluasi_keperawatan) ?>
                EVALUASI KEPERAWATAN : <br>
                Subject : <?= $evaluasi_keperawatan->subject ?><br>
                Objective : <?= $evaluasi_keperawatan->objective ?><br>
                Assessment : <?= $evaluasi_keperawatan->assessment ?><br>
                Plan : <?= $evaluasi_keperawatan->plan ?>
              </td>
            </tr>
            <tr>
              <td style="border: 1px solid black; height: 100px; vertical-align: top;" colspan="2"><span class="bold">DISCHART PLANNING : </span><br><?= $data['asuhan_keperawatan']->dischart_planning ?></td>
            </tr>
            <tr>
              <td style="border: 1px solid black; height: 50px">Akses Vaskuler oleh : ................................................</td>
              <td style="border: 1px solid black; vertical-align: top" class="center">Nama dan tanda tangan perawat yang bertugas</td>
            </tr>
            <tr>
              <td style="border: 1px solid black;" colspan="2" class="center bold">EVALUASI MEDIK</td>
            </tr>
          </table>
          <table width="100%" class="table-data table-asuhan-hd" style="border-collapse: collapse; width: 100%; border: 1px solid black; margin-top: -1px">
            <tr>
              <td style="border: 1px solid black;" width="33%" class="center bold">Obat</td>
              <td style="border: 1px solid black;" width="33%" class="center bold">Catatan Medis</td>
              <td style="border: 1px solid black;" width="33%" class="center bold">Ttd & Nama Dokter</td>
            </tr>
            <tr>
              <td style="border: 1px solid black; height: 100px"></td>
              <td style="border: 1px solid black;"></td>
              <td style="border: 1px solid black;"></td>
            </tr>
          </table>
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Gizi Dietetik -->
    <?php if (!empty($data_dietetik)) : ?>
      <?php foreach ($data_dietetik as $data) : ?>
        <div style="page-break-after: always; margin-top: -32px;">
          <table width="100%">
            <tr>
              <td width="15%" class="center">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img" width="80px" height="80px">
              </td>
              <td width="47%">
                <h1 class="header__title">RSUD KOTA TANGERANG</h1>
                <p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                  Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
              </td>
              <td width="38%">
                <!-- <div class="box-identitas" style="border: 1px solid black; border-radius: 10px; padding: 10px;"> -->
                <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 5px;">

                  <table width="100%" style="border-collapse: collapse;">
                    <tr>
                      <td style="padding: 5px;" width="30%">No. RM</td>
                      <td style="padding: 5px;" width="1%">:</td>
                      <td style="padding: 5px;" width="69%" class="bold"><?= $data['pasien']->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->nama ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Lahir</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->tanggal_lahir !== '' ? datefmysql($data['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data['pasien']->tanggal_lahir) ?> Tahun)</td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->agama ?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>

          <br>
          <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
            <thead>
              <tr>
                <th class="table__little-title no__border">
                  <h3 style="font-weight: bold;">FORMULIR ASUHAN GIZI DAN DIETETIK</h3>
                </th>
              </tr>
            </thead>
          </table>
          <table class="no__border" style="margin-top: 5px; width: 100%; padding: 5px;">
            <tr>
              <td class="no__border judul" colspan="2">KUNJUNGAN AWAL DIETESIEN PADA PASIEN BARU</td>
            </tr>
            <tr>
              <td style="padding: 2px;" class="no__border" colspan="2"><small><b>Diagnosa Medis :</b><?= $data['gd']->gd_medis ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;" class="no__border"><small><b>1.</b></small></td>
              <td style="padding: 2px;" class="no__border"><small><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;"></td>
              <td style="padding: 2px;">
                <small>
                  <?php
                  if (isset($data['gd']->gd_risiko) && $data['gd']->gd_risiko != '') {
                    if ($data['gd']->gd_risiko == '1') {
                      echo 'Risiko ringan (Nilai MST 0-1)';
                    } elseif ($data['gd']->gd_risiko == '2') {
                      echo 'Risiko sedang (Nilai MST ≥ 2-3)';
                    } elseif ($data['gd']->gd_risiko == '3') {
                      echo 'Risiko tinggi (Nilai MST 4-5)';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
            <tr>
              <td style="padding: 2px;"><small><b>2.</b></small></td>
              <td style="padding: 2px;"><small><b>Pasien mempunyai kondisi khusus :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;"></td>
              <td style="padding: 2px;">
                <small>
                  <?php
                  if (isset($data['gd']->gd_kondisi) && $data['gd']->gd_kondisi != '') {
                    if ($data['gd']->gd_kondisi == '1') {
                      echo 'Ya';
                    } elseif ($data['gd']->gd_kondisi == '2') {
                      echo 'Tidak';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
            <tr>
              <td style="padding: 2px;"><small><b>3.</b></small></td>
              <td style="padding: 2px;"><small><b>Alergi Makanan :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;"></td>
              <td style="padding: 2px;">
                <small>
                  <?php
                  if (isset($data['gd']->gd_alergi) && $data['gd']->gd_alergi != '') {
                    if ($data['gd']->gd_alergi == '1') {
                      echo 'Telur ';
                    } elseif ($data['gd']->gd_alergi == '2') {
                      echo 'Sapi ';
                    } elseif ($data['gd']->gd_alergi == '3') {
                      echo 'Kacang ';
                    } elseif ($data['gd']->gd_alergi == '4') {
                      echo 'Gandum ';
                    } elseif ($data['gd']->gd_alergi == '5') {
                      echo 'Udang ';
                    } elseif ($data['gd']->gd_alergi == '6') {
                      echo 'Ikan ';
                    } elseif ($data['gd']->gd_alergi == '7') {
                      echo 'Almond ';
                    }
                  }
                  if (isset($data['gd']->gd_alergi_lainnya) && $data['gd']->gd_alergi_lainnya != '') {
                    echo $data['gd']->gd_alergi_lainnya;
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
            <tr>
              <td style="padding: 2px;"><small><b>4.</b></small></td>
              <td style="padding: 2px;"><small><b>Preskripsi diet :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;"></td>
              <td style="padding: 2px;">
                <small>
                  <?php
                  if (isset($data['gd']->gd_makanan) && $data['gd']->gd_makanan != '') {
                    if ($data['gd']->gd_makanan == '1') {
                      echo 'Makanan biasa';
                    } elseif ($data['gd']->gd_makanan == '2') {
                      echo 'Diet khusus';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
            <tr>
              <td style="padding: 2px;"><small><b>5.</b></small></td>
              <td style="padding: 2px;"><small><b>Tindak lanjut :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 2px;"></td>
              <td style="padding: 2px;">
                <small>
                  <?php
                  if (isset($data['gd']->gd_asuhan) && $data['gd']->gd_asuhan != '') {
                    if ($data['gd']->gd_asuhan == '1') {
                      echo 'Pelu asuhan gizi (Lanjut ke asesmen gizi)';
                    } elseif ($data['gd']->gd_asuhan == '2') {
                      echo 'Belum perlu asuhan gizi';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
          </table>
          <table class="no__border" style="margin-top: 5px; width: 100%; padding: 5px;">
            <tr>
              <td class="no__border judul" colspan="4">ASESMEN GIZI</td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="4"><small><b>Antropometri :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="15%"><small>BB</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['gd']->gd_bb ?? '-' ?> Kg</small></td>
              <td style="padding: 3px;" class="no__border" width="35%"><small>Bila BB tidak dapat ditimbang, LILA</small></td>
              <td style="padding: 3px;" class="no__border" width="30%"><small>: <?= $data['gd']->gd_lila ?? '-' ?> Kg</small></td>

            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="15%"><small>TB</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['gd']->gd_tb ?? '-' ?> Cm</small></td>
              <td style="padding: 3px;" class="no__border" width="35%"><small>Bila TB tidak dapat diukur, Tilut</small></td>
              <td style="padding: 3px;" class="no__border" width="30%"><small>: <?= $data['gd']->gd_tilut ?? '-' ?> Cm</small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="15%"><small>IMT</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['gd']->gd_imt ?? '-' ?> Kg/m²</small></td>
              <td style="padding: 3px;" class="no__border" width="35%"><small>Status gizi</small></td>
              <td style="padding: 3px;" class="no__border" width="30%"><small>: <?= $data['gd']->gd_status_gizi ?? '-' ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%; padding: 5px;">
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="3"><small><b>Dalam 1 Bulan terakhir :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="1%"><small>1.</small></td>
              <td style="padding: 3px;" class="no__border" width="50%"><small>Kesulitan makan</small></td>
              <td style="padding: 3px;" class="no__border" width="1%">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_kesulitan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>2.</small></td>
              <td style="padding: 3px;" class="no__border" colspan="2"><small>Makan lebih sedikit dari biasanya</small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"></td>
              <td style="padding: 3px;" class="no__border"><small>≺ 1/2 porsi dari biasanya</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_setengah == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"></td>
              <td style="padding: 3px;" class="no__border"><small>1/2 - 3/4 porsi dari biasanya</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_tigaperempat == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>3.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Penurunan nafsu makan yang mempengaruhi asupan</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_penurunan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>4.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Perubahan rasa kecap</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_perubahan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>5.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Mual</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_mual == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>6.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Muntah</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_muntah == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>7.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Gangguan / kesulitan mengunyah dan atau menelan</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_gangguan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>8.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Perlu bantuan saat makan / minum</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_perlu == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>10.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Masalah dnegan gigi geligi</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_masalah == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>11.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Diare</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_diare == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>12.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Konstipati</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_konstipati == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>13.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Pendarahn</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_pendarahan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>14.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Banyak bersendawa</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_bersendawa == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>15.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Alergi makan / intoleransi terhadap makanan</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_intoleransi == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>16.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Menjalani diet tertentu</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_diet == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>17.</small></td>
              <td style="padding: 3px;" class="no__border"><small>Makan menggunakan NGT</small></td>
              <td style="padding: 3px;" class="no__border">:</td>
              <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_ngt == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><br></td>
            </tr>
          </table>

          <div style="page-break-before: always;">
            <table style="width: 100%;">
              <tr>
                <td class="no__border judul" colspan="4">ASESMEN GIZI</td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>18.</small></td>
                <td style="padding: 3px;" class="no__border"><small>Merasa lemah / tidak bertenaga</small></td>
                <td style="padding: 3px;" class="no__border">:</td>
                <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_lemah == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>19.</small></td>
                <td style="padding: 3px;" class="no__border"><small>Dirawat di RS dalam jangka setahun terakhir</small></td>
                <td style="padding: 3px;" class="no__border">:</td>
                <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_dirawat == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>20.</small></td>
                <td style="padding: 3px;" class="no__border" colspan="2"><small>Penurunan BB</small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"></td>
                <td style="padding: 3px;" class="no__border"><small>Lebih dari 3 kg dalam 1 bulan terakhir</small></td>
                <td style="padding: 3px;" class="no__border">:</td>
                <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_tigakg == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"></td>
                <td style="padding: 3px;" class="no__border"><small>Lebih dari 6 kg dalam 1 bulan terakhir</small></td>
                <td style="padding: 3px;" class="no__border">:</td>
                <td style="padding: 3px;" class="no__border"><small> <?= $data['gd']->gd_enamkg == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>21.</small></td>
                <td style="padding: 3px;" class="no__border"><small>Penyakit</small></td>
                <td style="padding: 3px;" class="no__border">:</td>
                <td style="padding: 3px;" class="no__border"><small>
                    <?php
                    if (isset($data['gd']->gd_penyakit) && $data['gd']->gd_penyakit != '') {
                      if ($data['gd']->gd_penyakit == '1') {
                        echo 'Penyakit keganasan ';
                      } elseif ($data['gd']->gd_penyakit == '2') {
                        echo 'Infeksi kronis ';
                      } elseif ($data['gd']->gd_penyakit == '3') {
                        echo 'Luka bakar ';
                      } elseif ($data['gd']->gd_penyakit == '4') {
                        echo 'Cidera kepala ';
                      } elseif ($data['gd']->gd_penyakit == '5') {
                        echo 'Gagal ginjal ';
                      }
                    }
                    if (isset($data['gd']->gd_penyakit_lainnya) && $data['gd']->gd_penyakit_lainnya != '') {
                      echo $data['gd']->gd_penyakit_lainnya;
                    } else {
                      echo '✕';
                    }
                    ?>
                  </small>
                </td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>22.</small></td>
                <td style="padding: 3px;" class="no__border" colspan="3"><small>Data penunjang lainnya / Laboratorium</small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"></td>
                <td style="padding: 3px;" class="no__border" colspan="3"><small><?= nl2br($data['gd']->gd_laboratorium ?? '-') ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"><small>23.</small></td>
                <td style="padding: 3px;" class="no__border" colspan="3"><small>Klinis / Fisik</small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border"></td>
                <td style="padding: 3px;" class="no__border" colspan="3"><small><?= nl2br($data['gd']->gd_klinis ?? '-') ?></small></td>
              </tr>
            </table>
          </div>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td class="no__border judul" colspan="3">DIAGNOSIS GIZI</td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul" width="33.33%"><small><b>Problem</b></small></td>
              <td style="padding: 3px;" class="no__border subjudul" width="33.33%"><small><b>Etiologi</b></small></td>
              <td style="padding: 3px;" class="no__border subjudul" width="33.33%"><small><b>Tanda/gejala</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border 
                            <?php if ($data['gd']->gd_problem === null) {
                              echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                <small>
                  <?= nl2br(htmlspecialchars($data['gd']->gd_problem ?? '-')) ?>
                </small>
              </td>
              <td style="padding: 3px;" class="no__border 
                            <?php if ($data['gd']->gd_problem === null) {
                              echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                <small>
                  <?= nl2br(htmlspecialchars($data['gd']->gd_etiologi ?? '-')) ?>
                </small>
              </td>
              <td style="padding: 3px;" class="no__border 
                            <?php if ($data['gd']->gd_problem === null) {
                              echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                <small>
                  <?= nl2br(htmlspecialchars($data['gd']->gd_gejala ?? '-')) ?>
                </small>
              </td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td style="padding: 3px;" class="no__border judul" colspan="4"><small><b>INTERVENSI GIZI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="4"><small><b>Preskripsi Diet : </b><?= $data['gd']->gd_preskripsi ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Energi</small></td>
              <td style="padding: 3px;" class="no__border" width="40%"><small>: <?= $data['gd']->gd_energi ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Makanan Cair</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['gd']->gd_jenis_makanan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Lemak</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_lemak ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Makanan Lunak</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_jenis_makanan == '2' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Protein</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_protein ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Makanan Saring</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_jenis_makanan == '3' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Karbohidrat</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_karbohidrat ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Makanan Biasa</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_jenis_makanan == '4' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Cairan</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_cairan ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Oral</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_cara_makan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Route Diet</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_route ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>NGT</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_cara_makan == '2' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small>Frekuensi</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['gd']->gd_frekuensi ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" colspan="2"></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border judul" colspan="4"><small><b>MONITORING DAN EVALUASI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border 
                            <?php if ($data['gd']->gd_monitoring === null) {
                              echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        " colspan="4">
                <small>
                  <?= nl2br(htmlspecialchars($data['gd']->gd_monitoring ?? '-')) ?>
                </small>
              </td>
            </tr>
          </table>
          <table class="no__border" style="color:#000; border-top: 2px solid #000; margin-top: 20px; width: 100%;">
            <tr>
              <td class="no__border subjudul" width="50%">
                <small>
                  <?php
                  // Ambil data tanggal dan waktu dari variabel
                  $tanggal_waktu = $data['gd']->gd_tgl_petugas; // Contoh: "2024-09-17 10:09"

                  // Ubah string menjadi objek DateTime
                  $date = new DateTime($tanggal_waktu);

                  // Format tanggal menjadi "17/09/2024"
                  $formatted_date = $date->format('d/m/Y');

                  // Dapatkan jam dari waktu
                  $formatted_time = $date->format('H:i');

                  // Cetak hasil
                  echo "Tanggal, " . $formatted_date . " Pukul: " . $formatted_time;
                  ?>
                </small>
              </td>
              <td style="padding: 3px;" class="no__border subjudul"></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul"><small>Dietesien / Nutrisionist</small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small>Dokter</small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul">
                <?php
                if (isset($data['gd']->ttd_petugas) && $data['gd']->ttd_petugas != '') {
                  echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['gd']->ttd_petugas . '" alt="ttd-petugas" width="300">';
                } else {
                  echo '<br><br><br><br>';
                }
                ?>
              </td>
              <td style="padding: 3px;" class="no__border subjudul">
                <?php
                if (isset($data['gd']->ttd_dokter) && $data['gd']->ttd_dokter != '') {
                  echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['gd']->ttd_dokter . '" alt="ttd-petugas" width="300">';
                } else {
                  echo '<br><br><br><br>';
                }
                ?>
              </td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['gd']->petugas ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['gd']->dokter ?? '-' ?></small></td>
            </tr>
          </table>
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Konsultasi Gizi -->
    <?php if (!empty($data_konsul_gizi)) : ?>
      <?php foreach ($data_konsul_gizi as $data) : ?>
        <div style="page-break-after: always; margin-top: -32px;">
          <table width="100%">
            <tr>
              <td width="15%" class="center">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img" width="80px" height="80px">
              </td>
              <td width="47%">
                <h1 class="header__title">RSUD KOTA TANGERANG</h1>
                <p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                  Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
              </td>
              <td width="38%">
                <!-- <div class="box-identitas" style="border: 1px solid black; border-radius: 10px; padding: 10px;"> -->
                <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 5px;">

                  <table width="100%" style="border-collapse: collapse;">
                    <tr>
                      <td style="padding: 5px;" width="30%">No. RM</td>
                      <td style="padding: 5px;" width="1%">:</td>
                      <td style="padding: 5px;" width="69%" class="bold"><?= $data['pasien']->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->nama ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Lahir</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->tanggal_lahir !== '' ? datefmysql($data['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data['pasien']->tanggal_lahir) ?> Tahun)</td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->agama ?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>

          <br>
          <table class=" small__font" style="border: 1px solid black; width: 100%;">
            <tbody>
              <tr>
                <td colspan="9" align="center" style="border-bottom: 1px solid black;">
                  <h4 style=" margin-bottom: 5px;">
                    <b>FORMULIR KONSULTASI GIZI</b>
                  </h4>
                </td>
              </tr>

              <tr>
                <td class="no__border" colspan="9" align="left"><b>Pengkajian Gizi :</b></td>
              </tr>
              <tr>
                <td class="no__border" colspan="9" style="padding-left: 15px;">a. Antropometri :</td>
              </tr>
              <tr>
                <td width="5%" class="no__border" style="padding-left: 28px;">BB</td>
                <td width="1%" class="no__border">:</td>
                <td width="10%" class="no__border"><?= $data['konsultasi_gizi']->kg_bb; ?> kg</td>
                <td width="5%" class="no__border">LLA</td>
                <td width="1%" class="no__border">:</td>
                <td width="10%" class="no__border"><?= $data['konsultasi_gizi']->kg_lla; ?> cm</td>
                <td width="10%" class="no__border">Perubahan BB</td>
                <td width="1%" class="no__border">:</td>
                <td width="10%" class="no__border"><?= $data['konsultasi_gizi']->kg_pbb; ?></td>
              </tr>
              <tr>
                <td width="5%" class="no__border" style="padding-left: 28px;">TB</td>
                <td width="1%" class="no__border">:</td>
                <td width="10%" class="no__border"><?= $data['konsultasi_gizi']->kg_tb; ?> cm</td>
                <td width="5%" class="no__border">IMT</td>
                <td width="1%" class="no__border">:</td>
                <td width="10%" class="no__border"><?= $data['konsultasi_gizi']->kg_imt; ?> kg/m²</td>
                <td colspan="3" class="no__border"></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">b. Biokimia :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_biokimia; ?></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px; ">c. Fisik / Klinik :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_klinis; ?></textarea></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">d. Riwayat Gizi :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_gizi; ?></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">e. Riwayat Personal :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_personal; ?></textarea></td>
              </tr>
              <tr>
                <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Diagnosis Gizi :</b></th>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_diagnosis; ?></td>
              </tr>
              <tr>
                <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Intervensi Gizi :</b></th>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">a. Tujuan :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_tujuan; ?></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">b. Intervensi :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_intervensi; ?></td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 15px;">c. Konseling Gizi / Edukasi :</td>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_konseling; ?></td>
              </tr>
              <tr>
                <th colspan="9" class="no__border" align="left" style="border-top: 1px solid black;"><b>Rencana Monitoring dan Evaluasi Gizi :</b></th>
              </tr>
              <tr>
                <td colspan="9" class="no__border" style="padding-left: 28px; height: 40px;"><?= $data['konsultasi_gizi']->kg_evaluasi; ?></td>
              </tr>
            </tbody>
          </table>

          <table class="small__font" style="border: 1px solid black; width: 100%;">
            <tbody>
              <tr>
                <td align="center" colspan="3" class="no__border">Tangerang,<?= date("d/m/Y - H:i", strtotime($data['konsultasi_gizi']->kg_tgl_petugas)); ?> </td>
              </tr>
              <tr>
                <td width="33.3%" align="center" class="no__border">Ahli Gizi :</td>
                <td width="33.3%" align="center" class="no__border">Dokter :</td>
                <td width="33.3%" align="center" class="no__border">Pasien :</td>
              </tr>
              <tr>
                <td width="33.3%" class="no__border">
                  <?php
                  if (isset($data['konsultasi_gizi']->ttd) && $data['konsultasi_gizi']->ttd != '') {
                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['konsultasi_gizi']->ttd . '" alt="ttd-petugas" width="300">';
                  } else {
                    echo '<br><br><br><br>';
                  }
                  ?>
                </td>
                <td width="33.3%" class="no__border">
                  <?php
                  if (isset($data['konsultasi_gizi']->ttd) && $data['konsultasi_gizi']->ttd != '') {
                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['konsultasi_gizi']->ttd . '" alt="ttd-dokter" width="300">';
                  } else {
                    echo '<br><br><br><br>';
                  }
                  ?>
                </td>
                <td width="33.3%" class="no__border"><br><br><br><br></td>
              </tr>
              <tr>
                <td width="33.3%" align="center" class="no__border">
                  <?= $data['konsultasi_gizi']->petugas; ?>
                </td>
                <td width="33.3%" align="center" class="no__border">
                  <?= $data['konsultasi_gizi']->dokter; ?>
                </td>
                <td width="33.3%" align="center" class="no__border">
                  <?= $data['pasien']->nama; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Gizi DIet Anak -->
    <?php if (!empty($data_gizi_anak)) : ?>
      <?php foreach ($data_gizi_anak as $data) : ?>
        <div style="page-break-after: always; margin-top: -32px;">
          <table width="100%">
            <tr>
              <td width="15%" class="center">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img" width="80px" height="80px">
              </td>
              <td width="47%">
                <h1 class="header__title">RSUD KOTA TANGERANG</h1>
                <p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                  Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
              </td>
              <td width="38%">
                <!-- <div class="box-identitas" style="border: 1px solid black; border-radius: 10px; padding: 10px;"> -->
                <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 5px;">

                  <table width="100%" style="border-collapse: collapse;">
                    <tr>
                      <td style="padding: 5px;" width="30%">No. RM</td>
                      <td style="padding: 5px;" width="1%">:</td>
                      <td style="padding: 5px;" width="69%" class="bold"><?= $data['pasien']->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->nama ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Lahir</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->tanggal_lahir !== '' ? datefmysql($data['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data['pasien']->tanggal_lahir) ?> Tahun)</td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= ($data['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td style="padding: 2px;" class="bold"><?= $data['pasien']->agama ?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>

          <br>
          <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
            <thead>
              <tr>
                <th class="table__little-title no__border"><b>FORMULIR ASUHAN GIZI ANAK</b></th>
              </tr>
            </thead>
          </table>
          <table class="no__border" style="margin-top: 5px; width: 100%;">
            <tr>
              <?php
              $layanan = $data['layanan'];

              $ruang = "-";
              if (!empty($layanan->bangsal)) {
                $ruang = $layanan->bangsal . " Ruang " . $layanan->no_ruang . " No.Bed  " . $layanan->no_bed . " / Kelas " . $layanan->kelas;
              }
              ?>
              <td class="no__border" style="padding: 3px;" width="25%"><small>Ruang / Kelas</small></td>
              <td class="no__border" style="padding: 3px;"><small>: <?= $ruang ?></small></td>
            </tr>
            <tr>
              <td class="no__border" style="padding: 3px;" width="25%"><small>Tanggal Masuk</small></td>
              <td class="no__border" style="padding: 3px;"><small>: <?= isset($data['ga']->ga_tgl_masuk) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_masuk)) : '-' ?></small></td>
            </tr>
            <tr>
              <td class="no__border" style="padding: 3px;" width="25%"><small>Tanggal Skrining</small></td>
              <td class="no__border" style="padding: 3px;"><small>: <?= isset($data['ga']->ga_tgl_skrining) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_skrining)) : '-' ?></small></td>
            </tr>
            <tr>
              <td class="no__border" style="padding: 3px;" width="25%"><small>Diagnosa Medis</small></td>
              <td class="no__border" style="padding: 3px;"><small>: <?= $data['ga']->ga_diagnosa_medis ?? '-' ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="margin-top: 5px; width: 100%;">
            <tr>
              <td class="no__border" style="padding: 3px;"><small><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></small></td>
            </tr>
            <tr>
              <td class="no__border pl-1" style="padding: 3px;">
                <small>
                  <?php
                  if (isset($data['ga']->ga_risiko) && $data['ga']->ga_risiko != '') {
                    if ($data['ga']->ga_risiko == '1') {
                      echo 'Risiko rendah (Total skor 0)';
                    } elseif ($data['ga']->ga_risiko == '2') {
                      echo 'Risiko sedang (Total skor 1 – 3))';
                    } elseif ($data['ga']->ga_risiko == '3') {
                      echo 'Risiko berat (Total skor 4 – 5)';
                    }
                  } else {
                    echo '-';
                  }
                  ?>
                </small>
              </td>
            </tr>
          </table>
          <table class="no__border" style="margin-top: 5px; width: 100%;">
            <tr>
              <td class="no__border judul" colspan="5"><small><b>ASESMEN GIZI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="5"><small><b>Antropometri :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" width="12%"><small>BB</small></td>
              <td style="padding: 3px;" class="no__border" width="10%"><small>: <?= $data['ga']->ga_bb ?? '-' ?> Kg</small></td>
              <td style="padding: 3px;" class="no__border" width="18%"><small>BB/U</small></td>
              <td style="padding: 3px;" class="no__border" width="10%"><small>: <?= $data['ga']->ga_bbu ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Kesan : </small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>PB atau TB</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_bb ?? '-' ?> Cm</small></td>
              <td style="padding: 3px;" class="no__border"><small>PB/U atau TB/U/U</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_bbu ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" rowspan="3"><small><?= nl2br($data['ga']->ga_kesan ?? '-') ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>BBI</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_bbi ?? '-' ?> Cm</small></td>
              <td style="padding: 3px;" class="no__border"><small>BB/PB atau BB/TB</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_bbpb ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>LLA</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_lla ?? '-' ?> Cm</small></td>
              <td style="padding: 3px;" class="no__border"><small>HA</small></td>
              <td style="padding: 3px;" class="no__border"><small>: <?= $data['ga']->ga_ha ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="5"><small><b>Biokimia :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" colspan="5"><small><?= nl2br($data['ga']->ga_biokimia ?? '-') ?></b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border " colspan="5"><small><b>Klinis / Fisik :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" colspan="5"><small><?= nl2br($data['ga']->ga_klinis ?? '-') ?></b></small></td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td style="padding: 3px;" class="no__border" colspan="5"><small><b>Riwayat Gizi</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" colspan="5"><small><b>Alergi Makan :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" width="25%"><small>Telur</small></td>
              <td style="padding: 3px;" class="no__border" width="5%"><small><?= $data['ga']->ga_telur == '1' ? '✓' : '✕' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="10%"><small>Udang</small></td>
              <td style="padding: 3px;" class="no__border" width="30%"><small><?= $data['ga']->ga_udang == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>Susu sapi dan produk olahannya</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_sapi == '1' ? '✓' : '✕' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Ikan</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_ikan == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>Kacang kedelai/tanah</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_kedelai == '1' ? '✓' : '✕' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Hazelnut/almond</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_almond == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1"><small>Gluten/gandum</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_gandum == '1' ? '✓' : '✕' ?></small></td>
              <td style="padding: 3px;" class="no__border"><small>Lainnya</small></td>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_alergi_lainnya ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" colspan="5"><small><b>Pola Makan :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" colspan="5"><small><?= nl2br($data['ga']->ga_pola_makan ?? '-') ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td style="padding: 3px;" class="no__border"><small><b>Tindak Lanjut :</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" width="15%"><small>Perlu Asuhan Gizi Lanjut</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_tindak == '1' ? '✓' : '✕' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border pl-1" width="15%"><small>Belum Perlu Asuhan Gizi Lanjut</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_tindak == '2' ? '✓' : '✕' ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td class="no__border judul" colspan="3"><small><b>DIAGNOSIS GIZI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul" width="33.3%"><small><b>PROBLEM</b></small></td>
              <td style="padding: 3px;" class="no__border subjudul" width="33.3%"><small><b>ETIOLOGI</b></small></td>
              <td style="padding: 3px;" class="no__border subjudul" width="33.3%"><small><b>TANDA/GEJALA</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['ga']->ga_problem ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['ga']->ga_etiologi ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['ga']->ga_gejala ?? '-' ?></small></td>
            </tr>
          </table>

          <div style="page-break-before: always;">
            <table class="no__border page-break-before" style="width: 100%;">
              <tr>
                <td class="no__border judul" colspan="4"><small><b>INTERVENSI GIZI</b></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border" colspan="4"><small><b>Preskripsi Diet : <?= $data['ga']->ga_preskripsi ?? '-' ?></b></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1" width="25%"><small>Energi</small></td>
                <td style="padding: 3px;" class="no__border" width="25%"><small> : <?= $data['ga']->ga_preskripsi ?? '-' ?></small></td>
                <td style="padding: 3px;" class="no__border" width="25%"><small>Makan Cair</small></td>
                <td style="padding: 3px;" class="no__border" width="25%"><small> : <?= $data['ga']->ga_makanan == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small>Lemak</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_lemak ?? '-' ?></small></td>
                <td style="padding: 3px;" class="no__border"><small>Makan Lunak</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_makanan == '2' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small>Protein</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_protein ?? '-' ?></small></td>
                <td style="padding: 3px;" class="no__border"><small>Makan Saring</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_makanan == '3' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small>Karbohidrat</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_karbohidrat ?? '-' ?></small></td>
                <td style="padding: 3px;" class="no__border"><small>Makan Biasa</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_makanan == '4' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small>Cairan</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_karbohidrat ?? '-' ?></small></td>
                <td style="padding: 3px;" class="no__border"><small>Route Diet</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_route ?? '-' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small>Oral</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_cara_makan == '1' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small>NGT</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_cara_makan == '2' ? '✓' : '✕' ?></small></td>
              </tr>
              <tr>
                <td style="padding: 3px;" class="no__border pl-1"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small></small></td>
                <td style="padding: 3px;" class="no__border"><small>Frekuensi</small></td>
                <td style="padding: 3px;" class="no__border"><small> : <?= $data['ga']->ga_frekuensi ?? '-' ?></small></td>
              </tr>
            </table>
          </div>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td class="no__border judul"><small><b>RENCANA MONITORING DAN EVALUASI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border"><small><?= $data['ga']->ga_monitoring ?? '-' ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="width: 100%;">
            <tr>
              <td class="no__border judul" colspan="5"><small><b>MONITORING DAN EVALUASI</b></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Tanggal Monev</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= isset($data['ga']->ga_tgl_monev_1) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_monev_1)) : '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= isset($data['ga']->ga_tgl_monev_2) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_monev_2)) : '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= isset($data['ga']->ga_tgl_monev_3) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_monev_3)) : '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= isset($data['ga']->ga_tgl_monev_4) ? date('d/m/Y', strtotime($data['ga']->ga_tgl_monev_4)) : '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Antropometri</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['ga']->ga_antropometri_1 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_antropometri_2 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_antropometri_3 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_antropometri_4 ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Biokimia</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['ga']->ga_biokimia_1 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_biokimia_2 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_biokimia_3 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_biokimia_4 ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Klinis/ Fisik</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['ga']->ga_klinis_1 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_klinis_2 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_klinis_3 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_klinis_4 ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small>Asupan makan</small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['ga']->ga_asupan_1 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_asupan_2 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_asupan_3 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_asupan_4 ?? '-' ?></small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_monitoring_lain ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small>: <?= $data['ga']->ga_monitoring_lain_1 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_monitoring_lain_2 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_monitoring_lain_3 ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border" width="20%"><small><?= $data['ga']->ga_monitoring_lain_4 ?? '-' ?></small></td>
            </tr>
          </table>
          <table class="no__border" style="color:#000; border-top: 2px solid #000; margin-top: 20px; width: 100%;">
            <tr>
              <td style="padding: 3px;" class="no__border subjudul" width="50%">
                <small>
                  <?php
                  // Ambil data tanggal dan waktu dari variabel
                  $tanggal_waktu = $data['ga']->ga_tgl_petugas; // Contoh: "2024-09-17 10:09"

                  // Ubah string menjadi objek DateTime
                  $date = new DateTime($tanggal_waktu);

                  // Format tanggal menjadi "17/09/2024"
                  $formatted_date = $date->format('d/m/Y');

                  // Dapatkan jam dari waktu
                  $formatted_time = $date->format('H:i');

                  // Cetak hasil
                  echo "Tanggal, " . $formatted_date . " Pukul: " . $formatted_time;
                  ?>
                </small>
              </td>
              <td class="no__border subjudul"></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul"><small>Dietesien / Nutrisionist</small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small>Dokter</small></td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul">
                <?php
                if (isset($data['ga']->ttd) && $data['ga']->ttd != '') {
                  echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['ga']->ttd . '" alt="ttd-petugas" width="300">';
                } else {
                  echo '<br><br><br><br>';
                }
                ?>

              </td>
              <td style="padding: 3px;" class="no__border subjudul">
                <?php
                if (isset($data['ga']->ttd_dokter) && $data['ga']->ttd_dokter != '') {
                  echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data['ga']->ttd_dokter . '" alt="ttd-dokter" width="300">';
                } else {
                  echo '<br><br><br><br>';
                }
                ?>

              </td>
            </tr>
            <tr>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['ga']->petugas ?? '-' ?></small></td>
              <td style="padding: 3px;" class="no__border subjudul"><small><?= $data['ga']->dokter ?? '-' ?></small></td>
            </tr>
          </table>
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Hasil Hemodialisa -->
    <?php if (!empty($data_hemodialisa)) : ?>
      <?php foreach ($data_hemodialisa as $data) : ?>
        <div style="page-break-after: always;">
          <table width="100%">
            <tr>
              <td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $data['hospital']->logo ?>" width="80px" height="80px"></td>
              <td width="47%">
                <b class="bold" style="font-size: 16pt;"><?= strtoupper($data['hospital']->nama) ?></b><br>
                <b class="bold" style="font-size: 9pt;"><?= strtoupper($data['hospital']->alamat) ?></b><br>
                <b class="bold" style="font-size: 10pt;">Telp. <?= $data['hospital']->telp ?>, FAX. <?= $data['hospital']->fax ?> Email : <?= $data['hospital']->email ?></b>
              </td>
              <td width="38%">
                <!-- <div class="box-identitas"> -->
                <div style="border: 1px solid black; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; padding: 10px;">
                  <table width="100%">
                    <tr>
                      <td width="30%">No. RM</td>
                      <td width="1%">:</td>
                      <td width="69%" class="bold"><?= $data['pasien']->id_pasien ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td class="bold"><?= $data['pasien']->nama ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Lahir</td>
                      <td>:</td>
                      <td class="bold"><?= ($data['pasien']->tanggal_lahir !== '' ? datefmysql($data['pasien']->tanggal_lahir) : '-') ?> (<?= createUmur($data['pasien']->tanggal_lahir) ?> Tahun)</td>
                    </tr>
                    <tr>
                      <td>Kelamin</td>
                      <td>:</td>
                      <td class="bold"><?= ($data['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <td>:</td>
                      <td class="bold"><?= $data['pasien']->agama ?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
          <br>
          <h1 class="bold center">LAPORAN HEMODIALISA</h1>
          <hr>
          <table width="100%" class="table-no-border">
            <tr>
              <td width="15%">Hari/Tanggal</td>
              <td width="1%">:</td>
              <td width="30%" class="bold"><span class="dotted-underline bold"><?= ($data['laporan_hd']->waktu !== null ? datetimefmysql($data['laporan_hd']->waktu, true) : '') ?></span></td>
              <td></td>
              <td width="15%">Waktu HD</td>
              <td width="1%">:</td>
              <td width="39%" class="bold">
                <span>Pukul : </span><span class="dotted-underline bold"><?= $data['laporan_hd']->waktu_awal ?></span><span>s/d Pukul</span><span class="dotted-underline bold"><?= $data['laporan_hd']->waktu_akhir ?></span>WIB
              </td>
            </tr>
            <tr>
              <td>Ruang Rawat</td>
              <td>:</td>
              <td class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->ranap_asal_hd ?></span></td>
              <td></td>
              <td>Status</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= ($data['layanan']->cara_bayar !== 'Tunai' ? $data['layanan']->cara_bayar . ' (' . $data['layanan']->penjamin . ')' : $data['layanan']->cara_bayar) ?></span></td>
            </tr>
            <tr>
              <td colspan="7">Dilakukan program
                <?php $program = json_decode($data['laporan_hd']->program) ?>
                (<input type="checkbox" <?= $program->hd !== '' ? 'checked' : '' ?>>HD /
                <input type="checkbox" <?= $program->sleed !== '' ? 'checked' : '' ?>>SLEED /
                <input type="checkbox" <?= $program->hfr !== '' ? 'checked' : '' ?>>HFR /
                <input type="checkbox" <?= $program->hdf !== '' ? 'checked' : '' ?>>HDF /
                <input type="checkbox" <?= $program->lain !== '' ? 'checked' : '' ?>>Lain
                <?= ($program->ket_lain !== '' ? '<span class="dotted-underline bold">' . $program->ket_lain . '</span>' : '<span class="dotted-underline bold">-</span>') ?>)*
                dengan :<?= ($program->dengan !== '' ? '<span class="dotted-underline bold">' . $program->dengan . '</span>' : '<span class="dotted-underline bold">-</span>') ?>
              </td>
            </tr>
          </table>
          <table width="100%" class="table-no-border">
            <tr>
              <td width="15%">Time Dialisis</td>
              <td width="1%">:</td>
              <td width="15%" class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->waktu_dialisis ?></span>Jam</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>UF Goal</td>
              <td>:</td>
              <td class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->uf_goal ?></span>ml</td>
            </tr>
            <tr>
              <td><i>Quick Blood</i></td>
              <td>:</td>
              <td class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->quick_blood ?></span>ml</td>
            </tr>
            <tr>
              <td><i>Quick Dialysat</i></td>
              <td>:</td>
              <td class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->quick_dialysat ?></span>ml</td>
            </tr>
            <tr>
              <td><i>Profilling</i></td>
              <td></td>
              <td class="bold">UF : <span class="dotted-underline bold"><?= $data['laporan_hd']->profilling_uf ?></span></td>
              <td></td>
              <td class="bold" width="5%">Lainnya</td>
              <td width="1%">:</td>
              <td class="bold"><span class="dotted-underline bold"><?= $data['laporan_hd']->profilling_lain ?></span></td>
            </tr>
            <tr>
              <td><i></i></td>
              <td></td>
              <td class="bold">Na : <span class="dotted-underline bold"><?= $data['laporan_hd']->profilling_na ?></span></td>
            </tr>
            <tr>
              <td>Akses Sirkulasi</td>
              <td>:</td>
              <td colspan="5"><i class="bold">
                  <?php $akses_sirkulasi = json_decode($data['laporan_hd']->akses_sirkulasi) ?>
                  <input type="checkbox" <?= $akses_sirkulasi->cimino !== '' ? 'checked' : '' ?>>Cimino /
                  <input type="checkbox" <?= $akses_sirkulasi->femoral !== '' ? 'checked' : '' ?>>Femoral /
                  <input type="checkbox" <?= $akses_sirkulasi->catheter !== '' ? 'checked' : '' ?>>Double Lumen Catheter :
                  <?= ($akses_sirkulasi->ket_catheter !== '' ? '<span class="dotted-underline bold">' . $akses_sirkulasi->ket_catheter . '</span>' : '<span class="dotted-underline bold">-</span>') ?>
                </i></td>
            </tr>
            <tr>
              <td><span style="font-size: 14px;" class="bold">Pre HD</span></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Keluhan utama</td>
              <td>:</td>
              <td colspan="4"><span class="dotted-underline"><?= $data['laporan_hd']->keluhan_utama ?></span></td>
            </tr>
            <tr>
              <td>Keadaan Umum</td>
              <td>:</td>
              <td><span class="dotted-underline"><?= $data['laporan_hd']->keadaan_umum ?></span></td>
              <td></td>
              <td>Kesadaran</td>
              <td>:</td>
              <td><span class="dotted-underline"><?= $data['laporan_hd']->kesadaran ?></span></td>
            </tr>
            <tr>
              <td>GCS</td>
              <td>:</td>
              <td colspan="5">
                <span style="display: inline-block;" class="bold">E<span class="solid-underline bold"><?= $data['laporan_hd']->gcs_e ?></span></span>&nbsp;
                <span class="bold">M<span class="solid-underline bold"><?= $data['laporan_hd']->gcs_m ?></span></span>&nbsp;
                <span class="bold">V<span class="solid-underline bold"><?= $data['laporan_hd']->gcs_v ?></span></span>&nbsp;
                <span class="bold">Total<span class="solid-underline bold"><?= $data['laporan_hd']->gcs_total ?></span></span>
              </td>
            </tr>
          </table>
          <table width="90%" class="table-no-border" style="margin-left: 30px; margin-right: 30px;">
            <tr>
              <td width="45%">
                <span>Tensi : <span class="dotted-underline bold"><?= $data['laporan_hd']->tensi_sistolik ?> / <?= $data['laporan_hd']->tensi_diastolik ?></span> mmHg</span>&nbsp;&nbsp;
                <span>Nadi : <span class="dotted-underline bold"><?= $data['laporan_hd']->nadi ?></span> x/mnt</span>
              </td>
              <td width="55%">
                <span>Suhu : <span class="dotted-underline bold"><?= $data['laporan_hd']->suhu ?></span> &#8451;</span>&nbsp;&nbsp;
                <span>Respirasi : <span class="dotted-underline bold"><?= $data['laporan_hd']->respirasi ?></span> x/mnt</span>&nbsp;&nbsp;
                <input type="checkbox" <?= $data['laporan_hd']->ventilator !== null ? 'checked' : '' ?>>On Ventilator
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: justify; padding-bottom: 10px; line-height: 25px;">
                <span class="bold">On HD :</span><br>
                <?= ($data['laporan_hd']->on_hd !== '' ? '<span class="dotted-underline">' . $data['laporan_hd']->on_hd . '</span>' : '<span class="dotted-undeline"></span>') ?>
              </td>
            </tr>
          </table>
          <table width="90%" class="table-no-border" style="margin-left: 30px; margin-right: 30px;">
            <tr>
              <td colspan="7"><span style="font-size: 14px;" class="bold">Post HD</span></td>
            </tr>
            <tr>
              <td colspan="7"><span style="font-size: 14px;" class="bold">Hasil Akhir HD</span></td>
            </tr>
            <tr>
              <td colspan="3">
                <span>Time Dialisis : <span class="dotted-underline bold"><?= $data['laporan_hd']->waktu_dialisis_post_hd ?></span></span> Jam
              </td>
              <td></td>
              <td colspan="3">
                <span>UF Goal : <span class="dotted-underline bold"><?= $data['laporan_hd']->uf_goal_post_hd ?></span></span>&nbsp;ml
              </td>
            </tr>
            <tr>
              <td width="25%">Transfusi</td>
              <td width="1%">:</td>
              <td width="30%"><span class="dotted-underline bold"><?= $data['laporan_hd']->transfusi ?></span>ml</td>
              <td></td>
              <td width="15%">Lain - lain</td>
              <td width="1%">:</td>
              <td width="39%"><span class="dotted-underline bold"><?= $data['laporan_hd']->uf_goal_lain ?></span>ml</td>
            </tr>
            <tr>
              <td>Terapi Cairan</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->terapi_cairan ?></span>ml</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Asupan Cairan (Oral / NGT)</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->asupan_cairan ?></span>ml</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>Lain - lain</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->hasil_lain ?></span>ml</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td class="right">Jumlah</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->jumlah ?></span>ml</td>
              <td></td>
              <td>Jumlah</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->uf_goal_jumlah ?></span>ml</td>
            </tr>
            <tr>
              <td class="right">Balance</td>
              <td>:</td>
              <td><span class="dotted-underline bold"><?= $data['laporan_hd']->balance ?></span>ml</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="7">Keterangan Lain : <span class="dotted-underline bold"><?= $data['laporan_hd']->keterangan_lain ?></span></td>
            </tr>
            <tr>
              <td colspan="7">Darah untuk pemeriksaan laboratorium <span class="bold"><input type="checkbox" <?= $data['laporan_hd']->ket_darah_lab === '1' ? 'checked' : '' ?>>Diambil / <input type="checkbox" <?= $data['laporan_hd']->ket_darah_lab === '0' ? 'checked' : '' ?>>Tidak Diambil*</span></td>
            </tr>
          </table>
          <table width="100%" class="table-no-borderc center">
            <tr>
              <td width="33%">Dokter Jaga</td>
              <td width="33%">Perawat HD</td>
              <td width="33%">Perawat Ruangan</td>
            </tr>
            <tr>
              <td><br><br><br><br><br></td>
            </tr>
            <tr>
              <td><?= ($data['laporan_hd']->dokter_jaga !== '' ? '( <span class="dotted-underline">' . $data['laporan_hd']->dokter_jaga . '</span> )' : '( ................................... )') ?></span></td>
              <td><?= ($data['laporan_hd']->perawat_hd !== '' ? '( <span class="dotted-underline">' . $data['laporan_hd']->perawat_hd . '</span> )' : '( ................................... )') ?></span></td>
              <td><?= ($data['laporan_hd']->perawat_ruangan !== '' ? '( <span class="dotted-underline">' . $data['laporan_hd']->perawat_ruangan . '</span> )' : '( ................................... )') ?></span></td>
            </tr>
            <tr>
              <td>Tanda tangan dan nama jelas</td>
              <td>Tanda tangan dan nama jelas</td>
              <td>Tanda tangan dan nama jelas</td>
            </tr>
          </table>
          <!-- <table width="100%" class="table-no-border" style="margin-top: 100px;">
            <tr>
              <td class="bold">PETUNJUK PENGISIAN LAPORAN TINDAKAN HEMODIALISA :</td>
            </tr>
            <tr>
              <td>1. Dibuat sebagai laporan untuk ruangan lain ( EMG, Rawat Inap, atau intensive / high care )</td>
            </tr>
            <tr>
              <td>2. Dibuat sebagai gambaran tindakan HD yang dilakukan</td>
            </tr>
            <tr>
              <td>3. Hasil akhir HD merupakan hasil HD uang dilaksanakan terkait kemungkinan perubahan antara program HD dengan hasil</td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;akhir karena kendala intra dialisis</td>
            </tr>
          </table> -->
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Hasil Operasi -->
    <?php if (!empty($data_operasi)) : ?>
      <?php foreach ($data_operasi as $data) : ?>
        <div style="page-break-after: always;">
          <header class="header" id="header">
            <div class="header__container2 container kop-data-pasien">
              <table style="border: none; vertical-align: middle;">
                <tr>
                  <td width="65%" style="border: none; vertical-align: middle;">
                    <table style="border: none; vertical-align: middle;">
                      <tr style="border: none; vertical-align: middle;">
                        <td width="25%">
                          <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="80px" class="header__img">
                        </td>
                        <td width="75%">
                          <h3 style="font-weight: bold;">RSUD KOTA TANGERANG</h3>
                          Jl. Pulau Putri Raya Perumahan Modernland
                          <br>Kelurahan Kelapa Indah Kecamatan Tangerang
                          <br>Telp : 021 2972 0201, 021 2972 0202
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width="35%" style="border: none; vertical-align: middle;">
                    <div class="header__container-identity border section kop-data-pasien" style="display: inline-block; ">
                      <table style="border: none; vertical-align: middle;">
                        <tr style="border: none; vertical-align: middle;">
                          <td>Nama Lengkap
                            <br>No. Rekam Medik
                            <br>Tanggal Lahir
                            <br>Jenis Kelamin
                          </td>
                          <td>: <b style="font-weight: bold;"><?= $data['pasien']->nama; ?></b>
                            <br>: <b style="font-weight: bold;"><?= $data['pasien']->no_rm; ?></b>
                            <br>: <b style="font-weight: bold;"><?= datefmysql($data['pasien']->tanggal_lahir); ?></b>
                            <br>: <b style="font-weight: bold;"><?= $data['pasien']->kelamin; ?></b>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </header>


          <br>
          <div>
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
              <thead>
                <tr>
                  <th class="table__little-title no__border" colspan="5">
                    <h3 style="font-weight: bold;">LAPORAN OPERASI</h3>
                  </th>
                </tr>
              </thead>
            </table>
            <br>
            <table border="1" style="border-collapse: collapse; width: 100%;">
              <tbody>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Diagnosa Pra Bedah</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->diagnosa_pra_bedah ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Diagnosa Pasca Bedah</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->diagnosa_pasca_bedah ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Prosedur Operasi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->prosedur_operasi ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Pemeriksaan Specimen</td>
                  <td class="no__border" width="1%">:</td>
                  <td class="no__border">
                    <input type="checkbox" <?= $data['laporan_operasi']->pemeriksaan_specimen == 'Tidak' ? 'checked' : ''; ?>>
                    <label for="">Tidak</label>
                    <input type="checkbox" <?= $data['laporan_operasi']->pemeriksaan_specimen == 'PA' ? 'checked' : ''; ?>>
                    <label for="">PA</label>
                    <input type="checkbox" <?= $data['laporan_operasi']->pemeriksaan_specimen == 'Kultur' ? 'checked' : ''; ?>>
                    <label for="">Kultur</label>
                    <input type="checkbox" <?= $data['laporan_operasi']->pemeriksaan_specimen == 'Sitologi' ? 'checked' : ''; ?>>
                    <label for="">Sitologi</label>
                    <input type="checkbox" <?= $data['laporan_operasi']->pemeriksaan_specimen == 'Lainnya' ? 'checked' : ''; ?>>
                    <label for="">Lainnya (<?= $data['laporan_operasi']->pemeriksaan_specimen_lain ?>)</label>
                  </td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Golongan Operasi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->golongan_operasi ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Komplikasi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->komplikasi ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Jumlah Darah Yang Hilang</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->jumlah_darah_hilang ?> (ml)</td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Tranfusi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->transfusi ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Jenis/Jumlah</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->jenis_jumlah ?> (ml)</td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Jenis Operasi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->jenis_operasi ?></td>
                </tr>
                <tr>
                  <td class="no__border" width="3%"></td>
                  <td class="no__border" width="30%">Jaringan yang di eksisi/insisi</td>
                  <td class="no__border" width="1%">: </td>
                  <td class="no__border" width="60%"><?= $data['laporan_operasi']->jaringan_eksisi ?></td>
                </tr>
              </tbody>
            </table>
            <br>
            <table border="1" style="border-collapse: collapse;">
              <tr>
                <td width="15%" style="text-align:center"><small>Tanggal Operasi</small></td>
                <td width="15%" style="text-align:center"><small>Jam Operasi Dimulai</small></td>
                <td width="15%" style="text-align:center"><small>Jam Operasi Selesai</small></td>
                <td width="15%" style="text-align:center"><small>Lamanya Operasi</small></td>
              </tr>
              <tr>
                <td width="15%" style="text-align:center"><small><?= datefmysql($data['laporan_operasi']->tanggal_operasi); ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->mulai_waktu_operasi ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->selesai_waktu_operasi ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->waktu_operasi ?></small></td>
              </tr>
            </table>
            <table border="1" style="border-collapse: collapse;">
              <br>
              <tr>
                <td width="15%" style="text-align:center"><small>Dokter Bedah</small></td>
                <td width="15%" style="text-align:center"><small>Asisten</small></td>
                <td width="15%" style="text-align:center"><small>Instrumentator</small></td>
                <td width="15%" style="text-align:center"><small>Sirkuler</small></td>

              </tr>
              <tr>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->nama_dokter ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->asisten ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->instrumentator ?></small></td>
                <td width="15%" style="text-align:center"><small><?= $data['laporan_operasi']->sirkuler ?></small></td>
              </tr>
            </table>
            <br>
            <table width="100%" border="1" style="border-collapse: collapse;">
              <tr>
                <td style="text-align:left" class="no__border" width="60%"><?= nl2br($data['laporan_operasi']->catatan); ?></td>
              </tr>
            </table>
          </div>
          <br>
          <br>
          <br>

          <!--=============== FOOTER ===============-->
          <!-- <footer class="footer">
            <div>
              <p class="page__number">FORM-PMD-02-04</p>
            </div>
          </footer> -->
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Laporan Tindakan -->
    <?php if (!empty($data_lap_tindakan)) : ?>
      <?php foreach ($data_lap_tindakan as $data) : ?>

        <div style="page-break-after: always;">
          <header class="header" id="header">
            <div class="header__container2 container kop-data-pasien">
              <table style="border: none; vertical-align: middle;">
                <tr>
                  <td width="65%" style="border: none; vertical-align: middle;">
                    <table style="border: none; vertical-align: middle;">
                      <tr style="border: none; vertical-align: middle;">
                        <td width="25%">
                          <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="80px" class="header__img">
                        </td>
                        <td width="75%">
                          <h3 style="font-weight: bold;">RSUD KOTA TANGERANG</h3>
                          Jl. Pulau Putri Raya Perumahan Modernland
                          <br>Kelurahan Kelapa Indah Kecamatan Tangerang
                          <br>Telp : 021 2972 0201, 021 2972 0202
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width="35%" style="border: none; vertical-align: middle;">
                    <div class="header__container-identity border section kop-data-pasien" style="display: inline-block; ">
                      <table style="border: none; vertical-align: middle;">
                        <tr style="border: none; vertical-align: middle;">
                          <td>Nama Lengkap
                            <br>No. Rekam Medik
                            <br>Tanggal Lahir
                            <br>Jenis Kelamin
                          </td>
                          <td>: <b style="font-weight: bold;"><?= $data['pasien']->nama; ?></b>
                            <br>: <b style="font-weight: bold;"><?= $data['pasien']->no_rm; ?></b>
                            <br>: <b style="font-weight: bold;"><?= datefmysql($data['pasien']->tanggal_lahir); ?></b>
                            <br>: <b style="font-weight: bold;"><?= $data['pasien']->kelamin; ?></b>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </header>

          <!--=============== MAIN ===============-->
          <main class="main">
            <section class="form__sk__sehat laporan-operasi">
              <br>
              <div class="form__sk__sehat__container container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                  <thead>
                    <tr>
                      <th style="font-weight: bold; font-size: 12pt;">LAPORAN TINDAKAN</th>
                    </tr>
                  </thead>
                </table>
                <br>
                <table width="100%" border="1" style="border-collapse: collapse;">
                  <tr>
                    <td class="no__border" width="30%"><small>Nama Tindakan</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_nama_tindakan ?? '-' ?></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" width="30%"><small>Diagnosa Sebelum Tindakan</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_diagnosa_sebelum ?? '-' ?></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" width="30%"><small>Diagnosa Sesudah Tindakan</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_diagnosa_sesudah ?? '-' ?></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" width="30%"><small>Pemeriksaan PA</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_pa ?? '-' ?></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" width="30%"><small>Komplikasi</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_komplikasi ?? '-' ?></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" width="30%"><small>Pendarahan</small></td>
                    <td class="no__border"><small>: <?= $data['lt']->lt_pendarahan ?? '-' ?></small></td>
                  </tr>

                </table>
                <table width="100%" border="1" style="border-collapse: collapse;">
                  <tr>
                    <td width="25%" style="text-align:center">
                      <small>Tanggal <br><?= $data['lt']->lt_tanggal ? datefmysql($data['lt']->lt_tanggal) : '-' ?></small>
                    </td>
                    <td width="25%" style="text-align:center">
                      <small>Jam Mulai <br><?= $data['lt']->lt_waktu_mulai ? date('H:i', strtotime($data['lt']->lt_waktu_mulai)) : '-' ?></small>
                    </td>
                    <td width="25%" style="text-align:center">
                      <small>Jam Selesai <br><?= $data['lt']->lt_waktu_selesai ? date('H:i', strtotime($data['lt']->lt_waktu_selesai)) : '-' ?></small>
                    </td>
                    <td width="25%" style="text-align:center">
                      <small>Lamanya Tindakan <br><?= $data['lt']->lt_lama_waktu ?? '-' ?></small>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top: 10px" class="no__border" colspan="4"><small><b>LAPORAN TINDAKAN</b></small></td>
                  </tr>
                  <tr>
                    <td class="no__border" colspan="4"><small><?= $data['lt']->lt_laporan_tindakan ?? '-' ?></small></td>
                  </tr>
                </table>
                <table width="100%" class="table table-no-border table-sm table-striped" border="1" style="border-collapse: collapse;">
                  <tr>
                    <td width="33%" style="text-align:center"><small>Dokter Spesialis</small></td>
                    <td width="33%" style="text-align:center"><small>Bidan / Perawat</small></td>
                    <td width="33%" style="text-align:center"><small>Bidan / Perawat</small></td>
                  </tr>
                  <tr>
                    <td style="text-align:center"><small>
                        <?php if ($data['lt']->ttd_dokter) : ?>
                          <img src="<?= base_url('resources/images/ttd_dokter/') . $data['lt']->ttd_dokter ?>" alt="ttd-dokter-operator" width="300">
                        <?php else : ?>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        <?php endif; ?>
                        <?= $data['lt']->nama_dokter ?? '' ?>
                        <?php if (!empty($data['lt']->sip_dokter)) : ?>
                          SIP. <?= $data['lt']->sip_dokter ?>
                        <?php endif; ?>
                      </small>
                    </td>
                    <td style="text-align:center"><small>
                        <?php if ($data['lt']->ttd_bidan) : ?>
                          <img src="<?= base_url('resources/images/ttd_dokter/') . $data['lt']->ttd_bidan ?>" alt="ttd-dokter-operator" width="300">
                        <?php else : ?>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        <?php endif; ?>
                        <?= $data['lt']->nama_bidan ?? '' ?>
                        <?php if (!empty($data['lt']->sip_bidan)) : ?>
                          SIP. <?= $data['lt']->sip_bidan ?>
                        <?php endif; ?>
                      </small>
                    </td>
                    <td style="text-align:center"><small>
                        <?php if ($data['lt']->ttd_perawat) : ?>
                          <img src="<?= base_url('resources/images/ttd_dokter/') . $data['lt']->ttd_perawat ?>" alt="ttd-dokter-operator" width="300">
                        <?php else : ?>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        <?php endif; ?>
                        <?= $data['lt']->nama_perawat ?? '' ?>
                        <?php if (!empty($data['lt']->sip_perawat)) : ?>
                          SIP. <?= $data['lt']->sip_perawat ?>
                        <?php endif; ?>
                      </small>
                    </td>
                  </tr>
                </table>
              </div>
              <br>
              <br>
              <br>
            </section>
          </main>

          <!--=============== FOOTER ===============-->
          <footer class="footer">
            <div class="footer__container container grid">
              <p class="page__number">FORM-KEP-90-00</p>
            </div>
          </footer>
        </div>
        <br><br>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Hasil Laboratorium -->
    <?php if (!empty($data_laboratorium)) : ?>

      <div style="page-break-after: always;">
        <?php

        function cekUmurPasien($tanggal_lahir)
        {

          $tgl1 = date_create($tanggal_lahir);
          $tgl2 = date_create(date('Y-m-d'));
          $sql = date_diff($tgl2, $tgl1);
          $hasil = $sql->format('%a');
          $hasil_sql = floor($hasil / 365);
          return $hasil_sql;
        }

        for ($indexData = 0; $indexData < $data_laboratorium['length']; $indexData++) : ?>

          <!-- Content -->
          <div class="page_break">

            <table>
              <thead>
                <tr>
                  <td>
                    <!-- baru -->
                    <table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #B9BBB6;">
                      <tr>
                        <td rowspan="3" style="width:75px"><img src="<?= resource_url() ?>images/logos/Logo_Kota_Tangerang.png" width="75px"></td>
                        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt; font-family: Arial;">LABORATORIUM RUMAH SAKIT UMUM DAERAH</b></td>
                        <td rowspan="3" style="width:75px"><img src="<?= resource_url() ?>images/logos/<?= $data_laboratorium['hospital']->logo ?>" width="75px" height="75px"></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt; font-family: Arial;">KOTA TANGERANG</b></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 9.5pt; font-family: Arial;">Jln. Pulau Putri Raya Kel. Kelapa Indah Kota Tangerang, Telp. 021-29720200 - 2972020202</b></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt; font-family: Arial;">&nbsp;</b></td>
                      </tr>
                    </table>
                    <br>

                    <div style="padding-left: 20px; padding-right: 20px;">
                      <table width="100%" class="td-top">
                        <tr>
                          <td width="18%">No. Lab / No. RM</td>
                          <td width="1%">:</td>
                          <td width="34%"><?= $data_laboratorium['laboratorium'][$indexData]->kode ?> / <?= $data_laboratorium['pendaftaran'][$indexData]['pasien']->id_pasien ?></td>
                          <td width="4%"></td>
                          <td width="20%">Tanggal Terima</td>
                          <td width="1%">:</td>
                          <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                            <?php foreach ($data_laboratorium['lab_value'][$indexData]->detail as $key => $value) :

                              if ($value->specimen->date !== null) :

                                $tanggal_terima = $value->specimen->date;
                                $hasil_terima_tanggal = [$tanggal_terima];
                            ?>



                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif ?>

                          <?php $result_terima_tanggal = array_unique($hasil_terima_tanggal);
                          $ta_trim_specimen = substr($result_terima_tanggal[0], 6, -6) . '-' . substr($result_terima_tanggal[0], 4, -8) . '-' . substr($result_terima_tanggal[0], 0, 4) . ' ' . substr($result_terima_tanggal[0], 8, -4) . ':' . substr($result_terima_tanggal[0], 10, -2); ?>
                          <td><?= $ta_trim_specimen; ?></td>
                        </tr>
                        <tr>
                          <td width="18%">Nama Pasien</td>
                          <td width="1%">:</td>
                          <td width="34%"><?= $data_laboratorium['pendaftaran'][$indexData]['pasien']->nama ?></td>
                          <td width="4%"></td>
                          <td width="20%">Tanggal Otorisasi</td>
                          <td width="1%">:</td>
                          <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                            <?php foreach ($data_laboratorium['lab_value'][$indexData]->detail as $key => $value) :

                              if ($value->authorise->date !== null) :

                                $tanggal_terima = $value->authorise->date;
                                $hasil_terima_tanggal = [$tanggal_terima];
                            ?>



                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif ?>

                          <?php $result_terima_tanggal = array_unique($hasil_terima_tanggal);
                          $ta_trim = substr($result_terima_tanggal[0], 6, -6) . '-' . substr($result_terima_tanggal[0], 4, -8) . '-' . substr($result_terima_tanggal[0], 0, 4) . ' ' . substr($result_terima_tanggal[0], 8, -4) . ':' . substr($result_terima_tanggal[0], 10, -2); ?>
                          <td><?= $ta_trim; ?></td>
                        </tr>
                        <tr>
                          <td width="18%">Tgl Lahir / Usia</td>
                          <td width="1%">:</td>
                          <td width="34%"><?= dateStrips($data_laboratorium['pendaftaran'][$indexData]['pasien']->tanggal_lahir) ?> (<?= cekUmurPasien($data_laboratorium['pendaftaran'][$indexData]['pasien']->tanggal_lahir) ?> Tahun)</td>
                          <td width="4%"></td>
                          <td width="20%">Tanggal Cetak</td>
                          <td width="1%">:</td>
                          <td width="22%"><?= Date('d-m-Y h:i', $_SERVER['REQUEST_TIME']) ?></td>
                        </tr>
                        <tr>
                          <td width="18%">Jenis Kelamin</td>
                          <td width="1%">:</td>
                          <td width="34%"><?= (($data_laboratorium['pendaftaran'][$indexData]['pasien']->kelamin === 'L') ? 'Laki - Laki' : (($data_laboratorium['pendaftaran'][$indexData]['pasien']->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
                          <td width="4%"></td>
                          <td width="20%">Unit</td>
                          <td width="1%">:</td>
                          <td width="22%"><?= ($data_laboratorium['pendaftaran'][$indexData]['layanan']->layanan !== null) ? $data_laboratorium['pendaftaran'][$indexData]['layanan']->layanan : $data_laboratorium['pendaftaran'][$indexData]['layanan']->bangsal ?></td>
                        </tr>
                        <tr>
                          <td width="18%">Alamat</td>
                          <td width="1%">:</td>
                          <td width="34%"><?= $data_laboratorium['pendaftaran'][$indexData]['pasien']->alamat ?></td>
                          <td width="4%"></td>
                          <td width="20%">Status Pasien</td>
                          <td width="1%">:</td>
                          <td width="22%"><?= ($data_laboratorium['pendaftaran'][$indexData]['layanan']->penjamin !== "") ? $data_laboratorium['pendaftaran'][$indexData]['layanan']->penjamin : $data_laboratorium['pendaftaran'][$indexData]['layanan']->cara_bayar ?></td>
                        </tr>
                        <tr>
                          <td width="18%">Dokter</td>
                          <td width="1%">:</td>
                          <td colspan="5"><?= $data_laboratorium['pendaftaran'][$indexData]['layanan']->dokter ?></td>
                        </tr>
                        <?php

                        if (isset($data_laboratorium['diagnosa'][$indexData]->diagnosis)) {

                          $sebab_sakit_lain = $data_laboratorium['diagnosa'][$indexData]->diagnosis;
                        } else {

                          $s_sebab = substr($data_laboratorium['diagnosa'][$indexData]->sebab_sakit, 0, 100);

                          if (is_string($s_sebab)) {

                            $sebab_sakit_lain = $s_sebab;
                          } else {

                            $sebab_sakit_lain = null;
                          }
                        }

                        ?>
                        <tr>
                          <td width="18%">Indikasi Klinis</td>
                          <td width="1%">:</td>
                          <td colspan="5"><?= $sebab_sakit_lain ?></td>
                        </tr>
                      </table>
                      <br>
                    </div>
                  </td>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="border-collapse: collapse; font-size: 11px; font-family: Arial;">
                      <thead>
                        <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                          <th width="25%" style="font-weight: bold; text-align:left;">Pemeriksaan</th>
                          <th width="5%" style="font-weight: bold; text-align:left; padding-bottom: 10px;">&nbsp;</th>
                          <th width="15%" style="font-weight: bold; text-align:left;">Hasil</th>
                          <th width="11%" style="font-weight: bold; text-align:left;">Satuan</th>
                          <th width="19%" style="font-weight: bold; text-align:left;">Nilai Rujukan</th>
                          <th width="25%" style="font-weight: bold; text-align:left;">Ket.</th>
                        </tr>
                      </thead>
                      <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                        <?php

                        $arr = [];

                        foreach ($data_laboratorium['lab'][$indexData] as $key => $value) {
                          array_push($arr, $value);
                        }

                        $keys = array_column($arr, 'test_group');
                        array_multisort($keys, SORT_ASC, $arr);

                        $byGroup = group_by("test_group", $arr);

                        foreach ($byGroup as $key => $value) : ?>

                          <tr>
                            <td style="padding-top:10px; font-weight: bold; vertical-align: top;"><?= $key ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="padding-bottom:5px;"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>

                          <?php $orderGroup = group_by("order_testnm", $value);

                          foreach ($orderGroup as $a => $b) : ?>

                            <tr>
                              <td style="font-weight: bold; vertical-align: top;"><?= $a ?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td style="padding-bottom:5px;"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <?php
                            $arry = [];
                            array_push($arry, $b);

                            foreach ($arry as $c => $d) : ?>

                              <?php
                              $ref_range = '';

                              $volume  = array_column($d, 'disp_seq');
                              array_multisort($volume, SORT_ASC, $d);

                              foreach ($d as $e => $f) : ?>
                                <tr>
                                  <?php if (empty($f['nama'])) : ?>
                                    <td style="padding-bottom:5px; padding-left: 5px; vertical-align: top;"></td>
                                  <?php else : ?>
                                    <?php foreach ($f['nama'] as $g => $h) :
                                      if ($h->nama === 'Hitung Jenis') {
                                    ?>
                                        <td style="padding-bottom:5px; font-weight: bold; padding-left: 5px; vertical-align: top;"><?= $h->nama ?></td>
                                      <?php } else { ?>
                                        <td style="padding-bottom:5px; padding-left: 5px; vertical-align: top;"><?= $h->nama ?></td>
                                    <?php }
                                    endforeach; ?>
                                  <?php endif;

                                  if ($f['flag'] === 'N') {
                                    $flag = '<td align="left"></td>';
                                    $td_result_value = '<td style="padding-left:10px; vertical-align: top;" align="left">';
                                  } else {
                                    $flag = '<td align="left" style="color:red; font-weight: bold; text-align: right; vertical-align: top;">' . $f['flag'] . '</td>';
                                    $td_result_value = '<td style="padding-left:10px; color:red; font-weight: bold; vertical-align: top;" align="left">';
                                  }

                                  if ($f['ref_range'] === '' && $f['unit'] === '' && $f['test_comment'] === '') {
                                    if (strlen($f['result_value']) < 10) {

                                      $ref_range = $td_result_value . $f['result_value'] . '
                                </td>
                                <td align="left" style="vertical-align: top;">' . $f['unit'] . '</td>
                                <td align="left" style="vertical-align: top;">' . $f['ref_range'] . '
                                <td align="left" style="vertical-align: top;">' . replaceEnter($f['test_comment']) . '</td>
                                ';
                                    } else {

                                      $ref_range = '<td style="padding-left:10px; vertical-align: top;" align="left" colspan="4">' . $f['result_value'] . '
                          </td>';
                                    }
                                  } else {

                                    $ref_range = $td_result_value . $f['result_value'] . '
                                </td>
                                <td align="left" style="vertical-align: top;">' . $f['unit'] . '</td>
                                <td align="left" style="vertical-align: top;">' . $f['ref_range'] . '
                                <td align="left" style="vertical-align: top;">' . replaceEnter($f['test_comment']) . '</td>
                                ';
                                  }

                                  ?>

                                  <?= $flag; ?>
                                  <?= $ref_range; ?>

                                <?php endforeach; ?>

                                </tr>

                              <?php endforeach; ?>



                            <?php endforeach; ?>


                          <?php endforeach; ?>
                        <?php endif ?>

                    </table>
                    <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                      <?php if (!empty($data_laboratorium['lab_value'][$indexData]->global_comment)) : ?>
                        <p><span style="font-weight:bold;">Catatan</span><br /><?= $data_laboratorium['lab_value'][$indexData]->global_comment ?></p>
                      <?php endif ?>
                    <?php endif ?>
                    <!-- <br><br> -->
                    <br><br>
                  </td>
                </tr>
              </tbody>

              <tfoot>
                <tr>
                  <td>
                    <br>

                    <?php
                    // Informasi untuk QR Code
                    $lab_number = $data_laboratorium['laboratorium'][$indexData]->kode;
                    $name = $data_laboratorium['pendaftaran'][$indexData]['pasien']->nama;
                    $birth_date = dateStrips($data_laboratorium['pendaftaran'][$indexData]['pasien']->tanggal_lahir);
                    $specimen_date = $ta_trim_specimen;
                    $status = "Verified";

                    // Gabungkan informasi menjadi satu string
                    $text_barcode = "Hasil Laboratorium RSUD Kota Tangerang\n";
                    $text_barcode .= "Nomor Laboratorium: $lab_number\n";
                    $text_barcode .= "Nama: $name\n";
                    $text_barcode .= "Tanggal Lahir: $birth_date\n";
                    $text_barcode .= "Tanggal Specimen: $specimen_date\n";
                    $text_barcode .= "Status: $status";

                    ?>
                    <table width="100%" cellspacing="0" cellpadding="0" class="td-top" style="color:#000; border-top: 2px solid #B9BBB6;">
                      <tr>
                        <td width="40%" align="left">Dokter Penanggung Jawab :</td>
                        <td width="20%" align="center" rowspan="8" style="padding-top: 2px;">
                          <img width="120px" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                        </td>
                        <td width="40%" align="right">Diotorisasi Oleh</td>
                      </tr>
                      <tr>
                        <td align="left">dr. Arny Nandiarny,Sp.PK,MMRS</td>
                        <td align="right"><?= ucwords(strtolower($data_laboratorium['laboratorium'][$indexData]->lab_analis)) ?></td>
                      </tr>
                      <tr>
                        <td align="left">dr. Muslimah,Sp.PK</td>
                        <td align="right"></td>
                      </tr>
                      <tr>
                        <td align="left">dr. Ratri Dwitiya Nestiti, Sp.PK</td>
                        <td align="right"></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="right">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center">Hasil Laboratorium telah diotorisasi secara elektronik</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        <?php endfor ?>
      </div>
      <br><br>

    <?php endif ?>

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
      <br><br>

    <?php endif ?>

    <!-- Hasil SPRI -->
    <?php if (!empty($data_spr)) : ?>

      <div style="page-break-after: always;">

        <header class="header" id="header">
          <div>
            <div style="margin-left: 15px;">
              <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="85px">
              <p class="address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
            </div>
          </div>
        </header>
        <br>

        <h2 style="font-weight: bold; margin-top: 0px;" class="center">SURAT PENGANTAR RAWAT</h2>
        <br>

        <table border="1" style="border-collapse: collapse; width: 100%;" class="small__font">
          <tbody>
            <tr>
              <td style="padding: 5px;">
                <table style="border-collapse: collapse; width: 100%;" class="small__font">
                  <tr>
                    <td width="25%" style="vertical-align: top;" class="no__border">Dengan Hormat,</td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                  </tr>
                  <tr>
                    <td colspan="6" class="no__border">Mohon diberikan perawatan dan atau disiapkan untuk :</td>
                  </tr>
                  <tr>
                    <td class="no__border flex" colspan="2">
                      <div>
                        <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->operasi_spr == '1' ? 'checked' : ''; ?>>
                        <label for="">Operasi</label>
                      </div>
                    </td>
                    <td class="no__border flex" colspan="2">
                      <div>
                        <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->odc_spr == '1' ? 'checked' : ''; ?>>
                        <label for="">(ODC) One Day Care </label>
                      </div>
                    </td>
                    <td class="no__border flex" colspan="2">
                      <div>
                        <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->rawat_inap_spr == '1' ? 'checked' : ''; ?>>
                        <label for="">Rawat Inap</label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border">Nama Pasien</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['ttd_pasien_name']; ?></td>
                  </tr>
                  <tr>
                    <td class="no__border">Jenis Kelamin</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['ttd_pasien_kelamin']; ?></td>
                  </tr>
                  <tr>
                    <td class="no__border">No. RM</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['ttd_pasien_nomor']; ?></td>
                  </tr>
                  <tr>
                    <td class="no__border">Umur</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['ttd_pasien_umur']; ?></td>
                  </tr>
                  <tr>
                    <td class="no__border">Diagnosis</td>
                    <td colspan="2" class="no__border">: (<?= $data_spr['surat_pengantar_rawat']->diagnosis_spr ?>)</td>
                    <td class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->infeksi_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Infeksi</label>
                    </td>
                    <td class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->non_infeksi_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Non infeksi</label>
                    </td>
                  </tr>
                  <tr>
                    <td class="no__border">Dokter yang merawat</td>
                    <td colspan="5" class="no__border">: ( <?= $data_spr['surat_pengantar_rawat']->nama_dokter_1 ?> )</td>
                  </tr>
                  <tr>
                    <td class="no__border">Jenis tindakan / operasi</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['surat_pengantar_rawat']->jto_spr ?></td>
                  </tr>
                  <tr>
                    <td class="no__border">Golongan tindakan / operasi</td>
                    <td colspan="2" class="no__border">: (<?= $data_spr['surat_pengantar_rawat']->gto_spr ?>)</td>
                    <td class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->cito_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Cito</label>
                    </td>
                    <td class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->tidak_cito_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Tidak Cito</label>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="padding: 5px;">
                <table style="border-collapse: collapse; width: 100%;" class="small__font">
                  <tr>
                    <td width="25%" style="vertical-align: top;" class="no__border">Ruangan yang dituju</td>
                    <td width="15%" style="vertical-align: top;" class="no__border">:
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->icu_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">ICU</label>
                    </td>
                    <td width="15%" style="vertical-align: top;" class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->hcu_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">HCU</label>
                    </td>
                    <td width="15%" style="vertical-align: top;" class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->pcu_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">PICU</label>
                    </td>
                    <td width="15%" style="vertical-align: top;" class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->nicu_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">NICU</label>
                    </td>
                    <td width="15%" style="vertical-align: top;" class="no__border">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->vk_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">VK</label>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->perinatologi_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Perinatologi</label>
                    </td>
                    <td colspan="4">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->ruang_perawatan_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Ruang Perawatan </label>
                      <label for="">(<?= $data_spr['surat_pengantar_rawat']->rp_spr ?>)</label>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->isolasi_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Isolasi</label>
                    </td>
                    <td colspan="4">
                      <input type="checkbox" <?= $data_spr['surat_pengantar_rawat']->lain_lain_spr == '1' ? 'checked' : ''; ?>>
                      <label for="">Lain-lain </label>
                      <label for="">(<?= $data_spr['surat_pengantar_rawat']->ll_spr ?>)</label>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><br></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">
                      <div>Tangerang, <?= tanggal_indo($data_spr['surat_pengantar_rawat']->tanggal_dokter_spr, false) ?></div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">Dokter Pengirim,</td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2">
                      <?php if (!empty($data_spr['surat_pengantar_rawat']->ttd_dokter_2)) :
                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data_spr['surat_pengantar_rawat']->ttd_dokter_2 . '" alt="ttd-dokter" width="200"><br>';
                      else :
                        echo '<br><br><br><br><br>';
                      endif;
                      ?>
                      <!-- <br><br><br><br><br> -->
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center"><b>( <?= $data_spr['surat_pengantar_rawat']->nama_dokter_2; ?> )</b></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">Nama & Tanda Tangan</td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td style="padding: 5px;">
                <table style="border-collapse: collapse; width: 100%;" class="small__font">
                  <tr>
                    <td class="no__border" style="vertical-align: top;">Catatan Pendaftaran</td>
                    <td colspan="5" class="no__border">: <?= $data_spr['surat_pengantar_rawat']->catatan_pendaftaran_spr ?></td>
                  </tr>
                  <tr>
                    <td width="25%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                    <td width="15%" style="vertical-align: top;" class="no__border"></td>
                  </tr>
                  <tr>
                    <td colspan="6"><br></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">
                      <div>Tangerang, <?= tanggal_indo($data_spr['surat_pengantar_rawat']->tanggal_petugas_spr, false) ?></div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">Petugas Pendaftaran,</td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2">
                      <?php if (!empty($data_spr['surat_pengantar_rawat']->ttd_users)) :
                        echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $data_spr['surat_pengantar_rawat']->ttd_users . '" alt="ttd-dokter" width="200"><br>';
                      else :
                        echo '<br><br><br><br><br>';
                      endif;
                      ?>
                      <!-- <br><br><br><br><br> -->
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center"><b>( <?= $data_spr['surat_pengantar_rawat']->id_users; ?> )</b></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="center">Nama & Tanda Tangan</td>
                  </tr>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br><br>

    <?php endif ?>

    <!-- SITB -->
    <?php
    $data_sitb = $data_file_upload['file_sitb'];
    if (!empty($data_sitb)) :
      $url = str_replace('http://192.168.77.101/', 'https://cloudrsud.tangerangkota.go.id/', $data_sitb->file_location);
    ?>
      <style>
        /* Container utama */
        .a4-container {
          /* width: 208mm; */
          /* height: 294mm; */
          display: flex;
          justify-content: center;
          align-items: center;
          /* background: #f0f0f0; */
          /* Latar belakang untuk melihat outline */
        }

        /* Card dengan ukuran yang sudah dikurangi */
        .a4-card {
          width: calc(210mm - 2cm);
          /* Kurangi outline */
          height: calc(297mm - 2cm);
          /* Kurangi outline */
          /* background: white; */
          /* border: 5px solid red; */
          padding: 1cm;
          /* outline: 2cm solid #FFEAEA; */
          /* Outline */
          /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
          display: flex;
          flex-direction: row;
          justify-content: center;
          align-items: flex-start;
          font-family: Arial, sans-serif;
          /* text-align: center; */
        }

        /* Agar tetap sesuai ukuran saat di-print */
        @media print {
          .a4-container {
            width: 100%;
            /* height: 100%; */
            background: none;
            display: flex;
            justify-content: center;
            align-items: center;
          }

          .a4-card {
            width: calc(210mm - 2cm);
            height: calc(237mm - 3cm);
            box-shadow: none;
          }
        }
      </style>
      <div style="page-break-after: always;">

        <div class="a4-container">
          <div class="a4-card">
            <img style="" src="<?= $url ?>">
          </div>
          <br><br>
        </div>

      </div>
    <?php endif ?>

    <!-- FILE LAIN -->
    <?php
    $data_file_lain = $data_file_upload['file_rm_lain'];
    if (!empty($data_file_lain)) :
    ?>
      <?php foreach ($data_file_lain as $val) : ?>
        <div style="page-break-after: always;">
          <div class="page-img">
            <?php foreach ($val->file_location as $url_file) :
              $url = str_replace('http://192.168.77.101/', 'https://cloudrsud.tangerangkota.go.id/', $url_file);
            ?>
              <div style="display: flex; justify-content: center;">
                <img style="height: 22cm;" src="<?= $url ?>">
              </div>
              <br><br>

            <?php endforeach ?>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>

    <!-- Rekap Billing -->
    <table width="100%">
      <tr class="v-center">
        <td rowspan="4" width="90px"><img src="<?= base_url() ?>resources/images/logos/<?= $data_billing['hospital']->logo ?>" width="70px" height="70px"></td>
      </tr>
      <tr>

        <td width="50%"><?= $data_billing['hospital']->nama ?></td>
        <td class="right">&nbsp;</td>
      </tr>
      <tr>
        <td><?= $data_billing['hospital']->alamat ?> <?= $data_billing['hospital']->kelurahan ?></td>
        <td class="right"></td>
      </tr>
      <tr>
        <td>Telp. <?= $data_billing['hospital']->telp ?>, Fax. <?= $data_billing['hospital']->fax ?></td>
      </tr>
    </table>
    <br>
    <div style="width:100%;display:inline-block;">
      <div style="width:50%;float:left;">
        <table width="100%" style="color:#000;border-spacing:0;">
          <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td width="60%"><?= $data_billing['pasien']->nama ?></td>
          </tr>
          <tr>
            <td>Kelamin</td>
            <td>:</td>
            <td><?= $data_billing['pasien']->kelamin ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $data_billing['pasien']->alamat ?></td>
          </tr>
          <tr>
            <td>P. Jawab Pasien</td>
            <td>:</td>
            <td><?= ($data_billing['pasien']->nama_pjwb === '' ? '-' : $data_billing['pasien']->nama_pjwb) ?></td>
          </tr>
        </table>
      </div>
      <div style="width:50%;float:right;">
        <table width="100%" style="color:#000;border-spacing:0;">
          <tr>
            <td width="30%">No. Reg / No. RM</td>
            <td width="5%">:</td>
            <td width="60%"><?= $data_billing['pasien']->no_register . ' / ' . $data_billing['pasien']->id_pasien ?></td>
          </tr>
          <tr>
            <td>Waktu Masuk</td>
            <td>:</td>
            <td><?= indo_time($data_billing['pasien']->tanggal_daftar) ?></td>
          </tr>
          <tr>
            <td>Waktu Keluar</td>
            <td>:</td>
            <td><?= ($data_billing['pasien']->tanggal_keluar === null ? '-' : indo_time($data_billing['pasien']->tanggal_keluar)) ?></td>
          </tr>
        </table>
      </div>
    </div>
    <br>
    <center>
      <h3 style="font-weight: bold;">Rincian Billing</h3>
    </center>
    <?php
    $SUBTOTAL = 0;
    $TOTAL = 0;
    $ADM_RANAP_TEMP = NULL;
    $ADM_ICARE_TEMP = NULL;
    ?>
    <?php foreach ($data_billing['layanan'] as $key => $lay) : ?>
      <?php
      $jenis_igd = '';
      if (($lay->jenis_layanan === 'IGD') && ($data_billing['pasien']->jenis_igd !== null)) :
        $jenis_igd = $data_billing['pasien']->jenis_igd;
      endif;

      if ($lay->item_billing < 1) :
        continue;
      endif;
      ?>
      <h3>Jenis Layanan : <?= $lay->jenis_layanan . ' ' . $lay->layanan . ($jenis_igd !== 'Umum' ? $jenis_igd : '') ?></h3>
      <h3 style="margin-top:3px"><?= 'Cara Bayar : ' . $lay->cara_bayar . ' ' . ($lay->cara_bayar !== 'Tunai' ? ' <span style="font-weight: bold;">(' . $lay->penjamin . ')</span>' : '') ?></h3>
      <table width="100%" class="tabel-laporan">
        <thead>
          <tr>
            <th width="35%" class="left" style="white-space:nowrap">Item</th>
            <th width="3%" class="left" style="white-space:nowrap"></th>
            <th width="30%" class="left" style="white-space:nowrap">Operator</th>
            <th width="5%" class="center" style="white-space:nowrap">Jml</th>
            <th width="10%" class="right" style="white-space:nowrap">Harga (Rp.)</th>
            <th width="10%" class="right" style="white-space:nowrap">Total (Rp.)</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rawat Inap -->
          <?php if (count((array)$lay->rawat_inap) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Akomodasi Kamar</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->rawat_inap as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->bangsal ?> (<?= datetimefmysql($value->tanggal_masuk, true, false) ?> - <?= ($value->tanggal_keluar !== null ? datetimefmysql($value->tanggal_keluar, true, false) : 'Sekarang') ?>) Status Keluar : <?= $value->tindak_lanjut ?>
                </td>
                <td></td>
                <td></td>
                <td class="center"><?= $value->durasi ?></td>
                <td class="right"><?= currency($value->nominal) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Rawat Inap -->

          <!-- Intensive Care -->
          <?php if (count((array)$lay->intensive_care) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Akomodasi Kamar</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->intensive_care as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->bangsal ?> (<?= datetimefmysql($value->tanggal_masuk, true, false) ?> - <?= ($value->tanggal_keluar !== null ? datetimefmysql($value->tanggal_keluar, true, false) : 'Sekarang') ?>) Status Keluar : <?= $value->tindak_lanjut ?>
                </td>
                <td></td>
                <td></td>
                <td class="center"><?= $value->durasi ?></td>
                <td class="right"><?= currency($value->nominal) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Intensive Care -->

          <!-- Pendaftaran -->
          <?php if (count((array)$lay->pendaftaran) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Pendaftaran</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->pendaftaran as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->item ?></td>
                <td class="center"></td>
                <td><?= $value->operator ?></td>
                <td class="center"><?= $value->frekuensi ?></td>
                <td class="right"><?= currency($value->harga_item) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Pendaftaran -->

          <!-- Tindakan-->
          <?php if (count((array)$lay->tindakan) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Tindakan</b></td>
            </tr>
            <?php
            $subtotal = 0;
            $id_lay = NULL;
            $frekuensi = 0;
            $total_tindakan = 0;
            $print = true;
            ?>
            <?php foreach ($lay->tindakan as $key => $value) : ?>
              <?php
              if ($value->item == 'Administrasi Pasien Rawat Inap') :
                $ADM_RANAP_TEMP = $value;
                continue;
              endif;
              if ($value->item == 'Administrasi Pasien Intensive Care') :
                $ADM_ICARE_TEMP = $value;
                continue;
              endif;

              $subtotal += $value->total;
              // if (($value->profesi === 'Perawat')) :
              // 	if ($id_lay === $value->id_layanan_pendaftaran) :
              // 		$frekuensi += $value->frekuensi;
              // 		$total_tindakan += $value->total;
              // 		$print = false;
              // 		if ((isset($lay->tindakan[$key + 1])) && ($lay->tindakan[$key + 1]->id_layanan_pendaftaran !== $value->id_layanan_pendaftaran)) :
              // 			$print = true;
              // 		endif;
              // 		if ($key === (count((array)$lay->tindakan) - 1)) :
              // 			$print = true;
              // 		endif;
              // 	else :
              // 		$id_lay = $value->id_layanan_pendaftaran;
              // 		$frekuensi = $value->frekuensi;
              // 		$total_tindakan = $value->total;
              // 		$print = false;
              // 		if ((isset($lay->tindakan[$key + 1])) && ($lay->tindakan[$key + 1]->id_layanan_pendaftaran !== $value->id_layanan_pendaftaran)) :
              // 			$print = true;
              // 		endif;
              // 	endif;
              // else :
              $frekuensi = $value->frekuensi;
              $total_tindakan = $value->total;
              $print = true;
              // endif;
              if ($key === (count((array)$lay->tindakan) - 1)) :
                $print = true;
              endif;
              ?>
              <?php if ($print) : ?>
                <tr>
                  <td style="padding-left:15px;"><?= $value->item ?></td>
                  <td class="center" style="white-space:nowrap;"><?= ($value->tanggal !== '' ? '(' . datetimefmysql($value->tanggal, true) . ')&nbsp;&nbsp;' : '') ?></td>
                  <td><?= ($value->profesi === 'Perawat' ? 'Perawat' : $value->operator) ?></td>
                  <td class="center"><?= $value->frekuensi ?></td>
                  <td class="right"><?= currency($value->harga_item) ?></td>
                  <td class="right"><?= currency($total_tindakan) ?></td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Tindakan -->

          <!-- Operasi -->
          <?php if (count((array)$lay->operasi) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Operasi</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->operasi as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
                <td class="v-top center" style="white-space:nowrap;"><?= ($value->waktu !== '' ? '(' . datetimefmysql($value->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td class="v-top">
                  <?php if (count((array)$value->operator_list) > 0) : ?>
                    <b style="font-weight:bold;">Operator</b>
                    <?php foreach ($value->operator_list as $key2 => $op) : ?>
                      <li><?= $op->operator ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if (count((array)$value->anesthesi_list) > 0) : ?>
                    <b style="font-weight:bold;">Anesthesi</b>
                    <?php foreach ($value->anesthesi_list as $key2 => $an) : ?>
                      <li><?= $an->operator ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if ((count((array)$value->anesthesi_list) === 0) and (count((array)$value->anesthesi_list) === 0)) : ?>
                    <?= $value->operator ?>
                  <?php endif; ?>
                </td>
                <td class="v-top center"><?= $value->frekuensi ?></td>
                <td class="v-top right"><?= currency($value->harga_item) ?></td>
                <td class="v-top right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Operasi -->

          <!-- Barang Operasi -->
          <?php $subbarang = 0; ?>
          <?php if (count((array)$lay->barang_operasi) > 0) : ?>
            <?php $subtotal = 0 ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Barang Operasi</b></td>
            </tr>
            <?php foreach ($lay->barang_operasi as $key => $barang) : ?>
              <tr>
                <td style="padding-left:15px;font-size:14px;font-weight:bold;">
                  <?php
                  echo "BHP";
                  ?>
                </td>
                <td class="center" style="white-space:nowrap;"><?= ($barang->waktu !== '' ? '(' . datetimefmysql($barang->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td colspan="4"></td>
              </tr>
              <?php foreach ($barang->detail as $key2 => $value) : ?>
                <tr>
                  <td style="padding-left:35px;" colspan="3"><?= $value->item ?></td>
                  <td class="center"><?= $value->qty ?></td>
                  <td class="right"><?= currency($value->harga_jual) ?></td>
                  <td class="right"><?= currency($value->total) ?></td>
                </tr>
              <?php $subtotal += $value->total;
              endforeach; ?>
              <tr>
                <td colspan="5"><b style="font-size:14px;"></b></td>
                <td class="right"><b style="font-weight:bold;"><?= currency($subtotal) ?></b></td>
              </tr>
            <?php $SUBTOTAL += $subtotal;
              $subbarang += $subtotal;
              $subtotal = 0;
            endforeach; ?>
          <?php endif; ?>
          <!-- End Barang Operasi -->

          <!-- VK -->
          <?php if (count((array)$lay->vk) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">VK</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->vk as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
                <td class="v-top center"></td>
                <td class="v-top">
                  <?php if (count((array)$value->operator_list) > 0) : ?>
                    <b style="font-weight:bold;">Operator</b>
                    <?php foreach ($value->operator_list as $key2 => $op) : ?>
                      <li><?= $op->operator ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if (count((array)$value->anesthesi_list) > 0) : ?>
                    <b style="font-weight:bold;">Anesthesi</b>
                    <?php foreach ($value->anesthesi_list as $key2 => $an) : ?>
                      <li><?= $an->operator ?></li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  <?php if ((count((array)$value->anesthesi_list) === 0) and (count((array)$value->anesthesi_list) === 0)) : ?>
                    <?= $value->operator ?>
                  <?php endif; ?>
                </td>
                <td class="v-top center"><?= $value->frekuensi ?></td>
                <td class="v-top right"><?= currency($value->harga_item) ?></td>
                <td class="v-top right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End VK -->

          <!-- Barang -->
          <?php if ((count((array)$lay->barang) > 0) || (count((array)$lay->barang_operasi) > 0)) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Barang</b></td>
            </tr>
          <?php endif; ?>
          <?php $subbarang = 0; ?>
          <?php if (count($lay->barang) > 0) : ?>
            <?php $subtotal = 0 ?>
            <?php foreach ($lay->barang as $key => $barang) : ?>
              <tr>
                <td style="padding-left:15px;font-size:14px;font-weight:bold;">
                  <?php
                  if ($barang->id_resep !== NULL) :
                    echo "Resep No. Bukti " . $barang->id_resep_tebus;
                  else :
                    echo "BHP No. " . $barang->id;
                  endif;
                  ?>
                </td>
                <td class="center" style="white-space:nowrap;"><?= ($barang->waktu !== '' ? '(' . datetimefmysql($barang->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td colspan="4"></td>
              </tr>
              <?php foreach ($barang->detail as $key2 => $value) : ?>
                <tr>
                  <td style="padding-left:35px;" colspan="3"><?= $value->item ?></td>
                  <td class="center"><?= $value->qty ?></td>
                  <td class="right"><?= currency($value->harga_jual) ?></td>
                  <td class="right"><?= currency($value->total) ?></td>
                </tr>
              <?php $subtotal += intval($value->total);
              endforeach; ?>
              <tr>
                <td class="right" colspan="5" style="font-weight:bold;"></td>
                <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
              </tr>
            <?php $SUBTOTAL += $subtotal;
              $subbarang += $subtotal;
              $subtotal = 0;
            endforeach; ?>
          <?php endif; ?>
          <!-- End Barang -->

          <!-- Bank Darah -->
          <?php if (count((array)$lay->bank_darah) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Bank Darah</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->bank_darah as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
                <td class="v-top center" style="white-space:nowrap;"><?= ($value->waktu !== '' ? '(' . datetimefmysql($value->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td><?= $value->operator ?></td>
                <td class="v-top center"><?= $value->frekuensi ?></td>
                <td class="v-top right"><?= currency($value->harga_item) ?></td>
                <td class="v-top right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Bank Darah -->

          <!-- Barang Bank Darah -->
          <!-- <-?php if (count((array)$lay->barang_bank_darah) > 0) : ?>
					<tr>
						<td colspan="6"><b style="font-size:14px;font-weight:bold;">Barang Bank Darah</b></td>
					</tr>
					<-?php endif; ?>
					<-?php $subbarang = 0; ?>
					<-?php if (count($lay->barang_bank_darah) > 0) : ?>
						<-?php $subtotal = 0 ?>
						<-?php foreach ($lay->barang_bank_darah as $key => $barang) : ?>
						<-?php foreach ($barang->detail as $key2 => $value) : ?>
						<tr>
							<td colspan="5" style="padding-left:15px;">
								<-?php  
									echo $value->item;
								?>
							</td>
							<td class="v-top right"><-?= currency($value->total) ?></td>
						</tr>
						<-?php $subtotal += $value->total; endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weght:bold;"></td>
							<td class="right" style="font-weight:bold;"><-?= currency($subtotal) ?></td>
						</tr>
						<-?php $SUBTOTAL += $subtotal; $subbarang += $subtotal; $subtotal = 0; endforeach; ?>
					<-?php endif; ?>  -->
          <!-- End Barang Bank Darah -->

          <!-- Retur Barang -->
          <?php if (count((array)$lay->retur_barang) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Retur Barang</b></td>
            </tr>
          <?php endif; ?>
          <?php $subreturbarang = 0; ?>
          <?php if (count($lay->retur_barang) > 0) : ?>
            <?php $subtotal = 0 ?>
            <?php foreach ($lay->retur_barang as $key => $barang) : ?>
              <tr>
                <td colspan="5" style="padding-left:15px;">
                  <?php
                  echo "No. Retur " . $barang->id;
                  foreach ($barang->detail as $key2 => $value) $subtotal += $value->total;
                  ?>
                </td>
                <td class="v-top right"><?= currency($subtotal) ?></td>
              </tr>
            <?php $SUBTOTAL -= $subtotal;
              $subbarang -= $subtotal;
              $subtotal = 0;
            endforeach; ?>
          <?php endif; ?>
          <?php if (count((array)$lay->retur_barang) > 0) : ?>
            <tr>
              <td colspan="5"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subreturbarang) ?></td>
            </tr>
          <?php endif; ?>
          <!-- End Retur Barang -->

          <!-- Laboratorium -->
          <?php if (count((array)$lay->laboratorium) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Laboratorium</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->laboratorium as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->item ?></td>
                <td class="center" style="white-space:nowrap;"><?= ($value->waktu_konfirm !== '' ? '(' . datetimefmysql($value->waktu_konfirm, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td><?= $value->operator ?></td>
                <td class="center"><?= $value->frekuensi ?></td>
                <td class="right"><?= currency($value->harga_item) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Laboratorium -->

          <!-- Radiologi -->
          <?php if (count((array)$lay->radiologi) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Radiologi</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->radiologi as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->item ?></td>
                <td class="center" style="white-space:nowrap;"><?= ($value->waktu_konfirm !== '' ? '(' . datetimefmysql($value->waktu_konfirm, true) . ')&nbsp;&nbsp;' : '') ?></td>
                <td><?= $value->operator ?></td>
                <td class="center"><?= $value->frekuensi ?></td>
                <td class="right"><?= currency($value->harga_item) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Radiologi -->

          <!-- Fisioterapi -->
          <?php if (count((array)$lay->fisioterapi) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Fisioterapi</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->fisioterapi as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->item ?></td>
                <td class="center"></td>
                <td><?= $value->operator ?></td>
                <td class="center"><?= $value->frekuensi ?></td>
                <td class="right"><?= currency($value->harga_item) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Fisioterapi -->

          <!-- Hemodialisa -->
          <?php if (count((array)$lay->hemodialisa) > 0) : ?>
            <tr>
              <td colspan="6"><b style="font-size:14px;font-weight:bold;">Hemodialisa</b></td>
            </tr>
            <?php $subtotal = 0; ?>
            <?php foreach ($lay->hemodialisa as $key => $value) : $subtotal += $value->total ?>
              <tr>
                <td style="padding-left:15px;"><?= $value->item ?></td>
                <td class="center"></td>
                <td><?= $value->operator ?></td>
                <td class="center"><?= $value->frekuensi ?></td>
                <td class="right"><?= currency($value->harga_item) ?></td>
                <td class="right"><?= currency($value->total) ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td class="right" colspan="5" style="font-weight:bold;"></td>
              <td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
            </tr>
          <?php $SUBTOTAL += $subtotal;
          endif; ?>
          <!-- End Hemodialisa -->
        </tbody>
      </table>
      <br>
    <?php $ADM_RANAP_TEMP = null;
      $ADM_ICARE_TEMP = null;
      $TOTAL += $SUBTOTAL;
      $SUBTOTAL = 0;
    endforeach; ?>
    <table width="100%" class="tabel-laporan">
      <tr>
        <td class="right" colspan="5"><b style="font-weight:bold;font-size:15px;">TOTAL</b></td>
        <td class="right" width="13.5%"><b style="font-weight:bold;font-size:15px;"><?= currency($TOTAL) ?></b></td>
      </tr>
    </table>
    <br><br>
    <table width="100%">
      <tr>
        <td width="40%" class="left">( <?= $data_billing['pasien']->nama ?> )</td>
        <?php if ($_SESSION['account_group'] != "Kasir") : ?>
          <td width="40%" class="right">( Petugas : Kasir RSUD KOTA TANGERANG )</td>
        <?php endif; ?>
        <?php if ($_SESSION['account_group'] == "Kasir") : ?>
          <td width="40%" class="right">( Petugas : <?= $petugas ?> )</td>
        <?php endif; ?>
      </tr>
      <tr>
        <td width="40%" class="left"><?= $data_billing['waktu'] ?></td>
        <td width="40%" class="right"><?= $data_billing['waktu'] ?></td>
      </tr>

    </table>
  </div>
</body>