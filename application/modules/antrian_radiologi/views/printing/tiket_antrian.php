<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
<style>
    body {
        height: auto;
    }

    @page {
		/* size: A4; */
        margin: 0.5cm !important;
	}

</style>

<script>
    function cetak() {
        window.print();
        // setTimeout(function() {
        //     window.close()
        // }, 500);
        tambahCetakAntrian();
    }

    function tambahCetakAntrian() {

        let id = "<?= $admisi->id ?>";

        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_radiologi/api/antrian_radiologi/tambah_cetak_antrian_radiologi') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    alert('Gagal menambah jumlah cetakan id='+ id)
                }
            },
            error: function(e) {
                alert('Gagal menambah jumlah cetakan id=='+ id)
            }
        })
    }

</script>

<title><?= $title; ?></title>
<body onload="cetak()">
    <div class="print-area">
        <table width="100%">
            <tr>
                <td style="padding-left: 2%;">
                    <h2><?= $hospital->nama; ?></h2> <br />                      
                </td>
            </tr>
            <tr>
                <td class="border" style="padding-left: 2%;">
                    <b style="font-size: 50px; font-weight: bold;"><?= $admisi->nomor_antrian ?></b>
                </td>
            </tr>
            <tr>
                <td class="center" style="padding-left: 2%;">
                    <b style="font-size: 15px;">Radiologi - <?= $admisi->ruang_radiologi ?></b><br />
                    <b style="font-size: 15px;"><?= $admisi->id_pasien ?> -  <?= $admisi->nama_pasien ?></b><br />
                    <p style="font-size: 15px; margin:0px; text-transform: capitalize">
                        Mohon menunjukan No. Antrian<br>
                        Anda kepada petugas
                    <p>
                    <p style="font-size: 12px; margin:0px; text-transform: capitalize">
                        Tgl Antrian : <?= $admisi->created_date2 ?><br>
                        Tgl Cetak : <?= date('d/m/Y H:i') ?> 
                    <p>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>