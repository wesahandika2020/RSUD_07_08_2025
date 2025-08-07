
<!-- // ICC -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">
<script src="https://code.highcharts.com/highcharts.js"></script>

<title>Document</title>

<head>
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

        /* ini untuk buat landscape biar kertanya lebih lebar */
        @media print {
            @page {
                size: landscape;
            }

            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

	</style>
</head>

<style>
    .table-bordered {
        border: none !important;
    }
    .table-bordered td, 
    .table-bordered th {
        border: 1px solid #dee2e6 !important;
    }
</style>

<!-- <body onload="setTimeout(()=>window.print(),1000)"> -->
<body onload="window.print()">
	<header class="header" id="header">
		<div class="header__container container grid">
			<div class="header__container-address grid">
				<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="Logo RSUD" class="header__img">
				<p class="header__address">
					Jl. Pulau Putri Raya Perumahan Modernland<br>
					Kelurahan Kelapa Indah, Kecamatan Tangerang<br>
					Telp: 021 2972 0201, 021 2972 0202
				</p>
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
						<p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
						<p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</header>

    <main class="main">
        <section class="tpgd">
			<br>                
            <div class="tpgd__container container">
                <table class="no__border small__line__spacing small__font" style="font-size: 12px; width: 100%; border-collapse: collapse;">
                    <tr>
                        <b style="font-size: 12pt; display: flex; justify-content: center"> INTENSIVE CARE CHART ICU/HCU/NICU/PICU </b>
                    </tr>
                </table>
                <br>
                <table class="table table-sm table-striped table-bordered">                                       
                    <tbody>
                        <tr>
                            <td width="33%">DPJP Utama : <?= $ttd_dokterdpjptambahicc; ?> </td> 
                            <td width="33%">Tanggal Masuk : <?= $ttd_tgl_layanan; ?> </td>
                            <td width="33%">Unit/Ruangan Sebelumnya : <?= $ttd_unitruangansebelumnya; ?></td>
                        </tr>

                        <?php $jumlah_dokter = count($ttd_dokterdpjpicc); ?>
                        <tr>
                            <td rowspan="4">
                                <b>DPJP Tambahan:</b>
                                <ul style="margin: 0; padding-left: 16px;">
                                    <?php foreach ($ttd_dokterdpjpicc as $dokter_1): ?>
                                        <li><?= $dokter_1; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td>Tanggal : <?= datefmysql($ttd_tglicc); ?></td>
                            <td>
                                Sofa Score : <?= $ttd_sofascore; ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                                Braden Score : <?= $ttd_bradenscore; ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                                Down Score : <?= $ttd_downscore; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Perawatan Hari Ke : <?= $ttd_perawatanharike; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>BB / TB : <?= $ttd_bbicc; ?> kg / <?= $ttd_tbicc; ?> cm</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Gol. Darah / RH : <?= $ttd_goldarahrh; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-sm table-striped table-bordered">                                       
					<thead>
						<tr>
							<td width="33%">Diagnosis : <?= $ttd_diagnosisicc; ?> </td> 
							<td class="center vertical-text" width="66%">INTENSIVE CARE</td>
						</tr>
                        <tr>
                            <td style="word-wrap: break-word; white-space: normal;">
                                <div style="margin-bottom: 4px;"><strong>Tanggal Operasi:</strong> <?= datefmysql($ttd_tanggaljoicc); ?></div>
                                <div style="text-align: justify;">
                                    <strong>Jenis Operasi:</strong> <?= $ttd_jenisoperasiicc; ?>
                                </div>
                            </td>
							<td>
                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th width="23%">ALAT</th>
                                            <th width="17%">Tanggal Pemasangan</th>
                                            <th width="20%">Posisi</th>
                                            <th width="20%">Ukuran</th>
                                            <th width="20%">Tanggal Pencabutan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Infus I <input type="checkbox" <?= $ttd_infusIicc == 1 ? 'checked' : ''; ?>></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan1); ?></td>
                                            <td class="center"><?= $ttd_posisi1; ?></td>
                                            <td class="center"><?= $ttd_ukuran1; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan1); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Infus II <input type="checkbox" <?= $ttd_infusIIicc == 1 ? 'checked' : ''; ?>></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan2); ?></td>
                                            <td class="center"><?= $ttd_posisi2; ?></td>
                                            <td class="center"><?= $ttd_ukuran2; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan2); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                CVC <input type="checkbox" <?= $ttd_cvc == 1 ? 'checked' : ''; ?>>
                                                CDL <input type="checkbox" <?= $ttd_cdl == 1 ? 'checked' : ''; ?>>
                                                PICC <input type="checkbox" <?= $ttd_picc == 1 ? 'checked' : ''; ?>> 
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan3); ?></td>
                                            <td class="center"><?= $ttd_posisi3; ?></td>
                                            <td class="center"><?= $ttd_ukuran3; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan3); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                ETT <input type="checkbox" <?= $ttd_ett == 1 ? 'checked' : ''; ?>>
                                                Tracheostomy <input type="checkbox" <?= $ttd_tracheostomy == 1 ? 'checked' : ''; ?>> 
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan4); ?></td>
                                            <td class="center"><?= $ttd_posisi4; ?></td>
                                            <td class="center"><?= $ttd_ukuran4; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan4); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Icp <input type="checkbox" <?= $ttd_icp == 1 ? 'checked' : ''; ?>>
                                                Ext <input type="checkbox" <?= $ttd_ext == 1 ? 'checked' : ''; ?>>
                                                EPI Drainage <input type="checkbox" <?= $ttd_epi == 1 ? 'checked' : ''; ?>> 
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan5); ?></td>
                                            <td class="center"><?= $ttd_posisi5; ?></td>
                                            <td class="center"><?= $ttd_ukuran5; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan5); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Cimino <input type="checkbox" <?= $ttd_icp == 1 ? 'checked' : ''; ?>>
                                                AV Graft <input type="checkbox" <?= $ttd_ext == 1 ? 'checked' : ''; ?>>
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan6); ?></td>
                                            <td class="center"><?= $ttd_posisi6; ?></td>
                                            <td class="center"><?= $ttd_ukuran6; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan6); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                NGT <input type="checkbox" <?= $ttd_ngticc == 1 ? 'checked' : ''; ?>>
                                                OGT <input type="checkbox" <?= $ttd_ogticc == 1 ? 'checked' : ''; ?>>
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan7); ?></td>
                                            <td class="center"><?= $ttd_posisi7; ?></td>
                                            <td class="center"><?= $ttd_ukuran7; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan7); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Urine Kateter <input type="checkbox" <?= $ttd_urineekttr == 1 ? 'checked' : ''; ?>>
                                            </td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpemasangan8); ?></td>
                                            <td class="center"><?= $ttd_posisi8; ?></td>
                                            <td class="center"><?= $ttd_ukuran8; ?></td>
                                            <td class="center"><?= datefmysql($ttd_tanggalpencabutan8); ?></td>
                                        </tr>
                                    </tbody>
                                </table>                          
                            </td>
						</tr>
					</thead>
				</table>

                <table class="table table-sm table-striped table-bordered">                                       
					<thead>
						<tr>
							<td> Pesan : 
                                <div style="display: flex; justify-content: space-between;">
                                    <?php $pesaniic = json_decode($ttd_pesaniic); ?>
                                    <span> : <?= !empty($pesaniic->pesaniic_1) ? htmlspecialchars($pesaniic->pesaniic_1) : '' ?></span>
                                    <span> : <?= !empty($pesaniic->pesaniic_2) ? htmlspecialchars($pesaniic->pesaniic_2) : '' ?></span>
                                    <span> : <?= !empty($pesaniic->pesaniic_3) ? htmlspecialchars($pesaniic->pesaniic_3) : '' ?></span>
                                </div>
                            </td>
						</tr>
						<tr>
							<td> 
                                <div style="display: flex; justify-content: space-between;">
                                    <?php $textkosong = json_decode($ttd_textkosong); ?>
                                    <span> : <?= !empty($textkosong->textkosong_1) ? htmlspecialchars($textkosong->textkosong_1) : '' ?></span>
                                    <span> : <?= !empty($textkosong->textkosong_2) ? htmlspecialchars($textkosong->textkosong_2) : '' ?></span>
                                    <span> : <?= !empty($textkosong->textkosong_3) ? htmlspecialchars($textkosong->textkosong_3) : '' ?></span>
                                </div>
                            </td>
						</tr>
						<tr>
							<td> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b style="color: red;">ALERGI :</b> <br><?= htmlspecialchars($ttd_alergiicct ?? '') ?></span>
                                    <span><b>ANTIBIOTIK :</b> <br><?= htmlspecialchars($ttd_antibiotikicc ?? '') ?></span>
                                    <span><b>KULTUR :</b> <br><?= htmlspecialchars($ttd_kulturicc ?? '') ?></span>
                                </div>
                            </td>
						</tr>
					</thead>
				</table>

                <style>
                    @media print {
                        .print-page {
                            page-break-before: always;
                        }
                        .print-page:first-child {
                            page-break-before: auto;
                        }

                        .table-mini td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-mini {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word;
                        }

                        .table-mina td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-mina {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        }
                        .table-mintul td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-mintul {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        }
                        .table-minkul td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-minkul {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        }
                        .table-miniber td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        /* .table-miniber {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        } */

                        .table-minim td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-minim {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        }
                        
                        .table-minik td {
                            font-size: 8px !important; /* Lebih kecil dari layar */
                            padding: 1px 2px !important;
                        }

                        .table-minik {
                            table-layout: fixed;
                            width: 100%;
                            word-wrap: break-word; 
                        }

                        body {
                            margin: 0;
                            padding: 0;
                        }

                        @page {
                            size: landscape; /* Biar lebar kertasnya lebih luas */
                            margin: 5mm;
                        }
                    }
                </style>

                <!-- <table class="table table-mini table-striped table-bordered">       -->
                <table class="table table-mini table-striped table-bordered" style="page-break-before: always;">                                    
                    <thead>
                        <tr>
                            <td class="center" colspan="53" style="background-color: #B0E0E6; color: black;" width="15%">BISMILLAHIRRAHMANIRRAHIM</td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td></td>  
                            <td colspan="2" class="center" style="background-color: #B0E0E6; color: black;" width="10%">Terapi Oral</td>                    
                            <td>07</td><td></td><td>08</td><td></td><td>09</td><td></td><td>10</td><td></td>
                            <td>11</td><td></td><td>12</td><td></td><td>13</td><td></td><td>14</td><td></td>
                            <td>15</td><td></td><td>16</td><td></td><td>17</td><td></td><td>18</td><td></td>
                            <td>19</td><td></td><td>20</td><td></td><td>21</td><td></td><td>22</td><td></td>
                            <td>23</td><td></td><td>24</td><td></td><td>01</td><td></td><td>02</td><td></td>
                            <td>03</td><td></td><td>04</td><td></td><td>05</td><td></td><td>06</td><td></td>
                            <td></td><td></td>
                        </tr>

                        <!-- <tr>
                            <td>1</td>
                            <!?php
                            $terapioralicc = json_decode($ttd_terapioralicc ?? '[]', true);
                            for ($i = 1; $i <= 50; $i++) {
                                $key = "terapioralicc" . $i;
                                $value = isset($terapioralicc[$key]) ? htmlspecialchars($terapioralicc[$key]) : '';
                                echo "<td>{$value}</td>";
                            }
                            ?>
                        </tr> -->

                        <!-- <tr>
                            <td style="text-align: center;">1</td>
                            <!?php
                            $terapioralicc = json_decode($ttd_terapioralicc ?? '[]', true);
                            for ($i = 1; $i <= 50; $i++) {
                                $key = "terapioralicc" . $i;
                                $value = isset($terapioralicc[$key]) ? htmlspecialchars($terapioralicc[$key]) : '';
                                echo "<td>{$value}</td>";
                            }
                            ?>
                            <td style="text-align: right;">1</td>
                        </tr> -->

                     



                        <tr>
                            <td style="text-align: center;">1</td> <!-- kolom pertama -->

                            <!-- <!?php
                            Mengubah string JSON jadi array asosiatif PHP
                            $terapioralicc = json_decode($ttd_terapioralicc ?? '[]', true);
                            
                            Loop dari 1 sampai 50 untuk isi kolom tengah
                            for ($i = 1; $i <= 50; $i++) {
                                Bikin nama key yang sesuai format di array, misalnya 'terapioralicc1', 'terapioralicc2', ...
                                $key = "terapioralicc" . $i;
                                
                                Ambil nilai dari array sesuai key, kalau ga ada, kosongkan ('')
                                $value = isset($terapioralicc[$key]) ? htmlspecialchars($terapioralicc[$key]) : '';
                                
                                Cetak isi <td> untuk setiap kolom tengah
                                echo "<td>{$value}</td>";
                            }
                            ?> -->

                            <?php
                                $terapioralicc = json_decode($ttd_terapioralicc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicc" . $i;
                                    $value = isset($terapioralicc[$key]) ? htmlspecialchars($terapioralicc[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>

                            <td style="text-align: right;">1</td> <!-- kolom terakhir -->
                        </tr>

                        <tr>
                            <td style="text-align: center;">2</td>
                            <?php
                                $terapioralicca = json_decode($ttd_terapioralicca ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicca" . $i;
                                    $value = isset($terapioralicca[$key]) ? htmlspecialchars($terapioralicca[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">2</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <?php
                                $terapioraliccb = json_decode($ttd_terapioraliccb ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccb" . $i;
                                    $value = isset($terapioraliccb[$key]) ? htmlspecialchars($terapioraliccb[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">3</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <?php
                                $terapioraliccc = json_decode($ttd_terapioraliccc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccc" . $i;
                                    $value = isset($terapioraliccc[$key]) ? htmlspecialchars($terapioraliccc[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">4</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <?php
                                $terapioraliccd = json_decode($ttd_terapioraliccd ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccd" . $i;
                                    $value = isset($terapioraliccd[$key]) ? htmlspecialchars($terapioraliccd[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">5</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">6</td>
                            <?php
                                $terapioralicce = json_decode($ttd_terapioralicce ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicce" . $i;
                                    $value = isset($terapioralicce[$key]) ? htmlspecialchars($terapioralicce[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">6</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7</td>
                            <?php
                                $terapioraliccf = json_decode($ttd_terapioraliccf ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccf" . $i;
                                    $value = isset($terapioraliccf[$key]) ? htmlspecialchars($terapioraliccf[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">7</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">8</td>
                            <?php
                                $terapioraliccg = json_decode($ttd_terapioraliccg ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccg" . $i;
                                    $value = isset($terapioraliccg[$key]) ? htmlspecialchars($terapioraliccg[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">8</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">9</td>
                            <?php
                                $terapioralicch = json_decode($ttd_terapioralicch ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicch" . $i;
                                    $value = isset($terapioralicch[$key]) ? htmlspecialchars($terapioralicch[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">9</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">10</td>
                            <?php
                                $terapioralicci = json_decode($ttd_terapioralicci ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicci" . $i;
                                    $value = isset($terapioralicci[$key]) ? htmlspecialchars($terapioralicci[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">10</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">11</td>
                            <?php
                                $terapioraliccj = json_decode($ttd_terapioraliccj ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioraliccj" . $i;
                                    $value = isset($terapioraliccj[$key]) ? htmlspecialchars($terapioraliccj[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">11</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">12</td>
                            <?php
                                $terapioralicck = json_decode($ttd_terapioralicck ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapioralicck" . $i;
                                    $value = isset($terapioralicck[$key]) ? htmlspecialchars($terapioralicck[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">12</td>
                        </tr>  
                        
                        <tr>
                            <td class="center" colspan="53" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td></td>  
                            <td colspan="2" class="center" style="background-color: #B0E0E6; color: black;" width="10%">Terapi Injeksi</td>                    
                            <td>07</td><td></td><td>08</td><td></td><td>09</td><td></td><td>10</td><td></td>
                            <td>11</td><td></td><td>12</td><td></td><td>13</td><td></td><td>14</td><td></td>
                            <td>15</td><td></td><td>16</td><td></td><td>17</td><td></td><td>18</td><td></td>
                            <td>19</td><td></td><td>20</td><td></td><td>21</td><td></td><td>22</td><td></td>
                            <td>23</td><td></td><td>24</td><td></td><td>01</td><td></td><td>02</td><td></td>
                            <td>03</td><td></td><td>04</td><td></td><td>05</td><td></td><td>06</td><td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <?php
                                $terapiinjeksiicc = json_decode($ttd_terapiinjeksiicc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicc" . $i;
                                    $value = isset($terapiinjeksiicc[$key]) ? htmlspecialchars($terapiinjeksiicc[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">1</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <?php
                                $terapiinjeksiicca = json_decode($ttd_terapiinjeksiicca ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicca" . $i;
                                    $value = isset($terapiinjeksiicca[$key]) ? htmlspecialchars($terapiinjeksiicca[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">2</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <?php
                                $terapiinjeksiiccb = json_decode($ttd_terapiinjeksiiccb ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccb" . $i;
                                    $value = isset($terapiinjeksiiccb[$key]) ? htmlspecialchars($terapiinjeksiiccb[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">3</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <?php
                                $terapiinjeksiiccc = json_decode($ttd_terapiinjeksiiccc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccc" . $i;
                                    $value = isset($terapiinjeksiiccc[$key]) ? htmlspecialchars($terapiinjeksiiccc[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">4</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <?php
                                $terapiinjeksiiccd = json_decode($ttd_terapiinjeksiiccd ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccd" . $i;
                                    $value = isset($terapiinjeksiiccd[$key]) ? htmlspecialchars($terapiinjeksiiccd[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">5</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">6</td>
                            <?php
                                $terapiinjeksiicce = json_decode($ttd_terapiinjeksiicce ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicce" . $i;
                                    $value = isset($terapiinjeksiicce[$key]) ? htmlspecialchars($terapiinjeksiicce[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">6</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7</td>
                            <?php
                                $terapiinjeksiiccf = json_decode($ttd_terapiinjeksiiccf ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccf" . $i;
                                    $value = isset($terapiinjeksiiccf[$key]) ? htmlspecialchars($terapiinjeksiiccf[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">7</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">8</td>
                            <?php
                                $terapiinjeksiiccg = json_decode($ttd_terapiinjeksiiccg ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccg" . $i;
                                    $value = isset($terapiinjeksiiccg[$key]) ? htmlspecialchars($terapiinjeksiiccg[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">8</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">9</td>
                            <?php
                                $terapiinjeksiicch = json_decode($ttd_terapiinjeksiicch ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicch" . $i;
                                    $value = isset($terapiinjeksiicch[$key]) ? htmlspecialchars($terapiinjeksiicch[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">9</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">10</td>
                            <?php
                                $terapiinjeksiicci = json_decode($ttd_terapiinjeksiicci ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicci" . $i;
                                    $value = isset($terapiinjeksiicci[$key]) ? htmlspecialchars($terapiinjeksiicci[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">10</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">11</td>
                            <?php
                                $terapiinjeksiiccj = json_decode($ttd_terapiinjeksiiccj ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiiccj" . $i;
                                    $value = isset($terapiinjeksiiccj[$key]) ? htmlspecialchars($terapiinjeksiiccj[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">11</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">12</td>
                            <?php
                                $terapiinjeksiicck = json_decode($ttd_terapiinjeksiicck ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapiinjeksiicck" . $i;
                                    $value = isset($terapiinjeksiicck[$key]) ? htmlspecialchars($terapiinjeksiicck[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">12</td>
                        </tr> 


                        <tr>
                            <td class="center" colspan="53" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td></td>  
                            <td colspan="2" class="center" style="background-color: #B0E0E6; color: black;" width="10%">Terapi Lain-lain</td>                    
                            <td>07</td><td></td><td>08</td><td></td><td>09</td><td></td><td>10</td><td></td>
                            <td>11</td><td></td><td>12</td><td></td><td>13</td><td></td><td>14</td><td></td>
                            <td>15</td><td></td><td>16</td><td></td><td>17</td><td></td><td>18</td><td></td>
                            <td>19</td><td></td><td>20</td><td></td><td>21</td><td></td><td>22</td><td></td>
                            <td>23</td><td></td><td>24</td><td></td><td>01</td><td></td><td>02</td><td></td>
                            <td>03</td><td></td><td>04</td><td></td><td>05</td><td></td><td>06</td><td></td>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <?php
                                $terapilainicc = json_decode($ttd_terapilainicc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapilainicc" . $i;
                                    $value = isset($terapilainicc[$key]) ? htmlspecialchars($terapilainicc[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">1</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <?php
                                $terapilainicca = json_decode($ttd_terapilainicca ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapilainicca" . $i;
                                    $value = isset($terapilainicca[$key]) ? htmlspecialchars($terapilainicca[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">2</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <?php
                                $terapilainiccb = json_decode($ttd_terapilainiccb ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "terapilainiccb" . $i;
                                    $value = isset($terapilainiccb[$key]) ? htmlspecialchars($terapilainiccb[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">3</td>
                        </tr>
                        
                    </thead>
                </table>

                <!-- // INI JANGAN DI HAPUS PAKEK 47 SENGAJA NNTI KALAU PERAWAT KOMPLAIN GANTI KE 50 LAGI ANGKNYA  -->
                <!-- // INI JANGAN DI HAPUS INI NAKU TAMBAHIN JADI 54 HARUSYA CUMA 50  -->
                <table class="table table-mina table-striped table-bordered">   
                <!-- <table class="table table-mina table-striped table-bordered" style="page-break-before: always;">                                     -->
                    <thead>
                        <tr>
                            <td class="center" colspan="60" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr>
                        <tr>
                            <td colspan="6"></td>  
                            <td></td><td></td><td></td>               
                            <td>07</td><td></td><td>08</td><td></td><td>09</td><td></td>                         
                            <td>10</td><td></td><td>11</td><td></td><td>12</td><td></td>                         
                            <td>13</td><td></td><td>14</td><td></td><td>15</td><td></td>                         
                            <td>16</td><td></td><td>17</td><td></td><td>18</td><td></td>                         
                            <td>19</td><td></td><td>20</td><td></td><td>21</td><td></td>     
                            <td>22</td><td></td><td>23</td><td></td><td>24</td><td></td>                         
                            <td>01</td><td></td><td>02</td><td></td><td>03</td><td></td>                         
                            <td>04</td><td></td><td>05</td><td></td><td>06</td><td></td>
                            <td></td><td></td><td></td> 
                        </tr> 
                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: green;">LA/PCW<br><br><br><br>50</td>
                            <td class="center" rowspan="3" style="color: blue;">HR<br><br><br><br><br>350</td>
                            <td class="center" rowspan="3" style="color: red;">TD<br><br><br><br><br>200</td>
                            <td class="center" rowspan="3" style="color: green;">T<br><br><br><br><br>40</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;">RR/PAP<br><br><br><br>100</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;">O2 Sat<br><br><br><br>100</td>
                            <?php
                                $lapcwpA = json_decode($ttd_lapcwpA ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpA" . $i;
                                    $value = isset($lapcwpA[$key]) ? htmlspecialchars($lapcwpA[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <?php
                                $lapcwpB = json_decode($ttd_lapcwpB ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpB" . $i;
                                    $value = isset($lapcwpB[$key]) ? htmlspecialchars($lapcwpB[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpC = json_decode($ttd_lapcwpC ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpC" . $i;
                                    $value = isset($lapcwpC[$key]) ? htmlspecialchars($lapcwpC[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>300</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>180</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>39</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>90</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>90</td>
                            <?php
                                $lapcwpD = json_decode($ttd_lapcwpD ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpD" . $i;
                                    $value = isset($lapcwpD[$key]) ? htmlspecialchars($lapcwpD[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpE = json_decode($ttd_lapcwpE ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpE" . $i;
                                    $value = isset($lapcwpE[$key]) ? htmlspecialchars($lapcwpE[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpF = json_decode($ttd_lapcwpF ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpF" . $i;
                                    $value = isset($lapcwpF[$key]) ? htmlspecialchars($lapcwpF[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: blue;"><br><br><br><br>40</td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>250</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>160</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>38</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>80</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>80</td>
                            <?php
                                $lapcwpG = json_decode($ttd_lapcwpG ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpG" . $i;
                                    $value = isset($lapcwpG[$key]) ? htmlspecialchars($lapcwpG[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpH = json_decode($ttd_lapcwpH ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpH" . $i;
                                    $value = isset($lapcwpH[$key]) ? htmlspecialchars($lapcwpH[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpI = json_decode($ttd_lapcwpI ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpI" . $i;
                                    $value = isset($lapcwpI[$key]) ? htmlspecialchars($lapcwpI[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>200</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>140</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>37</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>70</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>70</td>
                            <?php
                                $lapcwpJ = json_decode($ttd_lapcwpJ ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpJ" . $i;
                                    $value = isset($lapcwpJ[$key]) ? htmlspecialchars($lapcwpJ[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpK = json_decode($ttd_lapcwpK ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpK" . $i;
                                    $value = isset($lapcwpK[$key]) ? htmlspecialchars($lapcwpK[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpL = json_decode($ttd_lapcwpL ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpL" . $i;
                                    $value = isset($lapcwpL[$key]) ? htmlspecialchars($lapcwpL[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: blue;"><br><br><br><br>30</td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>150</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>120</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>36</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>60</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>60</td>
                            <?php
                                $lapcwpM = json_decode($ttd_lapcwpM ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpM" . $i;
                                    $value = isset($lapcwpM[$key]) ? htmlspecialchars($lapcwpM[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpN = json_decode($ttd_lapcwpN ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpN" . $i;
                                    $value = isset($lapcwpN[$key]) ? htmlspecialchars($lapcwpN[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpO = json_decode($ttd_lapcwpO ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpO" . $i;
                                    $value = isset($lapcwpO[$key]) ? htmlspecialchars($lapcwpO[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>100</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>100</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>35</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>50</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>50</td>
                            <?php
                                $lapcwpP = json_decode($ttd_lapcwpP ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpP" . $i;
                                    $value = isset($lapcwpP[$key]) ? htmlspecialchars($lapcwpP[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpQ = json_decode($ttd_lapcwpQ ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpQ" . $i;
                                    $value = isset($lapcwpQ[$key]) ? htmlspecialchars($lapcwpQ[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpR = json_decode($ttd_lapcwpR ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpR" . $i;
                                    $value = isset($lapcwpR[$key]) ? htmlspecialchars($lapcwpR[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: blue;"><br><br><br><br>20</td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>50</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>80</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>34</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>40</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>40</td>
                            <?php
                                $lapcwpS = json_decode($ttd_lapcwpS ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpS" . $i;
                                    $value = isset($lapcwpS[$key]) ? htmlspecialchars($lapcwpS[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpT = json_decode($ttd_lapcwpT ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpT" . $i;
                                    $value = isset($lapcwpT[$key]) ? htmlspecialchars($lapcwpT[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpU = json_decode($ttd_lapcwpU ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpU" . $i;
                                    $value = isset($lapcwpU[$key]) ? htmlspecialchars($lapcwpU[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: blue;"><br><br><br><br>0</td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>60</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>33</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>30</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>30</td>
                            <?php
                                $lapcwpV = json_decode($ttd_lapcwpV ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpV" . $i;
                                    $value = isset($lapcwpV[$key]) ? htmlspecialchars($lapcwpV[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpW = json_decode($ttd_lapcwpW ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpW" . $i;
                                    $value = isset($lapcwpW[$key]) ? htmlspecialchars($lapcwpW[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpX = json_decode($ttd_lapcwpX ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpX" . $i;
                                    $value = isset($lapcwpX[$key]) ? htmlspecialchars($lapcwpX[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: blue;"><br><br><br><br>10</td>
                            <td class="center" rowspan="3" ><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>40</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>32</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>20</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>20</td>
                            <?php
                                $lapcwpY = json_decode($ttd_lapcwpY ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpY" . $i;
                                    $value = isset($lapcwpY[$key]) ? htmlspecialchars($lapcwpY[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpZ = json_decode($ttd_lapcwpZ ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpZ" . $i;
                                    $value = isset($lapcwpZ[$key]) ? htmlspecialchars($lapcwpZ[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpAA = json_decode($ttd_lapcwpAA ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpAA" . $i;
                                    $value = isset($lapcwpAA[$key]) ? htmlspecialchars($lapcwpAA[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                         <tr>
                            <td colspan="2" class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3"><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>20</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>31</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>10</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>10</td>
                            <?php
                                $lapcwpBB = json_decode($ttd_lapcwpBB ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpBB" . $i;
                                    $value = isset($lapcwpBB[$key]) ? htmlspecialchars($lapcwpBB[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpCC = json_decode($ttd_lapcwpCC ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpCC" . $i;
                                    $value = isset($lapcwpCC[$key]) ? htmlspecialchars($lapcwpCC[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpDD = json_decode($ttd_lapcwpDD ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpDD" . $i;
                                    $value = isset($lapcwpDD[$key]) ? htmlspecialchars($lapcwpDD[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" class="center" rowspan="3" style="color: blue;"><br><br><br><br>0</td>
                            <td class="center" rowspan="3" ><br><br><br><br></td>
                            <td class="center" rowspan="3" style="color: red;"><br><br><br><br>0</td>
                            <td class="center" rowspan="3" style="color: green;"><br><br><br><br>30</td>
                            <td colspan="2" class="center" rowspan="3" style="color: black;"><br><br><br><br>0</td>
                            <td colspan="2" class="center" rowspan="3" style="color: green;"><br><br><br><br>0</td>
                            <?php
                                $lapcwpEE = json_decode($ttd_lapcwpEE ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpEE" . $i;
                                    $value = isset($lapcwpEE[$key]) ? htmlspecialchars($lapcwpEE[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpFF = json_decode($ttd_lapcwpFF ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpFF" . $i;
                                    $value = isset($lapcwpFF[$key]) ? htmlspecialchars($lapcwpFF[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                $lapcwpGG = json_decode($ttd_lapcwpGG ?? '[]', true);
                                for ($i = 1; $i <= 51; $i++) {
                                    $key = "lapcwpGG" . $i;
                                    $value = isset($lapcwpGG[$key]) ? htmlspecialchars($lapcwpGG[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
							<td colspan="60"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>Keteranga :</b> <br><?= htmlspecialchars($ttd_lapcwptext ?? '') ?></span>
                                </div>
                            </td>
						</tr>

                    </thead>
                </table>

                <table class="table table-mini table-striped table-bordered">                                          
                    <thead>
                        <tr>
                            <td colspan="52" style="background-color: #B0E0E6; color: black;" width="15%">SIRKULASI</td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">MAP</td>
                            <?php
                                $sirkulasiA = json_decode($ttd_sirkulasiA ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "sirkulasiA" . $i;
                                    $value = isset($sirkulasiA[$key]) ? htmlspecialchars($sirkulasiA[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" width="5%" style="background-color: #B0E0E6; color: black;">CO/CI</td>
                            <?php
                                $sirkulasiB = json_decode($ttd_sirkulasiB ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "sirkulasiB" . $i;
                                    $value = isset($sirkulasiB[$key]) ? htmlspecialchars($sirkulasiB[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" width="5%" style="background-color: #B0E0E6; color: black;">PVR/PVRI</td>
                            <?php
                                $sirkulasiC = json_decode($ttd_sirkulasiC ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "sirkulasiC" . $i;
                                    $value = isset($sirkulasiC[$key]) ? htmlspecialchars($sirkulasiC[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" width="5%" style="background-color: #B0E0E6; color: black;">SVR/SVRI</td>
                            <?php
                                $sirkulasiD = json_decode($ttd_sirkulasiD ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "sirkulasiD" . $i;
                                    $value = isset($sirkulasiD[$key]) ? htmlspecialchars($sirkulasiD[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" width="5%" style="background-color: #B0E0E6; color: black;">CVP</td>
                            <?php
                                $sirkulasiE = json_decode($ttd_sirkulasiE ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "sirkulasiE" . $i;
                                    $value = isset($sirkulasiE[$key]) ? htmlspecialchars($sirkulasiE[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" width="5%" style="background-color: #B0E0E6; color: black;">ECG MONITORING</td>
                            <?php
                                $sirkulasiF = json_decode($ttd_sirkulasiF ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "sirkulasiF" . $i;
                                    $value = isset($sirkulasiF[$key]) ? htmlspecialchars($sirkulasiF[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
							<td colspan="52"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>Keteranga :</b> <br><?= htmlspecialchars($ttd_sirkulasitext ?? '') ?></span>
                                </div>
                            </td>
						</tr>
                       
                    </thead>
                </table>

                <table class="table table-mintul table-striped table-bordered">                                          
                    <thead>
                        <tr>
                            <td colspan="56" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td colspan="4" class="center" style="background-color: #B0E0E6; color: black;" width="5%">RESPIRASI</td>
                            <td colspan="2">07</td>                         
                            <td colspan="2">08</td>                         
                            <td colspan="2">09</td>                         
                            <td colspan="2">10</td>                         
                            <td colspan="2">11</td>                         
                            <td colspan="2">12</td>                         
                            <td colspan="2">13</td>                         
                            <td colspan="2">14</td>                         
                            <td colspan="2">15</td>                         
                            <td colspan="2">16</td>                         
                            <td colspan="2">17</td>                         
                            <td colspan="2">18</td>                         
                            <td colspan="2">19</td>                         
                            <td colspan="2">20</td>                         
                            <td colspan="2">21</td>                         
                            <td colspan="2">22</td>                         
                            <td colspan="2">23</td>                         
                            <td colspan="2">24</td>                         
                            <td colspan="2">01</td>                         
                            <td colspan="2">02</td>                         
                            <td colspan="2">03</td>                         
                            <td colspan="2">04</td>                         
                            <td colspan="2">05</td>                         
                            <td colspan="2">06</td>                         
                            <td colspan="2"></td>                            
                            <td colspan="2"></td> 
                        </tr> 
                       
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">MODE</td>
                            <?php
                                $modeicc = json_decode($ttd_modeicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "modeicc" . $i;
                                    $value = isset($modeicc[$key]) ? htmlspecialchars($modeicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">MV/EMV</td>
                            <?php
                                $mvemvicc = json_decode($ttd_mvemvicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "mvemvicc" . $i;
                                    $value = isset($mvemvicc[$key]) ? htmlspecialchars($mvemvicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">TV/ETV</td>
                            <?php
                                $tvetvicc = json_decode($ttd_tvetvicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "tvetvicc" . $i;
                                    $value = isset($tvetvicc[$key]) ? htmlspecialchars($tvetvicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">TOTAL RATE</td>
                            <?php
                                $totalrateicc = json_decode($ttd_totalrateicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "totalrateicc" . $i;
                                    $value = isset($totalrateicc[$key]) ? htmlspecialchars($totalrateicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">INSPIRASI PRESS</td>
                            <?php
                                $inspirasipressicc = json_decode($ttd_inspirasipressicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "inspirasipressicc" . $i;
                                    $value = isset($inspirasipressicc[$key]) ? htmlspecialchars($inspirasipressicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">PEEP / EXP PRESS</td>
                            <?php
                                $modpeepicc = json_decode($ttd_modpeepicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "modpeepicc" . $i;
                                    $value = isset($modpeepicc[$key]) ? htmlspecialchars($modpeepicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">PEAK AIRWAY PRESSURE</td>
                            <?php
                                $peakicc = json_decode($ttd_peakicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "peakicc" . $i;
                                    $value = isset($peakicc[$key]) ? htmlspecialchars($peakicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">FIO2/O2</td>
                            <?php
                                $fiicc = json_decode($ttd_fiicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "fiicc" . $i;
                                    $value = isset($fiicc[$key]) ? htmlspecialchars($fiicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">CUFF ORESS/POTITION ETT</td>
                            <?php
                                $cufforessicc = json_decode($ttd_cufforessicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "cufforessicc" . $i;
                                    $value = isset($cufforessicc[$key]) ? htmlspecialchars($cufforessicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: black;">SUCTION</td>
                            <?php
                                $suctionicc = json_decode($ttd_suctionicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "suctionicc" . $i;
                                    $value = isset($suctionicc[$key]) ? htmlspecialchars($suctionicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #B0E0E6; color: red;">GDS</td>
                            <?php
                                $gdsicc = json_decode($ttd_gdsicc ?? '[]', true);
                                for ($i = 1; $i <= 26; $i++) {
                                    $key = "gdsicc" . $i;
                                    $value = isset($gdsicc[$key]) ? htmlspecialchars($gdsicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
							<td colspan="56"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>Keteranga :</b> <br><?= htmlspecialchars($ttd_respirasitext ?? '') ?></span>
                                </div>
                            </td>
						</tr>            
                    </thead>
                </table>

                <table class="table table-minkul table-striped table-bordered">    
                <!-- <table class="table table-minkul table-striped table-bordered" style="page-break-before: always;">                                     -->
                    <thead>
                        <tr>
                            <td colspan="52" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: purple;"><b>NEURO</td>
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                            <td class="center">R</td>                         
                            <td class="center">L</td>                                                                                                                
                        </tr>

                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">Ukuran Pupil</td>
                            <?php
                                $ukuranpupilicc = json_decode($ttd_ukuranpupilicc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "ukuranpupilicc" . $i;
                                    $value = isset($ukuranpupilicc[$key]) ? htmlspecialchars($ukuranpupilicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">Reaksi Pupil</td>
                            <?php
                                $reaksipupilicc = json_decode($ttd_reaksipupilicc ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "reaksipupilicc" . $i;
                                    $value = isset($reaksipupilicc[$key]) ? htmlspecialchars($reaksipupilicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>  

                        <tr>
                            <td colspan="2" rowspan="2" width="5%" style="background-color: #B0E0E6; color: black;">GCS</td>
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                         
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                            <td colspan="2" class="center">E/M/V</td>                                                                                                                
                        </tr>
                        
                        <tr>
                            <?php
                                $gcsicc = json_decode($ttd_gcsicc ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "gcsicc" . $i;
                                    $value = isset($gcsicc[$key]) ? htmlspecialchars($gcsicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">Kesadaran</td>
                            <?php
                                $kesadaranicct = json_decode($ttd_kesadaranicct ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "kesadaranicct" . $i;
                                    $value = isset($kesadaranicct[$key]) ? htmlspecialchars($kesadaranicct[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">PLEBITIS</td>
                            <?php
                                $plebitisicc = json_decode($ttd_plebitisicc ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "plebitisicc" . $i;
                                    $value = isset($plebitisicc[$key]) ? htmlspecialchars($plebitisicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="52" style="background-color: #B0E0E6; color: purple;"><b>PAIN ASESMENT</td>   
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">LOCATION</td>
                            <?php
                                $locationicc = json_decode($ttd_locationicc ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "locationicc" . $i;
                                    $value = isset($locationicc[$key]) ? htmlspecialchars($locationicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">INTENSITY</td>
                            <?php
                                $intensity = json_decode($ttd_intensity ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "intensity" . $i;
                                    $value = isset($intensity[$key]) ? htmlspecialchars($intensity[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: #B0E0E6; color: black;" width="5%">SEDATION AGITATION SCALE</td>
                            <?php
                                $sedationicc = json_decode($ttd_sedationicc ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "sedationicc" . $i;
                                    $value = isset($sedationicc[$key]) ? htmlspecialchars($sedationicc[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
							<td colspan="52"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>Keteranga :</b> <br><?= htmlspecialchars($ttd_neurotext ?? '') ?></span>
                                </div>
                            </td>
						</tr>
                       
                    </thead>
                </table>

                <table class="table table-miniber table-striped table-bordered">                                          
                    <thead>
                        <tr>
                            <td class="center" colspan="9" style="background-color: #B0E0E6; color: black;" width="15%">LABORATORIUM DAN PENUNJANG</td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td rowspan="18" class="center" style="
                                background-color: #B0E0E6;
                                color: black;
                                writing-mode: vertical-rl;
                                transform: rotate(180deg);
                                width: 0.1%;">
                                HASIL LABORATORIUM
                            </td>
                            <td rowspan="8" class="center" style="
                                background-color: #B0E0E6;
                                color: black;
                                writing-mode: vertical-rl;
                                transform: rotate(180deg);
                                width: 0.1%;">
                                AGD
                            </td>
                            <td style="background-color: #B0E0E6; color:" width="1%">
                                PH
                            </td>
                            <?php
                                $phicc = json_decode($ttd_phicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "phicc" . $i;
                                    $value = isset($phicc[$key]) ? htmlspecialchars($phicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                PCO2
                            </td>
                            <?php
                                $pcoicc = json_decode($ttd_pcoicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "pcoicc" . $i;
                                    $value = isset($pcoicc[$key]) ? htmlspecialchars($pcoicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                PO2
                            </td>
                            <?php
                                $poicc = json_decode($ttd_poicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "poicc" . $i;
                                    $value = isset($poicc[$key]) ? htmlspecialchars($poicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                TCO2
                            </td>
                            <?php
                                $tcoicc = json_decode($ttd_tcoicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "tcoicc" . $i;
                                    $value = isset($tcoicc[$key]) ? htmlspecialchars($tcoicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                BE
                            </td>
                            <?php
                                $belicc = json_decode($ttd_belicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "belicc" . $i;
                                    $value = isset($belicc[$key]) ? htmlspecialchars($belicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                HCO3
                            </td>
                            <?php
                                $hcoicc = json_decode($ttd_hcoicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "hcoicc" . $i;
                                    $value = isset($hcoicc[$key]) ? htmlspecialchars($hcoicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                O2
                            </td>
                            <?php
                                $ooduaicc = json_decode($ttd_ooduaicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "ooduaicc" . $i;
                                    $value = isset($ooduaicc[$key]) ? htmlspecialchars($ooduaicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                SATURASI
                            </td>
                            <?php
                                $saturwasiicc = json_decode($ttd_saturwasiicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "saturwasiicc" . $i;
                                    $value = isset($saturwasiicc[$key]) ? htmlspecialchars($saturwasiicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td rowspan="10" class="center" style="
                                background-color: #B0E0E6;
                                color: black;
                                writing-mode: vertical-rl;
                                transform: rotate(180deg);
                                width: 0.1%;">
                            </td>

                            <td style="background-color: #B0E0E6;" width="1%">
                                Na/K/Cl/Ca
                            </td>
                            <?php
                                $nakclcaicc = json_decode($ttd_nakclcaicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "nakclcaicc" . $i;
                                    $value = isset($nakclcaicc[$key]) ? htmlspecialchars($nakclcaicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                Ureum/Creatinin
                            </td>
                            <?php
                                $ureumcreatininicc = json_decode($ttd_ureumcreatininicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "ureumcreatininicc" . $i;
                                    $value = isset($ureumcreatininicc[$key]) ? htmlspecialchars($ureumcreatininicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                Albumin
                            </td>
                            <?php
                                $albuminicc = json_decode($ttd_albuminicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "albuminicc" . $i;
                                    $value = isset($albuminicc[$key]) ? htmlspecialchars($albuminicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                Hb/Ht/Leu/Throm
                            </td>
                            <?php
                                $hbhtleuicc = json_decode($ttd_hbhtleuicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "hbhtleuicc" . $i;
                                    $value = isset($hbhtleuicc[$key]) ? htmlspecialchars($hbhtleuicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                OT/PT
                            </td>
                            <?php
                                $otpticc = json_decode($ttd_otpticc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "otpticc" . $i;
                                    $value = isset($otpticc[$key]) ? htmlspecialchars($otpticc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                Bil. Direct/Indirect	
                            </td>
                            <?php
                                $bildirectlicc = json_decode($ttd_bildirectlicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "bildirectlicc" . $i;
                                    $value = isset($bildirectlicc[$key]) ? htmlspecialchars($bildirectlicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                CK/CKMB
                            </td>
                            <?php
                                $ckckmbicc = json_decode($ttd_ckckmbicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "ckckmbicc" . $i;
                                    $value = isset($ckckmbicc[$key]) ? htmlspecialchars($ckckmbicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                PT/APTT/INR
                            </td>
                            <?php
                                $ptapttcc = json_decode($ttd_ptapttcc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "ptapttcc" . $i;
                                    $value = isset($ptapttcc[$key]) ? htmlspecialchars($ptapttcc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                FIBRINOGEN/D-DIMER
                            </td>
                            <?php
                                $fibrinogenicc = json_decode($ttd_fibrinogenicc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "fibrinogenicc" . $i;
                                    $value = isset($fibrinogenicc[$key]) ? htmlspecialchars($fibrinogenicc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="background-color: #B0E0E6;" width="1%">
                                CRP/PCT
                            </td>
                            <?php
                                $crppcticc = json_decode($ttd_crppcticc ?? '[]', true);
                                for ($i = 1; $i <= 6; $i++) {
                                    $key = "crppcticc" . $i;
                                    $value = isset($crppcticc[$key]) ? htmlspecialchars($crppcticc[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                        </tr>                       
                    </thead>
                </table>

                <!-- <table class="table table-mini table-striped table-bordered" style="page-break-before: always;">                                     -->
                <table class="table table-mini table-striped table-bordered">                                          
                    <thead>
                        <tr>
                            <td class="center" colspan="12" style="background-color: #B0E0E6; color: black;" width="15%">CATATAN PERAWAT</td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td class="center" width="3%">JAM PAGI</td>
                            <td class="center" width="15%">DINAS PAGI</td>
                            <td class="center" width="0.5%">PARAF</td>
                            <td class="center" width="9%">PETUGAS PAGI</td>
                            <td class="center" width="3%">JAM SORE</td>
                            <td class="center" width="15%">DINAS SORE</td>
                            <td class="center" width="0.5%">PARAF</td>
                            <td class="center" width="9%">PETUGAS SORE</td>
                            <td class="center" width="3%">JAM MALAM</td>
                            <td class="center" width="15%">DINAS MALAM</td>
                            <td class="center" width="0.5%">PARAF</td>
                            <td class="center" width="9%">PETUGAS MALAM</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = count($ttd_jampagiicc); // Anggap semua array panjangnya sama ya yank
                        for ($i = 0; $i < $count; $i++) :
                        ?>
                            <tr>
                                <td class="center"><?= $ttd_jampagiicc[$i] ?? '-' ?></td>
                                <td><?= $ttd_dinaspagiicc[$i] ?? '-' ?></td>
                                <td class="center">
                                    <input type="checkbox" <?= ($ttd_parafpagiicc[$i] ?? 0) == 1 ? 'checked' : '' ?>>
                                </td>
                                <td class="center"><?= $ttd_nama_perawat_pagi[$i] ?? '-' ?></td>

                                <td class="center"><?= $ttd_jamsoreicc[$i] ?? '-' ?></td>
                                <td><?= $ttd_dinassoreicc[$i] ?? '-' ?></td>
                                <td class="center">
                                    <input type="checkbox" <?= ($ttd_parafsoreicc[$i] ?? 0) == 1 ? 'checked' : '' ?>>
                                </td>
                                <td class="center"><?= $ttd_nama_perawat_sore[$i] ?? '-' ?></td>

                                <td class="center"><?= $ttd_jammalamicc[$i] ?? '-' ?></td>
                                <td><?= $ttd_dinasmalamicc[$i] ?? '-' ?></td>
                                <td class="center">
                                    <input type="checkbox" <?= ($ttd_parafmalamicc[$i] ?? 0) == 1 ? 'checked' : '' ?>>
                                </td>
                                <td class="center"><?= $ttd_nama_perawat_malam[$i] ?? '-' ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
				</table>

                <!-- <table class="table table-minim table-striped table-bordered" style="page-break-before: always;">                                     -->
                <table class="table table-minim table-striped table-bordered">                                          
                    <thead>
                        <tr>
                            <td class="center" colspan="53" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td></td>  
                            <td colspan="2" style="background-color: #B0E0E6; color: purple;" width="10%">INTAKE</td>                    
                            <td>07</td><td></td><td>08</td><td></td><td>09</td><td></td><td>10</td><td></td>
                            <td>11</td><td></td><td>12</td><td></td><td>13</td><td></td><td>14</td><td></td>
                            <td>15</td><td></td><td>16</td><td></td><td>17</td><td></td><td>18</td><td></td>
                            <td>19</td><td></td><td>20</td><td></td><td>21</td><td></td><td>22</td><td></td>
                            <td>23</td><td></td><td>24</td><td></td><td>01</td><td></td><td>02</td><td></td>
                            <td>03</td><td></td><td>04</td><td></td><td>05</td><td></td><td>06</td><td></td>
                            <td></td><td></td>
                        </tr>

                        <tr>
                            <td style="text-align: center;">1</td> <!-- kolom pertama -->
                            <!-- <!?php
                            Mengubah string JSON jadi array asosiatif PHP
                            $intakeA = json_decode($ttd_intakeA ?? '[]', true);
                            
                            Loop dari 1 sampai 50 untuk isi kolom tengah
                            for ($i = 1; $i <= 51; $i++) {
                                Bikin nama key yang sesuai format di array, misalnya 'intakeA1', 'intakeA2', ...
                                $key = "intakeA" . $i;
                                
                                Ambil nilai dari array sesuai key, kalau ga ada, kosongkan ('')
                                $value = isset($intakeA[$key]) ? htmlspecialchars($intakeA[$key]) : '';
                                
                                Cetak isi <td> untuk setiap kolom tengah
                                echo "<td>{$value}</td>";
                            }
                            ?> -->

                            <?php
                                $intakeA = json_decode($ttd_intakeA ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeA" . $i;
                                    $value = isset($intakeA[$key]) ? htmlspecialchars($intakeA[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">1</td> <!-- kolom terakhir -->
                        </tr>

                        <tr>
                            <td style="text-align: center;">2</td>
                            <?php
                            $intakeB = json_decode($ttd_intakeB ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeB" . $i;
                                    $value = isset($intakeB[$key]) ? htmlspecialchars($intakeB[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">2</td>
                        </tr>

                        <tr>
                            <td style="text-align: center;">3</td>                            
                            <?php
                                $intakeC = json_decode($ttd_intakeC ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeC" . $i;
                                    $value = isset($intakeC[$key]) ? htmlspecialchars($intakeC[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">3</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4</td>
                            <?php
                                $intakeD = json_decode($ttd_intakeD ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeD" . $i;
                                    $value = isset($intakeD[$key]) ? htmlspecialchars($intakeD[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">4</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5</td>
                            <?php
                                $intakeE = json_decode($ttd_intakeE ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeE" . $i;
                                    $value = isset($intakeE[$key]) ? htmlspecialchars($intakeE[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">5</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">6</td>
                            <?php
                                $intakeF = json_decode($ttd_intakeF ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeF" . $i;
                                    $value = isset($intakeF[$key]) ? htmlspecialchars($intakeF[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">6</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7</td>
                            <?php
                                $intakeG = json_decode($ttd_intakeG ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeG" . $i;
                                    $value = isset($intakeG[$key]) ? htmlspecialchars($intakeG[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">7</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">8</td>
                            <?php
                                $intakeH = json_decode($ttd_intakeH ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeH" . $i;
                                    $value = isset($intakeH[$key]) ? htmlspecialchars($intakeH[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">8</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">9</td>
                            <?php
                                $intakeI = json_decode($ttd_intakeI ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeI" . $i;
                                    $value = isset($intakeI[$key]) ? htmlspecialchars($intakeI[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">9</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">10</td>
                            <?php
                                $intakeJ = json_decode($ttd_intakeJ ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "intakeJ" . $i;
                                    $value = isset($intakeJ[$key]) ? htmlspecialchars($intakeJ[$key]) : '';

                                    if ($i == 1) {
                                        echo "<td colspan='2'>{$value}</td>";
                                    } else {
                                        echo "<td>{$value}</td>";
                                    }
                                }
                            ?>
                            <td style="text-align: right;">10</td>
                        </tr>

                        <tr>
                            <td style="text-align: center;"></td>
                            <td colspan="2" width="2%" style="background-color: #B0E0E6; color: black;">TOTAL PER JAM</td>
                            <?php
                                $intakeK = json_decode($ttd_intakeK ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "intakeK" . $i;
                                    $value = isset($intakeK[$key]) ? htmlspecialchars($intakeK[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <td style="text-align: center;"></td>
                            <td colspan="2" width="2%" style="background-color: #B0E0E6; color: black;">RUNNING TOTAL IN</td>
                            <?php
                                $intakeL = json_decode($ttd_intakeL ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "intakeL" . $i;
                                    $value = isset($intakeL[$key]) ? htmlspecialchars($intakeL[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                        </tr>                        
                    </thead>
                </table>

                <table class="table table-minik table-striped table-bordered">     
                <!-- <table class="table table-minik table-striped table-bordered" style="page-break-before: always;">                                                                     -->
                    <thead>
                        <tr>
                            <td class="center" colspan="53" style="background-color: #B0E0E6; color: black;" width="15%"></td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td colspan="53" width="15%">TOTAL INTAKE / 24 JAM</td>                                                                                                                                                 
                        </tr> 
                        <tr>
                            <td colspan="53" width="15%" style="background-color: #B0E0E6; color: purple;">OUTPUT</td>                                                                                                                                                 
                        </tr> 

                        <tr>
                            <td colspan="2">DRAIN</td>
                            <?php
                            $drainA = json_decode($ttd_drainA ?? '[]', true);
                            for ($i = 1; $i <= 50; $i++) {
                                $key = "drainA" . $i;
                                $value = isset($drainA[$key]) ? htmlspecialchars($drainA[$key]) : '';
                                echo "<td>{$value}</td>";
                            }
                            ?>
                            <td style="text-align: right;"></td>
                        </tr>
                        <tr>
                            <td colspan="2">DRAIN</td>
                            <?php
                            $drainB = json_decode($ttd_drainB ?? '[]', true);
                            for ($i = 1; $i <= 50; $i++) {
                                $key = "drainB" . $i;
                                $value = isset($drainB[$key]) ? htmlspecialchars($drainB[$key]) : '';
                                echo "<td>{$value}</td>";
                            }
                            ?>
                            <td style="text-align: right;"></td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align: center;"></td>
                            <?php
                                $drainC = json_decode($ttd_drainC ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "drainC" . $i;
                                    $value = isset($drainC[$key]) ? htmlspecialchars($drainC[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"></td>
                            <?php
                                $drainD = json_decode($ttd_drainD ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "drainD" . $i;
                                    $value = isset($drainD[$key]) ? htmlspecialchars($drainD[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">NGT</td>
                            <?php
                                $ngtE = json_decode($ttd_ngtE ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "ngtE" . $i;
                                    $value = isset($ngtE[$key]) ? htmlspecialchars($ngtE[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">BAB</td>
                            <?php
                                $babF = json_decode($ttd_babF ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "babF" . $i;
                                    $value = isset($babF[$key]) ? htmlspecialchars($babF[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">BAK</td>
                            <?php
                                $bakG = json_decode($ttd_bakG ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "bakG" . $i;
                                    $value = isset($bakG[$key]) ? htmlspecialchars($bakG[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">TOTAL PER JAM</td>
                            <?php
                                $totalperjamH = json_decode($ttd_totalperjamH ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "totalperjamH" . $i;
                                    $value = isset($totalperjamH[$key]) ? htmlspecialchars($totalperjamH[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">RUNNING TOTAL</td>
                            <?php
                                $runingtotalI = json_decode($ttd_runingtotalI ?? '[]', true);
                                for ($i = 1; $i <= 25; $i++) {
                                    $key = "runingtotalI" . $i;
                                    $value = isset($runingtotalI[$key]) ? htmlspecialchars($runingtotalI[$key]) : '';
                                    echo "<td colspan='2'>{$value}</td>";
                                }
                            ?>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="53" width="15%">IWL/ 24 JAM</td>                                                                                                                                                 
                        </tr> 
                        <tr>
							<td colspan="53"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>TOTAL OUTPUT / 24 HOURS : </b> <br><?= htmlspecialchars($ttd_totaloutput ?? '') ?></span>
                                </div>
                            </td>
						</tr>
                        <tr>
                            <td colspan="2"style="background-color: #B0E0E6; color: purple;">BALANCE</td>
                            <?php
                                $balenceJ = json_decode($ttd_balenceJ ?? '[]', true);
                                for ($i = 1; $i <= 50; $i++) {
                                    $key = "balenceJ" . $i;
                                    $value = isset($balenceJ[$key]) ? htmlspecialchars($balenceJ[$key]) : '';
                                    echo "<td>{$value}</td>";
                                }
                            ?>
                            <td style="text-align: right;"></td>
                        </tr>
                        <tr>
							<td colspan="48"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>TOTAL OUTPUT / 24 HOURS : </b> <br><?= htmlspecialchars($ttd_balenceK ?? '') ?></span>
                                </div>
                            </td>
                            <td class="center" colspan="2">BALANCE SEBELUMNYA</td>
                            <td class="center" colspan="2">BALANCE HARI INI</td>
                            <td></td>
                        </tr>


                        <?php
                            $balanceL = json_decode($ttd_balanceL ?? '[]', true);
                            $val1 = $balanceL['balanceL1'] ?? '-';
                            $val2 = $balanceL['balanceL2'] ?? '-';
                            $val3 = $balanceL['balanceL3'] ?? '-';
                        ?>

                        <tr>
                            <td colspan="48"> 
                                <div style="display: flex; justify-content: space-between;">
                                    <span><b>BALANCE CAIRAN SEBELUMNYA : </b><br><?= htmlspecialchars($val1) ?></span>
                                </div>
                            </td>
                            <td class="center" colspan="2"><?= htmlspecialchars($val2) ?></td>
                            <td class="center" colspan="2"><?= htmlspecialchars($val3) ?></td>
                            <td></td>
                        </tr>



                    

                    </thead>
                </table>

                <!-- <table class="table table-sm table-striped table-bordered">  -->
                <table class="table table-sm table-striped table-bordered" style="page-break-before: always;">  
                    <tr>
                        <td class="center" colspan="20" style="background-color: #B0E0E6; color: black;" width="20%">ALHAMDULILLAHIRABBIL'ALAMIN</td>                                                                                                                                                 
                    </tr>
                </table>

                <div style="display: flex; gap: 20px;">
                    <!-- <table class="table table-mini table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color:rgb(151, 90, 189); color: white;">
                                    DOWN SCORE/EVALUASI GAWAT NAFAS
                                </td>
                            </tr>
                            <tr>
                                <td class="center">Nilai</td>
                                <td class="center">0</td>
                                <td class="center">1</td>
                                <td class="center">2</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Frekuensi Nafas</td>
                                <td class="center">
                                    <input type="radio" name="frekuensinafasicc" value="0" <?= ($ttd_frekuensinafasicc === '0') ? 'checked' : ''; ?>> < 60x/menit
                                </td>
                                <td class="center">
                                    <input type="radio" name="frekuensinafasicc" value="1" <?= ($ttd_frekuensinafasicc === '1') ? 'checked' : ''; ?>> 60-80x/menit
                                </td>
                                <td class="center">
                                    <input type="radio" name="frekuensinafasicc" value="2" <?= ($ttd_frekuensinafasicc === '2') ? 'checked' : ''; ?>> > 80x/menit
                                </td>
                            </tr>
                            <tr>
                                <td>Retraksi</td>
                                <td class="center">
                                    <input type="radio" name="retraksiicc" value="0" <?= ($ttd_retraksiicc === '0') ? 'checked' : ''; ?>> Tidak ada retraksi
                                </td>
                                <td class="center">
                                    <input type="radio" name="retraksiicc" value="1" <?= ($ttd_retraksiicc === '1') ? 'checked' : ''; ?>> Retraksi ringan
                                </td>
                                <td class="center">
                                    <input type="radio" name="retraksiicc" value="2" <?= ($ttd_retraksiicc === '2') ? 'checked' : ''; ?>> Retraksi berat
                                </td>
                            </tr>
                            <tr>
                                <td>Sianosis</td>
                                <td class="center">
                                    <input type="radio" name="sianosisicc" value="0" <?= ($ttd_sianosisicc === '0') ? 'checked' : ''; ?>> Tidak sianosis
                                </td>
                                <td class="center">
                                    <input type="radio" name="sianosisicc" value="1" <?= ($ttd_sianosisicc === '1') ? 'checked' : ''; ?>>  Sianosis hilang dengan pemberian Oksigen
                                </td>
                                <td class="center">
                                    <input type="radio" name="sianosisicc" value="2" <?= ($ttd_sianosisicc === '2') ? 'checked' : ''; ?>> Sianosis menetap walaupun diberi Oksigen
                                </td>
                            </tr>
                            <tr>
                                <td>Air Entry</td>
                                <td class="center">
                                    <input type="radio" name="airentriicc" value="0" <?= ($ttd_airentriicc === '0') ? 'checked' : ''; ?>> Udara masuk Bilateral baik
                                </td>
                                <td class="center">
                                    <input type="radio" name="airentriicc" value="1" <?= ($ttd_airentriicc === '1') ? 'checked' : ''; ?>> Penurunan ringan udara masuk
                                </td>
                                <td class="center">
                                    <input type="radio" name="airentriicc" value="2" <?= ($ttd_airentriicc === '2') ? 'checked' : ''; ?>> Tidak ada udara masuk
                                </td>
                            </tr>
                            <tr>
                                <td>Merintih</td>
                                <td class="center">
                                    <input type="radio" name="merintihicc" value="0" <?= ($ttd_merintihicc === '0') ? 'checked' : ''; ?>> Tidak merintih
                                </td>
                                <td class="center">
                                    <input type="radio" name="merintihicc" value="1" <?= ($ttd_merintihicc === '1') ? 'checked' : ''; ?>> Dapat Didengar dengan stetoskop
                                </td>
                                <td class="center">
                                    <input type="radio" name="merintihicc" value="2" <?= ($ttd_merintihicc === '2') ? 'checked' : ''; ?>> Dapat Didengar tanpa alat bantu
                                </td>
                            </tr>
                            <tr>
                                <td>Total Score</td>
                                <td class="center">
                                    <input type="text" class="form-control" style="text-align: center;" value="<?= $ttd_total_nilai_dsegn; ?>" disabled>
                                </td>
                                <td colspan="2"class="center"></td>
                            </tr>
                            <tr>
                                <td colspan="4"class="center"></td>
                            </tr>
                            <tr>
                                <td colspan="4"class="center"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <table class="table table-mini table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color: #B0E0E6; color: black;">
                                    BRADEN RISK ASESSMENT SCALE
                                </td>
                            </tr>
                            <tr>
                                <td class="center" style="background-color:rgb(212, 239, 74); color: black;">Sensory/Mental</td>
                                <td class="center" style="background-color:rgb(99, 209, 229); color: black;">Molsture</td>
                                <td class="center" style="background-color:rgb(235, 237, 240); color: black;">Activity</td>
                                <td class="center" style="background-color:rgb(133, 198, 228); color: black;">Mobility</td>
                                <td class="center" style="background-color:rgb(220, 225, 191); color: black;">Nutrition</td>
                                <td class="center" style="background-color:rgb(103, 172, 246); color: black;">Friction/Shear</td>
                            </tr>
                        </thead>
                        <tbody>  
                            <tr>                       
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_1 ?? 0) == 1 ? 'checked' : '' ?>> 1. Totally limited
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_2 ?? 0) == 1 ? 'checked' : '' ?>> 1. Constantly moist
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_3 ?? 0) == 1 ? 'checked' : '' ?>> 1. Bedfast
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_4 ?? 0) == 1 ? 'checked' : '' ?>> 1. 100% immobile
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_5 ?? 0) == 1 ? 'checked' : '' ?>> 1. Very poor
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_totalyicc_6 ?? 0) == 1 ? 'checked' : '' ?>> 1. Frequent sliding
                                </td>
                            </tr>
                            <tr>                       
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_1 ?? 0) == 2 ? 'checked' : '' ?>> 2. Very limited
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_2 ?? 0) == 2 ? 'checked' : '' ?>> 2. Very moist
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_3 ?? 0) == 2 ? 'checked' : '' ?>> 2. Chairfast
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_4 ?? 0) == 2 ? 'checked' : '' ?>> 2. Very limited
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_5 ?? 0) == 2 ? 'checked' : '' ?>> 2. < ½ daily portion
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_veryicc_6 ?? 0) == 2 ? 'checked' : '' ?>> 2. Feeble corrections
                                </td>
                            </tr>
                            <tr>                       
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_1 ?? 0) == 3 ? 'checked' : '' ?>> 3. Slightly limited
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_2 ?? 0) == 3 ? 'checked' : '' ?>> 3. Occasionally moist
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_3 ?? 0) == 3 ? 'checked' : '' ?>> 3. Walks w/out Assistance
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_4 ?? 0) == 3 ? 'checked' : '' ?>> 3. Slightly Limited
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_5 ?? 0) == 3 ? 'checked' : '' ?>> 3. Most of portion
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_slightly_6 ?? 0) == 3 ? 'checked' : '' ?>> 3. Independent corrections
                                </td>
                            </tr>
                            <tr>                       
                                <td>
                                    <input type="checkbox" <?= ($ttd_impairment_1 ?? 0) == 4 ? 'checked' : '' ?>> 4. No impairment
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_impairment_2 ?? 0) == 4 ? 'checked' : '' ?>> 4. Dry
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_impairment_3 ?? 0) == 4 ? 'checked' : '' ?>> 4. Walks w/out Assistance
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_impairment_4 ?? 0) == 4 ? 'checked' : '' ?>> 4. Full Mobility
                                </td>
                                <td>
                                    <input type="checkbox" <?= ($ttd_impairment_5 ?? 0) == 4 ? 'checked' : '' ?>> 4. Eats everything
                                </td>
                                <td></td>
                            </tr>
                            <tr>                       
                                <td>Total Braden Score</td>
                                 <td class="center">
                                    <input type="text" class="form-control" style="text-align: center;" value="<?= $ttd_total_nilai_bras; ?>" disabled>
                                </td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="6"class="center">15-16 Mild Risk 12-14 Moderate Risk < 12 High Risk</td>
                            </tr>
                            <tr>
                                <td colspan="6"class="center">15-18 is Considered Mild Risk for those > 75 years</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="display: flex; gap: 20px;">
                    <!-- <table class="table table-sm table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color: #B0E0E6; color: black;">
                                    SOFA SCORE
                                </td>
                            </tr>
                            <tr>
                                <td class="center">Sofa Score</td>
                                <td class="center">0</td>
                                <td class="center">1</td>
                                <td class="center">2</td>
                                <td class="center">3</td>
                                <td class="center">4</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>Respirationa</b> PaO2/FIO2 (mmHg) SaO2/FIO2</td>
                                <td class="center">
                                    <input type="radio" name="respirationa" value="0" <?= ($ttd_respirationa === '0') ? 'checked' : ''; ?>> > 400
                                </td>
                                <td class="center">
                                    <input type="radio" name="respirationa" value="1" <?= ($ttd_respirationa === '1') ? 'checked' : ''; ?>> < 400 <br> 221-301
                                </td>
                                <td class="center">
                                    <input type="radio" name="respirationa" value="2" <?= ($ttd_respirationa === '2') ? 'checked' : ''; ?>>  < 300 <br> 142-220
                                </td>
                                <td class="center">
                                    <input type="radio" name="respirationa" value="3" <?= ($ttd_respirationa === '3') ? 'checked' : ''; ?>> < 200 <br> 67-141
                                </td>
                                <td class="center">
                                    <input type="radio" name="respirationa" value="4" <?= ($ttd_respirationa === '4') ? 'checked' : ''; ?>> < 100 <br> < 67
                                </td>
                            </tr>
                            <tr>
                                <td><b>Coagulation</b> Platelets  10<sup>3 / mm<sup>3</td>
                                <td class="center">
                                    <input type="radio" name="coagulation" value="0" <?= ($ttd_coagulation === '0') ? 'checked' : ''; ?>> > 150
                                </td>
                                <td class="center">
                                    <input type="radio" name="coagulation" value="1" <?= ($ttd_coagulation === '1') ? 'checked' : ''; ?>> < 150
                                </td>
                                <td class="center">
                                    <input type="radio" name="coagulation" value="2" <?= ($ttd_coagulation === '2') ? 'checked' : ''; ?>> < 100 
                                </td>
                                <td class="center">
                                    <input type="radio" name="coagulation" value="3" <?= ($ttd_coagulation === '3') ? 'checked' : ''; ?>> < 50
                                </td>
                                <td class="center">
                                    <input type="radio" name="coagulation" value="4" <?= ($ttd_coagulation === '4') ? 'checked' : ''; ?>> < 20
                                </td>
                            </tr>
                            <tr>
                                <td><b>Liver</b> Bilirubin (mg/dL)</td> 
                                <td class="center">
                                    <input type="radio" name="bilirubin" value="0" <?= ($ttd_bilirubin === '0') ? 'checked' : ''; ?>> < 1.2
                                </td>
                                <td class="center">
                                    <input type="radio" name="bilirubin" value="1" <?= ($ttd_bilirubin === '1') ? 'checked' : ''; ?>>  1.2-1.9
                                </td>
                                <td class="center">
                                    <input type="radio" name="bilirubin" value="2" <?= ($ttd_bilirubin === '2') ? 'checked' : ''; ?>> 2.0-5.9 
                                </td>
                                <td class="center">
                                    <input type="radio" name="bilirubin" value="3" <?= ($ttd_bilirubin === '3') ? 'checked' : ''; ?>> 6.0-11.9
                                </td>
                                <td class="center">
                                    <input type="radio" name="bilirubin" value="4" <?= ($ttd_bilirubin === '4') ? 'checked' : ''; ?>> > 12.0
                                </td>
                            </tr>
                            <tr>
                                <td><b>Cardiovascular<sup>b</b>Hypotension</td>
                                <td class="center">
                                    <input type="radio" name="cardiovascular" value="0" <?= ($ttd_cardiovascular === '0') ? 'checked' : ''; ?>> No<br>hypotension
                                </td>
                                <td class="center">
                                    <input type="radio" name="cardiovascular" value="1" <?= ($ttd_cardiovascular === '1') ? 'checked' : ''; ?>> MAP<br>< 70 
                                </td>
                                <td class="center">
                                    <input type="radio" name="cardiovascular" value="2" <?= ($ttd_cardiovascular === '2') ? 'checked' : ''; ?>> Dopamine <br> </= 5 or Dobutamine (Any)
                                </td>
                                <td class="center">
                                    <input type="radio" name="cardiovascular" value="3" <?= ($ttd_cardiovascular === '3') ? 'checked' : ''; ?>> Dopamine <br> > 5 or Norepinephrine </= 0.1
                                </td>
                                <td class="center">
                                    <input type="radio" name="cardiovascular" value="4" <?= ($ttd_cardiovascular === '4') ? 'checked' : ''; ?>> Dopamine >15 or <br> Norepinephrine >0.1
                                </td>
                            </tr>
                            <tr>
                                <td><b>CNS</b> Glasgow Coma Score</td>
                                <td class="center">
                                    <input type="radio" name="cns" value="0" <?= ($ttd_cns === '0') ? 'checked' : ''; ?>> 15
                                </td>
                                <td class="center">
                                    <input type="radio" name="cns" value="1" <?= ($ttd_cns === '1') ? 'checked' : ''; ?>> 13-14
                                </td>
                                <td class="center">
                                    <input type="radio" name="cns" value="2" <?= ($ttd_cns === '2') ? 'checked' : ''; ?>> 10-12
                                </td>
                                <td class="center">
                                    <input type="radio" name="cns" value="3" <?= ($ttd_cns === '3') ? 'checked' : ''; ?>> 6-9
                                </td>
                                <td class="center">
                                    <input type="radio" name="cns" value="4" <?= ($ttd_cns === '4') ? 'checked' : ''; ?>> < 6
                                </td>
                            </tr>
                            <tr>
                                <td><b>Renal</b> Creatinine (mg/dL) or urine output (mL/d)</td>
                                <td class="center">
                                    <input type="radio" name="renalicc" value="0" <?= ($ttd_renalicc === '0') ? 'checked' : ''; ?>> < 1.2
                                </td>
                                <td class="center">
                                    <input type="radio" name="renalicc" value="1" <?= ($ttd_renalicc === '1') ? 'checked' : ''; ?>> 1.2-1.9
                                </td>
                                <td class="center">
                                    <input type="radio" name="renalicc" value="2" <?= ($ttd_renalicc === '2') ? 'checked' : ''; ?>> 2.0-3.4 
                                </td>
                                <td class="center">
                                    <input type="radio" name="renalicc" value="3" <?= ($ttd_renalicc === '3') ? 'checked' : ''; ?>> 3.5-4.9 or < 500 
                                </td>
                                <td class="center">
                                    <input type="radio" name="renalicc" value="4" <?= ($ttd_renalicc === '4') ? 'checked' : ''; ?>> > 5.0 or < 200
                                </td>
                            </tr>
                            <tr>
                                <td><b>Total Score</td>
                                <td class="center">
                                    <input type="text" class="form-control" style="text-align: center;" value="<?= $ttd_total_nilai_ss; ?>" disabled>
                                </td>
                                <td colspan="4"class="center"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <table class="table table-sm table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color: #B0E0E6; color: black;"></td>
                            </tr>
                            <tr>
                                <td class="center">SOFA SCOREl</td>
                                <td class="center">PERSENTASE MORTALITAS</td>
                                <td class="center" width="30%"></td>
                                <td class="center">NILAI GCS</td>
                                <td class="center">KATEGORI</td>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php
                                $sspm = json_decode($ttd_sspm);
                                $ngcsk = json_decode($ttd_ngcsk);
                            ?>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_1" value="0-1" <?= ($sspm->sspm_1 ?? '') === '0-1' ? 'checked' : ''; ?>> 0-1
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_2" value="0,0" <?= ($sspm->sspm_2 ?? '') === '0,0' ? 'checked' : ''; ?>> 0,0%
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_1" value="14-15" <?= ($ngcsk->ngcsk_1 ?? '') === '14-15' ? 'checked' : ''; ?>> 14-15
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_2" value="Composmetis=Cm" <?= ($ngcsk->ngcsk_2 ?? '') === 'Composmetis=Cm' ? 'checked' : ''; ?>> Composmetis = Cm
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_3" value="2-3" <?= ($sspm->sspm_3 ?? '') === '2-3' ? 'checked' : ''; ?>> 2-3
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_4" value="6,4%" <?= ($sspm->sspm_4 ?? '') === '6,4%' ? 'checked' : ''; ?>> 6,4%
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_3" value="12-13" <?= ($ngcsk->ngcsk_3 ?? '') === '12-13' ? 'checked' : ''; ?>> 12-13
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_4" value="Apatis=A" <?= ($ngcsk->ngcsk_4 ?? '') === 'Apatis=A' ? 'checked' : ''; ?>> Apatis=A
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_5" value="4-5" <?= ($sspm->sspm_5 ?? '') === '4-5' ? 'checked' : ''; ?>> 4-5
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_6" value="20,2%" <?= ($sspm->sspm_6 ?? '') === '20,2%' ? 'checked' : ''; ?>> 20,2%
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_5" value="10-11" <?= ($ngcsk->ngcsk_5 ?? '') === '10-11' ? 'checked' : ''; ?>> 10-11
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_6" value="Samnolen=So" <?= ($ngcsk->ngcsk_6 ?? '') === 'Samnolen=So' ? 'checked' : ''; ?>> Samnolen=So
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_7" value="6-7" <?= ($sspm->sspm_7 ?? '') === '6-7' ? 'checked' : ''; ?>> 6-7
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_8" value="21,5%" <?= ($sspm->sspm_8 ?? '') === '21,5%' ? 'checked' : ''; ?>> 21,5% 
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_7" value="7-9" <?= ($ngcsk->ngcsk_7 ?? '') === '7-9' ? 'checked' : ''; ?>> 7-9
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_8" value="Delirium=D" <?= ($ngcsk->ngcsk_8 ?? '') === 'Delirium=D' ? 'checked' : ''; ?>> Delirium=D
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_9" value="8-9" <?= ($sspm->sspm_9 ?? '') === '8-9' ? 'checked' : ''; ?>> 8-9
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_10" value="33,3%" <?= ($sspm->sspm_10 ?? '') === '33,3%' ? 'checked' : ''; ?>> 33,3%
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_9" value="4-6" <?= ($ngcsk->ngcsk_9 ?? '') === '4-6' ? 'checked' : ''; ?>> 4-6
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_10" value="Stupor/SoporComa=St/Sc" <?= ($ngcsk->ngcsk_10 ?? '') === 'Stupor/SoporComa=St/Sc' ? 'checked' : ''; ?>> Stupor/SoporComa=St/Sc
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_11" value="10-11" <?= ($sspm->sspm_11 ?? '') === '10-11' ? 'checked' : ''; ?>> 10-11
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_12" value="50,0%" <?= ($sspm->sspm_12 ?? '') === '50,0%' ? 'checked' : ''; ?>> 50,0%
                                </td>
                                <td class="center"></td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_11" value="1-3" <?= ($ngcsk->ngcsk_11 ?? '') === '1-3' ? 'checked' : ''; ?>> 1-3
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="ngcsk_12" value="Coma=C" <?= ($ngcsk->ngcsk_12 ?? '') === 'Coma=C' ? 'checked' : ''; ?>> Coma=C
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <input type="checkbox" name="sspm_13" value="≥12-14" <?= ($sspm->sspm_13 ?? '') === '≥12-14' ? 'checked' : ''; ?>> ≥12-14
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="sspm_14" value="95,2%" <?= ($sspm->sspm_14 ?? '') === '95,2%' ? 'checked' : ''; ?>> 95,2%
                                </td>
                                <td colspan="3" class="center"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div style="display: flex; gap: 20px;">
                    <!-- <table class="table table-sm table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color: #B0E0E6; color: black;">
                                    TRS
                                </td>
                            </tr>
                            <tr>
                                <td class="center" width="5%">TES</td>
                                <td class="center" width="15%">REAKSI</td>
                                <td class="center" width="5%">SCORE</td>
                                <td class="center" width="5%">PILIH</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="4" class="center align-middle"><b>Mata (Eye)</td>
                                <td>- Membuka mata spontan</td>
                                <td class="center">4</td>
                                <td class="center">
                                    <input type="radio" name="mataicc" value="4" <?= ($ttd_mataicc === '4') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Membuka mata karena diajak berbicara/di panggil</td>
                                <td class="center">3</td>
                                <td class="center">
                                    <input type="radio" name="mataicc" value="3" <?= ($ttd_mataicc === '3') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Membuka mata karena rangsangan Nyeri</td>
                                <td class="center">2</td>
                                <td class="center">
                                    <input type="radio" name="mataicc" value="2" <?= ($ttd_mataicc === '2') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Tidak ada respon</td>
                                <td class="center">1</td>
                                <td class="center">
                                    <input type="radio" name="mataicc" value="1" <?= ($ttd_mataicc === '1') ? 'checked' : ''; ?>>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="6" class="center align-middle"><b>Motorik (M)</td>
                                <td>- Mematuhi Perintah</td>
                                <td class="center">6</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="6" <?= ($ttd_motorikicc === '6') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Melokalisir Nyeri</td>
                                <td class="center">5</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="5" <?= ($ttd_motorikicc === '5') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Menghindari Nyeri</td>
                                <td class="center">4</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="4" <?= ($ttd_motorikicc === '4') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Fleksi Abnormal</td>
                                <td class="center">3</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="3" <?= ($ttd_motorikicc === '3') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Ekstensi Abnormal</td>
                                <td class="center">2</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="2" <?= ($ttd_motorikicc === '2') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Tidak Ada Respon</td>
                                <td class="center">1</td>
                                <td class="center">
                                    <input type="radio" name="motorikicc" value="1" <?= ($ttd_motorikicc === '1') ? 'checked' : ''; ?>>
                                </td>
                            </tr>

                            <tr>
                                <td rowspan="5" class="center align-middle"><b>Verbal (V)</td>
                                <td>- Orientasi Baik dapat berbicara dengan lancar</td>
                                <td class="center">5</td>
                                <td class="center">
                                    <input type="radio" name="verbalicc" value="5" <?= ($ttd_verbalicc === '5') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Bingung</td>
                                <td class="center">4</td>
                                <td class="center">
                                    <input type="radio" name="verbalicc" value="4" <?= ($ttd_verbalicc === '4') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Kata-kata tidak sesuai</td>
                                <td class="center">3</td>
                                <td class="center">
                                    <input type="radio" name="verbalicc" value="3" <?= ($ttd_verbalicc === '3') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Suara tidak jelas (Berguman)</td>
                                <td class="center">2</td>
                                <td class="center">
                                    <input type="radio" name="verbalicc" value="2" <?= ($ttd_verbalicc === '2') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>- Tidak Ada Respon</td>
                                <td class="center">1</td>
                                <td class="center">
                                    <input type="radio" name="verbalicc" value="1" <?= ($ttd_verbalicc === '1') ? 'checked' : ''; ?>>
                                </td>
                            </tr>
     

                            <tr>
                                <td class="center" colspan="2"><b>Total Score</td>
                                <td class="center">3-15</td>
                                <td class="center">
                                    <input type="text" class="form-control" style="text-align: center;" value="<?= $ttd_jmlhtrs; ?>" disabled>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- <table class="table table-sm table-striped table-bordered" style="flex: 1;"> -->
                    <table class="big__line__spacing small__font" style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <td class="center" colspan="10" style="background-color: #B0E0E6; color: black;">PLEBITIS</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 400px; height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                                            <img src="<?= resource_url() ?>images/attributes/pain-measurement-scale-hd.png"
                                                alt="Pain Measurement Scale"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                </td>
                                <td colspan="5" class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 400px; height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                                            <img src="<?= resource_url() ?>images/attributes/puplis.png"
                                                alt="Puplis"
                                                style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>  
                            <tr>
                                <td colspan="10">Plebitis</td>
                            </tr>
                            <?php
                                $plebitistkicc = json_decode($ttd_plebitistkicc);
                            ?>
                            <tr>
                                <td colspan="10">
                                    <input type="checkbox" name="plebitistkicc_1" value="1" <?= ($plebitistkicc->plebitistkicc_1 ?? '') === '1' ? 'checked' : ''; ?>>  0 : Tidak ada tanda plebitis
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <input type="checkbox" name="plebitistkicc_2" value="2" <?= ($plebitistkicc->plebitistkicc_2 ?? '') === '2' ? 'checked' : ''; ?>> 1 : Merah atau sakit bila ditekan
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <input type="checkbox" name="plebitistkicc_3" value="3" <?= ($plebitistkicc->plebitistkicc_3 ?? '') === '3' ? 'checked' : ''; ?>> 2 : Merah, sakit bila ditekan Oedema
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <input type="checkbox" name="plebitistkicc_4" value="4" <?= ($plebitistkicc->plebitistkicc_4 ?? '') === '4' ? 'checked' : ''; ?>> 3 : Merah, sakit bila ditekan Oedema dan Vena mengeras
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <input type="checkbox" name="plebitistkicc_5" value="5" <?= ($plebitistkicc->plebitistkicc_5 ?? '') === '5' ? 'checked' : ''; ?>> 4 : Merah, sakit bila ditekan Oedema, Vena mengeras dan timbul pus
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-KEP-28-02</p>
        </div>
    </footer>	
</body>								
<?php die; ?>
