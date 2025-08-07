<title><?= $title ?></title>
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />

<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
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
	.bold { font-weight: bold; }

	
</style>

<body onload="cetak()">
	<div class="page">
		<table width="100%">
			<tr class="v-center">
				<td rowspan="4"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td width="47%"><?= $hospital->nama ?></td> 
				<td class="center">
					<h1>
						PROTOKOL TERAPI	
					</h1>
				</td>
			</tr>
			<tr>
				<td><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></td> 
				<td class="center" style="font-size:12px;">TINDAKAN/TERAPI UNIT REHABILITASI MEDIK</td> 
			</tr>
			<tr>
				<td>Telp. <?= $hospital->telp ?>,  Fax. <?= $hospital->fax ?></td>
				<td class="center" style="font-size:10px;text-transform:uppercase;"><?= $hospital->nama ?></td> 
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="center" style="font-size:10px;">(Wajib Dibawa Saat Kontrol/Terapi)</td> 
			</tr>
		</table>
		<br>
		<div style="width:100%; display:inline-block;">
			<div style="width:50%; float:left;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td>Nama Pasien</td>
						<td>:</td>
						<td><?= $pasien->nama ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?= ($pasien->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
					</tr>
					<tr>
						<td>Usia</td>
						<td>:</td>
						<td><?= createUmur($pasien->tanggal_lahir) ?> Tahun</td>
					</tr>
					<tr>
						<td>Diagnosis</td>
						<td>:</td>
						<td><?= $pasien->item ?></td>
					</tr>
				</table>
			</div>
			<div style="width:50%; float:right;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">No. Rekam Medis</td>
						<td width="2%">:</td>
						<td width="60%"><?= $pasien->id ?></td>
					</tr>
					<tr>
						<td>Program tindakan/terapi</td>
						<td>:</td>
						<td><?= $pasien->total ?></td>
					</tr>
					<tr>
						<td>Dokter yang memeriksa</td>
						<td>:</td>
						<td><?= $dokter->operator ?></td>
					</tr>
					
				</table>
			</div>
		</div>
		<br><br>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr>
					<th width="1%" class="center">No</th>
					<th width="2%" class="center">Tanggal</th>
					<th width="20%" class="left">Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
                    $go=1;
            		
            		foreach($riwayat as $dp) { ?>   
                        <tr> 
                          <td style="height:35px;" class="center"><?php echo $go; ?></td>
                          <td style="height:35px;" class="center"><?php echo datetimefmysql($dp->tanggal); ?></td>
                          <td style="height:35px;"><?php echo $dp->item; ?></td>
                        </tr>
	            <?php
	            	
	            	$go++;
	              
	             		}
	                      
	            ?>  
					
				
			</tbody>
		</table>
		<br><br><br>
		<table width="100%">
			<tr>
				<td colspan="2" width="50%" class="center">Petugas</td>
				<td colspan="2" class="center">Pasien</td>

			</tr>
			<tr>
				<td colspan="2" width="50%" height="35px"class="center"></td>
				<td colspan="2" class="left"></td>

			</tr>
			<tr>
				<td colspan="2" width="50%" height="35px"class="center"></td>
				<td colspan="2" class="left"></td>

			</tr>
			<tr>
				<td colspan="2" width="50%" class="center">(<?= $this->session->userdata('nama');?>)</td>
				<td colspan="2" class="center">(<?= $pasien->nama;?>)</td>
			</tr>
		</table>
	</div>
</body>
