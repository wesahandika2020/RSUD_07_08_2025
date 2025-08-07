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
		<div class="center bold">BUKTI PENERIMAAN GUDANG GIZI</div>
		<br>
		<div style="width:100%; display:inline-block;">
			<div style="width:50%; float:left;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">No. Penerimaan</td>
						<td width="2%">:</td>
						<td width="60%"><?= $row->no_penerimaan ?></td>
					</tr>
					<tr>
						<td>Tanggal Penerimaan</td>
						<td>:</td>
						<td><?= datetimefmysql($row->tanggal, true) ?></td>
					</tr>
					<tr>
						<td>Nama PBF/Supplier</td>
						<td>:</td>
						<td><?= $row->supplier ?></td>
					</tr>
					<tr>
						<td>No. Faktur/No.Bukti</td>
						<td>:</td>
						<td><?= $row->no_faktur ?></td>
					</tr>
				</table>
			</div>
			<div style="width:50%; float:right;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">Tanggal Jatuh Tempo</td>
						<td width="2%">:</td>
						<td width="60%"><?= datefmysql($row->tanggal_jatuh_tempo) ?></td>
					</tr>
					<tr>
						<td width="33%">Jatuh Tempo</td>
						<td width="2%">:</td>
						<td width="60%"><?= dayBetweenDates(date('Y-m-d'), $row->tanggal_jatuh_tempo) ?> Hari</td>
					</tr>
					<tr>
						<td>Kepemilikan</td>
						<td>:</td>
						<td><?= $row->kepemilikan ?></td>
					</tr>
					<tr>
						<td>Tanggal Cetak</td>
						<td>:</td>
						<td><?= date('d/m/Y') ?></td>
					</tr>
				</table>
			</div>
		</div>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr>
					<th width="3%" class="bold center">No.</th>
					<th width="30%" class="bold left">Nama Barang</th>
					<th width="10%" class="bold center">Expired</th>
					<th width="5%" class="bold center">Qty</th>
					<th width="5%" class="bold center">Satuan</th>
					<th width="15%" class="bold right">Harga</th>
					<th width="7%" class="bold center">Disc(%)</th>
					<th width="15%" class="bold right">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0; $disc_rp = 0; ?>
				<?php 
					foreach ($list_data as $i => $data) : 
					if ($data->diskon_rupiah === '0') :
						$diskon = $data->diskon_persen;
						$diskon_rupiah = $diskon * $data->diskon_rupiah;
						$subtotal = $data->subtotal - (($data->diskon_persen / 100) * $data->subtotal);
					else :
						$diskon = ($data->diskon_rupiah / $data->subtotal) * 100;
						$diskon_rupiah = $data->diskon_rupiah;
						$subtotal = $data->subtotal - $data->diskon_rupiah;
					endif;
				?>
					<tr>
						<td class="center"><?= ++$i ?></td>
						<td><?= $data->nama_barang . ($data->golongan_darah !== NULL ? ' Gol. Darah ' . $data->golongan_darah : '') . ($data->rhesus !== NULL ? ' Rhesus (' . $data->rhesus . ')' : '') ?></td>
						<td class="center"><?= datefmysql($data->expired) ?></td>
						<td class="center"><?= $data->jumlah ?></td>
						<td class="center"><?= $data->kemasan ?></td>
						<td class="right"><?= formatcurrency($data->harga) ?></td>
						<td class="center"><?= $diskon ?></td>
						<td class="right"><?= formatcurrency($subtotal) ?></td>
					</tr>
				<?php $total = $total + $subtotal; $disc_rp = $disc_rp + $diskon_rupiah; ?>
				<?php endforeach; ?>
				<?php $ppn = ($row->ppn / 100) * ($total) ?>
			</tbody>
		</table>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr><th></th></tr>
			</thead>
		</table>
		<br>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr valign="top">
				<td width="70%"></td>
				<td width="30%" class="right">
					<table width="100%" cellspacing="0" cellpadding="0">
						<tr><td class="bold">Total</td><td class="right"><?= formatcurrency($total) ?></td></tr>
						<tr><td class="bold">Discount</td><td class="right"><?= formatcurrency($row->diskon_rupiah) ?></td></tr>
						<tr><td class="bold">PPN</td><td class="right"><?= formatcurrency($ppn) ?></td></tr>
						<tr><td class="bold">Grand Total</td><td class="right"><?= formatcurrency($ppn + ($total - $row->diskon_rupiah)) ?></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<br><br>
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr valign="top">
				<td width="50%">
					<br>Mengetahui<br/><br/><br/><br><br><br>...............................................<br>
				</td>
				<td width="50%" class="right">
					<?= strtoupper($hospital->kabupaten) ?>, <?= indo_tgl(date('Y-m-d')) ?><br>
					Penerima<br/><br/><br/><br><br><br>...............................................<br>
				</td>
			</tr>
		</table>
	</div>
</body>
