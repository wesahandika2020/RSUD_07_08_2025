<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />
<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script type="text/javascript">
	function cetak() {
		setTimeout(function() {
			window.close();
		}, 300);
		window.print();
	}
</script>
<title><?= $title ?></title>

<body onload="cetak()">
	<div class="page">
		<?php
		$unit = "";
		if ($jenis_kwitansi === 'Rawat Jalan') :
			$unit = $pendaftaran['layanan']->jenis_layanan;
		endif;
		?>
		<table width="100%" style="color: #000;">
			<tr valign="center">
				<td rowspan="4"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td><b><?= $hospital->nama ?></b></td>
				<td align="right">
					<h2><?= $jenis_kwitansi == "Piutang Pasien" ? "Pembayaran Pasien" : $jenis_kwitansi . " " . $unit ?></h2>
				</td>
			</tr>
			<tr>
				<td><b><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></b></td>
				<td align="right">No. kwitansi: <?= $history_pembayaran->no_kwitansi ?></td>
			</tr>
			<tr>
				<td><b>Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?></b></td>
				<td></td>
			</tr>
		</table>
		<br />
		<?php if ($pendaftaran['layanan']->cara_bayar === 'Tunai') : ?>
			<center><b>KWITANSI</b></center>
		<?php else : ?>
			<center><b>BUKTI PELAYANAN</b></center>
		<?php endif; ?>

		<br />
		<div style="width:100%;display:inline-block;">
			<div style="width:50%;float:left;">
				<table width="100%" style="color: #000;border-spacing:0;">
					<tr>
						<td width="34%"></td>
						<td width="2%"></td>
						<td width="64%"></td>
					</tr>
					<tr>
						<td width="34%">Nama</td>
						<td width="2%">:</td>
						<td width="64%"><?= $pendaftaran['pasien']->nama ?></td>
					</tr>
					<tr>
						<td width="34%"></td>
						<td width="2%"></td>
						<td width="64%"><?= $pendaftaran['pasien']->alamat ?></td>
					</tr>
					<tr>
						<td width="34%">Penanggung</td>
						<td width="2%">:</td>
						<td width="64%"><?= $pendaftaran['pasien']->nama_pjwb ?></td>
					</tr>
					<tr>
						<td width="34%">Jenis Bayar</td>
						<td width="2%">:</td>
						<td width="64%">
							<?= isset($pendaftaran['layanan']->cara_bayar) ? $pendaftaran['layanan']->cara_bayar : $cara_bayar ?>
							<?php if ($pendaftaran['layanan']->cara_bayar !== 'Tunai') : ?>
								(<?= $pendaftaran['layanan']->penjamin ?>)
							<?php endif; ?>
						</td>
					</tr>
					<?php if ($pendaftaran['layanan']->cara_bayar === 'Tunai') : ?>
						<tr>
							<td width="34%">Metode Bayar</td>
							<td width="2%">:</td>
							<td width="64%">
								<?php if ($pendaftaran['layanan']->cara_bayar === 'Tunai') : ?>
									<?= isset($history_pembayaran->metode_pembayaran) ? $history_pembayaran->metode_pembayaran : '' ?>
								<?php endif; ?>
							</td>
						</tr>
					<?php endif ?>
				</table>
			</div>
			<div style="width:50%;float:right">
				<table width="100%" style="color: #000;">
					<tr>
						<td width="34%">No. Reg. / No. RM</td>
						<td width="2%">:</td>
						<td width="64%"><?= $pendaftaran['pasien']->no_register . " / " . $pendaftaran['pasien']->id_pasien ?></td>
					</tr>
					<tr>
						<td width="34%">Tanggal</td>
						<td width="2%">:</td>
						<td width="64%"><?= $waktu ?></td>
					</tr>
					<tr>
						<td width="34%">Klinik</td>
						<td width="2%">:</td>
						<td width="64%"><?= isset($pendaftaran['layanan']->layanan) ? $pendaftaran['layanan']->layanan : '' ?></td>
					</tr>

				</table>
			</div>
		</div>
		<br /><br />
		<table width="100%" style="color: #000;">
			<tr>
				<td colspan="2">Sudah diterima dari <?= ($pendaftaran['pasien']->nama_pjwb_finansial !== '') ? $pendaftaran['pasien']->nama_pjwb_finansial : titik_titik(20) ?></td>
			</tr>
			<tr>
				<td width="20%">Terbilang</td>
				<td><i><u># <?= strtoupper(terbilang($history_pembayaran->tunai)) ?> RUPIAH #</u></i></td>
			</tr>
			<tr>
				<td>Untuk pembayaran</td>
				<td>Biaya <?= $jenis_kwitansi == "Piutang Pasien" ? "Kunjungan Pemeriksaan Pasien" : $jenis_kwitansi ?></td>
			</tr>
		</table>
		<br />



		<p style="float:right;">

		<h1 style="float:right;border-bottom: 1px solid;">Jumlah: Rp. <?= currency($history_pembayaran->tunai) ?>, -</h1>
		</p>


		<table width="100%">

			<tr>
				<td width="20%" align="left">&nbsp;</td>
				<td width="20%"></td>
				<td width="30%"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="20%" align="left">&nbsp;</td>
				<td width="20%" align="right"></td>
				<td width="30%"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="20%" align="left">&nbsp;</td>
				<td width="20%" align="right"></td>
				<td width="30%"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="20%" align="left"></td>
				<td width="20%" align="right"></td>
				<td width="30%"></td>
				<td width="30%" align="center"></td>
			</tr>
			<tr>
				<td colspan="2" align="left">
					<?php if ($pendaftaran['layanan']->cara_bayar !== 'Tunai') : ?>
						(. . . . . . . . . . . . . . . . . . . )
					<?php endif; ?>

				</td>
				<td colspan="2" align="right">
					<?= $this->session->userdata('account_group') == 'Verifikator Casemix' ? '( Kasir : RSUD KOTA TANGERANG )' : '( Kasir : ', $petugas_kasir, ' )'; ?>
				</td>
			</tr>
			<tr>
				<td width="20%" align="left"></td>
				<td width="20%"></td>
				<td width="30%">Shift <?= $this->session->userdata('shift') ?></td>
				<td width="30%" align="right"><?= $waktu ?></td>
			</tr>
		</table>

	</div>
</body>