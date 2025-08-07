<!-- // SKM -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <thead>
                    <tr>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="70px" height="70px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH
                                KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="70px" height="70px">
                        </td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">RUMAH SAKIT UMUM
                                DAERAH</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">KOTA
                                TANGERANG</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Jl.
                                Pulau Putri Raya Perumahan Modernland, Kelurahan Kelapa Indah</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Kecamatan
                                Tangerang
                                Telp. 021 2972 0201, 021
                                2972 0202</b></td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>
    <main class="main" style="margin: 1rem;">
        <section class="form__skm">
            <div class="form__skm__container container">

                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT KETERANGAN MEDIS</th>
                        </tr>
                        <tr>
                            <th class="table__small-title no__border" colspan="5">Nomor: <?=$skm->nomor_skm_1;?> / <?=$skm->nomor_skm_2;?> /IRJ-RSUD KT/<?= date("Y"); ?></th>
                        </tr>                                           
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Yang bertandatangan di bawah ini :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skm->dokter_nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Jabatan</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skm->jabatan; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Telah dilakukan pemeriksaan di RSUD Kota Tangerang, dengan ini menyatakan bahwa jemaah haji dibawah ini :</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Tempat tanggal lahir</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->tempat_lahir . ' / ' . datefmysql($skm->tanggal_lahir); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">No. Porsi</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->no_porsi; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Pekerjaan</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->nama_pekerjaan; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Alamat</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->alamat; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Hasil Pemeriksaan</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $anamnesa[0]->pemeriksaan_penunjang; ?></td> 
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="20%">Diagnosa</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="60%"><?= $skm->keterangan; ?></td>
                        </tr>                   
                    </tbody>                  
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px; line-height: normal;">
                    <tr>
                        <td class="no__border" width="1.1%"></td>
                        <td class="no__border" width="30%">Menyatakan bahwa jemaah haji tersebut : <?= $skm->menyatakan; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" align="justify" colspan="4"><br>Demikian surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.</td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <br>            
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="5%" align="center">
    
                        </td>
                        <td class="no__border" width="5%" align="center">
                          
                        </td>
                        <td class="no__border" width="5%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $skm->tanggal_skm;

                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));

                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );

                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);

                            echo "<b>$tanggal_diinginkan</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            Dokter Pemeriksa,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            <br><br><br><br><br><br><p></p>(<b><u><?= $skm->nama_dokter;?></b></u>)</font>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-PMD-44-00</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
</body>
<?php die; ?>



   












               

        
