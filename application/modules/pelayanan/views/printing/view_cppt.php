<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
  .txt-center {
    text-align: center;
  }

  .txt-left {
    text-align: left;
  }

  .txt-right {
    text-align: right;
  }
</style>

<body>
  <!--=============== HEADER ===============-->
  <header class="header" id="header">
    <div class="header__container2 container">
      <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
      <div>
        <!-- <h1 class="header__title">RSUD KOTA TANGERANG</h1> -->
        <p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
          Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
      </div>
      <div class="header__container-identity border section">
        <div class="identity__section grid">
          <div class="identity__section-title">
            <p class="identity">Nama Lengkap</p>
            <p class="identity">No. Rekam Medik</p>
            <p class="identity">Tanggal Lahir</p>
            <p class="identity">Jenis Kelamin</p>
          </div>
          <div class="identity__section-subtitle">
            <p class="identity">: <b><?= $pasien->nama; ?></b></p>
            <p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
            <p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
            <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--=============== MAIN ===============-->
  <main class="main">
    <div class="surat__pengkajian__pasien container">
      <h2 style="padding-top: 20px;" class="section__title">CATATAN PERKEMBANGAN PASIEN TERINTREGASI</h2>
      <?php foreach ($cppt as $key => $cp) : ?>
        <p style="padding-bottom: 10px; padding-top: 10px;" class="header__address2">
          Ruang Rawat/ Unit Kerja : <?= empty($cp[0]->ruang_rawat) ? "IGD" : $cp[0]->ruang_rawat ?>
        </p>
        <table class="small__font">
          <tbody class="border">
            <th width="3%">No.</th>
            <th width="8%">Tanggal Jam</th>
            <th width="18%">Profesional Pemberi Asuhan</th>
            <th width="30%">Hasil Assesmen Pasien Dan Pelayanan
              <span>
                <p>(<i>Tulis dengan format SOAP/ADEME, disertai sasaran, Tulis Nama, beri paraf pada akhir catatan</i>)</p>
              </span>
            </th>
            <th width="23%">Insthuksi PPA termasuk Pasca Bedah/Prosedur
              <span>
                <p>(<i>Insthuksi ditulis dengan Rinci dan jelas</i>)</p>
              </span>
            </th>
            <th width="18%">Review & Verifikasi DPJP
              <span>
                <p><i>(Stempel Nama, Paraf, Tanggal, Jam) (DPJP harus membaca seluruh rencana asuhan)</i></p>
              </span>
            </th>
            <?php $no = 1;
            foreach ($cp as $val) : ?>
              <tr>
                <td class="txt-center"><?= $no++; ?></td>
                <td class="txt-center"><?= date("d/m/Y H:i", strtotime($val->waktu)) ?></td>
                <td class="txt-center"><?= $val->nadis ?><br>(<?= $val->profesi ?>)</td>
                <td class="txt-left">
                  <?php if ($val->subject != NULL || $val->objective != NULL || $val->assessment != NULL || $val->plan != NULL) : ?>
                    <h3>SOAP</h3>
                    <?php if ($val->subject != NULL) : ?>
                      <br><b>Subjecttive :</b>
                      <br><?= $val->subject ?><br>
                    <?php endif; ?>
                    <?php if ($val->objective != NULL) : ?>
                      <br><b>Objective :</b>
                      <br><?= $val->objective ?><br>
                    <?php endif; ?>
                    <?php if ($val->assessment != NULL) : ?>
                      <br><b>Assessment :</b>
                      <br><?= $val->assessment ?><br>
                    <?php endif; ?>
                    <?php if ($val->plan != NULL) : ?>
                      <br><b>Plan :</b>
                      <br><?= $val->plan ?><br>
                    <?php endif; ?>
                    <br><br>
                  <?php endif; ?>

                  <?php if ($val->ademi_assesment != NULL || $val->ademi_diag != NULL || $val->ademi_interv != NULL || $val->ademi_monev != NULL) : ?>
                    <h3>ADIME</h3>
                    <?php if ($val->ademi_assesment != NULL) : ?>
                      <br><b>Assessment :</b>
                      <br><?= $val->ademi_assesment ?><br>
                    <?php endif; ?>
                    <?php if ($val->ademi_diag != NULL) : ?>
                      <br><b>Diagnosis :</b>
                      <br><?= $val->ademi_diag ?><br>
                    <?php endif; ?>
                    <?php if ($val->ademi_interv != NULL) : ?>
                      <br><b>Intervention :</b>
                      <br><?= $val->ademi_interv ?><br>
                    <?php endif; ?>
                    <?php if ($val->ademi_monev != NULL) : ?>
                      <br><b>Monitoring / Evaluation :</b>
                      <br><?= $val->ademi_monev ?><br>
                    <?php endif; ?>
                    <br><br>
                  <?php endif; ?>

                  <?php if ($val->sbar_situation != NULL || $val->sbar_background != NULL || $val->sbar_assesment != NULL || $val->sbar_recommend != NULL) : ?>
                    <h3>SBAR</h3>
                    <?php if ($val->sbar_situation != NULL) : ?>
                      <br><b>Situation :</b>
                      <br><?= $val->sbar_situation ?><br>
                    <?php endif; ?>
                    <?php if ($val->sbar_background != NULL) : ?>
                      <br><b>Background :</b>
                      <br><?= $val->sbar_background ?><br>
                    <?php endif; ?>
                    <?php if ($val->sbar_assesment != NULL) : ?>
                      <br><b>Assessment :</b>
                      <br><?= $val->sbar_assesment ?><br>
                    <?php endif; ?>
                    <?php if ($val->sbar_recommend != NULL) : ?>
                      <br><b>Recommendation :</b>
                      <br><?= $val->sbar_recommend ?><br>
                    <?php endif; ?>
                  <?php endif; ?>
                </td>
                <td class="txt-left"><?= $val->instruksi_ppa ?></td>
                <td class="txt-center">
                  <?= ($val->dokter_dpjp != null ? $val->dokter_dpjp . '<br>' : "") ?>
                  <?= ($val->waktu_verif_dpjp != null ? date("d/m/Y H:i", strtotime($val->waktu_verif_dpjp)) . '<br>' : '') ?>
                  <?= ($val->durasi_dpjp == 'lebih' ? '<b style="color:red">Verifikasi DPJP > 24 jam</b><br><br>' : '') ?>
                  <?= ($val->dokter_tbak != null && $val->konsul_via_telp === '1' ? $val->dokter_tbak . '<br>' : "") ?>
                  <?= ($val->waktu_pemberi_tbak != null && $val->konsul_via_telp === '1' ? date("d/m/Y H:i", strtotime($val->waktu_pemberi_tbak)) . '<br>' : '') ?>
                  <i><?= ($val->konsul_via_telp === '1' && $val->dokter_tbak != null? "(Konsul Via Telpon)" : "") ?></i>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>
      <?php endforeach; ?>
    </div>


  </main>

  <!--=============== FOOTER ===============-->
  <footer class="footer">
    <div class="footer__container container grid">
      <p class="page__number">FORM-KEP-07-02</p>
    </div>
  </footer>
</body>
<?php die; ?>