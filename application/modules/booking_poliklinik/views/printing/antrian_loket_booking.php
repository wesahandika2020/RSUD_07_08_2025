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
                <td class="border" style="padding-left: 2%;text-align: center;">
                    <b style="font-size: 50px; font-weight: bold; font-family: 'Times New Roman', Times, serif">
                        <?= preg_replace('/([a-zA-Z]+)(\d+)/', '$1-$2', $admisi->nomor_antrean) ?>
                    </b>
                </td>
            </tr>
			<tr>
				<td class="border">
					<div style="display: flex; flex-direction: column; align-items: center">
						<span><b style="font-size: 17px;">Kode Booking: <?= $admisi->kode_booking ?></b></span>
						<!-- <img class="qrcode" src="<!?php echo site_url('pendaftaran_poli/generate_qrcode/' . $admisi->kode_booking); ?>" alt="QRCode - <!?= $admisi->kode_booking ?>"> -->
					</div>
				</td>
			</tr>
			<tr>
				<td>

				</td>
			</tr>
			<tr>
                <td class="center" style="padding-left: 2%;text-align: center;">
                    <!-- Perkiraan dilayani <br /> -->
                    <!-- <!?= $waktu_estimasi ?> <br /> -->
                    <b style="font-size: 14px;"><?= $admisi->poli ?></b><br />
					<span style="text-align: center;"><b style="font-size: 17px; font-weight: bold;text-transform: none;"><?= $admisi->nama_dokter ?></b></span><br />
                    Mohon menunjukan No. Antrian <br />
                    Anda kepada petugas <br />
                </td>
            </tr>
		</table>
	</div>
</body>
<?php die; ?>