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
            <td class="border">
                <b style="font-size: 20px; font-weight: bold;"><?= $admisi->kode_booking ?></b>
            </td>
        </tr>
        <tr>
            <td class="center">
                <?= $admisi->no_rm ?> - <?= $admisi->nama_pasien ?><br />
                Struk ini sebagai bukti <br />
                Anda telah melakukan Booking <?= $admisi->is_kontrol_pasca_ranap == 1 ? 'Kontrol Pasca Rawat Inap' : '' ?><br />
            </td>
        </tr>
        <tr>
            <td>

            </td>
        </tr>
        <tr>
            <td class="border">
                Silahkan Melakukan Check-In Pada Tanggal: <br>
                <b style="font-size: 17px; font-weight: bold;"><?= $admisi->poli ?> - <?= $admisi->nama_dokter ?></b> <br>
                <?php
                if ($admisi->id_penjamin === '1') {
                    $penjamin = 'BPJS';
                } elseif ($admisi->id_penjamin === '9') {
                    $penjamin = 'Umum';
                } else {
                    $penjamin = '';
                }
                ?>
                <b style="font-size: 17px; font-weight: bold;"><?= date('d/m/Y', strtotime($admisi->tanggal_kunjungan)) ?> - <?= $admisi->nama_penjamin  ?></b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Bukti booking jangan sampai hilang</b><br>
                <b>Silahkan melakukan checkin APM sesuai tanggal rencana kontrol</b><br>
                <?php if (!empty($estimasi)) : ?>
                    <b style="font-size: 14px">Waktu Check-in <?= $estimasi->estimated_time_start ?> WIB - <?= $estimasi->estimated_time_end ?> WIB</b>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>
</body>
<?php die; ?>
