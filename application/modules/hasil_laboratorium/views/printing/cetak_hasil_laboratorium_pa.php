
<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
<script>

	let id_lab = '';

	<?php if(isset($laboratorium->detail->id_laboratorium)){ ?>

		id_lab = '<?php $laboratorium->detail->id_laboratorium ?>';

	<?php } ?>

	function cetak() {
		setTimeout(function() { window.close() }, 300);
		window.print();
		tambahRekapCetak();
	}

	function tambahRekapCetak() {

		if(id_lab !== ''){
		
			$.ajax({
				type: 'POST',
				url: '<?= base_url('hasil_laboratorium/api/hasil_laboratorium/tambah_rekap_cetak') ?>',
				data: 'id_lab=' + id_lab,
				cache: false,
				dataType: 'JSON',
				success: function(data) {
					if (!data.status) {
						alert('Gagal menambah jumlah cetakan')
					}
				},
				error: function(e) {
					alert('Gagal menambah jumlah cetakan')
				}
			})

		}
	}

</script>
<style>
	* {
		line-height: 12pt;
		font-size: 11pt;
		/* font-family: 'Calibri'; */
	}

	.tabel-kosong > tbody > tr > td{
    	padding: 10px 0px;
    }

	.list-data {
		border-left: 1px solid #000;
		border-top: 1px solid #000;
		border-spacing: 0;
	}

	.list-data th, .list-data td {
		border-right: 1px solid #000;
		border-bottom: 1px solid #000;
		height: 20px;
	}
	
	.list-data tr {
		vertical-align: text-top;
	}

	.td-top > tbody > tr > td {
		vertical-align: top;
	}

	.bold {
		font-weight: bold;
	}

	.th-row-green-dark {
		background-color: #3C9A30;
		color: white;
		-webkit-print-color-adjust: exact; 
	}

	.th-row-green-soft {
		background-color: #61B966;
		-webkit-print-color-adjust: exact; 
	}

	.italic {
		font-style: italic;
	}

	.bold {
		font-weight: bold;
	}
</style>
<title>.: <?= $title ?> :.</title>

