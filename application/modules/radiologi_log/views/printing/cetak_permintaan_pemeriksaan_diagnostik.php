<!-- // PPDRAD -->
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

<body onload="window.print()">
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
						<p class="identity">: <b><?= $pasien->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki'; ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</header>
	<br><br>

    <!--=============== MAIN ===============-->
	<main class="main">
		<section class="cpp">
			<br>
			<div class="cpp__container container">
			    <tr>
					<td style="padding-top: 10px;" class="no__border" colspan="4">
						<small style="font-size: 15px; font-weight: bold;">PERMINTAAN PEMERIKSAAN DIAGNOSTIK</small>
					</td>
				</tr>
				<br><br>

				<table class="big__line__spacing small__font">
					<tbody>
						<tr>
							<td class="no__border" width="25%"><b>Kode Dokter Pengirim</b></td>
							<td class="no__border" width="1%"><b>:</b></td>
							<td class="no__border" width="50%"><?= $pemeriksaan_diagnostik->kode_pengirim_ppd; ?></td> 
						</tr>
						<tr>
							<td class="no__border" width="25%"><b>Kode Konsultan</b></td>
							<td class="no__border" width="1%"><b>:</b></td>
							<td class="no__border" width="50%"><?= $pemeriksaan_diagnostik->kode_konsultan_ppd; ?> &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp;No. Formulir : &ensp; <?= $pemeriksaan_diagnostik->no_formulir_ppd; ?></td>
						</tr>
						<tr>
							<td class="no__border" width="25%"><b>Permohonan yang diminta, harap dicoret </b></td>
							<td class="no__border" width="1%"><b>:</b></td>
							<td class="no__border" width="50%"><input type="checkbox" <?= $pemeriksaan_diagnostik->cito_ppd == '1' ? 'checked' : ''; ?>> cito &ensp; &ensp; &ensp; <input type="checkbox" <?= $pemeriksaan_diagnostik->biasa_ppd == '1' ? 'checked' : ''; ?>> biasa</td>
						</tr>
						<tr>
							<td class="no__border" width="25%"><b></b></td>
							<td class="no__border" width="1%"><b></b></td>
							<td class="no__border" width="50%"><input type="checkbox" <?= $pemeriksaan_diagnostik->hasil_ppd == '1' ? 'checked' : ''; ?>> Hasil yang diserahkan ke Dokter &ensp; &ensp; &ensp; <input type="checkbox" <?= $pemeriksaan_diagnostik->hasil_yg_ppd == '1' ? 'checked' : ''; ?>> Hasil yang diserahkan ke Pasien</td>
						</tr>
						<tr>
							<td class="no__border" width="25%"><b>Diagnose / Keterangan klinik</b></td>
							<td class="no__border" width="1%"><b>:</b></td>
							<td class="no__border" width="50%"><?= $pemeriksaan_diagnostik->diagnose_ppd; ?></td> 
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">ENDOSKOPI</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->gasturoduodenoskopi_ppd == '1' ? 'checked' : ''; ?>> Gasturoduodenoskopi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->endosonografi_ppd == '1' ? 'checked' : ''; ?>> Endosonografi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ercp_ppd == '1' ? 'checked' : ''; ?>> ERCP + Papilotomi</td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->kolonoskopi_ppd == '1' ? 'checked' : ''; ?>> Kolonoskopi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->polipektomi_ppd == '1' ? 'checked' : ''; ?>> Polipektomi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ligasi_ppd == '1' ? 'checked' : ''; ?>> Ligasi hemorrhoid</td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->rektosigmoidoskopi_ppd == '1' ? 'checked' : ''; ?>>  Rektosigmoidoskopi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->sklero_ppd == '1' ? 'checked' : ''; ?>> Sklero - Terapi</td>
							<td class="no__border" width="25%"></td>					
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">USG</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">USG</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">USG</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->kepela_ppd == '1' ? 'checked' : ''; ?>> Kepala</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->muskuloskeletel_ppd == '1' ? 'checked' : ''; ?>> Muskuloskeletel ( anak )</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->wrist_ppd == '1' ? 'checked' : ''; ?>> Wrist Joint ka/ki</td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->guilding_ppd == '1' ? 'checked' : ''; ?>> Guilding</td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->thyroid_ppd == '1' ? 'checked' : ''; ?>> Thyroid</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->abdomen_ppd == '1' ? 'checked' : ''; ?>> Abdomen Bawah</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->knee_ppd == '1' ? 'checked' : ''; ?>> Knee Joint ka/ki</td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->mammaei_ppd == '1' ? 'checked' : ''; ?>>  Mammae</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->jantungg_ppd == '1' ? 'checked' : ''; ?>> Jantung</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->calcaneus_ppd == '1' ? 'checked' : ''; ?>> Calcaneus ka/ki</td>
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->whole_ppd == '1' ? 'checked' : ''; ?>>  Whole Abdomen</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ginekologii_ppd == '1' ? 'checked' : ''; ?>>  Ginekologi-Obstetri/Genitalia</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->kepalai_ppd == '1' ? 'checked' : ''; ?>>  Kepala (bayi)</td>
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->appendix_ppd == '1' ? 'checked' : ''; ?>>  Whole Abdomen Appendix</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->extremitass_ppd == '1' ? 'checked' : ''; ?>>  Extremitas</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->abdomenr_ppd == '1' ? 'checked' : ''; ?>>  Abdomen (bayi)</td>
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->abdomen_atas_ppd == '1' ? 'checked' : ''; ?>>  Abdomen Atas</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->shoulder_ppd == '1' ? 'checked' : ''; ?>>  Shoulder Joint ka/ki</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->hip_ppd == '1' ? 'checked' : ''; ?>>  Hip joint (bayi)</td>
							<td class="no__border" width="25%"></td>					
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">USG DOPPLER</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->vertebralis_ppd == '1' ? 'checked' : ''; ?>> Carolis-Vertebralis (leher)</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->mammaeo_ppd == '1' ? 'checked' : ''; ?>> Mammae</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->kgb_ppd == '1' ? 'checked' : ''; ?>> KGB</td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->tcd_ppd == '1' ? 'checked' : ''; ?>> TCD</td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->heper_ppd == '1' ? 'checked' : ''; ?>> Heper</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->exxtremitas_ppd == '1' ? 'checked' : ''; ?>> 1. Extremitas (arteri)</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->sofft_ppd == '1' ? 'checked' : ''; ?>> Soft Tissue</td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ginjal_ppd == '1' ? 'checked' : ''; ?>>  Ginjal</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->venaa_ppd == '1' ? 'checked' : ''; ?>> 2. Extremitas (vena)</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->scrotum_ppd == '1' ? 'checked' : ''; ?>> Scrotum</td>
							<td class="no__border" width="25%"></td>					
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">USG 3D - 40</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>					
							<td class="no__border" width="100%"><?= $pemeriksaan_diagnostik->usg3d_ppd; ?></td>					
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">PULMONOLOGI</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->faal_ppd == '1' ? 'checked' : ''; ?>> Faal Paru Rutin</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->bronkoskopi_ppd == '1' ? 'checked' : ''; ?>> Bronkoskopi + Biopsi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->bunksi_ppd == '1' ? 'checked' : ''; ?>> Bunksi Pleura</td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->testt_ppd == '1' ? 'checked' : ''; ?>> Test Alergi</td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->fallparu_ppd == '1' ? 'checked' : ''; ?>> Faal Paru lengkap</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->bronkoskeopi_ppd == '1' ? 'checked' : ''; ?>> Bronkoskopi + Biopsi +</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->pleura_ppd == '1' ? 'checked' : ''; ?>> Biopsi Pleura</td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->bronkoskmopi_ppd == '1' ? 'checked' : ''; ?>>  Bronkoskopi</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->gguidance_ppd == '1' ? 'checked' : ''; ?>> TV Guidance</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->transthorakal_ppd == '1' ? 'checked' : ''; ?>> Biopsi Aspirasi Transthorakal</td>
							<td class="no__border" width="25%"></td>					
						</tr>
					</thead>
				</table>
				
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">NEUROLOGI</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">T.H.T</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;">KARDIOLOGI</td>
							<td class="no__border" width="25%" style="background-color: #C0C0C0; color: black; font-size: 10px; padding: 1px; font-weight: bold;"></td>
						</tr>
					</thead>
				</table>
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->eeg_ppd == '1' ? 'checked' : ''; ?>> E.E.G</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->audiometri_ppd == '1' ? 'checked' : ''; ?>> Audiometri</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->treadmili_ppd == '1' ? 'checked' : ''; ?>> Treadmili test</td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->erchokardiografi_ppd == '1' ? 'checked' : ''; ?>> Echokardiografi + Doppler (berwarna)</td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->emg_ppd == '1' ? 'checked' : ''; ?>> E.M.G</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->eng_ppd == '1' ? 'checked' : ''; ?>> ENG</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ekg_ppd == '1' ? 'checked' : ''; ?>> E.K.G</td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->ekchokardiografi_ppd == '1' ? 'checked' : ''; ?>> Echokardiografi + Doppler</td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->impedans_ppd == '1' ? 'checked' : ''; ?>>  Impedans</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->hotelekg_ppd == '1' ? 'checked' : ''; ?>> Hotel EKG</td>
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->eecp_ppd == '1' ? 'checked' : ''; ?>> EECP</td>
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->hotelekig_ppd == '1' ? 'checked' : ''; ?>> Hotel EKG</td>
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"><input type="checkbox" <?= $pemeriksaan_diagnostik->kathererisasi_ppd == '1' ? 'checked' : ''; ?>> Kathererisasi Jantung</td>
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
						</tr>
						<tr>
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
							<td class="no__border" width="25%"></td>					
						</tr>
					</thead>
				</table>
				
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="no__border" width="30%"></td>
							<td class="no__border" width="30%"></td>
							<td class="no__border" width="30%">Tangerang, 
								<small><?= $pemeriksaan_diagnostik->tanggal_ppd ? datefmysql($pemeriksaan_diagnostik->tanggal_ppd) : '-' ?></small>
							</td>
						</tr>
						<tr>
							<td class="no__border" width="30%"></td>
							<td class="no__border" width="30%"></td>
							<td class="no__border" width="30%">Pukul  :   
								<small><?= $pemeriksaan_diagnostik->pukul_ppd ? date('H:i', strtotime($pemeriksaan_diagnostik->pukul_ppd)) : '-' ?></small>
								<br><br>Dokter Pengirim,
							</td>
						</tr>
						
						<tr>
							<td class="no__border" width="30%"></td>
							<td class="no__border" width="30%"></td>
							<td class="no__border" style="text-align: center;" width="30%"> <br>
								<?php if($pemeriksaan_diagnostik->tanda_tangan): ?>
									<img src="<?= resource_url().'images/ttd_dokter/'.$pemeriksaan_diagnostik->tanda_tangan; ?>" alt="ttd-dokter" width="110">
								<?php else: ?>
								<?php endif ?>
                                <br>
                                <!-- <br><br><br><br> pakek ini kalau ga pakai ttd otomatis -->
								<small> ( <?= $pemeriksaan_diagnostik->nama_dokter; ?> )</small>
							</td>
						</tr>
					</thead>
				</table>
			</div>
			<br><br>
			<div class="footer__container container grid">
				<p class="page__number">FORM-DIG-01-00</p>
			</div>
		</section>
	</main>
</body>								
<?php die; ?>