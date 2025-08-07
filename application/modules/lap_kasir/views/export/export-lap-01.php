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
  "Kasir - " . $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN KASIR
      <br>Periode : <?= $periode ?>	  
      <?php if (!empty($shift_poli)): ?>
        <br>Shift Poli : <?= $shift_poli ?>
      <?php endif; ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Tanggal Masuk</th>
        <th class="center">Tanggal Keluar</th>
        <th class="center">Nomor RM</th>
        <th class="left">Nama Pasien</th>
        <th class="center">Layanan</th>
        <th class="center">Cara Bayar</th>
        <th class="left">Nama Dokter</th>
        <th class="center">Status Pembayaran</th>
        <th class="center">Status</th>
        <th class="center">Tagihan</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data as $v) :
        $keterangan = "";
        if (!empty($v->spesialist)) {
          $shift_poli = !empty($v->shift_poli) ? $v->shift_poli . ' - ' : '';
          $keterangan = "(" . $shift_poli . $v->spesialist . ")";
        }
        if (!empty($v->ruang_ranap)) {
          $keterangan = "(" . $v->ruang_ranap . ")";
        }
        if (!empty($v->ruang_icare)) {
          $keterangan = "(" . $v->ruang_icare . ")";
        }

        $caraBayar = $v->cara_bayar;
					if ($v->cara_bayar === 'Asuransi') {
						$caraBayar = $v->cara_bayar . ' ( ' . $v->penjamin . ' )';
					}
					if ($v->cara_bayar === 'Tunai') {
						$caraBayar = $v->cara_bayar . ( $v->jenis_tunai !== null ? ' ( ' . $v->jenis_tunai . ' )' : '');
					}
      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="center"><?= $v->tanggal_daftar ?></td>
          <td class="center"><?= $v->tanggal_keluar ?></td>
          <td class="center" style="mso-number-format:'@'"><?=  $v->id_pasien?></td>
          <td class="left"><?= $v->nama ?></td>
          <td class="left"><?= $v->jenis_layanan ?> <?= $keterangan ?></td>
          <td class="left"><?= $caraBayar ?></td>
          <td class="left"><?= $v->nama_dokter ?></td>
          <td class="left"><?= ($v->lunas !== 'Belum') ? "Lunas" : "Belum Lunas" ?></td>
          <td class="center"><?= $v->status_terlayani ?></td>
          <td class="right"><?= "Rp. " . number_format($v->total_billing, 0, ",", ".") ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="10" class="right"><b>Total</b></td>
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