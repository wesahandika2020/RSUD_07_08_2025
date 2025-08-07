<!-- // RH -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<!-- <style>
    .rehabilitas-medik{
        font-size: 5pt ;
    }
</style> -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print"> 
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 9pt;
		}

		@page {
			margin: 0.5cm !important;
		}

		.box-identitas {
			border: 1.5px solid black;
			padding: 5px;
		}

		/* .center {
			text-align: center;
			vertical-align: middle;
		} */

		.right {
			text-align: right;
			vertical-align: middle;
		}

		.bold { font-weight: bold; }

		table { border-collapse: collapse;}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td { border: none; padding: 0; }

		.dotted-underline { 
			padding: 0 15px;
			border-bottom: 1.5px dotted; 
		}

		.solid-underline { 
			padding: 0 15px;
			border-bottom: 1.5px solid; 
		}

		.border-left {
			border-left: 1.5px solid black;
		}

		.border-bottom {
			border-bottom: 1.5px solid black;
		}

		input[type="checkbox"] {
			margin-top: 1px;
			vertical-align: middle;
		}

		.pd5 {
			padding-bottom: 5px !important;
		}

		.v-center {
			vertical-align: middle !important;
		}

		/* Tambahan Wesa */
		.header__container {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 16px; /* Mengatur jarak antar elemen */
		}

		.header__container-address {
			max-width: 50%; /* Membatasi lebar elemen alamat */
		}

		.header__address {
			font-size: 10px;
			line-height: 1.5;
			color: #333;
			margin: 0;
		}

		.header__img {
			max-width: 60px; /* Sesuaikan ukuran logo */
			margin-right: 8px;
		}

		.header__container-identity {
			flex-grow: 1;
			max-width: 45%;
		}


	</style>
</head>

