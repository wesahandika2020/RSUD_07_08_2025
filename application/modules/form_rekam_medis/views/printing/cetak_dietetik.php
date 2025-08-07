<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
    .laporan-dietetik{
        font-size: 10pt ;
    }
    .judul{
        text-align:center;
        background-color: #d3d3d3;
    }
    .subjudul{
        text-align:center;
    }
    @media print {
        body {
            -webkit-print-color-adjust: exact; /* Untuk browser berbasis WebKit seperti Chrome */
            print-color-adjust: exact; /* Untuk browser lain */
        }
        @page {
        size: A4; /* Mengatur ukuran kertas A4 */
    }

    }
</style>

<body onload="window.print()">
<!-- <body> -->
	<!--=============== HEADER ===============-->
	<header class="header" id="header">
		<div class="header__container2 container">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
			<div>
				<h1 class="header__title">RSUD KOTA TANGERANG</h1>
				<p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
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
                        <p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
                        <p class="identity">: <b><?= datefmysql($pasien->tanggal_lahir); ?></b></p>
                        <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>
            </div>
		</div>
	</header>

    <!--=============== MAIN ===============-->

    <main class="main">
        <section class="form__dietetik laporan-dietetik">
			<br>
            <div class="container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border">FORMULIR ASUHAN GIZI DAN DIETETIK</th>
                        </tr>
                    </thead>              
                </table>
                <table class="no__border" style="margin-top: 5px;">
                    <tr>
                        <td class="no__border judul" colspan="2"><small><b>KUNJUNGAN AWAL DIETESIEN PADA PASIEN BARU</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="2"><small><b>Diagnosa Medis :</b><?= $gd->gd_medis ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><b>1.</b></small></td>
                        <td class="no__border"><small><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border">
                            <small>
                                <?php
                                    if (isset($gd->gd_risiko) && $gd->gd_risiko != '') {
                                        if ($gd->gd_risiko == '1') {
                                            echo 'Risiko ringan (Nilai MST 0-1)';
                                        } elseif ($gd->gd_risiko == '2') {
                                            echo 'Risiko sedang (Nilai MST ≥ 2-3)';
                                        } elseif ($gd->gd_risiko == '3') {
                                            echo 'Risiko tinggi (Nilai MST 4-5)';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><b>2.</b></small></td>
                        <td class="no__border"><small><b>Pasien mempunyai kondisi khusus :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border">
                            <small>
                                <?php
                                    if (isset($gd->gd_kondisi) && $gd->gd_kondisi != '') {
                                        if ($gd->gd_kondisi == '1') {
                                            echo 'Ya';
                                        } elseif ($gd->gd_kondisi == '2') {
                                            echo 'Tidak';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><b>3.</b></small></td>
                        <td class="no__border"><small><b>Alergi Makanan :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border">
                            <small>
                                <?php
                                    if (isset($gd->gd_alergi) && $gd->gd_alergi != '') {
                                        if ($gd->gd_alergi == '1') {
                                            echo 'Telur ';
                                        } elseif ($gd->gd_alergi == '2') {
                                            echo 'Sapi ';
                                        } elseif ($gd->gd_alergi == '3') {
                                            echo 'Kacang ';
                                        } elseif ($gd->gd_alergi == '4') {
                                            echo 'Gandum ';
                                        } elseif ($gd->gd_alergi == '5') {
                                            echo 'Udang ';
                                        } elseif ($gd->gd_alergi == '6') {
                                            echo 'Ikan ';
                                        } elseif ($gd->gd_alergi == '7') {
                                            echo 'Almond ';
                                        }
                                    } if (isset($gd->gd_alergi_lainnya) && $gd->gd_alergi_lainnya != '') {
                                        echo $gd->gd_alergi_lainnya;
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><b>4.</b></small></td>
                        <td class="no__border"><small><b>Preskripsi diet :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border">
                            <small>
                                <?php
                                    if (isset($gd->gd_makanan) && $gd->gd_makanan != '') {
                                        if ($gd->gd_makanan == '1') {
                                            echo 'Makanan biasa';
                                        } elseif ($gd->gd_makanan == '2') {
                                            echo 'Diet khusus';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><b>5.</b></small></td>
                        <td class="no__border"><small><b>Tindak lanjut :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border">
                            <small>
                                <?php
                                    if (isset($gd->gd_asuhan) && $gd->gd_asuhan != '') {
                                        if ($gd->gd_asuhan == '1') {
                                            echo 'Pelu asuhan gizi (Lanjut ke asesmen gizi)';
                                        } elseif ($gd->gd_asuhan == '2') {
                                            echo 'Belum perlu asuhan gizi';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                </table>
                <table class="no__border" style="margin-top: 5px;">
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>ASESMEN GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><small><b>Antropometri :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><small>BB</small></td>
                        <td class="no__border" width="20%"><small>: <?= $gd->gd_bb ?? '-' ?> Kg</small></td>
                        <td class="no__border" width="35%"><small>Bila BB tidak dapat ditimbang, LILA</small></td>
                        <td class="no__border" width="30%"><small>: <?= $gd->gd_lila ?? '-' ?> Kg</small></td>

                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><small>TB</small></td>
                        <td class="no__border" width="20%"><small>: <?= $gd->gd_tb ?? '-' ?> Cm</small></td>
                        <td class="no__border" width="35%"><small>Bila TB tidak dapat diukur, Tilut</small></td>
                        <td class="no__border" width="30%"><small>: <?= $gd->gd_tilut ?? '-' ?> Cm</small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="15%"><small>IMT</small></td>
                        <td class="no__border" width="20%"><small>: <?= $gd->gd_imt ?? '-' ?> Kg/m²</small></td>
                        <td class="no__border" width="35%"><small>Status gizi</small></td>
                        <td class="no__border" width="30%"><small>: <?= $gd->gd_status_gizi ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border" colspan="3"><small><b>Dalam 1 Bulan terakhir :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"><small>1.</small></td>
                        <td class="no__border" width="50%"><small>Kesulitan makan</small></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border"><small> <?= $gd->gd_kesulitan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>2.</small></td>
                        <td class="no__border" colspan="2"><small>Makan lebih sedikit dari biasanya</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>≺ 1/2 porsi dari biasanya</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_setengah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>1/2 - 3/4 porsi dari biasanya</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_tigaperempat == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>3.</small></td>
                        <td class="no__border"><small>Penurunan nafsu makan yang mempengaruhi asupan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_penurunan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>4.</small></td>
                        <td class="no__border"><small>Perubahan rasa kecap</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_perubahan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>5.</small></td>
                        <td class="no__border"><small>Mual</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_mual == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>6.</small></td>
                        <td class="no__border"><small>Muntah</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_muntah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>7.</small></td>
                        <td class="no__border"><small>Gangguan / kesulitan mengunyah dan atau menelan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_gangguan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>8.</small></td>
                        <td class="no__border"><small>Perlu bantuan saat makan / minum</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_perlu == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>10.</small></td>
                        <td class="no__border"><small>Masalah dnegan gigi geligi</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_masalah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>11.</small></td>
                        <td class="no__border"><small>Diare</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_diare == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>12.</small></td>
                        <td class="no__border"><small>Konstipati</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_konstipati == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>13.</small></td>
                        <td class="no__border"><small>Pendarahn</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_pendarahan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>14.</small></td>
                        <td class="no__border"><small>Banyak bersendawa</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_bersendawa == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>15.</small></td>
                        <td class="no__border"><small>Alergi makan / intoleransi terhadap makanan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_intoleransi == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>16.</small></td>
                        <td class="no__border"><small>Menjalani diet tertentu</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_diet == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>17.</small></td>
                        <td class="no__border"><small>Makan menggunakan NGT</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_ngt == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><br></td>
                    </tr>
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>ASESMEN GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>18.</small></td>
                        <td class="no__border"><small>Merasa lemah / tidak bertenaga</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_lemah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>19.</small></td>
                        <td class="no__border"><small>Dirawat di RS dalam jangka setahun terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_dirawat == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>20.</small></td>
                        <td class="no__border" colspan="2"><small>Penurunan BB</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>Lebih dari 3 kg dalam 1 bulan terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_tigakg == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>Lebih dari 6 kg dalam 1 bulan terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_enamkg == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>21.</small></td>
                        <td class="no__border"><small>Penyakit</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> 
                                <?php
                                    if (isset($gd->gd_penyakit) && $gd->gd_penyakit != '') {
                                        if ($gd->gd_penyakit == '1') {
                                            echo 'Penyakit keganasan ';
                                        } elseif ($gd->gd_penyakit == '2') {
                                            echo 'Infeksi kronis ';
                                        } elseif ($gd->gd_penyakit == '3') {
                                            echo 'Luka bakar ';
                                        } elseif ($gd->gd_penyakit == '4') {
                                            echo 'Cidera kepala ';
                                        } elseif ($gd->gd_penyakit == '5') {
                                            echo 'Gagal ginjal ';
                                        }
                                    } if (isset($gd->gd_penyakit_lainnya) && $gd->gd_penyakit_lainnya != '') {
                                        echo $gd->gd_penyakit_lainnya;
                                    } else {
                                        echo '✕';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>22.</small></td>
                        <td class="no__border" colspan="3"><small>Data penunjang lainnya / Laboratorium</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border" colspan="3"><small><?= nl2br($gd->gd_laboratorium ?? '-') ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>23.</small></td>
                        <td class="no__border" colspan="3"><small>Klinis / Fisik</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border" colspan="3"><small><?= nl2br($gd->gd_klinis ?? '-') ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="3"><small><b>DIAGNOSIS GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul" width="33.33%"><small><b>Problem</b></small></td>
                        <td class="no__border subjudul" width="33.33%"><small><b>Etiologi</b></small></td>
                        <td class="no__border subjudul" width="33.33%"><small><b>Tanda/gejala</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_problem ?? '-')) ?>
                            </small>
                        </td>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_etiologi ?? '-')) ?>
                            </small>
                        </td>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_gejala ?? '-')) ?>
                            </small>
                        </td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>INTERVENSI GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><small><b>Preskripsi Diet : </b><?= $gd->gd_preskripsi ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Energi</small></td>
                        <td class="no__border" width="40%"><small>: <?= $gd->gd_energi ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small>Makanan Cair</small></td>
                        <td class="no__border" width="20%"><small>: <?= $gd->gd_jenis_makanan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Lemak</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_lemak ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Lunak</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Protein</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_protein ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Saring</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '3' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Karbohidrat</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_karbohidrat ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Biasa</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '4' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Cairan</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cairan ?? '-' ?></small></td>
                        <td class="no__border"><small>Oral</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cara_makan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Route Diet</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_route ?? '-' ?></small></td>
                        <td class="no__border"><small>NGT</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cara_makan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Frekuensi</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_frekuensi ?? '-' ?></small></td>
                        <td class="no__border" colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>MONITORING DAN EVALUASI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border 
                            <?php if ($gd->gd_monitoring === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        " colspan="4">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_monitoring ?? '-')) ?>
                            </small>
                        </td>
                    </tr>
                </table>
                <table class="no__border" style="color:#000; border-top: 2px solid #000; margin-top: 20px;">
                    <tr>
                        <td class="no__border subjudul" width="50%">
                            <small>
                                <?php
                                    // Ambil data tanggal dan waktu dari variabel
                                    $tanggal_waktu = $gd->gd_tgl_petugas; // Contoh: "2024-09-17 10:09"

                                    // Ubah string menjadi objek DateTime
                                    $date = new DateTime($tanggal_waktu);

                                    // Format tanggal menjadi "17/09/2024"
                                    $formatted_date = $date->format('d/m/Y');

                                    // Dapatkan jam dari waktu
                                    $formatted_time = $date->format('H:i');

                                    // Cetak hasil
                                    echo "Tanggal, " . $formatted_date . " Pukul: " . $formatted_time;
                                ?>
                            </small>
                        </td>
                        <td class="no__border subjudul"></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul"><small>Dietesien / Nutrisionist</small></td>
                        <td class="no__border subjudul"><small>Dokter</small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul">
                            <?php
                                if (isset($gd->ttd_petugas) && $gd->ttd_petugas != '') {
                                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $gd->ttd_petugas . '" alt="ttd-petugas" width="300">';
                                } else {
                                    echo '<br><br><br><br>';
                                }
                            ?>
                        </td>
                        <td class="no__border subjudul">
                            <?php
                                if (isset($gd->ttd_dokter) && $gd->ttd_dokter != '') {
                                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $gd->ttd_dokter . '" alt="ttd-petugas" width="300">';
                                } else {
                                    echo '<br><br><br><br>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul"><small><?= $gd->petugas ?? '-' ?></small></td>
                        <td class="no__border subjudul"><small><?= $gd->dokter ?? '-' ?></small></td>
                    </tr>
                </table>
            </div>
            <br>
            <br>    
            <br>
        </section>      
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-GZ-02-02</p>
        </div>
    </footer>
</body>
<?php die; ?>
