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
                    <h2><?= $hospital->nama; ?></h2> <br />
                    <?= date('d/m/Y H:i:s') ?>
                </td>
            </tr>
            <tr>
                <td class="border">
                    <b style="font-size: 25px; font-weight: bold;"><?= $admisi->nomor_antrean ?></b>
                </td>
            </tr>
            <tr>
                <td class="center">
                    <?= $admisi->no_rm ?> - <?= $admisi->nama_pasien ?> - <?= $admisi->poli ?><br />
                    Mohon menunggu, Obat akan diserahkan <br />
                    oleh petugas sesuai dengan No. Antrian Anda <br />
                </td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>
