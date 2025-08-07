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
  "Laporan_IBS - " . $periode
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
  <!-- <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN MUTASI OBAT
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Golongan : <?= ($golongan == null ? ' Semua Golongan' : $golongan) ?>
      <br>Jenis : <?= ($parameter['jenis'] == '' ? ' Semua Jenis' : $parameter['jenis']) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Fornas : <?= ($parameter['fornas'] == '' ? ' Semua' : $fornas) ?>
      <br>Generik : <?= ($parameter['generik'] == '' ? ' Semua' : $generik) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div> -->

  <table width="100%" style="color:#000; border-bottom: 1px solid #000;">
    <tr>
      <td rowspan="2"></td>
      <!-- <td rowspan="2" style="width:80px"><img src="<?= resource_url() . 'images/logos/kota-tangerang-bg-white.jpg' ?>" width="80px"></td> -->
      <td colspan="25" align="center"><b style="font-weight:bold; font-size: 16pt;">PEMERINTAH KOTA TANGERANG<br>RUMAH SAKIT UMUM DAERAH<br>KOTA TANGERANG</br></td>
      <td rowspan="2"></td>
      <!-- <td rowspan="2" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="80px"></td>&nbsp;</td> -->
    </tr>
    <tr>
      <td colspan="25" align="center"><b style="font-weight:bold; font-size: 9pt;">Jl. Pulau Putri Raya Perumahan Modernland Kelurahan Kelapa <br>Indah Kecamatan Tangerang Telp.: 021 2972 0201, 021 2972 0202 </td>
    </tr>
    <tr>
      <td colspan="25" align="center"><b style="font-weight:bold; font-size: 9pt;">&nbsp;</td>
    </tr>
  </table>
  <table width="100%" style="color:#000;">
    <tr>
      <td colspan="27" align="center"><b style="font-size: 16pt;">LAPORAN BULANAN OPERASI INSTALASI BEDAH SENTRAL ( I B S )</b></td>
    </tr>
    <tr>
      <td colspan="27" align="center"><b style="font-size: 12pt;">BULAN <?= strtoupper($periode) ?></b></td>
    </tr>
  </table>

  <table width="100%" border="1">
    <thead>
      <tr style="top: 0;">
        <th rowspan="2" widht="5%" class="center">TOTAL PASEIN</th>
        <th colspan="2" class="center">TOTAL TINDAKAN</th>
        <th rowspan="2" class="center">TANGGAL</th>
        <th class="center">JAM</th>
        <th rowspan="2" class="center">TIME OUT</th>
        <th colspan="2" class="center">JAM OP</th>
        <th rowspan="2" class="center">SIGN OUT</th>
        <th rowspan="2" class="left">NAMA PASIEN</th>
        <th rowspan="2" class="center">UMUR</th>
        <th rowspan="2" class="center">JENIS KELAMIN</th>
        <th rowspan="2" class="center">NO. RM</th>
        <th rowspan="2" class="center">RUANG</th>
        <th rowspan="2" class="center">DIAGNOSA</th>
        <th rowspan="2" class="center">TINDAKAN</th>
        <th rowspan="2" class="center">KLASIFIKASI</th>
        <th rowspan="2" class="left">OPERATOR</th>
        <th colspan="3" class="center">ASSISTEN / INSTRUMEN</th>
        <th class="center">JENIS</th>
        <th rowspan="2" class="center">OK</th>
        <th rowspan="2" class="center">KATEGORI TINDAKAN</th>
        <th class="center">DOKTER</th>
        <th class="center">ASISTEN</th>
        <th class="center">JENIS OPERASI</th>
      </tr>
      <tr>
        <th class="center">/BLN</th>
        <th class="center">/HARI</th>
        <th class="center">RENCANA OP</th>
        <th class="center">MULAI</th>
        <th class="center">SELESAI</th>
        <th class="center">Asisten</th>
        <th class="center">Instrumen</th>
        <th class="center">Sirkuler</th>
        <th class="center">ANESTESI</th>
        <th class="center">ANESTHESI</th>
        <th class="center">ANESTHESI</th>
        <th class="center">CITO / ELEKTIF</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $i => $v) : ?>
        <tr>
          <td class="center"><?= $i+1 ?></td>
          <td class="center"><?= $v->tindakan[0]->tindakan_bulan ?? '-' ?></td>
          <td class="center"><?= $v->tindakan[0]->tindakan_hari ?? '-' ?></td>
          <td class="center"><?= date('d-M-Y', strtotime($v->tanggal)) ?></td>
          <td class="center"><?= $v->rencana_mulai ?? '-' ?></td>
          <td class="center"><?= $v->rencana_selesai ?? '-' ?></td>
          <td class="center"><?= $v->mulai ?? '-' ?></td>
          <td class="center"><?= $v->selesai ?? '-' ?></td>
          <td class="center"><?= $v->sign_out ?? '-' ?></td>
          <td class="left"><?= $v->nama_pasien ?? '-' ?></td>
          <td class="center"><?= $v->umur ?? '-' ?></td>
          <td class="center"><?= $v->kelamin ?? '-' ?></td>
          <td class="center" style="text-align: center" style="mso-number-format:'@'"><?= $v->no_rm ?? '-' ?></td>
          <td class="center"><?= $v->ruang ?? '-' ?></td>
          <td class="left"><?= $v->diagnosa ?? '-' ?></td>
          <td class="left"><?= $v->tindakan[0]->nama ?? '-' ?></td>
          <td class="center"><?= $v->klasifikasi ?? '-' ?></td>
          <td class="left"><?= $v->operator ?? '-' ?></td>
          <td class="left"><?= $v->asisten_operator ?? '-' ?></td>
          <td class="left"><?= $v->instrumen ?? '-' ?></td>
          <td class="left"><?= $v->sirkuler ?? '-' ?></td>
          <td class="center"><?= $v->anestesi ?? '-' ?></td>
          <td class="center"><?= $v->ok ?? '-' ?></td>
          <td class="center"><?= $v->kategori_tindakan ?? '-' ?></td>
          <td class="left"><?= $v->dokter_anesthesi ?? '-' ?></td>
          <td class="left"><?= $v->asisten_anesthesi ?? '-' ?></td>
          <td class="center"><?= $v->jenis_operasi ?? '-' ?></td>
        </tr>

        <?php if (!empty($v->tindakan)) : ?>
          <?php foreach ($v->tindakan as $ind => $val) : ?>
            <?php if ($ind === 0) continue; ?>
            <?php if ($val->tindakan_bulan === null && $val->tindakan_hari === null) continue; ?>

            <tr>
              <td class="center"></td>
              <td class="center"><?= $val->tindakan_bulan ?? '-' ?></td>
              <td class="center"><?= $val->tindakan_hari ?? '-' ?></td>
              <td class="center"><?= date('d-M-Y', strtotime($v->tanggal)) ?></td>
              <td class="center"><?= $v->rencana_mulai ?? '-' ?></td>
              <td class="center"><?= $v->rencana_selesai ?? '-' ?></td>
              <td class="center"><?= $v->mulai ?? '-' ?></td>
              <td class="center"><?= $v->selesai ?? '-' ?></td>
              <td class="center"><?= $v->sign_out ?? '-' ?></td>
              <td class="left"><?= $v->nama_pasien ?? '-' ?></td>
              <td class="center"><?= $v->umur ?? '-' ?></td>
              <td class="center"><?= $v->kelamin ?? '-' ?></td>
              <td class="center" style="text-align: center" style="mso-number-format:'@'"><?= $v->no_rm ?? '-' ?></td>
              <td class="center"><?= $v->ruang ?? '-' ?></td>
              <td class="left"><?= $v->diagnosa ?? '-' ?></td>
              <td class="left"><?= $val->nama ?? '-' ?></td>
              <td class="center"><?= $v->klasifikasi ?? '-' ?></td>
              <td class="left"><?= $v->operator ?? '-' ?></td>
              <td class="left"><?= $v->asisten_operator ?? '-' ?></td>
              <td class="left"><?= $v->instrumen ?? '-' ?></td>
              <td class="left"><?= $v->sirkuler ?? '-' ?></td>
              <td class="center"><?= $v->anestesi ?? '-' ?></td>
              <td class="center"><?= $v->ok ?? '-' ?></td>
              <td class="center"><?= $v->kategori_tindakan ?? '-' ?></td>
              <td class="left"><?= $v->dokter_anesthesi ?? '-' ?></td>
              <td class="left"><?= $v->asisten_anesthesi ?? '-' ?></td>
              <td class="center"><?= $v->jenis_operasi ?? '-' ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endforeach; ?>

    </tbody>

  </table>
</body>