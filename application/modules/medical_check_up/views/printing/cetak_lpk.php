<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- // SKKJ3 -->
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>
<!-- onload ada di dalam body -->
<!-- onload="window.print()" -->

<body onload="window.print()">
    <!--=============== HEADER ===============-->
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

    <!--=============== MAIN ===============-->
    <main class="main" style="margin: 1rem;">
        <section class="form__skkj_3">
            <div class="form__skkj_3__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;" >
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">LAPORAN PEMERIKSAAN KESEHATAN</th>
                        </tr>                                        
                    </thead> 
                    <tbody>                    
                        <tr>
                            <td class="no__border" colspan="4" ><br>RIWAYAT KESEHATAN</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4"></td>   
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Nama</td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" ><?= $pasien->nama; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Tempat dan tanggal Lahir</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" ><?= $pasien->tempat_lahir; ?>, <?= datefmysql($pasien->tanggal_lahir); ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">Jenis Kelamin</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" ><?= $pasien->kelamin; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="30%">Umur</td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" ><?php echo hitungUmurDetail($pasien->tanggal_lahir); ?></td>
                        </tr>                         
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td style="vertical-align:top" class="no__border" width="30%">Alamat</td>
                            <td style="vertical-align:top" class="no__border" width="1%">: </td>
                            <td style="vertical-align:top" class="no__border" ><?= $pasien->alamat; ?> NO <?= $pasien->no_rumah; ?> RT<?= $pasien->no_rt; ?>/RW<?= $pasien->no_rw; ?>, KEC.<?= $pasien->kecamatan; ?>, KEL.<?= $pasien->kelurahan; ?>, <?= $pasien->kabupaten; ?>, <?= $pasien->provinsi; ?></td>
                        </tr> 
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="30%">No Telp</i></td>
                            <td class="no__border" width="1%">: </td>
                            <td class="no__border" ><?= $pasien->telp; ?></td>
                        </tr>                        
                    </tbody>
                </table>
                <br>
                <br>
                <table class="small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <th>I</th>
                        <th style="text-align: left;">RIWAYAT KESEHATAN PRIBADI</th>
                        <th>YA</th>
                        <th>TIDAK</th>
                        <th>KETERANGAN</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah dirawat di rumah sakit ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_dirawat == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_dirawat == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_dirawat_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah kecelakaan ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_kecelakaan == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_kecelakaan == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_kecelakaan_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah batuk darah / batuk berdarah ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_batuk == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_batuk == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_batuk_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit dada ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_dada == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_dada == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_dada_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit kuning ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_kuning == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_kuning == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_kuning_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah pingsan mendadak ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_pingsan == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_pingsan == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_pingsan_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah kejang-kejang ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_kejang == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_kejang == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_kejang_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah muntah darah ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_muntah == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_muntah == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_muntah_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit ulu hati ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_hati == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_hati == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_hati_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit kencing batu ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_batu == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_batu == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_batu_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit kencing nanah ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_nanah == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_nanah == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_nanah_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah punya riwayat ambien ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_ambien == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_ambien == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_ambien_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah buang air besar Anda berdarah ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_buang == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_buang == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_buang_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda kecanduan narkotik ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_narkotik == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_narkotik == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_narkotik_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah kencing darah ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_darah == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_darah == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_darah_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah sakit jantung ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_jantung == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_jantung == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_jantung_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah terserang asma ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_asma == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_asma == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_asma_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Anda pernah terserang malaria ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_malaria == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_malaria == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_malaria_ket; ?></td>
                    </tr>
                    <tr>
                        <th>II</th>
                        <th style="text-align: left;">RIWAYAT KESEHATAN KELUARGA</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah di keluarga Anda ada yang menderita kelainan jiwa ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_jiwa == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_jiwa == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_jiwa_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Bapak/Ibu Anda penderita kencing manis ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_manis == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_manis == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_manis_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Bapak/Ibu Anda penderita hipertensi ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_hipertensi == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_hipertensi == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_hipertensi_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Bapak/Ibu Anda penderita penyakit jantung ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_penyakit == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_penyakit == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_penyakit_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Bapak/Ibu Anda penderita stroke ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_stroke == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_stroke == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_stroke_ket; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Apakah Saudara Anda ada yang cacat bawaan ?</td>
                        <td style="text-align: center;"><?= $lpk->lpk_cacat == '1' ? '✓' : ''; ?></td>
                        <td style="text-align: center;"><?= $lpk->lpk_cacat == '0' ? '✓' : ''; ?></td>
                        <td><?= $lpk->lpk_cacat_ket; ?></td>
                    </tr>
                </table>
                <br>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px; text-align: center;">
                    <tbody>                    
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border" >Tanggal, <?= datefmysql($lpk->lpk_tanggal); ?></td>
                        </tr>                     
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border" >Dokter Pemeriksa,</td>
                        </tr>   
                        <tr>
                            <td class="no__border">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>                  
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border"><u><?= $lpk->nama_dokter; ?></u></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border" >NIP.<?= $lpk->nip; ?></td>
                        </tr>                     
                    </tbody>
                </table>       
            </div>
        </section>
    </main>

    <?php
        // Fungsi untuk menghitung umur dengan detail
        function hitungUmurDetail($tanggal_lahir) {
            $tanggal_hari_ini = new DateTime('now');
            $tanggal_lahir = new DateTime($tanggal_lahir);

            // Menghitung perbedaan tanggal
            $diff = $tanggal_hari_ini->diff($tanggal_lahir);

            // Mengambil tahun, bulan, dan hari dari perbedaan tanggal
            $tahun = $diff->y;
            $bulan = $diff->m;
            $hari = $diff->d;

            // Membuat string umur dengan detail
            $umur_detail = '';

            if ($tahun > 0) {
                $umur_detail .= $tahun . ' Tahun';
            }

            if ($bulan > 0) {
                $umur_detail .= ($umur_detail ? ' ' : '') . $bulan . ' Bulan';
            }

            if ($hari > 0) {
                $umur_detail .= ($umur_detail ? ' ' : '') . $hari . ' Hari';
            }

            return $umur_detail;
        }
    ?>

    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-MCU-18-00</p>
        </div>
    </footer>
</body>
<?php die; ?>