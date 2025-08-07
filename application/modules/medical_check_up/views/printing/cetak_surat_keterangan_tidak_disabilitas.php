<!-- // SKTD -->
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
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="92px" height="92px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH
                                KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="92px" height="92px">
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
        <section class="form__sktd">
            <div class="form__sktd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <thead>
                        <th class="table__big-title no__border" colspan="5" style="font-weight: normal;"> <u><b>SURAT KETERANGAN TIDAK DISABILITAS</b></u> <br> NOMOR : <?=$sktd->nomorsktd;?>/MCU_RSUDKT/<?= date("Y"); ?>
                        </th>
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Penandatangan di bawah ini, Dokter Pemeriksa di Rumah Sakit Umum Daerah Kota Tangerang menerangkan bahwa :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $sktd->nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">Tempat/Tanggal Lahir</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $sktd->tempat_lahir . ' / ' . datefmysql($sktd->tanggal_lahir); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">Umur</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"> 
                                <?php 
                                    $birthDate = new DateTime($sktd->tanggal_lahir);
                                    $today = new DateTime();
                                    $age = $today->diff($birthDate)->y;
                                    echo $age . ' tahun';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $sktd->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="15%">Alamat</td>
                            <td class="no__border" width="1%">: </td>
                            <!-- <td class="no__border" width="40%"><!?= $sktd->alamat; ?></td>   -->

                            <td style="vertical-align:top" class="no__border" width="40%">
                                <?= strtoupper($sktd->alamat); ?>

                                <?php if ($sktd->no_rumah != NULL ) : ?>
                                    NO. <?= strtoupper($sktd->no_rumah); ?>            
                                <?php endif; ?>

                                RT. <?= strtoupper($sktd->no_rt); ?>
                                / RW. <?= strtoupper($sktd->no_rw); ?>, KEL. <?= strtoupper($sktd->nama_kel); ?>, KEC. <?= strtoupper($sktd->nama_kec); ?>, <?= strtoupper($sktd->nama_kab); ?>, <?= strtoupper($sktd->nama_prop); ?>
                            </td>


                        </tr>
                    </tbody>   
                </table>

                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" > Surat keterangan ini untuk keperluan 	: <b><?= $sktd->keterangan; ?></b> 
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tbody>                    
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Saya yang bertanda tangan dibawah ini :</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><b><?= $sktd->nama_dokter; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%">NIP</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><b><?= $sktd->nip_dokter; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" align="justify" colspan="4" ><br>Setelah melakukan pemeriksaan kesehatan dan kemampuan fungsional bahwa yang bersangkutan benar-benar sebagai <b><u>bukan penyandang Disabilitas</u></b></td>
                        </tr>
                    </tbody>   
                </table>
                <br><br><br><br><br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $sktd->tanggalsktd;
                            $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                            $tanggal_diinginkan = str_replace(
                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                $tanggal_diinginkan
                            );
                            $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                            echo "$tanggal_diinginkan";
                            ?>
                            <div style="display: block; margin-bottom: 5px;"></div>
                            Medical Check Up
                            <div style="display: block; margin-bottom: 5px;"></div>
                            Dokter Pemeriksa,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border" align="center"></td>
                        <!-- <td class="no__border"  align="center">
                            <br>
                            <!?php if($sktd->consentid): ?>
                                <img src="<!?= resource_url().'images/ttd_dokter/'.$sktd->consentid; ?>" alt="consentid" width="175">
                            <!?php else: ?>
                                <br><br><br>
                            <!?php endif ?>
                            <br><br><b><u>( <!?= $sktd->nama_dokter;?> )</u> <br> NIP/NRTKK.<!?= $sktd->nip_dokter;?>  </font> 
                        </td> -->

                        <td class="no__border" align="center">
                            <br><br><br><br>
                            <b><u>( <?= $sktd->nama_dokter; ?> )</u></b> <br>
                            <?php if ($sktd->nip_sip_sktd == 'NIP'): ?>
                                NIP/NRTKK. <?= !empty($sktd->nip_dokter) ? $sktd->nip_dokter : '-'; ?>
                            <?php elseif ($sktd->nip_sip_sktd == 'SIP'): ?>
                                SIP. <?= !empty($sktd->sip_dokter) ? $sktd->sip_dokter : '-'; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>

                    </tr>
                </table>
            </div>
            <br><br><br><br><br>
            <p class="page__number">FORM-MCU-28-00</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
</body>
<?php die; ?>

