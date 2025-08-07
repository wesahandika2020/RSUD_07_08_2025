<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
	<header class="header" id="header">
		<div class="header__container2 container">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
			<div>
				<h1 class="header__title">RSUD KOTA TANGERANG</h1>
				<p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
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

	<!--=============== MAIN ===============-->
	<main class="main">
		<div class="surat__asesmen__pra__bedah container">
			<h2 class="section__title">ASESMENT PRA BEDAH</h2>
			<table class="small__font">
                <tbody>
                    <tr>
                        <td class="no__border" width="15%">Tanggal / Waktu </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= (date("d/m/Y H:i", strtotime($asesment_pra_bedah->tanggal_waktu))); ?></b></td>
                    </tr>
                    <tr>
						<td class="no__border">Riwayat Alergi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4">
                            <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_riwayat_alergi == '0' ? 'checked' : ''; ?>>Tidak
                            <input style="margin-left: .5rem; margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_riwayat_alergi == '1' ? 'checked' : ''; ?>>Ya, <?= ($asesment_pra_bedah->apb_ket_riwayat_alergi); ?>                            
                        </td>                                                
					</tr>
                    <tr>
						<td class="no__border">Tekanan Darah</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border">
                            <b><?= ($asesment_pra_bedah->apb_tensi_sis); ?></b>/<b><?= ($asesment_pra_bedah->apb_tensi_dis); ?></b> mmHg                            
                        </td>
                    <tr>
						<td class="no__border">Berat Badan</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= ($asesment_pra_bedah->apb_bb); ?></b> Kg</td>                                         
					</tr>
                    <tr>
						<td class="no__border">Nadi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= ($asesment_pra_bedah->apb_nadi); ?></b> x/Mnt</td>                                         
					</tr>
                    <tr>
						<td class="no__border">Suhu</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= ($asesment_pra_bedah->apb_suhu); ?></b> x/Mnt</td>                                         
					</tr>
                    <tr>
						<td class="no__border">Pernafasan</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= ($asesment_pra_bedah->apb_pernafasan); ?></b> x/Mnt</td>                                         
					</tr>
                    <!-- <tr>
						<td class="no__border">Status Nutrisi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4">
                            <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_status_nutrisi == 'Obesitas' ? 'checked' : ''; ?>>Obesitas
                            <input style="margin-left: .5rem; margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_status_nutrisi == 'Weight' ? 'checked' : ''; ?>>Over Weight      
                            <input style="margin-left: .5rem; margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_status_nutrisi == 'Normo' ? 'checked' : ''; ?>>Normo Weight                          
                     
                        </td>                                                
					</tr> -->
                    <tr>
                        <td colspan="6" align="center"><b>Anamnesis</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Keluhan Utama </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= $asesment_pra_bedah->keluhan_utama; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Riwayat Penyakit Sekarang </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?= $asesment_pra_bedah->rps; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Riwayat Penyakit Terdahulu</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->apb_riwayat_penyakit_terdahulu; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Pemeriksaan Fisik</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->pemeriksaan_fisik; ?></b></td>
                    </tr>
                    <!-- <tr>
                        <td class="no__border" width="25%">Pemeriksaan Penunjang</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b></b></td>
                    </tr>  -->
                    <tr>
                        <td class="no__border" width="25%">Labolatorium</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->labolatorium; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Permasalahan</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->permasalahan; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%">Diagnosa Pra Bedah</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->diagnosa_pra_bedah; ?></b></td>
                    </tr>  
                    <tr>
                        <td class="no__border" width="25%">Diagnosa Banding</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->diagnosis_banding; ?></b></td>
                    </tr> 
                    <tr>
                        <td class="no__border" width="25%">Rencana Tindak Operasi</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4"><b><?=$asesment_pra_bedah->apb_rencana_operasi; ?></b></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="30%">Edukasi awal diagnosis, Resume tujuan terapi kepada</td>
                    </tr>
                    <tr>
						<td class="no__border"> <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->is_pasien == '1' ? 'checked' : ''; ?>>Pasien </td>                                             
					</tr>
                    <tr>
						<td class="no__border"> <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->is_keluarga == '1' ? 'checked' : ''; ?>>Keluarga, Nama</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border"><?= ($asesment_pra_bedah->nama_keluarga); ?> </td>                                     
					</tr>
                    <tr>
						<td class="no__border">Hubungan dengan pasien </td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border"><?= $asesment_pra_bedah->hubungan_keluarga?></td>                                          
					</tr>
                    <tr>
						<td class="no__border"> <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->is_edukasi == '1' ? 'checked' : ''; ?>>Memberikan edukasi kepada pasien atau keluarga</td> 
                        <td class="no__border" width="1%">:</td>                                            
                        <td class="no__border"><?= ($asesment_pra_bedah->alasan_edukasi); ?></td>
					</tr>
                    <tr>
						<td class="no__border">Rawat Inap</td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border" colspan="4">
                            <input style="margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_rawat_inap == '0' ? 'checked' : ''; ?>>Tidak
                            <input style="margin-left: .5rem; margin-right: .25rem;" type="checkbox" <?= $asesment_pra_bedah->apb_rawat_inap == '1' ? 'checked' : ''; ?>>Ya, <?= ($asesment_pra_bedah->apb_rawat_inap_indikasi); ?>                            
                        </td>                                                
					</tr>                                   
                </tbody>                                            
			</table>
            <td><br><br><br><br><br></td>
            <table class="no__border big__line__spacing small__font">
            <tbody>
                <tr>
                    <td class="no__border" width="50%" align="center">Dokter DPJP <br> <br> <br>(<b style="text-transform:uppercase"><?=$asesment_pra_bedah->dpjp_pra_bedah; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                    <td class="no__border" width="50%" align="center">Pasien/keluarga <br> <br> <br>(<b><?=$asesment_pra_bedah->apb_pasien; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                </tr>
            </tbody>     
            </table>
            
		</div>
	</main>

	<!--=============== FOOTER ===============-->
	<footer class="footer">
		<div class="footer__container container grid">
			<p class="page__number">FORM-KEP-14-00</p>
		</div>
	</footer>
</body>
<?php die; ?>
