<meta charset="UTF-8">
<!-- // KEMATIAN -->
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
		<section class="surat__keterangan__kematian">
            <br>
            <div class="surat__keterangan__kematian__container container">
                <table class="no__border small__font">
                    <tbody>
                        <tr>
                            <td class="no__border" colspan="3" align="center"><b>SURAT KETERANGAN KEMATIAN</b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3" align="center"><b>Nomor : <b><?= $surat_keterangan_kematian->nomor_surat_kematian; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="30%" colspan="2">Nomor Urut Kematian Bulan Ini</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->nomor_urut_kematian; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="30%" colspan="2">Nomor Register (RM)</td>
                            <td class="no__border">: <b><?= $pasien->no_rm; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" colspan="3">Kami menerangkan bahwa</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="30%" colspan="2">Nama Lengkap</td>
                            <td class="no__border">: <b><?= $pasien->nama; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">1</td>
                            <td class="no__border" width="28%">Jenis Kelamin</td>
                            <td class="no__border">: <b><?= $pasien->kelamin; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">2</td>
                            <td class="no__border" width="28%">Umur</td>
                            <td class="no__border">: <b><?= hitungUmur($pasien->tanggal_lahir) ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">3</td>
                            <td class="no__border" width="28%">Alamat Tempat Tinggal</td>
                            <td class="no__border">: <b><?= $pasien->alamat; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">4</td>
                            <td class="no__border" width="28%">Kelurahan/Desa</td>
                            <td class="no__border">: <b><?= $pasien->kelurahan; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">5</td>
                            <td class="no__border" width="28%">Kecamatan</td>
                            <td class="no__border">: <b><?= $pasien->kecamatan; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">6</td>
                            <td class="no__border" width="28%">Kabupaten/Kota</td>
                            <td class="no__border">: <b><?= $pasien->kabupaten; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">7</td>
                            <td class="no__border" width="28%">Nomor Pokok Penduduk</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->nomor_kk; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">8</td>
                            <td class="no__border" width="28%">Nomor Kartu Penduduk</td>
                            <td class="no__border">: <b><?= $pasien->no_identitas; ?> </b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">9</td>
                            <td class="no__border" width="28%">Waktu Meninggal</td>
                            <td class="no__border">: <b><?= date('d/m/Y H:i', strtotime($surat_keterangan_kematian->waktu_meninggal)); ?></b></td>
                            <!-- <td class="no__border">: <b><!?= date('d/m/Y', strtotime($surat_keterangan_kematian->waktu_meninggal)) . ' ' . date('H:i'); ?></b></td> -->


                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">10</td>
                            <td class="no__border" width="28%">Tempat Meninggal</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->tempat_meninggal; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">11</td>
                            <td class="no__border" width="28%">Alamat Tempat Meninggal</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->alamat_meninggal; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">12</td>
                            <td class="no__border" width="28%">Waktu Pemeriksaan</td>
                            <!-- <td class="no__border">: <b><!?= date('d/m/Y H:m', strtotime($surat_keterangan_kematian->waktu_pemeriksaan)); ?></b></td> -->
                            <!-- <td class="no__border">: <b><!?= date('d/m/Y', strtotime($surat_keterangan_kematian->waktu_pemeriksaan)) . ' ' . date('H:i'); ?></b></td> -->
                            <td class="no__border">: <b><?= date('d/m/Y H:i', strtotime($surat_keterangan_kematian->waktu_pemeriksaan)); ?></b></td>


                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">13</td>
                            <td class="no__border" width="28%">Jenis Pemeriksaan (*)</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->jenis_pemeriksaan; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">14</td>
                            <td class="no__border" width="28%">Sebab Kematian (Menurut Dokter/Polisi)</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->sebab_kematian; ?></b></td>
                        </tr>                        
                        <tr>
                            <td class="no__border" width="2%" align="center">15</td>
                            <td class="no__border" width="28%">Kode Kematian (ICD X)</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->kode_kematian; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">16</td>
                            <td class="no__border" width="28%">Akan dikubur/dikremasi</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->dikubur; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="2%" align="center">17</td>
                            <td class="no__border" width="28%">Jenazah di (*)</td>
                            <td class="no__border">: <b><?= $surat_keterangan_kematian->awetkan == 1 ? 'Diawetkan' : 'Tidak diawetkan'; ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <table class="no__border small__font">
                    <tbody>
                        <tr>
                            <td class="no__border" width="35%" align="center">Yang memberi Keterangan / Melapor <br><br><br><br><br><br></td>
                            <td class="no__border" width="30%"></td>
                            <td class="no__border" width="35%" align="center">Yang Memeriksa <br><br><br><br><br><br></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="35%" align="center">( <b><?= $surat_keterangan_kematian->yang_melapor; ?></b> ) <br>
                            KTP/SIM : <b><?= $surat_keterangan_kematian->ktp; ?></b></td>
                            <td class="no__border" width="30%"></td>
                            <td class="no__border" width="35%" align="center">( <b><?= $surat_keterangan_kematian->nama_pemeriksa; ?></b> )</td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br>
                <p>*) Surat keterangan ini hanya untuk mengurus perijinan pemakaman dan surat jalan jenazah</p>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-REM-06-00</p>
        </div>
    </footer>
</body>
<?php die; ?>
