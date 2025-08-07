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
  "Pembelian_Logistik_". $periode
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
    <h4 style="text-transform: uppercase;">LAPORAN PEMBELIAN LOGISTIK
      <br>Unit : <?= ($parameter['unit'] == '' ? ' Semua Unit' : $unit) ?>
      <br>Kategori : <?= ($parameter['kategori'] == '' ? ' Semua Kategori' : $kategori) ?>
      <br>Periode : <?= $periode ?>
    </h4>
  </div>

  <table width="100%" border="1">
    <thead>
      <tr>
        <th widht="15%" class="center">Kategori</th>
          <th widht="20%" class="center">Nama Barang</th>
          <th widht="5%" class="center">APBD</th>
          <th widht="13%" class="center">Ket</th>
          <th widht="5%" class="center">BLUD</th>
          <th widht="13%" class="center">Ket</th>
          <th widht="5%" class="center">BTT</th>
          <th widht="13%" class="center">Ket</th>
          <th widht="11%" class="center">Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $jumlahData = count($data);
      $xKategori = '';
      
      foreach ($data as $i => $value){

        $dataTerakhir = (int)$jumlahData - 1;

        $jenisPembayaran = $value->pembayaran;
        $ketPembayaran = $value->keterangan_pembayaran;
        $totalPenerimaan = $value->harga * $value->isi * $value->isi_satuan * $value->jumlah;

        if($value->kategori !== $xKategori){

              if($xKategori === ''){ ?>

                
                  <tr>
                    <td class="left"><?= $value->kategori ?></td>
                    <td class="left"><?= $value->nama_barang ?></td>
                    
                  
                

        <?php } else { 

                $cariObjek = $xKategori;

                $cariKunci = $kategori[$cariObjek];
                if(isset($cariKunci['BLUD'])){
                  $bLud = $cariKunci['BLUD'];
                }
                if(isset($cariKunci['APBD'])){
                  $apbd = $cariKunci['APBD'];
                }
                if(isset($cariKunci['BTT'])){
                  $bttP = $cariKunci['BTT'];
                }
                $cariSubtotal = $subtotal[$cariObjek];

              ?>

              <tr>
                  <td colspan="2" class="center"><b>Total</b></td>
                  
                  <td class="right"><b><?php if(isset($apbd)){ echo '="' . number_format($apbd, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($bLud)){ echo '="' . number_format($bLud, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($bttP)){ echo '="' . number_format($bttP, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="center"><b><?php if(isset($cariSubtotal)){ echo '="' . number_format($cariSubtotal, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
              </tr>
              <tr>
                    <td class="left"><?= $value->kategori ?></td>
                    <td class="left"><?= $value->nama_barang ?></td>

        <?php } ?>

<?php   } else { ?>

              <tr>
                    <td class="left"></td>
                    <td class="left"><?= $value->nama_barang ?></td>

<?php   }

        if($jenisPembayaran === 'APBD'){
        
      ?>
              
                  <td class="right"><?= '="' . number_format($totalPenerimaan, 0, ',',  '.') . '"' ?></td>
                  
                  <td class="left"><?= $ketPembayaran ?></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  
                </tr>

  <?php }

        if($jenisPembayaran === 'BLUD'){ ?>

                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="right"><?= '="' . number_format($totalPenerimaan, 0, ',',  '.') . '"' ?></td>
                  
                  <td class="left"><?= $ketPembayaran ?></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  
                </tr>
  <?php }

        if($jenisPembayaran === 'BTT'){ ?>

                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="center"></td>
                  <td class="right"><?= '="' . number_format($totalPenerimaan, 0, ',',  '.') . '"' ?></td>
                  <td class="left"><?= $ketPembayaran ?></td>
                  <td class="center"></td>
                  
                </tr>

  <?php } 

        if($dataTerakhir === $i){

            $cariObjekTerakhir = $value->kategori;

            $cariKunciTerakhir = $kategori[$cariObjekTerakhir];
            if(isset($cariKunciTerakhir['APBD'])){
              $apbdTerakhir = $cariKunciTerakhir['APBD'];
            }
            if(isset($cariKunciTerakhir['BLUD'])){
              $bLudTerakhir = $cariKunciTerakhir['BLUD'];
            }
            if(isset($cariKunciTerakhir['BTT'])){
              $bttPTerakhir = $cariKunciTerakhir['BTT'];
            }
            $cariSubtotalTerakhir = $subtotal[$cariObjekTerakhir];
            $cekTotal = $total;

            if(isset($cekTotal['APBD'])){
              $totalApbdTerakhir = $cekTotal['APBD'];
            }
            if(isset($cekTotal['BLUD'])){
              $totalBludTerakhir = $cekTotal['BLUD'];
            }
            if(isset($cekTotal['BTT'])){
              $totalBttTerakhir = $cekTotal['BTT']; 
            }
  ?>

                <tr>
                  <td colspan="2" class="center"><b>Total</b></td>
                  
                  <td class="right"><b><?php if(isset($apbdTerakhir)){ echo '="' . number_format($apbdTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($bLudTerakhir)){ echo '="' . number_format($bLudTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($bttPTerakhir)){ echo '="' . number_format($bttPTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="center"><b><?php if(isset($cariSubtotalTerakhir)){ echo '="' . number_format($cariSubtotalTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                </tr>
                <tr>
                  <td colspan="2" class="center"><b>Jumlah Total</b></td>
                  
                  <td class="right"><b><?php if(isset($totalApbdTerakhir)){ echo '="' . number_format($totalApbdTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($totalBludTerakhir)){ echo '="' . number_format($totalBludTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="right"><b><?php if(isset($totalBttTerakhir)){ echo '="' . number_format($totalBttTerakhir, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                  <td class="center"></td>
                  <td class="center"><b><?php if(isset($all)){ echo '="' . number_format($all, 0, ',',  '.') . '"'; } else { echo 0; } ?></b></td>
                </tr>
                  
  <?php } ?>

        
<?php $xKategori = $value->kategori;

    } ?>
    </tbody>
    
  </table>
</body>