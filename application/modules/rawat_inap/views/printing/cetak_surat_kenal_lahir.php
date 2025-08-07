<!-- // SKL -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<!-- <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing-A4.css" media="print">
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 8pt;
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
</head> -->

<body onload="window.print()">
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container">
            <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                <thead>
                    <tr>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/Logo_Kota_Tangerang.png' ?>" width="70px" height="70px"></td>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 12pt;">PEMERINTAH KOTA TANGERANG</b></td>
                        <td class="no__border" rowspan="5" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="70px" height="70px">
                        </td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">RUMAH SAKIT UMUM DAERAH</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 18pt;">KOTA TANGERANG</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Jl. Pulau Putri Raya Perumahan Modernland, Kelurahan Kelapa Indah</b></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="3" align="center"><b style="font-size: 10pt;">Kecamatan Tangerang Telp. 021 2972 0201, 021 2972 0202</b></td>
                    </tr>
                </thead>
            </table>
        </div>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main" style="margin: 1rem;">
        <section class="form__skpk">
            <div class="form__skpk__container container">
                <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;">
                    <thead>
                        <tr>
                            <b style="font-size: 15pt; display: flex; justify-content: center">SURAT KENAL LAHIR</b>
                            <b style="font-size: 10pt; display: flex; justify-content: center"> NO.47221/<?= $surat_kenal_lahir->no_surat_lahir; ?>/RSUD-VK/<?= date("Y"); ?></b>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="no__border" disable colspan="5"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Yang bertanda tangan di bawah ini :</td>
                            <td class="no__border" width="1%"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Nama DPJP Obgyn</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->nama_skl_2; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td colspan="3" class="no__border">Menerangkan bahwa kami telah menolong / merawat bayi :</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Nama Bayi</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->nama_bayi_skl; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Jenis Kelamin</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <?= $surat_kenal_lahir->jenis_kelamin_skl == 'laki-laki' ? '&#128505; Laki-laki' : ($surat_kenal_lahir->jenis_kelamin_skl == 'perempuan' ? '&#128505; Perempuan' : '-'); ?>
                            </td>

                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Anak Dari :</td>
                            <td class="no__border" width="1%"></td>

                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Ibu</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->ibu_skl; ?></td>

                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">NIK E-KTP</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->nik_ektp_skl_ibu; ?> &nbsp;&nbsp;&nbsp; Gol.Darah : <?= $surat_kenal_lahir->gol_darah_ibu; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Ayah</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->ayah_skl; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">NIK E-KTP</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->nik_ektp_skl_ayah; ?> &nbsp;&nbsp;&nbsp; Gol.Darah : <?= $surat_kenal_lahir->gol_darah_ayah; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Alamat Rumah</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->alamat_rumah_skl; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%"><span style="margin-left: 20px;">Pekerjaan</span></td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->pekerjaan_skl; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Kelahiran di tolong pada</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">a.Hari: <?= $surat_kenal_lahir->hari_skl; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b.Tanggal: <?= datefmysql($surat_kenal_lahir->tanggal_skl); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c.Jam <?= $surat_kenal_lahir->jam_skl; ?></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Proses Persalinan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"> 
                                <?php
                                if ($surat_kenal_lahir->proses_persalinan_skl_1 == '1') {
                                    echo 'SC';
                                } else {
                                    echo 'Normal';
                                }
                                ?>
                                <?php if ($surat_kenal_lahir->proses_persalinan_skl_1 != '1') : ?>
                                &nbsp;&nbsp;<?= $surat_kenal_lahir->proses_persalinan_skl_2; ?>
                                <?php endif; ?>
                                
                            </td>
                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tindakan: <!?= $surat_kenal_lahir->proses_persalinan_skl_2; ?> -->
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Anak yang Ke</td>
                            <td class="no__border" width="1%">:</td>

                            <!-- <td class="no__border">(<!?= $surat_kenal_lahir->anak_yang_ke_skl_1; ?>)</td> -->

                            <?php
                                function numberToWords($num) {
                                    $angka = [0 => "Nol", 1 => "Satu", 2 => "Dua", 3 => "Tiga", 4 => "Empat", 
                                            5 => "Lima", 6 => "Enam", 7 => "Tujuh", 8 => "Delapan", 9 => "Sembilan"];
                                    return isset($angka[$num]) ? $angka[$num] : $num;
                                }
                            // Output di HTML
                            ?>
                            <td class="no__border">
                                <?= $surat_kenal_lahir->anak_yang_ke_skl_1; ?> 
                                (<?= numberToWords($surat_kenal_lahir->anak_yang_ke_skl_1); ?>)
                            </td>

                            <!-- <!?php
                            function numberToWords($num) {
                                $angka = [0 => "Nol", 1 => "Satu", 2 => "Dua", 3 => "Tiga", 4 => "Empat", 
                                        5 => "Lima", 6 => "Enam", 7 => "Tujuh", 8 => "Delapan", 9 => "Sembilan"];
                                
                                // Pastikan $num adalah integer
                                if (!is_numeric($num)) {
                                    return "Tidak valid";
                                }

                                // Jika $num adalah angka 0–9
                                if (isset($angka[$num])) {
                                    return $angka[$num];
                                }

                                // Logika tambahan untuk angka lebih besar
                                return "Angka diluar jangkauan";
                            }

                            // Output di HTML
                            ?>
                            <td class="no__border">
                                <!?= htmlspecialchars($surat_kenal_lahir->anak_yang_ke_skl_1); ?> 
                                (<!?= numberToWords((int)$surat_kenal_lahir->anak_yang_ke_skl_1); ?>)
                            </td> -->




                            

                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Kembar</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border">
                                <?= $surat_kenal_lahir->kembar_skl == '1' ? '&#128505; Ya' : ($surat_kenal_lahir->kembar_skl == '0' ? '&#128505; Tidak' : '-'); ?>
                            </td>

                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Panjang</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->panjang_skl; ?>&nbsp;Cm</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Berat Badan</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->berat_badan_skl; ?>&nbsp;Gram</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Lingkar Kepala</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->lingkar_kepala_skl; ?>&nbsp;Cm</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Lingkar Dada</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->lingkar_dada_skl; ?>&nbsp;Cm</td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" width="35%">Lingkar Pinggang</td>
                            <td class="no__border" width="1%">:</td>
                            <td class="no__border"><?= $surat_kenal_lahir->lingkar_pinggang_skl; ?>&nbsp;Cm</td>
                        </tr>
                    </tbody>
                </table>

                <table class="no__border small__line__spacing small__font" style="margin-top: 1rem;">
                    <br><br><br>
                    <tbody>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border" width="50%"></td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" align="center" style="padding-bottom: 100px;">
                                Nama dan Tanda Tangan
                            </td>
                        </tr>
                        <tr>
                            <td class="no__border"></td>
                            <td class="no__border" align="center">(<b><?= $surat_kenal_lahir->nama_skl_2; ?></b>) <br>
                                <font size="1rem">DPJP OBGYN</font>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <tr></tr>
                <tr></tr>
                <tr>
                    <table>
                        <thead>
                            <tr>
                                <td width="25%"><b>Sidik Telapak Kaki Bayi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                                <td width="1%"><b></b></td>
                            </tr>
                            <tr>
                                <th width="30%" class="center"><b>Sidik Telapak kaki kiri</b></th>
                                <th width="30%" class="center"><b>Sidik Telapak kaki kanan</b></th>
                            </tr>
                            <tr style="height:290px">
                                <td></td>
                                <td></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td width="25%"><b>Sidik Jari Tangan Ibu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
                                <td width="1%"><b></b></td>
                            </tr>
                            <tr>
                                <th width="30%" class="center"><b>Sidik Jari Tangan Kiri</b></th>
                                <th width="30%" class="center"><b>Sidik Jari Tangan Kanan</b></th>
                            </tr>
                            <tr style="height:290px">
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                    </table>

                    <tr>
                        <table class="no__border big__line__spacing small__font">
                            <tbody>
                                <tr><br><br><br></tr>
                                <tr>
                                    <td class="no__border" width="50%" align="center" style="padding: 0pt;"> </td>
                                    <td class="no__border" width="50%" align="center" style="padding: 0pt;">
                                        Tangerang, <?= date('d/m/Y', strtotime($surat_kenal_lahir->tanggal_dokter)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center" style="padding: 0pt;">
                                    </td>
                                    <td class="no__border" align="center" style="padding: 0pt;">
                                        <b>RSUD KOTA TANGERANG</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center" style="padding: 0pt;">
                                        Pasien / Keluarga
                                    </td>
                                    <td class="no__border" align="center" style="padding: 0pt;">
                                        Yang Memeriksa,
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                    <td class="no__border" align="center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="no__border" align="center">(<b style="text-transform:uppercase"><?= $surat_kenal_lahir->ayah_skl; ?></b>) <br>
                                        <font size="1rem">Hubungan Keluarga : <b><?= $surat_kenal_lahir->hbng_keluarga_skl_1; ?>
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_skl_2; ?>          
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_skl_3; ?>          
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_skl_4; ?>          
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_skl_5; ?>          
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_skl_6; ?>          
                                                                                 <?= $surat_kenal_lahir->hbng_keluarga_lainya; ?> 
                                                                              </b>         
                                        </font>
                                    </td>
                                    <td class="no__border" align="center">(<b><?= $surat_kenal_lahir->nama_dokter; ?></b>) <br>
                                        <font size="1rem">DPJP DOKTER ANAK</font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </tr>
                </tr>
            </div>
            <br>
            <br>
            <br>
            <p class="page__number">FORM-KEP-04-00</p>
        </section>
    </main>
</body>
<?php die; ?>