<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
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
        tambahCetakAntrean();
    }

    function tambahCetakAntrean() {

        let id = "<?= $admisi->id ?>";

        $.ajax({
            type: 'POST',
            url: '<?= base_url('antrian_bpjs/api/antrian_bpjs/tambah_cetak_antrean') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                if (!data.status) {
                    alert('Gagal menambah jumlah cetakan')
                }
            },
            error: function(e) {
                alert('Gagal menambah jumlah cetakan')
            }
        })
    }

</script>

<title><?= $title; ?></title>
<?php

function dateBPJS($dt)
{
    // $dt = 2013-03-06 00:00:00
    $var = explode(" ", $dt);
    return $var[0];
}

function timeBPJS($dt)
{
    // $dt = 2013-03-06 00:00:00
    $var = explode(" ", $dt);
    return $var[1];
}

if(date('Y-m-d') === dateBPJS($admisi->waktu_estimasi)){

    if(timeBPJS($admisi->waktu_estimasi) <= date('H:i:s')){

        $this->load->model('Antrian_bpjs_model', 'antrian');

        $tanggalPeriksa = $admisi->tanggal_kunjungan;

        $usia = $admisi->usia_pasien;

        $kodeBooking = $admisi->kode_booking;

        $cekAntrean = $this->antrian->hitungAntrean($tanggalPeriksa, $usia, $kodeBooking);

        date_default_timezone_set('Asia/Jakarta');

        $tanggalTunggu = (round(microtime(true) * 1000));

        $hitungCekAntrean = ((int)$cekAntrean * 120000) - 120000;

        $hitungAntrean = (int)$tanggalTunggu + (int)$hitungCekAntrean;

        $waktu_estimasi = date('d/m/Y H:i', ((int)$hitungAntrean)/1000);

        // $waktu_estimasi = datetimefmysql($admisi->tanggal_kunjungan).' '.date('H:i:s');

    } else {

        $waktu_estimasi = datetime($admisi->waktu_estimasi);

    }

} else {

    $waktu_estimasi = datetime($admisi->waktu_estimasi);

}


?>

<body onload="cetak()">
    <div class="print-area">
        <table width="100%">
            <tr>
                <td style="padding-left: 2%;">
                    <h2><?= $hospital->nama; ?></h2> <br />
                    <?= date('d/m/Y H:i') ?>
                </td>
            </tr>
            <tr>
                <td class="border" style="padding-left: 2%;">
                    <b style="font-size: 50px; font-weight: bold; font-family: 'Times New Roman', Times, serif"><?= preg_replace('/([a-zA-Z]+)(\d+)/', '$1-$2', $admisi->nomor_antrean) ?></b>
                </td>
            </tr>
            <tr>
                <td class="center" style="padding-left: 2%;">
                    <!-- Perkiraan dilayani <br /> -->
                    <!-- <!?= $waktu_estimasi ?> <br /> -->
                    <?= $admisi->poli ?><br />
                    Mohon menunjukan No. Antrian <br />
                    Anda kepada petugas <br />
                </td>
            </tr>
        </table>
    </div>
</body>
<?php die; ?>