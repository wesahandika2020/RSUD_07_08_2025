<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-label.css">
<script>
    function cetak() {
        window.print();
        setTimeout(() => {
            window.close()
        }, 300);
    }
</script>


<style>
    .container {
        display: flex;
        flex-direction: column;
        font-size: 15px;
        gap: .5rem;
    }

    .child {
        display: flex;
        gap: .5rem;
    }
</style>

<title><?= $title; ?></title>

<body onload="cetak()">
    <div class="container">
        <div class="child">
            <span>NO RM</span>
            <span>:</span>
            <span><b><?= $pasien->id; ?></b></span>
        </div>

        <div class="child">
            <span>NAMA</span>
            <span>:</span>
            <span><b><?= $pasien->nama; ?></b></span>
        </div>

        <div class="child">
            <span>TGL LAHIR</span>
            <span>:</span>
            <span><?= indo_tgl($pasien->tanggal_lahir) ?></span>
        </div>
        <div class="child">
            <span>JENIS KELAMIN</span>
            <span>:</span>
            <span><b><?= ($pasien->kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?></b></span>
        </div>
    </div>
</body>