<body onload="cetak()">
	<!-- Content -->
	<div class="page page_break">
		<table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #000;">
			<tr>
				<td rowspan="3" style="width:70px"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
				<td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b></td>
				<td rowspan="3" style="width:70px">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;"><?= strtoupper($hospital->alamat) ?></b></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b></td>
			</tr>
		</table>
		<br>
		<table width="100%" class="td-top">
				<tr>
					<td class="bold" style="text-align:center">LABORATORIUM PATOLOGI ANATOMI</td>
				</tr>
			</table>
			<br>
		<table width="100%" class="td-top">
			<tr>
				<td width="20%">Nama Pasien</td>
				<td width="1%">:</td>
				<td width="29%"><?= $pendaftaran['pasien']->nama ?></td>
				<td></td>
				<td width="20%">No. Lab PA</td>
				<td width="1%">:</td>
				<td width="29%"><?= ($laboratorium->detail !== null)?$laboratorium->detail->no_lab_pa:'' ?></td>
			</tr>
			<tr>
				<td width="20%">Alamat</td>
				<td width="1%">:</td>
				<td width="29%"><?= $pendaftaran['pasien']->alamat ?></td>
				<td></td>
				<td width="20%">No. Reg / No. RM</td>
				<td width="1%">:</td>
				<td width="29%"><?= $pendaftaran['pasien']->no_register ?> / <?= $pendaftaran['pasien']->id_pasien ?></td>
			</tr>
			<tr>
				<?php $tanggal_lahir = $pendaftaran['pasien']->tanggal_lahir ?>
				<td width="20%">Tgl. Lahir / Umur</td>
				<td width="1%">:</td>
				<?php 

					function cekUmurPasien($tanggal_lahir)
					    {
					    
					        $tgl1 = date_create($tanggal_lahir);
					        $tgl2 = date_create(date('Y-m-d'));
					        $sql = date_diff($tgl2, $tgl1);
					        $hasil = $sql->format('%a');
					        $hasil_sql = floor($hasil / 365);
					        return $hasil_sql;

					    } ?>

				<td width="29%"><?= ($tanggal_lahir !== null)?( datefmysql($tanggal_lahir).' / '.cekUmurPasien($tanggal_lahir).' Th'):'' ?>
				</td>
				<td></td>
				<?php 

				function ubahFormatTanggal($tgl)
				{
				    if ($tgl == '' || $tgl == null) {
				        return "-";
				    } else {
				        $tgl = explode("-", $tgl);
				        $ambil_waktu = explode(":", $tgl[2]);
				        $jam = explode(" ", $ambil_waktu[0]);
				        $new = $jam[0] . "/" . $tgl[1] . "/" . $tgl[0] . " " . $jam[1] . ":" . $ambil_waktu[1] ;
				        return $new;
				    }
				}

				?>
				<td width="20%">Tanggal Terima</td>
				<td width="1%">:</td>
				<td width="29%"><?= ($laboratorium->waktu_konfirm !== null)?ubahFormatTanggal($laboratorium->waktu_konfirm):"" ?></td>
			</tr>
			<tr>
				<td width="20%">Jenis Kelamin</td>
				<td width="1%">:</td>
				<td width="29%"><?= (($pendaftaran['pasien']->kelamin === 'L')?'Laki - Laki':(($pendaftaran['pasien']->kelamin === 'P')?'Perempuan':'')) ?></td>
				<td></td>
				<td width="20%">Tanggal Jawab</td>
				<td width="1%">:</td>
				<td width="29%"><?= ($laboratorium->waktu_hasil !== null)?ubahFormatTanggal($laboratorium->waktu_hasil):"" ?></td>
			</tr>
			<tr>
				<td width="20%">Dokter Pengirim</td>
				<td width="1%">:</td>
				<td width="29%"><?= $laboratorium->dokter ?></td>
				<td></td>
				<td>Tanggal Print</td>
				<td>:</td>
				<td width="29%"><?= Date('d/m/Y h:i', $_SERVER['REQUEST_TIME']) ?></td>
			</tr>
			<tr>
				<td width="20%">Unit</td>
				<td width="1%">:</td>
				<td width="29%"><?= ($pendaftaran['layanan']->layanan !== null)?'POLI '.$pendaftaran['layanan']->layanan:$pendaftaran['layanan']->bangsal ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<?php
		if ($laboratorium->detail !== null) { ?>
			<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil">
				<tr>
					<td class="bold">Diagnosa Klinik :</td>
				</tr>
					<tr><td>&nbsp;</td></tr>
				<tr>
						<td><?= $laboratorium->detail->diagnosa_klinik ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				
				<?php
				if ($laboratorium->detail->jenis_pemeriksaan === 'PS') { ?>

					<tr>
						<td class="bold">Kondisi :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->kondisi !== null)?$laboratorium->detail->kondisi:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="bold">Rincian :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->rincian !== null)?$laboratorium->detail->rincian:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
				<?php
				} else if ($laboratorium->detail->jenis_pemeriksaan === 'HP') { ?>
					<tr>
						<td class="bold">Makroskopik :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->makroskopik !== null)?$laboratorium->detail->makroskopik:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="bold">Mikroskopik</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->mikroskopik !== null)?$laboratorium->detail->mikroskopik:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
				<?php
				} else if ($laboratorium->detail->jenis_pemeriksaan === 'ST') { ?>
					<tr>
						<td class="bold">Makroskopik :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->anamnesa !== null)?$laboratorium->detail->anamnesa:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="bold">Mikroskopik</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->mikroskopik !== null)?$laboratorium->detail->mikroskopik:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
				<?php
				} else { ?>
					<tr>
						<td class="bold">Anamnesa :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->anamnesa !== null)?$laboratorium->detail->anamnesa:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td class="bold">Mikroskopik :</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td><?= ($laboratorium->detail->mikroskopik !== null)?$laboratorium->detail->mikroskopik:"-" ?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
				<?php
				} ?>
				<tr>
					<td class="bold">Kesimpulan :</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><?= $laboratorium->detail->kesimpulan ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="bold">Anjuran</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><?= $laboratorium->detail->anjuran ?></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
			</table><?php
		}else{ ?>
			<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil tabel-kosong">
				<tr>
					<td width="20%">Diagnosa Klinik</td>
					<td width="1%">:</td>
					<td rowspan="4">
						<div width="29%"></div>
					</td>
				</tr>
				
				<tr>
					<td>Makroskopik</td>
					<td>:</td>
				</tr>
				
				<tr>
					<td>Mikroskopik</td>
					<td>:</td>
				</tr>
				<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
				<tr>
					<td>Kesimpulan</td>
					<td>:</td>
					<td></td>
				</tr>
				
				<tr>
					<td>Anjuran</td>
					<td>:</td>
					<td></td>
				</tr>
			</table><?php
		} 
		?>
		<p><span style="font-weight:bold;">Catatan</span><br/><?= $laboratorium->catatan ?></p>
		<table width="100%">
			<tr><td></td><td></td></tr>
			<tr><td colspan="2" align="right"></td></tr>
			<tr>
				<td width="70%">
					<p align="left">
						Tangerang, <?= date('d/m/Y')?><br/>
						Dokter yang memeriksa : 
						<br><br><br><br><br><br><br>
						<b>(<?= $laboratorium->dokter_pjwb ?>)</b>
						<br><b>(SIP. <?= $laboratorium->nomer_sip ?>)</b>
					</p>
				</td>
				<td width="30%">
					<p align="left">
						Pemeriksa : <br/><br/><br/><br/><br/><br/><br/>
						<b>( <?= $laboratorium->lab_analis ?> )</b>
					</p>
				</td>
				<?php for ($i = 1; $i < 10; $i++) : ?>
				<tr><td colspan="2"></td><td colspan="2"></td></tr>
				<?php endfor; ?>
				<tr>
					<td colspan="5" width="50%" class="left"><?= 'Cetakan ke: <b style="font-weight:bold;">'.($cetakan_lab->cetakan + 1).'</b> ('.$waktu_cetak.')' ?></td>
				</tr>
			</tr>
		</table>
		<br><br>
	</div>
</body>
