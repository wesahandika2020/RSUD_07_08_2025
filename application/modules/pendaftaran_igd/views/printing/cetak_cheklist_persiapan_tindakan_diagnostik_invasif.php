
<!-- // CPTDI -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<script src="https://code.highcharts.com/highcharts.js"></script>

<title>Document</title>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print"> 
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 8pt;
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
            transform: scale(0.6);
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

<script>
    .no__border {
        border-collapse: collapse;
        border: none;
    }

    .no__border td {
        border: none;
    }
</script>


<!-- <body onload="window.print()"> -->
<body onload="setTimeout(()=>window.print(),1000)">
	<header class="header" id="header">
		<div class="header__container container grid">
			<div class="header__container-address grid">
				<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="Logo RSUD" class="header__img">
				<p class="header__address">
					Jl. Pulau Putri Raya Perumahan Modernland<br>
					Kelurahan Kelapa Indah, Kecamatan Tangerang<br>
					Telp: 021 2972 0201, 021 2972 0202
				</p>
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
						<!-- <p class="identity">: <b><!?= $pasien->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki'; ?></b></p> -->
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</header>

    <main class="main">
        <section class="tpgd">
			<br>                
            <div class="tpgd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 12px; width: 100%; border-collapse: collapse;">
                    <tr>
                        <b style="font-size: 12pt; display: flex; justify-content: center"> ASESMEN AWAL KEPERAWATAN TINDAKAN INVASIF NON BEDAH</b>
                    </tr>
                </table>

				<table class="big__line__spacing small__font" style="border-collapse: no__border; width: 100%;">
					<thead>
                        <tr>
                            <th class="table__big-title" colspan="10" style="background-color: #B0E0E6; color: black; padding-top: 0px; padding-bottom: 0px;">
                                DATA IDENTITAS
                            </th>
                        </tr>
					</thead>
					<tbody>
                        <tr>
                            <td width="15%" style="border: none;">Tanggal Jam Masuk</td>
                            <td class="center" width="1%" style="border: none;">:</td>
                            <td colspan="7" style="border: none;"> <?= $ttd_tgl_layanan; ?> </td>
                        </tr>

                        <tr>
                            <td width="15%" style="border: none;">Diagnosis medis</td>
                            <td class="center" width="1%" style="border: none;">:</td>
                            <td colspan="7" style="border: none;">
                                <?php
                                $listDiagnosa = [];

                                // Urutannya diperhatikan ya ayang:
                                foreach (($diagnosa_utama ?? []) as $d) {
                                    $listDiagnosa[] = $d->nama_diagnosa ?? $d->nama ?? '-';
                                }
                                foreach (($ds_manual_utama ?? []) as $d) {
                                    $listDiagnosa[] = $d->nama_diagnosa ?? $d->nama ?? '-';
                                }
                                foreach (($diagnosa_sekunder ?? []) as $d) {
                                    $listDiagnosa[] = $d->nama_diagnosa ?? $d->nama ?? '-';
                                }
                                foreach (($ds_manual_sekunder ?? []) as $d) {
                                    $listDiagnosa[] = $d->nama_diagnosa ?? $d->nama ?? '-';
                                }
                                ?>

                                <?php if (!empty($listDiagnosa)) : ?>
                                    <ul style="margin: 0; padding-left: 18px;">
                                        <?php foreach ($listDiagnosa as $nama) : ?>
                                            <li><?= $nama ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <span>-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="border: none;"><b>Berikan tanda (✓) pada kolom yang sesuai</b></td>
                        </tr>

                        <tr>
                            <td width="15%" style="border: none;">Tujuan tindakan</td>
                            <td class="center" width="1%" style="border: none;">:</td>
                            <td width="20%" style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Angiografi
                            </td>
                            <td style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> PTCA / Cath Standby PCI
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;"></td>
                            <td width="20%" style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Phlebectomy
                            </td>
                            <td style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Endovenous Laser
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;"></td>
                            <td width="20%" style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> DSE / TEE / Endoskopi
                            </td>
                            <td style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Lain-lain : 
                                <?= $ttd_tujuan_cptdi['tujuan_cptdi_7'] ?? '' ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;"></td>
                            <td width="20%" style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_8'] ?? 0) == 1 ? 'checked' : '' ?>> Mandiri
                            </td>
                            <td style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> Menggunakan kursi roda
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border: none;"></td>
                            <td width="20%" style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_10'] ?? 0) == 1 ? 'checked' : '' ?>> Jalan dengan bantuan
                            </td>
                            <td style="border: none;">
                                <input type="checkbox" <?= ($ttd_tujuan_cptdi['tujuan_cptdi_11'] ?? 0) == 1 ? 'checked' : '' ?>> Menggunakan brankar
                            </td>
                        </tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: no__border; width: 100%;">
                    <tr>
                        <th class="table__big-title" colspan="10" style="background-color: #B0E0E6; color: black; padding-top: 0px; padding-bottom: 0px;">
                            ASESMEN PRA TINDAKAN
                        </th>
                    </tr>
                       
                    <tr>
                        <td width="1%"style="border: none;"></td>
                        <td width="1%"style="border: none;">1.</td>
                        <td colspan="8" style="border: none;">Keluhan utama (Tuliskan keluhan pasien dan pemeriksaan fisik yang ditemukan saat pengkajian)</td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">2.</td>
                        <td width="20%" style="border: none;">Status psikologis</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tenang
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Takut
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Gelisah 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Marah 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Lain-lain, sebutkan : 
                                <?= $ttd_statuspsikologis_cptdi['statuspsikologis_cptdi_6'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">3.</td>
                        <td width="20%" style="border: none;">Riwayat penyakit dahulu </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Hipertensi 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Asma 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Diabetes mellitus 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Penyakit jantung bawaan 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Penyakit ginjal 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Kanker  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> Riwayat operasi 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_8'] ?? 0) == 1 ? 'checked' : '' ?>> Riwayat tuberkulosis
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> Lain-lain :  
                            </label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_riwayatpenyakit_cptdi['riwayatpenyakit_cptdi_10'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    
                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">4.</td>
                        <td width="20%" style="border: none;">Sistem pernafasan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Warna sputum :
                                <?= $ttd_sistempernafasan_cptdi['sistempernafasan_cptdi_1'] ?? '' ?>
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;"> Konsisten sputum :
                                <input type="checkbox" <?= ($ttd_sistempernafasan_cptdi['sistempernafasan_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Kental 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_sistempernafasan_cptdi['sistempernafasan_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Encer 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Jumlah sputum :
                                <?= $ttd_sistempernafasan_cptdi['sistempernafasan_cptdi_1'] ?? '' ?> cc
                            </label>
                            <label style="margin-right: 20px;"></label>
                            <label style="margin-right: 20px;"> Lain-lain :
                                <?= $ttd_sistempernafasan_cptdi['sistempernafasan_cptdi_1'] ?? '' ?>
                            </label>
                        </td>
                    </tr> -->



                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">5.</td>
                        <td width="20%" style="border: none;">Sistem pencernaan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Muntah darah :
                                <input type="checkbox" <?= ($ttd_sistempencernaan_cptdi['sistempencernaan_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Ya 
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_sistempencernaan_cptdi['sistempencernaan_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> BAB :
                                <input type="checkbox" <?= ($ttd_sistempencernaan_cptdi['sistempencernaan_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Normal 
                            </label>
                            <label style="margin-right: 58px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_sistempencernaan_cptdi['sistempencernaan_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Hitam 
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_sistempencernaan_cptdi['sistempencernaan_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Darah segar 
                            </label>
                        </td>
                    </tr> -->




                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">6.</td>
                        <td width="20%" style="border: none;">Sistem perkemihan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Urin /24 jam :
                                <?= $ttd_sistemkemih_cptdi; ?> cc
                            </label>
                        </td>
                    </tr> -->




                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">4.</td>
                        <td width="20%" style="border: none;">Riwayat pengobatan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Double antiplatelet :
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Lama penggunaan
                            </label>
                            <label style="margin-right: 5px;">:</label>
                            <label style="margin-right: 10px;">
                                <?= $ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Beta blocker  :
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 65px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Lama penggunaan
                            </label>
                            <label style="margin-right: 5px;">:</label>
                            <label style="margin-right: 10px;">
                                <?= $ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_6'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Simarc   :
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 91px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_8'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Lama penggunaan
                            </label>
                            <label style="margin-right: 5px;">:</label>
                            <label style="margin-right: 10px;">
                                <?= $ttd_riwayatpengob_cptdi['riwayatpengob_cptdi_9'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">5.</td>
                        <td width="20%" style="border: none;">Riwayat alergi</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatalergi_cptdi['riwayatalergi_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak ada
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_riwayatalergi_cptdi['riwayatalergi_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Sebutkan
                            </label>
                            <label style="margin-right: 5px;"> : 
                                <?= $ttd_riwayatalergi_cptdi['riwayatalergi_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">6.</td>
                        <td width="20%" style="border: none;">Tanda-tanda vital</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">Tekanan darah :
                                <?= $ttd_ttv_cptdi['ttv_cptdi_1'] ?? '' ?> mmHg
                            </label>
                            <label style="margin-right: 20px;"></label>
                            <label style="margin-right: 20px;"> Nadi : 
                                <?= $ttd_ttv_cptdi['ttv_cptdi_2'] ?? '' ?> x/menit
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">Pernapasan  :
                                <?= $ttd_ttv_cptdi['ttv_cptdi_3'] ?? '' ?> x/menit
                            </label>
                            <label style="margin-right: 30px;"></label>
                            <label style="margin-right: 20px;"> Saturasi : 
                                <?= $ttd_ttv_cptdi['ttv_cptdi_4'] ?? '' ?> %
                            </label>
                        </td>
                    </tr>

                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">10.</td>
                        <td width="20%" style="border: none;">Tes Allen</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Kanan Radialis kanan, kondisi :
                                <input type="checkbox" <?= ($ttd_testalent_cptdi['testalent_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_testalent_cptdi['testalent_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Kiri Radialis kiri, kondisi :
                                <input type="checkbox" <?= ($ttd_testalent_cptdi['testalent_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 65px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_testalent_cptdi['testalent_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat 
                            </label>
                        </td>
                    </tr> -->

                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">11.</td>
                        <td width="20%" style="border: none;">Arteri Dorsalis Pedis</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Pedis kanan, kondisi :
                                <input type="checkbox" <?= ($ttd_arteridor_cptdi['arteridor_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_arteridor_cptdi['arteridor_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat 
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Pedis kiri, kondisi :
                                <input type="checkbox" <?= ($ttd_arteridor_cptdi['arteridor_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 51px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_arteridor_cptdi['arteridor_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat 
                            </label>
                        </td>
                    </tr> -->

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">7.</td>
                        <td width="20%" style="border: none;">Berat badan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <?= $ttd_bb_cptdi; ?> kg
                            </label>
                            <label style="margin-right: 20px;">
                                Tinggi badan :  <?= $ttd_tb_cptdi; ?> cm
                            </label>
                        </td>
                    </tr>

                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">13.</td>
                        <td width="20%" style="border: none;">Keluhan nyeri</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Lokasi
                            </label>
                            <label style="margin-right: 5px;"> : 
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pencetus nyeri (P)</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_4'] ?? '' ?>
                            </label>
                            <label style="margin-right: 5px;"></label>
                            <label style="margin-right: 20px;"> Skala (S) : 
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_5'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Kualitas (Q) </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_6'] ?? '' ?>
                            </label>
                            <label style="margin-right: 5px;"></label>
                            <label style="margin-right: 20px;"> Lamanya (T) : 
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_7'] ?? '' ?> Menit
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Penjalaran (R) </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_8'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, Ke
                            </label>
                            <label style="margin-right: 5px;"> : 
                                <?= $ttd_keluhannyeri_cptdi['keluhannyeri_cptdi_10'] ?? '' ?>
                            </label>
                        </td>
                    </tr> -->

                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">14.</td>
                        <td width="20%" style="border: none;">Kebutuhan edukasi </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Obat-obatan 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Diet dan nutrisi 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Diagnosis dan manajemen  
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Perawatan luka  
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Rehabilitasi  
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Manajemen nyeri  
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> Diagnostik non invasif 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_8'] ?? 0) == 1 ? 'checked' : '' ?>> Intervensi non bedah  
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> Lain-lain   
                            </label>
                            <label style="margin-right: 5px;">
                                <?= $ttd_kebutuhanedu_cptdi['kebutuhanedu_cptdi_10'] ?? '' ?>
                            </label>
                        </td>
                    </tr> -->


                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">8.</td>
                        <td width="20%" style="border: none;">Laboratorium</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Hb :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_1'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"> Ur :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_2'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Ht :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_3'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"> Cr :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_4'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Leukosit :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_5'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"> HbSag : 
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_6'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Elektrolit :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_7'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"> PT/APTT : 
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_8'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Tropt T :
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_9'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"> GDS : 
                                <?= $ttd_labroturiem_cptdi['labroturiem_cptdi_10'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">16.</td>
                        <td width="20%" style="border: none;">Skrining jatuh </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;"> Skor :
                                <?= $ttd_skrining_cptdi['skrining_cptdi_1'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_skrining_cptdi['skrining_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Risiko tinggi
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_skrining_cptdi['skrining_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Risiko rendah 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_skrining_cptdi['skrining_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Risiko sedang
                            </label>
                        </td>
                    </tr> -->

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">9.</td>
                        <td width="20%" style="border: none;">Hasil Echo </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_hasilecho_cptdi['hasilecho_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak ada 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_hasilecho_cptdi['hasilecho_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> ada, Kesan  : 
                                <?= $ttd_hasilecho_cptdi['hasilecho_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;">10.</td>
                        <td width="20%" style="border: none;">Hasil TMT/ MSCT </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_hasitmt_cptdi['hasitmt_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak ada 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_hasitmt_cptdi['hasitmt_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> ada, Kesan  : 
                                <?= $ttd_hasitmt_cptdi['hasitmt_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></b></td>
                        <td colspan="8" style="border: none;"><b>Masalah keperawatan</b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Penurunan curah jantung (D.0003)
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Nyeri Akut (D.0077) 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Risiko perdarahan (D.0012)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Penurunan perfusi jaringan (D.0009)
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Risiko infeksi (D.0142) 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_mskep_cptdi['mskep_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Anxietas (D.0080)
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></b></td>
                        <td colspan="8" style="border: none;"><b>Rencana tindakan keperawatan (mandiri)</b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Monitor tanda tanda vital 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Manajemen nyeri
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Monitoring perdarahan
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Monitoring perubahan Kesadaran 
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Monitor tanda dan gejala infeksi
                            </label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Ajarkan Teknik Relaksasi
                            </label>
                        </td>
                    </tr>
                     <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> &nbsp;&nbsp;
                                <?= $ttd_rctindkep_cptdi['rctindkep_cptdi_8'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> &nbsp;&nbsp;
                                <?= $ttd_rctindkep_cptdi['rctindkep_cptdi_10'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_rctindkep_cptdi['rctindkep_cptdi_11'] ?? 0) == 1 ? 'checked' : '' ?>> &nbsp;&nbsp;
                                <?= $ttd_rctindkep_cptdi['rctindkep_cptdi_12'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="2" style="border: none;">
							<?php
							// Array nama hari dan bulan dalam bahasa Indonesia
							$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
							$bulan = [
								1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
								'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
							];

							// Tanggal contoh
							$tanggal = strtotime($ttd_tanggaljam_cptdi);

							// Format tanggal manual
							$nama_hari = $hari[date('w', $tanggal)];
							$tgl = date('d', $tanggal);
							$nama_bulan = $bulan[(int)date('m', $tanggal)];
							$tahun = date('Y', $tanggal);
							$jam_menit = date('H:i', $tanggal);

							?>
							<div>
								Tangerang, <b><?= "$nama_hari, $tgl $nama_bulan $tahun, Jam : $jam_menit" ?></b>
							</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="2" style="border: none;">
                            <div>
								<?php if (!empty($ttd_perawat_1)) :
									echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ttd_perawat_1 . '" alt="ttd-dokter" width="200"><br>';
								else :
									echo '<br><br><br><br><br>';
								endif;
								?>

								( <?= $ttd_perawat_cptdi; ?>)<br>
								Nama jelas dan tanda tangan
							</div>
                        </td>
                    </tr>

                </table>
                <br><br>

                <!-- INI UNTUK SPASI PADA KERTAS A 4 -->
                <!-- <style>
                    @media print {
                        .print-page {
                            page-break-before: always;
                        }
                        .print-page:first-child {
                            page-break-before: auto;
                        }
                    }
                </style> -->

                <!-- INI UNTUK SPASI PADA KERTAS A 4 -->
                <!-- <table class="table table-mini table-striped table-bordered" style="page-break-before: always;"> -->
                <table class="big__line__spacing small__font" style="border-collapse: no__border; width: 100%;">
                    <tr>
                        <th class="table__big-title" colspan="10" style="background-color: #B0E0E6; color: black; padding-top: 0px; padding-bottom: 0px;">
                            OBSERVASI INTRA DAN PASKA TINDAKAN
                        </th>
                    </tr>
                    <tr>
                        <th class="center-title" colspan="10">
                            Observasi dimulai dari intra sampai paska tindakan (Observasi setiap 5 sd 15 menit)<br>
                            Observasi paska tindakan 15 menit selama 1 jam pertama, dilanjutkan 30 menit selama 1 jam kedua dan setiap 1 jam selama 2 jam
                            (sesuai kebutuhan)
                        </th>
                    </tr>
                </table>

                <table class="big__line__spacing small__font" style="border: 1px solid black; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); width: 100%;">
                    <div id="grafik_observasi" style="width: 100%; max-width: 735px; height: 400px; border: 1px solid black; background-color: #f4f4f4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);"></div>
                    <script>
                        const bloodpressure = JSON.parse('<?= json_encode($ttd_bloodpressure_cptdi); ?>').map(parseFloat);
                        const nadipulse     = JSON.parse('<?= json_encode($ttd_nadipulse_cptdi); ?>').map(parseFloat);
                        const pernafasan    = JSON.parse('<?= json_encode($ttd_pernafasan_cptdi); ?>').map(parseFloat);
                        const suhu          = JSON.parse('<?= json_encode($ttd_suhu_cptdi); ?>').map(parseFloat);
                        const jamgo         = JSON.parse('<?= json_encode($ttd_jamgo_cptdi); ?>');
                        const tglgo         = JSON.parse('<?= json_encode($ttd_tglgo_cptdi); ?>');
                        Highcharts.chart('grafik_observasi', {
                            title: {
                                text: 'TANDA VITAL',
                                style: { fontSize: '12px', fontWeight: 'bold', color: '#333' }
                            },
                            chart: {
                                height: '400px',
                                type: 'spline',
                                backgroundColor: '#ffffff', // ini untuk bagrounnya
                                borderColor: '#ccc',
                                borderWidth: 1,
                                plotShadow: true,
                                plotBorderWidth: 1,
                                plotBorderColor: '#ccc',
                                shadow: {
                                    color: 'rgba(0, 0, 0, 0.1)', // garis pinggiran kotak
                                    offsetX: 3,
                                    offsetY: 3,
                                    opacity: 0.7,
                                    width: 5
                                },
                                animation: {
                                    duration: 1000,
                                    easing: 'easeOutBounce'
                                }
                            },

                            // INI tanggal sama jamnya di bawah
                            xAxis: {
                                min: 0,
                                max: 25,
                                tickInterval: 1, // garis tiap jam
                                gridLineWidth: 1,
                                gridLineColor: '#d1d1d1', // warna abu tipis
                                labels: {
                                    formatter: function () {
                                        if (this.value >= 0 && this.value < jamgo.length && this.value < tglgo.length) {
                                            return `<span style="font-size: 8px; color: #000;">${jamgo[this.value]} - ${tglgo[this.value]}</span>`;
                                        }
                                        return '';
                                    },
                                    useHTML: true,
                                    rotation: 45,
                                    style: {
                                        fontSize: '8px',
                                        color: '#000',
                                        whiteSpace: 'nowrap' // mencegah pemotongan teks jadi "10:15…"
                                    }
                                },
                                startOnTick: true,
                                endOnTick: false,
                                minPadding: 0,
                                maxPadding: 0
                            },

                            yAxis: {
                                min: 0,
                                max: 200,
                                tickInterval: 20,
                                title: { text: '', useHTML: true },
                                lineWidth: 2,
                                labels: {
                                    useHTML: true,
                                    formatter: function () {
                                        const val = this.value;
                                        const mapping = {
                                            200: { BP: 200, N: 200, P: 44, S: 40 },
                                            180: { BP: 180, N: 180, P: 40, S: 39 },
                                            160: { BP: 160, N: 160, P: 32, S: 38 },
                                            140: { BP: 140, N: 140, P: 28, S: 37 },
                                            120: { BP: 120, N: 120, P: 24, S: 36 },
                                            100: { BP: 100, N: 100, P: 20, S: 35 },
                                            80:  { BP: 80,  N: 80,  P: 16, S: 34 },
                                            60:  { BP: 60,  N: 60,  P: 12, S: 33 },
                                            40:  { BP: 40,  N: 40,  P: 8,  S: 32 },
                                            20:  { BP: 20,  N: 20,  P: 4,  S: 31 },
                                            0:   { BP: 0,   N: 0,   P: 0,  S: 0 }
                                        };

                                        if (mapping[val]) {
                                            const row = mapping[val];
                                            return `
                                                <div style="text-align:center; width:100px; margin:auto;">
                                                    ${val === 200 ? `
                                                        <div style="display:flex; justify-content:space-between; font-size:10px; font-weight:bold;">
                                                            <span style="color:black;">BP</span>
                                                            <span style="color:red;">N</span>
                                                            <span style="color:green;">P</span>
                                                            <span style="color:blue;">S</span>
                                                        </div>` : ''}
                                                    <div style="display:flex; justify-content:space-between;">
                                                        <span style="color:black;">${row.BP}</span>
                                                        <span style="color:red;">${row.N}</span>
                                                        <span style="color:green;">${row.P}</span>
                                                        <span style="color:blue;">${row.S}</span>
                                                    </div>
                                                </div>`;
                                        }
                                        return null;
                                    },
                                    style: {
                                        fontSize: '10px',
                                        fontWeight: 'bold',
                                        color: '#000'
                                    }
                                },
                                gridLineWidth: 1,
                                gridLineColor: '#817d7dff' // ini untuk garis yamping 
                            },

                            series: [
                                {
                                    name: '<span style="font-size:10px;">BP</span>',
                                    data: bloodpressure,
                                    marker: { symbol: 'circle', radius: 3 },
                                    lineWidth: 1,
                                    shadow: true,
                                    color: '#000000',
                                    pointStart: 0,
                                    pointInterval: 1
                                },
                                {
                                    name: '<span style="font-size:10px;">N</span>',
                                    data: nadipulse,
                                    marker: { symbol: 'circle', radius: 3 },
                                    lineWidth: 1,
                                    shadow: true,
                                    color: '#e70c0cff',
                                    pointStart: 0,
                                    pointInterval: 1
                                },
                                {
                                    name: '<span style="font-size:10px;">P</span>',
                                    data: pernafasan,
                                    marker: { symbol: 'circle', radius: 3 },
                                    lineWidth: 1,
                                    shadow: true,
                                    color: '#0cdd0cff',
                                    pointStart: 0,
                                    pointInterval: 1
                                },
                                {
                                    name: '<span style="font-size:10px;">S</span>',
                                    data: suhu,
                                    marker: { symbol: 'circle', radius: 3 },
                                    lineWidth: 1,
                                    shadow: true,
                                    color: '#3b0be8ff',
                                    pointStart: 0,
                                    pointInterval: 1
                                }
                            ],

                            tooltip: {
                                headerFormat: '<b>{series.name}</b><br>',
                                pointFormat: '{point.y}',
                                backgroundColor: 'rgba(255,255,255,0.95)',
                                borderColor: '#ccc',
                                borderRadius: 8,
                                style: { fontSize: '10px' },
                                shadow: true
                            },
                            legend: {
                                enabled: true,
                                itemStyle: { fontSize: '12px', fontWeight: 'bold' }
                            },
                            plotOptions: {
                                series: {
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.y}',
                                        style: {
                                            fontSize: '8px',
                                            color: '#000000',
                                            textOutline: '1px contrast'
                                        }
                                    },
                                    marker: {
                                        enabled: true,
                                        radius: 4,
                                        states: {
                                            hover: {
                                                enabled: true,
                                                radius: 6
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </table>

                <table class="big__line__spacing small__font" style="border-none: no__border; width: 100%;">
                    <tr>
                        <td colspan="10" style="border: none;"><b></b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Saturasi oksigen</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <td style="border: 1px solid #ccc; padding: 5px;">
                                            <?= $ttd_saturasy_cptdi["saturasy_cptdi_$i"] ?? '' ?>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            </table>
                        </td>
                    </tr>                 
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pulsasi distal</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <td style="border: 1px solid #ccc; padding: 5px;">
                                            <?= $ttd_pulsasi_cptdi["pulsasi_cptdi_$i"] ?? '' ?>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            </table>
                        </td>
                    </tr>                 
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Reflek menelan</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <td style="border: 1px solid #ccc; padding: 5px;">
                                            <?= $ttd_reflek_cptdi["reflek_cptdi_$i"] ?? '' ?>
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            </table>
                        </td>
                    </tr>                 
                </table>

				<table class="big__line__spacing small__font" style="border-none: no__border; width: 100%;">
                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pasien tiba di RR jam</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <?= $ttd_pasientiba_cptdi['pasientiba_cptdi_1'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"></label>
                            <label style="margin-right: 20px;"> Lokasi pungsi / sayatan : 
                                <?= $ttd_pasientiba_cptdi['pasientiba_cptdi_2'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;"></label>
                            <label style="margin-right: 20px;"> Jumlah : 
                                <?= $ttd_pasientiba_cptdi['pasientiba_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr> -->
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pasien tiba di RR jam</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <?= $ttd_pasientiba_cptdi['pasientiba_cptdi_1'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Terpasang sheath</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_terpasang_cptdi['terpasang_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Ya
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_terpasang_cptdi['terpasang_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak, 
                            </label>
                            <label style="margin-right: 5px;"> Lokasi : 
                                <?= $ttd_terpasang_cptdi['terpasang_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>


                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pulsasi A. Radialis </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Kanan  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat  
                            </label>
                            <label style="margin-right: 35px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Kiri  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasia_cptdi['pulsasia_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat  
                            </label>
                        </td>
                    </tr> -->



                    <!-- <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Pulsasi A. Dorsalis Pedis </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Kanan  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat  
                            </label>
                            <label style="margin-right: 35px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Kiri  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Adekuat  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_pulsasidor_cptdi['pulsasidor_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak adekuat  
                            </label>
                        </td>
                    </tr> -->



                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Alat yang terpasang </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> IV. Cath   
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Dowercath/Kondom  
                            </label>
                            <label style="margin-right: 20px;"></label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> IABP
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Ventilator  
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> TPM    
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> PPM  
                            </label>
                            <label style="margin-right: 5px;"></label>
                            <label style="margin-right: 5px;">
                                <input type="checkbox" <?= ($ttd_alatyt_cptdi['alatyt_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> 
                            </label>
                            <label style="margin-right: 20px;"> Lain-lain : 
                                <?= $ttd_alatyt_cptdi['alatyt_cptdi_8'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Jenis anestesi </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_jenisanest_cptdi['jenisanest_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Umum 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_jenisanest_cptdi['jenisanest_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Lokal  
                            </label>
                            <label style="margin-right: 10px;"></label>
                            <label style="margin-right: 20px;">Dosis pemberian</label>
                            <label style="margin-right: 10px;"> Pre prosedur : 
                                <?= $ttd_jenisanest_cptdi['jenisanest_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 58px;"></label>
                            <label style="margin-right: 50px;"></label>
                            <label style="margin-right: 50px;"> intra prosedur : 
                                <?= $ttd_jenisanest_cptdi['jenisanest_cptdi_4'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 58px;"></label>
                            <label style="margin-right: 50px;"></label>
                            <label style="margin-right: 50px;"> Post  prosedur : 
                                <?= $ttd_jenisanest_cptdi['jenisanest_cptdi_5'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Sedasi</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 5px;"> 
                              <?= $ttd_sedasi_cptdi; ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Antikoagulan </td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_antikoagulan_cptdi['antikoagulan_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Umum 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_antikoagulan_cptdi['antikoagulan_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Lokal  
                            </label>
                            <label style="margin-right: 10px;"></label>
                            <label style="margin-right: 20px;">Dosis pemberian</label>
                            <label style="margin-right: 10px;"> Pre prosedur : 
                                <?= $ttd_antikoagulan_cptdi['antikoagulan_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 58px;"></label>
                            <label style="margin-right: 50px;"></label>
                            <label style="margin-right: 50px;"> intra prosedur : 
                                <?= $ttd_antikoagulan_cptdi['antikoagulan_cptdi_4'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 70px;"></label>
                            <label style="margin-right: 58px;"></label>
                            <label style="margin-right: 50px;"></label>
                            <label style="margin-right: 50px;"> Post  prosedur : 
                                <?= $ttd_antikoagulan_cptdi['antikoagulan_cptdi_5'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Hematoma</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_hematoma_cptdi['hematoma_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_hematoma_cptdi['hematoma_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya,   
                            </label>
                            <label style="margin-right: 10px;"> Lokasi : 
                                <?= $ttd_hematoma_cptdi['hematoma_cptdi_3'] ?? '' ?>
                            </label>
                            <label style="margin-right: 10px;">Ukuran</label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_hematoma_cptdi['hematoma_cptdi_4'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Leserasi</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_leserasi_cptdi['leserasi_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_leserasi_cptdi['leserasi_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya,   
                            </label>
                            <label style="margin-right: 10px;"> Lokasi : 
                                <?= $ttd_leserasi_cptdi['leserasi_cptdi_3'] ?? '' ?>
                            </label>
                            <label style="margin-right: 10px;">Ukuran</label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_leserasi_cptdi['leserasi_cptdi_4'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Reaksi alergi</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_reaksif_cptdi['reaksif_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Tidak 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_reaksif_cptdi['reaksif_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Ya, 
                                <?= $ttd_reaksif_cptdi['reaksif_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="10" style="border: none;"><b></b>Keseimbangan cairan</td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Intake</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;"> Minum
                                <?= $ttd_intaker_cptdi['intaker_cptdi_1'] ?? '' ?> ml
                            </label>
                            <label style="margin-right: 30px;"></label>
                            <label style="margin-right: 30px;">Output : Perdarahan</label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_intaker_cptdi['intaker_cptdi_2'] ?? '' ?> ml
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;"> IV Line
                                <span style="border-bottom: 1px solid #000; padding: 0 2px;">
                                    <?= $ttd_intaker_cptdi['intaker_cptdi_3'] ?? '' ?>
                                </span> ml
                            </label>
                            <label style="margin-right: 106px;"></label>
                            <label style="margin-right: 30px;">Urin</label>
                            <label style="margin-right: 20px;">
                                <span style="border-bottom: 1px solid #000; padding: 0 2px;">
                                    <?= $ttd_intaker_cptdi['intaker_cptdi_4'] ?? '' ?>
                                </span> ml
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;"></td>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 36px;"></label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_intaker_cptdi['intaker_cptdi_5'] ?? '' ?> ml
                            </label>
                            <label style="margin-right: 106px;"></label>
                            <label style="margin-right: 30px;"></label>
                            <label style="margin-right: 23px;"></label>
                            <label style="margin-right: 20px;">
                                <?= $ttd_intaker_cptdi['intaker_cptdi_6'] ?? '' ?> ml
                            </label>
                        </td>
                    </tr>

                    <!-- <tr>
                        <td colspan="10" style="border: none;"><b>Instruksi paska tindakan</b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Immobilisasi sampai jam</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;">
                                <?= $ttd_imobil_cptdi['imobil_cptdi_1'] ?? '' ?> (6 -7 jam paska anestesi spinal)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">EKG</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;">
                                <?= $ttd_imobil_cptdi['imobil_cptdi_2'] ?? '' ?>
                            </label>
                            <label style="margin-right: 23px;"></label>
                            <label style="margin-right: 20px;">Foto Rontgen : 
                                <?= $ttd_imobil_cptdi['imobil_cptdi_3'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Antibiotik</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;">
                                <?= $ttd_imobil_cptdi['imobil_cptdi_4'] ?? '' ?>
                            </label>
                            <label style="margin-right: 23px;"></label>
                            <label style="margin-right: 20px;">Dosis : 
                                <?= $ttd_imobil_cptdi['imobil_cptdi_5'] ?? '' ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td width="20%" style="border: none;">Hidrasi</td>
                        <td width="1%" style="border: none;">:</td>
                        <td colspan="6" style="border: none;">  
                            <label style="margin-right: 20px;">
                                <?= $ttd_imobil_cptdi['imobil_cptdi_6'] ?? '' ?>
                            </label>
                        </td>
                    </tr> -->

                    <tr>
                        <td colspan="10" style="border: none;"><b>Masalah keperawatan</b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Hipotermi (D.0131) 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Nyeri Akut (D.0077)  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Resiko perdarahan (D.0012)
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Penurunan perfusi jaringan (D.0009)
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Resiko infeksi (D.0142)   
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Gangguan mobilitas fisik (D.0054)
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>>
                                <?= $ttd_maskeptan_cptdi['maskeptan_cptdi_8'] ?? '' ?>
                            </label>
                            <label style="margin-right: 75px;"></label>
                            <label style="margin-right: 50px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>>
                                <?= $ttd_maskeptan_cptdi['maskeptan_cptdi_10'] ?? '' ?>
                            <label style="margin-right: 75px;"></label>
                            <label style="margin-right: 50px;">
                                <input type="checkbox" <?= ($ttd_maskeptan_cptdi['maskeptan_cptdi_11'] ?? 0) == 1 ? 'checked' : '' ?>>
                                <?= $ttd_maskeptan_cptdi['maskeptan_cptdi_12'] ?? '' ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="10" style="border: none;"><b>Rencana tindakan keperawatan (mandiri)</b></td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_1'] ?? 0) == 1 ? 'checked' : '' ?>> Berijkan selimut / blankat warmer  
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_2'] ?? 0) == 1 ? 'checked' : '' ?>> Manajemen Nyeri 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_3'] ?? 0) == 1 ? 'checked' : '' ?>> Monitoring perdarahan
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_4'] ?? 0) == 1 ? 'checked' : '' ?>> Monitoring perubahan kesadaran 
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_5'] ?? 0) == 1 ? 'checked' : '' ?>> Monitoring tanda dan gejala infeksi   
                            </label>
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_6'] ?? 0) == 1 ? 'checked' : '' ?>> Bantu pasien melakukan ambulasi
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;">
                            <label style="margin-right: 20px;">
                                <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_7'] ?? 0) == 1 ? 'checked' : '' ?>> 
                                <?= $ttd_tdmandiri_cptdi['tdmandiri_cptdi_8'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;">
                                 <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_9'] ?? 0) == 1 ? 'checked' : '' ?>> 
                                <?= $ttd_tdmandiri_cptdi['tdmandiri_cptdi_10'] ?? '' ?>
                            </label>
                            <label style="margin-right: 20px;">
                                 <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_11'] ?? 0) == 1 ? 'checked' : '' ?>> 
                                <?= $ttd_tdmandiri_cptdi['tdmandiri_cptdi_12'] ?? '' ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" style="border: none;"></td>
                        <td colspan="6" style="border: none;"> Keputusan Rawat : 
                            <label style="margin-right: 20px;">
                                 <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_13'] ?? 0) == 1 ? 'checked' : '' ?>>  ODC   
                            </label>
                            <label style="margin-right: 20px;">
                                 <input type="checkbox" <?= ($ttd_tdmandiri_cptdi['tdmandiri_cptdi_14'] ?? 0) == 1 ? 'checked' : '' ?>> Dirawat di 
                                <?= $ttd_tdmandiri_cptdi['tdmandiri_cptdi_15'] ?? '' ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="2" style="border: none;">
							<?php
							// Array nama hari dan bulan dalam bahasa Indonesia
							$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
							$bulan = [
								1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
								'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
							];

							// Tanggal contoh
							$tanggal = strtotime($ttd_tanggaljagm_cptdi);

							// Format tanggal manual
							$nama_hari = $hari[date('w', $tanggal)];
							$tgl = date('d', $tanggal);
							$nama_bulan = $bulan[(int)date('m', $tanggal)];
							$tahun = date('Y', $tanggal);
							$jam_menit = date('H:i', $tanggal);

							?>
							<div>
								Tangerang, <b><?= "$nama_hari, $tgl $nama_bulan $tahun, Jam : $jam_menit" ?></b>
							</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="3" style="border: none;"></td>
                        <td class="center" colspan="2" style="border: none;">
                            <div>
								<?php if (!empty($ttd_perawat_2)) :
									echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ttd_perawat_2 . '" alt="ttd-dokter" width="200"><br>';
								else :
									echo '<br><br><br><br><br>';
								endif;
								?>

								( <?= $ttd_perawatobsser_cptdi; ?>)<br>
								Nama jelas dan tanda tangan
							</div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-DIG-04-00</p>
        </div>
    </footer>	
</body>								
<?php die; ?>
