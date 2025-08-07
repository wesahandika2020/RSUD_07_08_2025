
<!-- // SPR TERBARU +++-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
            </div>
        </div>
    </header>
    <!--=============== MAIN ===============-->
	<main class="main">
		<br>
		<div class="surat__pengantar__rawat container">
			<h2 class="section__title">SURAT PENGANTAR RAWAT</h2>
			<table class="small__font">
				<tbody class="border">
					<tr>
						<td class="no__border">Dengan Hormat,</td>
					</tr>
					<tr>
						<td class="no__border">Mohon diberikan perawatan dan atau disiapkan untuk :</td>
					</tr>
					<tr>
						<td class="no__border flex">
							<div>
                            <input type="checkbox"<?= $surat_pengantar_rawat->operasi_spr == '1' ? 'checked' : ''; ?>>
                                <label for="">Operasi</label>
							</div>
							<div>
                            <input type="checkbox"<?= $surat_pengantar_rawat->odc_spr == '1' ? 'checked' : ''; ?>>
                                <label for="">(ODC) One Day Care </label>
							</div>
							<div>
                            <input type="checkbox"<?= $surat_pengantar_rawat->rawat_inap_spr == '1' ? 'checked' : ''; ?>>
                                <label for="">Rawat Inap</label>
							</div>
						</td>
					</tr>
					<tr>
						<td class="no__border grid__four-column">
							<div>
								<div>
									<label for="">Nama Pasien </label>
								</div>
							</div>
							<div>
								<div>
									<!-- <label for="">: <!?= $surat_pengantar_rawat->nama_pasien_spr?></label> -->
									<!-- <label for="">: <!?= $ttd_pasien_name ;?></label> -->
									<!-- <label for="">: <1?= $nama_pasien ;?></label> -->
									<label for="">: <?= $pasien->nama; ?></label>
								</div>
							</div>
                            <div></div>
							<div></div>

                            <div>							
                                <div>
                                    <label for=""> Jenis Kelamin</label>
                                </div>
                            </div>
							<div>
                                <div>
									<!-- <label for="">: <!?= $surat_pengantar_rawat->j_spr?></label> -->
									<label for="">: <?= $ttd_pasien_kelamin ;?></label>
									<!-- <label for="">: <!?= $kelamin_pasien ;?></label> -->
									<!-- <label for="">: <!?= $pasien->kelamin ;?></label> -->
									<!-- <label for="">:<!?= $pasien->kelamin == 'Laki-laki' ? 'checked' : ''; ?> <!?= $pasien->kelamin == 'Perempuan' ? 'checked' : ''; ?></label> -->
									<!-- <label for="">:<!?= $pasien->kelamin == 'Perempuan' ? 'checked' : ''; ?></label> -->
								</div>
							</div>
                            <div></div>
							<div></div>

							<div>
								<label for=""> No.Rm</label>
							</div>
							<div>
								<!-- <label for="">: <!?= $surat_pengantar_rawat->no_rm_spr?></label> -->
								<label for="">: <?= $ttd_pasien_nomor ;?></label>
								<!-- <label for="">: <!?= $no_rm ;?></label> -->
								<!-- <label for="">: <!?= $pasien->no_rm; ?></label> -->
							</div>
							<div></div>
							<div></div>

							<div>
								<label for="">Umur</label>
							</div>
							<div>
								<!-- <label for="">: <!?= $surat_pengantar_rawat->umur_spr?> Tahun</label> -->
								<label for="">: <?= $ttd_pasien_umur ;?> Tahun</label>
								<!-- <label for="">: <!?= $umur_pasien ;?> Tahun</label> -->
								<!-- <label for="">: <!?= createUmur2($pasien->tanggal_lahir) ?> Tahun</label> -->
							</div>
							<div></div>
							<div></div>

							<div>
								<label for="">Diagnosis</label>
							</div>
							<div>
								<label for="">: (<?= $surat_pengantar_rawat->diagnosis_spr?>)</label>
							</div>
							<div>
								<div>
                                    <input type="checkbox"<?= $surat_pengantar_rawat->infeksi_spr == '1' ? 'checked' : ''; ?>>
                                    <label for="">Infeksi</label>
								</div>
							</div>
							<div>
								<div>
                                    <input type="checkbox"<?= $surat_pengantar_rawat->non_infeksi_spr == '1' ? 'checked' : ''; ?>>
                                    <label for="">Non infeksi</label>
								</div>
							</div>

							<div>
								<label for="">Dokter yang merawat</label>
							</div>
							<div>
								<label for="">: ( <?= $surat_pengantar_rawat->nama_dokter_1?> )</label>
							</div>
							<div></div>
							<div></div>

							<div>
								<label for="">Jenis tindakan / operasi</label>
							</div>
							<div>
								<label for="">: <?= $surat_pengantar_rawat->jto_spr?></label>
							</div>
							<div></div>
							<div></div>

							<div>
								<label for="">Golongan tindakan / operasi</label>
							</div>
							<div>
								<label for="">: (<?= $surat_pengantar_rawat->gto_spr?>)</label>
							</div>
							<div>
								<div>
                                    <input type="checkbox"<?= $surat_pengantar_rawat->cito_spr == '1' ? 'checked' : ''; ?>>
                                    <label for="">Cito</label>
								</div>
							</div>
							<div>
								<div>
                                    <input type="checkbox"<?= $surat_pengantar_rawat->tidak_cito_spr == '1' ? 'checked' : ''; ?>>
									<label for="">Tidak Cito</label>
								</div>
							</div>
						</td>
					</tr>
				</tbody>

				<tbody class="border">
					<tr>
						<td class="no__border grid__two-column">
							<div>
								<label for="">Ruangan yang dituju</label>
							</div>
							<div class="grid__five-column">
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->icu_spr == '1' ? 'checked' : ''; ?>>
									<label for="">ICU</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->hcu_spr == '1' ? 'checked' : ''; ?>>
									<label for="">HCU</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->pcu_spr == '1' ? 'checked' : ''; ?>>
									<label for="">PICU</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->nicu_spr == '1' ? 'checked' : ''; ?>>
									<label for="">NICU</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->vk_spr == '1' ? 'checked' : ''; ?>>
									<label for="">VK</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="no__border grid__two-column">
							<div></div>
							<div class="grid__two-column2">
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->perinatologi_spr == '1' ? 'checked' : ''; ?>>
									<label for="">Perinatologi</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->ruang_perawatan_spr == '1' ? 'checked' : ''; ?>>
									<label for="">Ruang Perawatan </label>
                                    <label for="">(<?= $surat_pengantar_rawat->rp_spr ?>)</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="no__border grid__two-column">
							<div></div>
							<div class="grid__two-column2">
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->isolasi_spr == '1' ? 'checked' : ''; ?>>
									<label for="">Isolasi</label>
								</div>
								<div>
                                <input type="checkbox" <?= $surat_pengantar_rawat->lain_lain_spr == '1' ? 'checked' : ''; ?>>
									<label for="">Lain-lain </label>
                                    <label for="">(<?= $surat_pengantar_rawat->ll_spr ?>)</label>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="no__border grid__signature">
							<div></div>
							<div>Tangerang, <?= tanggal_indo($surat_pengantar_rawat->tanggal_dokter_spr, false) ?></b></div>
							<div></div>
							<div>Dokter Pengirim,</div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div>( <?= $surat_pengantar_rawat->nama_dokter_2; ?>) </div>
							<div></div>
							<div>Nama & Tanda Tangan</div>
						</td>
					</tr>
				</tbody>
				<tbody class="border">
					<tr>
						<td class="no__border grid__two-column">
							<div>
								<label for="">Catatan Pendaftaran :</label>
							</div>
							<div>
								<?= $surat_pengantar_rawat->catatan_pendaftaran_spr ?>
							</div>
						</td>
					</tr>
                    <br>
                    <br>
					<tr></tr>
					<td class="no__border grid__signature">
						<div></div>
						<div>Tangerang, <?= tanggal_indo($surat_pengantar_rawat->tanggal_petugas_spr, false) ?></b></div>
						<div></div>
						<div>Petugas Pendaftaran,</div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div>( <?= $surat_pengantar_rawat->id_users; ?> )</div>
						<div></div>
						<div>Nama & Tanda Tangan</div>
					</td>
				</tbody>
			</table>
		</div>
        <br>
        <br>
        <br>
        <br>
        <br>  
        <br>
        <br>
        <br>        
        <p class="page__number">FORM-PMD-10-01</p>
	</main>
</body>
<?php die; ?>
