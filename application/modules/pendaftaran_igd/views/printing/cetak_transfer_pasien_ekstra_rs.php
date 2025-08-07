<!-- // TPERS -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
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

    <main class="main">
        <section class="information">
			<br>
            <div class="information__container container">
                <!-- <table class="small__font"> -->
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <b style="font-size: 12pt; display: flex; justify-content: center">TRANSFER PASIEN EKSTRA RUMAH SAKIT</b>
                    </tr>
                    <br>
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="11">Ringkasan Pasien</th>
                        </tr> 

                        <tr>
                            <td width="25%">
                                <div style="margin-bottom: 10px;">
                                   
                                    Tanggal Masuk :   <?= $pasien->tanggal_daftar; ?>
                                        <br>                                      
                                    Unit Kerja : <?= $layanan[1]->bangsal; ?>
                                    <!-- <!?=
                                    var_dump($layanan[1]->bangsal);
                                    ?>  -->
                                </div>
                            </td>

                            <td width="25%">
                                <div style="margin-bottom: 10px;">                                   
                                    Tanggal Pindah :   <?= $pasien->tanggal_keluar; ?>
                                </div>
                                <br>
                            </td>

                            <td width="50%"> 
                                <?= $ttd_ceklis_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?> 
                                    Rumah Sakit yang dituju: 
                                <?= $ttd_rs_dituju_tpers; ?> <br>
                                <?= $ttd_ceklis_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?> 
                                    Ruangan yang dipesan : 
                                <?= $ttd_ruang_tpers; ?> <br>
                                <?= $ttd_ceklis_tpers_3 == 1 ? '&#128505;' : '&#9633;'; ?> 
                                    Dokter spesialis yang dituju : 
                                <?= $ttd_dokter_sp_tpers; ?> 
                            </td>
                        </tr>
                    </thead>
                </table>
               
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td width="50%">
                                <!-- <div style="margin-bottom: 10px;"> -->
                                    Staf yang kontak Tanggal dan Pukul : 
                                    <?php if (isset($ttd_staf_tpers) && !empty($ttd_staf_tpers)) {
                                        echo date('d-m-Y H:i', strtotime($ttd_staf_tpers));
                                    } ?> <br>
                                    Nama : <?= $ttd_nama_tpers; ?> 
                                <!-- </div> -->
                            </td>


                            <td width="50%"> 
                                <!-- <div style="margin-bottom: 10px;"> -->
                                    Staf yang menerima kontak <br>
                                    Nama : 
                                    <?= $ttd_nama_staf_tpers; ?> <br>
                                    No. Telepon : 
                                    <?= $ttd_no_staf_tpers; ?> 
                                <!-- </div> -->
                            </td>
                        </tr>           
                    </thead>
                </table>


                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td width="50%">
                                Transportasi : <br>                                  
                                <?= $ttd_transportasi_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?>  Ambulan RS &ensp; &ensp;                                 
                                <?= $ttd_transportasi_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?>  Ambulan Luar &ensp;  &ensp;                                 
                                <?= $ttd_transportasi_tpers_3 == 1 ? '&#128505;' : '&#9633;'; ?>  Kendaraan Pibadi  
                            </td>
                            <td width="50%"> 
                                Jika memakai ambulance RS berangkat pukul : <?= $ttd_jika_staf_tpers; ?>  
                                <br>                                                       
                                Tiba ditempat pukul : <?= $ttd_tiba_staf_tpers; ?>                               
                            </td>
                        </tr>           
                    </thead>
                </table>

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td width="50%">
                                Alasan Merujuk : <br>                                  
                                <?= $ttd_alasan_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?>  Fasilitas tidak memadai dengan kebutuhan &ensp; &ensp;                                 
                                <?= $ttd_alasan_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?>  Tidak ada tempat di ICU &ensp;  &ensp;                                 
                                <?= $ttd_alasan_tpers_3 == 1 ? '&#128505;' : '&#9633;'; ?>  Permintaan pasien atau keluarga  
                                <br>
                                <?= $ttd_alasan_tpers_4 == 1 ? '&#128505;' : '&#9633;'; ?>  Ruangan rawat inpa penuh &ensp; &ensp;                                 
                                <?= $ttd_alasan_tpers_5 == 1 ? '&#128505;' : '&#9633;'; ?>  Lain-lain &ensp;  &ensp;   :                              
                                <?= $ttd_alasan_tpers_6; ?>  
                            </td>
                        </tr>           
                    </thead>
                </table>

                
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td width="50%">
                                Dokter yang merujuk (DPJP) :  <?= $ttd_dokter_dpjp_tpers; ?>                                                             
                            </td>
                            <td width="50%"> 
                                Pendamping : <br>                                                                  
                                <?= $ttd_ceklis_tpers_4 == 1 ? '&#128505;' : '&#9633;'; ?> Dokter : <?= $ttd_dokter_pendamping_tpers; ?>  
                                &ensp; &ensp;   
                                <?= $ttd_kel_tpers == 1 ? '&#128505;' : '&#9633;'; ?>  Keluarga 
                                <br>
                                <?= $ttd_ceklis_tpers_5 == 1 ? '&#128505;' : '&#9633;'; ?>  Perawat : <?= $ttd_perawat_pendamping_tpers; ?>  
                                &ensp; &ensp;
                                <?= $ttd_tidak_ada_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Tidak ada
                            </td>
                        </tr>           
                    </thead>
                </table>

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="11">Catatan Klinis</th>
                        </tr> 
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">1</td>
                            <td width="50%"> 
                                Indikasi Masuk RS  : <?= $ttd_indikasi_tpers; ?>  
                            </td>
                        </tr>           
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">2</td>
                            <td width="50%"> 
                                Riwayat Kesehatan  : <?= $ttd_riwayat_kesehatan_tpers; ?>  
                            </td>
                        </tr>           
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">3</td>
                            <td width="50%"> Alergi : &ensp; 
                                 <?= $ttd_alergi_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?> Tidak &ensp; 
                                 <?= $ttd_alergi_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?> Ya, : &ensp; <?= $ttd_alergi_tpers_3; ?>  
                            </td>
                        </tr>  
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">4</td>
                            <td width="50%"> 
                                Diagnosa Medis  : 
                                <!-- <!?= $ds_manual_utama[0]->nama;?>   ini hanya narik data namun bikin eror, mangknya di ganti di bawahnya--> 
                                <?= $ds_manual_utama[0]->nama ?? '';?>
                                <br>
                                Diagnisa Sekunder  : 
                                <?= $ds_manual_sekunder[0]->nama ?? '';?>
                            </td>
                        </tr>  
                        <tr>
                            <td class="center" width="2%" style="text-align: center;"></td>
                            <td width="50%"> Terapi/Tindakan/Pengobatan serta hasil konsultasi selama di RSUD Kota Tangerang <br>
                                 <?= $ttd_terapi_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?> Tidak Ada &ensp; 
                                 <?= $ttd_terapi_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?> Ada : &ensp; <?= $ttd_terapi_tpers_3; ?>  
                            </td>
                        </tr> 
                    </thead>
                </table>  
                        

                <!-- NO 5 DI TUNDA DULUU  -->
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>                    
                        <tr>
                            <th class="center"><b>Nama Obat</b></th>
                            <th class="center"><b>Jumlah</b></th>
                            <th class="center"><b>Dosis</b></th>
                            <th class="center"><b>Frekuensi</b></th>
                            <th class="center"><b>Cara Pemberian</b></th>
                            <th class="center"><b>Jam Pemberian</b></th>
                            <th class="center"><b>Petunjuk Khusus</b></th>
                            <th class="center">Petugas</th>
                        </tr>
                        <?php foreach ($terapi_resume as $terapi) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $terapi->nama_obat; ?></td>
                            <td style="text-align: center;"><?= $terapi->jumlah_obat; ?></td>
                            <td style="text-align: center;"><?= $terapi->dosis; ?></td>
                            <td style="text-align: center;"><?= $terapi->frekuensi; ?></td>
                            <td style="text-align: center;"><?= $terapi->cara_pemberian; ?></td>                          
                            <td style="text-align: center;">
                                <?= $terapi->ek_jam_pemberian; ?>,<?= $terapi->ek_jam_pemberian_satu; ?>,<?= $terapi->ek_jam_pemberian_dua; ?>,<?= $terapi->ek_jam_pemberian_tiga; ?>,<?= $terapi->ek_jam_pemberian_empat; ?>,<?= $terapi->ek_jam_pemberian_lima; ?>
                            </td>
                            <td style="text-align: center;"><?= $terapi->petunjuk_khusus; ?></td>
                            <td style="text-align: center;"><?= $terapi->akun_user; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </thead>
                </table>



                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">5</td>
                            <td width="50%"> Riwayat Penyakit : 
                                 <?= $ttd_rw_penyakit_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?> Tidak Ada &ensp; 
                                 <?= $ttd_rw_penyakit_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?> Ada : &ensp; <?= $ttd_rw_penyakit_tpers_3; ?>  
                            </td>
                        </tr>  
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">6</td>
                            <td width="50%"> Intake oral terakhir kapan :  <?= $ttd_intake_tpers; ?>  
                            </td>
                        </tr>  
                    </thead>
                </table>

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td><b>Kondisi</td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>                     
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">1</td>                            
                            <td width="50%"> 
                                Kesadaran :  
                                GCS : 
                                E <?= $ttd_E_tpers; ?> &ensp;&ensp;                                                            
                                V <?= $ttd_V_tpers; ?> &ensp;&ensp;                                                            
                                M <?= $ttd_M_tpers; ?> &ensp;&ensp;                                                           
                                Pupil : <?= $ttd_pupil_tpers; ?>mm  &ensp;&ensp;                                                          
                                Reflek cahaya : <?= $ttd_reflek_tpers_1; ?> / <?= $ttd_reflek_tpers_2; ?>  <br>                                                        
                                TD : <?= $ttd_td_tpers_1; ?>  / <?= $ttd_td_tpers_2; ?>mmhg &ensp;&ensp;
                                Nadi : <?= $ttd_nadi_tpers; ?> x/menit &ensp;&ensp;
                                Suhu : <?= $ttd_suhu_tpers; ?> ℃ &ensp;&ensp;
                                Pernafasan : <?= $ttd_pf_tpers; ?> x/menit   
                            </td>
                        </tr>   
                        <tr>
                            <td class="center" width="2%" style="text-align: center;">2</td>                            
                            <td width="50%"> 
                                Pasien memakai peralatan medis :  
                                <?= $ttd_pasien_mmberi_tpers_1 == 1 ? '&#128505;' : '&#9633;'; ?> Tidak &ensp; &ensp; 
                                <?= $ttd_pasien_mmberi_tpers_2 == 1 ? '&#128505;' : '&#9633;'; ?> Ya, &ensp; &ensp; 
                                <?= $ttd_infus_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Infus &ensp; &ensp; 
                                <?= $ttd_ett_tpers == 1 ? '&#128505;' : '&#9633;'; ?> ETT &ensp; &ensp; 
                                <?= $ttd_oksigen_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Oksigen &ensp; &ensp; 
                                <?= $ttd_cvc_tpers == 1 ? '&#128505;' : '&#9633;'; ?> CVC &ensp; &ensp; <br>
                                <?= $ttd_kateter_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Kateter &ensp; &ensp; 
                                <?= $ttd_bidai_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Bidai &ensp; &ensp; 
                                <?= $ttd_pupm_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Pupm &ensp; &ensp; 
                                <?= $ttd_lain_tpers == 1 ? '&#128505;' : '&#9633;'; ?> Lain-lain &ensp; &ensp; :
                                <?= $ttd_peralatan_tpers; ?> 
                            </td>
                        </tr>         
                    </thead>
                </table>                   
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <td width="50%"> Pemeriksaan Penunjang Diagnostik :
                                <br>
                                <?= $ttd_pp_dianostik_1 == 1 ? '&#128505;' : '&#9633;'; ?> Tidak ada &ensp; &ensp;  <?= $ttd_pp_dianostik_2 == 1 ? '&#128505;' : '&#9633;'; ?> Ada, : &ensp; <?= $ttd_pp_dianostik_3; ?>                                 
                            </td>          
                    </thead>
                </table>

              


                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tfoot>
                        <tbody>
                            <tr>
                                <td>
                                    <center>PJ SHIFT,<br><br><br><br><br>
                                        <font size="0.625rem"></font>
                                    </center>
                                    <center> <?=$ttd_pj_shift_tpers; ?> <br> 
                                        <p style="text-decoration: overline;">Tanda tangan, Nama lengkap</p>
                                        <font size="0.625rem"></font>
                                    </center>
                                </td>
                                <td>
                                    <center>Dokter Pemeriksa<br><br><br><br><br>
                                        <font size="0.625rem"></font>
                                    </center>
                                    <center> <?=$ttd_dokter_pem_tpers; ?> <br> 
                                    <p style="text-decoration: overline;">Tanda tangan, Nama lengkap</p>                                     
                                        <font size="0.625rem"></font>
                                    </center>
                                </td>
                            </tr>     
                        </tbody>
                    </tfoot>
                </table>


            
                
                <p class="page__number" style="line-height: 1.5;">FORM-REM-106-01</p>
            </div>
        </section>
    </main>
