<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<style>
	body {
		height: auto;
	}
</style>

<script>
	function cetak() {
		window.print();
		setTimeout(function() {
			window.close()
		}, 500);
	}
</script>

<title><?= $title; ?></title>

<body onload="cetak()">
	<div class="print-area">
		<table width="100%">
			<tr>
				<td>
					<h2 style="text-align: center; margin:0;"><?= $hospital->nama; ?></h2>
					<p style="text-align: center; margin:0;"><?= date('d/m/Y H:i:s') ?></p> <br />
				</td>
			</tr>
			<tr>
				<td class="border">
					<div style="display: flex; flex-direction: column; align-items: center">
						<span style="text-align:center;"><b style="font-size: 13px;"><?= $admisi->nama_pasien ?> (No. RM: <?= $admisi->no_rm ?>)</b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td class="border">
					<div style="display: flex; flex-direction: column; align-items: center">
						<span style="text-align:center;"><b style="font-size: 17px;">No Kartu: <?= $admisi->no_kartu ?></b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td class="border">
					<div style="display: flex; flex-direction: column; align-items: center">
						<span><b style="font-size: 17px;">Kode Booking: <?= $admisi->kode_booking ?></b></span>
						<img class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode/' . $admisi->kode_booking); ?>" alt="QRCode - <?= $admisi->kode_booking ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>

				</td>
			</tr>
			<tr>
				<td class="border">
					<div style="display: flex; flex-direction: column; align-items: center">
						<span style="text-align: center;"><b style="font-size: 17px; font-weight: bold;"><?= $admisi->poli ?> - <?= $admisi->shift_poli ?></b></span>
						<span style="text-align: center;"><b style="font-size: 17px; font-weight: bold;"><?= $admisi->nama_dokter ?></b></span>
						<span><b style="font-size: 13px; font-weight: bold;"><?= convertDateIndo($admisi->tanggal_kunjungan) ?> - <?= $admisi->nama_penjamin  ?></b></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div style="display: flex; flex-direction: column; align-items: center">
						<span><b style="font-size: 9px">Jika terjadi kendala silahkan hubungi bag. humas</b></span>
						<span><b style="font-size: 9px">Di Nomor: 0812-8070-3360 / 0811-9232-421</b></span>
						<span><b style="font-size: 7px">Bukti booking jangan sampai hilang</b></span>
<!--						<!?php if (!empty($estimasi)) : ?>-->
<!--							<span><b>Waktu Check-in <!?= $estimasi->estimated_time_start ?> WIB - <!?= $estimasi->estimated_time_end ?> WIB</b></span>-->
<!--						<!?php endif; ?>-->
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
<?php die; ?>