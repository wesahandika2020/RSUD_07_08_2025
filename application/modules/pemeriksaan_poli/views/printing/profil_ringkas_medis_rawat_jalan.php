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

	table {
		width: 100%;
	}

	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	p{
		margin: 0;
	}
</style>
<body onload="window.print()">
<header class="header">
	<div>
		<div class="logo-group">
			<img src="<?= resource_url().'images/logos/logo-rsud.png' ?>" alt="logo rsud">
			<p>Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
		</div>
	</div>
	<div class="identity">
		<div class="grid-2">
			<span>Nama Lengkap</span>
			<span>: <?= $profil->nama ?></span>

			<span>No. Rekam Medik</span>
			<span>: <?= $profil->id ?></span>

			<span>Tanggal Lahir</span>
			<span>: <?= $profil->umur ?></span>

			<span>Jenis Kelamin</span>
			<span>: <?= $profil->kelamin ?></span>
		</div>
	</div>
</header>
<main>
	<h3 style="display: flex; justify-content: center"><b>PROFIL RINGKAS MEDIS RAWAT JALAN (PRMRJ)</b></h3>
	<table style="font-size: 13px">
		<thead>
			<tr>
				<th><b>TANGGAL/JAM</b></th>
				<th><b>DOKTER SPESIALIS</b></th>
				<th><b>DIAGNOSA PENTING</b></th>
				<th><b>URAIAN KLINIS PENTING</b></th>
				<th><b>RENCANA</b></th>
				<th><b>CATATAN PENTING</b></th>
				<th><b>PARAF</b></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $item) : ?>
				<tr>
					<td><?= date('d/m/Y H:i',strtotime($item->tanggal_daftar)) ?></td>
					<td><?= $item->dokter ?></td>
					<td>
						<div style="display: flex; flex-direction: column">
							<?php foreach($item->diagnosis as $diagnosa) : ?>
								<span><?= $diagnosa->item ?> - <?= $diagnosa->prioritas ?></span>
							<?php endforeach; ?>
						</div>
					</td>
					<td>
						<div style="display: grid; grid-template-columns: auto auto;">
							<?php foreach ($item->anamnesa as $key => $anamnesa) : ?>
								<span>Tanggal</span>
								<span>: <?= date('d/m/Y H:i', strtotime($anamnesa->waktu)) ?></span>

								<span>Keluhan Utama</span>
								<span>: <?= $anamnesa->keluhan_utama ?? '-' ?></span>

								<span>Riwayat Penyakit Sekarang</span>
								<span>: <?= $anamnesa->riwayat_penyakit_sekarang ?? '-' ?></span>

								<span>Riwayat Penyakit Dahulu</span>
								<span>: <?= $anamnesa->riwayat_penyakit_dahulu ?? '-' ?></span>

								<span>Riwayat Penyakit Keluarga</span>
								<span>: <?= $anamnesa->riwayat_penyakit_keluarga ?? '-' ?></span>

								<span>Anamnesa Sosial</span>
								<span>: <?= $anamnesa->anamnesa_sosial ?? '-' ?></span>
							<?php endforeach; ?>
						</div>
					</td>
					<td>
						<div style="display: flex; flex-direction: column">
							<?php foreach ($item->anamnesa as $key => $anamnesa) : ?>
								<span><?= $anamnesa->waktu ?> - <?= $anamnesa->usul_tindak_lanjut ?? '-' ?></span>
							<?php endforeach; ?>
						</div>
					</td>
					<td width="150px">
						<div style="display: grid; grid-template-columns: auto auto;">
							<?php foreach ($item->anamnesa as $key => $anamnesa) : ?>
								<span>Sistolik</span>
								<span>: <?= $anamnesa->tensi_sistolik ?? '-' ?> mm/Hg</span>

								<span>Diastolik</span>
								<span>: <?= $anamnesa->tensi_diastolik ?? '-' ?> mm/Hg</span>

								<span>Suhu</span>
								<span>: <?= $anamnesa->suhu ?? '-' ?> &deg; C</span>

								<span>Nadi</span>
								<span>: <?= $anamnesa->nadi ?? '-' ?> Bpm</span>

								<span>Tinggi Badan</span>
								<span>: <?= $anamnesa->tinggi_badan ?? '-' ?> Cm</span>

								<span>Berat Badan</span>
								<span>: <?= $anamnesa->berat_badan ?? '-' ?> Kg</span>
							<?php endforeach; ?>
						</div>
					</td>
					<td><?= $item->dokter ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</main>
</body>
