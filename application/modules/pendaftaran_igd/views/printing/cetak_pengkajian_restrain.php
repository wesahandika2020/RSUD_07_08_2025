
<!-- // PARTOGRAF -->
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

<!-- <body onload="setTimeout(()=>window.print(),1000)"> Ketika halaman dimuat, jalankan fungsi setTimeout setelah 1 detik -->
<!-- setTimeout(()=>window.print(),1000);  // Menunda eksekusi fungsi window.print() selama 1000 milidetik (1 detik), kemudian membuka dialog pencetakan -->

<!-- <body onload="setTimeout(()=>window.print(),1000)"> -->
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




	<main class="main">
        <section class="form__sk__sehat laporan-operasi">
			<br><br>
            <div class="form__sk__sehat__container container">
				<table width="100%" class="no__border">
					<thead>
						<tr>
							<th class="table__little-title no__border" style="font-size: 15px;">PENGKAJIAN RESTRAIN</th>
						</tr>
					</thead>
				</table>
				<br>

				<table width="100%" class="no__border">
                    <thead>        
						<tr>

							<td class="no__border center" colspan="2">Ruang Rawat/Unit Kerja : <?= $ttd_bangsal; ?></td>
 
							<td class="no__border center" colspan="2"> Tanggal & Jam : 
								<?php
								// Tanggal contoh
								$tanggal = strtotime($ttd_tanggal_layanan);

								// Format tanggal dengan angka bulan
								$tgl = date('d-m-Y', $tanggal);
								$jam_menit = date('H:i', $tanggal);
								?>             
								<?= "$tgl : $jam_menit" ?>
							</td>
						</tr>                                                             
                    </thead>              
                </table>

				<table>
					<thead>
						<tr>
							<td class="no__border" colspan="4">Petunjuk : beritanda (√ ) pada kolom yang anda anggap sesuai,</td>
						</tr>
					</thead>
                </table>

				<table class="big__line__spacing small__font">
					<tbody>
						<tr>				
							<td class="no__border center" colspan="2"></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4"><b><u>PENGKAJIAN FISIK DAN MENTAL</u></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center; gap: 10px;"> 
								KESADARAN	:	GCS	:
									<?php 
										$gcs_pr = json_decode($ttd_gcs_pr);
										
										echo '<span>E :</span>';
										if (!empty($gcs_pr->gcs_pr_1)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_1) . '</span>';
										} else {
											echo '<span></span>';
										}
										
										// Menambahkan spasi
										echo '<div style="width: 10px;"></div>'; 

										// Tampilkan Suhu
										echo '<span>V :</span>';
										if (!empty($gcs_pr->gcs_pr_2)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_2) . '</span>';
										} else {
											echo '<span></span>';
										}
										echo '<div style="width: 10px;"></div>'; 

										// Tampilkan Suhu
										echo '<span>M :</span>';
										if (!empty($gcs_pr->gcs_pr_3)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_3) . '</span>';
										} else {
											echo '<span></span>';
										}
										echo '<div style="width: 10px;"></div>'; 

										echo '<span>Total :</span>';
										if (!empty($gcs_pr->gcs_pr_4)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_4) . '</span>';
										} else {
											echo '<span></span>';
										}
										echo '<div style="width: 10px;"></div>'; 

									?>
								</div>
							</td>                    
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center; gap: 10px;"> 
								Ukuran Pupil : 
									<?php 
										echo '<span>Ka :</span>';
										if (!empty($gcs_pr->gcs_pr_5)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_5) . ' mm</span>';
										} else {
											echo '<span>mm</span>';
										}
										echo '<div style="width: 10px;"> / </div>'; 

										echo '<span>Ki :</span>';
										if (!empty($gcs_pr->gcs_pr_6)) {
											echo '<span>' . htmlspecialchars($gcs_pr->gcs_pr_6) . ' mm</span>';
										} else {
											echo '<span>mm</span>';
										}
										echo '<div style="width: 10px;"></div>'; 

									?>
								</div>
							</td>                    
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center; gap: 10px;"> 
								Tanda Vital	:  
									<?php 
									$tanda_pr = json_decode($ttd_tanda_pr);
										echo '<span>Tekanan Darah :</span>';
										if (!empty($tanda_pr->tanda_pr_4)) {
											echo '<span>' . htmlspecialchars($tanda_pr->tanda_pr_4) . ' </span>';
										} else {
											echo '<span></span>';
										}

										echo '<div style="width: 0px;">/</div>'; 

										if (!empty($tanda_pr->tanda_pr_5)) {
											echo '<span>' . htmlspecialchars($tanda_pr->tanda_pr_5) . ' mmHg</span>';
										} else {
											echo '<span></span>';
										}

										echo '<div style="width: 10px;"></div>'; 

										echo '<span>Suhu :</span>';
										if (!empty($tanda_pr->tanda_pr_3)) {
											echo '<span>' . htmlspecialchars($tanda_pr->tanda_pr_3) . ' &#8451;</span>';
										} else {
											echo '<span>&#8451;</span>';
										}
										echo '<div style="width: 10px;"></div>'; 

										echo '<span>Pernafasan :</span>';
										if (!empty($tanda_pr->tanda_pr_2)) {
											echo '<span>' . htmlspecialchars($tanda_pr->tanda_pr_2) . ' x/menit</span>';
										} else {
											echo '<span>x/menit</span>';
										}
										echo '<div style="width: 10px;"></div>'; 

										echo '<span>Nadi :</span>';
										if (!empty($tanda_pr->tanda_pr_1)) {
											echo '<span>' . htmlspecialchars($tanda_pr->tanda_pr_1) . ' x/menit</span>';
										} else {
											echo '<span>x/menit</span>';
										}
										echo '<div style="width: 10px;"></div>'; 

									?>
								</div>
							</td>                    
						</tr>


						<tr>				
							<td class="no__border center" colspan="2"><br></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">Hasil Observasi :</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										$hasil_pr = json_decode($ttd_hasil_pr);
										if (!empty($hasil_pr->hasil_pr_1) && $hasil_pr->hasil_pr_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Pasien gelisah atau delirium dan berontak';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Pasien gelisah atau delirium dan berontak';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										if (!empty($hasil_pr->hasil_pr_2) && $hasil_pr->hasil_pr_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Pasien tidak kooperatif';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Pasien tidak kooperatif';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										if (!empty($hasil_pr->hasil_pr_3) && $hasil_pr->hasil_pr_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Ketidak mampuan dalam mengikuti perintah untuk tidak meninggalkan tempat tidur';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Ketidak mampuan dalam mengikuti perintah untuk tidak meninggalkan tempat tidur';
										}
									?>
								</div>
							</td>
						</tr>


						<tr>				
							<td class="no__border center" colspan="2"><br><br></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4"><b><u>PERTIMBANGAN KLINIS :</u></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										$pertimbangan_pr = json_decode($ttd_pertimbangan_pr);
										if (!empty($pertimbangan_pr->pertimbangan_pr_1) && $pertimbangan_pr->pertimbangan_pr_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Membahayakan diri sendiri';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Membahayakan diri sendiri';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										if (!empty($pertimbangan_pr->pertimbangan_pr_2) && $pertimbangan_pr->pertimbangan_pr_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Membahayakan orang lain';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Membahayakan orang lain';
										}
									?>
								</div>
							</td>
						</tr>


						<tr>				
							<td class="no__border center" colspan="2"><br><br></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4"><b><u>PENILAIAN DAN ORDER DOKTER :</u></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 20px;"></div>';
										$penilaian_pr = json_decode($ttd_penilaian_pr);
										if (!empty($penilaian_pr->penilaian_pr_1) && $penilaian_pr->penilaian_pr_1 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Restrain Non Farmakologi';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Restrain Non Farmakologi';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										if (!empty($penilaian_pr->penilaian_pr_2) && $penilaian_pr->penilaian_pr_2 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Restrain pergelangan tangan';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Restrain pergelangan tangan';
										}
									?>
								</div>
							</td>
						</tr>					
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										if (!empty($penilaian_pr->penilaian_pr_3) && $penilaian_pr->penilaian_pr_3 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Restrain pergelangan kaki';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Restrain pergelangan kaki';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										if (!empty($penilaian_pr->penilaian_pr_4) && $penilaian_pr->penilaian_pr_4 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Restrain Badan';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Restrain Badan';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
									echo '<div style="width: 20px;"></div>';
										if (!empty($penilaian_pr->penilaian_pr_5) && $penilaian_pr->penilaian_pr_5 == '1') {
											echo '<input type="checkbox" checked> <div style="width: 2px; display: inline-block;"></div>Restrain Farmakologi';
										} else {
											echo '<input type="checkbox"> <div style="width: 2px; display: inline-block;"></div>Restrain Farmakologi';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										echo '<span>1. </span>';
										if (!empty($penilaian_pr->penilaian_pr_6)) {
											echo '<span>' . htmlspecialchars($penilaian_pr->penilaian_pr_6) . ' </span>';
										} else {
											echo '<span></span>';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										echo '<span>2. </span>';
										if (!empty($penilaian_pr->penilaian_pr_7)) {
											echo '<span>' . htmlspecialchars($penilaian_pr->penilaian_pr_7) . ' </span>';
										} else {
											echo '<span></span>';
										}
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="4">
								<div style="display: flex; align-items: center;">
									<?php 
										echo '<div style="width: 50px;"></div>';
										echo '<span>3. </span>';
										if (!empty($penilaian_pr->penilaian_pr_8)) {
											echo '<span>' . htmlspecialchars($penilaian_pr->penilaian_pr_8) . ' </span>';
										} else {
											echo '<span></span>';
										}
									?>
								</div>
							</td>
						</tr>

						<tr>				
							<td class="no__border center" colspan="2"><br><br></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4"><b><u>PENDIDIKAN RESTRAIN PADA KELUARGA :</u></td>
						</tr>
						<tr>
							<td class="no__border" colspan="4" style="padding-top: 5px;"> <input type="checkbox" <?= $ttd_pendidikan_pr == 1 ? 'checked' : ''; ?>> Keluarga sudah dijelaskan tentang restrain</td>
						</tr>
						<tr>				
							<td class="no__border center" colspan="2"><br><br><br><br><br><br></td>
						</tr>
						<tr>
							<td class="no__border" width="50%" align="center"> Perawat/Bidan</td>
							<td class="no__border" width="50%" align="center"> Keluarga yang menyetujui,</td>
						</tr>
						<tr>
							<td class="no__border"  align="center">
								<!-- <br>
								<!?php if($ttd_tperawat_bidan): ?>
									<img src="<!?= resource_url().'images/ttd_dokter/'.$ttd_tperawat_bidan; ?>" alt="ttd-dokter" width="140">
								<!?php else: ?>
								<!?php endif ?> -->
								<br> <br><br><br><br><br>( <?= $ttd_perawat_bidan;?> ) </font> 
							</td>
							<td class="no__border"  align="center"> <br><br><br><br> <br><br>( <?= $ttd_keluarga_pr;?> ) </font>  </td>
						</tr>
					</tbody>
				</table>             
            </div>
			<br><br><br><br><br>
			<div class="footer__container container grid">
				<p class="page__number">FORM-KEP-105-00</p>
				<p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
			</div>
        </section>      
    </main>
</body>								
<?php die; ?>