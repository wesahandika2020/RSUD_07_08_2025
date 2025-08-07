<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
    .laporan-operasi{
        font-size: 10pt ;
    }
</style>

<body onload="window.print()">
<!-- <body> -->
	<!--=============== HEADER ===============-->
	<header class="header" id="header">
		<div class="header__container2 container">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
			<div>
				<h1 class="header__title">RSUD KOTA TANGERANG</h1>
				<p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
					Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
			</div>
            <!-- <div class="header__container-identity border section">
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
            </div> -->
		</div>
	</header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="form__sk__sehat laporan-operasi">
            <div class="form__sk__sehat__container container">
                <br>
                <table width="100%" class="no__border" style="color:#000; border-top: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border"><h3>RESEP KACAMATA</h3></th>
                        </tr>                                                              
                        <tr>
                            <th class="table__little-title no__border">Monofocus / Bifocus</th>
                        </tr>                                                              
                    </thead>
                    <tbody>
                        <tr>
                        <td class="no__border" style="text-align: center;"><img src="<?= resource_url() ?>images/attributes/resep kacamata putih (1).png" width="300"></td>
                        </tr>
                        <tr>
                            <td class="no__border">
                                <table>
                                    <tr style="text-align: center;">
                                        <td><small></small></td>
                                        <td><small>Spher</small></td>
                                        <td><small>Cyl</small></td>
                                        <td><small>Axis</small></td>
                                        <td><small>Prism</small></td>
                                        <td><small>Bas</small></td>
                                        <td><small>Spher</small></td>
                                        <td><small>Cyl</small></td>
                                        <td><small>Axis</small></td>
                                        <td><small>Prism</small></td>
                                        <td><small>Bas</small></td>
                                        <td><small>Jarak Pupil</small></td>
                                    </tr>
                                    <tr>
                                        <td><small>Jauh</small></td>
                                        <td><small><?= $rkm->rkm_kiri_jauh_Spher ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_jauh_cyl ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_jauh_axis ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_jauh_prism ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_jauh_bas ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_jauh_Spher ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_jauh_cyl ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_jauh_axis ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_jauh_prism ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_jauh_bas ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_jauh_pupil ?? '-' ?></small></td>
                                    </tr>
                                    <tr>
                                        <td><small>Dekat</small></td>
                                        <td><small><?= $rkm->rkm_kiri_dekat_Spher ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_dekat_cyl ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_dekat_axis ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_dekat_prism ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kiri_dekat_bas ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_dekat_Spher ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_dekat_cyl ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_dekat_axis ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_dekat_prism ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_kanan_dekat_bas ?? '-' ?></small></td>
                                        <td><small><?= $rkm->rkm_dekat_pupil ?? '-' ?></small></td>
                                    </tr>
                                </table>
                            </td>
                            <tr>
                                <td class="no__border">
                                    <table class="no__border">
                                        <tr>
                                            <td class="no__border"  width="10%"><small>Nama</small></td>
                                            <td class="no__border"><small>: <?= $pasien->nama; ?></small></td>
                                        </tr>
                                        <tr>
                                            <td class="no__border" width="10%"><small>Umur</small></td>
                                            <td class="no__border"><small>: <?php echo hitungUmurDetail($pasien->tanggal_lahir); ?></small></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="no__border" width="10%" style="vertical-align: top;"><small>Alamat</small></td>
                                            <td class="no__border" style="vertical-align: top;"><small>: <?= $pasien->alamat; ?></small></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="no__border">
                                    <table class="no__border">
                                        <tr>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="30%" class="no__border" style="text-align: center;"><small>Tangerang, <?= $rkm->rkm_tanggal; ?></small></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border" style="text-align: center;"><small>Dokter</small>
                                        </td>
                                        <?php if($rkm->tanda_tangan): ?>
                                        <tr align="center">
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border">
                                                <img src="<?= resource_url().'images/ttd_dokter/'.$rkm->tanda_tangan ?>" alt="ttd-dokter" width="300">
                                            </td>
                                        </tr>
                                        <?php endif ?>
                                        <tr>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="25%" class="no__border"><small></small></td>
                                            <td width="30%" class="no__border" style="text-align: center;"><small><?= $rkm->nama_dokter; ?></small></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
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





    <!-- <main class="main">
        <section class="form__sk__sehat laporan-operasi">
			<br>
            <div class="form__sk__sehat__container container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border">LAPORAN TINDAKAN</th>
                        </tr>                                                              
                    </thead>              
                </table>
                <br>
                <table>
                    <tr>
                        <td class="no__border" width="30%"><small>Nama Tindakan</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_nama_tindakan ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%"><small>Diagnosa Sebelum Tindakan</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_diagnosa_sebelum ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%"><small>Diagnosa Sesudah Tindakan</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_diagnosa_sesudah ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%"><small>Pemeriksaan PA</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_pa ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%"><small>Komplikasi</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_komplikasi ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%"><small>Pendarahan</small></td>
                        <td class="no__border"><small>: <?= $lt->lt_pendarahan ?? '-' ?></small></td>
                    </tr>

                </table>
                <table>
                    <tr>
                        <td width="25%" style="text-align:center">
                            <small>Tanggal <br><?= $lt->lt_tanggal ? datefmysql($lt->lt_tanggal) : '-' ?></small>
                        </td>
                        <td width="25%" style="text-align:center">
                            <small>Jam Mulai <br><?= $lt->lt_waktu_mulai ? date('H:i', strtotime($lt->lt_waktu_mulai)) : '-' ?></small>
                        </td>
                        <td width="25%" style="text-align:center">
                            <small>Jam Selesai <br><?= $lt->lt_waktu_selesai ? date('H:i', strtotime($lt->lt_waktu_selesai)) : '-' ?></small>
                        </td>
                        <td width="25%" style="text-align:center">
                            <small>Lamanya Tindakan <br><?= $lt->lt_lama_waktu ?? '-' ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px" class="no__border" colspan="4"><small><b>LAPORAN TINDAKAN</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><small><?= $lt->lt_laporan_tindakan ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td width="33%" style="text-align:center"><small>Dokter Spesialis</small></td>
                        <td width="33%" style="text-align:center"><small>Bidan</small></td>
                        <td width="33%" style="text-align:center"><small>Perawat</small></td>
                    </tr>
                    <tr>
                        <td style="text-align:center"><small>
                            <?php if($lt->ttd_dokter) : ?>
                                <img src="<?= base_url('resources/images/ttd_dokter/') . $lt->ttd_dokter ?>" alt="ttd-dokter-operator" width="300">
                            <?php else : ?>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            <?php endif; ?>
                            <?= $lt->nama_dokter ?? '' ?>
                            <?php if(!empty($lt->sip_dokter)): ?>
                                SIP. <?= $lt->sip_dokter ?>
                            <?php endif; ?>
                            </small>
                        </td>
                        <td style="text-align:center"><small>
                            <?php if($lt->ttd_bidan) : ?>
                                <img src="<?= base_url('resources/images/ttd_dokter/') . $lt->ttd_bidan ?>" alt="ttd-dokter-operator" width="300">
                            <?php else : ?>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            <?php endif; ?>
                            <?= $lt->nama_bidan ?? '' ?>
                            <?php if(!empty($lt->sip_bidan)): ?>
                                SIP. <?= $lt->sip_bidan ?>
                            <?php endif; ?>
                            </small>
                        </td>
                        <td style="text-align:center"><small>
                            <?php if($lt->ttd_perawat) : ?>
                                <img src="<?= base_url('resources/images/ttd_dokter/') . $lt->ttd_perawat ?>" alt="ttd-dokter-operator" width="300">
                            <?php else : ?>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            <?php endif; ?>
                            <?= $lt->nama_perawat ?? '' ?>
                            <?php if(!empty($lt->sip_perawat)): ?>
                                SIP. <?= $lt->sip_perawat ?>
                            <?php endif; ?>
                            </small>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <br>    
            <br>
        </section>      
    </main> -->

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-PMD-19-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
