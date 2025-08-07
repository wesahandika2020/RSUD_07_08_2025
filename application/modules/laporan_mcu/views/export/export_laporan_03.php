<?php
	header_excel("LAPORAN MCU ORDER RADIOLOGI _ ".$data['periode']);
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
            LAPORAN MEDICAL CHECK UP ORDER RADIOLOGI 
			<br>Periode <?= $data['periode'] ?>
            <?= (!empty($data['penjamin']) ? '<br>Penjamin : ' .$data['penjamin'] : '' ) ?>
            <?= (!empty($data['dokter']) ? '<br>Dokter : ' .$data['dokter'] : '' ) ?>
			
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt" >
			<th style="text-align: center; background-color: #c3d4f9;"><b>NO</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>NO REGISTER</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>TGL DAFTAR</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>NO RM</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>NAMA PASIEN</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>DOKTER</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>TINDAKAN RADIOLOGI</b></th>
			<th style="text-align: center; background-color: #c3d4f9;"><b>PENJAMIN</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			$no_register = '';
			foreach ($data['data'] as $i => $value) :
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td style="text-align: center"><?= $no_register == $value->no_register ? '' : $value->no_register ?></td>
					<td style="text-align: center"><?= $no_register == $value->no_register ? '' : $value->tanggal_daftar ?></td>
					<td style="text-align: center" style="mso-number-format:'@'"><?= $no_register == $value->no_register ? '' : $value->id_pasien ?></td>					
					<td style="text-align: left"><?= $no_register == $value->no_register ? '' : $value->nama_pasien ?></td>
					<td style="text-align: left"><?= $no_register == $value->no_register ? '' : $value->dokter_mcu ?></td>
					<td style="text-align: left"><?= $value->konsul[0]->nama_tindakan ?></td>
					<td style="text-align: center"><?= $no_register == $value->no_register ? '' : $value->nama_penjamin ?></td>
				</tr>

					<?php
					foreach ($value->konsul as $key => $val) :
					if($key === 0) continue;
					?>
						<tr>
							<td></td>
							<td></td>
							<td></td>	
							<td></td>
							<td></td>
							<td></td>
							<td style="text-align: left"><?= $val->nama_tindakan ?></td>
							<td></td>
						</tr>
					<?php endforeach ?>


			<?php 
			$no_register = $value->no_register;
			endforeach ?>
			
		</tbody>
	</table>	
</body>
