<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
            </div>            
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="persetujuan__tindakan__anestesi">
			<br>
            <div class="persetujuan__tindakan__anestesi__container container">
                <table class="big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="3">PERSETUJUAN TINDAKAN ANESTESI</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="no__border" colspan="3">Saya yang bertanda tangan ini, Nama <b style="text-transform:uppercase"><?= $ttd_pasien_name; ?></b> Tanggal lahir <b><?= $ttd_pasien_tgl_lahir; ?></b> <b style="text-transform:uppercase"><?= $ttd_pasien_kelamin; ?></b>, Alamat <b style="text-transform:uppercase"><?= $ttd_pasien_alamat; ?></b> Dengan ini menyatakan persetujuan untuk dilakukan tindakan <b style="text-transform:uppercase"><?= $persetujuan_tindakan_anestesi->tindakan; ?></b> Terhadap <b style="text-transform:uppercase"><?= $ttd_pasien_title; ?></b>, yang bernama <b><?= $pasien->nama; ?></b> Tanggal lahir <b><?= datefmysql($pasien->tanggal_lahir); ?></b> <b style="text-transform:uppercase"><?= $pasien->kelamin; ?></b>, Alamat <b style="text-transform:uppercase"><?= $pasien->alamat; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">Saya memahami perlunya dan manfaat tindakan tersebut sebagaimana telah dijelaskan seperti atas kepada saya, termasuk resiko dan komplikasi yang timbul.</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">Saya juga menyadari bahwa oleh karena ilmu kedokteran bukanlah ilmu pasti, maka keberhasilan tindakan kedokteran bukanlah keniscayaan, melainkan sangat bergantung keapada izin Tuhan Yang Maha Esa.</td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">Tangerang, Tanggal <b><?= date("d/m/Y H:i", strtotime($persetujuan_tindakan_anestesi->updated_on)); ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%" align="center">Yang menyatakan <br> <br> <br>(<b style="text-transform:uppercase"><?= $ttd_pasien_name; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                            <td class="no__border" width="25%" align="center">Saksi 1 <br> <br> <br>(<b><?= $persetujuan_tindakan_anestesi->nama_saksi_1; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                            <td class="no__border" width="25%" align="center">Saksi 2 <br> <br> <br>(<b><?= $persetujuan_tindakan_anestesi->nama_saksi_2; ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-REM-32-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
