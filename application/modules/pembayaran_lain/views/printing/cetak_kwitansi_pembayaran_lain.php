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
					<h2><?= $jenis_kwitansi . " " . $unit ?></h2>
				</td>
			</tr>
			<tr>
				<td><b><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></b></td>
				<td align="right">No. kwitansi: <?= $data->no_kwitansi ?></td>
			</tr>
			<tr>
				<td><b>Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?></b></td>
				<td></td>
			</tr>
		</table>
		<br />
		<center><b>KWITANSI</b></center>
		<br />
		<table width="100%" style="color: #000;">
			<tr>
				<td>No. Register / No. RM </td>
				<td><?= $data->no_registrasi ?> / <?= $data->no_rm ?></td>
			</tr>
			<tr>
				<td>Sudah diterima dari </td>
				<td><?= $data->nama ?></td>
			</tr>
			<tr>
				<td witdh="15%">Terbilang</td>
				<td><i><u># <?= strtoupper(terbilang($data->nominal)) ?> RUPIAH #</u></i></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><?= ($data->satuan !== null) ? $data->jumlah . " " . $data->satuan : "-" ?></td>
			</tr>
			<tr>
				<td>Untuk pembayaran</td>
				<td><?= $data->tarif ?></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td><?= $data->keterangan ?></td>
			</tr>
			<tr>
				<td>Metode Pembayaran</td>
				<td><?= $data->metode_bayar ?></td>
			</tr>
		</table>
		<br />
		<p style="float:right;">
		<h1 style="float:right;border-bottom: 1px solid;">Jumlah: Rp. <?= currency($data->serah) ?>, -</h1>
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
					(. . . . . . . . . . . . . . . . . . . )
				</td>
				<td colspan="2" align="right">( Kasir : <?= $petugas_kasir ?> )</td>
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