<body onload="window.print()">
    <!-- JANGAN DI HAPUS BUAT JAGA" -->
	<!-- <header class="header" id="header">
		<div class="header__container2 container">
			<img src="<!?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
		</div>
	</header> -->

    <!-- <header class="header" id="header">
        <div class="header__container2 container" style="display: flex; align-items: center; justify-content: center; text-align: center;">
            <img src="<!?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img" style="height: 75px; margin-right: 12px;">
            <h3 style="font-weight: bold; text-align: center; flex: 1;">
                FORMULIR RAWAT JALAN LAYANAN KEDOKTERAN FISIK DAN REHABILITASI MEDIK<br> 
                Assesment / Evaluasi (Re-Assesment)
            </h3>
        </div>
    </header> -->

    <header class="header" id="header">
        <div class="header__container2 container" style="display: flex; align-items: center; justify-content: center; text-align: center; gap: 1px;">
            <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img" style="height: 60px; flex-grow: 0;">
            <div style="font-weight: bold; text-align: center; flex-grow: 1; margin: 0; font-size: 16px; width: 100%;">
            FORMULIR RAWAT JALAN LAYANAN KEDOKTERAN FISIK DAN REHABILITASI MEDIK<br> 
            Assesment / Evaluasi (Re-Assesment)
            </div>

        </div>
    </header>

    <main class="main">
        <section class="form__rm rehabilitas-medik">
            <div class="form__rm__container container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <!-- <th class="table__little-title no__border" colspan="5">FORMULIR RAWAT JALAN LAYANAN KEDOKTERAN FISIK DAN REHABILITASI MEDIK Assesment / Evaluasi (Re-Assesment)</th> -->
                            <th class="table__little-title no__border" colspan="5"></th>
                        </tr>                                                              
                    </thead>              
                </table>
                <br>
                <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">

                    <tbody>
                        <tr>
                            <td class="center" width="50%">
                            <b>I. IDENTITAS PASIEN</b>
                                <div style="margin-top: 10px;">
                                    <span style="display: inline-block; width: 130px;">&nbsp;&nbsp;&nbsp;Nama Pasien</span> : <?= $pasien->nama; ?>
                                </div>
                                <div style="margin-top: 10px;">
                                    <span style="display: inline-block; width: 130px;">&nbsp;&nbsp;&nbsp;Tanggal Lahir</span> : <?= datefmysql($pasien->tanggal_lahir); ?>
                                </div>
                            </td>

                            <td class="center" width="50%">
                                <div style="margin-top: 5px;">
                                    <span style="display: inline-block; width: 90px;">No.RM / Reg</span> : <?= $pasien->no_rm; ?> / <?= $pasien->no_register; ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td class="center">
                            <b>II. ASSESMEN AWAL</b>
                            <div style="margin-top: 10px;">
                                <span style="display: inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;Tanggal Pelayanan</span> : <?= date('d/m/Y', strtotime($layanan->tanggal_layanan)); ?>
                            </div>
                            <div style="margin-top: 5px;">
                                <span style="display: inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;Anamnesa</span> : <?= $anamnesa->keluhan_utama; ?>
                            </div>
                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Pemeriksaan Fisik dan Uji Fungsi
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?= isset($rehabilitas_medik->pemeriksaan_rehabilitas) ? $rehabilitas_medik->pemeriksaan_rehabilitas : '-'; ?>
                                </div>
                            </div>


                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Diagnosis Medis (ICD-10)
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?php foreach ($diagnosa as $diagnosa_utama): ?> <!-- Melakukan iterasi pada array atau koleksi $diagnosa -->
                                        <?php if (!empty($diagnosa_utama->prioritas) && $diagnosa_utama->prioritas === 'Utama'): ?> <!-- Mengecek apakah elemen memiliki prioritas yang tidak kosong dan nilainya 'Utama' -->
                                            <?= $diagnosa_utama->golongan_sebab_sakit_lain ?> <!-- Menampilkan informasi golongan penyebab sakit -->
                                            <?= $diagnosa_utama->nama_sebab_sakit ?> <!-- Menampilkan nama penyebab sakit -->
                                            | (Utama). <!-- Menambahkan keterangan bahwa ini adalah diagnosis utama -->
                                        <?php endif; ?> <!-- Mengakhiri kondisi pengecekan prioritas -->
                                    <?php endforeach; ?> <!-- Mengakhiri iterasi perulangan foreach -->
                                </div>
                            </div>



                            <!-- JANGAN DI HAPUS  -->
                            <!-- <div style="margin-top: 5px;"> Membuat elemen div dengan margin atas 5 piksel
                                <span style="display: inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;Diagnosis Fungsi (ICD-10)</span> : Menambahkan label Diagnosis Fungsi (ICD-10) dengan lebar tetap 200px
                                <!?php if (!empty($diagnosa) && is_array($diagnosa)): ?> Mengecek apakah variabel $diagnosa tidak kosong dan berupa array
                                    <!?php $firstItem = true; ?> Inisialisasi variabel $firstItem untuk menentukan apakah elemen diagnosis pertama
                                    <!?php foreach ($diagnosa as $item): ?> Melakukan iterasi pada setiap elemen dalam $diagnosa
                                        <!?php if (is_object($item) && (empty($item->prioritas) || $item->prioritas !== 'Utama')): ?> Memeriksa apakah elemen adalah objek dan prioritasnya tidak diatur atau bukan 'Utama'
                                            <!?php if (!$firstItem): ?> Jika bukan elemen pertama, tambahkan pemisah "||"
                                                || 
                                            <!?php else: ?> Jika elemen pertama, set $firstItem menjadi false
                                                <!?php $firstItem = false; ?>
                                            <!?php endif; ?>
                                            <!?= isset($item->golongan_sebab_sakit_lain) ? $item->golongan_sebab_sakit_lain : '' ?> Menampilkan golongan penyebab sakit jika tersedia
                                            <!?= isset($item->nama_sebab_sakit) ? $item->nama_sebab_sakit : '' ?> Menampilkan nama penyebab sakit jika tersedia
                                        <!?php endif; ?>
                                    <!?php endforeach; ?> Mengakhiri iterasi foreach
                                <!?php endif; ?> Mengakhiri pengecekan kondisi $diagnosa
                            </div> -->

                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Diagnosis Fungsi (ICD-10)
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?php 
                                    if (!empty($diagnosa) && is_array($diagnosa)): 
                                        $diagnosaList = [];
                                        foreach ($diagnosa as $item) {
                                            if (is_object($item) && (empty($item->prioritas) || $item->prioritas !== 'Utama')) {
                                                $diagnosaText = trim(
                                                    (isset($item->golongan_sebab_sakit_lain) ? $item->golongan_sebab_sakit_lain : '') . ' ' .
                                                    (isset($item->nama_sebab_sakit) ? $item->nama_sebab_sakit : '')
                                                );
                                                if (!empty($diagnosaText)) {
                                                    $diagnosaList[] = $diagnosaText;
                                                }
                                            }
                                        }
                                        echo !empty($diagnosaList) ? implode(' || ', $diagnosaList) : '-';
                                    else:
                                        echo '-';
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Pemeriksaan Penunjang
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?= $anamnesa->pemeriksaan_penunjang; ?>
                                </div>
                            </div>

                            <!-- JANGAN DI HAPUS -->
                            <!-- ✅ Solusi: Gabungkan Semua Nama dengan implode()
                            Jika $tindakan adalah array of objects, kita bisa menggunakan implode() untuk menampilkan semua nama dalam satu baris. -->
                            <!-- <div style="margin-top: 5px;">
                                <span style="display: inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;Tata Laksana KFR (ICD 9 CM)</span> :
                                <!?= isset($tindakan) && is_array($tindakan) ? implode(', ', array_column($tindakan, 'nama_layanan')) : '-'; ?>
                            </div> -->

                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Tata Laksana KFR (ICD 9 CM)
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?= isset($tindakan) && is_array($tindakan) ? implode(', ', array_column($tindakan, 'nama_layanan')) : '-'; ?>
                                </div>
                            </div>

                            <!-- 🔍 Penjelasan:
                            ✅ array_column($tindakan, 'nama_layanan') → Mengambil semua nama_layanan dari array.
                            ✅ implode(', ', ...) → Menggabungkan nilai menjadi teks terpisah dengan koma.
                            ✅ isset($tindakan) && is_array($tindakan) → Memastikan $tindakan adalah array sebelum diproses.
                            ✅ Jika tidak ada data, tampilkan - agar halaman tetap rapi. -->

                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Rekomendasi
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?= isset($rehabilitas_medik->rekomendasi_rehabilitas) ? $rehabilitas_medik->rekomendasi_rehabilitas : '-'; ?>
                                </div>
                            </div>
                            <div style="margin-top: 5px; display: flex; align-items: flex-start;">
                                <span style="display: inline-block; width: 200px; flex-shrink: 0;">
                                    &nbsp;&nbsp;&nbsp;Evaluasi
                                </span> &nbsp;:&nbsp;
                                <div style="display: inline-block; max-width: calc(100% - 220px); word-wrap: break-word; white-space: normal;">
                                    <?= isset($rehabilitas_medik->evaluasi_disabilitas) ? $rehabilitas_medik->evaluasi_disabilitas : '-'; ?>
                                </div>
                            </div>

                            <div style="margin-top: 5px;">
                                <span style="display: inline-block; width: 200px;">&nbsp;&nbsp;&nbsp;Suspek Penyakit Akibat Kerja</span> : 
                                <?= $rehabilitas_medik->suspek_rehabilitas == 'Ya' ? 'Ya' : 'Tidak'; ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <tr>
                    <table class="no__border big__line__spacing small__font">
                        <tbody>
                            <tr><br><br><br></tr>
                            <tr>
                                <td class="no__border" width="50%" align="center" style="padding: 0pt;"> </td>
                                <td class="no__border" width="50%" align="center" style="padding: 0pt;">
                                    Tangerang, <?= date('d/m/Y', strtotime($rehabilitas_medik->tanggal_rehabilitas)) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="no__border" align="center" style="padding: 0pt;">
                                    Tanda Tangan Pasien
                                </td>
                                <td class="no__border" align="center" style="padding: 0pt;">
                                    Dokter Sp.KFR
                                </td>
                            </tr>
                            <tr>
                                <td class="no__border" align="center">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </td>
                                <td class="no__border" align="center">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td class="no__border" align="center">(<b><?= $pasien->nama; ?></b>)</td>
                                <td class="no__border" align="center">(<b><?= $rehabilitas_medik->nama_dokter; ?></b>)</td>
                            </tr>
                        </tbody>
                    </table>
                </tr>                          
            </div>
            <br>
            <br>    
            <br>
        </section>      
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
            <p class="page__number">FORM-RH-06-00</p>
        </div>
    </footer>
</body>
<?php die; ?>