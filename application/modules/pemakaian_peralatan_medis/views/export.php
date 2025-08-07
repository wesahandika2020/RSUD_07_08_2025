<?php

header_excel(
  "PPI " . $parameter['tanggal_masuk'] . " " . $unit
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
  <!-- ?= $this->load->view('utilities/kopsurat_satu', $hospital) ? -->
  <div class="center">
    <h4 style="text-transform: uppercase;">FORMULIR HARIAN
      <br>DATA PEMAKAIAN PERALATAN MEDIS
    </h4>
  </div>
  <div class="left">
    <p>
      <b>Unit &emsp;&emsp; : </b><?= $unit ?>
      <br><b>Tanggal&emsp;: </b><?= $parameter['tanggal_masuk'] ?>
    </p>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr style="top: 0;">
        <th rowspan="2" class="center">No.</th>
        <th rowspan="2" class="center">Nomor RM</th>
        <th rowspan="2" class="left">Nama Pasien</th>
        <th rowspan="2" class="center">Jenis <br>Kelamin</th>
        <th rowspan="2" class="center">Umur</th>
        <th colspan="6" class="center">Pemakaian Alat</th>
        <th rowspan="2" class="center">VAP</th>
        <th rowspan="2" class="center">IADP</th>
        <th rowspan="2" class="center">Plebitis</th>
        <th rowspan="2" class="center">ISK</th>
        <th rowspan="2" class="center">Dekubitus</th>
        <th rowspan="2" class="center">IDO</th>
        <th rowspan="2" class="center">Kultur</th>
        <th rowspan="2" class="center">Antiobika</th>
        <th rowspan="2" class="left">Keterangan</th>
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

      foreach ($data as $val) :
        $sum_ett += intval($val->ett);
        $sum_cvl += intval($val->cvl);
        $sum_ivl += intval($val->ivl);
        $sum_uc += intval($val->uc);
        $sum_tirah_baring += intval($val->tirah_baring);
        $sum_vap += intval($val->vap);
        $sum_iadp += intval($val->iadp);
        $sum_isk += intval($val->isk);
        $sum_dekubitus += intval($val->dekubitus);
        $sum_plebitis += intval($val->plebitis);
        $sum_operasi += intval($val->operasi);
        $sum_ido += intval($val->ido);
        $count_kultur += count(array_map(function ($kul) { return $kul->nama; }, $val->kultur));
        $count_antiobika += count(array_map(function($ant) { return $ant->nama; }, $val->antiobika));
      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="center"><?= $val->id_pasien ?></td>
          <td class="left"><?= $val->nama ?></td>
          <td class="center"><?= $val->kelamin ?></td>
          <td class="center"><?= $val->umur ?></td>
          <td class="center"><?= $val->ett !== '0' ? $val->ett : "" ?></td>
          <td class="center"><?= $val->cvl !== '0' ? $val->cvl : "" ?></td>
          <td class="center"><?= $val->ivl !== '0' ? $val->ivl : "" ?></td>
          <td class="center"><?= $val->uc !== '0' ? $val->uc : "" ?></td>
          <td class="center"><?= $val->tirah_baring !== '0' ? $val->tirah_baring : "" ?></td>
          <td class="center"><?= $val->operasi !== '0' ? $val->operasi : "" ?></td>

          <td class="center"><?= $val->vap !== '0' ? $val->vap : "" ?></td>
          <td class="center"><?= $val->iadp !== '0' ? $val->iadp : "" ?></td>
          <td class="center"><?= $val->plebitis !== '0' ? $val->plebitis : "" ?></td>
          <td class="center"><?= $val->isk !== '0' ? $val->isk : "" ?></td>
          <td class="center"><?= $val->dekubitus !== '0' ? $val->dekubitus : "" ?></td>
          <td class="center"><?= $val->ido !== '0' ? $val->ido : "" ?></td>

          <td class="center"><?php echo implode('.<br>', array_map(function ($kul) {
                                return $kul->nama;
                              }, $val->kultur)); ?></td>
          <td class="center"><?php echo implode('.<br>', array_map(function ($ant) {
                                return $ant->nama;
                              }, $val->antiobika)); ?></td>
          <td class="center"><?= $val->keterangan ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5" class="center"><b><?= $jumlah ?></b></td>
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
        <td class="center"></td>
      </tr>
    </tfoot>
  </table>
</body>