
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
			font-size: 10pt;
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
			gap: 9px; /* Mengatur jarak antar elemen */
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
			gap: 5px;
		}

		.identity__section-title p, 
		.identity__section-subtitle p {
			font-size: 13px;
			line-height: 1.3;
			margin: 0;
		}	

		thead td {
			width: 1%; /* Sesuaikan dengan kebutuhan */
			text-align: center;
			white-space: nowrap; 
			padding: 7px; /* Biar nggak terlalu mepet */
		}

	</style>
</head>

<!-- <body onload="setTimeout(()=>window.print(),1000)"> Ketika halaman dimuat, jalankan fungsi setTimeout setelah 1 detik -->
<!-- setTimeout(()=>window.print(),1000);  // Menunda eksekusi fungsi window.print() selama 1000 milidetik (1 detik), kemudian membuka dialog pencetakan -->

<!-- <body onload="document.fonts.ready.then(() => setTimeout(() => window.print(), 500))"> -->
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
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- 783px -->
    <main class="main">
        <section class="tpgd">
			<br>
            <div class="tpgd__container container">
                <table class="big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="13">PARTOGRAF</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
                            <td class="no__border" colspan="2">Nama Pasien :  <?= $pasien->nama; ?></td>

                            <td class="no__border" colspan="2">
                                Umur : 
                                <?php 
                                    $tanggal_lahir = new DateTime($pasien->tanggal_lahir);
                                    $sekarang = new DateTime();
                                    $umur = $sekarang->diff($tanggal_lahir)->y; // Menghitung selisih tahun
                                    echo $umur . " tahun";
                                ?>
                            </td>
							<td class="no__border" colspan="3">
                                <span> G : <?= $ttd_g_partograf ?></span>
                                <span style="margin-left: 10px;"> P : <?= $ttd_p_partograf ?></span>
                                <span style="margin-left: 10px;"> A : <?= $ttd_a_partograf ?></span>
                            </td>
                            <td class="no__border" colspan="2">Hamil : <?= $ttd_hamil_partograf ?> Minggu</td>
						</tr>

						<tr>
							<!-- <td class="no__border" colspan="2">Nama Suami : <!?= $pasien->nama_pjwb; ?></td> -->
							<td class="no__border" colspan="2">Nama Suami : <?= $ttd_nama_ayah; ?></td>
                            <td class="no__border" colspan="2">
                                Umur : 
                                <?php 
                                    $tgl_lahir_pjwb = new DateTime($pasien->tgl_lahir_pjwb);
                                    $sekarang = new DateTime();
                                    $umur = $sekarang->diff($tgl_lahir_pjwb)->y; // Menghitung selisih tahun
                                    echo $umur . " tahun";
                                ?>
                            </td>
                            <td class="no__border" colspan="3"></td>
                            <td class="no__border" colspan="2">TBJ : <?= $ttd_tbj_partograf ?> Gram</td>
						</tr>
						<tr>
                            <td class="no__border" colspan="2">Masuk RS Tgl : <?= datefmysql($ttd_tgl_masuk_partograf); ?></td>
                            <td class="no__border" colspan="2"> PukuL : <?= $ttd_pukul_masuk_partograf ?></td>
							<td class="no__border" colspan="3">Mulas teratur sejak tgl : <?= datefmysql($ttd_tgl_mulas_partograf); ?></td>
                            <td class="no__border" colspan="2">Pukul :<?= $ttd_pukul_mulas_partograf ?></td>
						</tr>
						<tr>
							<td class="no__border" colspan="2"></td>
                            <td class="no__border" colspan="2"></td>
                            <td class="no__border" colspan="3">Ketuban Pecah sejak tgl : <?= datefmysql($ttd_tgl_pecah_partograf); ?></td>
                            <td class="no__border" colspan="2">Pukul :<?= $ttd_pukul_pecah_partograf ?></td>
						</tr>
                    </tbody>
                </table>

				<div id="grafik_partograf" style="width: 100%; max-width: 783px; height: 285px; border: 1px solid black; background-color: #f4f4f4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);"></div>
				<table class="big__line__spacing small__font" style="border: 1px solid black; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
					<script>
						var rawData = JSON.parse('<?= json_encode($ttd_denyut_partograf); ?>')
							.map(item => (item !== null && item !== '' && !isNaN(parseFloat(item))) ? parseFloat(item) : null);

						var maxDataLength = 32; // Maksimal 50 titik
						var denyutData = [];

						// Isi array sampai 50 titik data
						for (var i = 0; i < maxDataLength; i++) {
							denyutData.push(rawData[i] !== undefined ? rawData[i] : null);
						}

						Highcharts.chart('grafik_partograf', {
							title: {
								text: 'Grafik Denyut Jantung Janin',
								style: {
									fontSize: '12px',
									fontWeight: 'bold',
									color: '#333'
								}
							},
							chart: {
								type: 'spline',
								backgroundColor: '#f4f4f4',
								borderColor: '#000',
								borderWidth: 0.5,
								plotShadow: true,
								shadow: {
									color: '#000',
									offsetX: 0.5,
									offsetY: 0.5,
									opacity: 0.5
								}
							},

							xAxis: {
								min: 0,
								max: 31, // Pastikan ini 31, bukan 30
								tickInterval: 1,
								gridLineWidth: 1,
								gridLineColor: '#000',
								labels: {
									enabled: false
								}
							},

							yAxis: {
								title: {
									text: 'Denyut Jantung Janin (x/menit)',
									rotation: -90,
									useHTML: true
								},
								min: 80,
								max: 200,
								tickInterval: 10,
								gridLineWidth: 1,
								gridLineColor: '#000',
								labels: {
									enabled: true
								}
							},
							series: [{
								name: 'Denyut Jantung Janin',
								data: denyutData,
								marker: {
									symbol: 'circle',
									radius: 2
								},
								lineWidth: 2,
								color: '#ff0000',
								dataLabels: {
									enabled: true,
									allowOverlap: true, // Supaya semua angka tetap muncul
									format: '{point.y}',
									style: {
										fontSize: '8px',
										color: '#000000',
										fontWeight: 'bold',
										textOutline: '2px white' // Biar angka lebih kontras
									}
								}
							}],
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
							legend: {
								enabled: true,
								itemStyle: {
									fontSize: '10px',
									fontWeight: 'bold'
								}
							},
							plotOptions: {
								series: {
									dataLabels: {
										enabled: true,
										format: '{point.y}',
										style: {
											fontSize: '12px',
											color: '#000000',
											textOutline: '2px white'
										}
									},
									marker: {
										enabled: true,
										radius: 4
									}
								}
							}
						});
					</script>
				</table>

				<table class="big__line__spacing small__font">
					<thead>
						<tr>
							<?php $air_ket_penyusupan = json_decode($ttd_air_ket_penyusupan); ?>
							<td width="5%" class="center">Air Ketuban /</td>
							<?php for ($i = 1; $i <= 32; $i++) : ?>
								<td width="5%" class="center">
									<span><?= isset($air_ket_penyusupan->{"air_ket_penyusupan_$i"}) ? htmlspecialchars($air_ket_penyusupan->{"air_ket_penyusupan_$i"}) : '' ?></span>
								</td>
							<?php endfor; ?>
						</tr>
						<tr>
							<?php $air_ketu_penyusupan = json_decode($ttd_air_ketu_penyusupan); ?>
							<td width="5%" class="center">Penyusupan</td>
							<?php for ($i = 1; $i <= 32; $i++) : ?>
								<td width="5%" class="center">
									<span><?= isset($air_ketu_penyusupan->{"air_ketu_penyusupan_$i"}) ? htmlspecialchars($air_ketu_penyusupan->{"air_ketu_penyusupan_$i"}) : '' ?></span>
								</td>
							<?php endfor; ?>
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;"> 
					<tbody>
						<tr>
							<td width="7%" class="center"><span>Tanggal : <?= datefmysql($ttd_tgl_grafik_sk); ?></span></td>
							<td width="7%" class="center"><span>Jam : <?= $ttd_jam_grafik_sk ?></span></td>
							<!-- <td width="20%" style="word-wrap: break-word; white-space: normal;">
								<span>Keterangan: <!?= htmlspecialchars($ttd_keterangan_grafik_sk) ?></span>
							</td> -->

							<td width="20%" style="word-wrap: break-word; white-space: pre-line;">
								<span>Keterangan: <?= htmlspecialchars($ttd_keterangan_grafik_sk) ?></span>
							</td>

						</tr>
					</tboby>
				</table>

				<div id="grafik_serviks" style="width: 100%; max-width: 783px; height: 285px; border: 1px solid black; background-color: #f4f4f4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);"></div>
				<table class="big__line__spacing small__font" style="border: 1px solid black; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
					<script>
						function formatData(number_serviks, dataArray) {
							return number_serviks
								.map((number, index) => [number, dataArray[index]])
								.map(([number, data]) => [
									number ? parseFloat(number.replace(',', '.')) : null,
									data ? parseFloat(data.replace(',', '.')) : null
								])
								.filter(([number, data]) => number !== null && data !== null);
						}

	

						// Mendapatkan data yang dibutuhkan
						const number_serviks = JSON.parse('<?= json_encode(isset($ttd_number_serviks) ? $ttd_number_serviks : []); ?>');
						// Memformat data atas, nadi, dan tekanan menggunakan fungsi yang sama
						var kepalaData = formatData(number_serviks, JSON.parse('<?= json_encode(isset($ttd_kepala_serviks) ? $ttd_kepala_serviks : []); ?>'));
						var serviksData = formatData(number_serviks, JSON.parse('<?= json_encode(isset($ttd_pembukaan_serviks) ? $ttd_pembukaan_serviks : []); ?>'));
						Highcharts.chart('grafik_serviks', {
							title: {
								text: 'Grafik Serviks',
								style: {
									fontSize: '12px',
									fontWeight: 'bold',
									color: '#333'
								}
							},
						
							chart: {
								type: 'spline',
								backgroundColor: '#f4f4f4',
								borderColor: '#000', // Border hitam
								borderWidth: 0.5,
								plotShadow: true,
								shadow: {
									color: '#000', // Bayangan hitam
									offsetX: 0.5,
									offsetY: 0.5,
									opacity: 0.5,
									width: 2
								},
								animation: {
									duration: 2000,
									easing: 'easeOutBounce'
								},
								resetZoomButton: {
									position: { x: -110, y: 10 }
								}
							},

							
							yAxis: {
								title: {
									text: 'Pembukaan Serviks (cm) beri tanda X<br/>Turunnya Kepala (beri tanda O)<br/>Sentimeter (cm)',
									align: 'middle',
									rotation: -90,
									x: 0
								},
								min: 0,
								max: 10,
								tickInterval: 1,
								gridLineWidth: 1,
								gridLineColor: '#000000' // Warna hitam untuk garis tabel
							},

							xAxis: {
								min: 0,
								max: 16,
								tickInterval: 1,
								minorTickInterval: 0.5, // Tambah garis di tengah-tengah
								minorGridLineWidth: 1, // Biar kelihatan jelas
								minorGridLineColor: '#000000', // Warna abu-abu muda biar ga terlalu mencolok
								gridLineWidth: 1,
								gridLineColor: '#000000',
								title: {
									text: '',
									align: 'middle'
								},
								accessibility: {
									rangeDescription: 'Range: 0 to 16 hours.'
								},
								labels: {
									formatter: function() {
										return '' + this.value;
									}
								}
							},

							series: [
								{
									name: '<span style="font-size:10px;">(X)</span>',
									data: serviksData,
									marker: {
										symbol: 'url(data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"%3E%3Cline x1="1" y1="1" x2="11" y2="11" stroke="red" stroke-width="2"/%3E%3Cline x1="11" y1="1" x2="1" y2="11" stroke="red" stroke-width="2"/%3E%3C/svg%3E)',
										radius: 0 // Radius harus 0 jika menggunakan simbol kustom
									},
									lineWidth: 2,
									shadow: true,
									color: '#ff0000',
									states: { hover: { lineWidth: 2 } }
								},



								{
									name: 'Dummy Data',
									data: [3.8, 4.8, 5.8, 6.8, 7.8, 8.8, 9.8, 10.8],
									marker: { enabled: false },
									lineWidth: 2,
									shadow: false,
									color: '#808080',
									enableMouseTracking: false,
									showInLegend: false
								},
								{
									name: '',
									type: 'scatter',
									data: [12, 12, 5.5, 12, 12],
									// data: [12, 12, 3.5, 12, 12],
									marker: { enabled: false },
									showInLegend: false,
									dataLabels: {
										enabled: true,
										// format: 'W A S P A D A',
										format: '<span style="color: #C0C0C0;">W A S P A D A</span>',
										align: 'left',
										style: {
											color: '#808080',
											fontWeight: 'normal',
											fontSize: '0px', // Ubah ukuran agar terlihat
											letterSpacing: '4px'
										},
										allowOverlap: true,
										// rotation: 345,
										rotation: 340,
										verticalAlign: 'middle',
										y: -2
										// y: -50
									}
								},

								{
									name: 'Dummy Data', // Nama seri data, yang akan tampil di legend (jika ditampilkan)
									data: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], // Data yang akan ditampilkan pada grafik
									marker: { enabled: false }, // Menonaktifkan penanda titik data (marker)
									lineWidth: 2, // Ketebalan garis grafik
									shadow: false, // Menonaktifkan bayangan pada grafik
									color: '#666666', // Warna garis grafik
									enableMouseTracking: false, // Menonaktifkan pelacakan mouse di grafik (tidak ada interaksi ketika mouse diarahkan ke titik data)
									showInLegend: false, // Menyembunyikan data ini dari legenda
									zones: [ // Menentukan zona pada grafik, untuk memberikan warna yang berbeda berdasarkan nilai
										{
											value: 4, // Nilai batas zona pertama
											color: 'rgba(0, 0, 0, 0)' // Warna transparan untuk zona pertama
										},
										{
											color: '#666666' // Warna zona kedua, setelah batas 4
										}
									]
								},

								{
									name: '', // Nama seri data ini, di sini kosong, jadi tidak ada label yang ditampilkan di legend
									type: 'scatter', // Tipe grafik yang digunakan adalah 'scatter' (grafik titik)
									data: [12, 12, 12, 12, 12, 12, 4, 12, 12, 12, 12, 12], // Data yang akan dipetakan ke grafik titik
									marker: { enabled: false }, // Menonaktifkan penanda titik data (marker), jadi tidak ada penanda visual di titik-titik data
									showInLegend: false, // Menyembunyikan data ini dari tampilan legenda
									dataLabels: { // Menambahkan label pada titik data
										enabled: true, // Mengaktifkan tampilan label
										// format: 'B E R T I N D A K', // Format teks yang ditampilkan pada label (tetap 'B E R T I N D A K' untuk semua titik)
										format: '<span style="color: #C0C0C0;">B E R T I N D A K</span>',
										align: 'left', // Menyelaraskan label ke kiri
										style: { // Menentukan gaya teks untuk label
											color: '#808080', // Warna teks abu-abu
											fontWeight: 'normal', // Berat font normal
											fontSize: '0px', // Ukuran font 0px (label tidak akan terlihat karena font terlalu kecil)
											letterSpacing: '3px', // Jarak antar huruf sebesar 3px
											textShadow: 'none' // Menghilangkan bayangan pada teks
										},
										allowOverlap: true, // Memungkinkan label untuk tumpang tindih (overlap)
										// rotation: 344, // Memutar label sebesar 335 derajat
										rotation: 340, // Memutar label sebesar 335 derajat
										verticalAlign: 'middle', // Menyelaraskan label secara vertikal di tengah
										// y: -17 // Posisi label vertikal 20px di atas titik data
										y: -30 // Posisi label vertikal 20px di atas titik data
									}
								},






								{
									name: '<span style="font-size:10px;">(O)</span>',
									data: kepalaData,
									marker: {
										symbol: 'circle',
										radius: 4,
										fillColor: 'transparent',
										lineWidth: 2,
										lineColor: '#0000ff'
									},
									lineWidth: 2,
									shadow: true,
									color: '#0000ff',
									states: { hover: { lineWidth: 2 } }
								}
							],


							tooltip: {
								headerFormat: '<b>{series.name}</b><br>',
								pointFormat: '{point.y}',
								backgroundColor: 'rgba(255,255,255,0.95)',
								borderColor: '#ccc',
								borderRadius: 10,
								style: { fontSize: '10px' },
								shadow: true
							}
						});
					</script>
				</table>
				
				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<thead>
						<tr>
							<?php $waktujam = json_decode($ttd_waktujam); ?>
							<td width="5%" class="center">
								<span> Jam :</span>
							</td>
							<td width="5%" class="center">
								<span> <?= !empty($waktujam->waktujam_1) ? htmlspecialchars($waktujam->waktujam_1) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_2) ? htmlspecialchars($waktujam->waktujam_2) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_3) ? htmlspecialchars($waktujam->waktujam_3) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_4) ? htmlspecialchars($waktujam->waktujam_4) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_5) ? htmlspecialchars($waktujam->waktujam_5) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_6) ? htmlspecialchars($waktujam->waktujam_6) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_7) ? htmlspecialchars($waktujam->waktujam_7) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_8) ? htmlspecialchars($waktujam->waktujam_8) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_9) ? htmlspecialchars($waktujam->waktujam_9) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_10) ? htmlspecialchars($waktujam->waktujam_10) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_11) ? htmlspecialchars($waktujam->waktujam_11) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_12) ? htmlspecialchars($waktujam->waktujam_12) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_13) ? htmlspecialchars($waktujam->waktujam_13) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_14) ? htmlspecialchars($waktujam->waktujam_14) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_15) ? htmlspecialchars($waktujam->waktujam_15) : '' ?></span>
							</td>
							<td width="5%" class="center">
								<span><?= !empty($waktujam->waktujam_16) ? htmlspecialchars($waktujam->waktujam_16) : '' ?></span>
							</td>
						</tr>
					</thead>
				</table>

				<table class="big__line__spacing small__font">
					<thead>
						<tr>
							<td width="8%" class="center">Kontraksi tiap 10 menit</td>
							<td width="3%" class="center"></td>
							<td width="1%" style="vertical-align: top;">5</td>							
							<?php
							$putih = json_decode($ttd_putih, true) ?: [];
							$abu = json_decode($ttd_abu, true) ?: [];
							$hitam = json_decode($ttd_hitam, true) ?: [];
							for ($i = 1; $i <= 32; $i++) {
								$cellId = "cell$i";
								$checkboxId = "checkbox$i";
								
								// Menentukan style background berdasarkan kondisi
								$backgroundStyle = "";
								if (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') {
									$backgroundStyle = "background: 
										radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
										background-size: 5px 5px;";
								} elseif (!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') {
									$backgroundStyle = "background: 
										linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, 
										transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
										background-size: 10px 10px;";
								} elseif (!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') {
									$backgroundStyle = "background-color: #000000;";
								}

								// Menentukan apakah checkbox harus dicentang
								$checked = (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') ||
										(!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') ||
										(!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') ? 'checked' : '';
									echo "<td id='$cellId' style='border: 1px solid #000; $backgroundStyle; text-align: center; padding: 0;'>
									<label style='display: flex; justify-content: center; align-items: center; height: 15px;'>
										<input type='checkbox' id='$checkboxId' $checked 
											style='transform: scale(0.0); margin: 0; padding: 0; width: 10px; height: 10px;' 
											onclick='changeColor(\"$cellId\", this)' />
									</label>
								</td>";
							}
							?>
						</tr>

						<tr>
							<td width="8%" class="center"></td>
							<td width="3%" class="center"></td>
							<td width="1%" style="vertical-align: top;">4</td>							
							<?php
							for ($i = 33; $i <= 64; $i++) {
								$cellId = "cell$i";
								$checkboxId = "checkbox$i";
								
								// Menentukan style background berdasarkan kondisi
								$backgroundStyle = "";
								if (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') {
									$backgroundStyle = "background: 
										radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
										background-size: 5px 5px;";
								} elseif (!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') {
									$backgroundStyle = "background: 
										linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, 
										transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
										background-size: 10px 10px;";
								} elseif (!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') {
									$backgroundStyle = "background-color: #000000;";
								}

								// Menentukan apakah checkbox harus dicentang
								$checked = (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') ||
										(!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') ||
										(!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') ? 'checked' : '';
									echo "<td id='$cellId' style='border: 1px solid #000; $backgroundStyle; text-align: center; padding: 0;'>
									<label style='display: flex; justify-content: center; align-items: center; height: 15px;'>
										<input type='checkbox' id='$checkboxId' $checked 
											style='transform: scale(0.0); margin: 0; padding: 0; width: 10px; height: 10px;' 
											onclick='changeColor(\"$cellId\", this)' />
									</label>
								</td>";
							}
							?>
						</tr>

						<tr>
							<td width="8%" class="center" style="background:
								radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
								radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
								radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
								background-size: 5px 5px;">
							</td>
							<td width="3%" class="center">< 20</td>
							<td width="1%" style="vertical-align: top;">3</td>							
							<?php
							for ($i = 65; $i <= 96; $i++) {
								$cellId = "cell$i";
								$checkboxId = "checkbox$i";
								
								// Menentukan style background berdasarkan kondisi
								$backgroundStyle = "";
								if (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') {
									$backgroundStyle = "background: 
										radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
										background-size: 5px 5px;";
								} elseif (!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') {
									$backgroundStyle = "background: 
										linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, 
										transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
										background-size: 10px 10px;";
								} elseif (!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') {
									$backgroundStyle = "background-color: #000000;";
								}

								// Menentukan apakah checkbox harus dicentang
								$checked = (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') ||
										(!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') ||
										(!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') ? 'checked' : '';
									echo "<td id='$cellId' style='border: 1px solid #000; $backgroundStyle; text-align: center; padding: 0;'>
									<label style='display: flex; justify-content: center; align-items: center; height: 15px;'>
										<input type='checkbox' id='$checkboxId' $checked 
											style='transform: scale(0.0); margin: 0; padding: 0; width: 10px; height: 10px;' 
											onclick='changeColor(\"$cellId\", this)' />
									</label>
								</td>";
							}
							?>
						</tr>

						<tr>
							<td width="8%" class="center" style="background:
								linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
                                background-size: 10px 10px;">
							</td>
							<td width="3%" class="center">20-40</td>
							<td width="1%" style="vertical-align: top;">2</td>							
							<?php
							for ($i = 97; $i <= 128; $i++) {
								$cellId = "cell$i";
								$checkboxId = "checkbox$i";
								
								// Menentukan style background berdasarkan kondisi
								$backgroundStyle = "";
								if (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') {
									$backgroundStyle = "background: 
										radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
										background-size: 5px 5px;";
								} elseif (!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') {
									$backgroundStyle = "background: 
										linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, 
										transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
										background-size: 10px 10px;";
								} elseif (!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') {
									$backgroundStyle = "background-color: #000000;";
								}

								// Menentukan apakah checkbox harus dicentang
								$checked = (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') ||
										(!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') ||
										(!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') ? 'checked' : '';
									echo "<td id='$cellId' style='border: 1px solid #000; $backgroundStyle; text-align: center; padding: 0;'>
									<label style='display: flex; justify-content: center; align-items: center; height: 15px;'>
										<input type='checkbox' id='$checkboxId' $checked 
											style='transform: scale(0.0); margin: 0; padding: 0; width: 10px; height: 10px;' 
											onclick='changeColor(\"$cellId\", this)' />
									</label>
								</td>";
							}
							?>
						</tr>

						<tr>
							<td width="8%" class="center" style="background-color: #000000;"></td>
							<td width="3%" class="center"> >40 (detik)</td>
							<td width="1%" style="vertical-align: top;">1</td>							
							<?php
							for ($i = 129; $i <= 160; $i++) {
								$cellId = "cell$i";
								$checkboxId = "checkbox$i";
								
								// Menentukan style background berdasarkan kondisi
								$backgroundStyle = "";
								if (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') {
									$backgroundStyle = "background: 
										radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
										radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
										radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px);
										background-size: 5px 5px;";
								} elseif (!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') {
									$backgroundStyle = "background: 
										linear-gradient(45deg, transparent 25%, #cccccc 25%, #cccccc 50%, 
										transparent 50%, transparent 75%, #cccccc 75%, #cccccc);
										background-size: 10px 10px;";
								} elseif (!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') {
									$backgroundStyle = "background-color: #000000;";
								}

								// Menentukan apakah checkbox harus dicentang
								$checked = (!empty($putih["putih_$i"]) && $putih["putih_$i"] == '1') ||
										(!empty($abu["abu_$i"]) && $abu["abu_$i"] == '1') ||
										(!empty($hitam["hitam_$i"]) && $hitam["hitam_$i"] == '1') ? 'checked' : '';
									echo "<td id='$cellId' style='border: 1px solid #000; $backgroundStyle; text-align: center; padding: 0;'>
									<label style='display: flex; justify-content: center; align-items: center; height: 15px;'>
										<input type='checkbox' id='$checkboxId' $checked 
											style='transform: scale(0.0); margin: 0; padding: 0; width: 10px; height: 10px;' 
											onclick='changeColor(\"$cellId\", this)' />
									</label>
								</td>";
							}
							?>
						</tr>
					</thead>
				</table>

				<script>
					function changeColor(cellId, checkbox) {
						const cell = document.getElementById(cellId);
						if (!cell || !checkbox) return;

						if (checkbox.checked) {
							// Ganti warna (berdasarkan logika tambahan jika diperlukan)
							cell.style.background = `
								radial-gradient(circle at 1.25px 1.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 3.75px 3.75px, black 1.25px, white 1.25px),
								radial-gradient(circle at 6.25px 6.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 8.75px 8.75px, black 1.25px, white 1.25px),
								radial-gradient(circle at 11.25px 11.25px, black 1.25px, white 1.25px),
								radial-gradient(circle at 13.75px 13.75px, black 1.25px, white 1.25px)`;
							cell.style.backgroundSize = '5px 5px';
						} else {
							// Reset warna jika tidak dicentang
							cell.style.background = '';
						}
					}
				</script>


				<table class="big__line__spacing small__font">
					<thead>
						<tr>
							<?php $oksitosin = json_decode($ttd_oksitosin); ?>
							<td width="5%" class="center">Oksitosin U/L</td>
							<?php for ($i = 1; $i <= 32; $i++) : ?>
								<td width="5%" class="center">
									<span><?= isset($oksitosin->{"oksitosin_$i"}) ? htmlspecialchars($oksitosin->{"oksitosin_$i"}) : '' ?></span>
								</td>
							<?php endfor; ?>
						</tr>
						<tr>
							<?php $tetes = json_decode($ttd_tetes); ?>
							<td width="5%" class="center">Tetes/Menit</td>
							<?php for ($i = 1; $i <= 32; $i++) : ?>
								<td width="5%" class="center">
									<span><?= isset($tetes->{"tetes_$i"}) ? htmlspecialchars($tetes->{"tetes_$i"}) : '' ?></span>
								</td>
							<?php endfor; ?>
						</tr>
					</thead>
				</table>


				<table class="big__line__spacing small__font">
					<tbody>
						<tr>
							<?php $obat_cairan = json_decode($ttd_obat_cairan); ?>
							<td width="5%" class="center">Obat dan cairan IV</td>
							<?php for ($i = 1; $i <= 16; $i++) : ?>
								<td width="2%" class="center">
									<span><?= isset($obat_cairan->{"obat_cairan_$i"}) ? htmlspecialchars($obat_cairan->{"obat_cairan_$i"}) : '' ?></span>
								</td>
							<?php endfor; ?>
						</tr>
					</tbody>
				</table>


				<div id="grafik_nt" style="width: 100%; max-width: 783px; height: 300px; border: 1px solid black; background-color: #f4f4f4; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);"></div>
				<table class="big__line__spacing small__font" style="border: 1px solid black; box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
					<script>
						// Fungsi untuk memformat data menjadi pasangan nilai
						function formatData(numberntArray, dataArray) {
							return numberntArray
								.map((numbernt, index) => [numbernt, dataArray[index]])
								.map(([numbernt, data]) => [
									numbernt ? parseFloat(numbernt.replace(',', '.')) : null,
									data ? parseFloat(data.replace(',', '.')) : null
								])
								.filter(([numbernt, data]) => numbernt !== null && data !== null);
						}

						// Mendapatkan data yang dibutuhkan
						const numberntArray = JSON.parse('<?= json_encode(isset($ttd_number_nt) ? $ttd_number_nt : []); ?>');
						// Memformat data atas, nadi, dan tekanan menggunakan fungsi yang sama
						var atasData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_atas_nt) ? $ttd_atas_nt : []); ?>'));
						var nadiData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_nadi_nt) ? $ttd_nadi_nt : []); ?>'));
						var tekananData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt) ? $ttd_tekanan_nt : []); ?>'));

						var tekananAData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_3) ? $ttd_tekanan_nt_3 : []); ?>'));
						var tekananBData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_4) ? $ttd_tekanan_nt_4 : []); ?>'));
						var tekananCData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_5) ? $ttd_tekanan_nt_5 : []); ?>'));
						var tekananDData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_6) ? $ttd_tekanan_nt_6 : []); ?>'));
						var tekananEData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_7) ? $ttd_tekanan_nt_7 : []); ?>'));
						var tekananFData = formatData(numberntArray, JSON.parse('<?= json_encode(isset($ttd_tekanan_nt_8) ? $ttd_tekanan_nt_8 : []); ?>'));

					
						Highcharts.chart('grafik_nt', {
							title: {
								text: 'Grafik NTD',
								style: {
									fontSize: '12px',
									fontWeight: 'bold',
									color: '#333'
								}
							},
							chart: {
								type: 'spline',
								backgroundColor: '#f4f4f4',
								borderColor: '#000',
								borderWidth: 0.5,
								plotShadow: true,
								shadow: {
									color: '#000',
									offsetX: 0.5,
									offsetY: 0.5,
									opacity: 0.5,
									width: 3
								},
								animation: {
									duration: 2000,
									easing: 'easeOutBounce'
								},
								resetZoomButton: {
									position: { x: -110, y: 10 }
								}
							},
							yAxis: {
								title: {
									text: '<---------------------------><span style="display: inline-block; transform: rotate(-270deg);">Nadi</span> <br/> Tekanan Darah',
									align: 'middle',
									rotation: -90,
									x: 0,
									useHTML: true
								},
								lineWidth: 2,
								min: 60,
								max: 180,
								tickInterval: 10,
								gridLineWidth: 1,
								gridLineColor: '#000',
							},


							// xAxis: {
							// 	min: 0,
							// 	max: 31, // Ubah dari 25 ke 31
							// 	tickInterval: 1,
							// 	gridLineWidth: 1,
							// 	gridLineColor: '#000000',
							// 	title: {
							// 		text: '',
							// 		align: 'middle'
							// 	},
							// 	accessibility: {
							// 		rangeDescription: 'Range: 0 to 31 hours.' // Ubah deskripsi juga
							// 	},
							// 	labels: {
							// 		formatter: function() {
							// 			return '' + this.value;
							// 		}
							// 	}
							// },

							xAxis: {
								min: 0,
								max: 31,
								tickInterval: 1,
								gridLineWidth: 1,
								gridLineColor: '#000000',
								title: {
									text: '',
									align: 'middle'
								},
								accessibility: {
									rangeDescription: 'Range: 0 to 31 hours.'
								},
								labels: {
									formatter: function() {
										return this.value === 31 ? '<span style="color: transparent;">31</span>' : this.value;
									},
									useHTML: true // Gunakan HTML dalam label
								}
							},



							series: [
								{
									name: '<span style="font-size:10px;">● Nadi</span>',
									data: nadiData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#00ff00'
								},

								{
									name: '<span style="font-size:10px;">↕ TD-1</span>',
									data: atasData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
							
								{
									name: '<span style="font-size:10px;">↕ TD-2</span>',
									data: tekananData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},

								{
									name: '<span style="font-size:10px;">↕ TD-3</span>',
									data: tekananAData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
								{
									name: '<span style="font-size:10px;">↕ TD-4</span>',
									data: tekananBData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
								{
									name: '<span style="font-size:10px;">↕ TD-5</span>',
									data: tekananCData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
								{
									name: '<span style="font-size:10px;">↕ TD-6</span>',
									data: tekananDData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
								{
									name: '<span style="font-size:10px;">↕ TD-7</span>',
									data: tekananEData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								},
								{
									name: '<span style="font-size:10px;">↕ TD-8</span>',
									data: tekananFData,
									marker: { symbol: 'circle', radius: 3 },
									lineWidth: 2,
									shadow: true,
									color: '#ff0000'
								}

							],
							tooltip: {
								headerFormat: '<b>{series.name}</b><br>',
								pointFormat: '{point.y}',
								backgroundColor: 'rgba(255,255,255,0.95)',
								borderColor: '#ccc',
								borderRadius: 10,
								style: { fontSize: '10px' },
								shadow: true
							},
							legend: {
								enabled: true,
								itemStyle: { fontSize: '10px', fontWeight: 'bold' }
							},
							plotOptions: {
								series: {
									dataLabels: {
										enabled: true,
										format: '{point.y}',
										style: {
											fontSize: '8px',
											color: '#000000',
											textOutline: '2px #FFFFFF', // Outline putih agar angka lebih jelas
											textShadow: '1px 1px 2px rgba(255,255,255,0.7)'
										}
									},
									enableMouseTracking: true,
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

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<tbody>
						<tr>
							<?php $suhu = json_decode($ttd_suhu); ?>
							<td width="7%">
								<span> Suhu ℃ :</span>
							</td>
							<td width="4%" class="center">
								<span> <?= !empty($suhu->suhu_1) ? htmlspecialchars($suhu->suhu_1) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_2) ? htmlspecialchars($suhu->suhu_2) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_3) ? htmlspecialchars($suhu->suhu_3) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_4) ? htmlspecialchars($suhu->suhu_4) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_5) ? htmlspecialchars($suhu->suhu_5) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_6) ? htmlspecialchars($suhu->suhu_6) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_7) ? htmlspecialchars($suhu->suhu_7) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_8) ? htmlspecialchars($suhu->suhu_8) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_9) ? htmlspecialchars($suhu->suhu_9) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_10) ? htmlspecialchars($suhu->suhu_10) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_11) ? htmlspecialchars($suhu->suhu_11) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_12) ? htmlspecialchars($suhu->suhu_12) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_13) ? htmlspecialchars($suhu->suhu_13) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_14) ? htmlspecialchars($suhu->suhu_14) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_15) ? htmlspecialchars($suhu->suhu_15) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($suhu->suhu_16) ? htmlspecialchars($suhu->suhu_16) : '' ?></span>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
					<tbody>
						<tr>
							<?php $protein = json_decode($ttd_protein); ?>
							<td width="5%">
								<span></span>
							</td>
							<td width="5%">
								<span>Protein</span>
							</td>
							<td width="4%" class="center">
								<span> <?= !empty($protein->protein_1) ? htmlspecialchars($protein->protein_1) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_2) ? htmlspecialchars($protein->protein_2) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_3) ? htmlspecialchars($protein->protein_3) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_4) ? htmlspecialchars($protein->protein_4) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_5) ? htmlspecialchars($protein->protein_5) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_6) ? htmlspecialchars($protein->protein_6) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_7) ? htmlspecialchars($protein->protein_7) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_8) ? htmlspecialchars($protein->protein_8) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_9) ? htmlspecialchars($protein->protein_9) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_10) ? htmlspecialchars($protein->protein_10) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_11) ? htmlspecialchars($protein->protein_11) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_12) ? htmlspecialchars($protein->protein_12) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_13) ? htmlspecialchars($protein->protein_13) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_14) ? htmlspecialchars($protein->protein_14) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_15) ? htmlspecialchars($protein->protein_15) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($protein->protein_16) ? htmlspecialchars($protein->protein_16) : '' ?></span>
							</td>
						</tr>
						<tr>
							<?php $aseton = json_decode($ttd_aseton); ?>
							<td width="5%" class="center">
								<span>Urin</span>
							</td>
							<td width="5%">
								<span>Aseton</span>
							</td>
							<td width="4%" class="center">
								<span> <?= !empty($aseton->aseton_1) ? htmlspecialchars($aseton->aseton_1) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_2) ? htmlspecialchars($aseton->aseton_2) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_3) ? htmlspecialchars($aseton->aseton_3) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_4) ? htmlspecialchars($aseton->aseton_4) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_5) ? htmlspecialchars($aseton->aseton_5) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_6) ? htmlspecialchars($aseton->aseton_6) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_7) ? htmlspecialchars($aseton->aseton_7) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_8) ? htmlspecialchars($aseton->aseton_8) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_9) ? htmlspecialchars($aseton->aseton_9) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_10) ? htmlspecialchars($aseton->aseton_10) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_11) ? htmlspecialchars($aseton->aseton_11) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_12) ? htmlspecialchars($aseton->aseton_12) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_13) ? htmlspecialchars($aseton->aseton_13) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_14) ? htmlspecialchars($aseton->aseton_14) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_15) ? htmlspecialchars($aseton->aseton_15) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($aseton->aseton_16) ? htmlspecialchars($aseton->aseton_16) : '' ?></span>
							</td>
						</tr>
						<tr>
							<?php $volume = json_decode($ttd_volume); ?>
							<td width="5%">
								<span></span>
							</td>
							<td width="5%">
								<span>Volume</span>
							</td>
							<td width="4%" class="center">
								<span> <?= !empty($volume->volume_1) ? htmlspecialchars($volume->volume_1) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_2) ? htmlspecialchars($volume->volume_2) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_3) ? htmlspecialchars($volume->volume_3) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_4) ? htmlspecialchars($volume->volume_4) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_5) ? htmlspecialchars($volume->volume_5) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_6) ? htmlspecialchars($volume->volume_6) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_7) ? htmlspecialchars($volume->volume_7) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_8) ? htmlspecialchars($volume->volume_8) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_9) ? htmlspecialchars($volume->volume_9) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_10) ? htmlspecialchars($volume->volume_10) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_11) ? htmlspecialchars($volume->volume_11) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_12) ? htmlspecialchars($volume->volume_12) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_13) ? htmlspecialchars($volume->volume_13) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_14) ? htmlspecialchars($volume->volume_14) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_15) ? htmlspecialchars($volume->volume_15) : '' ?></span>
							</td>
							<td width="4%" class="center">
								<span><?= !empty($volume->volume_16) ? htmlspecialchars($volume->volume_16) : '' ?></span>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="8">CATATAN PERSALINAN</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
							<td colspan="2" style="width: 50%; vertical-align: top;">
								<div style="display: flex; align-items: center;">
									<span>1. Tanggal : <?= datefmysql($ttd_tgl_cp); ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>2. Nama Bidan : <?= $ttd_bidan_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								3. Tempat Persalinan
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$tp_cp = json_decode($ttd_tp_cp);									
											// Checkbox pertama
											$checked = (!empty($tp_cp->tp_cp_1) && $tp_cp->tp_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Rumah Ibu';
									
											// Checkbox kedua dengan jarak
											$checked = (!empty($tp_cp->tp_cp_2) && $tp_cp->tp_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Puskesmas';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($tp_cp->tp_cp_3) && $tp_cp->tp_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Polindes';

											$checked = (!empty($tp_cp->tp_cp_4) && $tp_cp->tp_cp_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Rumah Sakit : ';
											echo !empty($tp_cp->tp_cp_5) ? htmlspecialchars($tp_cp->tp_cp_5) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($tp_cp->tp_cp_6) && $tp_cp->tp_cp_6 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Klinik swasta';

											$checked = (!empty($tp_cp->tp_cp_7) && $tp_cp->tp_cp_7 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Lainnya : ';
											echo !empty($tp_cp->tp_cp_8) ? htmlspecialchars($tp_cp->tp_cp_8) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>4. Alamat tempat persalinan : <?= $ttd_alamat_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>						
								<div style="display: flex; align-items: center;"> 5. Catatan &nbsp;&nbsp;
									<?php
										$catatan_cp = json_decode($ttd_catatan_cp);									
										$checked = (!empty($catatan_cp->catatan_cp_1) && $catatan_cp->catatan_cp_1 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
										echo 'Rujuk kala';
								
										$checked = (!empty($catatan_cp->catatan_cp_2) && $catatan_cp->catatan_cp_2 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'I';

										$checked = (!empty($catatan_cp->catatan_cp_3) && $catatan_cp->catatan_cp_3 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'II';

										$checked = (!empty($catatan_cp->catatan_cp_4) && $catatan_cp->catatan_cp_4 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'III';

										$checked = (!empty($catatan_cp->catatan_cp_5) && $catatan_cp->catatan_cp_5 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'IV';
									?>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>6. Alasan merujuk : <?= $ttd_as_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>7. Tempat rujukan : <?= $ttd_tr_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								8. Pendamping pada saat merujuk :
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$juk_cp = json_decode($ttd_juk_cp);									
											$checked = (!empty($juk_cp->juk_cp_1) && $juk_cp->juk_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Bidan';
									
											$checked = (!empty($juk_cp->juk_cp_2) && $juk_cp->juk_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Teman';

											$checked = (!empty($juk_cp->juk_cp_3) && $juk_cp->juk_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Suami';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($juk_cp->juk_cp_4) && $juk_cp->juk_cp_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Dukun';

											$checked = (!empty($juk_cp->juk_cp_5) && $juk_cp->juk_cp_5 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Keluarga';

											$checked = (!empty($juk_cp->juk_cp_6) && $juk_cp->juk_cp_6 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Tdk ada';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								9. Masalah dalam kehamilan/persalinan ini :
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$mas_cp = json_decode($ttd_mas_cp);									
											$checked = (!empty($mas_cp->mas_cp_1) && $mas_cp->mas_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Gawat Darurat';
									
											$checked = (!empty($mas_cp->mas_cp_2) && $mas_cp->mas_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Perdarahan ';

											$checked = (!empty($mas_cp->mas_cp_3) && $mas_cp->mas_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'HDK ';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($mas_cp->mas_cp_4) && $mas_cp->mas_cp_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Infeksi ';

											$checked = (!empty($mas_cp->mas_cp_5) && $mas_cp->mas_cp_5 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'PMTCT';
										?>
									</div>
								</div>

								<div style="margin-bottom: 30px;"></div>
								<div style="display: flex; align-items: center;">
									<span style="font-weight: bold; font-size: 12px;">KALA I</span>
								</div>
								<hr style="border: 1px solid black; width: 100%; margin-top: 2px;">

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>11. Masalah lain, sebutkan : <?= $ttd_part_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>10. Partograf melewati garis waspada Y/T : <?= $ttd_kan_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>12. Penatalaksanaan masalah tersebut : <?= $ttd_but_cp; ?></span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>13. Hasilnya : <?= $ttd_sil_cp; ?></span>
								</div>

								<div style="margin-bottom: 30px;"></div>
								<div style="display: flex; align-items: center;">
									<span style="font-weight: bold; font-size: 12px;">KALA II</span>
								</div>
								<hr style="border: 1px solid black; width: 100%; margin-top: 2px;">

								<div style="margin-bottom: 10px;"></div>
								14. Episiotomi
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$episiotomi_cp = json_decode($ttd_episiotomi_cp);
											$checked = (!empty($episiotomi_cp->episiotomi_cp_1) && $episiotomi_cp->episiotomi_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, Indikasi : ';
											echo !empty($episiotomi_cp->episiotomi_cp_2) ? htmlspecialchars($episiotomi_cp->episiotomi_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($episiotomi_cp->episiotomi_cp_3) && $episiotomi_cp->episiotomi_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak : ';
											echo !empty($episiotomi_cp->episiotomi_cp_4) ? htmlspecialchars($episiotomi_cp->episiotomi_cp_4) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								15. Pendamping pada saat persalinan
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$pendm_cp = json_decode($ttd_pendm_cp);									
											$checked = (!empty($pendm_cp->pendm_cp_1) && $pendm_cp->pendm_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Suami ';
									
											$checked = (!empty($pendm_cp->pendm_cp_2) && $pendm_cp->pendm_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Teman';

											$checked = (!empty($pendm_cp->pendm_cp_3) && $pendm_cp->pendm_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'Keluarga ';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;"> 
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($pendm_cp->pendm_cp_4) && $pendm_cp->pendm_cp_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Dukun';

											$checked = (!empty($pendm_cp->pendm_cp_5) && $pendm_cp->pendm_cp_5 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo 'tidak ada';
										?>
									</div>
								</div>


								<div style="margin-bottom: 10px;"></div>
								16. Gawat janin
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$gwt_cp = json_decode($ttd_gwt_cp);
											$checked = (!empty($gwt_cp->gwt_cp_1) && $gwt_cp->gwt_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, tindakan yang dilakukan';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'a. : ';
											echo !empty($gwt_cp->gwt_cp_2) ? htmlspecialchars($gwt_cp->gwt_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'b. : ';
											echo !empty($gwt_cp->gwt_cp_3) ? htmlspecialchars($gwt_cp->gwt_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								17. Distosia bahu
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$distosia_cp = json_decode($ttd_distosia_cp);
											$checked = (!empty($distosia_cp->distosia_cp_1) && $distosia_cp->distosia_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, tindakan yang dilakukan : ';
											echo !empty($distosia_cp->distosia_cp_2) ? htmlspecialchars($distosia_cp->distosia_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($distosia_cp->distosia_cp_3) && $distosia_cp->distosia_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak';
										?>
									</div>
								</div>


								<div style="margin-bottom: 10px;"></div>
								18. Masalah lain, penatalaksanaan masalah tsb dan hasilnya :
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?= $ttd_tsb_cp; ?>
									</div>
								</div>

								<div style="margin-bottom: 30px;"></div>
								<div style="display: flex; align-items: center;">
									<span style="font-weight: bold; font-size: 12px;">KALA III</span>
								</div>
								<hr style="border: 1px solid black; width: 100%; margin-top: 2px;">

								<div style="margin-bottom: 10px;"></div>
								19. Inisiasi menyusui dini
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$ini_cp = json_decode($ttd_ini_cp);
											$checked = (!empty($ini_cp->ini_cp_1) && $ini_cp->ini_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya';
										?>					
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($ini_cp->ini_cp_2) && $ini_cp->ini_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasanya : ';
											echo !empty($ini_cp->ini_cp_3) ? htmlspecialchars($ini_cp->ini_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>20. Lama kala III (<?= $ttd_iii_cp; ?>) menit</span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								21. Pemberian oksitosin 10 U IM?
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$im_cp = json_decode($ttd_im_cp);
											$checked = (!empty($im_cp->im_cp_1) && $im_cp->im_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, waktu : ' ;
											echo !empty($im_cp->im_cp_2) ? htmlspecialchars($im_cp->im_cp_2) : '<span style="color: #888;"></span>';
											echo ' menit sesudah persalinan';
											?>					
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($im_cp->im_cp_3) && $im_cp->im_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasan : ';
											echo !empty($im_cp->im_cp_4) ? htmlspecialchars($im_cp->im_cp_4) : '<span style="color: #888;"></span>';
											?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<span>Penjepitan tali pusat (<?= $ttd_tali_cp; ?>) menit setelah bayi lahir</span>
									</div>
								</div>
							</td>

							<td colspan="2" style="width: 50%; vertical-align: top;">
								22. Pemberian ulang oksitosin (2x) ? 
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$pb_cp = json_decode($ttd_pb_cp);
											$checked = (!empty($pb_cp->pb_cp_1) && $pb_cp->pb_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, alasan : ';
											echo !empty($pb_cp->pb_cp_2) ? htmlspecialchars($pb_cp->pb_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($pb_cp->pb_cp_3) && $pb_cp->pb_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasan : ';
											echo !empty($pb_cp->pb_cp_4) ? htmlspecialchars($pb_cp->pb_cp_4) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="margin-bottom: 10px;"></div>
								23. Penegangan tali pusat terkendali
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$penegangan_cp = json_decode($ttd_penegangan_cp);
											$checked = (!empty($penegangan_cp->penegangan_cp_1) && $penegangan_cp->penegangan_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($penegangan_cp->penegangan_cp_2) && $penegangan_cp->penegangan_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasan : ';
											echo !empty($penegangan_cp->penegangan_cp_3) ? htmlspecialchars($penegangan_cp->penegangan_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								24. Masase fundus uteri?
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$masase_cp = json_decode($ttd_masase_cp);
											$checked = (!empty($masase_cp->masase_cp_1) && $masase_cp->masase_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($masase_cp->masase_cp_2) && $masase_cp->masase_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasan : ';
											echo !empty($masase_cp->masase_cp_3) ? htmlspecialchars($masase_cp->masase_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>


								<div style="margin-bottom: 10px;"></div>
								25. Plasenta lahir lengkap (intact) ya/tidak
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$lahi_cp = json_decode($ttd_lahi_cp);
											$checked = (!empty($lahi_cp->lahi_cp_1) && $lahi_cp->lahi_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, tindakan yang dilakukan';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'a. : ';
											echo !empty($lahi_cp->lahi_cp_2) ? htmlspecialchars($lahi_cp->lahi_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'b. : ';
											echo !empty($lahi_cp->lahi_cp_3) ? htmlspecialchars($lahi_cp->lahi_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								26. Plasenta tidak lahir > 30 menit
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$senta_cp = json_decode($ttd_senta_cp);
											$checked = (!empty($senta_cp->senta_cp_1) && $senta_cp->senta_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($senta_cp->senta_cp_2) && $senta_cp->senta_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, tindakan : ';
											echo !empty($senta_cp->senta_cp_3) ? htmlspecialchars($senta_cp->senta_cp_3) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								27. Laserasi
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$laser_cp = json_decode($ttd_laser_cp);
											$checked = (!empty($laser_cp->laser_cp_1) && $laser_cp->laser_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, dimana : ';
											echo !empty($laser_cp->laser_cp_2) ? htmlspecialchars($laser_cp->laser_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($laser_cp->laser_cp_3) && $laser_cp->laser_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>						
									<div style="display: flex; align-items: center;"> 28. Jika laserasi perineum derajat : &nbsp;&nbsp;
										<?php
											$jika_cp = json_decode($ttd_jika_cp);									
											$checked = (!empty($jika_cp->jika_cp_1) && $jika_cp->jika_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo '1';
									
											$checked = (!empty($jika_cp->jika_cp_2) && $jika_cp->jika_cp_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo '2';

											$checked = (!empty($jika_cp->jika_cp_3) && $jika_cp->jika_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo '3';

											$checked = (!empty($jika_cp->jika_cp_4) && $jika_cp->jika_cp_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
											echo '4';
										?>
									</div>
								Tindakan :
								<div style="display: flex; align-items: center;">
										<div style="display: inline-block; margin-left: 20px;">							
											<?php
												$checked = (!empty($jika_cp->jika_cp_5) && $jika_cp->jika_cp_5 == '1') ? 'checked' : ''; 
												echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
												echo 'Penjahitan dengan anestesi';

												$checked = (!empty($jika_cp->jika_cp_8) && $jika_cp->jika_cp_8 == '1') ? 'checked' : ''; 
												echo '<input type="checkbox" ' . $checked . ' style= "margin-left: 10px; margin-right: 5px;">';
												echo 'Penjahitan tanpa anestesi';
											?>
										</div>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">							
										<?php
											$checked = (!empty($jika_cp->jika_cp_6) && $jika_cp->jika_cp_6 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak dijahit,alasan : ';
											echo !empty($jika_cp->jika_cp_7) ? htmlspecialchars($jika_cp->jika_cp_7) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								29. Atonia Uteri
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$atoni_cp = json_decode($ttd_atoni_cp);
											$checked = (!empty($atoni_cp->atoni_cp_1) && $atoni_cp->atoni_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, tindakan : ';
											echo !empty($atoni_cp->atoni_cp_2) ? htmlspecialchars($atoni_cp->atoni_cp_2) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($atoni_cp->atoni_cp_3) && $atoni_cp->atoni_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>30. Jumlah darah yang keluar/perdarahan (<?= $ttd_jum_cp; ?>) ml</span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>31. Masalah dan penatalaksanaan : (<?= $ttd_penatalaksanaan_cp; ?>)</span>
								</div>

								<div style="margin-bottom: 30px;"></div>
								<div style="display: flex; align-items: center;">
									<span style="font-weight: bold; font-size: 12px;">KALA IV</span>
								</div>
								<hr style="border: 1px solid black; width: 100%; margin-top: 2px;">

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>32. Masalah dan penatalaksanaan masalah : (<?= $ttd_Masalah_cp; ?>)</span>
								</div>

								<div style="margin-bottom: 30px;"></div>
								<div style="display: flex; align-items: center;">
									<span style="font-weight: bold; font-size: 12px;">BAYI BARU LAHIR</span>
								</div>
								<hr style="border: 1px solid black; width: 100%; margin-top: 2px;">

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>33. Berat badan : <?= $ttd_bb_cp; ?>gram</span>
								</div>

								<div style="margin-bottom: 10px;"></div>
								<div style="display: flex; align-items: center;">
									<span>34. Panjang : <?= $ttd_panjang_cp; ?>cm</span>
								</div>

								<div style="margin-bottom: 10px;"></div>						
								<div style="display: flex; align-items: center;"> 35. Jenis Kelamin : &nbsp;&nbsp;
									<?php
										$jk_cp = json_decode($ttd_jk_cp);									
										$checked = (!empty($jk_cp->jk_cp_1) && $jk_cp->jk_cp_1 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
										echo 'Laki-laki';
								
										$checked = (!empty($jk_cp->jk_cp_2) && $jk_cp->jk_cp_2 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'Perempuan';
									?>
								</div>

								<div style="margin-bottom: 10px;"></div>						
								<div style="display: flex; align-items: center;"> 36. Penilaian bayi baru lahir : &nbsp;&nbsp;
									<?php
										$by_cp = json_decode($ttd_by_cp);									
										$checked = (!empty($by_cp->by_cp_1) && $by_cp->by_cp_1 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
										echo 'Baik';
								
										$checked = (!empty($by_cp->by_cp_2) && $by_cp->by_cp_2 == '1') ? 'checked' : ''; 
										echo '<input type="checkbox" ' . $checked . ' style="margin-left: 10px; margin-right: 5px;">';
										echo 'Ada penyulit';
									?>
								</div>

								<div style="margin-bottom: 10px;"></div>
								37. Bayi lahir
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$by_cplh = json_decode($ttd_by_cplh);
											$checked = (!empty($by_cplh->by_cplh_1) && $by_cplh->by_cplh_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Normal, tindakan : ';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 40px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_2) && $by_cplh->by_cplh_2 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Mengeringkan';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 40px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_3) && $by_cplh->by_cplh_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Menghangatkan';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 40px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_4) && $by_cplh->by_cplh_4 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Rangsang taktil';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 40px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_5) && $by_cplh->by_cplh_5 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Pakaian/selimuti bayi dan tempatkan di sisi ibu';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 40px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_6) && $by_cplh->by_cplh_6 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tindakan pencegahan infeksi mata';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_7) && $by_cplh->by_cplh_7 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Cacat bawaan, sebutkan :';
											echo !empty($atoni_cp->by_cplh_8) ? htmlspecialchars($atoni_cp->by_cplh_8) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($by_cplh->by_cplh_9) && $by_cplh->by_cplh_9 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Hipotermi, tindakan';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'a. : ';
											echo !empty($by_cplh->by_cplh_10) ? htmlspecialchars($by_cplh->by_cplh_10) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'b. : ';
											echo !empty($by_cplh->by_cplh_11) ? htmlspecialchars($by_cplh->by_cplh_11) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'c. : ';
											echo !empty($by_cplh->by_cplh_12) ? htmlspecialchars($by_cplh->by_cplh_12) : '<span style="color: #888;"></span>';
										?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								38. Pemberian ASI
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$asi_cp = json_decode($ttd_asi_cp);
											$checked = (!empty($asi_cp->asi_cp_1) && $asi_cp->asi_cp_1 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Ya, waktu : ' ;
											echo !empty($asi_cp->asi_cp_2) ? htmlspecialchars($asi_cp->asi_cp_2) : '<span style="color: #888;"></span>';
											echo ' jam setelah lahir';
											?>					
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$checked = (!empty($asi_cp->asi_cp_3) && $asi_cp->asi_cp_3 == '1') ? 'checked' : ''; 
											echo '<input type="checkbox" ' . $checked . ' style="margin-right: 5px;">';
											echo 'Tidak, alasan : ';
											echo !empty($asi_cp->asi_cp_4) ? htmlspecialchars($asi_cp->asi_cp_4) : '<span style="color: #888;"></span>';
											?>
									</div>
								</div>

								<div style="margin-bottom: 10px;"></div>
								39. Masalah lain, 
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											$sebutkan_cp = json_decode($ttd_sebutkan_cp);
											echo 'sebutkan : ' ;
											echo !empty($sebutkan_cp->sebutkan_cp_1) ? htmlspecialchars($sebutkan_cp->sebutkan_cp_1) : '<span style="color: #888;"></span>';
											?>					
									</div>
								</div>
								<div style="display: flex; align-items: center;">
									<div style="display: inline-block; margin-left: 20px;">
										<?php
											echo 'Hasilnya : ';
											echo !empty($sebutkan_cp->sebutkan_cp_2) ? htmlspecialchars($sebutkan_cp->sebutkan_cp_2) : '<span style="color: #888;"></span>';
											?>
									</div>
								</div>
							</td>				
						</tr>
                    </tbody>
                </table>	

				<table class="big__line__spacing small__font">
					<thead>
						<tr>
                            <td class="table__big-title" colspan="9">TABEL PEMANTAUAN KALA IV</td>
                        </tr>
						<tr>
							<td width="2%" class="center">Jam Ke</td>
							<td width="5%" class="center">Waktu</td>
							<td width="5%" class="center">Tekanan Darah</td>
							<td width="5%" class="center">Nadi</td>
							<td width="5%" class="center">Suhu</td>
							<td width="8%" class="center">Tinggi Fundus Uteri</td>
							<td width="8%" class="center">Kontraksi Uterus</td>
							<td width="8%" class="center">Kandung Kemih</td>
							<td width="8%" class="center">Darah yang Keluar</td>
						</tr>

						<tr>
							<td rowspan="5" style="vertical-align: top;">1</td>
							<td class="center">						
								<?php
									$waktu_iv = json_decode($ttd_waktu_iv);
									echo !empty($waktu_iv->waktu_iv_1) ? htmlspecialchars($waktu_iv->waktu_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$tekanan_darah_iv = json_decode($ttd_tekanan_darah_iv);
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_1) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$nadi_iv = json_decode($ttd_nadi_iv);
									echo !empty($nadi_iv->nadi_iv_1) ? htmlspecialchars($nadi_iv->nadi_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$suhu_iv = json_decode($ttd_suhu_iv);
									echo !empty($suhu_iv->suhu_iv_1) ? htmlspecialchars($suhu_iv->suhu_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$tfu_iv = json_decode($ttd_tfu_iv);
									echo !empty($tfu_iv->tfu_iv_1) ? htmlspecialchars($tfu_iv->tfu_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$kontraksi_uterus_iv = json_decode($ttd_kontraksi_uterus_iv);
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_1) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$kandung_kemih_iv = json_decode($ttd_kandung_kemih_iv);
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_1) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									$darah_yg_keluar_iv = json_decode($ttd_darah_yg_keluar_iv);
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_1) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_1) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_2) ? htmlspecialchars($waktu_iv->waktu_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_2) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_2) ? htmlspecialchars($nadi_iv->nadi_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_2) ? htmlspecialchars($suhu_iv->suhu_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_2) ? htmlspecialchars($tfu_iv->tfu_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_2) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_2) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_2) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_2) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_3) ? htmlspecialchars($waktu_iv->waktu_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_3) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_3) ? htmlspecialchars($nadi_iv->nadi_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_3) ? htmlspecialchars($suhu_iv->suhu_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_3) ? htmlspecialchars($tfu_iv->tfu_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_3) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_3) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_3) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_3) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_4) ? htmlspecialchars($waktu_iv->waktu_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_4) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_4) ? htmlspecialchars($nadi_iv->nadi_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_4) ? htmlspecialchars($suhu_iv->suhu_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_4) ? htmlspecialchars($tfu_iv->tfu_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_4) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_4) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_4) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_4) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_5) ? htmlspecialchars($waktu_iv->waktu_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_5) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_5) ? htmlspecialchars($nadi_iv->nadi_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_5) ? htmlspecialchars($suhu_iv->suhu_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_5) ? htmlspecialchars($tfu_iv->tfu_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_5) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_5) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_5) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_5) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td rowspan="5" style="vertical-align: top;">2</td>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_6) ? htmlspecialchars($waktu_iv->waktu_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_6) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_6) ? htmlspecialchars($nadi_iv->nadi_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_6) ? htmlspecialchars($suhu_iv->suhu_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_6) ? htmlspecialchars($tfu_iv->tfu_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_6) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_6) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_6) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_6) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>

						<tr>
							<td class="center">						
								<?php
									echo !empty($waktu_iv->waktu_iv_7) ? htmlspecialchars($waktu_iv->waktu_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tekanan_darah_iv->tekanan_darah_iv_7) ? htmlspecialchars($tekanan_darah_iv->tekanan_darah_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($nadi_iv->nadi_iv_7) ? htmlspecialchars($nadi_iv->nadi_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($suhu_iv->suhu_iv_7) ? htmlspecialchars($suhu_iv->suhu_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($tfu_iv->tfu_iv_7) ? htmlspecialchars($tfu_iv->tfu_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kontraksi_uterus_iv->kontraksi_uterus_iv_7) ? htmlspecialchars($kontraksi_uterus_iv->kontraksi_uterus_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($kandung_kemih_iv->kandung_kemih_iv_7) ? htmlspecialchars($kandung_kemih_iv->kandung_kemih_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
							<td class="center">						
								<?php
									echo !empty($darah_yg_keluar_iv->darah_yg_keluar_iv_7) ? htmlspecialchars($darah_yg_keluar_iv->darah_yg_keluar_iv_7) : '<span style="color: #888;"></span>';
								?>
							</td>
						</tr>
					</thead>
				</table>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-112-00</p>
        </div>
    </footer>	
</body>								
<?php die; ?>