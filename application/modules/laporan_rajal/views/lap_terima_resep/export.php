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
  "Laporan Pasien Terima Resep ". $periode
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
        <td colspan="4" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">LAPORAN PASIEN MENERIMA RESEP <?= $tempat_dilayani ?></td>
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
        <th class="center">Tanggal Daftar</th>
        <th class="center">Tanggal Keluar</th>
        <th class="center">No RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">Kelamin</th>
        <th class="center">Umur</th>
        <th class="center">Penjamin</th>
        <th class="center">Diagnosa Utama</th>
        <th class="center">DPJP</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $i => $value) { ?>
        <tr>
          <td align="center" class="center" rowspan="2"><?= ++$i ?></td>
          <td align="center" class="center"><?= DateTime::createFromFormat('Y-m-d H:i:s', $value->tanggal_daftar)->format('d/m/Y H:i') ?></td>
          <td align="center" class="center"><?= !empty($value->tanggal_keluar) ? DateTime::createFromFormat('Y-m-d H:i:s', $value->tanggal_keluar)->format('d/m/Y H:i') : '-' ?></td>
          <td align="center" class="center"><?= ($value->no_rm) ?></td>
          <td align="center" class="center"><?= ($value->nama_pasien) ?></td>
          <td align="center" class="center"><?= ($value->kelamin) ?></td>
          <td align="center" class="center">
            <?php
              $tanggal_lahir = new DateTime($value->tanggal_lahir);
              $tanggal_sekarang = new DateTime();
              $umur = $tanggal_lahir->diff($tanggal_sekarang);
              echo $umur->y . ' tahun ' . $umur->m . ' bulan ' . $umur->d . ' hari';
            ?>
          </td>
          <td align="center" class="center"><?= ($value->penjamin) ?></td>
          <td align="center" class="center">
            <?= 
              isset($value->diagnosa_data[0]->icdx_diagnosa) ? ($value->diagnosa_data[0]->icdx_diagnosa) : 'N/A' 
            ?> 
            <?= 
              isset($value->diagnosa_data[0]->nama_diagnosa) ? ($value->diagnosa_data[0]->nama_diagnosa) : 'N/A' 
            ?>
          </td>
          <td align="center" class="center"><?= ($value->dokter_dpjp) ?></td>
        </tr>
        <tr>
          <td colspan="9">
            <table>
              <tr>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">No</td>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">Waktu Penjualan</td>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">No Resep</td>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">Nama Obat</td>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">Dosis</td>
                <td style="background-color: #f9e897; font-weight: bold;" class="center">Jumlah pakai</td>
              </tr>
              <?php
                if (!empty($value->resep_data)) {
                  foreach ($value->resep_data as $index => $resep) { ?>
                    <tr>
                      <td class="center"><?= $index + 1 ?></td>
                      <td class="center"><?= DateTime::createFromFormat('Y-m-d H:i:s', $resep->waktu_penjualan)->format('d/m/Y H:i') ?></td>
                      <td class="center"><?= ($resep->no_resep ?? '') ?></td>
                      <td class="left"><?= ($resep->nama_obat ?? '') ?></td>
                      <td class="right"><?= ($resep->dosis ?? '') ?> <?= ($resep->nama_satuan ?? '') ?></td>
                      <td class="right"><?= ($resep->jumlah_pakai ?? '') ?></td>
                    </tr>
                <?php } } else { ?>
                  <tr><td colspan="6" class="center"></td></tr>
                <?php } ?>
            </table>
          </td>
        </tr>
      <?php } ?>
    </tbody>

    <tfoot>
      <tr>
        <td colspan="10" class="right no__border">
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