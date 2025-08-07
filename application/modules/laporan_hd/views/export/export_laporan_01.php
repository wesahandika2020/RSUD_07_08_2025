<?php
	header_excel("LAPORAN TINDAKAN HD RAJAL DAN RANAP (".$periode.")");
	header("Content-type: application/vnd-ms-excel");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
    
<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div>
		<h4 style="text-transform: uppercase;">
            LAPORAN TINDAKAN HEMODIALISA RAWAT JALAN DAN RAWAT INAP
			<br>Periode <?= $periode ?>
            <?= (!empty($penjamin) ? '<br>Penjamin : ' .$penjamin : '' ) ?>
            <!-- <-?= (!empty($tindakan) ? '<br>Tindakan : ' .$tindakan : '' ) ?> -->
            <?= (($tindakan=='4463') ? '<br>Tindakan : HD NON REGULER' : '' ) ?>
            <?= (($tindakan=='4464') ? '<br>Tindakan : HD REGULER' : '' ) ?>
			
		</h4>
	</div>

	<table border="1">
		<thead border="2">
        <tr>
            <th class="left" colspan="5"><b>PASIEN RUTIN RAWAT JALAN</b></th>
		</tr>
		<tr height="50pt" >
			<th style="text-align: center"><b>NO</b></th>
			<th style="text-align: center"><b>NAMA PASIEN</b></th>
			<th style="text-align: center"><b>NO REKAM MEDIS</b></th>
			<th style="text-align: center"><b>DOKTER PENANGGUNG JAWAB</b></th>
			<th style="text-align: center"><b>JAMINAN</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			foreach ($data['rajal'] as $i => $value) :
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td><?= $value->nama ?></td>
					<td style="text-align: center">'<?= $value->id_pasien ?></td>
					<td><?= $value->dokter ?></td>
					<td style="text-align: center"><?= $value->penjamin ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
                <td></td>
				<td class="left" colspan="4"><b>JUMLAH TNDAKAN RAWAT JALAN : <?= $data['jml_rajal'] ?></b></td>
			</tr>
		</tbody>
	</table>

	<br>

	<table border="1">
		<thead border="2">
        <tr>
        <th class="left" colspan="5"><b>PASIEN RUTIN RAWAT INAP / ICU / HCU / IGD</b></th>
		</tr>
		<tr height="50pt" >
			<th style="text-align: center"><b>NO</b></th>
			<th style="text-align: center"><b>NAMA PASIEN</b></th>
			<th style="text-align: center"><b>NO REKAM MEDIS</b></th>
			<th style="text-align: center"><b>DOKTER PENANGGUNG JAWAB</b></th>
			<th style="text-align: center"><b>JAMINAN</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			foreach ($data['ranap'] as $i => $value) :
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td><?= $value->nama ?></td>
					<td style="text-align: center"><?= $value->id_pasien ?></td>
					<td><?= $value->dokter ?></td>
					<td style="text-align: center"><?= $value->penjamin ?></td>
				</tr>
			<?php endforeach ?>
			<tr>
                <td></td>
				<td class="left" colspan="4"><b>JUMLAH TNDAKAN RAWAT INAP : <?= $data['jml_ranap'] ?></b></td>
			</tr>
		</tbody>
	</table>

	
</body>
