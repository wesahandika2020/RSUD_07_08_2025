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
  "Laporan Code Blue - " . $periode
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
    <h4 style="text-transform: uppercase;">REKAP LAPORAN CODE BLUE
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th class="center" rowspan="2">No.</th>
        <th class="left" rowspan="2">Nama Pasien</th>
        <th class="center" rowspan="2">Nomor RM</th>
        <th class="center" rowspan="2">Umur</th>
        <th class="center" rowspan="2">Jenis Kelamin</th>
        <th class="center" rowspan="2">Respon Awal</th>
        <th class="center" colspan="2">Mulai Penanganan</th>
        <th class="center" rowspan="2">Area Kejadian</th>
        <th class="center" rowspan="2">Code Blue Zonasi</th>
        <th class="center" rowspan="2">Kriteria Aktivasi Code Blue</th>
        <th class="center" rowspan="2">Kriteria Kegawatan Medis</th>
        <th class="center" colspan="8">Primary Management : Assesment Awal dan Resusitasi</th>
        <th class="center" colspan="5">Tanda Vital</th>
        <th class="center" colspan="4">Secondary Management</th>
        <th class="center" colspan="3">Lembar Monitoring dan Terapi</th>
        <th class="center" rowspan="2">Keterangan</th>
        <th class="center" rowspan="2">Leader Tim Code Blue</th>
      </tr>
      <tr>
        <th class="center">Jam</th>
        <th class="center">Respon time Tim Code Blue</th>
        <th class="center">Respon Awal</th>
        <th class="center">Assesment Jalan Napas</th>
        <th class="center">Resusitasi</th>
        <th class="center">Assesment Pernapasan</th>
        <th class="center">Resusitasi</th>
        <th class="center">Assesment Sirkulasi</th>
        <th class="center">Resusitasi</th>
        <th class="center">Assesment Disabilitas</th>
        <th class="center">Tekanan Darah</th>
        <th class="center">Frekuensi Nadi</th>
        <th class="center">Frekuensi Napas</th>
        <th class="center">Suhu</th>
        <th class="center">SpO2</th>
        <th class="center">Anamnesa</th>
        <th class="center">Alergi</th>
        <th class="center">Pemeriksaan Penunjang</th>
        <th class="center">Diagnosis Kerja</th>
        <th class="center">Tanggal dan Jam</th>
        <th class="center">Terapi, Monitoring dan Evaluasi</th>
        <th class="center">Kriteria Pasca Resusitasi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;

      function hitungUmurNewPHP($tgl)
      {
        $tanggal = explode("-", $tgl);
        $tahun = $tanggal[0];
        $bulan = $tanggal[1];
        $hari = $tanggal[2];

        if ($tahun != '0000') {
          $day = date('d');
          $month = date('m');
          $year = date('Y');

          $tahun = $year - $tahun;
          $bulan = $month - $bulan;
          $hari = $day - $hari;

          $jumlahHari = 0;
          $bulanTemp = ($month == 1) ? 12 : $month - 1;
          if ($bulanTemp == 1 || $bulanTemp == 3 || $bulanTemp == 5 || $bulanTemp == 7 || $bulanTemp == 8 || $bulanTemp == 10 || $bulanTemp == 12) {
            $jumlahHari = 31;
          } elseif ($bulanTemp == 2) {
            $jumlahHari = ($tahun % 4 == 0) ? 29 : 28;
          } else {
            $jumlahHari = 30;
          }

          if ($hari <= 0) {
            $hari += $jumlahHari;
            $bulan--;
          }
          if ($bulan < 0 || ($bulan == 0 && $tahun != 0)) {
            $bulan += 12;
            $tahun--;
            if ($bulan >= 12) {
              $tahun++;
              $bulan = 0;
            }
          }

          $result = $tahun . " Tahun " . $bulan . " Bulan " . $hari . " Hari";
        } else {
          $result = "-";
        }

        return $result;
      }

      foreach ($data as $v) :
        $keterangan = "";

        // Respon Awal S1
        $responAwalObj1 = json_decode($v->respon_fcb, true);
        $responAwal1Val = [];

        foreach ($responAwalObj1 as $key => $value) {
          if ($value !== null && in_array($key, ['respon_fcb_1', 'respon_fcb_3'])) {
            switch ($key) {
              case 'respon_fcb_1':
                $kata = 'Petugas primer';
                break;
              case 'respon_fcb_3':
                $kata = 'Awam terlatih';
                break;
              default:
                $kata = '-';
            }
            $responAwal1Val[] = $kata;
          }
        }

        $responAwal1 = implode(', ', $responAwal1Val);

        // Respon time code blue
        $rttCBobj = json_decode($v->respon_fcb, true);
        $responRTTCBVal = [];

        foreach ($rttCBobj as $key => $value) {
          if ($value !== null && in_array($key, ['respon_fcb_4', 'respon_fcb_5', 'respon_fcb_6'])) {
            switch ($key) {
              case 'respon_fcb_4':
                $kata = '3 menit';
                break;
              case 'respon_fcb_5':
                $kata = '5 menit';
                break;
              case 'respon_fcb_6':
                $kata = '> 5 menit';
                break;
              default:
                $kata = '-';
            }
            $responRTTCBVal[] = $kata;
          }
        }

        $rttCB = implode(', ', $responRTTCBVal);

        // Code blue zonasi
        $zonasiObj = json_decode($v->respon_fcb, true);
        $zonasiVal = [];

        foreach ($zonasiObj as $key => $value) {
          if ($value !== null && in_array($key, ['respon_fcb_2', 'respon_fcb_7', 'respon_fcb_8'])) {
            switch ($key) {
              case 'respon_fcb_2':
                $kata = 'Zonasi 1';
                break;
              case 'respon_fcb_7':
                $kata = 'Zonasi 2';
                break;
              case 'respon_fcb_8':
                $kata = 'Zonasi 3';
                break;
              default:
                $kata = '-';
            }
            $zonasiVal[] = $kata;
          }
        }

        $zonasiCodeBlue = implode(', ', $zonasiVal);

        // Kriteria aktivasi code blue
        $kriteriaAktivitasObj = json_decode($v->kriteria_fcb, true);
        $kriteriaAktivitasVal = [];

        foreach ($kriteriaAktivitasObj as $key => $value) {
          if ($value !== null && in_array($key, ['kriteria_fcb_1', 'kriteria_fcb_2', 'kriteria_fcb_3'])) {
            switch ($key) {
              case 'kriteria_fcb_1':
                $kata = 'Henti jantung';
                break;
              case 'kriteria_fcb_2':
                $kata = 'Henti napas';
                break;
              case 'kriteria_fcb_3':
                $kata = 'Kegawatan medis';
                break;
              default:
                $kata = '-';
            }
            $kriteriaAktivitasVal[] = $kata;
          }
        }

        $kriteriaAktivitas = implode(', ', $kriteriaAktivitasVal);

        // Kriteria kegawatan medis
        $kriteriaMedisObj = json_decode($v->kriteria_fcb, true);
        $kriteriaMedisVal = [];

        foreach ($kriteriaMedisObj as $key => $value) {
          if ($value !== null && in_array($key, ['kriteria_fcb_4', 'kriteria_fcb_5', 'kriteria_fcb_6', 'kriteria_fcb_7', 'kriteria_fcb_8'])) {
            switch ($key) {
              case 'kriteria_fcb_4':
                $kata = 'Airway : obstruksi jalan nafas';
                break;
              case 'kriteria_fcb_5':
                $kata = 'Breathing : P>35x/mnt atau < 5x/mnt';
                break;
              case 'kriteria_fcb_6':
                $kata = 'Sirkulasi : hr>140x/mnt atau < 40x/mnt, td sistol>220mmhg atau < 70mmhg';
                break;
              case 'kriteria_fcb_7':
                $kata = 'Neurologis penurunan kesadaran / kejang';
                break;
              case 'kriteria_fcb_8':
                $kata = 'Skor EWS Merah';
                break;
              default:
                $kata = '-';
            }
            $kriteriaMedisVal[] = $kata;
          }
        }

        $kriteriaMedis = implode('.<br>', $kriteriaMedisVal);

        // Respon Awal
        $responAwalObj = json_decode($v->awal_fcb, true);
        $responAwalVal = [];

        foreach ($responAwalObj as $key => $value) {
          if ($value !== null) {
            switch ($key) {
              case 'awal_fcb_1':
                $kata = 'Sadar';
                break;
              case 'awal_fcb_2':
                $kata = 'Merespon suara';
                break;
              case 'awal_fcb_3':
                $kata = 'Merespon nyeri';
                break;
              default:
                $kata = 'Tidak ada respon';
            }
            $responAwalVal[] = $kata;
          }
        }

        $responAwal = implode(', ', $responAwalVal);

        // Assesmen jalan napas 1, 5, 9
        $jalanNapasObj = json_decode($v->jalan_fcb, true);
        $jalanNapasVal = [];

        foreach ($jalanNapasObj as $key => $value) {
          if ($value !== null && in_array($key, ['jalan_fcb_1', 'jalan_fcb_5', 'jalan_fcb_9'])) {
            switch ($key) {
              case 'jalan_fcb_1':
                $kata = 'Obstruksi total';
                break;
              case 'jalan_fcb_5':
                $kata = 'Obstruksi parsial';
                break;
              case 'jalan_fcb_9':
                $kata = 'Normal';
                break;
              default:
                $kata = '-';
            }
            $jalanNapasVal[] = $kata;
          }
        }

        $jalanNapas = implode('.<br>', $jalanNapasVal);

        // Assesmen Resusitasi jalan napas 2, 6, 10, 13, 14
        $resusitasi1Obj = json_decode($v->jalan_fcb, true);
        $resusitasi1Val = [];

        foreach ($resusitasi1Obj as $key => $value) {
          if ($value !== null && in_array($key, ['jalan_fcb_2', 'jalan_fcb_6', 'jalan_fcb_10', 'jalan_fcb_13', 'jalan_fcb_14'])) {
            switch ($key) {
              case 'jalan_fcb_2':
                $kata = 'Orofaringeal tube';
                break;
              case 'jalan_fcb_6':
                $kata = 'Intubasi endotrakheal';
                break;
              case 'jalan_fcb_10':
                $kata = 'Laryngeal mask airway';
                break;
              case 'jalan_fcb_13':
                $kata = $resusitasi1Obj['jalan_fcb_14'];
                break;
              default:
                $kata = '-';
            }
            $resusitasi1Val[] = $kata;
          }
        }

        $resusitasi1 = implode('.<br>', $resusitasi1Val);

        // Assesment pernapasan 3, 7, 11, 15, 18
        $pernapasanObj = json_decode($v->jalan_fcb, true);
        $pernapasanVal = [];

        foreach ($pernapasanObj as $key => $value) {
          if ($value !== null && in_array($key, ['jalan_fcb_3', 'jalan_fcb_7', 'jalan_fcb_11', 'jalan_fcb_15', 'jalan_fcb_18'])) {
            switch ($key) {
              case 'jalan_fcb_3':
                $kata = 'Apneu/gasping';
                break;
              case 'jalan_fcb_7':
                $kata = 'Sesak napas';
                break;
              case 'jalan_fcb_11':
                $kata = 'Sianosis';
                break;
              case 'jalan_fcb_15':
                $kata = 'Retraksi otot bantu napas';
                break;
              case 'jalan_fcb_18':
                $kata = 'Normal';
                break;
              default:
                $kata = '-';
            }
            $pernapasanVal[] = $kata;
          }
        }

        $AssesmentPernapasan = implode('.<br>', $pernapasanVal);

        // Resusitasi Assesment pernapasan 4, 8, 12, 16, 17
        $resusitasi2Obj = json_decode($v->jalan_fcb, true);
        $resusitasi2Val = [];

        foreach ($resusitasi2Obj as $key => $value) {
          if ($value !== null && in_array($key, ['jalan_fcb_4', 'jalan_fcb_8', 'jalan_fcb_12', 'jalan_fcb_16', 'jalan_fcb_17'])) {
            switch ($key) {
              case 'jalan_fcb_4':
                $kata = '02 bag value mask';
                break;
              case 'jalan_fcb_8':
                $kata = '02 reabreathing mask';
                break;
              case 'jalan_fcb_12':
                $kata = '02 non reabreathing mask';
                break;
              case 'jalan_fcb_16':
                $kata = $resusitasi2Obj['jalan_fcb_17'];
                break;
              default:
                $kata = '-';
            }
            $resusitasi2Val[] = $kata;
          }
        }

        $resusitasi2 = implode('.<br>', $resusitasi2Val);

        // Assesmen sirkulasi 1, 3, 7, 11, 15, 16, 17
        $sirkulasiObj = json_decode($v->sirkulasi_fcb, true);
        $sirkulasiVal = [];

        foreach ($sirkulasiObj as $key => $value) {
          if ($value !== null && in_array($key, ['sirkulasi_fcb_1', 'sirkulasi_fcb_3', 'sirkulasi_fcb_7', 'sirkulasi_fcb_11', 'sirkulasi_fcb_15', 'sirkulasi_fcb_16', 'sirkulasi_fcb_17'])) {
            switch ($key) {
              case 'sirkulasi_fcb_1':
                $kata = 'Nadi karotis tidak teraba';
                break;
              case 'sirkulasi_fcb_3':
                $kata = 'Tachicardia';
                break;
              case 'sirkulasi_fcb_7':
                $kata = 'Bradicardia';
                break;
              case 'sirkulasi_fcb_11':
                $kata = 'Hipotensi';
                break;
              case 'sirkulasi_fcb_15':
                $kata = 'Hipertensi';
                break;
              case 'sirkulasi_fcb_16':
                $kata = 'Irama jantung ireguler';
                break;
              case 'sirkulasi_fcb_17':
                $kata = 'Normal';
                break;
              default:
                $kata = '-';
            }
            $sirkulasiVal[] = $kata;
          }
        }

        $sirkulasi = implode('.<br>', $sirkulasiVal);

        // Resusitasi Assesmen sirkulasi 2, 4, 8, 12, 13
        $resusitasi3Obj = json_decode($v->sirkulasi_fcb, true);
        $resusitasi3Val = [];

        foreach ($resusitasi3Obj as $key => $value) {
          if ($value !== null && in_array($key, ['sirkulasi_fcb_2', 'sirkulasi_fcb_4', 'sirkulasi_fcb_8', 'sirkulasi_fcb_12', 'sirkulasi_fcb_13'])) {
            switch ($key) {
              case 'sirkulasi_fcb_2':
                $kata = 'Resusitasi jantung paru';
                break;
              case 'sirkulasi_fcb_4':
                $kata = 'Defibrilasi kardioversi';
                break;
              case 'sirkulasi_fcb_8':
                $kata = 'Pasang iv line terapi cairan';
                break;
              case 'sirkulasi_fcb_12':
                $kata = $resusitasi3Obj['sirkulasi_fcb_13'] ?? '';
                break;
              default:
                $kata = '-';
            }
            $resusitasi3Val[] = $kata;
          }
        }

        $resusitasi3 = implode('.<br>', $resusitasi3Val);

        // Assesmen disabilitas 5, 6, 9, 10, 14
        $disabilitasObj = json_decode($v->sirkulasi_fcb, true);
        $hasilAssesmentObj = json_decode($v->gcs_fcb, true);
        $disabilitasVal = [];

        foreach ($disabilitasObj as $key => $value) {
          if ($value !== null && in_array($key, ['sirkulasi_fcb_5', 'sirkulasi_fcb_9', 'sirkulasi_fcb_14'])) {
            switch ($key) {
              case 'sirkulasi_fcb_5':
                $kata = 'Pupil (' . ($disabilitasObj['sirkulasi_fcb_6'] ?? '') . ')';
                break;
              case 'sirkulasi_fcb_9':
                $kata = 'Refleks cahaya : ' . ($disabilitasObj['sirkulasi_fcb_10'] ?? '');
                break;
              case 'sirkulasi_fcb_14':
                $kata = 'Plegi parese';
                break;
              default:
                $kata = '-';
            }
            $disabilitasVal[] = $kata;
          }
        }

        $disabilatasKey = implode('.<br>', $disabilitasVal);
        $hasilAssesment = 'GCS: e = ' . ($hasilAssesmentObj['gcs_fcb_1'] ?? 0) . ' &ensp; m = ' . ($hasilAssesmentObj['gcs_fcb_2'] ?? 0) . ' &ensp; v = ' . ($hasilAssesmentObj['gcs_fcb_3'] ?? 0) . ' &ensp; total = ' . ($hasilAssesmentObj['gcs_fcb_4'] ?? 0);
        $assesmentDisabilatas = $hasilAssesment . '<br>' . $disabilatasKey;

        // Tanda Vital 
        $tandaVitalObj = json_decode($v->tanda_vital_fcb, true);

        $tekananDarah = ($tandaVitalObj['tanda_vital_fcb_1'] ?? '-') . ' / ' . ($tandaVitalObj['tanda_vital_fcb_2'] ?? '-') . ' mmHg';
        $frekuensiNadi = ($tandaVitalObj['tanda_vital_fcb_3'] ?? '-') . ' x/mnt';
        $frekuensiNapas = ($tandaVitalObj['tanda_vital_fcb_4'] ?? '-') . ' x/mnt';
        $suhuCB = ($tandaVitalObj['tanda_vital_fcb_5'] ?? '-') . ' &deg;C';
        $spo2 = ($tandaVitalObj['tanda_vital_fcb_6'] ?? '-') . ' %';
        // $hasilAssesment = 'GCS: e = ' . ($hasilAssesmentObj['gcs_fcb_1'] ?? 0) . ' &ensp; m = ' . ($hasilAssesmentObj['gcs_fcb_2'] ?? 0) . ' &ensp; v = ' . ($hasilAssesmentObj['gcs_fcb_3'] ?? 0) . ' &ensp; total = ' . ($hasilAssesmentObj['gcs_fcb_4'] ?? 0);
        // $assesmentDisabilatas = $hasilAssesment . '<br><br>' . $disabilatasKey;

        // SECONDARY MANAGEMENT
        // Alergi
        $alergiObj = json_decode($v->alergi_fcb, true);
        $alergiVal = [];

        foreach ($alergiObj as $key => $value) {
          if ($value !== null && in_array($key, ['alergi_fcb_1', 'alergi_fcb_2', 'alergi_fcb_3', 'alergi_fcb_5'])) {
            switch ($key) {
              case 'alergi_fcb_1':
                $kata = 'Obat';
                break;
              case 'alergi_fcb_2':
                $kata = 'Makanan';
                break;
              case 'alergi_fcb_3':
                $kata = $alergiObj['alergi_fcb_4'] ?? '';
                break;
              case 'alergi_fcb_5':
                $kata = 'Tidak ada';
                break;
              default:
                $kata = '-';
            }
            $alergiVal[] = $kata;
          }
        }

        $alergiCodeBlue = implode(', ', $alergiVal);

        // LEMBAR MONITORING DAN TERAPI
        $tglJamMonitor = '';
        $evaluasiMonitor = '';

        foreach ($v->lembar_monitoring as $val) {
          $tglJamMonitor .= '&rarr; ' . $val->tgl_fcb . ' ' . $val->jam_fcb . '<br>';
          $evaluasiMonitor .= '&rarr; ' . $val->terapi_eva_fcb . '<br>';
        }

        // KRITERIA PASCA RESUSITASI
        $kriteriaPascaObj = json_decode($v->paska_fcb, true);
        $kriteriaPascaVal = [];

        foreach ($kriteriaPascaObj as $key => $value) {
          if ($value !== null && in_array($key, ['paska_fcb_1', 'paska_fcb_2', 'paska_fcb_3', 'paska_fcb_5', 'paska_fcb_6'])) {
            switch ($key) {
              case 'paska_fcb_1':
                $kata = 'ICU/HCU jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              case 'paska_fcb_2':
                $kata = 'PICU/NICU jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              case 'paska_fcb_3':
                $kata = 'PERAWATAN BIASA jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              case 'paska_fcb_4':
                $kata = 'DNR jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              case 'paska_fcb_5':
                $kata = 'MENINGGAL jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              case 'paska_fcb_6':
                $kata = 'TRANSFER KE ' . ($kriteriaPascaObj['paska_fcb_7'] ?? '') .  ' jam (' . ($kriteriaPascaObj['paska_fcb_8'] ?? '-') . ') ';
                break;
              default:
                $kata = '-';
            }
            $kriteriaPascaVal[] = $kata;
          }
        }

        $kriteriaPasca = implode(', ', $kriteriaPascaVal);


      ?>
        <tr>
          <td class="center"><?= $i++ ?></td>
          <td class="left"><?= ($v->nama_pasien) ?></td>
          <td class="center">`<?= ($v->no_rm) ?></td>
          <td class="center"><?php echo hitungUmurNewPHP($v->tanggal_lahir); ?></td>
          <td class="center"><?= $v->kelamin ?></td>
          <td class="center"><?= $responAwal1 ?></td>
          <td class="center">`<?= $v->tgl_jam_fcb ?></td>
          <td class="center"><?= $rttCB ?></td>
          <td class="center"><?= ($v->nama_bangsal ?? '-') ?></td>
          <td class="center"><?= ($zonasiCodeBlue) ?></td>
          <td class="center"><?= $kriteriaAktivitas ?></td>
          <td class="center"><?= $kriteriaMedis ?></td>
          <td class="center"><?= $responAwal ?></td>
          <td class="center"><?= $jalanNapas ?></td>
          <td class="center"><?= $resusitasi1 ?></td>
          <td class="center"><?= $AssesmentPernapasan ?></td>
          <td class="center"><?= $resusitasi2 ?></td>
          <td class="center"><?= $sirkulasi ?></td>
          <td class="center"><?= $resusitasi3 ?></td>
          <td class="center"><?= $assesmentDisabilatas ?></td>
          <td class="center"><?= $tekananDarah ?></td>
          <td class="center"><?= $frekuensiNadi ?></td>
          <td class="center"><?= $frekuensiNapas ?></td>
          <td class="center"><?= $suhuCB ?></td>
          <td class="center"><?= $spo2 ?></td>
          <td class="center"><?= ($v->anamnesa_fcb ?? '-') ?></td>
          <td class="center"><?= $alergiCodeBlue ?></td>
          <td class="center"><?= ($v->pemeriksaan_fcb ?? '-') ?></td>
          <td class="center"><?= ($v->diagnosis_fcb ?? '-') ?></td>
          <td class="center"><?= $tglJamMonitor ?></td>
          <td class="left"><?= $evaluasiMonitor ?></td>
          <td class="center"><?= $kriteriaPasca ?></td>
          <td class="center"><?= ($v->keterangan_fcb ?? '-') ?></td>
          <td class="center"><?= ($v->leader_code_blue ?? '-') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>


<!-- +kolom keterangan dengan isi telah di layani / belum di layani, batal -->