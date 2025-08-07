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
  "Laporan Rawat Inap (Pasien lebih dari satu kunjungan dalam satu bulan) - " . $periode
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

  td {
    vertical-align: top;
  }
</style>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN PASIEN RANAP LEBIH DARI SATU KALI KUNJUNGAN
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th width="2%" class="center">No.</th>
        <th width="7%" class="center">Tanggal Masuk</th>
        <th width="7%" class="center">Tanggal Keluar</th>
        <th width="6%" class="center">Nomor RM</th>
        <th width="13%" class="left">Nama Pasien</th>
        <th width="13%" class="left">Dokter DPJP</th>
        <th width="7%" class="center">Ruangan</th>
        <th width="7%" class="center">Jenis Layanan</th>
        <th width="16%" class="Left">Diagnosa</th>
        <th width="16%" class="Left">Tindakan Operasi</th>
        <th width="7%" class="right">Total Biling</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data as $v) :


        // Diagnosa
        $diagnosa_utama = !empty($v->nama_diagnosa) ? $v->nama_diagnosa . ' <b><i>(Utama);</i></b><br>' : '';
        $diagnosa_sekunder = implode(';<br>', array_column($v->diagnosa_sekunder, 'nama'));
        $diagnosa = $diagnosa_utama . $diagnosa_sekunder;


        // Tindakan Operasi
        $tindakan_ok = '';
        if (!empty($v->tindakan_ok)){
          $tindakan_ok = implode(';<br>', array_column($v->tindakan_ok, 'nama'));
        } else {
          $tindakan_ok = '-';
        }
      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="center"><?= $v->tanggal_daftar ?? '-' ?></td>
          <td class="center"><?= $v->tanggal_keluar ?? '-' ?></td>
          <td class="center">'<?= $v->no_rm ?></td>
          <td class="left"><?= $v->nama ?></td>
          <td class="left"><?= $v->dpjp ?? '-' ?></td>
          <td class="center"><?= $v->ruangan ?? '-' ?></td>
          <td class="center"><?= $v->jenis_layanan ?? '-' ?></td>
          <td class="Left"><?= $diagnosa ?? '-' ?></td>
          <td class="Left"><?= $tindakan_ok ?? '-' ?></td>
          <td class="right"><?= number_format($v->tagihan, 0, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>


<!-- +kolom keterangan dengan isi telah di layani / belum di layani, batal -->