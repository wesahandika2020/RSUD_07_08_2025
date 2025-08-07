<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Pemulasaran Jenazah</title>
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
			padding: 5px 5px;
		}

		.table-no-border tr td {
			border: none;
			padding: 5px 5px;
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
	
</head>

<!-- <body onload="cetak()"> -->
	<div class="page page_break">
		<input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran"
			value="<?php echo $pemulasaran_jenazah->id_layanan_pendaftaran; ?>">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">DATA PASIEN PEMULASARAN JENAZAH</h1>
		<hr>
		<td></td>
		<p></p>
		<p></p>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="15%">No</td>
				<td width="1%">:</td>
				<td width="30%" class="bold"><span class="dotted-underline bold"><?= $pemulasaran_jenazah->id ?></span>
				</td>
				<td width="15%">Tanggal/Bulan/Tahun</td>
				<td width="1%">:</td>
				<td width="30%" class="bold"><span class="dotted-underline bold"><?php echo @date('d-m-Y'); ?></td>
				<td></td>
			</tr>
		</table>
		<p></p>
		<p></p>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">NAMA LENGKAP</td>
				<td width="30%" class="bold"><?= $pemulasaran_jenazah->nama_pasien ?></td>
				<td width="15%">NO. RM</td>
				<td width="40%" class="bold"><?= $pemulasaran_jenazah->id_pasien ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">JENIS KELAMIN</td>
				<td width="85%" class="bold">
					<?= ($pemulasaran_jenazah->jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">AGAMA</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->agama_pasien ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">ALAMAT</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->alamat_pasien ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">USIA</td>
				<td widht="45%" class="bold">
					<?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
					(<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</td>
				<td width="15%">ASAL RUANGAN</td>
				<td width="40%" class="bold"><?= $asal_ruangan->bed ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">DOKTER</td>
				<td width="85%" class="bold"><?= $diagnosa[0]['dokter'] ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">DIAGNOSA DOKTER</td>
				<td width="85%" class="bold"><?= $diagnosa[0]['golongan_sebab_sakit'] ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">PETUGAS IPJ</td>
				<td width="45%" class="bold"><?= $pemulasaran_jenazah->petugas_ipj ?></td>
				<td width="15%">SUPIR AMBULAN</td>
				<td width="40%" class="bold"><?= $pemulasaran_jenazah->sopir_ambulance ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="30%">WAKTU MENINGGAL</td>
				<td width="70%" class="bold">JAM : <?= $pemulasaran_jenazah->waktu_meninggal ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="30%">WAKTU PANGGILAN</td>
				<td width="70%" class="bold">JAM : <?= $pemulasaran_jenazah->waktu_panggilan ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="30%">WAKTU MASUK RUANG JENAZAH</td>
				<td width="70%" class="bold">JAM : <?= $pemulasaran_jenazah->waktu_masuk_ruang_jenazah ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="30%">WAKTU PENGANTARAN JENAZAH</td>
				<td width="70%" class="bold">JAM : <?= $pemulasaran_jenazah->waktu_pengantaran ?></td>
			</tr>
		</table>
	</div>
<!-- </body> -->

<!-- <body onload="cetak()"> -->
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">SURAT SERAH TERIMA JENAZAH</h1>
		<hr>
		<td></td>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="100%"> Dengan ini saya Staf IPJ RSUD Kota Tangerang : </td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="19%">Nama Lengkap</td>
				<td width="1%">:</td>
				<td width="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->petugas_ipj ?></td>
			</tr>
			<tr>
				<td width="19%">NR. TKK</td>
				<td width="1%">:</td>
				<td width="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->nip_petugas_ipj ?></td>
			</tr>
			<tr>
				<td width="19%">Jam Tugas</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->jam_tugas ?></span></td>
				</td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="100%" colspan="3">Menyerahkan Jenazah atas, </td>
			</tr>
			<p></p>
			<tr>
				<td width="19%">Nama Jenazah</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->nama_pasien ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">No Surat Kematian</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->surat_kematian ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">No. Register (RM)</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->id_pasien ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Umur</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
						(<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Jenis Kelamin</td>
				<td width="1%">:</td>
				<td width="80%" class="bold"><span
						class="dotted-underline bold"><?= ($pemulasaran_jenazah->jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></span>
				</td>
				</td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="100%" colspan="3">Penyerahan Kepada, </td>
			</tr>
			<p></p>
			<tr>
				<td width="19%">No. KTP/SIM</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->no_ktp_pj ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Nama Penanggung Jawab</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->nama_penanggung_jawab ?></span></td>
				</td>
			</tr>			
			<tr>
				<td width="19%">Jenis Kelamin</td>
				<td width="1%">:</td>
				<td width="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->kelamin_pj ?></span>
				</td>
				</td>
			</tr>
			<tr>
				<td width="19%">No.Telepon/HP</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->tlp_pj ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Jam Penyerahan</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->waktu_pengantaran ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Alamat Pengantaran</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->alamat_pj ?></span></td>
				</td>
			</tr>
		</table>
		<p></p>
		<p></p>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="70%"></td>
				<td width="30%">Tangerang, <span class=""><?php echo @date('d-m-Y'); ?> </td>
			</tr>
		</table>
		<p></p>
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
				<td><?= ($pemulasaran_jenazah->petugas_ipj !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->petugas_ipj.'</span> )' : '( ................................... )') ?></span>
				</td>
				<td><span class="dotted-underline">( ................................... )</span></td>
				<td><?= ($pemulasaran_jenazah->nama_penanggung_jawab !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->nama_penanggung_jawab.'</span> )' : '( ................................... )') ?></span>
				</td>
			</tr>
			<tr>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
			</tr>
		</table>
	</div>
<!-- </body> -->

<!-- <body onload="cetak()"> -->
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
				<td width="38%">
					<div class="box-identitas">
						<table width="100%">
							<tr>
								<td width="30%">Tanggal</td>
								<td width="1%">:</td>
								<td width="69%"><span class="bold"><?php echo @date('d-m-Y'); ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $pemulasaran_jenazah->nama_pasien ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold">
									<?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
									(<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Kelamin</td>
								<td>:</td>
								<td class="bold">
									<?= ($pemulasaran_jenazah->jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?>
								</td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td class="bold"><?= $pemulasaran_jenazah->agama_pasien ?></td>
							</tr>
							<tr>
								<td>No. RM</td>
								<td>:</td>
								<td class="bold"><?= $pemulasaran_jenazah->id_pasien ?></td>
							</tr>
							<tr>
								<td>Ruang Rawat/Kelas</td>
								<td>:</td>
								<td width="40%" class="bold"><?= $asal_ruangan->bed ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td class="bold"><?= $pemulasaran_jenazah->alamat_pasien ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<table>
			<br>
			<h1 class="bold center">BUKTI PELAYANAN JENAZAH</h1>
			<hr>
			<table width="100%" class="table-data">
				<tr>
					<th width="10%" class="center">Checklist</th>
					<th width="45%" class="center">Bentuk Layanan di IPJ</th>
					<th width="45%" class="center">Petugas IPJ (Nama & TTD)</th>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="kendaraan_jenazah_perkm" value="1965">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Kendaraan Jenazah (per km)</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-kendaraan-jenazah"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="pemulasaran_jenazah-lk" value="1713">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Pemulasaran Jenazah Laki-laki</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-jenazah-lakilaki"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="pemulasaran_jenazah_pr" value="1714">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Pemulasaran Jenazah Perempuan</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-jenazah-perempuan"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="perawatan_jenazah" value="1715
							">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Perawatan Jenazah (Kamar Jenazah)</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-perawatan-jenazah"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="otopsi" value="1717">

					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Otopsi</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-otopsi"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="lemari_pendingin_perhari" value="1718">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Lemari Pendingin Perhari</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-lemari-pendingin"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="peti_jenazah_jumblo" value="1966">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Peti Jenazah Jumbo</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-jumbo"></span></td>
				</tr>
				<tr>
					<td class="center">
						<input class="form-check-input form-bukti-pelayanan" type="checkbox" name="tindakan-pelayanan"
							id="peti_jenazah_standar" value="1967">
					</td>
					<td class="center">
						<label class="form-check-label" for="defaultCheck1">Peti Jenazah Standar</label>
					</td>
					<td class="center"><span id="petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-standar"></span></td>
				</tr>
			</table>
			<p></p>
			<p></p>
			<table width="100%" class="table-no-borderc center">
				<p class="center"> Mengetahui </p>
				<p class="center"> Ka. Instalasi Pemulasaran Jenazah </p>
			</table>
			<table width="100%" class="table-no-borderc center">
				<tr>
					<td width="100%">RSUD Kota Tangerang</td>
				</tr>
				<tr>
					<td><br><br><br><br><br></td>
				</tr>
				<tr>
					<td><span class="dotted-underline">( H. SAMSUHILAL, SKM )</span></td>
				</tr>
				<tr>
					<td>NIP. 197802172006041013	
					<td>
				</tr>
			</table>
	</div>
<!-- </body> -->

<!-- <body onload="cetak()"> -->
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">FORMULIR KESEDIAAN TINDAKAN TERHADAP JENAZAH</h1>
		<hr>
		<td></td>
		<br>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Nama Lengkap</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->nama_penanggung_jawab ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>			
				<td width="15%">Umur/Tanggal Lahir</td>
				<td widht="45%" class="bold"><?= $pemulasaran_jenazah->umur_tanggal_lahir_pj ?></td>					
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Alamat</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->alamat_pj ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Hubungan Keluarga</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->hubungan_keluarga ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Agama Penanggung Jawab</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->agama_pj ?></td>
			</tr>
		</table>			
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">No.Telepon/HP</td>
				<td widht="80%" class="bold"><?= $pemulasaran_jenazah->tlp_pj ?></td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<p class="bold">Menyatakan bersedia melakukan tindakan terhadap jenazah :</p>
			<tr>
				<td class="table-check">
					<input type="checkbox"
						<?= $pemulasaran_jenazah->is_pemulasaran_jenazah == '1' ? 'checked' : 'unchecked' ?>>Pemulasaran Jenazah Pemandian/Pengkafanan)
				</td>
			</tr>
			<tr>
				<td class="table-check">
					<input type="checkbox"
						<?= $pemulasaran_jenazah->is_pengantaran_jenazah  == '1' ? 'checked' : 'unchecked' ?>>Pengantaran Jenazah

					<!-- <input class="form-check-input form-kesediaan" name="pnj" type="checkbox" value="1"	id="kesediaan_pengantaran">
				<label class="form-check-label" for="defaultCheck1">Pengantaran Jenazah </label> -->

				</td>
			</tr>
			<tr>
				<td class="table-check">
					<input type="checkbox"
						<?= $pemulasaran_jenazah->is_pengawetan_jenazah  == '1' ? 'checked' : 'unchecked' ?>>Pengawetan Jenazah
			</tr>
			<tr>
				<td class="table-check">
					<input type="checkbox" <?= $pemulasaran_jenazah->is_lainnya  == '1' ? 'checked' : 'unchecked' ?>>
					<!-- <input class="form-check-input form-kesediaan" type="checkbox" value="1" name="lainnyaCheck" id="kesediaan_lainnya"> -->
					<label class="form-check-label" for="defaultCheck1">Lainnya<span
							class="dotted-underline bold"><?= $pemulasaran_jenazah->keterangan_lainnya ?></label>
			</tr>
		</table>		
		<p></p>		
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Nama Lengkap</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->nama_pasien ?></td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Tempat</td>
				<td width="45%" class="bold"><?= $pemulasaran_jenazah->tempat_lahir_pasien ?></td>
				<td width="15%">Tanggal Lahir</td>
				<td widht="45%" class="bold">
					<?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
					(<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</td>
			</tr>
		</table>
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Agama Pasien</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->agama_pasien ?></td>
			</tr>
		</table>	
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">Alamat</td>
				<td width="85%" class="bold"><?= $pemulasaran_jenazah->alamat_pasien ?></td>
			</tr>
		</table>		
		<table width="100%" class="table-data">
			<tr>
				<td width="15%">No.Telepon/HP</td>
				<td widht="80%" class="bold"><?= $pemulasaran_jenazah->telp_pjwb ?></span></td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<p class="bold">Keterangan (Tidak Bersedia) Dilakukan Tindakan Terhadap Jenazah</p>
			<tr>
				<td width="85%" class="dotted-underline"><span
						class="dotted-underline"><?= $pemulasaran_jenazah->alasan_tidak_bersedia ?></span></td>
			</tr>
		</table>
		<p></p>
		<table width="100%" class="table-no-border">
			<p>Demikian surat pernyataan ini kami dibuat untuk dipergunakan sebagaimana mestinya.
			</p>
		</table>		
		<p></p>
		<table width="100%" class="table-no-borderc center">
			<tr>
				<td width="50%">Pemberi Informasi</td>
				<td width="50%">Pemberi Pernyataan</td>
			</tr>
			<tr>
				<td><br><br><br><br><br></td>
			</tr>
			<tr>
				<td><?= ($pemulasaran_jenazah->petugas_ipj !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->petugas_ipj.'</span> )' : '( ................................... )') ?></span>
				</td>
				<td><?= ($pemulasaran_jenazah->nama_pjwb !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->nama_pjwb.'</span> )' : '( ................................... )') ?></span>
				</td>
			</tr>
			<tr>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
			</tr>
		</table>
	</div>
<!-- </body> -->

<!-- <body onload="cetak()"> -->
	<div class="page page_break">
		<table width="100%">
			<tr>
				<td width="15%" class="center"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>"
						width="80px" height="80px"></td>
				<td width="47%">
					<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
					<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
					<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>
						Email : <?= $hospital->email ?></b>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">SURAT JALAN MOBIL JENAZAH</h1>
		<hr>
		<td></td>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="70%"></td>
				<td width="30%">Tangerang, <span class=""><?php echo @date('d-m-Y'); ?> </td>
			</tr>
		</table>
		<p></p>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="50%">Kepada Keluarga Alm.</td>
				<td width="50"></td>
			</tr>
		</table>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td widht="50%" class="bold"><?= $pemulasaran_jenazah->nama_pjwb ?></td>
				<td width="50"></td>
			</tr>
		</table>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="50%">DiTempat</td>
				<td width="50"></td>
			</tr>
		</table>
		<p></p>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="50%">Dengan hormat</td>
				<td width="50"></td>
			</tr>
		</table>
		<table width="100%" class="table-no-borderc left">
			<tr>
				<td width="50%">Dengan ini kami hantarkan jenazah : </td>
				<td width="50"></td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="100%" colspan="3">Menyerahkan Jenazah atas : </td>
			</tr>
			<p></p>
			<tr>
				<td width="19%">Nama Jenazah</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->nama_pasien ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Umur</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
						(<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Jenis Kelamin</td>
				<td width="1%">:</td>
				<td width="80%" class="bold"><span
						class="dotted-underline bold"><?= ($pemulasaran_jenazah->jenis_kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></span>
				</td>
				</td>
			</tr>
			<tr>
				<td width="19%">No Surat Kematian</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->surat_kematian ?></span></td>
				</td>
			</tr>
			<tr>
				<td width="19%">Alamat Pengantaran</td>
				<td width="1%">:</td>
				<td widht="80%" class="bold"><span
						class="dotted-underline bold"><?= $pemulasaran_jenazah->alamat_pasien ?></span></td>
				</td>
			</tr>
		</table>
		<p></p>
		<table width="100%" class="table-no-borderc center">
			<tr>
				<td width="33%">Sopir Ambulance</td>
				<td width="33%">KA. Instalasi Pemulasaran Jenazah</td>
				<td width="33%">Keluarga/Kerabat Alm.</td>
			</tr>
			<tr>
				<td><br><br><br><br><br></td>
			</tr>
			<tr>
				<td><?= ($pemulasaran_jenazah->sopir_ambulance !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->petugas_ipj.'</span> )' : '( ................................... )') ?></span>
				</td>
				<td><span class="dotted-underline">( H. SAMSUHILAL, SKM )</span></td>
				<td><?= ($pemulasaran_jenazah->nama_pjwb !== '' ? '( <span class="dotted-underline">'.$pemulasaran_jenazah->nama_pjwb.'</span> )' : '( ................................... )') ?></span>
				</td>
			</tr>
			<tr>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
			</tr>
		</table>
	</div>
<!-- </body> -->

<body onload="fetchDataTindakan()">
<!-- <body onload="cetak()"> -->
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>		

	function fetchDataTindakan() {
		var id_layanan_pendaftaran = $( "#id_layanan_pendaftaran" ).val();
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pemulasaran_jenazah/api/Pemulasaran_jenazah/fetch_data_jenazah_tindakan") ?>/id/' +
				id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function (data) {
				
				$("input[name='tindakan-pelayanan']:checkbox").removeAttr('checked');
				// $(".form-petugas-ipj-tindakan").val('');

				data.data.forEach((obj, i) => {
					$('input:checkbox[name="tindakan-pelayanan"][value="' + obj.id_layanan + '"]')
						.attr('checked', 'checked');

					if (obj.id_layanan == 1965) {
						$("#petugas-ipj-tindakan-kendaraan-jenazah").html(obj.petugas_ipj);
					} else if (obj.id_layanan == 1713) {
						$("#petugas-ipj-tindakan-pemulasaran-jenazah-lakilaki").html(obj.petugas_ipj);
					} else if (obj.id_layanan == 1714) {
						$("#petugas-ipj-tindakan-pemulasaran-jenazah-perempuan").html(obj.petugas_ipj);
					} else if (obj.id_layanan == 1717) {
						$("#petugas-ipj-tindakan-pemulasaran-otopsi").html(obj.petugas_ipj);
					} else if (obj.id_layanan == 1718) {
						$("#petugas-ipj-tindakan-pemulasaran-lemari-pendingin").html(obj.petugas_ipj);
					} else if (obj.id_layanan == 1966) {
						$("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-jumbo").html(obj
							.petugas_ipj);
					} else if (obj.id_layanan == 1967) {
						$("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-standar").html(obj
							.petugas_ipj);
					} else if (obj.id_layanan == 1968) {
						$("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-superior").html(obj
							.petugas_ipj);
					}
				});

				setTimeout(function () {
					window.close()
				}, 300);
				window.print();
			}
		});
	}

	// function cetak() {
	// 	setTimeout(function () {
	// 		window.close()
	// 	}, 300);
	// 	window.print();
	// }
</script>
</html>
