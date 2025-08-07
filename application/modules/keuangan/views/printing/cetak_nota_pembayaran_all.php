<title><?= $title ?></title>
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />

<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
<script>
	let id_history_pembayaran = '<?= $history_pembayaran->id ?>';

	function cetak() {
		setTimeout(function() {
			window.close()
			addJumlahCetak()

		}, 300)
		window.print()
	}

	function addJumlahCetak() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('keuangan/api/keuangan/increase_jumlah_cetak') ?>',
			data: 'id_history_pembayaran=' + id_history_pembayaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (!data.status) {
					alert('Gagal menambah jumlah cetakan')
				}
			},
			error: function(e) {
				alert('Gagal menambah jumlah cetakan')
			}
		})
	}
</script>

<style>
	body {
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
	}

	* {
		font: 10pt verdana;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}

	.page {
		width: 21cm;
		min-height: 19.8cm;
		padding-top: 0.5cm;
		padding-left: 1cm;
		padding-right: 1cm;
		margin: 1cm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}

	.subpage {
		padding: 1cm;
		border: 5px red solid;
		height: 237mm;
		outline: 2cm #FFEAEA solid;
	}

	@page {
		margin-top: 0.9cm;
		margin-bottom: 0.5cm;
		margin-left: 0;
		margin-right: 0;
	}

	@page: first {
		margin-top: 0;
		margin-bottom: 0.5cm;
		margin-left: 0;
		margin-right: 0;
	}

	@media print {
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}

	h1 {
		font-size: 20px;
		margin-bottom: 0;
	}

	h2 {
		font-size: 18px;
		margin-bottom: 0;
	}

	h3 {
		font-size: 16px;
		margin-bottom: 0;
	}

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

	.bold {
		font-weight: bold;
	}
</style>

