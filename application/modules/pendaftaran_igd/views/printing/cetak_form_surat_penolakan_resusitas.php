<!-- // PRDNR FORM -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<title>Document</title>
<body onload="window.print()">
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                    Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="penolakan_resusitas">
			<br>
            <div class="penolakan_resusitas__container container">
                <!-- <table class="big__line__spacing small__font" style="font-size: 14px;"> -->
                <table class="big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="4">PENOLAKAN RESUSITAS / DO NOT RESUSCITATE (DNR)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="no__border" colspan="3">Saya yang bertanda tangan ini, Nama <b style="text-transform:uppercase"><?= $ttd_pasien_name; ?></b> Tanggal lahir <b><?= $ttd_pasien_tgl_lahir; ?></b> <b style="text-transform:uppercase"><?= $ttd_pasien_kelamin; ?></b>, Alamat <b style="text-transform:uppercase"><?= $ttd_pasien_alamat; ?></b> Dengan ini menyatakan penolakan untuk dilakukan tindakan <b style="text-transform:uppercase"><?= $penolakan_resusitas->tindakan_prdnr; ?></b> Terhadap <b style="text-transform:uppercase"><?= $ttd_pasien_title; ?></b> saya*, yang bernama <b><?= $penolakan_resusitas->nama_pasien; ?></b> Tanggal lahir <b><?= datefmysql($penolakan_resusitas->tanggal_lahir_pasien); ?></b> <b style="text-transform:uppercase"><?= $penolakan_resusitas->kelamin_pasien; ?></b>, Alamat <b style="text-transform:uppercase"><?= $penolakan_resusitas->alamat_pasien; ?></b></td>
                        </tr>

                        <tr>
                            <td class="no__border" colspan="4">Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti atas kepada saya, termasuk resiko dan komplikasi yang timbul apabila tindakan tersebut tidak dilakukan.</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="4">Saya juga menyadari bahwa kehidupan dan kematian sangat bergantung kepada izin Tuhan Yang Naha Esa.</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">Tangerang, Tanggal <b><?= date("d/m/Y H:i", strtotime($penolakan_resusitas->updated_on)); ?></b></td>
                        </tr>
                        <p>
                        <tr>
                            <td class="no__border" width="25%" align="center">Yang menyatakan <br> <br> <br>(<b style="text-transform:uppercase"><?=$ttd_pasien_name; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                            <td class="no__border" width="25%" align="center">Dokter <br> <br> <br>(<b><?= $penolakan_resusitas->dokter; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                        </tr>
                        <br>
                        <tr>
                            <td class="no__border" width="25%" align="center">Saksi 1 <br> <br> <br>(<b><?= $penolakan_resusitas->perawat_1; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                            <td class="no__border" width="25%" align="center">Saksi 2 <br> <br> <br>(<b><?= $penolakan_resusitas->perawat_2; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-REM-113-00</p>
        </section>
    </main>
</body>
<?php die; ?>
