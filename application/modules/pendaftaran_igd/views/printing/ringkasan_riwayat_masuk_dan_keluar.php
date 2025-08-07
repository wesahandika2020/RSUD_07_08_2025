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
			<span>: <?= $nama_pasien ?></span>

			<span>No. Rekam Medik</span>
			<span>: <?= $no_rm ?></span>

			<span>Tanggal Lahir</span>
			<span>: <?= $umur ?></span>

			<span>Jenis Kelamin</span>
			<span>: <?= $kelamin === "P" ? 'Perempuan' : 'Laki-laki' ?></span>
		</div>
	</div>
</header>
<main>
	<h3 style="display: flex; justify-content: center"><b>RINGKASAN RIWAYAT MASUK & KELUAR</b></h3>
	<table style="font-size: 13px">
		<tr>
			<th colspan="5" style="text-align: left; background-color: #00aff0"><b>KOLOM ADMINISTRASI</b></th>
		</tr>
		<tr>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>NO. REKAM MEDIS</b>
					<?= $no_rm ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>TANGGAL MASUK</b>
					<?= $tanggal_masuk !== NULL ? $tanggal_masuk : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>TANGGAL KELUAR</b>
					<?= $tanggal_keluar !== NULL ? $tanggal_keluar : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>LAMA RAWAT</b>
					<?= $tanggal_masuk !== NULL && $tanggal_keluar !== NULL ? date_diff(date_create($tanggal_masuk), date_create($tanggal_keluar))->format('%a Hari') : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>UMUR</b>
					<?= $umur_pasien." Tahun" ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>NAMA PASIEN</b>
					<?= $nama_pasien ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>AGAMA</b>
					<?= $agama ?>
				</div>
			</td>
			<td colspan="2" style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>TANGGAL LAHIR (dd/mm/yy)</b>
					<?= date('d/m/Y', strtotime($tanggal_lahir)) ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div style="display: flex; flex-direction: column; gap:.3rem">
					<b>INDIKASI MASUK RAWAT INAP:</b>
					<?= $indikasi ?>
				</div>
				<div style="display: flex; flex-direction: column; gap:.3rem">
					<b>DIAGNOSA MASUK:</b>
					<?= $diag_awal !== '' ? $diag_awal : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>STATUS:</b>
					<?= $status_kawin ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>KELAMIN:</b>
					<?= $kelamin ?>
				</div>
			</td>
		</tr>
		<tr>
			<td style="text-align: center" colspan="2">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>KELAS/RUANGAN</b>
					<?= $kelas !== NULL ? $kelas : '-' ?>/<?= $bangsal !== NULL ? $bangsal : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>JAMINAN</b>
					<?= $penjamin ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>PERUJUK</b>
					<?= $layanan_before !== null ? $layanan_before->jenis_layanan : '-' ?>
				</div>
			</td>
			<td style="text-align: center">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>BERAT BADAN</b>
					<?= $berat_badan !== null ? $berat_badan : '-' ?>
				</div>
			</td>
		</tr>
		<tr>
			<th colspan="5" style="text-align: left; background-color: #00aff0"><b>KOLOM DOKTER</b></th>
		</tr>
		<tr>
			<td colspan="3">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DIAGNOSIS UTAMA:</b>
					<?= $diagnosa_utama[0]->diagnosa !== '' ? $diagnosa_utama[0]->diagnosa : '-' ?>
				</div>
			</td>
			<td colspan="2">
				<div style="display: flex; flex-direction: column;">
					<b>ALIH RAWAT</b>
					<p>1. Tanggal Alih Rawat: <?= $tgl_alih_rawat_1 !== NULL ? $tgl_alih_rawat_1 : '-' ?></p>
					<p>2. Tanggal Alih Rawat: <?= $tgl_alih_rawat_2 !== NULL ? $tgl_alih_rawat_2 : '-' ?></p>
					<p>3. Tanggal Alih Rawat: <?= $tgl_alih_rawat_3 !== NULL ? $tgl_alih_rawat_3 : '-' ?></p>
					<p>4. Tanggal Alih Rawat: <?= $tgl_alih_rawat_4 !== NULL ? $tgl_alih_rawat_4 : '-' ?></p>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3" rowspan="2">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DIAGNOSIS TAMBAHAN:</b>
					<?php foreach ($diagnosa_sekunder as $key => $value) : ?>
						<?= $key + 1 ?>. <?= $value->diagnosa ?>
					<?php endforeach; ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP UTAMA</b>
					<?= $nama_dpjp_utama_1 !== NULL ? $nama_dpjp_utama_1 : '-' ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP tambahan</b>
					<?= $nama_dpjp_tambahan_1 !== NULL ? $nama_dpjp_tambahan_1 : '-' ?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP UTAMA</b>
					<?= $nama_dpjp_utama_2 !== NULL ? $nama_dpjp_utama_2 : '-' ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP tambahan</b>
					<?= $nama_dpjp_tambahan_2 !== NULL ? $nama_dpjp_tambahan_2 : '-' ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>OPERASI/TINDAKAN UTAMA:</b>
					<?= isset($tindakan_utama[0]) ? $tindakan_utama[0]->operasi : '-' ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP UTAMA</b>
					<?= $nama_dpjp_utama_3 !== NULL ? $nama_dpjp_utama_3 : '-' ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP tambahan</b>
					<?= $nama_dpjp_tambahan_3 !== NULL ? $nama_dpjp_tambahan_3 : '-' ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>TINDAKAN TAMBAHAN:</b>
					<?php
					if (count($tindakan_sekunder) >= 1)
					{
						foreach ($tindakan_sekunder as $key => $value)
						{
							echo $key + 1 .'. '.$value->layanan;
						}
					}
					?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP UTAMA</b>
					<?= $nama_dpjp_utama_4 !== NULL ? $nama_dpjp_utama_4 : '-' ?>
				</div>
			</td>
			<td>
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>DPJP tambahan</b>
					<?= $nama_dpjp_tambahan_4 !== NULL ? $nama_dpjp_tambahan_4 : '-' ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>STATUS PULANG</b>
					<?= $status_pulang !== null ? $status_pulang : '-' ?>
				</div>
				<div style="display: flex; flex-direction: column; gap:1rem; margin-top: 1rem">
					<div style="display: flex; flex-direction: column; gap:.2rem">
						<b>PENYEBAB KEMATIAN</b>
						<b>DIAGNOSA PENYEBAB KEMATIAN: </b>
					</div>
					<?php
					if(!empty($diagnosa_penyebab_kematian)){
						foreach($diagnosa_penyebab_kematian as $value){
							echo $value->diagnosa;
						}
					}else{
						echo '-';
					}
					?>
				</div>
			</td>
			<td colspan="2">
				<div style="display: flex; flex-direction: column; gap:1rem">
					<b>KETERANGAN KHUSUS (Bila Ada)</b>
					<?= $keterangan_khusus !== NULL ? $keterangan_khusus : '-' ?>
				</div>
			</td>
		</tr>
	</table>
</main>
<footer style="position: fixed;bottom: 0; font-size: 10px; width: 100%">
	<div style="display: flex;justify-content: flex-end; margin: 0 3rem">
		<span>FORM-PMD-31-00</span>
	</div>
</footer>
</body>
