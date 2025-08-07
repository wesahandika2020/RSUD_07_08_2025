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
  "Laporan Tarif Berdasarkan Diagnosa - " . $periode
);

function parsePostgresArray($str) {
  if (!$str) return '';

  // Remove outer curly braces
  $trimmed = substr($str, 1, -1);

  // Match quoted and unquoted elements
  preg_match_all('/"([^"]+)"|[^,]+/', $trimmed, $matches);

  $items = array_map(function($s) {
      // Remove surrounding quotes if present
      return '<b>' . preg_replace('/^"(.*)"$/', '$1', $s) . '</b>';
  }, $matches[0]);

  return implode(' | ', $items);
}

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
    <h4 style="text-transform: uppercase;">Laporan Tarif Berdasarkan Diagnosa
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">No. RM</th>
        <th class="left">Nama Pasien</th>
        <th class="left">Diagnosa Awal Masuk</th>
        <th class="left">Diagnosa Akhir</th>
        <th class="center">Lama Rawat</th>
        <th class="center">Ruang Rawat</th>
        <th class="center">Tindakan Operasi</th>
        <th class="center">Kelas</th>
        <th class="center">Total Biling</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data as $v) :
      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="center"><?= $v->no_rm ?></td>
          <td class="left"><?= $v->nama ?></td>
          <td class="left"><?= $v->icdx_diagnosa_awal ?? '-'?></td>
          <td class="left"><?= $v->icdx_diagnosa_akhir ?? '-'?></td>
          <td class="center"><?= $v->lama_rawat ?></td>
          <td class="center"><?= $v->bangsal ?></td>
          <td class="left"><?= parsePostgresArray($v->tindakan_operasi) ?></td>
          <td class="center"><?= $v->kelas ?></td>
          <td class="left"><?= "Rp. " . number_format($v->total_billing, 0, ",", ".") ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="9" class="right"><b>Total</b></td>
        <?php $total_tagihan = 0; ?>
        <?php foreach ($data as $v) : ?>
          <?php $total_tagihan += $v->total_billing; ?>
        <?php endforeach ?>
        <td class="left"><?= "Rp. " . number_format($total_tagihan, 0, ",", ".") ?></td>
      </tr>
    </tfoot>
  </table>
</body>


<!-- +kolom keterangan dengan isi telah di layani / belum di layani, batal -->