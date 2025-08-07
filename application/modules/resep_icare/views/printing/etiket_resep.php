<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-etiket.css">
<script>
    function cetak() {
        setTimeout(function() { window.close() }, 300);
        window.print();  
    }
</script>
<style type="text/css">
    .judul {
        font-weight: bold;
        padding: 0 0 0 0;
    }
    .garis_bawah {
        border-bottom: 2px solid #000;
        margin: 0 0 0 0;
    }
    .marnol {
        margin: 0 0 0 0;
    }
    .padnol {
        padding: 0 0 0 0;
    }
    .center {
        text-align: center;
    }
    .right {
        text-align: right;
    }
</style>

<title><?= $title ?></title>

<?php foreach ($list as $i => $data) : ?>
<body onload="cetak()">
    <div class="page">
        <table width="100%" class="garis_bawah">
            <tr><td class="judul center" style="font-size: 13px;">INS. FARMASI RSUD KOTA TANGERANG</td></tr>
        </table>
        <table width="100%" class="marnol">
            <tr>
                <td width="19%" class="padnol"></td>
                <td width="1%" class="padnol"></td>
                <td width="25%" class="padnol"></td>
                <td width="15%" class="padnol"></td>
                <td width="40%" class="padnol"></td>
            </tr>
            <tr>
                <td class="judul">No. R</td>
                <td class="judul">:</td>
                <td class="judul"><?= $data->id; ?></td>
                <td class="judul center" colspan="2"><?= dateconvertfjs(datetimefmysql($data->waktu)); ?></td>
            </tr>
            <tr>
                <td colspan="5" class="judul center" style="font-size: 13px;"><?= $data->pasien; ?></td>
            </tr>
            <tr>
                <td colspan="5" class="center" style="font-weight: bold; padding: 0 0 0 0;"><?= $data->no_rm ?> - <?= dateconvert($data->tanggal_lahir) ?> - <?= hitungUmurJustTahun($data->tanggal_lahir) ?></td>
            </tr>
            <!--<tr>
                <td colspan="3" style="font-weight: bold; padding: 0 0 0 0; font-size: 11px;"><?= dateconvert($data->tanggal_lahir) ?></td>
                <td colspan="2" align="right" style="padding: 0 0 0 0; font-weight: bold; font-size: 11px;"><?= hitungUmurJustTahun($data->tanggal_lahir) ?></td>
            </tr>-->
        </table>
        <table width="95%">
                <?php foreach ($data->detail_barang as $val) : ?>
                    <tr>
                        <td class="judul center" style="font-size: 13px;"><?= $val->nama ?> <?= $val->kekuatan ?> <?= $val->satuan_kekuatan ?></td><td></td>
                    </tr>
                <?php endforeach ?>
        </table>
        <table width="100%">
            <tr><td class="judul center" style="font-size: 13px;"><?= $data->ket_aturan_pakai ?></td></tr>
            <tr><td class="judul center" style="font-size: 11px;"><?= $data->admin_time ?> <?= (($data->timing !== '')?$data->timing.' MAKAN':'') ?></td></tr>
        </table>
    </div>
</body>
<?php endforeach ?>