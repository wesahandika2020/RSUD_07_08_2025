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
  "Laporan Kunjungan - ". $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN KUNJUNGAN TEMPAT LAYANAN <?= ($tempat_dilayani !== null) ?  $tempat_dilayani : '' ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%">
    <tr>
      <td colspan="6">Yang Mencetak : <b><?= $this->session->userdata('account_group') ?></b></td>
    </tr>
  </table>
  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">No. RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">Tanggal Kunjungan</th>
        <th class="center">Jaminan</th>
        <th class="center">Status Kunjungan</th>
        <th class="center">Status Terlayani</th>
        <th class="center">Tindak Lanjut</th>
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
        <td class="left"><?= $value->nama_pasien ?></td>
        <td class="center"><?=(($value->tanggal_kunjungan !== null) ? datetime($value->tanggal_kunjungan) : '')?></td>
        <td class="center"><?= $value->jaminan ?></td>
        <td class="center"><?=($value->status_kunjungan !== null ? $value->status_kunjungan : '')?></td>
        <td class="center"><?= $value->status_terlayani ?></td>
        <td class="center"><?=($value->tindak_lanjut !== null ? $value->tindak_lanjut : '')?></td>
        <td class="left"><?= $value->nama_dokter ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</body>