<title><?= $title ?></title>
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />

<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script>
	function cetak() {
		setTimeout(function() {
			window.close()
		}, 300)
		window.print()
	}
</script>

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
		<table width="100%">
			<tr class="v-center">
				<td rowspan="4"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td width="50%"><?= $hospital->nama ?></td>
				<td class="right">
					<h1>Selisih Billing</h1>
				</td>
			</tr>
			<tr>
				<td><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></td>
				<td class="right">No. kwitansi: <?= $no_kwitansi ?></td>
			</tr>
			<tr>
				<td>Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?></td>
			</tr>
		</table>
		<br>
		<div style="width:100%; display:inline-block;">
			<div style="width:50%; float:left;">
				<table width="100%">
					<tr>
						<td width="33%">No. Reg / No. RM</td>
						<td width="2%">:</td>
						<td width="60%" class="bold" style="font-size:15px;"><?= $list_data->no_register ?> / <?= $list_data->id_pasien ?></td>
					</tr>
					<tr>
						<td>Nama Pasien</td>
						<td>:</td>
						<td><?= $list_data->nama ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?= ($list_data->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
					</tr>
					<tr>
						<td>Umur</td>
						<td>:</td>
						<td><?= createUmur($list_data->tanggal_lahir) ?> Tahun</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?= $list_data->alamat ?></td>
					</tr>
				</table>
			</div>
			<div style="width:50%; float:right;">
				<table width="100%" style="white-space: nowrap;">
					<!-- <tr>
						<td colspan="3">&nbsp;</td>
					</tr> -->
					<tr>
						<td>Tanggal Pembayaran</td>
						<td>:</td>
						<td><?= indo_time($list_data->waktu) ?></td>
					</tr>
				</table>
			</div>
		</div>
		<br><br>
		<div class="center bold">Rincian Biaya Tagihan Pasien</div>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr>
					<th width="3%" class="center">No.</th>
					<th width="16%" class="left">Item</th>
					<th width="8%" class="left">Hak Kelas</th>
					<th width="8%" class="left">Kelas Rawat</th>
					<th width="3%" class="center">Jml. Hari</th>
					<th width="14%" class="right">Harga Selisih(Rp.)</th>
					<th width="14%" class="right">Subtotal(Rp.)</th>
				</tr>
			</thead>
			<tbody>
				<?php $subtotal = 0;
				$diskon = 0;
				foreach ($list_data as $i => $row) :
					$kelasRawat = '';
					if ($row->kelas_rawat == '1') {
						$kelasRawat = 'Kelas I';
					} else if ($row->kelas_rawat == '2') {
						$kelasRawat = 'Kelas II';
					} else if ($row->kelas_rawat == '3') {
						$kelasRawat = 'Kelas III';
					} else {
						$kelasRawat = 'VIP';
					}

					$hakKelas = '';
					if ($row->kelas_bpjs == '1') {
						$hakKelas = 'Kelas I';
					} else if ($row->kelas_bpjs == '2') {
						$hakKelas = 'Kelas II';
					} else if ($row->kelas_bpjs == '3') {
						$hakKelas = 'Kelas III';
					}


				?>
					<tr>
						<td class="center"><?= ++$i ?></td>
						<td>Biaya Tagihan Selisih Kamar</td>
						<td><?= $hakKelas ?></td>
						<td><?= $kelasRawat ?></td>
						<td class="center"><?= $row->jumlah_hari ?></td>
						<td class="right"><?= rupiah($row->nominal / $row->jumlah_hari) ?></td>
						<td class="right"><?= rupiah($row->nominal) ?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<!--?php $subtotal += ($data->harga_jual * $data->qty) ? -->
					<!-- ?php $diskon += ($data->disc_rp * $data->qty) ? -->
				<?php endforeach; ?>
				<!-- <tr>
					<td colspan="5" >&nbsp;</td>
				</tr> -->
				<tr>
					<td colspan="4" class="topborder"></td>
					<td align="right" colspan="2" class="topborder" style="font-weight:bold;">Tagihan (Rp) : </td>
					<td align="right" class="topborder" style="font-weight:bold;"><?= rupiah($row->nominal) ?></td>
				</tr>
				<tr>
					<td colspan="4"></td>
					<td colspan="3" class="bottomborder"></td>
				</tr>
				<tr>
					<td colspan="4"></td>
					<td align="right" colspan="2">Tunai (Rp) : </td>
					<td align="right"><?= rupiah($row->serah) ?></td>
				</tr>
				<tr>
					<td colspan="4"></td>
					<td align="right" colspan="2">Kembalian (Rp) : </td>
					<td align="right"><?= rupiah($row->serah - ceil(($row->nominal))) ?></td>
				</tr>
			</tbody>
		</table>
		<br><br><br>

		<table width="100%">
			<tr>
				<td colspan="2" width="50%" class="left">Kasir</td>
				<td colspan="2" width="50%" class="right">Pembeli</td>
			</tr>
			<?php for ($i = 1; $i < 15; $i++) : ?>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"></td>
				</tr>
			<?php endfor; ?>
			<tr>
				<td colspan="2" width="50%" class="left">( <?= $this->session->userdata('nama') ?> )</td>
				<td colspan="2" width="50%" class="right">( <?= $row->nama ?> )</td>
			</tr>
			<?php for ($i = 1; $i < 10; $i++) : ?>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"></td>
				</tr>
			<?php endfor; ?>
		</table>
	</div>
</body>