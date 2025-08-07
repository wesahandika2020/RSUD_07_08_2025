<?php

date_default_timezone_set('Asia/Jakarta');
$param_title = date('d/m/Y');
if ($parameter['periode_laporan'] === 'Harian') {
  $param_title = "Periode Harian (" . $parameter['tanggal_harian'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Bulanan') {
  $param_title = "Periode Bulanan (" . $parameter['bulan'] . " " . $parameter['tahun'] . ") ";
} elseif ($parameter['periode_laporan'] === 'Rentang Waktu') {
  $param_title = "Periode Harian (" . $parameter['tanggal_awal'] . " s.d " . $parameter['tanggal_akhir'] . ") ";
}

header_excel(
  "Diagnosa_". $periode
);
?>
<style>
  .center {
    text-align: center;
    vertical-align: top;
  }
  .left {
    text-align: left;
    vertical-align: top;
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
  <table  style="border-collapse: collapse;" width="100%">
    <thead>
    </thead>
    <tbody>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="4" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">RSUD KOTA TANGERANG</td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="4" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Jl. Pulau Putri Raya, Perumahan Modernland, Kota Tangerang</td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="4" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Telepon (021) 29720200 - 29720202</td>
      </tr>
      
      <tr style="padding: 0;margin: 0;">  
        <td colspan="4" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">LAPORAN DIAGNOSIS PASIEN <?= $tempat_dilayani ?></td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="4" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Periode : <?= $periode ?></td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="2"><b>Tempat Layanan : <?= $tempat_dilayani ?></b></td>
        <td colspan="2">Yang Mencetak : <b><?= $this->session->userdata('account_group') ?></b></td>
        <td width="20%"></td>
      </tr>
  </tbody>
  </table>
  <table class="align-top" width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">ICDX</th>
        <th class="left">Diagnosis</th>
        <th class="center">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $g => $h){ $g = (int)$g+1; ?>
        
          <tr>
          <td align="center" class="center"><?= (int)$g ?></td>
          <td align="center" class="center"><?= $h['icdx'] ?></td>
          <td align="center" class="left"><?= $h['diagnosa'] ?></td>
          <td align="center" class="center"><?= $h['count'] ?></td>
        </tr>

      <?php } ?>
      
    </tbody>
  <tfoot>
      <tr>
        <td colspan="4" class="right no__border">
          <?php date_default_timezone_set('Asia/Jakarta'); ?>
          <p>Tgl Cetak : <?= date('d/m/Y'); ?> Jam <?= date('H:i'); ?>
            <br>
            Yang Mencetak,
          </p>
          <br>
          <p><b><?= $this->session->userdata('account_group') ?></b></p>
        </td>
      </tr>
  </tfoot> 
  </table>
</body>