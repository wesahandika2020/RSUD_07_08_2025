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
                    <h2><?= $hospital->nama ?></h2>
                    <?= $layanan->dokter ?><br />
                    <?= $layanan->layanan ?> <br />
                    <?= datetimefmysql($layanan->tanggal_layanan) ?>
                </td>
            </tr>
            <tr>
                <td class="border">
                    <b style="font-size: 25px; font-weight: bold;"><?= $layanan->no_antrian ?></b>
                </td>
            </tr>
            <tr>
                <td class="border">
                    <?= $pasien->nama ?><br />
                    <?= $pasien->id_pasien ?>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>