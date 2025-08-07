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
  "Rekap_Data_Harga_". $periode
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
        <td colspan="8" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">RSUD KOTA TANGERANG</td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="8" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Jl. Pulau Putri Raya, Perumahan Modernland, Kota Tangerang</td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="8" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Telepon (021) 29720200 - 29720202</td>
      </tr>
      
      <tr style="padding: 0;margin: 0;">  
        <td colspan="8" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">REKAPAN DATA DAN HARGA PEMERIKSAAN PASIEN</td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="8" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Asal Tempat Layanan <?= $tempat_dilayani ?></td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="8" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">Periode : <?= $periode ?></td>
      </tr>
      <tr style="padding: 0;margin: 0;">  
        <td colspan="6"><b>Tempat Layanan : <?= $tempat_dilayani ?></b></td>
        <td colspan="7">Yang Mencetak : <b><?= $this->session->userdata('account_group') ?></b></td>
        <td width="20%"></td>
      </tr>
  </tbody>
  </table>
  <table class="align-top" width="100%" border="1">
    <thead>
      <tr>
        <th class="center">No.</th>
        <th class="center">Tanggal</th>
        <th class="center">No. RM</th>
        <th class="left">Nama Pasien</th>
        <th class="left">Asal Ruangan</th>
        <th class="center">Jaminan</th>
        <th class="left">Dokter Pengirim</th>
        <th class="left">Item Pemeriksaan</th>
        <th class="right">Harga</th>
      </tr>
    </thead>
    <tbody>
      
      <?php foreach ($data as $g => $h){ $g = (int)$g+1;

            $layanan = $h['detail']->layanan_lab;

            if ($layanan === 'Poliklinik' || $layanan === 'IGD') {

              $bangsal = $h['detail']->layanan;

            } else if ($layanan === 'Rawat Inap') {

              $bangsal = $h['detail']->bangsal;

            } else if ($layanan === 'Intensive Care') {

              $bangsal = $h['detail']->bangsal_icare;

            } else {

              $bangsal = $h['detail']->layanan;

            }


        ?>
        <tr>
          <td align="center" class="center"><?= (int)$g ?></td>
          <td align="center" class="left"><?= datetimetomysql($h['detail']->waktu_order) ?></td>
          <td align="center" style="mso-number-format:\@;" class="center"><?= $h['detail']->no_rm !== null ? $h['detail']->no_rm : '' ?></td>
          <td align="center" class="left"><?= $h['detail']->pasien !== null ? $h['detail']->pasien : '' ?></td>
          <td align="center" class="center"><?= $bangsal !== null ? $bangsal : '' ?></td>
          <td align="center" class="center"><?= ($h['detail']->penjamin !== null && $h['detail']->penjamin !== '') ? $h['detail']->penjamin : $h['detail']->cara_bayar ?></td>
          <td align="center" class="left"><?= $h['detail']->dokter !== null ? $h['detail']->dokter : '' ?></td>
      <?php foreach ($h['datalaboratorium'] as $i => $j){ $hitungData = count($h['datalaboratorium']); 

              if($hitungData === 1){?>

                <td align="center" class="left"><?= $j->nama !== null ? $j->nama : '' ?></td><td align="center" class="right"><?= $j->total !== null ? $j->total : '' ?></td>
                <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center" class="left"><b>TOTAL HARGA</b></td><td align="center" class="right"><b><?= $h['total_harga'] !== null ? $h['total_harga'] : '' ?></b></td></tr>

        <?php } else { 

                if($i === 0){ ?>

                  <td align="center" class="left"><?= $h['datalaboratorium'][0]->nama !== null ? $h['datalaboratorium'][0]->nama : '' ?></td><td align="center" class="right"><?= $h['datalaboratorium'][0]->total !== null ? $h['datalaboratorium'][0]->total : '' ?></td></tr>

          <?php } else { $totalData = (int)$hitungData - 1;

                    if((int)$i === (int)$totalData){

            ?> 
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left"><?= $j->nama !== null ? $j->nama : '' ?></td><td align="center" class="right"><?= $j->total !== null ? $j->total : '' ?></td></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center" class="left"><b>TOTAL HARGA</b></td><td align="center" class="right"><b><?= $h['total_harga'] !== null ? $h['total_harga'] : '' ?></b></td></tr>

                    <?php } else { ?>

                      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="left"><?= $j->nama !== null ? $j->nama : '' ?></td><td align="center" class="right"><?= $j->total !== null ? $j->total : '' ?></td></tr>

          <?php   }

                }

              } ?> 
        </tr>

      <?php } ?>
    <?php } ?>
    </tbody>
  <tfoot>
      <tr>
        <td colspan="8" class="right no__border">
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