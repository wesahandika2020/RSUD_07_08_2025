<style>
	*, body { font-family: Arial; font-size: 10px; }
	/* body { width: 57.5mm; height: auto; } */
	body { width: 95%; height: auto; }
	.brandstruk { font-size: 10px; text-transform: uppercase; font-weight: bold; border-bottom: 1px solid #000; }
	.brandstruk .detail { font-size: 10px; font-weight: normal; text-transform: inherit; }
	.space { height: 0.25cm; }
	.resep_dokter td { font-size: 12px; }
	table { text-transform: uppercase; }
	@page {
		size: auto;   /* auto is the initial value */
		margin: 0mm 0.25cm;  /* this affects the margin in the printer settings */
	}
</style>
<script type="text/javascript">
	window.onunload = refreshParent;

	function refreshParent() {
		// window.opener.location.reload();
	}

	// function cetak() {
	// 	window.print();
	// 	setTimeout(function() {
	// 		window.close();
	// 	}, 300);
	// }
</script>
<body onload="cetak();" class="default-printing">
	<table width="100%" style="border-bottom: 3px solid black;">
		<tr>
			<td rowspan="3" style="width: 80px;"><img src="<?= resource_url() . 'images/logos/' . $hospital->logo ?>" width="70" height="70" alt="Logo RSUD"></td>
			<td colspan="3" class="center"><b><?= strtoupper($hospital->nama) ?></b></td>
			<td rowspan="3" style="width: 80px;">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" class="center"><b><?= strtoupper($hospital->alamat) ?></b></td>
		</tr>
		<tr>
			<td colspan="3" class="center"><b>TELP. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>, EMAIL : <?= $hospital->email ?></b></td>
		</tr>    
	</table>
	<h2 style="text-align: center">RESEP</h2>
	<table width="100%" style="border-bottom: 1px solid #000;">
		<tr valign="top">
			<td>No.: </td>
			<td align="left"><?= $resep->id ?></td>
		</tr>
		<tr valign="top">
			<td>Waktu Cetak: </td>
			<td><?= indo_tgl(date("Y-m-d")) . ' ' . date('H:i') ?></td>
		</tr>
		<tr valign="top">
			<td>Dari Dokter: </td>
			<td><?= $resep->dokter ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal: </td>
			<td align="left"><?= datetimefmysql($resep->waktu) ?></td>
		</tr>
		<tr valign="top">
			<td>Untuk&nbsp;Pasien: </td>
			<td><?= $resep->no_rm .' - '. $resep->pasien ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal Lahir Pasien: </td>
			<td><?= datefmysql($resep->tanggal_lahir) ?></td>
		</tr>
		<tr valign="top">
			<td>Alamat Pasien: </td>
			<td><?= $resep->alamat_pasien ?></td>
		</tr>
		<tr valign="top">
			<td>Usia Pasien:</td>
			<td><?= ($resep->tanggal_lahir == '0000-00-00') ? '' : hitungUmur($resep->tanggal_lahir) ?></td>
		</tr>
		<tr valign="top">
			<td>Alergi Pasien: </td>
			<td><?= $resep->alergi ?></td>
		</tr>
		<tr valign="top">
			<td>Berat Badan Pasien: </td>
			<td><?= $resep->berat_badan ?> Kg</td>
		</tr>
		<tr valign="top">
			<td>No. Telp Pasien: </td>
			<td><?= $resep->telp_pasien ?></td>
		</tr>
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
		<tr valign="top">
			<td>Unit Layanan: </td>
			<td><?= $resep->jenis_layanan . ($resep->spesialisasi !== NULL ? ' ( '.$resep->spesialisasi.' ) ' : '') ?></td>
		</tr>
		<tr valign="top">
			<td>Penjamin: </td>
			<td><?= $resep->penjamin ?></td>
		</tr>
		<tr valign="top">
			<td>No. Polish: </td>
			<td><?= $resep->no_polish ?></td>
		</tr>
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
	</table>
	<table width="100%" style="border-bottom: 1px solid #000;">
		<?php
		foreach ($resep->resep_tebus_r as $key => $data) {
			$then = 'test';
		?>
			<tr>
				<td>
					<h1 style="font-size: 16px; margin-bottom: 0;">R /: <?= $data->r_no ?></h1>
				</td>
			</tr>
			<?php
				foreach ($data->resep_tebus_r_detail as $val) { ?>

					<tr>
						<td style="padding-left: 20px; white-space: nowrap; "><b><?= $val['nama_barang'] ?></b></td>
					</tr>
					<tr>
						<td style="padding-left: 20px"> Permintaan: <?= ($data->resep_r_jumlah) ?> , Dosis Racik: <?= $val['dosis_racik'] ?>, Jml Pemakaian: <?= $val['jumlah_pakai'] ?></td>
					</tr>
				<?php } ?>
				
				<tr>
					<td style="padding-left: 20px"><?= $data->aturan_pakai ?>, <?= $data->ket_aturan_pakai ?> <?= $data->cara_pemberian ?>
						<?= (($data->cara_pemberian !== '') ? 'MAKAN' : '') ?></td>
				</tr>
				<tr>
					<td style="padding-left: 20px; white-space: nowrap;"><?= $data->keterangan_resep ?></td>
				</tr>
				<tr>
					<td style="padding-left: 100px"><?= $then ?></td>
				</tr>
		<?php }  ?>
	</table>
	<table width="100%" align="right">
		<tr>
			<td align="right"><?= $hospital->kabupaten ?>, <?= indo_tgl(date("Y-m-d")) . ' ' . date('H:i') ?></td>
		</tr>
		<tr>
			<td colspan="4" align="right">PCC</td>
		</tr>
		<!--<tr><td colspan="4" align="right">APA</td> </tr>-->
		<tr>
			<td align="right">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
		</tr>
		<tr>
			<td align="right">(<?= $this->session->userdata('nama') ?>)</td>
		</tr>
		<tr>
			<td align="right"><?= isset($apa->no_sip) ? $apa->no_sip : NULL ?></td>
		</tr>
	</table>
</body>
