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
  "Mrs_Rawat_Inap_". $periode
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
        <td colspan="8" class="center" style="padding: 0;margin: 0;font-weight: bold;font-size: 18px;">DATA PASIEN MASUK RAWAT INAP</td>
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
        <th class="center">No. RM</th>
        <th class="center">Nama Pasien</th>
        <th class="center">Alamat</th>
        <th class="center">Umur</th>
        <th class="center">L/P</th>
        <th class="center">Cara Bayar</th>
        <th class="center">Dokter</th>
        <th class="center">Diagnosa</th>
        <th class="center">Asal Poli</th>
      </tr>
    </thead>
    <tbody>
      <?php

        function checkBy($key, $x) {
            $result = array();

            foreach($x as $val) {
              if(array_key_exists($key, $val)){
                  $result[$val[$key]][] = $val;
              }else{
                  $result[""][] = $val;
              }
            }

            return $result;
        }

        $arr = [];

        foreach ($data as $a => $b) {
          array_push($arr, (array)$b);
        }

        $keys = array_column($arr, 'nama_bangsal');
        array_multisort($keys, SORT_ASC, $arr);

        $check = checkBy("nama_bangsal", $arr);
            
        

        foreach ($check as $e => $f){ 

      ?>
      <tr>
        <td style="border: none;" align="center" valign="baseline" class="left" style="font-weight: bold;font-size: 16px;"><?= $e ?></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
        <td style="border: none;"></td>
      </tr>
      <?php foreach ($f as $g => $h){ $g = (int)$g+1;?>
        <tr>
          <td align="center" class="center"><?= (int)$g ?></td>
          <td align="center" style="mso-number-format:\@;" class="center"><?= $h['no_rm'] ?></td>
          <td align="center" class="left"><?= $h['nama_pasien'] ?></td>
          <td align="center" class="left"><?= $h['alamat'] ?></td>
          <td align="center" class="center"><?= $h['umur'] ?></td>
          <td align="center" class="center"><?= $h['kelamin'] ?></td>
          <td align="center" class="left"><?= $h['cara_bayar'] ?></td>
          <td align="center" class="left"><?= $h['nama_dokter'] ?></td>
          <td align="center" class="left"><?= $h['diagnosa'] !== null ? $h['diagnosa'] : $h['golongan_sebab_sakit_lain']?></td>
          <td align="center" class="left"><?= $h['nama_poli'] ?></td>
        </tr>

      <?php } ?>
      <?php  } 
      ?>
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