<!-- // TTP -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<div class="page">
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
		<br>
		<hr class="container">

		<!--=============== MAIN ===============-->
		<main class="main">
			<section class="tata__tertib">
				<br>
				<div class="tata__tertib__container grid__two-column-samesize container">
					<div>
						<h3 class="section__title">TATA TERTIB BAGI PASIEN, PENGUNJUNG DAN PENUNGGU PASIEN RSUD KOTA
							TANGERANG NEW NORMAL</h3>

						<div class="section">
							<h4>UNIT KERJA :</h4>
							<h4>I. UMUM</h4>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border" colspan="3">Penunggu pasien Rawat Inap</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">A.</td>
										<td class="no__border" colspan="2">Pasien Non Covid-19 / Umum : di tunggu keluarga (Hanya 1 orang) dalam Instalasi Gawat Darurat adalah :</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10003;</td>
										<td class="no__border" colspan="1">Pasien dibawah umur 18 tahun</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10003;</td>
										<td class="no__border" colspan="1">Pasien tidak sadar</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10003;</td>
										<td class="no__border" colspan="1">Pasien dengan kondisi Emergensi (Resusitasi)</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">B.</td>
										<td class="no__border" colspan="2">Pasien Non Covid-19 / Umum : Pasien yang dapat ditunggu keluarga (hanya 1 orang) dalam ruang perawatan adalah :</td>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien dengan izin Dokter / Kepala Ruangan</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien dibawah umur 18 tahun</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien tidak sadar</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien dengan istirahat total di tempat tidur</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien yang mendapat infus dengan tingkat ketergantungan yang tinggi</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%"></td>
										<td class="no__border" colspan="1" width="1%">&#10147;</td>
										<td class="no__border" colspan="1">Pasien pascabedah (hari pertama)</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">C.</td>
										<td class="no__border" colspan="2">Pasien Covid-19 : Pasien tidak diperbolehkan ditunggu keluarga kecuali anak dibawah umur 18 tahun boleh ditunggu/didampingi dengan 1 orang yang tetap tanpa berganti selama masa perawatan rawat inap.</td>
									<tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border" colspan="3">Untuk mendapatkan informasi ketersediaan tempat tidur agar menghubungi Pendaftaran / admission</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border" colspan="3">Menjaga kebersihan dan ketertiban ruangan</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border" colspan="3">DILARANG keras MEROKOK di lingkungan RSUD Kota Tangerang</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border" colspan="3">DILARANG mengambil dokumentasi dalam bentuk apapun (foto, rekaman dan lain-lain) di lingkungan RSUD Kota Tangerang tanpa seizin manajemen Rumah Sakit. Dan apabila melakukan/melanggar maka akan dilakukan tindak lanjut sesuai peraturan yang berlaku.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">6.</td>
										<td class="no__border" colspan="3">Pihak RSUD Kota Tangerang hanya bertanggung jawab terhadap barang milik pasien yang dititipkan ke pihak RSUD Kota Tangerang.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">7.</td>
										<td class="no__border" colspan="3">Wali/Penanggung Jawab yang berhak mendapatkan informasi terkait pasien sesuai dengan data yang tercantum pada General Consent.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">8.</td>
										<td class="no__border" colspan="3">Data administrasi yang diisi pasien / keluarga adalah benar dan dapat dipertanggung jawabkan</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div>
						<div class="section">
							<br>
							<h4>II. PASIEN</h4>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border" colspan="3">Pasien harus mematuhi dan mentaati peraturan dan tata tertib yang berlaku.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border" colspan="3">Pasien tidak diperkenankan membawa uang, barang elektronik, barang berharga lainnya, minuman keras dan senjata tajam atau alat yang bisa dijadikan senjata.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border" colspan="3">Pasien Rawat Inap harus membawa perlengkapan pribadi pasien, pakaian, sabun mandi, sikat gigi, pasta gigi, handuk.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border" colspan="3">Pasien tidak diperkenankan membawa bantal, sprei dan selimut kedalam ruang rawat.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border" colspan="3">Pasien tidak diperkenankan minum obat-obatan tanpa sepengetahuan Dokter/Perawat Ruangan</td>
									</tr>
								</tbody>
							</table>

							<br>
							<h4>III. PENGUNJUNG / PENGANTAR PASIEN</h4>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border" colspan="3">Memberi makanan dari luar Rumah Sakit harus dengan sepengetahuan Dokter/Perawat/Ahli Gizi.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border" colspan="3">Mematuhi dan mentaati waktu berkunjung yang telah ditetapkan.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border" colspan="3">Mematuhi dan mentaati peraturan yang berlaku di RSUD Kota Tangerang.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border" colspan="3">Mematuhi dan mentaati ketentuan khusus yang berlaku di setiap Ruang Rawat.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border" colspan="3">Selama berkunjung tidak diperkenankan :</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Makan dan minum di dalam maupun di luar Ruang Rawat.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Membawa makan dan minuman dari luar Rumah Sakit untuk pasien tanpa seizin Dokter/Perawat Ruangan/Ahli Gizi.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Membawa senjata tajam atau alat yang dapat digunakan untuk senjata.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Duduk/tidur di tempat tidur Pasien.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Bicara/tertawa terlalu keras.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Berada/berjalan-jalan di ruangan lain tanpa seizin Dokter/Perawat Ruangan.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%"></td>
										<td class="no__border" width="1%">&#10147;</td>
										<td class="no__border" colspan="2">Membuang sampah tidak pada tempat sampah.</td>
									</tr>
								</tbody>
							</table>

							<br>
							<h4>IV. PENUNGGU</h4>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border" colspan="3">Penunggu harus memiliki Kartu Tunggu / Tanda Izin Menunggu yang diperbolehkan Kepala Ruangan sesuai dengan ketentuan yang berlaku dan digantungkan di leher.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border" colspan="3">Pasien dewasa di ruang rawat wanita hanya boleh ditunggu di dalam ruangan oleh wanita atau muhrimnya dan di ruang rawat laki-laki oleh laki-laki atau muhrimnya.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border" colspan="3">Pasien anak-anak (usia dibawah 18 tahun) boleh ditunggu oleh orangtuanya atau orang yang ditunjuk untuk mewakili orangtuanya dengan sepengetahuan Dokter/Perawat Jaga.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</section>
		</main>

		<!--=============== FOOTER ===============-->
		<footer class="footer__firstpage">
			<div class="footer__container container grid">
				<p class="page__number">FORM-REM-08-04</p>
			</div>
		</footer>
	</div>

	<div class="page">
		<!--=============== MAIN ===============-->
		<main class="main">
			<section class="tata__tertib">
				<br>
				<div class="tata__tertib__container grid__two-column-samesize container">
					<div>
						<div class="section">
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border" colspan="3">Keluarga diperkenankan ke ruang perawatan Intensif apabila diperlukan sesuai kebutuhan dan sesuai permintaan Dokter / Perawat Ruangan.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border" colspan="3">Atas izin Dokter/Perawat Ruangan, keluarga yang menunggu pasien hanya diperkenankan satu orang.</td>
									</tr>
								</tbody>
							</table>
							<br>
							<h4 class="underline">PASIEN</h4>
							<h4 class="underline">Hak Pasien :</h4>
							<br>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border">Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku di Rumah Sakit.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border">Memperoleh informasi mengenai hak dan kewajiban Pasien.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border">Memperoleh layanan yang manusiawi, adil dan jujur tanpa diskriminasi.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border">Memperoleh layanan kesehatan yang bermutu sesuai dengan kebutuhan medis, standar profesi dan standar prosedur operasional (SPO).</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border">Memperoleh layanan yang efektif dan efisien sehingga pasien terhindar dari kerugian fisik dan materi.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">6.</td>
										<td class="no__border">Mengajukan pengaduan atas pelayanan yang di dapat.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">7.</td>
										<td class="no__border">Memilih Dokter dan kelas keperawatan sesuai dengan peraturan yang berlaku di Rumah Sakit.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">8.</td>
										<td class="no__border">Meminta konsultasi tentang penyakit yang dideritanya kepada dokter lain yang mempunyai surat izin praktek (SIP) baik di dalam maupun di luar Rumah Sakit.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">9.</td>
										<td class="no__border">Mendapatkan privasi dan kerahasiaan penyakit yang diderita termasuk data-data medisnya.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">10.</td>
										<td class="no__border">Mendapat informasi yang meliputi diagnosis dan tata cara tindakan medis, tujuan tindakan medis, alternatif tindakan, risiko dan komplikasi yang mungkin terjadi dan prognosis terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">11.</td>
										<td class="no__border">Memberikan persetujuan atau menolak atas tindakan yang akan dilakukan oleh tenaga kesehatan terhadap penyakit yang dideritanya</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">12.</td>
										<td class="no__border">Didampingi keluarganya dan atau penasihatnya dalam keadaan kritis.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">13.</td>
										<td class="no__border">Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal itu tidak mengganggu pasien lain.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">14.</td>
										<td class="no__border">Memperoleh keamanan dan keselamatan dirinya selama dalam perawatan Rumah Sakit</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">15.</td>
										<td class="no__border">Mengajukan usul saran perbaikan atas perlakuan Rumah Sakit terhadap dirinya.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">16.</td>
										<td class="no__border">Menolak pelayanan bimbingan rohani yang tidak sesuai dengan agama dan kepercayaan yang dianutnya.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">17.</td>
										<td class="no__border">Menggugat dan atau menuntut Rumah Sakit apabila Rumah Sakit diduga memberikan pelayanan yang tidak sesuai dengan standar baik secara perdata ataupun pindana</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">18.</td>
										<td class="no__border">Mengeluhkan pelayanan Rumah Sakit yang tidak sesuai dengan standar pelayanan melalui media cetak dan elektronik sesuai dengan ketentuan peraturan perundang-undangan.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div>
						<div class="section">
							<h4 class="underline">Kewajiban Pasien :</h4>
							<table class="no__border justify small__font">
								<tbody>
									<tr>
										<td class="no__border" width="1%">1.</td>
										<td class="no__border">Mematuhi peraturan yang berlaku di Rumah Sakit.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">2.</td>
										<td class="no__border">Menggunakan fasilitas rumah sakit secara bertanggung jawab.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">3.</td>
										<td class="no__border">Menghormati hak-hak pasien lain, pengunjung dan tenaga kesehatan serta petugas lainnya yang bekerja di Rumah Sakit.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">4.</td>
										<td class="no__border">Memberikan informasi yang jujur dan lengkap dan akurat sesuai kemampuan dan pengetahuannya tentang masalah kesehatannya.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">5.</td>
										<td class="no__border">Memberikan informasi mengenai kemampuan financial dan jaminan kesehatan yang dimiliki.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">6.</td>
										<td class="no__border">Mematuhi rencana terapi yang direkomendasikan oleh Tenaga Kesehatan di Rumah Sakit dan disetujui oleh pasien yang bersangkutan setelah mendapat penjelasan sesuai ketentuan peraturan perundang-undangan.</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">7.</td>
										<td class="no__border">Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana terapi yang direkomendasikan oleh Tenaga Kesehatan dalam rangka penyembuhan penyakit atau masalah keselamatannya dan</td>
									</tr>
									<tr>
										<td class="no__border" width="1%">8.</td>
										<td class="no__border">Memberikan imbalan jasa atas pelayanan yang diterima.</td>
									</tr>
								</tbody>
							</table>
							<div class="signature border no__radius">
								<div>(<b><?= $pasien->nama; ?></b>)</div>
								<div>Nama Jelas dan Tanda Tangan</div>
							</div>
						</div>
					</div>
					
				</div>
			</section>
		</main>

		<!--=============== FOOTER ===============-->
		<footer class="footer__secondpage">
			<div class="footer__container container grid">
				<p class="page__number">FORM-REM-08-04</p>
			</div>
		</footer>
	</div>

	
</body>
<?php die; ?>
