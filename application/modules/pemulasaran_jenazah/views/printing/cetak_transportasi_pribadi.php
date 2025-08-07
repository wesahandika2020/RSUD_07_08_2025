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
                <table class="no__border big__line__spacing small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title no__border" colspan="5">SURAT PERNYATAAN PENGGUNAAN TRASNPORTASI JENAZAH PRIBADI</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="no__border" colspan="5">Yang bertandatangan dibawah ini : </td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Nama Penanggung Jawab</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->nama_penanggung_jawab ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Tempat Lahir</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->tempat_lahir_pj ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Umur/Tanggal Lahir</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->umur_tanggal_lahir_pj ?></b></td>
                        </tr>                       
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Alamat</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->alamat_pj ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Hubungan Keluarga</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->hubungan_keluarga ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">No. Telepon</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->tlp_pj ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">Menyatakan telah melakukan pengantaran dengan menggunakan alat transportasi pribadi atau yang ditunjuk dan bersedia menanggung segala resiko yang terjadi selama dalam perjalanan terhadap jenazah atas nama : </td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Nama Jenazah</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->nama_pasien ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Tempat Lahir</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->tempat_lahir_pasien ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Tanggal Lahir</td>
                            <td class="no__border" colspan="3">: <b><?= ($pemulasaran_jenazah->tanggal_lahir_pasien !== '' ? datefmysql($pemulasaran_jenazah->tanggal_lahir_pasien) : '-') ?>
					            (<?= createUmur2($pemulasaran_jenazah->tanggal_lahir_pasien) ?> Tahun)</b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Alamat</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->alamat_pasien ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="2" width="30%">Jam Keluar</td>
                            <td class="no__border" colspan="3">: <b><?= $pemulasaran_jenazah->waktu_pengantaran ?> WIB</b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="5">Demikian surat ini kami buat untuk dipergunakan dengan sebagaimana mestinya. </td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3" width="60%"></td>
                            <td class="no__border" colspan="2" align="right">Tangerang, <b><?php echo @date('d/m/Y'); ?></b></td>
                        </tr>                       
                    </tbody>
                </table>     
                <td><br><br><br><br><br></td>
                <table class="no__border big__line__spacing small__font">
                    <tbody>
                        <tr>
                            <td class="no__border" width="50%" align="center">Pemberi Informasi <br> <br> <br>(<b><?= $this->session->userdata('nama'); ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                            <td class="no__border" width="50%" align="center">Pemberi Pernyataan <br> <br> <br>(<b><?= $pemulasaran_jenazah->nama_pjwb ?></b>) <br> <font size="1rem">Nama jelas dan tanda tangan</font></td>
                        </tr>
                    </tbody>     
                </table>                      
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-IPJ-022-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