<body onload="cetak()">
	<div class="page">
		<?php $unit = '';
		if ($jenis_kwitansi === 'Tindakan') $unit = $pendaftaran['layanan']->jenis_layanan; ?>
		<table width="100%">
			<tr class="v-center">
				<td rowspan="4"><img src="<?= base_url() ?>resources/images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			</tr>
			<tr>
				<td width="50%"><?= $hospital->nama ?></td>
				<td class="right">
					<h1>
						<?php if ($jenis_kwitansi === "Barang") {
							echo "Resep / BHP";
						} elseif ($jenis_kwitansi == "Piutang Pasien") {
							echo "Pemeriksaan Pasien";
						} else {
							echo $jenis_kwitansi;
						}

						?>
						<?php
						if ($unit === 'Poliklinik') {
							echo "Rawat Jalan";
						} else if ($unit === 'IGD') {
							echo "Rawat Darurat";
						} else {
							echo $unit;
						}
						?>
					</h1>
				</td>
			</tr>
			<tr>
				<td><?= $hospital->alamat ?> <?= $hospital->kelurahan ?></td>
				<td class="right">No. kwitansi: <?= $history_pembayaran->no_kwitansi ?></td>
			</tr>
			<tr>
				<td>Telp. <?= $hospital->telp ?>, Fax. <?= $hospital->fax ?></td>
			</tr>
		</table>
		<br>
		<div style="width:100%; display:inline-block;">
			<div style="width:50%; float:left;">
				<table width="100%">
					<tr>
						<td width="33%">No. Reg / No. RM</td>
						<td width="2%">:</td>
						<td width="60%" class="bold" style="font-size:15px;"><?= $pendaftaran['pasien']->no_register . " / " . $pendaftaran['pasien']->id_pasien ?></td>
					</tr>
					<tr>
						<td>Nama Pasien</td>
						<td>:</td>
						<td><?= $pendaftaran['pasien']->nama ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?= ($pendaftaran['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
					</tr>
					<tr>
						<td>Umur</td>
						<td>:</td>
						<td><?= createUmur($pendaftaran['pasien']->tanggal_lahir) ?> Tahun</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?= $pendaftaran['pasien']->alamat ?></td>
					</tr>
				</table>
			</div>
			<div style="width:50%; float:right;">
				<table width="100%" style="white-space: nowrap;">
					<tr>
						<td width="33%">Tgl Mulai</td>
						<td width="2%">:</td>
						<td width="60%"><?= indo_time($pendaftaran['pasien']->tanggal_daftar, true) ?></td>
					</tr>
					<tr>
						<td>Tgl Selesai</td>
						<td>:</td>
						<td><?= (isset($pendaftaran['pasien']->tanggal_keluar) ? indo_time($pendaftaran['pasien']->tanggal_keluar, true) : '-') ?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td></td>
						<td class="bold" style="font-style:italic;"></td>
					</tr>
					<!-- <tr>
						<td>Tgl Bayar</td>
						<td>:</td>
						<td><?= $waktu ?></td>
					</tr> -->
				</table>
			</div>
		</div>
		<br><br>
		<div class="center bold">Rincian Biaya Tagihan Pasien</div>
		<?php $reimburse = 0;
		$sub_total = 0;
		$total_bayar = 0; ?>
		<table width="100%" class="tabel-laporan">
			<thead>
				<tr>
					<th width="40%" class="left">Item</th>
					<th width="25%" class="left">Jenis Bayar</th>
					<th width="20%" class="center"></th>
					<th width="15%" class="right">Subtotal(Rp.)</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0;
				$sub_barang = 0;
				foreach ($billing_layanan as $i => $row) :  ?>
					<?php if (count((array)$row->billing) > 0) : ?>
						<tr>
							<td style="font-size:14px;font-weight:bold;">
								<?= $row->jenis_layanan ?>
								<?php
								if (($row->jenis_layanan === 'IGD') && ($pendaftaran['pasien']->jenis_igd !== '')) :
									echo "(" . $pendaftaran['pasien']->jenis_igd . ")";
								endif;
								?>
							</td>
							<td>
								<?= $row->cara_bayar ?>
								<?= ($row->cara_bayar === 'Asuransi' ? ' (' . $row->penjamin . ') ' : '') ?>
							</td>
							<td></td>
							<td></td>
						</tr>


						<?php foreach ($row->billing as $l => $val) : ?>
							<?php if ($val > 0) : ?>
								<tr>
									<td colspan="2" style="padding-left:10px;font-size:14px;"><?= ($l === "Barang") ? "Resep & BHP" : str_replace("_", " ", $l) ?></td>
									<td class="right"></td>
									<?php if ($l === "Barang") : ?>
										<td class="right"><?= formatcurrency($val) ?></td>
									<?php else : ?>
										<td class="right"><?= currency($val) ?></td>
									<?php endif; ?>
								</tr>
							<?php endif; ?>
						<?php $total += $val;
						endforeach; ?>
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="2" class="topborder"></td>
					<td align="right" class="topborder">Tagihan (Rp) : </td>
					<td align="right" class="topborder" style="font-weight:bold;"><?= currency($total) ?></td>
				</tr>
				<?php if (($history_pembayaran->id_penjamin !== null) & ($history_pembayaran->tunai > 0)) : ?>
					<tr>
						<td></td>
						<td align="right" colspan="2">Ditanggung Asuransi (Rp) : </td>
						<td align="right" style="font-weight:bold;"><?= currency($history_pembayaran->non_tunai) ?></td>
					</tr>
				<?php endif; ?>
				<?php if (($history_pembayaran->id_penjamin !== null) & ($history_pembayaran->tunai < 1)) : ?>
					<tr>
						<td></td>
						<td align="right" colspan="2">Ditanggung Asuransi (Rp) : </td>
						<td align="right" style="font-weight:bold;"><?= currency($history_pembayaran->non_tunai) ?></td>
					</tr>
				<?php endif; ?>
				<?php if (count((array)$deposit) > 0) : ?>
					<tr>
						<td colspan="2"></td>
						<td align="right">Deposit (Rp) : </td>
						<td align="right" style="font-weight:bold;"><?= currency($deposit->saldo_pembayaran) ?></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td align="right">Sisa Deposit(Rp) : </td>
						<td align="right" style="font-weight:bold;"><?= currency($deposit->saldo_pembayaran - $deposit->keluar) ?></td>
					</tr>
				<?php endif; ?>
				<tr>
					<td colspan="2"></td>
					<td align="right" class="topborder" style="font-weight:bold;">Bayar (Rp) : </td>
					<td align="right" class="topborder" style="font-weight:bold;"><?= currency($history_pembayaran->tunai + $history_pembayaran->pembulatan) ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td colspan="2" class="bottomborder"></td>
				</tr>
				<?php if ($history_pembayaran->id_penjamin === null) : ?>
					<tr>
						<td></td>
						<td align="right" colspan="2">Tunai (Rp) : </td>
						<td align="right"><?= currency($history_pembayaran->serah) ?></td>
					</tr>
					<tr>
						<td></td>
						<td align="right" colspan="2">Kembalian (Rp) : </td>
						<td align="right"><?= currency($history_pembayaran->serah - $history_pembayaran->tunai - $history_pembayaran->pembulatan) ?></td>
					</tr>
				<?php endif; ?>
				<?php if ($jenis_kwitansi === "Piutang Pasien") : ?>
					<tr>
						<td></td>
						<td align="right" colspan="2">Telah Dibayar (Rp) : </td>
						<td align="right"><?= currency($piutang_dibayar) ?></td>
					</tr>
					<tr>
						<td></td>
						<td align="right" colspan="2">Piutang Tersisa (Rp) : </td>
						<td align="right"><?= ($total != 0 ? currency($total - $piutang_dibayar) : $total) ?></td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<br><br><br>
		<table width="100%">
			<tr>
				<td colspan="4">
					<?php
					if ($history_pembayaran->status === 'Batal') :
						echo '<span style="font-size:16px;font-weight:bold;">------- BATAL -------</span>';
					endif;
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2" width="50%" class="center">Kasir</td>
				<td colspan="2" width="50%" class="center">Pasien</td>
			</tr>
			<?php for ($i = 1; $i < 15; $i++) : ?>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"></td>
				</tr>
			<?php endfor; ?>
			<tr>
				<td colspan="2" width="50%" class="center">
					<?= $this->session->userdata('account_group') == 'Verifikator Casemix' ? '( Kasir : RSUD KOTA TANGERANG )' : '( ', $petugas_kasir, ' )'; ?>
				</td>
				<td colspan="2" width="50%" class="center">( <?= $pendaftaran['pasien']->nama ?> )</td>
			</tr>
			<?php for ($i = 1; $i < 10; $i++) : ?>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"></td>
				</tr>
			<?php endfor; ?>
			<tr>
				<td colspan="5" width="50%" class="left"><?= 'Cetakan ke: <b style="font-weight:bold;">' . ($history_pembayaran->cetakan + 1) . '</b> (' . $waktu_cetak . ')' ?></td>
			</tr>
		</table>
	</div>
</body>