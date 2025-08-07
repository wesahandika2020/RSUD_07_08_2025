<?php
	header_excel("SKDR (Sistem Kewaspadaan Dini dan Respon) (".$periode.")");
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
		<h4><b>SKDR (SISTEM KEWASPADAAN DINI DAN RESPON)</b> <i>(Diagnosa Utama)</i>
			<br><b>RSUD KOTA TANGERANG</b>
			<?= (!empty($periode) ? '<br>Periode : ' .$periode_laporan. ' ' .$periode : '' ) ?>
			<?= (!empty($jenis_rawat) ? '<br>Jenis Rawat : ' .$jenis_rawat : '' ) ?>
			<?= (!empty($jenis_kasus) ? '<br>Jenis Kasus : ' .$jenis_kasus : '' ) ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align: center">NO</th>
				<th style="background-color: #9cc8ff; text-align: center">KODE PENYAKIT</th>
				<th style="background-color: #9cc8ff; text-align: center">PENYAKIT</th>
				<th style="background-color: #9cc8ff; text-align: center">JUMLAH KASUS</th>
				<th style="background-color: #9cc8ff; text-align: center">JUMLAH KEMATIAN</th>
				<th style="background-color: #9cc8ff; text-align: center">JUMLAH LAB</th>
				<th style="background-color: #9cc8ff; text-align: center"></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$totalSemua_kasus 	  = 0;
			$totalSemua_meninggal = 0;
			$totalSemua_lab 	  = 0;
			
			foreach ($data as $i => $value) :
				$totalSemua_kasus	 += intval($value->total_kasus);
				$totalSemua_meninggal+= intval($value->total_meninggal);
				$totalSemua_lab	 	 += intval($value->total_lab);
			
			?>
				<tr>
					<td style="text-align: center"><b><?= ++$i ?></b></td>					
					<td style="text-align: center"><b><?= $value->kode_skdr?></b></td>
					<td style="text-align: left">  <b><?= $value->nama_skdr?></b></td>
					<td style="text-align: center"><b><?= $value->total_kasus?></b></td>
					<td style="text-align: center"><b><?= $value->total_meninggal?></b></td>
					<td style="text-align: center"><b><?= $value->total_lab?></b></td>
					<td style="text-align: center"></td>
				</tr>

				<?php if (count($value->diagnosa) >= 1) { ?>
					<tr>
						<td style="background-color: white; text-align: center"></td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">ICDX</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">Diagnosa</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">Jumlah Kasus</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">Jumlah Kematian</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center">Jumlah Lab</td>
						<td style="background-color: #f9e897; font-weight: bold; text-align: center"></td>
					</tr>
				<?php }  ?>



				<?php foreach ($value->diagnosa as $key => $val) : ?>
					<tr>
						<td style="background-color: white;   text-align: center"><?= $val->kode_skdr ?> - (<?= $key+1 ?>) </td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->kode_icdx_rinci?></td>
						<td style="background-color: #fdf5d0; text-align: left"> <?= $val->diagnosa?></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->total_kasus?></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->total_meninggal?></td>
						<td style="background-color: #fdf5d0; text-align: center"><?= $val->total_lab?></td>
						<td style="background-color: #fdf5d0; text-align: center"></td>
					</tr>

					<?php if (count($val->pasien) >= 1) { ?>
						<tr>
							<td style="background-color: white;" class="center"></td>
							<td style="background-color: white;" class="center"></td>
							<td style="background-color: #ffafb6; font-weight: bold; text-align: center">Pasien</td>
							<td style="background-color: #ffafb6; font-weight: bold; text-align: center">Tgl Daftar</td>
							<td style="background-color: #ffafb6; font-weight: bold; text-align: center">Meninggal</td>	
							<td style="background-color: #ffafb6; font-weight: bold; text-align: center">Lab</td>
							<td style="background-color: #ffafb6; font-weight: bold; text-align: center">Jenis Layanan</td>
						</tr>
					<?php } 	
				?>	

						<?php foreach ($val->pasien as $k => $v) :
							$jenis_layanan = '';
							if($v->jenis_layanan == 'Rawat Inap'){
								$jenis_layanan = $v->jenis_layanan .' ('.$v->bangsal.')'; 
							} else if($v->jenis_layanan == 'Poliklinik'){
								$jenis_layanan = $v->jenis_layanan .' ('.$v->spesialisasi.')';
							} else {
								$jenis_layanan = $v->jenis_layanan;
							}
						?>		
							<tr>
								<td style="background-color: white;   text-align: center"></td>
								<td style="background-color: white;   text-align: center"><?= $v->kode_icdx_rinci ?> - (<?= $k+1 ?>) </td>
								<td style="background-color: #f5dbdd; text-align: left"> <?= $v->id_pasien?> <?= $v->nama_pasien?></td>
								<td style="background-color: #f5dbdd; text-align: center"><?= $v->tanggal_daftar?></td>
								<td style="background-color: #f5dbdd; text-align: center"><?= $v->kondisi_keluar?></td>
								<td style="background-color: #f5dbdd; text-align: center"><?= $v->order_lab?></td>
								<td style="background-color: #f5dbdd; text-align: left"><?= $jenis_layanan?></td>
							</tr>		
						<?php endforeach ?>

				<?php endforeach ?>

			<?php endforeach ?>

				<tr>
					<td style="background-color: #9cc8ff; text-align: center" colspan="3"><b>TOTAL</b></td>
					<td style="background-color: #9cc8ff; text-align: center"><b><?= $totalSemua_kasus?></b></td>
					<td style="background-color: #9cc8ff; text-align: center"><b><?= $totalSemua_meninggal?></b></td>
					<td style="background-color: #9cc8ff; text-align: center"><b><?= $totalSemua_lab?></b></td>
					<td style="background-color: #9cc8ff; text-align: center"></td>
				</tr>
		</tbody>
	</table>
</body>