<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<?php
function tanggal_indonesia($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<?= highlight_string("<?php\n " . var_export($data['anamnesa'], true) . "?>"); ?>

<title><?= datetimefmysql($data['pasien']->tanggal_daftar) . " " . $data['pasien']->no_rm . " - " . $data['pasien']->nama_pasien ?></title>

<body>
  <div class="page">
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
      <div class="header__container container grid">
        <div class="header__container-address grid">
          <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
          <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
            Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
        </div>
        <div class="secret__container section">
          <h1>RAHASIA</h1>
        </div>
      </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
      <section class="resume__medis">
        <br>
        <div class="resume__medis__container container">
          <table class="small__font">
            <thead>
              <tr>
                <td class="table__big-title" align="center" colspan="3">RESUME MEDIS</td>
                <td colspan="3">NRM : <b><?= $data['pasien']->no_rm; ?></b></td>
              </tr>
              <tr>
                <td colspan="2">Nama Pasien : <b><?= $data['pasien']->nama_pasien; ?></b></td>
                <td colspan="2">Tanggal Lahir : <b><?= datefmysql($data['pasien']->tanggal_lahir); ?></b></td>
                <td>Umur : <b><?= createUmur2($data['pasien']->tanggal_lahir) ?></b></td>
                <td>Jenis Kelamin : <b><?= $data['pasien']->kelamin; ?></b></td>
              </tr>
              <tr>
                <td colspan="2">Tanggal Masuk : <b><?= $data['pasien']->tanggal_daftar == NULL ? '' : datetimefmysql($data['pasien']->tanggal_daftar); ?></b></td>
                <td colspan="2">Tanggal Keluar / Meninggal : <b><?= $data['pasien']->tanggal_keluar == NULL ? '' : datetimefmysql($data['pasien']->tanggal_keluar); ?></b></td>
                <td colspan="2">Ruang Rawat Terakhir : <b><?= $data['pasien']->ruang_asal; ?><?= $data['intensive_care'] == NULL ? '' : $data['intensive_care']->nama_bangsal; ?><?= $data['pasien']->jenis_layanan == 'IGD' ? 'IGD' : ''; ?></b></td>
              </tr>
              <tr>
                <td colspan="6">Tanggung Jawab Pembayaran : <b><?= $data['pasien']->penjamin == NULL ? '' : $data['pasien']->penjamin; ?></b></td>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>1. Ringkasan Riwayat Penyakit</b></td>
                <td style="vertical-align: top;" class="no__border"><?= $data['pasien']->jenis_pendaftaran !== 'IGD' ? '' : ':'; ?></td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <?php if (!empty($data['anamnesa'])) : ?>
                    <b><?= implode('<br>', $data['anamnesa']['s_soap']); ?></b>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if ($data['anamnesa'] !== NULL) : ?>
                <?php if (!empty($data['anamnesa']['keluhan_utama'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Keluhan Utama</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['keluhan_utama']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['riwayat_penyakit_sekarang'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Sekarang</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['riwayat_penyakit_sekarang']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['riwayat_penyakit_dahulu'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Dahulu</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['riwayat_penyakit_dahulu']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['riwayat_penyakit_keluarga'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Riwayat Penyakit Keluarga</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['riwayat_penyakit_keluarga']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['anamnesa_sosial'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Anamnesa Sosial</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['anamnesa_sosial']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endif; ?>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>2. Pemeriksaan Fisik</b></td>
                <td style="vertical-align: top;" class="no__border"><?= $data['pasien']->jenis_pendaftaran !== 'IGD' ? '' : ':'; ?></td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <?php if (!empty($data['anamnesa'])) : ?>
                    <b><?= implode('<br>', $data['anamnesa']['o_soap']); ?></b>
                    <b><?= implode('<br>', $data['anamnesa']['a_soap']); ?></b>
                    <b><?= implode('<br>', $data['anamnesa']['p_soap']); ?></b>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if (!empty($data['anamnesa'])) : ?>
                <?php if (!empty($data['anamnesa']['keadaan_umum'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Keadaan Umum</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['keadaan_umum']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['kesadaran'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kesadaran</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= end($data['anamnesa']['kesadaran']) ; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['gcs'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;GCS</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['gcs']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['sistolik'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Sistolik</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['sistolik']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['diastolik'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tensi Diastolik</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['diastolik']) . ' mmHg'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['suhu'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Suhu</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['suhu']) . '℃'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['nadi'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Nadi</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['nadi']) . '/Mnt'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['rr'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Respirasi Rate</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['rr']) . '/Mnt'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['tinggi_badan'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tinggi Badan</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= end($data['anamnesa']['tinggi_badan']) . ' cm'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['berat_badan'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Berat Badan</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= end($data['anamnesa']['berat_badan']) . ' Kg'; ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['kepala'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kepala</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['kepala']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['leher'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Leher</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['leher']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['thorax'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Thorax</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['thorax']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['pulmo'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Pulmo</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['pulmo']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['cor'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;COR</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['cor']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['abdomen'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Abdomen</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['abdomen']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['genitalia'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Genitalia</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['genitalia']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['ekstrimitas'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Ekstrimitas</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['ekstrimitas']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['prognosis'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Prognosis</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['prognosis']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['status_mentalis'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Mentalis</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['status_mentalis']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['lingkar_kepala'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Lingkar Kepala</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['lingkar_kepala']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['status_gizi'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Status Gizi</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['status_gizi']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['telinga'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Telinga</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['telinga']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['hidung'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Hidung</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['hidung']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['mata'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Mata</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['mata']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['tenggorok'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Tenggorok</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['tenggorok']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
                <?php if (!empty($data['anamnesa']['kulit_kelamin'])) : ?>
                  <tr>
                    <td style="vertical-align: top;" class="no__border"> &ensp; &nbsp;Kulit Kelamin</td>
                    <td style="vertical-align: top;" class="no__border">:</td>
                    <td style="vertical-align: top;" colspan="4" class="no__border">
                      <b><?= implode('<br>', $data['anamnesa']['kulit_kelamin']); ?></b>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endif; ?>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>3. Pemeriksaan Penunjang</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['tindakan_lab'] == NULL ? '' : $data['tindakan_lab'] . '<br>'; ?></b>
                  <b><?= $data['tindakan_rad'] == NULL ? '' : $data['tindakan_rad'] . '<br>'; ?></b>
                  <b><?= empty($data['anamnesa']['pemeriksaan_penunjang']) ? '' : implode('<br>', $data['anamnesa']['pemeriksaan_penunjang']); ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>4. Tindakan / Prosedur</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['tindakan_ok'] == NULL ? '' : $data['tindakan_ok'] . '<br>'; ?></b>
                  <b><?= $data['tindakan'] == NULL ? '' : $data['tindakan']; ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>5. Diagnosis Utama</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['diagnosa_utama']; ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" width='30%' class="no__border"><b>6. Diagnosis Sekunder</b></td>
                <td style="vertical-align: top;" width='1%' class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['diagnosa_sekunder']; ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>7. Pengobatan</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['pengobatan']; ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>8. Anjuran/Usul Tindakan Lanjut (<em>Follow Up</em>)</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= empty($data['anamnesa']['usul_tindak_lanjut']) ? '-' : implode('<br>', $data['anamnesa']['usul_tindak_lanjut']); ?></b>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top;" class="no__border"><b>9. Kondisi Waktu Keluar</b></td>
                <td style="vertical-align: top;" class="no__border">:</td>
                <td style="vertical-align: top;" colspan="4" class="no__border">
                  <b><?= $data['pasien']->tindak_lanjut == NULL ? '-' : $data['pasien']->tindak_lanjut; ?></b>
                  <br>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr align="center">
                <td width="20%" class="no__border" colspan="4"></td>
                <td class="no__border" colspan="2">
                  <div style="display: flex; flex-direction: column;">
                    <div>
                      Tanggal: <b><?= $data['pasien']->tanggal_keluar == NULL ? '' : tanggal_indonesia(date('Y-m-d', strtotime($data['pasien']->tanggal_keluar))); ?></b>
                    </div>
                    <div>
                      Jam: <b><?= $data['pasien']->tanggal_keluar == NULL ? '' : date('H:i:s', strtotime($data['pasien']->tanggal_keluar)); ?></b>
                    </div>
                  </div>
                </td>
              </tr>
              <tr align="center">
                <td class="no__border" colspan="4"></td>
                <td class="no__border" colspan="2">Dokter Penanggung Jawab Pelayanan
                  <br><br><br><br><br><br><br><br>
                </td>
              </tr>
              <tr align="center">
                <td class="no__border" colspan="4"></td>
                <td class="no__border" colspan="2">(<b><?= $data['pasien']->dokter_dpjp ?> </b>)</td>
              </tr>
              <tr>
                <td colspan="6">
                  Resume Elektronik ini Sah Tanpa Tanda Tangan <br>
                  UU Praktek Kedokteran No. 29/2004 Penjelasan Pasal 46(3)

                </td>
              </tr>
              <!-- <tr align="center">
              <td width="50%" class="no__border" colspan="2"></td>
              <td class="no__border" colspan="4">Tanda Tangan & Nama Lengkap</td>
            </tr> -->
            </tfoot>
          </table>

        </div>
      </section>
    </main>
  </div>

</body>
<?php die; ?>