<title><?= $title ?></title>
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />

<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script>
	function cetak() {
		setTimeout(function() { window.close() }, 300)
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
        font: 9pt verdana;
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
    @page:first {
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
	h1 { font-size: 20px; margin-bottom: 0; }
	h2 { font-size: 18px; margin-bottom: 0; }
	h3 { font-size: 16px; margin-bottom: 0; }
	.tabel-laporan {empty-cells: show; border-radius:5px; border-spacing:0;margin-top:5px; clear: both; border-collapse: collapse; background: #fff; color: #000}
	.tabel-laporan tr th{
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	.tabel-laporan .number{text-align: center;}
	.tabel-laporan th rowspan, td rowspan{vertical-align: middle;}
	.subtotal{
		border-top:1px solid #000;
		border-bottom:1px solid #000;
	}
	.topborder{
		border-top:1px solid #000;
	}
	.bottomborder{
		border-bottom:1px solid #000;
	}
	.total{
		border-top:1px solid #000;
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
	.wrapper {
		white-space: nowrap;
	}
</style>

<body onload="cetak()">
	<div class="page">
		<table width="100%">
			<tr class="v-center">
				<td rowspan="4" width="90px"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td width="50%"><?= $hospital->nama ?></td> 
				<td class="right">&nbsp;</td>
			</tr>
			<tr>
				<td><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></td> 
				<td class="right"></td> 
			</tr>
			<tr>
				<td>Telp. <?= $hospital->telp ?>,  Fax. <?= $hospital->fax ?></td> 
			</tr>
		</table>
		<hr style="border: 1px solid black;">
		<?php foreach ($list_data as $row) ?>
		<div class="center bold" style="font-size:16px">BUKTI DISTRIBUSI BARANG UNIT</div>
		<br>
		<div style="width:100%; display:inline-block;">
			<div style="width:60%; float:left;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">No. Distribusi</td>
						<td width="2%">:</td>
						<td width="60%"><?= $row->kode_dikirim ?></td>
					</tr>
					<tr>
						<td>Tanggal Dikirim</td>
						<td>:</td>
						<td><?= datefmysql($row->tanggal_dikirim) ?></td>
					</tr>
					<tr>
						<td>Dari Unit</td>
						<td>:</td>
						<td><?= $row->unit_tujuan ?></td>
					</tr>
				</table>
			</div>
			<div style="width:40%; float:right;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">Yth,</td>
						<td width="2%"></td>
						<td width="60%"></td>
					</tr>
					<tr>
						<td colspan="3">Kepala Unit <?= $row->unit_asal ?></td>
					</tr>
					<tr>
						<td colspan="3">di <?= $hospital->nama ?></td>
					</tr>
				</table>
			</div>
		</div>
		<br><br>
		<table><tr><td colspan="4">Berikut daftar barang-barang yang didistribusikan kepada unit:</td></tr></table>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr>
					<th width="3%" class="bold center">No.</th>
					<th width="50%" class="bold left">Nama Barang</th>
					<th width="10%" class="bold center">Satuan</th>
					<th width="10%" class="bold center">HPP</th>
					<th width="10%" class="bold center">Qty</th>
					<th width="10%" class="bold center">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0; foreach ($list_data as $i => $data) : ?>
				<tr>
					<td class="center"><?= ++$i ?></td>
					<td><?= $data->nama_barang ?></td>
					<td class="center"><?= $data->kemasan ?></td>
					<td class="center"><?= formatcurrency($data->hpp * $data->isi * $data->isi_satuan, 'IDR') ?></td>
					<td class="center"><?= $data->jumlah ?></td>
					<td class="right"><?= formatcurrency($data->hpp*$data->isi*$data->isi_satuan * $data->jumlah, 'IDR') ?></td>
				</tr>
				<?php $total += $data->hpp * $data->isi * $data->isi_satuan * $data->jumlah ?>
				<?php endforeach; ?>
				<tr>
					<th colspan="5" class="center">TOTAL</th>
 					<th class="right"><?= formatcurrency($total, 'IDR') ?></th>
				</tr>
			</tbody>
		</table>
		<br><br>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr valign="top">
				<td width="50%" class="center">
					<br>Yang Menerima<br/><br/><br/><br><br><br>...............................................<br>
				</td>
				<td width="50%" class="center">
					<?= strtoupper($hospital->kabupaten) ?>, <?= indo_tgl(date('Y-m-d')) ?><br>
					Yang Menyerahkan<br/><br/><br/><br><br><br>...............................................<br>
				</td>
			</tr>
		</table>
	</div>
</body>