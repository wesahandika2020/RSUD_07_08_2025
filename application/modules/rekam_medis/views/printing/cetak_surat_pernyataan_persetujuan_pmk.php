<!-- // SPPPMK PERBAIKAN-->
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
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="95px" height="95px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="95px" height="95px">
                        </td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">RUMAH SAKIT UMUM DAERAH</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">KOTA TANGERANG</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Jl. Pulau Putri Raya Perumahan Modernland, Kelurahan Kelapa Indah</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Kecamatan Tangerang Telp. 021 2972 0201, 021 2972 0202</b></td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <br>
                <tr>
                    <b style="font-size: 14pt; display: flex; justify-content: center">SURAT PERNYATAAN PERSETUJUAN/PENOLAKAN MEDIS KHUSUS</b>
                </tr>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Saya yang bertanda tangan dibawah ini	:
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">   
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Nama</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?= !empty($spppmk->namaspppmk) ? $spppmk->namaspppmk : (!empty($pasien_tindakan->nama_pjwb) ? $pasien_tindakan->nama_pjwb : ''); ?>
                        </td> 
                        
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Jenis Kelamin</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?php
                                // Ambil dari spppmk dulu, fallback ke pasien_tindakan
                                $jkRaw = !empty($spppmk->jkpenangungjawabspppmk) 
                                    ? $spppmk->jkpenangungjawabspppmk 
                                    : (!empty($pasien_tindakan->kelamin_pjwb) 
                                        ? $pasien_tindakan->kelamin_pjwb 
                                        : '');

                                // Normalisasi ke huruf besar
                                $jk = strtoupper(trim($jkRaw));

                                // Tampilkan sesuai nilai
                                if ($jk === 'L') {
                                    echo 'Laki-laki';
                                } elseif ($jk === 'P') {
                                    echo 'Perempuan';
                                } else {
                                    echo $jk ? $jk : '-'; // fallback tampilan jika bukan L/P
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Umur/Tanggal Lahir</td>
                        <td class="no__border" width="1%">:</td>
                        <!-- <!?php
                            echo '<td class="no__border" width="60%">';

                            if (!empty($spppmk->umurttlspppmk)) {
                                // Kalau umur manual diisi, tampilkan langsung
                                echo $spppmk->umurttlspppmk;
                            } elseif (!empty($pasien_tindakan->tgl_lahir_pjwb)) {
                                // Kalau tidak, cek tgl_lahir_pjwb dan hitung umur
                                $tanggal_lahir = $pasien_tindakan->tgl_lahir_pjwb;
                                $tgl_lahir = new DateTime($tanggal_lahir);
                                $today = new DateTime();
                                $diff = $today->diff($tgl_lahir);
                                $umur = $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
                                $format_tanggal = date('d/m/Y', strtotime($tanggal_lahir));

                                echo $umur . ' (' . $format_tanggal . ')';
                            } else {
                                // Jika semua kosong
                                echo '-';
                            }
                            echo '</td>';
                        ?> -->

                        <?php
                            echo '<td class="no__border" width="60%">';

                            if (!empty($spppmk->umurttlspppmk)) {
                                $umur_manual = $spppmk->umurttlspppmk;

                                // Cek apakah ini format tanggal (YYYY-MM-DD)
                                if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $umur_manual)) {
                                    // Hitung umur dari tanggal
                                    $tgl_lahir = new DateTime($umur_manual);
                                    $today = new DateTime();
                                    $diff = $today->diff($tgl_lahir);
                                    $umur = $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
                                    $format_tanggal = date('d/m/Y', strtotime($umur_manual));

                                    echo $umur . ' (' . $format_tanggal . ')';
                                } else {
                                    // Kalau bukan tanggal, tampilkan langsung
                                    echo $umur_manual;
                                }
                            } elseif (!empty($pasien_tindakan->tgl_lahir_pjwb)) {
                                // Kalau tidak, cek tgl_lahir_pjwb dan hitung umur
                                $tanggal_lahir = $pasien_tindakan->tgl_lahir_pjwb;
                                $tgl_lahir = new DateTime($tanggal_lahir);
                                $today = new DateTime();
                                $diff = $today->diff($tgl_lahir);
                                $umur = $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
                                $format_tanggal = date('d/m/Y', strtotime($tanggal_lahir));

                                echo $umur . ' (' . $format_tanggal . ')';
                            } else {
                                // Jika semua kosong
                                echo '-';
                            }

                            echo '</td>';
                        ?>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">NIK</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?= !empty($spppmk->nikspppmk) ? $spppmk->nikspppmk : (!empty($pasien_tindakan->nik_pjwb) ? $pasien_tindakan->nik_pjwb : ''); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Alamat rumah</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?= !empty($spppmk->alamatspppmk) ? $spppmk->alamatspppmk : (!empty($pasien_tindakan->alamat_pjwb) ? $pasien_tindakan->alamat_pjwb : ''); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Nomor Hp</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?= !empty($spppmk->notelponspppmk) ? $spppmk->notelponspppmk : (!empty($pasien_tindakan->telp_pjwb) ? $pasien_tindakan->telp_pjwb : ''); ?>
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Menyatakan dengan sesungguhnya
                            <b> <?= $spppmk->sayasendirispppmk; ?>
                                <?= $spppmk->sebagaiorangtuaspppmk; ?>
                                <?= $spppmk->keluargaspppmk; ?>
                                <?= $spppmk->walispppmk; ?>
                                <?= $spppmk->darispppmk; ?>*
                            </b>
                        </td>
                    </tr>
                </table>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">   
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Nama</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien_tindakan->nama; ?></td> 
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Jenis Kelamin</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%">
                            <?= ($pasien_tindakan->kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Umur/Tempat Tanggal Lahir</i></td>
                        <td class="no__border" width="1%">:</td>
                        <?php
                            $tanggal_lahir = $pasien_tindakan->tanggal_lahir;
                            $tempat_lahir = strtoupper($pasien_tindakan->tempat_lahir); // Ubah ke huruf besar

                            // Hitung umur lengkap
                            $tgl_lahir = new DateTime($tanggal_lahir);
                            $today = new DateTime();
                            $umur_interval = $today->diff($tgl_lahir);

                            // Format umur lengkap
                            $umur_lengkap = $umur_interval->y . ' tahun ' . $umur_interval->m . ' bulan ' . $umur_interval->d . ' hari';

                            // Format tanggal lahir (dd/mm/yyyy)
                            $tanggal_formatted = date('d/m/Y', strtotime($tanggal_lahir));

                            // Tampilkan hasil akhir
                            echo '<td class="no__border" width="60%">' . $umur_lengkap . ', ' . $tempat_lahir . ' ' . $tanggal_formatted . '</td>';
                        ?>
                    </tr>
                </table>           
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" style="line-height: 1.8; padding-top: 10px; padding-bottom: 10px;">
                            Dengan ini menyatakan 
                            <b><?= $spppmk->setujuspppmk; ?>
                            <?= $spppmk->menolakspppmk; ?></b>
                            untuk dilakukan tindakan medis berupa terapi plasma konvalescen dari PMI 
                            <b><?= $spppmk->pmitujuanspppmk; ?></b>* (PMI tidak ada MOU dengan RSUD Kota Tangerang)  
                            dan bersedia menanggung <b>BIAYA SENDIRI.</b>
                            <br>
                            Dari penjelasan yang diberikan, saya telah mengerti segala hal yang berhubungan dengan surat penyataan ini serta kemungkinan yang dapat terjadi sesuai penjelasan yang diberikan.
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center">
                            <b>Dokter/pelaksana,</b>                                                            
                        </td>
                        <td class="no__border" width="1%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $spppmk->tanggalspppmk; // Perbaiki akses properti
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
                            <b>Yang Membuat Pernyataan,</b>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" align="center">
                            <br><br><br><br>
                            <div style="display: inline-flex; align-items: center; border-bottom: 1px dotted; width: auto;">
                                <span>( <?= $spppmk->nama_dokter; ?> )</span>
                            </div>
                            <br> Nama Jelas & TTD
                        </td>
                        <td class="no__border" align="center"></td>
                        <td class="no__border" align="center">
                            <br><br><br><br>
                            <div style="display: inline-flex; align-items: center; border-bottom: 1px dotted; width: auto;">
                                <span>( <?= !empty($spppmk->namaspppmk) ? $spppmk->namaspppmk : (!empty($pasien_tindakan->nama_pjwb) ? $pasien_tindakan->nama_pjwb : ''); ?> )</span>
                            </div>
                            <br> Nama Jelas & TTD 
                        </td>
                    </tr>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                    <tr>
                        <td class="no__border" align="justify" colspan="4" >Catatan: biaya langsung dibayarkan ke PMI <b><?= $spppmk->pmitujuanspppmk; ?></b>* tidak melalui RSUD Kota Tangerang.</td>
                    </tr>
                </table>
                <br><br><br>
                <p class="page__number">FORM-PMD-43-00</p>
                <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
            </div>
        </section>
    </main>
</body>
<?php die; ?>