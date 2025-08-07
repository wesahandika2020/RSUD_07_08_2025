<?php if ($size == "1") : ?>
    <link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-label.css">
<?php else : ?>
    <link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-gelang.css">
<?php endif ?>

<style>
    table {
        margin-top: -15px;
    }

    .no_rm {
        font-size: 16px;
        text-align: center;
        padding-top: 10px;
        padding-bottom: 0px;
        line-height: 110%;
        font-weight: bold;
    }

    .nama {
        font-size: 14px;
        text-align: center;
        padding-top: 0px;
        padding-bottom: 0px;
        line-height: 110%;
        font-weight: bold;
    }

    .tanggal_lahir, .umur, .agama {
        font-size: 14px;
        text-align: center;
        padding-top: 0px;
        padding-bottom: 0px;
        line-height: 110%;
    }

    #barcode {
        padding-top: 10px;
    }
</style>

<script src="<?= resource_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= resource_url() ?>assets/js/jquery-barcode.min.js"></script>
<script>
    $(function() {
        $('#barcode').barcode("<?= $pasien->id ?>", "code128", {
            barWidth: 2,
            barHeight: 35
        });
    });

    function cetak() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 300);
    }
</script>

<title><?= $title; ?></title>

<body onload="cetak()">
    <table width="90%">
        <tr>
            <td class="no_rm">
                <?= $pasien->id; ?>
            </td>
        </tr>
        <tr>
            <td class="nama">
                <?= $pasien->nama; ?> / <?= $pasien->kelamin; ?>
            </td>
        </tr>
        <tr>
            <td class="tanggal_lahir">
                <center>
                <?= datefmysql($pasien->tanggal_lahir); ?>
                </center>
            </td>
        </tr>
        <tr>
            <td class="umur">
                <center>
                <?= hitungUmur($pasien->tanggal_lahir); ?>
                </center>
            </td>
        </tr>
        <tr>
            <td class="agama">
            <center>
                <?= $pasien->agama; ?>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <img class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_barcode/' . $pasien->id); ?>" alt="Barcode - <?php $pasien->id ?>">
                </center>
            </td>
        </tr>
    </table>
</body>