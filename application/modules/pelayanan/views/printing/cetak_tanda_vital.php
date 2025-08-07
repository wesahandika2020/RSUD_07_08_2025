<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Tanda Vital</title>

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

  .info-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    font-family: Arial, sans-serif;
  }

  .info-row {
      display: flex;
      align-items: center;
      padding: 1px 0;
      /* border-bottom: 1px solid #ddd; // Garis pemisah antar baris */
  }

  .info-label {
      width: 12%;
      /* font-weight: bold; */
  }

  .info-separator {
      width: 2%;
      text-align: center;
  }

  .info-value {
      width: 80%;
  }


</style>

<body onload="window.print()">
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
            <p class="identity">: <b><?= $pasien->kelamin == 'P'? 'Perempuan' : 'Laki-Laki' ?></b></p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--=============== MAIN ===============-->
  <main class="main">
    <div class="surat__pengkajian__pasien container">
      <h2 style="padding-top: 20px;" class="section__title">PEMERIKSAAN TANDA VITAL</h2>
      <div class="info-container">
        <div class="info-row">
            <div class="info-label">No Register</div>
            <div class="info-separator">:</div>
            <div class="info-value"><?= empty($tanda_vital[0]->no_register) ? "" : $tanda_vital[0]->no_register ?></div>
        </div>
        <div class="info-row">
            <div class="info-label">Tgl Masuk RS</div>
            <div class="info-separator">:</div>
            <div class="info-value"><?= empty($tanda_vital[0]->tanggal_daftar) ? "" : date("d/m/Y H:i", strtotime($tanda_vital[0]->tanggal_daftar)) ?></div>
        </div>
        <div class="info-row">
            <div class="info-label">Tgl Pulang RS</div>
            <div class="info-separator">:</div>
            <div class="info-value"><?= empty($tanda_vital[0]->tanggal_keluar) ? "" : date("d/m/Y H:i", strtotime($tanda_vital[0]->tanggal_keluar)) ?></div>
        </div>
        <div class="info-row">
            <div class="info-label">Tgl Layanan</div>
            <div class="info-separator">:</div>
            <div class="info-value">
				<?= empty($tanda_vital[0]->tanggal_layanan) ? "" : $tanda_vital[0]->tanggal_layanan ?>
              <?= empty($tanda_vital[0]->tindak_lanjut) ? "" : ' ('.$tanda_vital[0]->tindak_lanjut.')' ?>
			</div>
        </div>
        <div class="info-row">
            <div class="info-label">Ruang Rawat</div>
            <div class="info-separator">:</div>
            <div class="info-value"><?= empty($tanda_vital[0]->ruangan) ? "" : $tanda_vital[0]->ruangan ?></div>
        </div>
      </div><br>        
        <table class="small__font">
          <tbody class="border">
            <th width="5%"  class="txt-center">No.</th>
            <th width="20%" class="txt-center">Waktu</th>
            <th width="20%" class="txt-center">Tensi</th>
            <th width="11%" class="txt-center">Nadi</th>
            <th width="11%" class="txt-center">Suhu</th>
            <th width="11%" class="txt-center">Nafas</th>
            <th width="11%" class="txt-center">Repirasi</th>
            <th width="11%" class="txt-center">Urine</th>

            <?php $no = 1;
            foreach ($tanda_vital as $val) : ?>
              <tr>
                <td class="txt-center"><?= $no++; ?></td>
                <td class="txt-center"><?= date("d/m/Y H:i", strtotime($val->waktu)) ?></td>
                <td class="txt-center"><?= $val->tensi_sistolik !== null ? htmlspecialchars($val->tensi_sistolik) .'/'. htmlspecialchars($val->tensi_diastolik) . ' /mmHg' : "-" ?></td>
                <td class="txt-center"><?= $val->nadi !== null ? htmlspecialchars($val->nadi) . ' /Mnt' : "-" ?></td>
                <td class="txt-center"><?= $val->suhu !== null ? htmlspecialchars($val->suhu) . ' &#8451' : "-" ?></td>
                <td class="txt-center"><?= $val->nps !== null ? htmlspecialchars($val->nps) . ' /Mnt' : "-" ?></td>
                <td class="txt-center"><?= $val->rr !== null ? htmlspecialchars($val->rr) . ' /Mnt' : "-" ?></td>
                <td class="txt-center"><?= $val->urine !== null ? htmlspecialchars($val->urine) . ' cc' : "-" ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>
    </div>
  </main>
</body>
<?php die; ?>