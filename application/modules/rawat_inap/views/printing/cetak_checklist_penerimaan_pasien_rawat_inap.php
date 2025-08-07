<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER =============== CPPRI WH-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
            </div>
            <div class="header__container-identity border section">
                <div class="identity__section grid">
                    <div class="identity__section-title">
                        <p class="identity">Nama Lengkap</p>
                        <p class="identity">No. Rekam Medik</p>
                        <p class="identity">Tanggal Lahir</p>
                        <p class="identity">Jenis Kelamin</p>
                    </div>
                    <div class="identity__section-subtitle">
                    <p class="identity">: <b><?= $checklist_penerimaan_pasien->nama_pasien; ?></b></p>
                        <p class="identity">: <b><?= $checklist_penerimaan_pasien->id_pasien; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($checklist_penerimaan_pasien->tanggal_lahir_pasien); ?></b></p>
                        <p class="identity">: <b><?= $checklist_penerimaan_pasien->kelamin_pasien; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <h2 class="section__title section">CHECK LIST PENERIMAAN PASIEN RAWAT INAP</h2>
                <p class="section__subtitle">Ruang Rawat / Unit Kerja : <b><?= $checklist_penerimaan_pasien->asal_ruangan; ?></b></p>
                <p class="section__subtitle">Berilah Tanda (√) pada daftar yang sudah diorientasikan kepada pasien</p>

                <!--=============== CHECKLIST TABLE ===============-->
                <table class="small__font">
                    <thead>
                        <tr>
                            <th class="table__title" width="5%">NO.</th>
                            <th class="table__title" colspan="2">HAL-HAL YANG DIORIENTASIKAN</th>
                            <th class="table__title" width="5%">YA</th>
                            <th class="table__title" width="8%">TIDAK</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td colspan="2">Informasi tentang perawat yang merawat hari ini</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->perawat_yang_merawat == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->perawat_yang_merawat == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">2</td>
                            <td colspan="2">Informasi tentang dokter yang merawat</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->dokter_yang_merawat == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->dokter_yang_merawat == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" rowspan="12">3</td>
                            <td colspan="4">Perawat yang melakukan orientasi ruangan kepada pasien dan anggota keluarganya, seperti :</td>                            
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Nurse station</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->nurse_station == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->nurse_station == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Kamar mandi pasien</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->kamar_mandi_pasien == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->kamar_mandi_pasien == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Bel pasien, bel keadaan darurat di kamar mandi</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->bel_pasien == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->bel_pasien == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Tempat Tidur Pasien</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_tidur_pasien == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_tidur_pasien == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Remote TV, AC</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->remote == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->remote == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Tempat Ibadah</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_ibadah == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_ibadah == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Tempat sampah infeksi dan non infeksi</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_sampah == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tempat_sampah == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Jadwal pembagian makan dari Rumah Sakit</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_pembagian == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_pembagian == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Jadwal visit dokter</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_visit == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_visit == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Jadwal jam berkunjung</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_jam_berkunjung == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_jam_berkunjung == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Jadwal ganti linen</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_ganti_linen == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->jadwal_ganti_linen == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">4</td>
                            <td colspan="2">Perawat menjelaskan kepada keluarga untuk membawa barang sesuai keperluan saja</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->membawa_barang_sesuai_keperluan == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->membawa_barang_sesuai_keperluan == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">5</td>
                            <td colspan="2">Perawat menghimbau kepada anggota keluarga untuk mematuhi peraturan yang sudah tertempel di ruangan</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->mematuhi_peraturan == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->mematuhi_peraturan == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">6</td>
                            <td colspan="2">Menghimbau keluarga / penunggu pasien tidak duduk ditempat tidur pasien</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tidak_duduk_ditempat_tidur == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->tidak_duduk_ditempat_tidur == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">7</td>
                            <td colspan="2">Tidak diperkenankan menyimpan barang berharga, alat elektronik, tikar, kasur, bantal dll (resiko kehilangan ditanggung oleh pasien / keluarga)</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->menyimpan_barang_berharga == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->menyimpan_barang_berharga == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">8</td>
                            <td colspan="2">Setiap pasien mendapat kartu penunggu (1 orang), khususnya di ruangan bayi dan perinatologi tidak diperkenankan menunggu di ruangan</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->dapat_kartu_penunggu == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->dapat_kartu_penunggu == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center">9</td>
                            <td colspan="2">Perawat menghimbau kepada anggota keluarga untuk selalu menghargai privasi pasien.</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->menghargai_privasi_pasien == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->menghargai_privasi_pasien == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" rowspan="3">10</td>
                            <td colspan="4">Perawat menjelaskan tentang :</td>                            
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Pemasangan dan fungsi gelang</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->gelang == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->gelang == 0 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&#8226; Cara cuci tangan</td>
                            <td align="center"><?= $checklist_penerimaan_pasien->cuci_tangan == 1 ? '&#10003;': ''; ?></td>
                            <td align="center"><?= $checklist_penerimaan_pasien->cuci_tangan == 0 ? '&#10003;': ''; ?></td>
                        </tr>                        
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td class="ttd" colspan="2">Tangerang, <b><?= date("d/m/Y H:i", strtotime($checklist_penerimaan_pasien->updated_on)); ?></b> <br> <center><?= $ttd_pasien_title; ?></center> <br> <br> <br> <br> <br> <center>(<b><?= $ttd_pasien_name; ?> </b>) <br> Nama jelas dan tanda tangan</center></td>
                            <td class="ttd" colspan="3"><br><center>Perawat / Bidan</center> <br> <br> <br> <br> <br><center>( <b><?= $this->session->userdata('nama'); ?> </b> ) <br> Nama jelas dan tanda tangan</center></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-REM-30-01</p>
        </div>
    </footer>
</body>
<?php die; ?>
