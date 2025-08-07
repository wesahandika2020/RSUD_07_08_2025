<?php
	header_excel("LAPORAN DOKTER OPERASI (".$periode.")");
	header("Content-type: application/vnd-ms-excel");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div style="text-align: left;">
		<h4><b>LAPORAN DOKTER OPERASI</b>
			<br>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($jenis_layanan) ? '<br>Jenis Layanan : ' .$jenis_layanan : '' ) ?>
			<?= (!empty($poliklinik) 	? '<br>Poliklinik : ' .$poliklinik : '' ) ?>
			<?= (!empty($bangsal_ranap) ? '<br>Bangsal : ' .$bangsal_ranap : '' ) ?>
			<?= (!empty($bangsal_icare) ? '<br>Bangsal : ' .$bangsal_icare : '' ) ?>
			<?= (!empty($operasi) 		? '<br>Operasi : ' .$operasi : '' ) ?>
			<?= (!empty($timing) 		? '<br>Timing : ' .$timing : '' ) ?>
			<?= (!empty($status_operasi) ? '<br>Status Operasi : ' .$status_operasi : '' ) ?>
			<?= (!empty($dokter) 		? '<br>Dokter : ' .$dokter : '' ) ?>
			<?= (!empty($dokter_operasi) ? '<br>Tim Operasi : ' .$dokter_operasi : '' ) ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">NO</th>
				<th style="background-color: #9cc8ff; text-align: center">No RM</th>
				<th style="background-color: #9cc8ff; text-align: center">Nama Pasien</th>
				<th style="background-color: #9cc8ff; text-align: center">Status</th>
				<th style="background-color: #9cc8ff; text-align: center">Layanan</th>
				<th style="background-color: #9cc8ff; text-align: center">Timing</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu Order</th>
				<th style="background-color: #9cc8ff; text-align: center">Jenis Layanan</th>
				<th style="background-color: #9cc8ff; text-align: center">Ruangan</th>
				<th style="background-color: #9cc8ff; text-align: center">Penjamin</th>
				<th style="background-color: #9cc8ff; text-align: center">Dokter</th>
				<th style="background-color: #9cc8ff; text-align: center">Waktu Mulai</th>
				<th style="background-color: #9cc8ff; text-align: center">Tindakan</th>
				<th style="background-color: #9cc8ff; text-align: center">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $i => $value) : 
				$ruangan = '';
				if($value->jenis_layanan=='Rawat Inap'){ $ruangan=$value->bangsal_ri.' Ruang '.$value->no_ruang_ri.' Bed '.$value->no_bed_ri;
				} else if($value->jenis_layanan=='Intensive Care') { $ruangan=$value->bangsal_ic.' Ruang '.$value->no_ruang_ic.' Bed '.$value->no_bed_ic;
				} else if($value->jenis_layanan=='Poliklinik') { $ruangan=$value->poliklinik;
				} else {$ruangan=$value->jenis_layanan;}
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>				
					<td style="text-align: center" style="mso-number-format:'@'"><?= $value->id_pasien?></td>
					<td style="text-align:   left"><?= $value->nama_pasien?></td>
					<td style="text-align: center"><?= $value->status?></td>
					<td style="text-align: center"><?= $value->layanan?></td>
					<td style="text-align: center"><?= $value->timing?></td>
					<td style="text-align: center"><?= $value->waktu_order?></td>
					<td style="text-align: center"><?= $value->jenis_layanan?></td>
					<td style="text-align: center"><?= $ruangan?></td>
					<td style="text-align: center"><?= $value->penjamin?></td>
					<td style="text-align:   left"><?= $value->dokter?></td>
					<td style="text-align: center"><?= $value->waktu_mulai?></td>
					<td style="text-align:   left"><?= $value->tindakan?></td>
					<td style="text-align: right"> <?= "Rp. " . number_format($value->total, 0, ",", ".") ?></td>
				</tr>

				<?php if (count($value->detail) >= 1) { ?>
					<tr>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">NO</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">JASA</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">JASA NETTO</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">DOKTER</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">STATUS</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">PESERTA</td>
						<td style="background-color: white; text-align: center"></td>
					</tr>
				<?php }  ?>

				<?php foreach ($value->detail as $key => $val) : ?>
					<tr>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: white;   text-align: center"></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $key+1?></td>						
						<td style="background-color: #fdf5d0; text-align: right"> <?= "Rp. " . number_format($val->jasa, 0, ",", ".") ?></td>
						<td style="background-color: #fdf5d0; text-align: right"> <?= "Rp. " . number_format($val->jasa_netto, 0, ",", ".") ?></td>
						<td style="background-color: #fdf5d0; text-align: left"><?= $val->dokter?></td>
						<td style="background-color: #fdf5d0; text-align: left"><?= $val->status?></td>
						<td style="background-color: #fdf5d0; text-align: left">  <?= $val->petugas?></td>
						<td style="background-color: white;   text-align: center"></td>
					</tr>
					
				<?php endforeach ?>

			<?php endforeach ?>
		</tbody>
	</table>
</body>