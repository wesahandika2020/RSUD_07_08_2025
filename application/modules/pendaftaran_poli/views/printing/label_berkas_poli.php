<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
    }

    h1 {
        font-size: 30px;
    }

    table {
        width: 3.025in; /* plus .6 inches from padding */
        height: 1.875in; /* plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

        float: left;

        text-align: left;
        overflow: hidden;
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
        <table width="50%">           
            <tr>
                <td width="30%">No.RM</td>
                <td width="1%">:</td>
                <td width="69%"><b><?= $pasien->no_rm ?></b></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $pasien->nama ?></td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td>:</td>
                <td><?= tanggal_indo($pasien->tanggal_lahir, true) ?></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td><?= hitungUmur($pasien->tanggal_lahir) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $pasien->kelamin ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $pasien->agama ?></td>
            </tr>                     
        </table>
    </div>
</body>
<?php die; ?>