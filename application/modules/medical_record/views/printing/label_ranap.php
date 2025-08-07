<style>
    *, body { font-family: Arial; }
    body { width: 6cm; height: 4cm; padding-left: 7mm;}

    @page{
        margin: 2mm;
    }

    .container {
        display: flex;
        flex-direction: column;
        font-size: 16px;
        gap: .5rem;
    }

    .child {
        display: flex;
        gap: .5rem;
    }
</style>

<script>
    function cetak() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 300);
    }
</script>

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
            <span>AGAMA</span>
            <span>:</span>
            <span><?= $pasien->agama ?></span>
        </div>

        <div class="child">
            <span>JENIS KELAMIN</span>
            <span>:</span>
            <span><?= $pasien->kelamin === 'L' ? 'Laki-laki' : 'Perempuan' ?></span>
        </div>
    </div>
</body>