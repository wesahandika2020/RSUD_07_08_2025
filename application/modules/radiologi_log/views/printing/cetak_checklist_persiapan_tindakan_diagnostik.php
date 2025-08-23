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
                            <th class="center" colspan="10" style="text-align: center;">
                                <b>CHECKLIST PERSIAPAN TINDAKAN DIAGNOSTIK INVASIF DAN INTERVENSI NON BEDAH</b>
                            </th>
                        </tr>
                        <!-- <tr>
                            <th colspan="10" style="text-align: left;"><b>POST TINDAKAN</b></th>
                        </tr> -->
                    </thead>

                    <tbody> 
                        <tr>
                            <td colspan="3" style="border: none;">
                                Tanggal : <?= datefmysql($cptdq->tanggal_cptdq); ?>
                                <span style="margin-left: 5px;"></span>
                            </td>
                            <td colspan="3" style="border: none;">
                                Ruangan : <?= $cptdq->bangsal ?? '-'; ?>
                                <span style="margin-left: 5px;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border: none;">
                                DPJP : <?= $cptdq->dokter; ?>
                                <span style="margin-left: 5px;"></span>
                            </td>
                            <td colspan="3" style="border: none;">
                                Rencana Tindakan  : <?= $cptdq->rencana_cptdq; ?>
                                <span style="margin-left: 5px;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border: none;">
                                Diagnosa : <?= $cptdq->diagnosa_cptdq; ?>
                                <span style="margin-left: 5px;"></span>
                            </td>
                            <td colspan="3" style="border: none;">
                                TB/BB  : <?= $cptdq->tb_cptdq; ?> cm / <?= $cptdq->bb_cptdq; ?> kg
                                <span style="margin-left: 5px;"></span>
                            </td>
                        </tr>

                        <tr>
                            <td class="center" width="1%"><b>No</b></td>
                            <td width="30%"><b>PERSIAPA SEBELUM TINDAKAN </b></td>
                            <td class="center" width="2%"><b>YA</b></td>
                            <td class="center" width="2%"><b>TIDAK</b></td>
                            <td width="40%"><b>KETERANGAN</b></td>
                        </tr>
                        <tr>
                            <td colspan="9"><b>FISIK</b></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">1</td>
                            <td width="30%">Kesadaran</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->kesadaran_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->kesadaran_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->kesadaran_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">2</td>
                            <td width="30%">Puasa 3-4 Jam</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->puasa_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->puasa_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->puasa_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">3</td>
                            <td width="30%">Cukur Daerah Inguinal Sampai Pangkal Paha</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->cukurdaerah_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->cukurdaerah_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->cukurdaerah_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">4</td>
                            <td width="30%">Cukur Daerah Pergelangan Tangan Kanan</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->cdaerahkanan_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->cdaerahkanan_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->cdaerahkanan_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">5</td>
                            <td width="30%">IV Line terpasang di tangan sebelah kiri Min No 20 G</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->ivlineterpasang_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->ivlineterpasang_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->ivlineterpasang_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">6</td>
                            <td width="30%">Gigi Palsu</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->gigipalsu_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->gigipalsu_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->gigipalsu_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">7</td>
                            <td width="30%">Kontak Lensa</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->kontaklensa_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->kontaklensa_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->kontaklensa_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">8</td>
                            <td width="30%">Perhiasan yang tidak dapat lepas</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->perhiasan_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->perhiasan_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->perhiasan_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">9</td>
                            <td colspan="9">Alergi:</td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td colspan="9">
                                <table style="width:100%;">
                                    <tr>
                                        <td style="width:150px;">&nbsp;&nbsp;&nbsp;- Obat :</td>
                                        <td><?= $cptdq->alergiobat_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;- Zat Kontras :</td>
                                        <td><?= $cptdq->alergizat_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;- Makanan :</td>
                                        <td><?= $cptdq->alergimakanan_cptdq; ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">10</td>
                            <td width="30%">Riwayat Penyakit Sebelumnya</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->riwayatpen_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->riwayatpen_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->riwayatpen_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td colspan="9">
                                <table style="width:100%;">
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;1. Obat Pengencer Darah  :</td>
                                        <td><?= $cptdq->obatpengen_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;2. Obat-obatan rutin :</td>
                                        <td><?= $cptdq->obatobatan_cptdq; ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">11</td>
                            <td width="30%">Pasien Elektif Sudah Masuk Ruang Perawatan H-1 Sebelum Tindakan dilakukan</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->pasienevektif_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->pasienevektif_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->pasienevektif_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">12</td>
                            <td width="30%">
                                Pasang Kateter <input type="checkbox" <?= $cptdq->pasangkater_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">  
                                Kondom Kateter <input type="checkbox" <?= $cptdq->pasangkater_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->pasangkater_cptdq_3 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->pasangkater_cptdq_4 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->pasangkater_cptdq_5; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9"><b>ADMINISTRASI</b></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">1</td>
                            <td width="30%">Surat Ijin Tindakan</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->suratijin_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->suratijin_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->suratijin_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">2</td>
                            <td width="30%">Surat Permintaan Tindakan</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->suratpermin_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->suratpermin_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->suratpermin_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">3</td>
                            <td width="30%">Surat Edukasi Kondisi Saat ini</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->surateduk_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->surateduk_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->surateduk_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">4</td>
                            <td width="30%">Gelang Nama</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->gelang_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->gelang_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->gelang_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">5</td>
                            <td width="30%">Status Pasien</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->statsu_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->statsu_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->statsu_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">6</td>
                            <td width="30%">Therapy List Obat yang sudah di berikan</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->therapi_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->therapi_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->therapi_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">7</td>
                            <td width="30%">Surat Pernyataan tulis tangan.</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->surattulis_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->surattulis_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->surattulis_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td colspan="9"><b>PEMERIKSAAN PENUNJANG</b></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">1</td>
                            <td colspan="9">Laboratorium :</td>
                        </tr>
                        <tr>
                            <td width="1%"></td>
                            <td colspan="9">
                                <table style="width:100%;">
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- Darah Rutin  : <?= $cptdq->darahrutin_cptdq; ?></td>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- Ur/Cr  : <?= $cptdq->darahrutin_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- APPT/Kontrol  : <?= $cptdq->app_cptdq; ?></td>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- PT/Kontrol  : <?= $cptdq->pt_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- INR  : <?= $cptdq->inr_cptdq; ?></td>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- GDS : <?= $cptdq->gds_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- Trop T (Emergency)  : <?= $cptdq->trop_cptdq; ?></td>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- HbsAg  : <?= $cptdq->hbsag_cptdq; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:170px;">&nbsp;&nbsp;&nbsp;- Elektrolit (Emergency)  : <?= $cptdq->elektrik_cptdq; ?></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">2</td>
                            <td width="30%">EKG Terbaru</td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->ekg_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->ekg_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->ekg_cptdq_3; ?></td>
                        </tr>
                        <tr>
                            <td class="center" width="1%">3</td>
                            <td width="30%">
                                X-Ray, TMT  <input type="checkbox" <?= $cptdq->xray_cptdq_1 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">  
                                MSCT, Echo <input type="checkbox" <?= $cptdq->xray_cptdq_2 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;">
                            </td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->xray_cptdq_3 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td class="center" width="2%"><input type="checkbox" <?= $cptdq->xray_cptdq_4 == 1 ? 'checked' : ''; ?> style="accent-color: #007bff;"></td>
                            <td width="40%"> <?= $cptdq->xray_cptdq_5; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <table class="no__border small__line__spacing small__font" style="font-size: 12px;">
                    <tr>
                        <td class="no__border" width="3%" align="center"></td>
                        <td class="no__border" width="3%" align="center"></td>
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
