
<!-- // MONITORING -->
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

		/* UNTUK MEMBUAT AGAR KERTANYA MENJADI LEBIH LEBAR */
		@media print {
            @page {
                size: landscape;
            }

            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
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


<!-- <body onload="setTimeout(()=>window.print(),1000)"> Ketika halaman dimuat, jalankan fungsi setTimeout setelah 1 detik -->
<!-- setTimeout(()=>window.print(),1000);  // Menunda eksekusi fungsi window.print() selama 1000 milidetik (1 detik), kemudian membuka dialog pencetakan -->

<body onload="setTimeout(()=>window.print(),1000)">
 <!-- <body onload="window.print()"> -->
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
                        <b style="font-size: 12pt; display: flex; justify-content: center"> MONITORING PASIEN</b>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%" style="text-align: center; vertical-align: middle;">Ruang Rawat/Unit Kerja : <?= $ttd_bangsal; ?></td>
                        <td class="no__border" width="30%" style="text-align: center; vertical-align: middle;">Tanggal : <?= datefmysql($ttd_tanggal_mp); ?></td>
                        <td class="no__border" width="30%" style="text-align: center; vertical-align: middle;">BB/TB : <?= $ttd_bb_mp; ?> / <?= $ttd_tb_mp; ?></td>
                    </tr>
                </table>		

				<!-- Bagian container grafik yang bagian max-width: 1800px; penentunya di bagian layar ganti ajah nnti -->
				<table class="big__line__spacing small__font" style="border: 1px solid black; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
					<div id="grafik_mp" 
						style="width: 100%; max-width: 1500px; height: 600px; border: 1px solid black; background-color: #f4f4f4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
					</div>
					<script>
						// Ambil dan ubah data dari PHP ke JavaScript (dalam bentuk array angka)
						const suhu 	= JSON.parse('<?= json_encode($ttd_mp_suhu); ?>').map(item => parseFloat(item));
						const rr 	= JSON.parse('<?= json_encode($ttd_mp_rr); ?>').map(item => parseFloat(item));
						const nadi 	= JSON.parse('<?= json_encode($ttd_mp_nadi); ?>').map(item => parseFloat(item));
						const jammp = JSON.parse('<?= json_encode($ttd_mp_jam); ?>');     // Data jam
						const tglmp = JSON.parse('<?= json_encode($ttd_mp_tanggal); ?>'); // Data tanggal

						// Inisialisasi grafik
						Highcharts.chart('grafik_mp', {
							title: {
								text: 'Grafik TTV', // Judul grafik
								style: {
									fontSize: '14px',
									fontWeight: 'bold',
									color: '#333'
								}
							},
							chart: {
								type: 'spline', // Jenis grafik: garis halus
								backgroundColor: '#f4f4f4', // Warna latar belakang grafik
								borderColor: '#000',        // Warna garis pinggir grafik
								borderWidth: 0.5,
								plotShadow: true,
								shadow: {
									color: '#000',
									offsetX: 0.5,
									offsetY: 0.5,
									opacity: 0.5
								}
							},

							// Konfigurasi sumbu X (waktu)
							xAxis: {
								min: 0,
								max: 40, // Tampilkan sampai 40 titik (misalnya 40 jam)
								// max: 60, // Tampilkan sampai 60 titik (misalnya 60 jam) // ini ganti ajah kalau di komplen ganti 60 ajah ya
								tickInterval: 1, // Tampilkan garis bantu tiap 1 jam
								gridLineWidth: 1, // Garis bantu vertikal aktif
								gridLineColor: '#d1d1d1', // Warna abu tipis untuk garis bantu

								labels: {
									formatter: function () {
										// Format label: jam - tanggal
										if (this.value >= 0 && this.value < jammp.length && this.value < tglmp.length) {
											return `<span style="font-size: 9px; color: #000;">${jammp[this.value]} - ${tglmp[this.value]}</span>`;
										}
										return '';
									},
									useHTML: true,       // Boleh pakai HTML dalam label
									rotation: 70,        // Miringkan label 70 derajat biar muat
									style: {
										fontSize: '8px',
										color: '#000',
										whiteSpace: 'nowrap' // Biar teks ga terpotong jadi "10:15…"
									}
								},
								startOnTick: true,
								endOnTick: false,
								minPadding: 0,
								maxPadding: 0
							},

							// Konfigurasi sumbu Y (angka pengukuran)
							yAxis: {
								title: {
									text: '', // Kosongin judul sumbu Y
									rotation: -90,
									useHTML: true
								},
								min: 0,      // Nilai minimal Y
								max: 200,    // Nilai maksimal Y
								tickInterval: 10, // Jarak antar angka Y
								gridLineWidth: 1, // Aktifkan garis horizontal
								gridLineColor: '#808080', // Warna garis bantu abu
								labels: {
									enabled: true // Tampilkan angka Y
								}
							},

							// Data yang ditampilkan
							series: [
								{
									name: 'Suhu',
									data: suhu,
									marker: {
										symbol: 'circle',
										radius: 2
									},
									lineWidth: 2,
									color: '#ff0000', // Warna garis suhu: merah
									dataLabels: {
										enabled: true,
										color: '#000000',
										style: {
											fontWeight: 'bold'
										}
									}
								},
								{
									name: 'Respiratory Rate',
									data: rr,
									marker: {
										symbol: 'circle',
										radius: 2
									},
									lineWidth: 2,
									color: '#00ff00', // Warna garis RR: hijau terang
									dataLabels: {
										enabled: true,
										color: '#000000',
										style: {
											fontWeight: 'bold'
										}
									}
								},
								{
									name: 'Nadi',
									data: nadi,
									marker: {
										symbol: 'circle',
										radius: 2
									},
									lineWidth: 2,
									color: '#008080', // Warna garis nadi: toska
									dataLabels: {
										enabled: true,
										color: '#000000',
										style: {
											fontWeight: 'bold'
										}
									}
								}
							],

							// Tooltip saat hover
							tooltip: {
								headerFormat: '<b>{series.name}</b><br>',
								pointFormat: '{point.y} x/menit',
								backgroundColor: 'rgba(255,255,255,0.95)',
								borderColor: '#ccc',
								borderRadius: 10,
								style: {
									fontSize: '10px'
								}
							},

							// Legenda (keterangan warna)
							legend: {
								enabled: true,
								itemStyle: {
									fontSize: '15px',
									fontWeight: 'normal'
								}
							},

							// Opsi garis grafik
							plotOptions: {
								series: {
									dataLabels: {
										enabled: false // Nonaktifkan label di semua titik
									},
									marker: {
										enabled: true,
										radius: 4 // Ukuran bulatan titik grafik
									}
								}
							}
						});
					</script>
				</table>

				<style>
					.responsive-table {
						display: grid;
						grid-template-columns: repeat(12, 1fr); /* Maksimal 12 item per baris */
						gap: 4px;
						width: 100%;
					}

					.responsive-table span {
						display: block;
						text-align: center;
						font-size: 10px;
						padding: 4px;
						background-color: #f9f9f9;
						border: 1px solid #ddd;
					}

					/* Responsif untuk layar kecil */
					@media (max-width: 1024px) {
						.responsive-table {
							grid-template-columns: repeat(10, 1fr); /* Maksimal 6 kolom untuk layar kecil */
						}
					}

					@media (max-width: 600px) {
						.responsive-table {
							grid-template-columns: repeat(3, 1fr); /* Maksimal 3 kolom untuk layar yang sangat kecil */
						}
					}
				</style>

				<table class="big__line__spacing small__font">
					<!-- <tr>
						<td class="center" width="5%">Tanggal Grafik</td>
						<td width="90%">
							<div class="responsive-table">
								<!?php if (!empty($ttd_mp_tanggal)) : ?>
									<!?php foreach ($ttd_mp_tanggal as $tanggal) : ?>
										<span><!?= $tanggal ?: '-'; ?></span>
									<!?php endforeach; ?>
								<!?php else : ?>
									<span>-</span>
								<!?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Jam Grafik</td>
						<td width="90%">
							<div class="responsive-table">
								<!?php if (!empty($ttd_mp_jam)) : ?>
									<!?php foreach ($ttd_mp_jam as $jam) : ?>
										<span><!?= $jam ?: '-'; ?></span>
									<!?php endforeach; ?>
								<!?php else : ?>
									<span>-</span>
								<!?php endif; ?>
							</div>
						</td>
					</tr> -->

					<tr>
						<td class="center" width="5%">Tekanan Darah</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_tdarah_mpp)) : ?>
									<?php foreach ($ttd_tdarah_mpp as $td) : ?>
										<span><?= $td ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Saturasi O2</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_saturasi_mppp)) : ?>
									<?php foreach ($ttd_saturasi_mppp as $st) : ?>
										<span><?= $st ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Terapi oksigen (Lpm)</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_toksigen_mpp)) : ?>
									<?php foreach ($ttd_toksigen_mpp as $tm) : ?>
										<span><?= $tm ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Status Kesadaran</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_skesadaran_mpp)) : ?>
									<?php foreach ($ttd_skesadaran_mpp as $sm) : ?>
										<span><?= $sm ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Kategori EWS</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_kategori_mpp)) : ?>
									<?php foreach ($ttd_kategori_mpp as $km) : ?>
										<span><?= $km ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td class="center" width="5%">Pengawasan Infus/Plebitis</td>
						<td width="90%">
							<div class="responsive-table">
								<?php if (!empty($ttd_pengawasan_mpp)) : ?>
									<?php foreach ($ttd_pengawasan_mpp as $pm) : ?>
										<span><?= $pm ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>		

				<style>
					.vertical-text {
						writing-mode: vertical-rl;
						text-orientation: mixed;
						transform: rotate(180deg); /* Untuk memastikan arah bacaan dari atas ke bawah */
						text-align: center;
						vertical-align: middle;
					}
				</style>

				<table class="big__line__spacing small__font">
					<tr>
						<td class="center vertical-text" rowspan="6">Masuk</td>
						<td width="15%">Oral</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_oral_mpp)) : ?>
									<?php foreach ($ttd_oral_mpp as $or) : ?>
										<span><?= $or ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">NGT</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_ngt_mpp)) : ?>
									<?php foreach ($ttd_ngt_mpp as $ngt) : ?>
										<span><?= $ngt ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Parenteral Line 1</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_paranteral_mpp)) : ?>
									<?php foreach ($ttd_paranteral_mpp as $mpp) : ?>
										<span><?= $mpp ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Parenteral Line 2</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_paranteral_mppp)) : ?>
									<?php foreach ($ttd_paranteral_mppp as $mppp) : ?>
										<span><?= $mppp ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Produk Darah</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_produk_mpp)) : ?>
									<?php foreach ($ttd_produk_mpp as $pd) : ?>
										<span><?= $pd ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Total Input</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_input_mpp)) : ?>
									<?php foreach ($ttd_input_mpp as $im) : ?>
										<span><?= $im ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>

				<table class="big__line__spacing small__font">
					<tr>
						<td class="center vertical-text" rowspan="6">Keluar</td>
						<td width="15%">Urin</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_urin_mpp)) : ?>
									<?php foreach ($ttd_urin_mpp as $um) : ?>
										<span><?= $um ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">BAB</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_bab_mpp)) : ?>
									<?php foreach ($ttd_bab_mpp as $bab) : ?>
										<span><?= $bab ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Gastrik</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_gastrik_mpp)) : ?>
									<?php foreach ($ttd_gastrik_mpp as $g) : ?>
										<span><?= $g ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">WSD/Drain</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_wsd_mpp)) : ?>
									<?php foreach ($ttd_wsd_mpp as $wsd) : ?>
										<span><?= $wsd ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">IWL</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_iwl_mpp)) : ?>
									<?php foreach ($ttd_iwl_mpp as $iwl) : ?>
										<span><?= $iwl ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="15%">Total Output</td>
						<td width="90%"> 
							<div class="responsive-table">
								<?php if (!empty($ttd_output_mpp)) : ?>
									<?php foreach ($ttd_output_mpp as $to) : ?>
										<span><?= $to ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>

				<table class="big__line__spacing small__font">
					<tr>
						<td width="16.7%">Balance Cairan</td>
						<td width="80%">
							<div class="responsive-table">
								<?php if (!empty($ttd_blance_cairan_mpp)) : ?>
									<?php foreach ($ttd_blance_cairan_mpp as $bc) : ?>
										<span><?= $bc ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="16.7%">Diit</td>
						<td width="80%">
							<div class="responsive-table">
								<?php if (!empty($ttd_diit_mpp)) : ?>
									<?php foreach ($ttd_diit_mpp as $dm) : ?>
										<span><?= $dm ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>				
				</table>

				<!-- <style>
					.responsive-table {
						display: grid;
						grid-template-columns: repeat(auto-fit, minmax(80px, 1fr)); /* Membuat grid lebih fleksibel */
						gap: 4px;
						width: 100%;
						align-items: center;
					}

					.responsive-table span {
						display: inline-block;
						text-align: center;
						font-size: 10px;
						padding: 4px;
						background-color: #f9f9f9;
						border: 1px solid #ddd;
						white-space: nowrap; /* Agar teks tidak turun */
					}

					@media (max-width: 1024px) {
						.responsive-table {
							grid-template-columns: repeat(5, 1fr);
						}
					}

					@media (max-width: 600px) {
						.responsive-table {
							grid-template-columns: repeat(3, 1fr);
						}
					}
				</style> -->

				<table class="big__line__spacing small__font">
					<tr>
						<td width="16.7%">Jam</td>
						<td width="80%">
							<div class="responsive-table">
								<?php if (!empty($ttd_jam_mpp)) : ?>
									<?php foreach ($ttd_jam_mpp as $mj) : ?>
										<span><?= $mj ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="16.7%">Tanggal</td>
						<td width="80%">
							<div class="responsive-table">
								<?php if (!empty($ttd_tgl_mpp)) : ?>
									<?php foreach ($ttd_tgl_mpp as $tgl) : ?>
										<span><?= $tgl ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td width="16.7%">Perawat</td>
						<td width="80%">
							<div class="responsive-table">
								<?php if (!empty($ttd_perawat_mpp)) : ?>
									<?php foreach ($ttd_perawat_mpp as $perawat) : ?>
										<span><?= $perawat ?: '-'; ?></span>
									<?php endforeach; ?>
								<?php else : ?>
									<span>-</span>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
                            <th class="table__big-title" colspan="9" style="background-color: #B0E0E6; color: black;">NEWS (DEWASA)</th>
                        </tr>
						<tr>
							<td width="10%" class="center">Parameter</td>
							<td width="5%" class="center">5</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">0</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">3</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Respirasi</td>
							<td class="center">
								<input type="radio" name="laju_respirasi_mp" value="3_1" <?= ($ttd_sews_laju_respirasi === '3_1') ? 'checked' : ''; ?>> ≤8
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="laju_respirasi_mp" value="1_2" <?= ($ttd_sews_laju_respirasi === '1_2') ? 'checked' : ''; ?>> 9-11
							</td>
							<td class="center">
								<input type="radio" name="laju_respirasi_mp" value="0_3" <?= ($ttd_sews_laju_respirasi === '0_3') ? 'checked' : ''; ?>> 12-20
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="laju_respirasi_mp" value="2_4" <?= ($ttd_sews_laju_respirasi === '2_4') ? 'checked' : ''; ?>> 21-24
							</td>
							<td class="center">
								<input type="radio" name="laju_respirasi_mp" value="3_5" <?= ($ttd_sews_laju_respirasi === '3_5') ? 'checked' : ''; ?>> ≥25
							</td>
						</tr>

						<tr>
							<td>SpO2 Skala 1 (Non PPOK)</td>
							<td class="center">
								<input type="radio" name="saturasi_mp" value="3_1" <?= ($ttd_sews_saturasi_2 === '3_1') ? 'checked' : ''; ?>> ≤91
							</td>
							<td class="center">
								<input type="radio" name="saturasi_mp" value="2_2" <?= ($ttd_sews_saturasi_2 === '2_2') ? 'checked' : ''; ?>> 92-93
							</td>
							<td class="center">
								<input type="radio" name="saturasi_mp" value="1_3" <?= ($ttd_sews_saturasi_2 === '1_3') ? 'checked' : ''; ?>> 94-95
							</td>
							<td class="center">
								<input type="radio" name="saturasi_mp" value="0_4" <?= ($ttd_sews_saturasi_2 === '0_4') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td>SpO2 Skala 2 (PPOK)</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="3_1" <?= ($ttd_spo2_skala2_news === '3_1') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="2_2" <?= ($ttd_spo2_skala2_news === '2_2') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="1_3" <?= ($ttd_spo2_skala2_news === '1_3') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="0_4" <?= ($ttd_spo2_skala2_news === '0_4') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="1_5" <?= ($ttd_spo2_skala2_news === '1_5') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="2_6" <?= ($ttd_spo2_skala2_news === '2_6') ? 'checked' : ''; ?>> ≥96
							</td>
							<td class="center">
								<input type="radio" name="spo2_skala2_news" value="3_7" <?= ($ttd_spo2_skala2_news === '3_7') ? 'checked' : ''; ?>> ≥96
							</td>
						</tr>

						<tr>
							<td>Suplemen O₂</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="suplemen_mp" value="2_1" <?= ($ttd_sews_suplemen === '2_1') ? 'checked' : ''; ?>> Ya
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="suplemen_mp" value="0_2" <?= ($ttd_sews_suplemen === '0_2') ? 'checked' : ''; ?>> Tidak
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td>TD Sistolik</td>
							<td class="center">
								<input type="radio" name="td_sistolik_news" value="3_1" <?= ($ttd_td_sistolik_news === '3_1') ? 'checked' : ''; ?>> ≤90
							</td>
							<td class="center">
								<input type="radio" name="td_sistolik_news" value="2_2" <?= ($ttd_td_sistolik_news === '2_2') ? 'checked' : ''; ?>> 91-100
							</td>
							<td class="center">
								<input type="radio" name="td_sistolik_news" value="1_3" <?= ($ttd_td_sistolik_news === '1_3') ? 'checked' : ''; ?>> 101-110
							</td>
							<td class="center">
								<input type="radio" name="td_sistolik_news" value="0_4" <?= ($ttd_td_sistolik_news === '0_4') ? 'checked' : ''; ?>> 111-219
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="td_sistolik_news" value="3_5" <?= ($ttd_td_sistolik_news === '3_5') ? 'checked' : ''; ?>> ≥220
							</td>                                                 
						</tr>

						<tr>
							<td>Nadi</td>
							<td class="center">
								<input type="radio" name="nadi_news" value="3_1" <?= ($ttd_nadi_news === '3_1') ? 'checked' : ''; ?>> ≤40
							</td>  
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="nadi_news" value="1_2" <?= ($ttd_nadi_news === '1_2') ? 'checked' : ''; ?>> 41-50
							</td>  
							<td class="center">
								<input type="radio" name="nadi_news" value="0_3" <?= ($ttd_nadi_news === '0_3') ? 'checked' : ''; ?>> 51-90
							</td>  
							<td class="center">
								<input type="radio" name="nadi_news" value="1_4" <?= ($ttd_nadi_news === '1_4') ? 'checked' : ''; ?>> 91-110
							</td>  
							<td class="center">
								<input type="radio" name="nadi_news" value="2_5" <?= ($ttd_nadi_news === '2_5') ? 'checked' : ''; ?>> 111-130
							</td>  
							<td class="center">
								<input type="radio" name="nadi_news" value="3_6" <?= ($ttd_nadi_news === '3_6') ? 'checked' : ''; ?>> ≥131
							</td>  
						</tr>

						<tr>
							<td>Kesadaran</td>
							<td class="center"></td>
							<td class="center"></td>                                                 
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="kesadaran_news" value="0_1" <?= ($ttd_kesadaran_news === '0_1') ? 'checked' : ''; ?>> A
							</td>  
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="kesadaran_news" value="3_2" <?= ($ttd_kesadaran_news === '3_2') ? 'checked' : ''; ?>> CVPU
							</td> 
						</tr>

						<tr>
							<td>Suhu</td>
							<td class="center">
								<input type="radio" name="suhu_newst" value="3_1" <?= ($ttd_suhu_newst === '3_1') ? 'checked' : ''; ?>> ≤35,0
							</td> 
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="suhu_newst" value="1_2" <?= ($ttd_suhu_newst === '1_2') ? 'checked' : ''; ?>> 35,1-36,0
							</td> 
							<td class="center">
								<input type="radio" name="suhu_newst" value="0_3" <?= ($ttd_suhu_newst === '0_3') ? 'checked' : ''; ?>> 36,1-38,0
							</td> 
							<td class="center">
								<input type="radio" name="suhu_newst" value="1_4" <?= ($ttd_suhu_newst === '1_4') ? 'checked' : ''; ?>> 38,1-39,0
							</td> 
							<td class="center">
								<input type="radio" name="suhu_newst" value="2_5" <?= ($ttd_suhu_newst === '2_5') ? 'checked' : ''; ?>> ≥39,1
							</td> 
							<td class="center"></td>
						<tr>

						<tr>
							<td class="center"><b>TOTAL</b></td>
							<td colspan="7">
								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: white; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpnews" value="Putih" <?= ($ttd_sews_total_2 === 'Putih') ? 'checked' : ''; ?>> Putih (0)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: green; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpnews" value="Hijau" <?= ($ttd_sews_total_2 === 'Hijau') ? 'checked' : ''; ?>> Hijau (1-4)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: yellow; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpnews" value="Kuning" <?= ($ttd_sews_total_2 === 'Kuning') ? 'checked' : ''; ?>> Kuning (5-6)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: red; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpnews" value="Merah" <?= ($ttd_sews_total_2 === 'Merah') ? 'checked' : ''; ?>> Merah (≥7)
								</label>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
                            <th class="table__big-title" colspan="9" style="background-color: #B0E0E6; color: black;">MEOWS (MATERNAL)</th>
                        </tr>
						<tr>
							<td width="10%" class="center">Parameter</td>
							<td width="5%" class="center">3</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">0</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">3</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Respirasi</td>
							<td class="center">
								<input type="radio" name="respirasi_mpp" value="3_1" <?= ($ttd_sews_respirasi === '3_1') ? 'checked' : ''; ?>> <12
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="respirasi_mpp" value="0_2" <?= ($ttd_sews_respirasi === '0_2') ? 'checked' : ''; ?>> 12-20
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="respirasi_mpp" value="2_3" <?= ($ttd_sews_respirasi === '2_3') ? 'checked' : ''; ?>> 21-25
							</td>
							<td class="center">
								<input type="radio" name="respirasi_mpp" value="3_4" <?= ($ttd_sews_respirasi === '3_4') ? 'checked' : ''; ?>> >25
							</td>
						</tr>

						<tr>
							<td>Saturasi O2</td>
							<td class="center">
								<input type="radio" name="saturasi_mpp" value="3_1" <?= ($ttd_sews_saturasi_1 === '3_1') ? 'checked' : ''; ?>> <92
							</td>
							<td class="center">
								<input type="radio" name="saturasi_mpp" value="2_2" <?= ($ttd_sews_saturasi_1 === '2_2') ? 'checked' : ''; ?>> 92-95
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="saturasi_mpp" value="0_3" <?= ($ttd_sews_saturasi_1 === '0_3') ? 'checked' : ''; ?>> >95
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td> O₂</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="o2_mpp" value="2_1" <?= ($ttd_sews_o2 === '2_1') ? 'checked' : ''; ?>> Ya
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="o2_mpp" value="0_2" <?= ($ttd_sews_o2 === '0_2') ? 'checked' : ''; ?>> Tidak
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
						</tr>

						<tr>
							<td>Suhu</td>
							<td class="center">
								<input type="radio" name="suhu_mpp" value="3_1" <?= ($ttd_sews_suhu === '3_1') ? 'checked' : ''; ?>> <36
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="suhu_mpp" value="0_2" <?= ($ttd_sews_suhu === '0_2') ? 'checked' : ''; ?>> 36.1-37.2
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="suhu_mpp" value="2_3" <?= ($ttd_sews_suhu === '2_3') ? 'checked' : ''; ?>> 37.5-37.7
							</td>
							<td class="center">
								<input type="radio" name="suhu_mpp" value="3_4" <?= ($ttd_sews_suhu === '3_4') ? 'checked' : ''; ?>> >37.7
							</td>
						</tr>

						<tr>
							<td>TD Sistolik</td>
							<td class="center">
								<input type="radio" name="sintolik_mpp" value="3_1" <?= ($ttd_sews_td_sistolik === '3_1') ? 'checked' : ''; ?>> <90
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="sintolik_mpp" value="0_2" <?= ($ttd_sews_td_sistolik === '0_2') ? 'checked' : ''; ?>> 90-140
							</td>
							<td class="center">
								<input type="radio" name="sintolik_mpp" value="1_3" <?= ($ttd_sews_td_sistolik === '1_3') ? 'checked' : ''; ?>> 141-150
							</td>
							<td class="center">
								<input type="radio" name="sintolik_mpp" value="2_4" <?= ($ttd_sews_td_sistolik === '2_4') ? 'checked' : ''; ?>> 151-160
							</td>
							<td class="center">
								<input type="radio" name="sintolik_mpp" value="3_5" <?= ($ttd_sews_td_sistolik === '3_5') ? 'checked' : ''; ?>> >160
							</td>
						</tr>

						<tr>
							<td>TD diastolik</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="diastolik_mpp" value="0_1" <?= ($ttd_sews_td_diastolik === '0_1') ? 'checked' : ''; ?>> 60-90
							</td>
							<td class="center">
								<input type="radio" name="diastolik_mpp" value="1_2" <?= ($ttd_sews_td_diastolik === '1_2') ? 'checked' : ''; ?>> 91-100
							</td>
							<td class="center">
								<input type="radio" name="diastolik_mpp" value="2_3" <?= ($ttd_sews_td_diastolik === '2_3') ? 'checked' : ''; ?>> 101-110
							</td>
							<td class="center">
								<input type="radio" name="diastolik_mpp" value="3_4" <?= ($ttd_sews_td_diastolik === '3_4') ? 'checked' : ''; ?>> >110
							</td>
						</tr>

						<tr>
							<td>Nadi</td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="3_1" <?= ($ttd_sews_nadi === '3_1') ? 'checked' : ''; ?>> <50
							</td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="2_2" <?= ($ttd_sews_nadi === '2_2') ? 'checked' : ''; ?>> 50-60
							</td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="0_3" <?= ($ttd_sews_nadi === '0_3') ? 'checked' : ''; ?>> 61-100
							</td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="1_4" <?= ($ttd_sews_nadi === '1_4') ? 'checked' : ''; ?>> 101-110
							</td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="2_5" <?= ($ttd_sews_nadi === '2_5') ? 'checked' : ''; ?>> 111-120
							</td>
							<td class="center">
								<input type="radio" name="nadi_mpp" value="3_6" <?= ($ttd_sews_nadi === '3_6') ? 'checked' : ''; ?>> >120
							</td>
						</tr>

						<tr>
							<td>Kesadaran</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="kesadaran_mpp" value="0_1" <?= ($ttd_sews_kesadaran_1 === '0_1') ? 'checked' : ''; ?>> A
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="kesadaran_mpp" value="3_2" <?= ($ttd_sews_kesadaran_1 === '3_2') ? 'checked' : ''; ?>> V,P/U
							</td>
						</tr>

						<tr>
							<td>Nyeri</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="nyeri_11_mpp" value="0_1" <?= ($ttd_sews_nyeri === '0_1') ? 'checked' : ''; ?>> Normal
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="nyeri_11_mpp" value="3_2" <?= ($ttd_sews_nyeri === '3_2') ? 'checked' : ''; ?>> Abnormal
							</td>
						</tr>

						<tr>
							<td>Pengeluaran/Lochea</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="pengeluwaran_11_mpp" value="0_1" <?= ($ttd_sews_pengeluaran === '0_1') ? 'checked' : ''; ?>> Normal
							</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="pengeluwaran_11_mpp" value="3_2" <?= ($ttd_sews_pengeluaran === '3_2') ? 'checked' : ''; ?>> Abnormal
							</td>
						</tr>

						<tr>
							<td>Protein urin</td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center"></td>
							<td class="center">
								<input type="radio" name="protein_mpp" value="2_1" <?= ($ttd_sews_protein_urin === '2_1') ? 'checked' : ''; ?>> +
							</td>
							<td class="center">
								<input type="radio" name="protein_mpp" value="3_2" <?= ($ttd_sews_protein_urin === '3_2') ? 'checked' : ''; ?>> >++
							</td>
						</tr>

						<tr>
							<td class="center"><b>TOTAL</b></td>
							<td colspan="7">
								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: white; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpmeows" value="Putih" <?= ($ttd_sews_total_1 === 'Putih') ? 'checked' : ''; ?>> Putih (0)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: green; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpmeows" value="Hijau" <?= ($ttd_sews_total_1 === 'Hijau') ? 'checked' : ''; ?>> Hijau (1-4)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: yellow; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpmeows" value="Kuning" <?= ($ttd_sews_total_1 === 'Kuning') ? 'checked' : ''; ?>> Kuning (5-6/skor 3 pd 1 parameter)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: red; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_mpmeows" value="Merah" <?= ($ttd_sews_total_1 === 'Merah') ? 'checked' : ''; ?>> Merah (≥7)
								</label>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
                            <th class="table__big-title" colspan="9" style="background-color: #B0E0E6; color: black;">PEWS</th>
                        </tr>
						<tr>
							<td width="10%" class="center">Parameter</td>
							<td width="5%" class="center">3</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">0</td>
							<td width="5%" class="center">1</td>
							<td width="5%" class="center">2</td>
							<td width="5%" class="center">3</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Suhu</td>
							<td></td>
							<td class="center">
								<input type="radio" name="suhu2" value="2_1" <?= ($ttd_pews_suhu === '2_1') ? 'checked' : ''; ?>> <35
							</td>
							<td class="center">
								<input type="radio" name="suhu2" value="1_2" <?= ($ttd_pews_suhu === '1_2') ? 'checked' : ''; ?>> 35.1-36
							</td>
							<td class="center">
								<input type="radio" name="suhu2" value="0_3" <?= ($ttd_pews_suhu === '0_3') ? 'checked' : ''; ?>> 36.1-38
							</td>
							<td class="center">
								<input type="radio" name="suhu2" value="1_4" <?= ($ttd_pews_suhu === '1_4') ? 'checked' : ''; ?>> 38.1-38.5
							</td>
							<td class="center">
								<input type="radio" name="suhu2" value="2_5" <?= ($ttd_pews_suhu === '2_5') ? 'checked' : ''; ?>> 38.5
							</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="8">Pernafasan</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> <28 Hari</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_1" <?= ($ttd_pews_pernafasan === '3_1') ? 'checked' : ''; ?>> < 20
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_2" <?= ($ttd_pews_pernafasan === '1_2') ? 'checked' : ''; ?>> 30-39
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_3" <?= ($ttd_pews_pernafasan === '0_3') ? 'checked' : ''; ?>> 40-60
							</td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_4" <?= ($ttd_pews_pernafasan === '3_4') ? 'checked' : ''; ?>> > 60
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 1-12 Bulan</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_5" <?= ($ttd_pews_pernafasan === '3_5') ? 'checked' : ''; ?>> ≤ 20
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_6" <?= ($ttd_pews_pernafasan === '1_6') ? 'checked' : ''; ?>> 20-29
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_7" <?= ($ttd_pews_pernafasan === '0_7') ? 'checked' : ''; ?>> 30-40
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_8" <?= ($ttd_pews_pernafasan === '1_8') ? 'checked' : ''; ?>> 41-50
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="2_9" <?= ($ttd_pews_pernafasan === '2_9') ? 'checked' : ''; ?>> 51-60
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_10" <?= ($ttd_pews_pernafasan === '3_10') ? 'checked' : ''; ?>> ≥ 60
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 13-36 Bulan</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_11" <?= ($ttd_pews_pernafasan === '3_11') ? 'checked' : ''; ?>> < 20
							</td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_12" <?= ($ttd_pews_pernafasan === '0_12') ? 'checked' : ''; ?>> 20-30
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_13" <?= ($ttd_pews_pernafasan === '1_13') ? 'checked' : ''; ?>> 31-50
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="2_14" <?= ($ttd_pews_pernafasan === '2_14') ? 'checked' : ''; ?>> 51-60
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_15" <?= ($ttd_pews_pernafasan === '3_15') ? 'checked' : ''; ?>> > 60
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 4-6 Tahun</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_16" <?= ($ttd_pews_pernafasan === '3_16') ? 'checked' : ''; ?>> < 20
							</td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_17" <?= ($ttd_pews_pernafasan === '0_17') ? 'checked' : ''; ?>> 20-30
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_18" <?= ($ttd_pews_pernafasan === '1_18') ? 'checked' : ''; ?>> 31-50
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="2_19" <?= ($ttd_pews_pernafasan === '2_19') ? 'checked' : ''; ?>> 51-60
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_20" <?= ($ttd_pews_pernafasan === '3_20') ? 'checked' : ''; ?>> > 60
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 7-12 Tahun</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_21" <?= ($ttd_pews_pernafasan === '3_21') ? 'checked' : ''; ?>> < 10
							</td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_22" <?= ($ttd_pews_pernafasan === '0_22') ? 'checked' : ''; ?>> 10-20
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_23" <?= ($ttd_pews_pernafasan === '1_23') ? 'checked' : ''; ?>> 21-30
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="2_24" <?= ($ttd_pews_pernafasan === '2_24') ? 'checked' : ''; ?>> 31-40
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_25" <?= ($ttd_pews_pernafasan === '3_25') ? 'checked' : ''; ?>> > 40
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 13-18 Tahun</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_26" <?= ($ttd_pews_pernafasan === '3_26') ? 'checked' : ''; ?>> < 10
							</td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="0_27" <?= ($ttd_pews_pernafasan === '0_27') ? 'checked' : ''; ?>> 10-20
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="1_28" <?= ($ttd_pews_pernafasan === '1_28') ? 'checked' : ''; ?>> 21-30
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="2_29" <?= ($ttd_pews_pernafasan === '2_29') ? 'checked' : ''; ?>> 31-40
							</td>
							<td class="center">
								<input type="radio" name="pernafasan2" value="3_30" <?= ($ttd_pews_pernafasan === '3_30') ? 'checked' : ''; ?>> > 40
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="subpernafasan2" value="0_1" <?= ($ttd_pews_subpernafasan === '0_1') ? 'checked' : ''; ?>> Tidak Retraksi
							</td>
							<td class="center">
								<input type="radio" name="subpernafasan2" value="1_2" <?= ($ttd_pews_subpernafasan === '1_2') ? 'checked' : ''; ?>> Otot Bantu Nafa
							</td>
							<td class="center">
								<input type="radio" name="subpernafasan2" value="2_3" <?= ($ttd_pews_subpernafasan === '2_3') ? 'checked' : ''; ?>> Retraksi
							</td>
							<td class="center">
								<input type="radio" name="subpernafasan2" value="3_4" <?= ($ttd_pews_subpernafasan === '3_4') ? 'checked' : ''; ?>> Merintih
							</td>
						</tr>
						<tr>
							<td>Alat Bantu O₂</td>
							<td></td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="alat_bantu2" value="0_1" <?= ($ttd_pews_alat_bantu === '0_1') ? 'checked' : ''; ?>> No
							</td>
							<td class="center">
								<input type="radio" name="alat_bantu2" value="1_2" <?= ($ttd_pews_alat_bantu === '1_2') ? 'checked' : ''; ?>> >3L /Menit
							</td>
							<td class="center">
								<input type="radio" name="alat_bantu2" value="2_3" <?= ($ttd_pews_alat_bantu === '2_3') ? 'checked' : ''; ?>> >6L /Menit
							</td>
							<td class="center">
								<input type="radio" name="alat_bantu2" value="3_4" <?= ($ttd_pews_alat_bantu === '3_4') ? 'checked' : ''; ?>> >8L /Menit
							</td>
						</tr>
						<tr>
							<td>Saturasi O₂</td>
							<td class="center">
								<input type="radio" name="saturasi2" value="3_1" <?= ($ttd_pews_saturasi === '3_1') ? 'checked' : ''; ?>> ≤ 85
							</td>
							<td class="center">
								<input type="radio" name="saturasi2" value="2_2" <?= ($ttd_pews_saturasi === '2_2') ? 'checked' : ''; ?>> 86-89
							</td>
							<td class="center">
								<input type="radio" name="saturasi2" value="1_3" <?= ($ttd_pews_saturasi === '1_3') ? 'checked' : ''; ?>> 90-93
							</td>
							<td class="center">
								<input type="radio" name="saturasi2" value="0_4" <?= ($ttd_pews_saturasi === '0_4') ? 'checked' : ''; ?>> ≥ 94
							</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="8">Nadi</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> < 28 Hari</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_1" <?= ($ttd_pews_nadi === '3_1') ? 'checked' : ''; ?>> < 80
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_2" <?= ($ttd_pews_nadi === '2_2') ? 'checked' : ''; ?>> 81-90
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_3" <?= ($ttd_pews_nadi === '1_3') ? 'checked' : ''; ?>> 91-99
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_4" <?= ($ttd_pews_nadi === '0_4') ? 'checked' : ''; ?>> 100-180
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_5" <?= ($ttd_pews_nadi === '1_5') ? 'checked' : ''; ?>> 181-190
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_6" <?= ($ttd_pews_nadi === '3_6') ? 'checked' : ''; ?>> ≥ 200
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 1-12 Bulan</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_7" <?= ($ttd_pews_nadi === '3_7') ? 'checked' : ''; ?>> < 90
							<td class="center">
								<input type="radio" name="nadi2" value="2_8" <?= ($ttd_pews_nadi === '2_8') ? 'checked' : ''; ?>> 90-99
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_9" <?= ($ttd_pews_nadi === '1_9') ? 'checked' : ''; ?>> 100-109
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_10" <?= ($ttd_pews_nadi === '0_10') ? 'checked' : ''; ?>> 110-160
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_11" <?= ($ttd_pews_nadi === '1_11') ? 'checked' : ''; ?>> 161-170
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_12" <?= ($ttd_pews_nadi === '2_12') ? 'checked' : ''; ?>> 171-190
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_13" <?= ($ttd_pews_nadi === '3_13') ? 'checked' : ''; ?>> ≥ 190
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 13-36 Bulan</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_14" <?= ($ttd_pews_nadi === '3_14') ? 'checked' : ''; ?>> ≤ 70
							<td class="center">
								<input type="radio" name="nadi2" value="2_15" <?= ($ttd_pews_nadi === '2_15') ? 'checked' : ''; ?>> 70-79
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_16" <?= ($ttd_pews_nadi === '1_16') ? 'checked' : ''; ?>> 80-89
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_17" <?= ($ttd_pews_nadi === '0_17') ? 'checked' : ''; ?>> 90-140
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_18" <?= ($ttd_pews_nadi === '1_18') ? 'checked' : ''; ?>> 141-160
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_19" <?= ($ttd_pews_nadi === '2_19') ? 'checked' : ''; ?>> 161-170
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_20" <?= ($ttd_pews_nadi === '3_20') ? 'checked' : ''; ?>> > 170
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;"> 4-6 Tahun</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_21" <?= ($ttd_pews_nadi === '3_21') ? 'checked' : ''; ?>> < 60
							<td class="center">
								<input type="radio" name="nadi2" value="2_22" <?= ($ttd_pews_nadi === '2_22') ? 'checked' : ''; ?>> 70-79
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_23" <?= ($ttd_pews_nadi === '1_23') ? 'checked' : ''; ?>> 80-89
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_24" <?= ($ttd_pews_nadi === '0_24') ? 'checked' : ''; ?>> 80-120
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_25" <?= ($ttd_pews_nadi === '1_25') ? 'checked' : ''; ?>> 121-140
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_26" <?= ($ttd_pews_nadi === '2_26') ? 'checked' : ''; ?>> 141-160
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_27" <?= ($ttd_pews_nadi === '3_27') ? 'checked' : ''; ?>> > 160
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;">7-12 Tahun</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_28" <?= ($ttd_pews_nadi === '3_28') ? 'checked' : ''; ?>> < 60
							<td class="center">
								<input type="radio" name="nadi2" value="2_29" <?= ($ttd_pews_nadi === '2_29') ? 'checked' : ''; ?>> 60-69
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_30" <?= ($ttd_pews_nadi === '1_30') ? 'checked' : ''; ?>> 70-79
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_31" <?= ($ttd_pews_nadi === '0_31') ? 'checked' : ''; ?>> 55-100
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_32" <?= ($ttd_pews_nadi === '1_32') ? 'checked' : ''; ?>> 101-120
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_33" <?= ($ttd_pews_nadi === '2_33') ? 'checked' : ''; ?>> 121-140
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_34" <?= ($ttd_pews_nadi === '3_34') ? 'checked' : ''; ?>> > 140
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px;">13-18 Tahun</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_35" <?= ($ttd_pews_nadi === '3_35') ? 'checked' : ''; ?>> < 60
							<td class="center">
								<input type="radio" name="nadi2" value="2_36" <?= ($ttd_pews_nadi === '2_36') ? 'checked' : ''; ?>> 60-69
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_37" <?= ($ttd_pews_nadi === '1_37') ? 'checked' : ''; ?>> 70-79
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="0_38" <?= ($ttd_pews_nadi === '0_38') ? 'checked' : ''; ?>> 55-100
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="1_39" <?= ($ttd_pews_nadi === '1_39') ? 'checked' : ''; ?>> 101-120
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="2_40" <?= ($ttd_pews_nadi === '2_40') ? 'checked' : ''; ?>> 121-140
							</td>
							<td class="center">
								<input type="radio" name="nadi2" value="3_41" <?= ($ttd_pews_nadi === '3_41') ? 'checked' : ''; ?>> > 140
							</td>
						</tr>
						<tr>
							<td>Warna Kulit</td>
							<td></td>
							<td></td>
							<td></td>
							<td class="center">
								<input type="radio" name="warna_kulit2" value="0_1" <?= ($ttd_pews_warna_kulit === '0_1') ? 'checked' : ''; ?>> Tidak
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="warna_kulit2" value="2_2" <?= ($ttd_pews_warna_kulit === '2_2') ? 'checked' : ''; ?>> Tampak
							</td>
							<td class="center">
								<input type="radio" name="warna_kulit2" value="3_3" <?= ($ttd_pews_warna_kulit === '3_3') ? 'checked' : ''; ?>> Sianotik dan
							</td>
						</tr>
						<tr>
							<td>TDS</td>
							<td class="center">
								<input type="radio" name="tds2" value="3_1" <?= ($ttd_pews_tds === '3_1') ? 'checked' : ''; ?>> ≤ 80
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="tds2" value="1_2" <?= ($ttd_pews_tds === '1_2') ? 'checked' : ''; ?>> 80-89
							</td>
							<td class="center">
								<input type="radio" name="tds2" value="0_3" <?= ($ttd_pews_tds === '0_3') ? 'checked' : ''; ?>> 90-119
							</td>
							<td class="center">
								<input type="radio" name="tds2" value="1_4" <?= ($ttd_pews_tds === '1_4') ? 'checked' : ''; ?>> 120-129
							</td>
							<td class="center">
								<input type="radio" name="tds2" value="2_5" <?= ($ttd_pews_tds === '2_5') ? 'checked' : ''; ?>> 130-139
							</td>
							<td class="center">
								<input type="radio" name="tds2" value="3_6" <?= ($ttd_pews_tds === '3_6') ? 'checked' : ''; ?>> > 140
							</td>
						</tr>
						<tr>
							<td>Kesadaran</td>
							<td class="center">
								<input type="radio" name="kesadaran2" value="3_1" <?= ($ttd_pews_kesadaran === '3_1') ? 'checked' : ''; ?>> P/U
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="kesadaran2" value="1_2" <?= ($ttd_pews_kesadaran === '1_2') ? 'checked' : ''; ?>> V
							</td>
							<td class="center">
								<input type="radio" name="kesadaran2" value="0_3" <?= ($ttd_pews_kesadaran === '0_3') ? 'checked' : ''; ?>> A
							</td>
							<td class="center">
								<input type="radio" name="kesadaran2" value="1_4" <?= ($ttd_pews_kesadaran === '1_4') ? 'checked' : ''; ?>> V
							</td>
							<td></td>
							<td class="center">
								<input type="radio" name="kesadaran2" value="3_5" <?= ($ttd_pews_kesadaran === '3_5') ? 'checked' : ''; ?>> P/U
							</td>
						</tr>
						<tr>
							<td class="center"><b>TOTAL</b></td>
							<td colspan="7">
								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: green; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_skalapews" value="Hijau" <?= ($ttd_pews_total === 'Hijau') ? 'checked' : ''; ?>> Hijau (0-2)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: yellow; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_skalapews" value="Kuning" <?= ($ttd_pews_total === 'Kuning') ? 'checked' : ''; ?>> Kuning (3-4)
								</label>

								<label style="display: inline-flex; align-items: center; margin-right: 15px;">
									<span style="width: 15px; height: 15px; background-color: red; border: 1px solid #000; margin-right: 3px;"></span>
									<input type="radio" name="total_skalapews" value="Merah" <?= ($ttd_pews_total === 'Merah') ? 'checked' : ''; ?>> Merah (≥5/3 Pada salah satu parameter)
								</label>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="table table-sm table-striped table-bordered">                                       
					<thead>
						<tr>
							<th class="center" colspan="9" style="background-color: #B0E0E6; color: black;"><b>Respon / Tata Laksana EWS</b></th>
						</tr>
						<tr>
							<th width="5%"><b>Putih</b></th>
							<th width="1%" class="center"><b>:</b></th>
							<td width="80%"> Monitoring per shift</td>
						</tr>
						<tr>
							<th width="5%"><b>Hijau</b></th>
							<th width="1%" class="center"><b>:</b></th>
							<td width="80%"> Assesmen segera oleh perawat senior / katim, monitoring per 4-6 jam</td>
						</tr>
						<tr>
							<th width="5%"><b>Kuning</b></th>
							<th width="1%" class="center"><b>:</b></th>
							<td width="80%"> Assesmen segera oleh dokter jaga, monitoring per 1 jam konsultasi DPJP dan pertimbangan perawatan di HCU/ICU</td>
						</tr>
						<tr>
							<th width="5%"><b>Merah</b></th>
							<th width="1%" class="center"><b>:</b></th>
							<td width="80%"> Laporkan ke dokter jaga, lakukan resusitasi dan monitoring secara kontinyu Aktivasi Code Blue kegawatan medis (respon maksimal 10 menit) dan konsultasi DPJP Laporkan kondisi pasien ke keluarga dan rencanakan untuk pindah ke tingkat perawatan ruang ICU</td>
						</tr>
					</thead>
				</table>

				<table class="table table-sm table-striped table-bordered">                                       
					<thead>
						<tr>
							<td class="center" width="50%" style="background-color: #B0E0E6; color: black;"><b>Kode pencatatan status kesadaran</b></td>
							<td class="center" width="50%" style="background-color: #B0E0E6; color: black;"><b>Plebitis</b></td>
						</tr>
						<tr>
							<td>A = Alert (Sadar Penuh)</td>
							<td>0 : Tidak ada tanda Pelebitis</td>
						</tr>
						<tr>
							<td>C = Confusion (Kebingungan)</td>
							<td>1 : Merah atau sakit bila di tekan</td>
						</tr>
						<tr>
							<td>V = Verbal (respon dengan suara) Somnolen, dapat ditenangkan</td>
							<td>2 : Merah, sakit bila di tekan oedema </td>
						</tr>
						<tr>
							<td>P = Pain (respon dengan nyeri) Letargi, Gelisah, penurunan respon nyeri</td>
							<td>3 : Merah, sakit bila di tekan oedema dan vena mengeras</td>
						</tr>
						<tr>
							<td>U = Unrespon</td>
							<td>4 : Merah, sakit bila di tekan oedema, vena mengeras dan timbul pus</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<img src="<?= resource_url() ?>images/attributes/puplis.png" alt="Puplis" class="img-fluid mx-auto d-block rounded shadow" style="width: 400px; height: 60px;">
							</td>
						</tr>
					</thead>
				</table>

				<table class="table table-sm table-striped table-bordered">                                       
					<thead>
						<tr>
							<td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>GCS / EYE (E)</b></td>
							<td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>MOTORIK (M)</b></td>
							<td class="center" width="33%" style="background-color: #B0E0E6; color: black;"><b>VERBAL (V)</b></td>
						</tr>
						<tr>
							<td>4 : Spontan</td>
							<td>6 : Mengikuti Perintah</td>
							<td>5 : Sadar, orientasi diri, waktu dan tempat</td>
						</tr>
						<tr>
							<td>3 : Atas Perintah</td>
							<td>5 : Melokalisasi Nyeri</td>
							<td>4 : Berbicara membingungkan</td>
						</tr>
						<tr>
							<td>2 : Dengan rangsangan nyeri</td>
							<td>4 : Gerakan menghindar</td>
							<td>3 : Kalimat tidak mempunyai arti</td>
						</tr>
						<tr>
							<td>1 : Tidak ada reaksi</td>
							<td>3 : Fleksi abnormal</td>
							<td>2 : Mengerang</td>
						</tr>
						<tr>
							<td></td>
							<td>2 : Extensi abnormal</td>
							<td>1 : Tidak ada respon</td>
						</tr>
						<tr>
							<td></td>
							<td>1 : Tidak ada respon</td>
							<td></td>
						</tr>
					</thead>
				</table>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-66-03</p>
        </div>
    </footer>	
</body>								
<?php die; ?>