</body>
<?php die; ?>





    <!-- <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
        <thead>                    
            <tr>
                <th class="center"><b>No</b></th>
                <th class="center"><b>Nama Obat</b></th>
                <th class="center"><b>Jumlah</b></th>
                <th class="center"><b>Dosis</b></th>
                <th class="center"><b>Frekuensi</b></th>
                <th class="center"><b>Cara Pemberian</b></th>
                <th class="center"><b>Jam Pemberian</b></th>
                <th class="center"><b>Petunjuk Khusus</b></th>
                <th class="center">Petugas</th>
            </tr>
            <?php
            $i = 0; // Inisialisasi variabel penghitung
            foreach ($terapi_resume as $terapi) : 
                $i++; // Increment variabel penghitung di setiap iterasi
            ?>
                <tr>
                    <td style="text-align: center;"><?= $i; ?></td>
                    <td style="text-align: center;"><?= $terapi->nama_obat; ?></td>
                    <td style="text-align: center;"><?= $terapi->jumlah_obat; ?></td>
                    <td style="text-align: center;"><?= $terapi->dosis; ?></td>
                    <td style="text-align: center;"><?= $terapi->frekuensi; ?></td>
                    <td style="text-align: center;"><?= $terapi->cara_pemberian; ?></td>                          
                    <td style="text-align: center;">
                        <?= $terapi->ek_jam_pemberian; ?>,
                        <?= $terapi->ek_jam_pemberian_satu; ?>,
                        <?= $terapi->ek_jam_pemberian_tiga; ?>,
                        <?= $terapi->ek_jam_pemberian_empat; ?>,
                        <?= $terapi->ek_jam_pemberian_lima; ?>
                    </td>
                    <td style="text-align: center;"><?= $terapi->petunjuk_khusus; ?></td>
                    <td style="text-align: center;"><?= $terapi->akun_user; ?></td>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table> -->