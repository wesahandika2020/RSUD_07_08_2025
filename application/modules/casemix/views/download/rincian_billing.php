<!-- <title><?= $title ?></title> -->
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">
<style>
	body {
		margin: 0;
		padding: 0;
		/* background-color: #FAFAFA; */
	}

	/* * {
		font: 9pt verdana;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	} */

	.tabel-laporan {
		empty-cells: show;
		border-radius: 5px;
		border-spacing: 0;
		margin-top: 5px;
		clear: both;
		border-collapse: collapse;
		background: #fff;
		color: #000
	}

	.tabel-laporan tr th {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.tabel-laporan .number {
		text-align: center;
	}

	.tabel-laporan th rowspan,
	td rowspan {
		vertical-align: middle;
	}

	.subtotal {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
	}

	.topborder {
		border-top: 1px solid #000;
	}

	.bottomborder {
		border-bottom: 1px solid #000;
	}

	.total {
		border-top: 1px solid #000;
		vertical-align: middle;
	}

	.left {
		text-align: left;
	}

	.right {
		text-align: right !important;
	}

	.center {
		text-align: center !important;
	}

	.v-center {
		vertical-align: middle !important;
	}

	.v-top {
		vertical-align: top !important;
	}

	.bold {
		font-weight: bold;
	}

	.wrapper {
		white-space: nowrap;
	}

	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	.tab-15 {
		padding-left: 15px;
	}
</style>
<body>
	<div class="page">
		<div style="width:100%;display:inline-block;">
			<div style="float:left;">
				<table width="100%" style="color:#000;border-spacing:0;">
					<tr>
						<td width="12%"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="50px" height="50px"></td>
						<td width="40%">
							<?= $hospital->nama ?><br>
							<?= $hospital->alamat ?> <?= $hospital->kelurahan ?><br>
							Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?>
						</td>
						<!-- <td width="30%"></td> -->
					</tr>

				</table>
			</div>
		</div>

		<table width="100%" style="color:#000;border-spacing:0;">
			<tr>
				<td width="50%">
					<table width="100%" style="color:#000;border-spacing:0;">
						<tr>
							<td width="30%">Nama</td>
							<td width="5%">:</td>
							<td width="60%"><?= $pasien->nama ?></td>
						</tr>
						<tr>
							<td>Kelamin</td>
							<td>:</td>
							<td><?= $pasien->kelamin ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?= $pasien->alamat ?></td>
						</tr>
						<tr>
							<td>P. Jawab Pasien</td>
							<td>:</td>
							<td><?= ($pasien->nama_pjwb === '' ? '-' : $pasien->nama_pjwb) ?></td>
						</tr>
					</table>
				</td>
				<td width="50%">
					<table width="100%" style="color:#000;border-spacing:0;">
						<tr>
							<td width="30%">No. Reg / No. RM</td>
							<td width="5%">:</td>
							<td width="60%"><?= $pasien->no_register . ' / ' . $pasien->id_pasien ?></td>
						</tr>
						<tr>
							<td>Waktu Masuk</td>
							<td>:</td>
							<td><?= indo_time($pasien->tanggal_daftar) ?></td>
						</tr>
						<tr>
							<td>Waktu Keluar</td>
							<td>:</td>
							<td><?= ($pasien->tanggal_keluar === null ? '-' : indo_time($pasien->tanggal_keluar)) ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br>

		<h3 class="bold center">Rincian Billing</h3>

		<?php
		$SUBTOTAL = 0;
		$TOTAL = 0;
		$ADM_RANAP_TEMP = NULL;
		$ADM_ICARE_TEMP = NULL;
		?>
		<?php foreach ($layanan as $key => $lay) : ?>
			<?php
			$jenis_igd = '';
			if (($lay->jenis_layanan === 'IGD') && ($pasien->jenis_igd !== null)) :
				$jenis_igd = $pasien->jenis_igd;
			endif;

			if ($lay->item_billing < 1) :
				continue;
			endif;
			?>
			<h3 style="font-weight: normal;">Jenis Layanan : <?= $lay->jenis_layanan . ' ' . $lay->layanan . ($jenis_igd !== 'Umum' ? $jenis_igd : '') ?>
				<br><?= 'Cara Bayar : ' . $lay->cara_bayar . ' ' . ($lay->cara_bayar !== 'Tunai' ? ' <span>(' . $lay->penjamin . ')</span>' : '') ?>
			</h3>
			<table width="100%" class="tabel-laporan">
				<thead>
					<tr>
						<th width="35%" class="left" style="white-space:nowrap">Item</th>
						<th width="20%" class="left" style="white-space:nowrap"></th>
						<th width="20%" class="left" style="white-space:nowrap">Operator</th>
						<th width="5%" class="center" style="white-space:nowrap">Jml</th>
						<th width="10%" class="right" style="white-space:nowrap">Harga (Rp.)</th>
						<th width="10%" class="right" style="white-space:nowrap">Total (Rp.)</th>
					</tr>
				</thead>
				<tbody>
					<!-- Rawat Inap -->
					<?php if (count((array)$lay->rawat_inap) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Akomodasi Kamar</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->rawat_inap as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td clas="tab-15" width="35%" style="padding-left:15px;"><?= $value->bangsal ?> (<?= datetimefmysql($value->tanggal_masuk, true, false) ?> - <?= ($value->tanggal_keluar !== null ? datetimefmysql($value->tanggal_keluar, true, false) : 'Sekarang') ?>) Status Keluar : <?= $value->tindak_lanjut ?></td>
								<td width="20%"></td>
								<td width="20%"></td>
								<td width="5%" class="center"><?= $value->durasi ?></td>
								<td width="10%" class="right"><?= currency($value->nominal) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Rawat Inap -->

					<!-- Intensive Care -->
					<?php if (count((array)$lay->intensive_care) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Akomodasi Kamar</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->intensive_care as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td class="tab-15" width="35%" style="padding-left:15px;"><?= $value->bangsal ?> (<?= datetimefmysql($value->tanggal_masuk, true, false) ?> - <?= ($value->tanggal_keluar !== null ? datetimefmysql($value->tanggal_keluar, true, false) : 'Sekarang') ?>) Status Keluar : <?= $value->tindak_lanjut ?></td>
								<td width="20%"></td>
								<td width="20%"></td>
								<td width="5%" class="center"><?= $value->durasi ?></td>
								<td width="10%" class="right"><?= currency($value->nominal) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Intensive Care -->

					<!-- Pendaftaran -->
					<?php if (count((array)$lay->pendaftaran) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Pendaftaran</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->pendaftaran as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td class="tab-15" width="35%" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="center"></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="center"><?= $value->frekuensi ?></td>
								<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Pendaftaran -->

					<!-- Tindakan-->
					<?php if (count((array)$lay->tindakan) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Tindakan</h3>
							</td>
						</tr>
						<?php
						$subtotal = 0;
						$id_lay = NULL;
						$frekuensi = 0;
						$total_tindakan = 0;
						$print = true;
						?>
						<?php foreach ($lay->tindakan as $key => $value) : ?>
							<?php
							if ($value->item == 'Administrasi Pasien Rawat Inap') :
								$ADM_RANAP_TEMP = $value;
								continue;
							endif;
							if ($value->item == 'Administrasi Pasien Intensive Care') :
								$ADM_ICARE_TEMP = $value;
								continue;
							endif;

							$subtotal += $value->total;
							// if (($value->profesi === 'Perawat')) :
							// 	if ($id_lay === $value->id_layanan_pendaftaran) :
							// 		$frekuensi += $value->frekuensi;
							// 		$total_tindakan += $value->total;
							// 		$print = false;
							// 		if ((isset($lay->tindakan[$key + 1])) && ($lay->tindakan[$key + 1]->id_layanan_pendaftaran !== $value->id_layanan_pendaftaran)) :
							// 			$print = true;
							// 		endif;
							// 		if ($key === (count((array)$lay->tindakan) - 1)) :
							// 			$print = true;
							// 		endif;
							// 	else :
							// 		$id_lay = $value->id_layanan_pendaftaran;
							// 		$frekuensi = $value->frekuensi;
							// 		$total_tindakan = $value->total;
							// 		$print = false;
							// 		if ((isset($lay->tindakan[$key + 1])) && ($lay->tindakan[$key + 1]->id_layanan_pendaftaran !== $value->id_layanan_pendaftaran)) :
							// 			$print = true;
							// 		endif;
							// 	endif;
							// else :
							$frekuensi = $value->frekuensi;
							$total_tindakan = $value->total;
							$print = true;
							// endif;
							if ($key === (count((array)$lay->tindakan) - 1)) :
								$print = true;
							endif;
							?>
							<?php if ($print) : ?>
								<tr>
									<td width="35%" style="padding-left:15px;"><?= $value->item ?></td>
									<td width="20%" class="center" style="white-space:nowrap;"><?= ($value->tanggal !== '' ? '(' . datetimefmysql($value->tanggal, true) . ')&nbsp;&nbsp;' : '') ?></td>
									<td width="20%"><?= ($value->profesi === 'Perawat' ? 'Perawat' : $value->operator) ?></td>
									<td width="5%" class="center"><?= $value->frekuensi ?></td>
									<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
									<td width="10%" class="right"><?= currency($total_tindakan) ?></td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Tindakan -->

					<!-- Operasi -->
					<?php if (count((array)$lay->operasi) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Operasi</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->operasi as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="v-top center" style="white-space:nowrap;"><?= ($value->waktu !== '' ? '(' . datetimefmysql($value->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td width="20%" class="v-top">
									<?php if (count((array)$value->operator_list) > 0) : ?>
										<b style="font-weight:bold;">Operator</b>
										<?php foreach ($value->operator_list as $key2 => $op) : ?>
											<li><?= $op->operator ?></li>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if (count((array)$value->anesthesi_list) > 0) : ?>
										<b style="font-weight:bold;">Anesthesi</b>
										<?php foreach ($value->anesthesi_list as $key2 => $an) : ?>
											<li><?= $an->operator ?></li>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if ((count((array)$value->anesthesi_list) === 0) and (count((array)$value->anesthesi_list) === 0)) : ?>
										<?= $value->operator ?>
									<?php endif; ?>
								</td>
								<td width="5%" class="v-top center"><?= $value->frekuensi ?></td>
								<td width="10%" class="v-top right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="v-top right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Operasi -->

					<!-- Barang Operasi -->
					<?php $subbarang = 0; ?>
					<?php if (count((array)$lay->barang_operasi) > 0) : ?>
						<?php $subtotal = 0 ?>
						<tr>
							<td colspan="6">
								<h3>Barang Operasi</h3>
							</td>
						</tr>
						<?php foreach ($lay->barang_operasi as $key => $barang) : ?>
							<tr>
								<td width="35%" colspan="6" style="padding-left:15px;"><b>
									<?php
									echo "BHP";
									?></b> 
								</td>
								<td width="20%" class="center" style="white-space:nowrap;"><?= ($barang->waktu !== '' ? '(' . datetimefmysql($barang->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td width="45%" colspan="4">&nbsp;</td>
							</tr>
							<?php foreach ($barang->detail as $key2 => $value) : ?>
								<tr>
									<td style="padding-left:35px;" colspan="3"><?= $value->item ?></td>
									<td class="center"><?= $value->qty ?></td>
									<td class="right"><?= currency($value->harga_jual) ?></td>
									<td class="right"><?= currency($value->total) ?></td>
								</tr>
							<?php $subtotal += $value->total;
							endforeach; ?>
							<tr>
								<td colspan="5"><b style="font-size:14px;"></b></td>
								<td class="right"><b style="font-weight:bold;"><?= currency($subtotal) ?></b></td>
							</tr>
						<?php $SUBTOTAL += $subtotal;
							$subbarang += $subtotal;
							$subtotal = 0;
						endforeach; ?>
					<?php endif; ?>
					<!-- End Barang Operasi -->

					<!-- VK -->
					<?php if (count((array)$lay->vk) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>VK</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->vk as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="v-top center"></td>
								<td width="20%" class="v-top">
									<?php if (count((array)$value->operator_list) > 0) : ?>
										<b style="font-weight:bold;">Operator</b>
										<?php foreach ($value->operator_list as $key2 => $op) : ?>
											<li><?= $op->operator ?></li>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if (count((array)$value->anesthesi_list) > 0) : ?>
										<b style="font-weight:bold;">Anesthesi</b>
										<?php foreach ($value->anesthesi_list as $key2 => $an) : ?>
											<li><?= $an->operator ?></li>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if ((count((array)$value->anesthesi_list) === 0) and (count((array)$value->anesthesi_list) === 0)) : ?>
										<?= $value->operator ?>
									<?php endif; ?>
								</td>
								<td width="5%" class="v-top center"><?= $value->frekuensi ?></td>
								<td width="10%" class="v-top right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="v-top right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End VK -->

					<!-- Barang -->
					<?php if ((count((array)$lay->barang) > 0) || (count((array)$lay->barang_operasi) > 0)) : ?>
						<tr>
							<td colspan="6">
								<h3>Barang</h3>
							</td>
						</tr>
					<?php endif; ?>
					<?php $subbarang = 0; ?>
					<?php if (count($lay->barang) > 0) : ?>
						<?php $subtotal = 0 ?>
						<?php foreach ($lay->barang as $key => $barang) : ?>
							<tr>
								<td width="35%" style="padding-left:15px;"><b>
										<?php
										if ($barang->id_resep !== NULL) :
											echo "Resep No. Bukti " . $barang->id_resep_tebus;
										else :
											echo "BHP No. " . $barang->id;
										endif;
										?></b>
								</td>
								<td width="20%" class="center" ><?= ($barang->waktu !== '' ? '(' . datetimefmysql($barang->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td widht="45%" colspan="4">&nbsp;</td>
							</tr>
							<?php foreach ($barang->detail as $key2 => $value) : ?>
								<tr>
									<td  style="padding-left:35px;" colspan="3"><?= $value->item ?></td>
									<td class="center"><?= $value->qty ?></td>
									<td   class="right"><?= currency($value->harga_jual) ?></td>
									<td   class="right"><?= currency($value->total) ?></td>
								</tr>
							<?php $subtotal += $value->total;
							endforeach; ?>
							<tr>
								<td class="right" colspan="5" style="font-weight:bold;"></td>
								<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
							</tr>
						<?php $SUBTOTAL += $subtotal;
							$subbarang += $subtotal;
							$subtotal = 0;
						endforeach; ?>
					<?php endif; ?>
					<!-- End Barang -->

					<!-- Bank Darah -->
					<?php if (count((array)$lay->bank_darah) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Bank Darah</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->bank_darah as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" class="v-top" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="v-top center" style="white-space:nowrap;"><?= ($value->waktu !== '' ? '(' . datetimefmysql($value->waktu, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="v-top center"><?= $value->frekuensi ?></td>
								<td width="10%" class="v-top right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="v-top right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Bank Darah -->

					<!-- Barang Bank Darah -->
					<!-- <-?php if (count((array)$lay->barang_bank_darah) > 0) : ?>
					<tr>
						<td colspan="6"><h3>Barang Bank Darah</h3></td>
					</tr>
					<-?php endif; ?>
					<-?php $subbarang = 0; ?>
					<-?php if (count($lay->barang_bank_darah) > 0) : ?>
						<-?php $subtotal = 0 ?>
						<-?php foreach ($lay->barang_bank_darah as $key => $barang) : ?>
						<-?php foreach ($barang->detail as $key2 => $value) : ?>
						<tr>
							<td colspan="5" style="padding-left:15px;">
								<-?php  
									echo $value->item;
								?>
							</td>
							<td class="v-top right"><-?= currency($value->total) ?></td>
						</tr>
						<-?php $subtotal += $value->total; endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weght:bold;"></td>
							<td class="right" style="font-weight:bold;"><-?= currency($subtotal) ?></td>
						</tr>
						<-?php $SUBTOTAL += $subtotal; $subbarang += $subtotal; $subtotal = 0; endforeach; ?>
					<-?php endif; ?>  -->
					<!-- End Barang Bank Darah -->

					<!-- Retur Barang -->
					<?php if (count((array)$lay->retur_barang) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Retur Barang</h3>
							</td>
						</tr>
					<?php endif; ?>
					<?php $subreturbarang = 0; ?>
					<?php if (count($lay->retur_barang) > 0) : ?>
						<?php $subtotal = 0 ?>
						<?php foreach ($lay->retur_barang as $key => $barang) : ?>
							<tr>
								<td colspan="5" style="padding-left:15px;">
									<?php
									echo "No. Retur " . $barang->id;
									foreach ($barang->detail as $key2 => $value) $subtotal += $value->total;
									?>
								</td>
								<td class="v-top right"><?= currency($subtotal) ?></td>
							</tr>
						<?php $SUBTOTAL -= $subtotal;
							$subbarang -= $subtotal;
							$subtotal = 0;
						endforeach; ?>
					<?php endif; ?>
					<?php if (count((array)$lay->retur_barang) > 0) : ?>
						<tr>
							<td colspan="5"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subreturbarang) ?></td>
						</tr>
					<?php endif; ?>
					<!-- End Retur Barang -->

					<!-- Laboratorium -->
					<?php if (count((array)$lay->laboratorium) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Laboratorium</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->laboratorium as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="center" style="white-space:nowrap;"><?= ($value->waktu_konfirm !== '' ? '(' . datetimefmysql($value->waktu_konfirm, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="center"><?= $value->frekuensi ?></td>
								<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Laboratorium -->

					<!-- Radiologi -->
					<?php if (count((array)$lay->radiologi) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Radiologi</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->radiologi as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="center" style="white-space:nowrap;"><?= ($value->waktu_konfirm !== '' ? '(' . datetimefmysql($value->waktu_konfirm, true) . ')&nbsp;&nbsp;' : '') ?></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="center"><?= $value->frekuensi ?></td>
								<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Radiologi -->

					<!-- Fisioterapi -->
					<?php if (count((array)$lay->fisioterapi) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Fisioterapi</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->fisioterapi as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="center"></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="center"><?= $value->frekuensi ?></td>
								<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Fisioterapi -->

					<!-- Hemodialisa -->
					<?php if (count((array)$lay->hemodialisa) > 0) : ?>
						<tr>
							<td colspan="6">
								<h3>Hemodialisa</h3>
							</td>
						</tr>
						<?php $subtotal = 0; ?>
						<?php foreach ($lay->hemodialisa as $key => $value) : $subtotal += $value->total ?>
							<tr>
								<td width="35%" style="padding-left:15px;"><?= $value->item ?></td>
								<td width="20%" class="center"></td>
								<td width="20%"><?= $value->operator ?></td>
								<td width="5%" class="center"><?= $value->frekuensi ?></td>
								<td width="10%" class="right"><?= currency($value->harga_item) ?></td>
								<td width="10%" class="right"><?= currency($value->total) ?></td>
							</tr>
						<?php endforeach; ?>
						<tr>
							<td class="right" colspan="5" style="font-weight:bold;"></td>
							<td class="right" style="font-weight:bold;"><?= currency($subtotal) ?></td>
						</tr>
					<?php $SUBTOTAL += $subtotal;
					endif; ?>
					<!-- End Hemodialisa -->

					<!-- Administrasi -->
					<?php if ($lay->status_rawat === 'Masih Dirawat') : ?>
						<!-- <tr>
							<td colspan="6"><h3>Administrasi Rawat Inap</h3></td>
						</tr>
						<-?php 
							$subtotal = 0;
							$adm = ceil((5 / 100) * ($SUBTOTAL + $TOTAL));
							if ($adm > 1500000) :
								$adm = 1500000;
							endif;
						?>
						<tr>
							<td style="padding-left:15px;">Administrasi Rawat Inap</td>
							<td></td>
							<td class="center"></td>
							<td class="center">1</td>
							<td class="right"><-?= currency($adm) ?></td>
							<td class="right"><-?= currency($adm) ?></td>
						</tr>
						<tr>
							<td colspan="5"></td>
							<td class="right" style="font-weight:bold;"><-?= currency($adm) ?></td>
						</tr>
						<--?php $SUBTOTAL += $adm ?> -->

						<!-- <-?php else : ?>
						<-?php if ($ADM_RANAP_TEMP !== null) : ?>
							<tr>
								<td colspan="6"><h3>Administrasi Rawat Inap</h3></td>
							</tr>
							<tr>
								<td style="padding-left:15px;">Administrasi Rawat Inap</td>
								<td></td>
								<td class="center"></td>
								<td class="center">1</td>
								<td class="right"><-?= currency($ADM_RANAP_TEMP->total) ?></td>
								<td class="right"><-?= currency($ADM_RANAP_TEMP->total) ?></td>
							</tr>
						<-?php $SUBTOTAL += $ADM_RANAP_TEMP->total; endif; ?>
					<?php endif; ?> 
					
					<?php if ($lay->status_rawat_icare === 'Masih Dirawat') : ?>
						<tr>
							<td colspan="6"><h3>Administrasi Pasien Intensive Care</h3></td>
						</tr>
						<?php
						$subtotal = 0;
						$adm = ceil((5 / 100) * ($SUBTOTAL + $TOTAL));
						if ($adm > 1500000) :
							$adm = 1500000;
						endif;
						?>
						<tr>
							<td style="padding-left:15px;">Administrasi Pasien Intensive Care</td>
							<td></td>
							<td class="center"></td>
							<td class="center">1</td>
							<td class="right"><?= currency($adm) ?></td>
							<td class="right"><?= currency($adm) ?></td>
						</tr>
						<tr>
							<td colspan="5"></td>
							<td class="right" style="font-weight:bold;"><?= currency($adm) ?></td>
						</tr>
						<?php $SUBTOTAL += $adm ?>
					<?php else : ?>
						<?php if ($ADM_ICARE_TEMP !== null) : ?>
							<tr>
								<td colspan="6"><h3>Administrasi Pasien Intensive Care</h3></td>
							</tr>
							<tr>
								<td style="padding-left:15px;">Administrasi Pasien Intensive Care</td>
								<td></td>
								<td class="center"></td>
								<td class="center">1</td>
								<td class="right"><?= currency($ADM_ICARE_TEMP->total) ?></td>
								<td class="right"><?= currency($ADM_ICARE_TEMP->total) ?></td>
							</tr>
						<?php $SUBTOTAL += $ADM_ICARE_TEMP->total;
						endif; ?>
					<?php endif; ?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
					<tr>
						<th class="right" colspan="5"><b style="font-weight:bold;">SUBTOTAL</b></th>
						<th class="right"><b style="font-weight:bold;"><?= currency($SUBTOTAL) ?></b></th>
					</tr>
					<!-- End Administrasi -->
				</tbody>
			</table>
			<br>
		<?php $ADM_RANAP_TEMP = null;
			$ADM_ICARE_TEMP = null;
			$TOTAL += $SUBTOTAL;
			$SUBTOTAL = 0;
		endforeach; ?>
		<br>
		<table width="100%" class="tabel-laporan">
			<tr>
				<td class="right" style="text-align: right;" colspan="5"><h3>TOTAL</h3></td>
				<td class="right" style="text-align: right;"><h3><?= currency($TOTAL) ?></h3></td>
			</tr>
		</table>
		<br><br><br>
		<table width="100%">
			<tr>
				<td width="50%" class="left">( <?= $pasien->nama ?> )</td>
				<?php if ($_SESSION['account_group'] != "Kasir") : ?>
					<td width="50%" class="right">( Petugas : Kasir RSUD KOTA TANGERANG )</td>
				<?php endif; ?>
				<?php if ($_SESSION['account_group'] == "Kasir") : ?>
					<td width="50%" class="right">( Petugas : <?= $petugas ?> )</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td width="50%" class="left"><?= $waktu ?></td>
				<td width="50%" class="right"><?= $waktu ?></td>
			</tr>

		</table>
	</div>
</body>