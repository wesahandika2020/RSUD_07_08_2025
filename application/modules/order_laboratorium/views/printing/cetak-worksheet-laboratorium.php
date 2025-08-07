<style>
	.container {
		margin: 0 auto;
		width: 58%;
		height: auto;
		border: 1px solid black;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.header {
		width: 90%;
		height: auto;
		border: 1px solid gainsboro;
	}

	p {
		margin: 0;
		font-size: 8pt;
	}

	.table-data, .table-data th, .table-data td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	.table-data {
		width: 98%;
		height: auto;
		font-size: 9pt;
	}

	.catatan {
		font-size: 9pt;
		display: flex;
		margin-top: 1rem;
		width: 100%;
		flex-direction: column;
	}
</style>

<body onload="window.print()">
<div class="container">
	<h4 style="color: black"><i><b><u>WorkSheet Laboratorium</u></b></i></h4>
	<div class="header">
		<div style="margin: 1rem">
			<table>
				<tr style="font-size: 9pt">
					<td>No.lab</td>
					<td>: <b><?= $no_lab ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>RM/Nama Pasien</td>
					<td>: <b><?= "{$no_rm}-{$pasien}" ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>No. Telp</td>
					<td>: <b><?= $telp ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>Dokter Pemesan</td>
					<td>: <b><?= $dokter ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>Diagnosa</td>
					<td>: <b><?= $golongan_sebab_sakit ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>Tanggal Lahir</td>
					<td>: <b><?= date( 'd.m.Y', strtotime( $tanggal_lahir ) ) ?? '-' ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>Unit Asal</td>
					<?php
					$jenisLayanan = '';
				if ($layanan === 'Rawat Inap') {
					$jenisLayanan = $bangsal;
				} else if ($layanan === 'IGD') {
					$jenisLayanan = $jenis_igd;
				}
					?>
					<td>: <b><?= "$jenisLayanan $layanan" ?></b></td>
				</tr>
				<tr style="font-size: 9pt">
					<td>No.ono</td>
					<td>: <b><?= $ono ?? '-' ?></b></td>
				</tr>
			</table>
		</div>
	</div>

	<table class="table-data" style="margin-top: 1rem">
		<thead>
		<tr>
			<th style="color: black"><b>NO</b</th>
			<th colspan="2" style="color: black"><b>JENIS PEMERIKSAAN</b></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ( $item_pemeriksaan as $key => $item ) : ?>
			<tr>
				<td class="text" style="color: black;text-align: center;"><b><?= ++ $key ?></b></td>
				<td style="padding-left: 1rem"><?= $item->layanan ?></td>
				<td style="width: 8rem"></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<div class="catatan">
		<b style="color: black; margin-left: 1rem">CATATAN :</b>
		<ul>
			<?php foreach ( $item_pemeriksaan as $item ) : ?>
				<?php if ( ! empty( $item->keterangan ) ): ?>
					<li><?= $item->keterangan ?></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
</body>
