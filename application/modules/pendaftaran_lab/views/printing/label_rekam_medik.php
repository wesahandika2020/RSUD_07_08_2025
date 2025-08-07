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
        padding-top: 2px;
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

    .tanggal_lahir, .umur, .agama, .jaminan {
        font-size: 14px;
        text-align: center;
        padding-top: 0px;
        padding-bottom: 0px;
        line-height: 110%;
        font-weight: bold;
    }

    #barcode {
        padding-top: 10px;
    }
</style>

<script src="<?= resource_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= resource_url() ?>assets/js/jquery-barcode.min.js"></script>
<script>
    // $(function() {
    //     $('#barcode').barcode("<?= $layanan['pasien']->id_pasien ?>", "code128", {
    //         barWidth: 2,
    //         barHeight: 35
    //     });
    // });

    function cetak() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 300);
    }
</script>

<title><?= $title; ?></title>

<body onload="cetak()">
    <!-- <body> -->
    <table width="90%">
        <tr>
            <td class="no_rm">
                <?= $layanan['pasien']->id_pasien; ?>
            </td>
        </tr>
        <tr>
            <td class="nama">
                <?= $layanan['pasien']->nama; ?>
            </td>
        </tr>
        <tr>
            <td class="tanggal_lahir">
                <?= datefmysql($layanan['pasien']->tanggal_lahir); ?>
            </td>
        </tr>
        <tr>
            <td class="umur">
                <?= hitungUmur($layanan['pasien']->tanggal_lahir); ?>
            </td>
        </tr>
        <tr>
            <td class="agama">
                <?= $layanan['pasien']->agama; ?>
            </td>
        </tr>
        <tr>
            <td class="jaminan">
                <?= $layanan['layanan']->penjamin === "" ? $layanan['layanan']->penjamin : $layanan['layanan']->cara_bayar; ?>
            </td>
        </tr>
         
    </table>
</body>