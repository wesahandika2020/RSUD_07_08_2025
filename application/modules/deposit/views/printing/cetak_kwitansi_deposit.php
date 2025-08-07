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

<style>
	body {
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
	}

	* {
		font: 10pt verdana;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}

	.page {
		width: 21cm;
		min-height: 19.8cm;
		padding-top: 0.5cm;
		padding-left: 1cm;
		padding-right: 1cm;
		margin: 1cm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}

	.subpage {
		padding: 1cm;
		border: 5px red solid;
		height: 237mm;
		outline: 2cm #FFEAEA solid;
	}

	@page {
		margin-top: 0.9cm;
		margin-bottom: 0.5cm;
		margin-left: 0;
		margin-right: 0;
	}

	@page: first {
		margin-top: 0;
		margin-bottom: 0.5cm;
		margin-left: 0;
		margin-right: 0;
	}

	@media print {
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}

	h1 {
		font-size: 20px;
		margin-bottom: 0;
	}

	h2 {
		font-size: 18px;
		margin-bottom: 0;
	}

	h3 {
		font-size: 16px;
		margin-bottom: 0;
	}

	.tabel-laporan {
		empty-cells: show;
		border-radius: 5px;
		border-spacing: 0;
		margin-top: 5px;
		clear: both;
		border-collapse: collapse;
		background: #fff;
		color: #000
	}

	.tabel-laporan tr th {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.tabel-laporan .number {
		text-align: center;
	}

	.tabel-laporan th rowspan,
	td rowspan {
		vertical-align: middle;
	}

	.subtotal {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.topborder {
		border-top: 1px solid #000;
	}

	.bottomborder {
		border-bottom: 1px solid #000;
	}

	.total {
		border-top: 1px solid #000;
		vertical-align: middle;
	}

	.left {
		text-align: left;
	}

	.right {
		text-align: right !important;
	}

	.center {
		text-align: center !important;
	}

	.v-center {
		vertical-align: middle !important;
	}

	.bold {
		font-weight: bold;
	}
</style>

<body onload="cetak()">
	<div class="page">
		<table width="100%" style="color: #000;">
			<tr style="vertical-align:middle;text-align:center;">
				<td rowspan="4"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td><b><?= $hospital->nama ?></b></td>
			</tr>
			<tr>
				<td><b><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></b></td>
			</tr>
			<tr>
				<td><b>Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?></b></td>
			</tr>
		</table>

		<br />
		<div style="width:100%;display:inline-block;">
			<div style="width:50%;float:left;">
				<table width="100%" style="color: #000;border-spacing:0;">
					<tr>
						<td width="30%">KWITANSI NO</td>
						<td width="5%">:</td>
						<td width="60%"><?= $deposit->id ?></td>
					</tr>
					<tr>
						<td width="30%">No. RM</td>
						<td width="5%">:</td>
						<td width="60%"><?= $pasien->id ?></td>
					</tr>
					<tr>
						<td width="30%">Nama</td>
						<td width="5%">:</td>
						<td width="60%"><?= $pasien->nama ?></td>
					</tr>

				</table>
			</div>
			<div style="width:50%;float:right">
				<table width="100%" style="color: #000;border-spacing:0;">
					<tr>
						<td width="30%">Alamat</td>
						<td width="5%"></td>
						<td width="60%"><?= $pasien->alamat ?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal</td>
						<td width="5%">:</td>
						<td width="60%"><?= indo_time($deposit->waktu) ?></td>
					</tr>
				</table>
			</div>
		</div>
		<br /><br />
		<table width="100%" style="color: #000;">
			<tr>
				<td width="20%">Sudah diterima dari</td>
				<td></td>
			</tr>
			<tr>
				<td>Jumlah Uang</td>
				<td><i><u># <?= strtoupper(terbilang($nominal)) ?> RUPIAH #</u></i></td>
			</tr>
			<tr>
				<td>Untuk </td>
				<td> <?= $deposit->keterangan ?></td>
			</tr>
		</table>
		<br />



		<p style="float:right;">

		<h1 style="float:right;border-bottom: 1px solid;">Jumlah: Rp. <?= currency($nominal) ?>, -</h1>
		</p>


		<table width="100%">

			<tr>
				<td width="20%" align="left">&nbsp;</td>
				<td width="20%"></td>
				<td width="30%"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="20%" align="left">Pasien/Keluarga Pasien</td>
				<td width="20%" align="right"></td>
				<td width="30%"></td>
				<td width="30%" align="right"><?= $hospital->nama ?></td>
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
				<td colspan="2" align="left">(. . . . . . . . . . . . . . . . . . . )</td>
				<td colspan="2" align="right">( Petugas : <?= $petugas_kasir ?> )</td>
			</tr>
			<tr>
				<td width="20%" align="left"></td>
				<td width="20%"></td>
				<td width="30%">Shift <?= $this->session->userdata('shift') ?></td>
				<td width="30%" align="right"><?= date('d/m/Y H:i:s') ?></td>
			</tr>
		</table>
	</div>
</body>