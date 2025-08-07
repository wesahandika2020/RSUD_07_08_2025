<?php
	header_excel("LAPORAN TINDAKAN DOKTER MEDICAL CHECK UP _ ".$data['periode']);
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
            LAPORAN TINDAKAN DOKTER MEDICAL CHECK UP
			<br>Periode <?= $data['periode'] ?>
            <?= (!empty($data['penjamin']) ? '<br>Penjamin : ' .$data['penjamin'] : '' ) ?>
            <?= (!empty($data['dokter']) ? '<br>Dokter : ' .$data['dokter'] : '' ) ?>
			
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt" >
			<th style="text-align: center; background-color: #c3d4f9;"><b>NO</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>DOKTER</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>TINDAKAN</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>JML TINDAKAN</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>PENJAMIN</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			$dokter_mcu = '';
			foreach ($data['data'] as $i => $value) :
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td style="text-align: left"><?= $dokter_mcu == $value->dokter_mcu ? '' : $value->dokter_mcu ?></td>
					<td style="text-align: left"><?= $value->tindakan[0]->tindakan ?></td>
					<td style="text-align: center"><?= $value->tindakan[0]->jml_tindakan ?></td>
					<td style="text-align: center"><?= $value->tindakan[0]->penjamin ?></td>
				</tr>

					<?php
					foreach ($value->tindakan as $key => $val) :
					if($key === 0) continue;
					?>
						<tr>
							<td></td>
							<td></td>
							<td style="text-align: left"><?= $val->tindakan ?></td>
							<td style="text-align: center"><?= $val->jml_tindakan ?></td>
							<td style="text-align: center"><?= $val->penjamin ?></td>
						</tr>
					<?php endforeach ?>

			<?php 
			$dokter_mcu = $value->dokter_mcu;
			endforeach ?>
			
		</tbody>
	</table>	
</body>
