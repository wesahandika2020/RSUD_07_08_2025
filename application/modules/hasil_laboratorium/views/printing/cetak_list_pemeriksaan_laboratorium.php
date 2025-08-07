<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/print-struk.css') ?>" />
	<style type="text/css">
		* {
			font-family: sans-serif;
			font-size: 10pt;
		}
		.tabel-hasil { empty-cells: show; border-radius:5px; margin-top:5px; clear: both; border-collapse: collapse; background: #fff; color: #000}
		.tabel-hasil th{text-align: center;}
		.tabel-hasil th{border: 1px solid #000;line-height: 20px;}
		.tabel-hasil .number{text-align: center;}
		.tabel-hasil th rowspan, td rowspan{vertical-align: middle;}
		.table-hasil td {padding-top: 5px;}
		.tabel-hasil td table td { border: none; }
	</style>

	<script type="text/javascript">
	    function cetak() {
	       setTimeout(function(){ window.close();},300);
	       window.print();    
	    }
	</script>
</head>
<body onload="cetak();">
    <div class="page" style="padding-left: 30px;">

		<table width="100%">
			<?php if($tipe === 'konfirm'): ?>
			<tr valign="top">
				<td width="20%">No. Lab</td><td>:</td><td><span style="font-weight:bold;"><?= $laboratorium->kode ?></span></td>
			</tr>
			<?php endif; ?>
			<td width="15%">No. RM</td><td>:</td><td><?= $pendaftaran['pasien']->id_pasien ?></td>
			<tr valign="top">
				<td width="15%">Nama</td><td>:</td><td><?= $pendaftaran['pasien']->nama ?></td>
			</tr>
			<tr valign="top">
				<td width="15%">Dokter Pemesan</td><td> : </td><td><?= $pendaftaran['layanan']->dokter ?></td>
			</tr>
			<?php if($tipe === 'konfirm'): ?>
			<tr valign="top">
				<td width="15%">Analis</td><td> : </td><td><?= $laboratorium->analis_lab ?></td>
			</tr>
			<?php endif; ?>
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
			<tr valign="top">
				<td width="15%">Umur/Kelamin</td><td>:</td><td><?= cekUmurPasien($pendaftaran['pasien']->tanggal_lahir) ?> Th / <?= (($pendaftaran['pasien']->kelamin === 'L')?'Laki - Laki':(($pendaftaran['pasien']->kelamin === 'P')?'Perempuan':'')) ?></td>
			</tr>
			<tr valign="top">
				<td width="15%">No. Telp</td><td>:</td><td><?= $pendaftaran['pasien']->telp ?></td>
			</tr>
			<?php if($tipe === 'konfirm'): ?>
			<tr valign="top">
				<td width="15%">Tanggal, Jam Order</td><td> : </td><td><?= ($laboratorium->waktu_konfirm !== null)?indo_time($laboratorium->waktu_konfirm):"" ?></td><td></td>
			</tr>
			<?php endif; ?>
			<tr valign="top">
				<td width="15%">Diagnosa</td>
				<td>:</td>
				<td>
					<?= !empty($laboratorium->diagnosa) ? (implode('<br>', array_column($laboratorium->diagnosa, 'diagnosa'))) : '-' ?>
				</td>
			</tr>
			
		</table>
		<br>
		<h3 style="font-size:14px;"><b>List Pemeriksaan</b></h3>
		<?php if($tipe === 'konfirm'): ?>
		<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil">

			<?php $i = 1; foreach ($laboratorium->detail as $key => $value): ?>
			<tr>
				<td><?= $i++ ?>. </td><td><?= strtoupper($key) ?></td><td></td><td></td><td></td><td></td>
			</tr>
				<?php foreach ($value as $key2 => $val2): ?>
				<tr>
					<td></td><td style="padding-left:20px;line-height:20px;"><?= $val2->layanan ?></td>
				</tr>
				<?php if($val2->item !== null): ?>
					<?php foreach ($val2->item as $key3 => $val3): ?>
						<tr>
							<td></td><td style="padding-left:40px;"><?= $key3 ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif;?>

				<?php endforeach; ?>
			<?php endforeach; ?>
		</table>
		<?php else: ?>
		<table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil">

			<?php $i = 1; foreach ($laboratorium->detail as $key => $value): ?>
			<tr>
				<td width="10%"><?= $i++ ?> . </td><td><?= $value ?></td><td></td><td></td><td></td><td></td>
			</tr>
			<?php endforeach; ?>
		</table>

		<?php endif; ?>
	</div>
</body>
</html>