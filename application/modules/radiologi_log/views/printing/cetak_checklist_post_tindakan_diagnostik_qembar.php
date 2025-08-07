<!-- // PWHI  -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

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

		.center {
			text-align: center;
			vertical-align: middle;
		}

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
			max-width: 70px; /* Sesuaikan ukuran logo */
			margin-right: 8px;
		}

		.header__container-identity {
			flex-grow: 1;
			max-width: 45%;
		}

		.identity__section {
			display: flex;
			gap: 8px; /* Mengatur jarak antar kolom */
		}

		.identity__section-title, 
		.identity__section-subtitle {
			display: flex;
			flex-direction: column;
			gap: 4px;
		}

		.identity__section-title p, 
		.identity__section-subtitle p {
			font-size: 11px;
			line-height: 1.3;
			margin: 0;
		}
	</style>
</head>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
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
                        <p class="identity">Ruang / Kelas</p>
                    </div>
                    <div class="identity__section-subtitle">
                        <p class="identity">: <b><?= $pasien_tindakan->nama;?></b></p>
                        <p class="identity">: <b><?= $pasien_tindakan->no_rm;?></b></p>
                        <p class="identity">: <b><?= datefmysql($pasien_tindakan->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= ($pasien_tindakan->kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?></b></p>
                        <p class="identity">: <b><?= $cptdq->bangsal . ' kelas ' . $cptdq->nama_kelas . ' ruang ' . $cptdq->no_ruang . ' No. Bed ' . $cptdq->no_bed; ?></b></p>
                    </div>
                </div>  
                <div class="identity__section-title">
                    <p class="identity" style="text-align: center; margin-top: 20px;"><b>(Mohon diisi atau tempelkan sticker jika ada)</b></p>
                </div>              
            </div>
        </div>
    </header>
    
    <main class="main">
        <section class="information">
			<br>
            <div class="information__container container">
                <table class="small__font" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse; width: 100%;">
                    <thead>
                       <tr>
                            <th class="center" colspan="6" style="text-align: center;">
                                <b>CHECKLIST POST TINDAKAN DIAGNOSTIK</b>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6" style="text-align: left;"><b>POST TINDAKAN</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" style="border: none;">
                                TD : <?= $cptdq->td_cptdq; ?>
                                <span style="margin-left: 5px;">mmHg</span>
                            </td>
                            <td colspan="3" style="border: none;">
                                HR : <?= $cptdq->hr_cptdq; ?>
                                <span style="margin-left: 5px;">x/menit</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border: none;">
                                RR : <?= $cptdq->rr_cptdq; ?>
                                <span style="margin-left: 5px;">x/menit</span>
                            </td>
                            <td colspan="3" style="border: none;">
                                Suhu : <?= $cptdq->suhu_cptdq; ?>
                                <span style="margin-left: 5px;">°C</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>KETERANGAN</b></td>
                            <td colspan="2" width="12%"><b>YA</b></td>
                            <td colspan="2" width="50%"><b>TIDAK</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>RADIAL / BRACHIAL</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->radical_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->radical_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->radical_cptdq_3; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>Hematom pada 15 menit pertama</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->hematom_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->hematom_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->hematom_cptdq_3; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none;"><b>Tindakan selanjutnya :</b></td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                1. Pergelangan tangan (dan atau siku) tidak boleh ditekuk dari jam 
                                <b><?= $cptdq->jampergelangan_cptdq; ?></b> sampai jam <b><?= $cptdq->jamsiku_cptdq; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                2. Ganti balutan setelah 4 jam bila masih berdarah pasang nichiban lagi 4 jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                3. Observasi hematoma daerah tusukan setiap jam selama 6 jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                4. Bila tindakan melalui brachialis cek APTT / ACT 6 jam post tindakan PCI jam
                                <b><?= $cptdq->jampci_cptdq; ?></b> bila hasil baik sheath boleh dicabut
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                5. 6 jam post cabut sheath tangan tidak boleh ditekuk selama 6 jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                6. Bila akral dingin atau cyanosis baluran boleh dikendurkan
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px; text-align: justify; text-indent: -15px; padding-left: 35px;">
                                7. Bila terjadi komplikasi paska tindakan (perdarahan, hematoma, akral dingin / cyanosis dan kondisi penurunan klinis lainnya) segera hubungi dokter DPJP.
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" width="25%"><b>FEMORALIS</b></td>
                            <td colspan="2" width="12%"><b>YA</b></td>
                            <td colspan="2" width="50%"><b>TIDAK</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>Denyut dorsalis pedis kuat</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->denyut_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->denyut_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->denyut_cptdq_3; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>Hematom pada 15 menit pertama</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->hemmattom_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->hemmattom_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->hemmattom_cptdq_3; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none;"><b>Tindakan selanjutnya :</b></td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                1. Kaki tidak boleh di tekuk dari jam
                                <b><?= $cptdq->jamkaki_cptdq; ?></b> sampai jam <b><?= $cptdq->jamkitekuk_cptdq; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                2. Observasi denyut dorsalis pedis setiap jam selama 6 jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                3. Cek APTT / ACT 6 jam post tindakan PCI jam
                                <b><?= $cptdq->jamaptt_cptdq; ?></b> bila hasil baik sheath boleh dicabut
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px;">
                                4. 6 jam post cabut sheath sheath kaki tidak boleh ditekuk selama 6 jam
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="border: none; padding-left: 20px; padding-bottom: 10px; text-align: justify; text-indent: -15px; padding-left: 35px;">
                                5. Bila terjadi komplikasi paska tindakan (perdarahan, hematoma, akral dingin / cyanosis dan kondisi penurunan klinis lainnya) segera hubungi dokter DPJP.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>HASIL TINDAKAN</b></td>
                            <td colspan="2" width="12%"><b>Sudah diterima</b></td>
                            <td colspan="2" width="50%"><b>Belum diterima</b></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>Hasil Tindakan</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->hasil_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->hasil_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->hasil_cptdq_3; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="25%"><b>CD/DVD Tindakan</b></td>
                            <td colspan="2" width="12%">
                                <input type="checkbox" <?= $cptdq->cddvd_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td colspan="2" width="50%">
                                <input type="checkbox" <?= $cptdq->cddvd_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                                <?= $cptdq->cddvd_cptdq_3; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center">
                            Tangerang, 
                            <?php
                                $tanggal_mysql = $cptdq->tanggal_cptdq; // Perbaiki akses properti

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
                        </td>
                        <td class="no__border" width="3%" align="center"></td>
                    </tr>
                     <tr>
                        <td class="no__border" align="center">
                            Perawat Cathlab
                        </td>
                        <td class="no__border"  align="center"></td>
                        <td class="no__border"  align="center">
                            Perawat Ruangan
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"  align="center">
                            <br><br><br><br><br>( <?= $cptdq->perawat_1;?> )</font>
                        </td>
                         <td class="no__border" align="center">
                            <br><br><br><br><br>
                        </td>
                        <td class="no__border"  align="center">
                            <br><br><br><br><br>( <?= $cptdq->perawat_2;?> )</font>
                        </td>

                        <!-- INI JANGAN DI HAPUS UDAH BENER ADA TANDA TANGANYA
                        <td class="no__border" align="center">
                            <!?php if (!empty($cptdq->tanda_tangan)): ?>
                                <img src="<!?= resource_url().'images/ttd_dokter/'.$cptdq->tanda_tangan; ?>" alt="ttd-dokter" width="250">
                            <!?php else: ?>
                                <br><br>
                            <!?php endif; ?>
                            <br><br>( <!?= $cptdq->perawat_1; ?> )
                        </td> -->

                    </tr>
                </table>
            </div>
            <br><br><br>
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
                    <p class="page__number">FORM-DIG-03-00</p>
                </div>
            </div>
        </section>
    </main>
</body>
<?php die; ?>
