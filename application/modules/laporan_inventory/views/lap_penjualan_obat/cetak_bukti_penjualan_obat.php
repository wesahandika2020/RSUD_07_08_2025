<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4-half.css">
<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .center {
        text-align: center;
    }

    .right {
        text-align: right;
    }

    b {
        font-weight: 600;
    }

    table .tabel-data {
        empty-cells: show;
        border-radius: 5px;
        border-spacing: 0;
        margin-top: 5px;
        clear: both;
        border-collapse: collapse;
        background: #fff;
        color: #000;
    }
</style>
<script>
    function cetak() {
        setTimeout(function() {
            window.close()
        }, 300);
        window.print();
    }
</script>
<title><?= $title ?></title>

<body onload="cetak()">
    <div class="page">
        <table width="100%" style="border-bottom: 3px solid black;">
            <tr>
                <td rowspan="3" style="width: 70px;"><img src="<?= resource_url() . 'images/logos/' . $hospital->logo ?>" width="70" height="70" alt="Logo RSUD"></td>
                <td colspan="3" class="center"><b><?= strtoupper($hospital->nama) ?></b></td>
                <td rowspan="3" style="width: 70px;">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" class="center"><b><?= strtoupper($hospital->alamat) ?></b></td>
            </tr>
            <tr>
                <td colspan="3" class="center"><b>TELP. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?>, EMAIL : <?= $hospital->email ?></b></td>
            </tr>
        </table>
        <div class="center" style="margin-top: 15px; margin-bottom: 15px"><b>BUKTI PEMAKAIAN OBAT-OBATAN (<?= $list->id ?>)</b></div>
        <table width="100%" style="margin-bottom: 15px;">
            <tr>
                <td width="20%">Tanggal / Jam</td>
                <td width="1%">:</td>
                <td width="79%"><?= datetimefmysql($list->waktu, true) ?></td>
            </tr>
            <tr>
                <td>Nama / No. RM</td>
                <td>:</td>
                <td><?= $list->pasien ?> / <?= $list->id_pasien ?></td>
            </tr>
        </table>
        <table width="100%" border="1" style="border-collapse: collapse">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>URAIAN</th>
                    <th>JML</th>
                    <th class="right">HJA</th>
                    <th class="right">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                foreach ($detail as $i => $data) : ?>
                    <tr>
                        <td class="center"><?= ++$i ?></td>
                        <td><?= $data->nama_barang ?></td>
                        <td class="center"><?= $data->jumlah_pakai ?></td>
                        <td class="right"><?= formatcurrency($data->harga_jual, 'IDR') ?></td>
                        <td class="right"><?= formatcurrency($data->jumlah_pakai * $data->harga_jual, 'IDR') ?></td>
                    </tr>
                <?php $total = $total + ($data->jumlah_pakai * $data->harga_jual);
                endforeach ?>
            </tbody>
        </table>

        <?php foreach ($detail as $j => $val); ?>
        <div style="margin-top: 15px">TOTAL : Rp. <?= formatcurrency($total, 'IDR') ?></div>
        <div style="margin-bottom: 15px">( <?= terbilang($total, true) ?> Rupiah )</div>

        <span style="float: left;">Yang Menyerahkan</span><span style="float: right; margin-right: 30px;">Yang Menerima</span>
        <br><br><br><br><br>
        <span style="float: left;">( ................................ )</span>
        <span style="float: right; margin-right: 30px;">( ................................ )</span><br>
        <span style="float: left;">Petugas : <?= $this->session->userdata('nama') ?></span>
        <span style="float: right; margin-right: 30px;"><?= $list->depo ?></span><br><br>
        <div class="center"><b>-- TERIMA KASIH SEMOGA LEKAS SEMBUH --</b></div>
    </div>
</body>