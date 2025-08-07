<!-- // HPDO -->
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
        <section class="form__hpdo">
            <div class="form__hpdo__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <thead>
                        <th class="table__big-title no__border" colspan="5" style="font-weight: normal;"> <b>HASIL PEMERIKSAAN KEDOKTERAN OKUPASI</b></th>
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4"><b>Nama :</b> <?= $pasien->nama; ?> </td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"><b>Umur :</b> <?= hitungUmurJustTahun($pasien->tanggal_lahir); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"><b>Jenis Kelamin :</b> <?= $pasien->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>   
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"><b>Pekerjaan : </b> <?= $hasil_okupasi->pekerjaany_hpdo ?></td>                     
                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Keluhan : <?= $hasil_okupasi->keluhan_hpdo?></td>                
                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Uraian Pekerjaan :  <?= $hasil_okupasi->uraian_hpdo ?></td>                     
                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Masa Kerja : <?= $hasil_okupasi->masakerja_hpdo ?></td>                     
                        </tr>
                    </tbody>   
                </table>
                <table style="font-size: 10pt; width: 100%; border-collapse: collapse;" class="td-top no__border small__line__spacing small__font">
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2">Risiko Kerja</td>
                        <td class="no__border">: Fisik</td>
                        <td class="no__border" colspan="2">: </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Bising</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bising_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Ketinggian</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->ketinggian_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Getaran Tubuh</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gtubuh_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Getaran Tangan</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gtangan_hpdo == 1 ? 'Ya' : 'Tidak' ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Suhu panas/dingin</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->suhu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Radiasi</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->radiasi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>                   
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Lain - lain</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lain_hpdo == 1 ? 'Ya' : 'Tidak' ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2">&nbsp;</td>
                        <td class="no__border"> Kimia</td>
                        <td class="no__border" colspan="2">: </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Debu</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->debu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Zat Kimia</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->zatkimia_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Pestisida</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pestisida_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Asap</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->asap_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Lain - lain</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lainn_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2">&nbsp;</td>
                        <td class="no__border"> Biologi</td>
                        <td class="no__border" colspan="2"> : </td>
                    </tr>

                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Bakteri</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bakteri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Virus</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->virus_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>

                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Parasit</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->parasit_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Jamur</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->jamur_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Lainnya</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lainnya_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2">&nbsp;</td>
                        <td class="no__border"> Ergonomi</td>
                        <td class="no__border" colspan="2">: </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Gerak berulang</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gberulang_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Angkat-Angkut Berat</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->angkat_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Berdiri Terus >4jam</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->berdiri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Duduk Terus >4jam</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->duduk_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Posisi Tubuh Janggal</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->posisi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Pencahayaan Tidak Sesuai</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pencahayaan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Bekerja Dengan Monitor >4jam</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bekerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Lain-Lain</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->laint_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2">&nbsp;</td>
                        <td class="no__border">Psikososial</td>
                        <td class="no__border" colspan="2">: </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Beban Kerja Berlebih/Tidak Sesuai</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bebankerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Kerja Gilir/Shift</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->kerjagilir_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Ketidakjelasan Tugas</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->ketidakjelasan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Pekerjaan Monoton</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pekerjaan_monoton_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Konflik Di Tempat Kerja</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->konflik_kerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" style="padding-left: 20px;">
                            <li>Tuntutan Kerja Tinggi</li>
                        </td>
                        <td class="no__border" colspan="2"> : <?= $hasil_okupasi->tuntutan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">Berdasarkan Pemeriksaan Self Reporting Quetionnaire 29 (SRQ-29) : Gejala Gangguan mental emosional <b><?= $hasil_okupasi->gejala_hpdo == 1 ? 'Ada' : 'Tidak Ada' ?></b> </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">Keterangan : <?= $hasil_okupasi->keterangan_hpdo; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">Berdasarkan Pemeriksaan Survey Diagnosis Stress (SDS) :</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Ketaksaan Peran
                        </td>
                        <td class="no__border">: 
                            <?= $hasil_okupasi->ketaksaan == 0 ? '-' : ($hasil_okupasi->ketaksaan == 1 ? 'Ringan' : ($hasil_okupasi->ketaksaan == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Konflik peran
                        </td>
                        <td class="no__border"> : 
                            <?= $hasil_okupasi->konflikk == 0 ? '-' : ($hasil_okupasi->konflikk == 1 ? 'Ringan' : ($hasil_okupasi->konflikk == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Beban kerja kuantitatif
                        </td>
                        <td class="no__border"> : 
                            <?= $hasil_okupasi->kuantitatif == 0 ? '-' : ($hasil_okupasi->kuantitatif == 1 ? 'Ringan' : ($hasil_okupasi->kuantitatif == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Beban kerja kualitatif
                        </td>
                        <td class="no__border"> : 
                            <?= $hasil_okupasi->kualitatif == 0 ? '-' : ($hasil_okupasi->kualitatif == 1 ? 'Ringan' : ($hasil_okupasi->kualitatif == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Pengembangan karir
                        </td>
                        <td class="no__border"> : 
                            <?= $hasil_okupasi->pengembang == 0 ? '-' : ($hasil_okupasi->pengembang == 1 ? 'Ringan' : ($hasil_okupasi->pengembang == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"></td>
                        <td class="no__border" colspan="2" style="padding-left: 9px;">
                            <b>&bull;</b> Tanggungjawab terhadap oranglain
                        </td>
                        <td class="no__border"> : 
                            <?= $hasil_okupasi->tanggungjewab == 0 ? '-' : ($hasil_okupasi->tanggungjewab == 1 ? 'Ringan' : ($hasil_okupasi->tanggungjewab == 2 ? 'Sedang' : 'Berat')) ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"style="vertical-align: top;">Kesimpulan</td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border"colspan="4">
                            <label style="margin-left: 10px; word-wrap: break-word; word-break: break-word;">
                                <?= nl2br($hasil_okupasi->kesimpulanhpdo); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"style="vertical-align: top;">Saran</td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border"colspan="4">
                            <label style="margin-left: 10px; word-wrap: break-word; word-break: break-word;">
                                <?= nl2br($hasil_okupasi->saranhpdo); ?>
                            </label>
                        </td>
                    </tr>                    
                </table>
                <br><br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $hasil_okupasi->tanggal_hpdo;
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
                            Pemeriksa,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border" align="center"> 
                        </td>
                        <td class="no__border"  align="center">
                            <br>
                            <?php if($hasil_okupasi->consentid): ?>
                                <img src="<?= resource_url().'images/ttd_dokter/'.$hasil_okupasi->consentid; ?>" alt="consentid" width="175">
                            <?php else: ?>
                                <br><br><br>
                            <?php endif ?>
                            <br><b><u>( <?= $hasil_okupasi->nama_dokter;?> )</u> <br> NIP.<?= $hasil_okupasi->nip;?>  </font> 
                        </td>
                    </tr>
                </table>
            </div>
            <br><br><br>
            <p class="page__number">FORM-MCU-00-00</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
</body>
<?php die; ?>
