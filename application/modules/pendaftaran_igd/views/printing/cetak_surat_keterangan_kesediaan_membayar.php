<!-- // SKKM -->
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
                        <p class="identity">: <b><?= $pasien->nama; ?></b></p>
						<p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
						<p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
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
                    <b style="font-size: 15pt; display: flex; justify-content: center">SURAT PERNYATAAN KESEDIAAN BERBAYAR</b>
                </tr>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">   
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Nama Pasien</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien->nama; ?></td> 
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">Umur</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien->umur_pasien; ?> Tahun</td>
                    </tr>
                    <tr>
                        <td class="no__border" width="3%"></td>
                        <td class="no__border" width="23%">No. Rekam Medis</i></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" width="60%"><?= $pasien->no_rm; ?></td>
                    </tr>
                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Saya yang bertanda tangan dibawah ini	:
                            </td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">   
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="23%">Nama</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="60%"><?= $pasien->nama_pjwb; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="23%">NIK</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="60%"><?= $pasien->nik_pjwb; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="23%">Alamat</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="60%"><?= $pasien->alamat_pjwb; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="23%">No. Telepon/Hp</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="60%"><?= $pasien->telp_pjwb; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="3%"></td>
                            <td class="no__border" width="23%">Hubungan dengan pasien</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border" width="60%">
                                <?php 
                                    if ($ttd_suamiskkm == 1) { // Jika variabel $ttd_suamiskkm sama dengan 1
                                        echo 'Suami'; // Maka tampilkan teks 'Suami'
                                    }
                                ?>
                                <?php if ($ttd_istriskkm == 1) { echo 'Istri'; } ?>
                                <?php if ($ttd_ayahskkm == 1) { echo 'Ayah'; } ?>
                                <?php if ($ttd_ibuskkm == 1) { echo 'Ibu'; } ?>
                                <?php if ($ttd_waliskkm == 1) { echo 'Wali'; } ?>
                                <?php if ($ttd_anakskkm == 1) { echo 'Anak'; } ?>
                                <?php 
                                    if ($ttd_penanggungjawabskkm == 1) {  // Jika variabel $ttd_penanggungjawabskkm sama dengan 1
                                        echo 'Penanggung jawab';          // Tampilkan teks 'Penanggung jawab'                                      
                                        if (!empty($ttd_sebutkanskkm)) {  // Jika variabel $ttd_sebutkanskkm tidak kosong
                                            echo ', ' . $ttd_sebutkanskkm; // Tampilkan ', ' diikuti dengan nilai dari $ttd_sebutkanskkm
                                        }                                      
                                        echo '*';  // Tampilkan simbol '*' setelah teks
                                    } 
                                ?>
                            </td>
                        </tr>
                    </table>
                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Dengan ini menyatakan	: </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%"></td>
                            <td class="no__border" width="60%">1. Saya sudah mendapatkan penjelasan dari Pihak Rumah Sakit Umum Daerah Kota Tangerang dan mengerti mengenai syarat-syarat yang harus dipenuhi untuk mendapatkan hak saya sebagai Pasien Jaminan BPJS Kesehatan. </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%"></td>
                            <td class="no__border" width="60%">2. Saya bersedia untuk tidak menggunakan hak saya sebagai Pasien Jaminan BPJS Kesehatan dan bersedia membayar seluruh biaya pemeriksaan/pengobatan serta perawatan yang dibebankan kepada saya. Sesuai dengan biaya pelayanan kesehatan yang berlaku di Rumah Sakit Umum Daerah Kota Tangerang, apabila tidak dapat melengkapi bukti / tidak memiliki identitas kepesertaan BPJS dalam waktu 3 x 24 jam sejak pasien masuk Rumah Sakit. </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%"></td>
                            <td class="no__border" width="60%">3. Saya akan segera melakukan proses pembuatan BPJS dalam waktu 3 x 24 jam. </td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%"></td>
                            <td class="no__border" width="60%">4. Apabila pasien dinyatakan meninggal dan tidak memiliki identitas kepesertaan BPJS  maka seluruh biaya ditanggung/dibebankan oleh penanggung jawab pasien. </td>
                        </tr>
                    </table>
                    <br>
                    <table class="no__border small__line__spacing small__font" style="font-size: 14px;">  
                        <tr>
                            <td class="no__border" align="justify" colspan="4" >Demikian Surat Pernyataan ini, saya buat dengan sebenarnya dan dalam keadaan sadar tanpa ada paksaan dari pihak manapun juga, apabila dikemudian hari ternyata saya mengingkari pernyataan ini. Maka saya bersedia dituntut secara hukum sesuai ketentuan yang berlaku.</td>
                        </tr>
                    </table>
                </table>
                <br><br><br><br>
                <table class="no__border small__line__spacing small__font" style="font-size: 14px;">
                    <tr>
                        <td class="no__border" width="3%" align="center">
                            Petugas RSUD Kota Tangerang,
                        </td>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                            $tanggal_mysql = $ttd_tanggalskkm;
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
                            Yang Membuat Pernyataan,
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border" align="center">
                            <br><br><br><br><br><br><u>( <?= $ttd_user ?? '-' ?> )</u> <br> Nama Jelas & TTD
                        </td>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border" align="center">
                            <br><br><br>
                            <span style="font-size: smaller;">Materai Rp. 10000,-</span>
                            <br><br><br>
                            <u>( <?= $pasien->nama_pjwb; ?> )</u> 
                            <br> Nama Jelas & TTD
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <p class="page__number">FORM-REM-24-02</p>
                <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
            </div>
        </section>
    </main>
</body>
<?php die; ?>
