<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
    }

    h1 {
        font-size: 12pt;
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
                <td></td>
                <td></td>
                <td style="display: flex;justify-content: center;"><b><?= $tracer->nama_pasien ?></b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="display: flex;justify-content: center;"><?= $tracer->no_rm ?></td>
            </tr>           
            <tr>
                <td></td>
                <td></td>
                <td style="display: flex;justify-content: center;"><?= $tracer->tanggal_daftar ?></td>
            </tr>
			<tr>
                <td></td>
                <td></td>
                <td style="display: flex;justify-content: center;"><?= $tracer->nama_dokter ?></td>
            </tr>
			<tr>
                <td></td>
                <td></td>
                <td style="display: flex;justify-content: center;"><?= $tracer->jenis_pendaftaran ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>
