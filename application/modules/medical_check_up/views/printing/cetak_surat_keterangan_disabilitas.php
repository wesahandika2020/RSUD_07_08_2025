<!-- // SKD -->
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
        <section class="form__skd">
            <div class="form__skd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <thead>
                        <th class="table__big-title no__border" colspan="5" style="font-weight: normal;"> <u><b>SURAT KETERANGAN DISABILITAS</b></u> <br> NOMOR : <?=$skd->nomorskd;?>/MCU_RSUDKT/<?= date("Y"); ?>
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
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Tempat/Tanggal Lahir</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%">
                                <?= $skd->tempat_lahir . ' / ' . datefmysql($skd->tanggal_lahir); ?> 
                                (Umur: 
                                <?php 
                                    $birthDate = new DateTime($skd->tanggal_lahir);
                                    $today = new DateTime();
                                    $age = $today->diff($birthDate)->y;
                                    echo $age . ' tahun';
                                ?>)
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Jenis Kelamin</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Alamat</td>
                            <td class="no__border" width="1%">: </td>
                            <!-- <td class="no__border" width="40%"><!?= $skd->alamat; ?></td>   -->
                            <td style="vertical-align:top" class="no__border" width="40%">
                                <?= strtoupper($skd->alamat); ?>

                                <?php if ($skd->no_rumah != NULL ) : ?>
                                    NO. <?= strtoupper($skd->no_rumah); ?>            
                                <?php endif; ?>

                                RT. <?= strtoupper($skd->no_rt); ?>
                                / RW. <?= strtoupper($skd->no_rw); ?>, KEL. <?= strtoupper($skd->nama_kel); ?>, KEC. <?= strtoupper($skd->nama_kec); ?>, <?= strtoupper($skd->nama_kab); ?>, <?= strtoupper($skd->nama_prop); ?>
                            </td>

                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Ada Disabilitas </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->adadisabilitas == 1 ? '&#128505;' : '&#9633;'; ?> Ya &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->adadisabilitasq == 1 ? '&#128505;' : '&#9633;'; ?> Tidak</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">Lokasi Disabilitas</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->lokasiskd; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">1. Susunan saraf pusat Sebutkan </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->susunanskd; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">2. Organ Penginderaan Sebutkan </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->organskd; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">3. Extremitas atas </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->ektremitasataskanan == 1 ? '&#128505;' : '&#9633;'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->extremitasataskiri == 1 ? '&#128505;' : '&#9633;'; ?> Kiri &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->extremitasataskeduanya == 1 ? '&#128505;' : '&#9633;'; ?> Keduanya</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">4. Tangan dominan  </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->dominankanan == 1 ? '&#128505;' : '&#9633;'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->dominankiri == 1 ? '&#128505;' : '&#9633;'; ?> Kiri</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">5. Extremitas bawah  </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->ektremitasbawahkanan == 1 ? '&#128505;' : '&#9633;'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->extremitasbawahkiri == 1 ? '&#128505;' : '&#9633;'; ?> Kiri &nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->extremitasbawahkeduanya == 1 ? '&#128505;' : '&#9633;'; ?> Keduanya</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="23%">6. Lain - lain  </td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" width="40%"><?= $skd->lainskd; ?></td>
                        </tr>
                    </tbody>   
                </table>
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <b style="font-size: 12pt; display: flex; justify-content: center">ANAMNESIS</b>
                    </tr>
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Setelah melakukan pemeriksaan kesehatan dan kemampuan fungsional bahwa yang bersangkutan benar-benar sebagai penyandang Disabilitas berupa :</td>
                    </tr>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%">1. Riwayat Disabilitas </td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="40%">a. <?= $skd->sejakskd == 1 ? '&#128505;' : '&#9633;'; ?> Sejak lahir&nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->kecelakaanskd == 1 ? '&#128505;' : '&#9633;'; ?> Kecelakaan dalam Pekerjaan</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="40%">b. <?= $skd->kecelaskd == 1 ? '&#128505;' : '&#9633;'; ?> Kecelakaan lalu lintas&nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->strokeskd == 1 ? '&#128505;' : '&#9633;'; ?> Akibat Stroke &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->kustaskd == 1 ? '&#128505;' : '&#9633;'; ?> Akibat Kusta </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;<?= $skd->laenskd == 1 ? '&#128505;' : '&#9633;'; ?> Lain-lain, Sebutkan : <?= $skd->ptskd; ?>, pada tahun : <?= $skd->skdpt; ?> </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="40%">c. <?= $skd->sesudahskd == 1 ? '&#128505;' : '&#9633;'; ?> Sesudah sakit, pada tahun :  <?= $skd->thskd; ?></td>
                    </tr>

                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%">2. Kemampuan mengurus diri </td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="40%"><?= $skd->kemampuanskd == 1 ? '&#128505;' : '&#9633;'; ?> Mampu &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->tmskd == 1 ? '&#128505;' : '&#9633;'; ?> Tidak mampu</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="40%"><?= $skd->besarbisaskd == 1 ? '&#128505;' : '&#9633;'; ?> Sebagian besar bisa, jelaskan yang tidak bisa : <?= $skd->jelasskd; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="40%"><?= $skd->perluskd == 1 ? '&#128505;' : '&#9633;'; ?> Perlu bantuan penuh orang lain</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="19%">3. Bepergian keluar rumah </td>
                        <td class="no__border" width="1%">: </td>
                        <td class="no__border" width="40%"><?= $skd->bsaskb == 1 ? '&#128505;' : '&#9633;'; ?> Bisa sendiri  &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->anggotaskd == 1 ? '&#128505;' : '&#9633;'; ?> perlu diantar anggota keluarga</td>
                    </tr>                                      
                </table>
            </div>
        </section>
    </main>
    <br><br><br><br><br><br><br>

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
        <section class="form__skd">
            <div class="form__skd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <thead>
                        <th class="table__big-title no__border" colspan="5" style="font-weight: normal;"><b>HASIL PEMERIKSAAN</b></th>
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" width="100%">4. Jenis / Ragam Disabilitas </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp;a. Disabilitas Fisik </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Amputasi &nbsp;&nbsp;
                            <?= $skd->atanganskd == 1 ? '&#128505;' : '&#9633;'; ?> Tangan &nbsp;&nbsp;<?= $skd->akakiskd == 1 ? '&#128505;' : '&#9633;'; ?> Kaki*   &nbsp;&nbsp;(<?= 
                            $skd->tangankakiskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Kelemahan bagian atas anggota gerak atas dan bawah &nbsp;&nbsp;(<?= $skd->akelemahanskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Paraplegi (anggota tubuh bagian bawah yang meliputi kedua tungkai dan organ panggul)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?= $skd->aparaplegiskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Celebral Palsy (CP) &nbsp;&nbsp;(<?= $skd->acelebral; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp;b. Disabilitas Sensorik </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Netra <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Buta Total  &nbsp;&nbsp;(<?=  $skd->anetralskd; ?>) 
                            
                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Persepsi Cahaya / Low Vision (<?=  $skd->bnetralskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Rungu &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->brunguskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Wicara &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->bwicaraskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp;c. Disabilitas Intelektual </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Disabilitas Grahita &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->cgrahitaskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Disabilitas Syndrom &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->csyndromskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp;d. Disabilitas Mental </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Psikososial (Skizofenia, Bipolar, Anxietas, dan Gangguan Kepribadian)* &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->dmentallskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Disabilitas Perkembangan (Autis / Hiperaktif)* &nbsp;&nbsp;&nbsp;&nbsp;(<?=  $skd->dperkembanganskd; ?>)</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">5. Derajat Disabilitas Fisik </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd1 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 1 : mampu melaksanakan aktifitas atau mempertahankan sikap dengan kesulitan.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd2 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 2 : mampu melaksanakan kegiatan atau mempertahankan sikap dengan bantuan alat <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; bantu.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd3 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 3 : mapu melaksanakan aktifitas sebagian memerlukan bantuan orang lain, dengan atau <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tanpa alat bantu.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd4 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 4 : dalam melaksanakan aktifitas , tergantung penuh terhadap pengawasan orang lain.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd5 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 5 : tidak mampu melakukan aktifitas tanpa bantuan penuh orang lain dan tersedianya <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; lingkungan khusus.</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%"> &nbsp;&nbsp;&nbsp;&nbsp; <?= $skd->derajatskd6 == 1 ? '&#128505;' : '&#9633;'; ?> Derajat 6 : tidak mampu penuh melaksanakan kegiatan sehari hari meskipun dibantu penuh orang <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; lain.</td>
                        </tr>
                    </tbody>   
                </table>
            </div>
        </section>
    </main>
    <br><br><br><br><br><br><br>

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
        <section class="form__skd">
            <div class="form__skd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tbody>                    
                        <tr>
                            <td class="no__border" width="100%">6. Kemampuan Mobilitas</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->amjalanskd == 1 ? '&#128505;' : '&#9633;'; ?> Jalan
                             &nbsp;&nbsp;<?= $skd->amperlahanskd == 1 ? '&#128505;' : '&#9633;'; ?> jalan perlahan
                             &nbsp;&nbsp;<?= $skd->amalatskd == 1 ? '&#128505;' : '&#9633;'; ?> jalan dengan alat bantu
                             &nbsp;&nbsp;<?= $skd->ammampuskd == 1 ? '&#128505;' : '&#9633;'; ?> tidak mampu jalan
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; b. &nbsp;&nbsp;<?= $skd->bnaikskd == 1 ? '&#128505;' : '&#9633;'; ?> Naik tangga
                             &nbsp;&nbsp;<?= $skd->btanggaskd == 1 ? '&#128505;' : '&#9633;'; ?> naik tangga perlahan
                             &nbsp;&nbsp;<?= $skd->bnaeikskd == 1 ? '&#128505;' : '&#9633;'; ?> tidak mampu naik tangga
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">7. Gangguan Extremitas atas</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->aextrimskd1 == 1 ? '&#128505;' : '&#9633;'; ?> Kanan
                             &nbsp;&nbsp;<?= $skd->aextrimskd2 == 1 ? '&#128505;' : '&#9633;'; ?> Kekuatan
                             &nbsp;&nbsp;<?= $skd->aextrimskd3 == 1 ? '&#128505;' : '&#9633;'; ?> 5
                             &nbsp;&nbsp;<?= $skd->aextrimskd4 == 1 ? '&#128505;' : '&#9633;'; ?> 4
                             &nbsp;&nbsp;<?= $skd->aextrimskd5 == 1 ? '&#128505;' : '&#9633;'; ?> 3
                             &nbsp;&nbsp;<?= $skd->aextrimskd6 == 1 ? '&#128505;' : '&#9633;'; ?> 2
                             &nbsp;&nbsp;<?= $skd->aextrimskd7 == 1 ? '&#128505;' : '&#9633;'; ?> 1
                             &nbsp;&nbsp;<?= $skd->aextrimskd8 == 1 ? '&#128505;' : '&#9633;'; ?> 0
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->bextrimskd1 == 1 ? '&#128505;' : '&#9633;'; ?> Kiri
                             &nbsp;&nbsp;<?= $skd->bextrimskd2 == 1 ? '&#128505;' : '&#9633;'; ?> Kekuatan
                             &nbsp;&nbsp;<?= $skd->bextrimskd3 == 1 ? '&#128505;' : '&#9633;'; ?> 5
                             &nbsp;&nbsp;<?= $skd->bextrimskd4 == 1 ? '&#128505;' : '&#9633;'; ?> 4
                             &nbsp;&nbsp;<?= $skd->bextrimskd5 == 1 ? '&#128505;' : '&#9633;'; ?> 3
                             &nbsp;&nbsp;<?= $skd->bextrimskd6 == 1 ? '&#128505;' : '&#9633;'; ?> 2
                             &nbsp;&nbsp;<?= $skd->bextrimskd7 == 1 ? '&#128505;' : '&#9633;'; ?> 1
                             &nbsp;&nbsp;<?= $skd->bextrimskd8 == 1 ? '&#128505;' : '&#9633;'; ?> 0
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">8. Alat Bantu yang di gunakan</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->gunakanskd == 1 ? '&#128505;' : '&#9633;'; ?> Tidak
                             &nbsp;&nbsp;<?= $skd->skdada == 1 ? '&#128505;' : '&#9633;'; ?> Ada, Sebutkan :
                             &nbsp;&nbsp;(<?= $skd->skdsebutkan; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">9. Penyakit lain</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->tidakkakd == 1 ? '&#128505;' : '&#9633;'; ?> Tidak
                             &nbsp;&nbsp;<?= $skd->adaaskd == 1 ? '&#128505;' : '&#9633;'; ?> Ada, Sebutkan :
                             &nbsp;&nbsp;(<?= $skd->sebuttkannskd; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">10. Pengobatan</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="100%">&nbsp;&nbsp;&nbsp;&nbsp; a. &nbsp;&nbsp;<?= $skd->tidakpskd == 1 ? '&#128505;' : '&#9633;'; ?> Tidak
                             &nbsp;&nbsp;<?= $skd->adapskd == 1 ? '&#128505;' : '&#9633;'; ?> Ada, Sebutkan :
                             &nbsp;&nbsp;(<?= $skd->sebutkanpskd; ?>)
                            </td>
                        </tr>
                    </tbody>   
                </table>
                <!-- <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" > <b>Catatan tambahan lainnya :</b> <br>
                            <b><!?= $skd->catatan_tambahan_skd; ?></b>  Surat keterangan ini digunakan untuk keperluan 	: <b><!?= $skd->keterangan; ?></b> 
                        </td>
                    </tr>
                </table> -->
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" > <b>Catatan tambahan lainnya :</b> <br>
                            Dengan surat ini kami menyatakan bahwa yang bersangkutan dengan kondisi disabilitasnya mengalami hambatan dan kesulitan untuk berpartisipasi secara penuh dan efektif. Surat keterangan ini digunakan untuk keperluan 	: <b><?= $skd->keterangan; ?></b> 
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $skd->tanggalskd;
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
                            <!?php if($skd->consentid): ?>
                                <img src="<!?= resource_url().'images/ttd_dokter/'.$skd->consentid; ?>" alt="consentid" width="175">
                            <!?php else: ?>
                                <br><br><br>
                            <!?php endif ?>
                            <br><br><br><b><u>( <!?= $skd->nama_dokter;?> )</u> <br> NIP/NRTKK.<!?= $skd->nip_dokter;?>  </font> 
                        </td> -->

                        <td class="no__border" align="center">
                            <br><br><br><br>
                            <b><u>( <?= $skd->nama_dokter; ?> )</u></b> <br>
                            <?php if ($skd->nip_sip_skd == 'NIP'): ?>
                                NIP/NRTKK. <?= !empty($skd->nip_dokter) ? $skd->nip_dokter : '-'; ?>
                            <?php elseif ($skd->nip_sip_skd == 'SIP'): ?>
                                SIP. <?= !empty($skd->sip_dokter) ? $skd->sip_dokter : '-'; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>


                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                <br>   
            </div>
            <p class="page__number">FORM-MCU-27-00</p>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
        </section>
    </main>
</body>
<?php die; ?>


















