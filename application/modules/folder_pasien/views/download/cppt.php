<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
  @font-face {
    font-family: "Verdana";
    font-style: normal;
    font-weight: normal;
    src: url("' . $fontPath . '") format("truetype");
  }

  body {
    margin: 1cm;
    padding: 0;
    font-family: "Verdana", sans-serif;
    font-size: 9pt;
    /* font: 9pt Verdana; */
    /* background-color: #FAFAFA; */
  }

  * {
    font-family: "Verdana", sans-serif;
    font-size: 9pt;
    /* font: 9pt Verdana; */
    /* box-sizing: border-box; */
    /* -moz-box-sizing: border-box; */
  }

  .page {
    /* width: 21cm; */
    /* min-height: 19.8cm; */
    /* padding-top: 0.5cm; */
    /* padding-left: 1cm; */
    /* padding-right: 10cm; */
    margin: 0cm auto;
    /* border: 1px #D3D3D3 solid; */
    /* border-radius: 5px; */
    /* background: white; */
    /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); */
  }

  .subpage {
    padding: 0;
    /* border: 5px red solid; */
    /* height: 237mm; */
    /* outline: 2cm #FFEAEA solid; */
  }

  @page {
    margin-top: 0;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
  }

  @page: first {
    margin-top: 0;
    margin-bottom: 0;
    margin-left: 0;
    margin-right: 0;
  }

  @media print {
    .page {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: always;
    }
  }

  h1 {
    font-size: 20px;
    margin-bottom: 0;
  }

  h2 {
    font-size: 18px;
    margin-bottom: 0;
  }

  h3 {
    font-size: 16px;
    margin-bottom: 0;
  }

  .txt-center {
    text-align: center;
  }

  .txt-left {
    text-align: left;
  }

  .txt-right {
    text-align: right;
  }

  .kop-data-pasien td {
    border: none;
    /* display: inline-block; */
    vertical-align: middle;
  }
</style>

<body>
  <!--=============== HEADER ===============-->
  <header class="header" id="header">
    <div class="header__container2 container kop-data-pasien">
      <table style="border: none; vertical-align: middle;">
        <tr>
          <td width="50%" style="border: none; vertical-align: middle;">
            <table style="border: none; vertical-align: middle;">
              <tr style="border: none; vertical-align: middle;">
                <td width="25%">
                  <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" width="50px" class="header__img">
                </td>
                <td width="75%">Jl. Pulau Putri Raya Perumahan Modernland
                  <br>Kelurahan Kelapa Indah Kecamatan Tangerang
                  <br>Telp : 021 2972 0201, 021 2972 0202
                </td>
              </tr>
            </table>
          </td>
          <td width="50%" style="border: none; vertical-align: middle;">
            <div class="header__container-identity border section kop-data-pasien" style="display: inline-block; ">
              <table style="border: none; vertical-align: middle;">
                <tr style="border: none; vertical-align: middle;">
                  <td>Nama Lengkap
                    <br>No. Rekam Medik
                    <br>Tanggal Lahir
                    <br>Jenis Kelamin
                  </td>
                  <td>: <b><?= $pasien->nama; ?></b>
                    <br>: <b><?= $pasien->no_rm; ?></b>
                    <br>: <b><?= datefmysql($pasien->tanggal_lahir); ?></b>
                    <br>: <b><?= $pasien->kelamin; ?></b>
                  </td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
      </table>
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
            <tr style="font-weight: bold; text-align: center">
              <td width="5%">No.</td>
              <td width="10%">Tanggal Jam</td>
              <td width="18%">Profesional Pemberi Asuhan</td>
              <td width="30%">Hasil Assesmen Pasien Dan Pelayanan
                <span>
                  <p>(<i>Tulis dengan format SOAP/ADEME, disertai sasaran, Tulis Nama, beri paraf pada akhir catatan</i>)</p>
                </span>
              </td>
              <td width="21%">Insthuksi PPA termasuk Pasca Bedah/Prosedur
                <span>
                  <p>(<i>Insthuksi ditulis dengan Rinci dan jelas</i>)</p>
                </span>
              </td>
              <td width="16%">Review & Verifikasi DPJP
                <span>
                  <p><i>(Stempel Nama, Paraf, Tanggal, Jam) (DPJP harus membaca seluruh rencana asuhan)</i></p>
                </span>
              </td>
            </tr>
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
                  <i><?= ($val->konsul_via_telp === '1' && $val->dokter_tbak != null ? "(Konsul Via Telpon)" : "") ?></i>
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
      <p style="padding-bottom: 5px; padding-right: 10px" class="page__number">FORM-KEP-07-02</p>
    </div>
  </footer>
</body>