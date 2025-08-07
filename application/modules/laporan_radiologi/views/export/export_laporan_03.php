<?php
	header_excel("LAPORAN BACA EXPERTISE (".$periode.")");
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
		<h4 colspan="6" style="text-transform: uppercase;">
			LAPORAN BACA EXPERTISE
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<?php
		$myDays = ['MG', 'SN', 'SL', 'RB', 'KM', 'JM', 'SB'];	
		$tglTerakhir = (date('t', mktime(0, 0, 0, $bulan, 1, $tahun)))	;
	?>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th class="center" rowspan="2">Nama Dokter / Pemeriksaan</th>
					<?php
						for ($i = 1; $i <= $tglTerakhir; $i++) {
					?>
						<th class="center"><?= $myDays[date("w", strtotime($tahun."-".$bulan."-".$i))]  ?></th>
					<?php
						}
					?>
				<th class="center" rowspan="2">Jumlah</th>
			</tr>

			<tr>
				<?php
					for ($i = 1; $i <= $tglTerakhir; $i++) {
				?>
					<th class="center"><?= $i ?></th>
				<?php
					}
				?>											
			</tr>	
		</thead>	

		<tbody>
			
		<?php
		$totalSemua = 0;

		if(!empty($hasil) ):
		foreach ($hasil as $i => $value) :
		?>
			<tr>
				<td class="left" colspan="<?= $tglTerakhir+2 ?>"><b><?=$i?></b></td>
			</tr>




			<?php
			if(!empty($value) ):
			foreach ($value as $hi => $hvalue) :				
				$totalSemua += $hvalue->total;
			?>
				<tr>
					<td class="left"><?=$hvalue->pemeriksaan?></td>

					<?php
						for ($i = 1; $i <= $tglTerakhir; $i++) {
							$tgl= "tgl_".$i;
					?>						
						<td class="center"><?=$hvalue->$tgl?></td>
					<?php
						}
					?>		

					
					<td  class="center"><?=$hvalue->total?></td>


				</tr>
			<?php endforeach;
			else : ?>
			<?php endif; ?>	



			

		<?php endforeach;
		else : ?>
		<?php endif; ?>	



			<tr>
				<td class="center" colspan="<?= $tglTerakhir+1 ?>"style="text-align: right"><b>TOTAL</b></td>
				<td style="text-align: center"><b><?= $totalSemua ?></b></td>
			</tr>
		</tbody>
	</table>

</body>
