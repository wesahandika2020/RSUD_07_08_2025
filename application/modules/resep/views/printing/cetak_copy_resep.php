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

	function cetak() {
		window.print();
		setTimeout(function() {
			window.close();
		}, 300);
	}
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
			<td align="left"><?= $rows->id ?></td>
		</tr>
		<tr valign="top">
			<td>Waktu Cetak: </td>
			<td><?= indo_tgl(date("Y-m-d")) . ' ' . date('H:i') ?></td>
		</tr>
		<tr valign="top">
			<td>Dari Dokter: </td>
			<td><?= $rows->dokter ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal: </td>
			<td align="left"><?= datetimefmysql($rows->waktu) ?></td>
		</tr>
		<tr valign="top">
			<td>Untuk&nbsp;Pasien: </td>
			<td><?= $rows->no_rm .' - '. $rows->pasien ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal Lahir Pasien: </td>
			<td><?= datefmysql($rows->tanggal_lahir) ?></td>
		</tr>
		<tr valign="top">
			<td>Alamat Pasien: </td>
			<td><?= $rows->alamat_pasien ?></td>
		</tr>
		<tr valign="top">
			<td>Usia Pasien:</td>
			<td><?= ($rows->tanggal_lahir == '0000-00-00') ? '' : hitungUmur($rows->tanggal_lahir) ?></td>
		</tr>
		<tr valign="top">
			<td>Alergi Pasien: </td>
			<td><?= $rows->alergi ?></td>
		</tr>
		<tr valign="top">
			<td>Berat Badan Pasien: </td>
			<td><?= $rows->berat_badan ?> Kg</td>
		</tr>
		<tr valign="top">
			<td>No. Telp Pasien: </td>
			<td><?= $rows->telp_pasien ?></td>
		</tr>
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
		<tr valign="top">
			<td>Unit Layanan: </td>
			<td><?= $rows->jenis_layanan . ($rows->spesialisasi !== NULL ? ' ( '.$rows->spesialisasi.' ) ' : '') ?></td>
		</tr>
		<tr valign="top">
			<td>Penjamin: </td>
			<td><?= $rows->penjamin ?></td>
		</tr>
		
		<?php if (!empty($rows->no_polish)) : ?>
			<tr valign="top">
				<td>No. Polish: </td>
				<td><?= $rows->no_polish ?></td>
			</tr>
		<?php endif; ?>

		<?php if (!empty($rows->no_sep)) : ?>
			<tr valign="top">
				<td>No. SEP: </td>
				<td><?= $rows->no_sep ?></td>
			</tr>
		<?php endif; ?>
		
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
		<tr valign="top">
			<td colspan="2"></td>
		</tr>
	</table>
	<table width="100%" style="border-bottom: 1px solid #000;">
		<?php
		foreach ($detail as $key => $data) {
			$then = NULL;
			if (($data->resep_r_jumlah - $data->tebus_r_jumlah) === 0) {
				$then = "Detur Originale";
			} else if (($data->resep_r_jumlah - $data->tebus_r_jumlah) == $data->resep_r_jumlah) {
				$then = "Nedet";
			} else if (($data->resep_r_jumlah - $data->tebus_r_jumlah) > 0) {
				$then = "Det " . $data->tebus_r_jumlah;
			}
		?>
			<tr>
				<td>
					<h1 style="font-size: 16px; margin-bottom: 0;">R /: <?= $data->r_no ?></h1>
				</td>
			</tr>
			<?php
			$this->load->model('Resep_model', 'm_resep');
			$obat = $this->m_resep->getListDataResepDetail($data->id_resep_r, $data->id_resep)->result();
			if (sizeof($obat) === 1) {
				foreach ($obat as $val) { ?>
					<tr>
						<td style="padding-left: 20px; white-space: nowrap; "><b><?= $val->nama_barang ?></b></td>
					</tr>
					<tr>
						<td style="padding-left: 20px"> Permintaan: <?= ($data->resep_r_jumlah) ?> , Dosis Racik: <?= $val->dosis_racik ?>, Jml Pemakaian: <?= $val->jumlah ?></td>
					</tr>
				<?php } ?>
				
				<tr>
					<td style="padding-left: 20px"><?= $data->aturan_pakai ?>, <?= $data->ket_aturan_pakai ?>
						<?= $data->timing . ' ' . $data->admin_time ?>
					</td>
				</tr>
				<tr>
					<td style="padding-left: 20px; white-space: nowrap;"><?= $val->keterangan_resep ?></td>
				</tr>
				<tr>
					<td style="padding-left: 100px"><?= $then ?></td>
				</tr>
				<?php
			} else {

				foreach ($obat as $val) { ?>
					<tr>
						<td style="padding-left: 20px; white-space: nowrap;"><b><?= $val->nama_barang ?></b></td>
					</tr>
					<tr>
						<td style="padding-left: 20px"> Permintaan: <?= ($data->resep_r_jumlah) ?> , Dosis Racik: <?= $val->dosis_racik ?>, Jml Pemakaian: <?= $val->jumlah ?></td>
					</tr>

				<?php } ?>
				<tr>
					<td style="padding-left: 20px"><?= $data->cara_pembuatan ?> </td>
				</tr>
				<tr>
					<td style="padding-left: 20px"><?= $data->aturan_pakai ?>, <?= $data->ket_aturan_pakai ?> <?= $data->cara_pemberian ?>
						<?= (($data->cara_pemberian !== '') ? 'MAKAN' : '') ?>
					</td>
				</tr>
				<tr>
					<td style="padding-left: 20px; white-space: nowrap;"><?= $val->keterangan_resep ?></td>
				</tr>
				<tr>
					<td style="padding-left: 100px"><?= $then ?></td>
				</tr>
		<?php }
		} ?>
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