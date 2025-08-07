<?php

header_excel(
  "PPI " . $periode . " " . $unit
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
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">LAPORAN BULANAN
      <br>DATA PEMAKAIAN ALAT DAN INFEKSI
    </h4>
  </div>
  <div class="left">
    <p>
      <b>Unit &emsp;&emsp; : </b><?= $unit ?>
      <br><b>Periode &emsp;: </b><?= $periode ?>
    </p>
  </div>

  <!-- <?= var_dump($data) ?> -->

  <table width="100%" border="1">
    <thead>
      <tr style="top: 0;">
        <th rowspan="2" class="center">No.</th>
        <th rowspan="2" class="center">Tanggal</th>
        <th rowspan="2" class="center">Jumlah <br>Pasien</th>
        <th colspan="6" class="center">Pemakaian Alat</th>
        <th rowspan="2" class="center">VAP</th>
        <th rowspan="2" class="center">IADP</th>
        <th rowspan="2" class="center">Plebitis</th>
        <th rowspan="2" class="center">ISK</th>
        <th rowspan="2" class="center">Dekubitus</th>
        <th rowspan="2" class="center">IDO</th>
        <th rowspan="2" class="center">Kultur</th>
        <th rowspan="2" class="center">Antiobika</th>
      </tr>
      <tr>
        <th class="center">ETT</th>
        <th class="center">CVL</th>
        <th class="center">IVL</th>
        <th class="center">UC</th>
        <th class="center">Tirah <br>Baring</th>
        <th class="center">Operasi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      $jumlah_pasien = 0;
      $sum_ett = 0;
      $sum_cvl = 0;
      $sum_ivl = 0;
      $sum_uc = 0;
      $sum_tirah_baring = 0;
      $sum_vap = 0;
      $sum_iadp = 0;
      $sum_isk = 0;
      $sum_dekubitus = 0;
      $sum_plebitis = 0;
      $sum_operasi = 0;
      $sum_ido = 0;
      $count_kultur = 0;
      $count_antiobika = 0;

      foreach ($data as $value) :
        $jumlah_pasien += intval($value->jumlah_pasien);
        $sum_ett += intval($value->sum_ett);
        $sum_cvl += intval($value->sum_cvl);
        $sum_ivl += intval($value->sum_ivl);
        $sum_uc += intval($value->sum_uc);
        $sum_tirah_baring += intval($value->sum_tirah_baring);
        $sum_vap += intval($value->sum_vap);
        $sum_iadp += intval($value->sum_iadp);
        $sum_isk += intval($value->sum_isk);
        $sum_dekubitus += intval($value->sum_dekubitus);
        $sum_plebitis += intval($value->sum_plebitis);
        $sum_operasi += intval($value->sum_operasi);
        $sum_ido += intval($value->sum_ido);
        $count_kultur += intval($value->count_kultur);
        $count_antiobika += intval($value->count_antiobika);
      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="center"><?= $value->tanggal ?></td>
          <td class="center"><?= $value->jumlah_pasien ?></td>
          <td class="center"><?= $value->sum_ett ?></td>
          <td class="center"><?= $value->sum_cvl ?></td>
          <td class="center"><?= $value->sum_ivl ?></td>
          <td class="center"><?= $value->sum_uc ?></td>
          <td class="center"><?= $value->sum_tirah_baring ?></td>
          <td class="center"><?= $value->sum_operasi ?></td>

          <td class="center"><?= $value->sum_vap ?></td>
          <td class="center"><?= $value->sum_iadp ?></td>
          <td class="center"><?= $value->sum_plebitis ?></td>
          <td class="center"><?= $value->sum_isk ?></td>
          <td class="center"><?= $value->sum_dekubitus ?></td>
          <td class="center"><?= $value->sum_ido ?></td>
          <td class="center"><?= $value->count_kultur ?></td>
          <td class="center"><?= $value->count_antiobika ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2" class="center"><b></b></td>
        <td class="center"><b><?= $jumlah_pasien ?></b></td>

        <td class="center"><b><?= $sum_ett ?></b></td>
        <td class="center"><b><?= $sum_cvl ?></b></td>
        <td class="center"><b><?= $sum_ivl ?></b></td>
        <td class="center"><b><?= $sum_uc ?></b></td>
        <td class="center"><b><?= $sum_tirah_baring ?></b></td>
        <td class="center"><b><?= $sum_operasi ?></b></td>

        <td class="center"><b><?= $sum_vap ?></b></td>
        <td class="center"><b><?= $sum_iadp ?></b></td>
        <td class="center"><b><?= $sum_plebitis ?></b></td>
        <td class="center"><b><?= $sum_isk ?></b></td>
        <td class="center"><b><?= $sum_dekubitus ?></b></td>
        <td class="center"><b><?= $sum_ido ?></b></td>

        <td class="center"><b><?= $count_kultur ?></b></td>
        <td class="center"><b><?= $count_antiobika ?></b></td>
      </tr>
    </tfoot>
  </table>

  <br><br>
  <!-- <div class="left">
  </div> -->
  <table width="40%">
    <tr>
      <th  colspan="8" class="center font-large"><b>DATA ANGKA INFEKSI HS</b></th>
    </tr>
    <tr>
      <th class="center font-large"><b></b></th>
    </tr>
  </table>
  <table width="40%" border="1">
    <thead>
      <tr style="top: 0;">
        <th colspan="3" width="50%" class="center font-large">ANGKA INFEKSI HS</th>
        <th colspan="5" width="50%" class="center font-large">PER MIL</th>
      </tr>
    </thead>
    <tbody>
      <?php $vap_mil = 0;
      $iadp_mil = 0;
      $plebitis_mil = 0;
      $isk_mil = 0;
      $dekubitus_mil = 0;
      $ido_mil = 0;
      
      ($sum_ett != 0 ? $vap_mil = round((($sum_vap / $sum_ett) * 1000)) : $vap_mil = "0") ;
      ($sum_cvl != 0 ? $iadp_mil = round((($sum_iadp / $sum_cvl) * 1000)) : $iadp_mil = "0");
      ($sum_ivl != 0 ? $plebitis_mil = round((($sum_plebitis / $sum_ivl) * 1000)) : $plebitis_mil = "0");
      ($sum_uc != 0 ? $isk_mil = round((($sum_isk / $sum_uc) * 1000)) : $isk_mil = "0");
      ($sum_tirah_baring != 0 ? $dekubitus_mil = round((($sum_dekubitus / $sum_tirah_baring) * 1000)) : $dekubitus_mil = "0");
      ($sum_operasi !=0 ? $ido_mil = round((($sum_ido / $sum_operasi) * 1000)) : $ido_mil = "0");

      // if (is_nan($vap_mil)) {
      //   $vap_mil = 0;
      // }
      // if (is_nan($iadp_mil)) {
      //   $iadp_mil = 0;
      // }
      // if (is_nan($plebitis_mil)) {
      //   $plebitis_mil = 0;
      // }
      // if (is_nan($isk_mil)) {
      //   $isk_mil = 0;
      // }
      // if (is_nan($dekubitus_mil)) {
      //   $dekubitus_mil = 0;
      // }
      // if (is_nan($ido_mil)) {
      //   $ido_mil = 0;
      // }
      ?>
      <tr>
        <td colspan="3" class="left">VAP</td>
        <td colspan="5" class="center"><?= $vap_mil ?></td>
      </tr>
      <tr>
        <td colspan="3" class="left">IADP</td>
        <td colspan="5" class="center"><?= $iadp_mil ?></td>
      </tr>
      <tr>
        <td colspan="3" class="left">PLEBITIS</td>
        <td colspan="5" class="center"><?= $plebitis_mil ?></td>
      </tr>
      <tr>
        <td colspan="3" class="left">ISK</td>
        <td colspan="5" class="center"><?= $isk_mil ?></td>
      </tr>
      <tr>
        <td colspan="3" class="left">DEKUBITUS</td>
        <td colspan="5" class="center"><?= $dekubitus_mil ?></td>
      </tr>
      <tr>
        <td colspan="3" class="left">IDO</td>
        <td colspan="5" class="center"><?= $ido_mil ?></td>
      </tr>
    </tbody>
  </table>
</body>