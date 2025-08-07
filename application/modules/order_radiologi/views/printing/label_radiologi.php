<style>
	*,
	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	body {
        height: auto;
        width: auto;
		/* width: 130mm;
		height: 20mm;
		padding-left: 30mm; */
		/* padding-top: 3mm; */
	}

	@page {
		/* size: A4; */
        margin: 0.5cm !important;
	}

	table {
		/* text-transform: uppercase; */
		/* border: 1px solid; */
		border-radius: 10px;
		padding: 1rem;
	}

	.f24 {
        font-size: 24px;
        font-weight: bold;
    }

    .f22 {
        font-size: 22px;
        font-weight: bold;
    }

    .f20 {
        font-size: 20px;
        font-weight: bold;
    }

    .f18 {
        font-size: 18px;
        font-weight: bold;
    }

    .f16 {
        font-size: 16px;
        font-weight: bold;
    }

    .f12 {
        font-size: 12px;
    }
</style>
<title><?= $title; ?></title>

<body onload="window.print()">
    <table width="100%">
        <tr>
            <td class="f12" width="5%">No Antrian</td>
            <td class="f12" width="1%">:</td>
            <td class="f12" width="69%">
                <?php if ($antrian != NULL ) : ?>
                    <?= $antrian->nomor_antrian_terbaru; ?>        
                <?php else: ?> 
                    <i>Belum ambil antrian</i>             
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td class="f12">No RM</td>
            <td class="f12">:</td>
            <td class="f12"><?= $order_radiologi->no_rm; ?></td>
        </tr>
        <tr>
            <td class="f12">Nama</td>
            <td class="f12">:</td>
            <td class="f12"><?= $order_radiologi->pasien; ?> / <?= $order_radiologi->kelamin; ?></td>
        </tr>
        <tr>
            <td class="f12">Tgl Lahir</td>
            <td class="f12">:</td>
            <td class="f12"><?= indo_tgl($order_radiologi->tanggal_lahir) ?></td>
        </tr>
		<tr>
            <td class="f12">Umur</td>
            <td class="f12">:</td>
            <td class="f12"><?= hitungUmur($order_radiologi->tanggal_lahir) ?></td>
        </tr>
		<tr>
            <td class="f12">Tgl Pemeriksaan</td>
            <td class="f12">:</td>
            <td class="f12"><?= date("d F Y H:i", strtotime($order_radiologi->waktu_order)) ?></td>
        </tr>
        <tr>
            <td class="f12">Penjamin</td>
            <td class="f12">:</td>
            <td class="f12"><?= $order_radiologi->penjamin; ?></td>
        </tr>
		<tr>
            <td class="f12">Dr Pengirim</td>
            <td class="f12">:</td>
            <td class="f12"><?= $order_radiologi->dokter; ?></td>
        </tr>
		<tr>
            <td class="f12">Ruangan</td>
            <td class="f12">:</td>
            <td class="f12"><?= $order_radiologi->jenis_layanan; ?> <?= $order_radiologi->layanan; ?></td>
        </tr>
		<tr>
            <td class="f12">Pemeriksaan</td>
            <td class="f12">:</td>
            <td class="f12">
				<?php foreach($order_radiologi->item_pemeriksaan as $item_pemeriksaan) { ?>
					- <?= $item_pemeriksaan->layanan; ?><br>
				<?php } ?>
			</td>
        </tr>
        <tr>
            <td>.</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
