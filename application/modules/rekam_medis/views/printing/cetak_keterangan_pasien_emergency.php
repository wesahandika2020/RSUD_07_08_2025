<!-- // KPEGD PERBAIKAN -->
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
            <div class="header__container-identity border section">
                <div class="identity__section grid">
                    <div class="identity__section-title">
                        <p class="identity">Nama Lengkap</p>
                        <p class="identity">No. Rekam Medik</p>
                        <p class="identity">Tanggal Lahir</p>
                        <p class="identity">Jenis Kelamin</p>
                    </div>
                    <div class="identity__section-subtitle">
                        <p class="identity">: <b><?= $pasien_tindakan->nama; ?></b></p>
						<p class="identity">: <b><?= $pasien_tindakan->no_rm; ?></b></p>
						<p class="identity">: <b><?= datefmysql($pasien_tindakan->tanggal_lahir); ?></b></p>
						<p class="identity">: <b><?= $pasien_tindakan->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></b></p>
                    </div>
                </div>
            </div>
        </div>
	</header>
	<!--=============== MAIN ===============-->

    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <br>
                <br>
                <tr>
                    <b style="font-size: 15pt; display: flex; justify-content: center">KETERANGAN PASIEN EMERGENCY / GAWAT DARURAT</b>
                </tr>
                <table class="no__border small__line__spacing small__font center" style="font-size: 12px; margin: auto; text-align: center;">
                    <tr>
                        <td class="center no__border" width="33%">
                            <b style="font-size: 22px;">
                                <?= $kpegd->bpjskpegd == 1 ? '<span style="font-size: 22px;">&#128505;</span>' : '<span style="font-size: 27px;">&#9633;</span>'; ?>
                                <span style="font-size: 18px;">BPJS</span>
                            </b>
                        </td>
                        <td class="center no__border" width="33%">
                            <b style="font-size: 22px;">
                                <?= $kpegd->umumkpegd == 1 ? '<span style="font-size: 22px;">&#128505;</span>' : '<span style="font-size: 27px;">&#9633;</span>'; ?>
                                <span style="font-size: 18px;">UMUM</span>
                            </b>
                        </td>
                        <td class="center no__border" width="33%">
                            <b style="font-size: 22px;">
                                <?= $kpegd->lainkpegd == 1 ? '<span style="font-size: 22px;">&#128505;</span>' : '<span style="font-size: 27px;">&#9633;</span>'; ?>
                                <span style="font-size: 18px;">LAIN-LAIN</span>
                            </b>
                        </td>                      
                    </tr>
                </table>

                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">   
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="15%">Nama Pasien</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien_tindakan->nama; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="15%">Dokter Triase</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $kpegd->nama_dokter; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="15%">Diagnosa Masuk</i></td>
                        <td class="no__border" width="1%">:</td>

                        <!-- PAKAI YANG INI JIKA HANYA UNTUK MENGELUARKAN DIAGNOSA UTAMA -->
                        <?php
                            $namaDiagnosa = '-'; // default kosong
                            if (!empty($diagnosa_utama)) {
                                $namaDiagnosa = $diagnosa_utama[0]->nama;
                            } elseif (!empty($ds_manual_utama)) {
                                $namaDiagnosa = $ds_manual_utama[0]->nama;
                            } elseif (!empty($diagnosa_sekunder)) {
                                $namaDiagnosa = $diagnosa_sekunder[0]->nama;
                            } elseif (!empty($ds_manual_sekunder)) {
                                $namaDiagnosa = $ds_manual_sekunder[0]->nama;
                            }
                        ?>
                        <td class="no__border" width="60%"><?= $namaDiagnosa; ?></td>



                        <!-- PAKAI YANG INI JIKA HANYA UNTUK SEMUA DIAGNOSA -->
                        <!-- <!?php
                            $daftarDiagnosa = [];

                            // Tambahkan diagnosa utama kalau ada
                            if (!empty($diagnosa_utama)) {
                                foreach ($diagnosa_utama as $d) {
                                    $daftarDiagnosa[] = $d->nama;
                                }
                            }

                            // Tambahkan ds_manual_utama kalau ada
                            if (!empty($ds_manual_utama)) {
                                foreach ($ds_manual_utama as $d) {
                                    $daftarDiagnosa[] = $d->nama;
                                }
                            }

                            // Tambahkan diagnosa sekunder kalau ada
                            if (!empty($diagnosa_sekunder)) {
                                foreach ($diagnosa_sekunder as $d) {
                                    $daftarDiagnosa[] = $d->nama;
                                }
                            }

                            // Tambahkan ds_manual_sekunder kalau ada
                            if (!empty($ds_manual_sekunder)) {
                                foreach ($ds_manual_sekunder as $d) {
                                    $daftarDiagnosa[] = $d->nama;
                                }
                            }
                        ?>

                        <!?php if (!empty($daftarDiagnosa)) : ?>
                            <td class="no__border" width="60%">
                                <ul style="padding-left: 1rem; margin: 0;">
                                    <!?php foreach ($daftarDiagnosa as $i => $nama) : ?>
                                        <li><!?= $nama; ?><!?= $i == 0 ? ' <strong>(Utama)</strong>' : ''; ?></li>
                                    <!?php endforeach; ?>
                                </ul>
                            </td>
                        <!?php else : ?>
                            <td class="no__border" width="60%">-</td>
                        <!?php endif; ?> -->






                        <!-- // view tetap yang ini ya, tidak perlu diubah lagi: PAKAI INI AJAH UNTUK MENGELUARKAN Semua Diagnosa -->
                        <!-- <!?php
                            $daftarDiagnosa = [];

                            // Diagnosa utama (paling atas)
                            if (!empty($diagnosa_utama)) {
                                foreach ($diagnosa_utama as $d) {
                                    $daftarDiagnosa[] = ['nama' => $d->nama, 'jenis' => 'utama'];
                                }
                            }

                            // Diagnosa manual utama
                            if (!empty($ds_manual_utama)) {
                                foreach ($ds_manual_utama as $d) {
                                    $daftarDiagnosa[] = ['nama' => $d->nama, 'jenis' => 'manual_utama'];
                                }
                            }

                            // Diagnosa sekunder
                            if (!empty($diagnosa_sekunder)) {
                                foreach ($diagnosa_sekunder as $d) {
                                    $daftarDiagnosa[] = ['nama' => $d->nama, 'jenis' => 'sekunder'];
                                }
                            }

                            // Diagnosa manual sekunder
                            if (!empty($ds_manual_sekunder)) {
                                foreach ($ds_manual_sekunder as $d) {
                                    $daftarDiagnosa[] = ['nama' => $d->nama, 'jenis' => 'manual_sekunder'];
                                }
                            }
                        ?>

                        <!?php if (!empty($daftarDiagnosa)) : ?>
                            <td class="no__border" width="60%">
                                <ul style="padding-left: 1rem; margin: 0;">
                                    <!?php foreach ($daftarDiagnosa as $index => $item) : ?>
                                        <li>
                                            <!?= $item['nama']; ?>
                                            <!?php if ($item['jenis'] === 'utama' && $index === 0): ?>
                                                <strong>(Diagnosa Utama / Prioritas)</strong>
                                            <!?php elseif ($item['jenis'] === 'manual_utama'): ?>
                                                <em>(Manual Utama)</em>
                                            <!?php elseif ($item['jenis'] === 'sekunder'): ?>
                                                <em>(Sekunder)</em>
                                            <!?php elseif ($item['jenis'] === 'manual_sekunder'): ?>
                                                <em>(Manual Sekunder)</em>
                                            <!?php endif; ?>
                                        </li>
                                    <!?php endforeach; ?>
                                </ul>
                            </td>
                        <!?php else : ?>
                            <td class="no__border" width="60%">-</td>
                        <!?php endif; ?> -->

                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="15%">Kegawatdaruratan</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"> <?= $kpegd->gawatdaruratkpegd == 1 ? '&#128505;' : '&#9633;'; ?> Gawat Darurat   &nbsp;&nbsp;&nbsp;&nbsp;  <?= $kpegd->tgawatdaruratkpegd == 1 ? '&#128505;' : '&#9633;'; ?> Tidak Gawat Darurat </td>
                    </tr>

                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Dengan ini menjelaskan sesuai dengan ketentuan KEPMENKES RI No. 856/MENKES/SK/IX/2009 dan Perpres Nomor 12 tahun 2013 pasal 25 huruf b, bahwa pasien yang tidak masuk kategori emergency / tidak gawat darurat, tidak ditanggung oleh BPJS dan LAIN-LAIN.
                            </td>
                        </tr>
                    </table>

                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Maka berdasarkan ketentuan diatas, pasien di kategorikan sebagai Pasien Umum / Berbayar dan tidak akan menuntut kepada pihak manapun.
                            </td>
                        </tr>
                    </table>

                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%"><b>Pasien Asal Masuk</b></td>
                            <td class="no__border" width="1%">:</td> 
                            <td class="no__border" width="60%"> <?= $kpegd->datangsendirikpegd == 1 ? '&#128505;' : '&#9633;'; ?> Datang Sendiri   &nbsp;&nbsp;&nbsp;&nbsp;  <?= $kpegd->klinikkpegd == 1 ? '&#128505;' : '&#9633;'; ?> Klinik &nbsp;&nbsp;&nbsp;&nbsp;  <?= $kpegd->puskesmaskpegd == 1 ? '&#128505;' : '&#9633;'; ?> Puskesmas </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="15%"><b></b></td>
                            <td class="no__border" width="1%"></td> &nbsp;&nbsp;&nbsp;&nbsp;
                            <td class="no__border" width="60%"> <?= $kpegd->rslainkpegd == 1 ? '&#128505;' : '&#9633;'; ?> RS Lain  &nbsp;&nbsp;&nbsp;&nbsp;  <?= $kpegd->danlainkpegd == 1 ? '&#128505;' : '&#9633;'; ?> Dan Lain-Lain &nbsp;&nbsp; : <?= $kpegd->danlainlainkpegd; ?> </td>
                        </tr>
                    </table>
                </table>
                <br><br><br><br><br><br>

                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $kpegd->tanggalkpegd;
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
                            Dokter yang memeriksa,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border" align="center"> 
                        </td>
                        <td class="no__border"  align="center">
                            <br>
                            <?php if($layanan[0]->ttd_dokter): ?>
                                <img src="<?= resource_url().'images/ttd_dokter/'.$layanan[0]->ttd_dokter; ?>" alt="ttd-dokter" width="250">
                            <?php else: ?>
                                <br><br><br>
                            <?php endif ?>
                            <br><u>( <?=$kpegd->nama_dokter; ?> )</u> <br> Nama Jelas & TTD</font>
                        </td>
                    </tr>
                </table>

                <br><br><br>
                <p class="page__number">FORM-KEP-28-02</p>
                <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
            </div>
        </section>
    </main>
    </body>
<?php die; ?>