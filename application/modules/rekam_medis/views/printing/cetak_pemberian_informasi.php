<!-- // PWHI  -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 9pt;
		}

		@page {
			margin: 0.5cm !important;
		}

		.box-identitas {
			border: 1.5px solid black;
			padding: 5px;
		}

		.center {
			text-align: center;
			vertical-align: middle;
		}

		.right {
			text-align: right;
			vertical-align: middle;
		}

		.bold { font-weight: bold; }

		table { border-collapse: collapse;}

		.table-data tr td {
			border: 1.5px solid black;
			padding: 2px 5px;
		}

		.table-no-border tr td { border: none; padding: 0; }

		.dotted-underline { 
			padding: 0 15px;
			border-bottom: 1.5px dotted; 
		}

		.solid-underline { 
			padding: 0 15px;
			border-bottom: 1.5px solid; 
		}

		.border-left {
			border-left: 1.5px solid black;
		}

		.border-bottom {
			border-bottom: 1.5px solid black;
		}

		input[type="checkbox"] {
			margin-top: 1px;
			vertical-align: middle;
		}

		.pd5 {
			padding-bottom: 5px !important;
		}

		.v-center {
			vertical-align: middle !important;
		}

		/* Tambahan Wesa */
		.header__container {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 16px; /* Mengatur jarak antar elemen */
		}

		.header__container-address {
			max-width: 50%; /* Membatasi lebar elemen alamat */
		}

		.header__address {
			font-size: 10px;
			line-height: 1.5;
			color: #333;
			margin: 0;
		}

		.header__img {
			max-width: 60px; /* Sesuaikan ukuran logo */
			margin-right: 8px;
		}

		.header__container-identity {
			flex-grow: 1;
			max-width: 45%;
		}

		.identity__section {
			display: flex;
			gap: 8px; /* Mengatur jarak antar kolom */
		}

		.identity__section-title, 
		.identity__section-subtitle {
			display: flex;
			flex-direction: column;
			gap: 4px;
		}

		.identity__section-title p, 
		.identity__section-subtitle p {
			font-size: 11px;
			line-height: 1.3;
			margin: 0;
		}
	</style>
