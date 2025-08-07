<?php
	header_excel("Laporan Laboratorium Rawat Jalan Lebih dari Rp 100.000 (".$periode.")");
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
		<h4><b>Laporan Laboratorium Rawat Jalan Lebih dari Rp 100.000,-</b>
			<br>
			<?= (!empty($jml_data) 		? '<br>Jumlah Pasien : ' .$jml_data : '' ) ?>
			<?= (!empty($periode) 		? '<br>Periode : ' .$periode : '' ) ?>
			<?= (!empty($penjamin) 		? '<br>Penjamin : ' .$penjamin : '' ) ?>
			<?= (!empty($jenis_layanan) ? '<br>Jenis Layanan : ' .$jenis_layanan : '' ) ?>
			<?= (!empty($poliklinik) 	? '<br>Poliklinik : ' .$poliklinik : '' ) ?>
		</h4> 
	</div>

	<table border="1">
		<thead border="2">
			<tr height="50pt">
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="2%">No.</th>
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="5%">No Register</th>
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="3%">No RM</th>
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="9%">Nama Pasien</th>						
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="7%">Tgl Daftar</th>
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="7%">Tgl Keluar</th>				
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" colspan="3">
				<table border="1">
					<thead>
					<tr>
						<th style="background-color: #9cc8ff; text-align:center" colspan="3">Layanan</th>
					</tr>
					<tr>
						<th style="background-color: #9cc8ff; text-align:center" width="5%" >Penjamin</th>
						<th style="background-color: #9cc8ff; text-align:center" width="8%" >Jenis Layanan</th>
						<th style="background-color: #9cc8ff; text-align:center" width="12%">Dokter DPJP</th>
					</tr>
					</thead>
				</table>
				</th>						
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" colspan="4">
				<table border="1">
					<thead>
					<tr>
						<th style="background-color: #9cc8ff; text-align:center" colspan="4">Laboratorium</th>
					</tr>
					<tr>
						<th style="background-color: #9cc8ff; text-align:center" width="7%" >No Lab</th>
						<th style="background-color: #9cc8ff; text-align:center" width="12%">Dokter Lab</th>
						<th style="background-color: #9cc8ff; text-align:center" width="13%">Tindakan</th>
						<th style="background-color: #9cc8ff; text-align:center" width="5%">Total</th>
					</tr>
					</thead>
				</table>
				</th>
				<th style="background-color: #9cc8ff; text-align:center" rowspan="2" width="5%">Total Seluruh<br>Kunjungan</th>
			</tr>

		</thead>
		<tbody>
			<?php foreach ($data as $i => $v) : ?>
				<?php foreach ( $v->tempat_layanan as $i_tl => $v_tl ) : ?>
					<?php foreach ( $v_tl->tindakan as $i_t => $v_t ) : ?>
						<?php if(($i_tl <= 0) && ($i_t <= 0)) : ?>
							<tr>
								<tr>
								<td style="vertical-align: top; text-align: center"><?= ++ $i ?></td>
								<td style="vertical-align: top; text-align: left; mso-number-format:'@'"  ><?= $v->no_register ?></td>
								<td style="vertical-align: top; text-align: left; mso-number-format:'@'"  ><?= $v->id_pasien ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v->nama_pasien ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= (($v->tanggal_daftar !== null) ? datetime($v->tanggal_daftar) : '-') ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= (($v->tanggal_keluar !== null) ? datetime($v->tanggal_keluar) : '-') ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v_tl->penjamin ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v_tl->tempat_layanan ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v_tl->dokter_dpjp ?></td>
								<td style="vertical-align: top; text-align: left; mso-number-format:'@'"  ><?= $v_t->no_lab ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v_t->dokter_pjwb ?></td>
								<td style="vertical-align: top; text-align: left"  ><?= $v_t->tindakan ?></td>
								<td style="vertical-align: top; text-align: right"><?= "Rp. " . number_format($v_t->total, 0, ",", ".") ?></td></td>
								<td style="vertical-align: top; text-align: right"><?= "Rp. " . number_format($v->total, 0, ",", ".") ?></td></td>
							</tr>
						<?php elseif($i_t <= 0) : ?>
							<tr>	
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_tl->penjamin ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_tl->tempat_layanan ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_tl->dokter_dpjp ?></td>
								<td style="vertical-align: top; text-align: left; mso-number-format:'@'"  ><?= $v_t->no_lab ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_t->dokter_pjwb ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_t->tindakan ?></td>
								<td style="vertical-align: top; text-align: right"><?= "Rp. " . number_format($v_t->total, 0, ",", ".") ?></td></td>
								<td></td>
							</tr>
						<?php else : ?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td style="vertical-align: top; text-align: left; mso-number-format:'@'"  ><?= $v_t->no_lab ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_t->dokter_pjwb ?></td>
								<td style="vertical-align: top; text-align: left" ><?= $v_t->tindakan ?></td>
								<td style="vertical-align: top; text-align: right"><?= "Rp. " . number_format($v_t->total, 0, ",", ".") ?></td></td>
								<td></td>
							</tr>
						<?php endif ?>


					<?php endforeach ?>
				<?php endforeach ?>
			<?php endforeach ?>
		</tbody>
	</table>
</body>