<!-- // PPPDJ -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>

<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 1px solid #000;">     
                <thead>
                    <tr>
                        <td class="no__border" width="15%" style="width:75px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="75px" height="75px"></td>
                        <td class="no__border" width="45%">
                            <b style="font-size: 13pt;">RSUD KOTA TANGERANG</b>
                            <br><span style="font-size: 8pt;">JI. Pulau Putri Raya Perumahan Modernland</span>
                            <br><span style="font-size: 8pt;">Kelurahan Kelapa Indah Kecamatan Tangerang</span>
                            <br><span style="font-size: 8pt;">Telp.: 021 2972 0201 - 021 2972 0202</span>
                        </td>
                        <td class="no__border" width="35%">
                            <!-- <b style="font-size: 13pt;">RSUD KOTA TANGERANG</b>
                            <br><span style="font-size: 8pt;">JI. Pulau Putri Raya Perumahan Modernland</span>
                            <br><span style="font-size: 8pt;">Kelurahan Kelapa Indah Kecamatan Tangerang</span>
                            <br><span style="font-size: 8pt;">Telp.: 021 2972 0201 - 021 2972 0202</span> -->
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>
    <br>
    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <tr>
                    <b style="font-size: 12pt; display: flex; justify-content: center">FORMULIR PERMINTAAN PEMERIKSAAN <br> &nbsp;&nbsp; PENUNJANG DIAGNOSTIK JANTUNG</b>
                </tr>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Bersama ini kami mohon dapat dilakukan pemeriksaan/tes:</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="60%">
                            <input type="checkbox" class="checkbox-custom" <?= $pppdj->ekg_pppdj == 1 ? 'checked' : ''; ?>> EKG standar 12 lead
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="60%">
                            <input type="checkbox" class="checkbox-custom" <?= $pppdj->ekokardiorafi_pppdj == 1 ? 'checked' : ''; ?>> Ekokardiografi
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="60%">
                            <input type="checkbox" class="checkbox-custom" <?= $pppdj->carotis_pppdj == 1 ? 'checked' : ''; ?>> Carotis Vetebralis Duplex Sonography
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="1%"></td>
                        <td class="no__border" width="60%">
                            <input type="checkbox" class="checkbox-custom" <?= $pppdj->tradmil_pppdj == 1 ? 'checked' : ''; ?>> Treadmill: Metode: Bruce / Modifikasi / Lain-lain  <b><?= $pppdj->lain_pppdj;?></b> 
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Terhadap Pasien/ Klien, </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">1. Nama</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien_tindakan->nama;?></td>
                    </tr>

                    <?php
                    date_default_timezone_set('Asia/Jakarta'); // Biar konsisten sama waktu lokal

                    function hitung_usia_lengkap_pasien($tgl_lahir_pasien) {
                        if (!$tgl_lahir_pasien) return '';

                        // Parsing format tanggal lahir
                        $lahir = DateTime::createFromFormat('d/m/Y', $tgl_lahir_pasien);
                        if (!$lahir) {
                            $lahir = DateTime::createFromFormat('Y-m-d', $tgl_lahir_pasien);
                        }

                        if (!$lahir) return '';

                        $today = new DateTime();

                        // Hitung tahun, bulan, dan hari manual
                        $years  = $today->format('Y') - $lahir->format('Y');
                        $months = $today->format('m') - $lahir->format('m');
                        $days   = $today->format('d') - $lahir->format('d');

                        if ($days < 0) {
                            $months--;
                            // Ambil jumlah hari di bulan sebelumnya
                            $prevMonth = (clone $today)->modify('first day of this month')->modify('-1 day');
                            $days += (int)$prevMonth->format('d');
                        }

                        if ($months < 0) {
                            $years--;
                            $months += 12;
                        }

                        return "{$years} tahun {$months} bulan {$days} hari";
                    }

                    $usia_pasien = '';
                        if (!empty($pppdj->usiapasien_pppdj)) {
                            $usia_pasien = $pppdj->usiapasien_pppdj;
                        } elseif (!empty($pasien_tindakan->tanggal_lahir)) {
                            $usia_pasien = hitung_usia_lengkap_pasien($pasien_tindakan->tanggal_lahir);
                        }
                    ?>
                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">2. Usia</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $usia_pasien; ?></td>
                    </tr>

                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">3. Jenis Kelamin</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= ($pasien_tindakan->kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">4. No.RM</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien_tindakan->no_rm;?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">5. Ruang</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pppdj->bangsal ?? '-'; ?></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="2%"></td>
                        <td class="no__border" width="15%">6. Diagnosa Kerja</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pppdj->diagnosa_pppdj ?? '-'; ?></td>
                    </tr>
                </table>
                <br> <br><br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                                $tanggal_mysql = $pppdj->tanggal_pppdj; // Perbaiki akses properti

                                if (!empty($tanggal_mysql)) {
                                    setlocale(LC_TIME, 'id_ID.UTF-8'); // Pastikan locale diatur (jika server mendukung)
                                    $tanggal_diinginkan = date("d F Y", strtotime($tanggal_mysql));

                                    // Ganti nama bulan ke Bahasa Indonesia
                                    $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                    $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    $tanggal_diinginkan = str_replace($bulanInggris, $bulanIndonesia, $tanggal_diinginkan);

                                    echo $tanggal_diinginkan;
                                } else {
                                    echo "-"; // Jika tidak ada tanggal, tampilkan "-"
                                }
                            ?>
                            <br>
                            Terima kasih
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" align="center">
                            <br><br><br><br><br><br>
                        </td>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            <br><br><br><br><br><br>( <?= $pppdj->dokter_pemeriksa;?> )</font>
                        </td>

                        <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA -->
                        <!-- <td class="no__border" align="center">
                            <!?php if (!empty($pppdj->tanda_tangan)): ?>
                                <img src="<!?= resource_url().'images/ttd_dokter/'.$pppdj->tanda_tangan; ?>" alt="ttd-dokter" width="250">
                            <!?php else: ?>
                                <br><br>
                            <!?php endif; ?>
                            <br><br>( <!?= $pppdj->dokter_pemeriksa; ?> )
                        </td> -->
                    </tr>
                </table>  
                <br>
                <br><br><br><br><br><br>
                <br><br><br><br><br><br>
                <p class="page__number">FORM-DIG-02-00</p>
        </section>
    </main>
</body>
<?php die; ?>