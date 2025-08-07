<!-- <link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>"> -->
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
<style>
    body {
        height: auto;
        font-family: Arial;
    }

    @page {
		/* size: A4; */
        margin: 0.5cm !important;
	}

</style>

<script>
    function cetak() {
        window.print();
			setTimeout(function() {
				window.close()
			}, 10);
        tambahCetakAntrian();
    }

    function tambahCetakAntrian() {
        let id = "<?= $admisi->id ?>";
        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_lab/api/antrian_lab/tambah_cetak_antrian_lab') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    alert('Gagal menambah jumlah cetakan id='+ id)
                }
            },
            error: function(e) {
                alert('Gagal menambah jumlah cetakan id=='+ id+'; e='+e +'; data='+data)
            }
        })
    }

</script>

<title><?= $title; ?></title>
<body onload="cetak()">
    <div>
        <table width="100%">
            <tr>
                <td style="padding-left: 2%; font-size: 10px; text-transform: uppercase">
                    <h2 style="margin-bottom: 0px;">Antrian Laboratorium<br><?= $hospital->nama; ?></h2>      
                </td>
            </tr>
            <tr>
                <td class="border" style="padding-left: 2%;">
                    <b style="font-size: 50px; font-weight: bold;"><?= $admisi->nomor_antrian ?></b>
                </td>
            </tr>
            <tr>
                <td class="center" style="padding-left: 2%; ">
                    <b style="font-size: 15px; text-transform: uppercase"><?= $admisi->id_pasien ?><br><?= $admisi->nama_pasien ?></b><br />

					<?php if ($admisi->nama_poli !== 'Medical Check Up'): ?>
                        <p style="font-size: 13px;">
                            Hasil Lab akan dikirimkan melalui WhatsApp pada no <b style="font-size: 15px; margin:0px;"><?= $admisi->telp ?></b>. Jika no tersebut salah segera hubungi petugas.
                        </p>
                    <?php endif; ?>
					
                    <p style="font-size: 13px;">
                        Mohon menunjukan No. Antrian<br>
                        Anda kepada petugas
                    <p>
                    <p style="font-size: 12px; text-transform: capitalize">
                        <?php if( $admisi->created_date == date('d/m/Y H:i')) { 
                                    echo 'Tgl Antrian :'.  $admisi->created_date;
                                } else {
                                    echo 'Tgl Antrian :'. $admisi->created_date . '<br> Tgl Cetak :'.  date('d/m/Y H:i') ;  
                                }                            
                        ?>
                    <p>
                </td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>