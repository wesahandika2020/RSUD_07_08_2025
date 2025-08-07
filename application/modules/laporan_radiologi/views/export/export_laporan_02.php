<?php
	header_excel("LAPORAN JUMLAH PEMERIKSAAN RADIOLOGI BERDASARKAN PENJAMIN (".$periode.")");
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
		<h4 colspan="7" style="text-transform: uppercase;">
			LAPORAN JUMLAH PEMERIKSAAN RADIOLOGI BERDASARKAN PENJAMIN
			<br>Periode <?= $periode ?>
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt">
			<th style="text-align: center"><b>No.</b></th>
			<th style="text-align: center"><b>Jenis Pemeriksaan</b></th>
			<td colspan="7"></td>
			<th style="text-align: center"><b>Total</b></th>
		</tr>
		</thead>	
		<tbody>
			<!-- PRADIOLOGI -->
			<tr>
				<td class="center" colspan="2" style="text-align: center"><b>RADIOLOGI</b></td>
				<td><b>JPKMKT</b></td>
				<td><b>BPJS</b></td>
				<td><b>UMUM</b></td>
				<td><b>JAMINAN KESEHATAN RSUD</b></td>
				<td><b>MCU PEGAWAI RSUD</b></td>
				<td><b>PENJAMIN LAIN</b></td>
				<td><b>NON PENJAMIN</b></td>
				<td></td>
			</tr>
						
			<?php
			$totalSemua = 0;
			$no = 0;

			if(!empty($data['radiologi']) ):
			foreach ($data['radiologi'] as $i => $value) :
				$totalSemua += $value->total;
				$no += 1;
			?>
				<tr>
					<td style="text-align: center"><?=$no?></td>
					<td><?= $value->tindakan ?></td>
					<td style="text-align: center"><?= $value->jpkmkt ?></td>
					<td style="text-align: center"><?= $value->bpjs ?></td>
					<td style="text-align: center"><?= $value->umum ?></td>
					<td style="text-align: center"><?= $value->jaminan_rsud ?></td>
					<td style="text-align: center"><?= $value->mcu_pegawai ?></td>
					<td style="text-align: center"><?= $value->penjamin_lain ?></td>
					<td style="text-align: center"><?= $value->penjamin_kosong ?></td>
					<td style="text-align: center"><?= $value->total ?></td>
				</tr>
			<?php endforeach;
			else : ?>
				<tr>
					<td colspan="2"></td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
				</tr>
			<?php endif; ?>

			<!-- PEMERIKSAAN USG -->
			<tr>
				<td class="center" colspan="2" style="text-align: center"><b>PEMERIKSAAN USG</b></td>
				<td><b>JPKMKT</b></td>
				<td><b>BPJS</b></td>
				<td><b>UMUM</b></td>
				<td><b>JAMINAN KESEHATAN RSUD</b></td>
				<td><b>MCU PEGAWAI RSUD</b></td>
				<td><b>PENJAMIN LAIN</b></td>
				<td><b>NON PENJAMIN</b></td>
				<td></td>
			</tr>

			<?php
			if(!empty($data['usg']) ):
			foreach ($data['usg'] as $i => $value) :
				$totalSemua += $value->total;
				$no += 1;
			?>
				<tr>
					<td style="text-align: center"><?= $no?></td>
					<td><?= $value->tindakan ?></td>
					<td style="text-align: center"><?= $value->jpkmkt ?></td>
					<td style="text-align: center"><?= $value->bpjs ?></td>
					<td style="text-align: center"><?= $value->umum ?></td>
					<td style="text-align: center"><?= $value->jaminan_rsud ?></td>
					<td style="text-align: center"><?= $value->mcu_pegawai ?></td>
					<td style="text-align: center"><?= $value->penjamin_lain ?></td>
					<td style="text-align: center"><?= $value->penjamin_kosong ?></td>
					<td style="text-align: center"><?= $value->total ?></td>
				</tr>
			<?php endforeach;
			else : ?>
				<tr>
					<td colspan="2"></td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
				</tr>
			<?php endif; ?>


			<!-- TINDAKAN CT SCAN -->
			<tr>
				<td class="center" colspan="2" style="text-align: center"><b>TINDAKAN CT SCAN</b></td>
				<td><b>JPKMKT</b></td>
				<td><b>BPJS</b></td>
				<td><b>UMUM</b></td>
				<td><b>JAMINAN KESEHATAN RSUD</b></td>
				<td><b>MCU PEGAWAI RSUD</b></td>
				<td><b>PENJAMIN LAIN</b></td>
				<td><b>NON PENJAMIN</b></td>
				<td></td>
			</tr>
			
			<?php
			if(!empty($data['ctscan']) ):
			foreach ($data['ctscan'] as $i => $value) :
				$totalSemua += $value->total;
				$no += 1;
			?>
				<tr>
					<td style="text-align: center"><?= $no ?></td>
					<td><?= $value->tindakan ?></td>
					<td style="text-align: center"><?= $value->jpkmkt ?></td>
					<td style="text-align: center"><?= $value->bpjs ?></td>
					<td style="text-align: center"><?= $value->umum ?></td>
					<td style="text-align: center"><?= $value->jaminan_rsud ?></td>
					<td style="text-align: center"><?= $value->mcu_pegawai ?></td>
					<td style="text-align: center"><?= $value->penjamin_lain ?></td>
					<td style="text-align: center"><?= $value->penjamin_kosong ?></td>
					<td style="text-align: center"><?= $value->total ?></td>
				</tr>
			<?php endforeach;
			else : ?>
				<tr>
					<td colspan="2"></td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
				</tr>
			<?php endif; ?>


			<!-- PANORAMIC -->
			<tr>
				<td class="center" colspan="2" style="text-align: center"><b>PANORAMIC</b></td>
				<td><b>JPKMKT</b></td>
				<td><b>BPJS</b></td>
				<td><b>UMUM</b></td>
				<td><b>JAMINAN KESEHATAN RSUD</b></td>
				<td><b>MCU PEGAWAI RSUD</b></td>
				<td><b>PENJAMIN LAIN</b></td>
				<td><b>NON PENJAMIN</b></td>
				<td></td>
			</tr>

			<?php
			if(!empty($data['panoramic']) ):
			foreach ($data['panoramic'] as $i => $value) :
				$totalSemua += $value->total;
				$no += 1;
			?>
				<tr>
					<td style="text-align: center"><?= $no ?></td>
					<td><?= $value->tindakan ?></td>
					<td style="text-align: center"><?= $value->jpkmkt ?></td>
					<td style="text-align: center"><?= $value->bpjs ?></td>
					<td style="text-align: center"><?= $value->umum ?></td>
					<td style="text-align: center"><?= $value->jaminan_rsud ?></td>
					<td style="text-align: center"><?= $value->mcu_pegawai ?></td>
					<td style="text-align: center"><?= $value->penjamin_lain ?></td>
					<td style="text-align: center"><?= $value->penjamin_kosong ?></td>
					<td style="text-align: center"><?= $value->total ?></td>
				</tr>
			<?php endforeach;
			else : ?>
				<tr>
					<td colspan="2"></td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
				</tr>
			<?php endif; ?>


			<!-- FLUROSCOPY -->
			<tr>
				<td class="center" colspan="2" style="text-align: center"><b>FLUROSCOPY</b></td>
				<td><b>JPKMKT</b></td>
				<td><b>BPJS</b></td>
				<td><b>UMUM</b></td>
				<td><b>JAMINAN KESEHATAN RSUD</b></td>
				<td><b>MCU PEGAWAI RSUD</b></td>
				<td><b>PENJAMIN LAIN</b></td>
				<td><b>NON PENJAMIN</b></td>
				<td></td>
			</tr>

			<?php
			if(!empty($data['fluroscopy']) ):
			foreach ($data['fluroscopy'] as $i => $value) :
				$totalSemua += $value->total;
				$no += 1;				
			?>
				<tr>
					<td style="text-align: center"><?= $no ?></td>
					<td><?= $value->tindakan ?></td>
					<td style="text-align: center"><?= $value->jpkmkt ?></td>
					<td style="text-align: center"><?= $value->bpjs ?></td>
					<td style="text-align: center"><?= $value->umum ?></td>
					<td style="text-align: center"><?= $value->jaminan_rsud ?></td>
					<td style="text-align: center"><?= $value->mcu_pegawai ?></td>
					<td style="text-align: center"><?= $value->penjamin_lain ?></td>
					<td style="text-align: center"><?= $value->penjamin_kosong ?></td>
					<td style="text-align: center"><?= $value->total ?></td>
				</tr>
			<?php endforeach;
			else : ?>
				<tr>
					<td colspan="2"></td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
					<td style="text-align: center">0</td>
				</tr>
			<?php endif; ?>


			<tr>
				<td class="center" colspan="9" style="text-align: right"><b>TOTAL</b></td>
				<td style="text-align: center"><b><?= $totalSemua ?></b></td>
			</tr>
		</tbody>
	</table>
</body>
