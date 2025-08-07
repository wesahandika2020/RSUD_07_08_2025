<style>
	.header {
		display: flex;
		width: 100%;
		justify-content: space-between;
		align-items: center;
	}

	.italic {
		font-style: italic;
	}

	.uppercase {
		text-transform: uppercase;
	}

	.logo-group {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.logo-group img {
		width: 80px;
	}

	.logo-group p {
		font-size: .625rem;
		margin-top: .5rem;
	}

	.title {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	h2, h3, p {
		margin: 0
	}

	.title h3 {
		text-decoration: underline;
	}

	.title p {
		font-style: italic;
		text-transform: uppercase;
		font-size: 0.75rem;
	}

	.no-rm {
		display: flex;
		gap: .5rem;
		width: 100%;
		font-weight: bold;
		justify-content: flex-end;
		align-items: center;
	}

	.no-rm span {
		border: 2px solid black;
		font-weight: normal;
		padding: .3rem;
	}

	.container {
		display: grid;
		grid-template-columns: 18rem auto;
		gap: .1rem;
		align-items: center;
	}

	.container-3 {
		display: grid;
		grid-template-columns: 8rem auto auto;
		gap: .1rem;
		align-items: center;
	}

	.label {
		display: flex;
		flex-direction: column;
		margin: 0.5rem 0;
	}

	.label .id {
		font-size: 0.90rem;
		text-decoration: underline;
		font-weight: bold;
		text-transform: uppercase;
	}

	.label .ing {
		font-size: 0.75rem;
		font-style: italic;
		text-transform: capitalize;
	}
</style>

<title>Document</title>

<body onload="window.print()">
<header class="header">
	<div style="display: flex; width: 100%; justify-content: center">
		<div class="logo-group">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="logo rsud">
			<p>Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
		</div>
	</div>
	<div style="display: flex; width: 100%; justify-content: center">
		<div class="title">
			<h3 class="uppercase">identitas pasien</h3>
			<p class="italic">patient identity</p>
		</div>
	</div>
</header>

<main style="font-size: 0.75rem;">
	<div class="no-rm">
		NO RM
		<span><?= $no_rm ?></span>
	</div>

	<div class="container">
		<div class="label">
			<span class="id">no. ktp</span>
			<span class="ing">ID number</span>
		</div>
		<span><?= $no_ktp ?></span>

		<div class="label">
			<span class="id">nama pasien</span>
			<span class="ing">patient name</span>
		</div>
		<span><?= $nama ?></span>

		<div class="label">
			<span class="id">jenis kelamin</span>
			<span class="ing">sex</span>
		</div>
		<span><?= $kelamin ?></span>

		<div class="label">
			<span class="id">tempat/tgl lahir</span>
			<span class="ing">place/date of birth</span>
		</div>
		<span><?= $tempat_lahir ?  $tempat_lahir . ', ' . $tanggal_lahir : '- , ' . $tanggal_lahir  ?></span>

		<div class="label">
			<span class="id">agama</span>
			<span class="ing">religion</span>
		</div>
		<span><?= $agama ?></span>

		<div class="label">
			<span class="id">NO.telp / HP</span>
			<span class="ing">phone/mobile phone</span>
		</div>
		<span><?= $no_telp ?></span>

		<div class="label">
			<span class="id">pekerjaan</span>
			<span class="ing">current employment</span>
		</div>
		<span><?= $pekerjaan ?></span>

		<div class="label">
			<span class="id">alamat ktp/domisili</span>
			<span class="ing">addres</span>
		</div>
		<span><?= $alamat ?></span>

		<div></div>
		<div class="container-3">
			<div class="label">
				<span class="id">keluarahan</span>
				<span class="ing">subdistrict</span>
			</div>
			<span><?= $kelurahan ?? '-' ?></span>
			<div style="display: flex; gap: 1rem">
				<span>RT: <?= $no_rt ?? '-' ?></span>
				<span>RW: <?= $no_rw ?? '-'?></span>
			</div>
		</div>
		<div></div>
		<div class="container-3">
			<div class="label">
				<span class="id">kecamatan</span>
				<span class="ing">district</span>
			</div>
			<span><?= $kecamatan ?? '-' ?></span>
			<div></div>
		</div>
		<div></div>
		<div class="container-3">
			<div class="label">
				<span class="id">kota</span>
				<span class="ing">city</span>
			</div>
			<span><?= $kabupaten ?? '-' ?></span>
			<div></div>
		</div>
		<div></div>
		<div class="container-3">
			<div class="label">
				<span class="id">provinsi</span>
				<span class="ing">province</span>
			</div>
			<span><?= $provinsi ?? '-' ?></span>
			<div></div>
		</div>


		<div class="label">
			<span class="id">pendidikan</span>
			<span class="ing">education</span>
		</div>
		<span><?= $pendidikan ?? '-' ?></span>

		<div class="label">
			<span class="id">status perkawinan</span>
			<span class="ing">matrial status</span>
		</div>
		<span><?= $status_kawin ?></span>

		<div class="label">
			<span class="id">jenis pembayaran</span>
			<span class="ing">payment</span>
		</div>
		<span><?= $penjamin ?></span>

		<div class="label">
			<span class="id">poliklinik tujuan</span>
			<span class="ing">policlinic</span>
		</div>
		<span><?= $jenis_pendaftaran ?></span>

		<div class="label">
			<span class="id">nama keluarga/suami/istri</span>
			<span class="ing">family name / spause name</span>
		</div>
		<span><?= $nama_keluarga ?></span>

	</div>
</main>
<footer style="position: fixed;bottom: 0; font-size: 10px; width: 100%">
	<div style="display: flex;justify-content: space-between; margin: 0 3rem">
		<span></span>
		<span>FORM-REM-09-04</span>
	</div>
</footer>
</body>
