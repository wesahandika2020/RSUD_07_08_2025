<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-struk.css' ?>">
<style>
    body {
        height: auto;
    }

    .print-area {
        margin: auto;
    }

    table {
        margin-left: auto;
        margin-right: auto;
    }

    p {
        margin-top: -15px;
        font-size: 9px !important;
    }

    .center {
        text-align: center;
    }

    .mr-30 {
        margin-right: 30px;
    }

    .qrcode {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    hr {
        border: 0.5px solid black;
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
        <!-- Header -->
        <table width="100%">
            <tr>
                <td>
                    <img src="<?= resource_url() ?>/images/logos/logo-rsud.png" alt="Logo RSUD" width="50" /><br />
                </td>
                <td>
                    <h2><?= $hospital->nama ?></h2>
                    <br>
                    <p><?= $hospital->alamat ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
        </table>
        <!-- End Header -->

        <!-- Content -->
        <table width="100%">
            <tr>
                <td colspan="3">
                    <h1 class="center">BUKTI KUNJUNGAN</h1>
                </td>
            </tr>
            <tr>
                <td width="40%">No. Antrian</td>
                <td widht="1%">:</td>
                <td width="59%"><span style="font-size: 16px; font-weight: bold">A.129</span></td>
            </tr>
            <tr>
                <td>No. RM</td>
                <td>:</td>
                <td><?= $pasien->no_rm; ?></td>
            </tr>
            <tr>
                <td>Jenis Pasien</td>
                <td>:</td>
                <td><?= $pasien->status; ?></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><?= $pasien->nama; ?></td>
            </tr>
            <tr>
                <td>Poli</td>
                <td>:</td>
                <td><?= $pelayanan->layanan; ?></td>
            </tr>
            <tr>
                <td>Poli Perujuk</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Status Pasien</td>
                <td>:</td>
                <td><?= $pelayanan->status_pasien; ?></td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>:</td>
                <td><?= $pelayanan->dokter; ?></td>
            </tr>
            <?php $waktu = explode(' ', $pasien->tanggal_daftar) ?>
            <tr>
                <td>Tgl. Kunjungan</td>
                <td>:</td>
                <td><?= datefmysql($waktu[0]) ?></td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>:</td>
                <td><?= $waktu[1] ?></td>
            </tr>
            <tr>
                <td>Petugas</td>
                <td>:</td>
                <td><?= $pelayanan->petugas ?></td>
            </tr>
        </table>
        <!-- End Content -->

        <!-- QR Code -->
        <img class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode/' . $pasien->no_rm); ?>" alt="QRCode - <?php $pasien->no_rm ?>">
        <!-- End QR Code -->

        <!-- Notification -->
        <table>
            <tr>
                <td colspan="3">
                    <?php if ($pelayanan->status_pasien == 'UMUM') : ?>
                        <h3 class="center">Perhatian : Harap melakukan pembayaran registrasi terlebih dahulu dikasir, sebelum anda melakukan pemeriksaan ke poliklinik</h3>
                    <?php endif ?>
                </td>
            </tr>
        </table>
        <!-- End Notification -->
    </div>
</body>
<?php die; ?>