<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resume Keperawatan</title>
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

		.bold {
			font-weight: bold;
		}

		table {
			border-collapse: collapse;
		}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td {
			border: none;
			padding: 0;
		}

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
	</style>
	<script>
		function cetak() {
			// setTimeout(function() { window.close() }, 300);
			window.print();
		}
	</script>
</head>

<body onload="cetak()">
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
				</td>
				<td width="38%">
					<div class="box-identitas">
						<table width="100%">
							<tr>
								<td width="30%">No. RM</td>
								<td width="1%">:</td>
								<td width="69%" class="bold"><?= $pasien->no_rm; ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->nama; ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->tanggal_lahir !== '' ? datefmysql($pasien->tanggal_lahir) : '-') ?> (<?= createUmur($pasien->tanggal_lahir) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Kelamin</td>
								<td>:</td>
								<td class="bold"><?= $pasien->kelamin; ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<h1 class="center bold" style="font-size: 12pt">RINGKASAN PULANG DAN KONTROL KEMBALI</h1>
		<table width="100%" class="table-data">
			<tr>
				<td colspan="4" class="left bold">Ruangan : <span class="dotted-underline bold"><?= $ruangan ?></span></td>
			</tr>
			<tr>
				<td colspan="4">
					<table widht="100%" class="table-no-border">					
						<tr>
							<td class="no__border" colspan="3" align="left">Tanggal MRS : <?= $resume_keperawatan->tanggal_mrs ?></td>						
						</tr>
						<tr>
							<td class="no__border" colspan="3" align="left">
								Diagnosa Masuk : 
								<?php 
									function hapusKodeDiagnosar($nama) {
										// Cek apakah string diawali dengan kode diagnosa (huruf/angka diikuti titik atau simbol seperti "+", diakhiri dengan spasi)
										if (preg_match('/^[A-Z0-9]+\.[0-9]*[\+\.\s]*\s+/', $nama)) {
											// Jika ada kode diagnosa, hapus kode tersebut
											return preg_replace('/^[A-Z0-9]+\.[0-9]*[\+\.\s]*\s+/', '', $nama);
										} else {
											// Jika tidak ada kode diagnosa, kembalikan teks aslinya
											return $nama;
										}
									}
									// Menghilangkan kode dari diagnosa masuk
									echo hapusKodeDiagnosar($diagnosa_awal);
								?>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="3" align="left">
								Diagnosa Keluar :
								<div style="display:inline-block; vertical-align:top;">
									<?php 
										// function hapusKodeDiagnosa($nama) {
										// 	// Cek apakah string diawali dengan kode diagnosa (huruf/angka diikuti titik, dengan atau tanpa angka setelah titik)
										// 	if (preg_match('/^[A-Z0-9]+\.[0-9]*\.\s+/', $nama)) {
										// 		// Jika ada kode diagnosa, hapus kode tersebut
										// 		return preg_replace('/^[A-Z0-9]+\.[0-9]*\.\s+/', '', $nama);
										// 	} else {
										// 		// Jika tidak ada kode diagnosa, kembalikan teks aslinya
										// 		return $nama;
										// 	}
										// }

										function hapusKodeDiagnosa($nama) {
											// Cek apakah string diawali dengan kode diagnosa (huruf/angka diikuti titik atau simbol seperti "+", diakhiri dengan spasi)
											if (preg_match('/^[A-Z0-9]+\.[0-9]*[\+\.\s]*\s+/', $nama)) {
												// Jika ada kode diagnosa, hapus kode tersebut
												return preg_replace('/^[A-Z0-9]+\.[0-9]*[\+\.\s]*\s+/', '', $nama);
											} else {
												// Jika tidak ada kode diagnosa, kembalikan teks aslinya
												return $nama;
											}
										}
																										
										// Menampilkan semua data dari $diagnosa_utama
										if (!empty($diagnosa_utama)) { // Memeriksa apakah variabel $diagnosa_utama tidak kosong
											foreach ($diagnosa_utama as $utama) { // Melakukan iterasi (loop) melalui setiap elemen dalam array $diagnosa_utama
												echo hapusKodeDiagnosa($utama->nama) . '<br>'; // Menghapus kode diagnosa dari properti 'nama' setiap elemen dan menampilkan hasilnya, diikuti dengan <br> untuk membuat baris baru di HTML
											}
										}
										

										if (!empty($ds_manual_utama)) {
											foreach ($ds_manual_utama as $dsutama) {
												echo hapusKodeDiagnosa($dsutama->nama) . '<br>';
											}
										}

										if (!empty($diagnosa_sekunder)) {
											foreach ($diagnosa_sekunder as $sekunder) {
												echo hapusKodeDiagnosa($sekunder->nama) . '<br>';
											}
										}

										if (!empty($ds_manual_sekunder)) {
											foreach ($ds_manual_sekunder as $manual_sekunder) {
												echo hapusKodeDiagnosa($manual_sekunder->nama) . '<br>';
											}
										}
									?>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>			
			<tr>
				<td colspan="4" class="center bold">KEADAAN UMUM PASIEN</td>
			</tr>
			<tr>
				<td colspan="4">
					<table widht="100%" class="table-no-border">
						<tr>
							<td class="no__border" align="left">Keadaan Saat Pulang</td>
							<td class="no__border">:</td>
							<td class="no__border" align="left" colspan="4">
								<span style="margin-left:0px">Suhu : </span><span class="dotted-underline bold"><?= $resume_keperawatan->ek_suhu ?></span>&#8451;
								<span style="margin-left:20px">Nadi : </span><span class="dotted-underline bold"><?= $resume_keperawatan->ek_nadi ?></span>x/menit
								<span style="margin-left:20px">Pernafasan : </span><span class="dotted-underline bold"><?= $resume_keperawatan->ek_pernafasan ?></span>x/menit
								<span style="margin-left:20px">Tekanan Darah : </span><span class="dotted-underline bold"><?= $resume_keperawatan->ek_tensi_sis ?>/<?= $resume_keperawatan->ek_tensi_dis ?></span>mmHg

							</td>
						</tr>
						<tr>
							<td class="no__border" align="left">Diet Nutrisi</td>
							<td class="no__border">:</td>
							<td class="no__border"><input type="checkbox" <?= ($resume_keperawatan->diet_oral !== null ? 'checked' : '') ?>> Oral</input></td>
							<td class="no__border"><input type="checkbox" <?= ($resume_keperawatan->diet_ngt !== null ? 'checked' : '') ?>> NGT</input></td>

							<?php $diet_khusus = json_decode($resume_keperawatan->diet_khusus) ?>
							<td class="no__border"><input type="checkbox" <?= ($resume_keperawatan->diet_khusus !== '' ? 'checked' : '') ?>> Diet Khusus,</input>
								<span>jelaskan</span><span class="dotted-underline bold"><?= ($diet_khusus->diet_khusus !== '' ? '<span>' . $diet_khusus->sm_diet_khusus . '</span>' : '') ?></span>
							</td>
							<?php $batasan_cairan = json_decode($resume_keperawatan->batasan_cairan) ?>
							<td class="no__border"><input type="checkbox" <?= ($batasan_cairan->batasan_cairan !== '' ? 'checked' : '') ?>> Batasan cairan</input>
								<span class="dotted-underline bold"><?= ($batasan_cairan->batasan_cairan !== '' ? '<span>' . $batasan_cairan->sm_batasan_cairan . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>

							<td class="no__border" align="left">BAB</td>
							<td class="no__border">:</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->bab === 'Normal' ? 'checked' : '') ?>> Normal</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->bab === 'Ileostomy' ? 'checked' : '') ?>> Ileostomy</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->bab === 'Inontinensia urin' ? 'checked' : '') ?>> Inontinensia urin</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->bab === 'Inkontinensia alvi' ? 'checked' : '') ?>> Inkontinensia alvi</td>
						</tr>
						<tr>
							<td class="no__border" align="left">BAK</td>
							<td class="no__border">:</td>
							<td class="no__border"><input type="checkbox" <?= ($resume_keperawatan->bak === 'Normal' ? 'checked' : '') ?>> Normal</input></td>
							<td class="no__border" colspan="3"><input type="checkbox" <?= ($resume_keperawatan->bak === 'Kateter, tanggal pasang terakhir,' ? 'checked' : '') ?>> Kateter </input>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th colspan="5" align="center">DIISI OLEH BIDAN (Khusus Pasien Kebidanan)</th>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border small__font">
						<tr>
							<td class="no__border" align="left">Kontraksi Uterus</td>
							<td class="no__border">:</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->kontraksi === 'Tidak' ? 'checked' : '') ?>> Tidak</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->kontraksi === 'Baik' ? 'checked' : '') ?>> Baik</input></td>
							<td class="no__border" colspan="2">
								<span>Tinggi fundus uteri : </span><span class="dotted-underline"><?= $resume_keperawatan->fundus ?></span>
							</td>
						</tr>
						<tr>
							<td class="no__border" align="left">Vulva</td>
							<td class="no__border">:</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->vulva === 'Bersih' ? 'checked' : '') ?>> Bersih</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->vulva === 'Kotor' ? 'checked' : '') ?>> Kotor</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->vulva === 'Bengkak' ? 'checked' : '') ?>> Bengkak</input></td>
							<td class="no__border" align="left">Luka Perfineum :
								<input style="margin-left:20px" type="checkbox" <?= ($resume_keperawatan->perineum === 'Kering' ? 'checked' : '') ?>> Kering</input>
								<input style="margin-left:20px" type="checkbox" <?= ($resume_keperawatan->perineum === 'Basah' ? 'checked' : '') ?>> Basah</input>
							</td>
						</tr>
						<!-- <tr>
									<td class="no__border">:</td>
									<td class="no__border"> <input type="checkbox"> Kering</input></td>
									<td class="no__border" colspan="3"> <input type="checkbox"> Basah</input>
								</tr> -->
						<tr>
							<td class="no__border" align="left">Lochae</td>
							<td class="no__border">:</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->lochaea === 'Banyak' ? 'checked' : '') ?>> Banyak</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->lochaea === 'Sedikit' ? 'checked' : '') ?>> Sedikit</input></td>
							<td class="no__border" colspan="2">
								<span style="margin-left:0px">Warna : </span><span class="dotted-underline bold"><?= $resume_keperawatan->warna ?></span>&#8451;
								<span style="margin-left:0px">Bau : </span><span class="dotted-underline bold"><?= $resume_keperawatan->bau_lochaea ?></span>&#8451;
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table width="100%" class="table-no-border small__font">
						<tr>
							<td class="no__border" align="left">Luka/Luka Operasi</td>
							<td class="no__border">:</td>
							<td class="no__border" colspan="2"> <input type="checkbox" <?= ($resume_keperawatan->luka === 'Bersih' ? 'checked' : '') ?>> Bersih</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->luka === 'Kotor' ? 'checked' : '') ?>> Kotor</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->luka === 'Ada cairan dari luka' ? 'checked' : '') ?>> Ada cairan dari luka, </input>
								<span>jelaskan</span><span class="dotted-underline bold"><?= $resume_keperawatan->luka_operasi_cairan ?></span>
							</td>
						</tr>
						<tr>
							<td class="no__border" align="left">Transfer & Mobilisasi</td>
							<td class="no__border">:</td>
							<td class="no__border" colspan="2"> <input type="checkbox" <?= ($resume_keperawatan->mobilisasi === 'Mandiri' ? 'checked' : '') ?>> Mandiri</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->mobilisasi === 'Dibantu Sebagian' ? 'checked' : '') ?>> Dibantu sebagian</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->mobilisasi === 'Dibantu Penuh' ? 'checked' : '') ?>> Dibantu penuh</input>
							</td>
						</tr>
						<tr>
							<td class="no__border" align="left">Alat Bantu</td>
							<td class="no__border">:</td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->alat_bantu === 'Tongkat' ? 'checked' : '') ?>> Tongkat</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->alat_bantu === 'Kursi Roda' ? 'checked' : '') ?>> Kursi Roda</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->alat_bantu === 'Troley' ? 'checked' : '') ?>> Troley/kereta Dorong</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($resume_keperawatan->alat_bantu === 'Lain - lain' ? 'checked' : '') ?>> Lain-lain, </input>
								<span>jelaskan</span><span class="dotted-underline bold"><?= $resume_keperawatan->alat_bantu_lain ?></span>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="6" align="left"><b> <br> </b></td>
						</tr>
						<tr>
							<td class="no__border" colspan="6" align="left"><b>EDUKASI / PENYULUHAN KESEHATAN YANG SUDAH DIBERIKAN</b></td>
						</tr>
						<tr>

							<?php $edukasi = json_decode($resume_keperawatan->edukasi) ?>

							<td class="no__border" colspan="2"> <input type="checkbox" <?= ($edukasi->edukasi_penyakit !== '' ? 'checked' : '') ?>> Penyakit dan pengobatannya</input></td>
							<td class="no__border" colspan="2"> <input type="checkbox" <?= ($edukasi->edukasi_perawatan !== '' ? 'checked' : '') ?>> Perawatan luka</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($edukasi->edukasi_dirumah !== '' ? 'checked' : '') ?>> Perawatan di rumah</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($edukasi->edukasi_ibubayi !== '' ? 'checked' : '') ?>> Perawatan Ibu dan Bayi</input>
						</tr>
						<tr>
							<td class="no__border"> <input type="checkbox" <?= ($edukasi->edukasi_nyeri !== '' ? 'checked' : '') ?>> mengatasi nyeri</input></td>
							<td class="no__border" colspan="4"> <input type="checkbox" <?= ($edukasi->edukasi_lingkungan !== '' ? 'checked' : '') ?>> Persiapan lingkungan dan fasilitas untuk perawatan di rumah</input></td>
							<td class="no__border"> <input type="checkbox" <?= ($edukasi->edukasi_kb !== '' ? 'checked' : '') ?>> Nasehat keluarga berencana</input></td>
						</tr>
						<tr>
							<td class="no__border"  > <input type="checkbox" <?= ($edukasi->edukasi_rehabilitas !== '' ? 'checked' : '') ?>> Rehabilitas Terapi</input></td>							
							<td class="no__border"  colspan="4"><input type="checkbox" <?= ($edukasi->edukasi_lain !== '' ? 'checked' : '') ?>> Lainnya</input>
								<span class="dotted-underline bold"><?= ($edukasi->edukasi_lain_input !== '' ? '<span>' . $edukasi->edukasi_lain_input . '</span>' : '') ?></span>
							</td>
						</tr>
						<tr>
							<td class="no__border" colspan="6" align="left"><b>DIAGNOSA KEPERAWATAN SELAMA DIRAWAT</b></td>
						</tr>
						<tr>
							<td class="no__border" colspan="3" align="left"><b>1. </b><?= $resume_keperawatan->diagnosa_perawat ?></td>
							<td class="no__border" colspan="3" align="left"><b>2. </b><?= $resume_keperawatan->diagnosa_perawat_satu ?></td>
						</tr>
						<tr>
							<td class="no__border" colspan="6" align="left"><b>ANJURAN / PERAWAT KHUSUS SETELAH PULANG</b></td>
						</tr>
						<tr>
							<td class="no__border" colspan="3" align="left"><b>1. </b><?= $resume_keperawatan->anjuran_perawat_satu ?></td>
							<td class="no__border" colspan="3" align="left"><b>3. </b><?= $resume_keperawatan->anjuran_perawat_dua ?></td>
						</tr>
						<tr>
							<td class="no__border" colspan="3" align="left"><b>2. </b><?= $resume_keperawatan->anjuran_perawat_tiga ?></td>
							<td class="no__border" colspan="3" align="left"><b>4. </b><?= $resume_keperawatan->anjuran_perawat ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<th colspan="5" align="left">BARANG DAN HASIL PEMERIKSAAN YANG DISERAHKAN KEPADA KELUARGA</th>
			</tr>
			<tr>
				<td>
					<table width="100%" class="table-no-border small__font">
						<tr>
							<td class="no__border" colspan="1" align="left"><b>1. Hasil Lab : </b> <span class="dotted-underline bold"><?= $resume_keperawatan->hasil_lab ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>8. Resume Medis </b>
								<input type="checkbox" <?= ($resume_keperawatan->resume === '1' ? 'checked' : '') ?>>Ada</input>
								<input type="checkbox" <?= ($resume_keperawatan->resume === '0' ? 'checked' : '') ?>></input>Tidak
							</td>
							<td class="no__border" colspan="2" align="left"><b>Hasil Pemeriksaan </b>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>2. Foto Rontgen : </b> <span class="dotted-underline bold"><?= $resume_keperawatan->rontgen ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>9. Surat Asuransi </b>
								<input type="checkbox" <?= ($resume_keperawatan->surat_asuransi === '1' ? 'checked' : '') ?>>Ada</input>
								<input type="checkbox" <?= ($resume_keperawatan->surat_asuransi === '0' ? 'checked' : '') ?>>Tidak</input>
							</td>
							<td class="no__border" colspan="2" align="left"><b>1.</b><span class="dotted-underline bold"><?= $resume_keperawatan->hasil_satu ?></span></td>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>3. CT. SCAN : </b> <span class="dotted-underline bold"><?= $resume_keperawatan->ct_scan ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>10. Summary Pasien Pulang </b>
								<input type="checkbox" <?= ($resume_keperawatan->summary === '1' ? 'checked' : '') ?>>Ada</input>
								<input type="checkbox" <?= ($resume_keperawatan->summary === '0' ? 'checked' : '') ?>>Tidak</input>
							</td>
							<td class="no__border" colspan="2" align="left"><b>2.</b><span class="dotted-underline bold"><?= $resume_keperawatan->hasil_dua ?></span></td>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>4. EKG </b> <span class="dotted-underline bold"><?= $resume_keperawatan->ekg ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>11. Surat Keterangan Lahir </b>
								<input type="checkbox" <?= ($resume_keperawatan->suket_lahir === '1' ? 'checked' : '') ?>>Ada</input>
								<input type="checkbox" <?= ($resume_keperawatan->suket_lahir === '0' ? 'checked' : '') ?>>Tidak</input>
							</td>
							<td class="no__border" colspan="2" align="left"><b>3.</b><span class="dotted-underline bold"><?= $resume_keperawatan->hasil_tiga ?></span></td>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>5. MRI/MRA : </b> <span class="dotted-underline bold"><?= $resume_keperawatan->mri ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>12. Bayi diserahkan oleh: </b><span class="dotted-underline bold"><?= $resume_keperawatan->bayi_diserahkan ?></span></td>
							<td class="no__border" colspan="2" align="left"><b>4.</b><span class="dotted-underline bold"><?= $resume_keperawatan->hasil_empat ?></span></td>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>6. USG </b> <span class="dotted-underline bold"><?= $resume_keperawatan->usg ?></span>Lembar</td>
							<td class="no__border" colspan="1" align="left"><b>13. Lain-lain </b><span class="dotted-underline bold"><?= $resume_keperawatan->lain_lain ?></td>
							<td class="no__border" colspan="2" align="left"><b>5.</b><span class="dotted-underline bold"><?= $resume_keperawatan->hasil_lima ?></span></td>
						</tr>
						<tr>
							<td class="no__border" colspan="1" align="left"><b>7. Surat Kontrol </b>
								<input type="checkbox" <?= ($resume_keperawatan->surat_kontrol === '1' ? 'checked' : '') ?>>Ada</input>
								<input type="checkbox" <?= ($resume_keperawatan->surat_kontrol === '0' ? 'checked' : '') ?>>Tidak</input>

							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<table width="100%" class="small__font" style="margin-top: 1rem;">
					<thead class="no__border">
						<tr>
							<th colspan="12">TERAPI PULANG</th>
						</tr>
						<tr>
							<th rowspan="2">Nama Obat</th>
							<th rowspan="2">Jumlah</th>
							<th rowspan="2">Dosis</th>
							<th rowspan="2">Frekuensi</th>
							<th rowspan="2">Cara Pemberian</th>
							<th colspan="6">Jam Pemberian</th>
							<th rowspan="2">Petunjuk Khusus</th>
						</tr>
						<tr>
							<th>A</th>
							<th>B</th>
							<th>C</th>
							<th>D</th>
							<th>E</th>
							<th>F</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($terapi_pulang as $tp) { ?>
							<tr>
								<th><?php echo $tp->nama_obat; ?></th>
								<th align="center"><?php echo $tp->jumlah_obat; ?></th>
								<th align="center"><?php echo $tp->dosis; ?></th>
								<th align="center"><?php echo $tp->frekuensi; ?></th>
								<th align="center"><?php echo $tp->cara_pemberian; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian_satu; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian_dua; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian_tiga; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian_empat; ?></th>
								<th align="center"><?php echo $tp->ek_jam_pemberian_lima; ?></th>
								<th align="center"><?php echo $tp->petunjuk_khusus ?: ''; ?></th>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</tr>
			<tr>
				<table width="100%" class="small__font" style="margin-top: 1rem;">
					<thead>
						<tr>
							<th colspan="15">JADWAL KONTROL</th>
						</tr>
						<tr>
							<th colspan="3">Tanggal</th>
							<th colspan="3">Hari</th>
							<th colspan="3">Jam</th>
							<th colspan="3">Nama Dokter</th>
							<th colspan="3">Tempat</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($kontrol_kembali as $jk) { ?>
							<tr>
								<th colspan="3" align="center"><?= date('d-m-Y', strtotime($jk->tanggal)); ?></th>
								<th colspan="3" align="center"><?= $jk->hari; ?></th>
								<th colspan="3" align="center"><?= date('H:m', strtotime($jk->tanggal)); ?></th>
								<th colspan="3" align="center"><?= $jk->dokter; ?></th>
								<th colspan="3" align="center"><?= $jk->tempat_kontrol; ?></th>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<h4>Bila Emergensi atau gawat darurat: Ke IGD RSUD Kota Tangerang atau Rumah sakit / Klinik terdekat yang memiliki layanan IGD 24 Jam. <b>No Telp 021 2972 0201, 021 2972 0202</b></h4>				
				<p></p>		
				

				<table width="100%" class="table-no-borderc center">
					<tr>
						<td width="33%"></td>
						<td width="33%"></td>
						<td width="33%">Tangerang,
							<!-- <br> -->
							<!-- <!?= $resume_keperawatan->created_date; ?> -->

							<?php
								$tanggal_mysql = $resume_keperawatan->created_date; // Perbaiki akses properti

								if (!empty($tanggal_mysql)) {
									setlocale(LC_TIME, 'id_ID.UTF-8'); // Pastikan locale diatur (jika server mendukung)
									$tanggal_diinginkan = date("d F Y", strtotime($tanggal_mysql));

									// Ganti nama bulan ke Bahasa Indonesia
									$bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
									$bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
									$tanggal_diinginkan = str_replace($bulanInggris, $bulanIndonesia, $tanggal_diinginkan);

									echo $tanggal_diinginkan;
								} else {
									echo "-"; // Jika tidak ada tanggal, tampilkan "-"
								}
							?>
						</td>
					</tr>
				</table>
				

				<table width="100%" class="table-no-borderc center">
					<tr>
						<td width="33%">Yang Menyerahkan,</td>
						<td width="33%">Mengetahui</td>
						<td width="33%">Yang Menerima</td>
					</tr>
					<tr>
						<td><br><br><br><br><br></td>
					</tr>
					<tr>
						<td><?= ($resume_keperawatan->perawat_medis !== '' ? '( <span class="dotted-underline">'.$resume_keperawatan->perawat_medis.'</span> )' : '( ................................... )') ?></span></td>
						<td><?= ($resume_keperawatan->dokter !== '' ? '( <span class="dotted-underline">'.$resume_keperawatan->dokter.'</span> )' : '( ................................... )') ?></span></td>
						<td><?= ($resume_keperawatan->penerima !== '' ? '( <span class="dotted-underline">'.$resume_keperawatan->penerima.'</span> )' : '( ................................... )') ?></span></td>
					</tr>
					<tr>
						<td>Tanda tangan dan nama jelas</td>
						<td>Tanda tangan dan nama jelas</td>
						<td>Tanda tangan dan nama jelas</td>
					</tr>
				</table>	
			</tr>				
		</table>
	</div>
</body>