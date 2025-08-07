<?php
	header_excel("KODE SKDR (SISTEM KEWASPADAAN DINI DAN RESPON) ".(!empty($data['kode_skdr']) ? '_ (' .$data['kode_skdr'].')': '' ) );
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

            KODE SKDR (SISTEM KEWASPADAAN DINI DAN RESPON)
            <?= (!empty($data['kode_skdr']) ? '<br>Kode SKDR : ' .$data['kode_skdr'] : '' ) ?>			
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt" >
			<th style="text-align: center"><b>NO</b></th>
			<th style="text-align: center"><b>KODE</b></th>
			<th style="text-align: center"><b>SKDR</b></th>
			<th style="text-align: center"><b>KODE ICDX</b></th>
			<th style="text-align: center"><b>DIAGNOSA</b></th>
		</tr>
		</thead>	
		<tbody>
			<?php
			foreach ($data['data'] as $i => $value) :
			?>
				<tr>
					<td style="text-align: center"><?= ++$i ?></td>
					<td style="text-align: center"><?= $value->kode ?></td>
					<td style="text-align: left"><?= $value->skdr ?></td>
					<td style="text-align: left"><?= $value->kode_icdx_rinci ?></td>
					<td style="text-align: left"><?= $value->diagnosa ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
</body>
