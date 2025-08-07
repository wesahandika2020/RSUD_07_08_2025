<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hasil Laporan Hemodialisa</title>
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

		.bold { font-weight: bold; }

		table { border-collapse: collapse;}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td { border: none; padding: 2px 3px; }

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
			setTimeout(function() { window.close() }, 300);
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
								<td width="69%" class="bold"><?= $pasien->id_pasien ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->nama ?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->tanggal_lahir !== '' ? datefmysql($pasien->tanggal_lahir) : '-') ?> (<?= createUmur($pasien->tanggal_lahir) ?> Tahun)</td>
							</tr>
							<tr>
								<td>Kelamin</td>
								<td>:</td>
								<td class="bold"><?= ($pasien->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
							</tr>
							<tr>
								<td>Agama</td>
								<td>:</td>
								<td class="bold"><?= $pasien->agama ?></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<br>
		<h1 class="bold center">LAPORAN HEMODIALISA</h1>
		<hr>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="15%">Hari/Tanggal</td>
				<td width="1%">:</td>
				<td width="30%" class="bold"><span class="dotted-underline bold"><?= ($laporan_hd->waktu !== null ? datetimefmysql($laporan_hd->waktu, true) : '') ?></span></td>
				<td></td>
				<td width="15%">Waktu HD</td>
				<td width="1%">:</td>
				<td width="39%" class="bold">
					<span>Pukul : </span><span class="dotted-underline bold"><?= $laporan_hd->waktu_awal ?></span><span>s/d Pukul</span><span class="dotted-underline bold"><?= $laporan_hd->waktu_akhir ?></span>WIB
				</td>
			</tr>
			<tr>
				<td>Ruang Rawat</td>
				<td>:</td>
				<td class="bold"><span class="dotted-underline bold"><?= $laporan_hd->ranap_asal_hd ?></span></td>
				<td></td>
				<td>Status</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= ($layanan->cara_bayar !== 'Tunai' ? $layanan->cara_bayar . ' ('.$layanan->penjamin.')' : $layanan->cara_bayar) ?></span></td>
			</tr>
			<tr>
				<td colspan="7">Dilakukan program 
					<?php $program = json_decode($laporan_hd->program) ?>
					(<input type="checkbox" <?= $program->hd !== '' ? 'checked' : '' ?>>HD / 
					<input type="checkbox" <?= $program->sleed !== '' ? 'checked' : '' ?>>SLEED / 
					<input type="checkbox" <?= $program->hfr !== '' ? 'checked' : '' ?>>HFR / 
					<input type="checkbox" <?= $program->hdf !== '' ? 'checked' : '' ?>>HDF / 
					<input type="checkbox" <?= $program->lain !== '' ? 'checked' : '' ?>>Lain 
					<?= ($program->ket_lain !== '' ? '<span class="dotted-underline bold">' . $program->ket_lain . '</span>' : '<span class="dotted-underline bold">-</span>') ?>)* 
					dengan :<?= ($program->dengan !== '' ? '<span class="dotted-underline bold">' . $program->dengan . '</span>' : '<span class="dotted-underline bold">-</span>') ?>
				</td>
			</tr>
		</table>
		<table width="100%" class="table-no-border">
			<tr>
				<td width="15%">Time Dialisis</td>
				<td width="1%">:</td>
				<td width="15%" class="bold"><span class="dotted-underline bold"><?= $laporan_hd->waktu_dialisis ?></span>Jam</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>UF Goal</td>
				<td>:</td>
				<td class="bold"><span class="dotted-underline bold"><?= $laporan_hd->uf_goal ?></span>ml</td>
			</tr>
			<tr>
				<td><i>Quick Blood</i></td>
				<td>:</td>
				<td class="bold"><span class="dotted-underline bold"><?= $laporan_hd->quick_blood ?></span>ml</td>
			</tr>
			<tr>
				<td><i>Quick Dialysat</i></td>
				<td>:</td>
				<td class="bold"><span class="dotted-underline bold"><?= $laporan_hd->quick_dialysat ?></span>ml</td>
			</tr>
			<tr>
				<td><i>Profilling</i></td>
				<td></td>
				<td class="bold">UF : <span class="dotted-underline bold"><?= $laporan_hd->profilling_uf ?></span></td>
				<td></td>
				<td class="bold" width="5%">Lainnya</td>
				<td width="1%">:</td>
				<td class="bold"><span class="dotted-underline bold"><?= $laporan_hd->profilling_lain ?></span></td>
			</tr>
			<tr>
				<td><i></i></td>
				<td></td>
				<td class="bold">Na : <span class="dotted-underline bold"><?= $laporan_hd->profilling_na ?></span></td>
			</tr>
			<tr>
				<td>Akses Sirkulasi</td>
				<td>:</td>
				<td colspan="5"><i class="bold">
					<?php $akses_sirkulasi = json_decode($laporan_hd->akses_sirkulasi) ?>
					<input type="checkbox" <?= $akses_sirkulasi->cimino !== '' ? 'checked' : '' ?>>Cimino / 
					<input type="checkbox" <?= $akses_sirkulasi->femoral !== '' ? 'checked' : '' ?>>Femoral / 
					<input type="checkbox" <?= $akses_sirkulasi->catheter !== '' ? 'checked' : '' ?>>Double Lumen Catheter :
					<?= ($akses_sirkulasi->ket_catheter !== '' ? '<span class="dotted-underline bold">' . $akses_sirkulasi->ket_catheter . '</span>' : '<span class="dotted-underline bold">-</span>') ?> 
				</i></td>
			</tr>
			<tr>
				<td><span style="font-size: 14px;" class="bold">Pre HD</span></td><td></td><td></td>
			</tr>
			<tr>
				<td>Keluhan utama</td>
				<td>:</td>
				<td colspan="4"><span class="dotted-underline"><?= $laporan_hd->keluhan_utama ?></span></td>
			</tr>
			<tr>
				<td>Keadaan Umum</td>
				<td>:</td>
				<td><span class="dotted-underline"><?= $laporan_hd->keadaan_umum ?></span></td>
				<td></td>
				<td>Kesadaran</td>
				<td>:</td>
				<td><span class="dotted-underline"><?= $laporan_hd->kesadaran ?></span></td>
			</tr>
			<tr>
				<td>GCS</td>
				<td>:</td>
				<td colspan="5">
					<span style="display: inline-block;" class="bold">E<span class="solid-underline bold"><?= $laporan_hd->gcs_e ?></span></span>&nbsp;
					<span class="bold">M<span class="solid-underline bold"><?= $laporan_hd->gcs_m ?></span></span>&nbsp;
					<span class="bold">V<span class="solid-underline bold"><?= $laporan_hd->gcs_v ?></span></span>&nbsp;
					<span class="bold">Total<span class="solid-underline bold"><?= $laporan_hd->gcs_total ?></span></span>
				</td> 
			</tr>
		</table>
		<table width="90%" class="table-no-border" style="margin-left: 30px; margin-right: 30px;">
			<tr>
				<td width="45%">
					<span>Tensi : <span class="dotted-underline bold"><?= $laporan_hd->tensi_sistolik ?> / <?= $laporan_hd->tensi_diastolik ?></span> mmHg</span>&nbsp;&nbsp;
					<span>Nadi : <span class="dotted-underline bold"><?= $laporan_hd->nadi ?></span> x/mnt</span>
				</td>
				<td width="55%">
					<span>Suhu : <span class="dotted-underline bold"><?= $laporan_hd->suhu ?></span> &#8451;</span>&nbsp;&nbsp;
					<span>Respirasi : <span class="dotted-underline bold"><?= $laporan_hd->respirasi ?></span> x/mnt</span>&nbsp;&nbsp;
					<input type="checkbox" <?= $laporan_hd->ventilator !== null ? 'checked' : '' ?>>On Ventilator 
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: justify; padding-bottom: 10px; line-height: 25px;">
					<span class="bold">On HD :</span><br>
					<?= ($laporan_hd->on_hd !== '' ? '<span class="dotted-underline">' . $laporan_hd->on_hd . '</span>' : '<span class="dotted-undeline"></span>') ?>
				</td>
			</tr>
		</table>
		<table width="90%" class="table-no-border" style="margin-left: 30px; margin-right: 30px;">
			<tr><td colspan="7"><span style="font-size: 14px;" class="bold">Post HD</span></td></tr>
			<tr><td colspan="7"><span style="font-size: 14px;" class="bold">Hasil Akhir HD</span></td></tr>
			<tr>
				<td colspan="3">
					<span>Time Dialisis  : <span class="dotted-underline bold"><?= $laporan_hd->waktu_dialisis_post_hd ?></span></span> Jam
				</td>
				<td></td>
				<td colspan="3">
					<span>UF Goal : <span class="dotted-underline bold"><?= $laporan_hd->uf_goal_post_hd ?></span></span>&nbsp;ml
				</td>
			</tr>
			<tr>
				<td width="25%">Transfusi</td>
				<td width="1%">:</td>
				<td width="30%"><span class="dotted-underline bold"><?= $laporan_hd->transfusi ?></span>ml</td>
				<td></td>
				<td width="15%">Lain - lain</td>
				<td width="1%">:</td>
				<td width="39%"><span class="dotted-underline bold"><?= $laporan_hd->uf_goal_lain ?></span>ml</td>
			</tr>
			<tr>
				<td>Terapi Cairan</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->terapi_cairan ?></span>ml</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Asupan Cairan (Oral / NGT)</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->asupan_cairan ?></span>ml</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Lain - lain</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->hasil_lain ?></span>ml</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="right">Jumlah</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->jumlah ?></span>ml</td>
				<td></td>
				<td>Jumlah</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->uf_goal_jumlah ?></span>ml</td>
			</tr>
			<tr>
				<td class="right">Balance</td>
				<td>:</td>
				<td><span class="dotted-underline bold"><?= $laporan_hd->balance ?></span>ml</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="7">Keterangan Lain : <span class="dotted-underline bold"><?= $laporan_hd->keterangan_lain ?></span></td>
			</tr>
			<tr>
				<td colspan="7">Darah untuk pemeriksaan laboratorium <span class="bold"><input type="checkbox" <?= $laporan_hd->ket_darah_lab === '1' ? 'checked' : '' ?>>Diambil / <input type="checkbox" <?= $laporan_hd->ket_darah_lab === '0' ? 'checked' : '' ?>>Tidak Diambil*</span></td>
			</tr>
		</table>
		<table width="100%" class="table-no-borderc center">
			<tr>
				<td width="33%">Dokter Jaga</td>
				<td width="33%">Perawat HD</td>
				<td width="33%">Perawat Ruangan</td>
			</tr>
			<tr>
				<td>
					<?php if($laporan_hd->ttd_dokter): ?>
					<img src="<?= resource_url().'images/ttd_dokter/'.$laporan_hd->ttd_dokter ?>" alt="ttd-dokter" width="300">
					<?php else: ?>
					<br><br><br><br><br>
					<?php endif ?>
				</td>
				<td>
					<?php if($laporan_hd->ttd_perawat_hd): ?>
					<img src="<?= resource_url().'images/ttd_dokter/'.$laporan_hd->ttd_perawat_hd ?>" alt="ttd-dokter" width="300">
					<?php else: ?>
					<br><br><br><br><br>
					<?php endif ?>
				</td>
				<td>
					<?php if($laporan_hd->ttd_perawat_ruangan): ?>
					<img src="<?= resource_url().'images/ttd_dokter/'.$laporan_hd->ttd_perawat_ruangan ?>" alt="ttd-dokter" width="300">
					<?php else: ?>
					<br><br><br><br><br>
					<?php endif ?>
				</td>
			</tr>
			<tr>
				<td><?= ($laporan_hd->dokter_jaga !== '' ? '( <span class="dotted-underline">'.$laporan_hd->dokter_jaga.'</span> )' : '( ................................... )') ?></span></td>
				<td><?= ($laporan_hd->perawat_hd !== '' ? '( <span class="dotted-underline">'.$laporan_hd->perawat_hd.'</span> )' : '( ................................... )') ?></span></td>
				<td><?= ($laporan_hd->perawat_ruangan !== '' ? '( <span class="dotted-underline">'.$laporan_hd->perawat_ruangan.'</span> )' : '( ................................... )') ?></span></td>
			</tr>
			<tr>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
				<td>Tanda tangan dan nama jelas</td>
			</tr>
		</table>
		<table width="100%" class="table-no-border" style="margin-top: 100px;">
			<tr><td class="bold">PETUNJUK PENGISIAN LAPORAN TINDAKAN HEMODIALISA :</td></tr>
			<tr>
				<td>1. Dibuat sebagai laporan untuk ruangan lain ( EMG, Rawat Inap, atau intensive / high care )</td>
			</tr>
			<tr>
				<td>2. Dibuat sebagai gambaran tindakan HD yang dilakukan</td>
			</tr>
			<tr>
				<td>3. Hasil akhir HD merupakan hasil HD uang dilaksanakan terkait kemungkinan perubahan antara program HD dengan hasil</td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;akhir karena kendala intra dialisis</td>
			</tr>
		</table>
	</div>
</body>
</html>