</head>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
                    Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
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
                        <p class="identity">: <b><?= $pasien->nama; ?></b></p>
                        <p class="identity">: <b><?= $pasien->id_pasien; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>                
            </div>
        </div>
    </header>
    
    <main class="main">
        <section class="information">
			<br>
            <div class="information__container container">
                <!-- <p class="section__subtitle">Tanggal / Jam : <b><!?= date("d/m/Y H:i", strtotime($pemberian_informasi->tanggal_jam_pi)); ?></b></p> -->
                <?php if (!empty($pemberian_informasi->tanggal_jam_pi)): ?>
                    <p class="section__subtitle">Tanggal / Jam : 
                        <b><?= date("d/m/Y H:i", strtotime($pemberian_informasi->tanggal_jam_pi)); ?></b>
                    </p>
                <?php elseif (!empty($pemberian_informasi->updated_on)): ?>
                    <p class="section__subtitle">Tanggal / Jam : 
                        <b><?= date("d/m/Y H:i", strtotime($pemberian_informasi->updated_on)); ?></b>
                    </p>
                <?php endif; ?>
                <table class="small__font">
                    <thead>
                        <tr>
                            <th class="table__big-title" colspan="5">PEMBERIAN INFORMASI</th>
                        </tr>
                        <tr>
                            <th class="table__big-title" colspan="2" align="left">Dokter Pelaksana Tindakan</th>
                            <th colspan="3"><b><?= $pemberian_informasi->nama_dokter_pelaksana; ?></b></th>
                        </tr>
                        
                        <tr>
                            <th class="table__big-title" colspan="2" align="left">Pemberi Informasi</th>
                            <th colspan="3"><b><?= isset($ttd_pemberi_informasi) ? $ttd_pemberi_informasi : $this->session->userdata('nama'); ?></b></th>                          
                        </tr>
                        <tr>
                            <th class="table__big-title" colspan="2" align="left">Penerima Informasi*</th>
                            <th colspan="3"><b><?= isset($ttd_penerima_informasi) ? $ttd_penerima_informasi : $ttd_pasien_name; ?></b></th>                            
                        </tr>

                        <tr>
                            <th></th>
                            <th class="table__big-title">JENIS INFORMASI</th>
                            <th class="table__big-title" colspan="2">ISI INFORMASI</th>
                            <th class="table__big-title">TANDA (v)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td align="center" width="5%">1</td>
                            <td width="30%">Diagnosis Kerja & Diagnosis Banding</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->diagnosis_kerja; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->diagnosis_kerja_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">2</td>
                            <td width="30%">Dasar Diagnosis</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->dasar_diagnosis; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->dasar_diagnosis_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">3</td>
                            <td width="30%">Tindakan Kedokteran</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->tindakan_kedokteran; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->tindakan_kedokteran_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">4</td>
                            <td width="30%">Indikasi Tindakan</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->indikasi_tindakan; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->indikasi_tindakan_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">5</td>
                            <td width="30%">Tata Cara</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->tata_cara; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->tata_cara_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">6</td>
                            <td width="30%">Tujuan</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->tujuan; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->tujuan_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">7</td>
                            <td width="30%">Risiko dan Komplikasi</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->risiko_komplikasi; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->risiko_komplikasi_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">8</td>
                            <td width="30%">Prognosis <br> <i>Prognosis vital, prognosis fungsi dan prognosis
                                    kesembuhan</i></td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->prognosis; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->prognosis_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">9</td>
                            <td width="30%">Alternatif & Resiko <br> <i>Pilihan pengobatan / pelaksanaan</i></td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->alternatif_resiko; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->alternatif_resiko_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">10</td>
                            <td width="30%">Hal lain yang akan dilakukan untuk <br> <i>Menyelamatkan pasien</i> <br>
                                <i>Perluasan tindakan</i> <br> <i>Konsultasi selama tindakan</i> <br> <i>Resusitasi</i>
                            </td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->menyelamatkan_pasien; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->menyelamatkan_pasien_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">11</td>
                            <td width="30%">Kebutuhan, Risiko, Manfaat dan alternatif penggunaan darah dan produk darah
                            </td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->penggunaan_darah; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->penggunaan_darah_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                        <tr>
                            <td align="center" width="5%">12</td>
                            <td width="30%">Pemberian analgesia pasca tindakan</td>
                            <td colspan="2" width="50%"><b><?= $pemberian_informasi->analgesia; ?></b></td>
                            <td width="15%" align="center"><?= $pemberian_informasi->analgesia_check == 1 ? '&#10003;': ''; ?></td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4">Dengan ini menyatakan bahwa saya telah <b>menerangkan</b> hal-hal diatas secara
                                benar dan jelas dan memberikan kesempatan untuk bertanya dan atau berdiskusi</td>
                            <td>
                                <center>Tandatangan (Dokter)<br> <br> <br> <br>
                                    <font size="0.625rem">(<b><?= $pemberian_informasi->nama_dokter_pelaksana; ?></b>)</font>
                                    <!-- <font size="0.625rem">(<b><!?= $this->session->userdata('nama'); ?> </b>)</font> -->
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Dengan ini menyatakan bahwa saya telah <b>menerima</b> informasi sebagaimana diatas
                                yang saya beritanda / paraf di kolom kanannya, dan telah memahaminya</td>
                            <td width="15%">
                                <center>Tandatangan (Keluarga/Pasien) <br> <br> <br> <br>
                                    <font size="0.625rem">(<b><?= $ttd_pasien_name; ?> </b>)</font>
                                </center>
                            </td>
                            <td>
                                <center>Tandatangan (Saksi)<br> <br> <br> <br>
                                    <font size="0.625rem">(.................................)</font>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">*Bila pasien tidak kompeten atau tidak mau menerima informasi, maka penerima
                                informasi adalah wali atau keluarga terdekat</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
                    <p class="page__number">FORM-REM-31-02</p>
                </div>
            </div>
        </section>
    </main>
</body>
<?php die; ?>
