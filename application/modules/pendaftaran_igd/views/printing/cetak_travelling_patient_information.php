<!-- // TPI -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
            </div>
        </div>
	</header>
                                    
    <main class="main">
        <section class="information">
            <br>
            <div class="information__container container boxed">
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <b style="font-size: 12pt; display: flex; justify-content: center">TRAVELLING PATIENT INFORMATION</b>
                    </tr>
                    <br>
                    <tr>
                        <td class="no__border" width="15%"><i>Name</i> Nama</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $pasien->nama; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><i>Date of Birth /</i> Tgl.Lahir</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= datefmysql($pasien->tanggal_lahir); ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><i>Home Address /</i> Alamat</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $pasien->alamat; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><i>Diagnosis /</i> Diagnosa</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">   
                            <?php
                                // Loop untuk $diagnosa
                                foreach ($diagnosa as $item) {
                                    echo isset($item->golongan_sebab_sakit) ? htmlspecialchars($item->golongan_sebab_sakit) . '<br>' : '';
                                }
                            ?> 
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="33%"><i>Dialysis Treatment per week /</i> Tindakan HD Per Minggu</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_dialysis; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="33%"><i>Duration Of Dialys /</i> Lamanya HD</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_duration; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="33%"><i>Dialisat Concentrate /</i>  Cairan Konsentrat</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_dialisat; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="33%"><i>Dry Weight /</i> BB kering</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_dry_weight; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="33%"><i>Acces Vascular /</i> Sarang Hubungan Sirkulasi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_acces_vascular; ?></td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="53%"><i>Average Weight Gain Between Treatment /</i> Kenaikan BB Per Tindakan HD</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="35%"> <?= $ttd_average_weight; ?> </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="60%"> <i>Average Blood Presure /</i> Tekanan Darah rata-rata : <i>Pre</i> /Sebelum : <?= $ttd_average_blood_pre; ?> &nbsp;&nbsp; <i>Post</i> /Sesudah :  &nbsp;&nbsp; <?= $ttd_average_blood_post; ?> </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="37%"><i>Dialyser Type /</i> Jenis Dialiser</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $ttd_dialyser_type; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="37%"><i>Blood Flow Pressure /</i> Kecepatan Aliran Darah</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $ttd_blood_flow; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="37%"><i>Heparinitation /</i> Heparinisasi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $ttd_heparinitation; ?> </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="60%"> <i>Loading dose /</i> Dosis Awal : <?= $ttd_loading_dose; ?> &nbsp;&nbsp; <i>IU,<i>	Maintenance Dose </i> / Dosis Lanjut :  &nbsp;&nbsp;  <?= $ttd_maintenance_dose; ?> &nbsp;&nbsp; IU /Jam </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="48%"><i>Blood Group /</i> Gol. Darah / Rhesus</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $ttd_blood_group; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="48%"><i>Blood Transfusion Result /</i> Tranfusi Darah Terakhir</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $ttd_blood_tranfusion; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="48%"><i>Date Of Laboratorium Result /</i> Tgl. Hasil Laboratorium Terakhir </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= datefmysql($ttd_date_of_laboratorium); ?> </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="60%"> HB : <?= $ttd_hb_ereum_pre; ?>  &nbsp;&nbsp; Ureum Pre/Post : &nbsp;&nbsp;  <?= $ttd_hb_ureum_post; ?> &nbsp;&nbsp; Cratinin Pre / Post : &nbsp;&nbsp;  <?= $ttd_cratine_pre; ?> &nbsp;&nbsp; Kalium : &nbsp;&nbsp;  <?= $ttd_kalium; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="60%"> Phospor : <?= $ttd_phospor; ?>  &nbsp;&nbsp; HBSAg : &nbsp;&nbsp;  <?= $ttd_hbsag; ?> &nbsp;&nbsp; Anti HCV  : &nbsp;&nbsp;  <?= $ttd_anti_hcv; ?> &nbsp;&nbsp; Anti HIV : &nbsp;&nbsp;  <?= $ttd_anti_hiv; ?></td>
                    </tr>
                </table>
            

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tbody>
                        <tr>
                            <td class="no__border" width="60%" style="font-size: 10pt;"> <i>Medication</i> / Terapi obat-obatan </td>
                        </tr>
                        <table class="medication" border="1" style="font-size: 10pt;">
                            <tbody>                                       
                                <tr>
                                    <td width="1%" style="text-align:center"><small><b>No</small></td>
                                    <td width="30%" style="text-align:center"><small><b>Nama Obat</small></td>
                                    <td width="20%" style="text-align:center"><small><b>Dosis</small></td>
                                </tr>

                                <?php if (!empty($ttd_nama_medication_1) && !empty($ttd_dosis_1)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">1.</td>
                                    <td width="30%"><?= $ttd_nama_medication_1; ?></td>
                                    <td width="20%"><?= $ttd_dosis_1; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_2) && !empty($ttd_dosis_2)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">2.</td>
                                    <td width="30%"><?= $ttd_nama_medication_2; ?></td>
                                    <td width="20%"><?= $ttd_dosis_2; ?></td>
                                </tr>
                                <?php endif; ?>

                                
                                <?php if (!empty($ttd_nama_medication_3) && !empty($ttd_dosis_3)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">3.</td>
                                    <td width="30%"><?= $ttd_nama_medication_3; ?></td>
                                    <td width="20%"><?= $ttd_dosis_3; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_4) && !empty($ttd_dosis_4)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">4.</td>
                                    <td width="30%"><?= $ttd_nama_medication_4; ?></td>
                                    <td width="20%"><?= $ttd_dosis_4; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_5) && !empty($ttd_dosis_5)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">5.</td>
                                    <td width="30%"><?= $ttd_nama_medication_5; ?></td>
                                    <td width="20%"><?= $ttd_dosis_5; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_6) && !empty($ttd_dosis_6)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">6.</td>
                                    <td width="30%"><?= $ttd_nama_medication_6; ?></td>
                                    <td width="20%"><?= $ttd_dosis_6; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_7) && !empty($ttd_dosis_7)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">7.</td>
                                    <td width="30%"><?= $ttd_nama_medication_7; ?></td>
                                    <td width="20%"><?= $ttd_dosis_7; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_8) && !empty($ttd_dosis_8)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">8.</td>
                                    <td width="30%"><?= $ttd_nama_medication_8; ?></td>
                                    <td width="20%"><?= $ttd_dosis_8; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_9) && !empty($ttd_dosis_9)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">9.</td>
                                    <td width="30%"><?= $ttd_nama_medication_9; ?></td>
                                    <td width="20%"><?= $ttd_dosis_9; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_10) && !empty($ttd_dosis_10)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">10.</td>
                                    <td width="30%"><?= $ttd_nama_medication_10; ?></td>
                                    <td width="20%"><?= $ttd_dosis_10; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_11) && !empty($ttd_dosis_11)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">11.</td>
                                    <td width="30%"><?= $ttd_nama_medication_11; ?></td>
                                    <td width="20%"><?= $ttd_dosis_11; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_12) && !empty($ttd_dosis_12)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">12.</td>
                                    <td width="30%"><?= $ttd_nama_medication_12; ?></td>
                                    <td width="20%"><?= $ttd_dosis_12; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_13) && !empty($ttd_dosis_13)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">13.</td>
                                    <td width="30%"><?= $ttd_nama_medication_13; ?></td>
                                    <td width="20%"><?= $ttd_dosis_13; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_14) && !empty($ttd_dosis_14)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">14.</td>
                                    <td width="30%"><?= $ttd_nama_medication_14; ?></td>
                                    <td width="20%"><?= $ttd_dosis_14; ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if (!empty($ttd_nama_medication_15) && !empty($ttd_dosis_15)): ?>
                                <tr>
                                    <td width="1%" style="text-align:center">15.</td>
                                    <td width="30%"><?= $ttd_nama_medication_15; ?></td>
                                    <td width="20%"><?= $ttd_dosis_15; ?></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>                 
                        </table>
                    </tbody>
                </table>   

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="25%"> <i>Problem During Dialysis /</i> Permasalahan Selama HD </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="30%"> <?= $ttd_problem_during; ?></td>
                    </tr>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center">   
                        </td>
                        <td class="no__border" width="3%" align="center">                         
                        </td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $ttd_tanggal_tpi;
                            if (!empty($tanggal_mysql)) {
                                $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));
                                $tanggal_diinginkan = str_replace(
                                    ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                    ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                    $tanggal_diinginkan
                                );
                                $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);
                                echo "$tanggal_diinginkan";
                            }
                            ?>
                            <br><br>
                            Your Sincerely
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        </td>
                        <td class="no__border"  align="center">
                        <br><br><br><br><u>( <?=$ttd_dokter; ?> )</u> <br> Nephrologist Consultant</font>
                        </td>
                    </tr>
                </table>             
                <br>
                <p class="page__number" style="line-height: 1.5;">FORM-KEP-35-00</p>
            </div>
        </section>
    </main>
</body>
<?php die; ?>
	
