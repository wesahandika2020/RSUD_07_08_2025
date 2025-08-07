<?php
function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<style>
	.header {
		display: flex;
		width: 100%;
		justify-content: space-between;
	}

	.logo-group img {
		width: 80px;
	}

	.logo-group p {
		font-size: .625rem;
		margin-top: .5rem;
	}

	.identity {
		border: 1px solid black;
		border-radius: 10px;
		padding: 1rem;
		font-size: 12px;
		width: 260px;
	}

	.grid-2 {
		display: grid;
		grid-template-columns: 6rem auto;
		gap: .4rem
	}

	dl {
		margin: 0;
	}
</style>

<body onload="window.print()">
	<header class="header">
		<div>
			<div class="logo-group">
				<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="logo rsud">
				<p>Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
			</div>
		</div>
		<div class="identity">
			<div class="grid-2">
				<span>Nama Lengkap</span>
				<span>: <?= $nama_pasien ?></span>

				<span>No. Rekam Medik</span>
				<span>: <?= $no_rm ?></span>

				<span>Tanggal Lahir</span>
				<span>: <?= $tanggal_lahir_pasien ?></span>

				<span>Jenis Kelamin</span>
				<span>: <?= $kelamin_pasien === "P" ? 'Perempuan' : 'Laki-laki' ?></span>
			</div>
		</div>
	</header>
	<main style="padding: 1rem">
		<h3 style="display: flex; justify-content: center"><b>PERSETUJUAN UMUM <i>(GENERAL CONSENT)</i></b></h3>
		<div style="font-size: 12px">
			<p><b>IDENTITAS PASIEN</b></p>

			<div style="display: grid; grid-template-columns: 8rem auto; gap: .5rem">
				<span>Nama</span>
				<span>: <?= $nama_pasien ?></span>

				<span>Nomor rekam medis</span>
				<span>: <?= $no_rm ?></span>

				<span>Tgl.Lahir / Umur</span>
				<span>: <?= $tanggal_lahir_pasien ?> / <?= $umur_pasien ?> Tahun. Jenis Kelamin: <?= $kelamin_pasien ?></span>
			</div>

			<p><b>PASIEN DAN / WALI HUKUM HARUS MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT</b></p>
			<p>Yang bertanda tangan di bawah ini :</p>

			<div style="display: grid; grid-template-columns: 8rem auto; gap: .5rem">
				<span>Nama</span>
				<span>: <?= $nama_keluarga ?></span>

				<span>Tgl.Lahir / Umur</span>
				<span>: <?= $tanggal_lahir ?> / <?= $umur ?> Tahun. Jenis Kelamin: <?= $jenis_kelamin ?></span>

				<span>Alamat</span>
				<span>: <?= $alamat ?></span>

				<span></span>
				<div><span style="margin-right: 1rem">RT: <?= $no_rt ?></span><span>RW: <?= $no_rw ?></span></div>

				<span></span>
				<div style="display: grid; grid-template-columns: 6rem auto; gap: .4rem">
					<span>Kelurahan/Desa</span>
					<span>: <?= $nama_kelurahan ?? $kelurahan ?></span>

					<span>Kecamatan</span>
					<span>: <?= $nama_kecamatan ?? $kecamatan ?></span>

					<span>Kota/Kab</span>
					<span>: <?= $nama_kabupaten ?? $kota ?></span>
				</div>

				<span>Nomor KTP/SIM</span>
				<span>: <?= $no_identitas ?></span>

				<span>Nomor Telp/HP</span>
				<span>: <?= $no_hp ?></span>
			</div>

			Selaku <b><?= $is_pasien == '0' ? $hubungan_keluarga : 'Pasien' ?></b> dengan ini menyatakan persetujuan :

			<ol type="A" style="padding-left: 1.2em; font-weight: bold">
				<li>HAK DAN KEWAJIBAN SEBAGAI PASIEN
					<ol style="padding-left: 1.2em; font-weight: normal">
						<li>Dengan menandatangani dokumen ini saya mengakui bahwa pada proses pendaftaran untuk mendapatkan perawatan di RSUD Kota Tangerang telah mendapatkan informasi tentang hak-hak dan kewajiban saya sebagai pasien.</li>
						<li>Saya memberikan kuasa kepada setiap dan seluruh orang yang merawat saya untuk memeriksa atau memberitahukan informasi kesehatan saya kepada pemberi kesehatan lain yang turut merawat saya selama dirumah sakit.</li>
						<li>Saya memberi kuasa kepada rumah sakit untuk menjaga privasi dan kerahasiaan penyakit saya selama dalam perawatan.</li>
					</ol>
				</li>
				<li style="margin-top: .75rem">PERSETUJUAN PELEPASAN INFORMASI
					<ol style="padding-left: 1.2em; font-weight: normal">
						<li>Saya setuju rumah sakit wajib menjamin kerahasiaan informasi medis saya baik untuk kepentingan perawatan dan pengobatan, pendidikan maupun penelitian kecuali saya mengungkapkan sendiri atau orang lain yang saya beri kuasa untuk itu (orangtua kandung/suami/istri/kakak/adik dan anak saya):.............................,serta kepada PIHAK KETIGA sebagai penjamin pembiayaan pelayanan kesehatan yang dilakukan kepada saya di RSUD Kota Tangerang sesuai prosedur yang berlaku.</li>
						<li>Saya mengetahui bahwa RSUD Kota Tangerang merupakan RS Pendidikan yang menjadi tempat praktik klinik bagi mahasiswa kedokteran dan profesi-profesi kesehatan lainnya. Karena itu, mereka mungkin berpartisipasi dan atau keterlibat dalam perawatan saya. Saya menyetujui bahwa mahasiswa kedokteran dan profesi kesehatan lain berpartisipasi dalam perawatan saya,sepanjang dibawah supervise Dokter Penanggung Jawab Pasien.</li>
					</ol>
				</li>
				<li style="margin-top: .75rem">PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN
					<dl style="font-weight: normal">Saya menyetujui untuk perawatan di RSUD Kota Tangerang sebagai pasien Rawat Jalan / Rawat Inap sesuai kebutuhan medis. Pengobatan dapat meliputi pemeriksaan radiologi, tes darah, perawatan rutin dan prosedur seperti cairan dan infus atau suntikan dan evaluasi (contoh wawancara dan pemeriksaan fisik). Persetujuan yang saya berikan tidak termasuk persetujuan untuk prosedur/tindakan invasif (misalnya operasi) atau tindakan yang mempunyai resiko tinggi.</dl>
				</li>
				<li style="margin-top: .75rem">PRIVASI
					<dl style="font-weight: normal">Saya <b>mengijinkan / tidak mengijinkan*)</b> Rumah Sakit memberi akses bagi keluarga serta orang yang akan menengok saya (sebutkan nama bila ada permintaan khusus yang tidak diijinkan): ........................</dl>
				</li>
				<li style="margin-top: .75rem">INFORMASI LAIN
					<ol style="padding-left: 1.2em; font-weight: normal">
						<li>Saya/ keluarga saya/ pihak lain tidak boleh mendokumentasikan dalam bentuk apapun( foto,rekaman dan lain-lain) seluruh proses pelayanan kesehatan yang saya / keluarga saya jalani di RSUD Kota Tangerang tanpa seijin manajemen rumah sakit</li>
						<li>Saya tidak boleh membawa barang-barang berharga yang tidak diperlukan (seperti perhiasan, elektronik dll) ke RSUD Kota Tangerang dan jika saya membawanya maka RSUD Kota Tangerang tidak bertanggung jawab terhadap kehilangan, kerusakan atau pencurian. Apabila tidak ada anggota keluarga, Rumah Sakit meyediakan tempat penitipan barang milik pasien di tempat resmi yang telah disediakan Rumah Sakit.</li>
						<li>Saya menyatakan bahwa saya telah menerima informasi tentang adanya tatacara mengajukan dan mengatasi keluhan terkait pelayanan medik yang diberikan terhadap diri saya. Saya setuju untuk mengikuti tatacara mengajukan keluhan sesuai prosedur yang ada.</li>
						<li>Saya menyatakan bahwa jika saya memiliki nilai kepercayaan atau keyakinan yang saya harapkan untuk difasilitasi selama perawatan RSUD Kota Tangerang akan saya sampaikan dalam proses pemeriksaan pertama kepada perawat, dokter dan petugas kesehatan lainnya yang terkait dengan perawatan dan pengobatan saya.</li>
						<li>Saya menyatakan setuju, baik sebagai wali atau sebagai pasien, bahwa sesuai pertimbangan pelayanan yang diberikan kepada pasien, maka saya wajib untuk membayar total biaya perawatan yang diberikan sesuai acuan biaya dan ketentuan RSUD Kota Tangerang dengan jaminan atau pribadi.</li>
						<li>Melalui dokumen ini, saya menegaskan kembali bahwa saya mempercayakan kepada semua tenaga kesehatan rumah sakit untuk memberikan perawatan, diagnostik dan terapi kepada saya sebagai pasien rawat inap atau rawat jalan atau Instalasi Gawat Darurat(IGD), termasuk semua pemeriksaan penujang, yang dibutuhkan untuk pengobatan dan tindakan.</li>
						<li>Apabila pasien pulang atas permintaan sendiri (APS) dan atau menolak dipulangkan oleh dokter penanggung jawab pasien (DPJP) maka biaya perawatan menjadi pasien berbayar (PASIEN UMUM).</li>
					</ol>
				</li>
			</ol>

			<p>Dengan ini saya menyatakan bahwa saya telah menerima dan memahami informasi sebagaimana diatas dan menyetujuinya.</p>
		</div>
		<table style="width: 100%; margin-top: 2rem">
			<tr>
				<td></td>
				<td style="text-align: center">Tengerang, <?= tgl_indo(date('Y-m-d')) ?></td>
			</tr>
			<tr>
				<td style="text-align: center">Petugas</td>
				<td style="text-align: center"><?= $is_pasien == '1' ? 'Pasien' : 'Keluarga/Penganggung Jawab' ?></td>
			</tr>
			<tr>
				<td>
					<br>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td style="text-align: center"><?= $nama_petugas ?? '-' ?></td>
				<td style="text-align: center"><?= $is_pasien == '1' ? $nama_pasien : $nama_keluarga ?></td>
			</tr>
		</table>
	</main>
	<footer style="position: fixed;bottom: 0; font-size: 10px; width: 100%">
		<div style="display: flex;justify-content: space-between; margin: 0 3rem">
			<span>Terimakasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</span>
			<span>FORM-REM-29-03</span>
		</div>
	</footer>
</body>