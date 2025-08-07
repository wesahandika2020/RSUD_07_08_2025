

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
	<!-- <script>
		function cetak() {
			setTimeout(function() { window.close() }, 300);
			window.print();
		}
	</script> -->

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
						<!-- <p class="identity">: <b><!?= $pasien->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki'; ?></b></p> -->
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>

					</div>
				</div>
			</div>
		</div>
	</header>


    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="tpgd">
			<br>
            <div class="tpgd__container container">
                <table class="big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="8">TRIASE PASIEN INSTALASI GAWAT DARURAT</th>
                        </tr>
                    </thead>

                    <tbody>
						<tr>
							<td class="no__border" colspan="8">Tanggal dan Jam : <?= date('d/m/Y : H:i', strtotime($ttd_waktu_igd)) ?>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="8">Cara Pasien Datang :</td>
                        </tr>
						<tr>
							<td class="no__border" colspan="8">
								<div style="display: flex; align-items: center;">
									<?php 
										$cara_datang_pasien_igd = json_decode($ttd_cara_datang_pasien_igd);
										// Checkbox "Sendiri"
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_1) && $cara_datang_pasien_igd->cara_datang_pasien_igd_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Sendiri';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Sendiri';
										}
									?>
								</div>
							</td>
                        </tr>
						<tr>
							<td class="no__border" colspan="8">
								<div style="display: flex; align-items: center;">
									<?php 
										// $cara_datang_pasien_igd = json_decode($ttd_cara_datang_pasien_igd);										
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_2) && $cara_datang_pasien_igd->cara_datang_pasien_igd_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Diantar, Keluarga/Teman';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Diantar, Keluarga/Teman';
										}

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_9) && $cara_datang_pasien_igd->cara_datang_pasien_igd_9 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Ambulance : Ttd dan nama petugas pengantar';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Ambulance : Ttd dan nama petugas pengantar';
										}

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_10) && $cara_datang_pasien_igd->cara_datang_pasien_igd_10 == '') {
											echo '<span></span>';  // Tampilkan teks biasa
										} else {
											echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_10) . '</span>';
											// Menampilkan teks jika ada nilai untuk cara_datang_pasien_igd_10
										}
									?>
								</div>
							</td>
                        </tr>
						<tr>
							<td class="no__border" colspan="8">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_3) && $cara_datang_pasien_igd->cara_datang_pasien_igd_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Warga';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Warga';
										}

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_11) && $cara_datang_pasien_igd->cara_datang_pasien_igd_11 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Polisi : Ttd dan nama petugas pengantar';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Polisi : Ttd dan nama petugas pengantar';
										}

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_12) && $cara_datang_pasien_igd->cara_datang_pasien_igd_12 == '') {
											echo '<span></span>';  // Tampilkan teks biasa
										} else {
											echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_12) . '</span>';
										}								
									?>
								</div>
							</td>
                        </tr>
						<tr>
							<td class="no__border" colspan="8">
								<div style="display: flex; align-items: center;">
									<?php 															
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_4) && $cara_datang_pasien_igd->cara_datang_pasien_igd_4 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Rujukan dari ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Rujukan dari ';
										}

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_5) && $cara_datang_pasien_igd->cara_datang_pasien_igd_5 == '') {
											echo '<span></span>';  // Tampilkan teks biasa
										} else {
											echo '<span> : ' . htmlspecialchars($cara_datang_pasien_igd->cara_datang_pasien_igd_5) . '</span>';
										}									
									?>
								</div>
							</td>
                        </tr>
						<tr>
							<td colspan="8">
								<div style="display: flex; align-items: center;">
									<?php 															
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_6) && $cara_datang_pasien_igd->cara_datang_pasien_igd_6 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Trauma';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Trauma';
										}

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox	

										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_7) && $cara_datang_pasien_igd->cara_datang_pasien_igd_7 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Non Trauma';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Non Trauma';
										}

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox
										
										if (!empty($cara_datang_pasien_igd->cara_datang_pasien_igd_8) && $cara_datang_pasien_igd->cara_datang_pasien_igd_8 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Obstetri';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Obstetri';
										}
									?>
								</div>
							</td>
                        </tr>
                    </tbody>
                </table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td width="10%" class="center" rowspan="2" style="background-color: #C0C0C0; color: black; text-align: center; font-size: 12px; padding: 5px;">PEMERIKSAAN DEWASA</td>
							<td width="10%" class="center" style="background-color: #FF0000; color: black; text-align: center; font-size: 12px; padding: 5px;">I. RESUSITASI</td>
							<td width="10%" class="center" style="background-color: #FF0000; color: black; text-align: center; font-size: 12px; padding: 5px;">II. EMERGENCY</td>
							<td width="10%" class="center" style="background-color: #FFFF00; color: black; text-align: center; font-size: 12px; padding: 5px;">III. URGENT</td>
							<td width="10%" class="center" style="background-color: #00FF00; color: black; text-align: center; font-size: 12px; padding: 5px;">IV. NON URGENT</td>
							<td width="10%" class="center" style="background-color: #00FF00; color: black; text-align: center; font-size: 12px; padding: 5px;">V. FALSE EMERGENCY</td>
						</tr>
						<tr>
							<td width="10%" class="center">SEGERA</td>
							<td width="10%" class="center">10Menit</td>
							<td width="10%" class="center">30Menit</td>
							<td width="10%" class="center">60Menit</td>
							<td width="10%" class="center">120 Menit</td>
						</tr>
					</thead>


					<tbody>
						<tr>
							<td rowspan="2" class="center v-center">JALAN NAFAS</td>
							<td class="center">						
								<?php 	
									$jalan_nafas_igd = json_decode($ttd_jalan_nafas_igd);																
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_1) && $jalan_nafas_igd->jalan_nafas_igd_1 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sumbatan';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sumbatan';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_2) && $jalan_nafas_igd->jalan_nafas_igd_2 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_3) && $jalan_nafas_igd->jalan_nafas_igd_3 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_4) && $jalan_nafas_igd->jalan_nafas_igd_4 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_6) && $jalan_nafas_igd->jalan_nafas_igd_6 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bebas ';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center"></td>
							<td class="center">						
								<?php 	
									if (!empty($jalan_nafas_igd->jalan_nafas_igd_5) && $jalan_nafas_igd->jalan_nafas_igd_5 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Ancaman';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Ancaman';
									}
								?>
							</td>					
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>


						<tr>
							<td rowspan="2"class="center v-center">PERNAFASAN</td>
							<td class="center">						
								<?php 	
									$pernafasan_igd = json_decode($ttd_pernafasan_igd);																
									if (!empty($pernafasan_igd->pernafasan_igd_1) && $pernafasan_igd->pernafasan_igd_1 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Henti nafas';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Henti nafas';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_2) && $pernafasan_igd->pernafasan_igd_2 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takipnoe';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takipnoe';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_3) && $pernafasan_igd->pernafasan_igd_3 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Normal ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Normal ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_4) && $pernafasan_igd->pernafasan_igd_4 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nafas normal ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nafas normal ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_6) && $pernafasan_igd->pernafasan_igd_6 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nafas Normal ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nafas Normal ';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_6) && $pernafasan_igd->pernafasan_igd_6 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas berat';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas berat';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_7) && $pernafasan_igd->pernafasan_igd_7 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas sedang';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas sedang';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($pernafasan_igd->pernafasan_igd_8) && $pernafasan_igd->pernafasan_igd_8 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Distress nafas ringan';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Distress nafas ringan';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td rowspan="6"class="center v-center">SIRKULASI</td>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_1) && $sirkulasi_igd->sirkulasi_igd_1 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Henti Jantung';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Henti Jantung';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_2) && $sirkulasi_igd->sirkulasi_igd_2 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Teraba';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Teraba';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_3) && $sirkulasi_igd->sirkulasi_igd_3 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_4) && $sirkulasi_igd->sirkulasi_igd_4 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_5) && $sirkulasi_igd->sirkulasi_igd_5 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Kuat ';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_6) && $sirkulasi_igd->sirkulasi_igd_6 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nadi Tidak Ada';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nadi Tidak Ada';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_7) && $sirkulasi_igd->sirkulasi_igd_7 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Bradikardi';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Bradikardi';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_8) && $sirkulasi_igd->sirkulasi_igd_8 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takikardi ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takikardi ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_9) && $sirkulasi_igd->sirkulasi_igd_9 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_10) && $sirkulasi_igd->sirkulasi_igd_10 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Frek Nadi Normal ';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_11) && $sirkulasi_igd->sirkulasi_igd_11 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sianosis';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sianosis';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_12) && $sirkulasi_igd->sirkulasi_igd_12 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Takikardi';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Takikardi';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_13) && $sirkulasi_igd->sirkulasi_igd_13 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS > 160 ';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS > 160 ';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_14) && $sirkulasi_igd->sirkulasi_igd_14 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_15) && $sirkulasi_igd->sirkulasi_igd_15 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDS 120 mmHg';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_16) && $sirkulasi_igd->sirkulasi_igd_16 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_17) && $sirkulasi_igd->sirkulasi_igd_17 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Pucat';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Pucat';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_18) && $sirkulasi_igd->sirkulasi_igd_18 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>TDD > 100';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>TDD > 100';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_19) && $sirkulasi_igd->sirkulasi_igd_19 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>CRT > 4 detik';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>CRT > 4 detik';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($sirkulasi_igd->sirkulasi_igd_20) && $sirkulasi_igd->sirkulasi_igd_20 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Akral Dingin';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$sirkulasi_igd = json_decode($ttd_sirkulasi_igd);																
									if (!empty($sirkulasi_igd->sirkulasi_igd_21) && $sirkulasi_igd->sirkulasi_igd_21 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>CRT > 2 detik';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>CRT > 2 detik';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>


						<tr>
							<td rowspan="4"class="center v-center">KESADARAN</td>
							<td class="center">						
								<?php 	
									$kesadaran_igd_w = json_decode($ttd_kesadaran_igd_w);																
									if (!empty($kesadaran_igd_w->kesadaran_igdd_1) && $kesadaran_igd_w->kesadaran_igdd_1 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS < 8';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS < 8';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_2) && $kesadaran_igd_w->kesadaran_igdd_2 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 9-12';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 9-12';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_3) && $kesadaran_igd_w->kesadaran_igdd_3 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS ≥ 13';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS ≥ 13';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_4) && $kesadaran_igd_w->kesadaran_igdd_4 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 15';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 15';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_5) && $kesadaran_igd_w->kesadaran_igdd_5 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>GCS 15';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>GCS 15';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$kesadaran_igd_w = json_decode($ttd_kesadaran_igd_w);																
									if (!empty($kesadaran_igd_w->kesadaran_igdd_6) && $kesadaran_igd_w->kesadaran_igdd_6 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Kejang';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Kejang';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_7) && $kesadaran_igd_w->kesadaran_igdd_7 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Gelisah';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Gelisah';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_8) && $kesadaran_igd_w->kesadaran_igdd_8 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Apatis';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Apatis';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_9) && $kesadaran_igd_w->kesadaran_igdd_9 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_10) && $kesadaran_igd_w->kesadaran_igdd_10 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Ringan';
									}
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php 	
									$kesadaran_igd_w = json_decode($ttd_kesadaran_igd_w);																
									if (!empty($kesadaran_igd_w->kesadaran_igdd_11) && $kesadaran_igd_w->kesadaran_igdd_11 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Tidak ada respon';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Tidak ada respon';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_12) && $kesadaran_igd_w->kesadaran_igdd_12 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Hemiparesis';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Hemiparesis';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_13) && $kesadaran_igd_w->kesadaran_igdd_13 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Samnolen';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Samnolen';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td class="center"></td>

							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_14) && $kesadaran_igd_w->kesadaran_igdd_14 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Hebat';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Hebat';
									}
								?>
							</td>
							<td class="center">						
								<?php 	
									if (!empty($kesadaran_igd_w->kesadaran_igdd_15) && $kesadaran_igd_w->kesadaran_igdd_15 == '1') {
										echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Nyeri Sedang';
									} else {
										echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Nyeri Sedang';
									}
								?>
							</td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="center bold" colspan="7">TANDA VITAL DAN KEADAAAN UMUM</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="center"><b>Kesadaran</b></td>
							<td class="no__border" colspan="6">
								<div style="display: flex; align-items: center;">
									<?php 
										$kesadaran_igd = json_decode($ttd_kesadaran_igd);
										if (!empty($kesadaran_igd->kesadaran_igd_1) && $kesadaran_igd->kesadaran_igd_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Composmentis';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Composmentis';
										}

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($kesadaran_igd->kesadaran_igd_2) && $kesadaran_igd->kesadaran_igd_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Apatis';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Apatis';
										}	

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($kesadaran_igd->kesadaran_igd_3) && $kesadaran_igd->kesadaran_igd_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Samnolen ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Samnolen ';
										}	

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($kesadaran_igd->kesadaran_igd_4) && $kesadaran_igd->kesadaran_igd_4 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Sopor';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Sopor';
										}	

										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox

										if (!empty($kesadaran_igd->kesadaran_igd_5) && $kesadaran_igd->kesadaran_igd_5 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Koma';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Koma';
										}								
									?>
								</div>
							</td>
                        </tr>

						<tr>
							<td class="center" rowspan="2"><b>GCS : </b></td>
							<td class="no__border" colspan="6"> 
								<div style="display: flex; align-items: center; gap: 25px;">
									<span>E : <?= $ttd_gcs_e_igd ?></span>
									<span>M : <?= $ttd_gcs_m_igd ?></span>
									<span>V : <?= $ttd_gcs_v_igd ?></span>
									<span>TOTAL : <?= $ttd_gcs_total_igd ?></span>
								</div>
							</td>
						</tr>


						<tr>
							<!-- <td class="center"></td> -->
							<td class="no__border" colspan="6">
								<div style="display: flex; align-items: center; gap: 10px;"> 
									TD : 
									<?php 
										$tekanan_darah_igd = json_decode($ttd_tekanan_darah_igd);									
										if (!empty($tekanan_darah_igd->tekanan_darah_igd_1)) {
											echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_1) . '</span>';
										} else {
											echo '<span></span>';
										}

										echo '<div style="width: 0px;">/</div>'; 

										if (!empty($tekanan_darah_igd->tekanan_darah_igd_2)) {
											echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_2) . ' mmHg</span>';
										} else {
											echo '<span></span>';
										}
										
										// Menambahkan spasi
										echo '<div style="width: 10px;"></div>'; 

										echo '<span>Suhu :</span>';
										if (!empty($tekanan_darah_igd->tekanan_darah_igd_3)) {
											echo '<span>' . htmlspecialchars($tekanan_darah_igd->tekanan_darah_igd_3) . ' ℃</span>';
										} else {
											echo '<span> - ℃</span>';
										}

										echo '<div style="width: 10px;"></div>'; 
									?>


									Nadi : 
									<?php 
										$frekuensi_nadi_igd = json_decode($ttd_frekuensi_nadi_igd);
										
										// Tampilkan tekanan darah 1
										if (!empty($frekuensi_nadi_igd->frekuensi_igd_1)) {
											echo '<span>' . htmlspecialchars($frekuensi_nadi_igd->frekuensi_igd_1) . ' x/mnt</span>';
										} else {
											echo '<span></span>';
										}
										
										// Menambahkan spasi
										echo '<div style="width: 10px;"></div>'; 

										// Tampilkan Suhu
										echo '<span>RR :</span>';
										if (!empty($frekuensi_nadi_igd->frekuensi_igd_2)) {
											echo '<span>' . htmlspecialchars($frekuensi_nadi_igd->frekuensi_igd_2) . ' ℃</span>';
										} else {
											echo '<span>x/mnt</span>';
										}
										echo '<div style="width: 10px;"></div>'; 
									?>

									SO2 : 
									<?php 
										$s_o2 = json_decode($ttd_s_o2);
										
										// Tampilkan tekanan darah 1
										if (!empty($s_o2->imunisasi_igd_1)) {
											echo '<span>' . htmlspecialchars($s_o2->imunisasi_igd_1) . '%</span>';
										} else {
											echo '<span></span>';
										}
									?>
								</div>
							</td>
						</tr>


						<tr>
							<td class="center"><b>Imunisasi</b></td>
							<td class="no__border" colspan="6">
								<div style="display: flex; align-items: center; gap: 10px;"> 
									<?php 
										if (!empty($s_o2->imunisasi_igd_2) && $s_o2->imunisasi_igd_2 == '1') {
											echo '<input type="checkbox" checked>Ya';
										} else {
											echo '<input type="checkbox">Ya';
										}
									
										// Menambahkan spasi
										echo '<div style="width: 10px;"></div>'; 


										if (!empty($s_o2->imunisasi_igd_3) && $s_o2->imunisasi_igd_3 == '0') {
											echo '<input type="checkbox" checked>Tidak';
										} else {
											echo '<input type="checkbox">Tidak';
										}

										echo '<div style="width: 20px;"></div>'; 
									?>

									BB : 
									<?php 
										$tinggi_badan_igd = json_decode($ttd_tinggi_badan_igd);
										
										if (!empty($tinggi_badan_igd->tinggi_badan_igd_1)) {
											echo '<span>' . htmlspecialchars($tinggi_badan_igd->tinggi_badan_igd_1) . ' Kg</span>';
										} else {
											echo '<span></span>';
										}
								
										// Menambahkan spasi
										echo '<div style="width: 10px;"></div>'; 

										echo '<span>TB :</span>';
										if (!empty($tinggi_badan_igd->tinggi_badan_igd_2)) {
											echo '<span>' . htmlspecialchars($tinggi_badan_igd->tinggi_badan_igd_2) . ' ℃</span>';
										} else {
											echo '<span>Cm</span>';
										}
									?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="center bold" colspan="5"> PEMERIKSAAN SEGITIGA ASESMEN GAWAT ANAK (SAGA)</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="center" colspan="2">Segitiga Asesmen Gawat Anak</td>
							<td class="center" colspan="2">Pemeriksaan Segitiga Asesmen Gawat Anak (SAGA)</td>
						</tr>
						<tr>
							<td class="center" colspan="2" style="vertical-align: top;">
								<img src="<?= resource_url() ?>images/attributes/saga.png" alt="Pain Measurement Scale" class="img-fluid mx-auto d-block rounded shadow" style="width: 180px;">
							</td>
							<td colspan="2" style="vertical-align: top;">
							<table width="100%" class="table table-sm table-striped table-bordered" style="border-collapse: collapse; border: 1px solid black;">
								<tr>
									<td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
										<span>Tampilan</span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
										<span>Usaha Napas</span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 33.33%; border: 1px solid black;">
										<span>Sirkulasi</span>
									</td>
								</tr>
								<tr>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_tampilan_saga_1 == 1 ? 'checked' : ''; ?>> Tidak aktif bergerak</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_usaha_saga_1 == 1 ? 'checked' : ''; ?>> Napas cuping hidung</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_sirkulasi_saga_1 == 1 ? 'checked' : ''; ?>> Sianosis</td>
								</tr>
								<tr>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_tampilan_saga_2 == 1 ? 'checked' : ''; ?>> Tidak ada interaksi dengan lingkungan</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_usaha_saga_2 == 1 ? 'checked' : ''; ?>> Retraksi</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_sirkulasi_saga_2 == 1 ? 'checked' : ''; ?>> Pucat</td>
								</tr>
								<tr>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_tampilan_saga_3 == 1 ? 'checked' : ''; ?>> Gelisah /sulit ditenangkan</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_usaha_saga_3 == 1 ? 'checked' : ''; ?>> Posisi tubuh abnormal (tripoding, head bobbing, sniffing, menolak berbaring)</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_sirkulasi_saga_3 == 1 ? 'checked' : ''; ?>> Kutis marmorata</td>
								</tr>
								<tr>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_tampilan_saga_4 == 1 ? 'checked' : ''; ?>> Pandangan kosong</td>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_usaha_saga_4 == 1 ? 'checked' : ''; ?>> Suara napas abnormal (mengorok, parau, stridor, merintih)</td>
									<td></td>
								</tr>
								<tr>
									<td class="no__border" style="border: 1px solid black;"><input type="checkbox" <?= $ttd_tampilan_saga_5 == 1 ? 'checked' : ''; ?>> Tidak bersuara / tidak menangis</td>
									<td></td>
									<td></td>
								</tr>
							</table>

							<table width="100%" class="table table-sm table-striped table-bordered" style="border-collapse: collapse; border: 1px solid black;">
								<tr>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_1.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 80px;"></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_2.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 65px;"></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_3.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_4.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_5.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 70px;"></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><img src="<?= resource_url() ?>images/attributes/saga_6.png" alt="Pain Measurement Scale" class="img-fluid rounded shadow" style="width: 75px;"></span>
									</td>								
								</tr>
								<tr>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_1 == 1 ? 'checked' : ''; ?>></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_2 == 1 ? 'checked' : ''; ?>></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_3 == 1 ? 'checked' : ''; ?>></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_4 == 1 ? 'checked' : ''; ?>></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_5 == 1 ? 'checked' : ''; ?>></span>
									</td>
									<td style="text-align: center; vertical-align: middle; width: 15%; border: 1px solid black;">
										<span><input type="checkbox" <?= $ttd_gambarsaga_6 == 1 ? 'checked' : ''; ?>></span>
									</td>
								</tr>
							</table>
							</td>
						</tr>
					</tbody>
				</table>

				<br>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="center bold" colspan="7">ASESMENT TRIAGE</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										$asesment_triage_igd = json_decode($ttd_asesment_triage_igd);
										if (!empty($asesment_triage_igd->asesment_triage_1) && $asesment_triage_igd->asesment_triage_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>EMERGENCY';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>EMERGENCY';
										}
										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox		

										if (!empty($asesment_triage_igd->asesment_triage_2) && $asesment_triage_igd->asesment_triage_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>NON URGENT ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>NON URGENT ';
										}
										
										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox								
										if (!empty($asesment_triage_igd->asesment_triage_3) && $asesment_triage_igd->asesment_triage_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Potensi Resiko Khusus (Air Borne & Droplet)';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Potensi Resiko Khusus (Air Borne & Droplet)';
										}
									?>
								</div>
							</td>
                        </tr>

						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($asesment_triage_igd->asesment_triage_4) && $asesment_triage_igd->asesment_triage_4 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>URGENT ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>URGENT ';
										}
										echo '<div style="width: 20px;"></div>';  // Menambahkan jarak antar checkbox		

										if (!empty($asesment_triage_igd->asesment_triage_5) && $asesment_triage_igd->asesment_triage_5 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>FALSE EMERGENCY ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>FALSE EMERGENCY ';
										}							
									?>
								</div>
							</td>
                        </tr>

						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($asesment_triage_igd->asesment_triage_6) && $asesment_triage_igd->asesment_triage_6 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>DOA, Tanda Kematian : ';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>DOA, Tanda Kematian : ';
										}
										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

										if (!empty($asesment_triage_igd->asesment_triage_7) && $asesment_triage_igd->asesment_triage_7 != '') {
											echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_7) . '</span>';
										} else {
											echo '<span></span>';  // Tidak ada data, tampilkan kosong
										}	

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

										echo '<span>RC :</span>';
										if (!empty($asesment_triage_igd->asesment_triage_8) && $asesment_triage_igd->asesment_triage_8 != '') {
											echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_8) . '</span>';
										} else {
											echo '<span></span>';  // Tidak ada data, tampilkan kosong
										}

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

										echo '<span>EKG :</span>';
										if (!empty($asesment_triage_igd->asesment_triage_9) && $asesment_triage_igd->asesment_triage_9 != '') {
											echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_9) . '</span>';
										} else {
											echo '<span></span>';  // Tidak ada data, tampilkan kosong
										}	

										echo '<div style="width: 10px;"></div>';  // Menambahkan jarak antar checkbox		

										echo '<span>Jam DOA :</span>';
										if (!empty($asesment_triage_igd->asesment_triage_10) && $asesment_triage_igd->asesment_triage_10 != '') {
											echo '<span>' . htmlspecialchars($asesment_triage_igd->asesment_triage_10) . '</span>';
										} else {
											echo '<span></span>';  // Tidak ada data, tampilkan kosong
										}							
									?>
								</div>
							</td>
                        </tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td class="center bold" colspan="7">TINDAK LANJUT</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										$tindak_lanjut_igd = json_decode($ttd_tindak_lanjut_igd);									
										if (!empty($tindak_lanjut_igd->tindak_lanjut_1) && $tindak_lanjut_igd->tindak_lanjut_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Periksa ke Ruang pelayanan non urgent';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Periksa ke Ruang pelayanan non urgent';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($tindak_lanjut_igd->tindak_lanjut_2) && $tindak_lanjut_igd->tindak_lanjut_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Perawatan ke Ruang Observasi pasien semi Kritis';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Perawatan ke Ruang Observasi pasien semi Kritis';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($tindak_lanjut_igd->tindak_lanjut_3) && $tindak_lanjut_igd->tindak_lanjut_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Perawatan ke Ruang resusitasi/Kritis (emergent)';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Perawatan ke Ruang resusitasi/Kritis (emergent)';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="7">
								<div style="display: flex; align-items: center;">
									<?php 
										if (!empty($tindak_lanjut_igd->tindak_lanjut_4) && $tindak_lanjut_igd->tindak_lanjut_4 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div> Perawatan Maternal';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div> Perawatan Maternal';
										}
									?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<td width="33%" class="center bold">Tanggal dan Jam</td>
							<td width="33%" class="center bold">Tanda Tangan Petugas Triase</td>
							<td width="33%" class="center bold">Tanda Tangan Verifikasi DPJP</td>
						</tr>
					</thead>
					<tbody>
						<td class="center">
							<!-- <div>
								Tangerang, <b><?= date('d/m/Y : H:i', strtotime($ttd_tgl_jam_perawat)) ?></b>
							</div> -->
							<?php
							// Array nama hari dan bulan dalam bahasa Indonesia
							$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
							$bulan = [
								1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
								'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
							];

							// Tanggal contoh
							// $ttd_tgl_jam_perawat = "2024-11-25 14:30:00";
							$tanggal = strtotime($ttd_tgl_jam_perawat);

							// Format tanggal manual
							$nama_hari = $hari[date('w', $tanggal)];
							$tgl = date('d', $tanggal);
							$nama_bulan = $bulan[(int)date('m', $tanggal)];
							$tahun = date('Y', $tanggal);
							$jam_menit = date('H:i', $tanggal);

							?>
							<div>
								Tangerang, <b><?= "$nama_hari, $tgl $nama_bulan $tahun : $jam_menit" ?></b>
							</div>


						</td>
						<td class="center">
							<div>
								<?php if (!empty($ttd_perawat_triase)) :
									echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ttd_perawat_triase . '" alt="ttd-dokter" width="200"><br>';
								else :
									echo '<br><br><br><br><br>';
								endif;
								?>

								( <?= $ttd_id_perawatt_igd; ?>)<br>
								Nama Petugas Triase
							</div>
						</td>
						<td class="center">
							<div>
								<?php if (!empty($ttd_dokter_triase)) :
									echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ttd_dokter_triase . '" alt="ttd-dokter" width="200"><br>';
								else :
									echo '<br><br><br><br><br>';
								endif;
								?>

								( <?= $ttd_id_dokterr_igd; ?>)<br>
								Nama Verifikasi DPJP
							</div>
						</td>

					</tbody>
				</table>			
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-26-04</p>
        </div>
    </footer>	
</body>								
<?php die; ?>